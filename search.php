<?php 
session_start();
include('config.php') ?>

<?php include('header.php') ?>

<div id="container">
	<?php include('sidebar.php') ?>
	<div class="content">
		<?php
			if (isset($_POST['submit'])) 
			{
					$search = $_POST['search'];
					$search = preg_replace("#[^0-9a-z]#i", "", $search);
					$sql = "SELECT * FROM post WHERE title LIKE '%$search%' OR blog_entry LIKE '%$search%' OR category LIKE '%$search%' OR sub_category LIKE '%search%' ORDER BY id DESC";
					$result = mysql_query($sql, $conn);
					if(mysql_num_rows($result)>0)
					{
						while($row = mysql_fetch_array($result))
						{
							echo "<div id='post_art'>";
							echo "<h3>" . $row['title'] . "</h3><br>";
							echo "<span>" . $row['time'] . "</span><br>";
							if ($row['post_image']==false) {
							echo "";
							}
							else{
								echo "<span>" . "<img width='auto' height='auto' border-radius='50%'' src='data:image;base64, {$row['post_image']}' alt='img'>" . "</span><br>";
							}
							echo "<span>" . $row['blog_entry'] . "</span><br>";
							echo "<span>" . $row['category'] . "</span><br>";
							echo "<span>" . $row['sub_category'] . "</span>";
							echo "</div>";
						}
					}
					else{
						echo "<span>Search result for '$search' is not found!</span>";
					}
			}
		?>
	</div>
</div>

</body>
</html>