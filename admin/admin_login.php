<?php 
session_start();
include('../config.php') ?>

<?php 
if (isset($_SESSION['adminname'])) {
	header("location:admin.php");
}
?>

<?php include('adminlog_header.php') ?>

<div id="container">
	
	<div class="content">
		<?php
			if (isset($_GET["mes"])) {
				echo $_GET["mes"];
			}
		?>
		<form id="login" method="post" action="admin_login.php" autocomplete="off">
			<fieldset>
				<legend>Admin Log In</legend>
				<input type="text" name="adminname" placeholder="Username" required />
				<input type="password" name="password" placeholder="Password" required />
				<input type="submit" name="login" value="Log In" />
				<div id="forget"><a href="admin_signup.php">Create a New account</a><div>
			</fieldset>
		</form>
		<?php
			if(isset($_POST["login"])) {
				$adminname=$_POST["adminname"];
				$password=$_POST["password"];
				if($username!=""&&$password!=""){
					$sql = "SELECT id, adminname, password FROM admin WHERE adminname='$adminname' AND password='$password'";
					$result = mysql_query($sql, $conn);
					if(mysql_num_rows($result)==1) {
						$_SESSION["adminname"]=$adminname;
						header("location: admin.php");
					}
					else{
						echo "Invalid username or password";
					}
				}
				else{
					echo "enter the username and password";
				}
			}
		?>
	</div>
</div>
</body>
</html>