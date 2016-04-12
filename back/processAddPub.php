<?php
$daysShort = array('mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun');
if(!empty ($_POST['name']))
    $name = $_POST['name'];
//Trim spaces at the end and replace other spaces by underscore to prepare for the db
$name=htmlspecialchars(trim($name));
$name = str_replace(" ", "_", $name);
echo $name."!<br/>";

if(!empty ($_POST['address']))
    $address = $_POST['address'];

$startTime = ($_POST['startTime']);
$endTime = ($_POST['endTime']);

$deal1 = ($_POST['deal1']);
$price1 = ($_POST['price1']);
$hhprice1 = ($_POST['hhprice1']);

$deal2 = ($_POST['deal2']);
$price2 = ($_POST['price2']);
$hhprice2 = ($_POST['hhprice2']);

$deal3 = ($_POST['deal3']);
$price3 = ($_POST['price3']);
$hhprice3 = ($_POST['hhprice3']);

//Get rid of everyday value
array_shift($startTime);
array_shift($endTime);

array_shift($deal1);
array_shift($hhprice1);
array_shift($price1);

array_shift($deal2);
array_shift($hhprice2);
array_shift($price2);

array_shift($deal3);
array_shift($hhprice3);
array_shift($price3);

//Test
for($i=0; $i<sizeof($daysShort); $i++) {
    echo $daysShort[$i]." from ".$startTime[$i]." to ".$endTime[$i]."<br/>"
        .$deal1[$i]." for ".$hhprice1[$i]."€ instead of ".$price1[$i]."<br/>"
        .$deal2[$i]." for ".$hhprice2[$i]."€ instead of ".$price2[$i]."<br/>"
        .$deal3[$i]." for ".$hhprice3[$i]."€ instead of ".$price3[$i]."<br/><br/>";
}


