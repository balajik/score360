<?php 
session_start();
include('config.php') ?>

<?php include('header.php') ?>

<div id="container">
  <?php include('sidebar.php') ?>
  <div class="content">
   <video id="my-video" class="video-js" controls preload="auto" width="640" height="264"
  poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
    <source src="http://www.html5videoplayer.net/videos/toystory.mp4" type='video/mp4'>
    <source src="http://clips.vorwaerts-gmbh.de/big_buck_bunny.webm" type='video/webm'>
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
  </video>
  
</div>
</div>

<script src="http://vjs.zencdn.net/5.4.6/video.js"></script>

</body>
</html>