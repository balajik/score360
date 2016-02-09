<?php include('config.php') ?>

<?php
 if(isset($_POST["username"])) {
 	$username = $_POST["username"];
 	if(strlen($username) > 6)
 	{
 		$sql = "SELECT username FROM users WHERE username='$username'";
 		$result = mysql_query($sql, $conn);
 		if (mysql_num_rows($result)>0) {
 			echo "<span class='err'>username already taken</span><br>";
 		}
 		else{
 			echo "<span class='err'>Available</span><br>";
 		}
 	}
 	else
 	{
 		echo "<span class='err'>Please enter username more than 6 char</span><br>";
 	}
 }
 else{
 	header("location:signup.php");
 }
?>