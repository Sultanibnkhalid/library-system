<?php

include_once '../../inc/connect.php';

//select all students
if (isset($_POST['call_type']) && $_POST['call_type'] == "search_user") {
 
    $text_to_search = app_db()->CleanDBData($_POST['text_to_search']);
    $query=app_db()->Select("SELECT librarian.NameOfUser,librarian.UserName,librarian.ContactNo,librarian.Email,librarian.Created_on,librarian.Photo,accounttype.Type_Name FROM librarian JOIN accounttype ON librarian.Type_ID = accounttype.Type_ID WHERE CONCAT(librarian.UserName,librarian.NameOfUser,librarian.ContactNo) LIKE '%$text_to_search%';");
//    $query=saerch_db()->saerch_librarian($text_to_search);
    if ($query) {
?>
        <thead>
            <tr>
                <th>الصورة</th>
                <!-- <th scope="col">الاسم الوظيفي</th> -->
                <th scope="col">الاسم</th>
                <th scope="col">الهاتف</th>
                <th scope="col">البريد الالكتروني</th>
                <th scope="col">تاريخ الاشتراك</th>
                <th scope="col">المستوى الوظيفي</th>       
                
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($query as $row) {
             $img_ser="uploads/".$row['Photo'];
              ?>
                <tr scope="row" row_id="<?php echo $row['NameOfUser'] ?>">
                    <td>
                        <div style="width:42px; height:62px;" class="row_data_img" col_name="<?php echo $row['Photo'] ;?>">
                            <img  src="../profiles/avatar.jpg" width="40px" height="60px">
                        </div>
                    </td>
                    <!-- <td>
                        <div class="row_data" edit_type="click" col_name="NameOfUser">
                            <?php echo $row['NameOfUser'] ?>
                        </div>
                    </td> -->
                    <td>
                        <div class="row_data" edit_type="click" col_name="UserName">
                            <?php echo $row['UserName'] ?>
                        </div>
                    </td>
                    <td>
                        <div class="row_data" edit_type="click" col_name="ContactNo">
                            <?php echo $row['ContactNo'] ?>
                        </div>
                    </td>
                    <td>
                        <div class="row_data" edit_type="click" col_name="Email">
                            <?php echo $row['Email'] ?>
                        </div>
                    </td>

                    

                    <td>
                        <div class="row_data" edit_type="click" col_name="Created_on">
                            <?php echo $row['Created_on'] ?>
                        </div>
                    </td>
                    <td>
                        <div class="row_data" edit_type="click" col_name="Type_Name">
                            <?php echo $row['Type_Name'] ?>
                        </div>
                    </td>

                    <td>
                    <a href="#" class="btn_update_user btn btn-success btn-sm btn-flat" row_id="<?php echo $row['NameOfUser'] ?>"><?php echo "تعديل" ?> <i class="fa fa-edit"></i></a>
                        <a href="#" class="btn_delete_user btn btn-danger btn-sm delete btn-flat" row_id="<?php echo $row['NameOfUser'] ?>"><?php echo "حذف" ?> <i class="fa fa-trash"></i></a>


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