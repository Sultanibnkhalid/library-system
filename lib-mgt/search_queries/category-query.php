<?php
//this file used especaly for category.php
include_once '../../inc/connect.php';
if (isset($_POST['call_type']) && $_POST['call_type'] == "search_category") {
    $text = app_db()->CleanDBData($_POST['cat_name']);
    $q1 = app_db()->select("SELECT * FROM `category` where Category_Name like'%$text%';");
    $res = '';

    $res .= '<thead>
        <tr>
            <th scope="col">اسم التصنيف</th>
        </tr>
    </thead>';
    if ($q1) {

        $res .= '<tbody>';

        foreach ($q1 as $row) {

            $res .= '<tr scope="row" row_id='. $row["Category_ID"]. '>
                    <td class="row-data">' . $row['Category_Name'] . '
                    </td>
                    <td>
                        <a href="#" class="btn_update_cat btn btn-success btn-sm btn-flat">تعديل<i class="fa fa-edit"></i> </a>
                        <a href="#" class="btn_cancel_cat btn btn btn-danger btn-sm delete btn-flat" style="display:none;">الغاء<i class="fa fa-times-circle" ></i> </a>
                        <a href="#" style="display:none;" class="btn_save_cat btn btn btn-primary btn-sm delete btn-flat">حفظ<i class="fa fa-save"></i> </a>
                        <a href="#" class="btn_cat_con btn btn btn-primary btn-sm delete btn-flat">الارتباط<i class="fa fa-briefcase"></i> </a>
                        <a href="#" class="btn_delete_cat btn btn btn-danger btn-sm delete btn-flat">حذف<i class="fa fa-trash"></i> </a>
                       
                    </td>
                    </tr>';
        }

        $res .= '</tbody>';
    }
    echo $res;
    die();
}
if (isset($_POST['call_type']) && $_POST['call_type'] == "search_cat_connection") {
    $cat_id = app_db()->CleanDBData($_POST['row_id']);
    $q1 = app_db()->select("SELECT  collegedepartment.ColDep_ID,college.College_Name,department.Department_Name FROM colagedepartmentcategory JOIN collegedepartment on colagedepartmentcategory.ColDep_ID=collegedepartment.ColDep_ID JOIN college
    on collegedepartment.College_ID=college.College_ID JOIN department ON collegedepartment.Department_ID=department.Department_ID
    WHERE colagedepartmentcategory.Category_ID=$cat_id ;");
    // $q1 = app_db()->select("SELECT * FROM `college` where College_Name like'%$text%';");
    $res = '';
    $res .= '<thead>
        <tr>
            <th scope="col">يرتبط </th>
        </tr>
    </thead>';
    if ($q1) {

        $res .= '<tbody>';

        foreach ($q1 as $row) {

            $res .= '<tr scope="row" row_id=' . $row["ColDep_ID"] . ' cat_id=' .$cat_id . '>
                    <td class="row-data">'.$row['College_Name'] ."/". $row['Department_Name'] . '
                    </td>
                    <td>

                        <a href="#" class="btn_delete_cat_con btn btn btn-danger btn-sm delete btn-flat">حذف<i class="fa fa-trash"></i> </a>
                       
                    </td>
                    </tr>';
        }

        $res .= '</tbody>';
    }
    echo $res;
    die();
}