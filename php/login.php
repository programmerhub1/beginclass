<?php
include 'database.php';
$type=$_POST['type'];
$clg=$_POST['clg'];
$id=$_POST['id'];
$pass=$_POST['pass'];
session_start();
if($type=='admin')
	$sql="select * from admin where a_phno='$id' or a_emailid='$id' and a_pass='$pass'";
if($type=='hod')
	$sql="select * from hod where h_phno='$id' or h_emailid='$id' and h_pass='$pass'";
if($type=='teacher')
	$sql="select * from teacher where t_phno='$id' or t_emailid='$id' and t_pass='$pass'";
if($type=='users')
	$sql="select * from users where phno1='$id' or enrollno='$id' and t_pass='$pass'";
$result=mysqli_query($db,$sql);
if(mysqli_num_rows($result)==1){
    if($type=="admin"){
        $_SESSION['who']='admin';
        $_SESSION['clg']=$clg;
    	$_SESSION['uid']=$id;
        echo "success".",../admin/";

    }
    if($type=="hod"){
    	$_SESSION['who']='hod';
        $_SESSION['clg']=$clg;
        $_SESSION['uid']=$id;
    	echo "success".",../admin/";
    }
    if($type=="teacher"){
    	$_SESSION['who']='teacher';
        $_SESSION['clg']=$clg;
        $_SESSION['uid']=$id;
    	echo "success".",../admin/";
    }
     if($type=="student"){
    	$_SESSION['who']='student';
        $_SESSION['clg']=$clg;
        $_SESSION['uid']=$id;
    	echo "success".",../";
    }
}else if(mysqli_num_rows($result)==0)
    echo "wrong username or password!";
else{
    echo mysqli_error($db);
}
mysqli_close($db);
?>