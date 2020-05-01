<?php
include 'database.php';
$clgid=$_POST['clg'];
$deptname=$_POST['deptname'];
$enroll=$_POST['enroll'];
$year=$_POST['year'];
$fn=$_POST['fn'];
$ln=$_POST['ln'];
$gender=substr($_POST['gender'],0,1);
$em=$_POST['email'];
$pass=$_POST['pass'];
$user_type = $_POST['user_type'];
$usr_contact = $_POST['usr_contact'];
$parent_contact = $_POST['parent_contact'];
$parent_email = $_POST['parent_email'];
if($user_type =='student' ){
	$check_user = mysqli_query($db,"select * from users where phno1 = '$usr_contact'");
	$check_user_rows = mysqli_num_rows($check_user);
 if($check_user_rows <= 0){
	$sql="INSERT INTO `users`(`fname`, `lname`, `email`, `enrollno`, `phno1`, `phno2`, `branch`, `fatheremail`, `fatherphno`, `gender`, `clgshortname`, `password`) VALUES ('$fn','$ln','$em','$enroll','$usr_contact','$usr_contact','$deptname','$parent_email','$parent_contact','$gender','$clgid','$pass')";
	if(mysqli_query($db,$sql)){
    echo "success";
	}else{
	    echo mysqli_error($db);
	}
  }else{
  	echo "duplicate";
  }
}
else if($user_type =='admin' ){
	$sql="INSERT INTO `admin`(`a_name`, `a_emailid`, `a_pass`, `a_phno`, `a_insshortname`) VALUES ('$fn','$em','$pass','$usr_contact','$clgid')";
	if(mysqli_query($db,$sql)){
    echo "success";
	}else{
		echo "duplicate";
	}
	mysqli_close($db);
}


// create table colleges(id varchar(5) primary key,name varchar(100));


?>