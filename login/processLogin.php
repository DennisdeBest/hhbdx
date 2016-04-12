<?php
session_start();
if($_POST['username'] == "admin" && $_POST['pass1'] == "admin"){
  $_SESSION['auth'] = "ok";
  header("Location:../back/back.php");
}
else
  $_SESSION['auth'] = "";
?>