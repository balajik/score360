<?php
session_start();
session_destroy();
header("location:admin_login.php?mes=You are logged out.");
?>