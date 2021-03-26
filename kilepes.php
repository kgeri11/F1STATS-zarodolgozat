<?php
session_start();
session_destroy();
session_unset();
unset($_SESSION['email']);
$_SESSION['message'] = "Kijelentkezett!";
header("location: index.php");