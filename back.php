<script
    src="https://code.jquery.com/jquery-2.2.3.min.js"
    integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="
    crossorigin="anonymous"></script>
<?php
require_once ('login/check_login.php');
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" action="">
    <label for="name">Name : </label><input type="text" name="name"/><br/>
    <label for="address">Address : </label><input type="text" name="address"/><br/>
    <input type="checkbox" class="check_day" value="mon" id="check_mon">Monday</input><input type="checkbox" class="check_day" value="tue" id="check_tue">Tuesday</input><br/>
    <input type="checkbox" class="check_day" value="wed" id="check_wed">Wednesday</input><input type="checkbox" class="check_day" value="thu" id="check_thu">Thursday</input><br/>
    <input type="checkbox" class="check_day" value="fri" id="check_fri">Friday</input><input type="checkbox" class="check_day" value="sat" id="check_sat">Saturday</input><br/>
    <input type="checkbox" class="check_day" value="sun" id="check_sun">Sunday</input><input type="checkbox" class="check_day" value="all" id="check_all">All</input><br/>

    <fieldset class="day" id="everyday">
        <legend>Everyday :</legend>
        <?php require('times.php'); ?>
    </fieldset>
    <fieldset class="day" id="monday">
        <legend>Monday :</legend>
       <?php require('times.php'); ?>
    </fieldset>
    <fieldset class="day" id="tuesday">
        <legend>Tuesday :</legend>
        <?php require('times.php'); ?>
    </fieldset>
    <fieldset class="day" id="wednesday">
        <legend>Wednesday :</legend>
        <?php require('times.php'); ?>
    </fieldset>
    <fieldset class="day" id="thursday">
        <legend>Thursday :</legend>
        <?php require('times.php'); ?>
    </fieldset>
    <fieldset class="day" id="friday">
        <legend>Friday :</legend>
        <?php require('times.php'); ?>
    </fieldset>
    <fieldset class="day" id="saturday">
        <legend>Saturday :</legend>
        <?php require('times.php'); ?>
    </fieldset>
    <fieldset class="day" id="sunday">
        <legend>Sunday :</legend>
        <?php require('times.php'); ?>
    </fieldset>
</form>
<script src="js/addForm.js"></script>
</body>
</html>