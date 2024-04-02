<?php

$user = 0;
$success = 0;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    require"Admin/config.php";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error)
    {
        die("connection failed: ".$conn->connect_error);

    }
    $votername = $_POST["votername"];
    $voteremail = $_POST["voteremail"];
    $voteridnumber = $_POST["voteridnumber"];
    $leadername = $_POST["Nomanie"];
    
    $query = "SELECT *FROM voters WHERE Vidnumber ='$voteridnumber'";
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
        $sql = "INSERT INTO `voters` (`Vname`, `Vemail`, `Vidnumber`, `Vselection`) VALUES ('$votername', '$voteremail', '$voteridnumber', '$leadername');";
        if(mysqli_query($conn, $sql))
        {
            $_SESSION['user_name'] = "$username";
            echo ' <div class="alert alert-success alert-dismissible fade show">
                        <a href="index.html"><button type="button" class="btn-close" data-bs-dismiss="alert"></button></a>
                        <strong>Thankyou!</strong>Successfully Vote Submitted
                    </div>';
        }
        else
        {
            echo "Error: $sql<br> " . mysqli_error($con);
        }
        }
        else
        {
        $_SESSION['user_name'] = "$username";
        echo'<div class="alert alert-danger alert-dismissible fade show">
        <a href="votingpage.php"><button type="button" class="btn-close" data-bs-dismiss="alert"></button></a>
        <strong>Ohh Sorry!</strong>Check and Re-Enter Your Voter Id
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
    <link rel="stylesheet" href="Admin/Admin-st/button.css">
    <link rel="stylesheet" href="vault.css">
    <link rel="stylesheet" href="nav.css">
    <title>Voting Page</title>

    <style>
    
    html{
    height: 100%;

    }

    body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    height: 120%;
    }

    .alert{
    margin-top: 1.8%;
    margin-bottom: 0;
    float: left;
    }

    .vote-box{
    position: relative;
    top: 50%;
    left: 50%;
    width: 500px;
    padding: 40px;
    transform: translate(-50%, -50%);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0,0,0,6);
    border-radius: 10px;
    }

    </style>
</head>
<body style="background: linear-gradient(to bottom, #99c2ff 70%, #99c2ff 70%,#0052cc 100% );">
    <header>
    <nav class="nav navbar navbar-expand-sm bg-dark navbar-dark fixed-top ">
            <input type="checkbox" id="nav-check">
            <div class="container-fluid" style="padding: 0;" >
                <a class="navbar-brand" href="#">
                    <img src="img/logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">  Simple Voting System
                </a>
            </div>
            <div class="nav-btn">
                <label for="nav-check">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>
        <div class="nav-links" >
        <a href="index.php">Back</a>
        </div>
        </nav>
    </header>
        <div class="featurs">
            <div class="container" style="margin-top: 100px;" >
                <div class="row">
                    <div class="col-sm-12">
                        <div class="vote-box" style="background-color: #fff;">
                            <h2 class="specialhead text-center" style="padding: 10px 0 10px;">Chose Your Candidate</h2>
                            <form action="votingpage.php" class="Form" method="post">
                                <div class="user-box">
                                    <input type="text" name="votername" id="votername"  required>
                                    <label for="votername" >Voter's Full Name</label>
                                </div>
                                <div class="user-box">
                                    <input type="email" name="voteremail" id="voteremail" required>
                                    <label for="voteremail" >Voter's E-mail</label>
                                </div>
                                <div class="user-box">
                                    <input type="number" name="voteridnumber" id="voteridnumber" required>
                                    <label for="voteridnumber" >Voter Id Number </label>
                                </div>
                                <div class="container" style="padding: 10px;">
                                    <h3 class="specialhead text-center" style="padding: 10px 0 10px;">Chose Any of Them</h3>
                                    <div class="row text-center">
                                    <label ><input type="radio" name="Nomanie" value="Narendra Modi" required> Narendra Modi</label><br>
                                    <label ><input type="radio" name="Nomanie" value="Rahul Gandhi" required> Rahul Gandhi</label><br>
                                    <label ><input type="radio" name="Nomanie" value="Arvind Kejriwal" required> Arving Kejriwal</label><br>
                                    <label ><input type="radio" name="Nomanie" value="Mayawati" required> Mayawati</label><br>
                                    <label ><input type="radio" name="Nomanie" value="Akhilesh Yadav" required> Akhilesh Yadav</label><br>
                                    </div>
                                </div>
                                <button type="submit" class="btn" style=" box-shadow:0 5px 10px grey; border: 1px solid black; color: black;"> Submit Vote</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>