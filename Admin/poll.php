<?php
session_start();

$userprofile = $_SESSION['user_name'];
if($userprofile == true)
{
}
else
{
    header("location: ../index.php");
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
    <title>Result Poll</title>

    <style>

        html{
            height:100%;
        }

        .headerFont{
        font-family: 'Ubuntu', sans-serif;
        font-size: 24px;
        }

        .subFont{
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        
        }
        
        .specialHead{
        font-family: 'Oswald', sans-serif;
        }

        .normalFont{
        font-family: 'Roboto Condensed', sans-serif;
        }

        .container1{
        /* top: 50%;
        left: 50%;
        transform: translate(-50%,-50%); */
        width: fit-content;
        padding: 0;
        margin: 30px 30px 30px 30px;
        justify-content:left;
        }

        .card1{
        display: flex;
        flex-wrap: wrap;
        border-radius: 24px;
        background-color: white;
        cursor: pointer;
        max-width: clamp(820px, 50vw, 840px);
        min-width: 720px;
        min-height: 280px;
        box-shadow:  5px 15px 25px rgba(0,0,0,6);
        margin: 20px;
        }

    </style>
</head>
<body style="overflow-y: hidden; background:linear-gradient(to bottom, #99c3ff 70%, #99c2ff 70%,#0052cc 100% );">
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
        <a href="Admin-panel.PHP">Back</a>
        </div>
        </nav>
</header>

<div class="container1 container-fluid" style="padding:100px; margin-left:12%;">
    <div class="row card1" style="padding-right:42px; background: #094564;"  >
    <div class="col-sm-12 card1" >
        
        <div class="page-header text-center">
        <h2 class="specialHead" style="padding: 7px 0 0 10px;" >Results Polls</h2>
        <p class="normalFont" style="padding-left: 20px;" ><b>Displaying all voting results</b></p>
        </div>
            
            <div class="col-sm-12">
            <?php
                require 'config.php';

                $NM=0;
                $RG=0;
                $AK=0;
                $MW=0;
                $AY=0;

                $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
                if(!$conn)
                {
                echo "Error While Connecting.";
                }
                else
                {

                //Narendra Modi
                $sql ="SELECT * FROM voters WHERE Vselection='Narendra Modi'";
                $result= mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0)
                {
                    while($row= mysqli_fetch_assoc($result))
                    {
                    if($row['Vselection'])
                        $NM++;
                    }

                    $NM_value=$NM*10;

                    echo "<strong>Narendra Modi</strong><br>";
                    echo "
                    <div class='progress'>
                    <div class='progress-bar progress-bar-striped  bg-success progress-bar-animated' role='progressbar' aria-valuenow=\"$NM_value\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: ".$NM_value."%'>
                        <span class='sr-only'>$NM</span>
                    </div>
                    </div>
                    ";
                }

                // Rahul Gandhi
                $sql ="SELECT * FROM voters WHERE Vselection='Rahul Gandhi'";
                $result= mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0)
                {
                    while($row= mysqli_fetch_assoc($result))
                    {
                    if($row['Vselection'])
                        $RG++;
                    }


                    $RG_value= $RG*10;

                    echo "<strong>Rahul Gandhi</strong><br>";
                    echo "
                    <div class='progress'>
                    <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: ".$RG_value."%'>
                        <span class='sr-only'>$RG</span>
                    </div>
                    </div>
                    ";
                }

                // Arvind kejriwal
                $sql ="SELECT * FROM voters WHERE Vselection='Arvind kejriwal'";
                $result= mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0)
                {
                    while($row= mysqli_fetch_assoc($result))
                    {
                    if($row['Vselection'])
                        $AK++;
                    }


                    $AK_value= $AK*10;

                    echo "<strong>Arvind Kejriwal</strong><br>";
                    echo "
                    <div class='progress'>
                    <div class='progress-bar progress-bar-striped bg-warning progress-bar-animated'' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: ".$AK_value."%'>
                        <span class='sr-only'>$AK</span>
                    </div>
                    </div>
                    ";
                }

                // Mayawati
                $sql ="SELECT * FROM voters WHERE Vselection='Mayawati'";
                $result= mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0)
                {
                    while($row= mysqli_fetch_assoc($result))
                    {
                    if($row['Vselection'])
                        $MW++;
                    }


                    $MW_value= $MW*10;

                    echo "<strong>Mayawati</strong><br>";
                    echo "
                    <div class='progress'>
                    <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: ".$MW_value."%'>
                        <span class='sr-only'>$MW</span>
                    </div>
                    </div>
                    ";
                }

                // Akhilesh Yadav
                $sql ="SELECT * FROM voters WHERE Vselection='Akhilesh Yadav'";
                $result= mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0)
                {
                    while($row= mysqli_fetch_assoc($result))
                    {
                    if($row['Vselection'])
                        $AY++;
                    }


                    $AY_value= $AY*10;

                    echo "<strong>Akhilesh yadav</strong><br>";
                    echo "
                    <div class='progress'>
                    <div class='progress-bar progress-bar-striped  bg-danger progress-bar-animated' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: ".$AY_value."%'>
                        <span class='sr-only'>$AY</span>
                    </div>
                    </div>
                    ";
                }

                echo "<hr>";

                $total=0;

                // Total
                $sql ="SELECT * FROM voters";
                $result= mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0)
                {
                    while($row= mysqli_fetch_assoc($result))
                    {
                    if($row['Vselection'])
                        $total++;
                    }


                    $tptal= $total*10;

                    
                    echo "
                    <div class='text-primary text-center'>
                    <h3 class='normalFont'>TOTAL VOTES : $total </h3>
                    </div>
                    ";
                }

                }
            ?>
            </div>

        </div>
        </div>
    </div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>