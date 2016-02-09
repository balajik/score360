<?php 
session_start();
include('config.php') ?>

<?php include('header.php') ?>

<div id="container">
	<?php include('sidebar.php') ?>
	<div class="content">
		<div id="profile_info">
			<div id="pro_image"><?php if(isset($_SESSION['username'])){ $sql = "SELECT profile_pic FROM users WHERE username = '" .$_SESSION['username']. "'"; 
						$result = mysql_query($sql, $conn); 
						while ($row = mysql_fetch_assoc($result)) {
											echo "<img width='300px' height='300px' border-radius='50%'' src='data:image;base64, {$row["profile_pic"]}' alt='img'>";
					}
				}
					?></div>
			<p>Name: <?php  $sql = "SELECT name FROM users WHERE username = '" .$_SESSION['username']. "'"; 
						$result = mysql_query($sql, $conn); 
						while ($row = mysql_fetch_array($result)) {
											echo "" . $row['name'] . "";
					}
					?>
			</p>
			<p>Username: <?php echo $_SESSION['username']; ?> </p>
			<p>Email ID: <?php $sql = "SELECT email FROM users WHERE username = '" .$_SESSION['username']. "'"; 
						$result = mysql_query($sql, $conn); 
						while ($row = mysql_fetch_array($result)) {
							echo "" . $row['email'] . "";
					}
					?> 
			</p>
			<p>Password: <?php $sql = "SELECT password FROM users WHERE username = '" .$_SESSION['username']. "'"; 
						$result = mysql_query($sql, $conn); 
						while ($row = mysql_fetch_array($result)) {
							echo "" . $row['password'] . "";
					}
					?>
			</p>
		</div>
	</div>
</div>

</body>
</html>