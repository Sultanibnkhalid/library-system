<?php
// include '../inc/connect.php';
// include '../inc/emp-login.php';
include 'user-login.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['type']) && ($_SESSION['type'] != 'موظف')){
    session_unset();
    session_destroy();
    header("Location: ../index.html");
}
if(isset($_SESSION['type']) && ($_SESSION['type'] == 'موظف')){
    session_unset();
    session_destroy();
    header("Location: ../lib-mgt/index.php");
}
else{
    if(isset($_SESSION['type']) && ($_SESSION['type'] == 'موظف')){
        session_unset();
        session_destroy();
        header("Location: ../index.php");
    }
}
exit;
?>