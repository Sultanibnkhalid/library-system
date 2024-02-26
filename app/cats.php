<?php

include_once '../inc/connect.php';
//select all students
if (isset($_POST['call_type']) && $_POST['call_type'] == "col") {
	$query = app_db()->Select("SELECT * from college;");
    $output=array();
   if($query){
       foreach($query as $row){
        $item=array();
        $item['id']=$row["College_ID"];
        $item['name']=$row["College_Name"];
        array_push($output,$item);
       }
       echo json_encode($output);
       die();
    }
    die();
}
if (isset($_POST['call_type']) && $_POST['call_type'] == "cat") {
	$query = app_db()->Select("SELECT * from category;");
    $output=array();
    if($query){
        foreach($query as $row){
         $item=array();
         $item['id']=$row["Category_ID"];
         $item['name']=$row["Category_Name"];
         array_push($output,$item);
        }
        echo json_encode($output);
        die();
     }
     die();
}
?>