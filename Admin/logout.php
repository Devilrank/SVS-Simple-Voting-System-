<?php
session_start();

session_unset();
header("location: Admin-login.php");
?>