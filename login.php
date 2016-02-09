<?php 
session_start();
include('config.php') ?>

<?php 
if (isset($_SESSION['username'])) {
	header("location:index.php");
}
?>

<?php include('log_header.php') ?>

<div id="container">
	
	<div class="content">
		<?php
			if (isset($_GET["mes"])) {
				echo "<span class='err'>" . $_GET["mes"] . "</span>";
			}
		?>
		<?php
			if(isset($_POST["login"])) {
				$username=$_POST["username"];
				$password=$_POST["password"];
				if($username!=""&&$password!=""){
					$sql = "SELECT id, username, password FROM users WHERE username='$username' AND password='$password'";
					$result = mysql_query($sql, $conn);
					if(mysql_num_rows($result)==1) {
						$_SESSION["username"]=$username;
						header("location: index.php");
					}
					else{
						echo "<span class='err'>Invalid username or password</span>";
					}
				}
				else{
					echo "<span class='err'>enter the username and password</span>";
				}
			}
		?>
		<form id="login" method="post" action="login.php" autocomplete="off">
			<fieldset>
				<legend>Log In</legend>
				<input type="text" name="username" placeholder="Username" required />
				<input type="password" name="password" placeholder="Password" required />
				<input type="submit" name="login" value="Log In" />
				<div id="forget"><a href="forgetpass.php">Forget Password</a>
				<a href="signup.php">Create a New account</a><div>
			</fieldset>
		</form>
	</div>
</div>
<?php include('footer.php') ?>
</body>
</html>