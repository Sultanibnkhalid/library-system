<?php
//this file used especaly for collage page
include_once '../../inc/connect.php';
if (isset($_POST['call_type']) && $_POST['call_type'] == "search_colage") {
    $text = app_db()->CleanDBData($_POST['col_name']);
    $q1 = app_db()->select("SELECT * FROM `college` where College_Name like'%$text%';");
    $res = '';

    $res .= '<thead>
        <tr>
            <th scope="col">اسم الكلية</th>
        </tr>
    </thead>';
    if ($q1) {

        $res .= '<tbody>';

        foreach ($q1 as $row) {

            $res .= '<tr scope="row" row_id=' . $row["College_ID"] . '>
                    <td class="row-data">' . $row['College_Name'] . '
                    </td>
                    <td>
                        <a href="#" class="btn_update_col btn btn-success btn-sm btn-flat">تعديل<i class="fa fa-edit"></i> </a>
                        <a href="#" class="btn_cancel_col btn btn btn-danger btn-sm delete btn-flat" style="display:none;">الغاء<i class="fa fa-times-circle" ></i> </a>
                        <a href="#" style="display:none;" class="btn_save_col btn btn btn-primary btn-sm delete btn-flat">حفظ<i class="fa fa-save"></i> </a>
                        <a href="#" class="btn_col_dep btn btn btn-primary btn-sm delete btn-flat">الاقسام<i class="fa fa-briefcase"></i> </a>
                        <a href="#" class="btn_delete_col btn btn btn-danger btn-sm delete btn-flat">حذف<i class="fa fa-trash"></i> </a>
                       
                    </td>
                    </tr>';
        }

        $res .= '</tbody>';
    }
    echo $res;
    die();
}
if (isset($_POST['call_type']) && $_POST['call_type'] == "search_collages_dep") {
    $col_id = app_db()->CleanDBData($_POST['row_id']);
    $q1 = app_db()->select("SELECT collegedepartment.ColDep_ID, collegedepartment.College_ID,collegedepartment.Department_ID,department.Department_Name FROM `collegedepartment` join `department` on collegedepartment.Department_ID=department.Department_ID where collegedepartment.College_ID=$col_id ;");
    // $q1 = app_db()->select("SELECT * FROM `college` where College_Name like'%$text%';");
    $res = '';
    $res .= '<thead>
        <tr>
            <th scope="col">اسم القسم</th>
        </tr>
    </thead>';
    if ($q1) {

        $res .= '<tbody>';

        foreach ($q1 as $row) {

            $res .= '<tr scope="row" row_id=' . $row["ColDep_ID"] . '>
                    <td class="row-data">' . $row['Department_Name'] . '
                    </td>
                    <td>
                        <a href="#" class="btn_update_dep dt_id='.$row["Department_ID"].' btn btn-success btn-sm btn-flat">تعديل<i class="fa fa-edit"></i> </a>
                        <a href="#" style="display:none;" class="btn_cancel_dep btn btn btn-danger btn-sm delete btn-flat">الغاء<i class="fa fa-times-circle" ></i> </a>
                        <a href="#" style="display:none;" class="btn_save_dep btn btn btn-primary btn-sm delete btn-flat">حفظ<i class="fa fa-save" ></i> </a>
                        <a href="#" dt_id='.$row["Department_ID"].' class="btn_delete_dep btn btn btn-danger btn-sm delete btn-flat">حذف<i class="fa fa-trash"></i> </a>
                       
                    </td>
                    </tr>';
        }

        $res .= '</tbody>';
    }
    echo $res;
    die();
}