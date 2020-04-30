<?php
	session_start();
	include '../php/database.php';
	$clgshortname1=$_SESSION['clg'];
	$sql = "select * from colleges where clg_shortname = '$clgshortname1'";
	$result = mysqli_query($db, $sql);
	if (mysqli_num_rows($result) ==1) {
	    while($row = mysqli_fetch_assoc($result)){
	    	 $collegesFullName=$row['clg_name'];
	    }
	}
	$who=$_SESSION['who'];
	$phnoofadmin=$_SESSION['uid'];
	if($who=='admin')
		$sql = "select * from admin where a_phno = '$phnoofadmin'";
	if($who=='hod')
		$sql = "select * from hod where h_phno = '$phnoofadmin'";
	if($who=='teacher')
		$sql = "select * from teacher where t_phno = '$phnoofadmin'";

	$result = mysqli_query($db, $sql);
	echo mysqli_error($db);
	if (mysqli_num_rows($result) == 1) {
	    while($row = mysqli_fetch_assoc($result)){
		if($who=='admin')
	    	 $nameofadmin=$row['a_name'];
		if($who=='hod')
	    	 $nameofadmin=$row['h_name'];
		if($who=='teacher')
	    	 $nameofadmin=$row['t_name'];
	    }
	}
//	echo $_SESSION['who']."-->".$_SESSION['clg'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>loggedin@Begin Test</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	body{
		margin: 0px;
		padding: 0px;
	}
	.main-div{
		position: absolute;
		height: 100vh;
		width: 100%;
		/*background-color: red;*/
	}
	.top-bar{
		position: fixed;
		background-color: #fff;
		height: 60px;
		width: 100%;
		z-index: 2;
		box-shadow: 1px 1px 2px 2px lightgrey; 
	}
	.top-user-info{
		position: absolute;
		top:15px;
		right: 30px; 
		cursor: pointer;
		user-select: none;
	}
	.top-user-info img{
		height: 40px;
		width: 40px;
		border-radius: 50%;
	}
	#menu-icn{
		position: absolute;
		font-size: 30px;
		top: 15px;
		left: 10px;
		display: none;
	}
	#menu-icn1{
		position: absolute;
		font-size: 30px;
		top: 15px;
		left: 10px;
		transform: rotate(90deg);
		/*display: none;*/
	}
	#logo-head{
      height: 50px;
      width: auto;
      position:absolute;
      left: 50%;
      transform: translate(-50%);
      top: 5px;
	}
	.dropdown-menu li{
		padding: 5px;
	}
	.dropdown-menu li a{
     font-size: 1.1em;
     padding-left: 5px;
     text-decoration: none;
     list-style: none;
     color: #000;
	}
	.dropdown-menu li:hover{
		background-color: #f1f1f1;
	}
	.dropdown-menu{
		margin-left: -10px; 
	     padding: 10px;
	     width: 220px;
	}
	.left-part{
		position: fixed;
		top: 60px;
		z-index: 1;
		height: 90vh;
		overflow-y: scroll;
		width: 280px;
		left: 0px;
		transition: .4s;
		background-color: #fff;
	}
	::-webkit-scrollbar {
       width: 8px;
	}
	::-webkit-scrollbar-track {
/*	  box-shadow: inset 0 0 5px grey;*/ 
	  border-radius: 10px;
	}
	::-webkit-scrollbar-thumb {
	  background: grey; 
	  border-radius: 10px;
	}
	::-webkit-scrollbar-thumb:hover {
	  background: #666666; 
	}
	.menu-profile{
		position: relative;
		/*background-color: red;*/
		background-image: url('https://teacher.bahonafeedback.com/assets/img/backgrounds/1@2x.jpg');
		background-size: 100% 100%;
      height: 150px;
      width: 100%;
	}
	.menu-profile img{
      position: relative;
      top:20px;
      border-radius: 50%; 
      height: 100px;
      width: 100px;
      left: 10px;
	 }      
	 #user-name{
	 	position: absolute;
	 	left:130px;
	 	top: 50px;
	 	font-size: 1.2em;
	 	font-weight: bold;
	 }
	 #user-position{
	 	position: absolute;
	 	left:130px;
	 	top: 75px;
	 }
	 .menu-block{
         position: relative;
         top: 10px;
         background-color: #fafafa;
	 }
	 .menu-list{
	 	position: relative;
	 	background-color: #fff;
	 	height:50px;
	 	padding-top: 15px;
        text-align: center;
        font-size: 1.2em;
        letter-spacing: .5px;
        cursor: pointer;
        user-select: none;
        transition: .4s;
        /*background-color: red;*/
        padding-bottom: 10px;
        border-bottom: 1px solid #f2f2f2;
      }
      .menu-list:hover{
	 	background-color: #f2f2f2;
      }
      .menu-list label{
      	position: absolute;
      	right: 20px;
      }
      .list-data ul{
      	transition: .5s;
         list-style: none;
      }
      .list-data ul li{
         padding: 10px;
         padding-left: 20px;	
         position: relative;
         left: -20px;
         border-radius: 10px;
	   }
      .list-data ul li:hover{
	 	background-color: #f2f2f2;
	   }
      .hod-data{
      	display: none;
      }
      .teacher-data{
      	display: none;
      }
      .student-data{
      	display: none;
      }

                              /*rightpart*/
	.right-part{
		position: absolute;
		top: 60px;
		height: calc(100vh - 60px);
		background-color: #f1f1f1;	
		width: calc(100% - 280px);
		transition: .5s;
		left: 280px;
	}

	@media only screen and (max-width: 500px){
	   .top-user-info{
		top:60px;
		right: 0px;
		background-color: #fff;
		border-radius: 0px 0px 10px 10px;
	  }
	  .top-addbtn{
		position: absolute;
		top: 250px;
		transform: translate(0%,-50%);
		left: 30px;
	}
	 .rightpart-top{
       height: 40vh;
       min-height: 300px;
	 }
	 .top-content{
		top: 40px;
		margin-left: 20px;
	}
	.right-part{
		width:100%;
		left: 0px;
	}
	.left-part{
		left: -280px;
	}
	#menu-icn{
		display: block;
	}
	#menu-icn1{
		display: none;
	}
	}
</style>
</head>
<body>

<div class="main-div">
	<div class="top-bar">
		<i class="fa fa-bars" aria-hidden="true" id="menu-icn"></i>
		<i class="fa fa-bars" aria-hidden="true" id="menu-icn1"></i>
		<center>
         <div id="logo-head">
          <img src="../img/login1.png" height="50px">
		    <?php echo $collegesFullName;?>
		   </div>
	    </center>
    	<div class="dropdown top-user-info">
    		<div class="dropdown-toggle" type="button" data-toggle="dropdown"><img src="../img/login1.png">
    			<?php echo $nameofadmin; ?>
		  <span class="caret"></span></div>
		  <ul class="dropdown-menu">
		    <li><a href="#">Account Settings</a></li>
		    <hr>
		    <li><a href="#"><button class="btn btn-danger logout-btn ml-2">Logout</button></a></li>
		  </ul>
         </div>
	</div>
	<div class="left-part">
		<div class="menu-profile">
			<img src="../img/login1.png">
			<div id="user-name">Name</div>
			<div id="user-position">Admin</div>
		</div>
		               <!-- menu list -->
		<div class="menu-block">
			<div class="menu-list dashboard openframe">
				Home
			</div>
			<div class="menu-list hod-list">
				Hod
			  <label><i class="fa fa-angle-down" aria-hidden="true"></i></label>
			</div>
			<div class="list-data hod-data">
				<ul>
					<li class="openframe">Add Hod</li>
					<li class="openframe">Remove Hod</li>
					<li class="openframe">Update Hod</li>
					<li class="openframe">View Hod</li>
				</ul>
			</div>

			<div class="menu-list teacher-list">
				Teacher
			  <label><i class="fa fa-angle-down" aria-hidden="true"></i></label>
			</div>
			<div class="list-data teacher-data">
				<ul>
					<li class="openframe">Add Teacher</li>
					<li class="openframe">Remove Teacher</li>
					<li class="openframe">Update Teacher</li>
					<li class="openframe">View Teacher</li>
				</ul>
			</div>

			<div class="menu-list student-list">
				Student
			  <label><i class="fa fa-angle-down" aria-hidden="true"></i></label>
			</div>
			<div class="list-data student-data">
				<ul>
					<li class="openframe">Add Student</li>
					<li class="openframe">Remove Student</li>
					<li class="openframe">Update Student</li>
					<li class="openframe">View Student</li>
				</ul>
			</div>
		</div>
	</div>
	                              <!-- right part -->
	<div class="right-part">
		<iframe src="php/Home.php" name="myfrm" height="100%" width="100%" id="main-content "></iframe>
	</div>
</div>	
<script type="text/javascript">

	$('.openframe').click(function(){
		var x=($(this).html()).replace(/\s/g,"");
		$('.openframe').css('background-color','transparent');
		$(this).css('background-color','#f2f2f2');
		if(x!='Home')
			document.myfrm.location.replace("html/"+x+".html");
		else
			document.myfrm.location.replace("php/"+x+".php");
	});
	$('.openframe:first-of-type').css('background-color','#f2f2f2');
	
	$(document).ready(function(){
	if($(window).width()>500){
      $('#menu-icn').click(function(){
       	$('.left-part').css("left","0px");
       	$('#menu-icn').hide();
       	$('#menu-icn1').show();
       	$('.right-part').css({"left":"280px","width":"calc(100% - 280px)"});
       });
	$('#menu-icn1').click(function(){
       	$('.left-part').css("left","-280px");
       	$('#menu-icn1').hide();
       	$('#menu-icn').show();
       	$('.right-part').css({"left":"0px","width":"100%"});
       });
     $('.right-part').click(function(){
		$('.left-part').css("left","-280px");
		$('#menu-icn1').hide();
       	$('#menu-icn').show();
       	$('.right-part').css("left","280px");
       	$('.right-part').css({"left":"0px","width":"100%"});
	});
   }else{
      $('#menu-icn').click(function(){
       	$('.left-part').css("left","0px");
       	$('#menu-icn').hide();
       	$('#menu-icn1').show();
       	$('.right-part').css({"left":"0px","width":"100%"});
       });
	$('#menu-icn1').click(function(){
       	$('.left-part').css("left","-280px");
       	$('#menu-icn1').hide();
       	$('#menu-icn').show();
       	$('.right-part').css({"left":"0px"});
       });
    $('.right-part').click(function(){
		$('.left-part').css("left","-280px");
		$('#menu-icn1').hide();
       	$('#menu-icn').show();
       	$('.right-part').css("left","280px");
       	$('.right-part').css({"left":"0px","width":"100%"});
	});
   }



	$('.dashboard').click(function(){
		$('.dashboard').css("background-color","#f0f0f0");
	});
	$hod=0;
	$('.hod-list').click(function(){
		if($hod == 0){
		$('.hod-data').show();
		$('.hod-list').css("background-color","#f0f0f0");
		$('.dashboard').css("background-color","#fff");
		$hod=1;
	    }else{
	    	$('.hod-data').hide();
		    $('.hod-list').css("background-color","#fff");
		    $hod=0;
	    }
	});
		$teacher=0;
	$('.teacher-list').click(function(){
		if($teacher == 0){
		$('.teacher-data').show();
		$('.teacher-list').css("background-color","#f0f0f0");
		$('.dashboard').css("background-color","#fff");
		$teacher=1;
	    }else{
	    	$('.teacher-data').hide();
		    $('.teacher-list').css("background-color","#fff");
		    $teacher=0;
	    }
	});
		$student=0;
	$('.student-list').click(function(){
		if($student == 0){
		$('.student-data').show();
		$('.student-list').css("background-color","#f0f0f0");
		$('.dashboard').css("background-color","#fff");
		$student=1;
	    }else{
	    	$('.student-data').hide();
		    $('.student-list').css("background-color","#fff");
		    $student=0;
	    }
	});
});
</script>
</body>
</html>
