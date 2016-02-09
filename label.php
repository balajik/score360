<?php 
session_start();
include('config.php') ?>

<?php include('header.php') ?>

<div id="container">
	<?php include('sidebar.php') ?>
	<div class="content">
		<?php
		if (isset($_GET['category'])) 
		{
			$category = $_GET['category'];
			$sql = "SELECT * FROM post WHERE category = '$category' ORDER BY id DESC";
			$result = mysql_query($sql, $conn);
			while ($row = mysql_fetch_array($result)) 
			{
				echo "<div id='post_art'>";
				echo "<span id='title'><a id='title_id' href='post.php?id=" . $row['id'] ."'>" . $row['title'] . "</a></span><br>";
				echo "<span id='time'>" . $row['time'] . "</span><br><br>";
				if ($row['post_image']==false) 
				{
					echo "";
				}
				else
				{
					echo "<span id='post_image'>" . "<img width='auto' height='auto' border-radius='50%'' src='data:image;base64, {$row['post_image']}' alt='img'>" . "</span><br><br>";
				}
				echo "<span id='blog_entry'>" . $row['blog_entry'] . "</span><br><br>";
				echo "<span id='category'><a id='label' href='label.php?category=". $row['category'] ."'>" . $row['category'] . "</a></span>&nbsp;";
				echo "<span id='sub_category'><a id='label' href='label.php?sub_category=". $row['sub_category'] ."'>" . $row['sub_category'] . "</a></span><br><br>";
				echo "<span><a href='http://www.facebook.com' target='_blank'><img width='30px' height='30px' src='images/fb.png' /></a><a href='http://www.twitter.com' target='_blank'><img width='30px' height='30px' src='images/twitter.png' /></a><a href='http://www.plus.google.com' target='_blank'><img width='30px' height='30px' src='images/google+.png' /></a><a href='http://www.instagram.com' target='_blank'><img width='30px' height='30px' src='images/instagram.png' /></a></span>";
				echo "</div>";
			}
		}
		elseif (isset($_GET['sub_category'])) 
		{
			$sub_category = $_GET['sub_category'];
			$sql = "SELECT * FROM post WHERE sub_category = '$sub_category' ORDER BY id DESC";
			$result = mysql_query($sql, $conn);
			while ($row = mysql_fetch_array($result)) 
			{
				echo "<div id='post_art'>";
				echo "<span id='title'><a id='title_id' href='post.php?id=" . $row['id'] ."'>" . $row['title'] . "</a></span><br>";
				echo "<span id='time'>" . $row['time'] . "</span><br><br>";
				if ($row['post_image']==false) 
				{
					echo "";
				}
				else
				{
					echo "<span id='post_image'>" . "<img width='auto' height='auto' border-radius='50%'' src='data:image;base64, {$row['post_image']}' alt='img'>" . "</span><br><br>";
				}
				echo "<span id='blog_entry'>" . $row['blog_entry'] . "</span><br><br>";
				echo "<span id='category'><a id='label' href='label.php?category=". $row['category'] ."'>" . $row['category'] . "</a></span>&nbsp;";
				echo "<span id='sub_category'><a id='label' href='label.php?sub_category=". $row['sub_category'] ."'>" . $row['sub_category'] . "</a></span><br><br>";
				echo "<span><a href='http://www.facebook.com' target='_blank'><img width='30px' height='30px' src='images/fb.png' /></a><a href='http://www.twitter.com' target='_blank'><img width='30px' height='30px' src='images/twitter.png' /></a><a href='http://www.plus.google.com' target='_blank'><img width='30px' height='30px' src='images/google+.png' /></a><a href='http://www.instgram.com' target='_blank'><img width='30px' height='30px' src='images/instagram.png' /></a></span>";
				echo "</div>";
			}
		}
		?>
		
	</div>
</div>

</body>
</html>