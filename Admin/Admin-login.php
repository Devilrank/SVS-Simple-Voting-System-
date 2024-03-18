<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    
    require"config.php";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error)
    {
        die("connection failed: ".$conn->connect_error);

    }

    $query = "SELECT *FROM admin WHERE Username='$username' AND Password='$password'";

    $result = $conn->query($query);

    if($result->num_rows == 1){

        $_SESSION['user_name'] = "$username";
        header("location: Admin-panel.php");
    }

    else{
        $_SESSION['status'] = '<div class="alert alert-danger alert-dismissible fade show">
        <a href=""><button type="button" class="btn-close" data-bs-dismiss="alert"></button></a>
        <strong>Ohh Sorry!</strong>Wrong password Check and Re-Enter Your Password
        </div>';
        header("location: Admin-login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_login</title>
    <link rel="stylesheet" href="Admin-st/Admin-login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Admin-st/button.css">
<style>

.a{
    margin-left:70px;
}

.remember-forgot label{
    margin-left: 5px;
}

.alert{
    margin-top: 5%;
    margin-bottom: 0;
    float: left;
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
            <a class="bn31" href="../index.html" style="width: 10rem;"><span class="bn31span"><b>Home</b></span></a>
        </nav>
    </header>

    <?php
        if(isset($_SESSION['status']))
        {
            print_r($_SESSION['status']);
            session_unset();
        }
    ?>

    <div class="login-box" id="login-box" >
        <h2>Admin Login</h2>
        <form action="Admin-login.php" method="post">
            <div class="user-box">
                <input type="text" name="Username" required id="Username" autocomplete="given-name" >
                <label for="Username" >User Name</label>
            </div>
            <div class="user-box">
                <input type="password" name="Password" required id="Password" autocomplete="off" >
                <label for="Password" >password</label>
            </div>

            <div class="remember-forgot" style="justify-content: flex-start;" >
                <input type="checkbox" name="remember" id="remember" ><label for="remember" >Remember me</label>
                <a href="forget-pass-page.php" class="a" id="forget-pass-page"> Forgot Password?</a>
            </div>
            <button type="submit" class="btn"> Login</button>
        </form>
    </div>
</body>
</html>
