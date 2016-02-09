<!DOCTYPE html>
<html>
<head>
<title>SCORES</title>
<link rel="stylesheet" type="text/css" href="admin_style.css">
<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0" />
<script type="text/javascript" src="script/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="script/general.js"></script>
<link href="http://vjs.zencdn.net/5.4.6/video-js.css" rel="stylesheet">

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.1/videojs-ie8.min.js"></script>
<script type="text/javascript">
  	$(document).ready(function(){
  		
  		$("#p2").bind("blur", password_check);
      $("#username").keyup(function(){
          $.post("user_check.php",{username:signup.username.value}, function(data){
              $("#un_check").html(data);
          });
      });
  	});
  	function password_check(){
  		var p1 = $("#p1").val();
  		var p2 = $("#p2").val();
  		if(p1!="" || p2!=""){
  		if (p1 != p2) {
  			$("#pass_err").html("Wrong");
  			$("#pass_crr").html("");
  		}
  		else{
  			$("#pass_err").html("");
  			$("#pass_crr").html("Good");	
  		}
  	}
  	else{
  		$("#pass_err").html("please type the password");
  	}
  	}
  </script>
</head>
<body>

<div id="header">
	<div class="logo"><a href="admin.php">Scores<span>360</span></a></div>
	<div id="log_in">
    <?php 
      if (isset($_SESSION["adminname"])) {
        echo '<a href="admin_logout.php">Log Out</a>';
      }
      else{
        echo '<a href="admin_login.php">Log In</a> <a href="admin_signup.php">Sign Up</a>';
      }
    ?>
  </div>
</div>