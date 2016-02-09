<?php 
session_start();
include('../config.php'); ?>

<?php include('adminlog_header.php') ?>

<div id="container">
	<div class="content">
		<div id="new_post">
		<h1>Create video  post</h1><br>
		<a href="admin.php">Admin menu</a>
			<form method="post" action="video_post.php" enctype="multipart/form-data">
				<input type="text" name="video_title" /><br>
				<input type="file" name="file" /><br>
				<input type="submit" name="submit" />
			</form>

<?php
if(isset($_POST['submit']))
{    
    $video_title = $_POST['video_title'];
 	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder="../images/";
 
    move_uploaded_file($file_loc,$folder.$file);
    $sql="INSERT INTO video (video_title, file, type, size) VALUES ('video_title', '$file', '$file_type', '$file_size')";
    $result = mysql_query($sql);
}
    ?>
    <?php
      $sql="SELECT * FROM video";
      $result_set=mysql_query($sql,$conn);
      while($row=mysql_fetch_array($result_set))
        {
			echo $row['video_title'];
          echo $row['file'];
          echo $row['type'];
          echo $row['size'];
          ?>
          <a href="../images/<?php echo $row['file'] ?>" target="_blank">view file</a><?php
 }
?>
		</div>
	</div>
</div>
</body>
</html>