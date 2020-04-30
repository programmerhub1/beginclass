<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>
	<header>
		<div onclick="opac()" id="namediv">
			<img src="http://jeet.shreekhodiyarind.co.in/admin/css-js/admin.png"/>
			<div id="name">Name&nbsp;&nbsp;<i>&gt;</i></div>
		</div>
		<div id="searchdiv">
			<i class="fa fa-search"></i><input type="text" id="search" placeholder="Search...">
		</div>
		<div id="headerbtns">
			<div>Logout</div>
		</div>
	</header>
	<div id="sidebar">
		<i id="sidebartogglebtn" class="fa fa-bars"></i>
		<div id="sidebar_title">Book&nbsp;Sharing</div>
		<hr class="firsthr"/>
		<img src="http://jeet.shreekhodiyarind.co.in/admin/css-js/admin.png" width="70" height="43" />
		<span id="nameinsidebar"> </span>
		<hr class="firsthr1"/>
		<div id="sidemenu">
			<div><i class="fa fa-home fa-1x"></i><span>Dashboard</span></div>
			<div><i class="fa fa-cog fa-1x"></i><span>Account Setting</span></div>
			<div><i class="fa fa-plus fa-1x"></i><span>Add Stationary</span></div>
			<div><i class="fa fa-search fa-1x"></i><span>Find Stationary</span></div>
			<div><i class="fa fa-history fa-1x"></i><span>History</span></div>
			<div><i class="fa fa-paper-plane fa-1x"></i><span>Notifications</span></div>
			<div><i class="fa fa-trophy fa-1x"></i><span>Top Peoples</span></div>
			<div><i class="fa fa-question"></i><span>Help</span></div>
			<div><h1>&nbsp;</h1></div>
		</div>
	</div>
	<button class="btnclose" onclick="hidesidebar()"><i class="zmdi zmdi-sort-amount-desc"></i></button>
	<iframe src="php/chatlist.php" id="myfrm" name="myfrm"></iframe>
	<script type="text/javascript">
		var search=document.getElementById('search');
	    var userInfo={};
        <?php
        if(!isset($_COOKIE['key1'])){
            header('Location:html/login.html');
        }else{
            include 'php/database.php';
            $cuki=$_COOKIE['key1'];
            $cuki=explode(",",$cuki);
            $sql="select * from ".$cuki[1]."_users where enroll='".$cuki[0]."' or email='".$cuki[0]."'";
            $result=mysqli_query($db,$sql);
            $result=mysqli_fetch_assoc($result);
            $sql="select name from colleges where id='".$cuki[1]."'";
            $cnm=mysqli_fetch_assoc(mysqli_query($db,$sql))['name'];
            $result['college']=$cnm;
            $result['cid']=$cuki[1];
            $ar=json_encode($result);
            mysqli_close($db);
            echo "userInfo=JSON.parse('".$ar."');\n";
        }
        ?>

        $('#name,#nameinsidebar').html(userInfo.first_name);
        function deleteAllCookies() {
            var cookies = document.cookie.split(";");
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i];
                var eqPos = cookie.indexOf("=");
                var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
            }
        }
		var showing=false;
		$('#headerbtns').hide();
		$('#headerbtns').click(function(){
            var cuki = "key1=; expires="+new Date(new Date().getTime()-100).toGMTString()+"; path=/Books/;";
            document.cookie=cuki;
            console.log(cuki);
            console.log(document.cookie);
            window.location.reload();
		});
		$('#headerbtns').css('opacity','0');
		function opac(){
			if (showing){
				$('#headerbtns').css('opacity','0');
				setTimeout(function(){$('#headerbtns').hide()},200);
			}else{
				$('#headerbtns').show();
				$('#headerbtns').css('opacity','1');
			}
			showing=!showing;
		}
		$('#sidemenu div').click(function(){
			$('#sidemenu div').css('color','#000');
			$(this).css('color','#00BCD4');
			document.myfrm.location.replace("html/"+($('span',this).html()).replace(/\s/g,"")+".html");
		});
		$('#sidemenu div:first-of-type').css('color','#00BCD4');
		$('#sidemenu div i').hover(function(){
			// if (wid==60)
			// $(this).siblings().toggle();
		});
		$('#sidebartogglebtn').click(togglesidebar);
		var opened=false;
		// function togglesidebar(){
		//     if(opened){
  //   		    $('#sidebar').css('margin-left',window.innerWidth<500?'calc(110px - 100%)':'-230px');
		//     }else{
  //   		    $('#sidebar').css('margin-left','0px');
		//     }
		//     opened=!opened;
		// }
		var wid=230;
		function togglesidebar(){
//			if(window.innerWidth<800){
				wid=290-wid;
				$('#sidebar').css('width',wid+'px');
	 			/*$('#myfrm').css('width','calc(100% - '+wid+'px)');
	 			$('#myfrm').css('margin-left',wid+'px');
*///				$('#searchdiv').css('margin-left',(wid+70)+'px');
				if(wid==60){
					$('#sidebar_title').html('');
					$('#nameinsidebar').hide();
					$('#sidebar img').css('margin-left','0px');
					if(window.innerWidth>800){
						$('#myfrm').css('margin-left','65px');
						$('#myfrm').css('width','calc(100vw - 65px)');
						$('#searchdiv').css('margin-left','85px');
					}			
					//$('#sidebar_title').html('BS');
					//$('#sidebar_title').css('text-align','center');
					$('#sidemenu div span').toggle();
				}else{
					$('#sidebar_title').css('text-align','left');
					setTimeout(function(){
						$('#sidebar_title').html('Book&nbsp;Sharing');
						$('#nameinsidebar').show();
						$('#sidebar img').css('margin-left','20px');
						if(window.innerWidth>800){
							$('#myfrm').css('margin-left','230px');
							$('#myfrm').css('width','calc(100vw - 230px)');
							$('#searchdiv').css('margin-left','250px');

						}
						$('#sidemenu div span').toggle();
					},100);
				}
			}
//		}
	   if(window.innerWidth<800){
	       if(wid==230)togglesidebar();
    		//$('#sidebartogglebtn').hide();
    		$('#searchdiv').css('margin-left','10px');
    		$('#searchdiv input').css('width','120px');
    		$('#myfrm').css('width','100vw');
    	}
    	var oldwidth=window.innerWidth;
    	window.onresize=function(){
    	    /*if(oldwidth!=window.innerWidth){
    		    if(window.innerWidth<800){
    		        if(wid==300)togglesidebar();
    		    }else if(window.innerWidth>800){
    		        if(wid==60)togglesidebar();
    		    }
    	    }*/
		};
		var tooggle=1;
		function hidesidebar(){
			// $('#sidebar').toggle();
			if(tooggle){
				$('#sidebar').css('margin-left','-260px');
				tooggle=0;
			}
			else{
				$('#sidebar').css('margin-left','0px');
				tooggle=1;	
			}
		}
	</script>
</body>
</html>