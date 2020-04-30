<?php
date_default_timezone_set('Asia/Kolkata');
$date=date('D M Y H:i:s');
$time=1582000000000;
$id=round(microtime(true) * 1000)-$time;
include '../../php/database.php';
$date=$_POST['date'];
$name=$_POST['name'];
$dis=$_POST['dis'];
$clgid=$_POST['clgshortname'];

$sql="insert into classroom values('".$name."','".$id."','".$date."','".$clgid."','".$dis."')";
if(mysqli_query($db,$sql)){
    echo "success";
}else{
    echo mysqli_error($db);
}
mysqli_close($db);
?>