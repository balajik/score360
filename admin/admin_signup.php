<?php include('../config.php') ?>

<?php include('adminlog_header.php') ?>

<div id="container">
	<div class="content">
		<form id="signup" name="signup" action="admin_signup.php" method="post" enctype="multipart/form-data" autocomplete="off">
			<fieldset>
				<legend>Admin Sign Up</legend>
				<input type="text" name="name" placeholder="Name" required />
				<input type="text" name="adminname" id="username" placeholder="Username" required />
				<input type="password" id="pass" name="password" placeholder="Password" required />
				<input type="submit" name="submit" value="Sign Up" />
				<a id="already" href="admin_login.php">Already a admin?</a><div>
			</fieldset>
		</form>
<?php
if(isset($_POST['submit'])){
$name = $_POST['name'];
$adminname = $_POST['adminname'];
$password = $_POST['password'];

$sql = "INSERT INTO admin (id, name, adminname, password) VALUES (NULL, '$name', '$adminname', '$password')";
$stmt = mysql_query($sql, $conn);
  if(!$stmt){
  	echo "Insertion failed";
  }
  else{
  	header("location:admin_login.php");
  }
}
  mysql_close();
?>
	</div>
</div>
</body>
</html>