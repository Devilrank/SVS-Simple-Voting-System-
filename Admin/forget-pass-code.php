<?php
    session_start();

    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    // require 'vendor/autoload.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';
    require 'src/Exception.php';
        function send_password_reset($get_name,$get_email,$token)
        {
            $mail = new PHPMailer(true);
    
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'legengboy.6244@gmail.com';
            $mail->Password   = 'ycwt csji zzhg pazb';
            $mail->SMTPSecure =  PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
    
            $mail->setFrom('legengboy.6244@gmail.com', 'E-Voting');
            $mail->addAddress($get_email , $get_name);
    
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Link';
            
            $email_template = "
            <h2>Hello</h2>
            <h3>You Reciving This E-mail Becouse we receive a password reset request for your account</h3>
            <br/><br/>
            <a href='http://localhost/svs/Admin/pass-update.php?token=$token&email=$get_email'> Click Me </a>
            ";
            $mail->Body = $email_template;
            $mail->send();
            }
    
            require"config.php";
    
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
        if($conn->connect_error)
        {
            die("connection failed: ".$conn->connect_error);
    
        }
    
        if(isset($_POST["pass_reset_link"]))
        {
            $email = mysqli_real_escape_string($conn, $_POST["femail"]);
            $token = md5(rand());
    
            $check_email = "SELECT email FROM `admin` WHERE email = '$email' LIMIT 1 ";
            $check_email_run = mysqli_query($conn, $check_email);
    
            if(mysqli_num_rows($check_email_run) > 0)
            {
                $row = mysqli_fetch_array($check_email_run);
                $get_name = $row["Username"];
                $get_email = $row["email"];
    
                $update_token = "UPDATE `admin` SET `token` = '$token' WHERE `admin`.`email` = '$get_email' LIMIT 1 ";
                $update_token_run = mysqli_query($conn, $update_token);
    
                if($update_token_run)
                {
                    send_password_reset($get_name,$get_email,$token);
                    $_SESSION['status'] = '<div class="alert alert-success alert-dismissible fade show">
                                                <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert"></button></a>
                                                <strong>successfull!</strong> We sent you Reset Password link On Your E-mail
                                            </div>';
                    header("location: ../");
                    exit(0);
                }
                else
                {
                    $_SESSION['status'] = '<div class="alert alert-danger alert-dismissible fade show">
                                                <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert"></button></a>
                                                <strong>Ohh Sorry!</strong> Something Went Wrong Link Not send To Your E-mail
                                            </div>';
                    header("location: ../");
                    exit(0);
                }
            }
            else
            {
                $_SESSION['status'] = '<div class="alert alert-danger alert-dismissible fade show">
                                            <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert"></button></a>
                                            <strong>Ohh Sorry!</strong> Your E-mail Not Mathed With Linked E-mail
                                        </div>';
                header("location: ../");
                exit(0);
            }
        }

?>