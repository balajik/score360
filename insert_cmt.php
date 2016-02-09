<?php include('config.php') ?>

<?php
			if(isset($_POST["submit"])){
				$username = $_POST["username"];
				$comment = $_POST["comment"];
				$sql = "INSERT INTO comments (username, comment, time) VALUES ('$username','$comment', NOW())";
				mysql_query($sql, $conn);
			}
			?>

<?php include('cricket.php') ?>