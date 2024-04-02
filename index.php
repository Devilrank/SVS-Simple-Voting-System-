<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-Voting System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="forget-pass.css">
    <link rel="stylesheet" href="login-page.css">
    <link rel="stylesheet" href="nav.css">
    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
          <a href="#" onclick="set();">Admin-login</a>
          <a href="candidate.php">Nomination</a>
        </div>
    </nav>
  </header>
<!-----------------------------------------------------------login-page------------------------------------------------------------------>
<div id="id01" class="modal">
  <form class="modal-content animate" action="Admin/Admin-login.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none',document.getElementById('nav-links').style.display='block'" class="close" title="Close Modal">&times;</span>
      <img src="img/logo.png" alt="Avatar" class="avatar">
    </div>
    <h1 class="head">Login Form</h1>
    <div class="container">
      <label for="Username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="Username" required>

      <label for="Password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="Password" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a onclick="document.getElementById('id01').style.display='none',document.getElementById('id02').style.display='block'" style="width:auto;" href="#">password?</a></span>
    </div>
  </form>
</div>
<!-----------------------------------------------------------Forget-pass---------------------------------------------------------------->
<div id="id02" class="modal1">
  
  <form class="modal1-content animate1" action="Admin/forget-pass-code.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none',document.getElementById('nav-links').style.display='block'" class="close1" title="Close Modal">&times;</span>
    </div>

    <h1 class="head">Forget Password</h1>

    <div class="container1">
      <label for="funame"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="funame" required>

      <label for="femail"><b>E-mail</b></label>
      <input type="email" placeholder="Enter Your Registerd E-mail" name="femail" required>
        
      <button type="submit" name="pass_reset_link" >Send-Link</button>
    </div>

    <div class="container1" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<?php
    if(isset($_SESSION['status']))
    {
        print_r($_SESSION['status']);
        session_unset();
    }
?>
<!-----------------------------------------------------------section-1st---------------------------------------------------------------->
    <main>
      <div class="container-fluid" style="margin-bottom: 4em; background-color: rgb(130, 197, 228); padding-bottom: 4.3em;">
        <div class="row">
          <div class="col-sm-12">
            <div class="jumbotron text-center text-block" style="padding-top:100px; " >
              <img src="img/vote1.jpeg" width="27%" alt="Icon" class=" rounded-circle img2" style="box-shadow:  5px 10px 20px rgba(0,0,0,6);">
                  <h1 class="specialHead" style="padding-top: 20px;">Simple Voting System</h1>
                  <p class="normalFont">Safe . Reliable . Secure . Fast </p>
                  <a href="votingpage.php" class="btn btn-danger btn-lg specialHead" style="border-radius:60px; box-shadow: 5px 15px 25px rgba(0,0,0,6);" >
                    <span class="glyphicon glyphicon-folder-close"><span> Cast Your Votes Now
                  </a>
            </div>
          </div>
        </div>
      </div>
<!-------------------------------------------------------------section-2nd-------------------------------------------------------------->
      <div class="featurs">
        <div class="conatiner" id="featuresTab" style="justify-content: center; display: flex;">
          <div class="row card" style="justify-content: space-around; width: 40rem;">
            <div class="col-sm-12 text-center">
              <div class="page-header" style="padding-top:50px; padding-bottom:50px">
                <h1 class="normalFont" style="font-size:44px;" >WHAT IS IT.</h1>
                <p class="subFont" style="font-size:24px;">A Intractive Way To Solve Conventional Voting</p>
              </div>
            </div>
          </div>
        </div>

        <div class="conatiner cards" style="padding:20px;" id="aboutTab">
          <div class="row cards" >

            <div class="col-sm-4 text-center card">
              <div class="" style="padding:10px;">
                <img src="img/Nominee.png" width="100" height="100" alt=""/>
                <h2 class="normalFont" style="font-size:28px;">VOTE ONLINE.</h2>
                <p>You Just Need Basic Details of Yours and We Will Let You Vote</p>
              </div>
            </div>

            <div class=" col-sm-4 text-center card">
              <div class="" style="padding:10px;">
                <img src="img/Vote.png" width="100" height="100" alt=""/>
                <h2 class="normalFont" style="font-size:28px;" >NOMINATION</h2>
                <p>Admin's Control Panel allows you to manage the list of  filled nomination</p>
              </div>
            </div>

            <div class="col-sm-4 text-center card">
              <div class="" style="padding:10px; ">
                <img src="img/Stats.png" width="100" height="100" alt=""/>
                <h2 class="normalFont" style="font-size:28px;" >Statitics</h2>
                <p>SHows You the Graphical Data Representation of your votes. And, It is in Admin's Control Panel</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </main>
<!------------------------------------------------------------ Footer-------------------------------------------------------------------->
    <footer class="foot" style="background-color: #666; padding: 10px;">
      <div class=" col-sm-4 text-center card" style=" width:15rem; height: 5rem;">
        <div style="padding:5px;">
          <p><b>ALL RIGHT RESERVED <BR> DEVELOPED BY DEVILRANK (SANSKAR GUPTA) <BR></b></p>
        </div>
      </div>
    </footer>

    <script>
      // Get the modal
      var modal1 = document.getElementById('id01');

      window.onclick = function(event) {
          if (event.target == modal1) {
              modal1.style.display = "none";
          }
      }

      var modal2 = document.getElementById('id02');

      window.onclick = function(event) {
          if (event.target == modal2) {
            modal2.style.display = "none";
          }
      }

      var modal3 = document.getElementById('id03');

      window.onclick = function(event) {
          if (event.target == modal3) {
              modal3.style.display = "none";
          }
      }

      function set() {
    <?php
    // Check if userprofile is not true
    if (!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])) {
    ?>
      var temp = document.getElementById('id01');
      var temp1 = document.getElementById('nav-links');
      temp.style.display = 'block';
      temp1.style.display = 'none';
    <?php
    } else {
      ?>
      window.location.href = 'Admin/Admin-panel.php';
      <?php
    }
    ?>
  }
      </script>
</body>
</html>
