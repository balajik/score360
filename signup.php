<?php include('config.php') ?>

<?php include('log_header.php') ?>

<div id="container">
	<div class="content">
		<form id="signup" name="signup" action="signup.php" method="post" enctype="multipart/form-data" autocomplete="off">
			<fieldset>
				<legend>Sign Up</legend>
				<label>Name:</label><input type="text" name="name" required />
				<label>User Name:</label><input type="text" name="username" id="username" required /><span id="un_check"></span>
				<label>Email ID:</label><input type="email" name="email" required />
				<label>Password:</label><input type="password" id="p1" name="password" required /><p class="error" id="pass_err"></p><p class="correct" id="pass_crr"></p>
				<label>Confirm Password:</label><input type="password" id="p2" name="confirm_password" required /><p class="error" id="pass_err"></p><p class="correct" id="pass_crr"></p>
				<label>Question:</label><select id="question" name="question">
					<option value="What is your fav. color?">What is your fav. color?</option>
					<option value="What is your pet name?">What is your pet name?</option>
					<option value="What is your nick name?">What is your nick name?</option>
				</select>
				<label>Answer:</label><input type="text" name="answer" required />
				<label>Profile Picture:</label><input type="file" name="image" required />
				<input type="submit" name="signup" value="Sign Up" />
				<a id="already" href="login.php">Already a user?</a><div>
			</fieldset>
		</form>
<?php
if(isset($_POST['signup'])){
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$question = $_POST['question'];
$answer = $_POST['answer'];
if (getimagesize($_FILES['image'] ['tmp_name'])==false) {
	echo "please select profile picture";
}
else{
$image=$_FILES['image'] ['tmp_name'];
$image=file_get_contents($image);
$image=base64_encode($image);

$sql = "INSERT INTO users (name, username, email, password, confirm_password, question, answer, profile_pic) VALUES ('$name', '$username', '$email', '$password', '$confirm_password', '$question', '$answer', '$image')";

$stmt = mysql_query($sql, $conn);
  if(!$stmt){
  	echo "Insertion failed";
  }
  else{
  	header("location:login.php");
  }
}
}
  mysql_close();
?>
	</div>
</div>

<?php include('footer.php') ?>

</body>
</html>