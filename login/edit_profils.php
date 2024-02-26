<?php
require_once '../inc/connect.php';

$user_name='';
$user_pass='';
$user_type='';
$arr_err='';

if(isset($_POST['call_type']) && $_POST['call_type'] =="reset_password")
{
    $new_password=app_db()->CleanDBData($_POST['npassword']);
    $old_password=app_db()->CleanDBData($_POST['oldpassword']);


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (session_status() == PHP_SESSION_NONE) {
        header('Location: login.php');
        exit();
    }
    //check librarian
    else if(isset($_SESSION['type']) && $_SESSION['type']=='موظف'){
      $user_name=$_SESSION['NameOfUser'];
      $q1=app_db()->Select("SELECT * FROM `librarian` WHERE librarian.NameOfUser='$user_name' and librarian.password='$old_password';");
      if($q1){
        foreach($q1 as $row){
            $user_pass=$row['password'];
        }
        if($user_pass!='' && $old_password===$user_pass ){
            app_db()->Update('librarian',array('password'=>$new_password),array('NameOfUser'=>$user_name,'password'=>$user_pass));
            echo json_encode(array(
                'status' => 'success', 
                'msg' => 'تم تغيير كلمة المرور بنجاح', 
            ));
            die();
        }else{
            echo json_encode(array(
                'status' => 'error', 
                'msg' => 'كلمة المرور التي ادخلتها خاطئة', 
            ));
            die();
        }
      }else{
        echo json_encode(array(
            'status' => 'error', 
            'msg' => ' ان كلمة المرور غير صحيحة', 
        ));
        die();
      }

    }
    else if(isset($_SESSION['type'])&&($_SESSION['type']=='طالب'||$_SESSION['type']=='استاذ')){
        $user_name=$_SESSION['name'];
        $q1 = app_db()->Select("SELECT * from `account` where account.UserName='$user_name' and account.password='$old_password' ;");
        //account.Account_ID,account.Status,account.UserName,accounttype.Type_Name FROM `account`JOIN accounttype ON account.Type_ID=accounttype.Type_ID WHERE UserName='$username' and password='$password';"
        // $q1=app_db()->Select("SELECT password FROM `librarian` WHERE NameOfUser='$user_name';");
        if($q1>0){
          foreach($q1 as $row){
              $user_pass=$row['password'];
          }
          if($user_pass!='' && $old_password===$user_pass ){
              app_db()->Update('account',array('password'=>$new_password),array('UserName'=>$user_name,'password'=>$user_pass));
              echo json_encode(array(
                  'status' => 'success', 
                  'msg' => 'تم تغيير كلمة المرور بنجاح', 
              ));
              die();
          }else{
              echo json_encode(array(
                  'status' => 'error', 
                  'msg' => 'كلمة المرور التي ادخلتها خاطئة', 
              ));
              die();
          }
        }
    }

}
//editit profile
if (isset($_POST['call_type']) && $_POST['call_type'] == "edit_profile_data") 
{
    $new_user_name = app_db()->CleanDBData($_POST['user_name']);
    $new_user_email = app_db()->CleanDBData($_POST['user_email']);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (session_status() == PHP_SESSION_NONE) {
        header('Location: login.php');
        exit();
    }





    //check librarian for edit profil
    if (isset($_SESSION['type']) && $_SESSION['type'] == 'موظف') {

        // if ($user_pass != '' && $old_password === $user_pass) {
        //     app_db()->Update('librarian', array('password' => $new_password), array('NameOfUser' => $user_name, 'password' => $user_pass));
        //     echo json_encode(array(
        //         'status' => 'success',
        //         'msg' => 'تم تغيير كلمة المرور بنجاح',
        //     ));
        //     die();
        // } else {
        //     echo json_encode(array(
        //         'status' => 'error',
        //         'msg' => 'كلمة المرور التي ادخلتها خاطئة',
        //     ));
        //     die();
        // }
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'هذا مخالف للشروط',
        ));
        die();
    }
  
 

//check librarian for edit profil
else if (isset($_SESSION['type']) && ($_SESSION['type'] == 'طالب' || $_SESSION['type'] == 'استاذ')) {
    $id = $_SESSION['id'];
    try{

        app_db()->Update('account',array('UserName'=>$new_user_name),array('Account_ID'=>$id));
        if($_SESSION['type'] == 'طالب'){
            app_db()->Update('student',array('Email'=>$new_user_email),array('Account_ID'=>$id));
        }
        if($_SESSION['type'] == 'استاذ'){
            app_db()->Update('teacher',array('Email'=>$new_user_email),array('Account_ID'=>$id));
        }
        echo json_encode(array(
            'status' => 'success',
            'msg' => 'تم',
        ));
        
        die();
    }catch(Exception $ex){
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'حدث خطأ راجع خطواتك',
        ));
        die();

    }
       
}
}
