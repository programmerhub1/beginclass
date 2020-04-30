<?php
	session_start();
	include '../../php/database.php';
	$clgshortname1=$_SESSION['clg'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
	.right-part1{
		padding-bottom: 20px;
		background-color: #f1f1f1;	
	}
	.rightpart-top{
		position: relative;
		height: 30vh;
		top: 30px;
		background-color: #fff;
		width: 98%;
		left: 1%;
		border-radius: 10px;
	}
	.top-content{
		display: inline-block;
		top: 20px;
		position: relative;
		margin-top:30px;
		margin-left: 100px;
	}
	.top-content h1{
		font-weight: bold;
		font-size: 2.2em;
	}
	.top-content span{
		color: grey;
		font-weight: bold;
		letter-spacing: .5px;
	}
	.top-addbtn{
		position: absolute;
		top: 50%;
		transform: translate(0%,-50%);
		right: 30px;
	}
	.right-content{
		position: relative;
		padding: 40px;
		margin-top: 80px;
		background-color: #fff;
		width: 98%;
		left: 1%;
		border-radius: 10px;
	}
                                  /*exam card*/
    .exam-card{
    	position: relative;
        height: 330px;
        /*background-color: red;*/
        margin-bottom: 20px;
    	border-radius: 10px;
    	transition: .4s;
    	bottom: 0px;
    	box-shadow: 1px 1px 3px 3px #f1f1f1;
    }
    .exam-card:hover{
    	bottom: 5px;
    	box-shadow: 1px 1px 3px 3px #d3d3d3;
    }
    .exam-card:hover .img__description {
	  visibility: visible;
	  opacity: 1;
	   background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) );
	}
    .exam-card-top{
    	position: relative;
    	height: 220px;
    	background-image: url('https://i.pinimg.com/originals/97/7c/2e/977c2e8c480428e79cc15cdffdda95ad.jpg');
    	background-size: 100% 100%;
    	border-radius: 10px 10px 0px 0px;
    }
    .exam-card-top img{
    	position: relative;
    	height: 220px;
    }
    .img__description{
    	position: absolute;
    	width: 80%;
    	left: 10%;
    	padding: 5px;
    	border-radius:3px; 
    	top: 40px;
    	z-index: 1;
    	color: #fff;
    	word-break: break-all;
    	visibility: hidden;
    }
     .exam-card-top label{
    	position: absolute;
    	right: 0;
    	top: 10px;
    	width: 80px;
    	padding:2px;
    	text-align: center;
    	height: 30px;
    	background-color: green;
    	color: #fff;
    	border-radius: 50px 0px 0px 50px;
    	z-index: 999;
    }
    .exam-card-bottom{
    	position: relative;
    	height: 110px;
    	border-radius: 0px 0px 10px 10px;
    }

    #exam-card-subject{
    	font-weight: bold;
    	font-size: 1.2em;
    	position: relative;
    	left: 15px;
    	top: 15px;
    	/*background-color: green;*/
        display: inline-block;
    }
    .exam-card-bottom-btn{
    	position: absolute;
    	top: 60px;
    	right: 10px;
    	width: 100px;
    }
    .exam-card-level{
    	position: relative;
    	width: 50%;
    	top: 10px;
    	left: 15px;
    }
    .exam-card-bottom label{
    	top: 10px;
       position: relative;
       left: 15px;
       font-weight: bold;
       color: lightgrey;
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
	}
	</style>
</head>
<body>
<div class="right-part1">
		<div class="rightpart-top">
			<div class="top-content">
			  <h1>My&nbsp;ClassRooms</h1>
			  <span>Select a classRoom to manage, or create a new one from scratch.</span>
		    </div>
			<button class="btn btn-primary btn-lg top-addbtn" onclick="fun()">+&nbsp;Add ClassRoom</button>
		</div>
		<div class="right-content">
          <div class="row">
          	<?php
          		$sql = "select * from classroom where clg_shortname = '$clgshortname1'";
				$result = mysqli_query($db, $sql);
				if (mysqli_num_rows($result) >0) {
				    while($row = mysqli_fetch_assoc($result)){
				    	$cid=$row['c_id'];
          	?>
	          	<div class="col-md-3">
	          		<div class="exam-card">
	          			<div class="exam-card-top">
	          				<p class="img__description"><?php echo $row['dis'];?></p>
	          				<img src="../img/vvvv1.jpg" class="col-md-12">
	          				
	          			</div>
	          			<div class="exam-card-bottom">
	          				<div id="exam-card-subject"><?php echo $row['c_name'];?></div>
	          				<button class="btn btn-success exam-card-bottom-btn" onclick="enterClassRoom('<?php echo $cid; ?>')">Enter</button>
	          				<div class="exam-card-level"><a href="?id=<?php echo $cid; ?>">?id=<?php echo $cid; ?></a></div>
	          				<label style="color:black;"><span style="color:green;">Available Till</span><br/><?php echo $row['c_startdate'];?></label>
	          			</div>
	          		</div>
	          	</div>
	        <?php
	        		}
				}
	        ?>
          </div>
		</div>
	</div>
<div class="bs-example">
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-size: 20px;">Create New ClassRoom</h5>
                    <button type="button" class="close" data-dismiss="modal" style="margin-top:-20px;">&times;</button>
                </div>
                <form class="modal-body">
                	<div class="form-group">
					    <label for="exampleFormControlInput1">ClassRoom Name</label>
					    <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
					</div>
                	<div class="form-group">
					    <label for="exampleFormControlInput2">ClassRoom Description</label>
					    <input type="text" class="form-control" id="exampleFormControlInput3" name="description">
					</div>
                	<div class="form-group">
					    <label for="exampleFormControlInput2">ClassRoom Publish Date</label>
					    <input type="date" class="form-control" id="exampleFormControlInput2" name="date">
					</div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary word" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary word" onclick="saveData()">Add New</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
	function fun(){
	$("#myModal").modal('show');
}
document.getElementById("exampleFormControlInput2").valueAsDate = new Date();
var form=document.forms[0];
function saveData(){
        var name=form.name.value;
        var dis=form.description.value;
        var date=form.date.value;
        if(name==''){
        	alert('Enter ClassRoom Name');
        	form.name.focus();
        }
        if(name==''){
        	alert('Enter ClassRoom Description');
        	form.description.focus();
        }
        if(date==''){
        	alert('Enter ClassRoom Publish Date');
        	form.date.focus();
        }
        else{
    var data={
        name:name,
        date:date,
        dis:dis,
        clgshortname:'<?php echo $_SESSION['clg'];?>'
    };
    $.ajax({
        url:'addClassRoom.php',
        data:data,
        type:"POST",
        success:function(a,b){
            console.log(a);
            if(a == "success"){
            	alert('Successfully Added New ClassRoom');
            	location.reload();
            }
        }
    });
}
}  
</script>
</html>