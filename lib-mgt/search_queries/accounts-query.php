<?php
//this file used especaly for collage page
include_once '../../inc/connect.php';
//search account
if (isset($_POST['call_type']) && $_POST['call_type'] == "search_account") {
    $text = app_db()->CleanDBData($_POST['acc_name']);
    $q1 = app_db()->select("SELECT account.Account_ID,account.UserName,account.password,account.Status,accounttype.Type_Name FROM `account` JOIN `accounttype` ON account.Type_ID=accounttype.Type_ID WHERE account.UserName LIKE '%$text%';");
    $res = '';

    $res .= '<thead>
        <tr>
            <th scope="col">اسم المستخدم</th>
            <th scope="col">البريد الاليكتروني</th>

        </tr>
    </thead>';
    if ($q1) {

        $res .= '<tbody>';

        foreach ($q1 as $row) {
            $q2_str='';

            $res.= '<tr scope="row" row_id=' . $row["Account_ID"] . '  row_type=' . $row['Type_Name'] . ' >
                    <td class="row-data">' . $row['UserName'] . '
                    </td><td class="email" >';
            if($row['Type_Name']=='طالب'){
                $q2_str="SELECT student.Email FROM student WHERE student.Account_ID=".$row["Account_ID"].";";
            }
            if($row['Type_Name']=='استاذ'){
                $q2_str="SELECT teacher.Email FROM teacher WHERE teacher.Account_ID=".$row["Account_ID"].";";
            } 
            if($q2_str!=''){
                $q2=app_db()->Select($q2_str);
                if($q2){
                    foreach ($q2 as $row2){
                        $res.=$row2['Email'];
                    }
                }
            }        
            
                 $res.='</td> <td status=' . $row["Status"] . '>
                        <a href="#" role="button" class="btn_active btn btn-success btn-sm btn-flat">تفعيل<i class="fa fa-edit"></i> </a>
                        <a href="#" class="btn_cancel btn btn btn-danger btn-sm delete btn-flat" >تعطيل<i class="fa fa-times-circle" ></i> </a>
                        </td><td>
                        <a href="#" class="btn_details btn btn btn-primary btn-sm delete btn-flat">تفاصيل<i class="fa fa-briefcase"></i> </a>
                        <a href="#" class="btn_send btn btn btn-danger btn-sm delete btn-flat"> كلمة المرور<i class="fa fa-send"></i> </a>
                       
                    </td>
                    </tr>';
        }

        $res .= '</tbody>';
    }
    echo $res;
    die();
}
//search account details
if (isset($_POST['call_type']) && $_POST['call_type'] == "account_info") {
    $q1;
    $res='';
    $row_type= app_db()->CleanDBData($_POST['row_type']);
    $row_id= app_db()->CleanDBData($_POST['row_id']);
    if($row_type=='استاذ'){
        $q1=app_db()->Select("SELECT teacher.Teacher_Name as name,teacher.Gender as ug ,teacher.Photo as img,teacher.PhoneNamber as phone FROM `teacher` WHERE teacher.Account_ID=$row_id");
    }
    if($row_type=='طالب'){
        $q1=app_db()->Select("SELECT Student_Name as name,student.Gender as ug,student.PhoneNamber as phone ,student.Photo as img FROM `student` WHERE student.Account_ID=$row_id;") ;    
    }
    if ($q1) {

        
        foreach ($q1 as $row) {
            $res.='<div class="row g-2">
            <div class="col-md-6 col-lg-6">
            <p class="text-primary mb-0">الاسم :</p>
              <p style="border-bottom: 0.1px solid;border-bottom-color: darkgrey;">'.$row['name'].'</p>
              <p class="text-primary mb-0"> الهاتف :</p>
              <p style="border-bottom: 0.1px solid;border-bottom-color: darkgrey;">'.$row['phone'].'</p>
              <p > <p class="text-primary" style="float: right;margin-left: 10px;">الجنس :  </p> <p style="border-bottom: 0.1px solid;border-bottom-color: darkgrey;"> '.$row['ug'].'</p> </p>
              <p > <p class="text-primary" style="float: right;margin-left: 10px;">نوع الحساب :  </p> <p style="border-bottom: 0.1px solid;border-bottom-color: darkgrey;"> '.$row_type.'</p> </p>
              
            </div>
           <div class="col-md-6 col-lg-6 order-last">
           <div class="col">
              <div class="card shadow-sm" style="background-color:rgba(0, 0, 0, 0.05);border:0px;">
                <img src="../profiles/'.$row['img'].'" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="..." style="border-radius: 20px;">
              </div>
            </div>
            </div>
            </div>';
         }
         echo $res;
        die();
    }
    
   echo 'not found';
    die();
}

?>