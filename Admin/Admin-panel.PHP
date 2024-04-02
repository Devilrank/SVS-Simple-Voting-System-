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
    <title>Admin Panel</title>
    <style>

      body{
        overflow-y: visible;
        background: linear-gradient(to bottom, #99c2ff 70%, #99c2ff 70%,#0052cc 100% );
      }

      .card{
      background: linear-gradient(to right, #f2f2f2 25%, #cceeff 100%);
      border-radius: 1.5rem;
      box-shadow: 0px 10px 15px rgb(0,0,0,0.1);
      display: flex;
      width: 22rem;
      height: 18rem;
      flex-direction: column;
      overflow: hidden;
      cursor: pointer;
      transition: all 0.2s ease-in-out;
      }

      .card:hover {
      box-shadow:  5px 15px 25px rgba(0,0,0,6);
      }

      .cards{
        display: flex;
        flex-wrap: wrap;
        gap: 2.5rem;
        justify-content:space-around;
        margin-top:1rem;
      }
    </style>

</head>
<body>
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
        <div class="nav-links" id="nav-links" >
          <a href="logout.php"><b>Logout</b></a>
        <a href="Addadmin.php"><b>Add Admin</b></a>
        </div>
    </nav>
    <!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top ">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="img/logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">    Simple Voting System
        </a>
      </div>
      <a class="bn31" href="Addadmin.php" style="width: 13rem;"><span class="bn31span"><b>Add Admin</b></span></a>
      <a class="bn31" href="logout.php" style="width: 11rem;"><span class="bn31span"><i class="gg-log-off"></i><b>Logout</b></span></a>
    </nav> -->
  </header>
  <main>
  <div class="featurs" style="margin: 12% 0;">
    <div class="conatiner cards" style="padding:20px;" id="aboutTab">
      <div class="row cards" >

        <div class="col-sm-4 text-center card">
          <div class="img" style="padding:10px; margin-top: 30px;">
            <A href="displaylist.php" style="text-decoration: none; color: black;" ><img src="img/Vote.png" width="130" height="130" alt=""/>
            <h2 class="normalFont" style="font-size:28px; margin-top: 40px; font-weight: 700;">VOTER'S LIST</h2>
            </A>
        </div>

        </div>
        <div class="col-sm-4 text-center card">
          <div class="img" style="padding:10px; margin-top: 30px;">
            <A href="poll.php" style="text-decoration: none; color: black;" ><img src="img/Stats.png" width="130" height="130" alt=""/>
            <h2 class="normalFont" style="font-size:28px; margin-top: 40px; font-weight: 700; ">RESULT POLS</h2>
            </A>
        </div>
        </div>
      </div>
    </div>
  </div>
  </main>
  
</body>
</html>