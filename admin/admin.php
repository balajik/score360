<?php include('../config.php'); ?>

<?php 
session_start();
if (!isset($_SESSION['adminname'])) {
	header("location:admin_login.php?mes=Please Login here.");
}
?>

<?php include('adminlog_header.php') ?>

<div id="container">
	<div class="content">
		<h2>Admin Menu</h2>
			<!--Navigation-->
			<div id="navigation">
				<ul>
					<li><a href="add_post.php">Add new post</a></li>
					<li><a href="video_post.php">Video post</a></li>
					<li><a href="manage_post.php">Manage posts</a></li>
					<li><a href="../index.php" target="_blank">view blog</a></li>
				</ul>
			</div><!--Navigation end-->
	</div>
</div>
</body>
</html>
