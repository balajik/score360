<?php include('config.php') ?>

<?php include('log_header.php') ?>

<div id="container">
	
	<div class="content">
		<form id="forgot_pass" method="post" action="forgetpass.php" autocomplete="off">
			<fieldset>
				<legend>Forgot Password</legend>
				<input type="email" name="email" placeholder="Email ID" required />
				<input type="submit" name="reset" value="Reset Password" />
			</fieldset>
		</form>
		<?php
	if(isset($_POST["reset"])) {
				$email = $_POST["email"];
				$sql = "SELECT question FROM users WHERE email = '$email'";
				$result = mysql_query($sql, $conn);
				if(!$result){
					echo "Not a valid email id";
				}
				else
				{
					while($row = mysql_fetch_array($result))
					{
					echo "<form id='sec_check' method='post' action='forgetpass.php'>";
					echo "<p>" . "{$row['question']}" . "</p>";
					echo "<input type='text' name='ans_given' placeholder='Answer Here' required />";
					echo "<input type='submit' name='submit' />";
					echo "</form>";
					}
				if(isset($_POST['submit'])){
				$answer = $_POST['ans_given'];
				$sql = "SELECT answer FROM users WHERE email = '$email'";
				$result = mysql_query($sql, $conn);
				if($result == $_POST['ans_given'])
				{
					echo "<form id='change_pass' method='post' action='forgetpass.php'>";
					echo "<input type='text' name='new_pass' placeholder='New Password' required />";
					echo "<input type='text' name='confirm_new_pass' placeholder='Confirm New Password' required />";
					echo "<input type='submit' name='submit' />";
					echo "</form>";
				}
				else
				{
					echo "wrong";
				}
			}
				}
			}
?>
		<?php
			
?>
	</div>
</div>

<?php include('footer.php') ?>

</body>
</html>