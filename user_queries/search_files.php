<?php
include_once '../inc/connect.php';

if(isset($_GET['call_type']) && $_GET['call_type'] =="get_category")
{
	$q1 = app_db()->select('SELECT * FROM `category`');
	echo json_encode($q1);
	die();
}
//select all books
if (isset($_POST['call_type']) && $_POST['call_type'] == "get_book_by_cat") {
	$text_to_search = app_db()->CleanDBData($_POST['text_search_book']);
	$cat_id = app_db()->CleanDBData($_POST['cat_id']);
	$query='';
	if($cat_id==-1){
		$query = app_db()->Select("SELECT book.Book_ID,book.FileName,book.Book_Title,book.Author,book.Subject,book.Photo,book.Publisher,book.Publishing_Date, book.Pages,book.NumberOfCopies,book.Locker_No,book.status,category.Category_Name FROM book join category on book.Category_ID=category.Category_ID where CONCAT(book.Book_Title,book.Author,book.Subject)LIKE '%$text_to_search%' limit 10;");
	}
	else{
		$query = app_db()->Select("SELECT book.Book_ID,book.FileName,book.Book_Title,book.Author,book.Subject,book.Photo,book.Publisher,book.Publishing_Date, book.Pages,book.NumberOfCopies,book.Locker_No,book.status,category.Category_Name FROM book join category on book.Category_ID=category.Category_ID where book.Category_ID=$cat_id and CONCAT(book.Book_Title,book.Author,book.Subject)LIKE '%$text_to_search%' limit 10 ;");
	}
	
    if($query>0){
        echo json_encode($query);

    }else{
        // echo json_encode(array(
		// 	'status' =>'error', 
		// 	'msg' => 'لا توجد بيانات لهذا السجل', 
		// ));
    }
    die();
}

//get books random
if (isset($_POST['call_type']) && $_POST['call_type'] == "get_books") {	
	$query = app_db()->Select("SELECT book.Book_ID,book.FileName,book.Book_Title,book.Author,book.Subject,book.Photo,book.Publisher,book.Publishing_Date, book.Pages,book.NumberOfCopies,book.Locker_No,book.status,category.Category_Name FROM book join category on book.Category_ID=category.Category_ID where book.Book_ID >=(select FLOOR(MAX(book.Book_ID)*RAND())from `book`) order by Book_ID limit 15");
    if($query>0){
        echo json_encode($query);

    }else{
        // echo json_encode(array(
		// 	'status' =>'error', 
		// 	'msg' => 'لا توجد بيانات لهذا السجل', 
		// ));
    }
    die();
}

// //get docs years and collegs
// SELECT document.collage_ID,document.PublishingYear,college.College_Name FROM document JOIN college ON document.collage_ID=college.College_ID
// GROUP by document.PublishingYear

if(isset($_GET['call_type']) && $_GET['call_type'] =="get_doc_col_year")
{
	$q1 = app_db()->select('SELECT DISTINCT document.collage_ID,document.PublishingYear ,college.College_Name FROM document JOIN college ON document.collage_ID=college.College_ID;');
	echo json_encode($q1);
}



//get chosen docs
// SELECT * FROM document WHERE document.PublishingYear='2024' AND document.collage_ID=1;
if (isset($_POST['call_type']) && $_POST['call_type'] == "get_docs_by_year") {
	$p_year = app_db()->CleanDBData($_POST['p_year']);
	$col_id = app_db()->CleanDBData($_POST['col_id']);
	$text=app_db()->CleanDBData($_POST['text']);
	$q1='';
	if($text!='' && $col_id==-1){
		$q1=app_db()->Select(" SELECT document.Document_ID,document.Document_Title,document.Subject,document.Photo,
		document.Pages,document.NumberOfCopies,document.FileName,document.Author,document.Locker_No,document.PublishingYear,document.status,college.College_Name FROM `document` JOIN `college` ON document.collage_ID=college.College_ID 
		WHERE CONCAT(document.Document_Title,document.Subject,document.Author) LIKE '%$text%'  ;");
		// document.Document_ID >=(select FLOOR(MAX(document.Document_ID)*RAND())from `document`) order by Document_ID limit 5
	}
	else if($text=='' && $col_id>-1){
		$q1=app_db()->Select(" SELECT document.Document_ID,document.Document_Title,document.Subject,document.Photo,
		document.Pages,document.NumberOfCopies,document.FileName,document.Author,document.Locker_No,document.PublishingYear,document.status,college.College_Name FROM `document` JOIN `college` ON document.collage_ID=college.College_ID 
		WHERE  document.collage_ID=$col_id and document.PublishingYear='$p_year'  ; ");

	}
	else if($text!='' && $col_id>-1){
		$q1=app_db()->Select(" SELECT document.Document_ID,document.Document_Title,document.Subject,document.Photo,
		document.Pages,document.NumberOfCopies,document.FileName,document.Author,document.Locker_No,document.PublishingYear,document.status,college.College_Name FROM `document` JOIN `college` ON document.collage_ID=college.College_ID 
		WHERE CONCAT(document.Document_Title,document.Subject,document.Author) LIKE '%$text%'   and document.collage_ID=$col_id and document.PublishingYear='$p_year'; ");
	}
    // $q1=app_db()->Select(" SELECT * FROM document WHERE document.PublishingYear='$p_year' AND document.collage_ID=$col_id;");
    
   echo json_encode($q1);
   die();
}
//get docs random
if (isset($_POST['call_type']) && $_POST['call_type'] == "get_docs") {
		$q1=app_db()->Select(" SELECT document.Document_ID,document.Document_Title,document.Subject,document.Photo,
		document.Pages,document.NumberOfCopies,document.FileName,document.Author,document.Locker_No,document.PublishingYear,document.status,college.College_Name FROM `document` JOIN `college` ON document.collage_ID=college.College_ID 
		WHERE document.Document_ID >=(select FLOOR(MAX(document.Document_ID)*RAND())from `document`) order by Document_ID limit 10;");
		echo json_encode($q1);
		die();
	}
//get gener info for dashbord
if(isset($_GET['call_type']) && $_GET['call_type'] =="get_g_info")
{
	$bcount='';
	$mcount='';
	$dcount='';
	$q1 = app_db()->select('SELECT count(Book_ID) as bcount from `book` ;');
	$q2 = app_db()->select('SELECT count(Document_ID) as dcount from `document` ;');
	$q3 = app_db()->select('SELECT count(Account_ID) as mcount from `account` ;');
	if($q1!=null){
		foreach ($q1 as $row) {
			 $bcount=$row['bcount'];
			}
	}
	if($q2!=null){
		foreach ($q2 as $row) {
			 $dcount=$row['dcount'];
			}
	}
	if($q3!=null){
		foreach ($q3 as $row) {
			 $mcount=$row['mcount'];
			}
	}
	echo json_encode(array(
		'status'=>'success',
		'd_count'=>$dcount,
		'b_count'=>$bcount,
		'm_count'=>$mcount,
	));
	die();
}
