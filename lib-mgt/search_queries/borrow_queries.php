<?php

include_once  '../../inc/connect.php';

//select all students
if (isset($_POST['call_type']) && $_POST['call_type'] == "getstudent_names") {
 
    $text_to_search = app_db()->CleanDBData($_POST['text_to_search']);
    $query = app_db()->SELECT("SELECT student.Student_ID,student.Student_Name,student.University_Number,
	student.PhoneNamber,student.Photo,student.Created_on, student.Account_ID, department.Department_Name,college.College_Name,account.Status FROM student,college,department,collegedepartment
	 ,account WHERE collegedepartment.College_ID=college.College_ID AND collegedepartment.Department_ID=department.Department_ID AND collegedepartment.ColDep_ID=student.ColDep_ID AND student.Account_ID = account.Account_ID and( CONCAT(student.Student_Name,student.University_Number) LIKE '%$text_to_search%') ;");
    if ($query) {
 
        echo json_encode($query);
          
    }
}

if (isset($_POST['call_type']) && $_POST['call_type'] == "getbook_names") {
	$text_to_search = app_db()->CleanDBData($_POST['text_to_search']);
	$query = app_db()->Select("SELECT book.Book_ID,book.FileName,book.Book_Title,book.Author,book.Subject,book.Photo,book.Publisher,book.Publishing_Date, book.Pages,book.NumberOfCopies,book.Locker_No,book.status,category.Category_Name FROM book join category on book.Category_ID=category.Category_ID where CONCAT(book.Book_Title,book.Author,book.Subject)LIKE '%$text_to_search%' and book.status>0 ;");
	if ($query) {
        echo json_encode($query);
    }
    }
// for teaher
    if (isset($_POST['call_type']) && $_POST['call_type'] == "getteacher_names") {
 
        $text_to_search = app_db()->CleanDBData($_POST['text_to_search']);
        $query = app_db()->SELECT("SELECT teacher.Teacher_ID,teacher.Teacher_Name,teacher.Photo,teacher.Account_ID,account.Status from teacher JOIN account on teacher.Account_ID=account.Account_ID WHERE  CONCAT(teacher.Teacher_Name,teacher.PhoneNamber) like'%$text_to_search%';");
        if ($query) {
            echo json_encode($query);
        }
    }
    // for doc
    if (isset($_POST['call_type']) && $_POST['call_type'] == "getdoc_names") {
 
        $text_to_search = app_db()->CleanDBData($_POST['text_to_search']);
        $q1=app_db()->Select("SELECT * FROM `document` WHERE concat(Document_Title,document.Subject,document.Author,document.PublishingYear) LIKE '%$text_to_search%';");
        echo json_encode($q1);
    }
//for trans id
    if (isset($_GET['call_type']) && $_GET['call_type'] == "gettrans_id") {
        $q1 = app_db()->select('SELECT MAX(borrow.Transaction_ID)+1 AS id FROM borrow');
        echo json_encode($q1);
    }

    /// ad transiction
    //add_trans
    if (isset($_POST['call_type']) && $_POST['call_type'] == "add_trans") {
      
        try{
            $books=[];
            $docs=[];
            $account_id= app_db()->CleanDBData($_POST['account_id']);
            $due_date=app_db()->CleanDBData($_POST['due_date']);
            if(isset($_POST['books'])){
                $books=$_POST['books'];

            }
            if(isset($_POST['docs'])){
                $docs=$_POST['docs'];

            }
           
            $trans_id=app_db()->CleanDBData($_POST['trans_id']);
    
          
            $trans_tb="borrow";
            $trans_td_tb="borrowdetails";
            $borrow_on=date('Y-m-d');
            $trans_data=array(
                // 'Transaction_ID'=>tr,
                'Account_ID'=>$account_id,
                'Borrow_Date'=>$borrow_on,
                'Due_Date'=>$due_date,
                'status'=>0,
                'Notice'=>'لا يوجد',
            );
           $trans_id=  app_db()->Insert($trans_tb,$trans_data);
            // $sql_id= app_db()->select('SELECT MAX(borrow.Transaction_ID)+1 AS id FROM borrow');
            // $trans_id=$sql_id['id'];
            if($books!=null){

                foreach($books as $book){
                    $tb_data=array(
                        'Transaction_ID'=>$trans_id,
                        'Book_ID'=>$book,
                    );
                    app_db()->Insert($trans_td_tb,$tb_data);
                }
            }
           if($docs!=null){

            foreach($docs as $doc){
                $tb_data=array(
                    'Transaction_ID'=>$trans_id,
                    'Document_ID'=>$doc,
                );
                app_db()->Insert($trans_td_tb,$tb_data);
            }

           }
            
            echo json_encode(array(
                'status' => 'success', 
                'msg' => 'تم حفظ بيانات الاعارة', 
                'trans_id'=>$trans_id,
            ));
            die();
        }catch(Exception $ex){
            echo json_encode(array(
                'status' =>'error', 
                'msg' =>  $ex->getMessage(), 
            ));
            die();
        }
        
    }
?>