<?php
require_once '../inc/connect.php';

if(isset($_POST['call_type']) && $_POST['call_type'] =="reset_password")
{
    $new_password=app_db()->CleanDBData($_POST['npassword']);
    $old_password=app_db()->CleanDBData($_POST['oldpassword']);
    $user_id=app_db()->CleanDBData($_POST['user_id']);

  
   
     try{
     $rer=   app_db()->Update('account',array('password'=>$new_password),array('Account_ID'=>$user_id,'password'=>$old_password));
     if($rer){
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

     }catch(Exception $ex){
        echo json_encode(array(
            'status' => 'error', 
            'msg' => 'كلمة المرور التي ادخلتها خاطئة', 
        ));
        die();
     }
        
}
//editit profile
if (isset($_POST['call_type']) && $_POST['call_type'] == "edit_profile_data") 
{
    $new_user_name = app_db()->CleanDBData($_POST['user_name']);
    $new_user_email = app_db()->CleanDBData($_POST['user_email']);
    $user_id=app_db()->CleanDBData($_POST['user_id']);
    $user_type=app_db()->CleanDBData($_POST['user_type']);
//check librarian for edit profil
 
   
    try{

       $q1= app_db()->Update('account',array('UserName'=>$new_user_name),array('Account_ID'=>$id));

       if($q1){
        $q2;
        if($user_type == 'طالب'){
           $q2=app_db()->Update('student',array('Email'=>$new_user_email),array('Account_ID'=>$id));
        }
        if($user_type  == 'استاذ'){
            $q2=app_db()->Update('teacher',array('Email'=>$new_user_email),array('Account_ID'=>$id));
        }
        if($q2){
            echo json_encode(array(
                'status' => 'success',
                'msg' => 'تم',
            ));
            
            die();
        }
        else if(!$q2){

            echo json_encode(array(
                'status' => 'error',
                'msg' => 'حدث خطأ راجع خطواتك',
            ));
            die();
        }
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'حدث خطأ راجع خطواتك',
        ));
        die();



       }
       
    }catch(Exception $ex){
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'حدث خطأ راجع خطواتك',
        ));
        die();

    }
       
 
}
