<?php 
session_start();
include('config.php') ?>

<?php include('header.php') ?>

<div id="container">
	<?php include('sidebar.php') ?>
	<div class="content">
		<div id="chat">
			<div id="chat_place">
				<?php
					if (isset($_POST["send"])) {
						$username = $_SESSION["username"];
						$message = $_POST["message"];
						$sql = "SELECT profile_pic FROM users WHERE username = '" .$_SESSION['username']. "'"; 
						$result = mysql_query($sql, $conn); 
						$row = mysql_fetch_assoc($result);
						$profile_pic = $row['profile_pic'];
						$sql = "INSERT INTO chat (username, profile_pic, message, time) VALUES ('$username', '$profile_pic', '$message', NOW())";
						mysql_query($sql, $conn);
					}
					if(isset($_SESSION['username']))
					{ 
						{
						$sql1 = "SELECT * FROM chat ORDER BY id ASC";
						$result1 = mysql_query($sql1, $conn);
						if (mysql_num_rows($result1)>0) 
						{
							while ($row1 = mysql_fetch_assoc($result1)) 
							{
								echo "<div id='own_chat'>
								<img id='comment_pic' width='40px' height='40px' src='data:image;base64, {$row1["profile_pic"]}' alt='img'>
								<span id='chat_name'>{$row1["username"]}</span>
								<div id='own_msg'>
								<span id='chat_data'>{$row1["message"]}</span>
								<span id='chat_time'>{$row1["time"]}</span>
								</div>
								</div>";
							}
						}
						else
						{
							echo "No chat Yet!";
						}
						}
				}
				?>
				<?php
				
				?>
			</div>
			<div id="chat_msg">
				<form method="post" action="chat.php" autocomplete="off">
					<input type="text" name="message" placeholder="Type the message..." required /><input type="submit" name="send" value="Send" />
				</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>