<?php 
session_start();
include('../config.php'); ?>

<?php include('adminlog_header.php') ?>

<div id="container">
	<div class="content">
		<div id="manage_post">
		<?php

			$page = isset($_GET['page'])? $_GET['page'] : 1;

			if ($page == "" || $page == "1") {
				$page1 = 0;
			}
			else{
				$page1 = ($page * 5) - 5;
			}

			$sql = "SELECT * FROM post ORDER BY id DESC LIMIT $page1, 5";
			$result = mysql_query($sql, $conn);
			while ($row = mysql_fetch_array($result)) {
				echo "<div id='post_art'>";
				echo "<a id='edit_post' href='update_post.php?id=".$row['id']."'>Edit/Delete</a>";
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

			$sql1 = "SELECT * FROM post ORDER BY id DESC";
			$result1 = mysql_query($sql1, $conn);
			$row = mysql_num_rows($result1);

			$stmt = $row/5;
			$stmt = ceil($stmt);
			echo "<br>";
			echo "<br>";

				for ($i=1; $i <= $stmt; $i++) { 
					?><a id="pagination" href="manage_post.php?page=<?php echo $i; ?>"><?php echo $i." "; ?></a><?php
				}
		?>
		</div>
	</div>
</div>
</body>
</html>
