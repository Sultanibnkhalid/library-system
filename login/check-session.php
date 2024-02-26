<?php

$user_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['call_type']) && $_POST['call_type'] == "check_login_info")) {
    try{
  

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (session_status() == PHP_SESSION_NONE) {
        echo json_encode(array(
            'status' => 'error',
            'msg' => $user_err,
        ));
        die();
    }

    if (isset($_SESSION['type']) && ($_SESSION['type'] != 'موظف')) {
        echo json_encode(array(
            'status' => 'success',
            'login' => $_SESSION["loggedin"],
            // 'id'=>$_SESSION["id"],
            'type' => $_SESSION["type"],
            'phone' => $_SESSION["phone"],
            'email' => $_SESSION["email"],
            'NameOfUser' => $_SESSION["NameOfUser"],
            'name' => $_SESSION["name"],
            'img' => $_SESSION["img"],
        ));
       // die();
    }

   else if (isset($_SESSION['type']) && ($_SESSION['type'] == 'موظف')) {
        echo json_encode(array(
            'status' => 'success',
            'login' => $_SESSION["loggedin"],
            // 'id'=>$_SESSION["img"],
            'type' => $_SESSION["type"],
            'phone' => $_SESSION["phone"],
            'email' => $_SESSION["email"],
            'NameOfUser' => $_SESSION["NameOfUser"],
            'name' => $_SESSION["name"],
            'img' => $_SESSION["img"]
        ));
        die();
    }
    else{
        echo json_encode(array(
            'status' => 'error',
            'msg' =>'حدث خطأ',
    
        ));
    }
}catch(Exception $ex){
    echo json_encode(array(
        'status' => 'error',
        'msg' => $ex->getMessage(),

    ));
}
}

?>