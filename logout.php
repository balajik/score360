<?php
session_start();
session_destroy();
header("location:login.php?mes=You are logged out.");
?>