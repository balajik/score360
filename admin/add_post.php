<?php 
session_start();
include('../config.php'); ?>

<?php include('adminlog_header.php') ?>

<div id="container">
	<div class="content">
		<div id="new_post">
		<h1>Create a new article</h1><br>
		<a href="admin.php">Admin menu</a>
			<form id="post_form" action="add_post.php" enctype="multipart/form-data" method="post">
				<label>Title:</label><br><input type="text" name="title" maxlength="200" required /><br>
				<label>Post Image:</label><br><input type="file" name="image" /><br>
				<label>Post:</label><br><textarea type="text" name="blog_entry" required ></textarea><br>
				<label>Category:</label><br><input type="text" name="category" required /><br>
				<label>Sub-Category:</label><br><input type="text" name="sub_category" required /><br>
				<button type="submit" name="submit">Post it!</button>
			</form>
<?php
	if (isset($_POST['submit'])) 
	{
		$title = $_POST['title'];
		$blog_entry = $_POST['blog_entry'];
		$category = $_POST['category'];
		$sub_category = $_POST['sub_category'];
		if (getimagesize($_FILES['image'] ['tmp_name'])==false) 
		{
			echo "please select post picture";
		}
		else
		{
			$image = $_FILES['image'] ['tmp_name'];
			$image = file_get_contents($image);
			$image = base64_encode($image);

			$sql = "INSERT INTO post (id, title, post_image, blog_entry, category, sub_category, time) VALUES (NULL, '$title', '$image', '$blog_entry', '$category', '$sub_category', NOW())";
			$result = mysql_query($sql, $conn);
			if(!$result)
			{
				echo "Post failed";
			}
			else
			{
				echo "<span id='alert'>Post is successfully posted into the blog.</span>";
			}
		}
	}
?>
		</div>
	</div>
</div>
</body>
</html>