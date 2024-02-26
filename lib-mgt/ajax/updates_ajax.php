<?php 
include_once '../../inc/connect.php';

$pdf_img_path = '../../books_imgs/';
$pdf_path='../../books/';
$img_extensions = ['jpg', 'jpeg', 'png'];
$pdf_extentions = ['pdf'];
$profile_path = '../../profiles/';
//upate studnt start
if(isset($_POST['call_type']) && $_POST['call_type'] =="update_student_data")
{	$data_array=[];
	$img_name='';
	$temp='';
	$Student_Id	= app_db()->CleanDBData($_POST['id']);
	$Student_Name	= app_db()->CleanDBData($_POST['fname']);
	$University_Number	= app_db()->CleanDBData($_POST['fUnumbere']); 
	$PhoneNamber  	= app_db()->CleanDBData($_POST['fphone']);
	// $PhoneNamber  	= app_db()->CleanDBData($_POST['coll_dep_id']);
	$Address  	= app_db()->CleanDBData($_POST['fadress']);
	// $photo  	= app_db()->CleanDBData($_POST['photoName']);
	$email 	= app_db()->CleanDBData($_POST['femail']);
	$ColDep_Id=app_db()->CleanDBData($_POST['coll_dep_id']);
	$Gender=app_db()->CleanDBData($_POST['fgender']);
 //add unoc txt to image name
	$serial =substr(uniqid(),3,15);
	if (isset($_FILES['file'])) {
		$file_name = $_FILES['file']['name'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$file_type = $_FILES['file']['type'];
		$file_size = $_FILES['file']['size'];
		$tmp = explode('.', $_FILES['file']['name']);
		$temp = $file_tmp;
		$img_name=$serial.$file_name;
		$file_ext = strtolower(end($tmp));
		if (!in_array($file_ext,$img_extensions)) {
			echo json_encode(array(
				'status' =>'error', 
				'msg' => 'الصورة غير صالحة', 
			));
			die();
		}
	
		if ($file_size > 2097152) {
			echo json_encode(array(
				'status' =>'error', 
				'msg' => ' الصورة حجمها كبير', 
			));
			die();
		}
	

	}

    $q1=app_db()->Select("select * from student where Student_ID =$Student_Id");
    if($q1 > 0) 
	{
        	 
		$strTableName = "student";

		$data_array= array(
			'Student_Name'=>$Student_Name,
			'University_Number'=>$University_Number,
			'PhoneNamber'=>$PhoneNamber,
			// 'Photo'=>$photo,
			'Address'=>$Address,
			'Gender'=>$Gender,
			'ColDep_ID'=>$ColDep_Id,
		);
        $where_array=array('Student_ID'=>$Student_Id);
		if($img_name!=''){
			$data_array=array_merge($data_array,array('Photo'=>$img_name));
		}
        app_db()->Update($strTableName,$data_array,$where_array);
		if($img_name!=''){
			move_uploaded_file($temp, $profile_path.$img_name);
		}
		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'تم تعديل بيانات طالب واحد', 
		));
		die();
		
	}else{
        // record not found in the database
		echo json_encode(array(
			'status' =>'error', 
			'msg' => 'لا توجد بيانات لهذا السجل', 
		));
		die();
    }
}
//()=>update student end

//update user start
if(isset($_POST['call_type']) && $_POST['call_type'] =="update_user_data")
{	$data_array=[];
	$img_name='';
	$temp='';
    $user_id=app_db()->CleanDBData($_POST['id']);
	$UserName	= app_db()->CleanDBData($_POST['fname']);
	$ContactNo  	= app_db()->CleanDBData($_POST['fphone']);
	// $Address  	= app_db()->CleanDBData($_POST['fadress']);
	$NameOfUser  	= app_db()->CleanDBData($_POST['fNameOfUser']);
	$Email 	= app_db()->CleanDBData($_POST['femail']);
	// $photo= app_db()->CleanDBData($_POST['fphoto']);
	// $Gender=app_db()->CleanDBData($_POST['fgender']);
	// $Created_on=date('Y-m-d');

	$serial =substr(uniqid(),3,15);
	if (isset($_FILES['file'])) {
		$file_name = $_FILES['file']['name'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$file_type = $_FILES['file']['type'];
		$file_size = $_FILES['file']['size'];
		$tmp = explode('.', $_FILES['file']['name']);
		$temp = $file_tmp;
		$img_name=$serial.$file_name;
		$file_ext = strtolower(end($tmp));
		if (!in_array($file_ext,$img_extensions)) {
			echo json_encode(array(
				'status' =>'error', 
				'msg' => 'الصورة غير صالحة', 
			));
			die();
		}
	
		if ($file_size > 2097152) {
			echo json_encode(array(
				'status' =>'error', 
				'msg' => ' الصورة حجمها كبير', 
			));
			die();
		}
	

	}

	$q1=app_db()->Select("select * from librarian where NameOfUser='$user_id' ;");
    if($q1 > 0) 
	{
        	 
		$strTableName = "librarian";
		$data_array= array(

			'UserName'=>$UserName,
			'ContactNo'=>$ContactNo ,
			'NameOfUser'=>$NameOfUser,
			// 'Address'=>$Address,
			// 'Gender'=>$Gender,
			// 'Photo'=>$photo,
			// 'Created_on'=>$Created_on,
			'Email'=>$Email,
			// 'password'=>$ContactNo,
			// 'Type_ID'=>3,
		);
		if($img_name!=''){
			$data_array=array_merge($data_array,array('Photo'=>$img_name));
		}
        $where_array=array('NameOfUser'=>$user_id);
        app_db()->Update($strTableName,$data_array,$where_array);
		if($img_name!=''){
			move_uploaded_file($temp, $profile_path.$img_name);
		}
		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'تم تعديل بيانات موظف ', 
		));
		die();
		
	}else{
        // record not found in the database
		echo json_encode(array(
			'status' =>'error', 
			'msg' => 'لا توجد بيانات لهذا السجل', 
		));
		die();
    }
}//()=>update user end

//=>update teacher start
if(isset($_POST['call_type']) && $_POST['call_type'] =="update_teacher_data")
{	$data_array=[];
	$img_name='';
	$temp='';
	
	$teacher_id= app_db()->CleanDBData($_POST['id']);
	$Teacher_Name	= app_db()->CleanDBData($_POST['fname']);
	$PhoneNamber  	= app_db()->CleanDBData($_POST['fphone']);
	$Address  	= app_db()->CleanDBData($_POST['fadress']);
	// $photo  	= app_db()->CleanDBData($_POST['fphoto']);
	$email 	= app_db()->CleanDBData($_POST['femail']);
	$Gender=app_db()->CleanDBData($_POST['fgender']);
	// $Created_on=date('Y-m-d');
	$serial =substr(uniqid(),3,15);
	if (isset($_FILES['file'])) {
		$file_name = $_FILES['file']['name'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$file_type = $_FILES['file']['type'];
		$file_size = $_FILES['file']['size'];
		$tmp = explode('.', $_FILES['file']['name']);
		$temp = $file_tmp;
		$img_name=$serial.$file_name;
		$file_ext = strtolower(end($tmp));
		if (!in_array($file_ext,$img_extensions)) {
			echo json_encode(array(
				'status' =>'error', 
				'msg' => 'الصورة غير صالحة', 
			));
			die();
		}
	
		if ($file_size > 2097152) {
			echo json_encode(array(
				'status' =>'error', 
				'msg' => ' الصورة حجمها كبير', 
			));
			die();
		}
	

	}

	$q1=app_db()->Select("select * from teacher where Teacher_ID=$teacher_id;");
    if($q1 > 0) 
	{   	 
		$strTableName = "teacher";

		$data_array= array(
			'Teacher_Name'=>$Teacher_Name,
			'PhoneNamber'=>$PhoneNamber,
			// 'Photo'=>$photo,
			'Address'=>$Address,
			'Gender'=>$Gender,
			'Email'=>$email,
			// 'Created_on'=>$Created_on,
		);
		if($img_name!=''){
			$data_array=array_merge($data_array,array('Photo'=>$img_name));
		}
		//array where
		$where_array=array('Teacher_ID'=>$teacher_id);
        app_db()->Update($strTableName,$data_array,$where_array);
		if($img_name!=''){
			move_uploaded_file($temp, $profile_path.$img_name);
		}
		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'تم تعديل بيانات مشترك واحد', 
		));
		die();
		
	}else{
        // record not found in the database
		echo json_encode(array(
			'status' =>'error', 
			'msg' => 'لا توجد بيانات لهذا السجل', 
		));
		die();
    }
}//update teacher end


//=>update book start=>
if(isset($_POST['call_type']) && $_POST['call_type'] =="update_book_data")
{	

	$data_array=[];
	$img_name='';
	$pdf_name='';
	$temp='';
	$id=app_db()->CleanDBData($_POST['id']);
	$book_Title	= app_db()->CleanDBData($_POST['book_Title']);
	$Author = app_db()->CleanDBData($_POST['book_author']);
	$subject= app_db()->CleanDBData($_POST['book_subject']);
	$category_ID= app_db()->CleanDBData($_POST['book_category']);
	// $photo= app_db()->CleanDBData($_POST['photo']);
	$pubisher= app_db()->CleanDBData($_POST['book_publisher']);
	$publishing_date= app_db()->CleanDBData($_POST['publish_date']);
	$numberOfCopies= app_db()->CleanDBData($_POST['copiesNo']);
	$locker_No= app_db()->CleanDBData($_POST['lockerNo']);
	$status= app_db()->CleanDBData($_POST['status']);
	$pages= app_db()->CleanDBData($_POST['book_pages']);
	$srial=substr(uniqid(),2,15);
	// $file_name= app_db()->CleanDBData($_POST['file_name']);
	//check  file if set
	if (isset($_FILES['file'])){
		$file_name = $_FILES['file']['name'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$file_type = $_FILES['file']['type'];
		$file_size = $_FILES['file']['size'];
		$tmp = explode('.', $_FILES['file']['name']);
		$temp=$file_tmp;
		$file_ext = strtolower(end($tmp));

		// $file = $path . $file_name;
		if (!in_array($file_ext, $img_extensions) && $file_ext!= 'pdf') {
			// $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
			echo json_encode(array(
				'status' =>'error', 
				'msg' => ' الملف غير الصيغة', 
			));
			die();
			
		}
		if ($file_ext==='pdf') {
			//$errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
			$pdf_name=$srial.$file_name;
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
			$img_name= $srial.$file_name;
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


	try{
		$strTableName = "book";
		$data_array= array(
			'Book_Title'=>$book_Title,
			'Author'=>$Author,
			'Subject'=>$subject,
			'Category_ID'=>$category_ID,
			// 'Photo'=>$photo,
			'Publisher'=>$pubisher,
			'Publishing_Date'=>$publishing_date,
			'NumberOfCopies'=>$numberOfCopies,
			'Locker_No'=>$locker_No,
			'status'=>$status,
			'Pages'=>$pages,
			// 'FileName'=>$file_name,
		);
		// add file name if exisit
		if($img_name!=''){
			$data_array=array_merge($data_array,array('Photo'=>$img_name,'FileName'=>$pdf_name));
		}
		if($pdf_name!=''){
			$data_array=array_merge($data_array,array('FileName'=>$pdf_name,'Photo'=>$img_name));
		}
		$where_array=array('Book_ID'=>$id);
		//update record
		app_db()->Update($strTableName,$data_array,$where_array);
		//move file to server
		if($img_name!=''){
			move_uploaded_file($temp,$pdf_img_path.$img_name);
		}else if($pdf_name!=''){
			move_uploaded_file($temp, $pdf_path.$pdf_name);
		}
		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'تم تعديل كتاب واحد', 
		));
		die();

	}catch(Exception $ex){

		echo json_encode(array(
			'status' =>'error', 
			'msg' =>"لم يتم التعديل".$ex->getMessage(), 
		));
		die();
	}



}//add new book end
//()=>update book end

//=>update document start=>
//add new document start
if (isset($_POST['call_type']) && $_POST['call_type'] == "update_document") {
	try {
		$data_array=[];
		$img_name='';
		$pdf_name='';
		$temp='';
		$row_id=app_db()->CleanDBData($_POST['row_id']);
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
		//check  if if set
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
				$pdf_name =  $srial . $file_name;
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
				$img_name =$srial . $file_name;
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
			// 'Photo' => $img_name,
			// 'Pubisher'=>$Pubisher,
			'PublishingYear' => $PubishingYear,
			'NumberOfCopies' => $numberOfCopies,
			'Locker_No' => $locker_No,
			'status' => $status,
			'Pages' => $pages,
			// 'FileName' => $pdf_name,

		);
		// add file name if exisit
		if($img_name!=''){
			$data_array=array_merge($data_array,array('Photo'=>$img_name,'FileName'=>$pdf_name));
		}
		if($pdf_name!=''){
			$data_array=array_merge($data_array,array('FileName'=>$pdf_name,'Photo'=>$img_name));
		}
		//update record
		app_db()->Update($strTableName, $data_array,array('Document_ID'=>$row_id));
		//move file to server
		if ($img_name != '') {
			move_uploaded_file($temp,  $pdf_img_path .$img_name);
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

//()=>update document end
