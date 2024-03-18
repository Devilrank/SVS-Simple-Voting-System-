<?php

session_start();

$userprofile = $_SESSION['user_name'];
if($userprofile == true)
{
}
else
{
    header("location: Admin-login.php");
}

$user = 0;
$success = 0;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    require"config.php";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error)
    {
        die("connection failed: ".$conn->connect_error);

    }
    $username = $_POST['Username'];
    $email = $_POST['email'];
    $password = $_POST['Password'];
    $cpassword = $_POST['cPassword'];
    
    $query = "SELECT *FROM admin WHERE Username='$username'";
    $result = $conn->query($query);
    if($result->num_rows == 1)
    {
        $user = 1;
    }
    else
    {
        $success = 1;
    }
if($success == 1)
{
    if($password === $cpassword )
    {
        $sql = "INSERT INTO `admin` (`Username`, `email`, `Password`) VALUES ('$username', '$email', '$password');";
        if(mysqli_query($conn, $sql))
        {
            $_SESSION['user_name'] = "$username";
            echo ' <div class="alert alert-success alert-dismissible fade show">
                        <a href="Admin-panel.php"><button type="button" class="btn-close" data-bs-dismiss="alert"></button></a>
                        <strong>Success!</strong>New Admin Added Successfully!
                    </div>';
        }
        else
        {
            echo "Error: $sql<br> " . mysqli_error($con); 
        }
    }
    else{
        $_SESSION['user_name'] = "$username";
        echo' <div class="alert alert-warning alert-dismissible fade show">
        <a href="Addadmin.php"><button type="button" class="btn-close" data-bs-dismiss="alert"></button></a>
        <strong>Warning!</strong> Password Do not Match
      </div>';
    }
}
else
{
    $_SESSION['user_name'] = "$username";
    echo'<div class="alert alert-danger alert-dismissible fade show">
    <a href="Addadmin.php"><button type="button" class="btn-close" data-bs-dismiss="alert"></button></a>
    <strong>Ohh Sorry!</strong>User already exist
  </div>';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="Admin-st/Signup.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Admin-st/button.css">
    <title>Admin Signup</title>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

    .container{
        display: flex;
        align-items: center;
        margin: 50px auto 100px;
        
    }
    
    .card{
        width: 600px;
    }
    
    .card{
        display: flex;
        flex-wrap: wrap;
        border-radius: 24px;
        cursor: pointer;
        overflow: hidden;
        max-width: clamp(320px, 50vw, 540px);
        min-width: 320px;
        min-height: 280px;
    }
    
    .card{
        top: 50%;
        left: 50%;
        width: 400px;
        padding: 40px;
        transform: translate(-50%, -50%);
        background: transparent white;
        backdrop-filter: blur(8px);
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(0,0,0,6);
        border-radius: 10px;
    }
    
    .col{
        margin-left: 80%;
    }
    
    .card .card-header h1{
        margin: 0 0 30px;
    padding: 0;
    color: #000000;
    text-align: center;
}

.card .content .user-box{
    position: relative;
}

.card .content .user-box input{
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
    color: black;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #000000;
    outline: none;
    background: transparent;
}

.card .user-box label{
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    font-size: 16px;
    color: #000000;
    pointer-events: none;
    transition: .5s;
}

.card .content .user-box input:focus ~ label,
.card .content .user-box input:valid ~ label{
    top: -20px;
    left: 0;
    color: #03e9f4;
    font-size: 12px;
}

.card  form  .btn{
    position: relative;
    display: inline-block;
    padding: 10px 20px;
    color: #03e9f4;
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow:hidden;
    transition: .5d;
    margin-top: 40px;
    letter-spacing: 4px;
    background: linear-gradient(to bottom, );
}

.card .btn:hover{
    background: #03e9f4;
    color:#fff;
    border-radius: 5px;
    box-shadow: 0 0 5x #03e9f4,
            0 0 25px #03e9f4,
            0 0 50px #03e9f4,
            0 0 100px #03e9f4;
}

.card .btn span{
    position: absolute;
    display: block;
}

.card .btn span:Nth-child(1)
{
top: 0;
left: -100%;
width: 100%;
height: 2px;
animation-duration: btn-anima1 1s linear infinite;
}

@keyframes btn-anim1{
    0%{left: -100%;}
    50%,100%{left: 100%;}
}

.card .btn span:nth-child(2){
    top: -100%;
    right: 0;
    width: 2px;
    height: 100%;
    animation:btn-anim2 1s linear infinite;
    animation: delay 25s;;
}

@keyframes btn-anim2{
    0%{
        top:-100%;
    }
    50%,100%{
        top: 100%;
    }
}

.card .btn span:nth-child(3){
    bottom: 0;
    right: -100%;
    width: 100%;
    height: 2px;
    animation: btn-anim3 1s linear infinite;
    animation: btn-anim3 is linear infinite;
    animation-delay:.5s;
}

@keyframes btn-anim3{
    0%{
        right:-100%;
    }
    50%,100%{
        right:100%;
    }
}

.card .btn span:nth-child(4){
    bottom: -100%;
    left: 0;
    width: 2px;
    height:100px;
    animation: btn-anim4 1s linear infinite;
}

@keyframes btn-anim4{
    0%{
        bottom:-100%;
    }
    50%,100%
    {
        bottom: 100px;
    }
}

.alert{
    margin-top: 5%;
    margin-bottom: 0;
}
</style>
</head>
<body  style="background: linear-gradient(to bottom, #99c2ff 70%, #99c2ff 70%,#0052cc 100% );" >
<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="img/logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">  Simple Voting System
            </a>
        </div>
        <a class="bn31" href="Admin-panel.php" style="width: 11rem;"  ><span class="bn31span"><b>Back</b></span></a>
    </nav>
</header>
<main>
    <div class="container" >
        <div class="row mt-5" style="margin-top: 0;"  >
            <div class="col sm-12">
                <div class="card">
                    <div class=" card-header" style="background:#3a423c; height: 70px; margin: bottom 50px;" >
                        <h1 class="display-8 text-center" style="color:#fff;" >Signup</h1>
                    </div>
                    <div class="content">
                        <form action="Addadmin.php" method="post">
                            <div class="user-box">
                                <input type="text" name="Username" required>
                                <label>Enter Your User Name</label>
                            </div>
                            <div class="user-box">
                                <input type="email" name="email" required>
                                <label>Enter Your E-mail</label>
                            </div>
                            <div class="user-box">
                                <input type="password" name="Password" required>
                                <label>Create Your Password</label>
                            </div>
                            <div class="user-box">
                                <input type="password" name="cPassword" required>
                                <label>Confirn Your Password</label>
                            </div>
                            <button type="submit" class="btn"> Signup</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-----------------------------------------------------------------footer---------------------------------------------------------------->
</body>
</html>