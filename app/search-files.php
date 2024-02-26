<?php
include_once '../inc/connect.php';
//select all students
if (isset($_POST['call_type']) && $_POST['call_type'] == "document") {
    $query;
	$text_to_search = app_db()->CleanDBData($_POST['text']);
    $id= app_db()->CleanDBData($_POST['id']);
    if($id){
        $query = app_db()->Select("SELECT document.Document_ID,document.Document_Title,document.Subject,document.Photo,document.Pages,document.NumberOfCopies,document.Locker_No,document.status,document.FileName,document.Author,document.PublishingYear,college.College_Name FROM `document`
        JOIN `college` on document.collage_ID=college.College_ID WHERE CONCAT(document.Document_Title,document.Subject,document.Author,document.PublishingYear) LIKE '%$text_to_search%' and document.collage_ID=$id ;");
    }else{
        $query = app_db()->Select("SELECT document.Document_ID,document.Document_Title,document.Subject,document.Photo,document.Pages,document.NumberOfCopies,document.Locker_No,document.status,document.FileName,document.Author,document.PublishingYear,college.College_Name FROM `document`
        JOIN `college` on document.collage_ID=college.College_ID WHERE CONCAT(document.Document_Title,document.Subject,document.Author,document.PublishingYear) LIKE '%$text_to_search%' ;"); 
    }
	
   $output=array();
   if($query){
       foreach($query as $row){
        $item=array();
        $item['id']=$row["Document_ID"];
        $item['title']=$row["Document_Title"];
        $item['subject']=$row["Subject"];
        $item['status']=$row["status"];
        $item['category']=$row["College_Name"];
        $item['date']=$row["PublishingYear"];
        $item['FileName']=$row["FileName"];
        $item['author']=$row["Author"];
        $item['Locker_No']=$row["Locker_No"];
        $item['copies']=$row["NumberOfCopies"];
        $item['pages']=$row["Pages"];
        $item['img']=$row["Photo"];
        array_push($output,$item);
       }
       echo json_encode($output);
       die();
    }
    die();
}
//search book
if (isset($_POST['call_type']) && $_POST['call_type'] == "book") {
	$text_to_search = app_db()->CleanDBData($_POST['text']);
    $id= app_db()->CleanDBData($_POST['id']);

    if($id){
        $query = app_db()->Select("SELECT book.Book_ID,book.FileName,book.Book_Title,book.Author,book.Subject,book.Photo,book.Publisher,book.Publishing_Date, book.Pages,book.NumberOfCopies,book.Locker_No,book.status,category.Category_Name FROM book join category on book.Category_ID=category.Category_ID where CONCAT(book.Book_Title,book.Author,book.Subject)LIKE '%$text_to_search%'  and book.Category_ID=$id;");
    }else{
        $query = app_db()->Select("SELECT book.Book_ID,book.FileName,book.Book_Title,book.Author,book.Subject,book.Photo,book.Publisher,book.Publishing_Date, book.Pages,book.NumberOfCopies,book.Locker_No,book.status,category.Category_Name FROM book join category on book.Category_ID=category.Category_ID where CONCAT(book.Book_Title,book.Author,book.Subject)LIKE '%$text_to_search%' ;");
    }
	
    $output=array();
   if($query){
       foreach($query as $row){
        $item=array();
        $item['id']=$row["Book_ID"];
        $item['title']=$row["Book_Title"];
        $item['subject']=$row["Subject"];
        $item['status']=$row["status"];
        $item['author']=$row["Author"];
        $item['category']=$row["Category"];
        $item['date']=$row["Publishing_Date"];
        $item['FileName']=$row["FileName"];
        $item['Locker_No']=$row["Locker_No"];
        $item['copies']=$row["NumberOfCopies"];
        $item['pages']=$row["Pages"];
        $item['img']=$row["Photo"];
        array_push($output,$item);
       }
       echo json_encode($output);
       die();
    }
    die();
}

