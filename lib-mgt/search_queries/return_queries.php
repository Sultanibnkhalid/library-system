<?php

include_once  '../../inc/connect.php';
////get borow students
if (isset($_POST['call_type']) && $_POST['call_type'] == "getStudent") {
    $text_to_search = app_db()->CleanDBData($_POST['text_to_search']);
    $query = app_db()->SELECT("SELECT borrow.Transaction_ID,borrow.Account_ID,student.Student_Name FROM `borrow`JOIN student on borrow.Account_ID=student.Account_ID WHERE    borrow.status=0 and student.Student_Name LIKE '%$text_to_search%'");
    if ($query) {
        echo json_encode($query);        
    }
}
//get borrowed teachers 
if (isset($_POST['call_type']) && $_POST['call_type'] == "getTeacher") {
	$text_to_search = app_db()->CleanDBData($_POST['text_to_search']);
	$query = app_db()->Select("SELECT borrow.Transaction_ID,borrow.Account_ID,teacher.Teacher_Name FROM `borrow`JOIN teacher  on borrow.Account_ID=teacher.Account_ID WHERE    borrow.status=0 and teacher.Teacher_Name LIKE '%$text_to_search%';");
    if ($query) {
        echo json_encode($query);       
    }
}
//get books by account for the user
if (isset($_POST['call_type']) && $_POST['call_type'] == "getBookbyA") {
    $trans_id=app_db()->CleanDBData($_POST['trans_id']);
	$query = app_db()->Select("SELECT borrowdetails.Transaction_ID,borrowdetails.Book_ID,borrow.Borrow_Date,book.Book_Title,book.Photo,book.FileName,book.Author FROM borrowdetails JOIN borrow ON borrowdetails.Transaction_ID=borrow.Transaction_ID  JOIN book ON borrowdetails.Book_ID=book.Book_ID WHERE borrow.status=0 and  borrowdetails.Transaction_ID=$trans_id;");
    if ($query) {
 
        echo json_encode($query);      
    }
}
//
//get docs by account and title
if (isset($_POST['call_type']) && $_POST['call_type'] == "getdocbyA") {
	// $text_to_search = app_db()->CleanDBData($_POST['text_to_search']);
    // $account_id=app_db()->CleanDBData($_POST['account_id']);
    $trans_id=app_db()->CleanDBData($_POST['trans_id']);  
	$query = app_db()->Select("SELECT borrowdetails.Transaction_ID,borrowdetails.Book_ID,borrow.Borrow_Date,document.Document_Title, document.Photo,document.FileName FROM borrowdetails JOIN borrow ON borrowdetails.Transaction_ID=borrow.Transaction_ID JOIN document ON borrowdetails.Document_ID=document.Document_ID WHERE borrow.status=0 and borrowdetails.Transaction_ID=$trans_id");
    if ($query) {
        echo json_encode($query);      
    }
}

//return book
if (isset($_POST['call_type']) && $_POST['call_type'] == "return_books") {
	$trans_id = app_db()->CleanDBData($_POST['trans_id']);
	$fine = app_db()->CleanDBData($_POST['fine']);
    $return_date=date('Y-m-d');
    

    $query=app_db()->Select("SELECT * FROM `returnbook` WHERE Transaction_ID=$trans_id");
    if($query<1){

        $stRTableName='returnbook';
        $stBTableName='borrow';
        $rt_data = array(
            'Transaction_ID' => $trans_id,
            'Return_Date' =>$return_date,
            'Fine' => $fine
        );
        app_db()->Insert($stRTableName,$rt_data);
        app_db()->Update($stBTableName,array('status'=>1),array( 'Transaction_ID'=>$trans_id));


        echo json_encode(array(
            'status' =>'success', 
            'msg' =>  'تم تسجيل  عملية ارجاع واحدة نجاح', 
        ));
        die();
    }
    else{
        echo json_encode(array(
            'status' =>'error', 
            'msg' =>  'هناك خطأ يمنعك من هذه العملية', 
        ));
        die();
    }



}

?>