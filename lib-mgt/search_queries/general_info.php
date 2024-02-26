<?php
include '../../inc/connect.php';

if(isset($_GET['call_type']) && $_GET['call_type'] =="get_mgt_g_info")
{
	$bcount='';
	$mcount='';
	$dcount='';
    $borrow_bcount='';
    $stuednt_count='';
    $teacher_count='';

    $fine_amount='';
    $borrow_dcount='';


	$q1 = app_db()->select('SELECT count(Book_ID) as bcount from `book` ;');
	$q8 = app_db()->select('SELECT count(Book_ID) as bcount from `book` where status>0 ;');
	$q2 = app_db()->select('SELECT count(Document_ID) as dcount from `document` ;');
	$q3 = app_db()->select('SELECT count(NameOfUser) as mcount from `librarian` ;');
    $q4 = app_db()->select('SELECT count(Student_ID) as scount from `student` ;');
    $q5 = app_db()->select('SELECT count(Teacher_ID) as tcount from `teacher` ;');
    $q6 = app_db()->select('SELECT count(Book_ID) as bocount from `borrowdetails` join `borrow` on borrowdetails.Transaction_ID
    =borrow.Transaction_ID WHERE borrow.status=0;');
  $q7 = app_db()->select('SELECT sum(Fine) as sfine from `returnbook`;');
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
    if($q4!=null){
		foreach ($q4 as $row) {
			 $stuednt_count=$row['scount'];
			}
	}
    if($q5!=null){
		foreach ($q5 as $row) {
			 $teacher_count=$row['tcount'];
			}
	}

    if($q6!=null){
		foreach ($q6 as $row) {
			$borrow_bcount=$row['bocount'];
			}
	}
    if($q7!=null){
		foreach ($q7 as $row) {
			$fine_amount=$row['sfine'];
			}
	}
	$av_books;
	if($q8){
		foreach ($q8 as $row) {
			$av_books=$row['bcount'];
			}
	}
	echo json_encode(array(
		'status'=>'success',
		'd_count'=>$dcount,
		'b_count'=>$bcount,
		'm_count'=>$mcount,
		't_count'=>$teacher_count,
		'st_count'=>$stuednt_count,
		'borrow_b_count'=>$borrow_bcount,
        'ava_books'=>$av_books,
        'fine'=>$fine_amount,

	));
	die();
}

?>