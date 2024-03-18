<?php

session_start();

require"config.php";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$userprofile = $_SESSION['user_name'];
if($userprofile == true)
{

}
else
{
    header("location: Admin-login.php");
}

$query = "select * from voters";
$result = mysqli_Query($conn,$query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Admin-st/button.css">
    <title>Voter's List</title>
    <style>

        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .container{
            margin: 8% auto 8%;
        }

        html{
            height: 100%;
        }
    </style>
</head>
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
<body style="background: linear-gradient(to bottom, #99c2ff 70%, #99c2ff 70%,#0052cc 100% );">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h2 class="display-8 text-center"> Voter's list</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center" >
                            <tr class="bg-dark text-white" >
                                <td>Serial Number</td>
                                <td>Voter's Name</td>
                                <td>Voter's E-mail</td>
                                <td>Voter Id Number</td>
                                <td>Selected Candidate</td>
                            </tr>
                            <tr>
                            <?php

                                while ($row = mysqli_fetch_array($result))
                                {
                            ?>
                                <td><?php echo $row['SN'] ?></td>
                                <td><?php echo $row['Vname'] ?></td>
                                <td><?php echo $row['Vemail'] ?></td>
                                <td><?php echo $row['Vidnumber'] ?></td>
                                <td><?php echo $row['Vselection'] ?></td>
                            </tr>
                            <?php
                            }
                            
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>