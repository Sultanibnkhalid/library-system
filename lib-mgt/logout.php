<?php
// include '../inc/connect.php';
// include '../inc/emp-login.php';
include '../inc/user-login.php';
 session_start();
// log the user out and destroy the session
session_unset();
session_destroy();
// redirect the user to the login page
header("Location: login.php");
exit;
?>