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
        header("location: ../index.php");
        exit();
    }
}
?>