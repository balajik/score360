<?php include('config.php') ?>

<?php include('log_header.php') ?>

<div id="container">
	
	<div class="content">
<?php
	if(isset($_POST["reset"])) {
				$email = $_POST["email"];
				$sql = "SELECT question FROM users WHERE email = '$email'";
				$result = mysql_query($sql, $conn);
				if(!$result){
					header("location:signup.php");
				}
				else
				{
					while($row = mysql_fetch_array($result)){
					echo "<p>" . "{$row['question']}" . "</p>";
					echo "<form method='post'>";
					echo "<input type='text' />";
					echo "<input type='submit' />";
					echo "</form>";
				}
				}
			}
?>
	</div>
</div>
</body>
</html>