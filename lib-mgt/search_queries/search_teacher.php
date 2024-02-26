<?php
include_once '../../inc/connect.php';
//select all students
if (isset($_POST['call_type']) && $_POST['call_type'] == "search_teacher") {
    $text_to_search = app_db()->CleanDBData($_POST['text_to_search']);
    $query = app_db()->SELECT("SELECT * FROM `teacher` WHERE  CONCAT(teacher.Teacher_Name,teacher.PhoneNamber) like'%$text_to_search%';");
    if ($query) {
?>
        <thead>
            <tr>
                <th>الصورة</th>     
                <th scope="col">الاسم</th>
                <th scope="col">الهاتف</th>
                <!-- <th scope="col">المستوى الوظيفي</th> -->
                <th scope="col">البريد الالكتروني</th>  
                <th scope="col">العنوان</th>
                <th scope="col">النوع</th>
                <th scope="col">تاريخ الاشتراك</th>
                <!-- <th scope="col">الاسم الوظيفي</th> -->
                <!-- <th scope="col">الرقم المكتبي</th> -->

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($query as $row) {
             $img_ser="uploads/".$row['Photo'];
            ?>
                <tr scope="row" row_id="<?php echo $row['Teacher_ID'] ?>">
                    <td>
                        <div style="width:42px; height:62px;" class="row_data_img" col_name="<?php echo $row['Photo'];?>">
                            <img src="../profiles/avatar.jpg" width="40px" height="60px">
                        </div>
                    </td>
                 
                    <td>
                        <div class="row_data" edit_type="click" col_name="Teacher_Name">
                            <?php echo $row['Teacher_Name'] ?>
                        </div>
                    </td>
                    <td>
                        <div class="row_data" edit_type="click" col_name="PhoneNamber">
                            <?php echo $row['PhoneNamber'] ?>
                        </div>
                    </td>
                    <td>
                        <div class="row_data" edit_type="click" col_name="Email">
                            <?php echo $row['Email'] ?>
                        </div>
                    </td>
                    <td>
                        <div class="row_data" edit_type="click" col_name="Address">
                            <?php echo $row['Address'] ?>
                        </div>
                    </td>
                    <td>
                        <div class="row_data" edit_type="click" col_name="Gender">
                            <?php echo $row['Gender'] ?>
                        </div>
                    </td>

                    <td>
                        <div class="row_data" edit_type="click" col_name="Created_on">
                            <?php echo $row['Created_on'] ?>
                        </div>
                    </td>
                    <td>
                    <a href="#" class="btn_update_teacher btn btn-success btn-sm btn-flat" row_id="<?php echo $row['Teacher_ID'] ?>"><?php echo "تعديل" ?> <i class="fa fa-edit"></i></a>
                        <a href="#" class="btn_delete_teacher btn btn-danger btn-sm delete btn-flat" row_id="<?php echo $row['Teacher_ID'] ?>"><?php echo "حذف" ?> <i class="fa fa-trash"></i></a>
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
