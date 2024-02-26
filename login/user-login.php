<?php
require_once '../inc/connect.php';
$username = $password = "";
$user_err = "";
//for emp-login
if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['call_type']) && $_POST['call_type'] == "emp_login")) {

    $username = app_db()->CleanDBData($_POST["username"]);
    $password = app_db()->CleanDBData($_POST["password"]);
    // Check if username is empty
    if (empty(trim($username)) or empty(trim($password))) {
        $user_err = " تاكد من ادخال جميع الحقول ";
        echo json_encode(array(
            'status' => 'error',
            'msg' => $user_err,
        ));
        die();
    } else if (empty(trim($user_err))) {
        $q1 = app_db()->Select("SELECT * FROM `librarian` WHERE NameOfUser='$username';");
        if ($q1 != null) {

            $q2 = app_db()->Select("SELECT librarian.UserName,librarian.NameOfUser,librarian.ContactNo,librarian.Email,librarian.Photo,accounttype.Type_Name FROM `librarian` JOIN accounttype on librarian.Type_ID= accounttype.Type_ID  WHERE NameOfUser='$username' AND password='$password';");
            if ($q2 != null) {
                try {
                    session_start();
                    foreach ($q2 as $row) {
                        $_SESSION["loggedin"] = true;
                        $_SESSION["phone"] = $row['ContactNo'];
                        $_SESSION["email"] = $row['Email'];
                        $_SESSION["type"] = $row['Type_Name'];
                        $_SESSION["NameOfUser"] = $row['NameOfUser'];
                        $_SESSION["name"] = $row['UserName'];
                        $_SESSION["img"] = $row['Photo'];
                    }
                    //    echo json_encode($q2);
                    echo json_encode(array(
                        'status' => 'success',
                        'msg' => 'no',
                    ));
                    // header("location:../lib-mgt/index.php");
                    // Store data in session variables
                } catch (Exception $ex) {

                    // $user_err = "حدث خطأ حاول مجدداً";
                    $user_err = $ex->getMessage();
                    echo json_encode(array(
                        'status' => 'error',
                        'msg' => $user_err,
                    ));
                    die();
                }
                die();
            } else {
                $user_err = "خطا في كلمة المرور";
                echo json_encode(array(
                    'status' => 'error',
                    'msg' => $user_err,
                ));
                die();
            }
        } else {
            $user_err = "خطا في اسم المستخدم";
            echo json_encode(array(
                'status' => 'error',
                'msg' => $user_err,
            ));
            die();
        }
    }
} //end emp login
//for user-login
if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['call_type']) && $_POST['call_type'] == "user_login")) {
    $user_err='';
    $username = app_db()->CleanDBData($_POST["username"]);
    $password = app_db()->CleanDBData($_POST["password"]);
    // Check if username is empty
    if (empty(trim($username)) or empty(trim($password))) {
        $user_err = " تاكد من ادخال جميع الحقول ";
        echo json_encode(array(
            'status' => 'error',
            'msg' => $user_err,
        ));
        die();
    } 
    else if (empty(trim($user_err))) {
        $q1 = app_db()->Select("SELECT * FROM `account` WHERE UserName='$username' ;");
        if ($q1) {

            $q2 = app_db()->Select("SELECT account.Account_ID,account.Status,account.UserName,accounttype.Type_Name FROM `account`JOIN accounttype ON account.Type_ID=accounttype.Type_ID WHERE account.UserName='$username' and account.password='$password';");
            if ($q2 != null) {
                try {
                    $type_name = '';
                    $account_id;
                    $account_name = '';
                    $ac_status;

                    // session_start();
                    foreach ($q2 as $row) {
                        // $_SESSION["loggedin"] = true;
                        // $_SESSION["type"] = $row['Type_Name']; 
                        $type_name = $row['Type_Name'];
                        // $_SESSION["name"] =$row['UserName']; 
                        $account_id = $row['Account_ID'];
                        $account_name = $row['UserName'];
                        $ac_status = $row['Status'];
                    }
                    if ($ac_status == 1) {
                        if ($type_name != '') {
                            if ($type_name == "طالب") {
                                $q3 = app_db()->Select("SELECT student.Student_Name,student.PhoneNamber,student.Photo,student.Email FROM `student`WHERE student.Account_ID=$account_id");
                                if ($q3 != null) {

                                    session_start();
                                    foreach ($q3 as $row) {
                                        $_SESSION["loggedin"] = true;
                                        $_SESSION["id"] = $account_id;
                                        $_SESSION["phone"] = $row['PhoneNamber'];
                                         $_SESSION["email"] = $row['Email'];
                                        $_SESSION["type"] = $type_name;
                                        $_SESSION["NameOfUser"] = $row['Student_Name'];
                                        $_SESSION["name"] = $account_name;
                                        $_SESSION["img"] = $row['Photo'];
                                        die();
                                    }
                                    echo json_encode(array(
                                        'status' => 'success',
                                        'msg' => 'no',
                                    ));
                                } else {
                                    $user_err = "معذرة حدث خطأ غير متوقع لطالب";
                                    echo json_encode(array(
                                        'status' => 'error',
                                        'msg' => $user_err,
                                    ));
                                    die();
                                }
                            } else if ($type_name == 'استاذ') {
                                //for the teacher
                                $q3 = app_db()->Select("SELECT teacher.Teacher_Name,teacher.Photo,teacher.PhoneNamber,teacher.Email FROM `teacher` WHERE teacher.Account_ID=$account_id");
                                if ($q3 != null) {

                                    session_start();
                                    foreach ($q3 as $row) {
                                        $_SESSION["loggedin"] = true;
                                        $_SESSION["id"] = $account_id;
                                        $_SESSION["phone"] = $row['PhoneNamber'];
                                        $_SESSION["email"] = $row['Email'];
                                        $_SESSION["type"] = $type_name;
                                        $_SESSION["NameOfUser"] = $row['Teacher_Name'];
                                        $_SESSION["name"] = $account_name;
                                        $_SESSION["img"] = $row['Photo'];
                                      
                                    }
                                    echo json_encode(array(
                                        'status' => 'success',
                                        'msg' => 'no',
                                    ));
                                    die();
                                } else {
                                    $user_err = " معذرة حدث خطأ غير متوقع للاستاذ";
                                    echo json_encode(array(
                                        'status' => 'error',
                                        'msg' => $user_err,
                                    ));
                                    die();
                                }
                            } else if ($type_name == "موظف") {
                                $user_err = "معذرة حدث خطأ   غير متوقع";
                                echo json_encode(array(
                                    'status' => 'error',
                                    'msg' => $user_err,
                                ));
                                die();
                            }
                        } else {
                            $user_err = "معذرة حدث خطأ غير متوقع للكل فاضي";
                            echo json_encode(array(
                                'status' => 'error',
                                'msg' => $user_err,
                            ));
                            die();
                        }
                    } else {

                        $user_err = "الحساب غير نشط";
                        echo json_encode(array(
                            'status' => 'error',
                            'msg' => $user_err,
                        ));
                        die();
                    }
                } catch (Exception $ex) {

                    // $user_err = "حدث خطأ حاول مجدداً";
                    $user_err = $ex->getMessage();
                    echo json_encode(array(
                        'status' => 'error',
                        'msg' => $user_err,
                    ));
                    die();
                }
            } else {
                $user_err = "خطا في كلمة المرور";
                echo json_encode(array(
                    'status' => 'error',
                    'msg' => $user_err,
                ));
                die();
            }
        } else {
            $user_err = "خطا في اسم المستخدم";
            echo json_encode(array(
                'status' => 'error',
                'msg' => $user_err,
            ));
            die();
        }
    }
}
