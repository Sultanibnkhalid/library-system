<?php
include_once  '../../inc/connect.php';

$pdf_img_path = '../../books_imgs/';
$pdf_path = '../../books/';
$img_extensions = ['jpg', 'jpeg', 'png'];
$pdf_extentions = ['pdf'];

//get cateories
if (isset($_GET['call_type']) && $_GET['call_type'] == "get_category") {
	$q1 = app_db()->select('SELECT * FROM `category`');
	echo json_encode($q1);
	die();
}
//get colages
if (isset($_GET['call_type']) && $_GET['call_type'] == "get_collages") {
	$q1 = app_db()->select('SELECT * FROM college;');
	echo json_encode($q1);
	die();
}

//add new book 
if (isset($_POST['call_type']) && $_POST['call_type'] == "add_new_book") {
	try {
		$img_name = '';
		$pdf_name = '';
		$temp = '';
		// $file='';

		$book_Title	= app_db()->CleanDBData($_POST['book_Title']);
		$Author = app_db()->CleanDBData($_POST['book_author']);
		$subject = app_db()->CleanDBData($_POST['book_subject']);
		$category_ID = app_db()->CleanDBData($_POST['book_category']);
		// $photo= app_db()->CleanDBData($_POST['photo']);
		$pubisher = app_db()->CleanDBData($_POST['book_publisher']);
		$publishing_date = app_db()->CleanDBData($_POST['publish_date']);
		$numberOfCopies = app_db()->CleanDBData($_POST['copiesNo']);
		$locker_No = app_db()->CleanDBData($_POST['lockerNo']);
		$status = app_db()->CleanDBData($_POST['status']);
		$pages = app_db()->CleanDBData($_POST['book_pages']);
		$srial = substr(uniqid(), 2, 15);
		// $file_name= app_db()->CleanDBData($_POST['file_name']);
		//check  file if set
		if (isset($_FILES['file'])) {
			$file_name = $_FILES['file']['name'];
			$file_tmp = $_FILES['file']['tmp_name'];
			$file_type = $_FILES['file']['type'];
			$file_size = $_FILES['file']['size'];
			$tmp = explode('.', $_FILES['file']['name']);
			$temp = $file_tmp;
			$file_ext = strtolower(end($tmp));

			// $file = $path . $file_name;
			if (!in_array($file_ext, $img_extensions) && $file_ext != 'pdf') {
				// $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
				echo json_encode(array(
					'status' => 'error',
					'msg' => ' الملف غير الصيغة',
				));
				die();
			}
			if ($file_ext === 'pdf') {
				//$errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
				$pdf_name = $srial . $file_name;
				// $file = $pdf_path. $file_name;
				// if (empty($errors)) {
				// 	if(move_uploaded_file($file_tmp, $file)){
				// 		echo "success";
				// 	}else {
				// 		// echo error message
				// 		echo "error: could not move file";
				// 	  }

				// }
				// return;
			}
			if (in_array($file_ext, $img_extensions)) {
				//$errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
				$img_name = $srial . $file_name;
				// if (empty($errors)) {
				// 	if(move_uploaded_file($file_tmp, $file)){
				// 		echo "success";
				// 	}else {
				// 		// echo error message
				// 		echo "error: could not move file";
				// 	  }

				// }
				// return;
			}
		}


		$strTableName = "book";

		$data_array = array(
			'Book_Title' => $book_Title,
			'Author' => $Author,
			'Subject' => $subject,
			'Category_ID' => $category_ID,
			'Photo' => $img_name,
			'Publisher' => $pubisher,
			'Publishing_Date' => $publishing_date,
			'NumberOfCopies' => $numberOfCopies,
			'Locker_No' => $locker_No,
			'status' => $status,
			'Pages' => $pages,
			'FileName' => $pdf_name,

		);
		//insert record
		app_db()->Insert($strTableName, $data_array);
		//move file to server
		if ($img_name != '') {
			move_uploaded_file($temp,$pdf_img_path.$img_name);
		} else if ($pdf_name != '') {
			move_uploaded_file($temp,$pdf_path.$pdf_name);
		}

		echo json_encode(array(
			'status' => 'success',
			'msg' => 'تم اضافة كتاب جديد',
		));
		die();
	} catch (Exception $ex) {

		echo json_encode(array(
			'status' => 'error',
			'msg' => $ex->getMessage(),
		));
		die();
	}
} //add new book end

//add new document start
if (isset($_POST['call_type']) && $_POST['call_type'] == "add_new_document") {
	try {
		$img_name = '';
		$pdf_name = '';
		$temp = '';
		$document_Title	= app_db()->CleanDBData($_POST['doc_Title']);
		$author = app_db()->CleanDBData($_POST['doc_author']);
		$subject = app_db()->CleanDBData($_POST['doc_subjct']);
		$Collage_ID = app_db()->CleanDBData($_POST['doc_collage']);
		// $Photo= app_db()->CleanDBData($_POST['photo']);
		$PubishingYear = app_db()->CleanDBData($_POST['publish_date']);
		// $Abstact= app_db()->CleanDBData($_POST['fname']);
		$numberOfCopies = app_db()->CleanDBData($_POST['copiesNo']);
		$locker_No = app_db()->CleanDBData($_POST['lockerNo']);
		$status = app_db()->CleanDBData($_POST['status']);
		$pages = app_db()->CleanDBData($_POST['doc_pages']);
		// $file_name= app_db()->CleanDBData($_POST['file_name']);
		$srial = substr(uniqid(), 2, 15);
		//check  file if set
		if (isset($_FILES['file'])) {
			$file_name = $_FILES['file']['name'];
			$file_tmp = $_FILES['file']['tmp_name'];
			$file_type = $_FILES['file']['type'];
			$file_size = $_FILES['file']['size'];
			$tmp = explode('.', $_FILES['file']['name']);
			$temp = $file_tmp;
			$file_ext = strtolower(end($tmp));

			// $file = $path . $file_name;
			if (!in_array($file_ext, $img_extensions) && $file_ext != 'pdf') {
				// $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
				echo json_encode(array(
					'status' => 'error',
					'msg' => ' الملف غير الصيغة',
				));
				die();
			}
			if ($file_ext === 'pdf') {
				//$errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
				$pdf_name =$srial . $file_name;
				// $file = $pdf_path. $file_name;
				// if (empty($errors)) {
				// 	if(move_uploaded_file($file_tmp, $file)){
				// 		echo "success";
				// 	}else {
				// 		// echo error message
				// 		echo "error: could not move file";
				// 	  }

				// }
				// return;
			}
			if (in_array($file_ext, $img_extensions)) {
				//$errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
				$img_name =  $srial . $file_name;
				// if (empty($errors)) {
				// 	if(move_uploaded_file($file_tmp, $file)){
				// 		echo "success";
				// 	}else {
				// 		// echo error message
				// 		echo "error: could not move file";
				// 	  }

				// }
				// return;
			}
		}


		$strTableName = "document";

		$data_array = array(
			'Document_Title' => $document_Title,
			'Author' => $author,
			'Subject' => $subject,
			'collage_ID' => $Collage_ID,
			'Photo' => $img_name,
			// 'Pubisher'=>$Pubisher,
			'PublishingYear' => $PubishingYear,
			'NumberOfCopies' => $numberOfCopies,
			'Locker_No' => $locker_No,
			'status' => $status,
			'Pages' => $pages,
			'FileName' => $pdf_name,

		);
		//insert record
		app_db()->Insert($strTableName, $data_array);
		//move file to server
		if ($img_name != '') {
			move_uploaded_file($temp, $pdf_img_path.$img_name);
		} else if ($pdf_name != '') {
			move_uploaded_file($temp,$pdf_path.$pdf_name);
		}
		echo json_encode(array(
			'status' => 'success',
			'msg' => 'تم اضافة وثيقة جديدة',
		));
		die();
	} catch (Exception $ex) {

		echo json_encode(array(
			'status' => 'error',
			'msg' => $ex->getMessage(),
		));
		die();
	}
} //add new document end



?>














