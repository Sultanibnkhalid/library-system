<?php

$img_extensions = ['jpg', 'jpeg', 'png'];
$profile_path = '../profiles/';
$path='../uploads/';
//check post  profile photo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$srl=($_POST['srl']);
    if (isset($_FILES['profiles'])) {
        $errors = [];		
       
		$file_name = $_FILES['profiles']['name'];
		$file_tmp = $_FILES['profiles']['tmp_name'];
		$file_type = $_FILES['profiles']['type'];
		$file_size = $_FILES['profiles']['size'];
		$tmp = explode('.', $_FILES['profiles']['name']);
		$file_ext = strtolower(end($tmp));
		$file = $profile_path.$srl.$file_name;

		if (!in_array($file_ext,$img_extensions)) {
			$errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
		}

		if ($file_size > 2097152) {
			$errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
		}

		if (empty($errors)) {
			move_uploaded_file($file_tmp, $file);
		}
	

	if ($errors) {
        print_r($errors);
    return;
    }
    }


}

//check pdf image 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['pdfs_images'])) {
        $errors = [];
        $pdf_img_path = '../books_imgs/';
		$pdf_path='../books/';
	$pdf_extentions = ['pdf'];
		
        // $all_files = count($_FILES['pdfs_images']['tmp_name']); 
		$file_name = $_FILES['pdfs_images']['name'];
		$file_tmp = $_FILES['pdfs_images']['tmp_name'];
		$file_type = $_FILES['pdfs_images']['type'];
		$file_size = $_FILES['pdfs_images']['size'];
		$tmp = explode('.', $_FILES['pdfs_images']['name']);
		$file_ext = strtolower(end($tmp));

		// $file = $path . $file_name;
		if (!in_array($file_ext, $img_extensions) && $file_ext!= 'pdf') {
			$errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
			
		}
		if ($file_ext==='pdf') {
			//$errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
			$file = $pdf_path. $file_name;
			if (empty($errors)) {
				if(move_uploaded_file($file_tmp, $file)){
					echo "success";
				}else {
					// echo error message
					echo "error: could not move file";
				  }
				
			}
			return;
		}
		if (in_array($file_ext, $img_extensions)) {
			//$errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
			$file = $pdf_img_path. $file_name;
			if (empty($errors)) {
				if(move_uploaded_file($file_tmp, $file)){
					echo "success";
				}else {
					// echo error message
					echo "error: could not move file";
				  }
				
			}
			return;
		}

		// if ($file_size > 2097152) {
		// 	$errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
		// }

		// if (empty($errors)) {
		// 	if(move_uploaded_file($file_tmp, $file)){
		// 		echo "success";
		// 	}else {
		// 		// echo error message
		// 		echo "error: could not move file";
		// 	  }
			
		// }
	

	
	if ($errors) {
		echo json_encode($errors);
    return;
    }
    }


}
?>