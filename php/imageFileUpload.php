<?php
$src = $_FILES['file']['tmp_name'];
$file_size =$_FILES['file']['size'];
//echo $src;
$targ ="../examimg/".$_FILES['file']['name'];
$temp = explode(".", $_FILES['file']['name']);
$explode=$temp;
$file_ext=strtolower(end($explode));  
$extensions= array("jpeg","jpg","png");
if(in_array($file_ext,$extensions)=== false)
 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
if(empty($errors)==true){
date_default_timezone_set('Asia/Kolkata');
$date=date('D M Y H:i:s');
$time=1582000000000;
$filename=round(microtime(true) * 1000)-$time;
$newfilename=$filename.'.'.end($temp);
move_uploaded_file($src,"../examimg/".$newfilename);
echo "../examimg/".$newfilename;
}
else{
	print_r($errors);
}
?>