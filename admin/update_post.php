<?php 
session_start();
include('../config.php'); ?>

<?php include('adminlog_header.php') ?>

<div id="container">
	<div class="content">
		<div id="update_post">
			<?php
				$id = $_GET['id'];
				$sql = "SELECT * FROM post WHERE id = $id";
				$result = mysql_query($sql, $conn);
				while($row = mysql_fetch_array($result))
				{
					echo "<h1>Edit the post</h1>";
					echo "<a href='admin.php'>Admin menu</a>";		
					echo "<form id='update_form' method='post' enctype='multipart/form-data'>";
					echo "<label>Title:</label><br><input type='text' name='title' value='" . $row['title'] . "' maxlength='200' required /><br>";
					echo "<label>Post Image:</label><br> " . "<img width='200px' height='200px' src='data:image;base64, {$row['post_image']}' alt='img'>" . "<br>";
					echo "<input type='file' name='image' />";
					echo "<label>Post:</label><br><textarea type='text' name='blog_entry' required >" . $row['blog_entry'] . "</textarea><br>";
					echo "<label>Category:</label><br><input type='text' name='category' value='" . $row['category'] . "' required /><br>";
					echo "<label>Sub-Category:</label><br><input type='text' name='sub_category' value='" . $row['sub_category'] . "' required /><br>";
					echo "<button type='submit' name='update'>Update</button><button type='submit' name='delete'>Delete</button>";
					echo  "</form>";
				}
			?>
			<?php
				if (isset($_POST['update'])) 
				{
					$id = $_GET['id'];
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
						$sql = "UPDATE post SET title = '$title', post_image = '$image', blog_entry = '$blog_entry', category = '$category', sub_category = '$sub_category', time = NOW() WHERE id = $id";
						$result = mysql_query($sql, $conn);
						if(!$result)
						{
							echo "error in update";
						}
					}
				}

				if (isset($_POST['delete'])) 
				{
					$id = $_GET['id'];
					$sql = "DELETE FROM post WHERE id = $id";
					$result = mysql_query($sql, $conn);
					if(!$result)
					{
						echo "failed to delete";
					}
				}
			?>
		</div>
	</div>
</div>
</body>
</html>