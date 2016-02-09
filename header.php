<!DOCTYPE html>
<html>
<head>
<title>SCORES360</title>
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0" />
<script type="text/javascript" src="script/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="script/general.js"></script>
<link href="http://vjs.zencdn.net/5.4.6/video-js.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="images/scores.ico" />

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.1/videojs-ie8.min.js"></script>
  <!--[if IE]>
	<link rel="stylesheet" type="text/css" href="ie-style.css" />
<![endif]-->
<!--<script type="text/javascript">
$(document).ready(function(){
    $(window).load(function(){
        $.ajax({url: "https://at.globalenglish.com/api/content/556a035d-a29d-481f-9d18-330653e688a5.json", success: function(result){
            $("#newsfeed").html(result);
        }});
    });
});
</script>-->
</head>
<body>

<div id="header">
	<div class="logo"><a href="index.php">Scores<span>360</span></a></div>
	<div id="header_nav">
		<a href="video.php">Video</a>
		<a href="cricket.php">Cricket</a>
		<a href="football.php">Football</a>
		<a href="chat.php">Chat</a>
	</div>
	<div id="search">
		<form method="post" id="searchform" action="search.php">
			<input type="text" name="search" placeholder="Search" required />
			<input type="submit" name="submit" value="Search" />
		</form>
		
	</div>
	<div id="log_in">
		<?php 
			if (isset($_SESSION["username"])) {
				echo '<a href="logout.php">Log Out</a>';
			}
			else{
				echo '<a href="login.php">Log In</a> <a href="signup.php">Sign Up</a>';
			}
		?></div>
	<div id="profile"><?php if(isset($_SESSION['username'])){ echo '<a href="profile.php">Profile</a>';}?></div>
	<div id="user_name"><p><?php if(isset($_SESSION['username'])){ $sql = "SELECT name FROM users WHERE username = '" .$_SESSION['username']. "'"; 
						$result = mysql_query($sql, $conn); 
						while ($row = mysql_fetch_array($result)) {
											echo "" . $row['name'] . "";
					}
				}
					?></p></div>
	<?php if(isset($_SESSION['username'])){ $sql = "SELECT profile_pic FROM users WHERE username = '" .$_SESSION['username']. "'"; 
						$result = mysql_query($sql, $conn); 
						while ($row = mysql_fetch_assoc($result)) {
											echo "<a href='profile.php'><img id='pro_pic' width='40px' height='40px' src='data:image;base64, {$row["profile_pic"]}' alt='img'></a>";
					}
				}
					?>
</div>

<a class="mobile" href="#"><span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>MENU</a>