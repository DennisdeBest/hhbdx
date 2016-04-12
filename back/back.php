<script
    src="https://code.jquery.com/jquery-2.2.3.min.js"
    integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="
    crossorigin="anonymous"></script>
<?php
require_once('../login/check_login.php');
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" action="processAddPub.php" >
    <label for="name">Name : </label><input type="text" name="name"/><br/>
    <label for="address">Address : </label><input type="text" name="address"/><br/>
    <label for="mon">Monday</label>
    <input type="checkbox" class="check_day" value="mon" name="mon" id="check_mon"/>
    <label for="tue">Tuesday</label>
    <input type="checkbox" class="check_day" value="tue" name="tue" id="check_tue"/><br/>
    <label for="wed">Wednesday</label>
    <input type="checkbox" class="check_day" value="wed" name="wed" id="check_wed"/>
    <label for="thu">Thursday</label>
    <input type="checkbox" class="check_day" value="thu" name="thu" id="check_thu"/><br/>
    <label for="fri">Friday</label>
    <input type="checkbox" class="check_day" value="fri" name="fri" id="check_fri"/>
    <label for="sat">Saturday</label>
    <input type="checkbox" class="check_day" value="sat" name="sat" id="check_sat"/><br/>
    <label for="sun">Sunday</label>
    <input type="checkbox" class="check_day" value="sun" name="sun" id="check_sun"/>
    <label for="all">All</label>
    <input type="checkbox" class="check_day" value="all" name="all" id="check_all"/><br/>

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
    <input type="submit" value="commit" id="commit">
</form>
<script src="../js/addForm.js"></script>
</body>
</html>