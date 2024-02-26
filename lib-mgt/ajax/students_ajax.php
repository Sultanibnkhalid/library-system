<?php

include_once  '../../inc/connect.php';
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require '../../PHPMailer/src/PHPMailer.php';
// require '../../PHPMailer/src/Exception.php';

$img_extensions = ['jpg', 'jpeg', 'png'];
$profile_path = '../../profiles/';
//select all students
//get departs
if(isset($_GET['call_type']) && $_GET['call_type'] =="get_depart")
{
	$q1 = app_db()->select('SELECT collegedepartment.ColDep_ID, collegedepartment.College_ID,department.Department_Name FROM collegedepartment,department  WHERE collegedepartment.Department_ID=department.Department_ID;');
	echo json_encode($q1);
    die();
}
//get colages
if(isset($_GET['call_type']) && $_GET['call_type'] =="get_collages")
{
	$q1 = app_db()->select('SELECT * FROM college;');
	echo json_encode($q1);
    die();
}
//get_category
if(isset($_GET['call_type']) && $_GET['call_type'] =="get_cat")
{
	$q1 = app_db()->select('SELECT * FROM `category`;');
	echo json_encode($q1);
    die();
}
///add new student function
if(isset($_POST['call_type']) && $_POST['call_type'] =="add_new_student")
{	
	try{
	$Student_Name	= app_db()->CleanDBData($_POST['fname']);
	$University_Number	= app_db()->CleanDBData($_POST['fUnumbere']); 
	$PhoneNamber  	= app_db()->CleanDBData($_POST['fphone']);
	// $PhoneNamber  	= app_db()->CleanDBData($_POST['coll_dep_id']);
	$Address  	= app_db()->CleanDBData($_POST['fadress']);
	// $photo  	= app_db()->CleanDBData($_POST['photoName']);
	$email 	= app_db()->CleanDBData($_POST['femail']);
	$ColDep_Id=app_db()->CleanDBData($_POST['coll_dep_id']);
	$Gender=app_db()->CleanDBData($_POST['fgender']);
	$Created_on=date('Y-m-d');
//add unoc txt to image name
	$serial =substr(uniqid(),3,15);

	$file_name = $_FILES['profiles']['name'];
	$file_tmp = $_FILES['profiles']['tmp_name'];
	$file_type = $_FILES['profiles']['type'];
	$file_size = $_FILES['profiles']['size'];
	$tmp = explode('.', $_FILES['profiles']['name']);
	$file_ext = strtolower(end($tmp));
	$file = $profile_path.$serial.$file_name;

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

	$q1=app_db()->Select('select * from student where Student_Name ="'.$Student_Name.'"or University_Number="'.$University_Number.'";');
	if($q1 > 0) 
	{
		// record found in the database
		echo json_encode(array(
			'status' =>'error', 
			'msg' => 'موجود من مسبقاً', 
		));
		die();
	}
	else if($q1 < 1) 
	{
		//not found record in the database
		 
		$strTableName = "student";
		$data_array= array(
			'Student_Name'=>$Student_Name,
			'University_Number'=>$University_Number,
			'PhoneNamber'=>$PhoneNamber,
			'Photo'=>$serial.$file_name,
			'Address'=>$Address,
			'Gender'=>$Gender,
			'ColDep_ID'=>$ColDep_Id,
			'Created_on'=>$Created_on,
			'Email'=>$email,

		);
		
		app_db()->InsertNewStudent($strTableName, $data_array);
		move_uploaded_file($file_tmp, $file);
		echo json_encode(array(
			'status' => 'success',
			// 'srl'=>$serial, 
			'msg' => 'تم اضافة طالب جديد', 
		));
		die();
	}}catch(Exception $ex){
		echo json_encode(array(
			'status' =>'error', 
			'msg' =>$ex->getMessage(), 
		));
		die();
	}
}//getting student data end 
//checking new teacher data
if(isset($_POST['call_type']) && $_POST['call_type'] =="add_new_teacher")
{	

	try{
	$Teacher_Name	= app_db()->CleanDBData($_POST['fname']);
	$PhoneNamber  	= app_db()->CleanDBData($_POST['fphone']);
	$Address  	= app_db()->CleanDBData($_POST['fadress']);
	// $photo  	= app_db()->CleanDBData($_POST['fphoto']);
	$email 	= app_db()->CleanDBData($_POST['femail']);
	$Gender=app_db()->CleanDBData($_POST['fgender']);
	$Created_on=date('Y-m-d');
	$serial =substr(uniqid(),3,15);
	
	$file_name = $_FILES['profiles']['name'];
	$file_tmp = $_FILES['profiles']['tmp_name'];
	$file_type = $_FILES['profiles']['type'];
	$file_size = $_FILES['profiles']['size'];
	$tmp = explode('.', $_FILES['profiles']['name']);
	$file_ext = strtolower(end($tmp));
	$file = $profile_path.$serial.$file_name;

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

	$q1=app_db()->Select('select * from teacher where Teacher_Name ="'.$Teacher_Name.'";');
	if($q1 > 0) 
	{
		// record found in the database
		echo json_encode(array(
			'status' =>'error', 
			'msg' => 'موجود من مسبقاً', 
		));
		die();
	}
	else if($q1 < 1) 
	{
		//not found record in the database
		$strTableName = "teacher";
		$data_array= array(
			'Teacher_Name'=>$Teacher_Name,
			'PhoneNamber'=>$PhoneNamber,
			'Photo'=>$serial.$file_name,
			'Address'=>$Address,
			'Gender'=>$Gender,
			'Email'=>$email,
			'Created_on'=>$Created_on,
		);
		
		app_db()->InsertNewTeacher($strTableName, $data_array);
		move_uploaded_file($file_tmp, $file);
		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'تم اضافة استاذ جديد', 
		));
		die();
	}
}catch(Exception $er){
 echo json_encode(array(
	'status' => 'error', 
	'msg' => $er->getMessage(), 
));;
}
}//end checking teacher data


// check librarian data start 

if(isset($_POST['call_type']) && $_POST['call_type'] =="add_new_librarian")
{	
	$UserName	= app_db()->CleanDBData($_POST['fname']);
	$ContactNo  	= app_db()->CleanDBData($_POST['fphone']);
	// $Address  	= app_db()->CleanDBData($_POST['fadress']);
	$NameOfUser  	= app_db()->CleanDBData($_POST['fNameOfUser']);
	$Email 	= app_db()->CleanDBData($_POST['femail']);
	// $photo= app_db()->CleanDBData($_POST['fphoto']);
	// $Gender=app_db()->CleanDBData($_POST['fgender']);
	$Created_on=date('Y-m-d');
	$serial =substr(uniqid(),3,15);
	
	$file_name = $_FILES['profiles']['name'];
	$file_tmp = $_FILES['profiles']['tmp_name'];
	$file_type = $_FILES['profiles']['type'];
	$file_size = $_FILES['profiles']['size'];
	$tmp = explode('.', $_FILES['profiles']['name']);
	$file_ext = strtolower(end($tmp));
	$file = $profile_path.$serial.$file_name;

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

	$q1=app_db()->Select('select * from librarian where UserName ="'.$UserName.'" or NameOfUser="'.$NameOfUser.'" ;');
	if($q1 > 0) 
	{
		// record found in the database
		echo json_encode(array(
			'status' =>'error', 
			'msg' => 'موجود من مسبقاً', 
		));
		die();
	}
	
	else if($q1 < 1) 
	{
		//not found record in the database	
		$strTableName = "librarian";
		$data_array= array(

			'UserName'=>$UserName,
			'ContactNo'=>$ContactNo ,
			'NameOfUser'=>$NameOfUser,
			// 'Address'=>$Address,
			// 'Gender'=>$Gender,
			'Photo'=>$serial.$file_name,
			'Created_on'=>$Created_on,
			'Email'=>$Email,
			'password'=>$ContactNo,
			'Type_ID'=>3,
		);
		app_db()->Insert($strTableName, $data_array);
		move_uploaded_file($file_tmp, $file);

		// if($Email !=''){
		// 	sendMessage($Email,$serial);
		// }
		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'تم اضافة موظف جديد', 
		));
		die();
	}
}//end checking teacher data
// function to send to email
// function sendMessage($em,$msg){
// 	$mail = new PHPMailer;

// 	$mail->isSMTP();
// 	$mail->Host = 'smtp.gmail.com';
// 	$mail->SMTPAuth = true;
// 	$mail->Username = 'skmain850@gmail.com';
// 	$mail->Password = 'sultan..kh.p';
// 	$mail->SMTPSecure = 'tls';
// 	$mail->Port = 587;
	
// 	$mail->setFrom('skmain850@gmail.com', 'sultan khalid');
// 	$mail->addAddress($em,'');
// 	$mail->addReplyTo('skmain850@gmail.com', 'sultan khalid');
	
// 	$mail->isHTML(true);
// 	$mail->Subject = 'Validation Password';
// 	$mail->Body = 'Your validation password is: ' . $msg;
// 	$mail->send();
// 	// Send the email
// 	// if(!$mail->send()) {
// 	// 	echo 'Message could not be sent.';
// 	// 	echo 'Mailer Error: ' . $mail->ErrorInfo;
// 	// } else {
// 	// 	echo 'Message has been sent';
// 	// }
// }