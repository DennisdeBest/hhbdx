<?php
$daysShort = array('mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun');
if(!empty ($_POST['name']))
    $name = $_POST['name'];

if(!empty ($_POST['address']))
    $address = $_POST['address'];


foreach($daysShort as $dayShort){
    if(isset($_POST[$dayShort]))
        $setDays[]=$dayShort;
}

for($i=0; $i<sizeof($setDays); $i++){

}

for($i=0; $i<sizeof($_POST['startTime']); $i++) {
    echo($_POST['startTime'][$i]);

}
echo("<br/>".sizeof($_POST['startTime']));


