<?php
include 'database.php';
$usr_contact = $_POST['usr_contact'];
$user_type = $_POST['user_type'];
if($user_type == 'student'){
	$check_user = mysqli_query($db,"select * from users where phno1 = '$usr_contact'");
	$check_user_rows = mysqli_num_rows($check_user);
	if($check_user_rows <= 0){
		echo "valid";
	}
	else{
		echo "invalid";
	}
}else if($user_type == 'admin'){
	$check_user = mysqli_query($db,"select * from admin where a_phno = '$usr_contact'");
	$check_user_rows = mysqli_num_rows($check_user);
	if($check_user_rows <= 0){
		echo "valid";
	}
	else{
		echo "invalid";
	}
}
?>