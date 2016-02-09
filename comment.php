<div id="comment">
			<form method="post" name="comment" autocompete="off">
				<fieldset>
					<legend>Comments</legend>
					<?php 
					if (isset($_SESSION["username"]))  
					{ 
						$sql = "SELECT profile_pic FROM users WHERE username = '" .$_SESSION['username']. "'"; 
						$result = mysql_query($sql, $conn); 
							while ($row = mysql_fetch_assoc($result)) 
							{
								echo "<img id='comment_pic' width='40px' height='40px' src='data:image;base64, {$row["profile_pic"]}' alt='img'>";
							}
								echo '<input type="text" name="username" value="'.$_SESSION["username"].'" readonly placeholder="username" />'; 
							} 
							else
							{ 
								echo "<a href='login.php'>Please login to comment</a>"; 
							} 
					?>
					<textarea name="comment" placeholder="Comment here!" required></textarea>
					<input type="submit" value="Post" name="submit">
				</fieldset>
			</form>
			<?php
			if(isset($_POST["submit"]))
			{	
				$post_id = $_GET['id'];
				$username = $_POST["username"];
				$comment = $_POST["comment"];
				$sql = "INSERT INTO comments (post_id, username, comment, time) VALUES ('$post_id', '$username','$comment', NOW())";
				mysql_query($sql, $conn);
			}
				$post_id = $_GET['id'];
				$sql = "SELECT * FROM comments WHERE post_id = '$post_id' ORDER BY id DESC";
				$result = mysql_query($sql);
				if (mysql_num_rows($result)>0) 
				{
					while ($row = mysql_fetch_assoc($result)) 
					{
						echo "<p>{$row["username"]}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {$row["time"]}</p>
								<p>{$row["comment"]}</p><hr>";
					}
					
				}
				else
				{
					echo "No Comments Yet!";
				}
				?>
		</div>