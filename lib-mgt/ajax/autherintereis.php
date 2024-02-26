<?php
include '../../inc/connect.php';
//insert colage  and its eparts or departs for exsiting collage depends on 
//incomminig data
//start
if (isset($_POST['call_type']) && $_POST['call_type'] == "add_col_and_dep") {

    try {
        $col_id = '';
        $College_Name='';
        $College_Name = app_db()->CleanDBData($_POST['col_name']);
        $departs=[];
        if (isset($_POST['departs'])) {
            $departs = $_POST['departs'];
        }
        $col_id = app_db()->CleanDBData($_POST['col_val']);

        // $departs= app_db()->CleanDBData($_POST['col_name']);
        $tb_col = "college";
        $tb_depart = "department";
        $tb_col_depart = "collegedepartment";
        if ($col_id === '' && $College_Name!='') {
            $query = app_db()->Select("SELECT * from college where College_Name='$College_Name';");
            if (!$query) {


                //  $strTableName= array(
                // 'College_Name'=>$College_Name);

                $col_id = app_db()->Insert($tb_col, array('College_Name' => $College_Name));
                if(count($departs)>0){
                    foreach ($departs as $dep) {
                        $depart_id = app_db()->Insert($tb_depart, array('Department_Name' => $dep));
                        $data_array = array(
                            'Department_ID' => $depart_id,
                            'College_ID' => $col_id
                        );
                        app_db()->Insert($tb_col_depart, $data_array);
                    }
                    echo json_encode(array(
                        'status' => 'success',
                        'msg' => 'تم اضافة الكلية والاقسام  بنجاح',
                    ));
                    die();
                }else{
                    echo json_encode(array(
                        'status' => 'success',
                        'msg' => 'تم اضافة الكلية  بنجاح',
                    ));
                    die();
                }
               
            } else {
                echo json_encode(array(
                    'status' => 'error',
                    'msg' => 'الكلية موجودة مسبقاً اخترها من القائمة',
                ));
                die();
            }
        } elseif ($col_id != '' && count($departs)>0) {
            foreach ($departs as $dep) {
                $depart_id = app_db()->Insert($tb_depart, array('Department_Name' => $dep));
                $data_array = array(
                    'Department_ID' => $depart_id,
                    'College_ID' => $col_id
                );
                app_db()->Insert($tb_col_depart, $data_array);
            }
            echo json_encode(array(
                'status' => 'success',
                'msg' => 'تم اضافة الكلية والاقسام  بنجاح',
            ));
            die();
        }else{
            echo json_encode(array(
                'status' => 'error',
                'msg' => 'لا يمكن الاضافة هكذا',
            ));
            die();
        }
    } catch (Exception $ex) {
        echo json_encode(array(
            'status' => 'error',
            'msg' => $ex->getMessage(),
        ));
        die();
    }
} ////insert colage its eparts  end

//insert catagory start  end
if (isset($_POST['call_type']) && $_POST['call_type'] == "add_cat") {
    $Category_Name = app_db()->CleanDBData($_POST['cat_name']);
    $strTableName = "category";
    $query = app_db()->Select("select * from category where Category_Name='$Category_Name';");
    if ($query < 1) {
        $data_array = array(
            'Category_Name' => $Category_Name
        );
        app_db()->Insert($strTableName, $data_array);
        echo json_encode(array(
            'status' => 'success',
            'msg' => 'تم اضافة صنف جديد',
        ));
        die();
    } else {
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'موجود مسبقا',
        ));
        die();
    }
} ////insert category  end
//connect_cat
//insert department-collage_cat start
if (isset($_POST['call_type']) && $_POST['call_type'] == "connect_cat") {
    $ColDep_ID = app_db()->CleanDBData($_POST['col_dep_id']);
    $Category_ID = app_db()->CleanDBData($_POST['cat_id']);
    $strTableName = "colagedepartmentcategory";
    if(empty($Category_ID)||empty($ColDep_ID)){
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'خظأ',
        ));
        die();
    }
    $query = app_db()->Select("select * from colagedepartmentcategory where ColDep_ID=$ColDep_ID and Category_ID= $Category_ID ;");
    if ($query < 1) {
        $data_array = array(
            'ColDep_ID' => $ColDep_ID,
            'Category_ID' => $Category_ID,
        );
        app_db()->Insert($strTableName, $data_array);
        echo json_encode(array(
            'status' => 'success',
            'msg' => 'تم اضافة الارتباط',
        ));
        die();
    } else {
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'موجود مسبقا',
        ));
        die();
    }
} ////insert departmentcollage_cat  end

/////////
//////////
//here updats collages
///edit collage name
if (isset($_POST['call_type']) && $_POST['call_type'] == "edit_collage") {
    $Col_Name = app_db()->CleanDBData($_POST['col_name']);
    $row_id=app_db()->CleanDBData($_POST['row_id']);
    $strTableName = "college";
    try{
        app_db()->Update($strTableName,array('College_Name' => $Col_Name) ,array('College_ID'=>$row_id));
        echo json_encode(array(
            'status' => 'success',
            'msg' => 'تم التعديل',
        ));
        die();
    } catch(Exception $ex){
        echo json_encode(array(
            'status' => 'error',
            'msg' => $ex->getMessage(),
        ));
        die();
    }
} ///
//edit departName
if (isset($_POST['call_type']) && $_POST['call_type'] == "edit_dep") {
    $dep_Name = app_db()->CleanDBData($_POST['dep_name']);
    $row_id = app_db()->CleanDBData($_POST['row_id']);
    $strTableName = "department";
    try{
        $data_array = array(
            'Department_Name' => $dep_Name
        );
        app_db()->Update($strTableName,array('Department_Name' => $dep_Name) ,array('Department_ID'=>$row_id));
        echo json_encode(array(
            'status' => 'success',
            'msg' => 'تم التعديل',
        ));
        die();
    } catch(Exception $ex){
        echo json_encode(array(
            'status' => 'error',
            'msg' => $ex->getMessage(),
        ));
        die();
    }
}//edit departName end
//editcat start
if (isset($_POST['call_type']) && $_POST['call_type'] == "edit_cat") {
    $dep_Name = app_db()->CleanDBData($_POST['cat_name']);
    $row_id = app_db()->CleanDBData($_POST['row_id']);
    $strTableName = "category";
    try{
       
        app_db()->Update($strTableName,array('Category_Name' => $dep_Name) ,array('Category_ID'=>$row_id));
        echo json_encode(array(
            'status' => 'success',
            'msg' => 'تم التعديل',
        ));
        die();
    } catch(Exception $ex){
        echo json_encode(array(
            'status' => 'error',
            'msg' => $ex->getMessage(),
        ));
        die();
    }
}//edit categorytName end


//
//this 3 condiions for account.php
//
//edit account status start
if (isset($_POST['call_type']) && $_POST['call_type'] == "stop_acount") {
    $row_id = app_db()->CleanDBData($_POST['row_id']);
    $strTableName = "account";
    try{
       
        app_db()->Update($strTableName,array('Status' =>0) ,array('Account_ID'=>$row_id));
        echo json_encode(array(
            'status' => 'success',
            'msg' => 'تم ',
        ));
        die();
    } catch(Exception $ex){
        echo json_encode(array(
            'status' => 'error',
            'msg' => $ex->getMessage(),
        ));
        die();
    }
}//stop account end
//activ account sart
if (isset($_POST['call_type']) && $_POST['call_type'] == "active_acount") {
    $row_id = app_db()->CleanDBData($_POST['row_id']);
    $strTableName = "account";
    try{
       
        app_db()->Update($strTableName,array('Status' =>1) ,array('Account_ID'=>$row_id));
        echo json_encode(array(
            'status' => 'success',
            'msg' => 'تم ',
        ));
        die();
    } catch(Exception $ex){
        echo json_encode(array(
            'status' => 'error',
            'msg' => $ex->getMessage(),
        ));
        die();
    }
}
//send account password start
if (isset($_POST['call_type']) && $_POST['call_type'] == "send_password") {
    $row_id = app_db()->CleanDBData($_POST['row_id']);
    $email= app_db()->CleanDBData($_POST['email']);
    try{
       
        $pass='';
        $q1=app_db()->Select("SELECT account.password FROM account WHERE account.Account_ID=$row_id;");
        if($q1){
            foreach($q1 as $row){
                $pass=$row['password'];
            }
        }
        if($pass!=''){
            echo json_encode(array(
                'status' => 'success',
                'msg' => $pass,
            ));
            die();
        }else{
            echo json_encode(array(
                'status' => 'error',
                'msg' => 'خطأ',
            ));
            die();
        }
       
    } catch(Exception $ex){
        echo json_encode(array(
            'status' => 'error',
            'msg' => $ex->getMessage(),
        ));
        die();
    }
}

//edit account status end