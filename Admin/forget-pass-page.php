<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Forget Password</title>
    <style>

        html{
        height: 100%;
        }

        body{
        font-family: sans-serif;
        background: linear-gradient(#57606f, #2f3542);
        }

        .popup{
            display:flex;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 420px;
            background-color: #ebdfdf;
            border-radius: 13px;
            box-sizing: border-box;
            margin-top: 1%;
            box-shadow: 0 15px 25px rgba(0,0,0,6);
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0,0,0,6);
            padding: 40px 50px;
            border-radius: 13px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 15px 25px;
            height: 100%;
            width: 100%;
        }

        .login-box .user-box{
            position: relative;
        }

        .login-box .user-box input{
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
        }

        .login-box .user-box label{
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }

        .login-box .user-box input:focus ~ label,
        .login-box .user-box input:valid ~ label{
            top: -20px;
            left: 0;
            color: #03e9f4;
            font-size: 12px;
        }

        .login-box  form  .btn{
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #03e9f4;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow:hidden;
            transition: .5d;
            margin-top: 40px;
            letter-spacing: 4px;
            box-shadow: 4px 4px 8px #022ca1;
        }

        .login-box .btn:hover{
            background: #03e9f4;
            color:#fff;
            border-radius: 5px;
            box-shadow: 0 0 5x #03e9f4,
                    0 0 25px #03e9f4,
                    0 0 50px #03e9f4,
                    0 0 100px #03e9f4;
        }

        .login-box .btn span{
            position: absolute;
            display: block;
        }

        .login-box .btn span:Nth-child(1)
        {
        top: 0;
        left: -100%;
        width: 100%;
        height: 2px;
        animation-duration: btn-anima1 1s linear infinite;
        }

        @keyframes btn-anim1{
            0%{left: -100%;}
            50%,100%{left: 100%;}
        }

        .login-box .btn span:nth-child(2){
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            animation:btn-anim2 1s linear infinite;
            animation: delay 25s;;
        }

        @keyframes btn-anim2{
            0%{
                top:-100%;
            }
            50%,100%{
                top: 100%;
            }
        }

        .login-box .btn span:nth-child(3){
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            animation: btn-anim3 1s linear infinite;
            animation: btn-anim3 is linear infinite;
            animation-delay:.5s;
        }

        @keyframes btn-anim3{
            0%{
                right:-100%;
            }
            50%,100%{
                right:100%;
            }
        }

        .login-box .btn span:nth-child(4){
            bottom: -100%;
            left: 0;
            width: 2px;
            height:100px;
            animation: btn-anim4 1s linear infinite;
        }

        @keyframes btn-anim4{
            0%{
                bottom:-100%;
            }
            50%,100%
            {
                bottom: 100px;
            }
        }

        .login-box h2{
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            text-align: center;
        }

        p{
            color: white;
            padding: 0 5px 10px;
        }

        .close{
        position: absolute;
        top: -10px;
        right: 10px;
        cursor: pointer;
        font-size: 50px;
        color: black;
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
        </nav>
</header>
    <?php
        if(isset($_SESSION['status']))
        {
            print_r($_SESSION['status']);
            session_unset();
        }
    ?>
<div class="popup login-box">
    <a href="Admin-login.php"><span class="close">&times;</span></a>
    <div class="popup-content">
        <h2><b>Forgot Password</b></h2>
        <p>Enter your email address to reset your password:</p>
        <form action="forget-pass-code.php" method="post">
            <div class="user-box">
                <input type="email" id="email" name="email" required autocomplete="off" >
                <label for="email">E-mail</label>
            </div>
            <input type="submit" value="Reset Password" name="pass_reset_link" class="btn">
        </form>
    </div>
</div>
</body>
</html>
