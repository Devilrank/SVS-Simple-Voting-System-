<?php
    session_start();
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
                        <a href="../index.php"><button type="button" class="btn-close" data-bs-dismiss="alert"></button></a>
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
        <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert"></button></a>
        <strong>Warning!</strong> Password Do not Match
    </div>';
    }
}
else
{
    echo'<div class="alert alert-danger alert-dismissible fade show">
    <a href="#"><button type="button" class="btn-close" data-bs-dismiss="alert"></button></a>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Admin-st/nav.css">
    <title>Update Password</title>
    <style>
        .alert{
        float: left;
        margin-top: 5%;
        margin-bottom: 0;
        position: relative;
        }

        .head{
        text-align: center;
        }

                body {font-family: Arial, Helvetica, sans-serif;}

        /* Full-width input fields */
        input[type=text], input[type=password] ,input[type=email]{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        }

        button:hover {
        opacity: 0.8;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
        }

        .head{
        text-align: center;
        }

        .container2 {
        padding: 16px;
        }

        span.psw {
        float: right;
        padding-top: 16px;
        }

        /* The modal2 (background) */
        .modal2 {
        display: block;
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgb(130, 197, 228); /* Black w/ opacity */
        padding-top: 50px;
        }

        /* modal2 Content/Box */
        .modal2-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button (x) */
        .close2 {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
        }

        .close2:hover,
        .close2:focus {
        color: red;
        cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate2 {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
        from {-webkit-transform: scale(0)} 
        to {-webkit-transform: scale(1)}
        }
        
        @keyframes animatezoom {
        from {transform: scale(0)}
        to {transform: scale(1)}
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
        }

    </style>
</head>
<body >
    <header>
    <nav class=" nav navbar navbar-expand-sm bg-dark navbar-dark fixed-top ">
      <input type="checkbox" id="nav-check">
        <div class="container-fluid" style="padding: 0;" >
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">  Simple Voting System
            </a>
        </div>
        <div class="nav-btn" >
        <label for="nav-check">
          <span></span>
          <span></span>
          <span></span>
        </label>
      </div>
        <div class="nav-links">
          <a href="../index.php">Home</a>
        </div>
    </nav>
    </header>
<!------------------------------------------------------------pass-update-page------------------------------------------------------>
<div id="id03" class="modal2">
  
  <form class="modal2-content animate2" action="pass-update.php" method="post">
  <div class="imgcontainer">
      <span class="close1" title="Close Modal"></span>
    </div>
    <h1 class="head">Reset Password</h1>

    <div class="container2">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>E-mail</b></label>
      <input type="email" placeholder="Enter Your E-mail" name="email" required>
      
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter New-Password" name="Password" required>
      
      <label for="psw"><b>Confirm-Password</b></label>
      <input type="password" placeholder="Confirm New-Password" name="Confirm-Password" required>
        
      <button type="submit" id="pass-update-link" >Save</button>
      
    <?php
    if(isset($_SESSION['status']))
    {
        print_r($_SESSION['status']);
        session_unset();
    }
    ?>
  </form>
</div>
</body>
</html> 