<?php

include_once  '../../inc/connect.php';

//select all students
if (isset($_POST['call_type']) && $_POST['call_type'] == "search_student") {
 
    $text_to_search = app_db()->CleanDBData($_POST['text_to_search']);
    $query = app_db()->SELECT("SELECT student.Student_ID,student.Student_Name,student.University_Number,student.Email,student.Address,
	student.PhoneNamber,student.Photo,student.Created_on, department.Department_Name,college.College_Name FROM student,college,department,collegedepartment
	 WHERE collegedepartment.College_ID=college.College_ID AND collegedepartment.Department_ID=department.Department_ID AND collegedepartment.ColDep_ID=student.ColDep_ID AND ( CONCAT(student.Student_Name,student.PhoneNamber,student.University_Number) LIKE '%$text_to_search%') ;");
    if ($query) {
?>
        <thead>
            <tr>
                <th>الصورة</th>
                <th scope="col">الاسم</th>
                <th scope="col">الهاتف</th>
                <th scope="col">الكلية</th>
                <th scope="col">القسم</th>
                <th scope="col">الرقم الجامعي</th>
                <th scope="col">تاريخ الاشتراك</th>
                

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($query as $row) {
            ?>
                <tr scope="row" row_id="<?php echo $row['Student_ID'] ?>" em="<?php echo $row['Email'] ?>" ad="<?php echo $row['Address'] ?>">
                    <td>
                        <div style="width:42px; height:62px;" class="row_data_img" col_name="<?php echo $row['Photo'];?>">
                            <img src="../profiles/avatar.jpg"  width="40px" height="60px">
                        </div>
                    </td>
                    <td>             
                        <div class="row_data"  col_name="Student_Name">
                            <?php echo $row['Student_Name'] ?>
                        </div>
                    </td>
                    <td>
                        <div class="row_data"  col_name="PhoneNamber">
                            <?php echo $row['PhoneNamber'] ?>
                        </div>
                    </td>
                    <td>
                        <div class="row_data"  col_name="College_Name">
                            <?php echo $row['College_Name'] ?>
                        </div>
                    </td>
                    <td>
                        <div class="row_data"  col_name="Department_Name">
                            <?php echo $row['Department_Name'] ?>
                        </div>
                    </td>
                    <td>
                        <div class="row_data"  col_name="University_Number">
                            <?php echo $row['University_Number'] ?>
                        </div>
                    </td>
                    <td>
                        <div class="row_data"  col_name="Created_on">
                            <?php echo $row['Created_on'] ?>
                        </div>
                    </td>
                    <td>
                  
                    <a  href="#" class="btn_update_student btn btn-success btn-sm btn-flat" row_id="<?php echo $row['Student_ID'] ?>"><?php echo "تعديل" ?><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn_delete_student btn btn-danger btn-sm delete btn-flat" row_id="<?php echo $row['Student_ID'] ?>"><?php echo "حذف" ?><i class="fa fa-trash"></i> </a>

                    </td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    <?php
    } else {
    ?><tr>
            <td><?php echo "لا يوجد تحت هذه البيانات" ?> </td>
        </tr>
    <?php
    }
 
}
?>