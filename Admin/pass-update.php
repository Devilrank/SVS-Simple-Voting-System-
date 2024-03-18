<?php
$user = 0;
$success = 0;
$invalid = 0;

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    require"config.php";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error)
    {
        die("connection failed: ".$conn->connect_error);

    }
    $email = $_POST['email'];
    $password = $_POST['Password'];
    $cpassword = $_POST['Confirm-Password'];
    
    $query = "SELECT *FROM `admin` WHERE email ='$email'";
    $result = $conn->query($query);
    if($result->num_rows == 1)
    {
        $user = 1;
    }
    else
    {
        $success = 1;
    }
if($user === 1)
{
    if($password === $cpassword )
    {
        $update_pass = "UPDATE `admin` SET `Password` = '$password' WHERE `admin`.`email` = '$email' LIMIT 1 ";
        $update_pass_run = mysqli_query($conn, $update_pass);

        if($update_pass_run)
        {
            echo ' <div class="alert alert-success alert-dismissible fade show">
                        <a href="Admin-login.php"><button type="button" class="btn-close" data-bs-dismiss="alert"></button></a>
                        <strong>Congratulations!</strong>Password Updated Successfully!
                    </div>';
        }
        else
        {
            echo "Error: $sql<br> " . mysqli_error($con);
        }
    }
    else{
        echo' <div class="alert alert-warning alert-dismissible fade show">
        <a href="pass-update.php"><button type="button" class="btn-close" data-bs-dismiss="alert"></button></a>
        <strong>Warning!</strong> Password Do not Match
    </div>';
    }
}
else
{
    echo'<div class="alert alert-danger alert-dismissible fade show">
    <a href="Addadmin.php"><button type="button" class="btn-close" data-bs-dismiss="alert"></button></a>
    <strong>Ohh Sorry!</strong>E-mail not exist
    </div>';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin-st/Admin-login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Admin-st/button.css">
    <title>Update Password</title>

    <style>
        .alert{
        margin-top: 5%;
        margin-bottom: 0;
        }
    </style>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top ">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">  Simple Voting System
            </a>
            </div>
        </nav>
    </header>

    <div class="login-box" id="login-box" style="margin-top: 2%;" >
        <h2>Update Password</h2>
        <form action="pass-update.php" method="post">
            <div class="user-box">
                <input type="email" name="email" required id="E-mail" autocomplete="given-name" >
                <label for="E-mail" >E-mail</label>
            </div>
            <div class="user-box">
                <input type="password" name="Password" required id="Password" autocomplete="off" >
                <label for="Password" >Enter New-password</label>
            </div>
            <div class="user-box">
                <input type="password" name="Confirm-Password" required id="Confirm-Password" autocomplete="off" >
                <label for="Confirm-Password" >Confirm New-password</label>
            </div>
            <button type="submit" class="btn" id="pass-update-link" > Change Password</button>
        </form>
    </div>
</body>
</html>