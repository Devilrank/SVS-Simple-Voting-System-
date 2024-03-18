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
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Admin-st/candidate.css">
    <link rel="stylesheet" href="Admin-st/button.css">
    <title>Nomination's</title>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top ">
            <div class="container-fluid" style="padding: 0;" >
                <a class="navbar-brand" href="#">
                    <img src="img/logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">  Simple Voting System
                </a>
            </div>
        <a class="bn31" href="Admin-panel.php" style="width: 11rem;"  ><span class="bn31span"><b>Back</b></span></a>
        </nav>
</header>
    <div class="container" style="margin-top: 80px;" >
        <div class="row mt-5" >
            <div class="col">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h2 class="display-8 text-center">Candidates Name</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="features ">
        <div class="container cards">
            <di class="row cards" style="justify-content: space-around;" >
<!------------------------------------------------------------Modiji--------------------------------------------------------------------->
            <div class="container1">
                <article class="card1">
                    <div class="background container">
                        <img src="img/Modiji.png" alt="Profile">
                    </div>
                    <div class="content" style="background: linear-gradient(to bottom, #00A650, #00A650 10%, #F47216 90%, #F47216 90%);">
                        <h2>Narendra Modi</h2>
                        <p>
                            Prime Minister of India
                        </p>
                        <p>Personal Detail</p>
                        <ul>
                            <li class="chip" >Date of Birth: September 17, 1950</li>
                            <li class="chip" >place of Birth: Vadnagar,Gujrat </li>
                            <li class="chip" > Party: Bhartiye Janta Party (BJP)</li>
                            <li class="chip" >Relegion: Hindu </li>
                        </ul>
                    </div>
                </article>
            </div>
<!--------------------------------------------------------------Rahul Gandhi------------------------------------------------------------->
            <div class="container1">
                <article class="card1">
                    <div class="background" style="object-fit: contain; height: 390px;">
                        <img src="img/Rahulgandhi.jpg" alt="Profile">
                    </div>
                    <div class="content" style="background: linear-gradient(#EE5A1C, #FFFFFF, #166A2F );" >
                        <h2>Rahul Gandhi</h2>
                        <p>Personal Detail</p>
                        <ul>
                            <li class="chip" >Date of Birth: June 19, 1970</li>
                            <li class="chip" >place of Birth: New Delhi </li>
                            <li class="chip" > Party: Indian National Congress (INC)</li>
                            <li class="chip" >Relegion: Hindu </li>
                        </ul>
                    </div>
                </article>
            </div>
<!---------------------------------------------------Arvind kejriwal--------------------------------------------------------------------->
            <div class="container1">
                <article class="card1" >
                    <div class="background" style="object-fit: contain; height: 360px;"  >
                        <img src="img/Arvind_Kejriwal.jpg" alt="Profile">
                    </div>
                    <div class="content" style="background: linear-gradient(to right, #FFFFFF, #FFFFFF 20%, #009ADA 100%);">
                        <h2>Arvind Kejriwal</h2>
                        <p>
                            Chief Minister of Delhi
                        </p>
                        <p>Personal Detail</p>
                        <ul>
                            <li class="chip" >Date of Birth: August 16, 1968</li>
                            <li class="chip" >place of Birth: Siwani in the Bhiwani district of Haryana </li>
                            <li class="chip" > Party: Aam Admi Party (AAP)</li>
                            <li class="chip" >Relegion: Hindu </li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
<!------------------------------------------------------------Mayawati------------------------------------------------------------------->
        <div class="container cards">
            <div class="row cards" style="justify-content: space-around;" >
                <div class="container1">
                    <article class="card1">
                        <div class="background" style="object-fit: contain; height: 350px;">
                            <img src="img/mayawati.jpg" alt="Profile">
                        </div>
                        <div class="content" style="background: linear-gradient(to bottom, #FFFFFF, #FFFFFF 30%, #22409A 60%, #FFFFFF 100%);">
                            <h2>Mayawati</h2>
                            <p>Personal Detail</p>
                            <ul>
                                <li class="chip" >Date of Birth: January 15, 1956</li>
                                <li class="chip" >place of Birth: New Delhi </li>
                                <li class="chip" > Party: BahujanSamaj Party (BSP)</li>
                                <li class="chip" >Relegion: Hindu </li>
                            </ul>
                        </div>
                    </article>
                </div>
<!------------------------------------------------------------Akhilesh Yadav------------------------------------------------------------->
                <div class="container1">
                    <article class="card1">
                        <div class="background" style="object-fit: contain; height: 330px;">
                            <img src="img/akhilesh.jpg" alt="Profile">
                        </div>
                        <div class="content" style="background: linear-gradient(to bottom, #FE0000, #FE0000 50%, #018B00 100%);">
                            <h2>Akhilesh Yadav</h2>

                            <p>Personal Detail</p>
                            <ul>
                                <li class="chip" >Date of Birth: july 1, 1973</li>
                                <li class="chip" >place of Birth: Saifai, Etawah District, Uttar Pradesh</li>
                                <li class="chip" > Party: Samajwadi Party (SP)</li>
                                <li class="chip" >Relegion: Hindu </li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</body>
</html>