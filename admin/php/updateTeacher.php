<?php
	include '../../php/database.php';
	$tphno=$_GET['id'];
	$sql = "select * from teacher where t_phno = '$tphno'";
	$result = mysqli_query($db, $sql);
	if (mysqli_num_rows($result) ==1) {
	    while($row = mysqli_fetch_assoc($result)){
	    	 $id=$row['t_id'];
	    	 $name=$row['t_name'];
	    	 $emailid=$row['t_emailid'];
	    	 $phno=$row['t_phno'];
	    	 $pass=$row['t_pass'];
	    }
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>


	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://j11y.io/demos/plugins/jQuery/autoresize.jquery.js"></script>
	<style type="text/css">
		body{
			padding-bottom: 200px;
			padding-top: 10px;
			padding-left: 100px;
			padding-right: 100px;
			background-color: #fff;
			user-select: none;
		}
		.box{

			transition: 1s;
			border-radius: 6px;
			z-index: 5;	
		}
		.add{
			font-weight: 500;
			font-family: sans-serif;
		}
		.options{
			margin-top: 5%;
			padding:50px;
			border:4px solid white;
			box-shadow:
			0 0 16px rgba(41,42,51,0.06),
			0 6px 20px rgba(41,42,51,0.02);
			background-color: #F5F5F5;;
		}

		.book{
			display: block;
		}
		@media only screen and (max-width: 786px){
		 	.box{
		 		margin-bottom: 100px;
		 	}
		 	body{
				padding: 0px 3px;
				background-color: #fff;
				user-select: none;
			}
		 	.options{
			}
		}
	</style>	
</head>
<body>
	<br/>
	
	<div class="container-fluid options">
    		<h1>Update Teacher</h1>	
    	<div class="book" class="tab-pane fade">
    	<!-- <form  action="../php/imageUpload.php" metTeacher="post" enctype="multipart/form-data" class="book" class="tab-pane fade"> -->
    		<br/>
			<br/>
			<div class="form-group">
			    <label for="exampleInputEmail1">Teacher Name :</label>
			    <input type="text" name="hname" id="hname"  value="<?php echo $name; ?>" class="form-control" id="exampleInputEmail2"  placeholder="Enter Teacher Name">
			</div>
 			<br/>
	      	<div class="form-group">
			    <label for="exampleInputEmail1">Teacher Email ID :</label>
			    <input type="email" name="hemailid" id="hemailid" value="<?php echo $emailid; ?>" class="form-control" id="exampleInputEmail2"  placeholder="Enter Teacher Email-ID ">
			</div>
			<br/>
			<div class="form-group">
			    <label for="exampleInputEmail1">Teacher Phone No. :</label>
			    <input type="text" name="hphno" id="hphno" class="form-control"  value="<?php echo $phno; ?>" id="exampleInputEmail2"  placeholder="Enter Teacher Phone No.">
			</div>
			<br/>
			<div class="form-group">
			    <label for="exampleInputEmail1">Teacher Password :</label>
			    <input type="text" name="hpassword" id="hpassword" class="form-control"  value="<?php echo $pass; ?>" id="exampleInputEmail2"  placeholder="Enter Teacher Password">
			</div>

			<br/><br/>
			 <button type="button" class="btn btn-primary" onclick="submitB()">Submit</button>
		<!-- 	  <input type="submit" value="Upload Image" name="submit"> -->
    	<!-- </form> -->
    	</div>


	</div>
</body>
<script type="text/javascript">
	document.getElementById("hphno").defaultValue ='<?php echo $phno; ?>';
	$('textarea').autoResize();

	function submitB(){
		  var name=$('#hname').val();
		  var email=$('#hemailid').val();
		  var pass=$('#hphno').val();
		  var phno=$('#hpassword').val();
		  if(name.length==0){
	        alert("Please Enter Teacher Name");
	        $('#hname').focus();
	    }else if(email.length==0){
	        alert("Please Enter Teacher Email-Id");
	        $('#hemailid').focus();
	    }else if(pass.length==0){
	        alert("Please Enter Teacher Password");
	        $('#hpassword').focus();
	    }else if(phno.length==0){
	        alert("Please Enter Teacher Phone No.");
	        $('#hphno').focus();
	    }else{
	    	var form_data={
	    		work:'updateTeacher',
	            id:'<?php echo $id;?>',
	            name:name,
	            email:email,
	            pass:pass,
	            phno:phno
	        };
		  $.ajax({
		      url: "../php/ajax.php",
		      data: form_data,
		      type: "POST",
		      success: function(data){
		          //$(te).
		          	if(data=='Record updated successfully'){
		          		alert('Record updated successfully');
			          	location.replace('../html/UpdateTeacher.html');
		          	}
		          	else
		          		alert(data);
		      }
		  });		
	   }
	}
</script>
</html>