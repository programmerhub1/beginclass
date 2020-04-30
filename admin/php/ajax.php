<?php
	session_start();
	$clgshortname=$_SESSION['clg'];
	$work=$_POST['work'];
	include('../../php/database.php');

//HOD

	if($work=='addhod'){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$phno=$_POST['phno'];
		$sql = "insert into hod (h_name ,h_emailid,h_pass,h_phno ,h_insshortname) values('$name','$email','$pass','$phno','$clgshortname')";
		if (mysqli_query($db, $sql)) {
		    echo "inserted successfully.";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($db);
		}
	}
	if($work=="showhod"){
	    $sql="select * from hod where h_insshortname='$clgshortname'";
	      $result=mysqli_query($db,$sql);
	      if (mysqli_num_rows($result) > 0) {
	        $all=array();
	        while($row = mysqli_fetch_assoc($result)) {
	        $ar=array('name'=>$row['h_name'],'emailid'=>$row['h_emailid'],'pass'=>$row['h_pass'],'phno'=>$row['h_phno']);
	          array_push($all,$ar);
	        }
	        echo json_encode($all);
	    }else echo "";
	}
	if($work=="deletehod"){
	  $id=$_POST['id'];
	  $sql = "DELETE FROM hod WHERE h_phno='$id'";
	  if (mysqli_query($db, $sql)) {
	      echo "Record deleted successfully";
	  } else {
	      echo "Error deleting record: " . mysqli_error($db);
	  }
	}
	if($work=='updatehod'){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$phno=$_POST['phno'];
		$sql = "update hod set h_name='$name' ,h_emailid='$email',h_pass='$pass',h_phno='$phno' WHERE h_id=$id";

		if (mysqli_query($db, $sql)) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . mysqli_error($db);
		}
	}

//Teacher

	if($work=='addTeacher'){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$phno=$_POST['phno'];
		$sql = "insert into teacher (t_name ,t_emailid,t_pass,t_phno ,t_insshortname) values('$name','$email','$pass','$phno','$clgshortname')";
		if (mysqli_query($db, $sql)) {
		    echo "inserted successfully.";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($db);
		}	
	}
		if($work=="showteacher"){
	    $sql="select * from teacher where t_insshortname='$clgshortname'";
	      $result=mysqli_query($db,$sql);
	      if (mysqli_num_rows($result) > 0) {
	        $all=array();
	        while($row = mysqli_fetch_assoc($result)) {
	        $ar=array('name'=>$row['t_name'],'emailid'=>$row['t_emailid'],'pass'=>$row['t_pass'],'phno'=>$row['t_phno']);
	          array_push($all,$ar);
	        }
	        echo json_encode($all);
	    }else echo "";
	}

	if($work=="deleteteacher"){
	  $id=$_POST['id'];
	  $sql = "DELETE FROM teacher WHERE t_phno='$id'";
	  if (mysqli_query($db, $sql)) {
	      echo "Record deleted successfully";
	  } else {
	      echo "Error deleting record: " . mysqli_error($db);
	  }
	}
	if($work=='updateTeacher'){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$phno=$_POST['phno'];
		$sql = "update teacher set t_name='$name' ,t_emailid='$email',t_pass='$pass',t_phno='$phno' WHERE t_id=$id";

		if (mysqli_query($db, $sql)) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . mysqli_error($db);
		}
	}
?>