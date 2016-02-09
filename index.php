<?php include('config.php') ?>

<?php 
session_start();
if (!isset($_SESSION['username'])) {
	header("location:login.php?mes=Please Login here.");
}
?>

<?php include('header.php') ?>

<div id="container">
<?php include('sidebar.php') ?>
	<div class="content">
		<div id="usercount">
			<?php include('usercount.php') ?>
		</div>
		<p>Hi, <?php echo $_SESSION['username']; ?> Welcome To Scores.</p>
		<!--<div id="newsfeed">

		</div>-->
			<?php

			$page = isset($_GET['page'])? $_GET['page'] : 1;

			if ($page == "" || $page == "1") 
			{
				$page1 = 0;
			}
			else
			{
				$page1 = ($page * 5) - 5;
			}

			$sql = "SELECT * FROM post ORDER BY id DESC LIMIT $page1, 5";
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
				echo "<span id='blog_entry'>" . substr($row['blog_entry'], 0, 300) . "...</span>";
				echo "<a id='readmore' href='post.php?id=". $row['id'] ."'>Read More>></a><br><br>";
				echo "<span id='category'><a id='label' href='label.php?category=". $row['category'] ."'>" . $row['category'] . "</a></span>&nbsp;";
				echo "<span id='sub_category'><a id='label' href='label.php?sub_category=". $row['sub_category'] ."'>" . $row['sub_category'] . "</a></span><br><br>";
				echo "<span><a href='http://www.facebook.com' target='_blank'><img width='30px' height='30px' src='images/fb.png' /></a><a href='http://www.twitter.com' target='_blank'><img width='30px' height='30px' src='images/twitter.png' /></a><a href='http://www.plus.google.com' target='_blank'><img width='30px' height='30px' src='images/google+.png' /></a><a href='http://www.instagram.com' target='_blank'><img width='30px' height='30px' src='images/instagram.png' /></a></span>";
				echo "</div>";
			}

			$sql1 = "SELECT * FROM post ORDER BY id DESC";
			$result1 = mysql_query($sql1, $conn);
			$row = mysql_num_rows($result1);

			$stmt = $row/5;
			$stmt = ceil($stmt);
			echo "<br>";
			echo "<br>";

				for ($i=1; $i <= $stmt; $i++) 
				{ 
					?><a id="pagination" href="index.php?page=<?php echo $i; ?>"><?php echo $i." "; ?></a><?php
				}
		?>
	</div>
</div>
</body>
</html>