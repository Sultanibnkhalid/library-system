<?php
include_once '../../inc/connect.php';
$row_id = '';
//delete studnt start
if (isset($_POST['call_type']) && $_POST['call_type'] == "student_record") {
    $row_id = app_db()->CleanDBData($_POST['row_id']);
    try {
        if (!empty($row_id)) {
            $q1 = app_db()->select("select * from student where Student_ID= $row_id");
            if ($q1 > 0) {
                //found a row to be deleted
                $strTableName = "student";
                app_db()->Delete($strTableName, array('Student_ID' => $row_id));

                echo json_encode(array(
                    'status' => 'success',
                    'msg' => 'تم الحذف',
                ));
                die();
            } else {
                echo json_encode(array(
                    'status' => 'error',
                    'msg' => 'غير موجود',
                ));
                die();
            }
        } else {
            echo json_encode(array(
                'status' => 'error',
                'msg' => 'خطا',
            ));
        }
    } catch (Exception $ex) {
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'لا يمكنك حف هذة البيانات',
        ));
    }
} //delete studnt end
//delete teacher start
if (isset($_POST['call_type']) && $_POST['call_type'] == "teacher_record") {
    $row_id = app_db()->CleanDBData($_POST['row_id']);
    try {
        if (!empty($row_id)) {
            $q1 = app_db()->select("select * from teacher where Teacher_ID= $row_id");
            if ($q1 > 0) {
                //found a row to be deleted
                $strTableName = "teacher";
                app_db()->Delete($strTableName, array('Teacher_ID' => $row_id));

                echo json_encode(array(
                    'status' => 'success',
                    'msg' => 'تم الحذف',
                ));
                die();
            } else {
                echo json_encode(array(
                    'status' => 'error',
                    'msg' => 'غير موجود',
                ));
                die();
            }
        } else {
            echo json_encode(array(
                'status' => 'error',
                'msg' => 'خطا',
            ));
        }
    } catch (Exception $ex) {
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'لا يمكنك حف هذة البيانات',
        ));
    }
} //delete studnt end
//delete librarian start
if (isset($_POST['call_type']) && $_POST['call_type'] == "librarian_record") {
    $row_id = app_db()->CleanDBData($_POST['row_id']);

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (session_status() == PHP_SESSION_NONE) {
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'خطا',
        ));
        die();
    }

    if (!isset($_SESSION['type']) || ($_SESSION['type'] != 'Admin')) {
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'لست مخولا لذلك',
        ));
        die();
    }
    try {
        if (!empty($row_id)) {
            $q1 = app_db()->select("select * from librarian where NameOfUser= $row_id");
            if ($q1 > 0) {
                //found a row to be deleted
                $strTableName = "librarian";
                app_db()->Delete($strTableName, array('NameOfUser' => $row_id));

                echo json_encode(array(
                    'status' => 'success',
                    'msg' => 'تم الحذف',
                ));
                die();
            } else {
                echo json_encode(array(
                    'status' => 'error',
                    'msg' => 'غير موجود',
                ));
                die();
            }
        } else {
            echo json_encode(array(
                'status' => 'error',
                'msg' => 'خطا',
            ));
        }
    } catch (Exception $ex) {
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'لا يمكنك حف هذة البيانات',
        ));
    }
} //delete librarian end
//delete book start
if (isset($_POST['call_type']) && $_POST['call_type'] == "book_record") {
    $row_id = app_db()->CleanDBData($_POST['row_id']);
    try {
        if (!empty($row_id)) {
            $q1 = app_db()->select("select * from book where Book_ID= $row_id");
            if ($q1 > 0) {
                //found a row to be deleted
                $strTableName = "book";
                app_db()->Delete($strTableName, array('Book_ID' => $row_id));

                echo json_encode(array(
                    'status' => 'success',
                    'msg' => 'تم الحذف',
                ));
                die();
            } else {
                echo json_encode(array(
                    'status' => 'error',
                    'msg' => 'غير موجود',
                ));
                die();
            }
        } else {
            echo json_encode(array(
                'status' => 'error',
                'msg' => 'خطا',
            ));
        }
    } catch (Exception $ex) {
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'لا يمكنك حف هذة البيانات',
        ));
    }
} //delete book end
//delete doc start
if (isset($_POST['call_type']) && $_POST['call_type'] == "doc_record") {
    $row_id = app_db()->CleanDBData($_POST['row_id']);
    try {
        if (!empty($row_id)) {
            $q1 = app_db()->select("select * from document where Document_ID= $row_id");
            if ($q1 > 0) {
                //found a row to be deleted
                $strTableName = "document";
                app_db()->Delete($strTableName, array('Document_ID' => $row_id));

                echo json_encode(array(
                    'status' => 'success',
                    'msg' => 'تم الحذف',
                ));
                die();
            } else {
                echo json_encode(array(
                    'status' => 'error',
                    'msg' => 'غير موجود',
                ));
                die();
            }
        } else {
            echo json_encode(array(
                'status' => 'error',
                'msg' => 'خطا',
            ));
        }
    } catch (Exception $ex) {
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'لا يمكنك حف هذة البيانات',
        ));
    }
} //delete doc end

//delete colege start
if (isset($_POST['call_type']) && $_POST['call_type'] == "collage_record") {
    $row_id = app_db()->CleanDBData($_POST['row_id']);
    try {
        if (!empty($row_id)) {
            $q1 = app_db()->select("select * from college where College_ID= $row_id");
            if ($q1 > 0) {
                //found a row to be deleted
                $strTableName = "college";
                app_db()->Delete($strTableName, array('College_ID' => $row_id));

                echo json_encode(array(
                    'status' => 'success',
                    'msg' => 'تم الحذف',
                ));
                die();
            } else {
                echo json_encode(array(
                    'status' => 'error',
                    'msg' => 'غير موجود',
                ));
                die();
            }
        } else {
            echo json_encode(array(
                'status' => 'error',
                'msg' => 'خطا',
            ));
        }
    } catch (Exception $ex) {
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'لا يمكنك حف هذة البيانات',
        ));
    }
} //delete college end
//delete depart start
if (isset($_POST['call_type']) && $_POST['call_type'] == "department_record") {
    $row_id = app_db()->CleanDBData($_POST['row_id']);
    try {
        if (!empty($row_id)) {
            $q1 = app_db()->select("select * from department where Department_ID= $row_id");
            if ($q1 > 0) {
                //found a row to be deleted
                $strTableName = "department";
                app_db()->Delete($strTableName, array('Department_ID' => $row_id));

                echo json_encode(array(
                    'status' => 'success',
                    'msg' => 'تم الحذف',
                ));
                die();
            } else {
                echo json_encode(array(
                    'status' => 'error',
                    'msg' => 'غير موجود',
                ));
                die();
            }
        } else {
            echo json_encode(array(
                'status' => 'error',
                'msg' => 'خطا',
            ));
        }
    } catch (Exception $ex) {
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'لا يمكنك حف هذة البيانات',
        ));
    }
} //delete depart end
//delete category start
if (isset($_POST['call_type']) && $_POST['call_type'] == "cat_record") {
    $row_id = app_db()->CleanDBData($_POST['row_id']);
    try {
        if (!empty($row_id)) {
            $q1 = app_db()->select("select * from category where Category_ID= $row_id");
            if ($q1 > 0) {
                //found a row to be deleted
                $strTableName = "category";
                app_db()->Delete($strTableName, array('Category_ID' => $row_id));

                echo json_encode(array(
                    'status' => 'success',
                    'msg' => 'تم الحذف',
                ));
                die();
            } else {
                echo json_encode(array(
                    'status' => 'error',
                    'msg' => 'غير موجود',
                ));
                die();
            }
        } else {
            echo json_encode(array(
                'status' => 'error',
                'msg' => 'خطا',
            ));
        }
    } catch (Exception $ex) {
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'لا يمكنك حف هذة البيانات',
        ));
    }
} //delete category end
//delete connetion start
if (isset($_POST['call_type']) && $_POST['call_type'] == "cat_con_record") {
    $row_id = app_db()->CleanDBData($_POST['row_id']);
    $cat_id = app_db()->CleanDBData($_POST['cat_id']);
    try {
        if (!empty($row_id)) {
            $q1 = app_db()->select("select * from colagedepartmentcategory where ColDep_ID= $row_id and Category_ID=$cat_id;");
            if ($q1 > 0) {
                //found a row to be deleted
                $strTableName = "colagedepartmentcategory";
                app_db()->Delete($strTableName, array('ColDep_ID' => $row_id, 'Category_ID' => $cat_id));

                echo json_encode(array(
                    'status' => 'success',
                    'msg' => 'تم الحذف',
                ));
                die();
            } else {
                echo json_encode(array(
                    'status' => 'error',
                    'msg' => 'غير موجود',
                ));
                die();
            }
        } else {
            echo json_encode(array(
                'status' => 'error',
                'msg' => 'خطا',
            ));
        }
    } catch (Exception $ex) {
        echo json_encode(array(
            'status' => 'error',
            'msg' => 'لا يمكنك حف هذة البيانات',
        ));
    }
}//delete category connection end