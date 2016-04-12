<?php session_start();
if($_SESSION['auth'] != "ok")
  header("Location:login/loginForm.php");
?>