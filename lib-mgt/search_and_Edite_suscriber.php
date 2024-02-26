<?php
include_once '../inc/connect.php';
include_once '../login/user-login.php';
// session_start();
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (session_status() == PHP_SESSION_NONE) {
  header('Location: login.php');
  exit();
}
if (!isset($_SESSION['type']) || ($_SESSION['type'] != 'موظف')) {
  header('Location: login.php');
  exit();
}

?>
<!doctype html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>ادارة المشتركين</title>
  <!-- css -->
  <link href="../assest/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="../css/dialog_style.css" rel="stylesheet">

  <link rel="stylesheet" href="../assest/css/fontawesome-all.min.css">
  <link href="../css/sidebars.css" rel="stylesheet">
  <!-- js -->
  <script src="../jquery3_6_0.js"></script>
  <script src="../js/dialog_script.js"></script>
  <script src="js/some_functions.js"></script>
  <script src="js/form-validation.js"></script>
  <script src="js/mgt.js"></script>
  <script src="js/search-subscriber.js"></script>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }

      .freeDive {
        display: none;
      }
    }

    #forms_container {
      align-items: center;
      align-content: center;

    }
    .cancel {
      background-color: red;
      color: black;
      margin-top: 3px;
    }
    table{
            table-layout: fixed;
        }
       td{
        width: 25%;
        overflow: auto;
        word-wrap: normal;
       }
       td a{
        margin: 2px;
       }
  </style>

</head>

<body>
  <?php
  include 'some_blocks/header.php'
  ?>
  <div class="container-fluid">
    <div class="row">
      <!-- side menu -->
      <?php
      include 'some_blocks/side-menu.php'
      ?>


      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="bd-example">
          <nav style="background-color: #dee2e6 ;">
         
            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist" style="place-content: center;">
              <button class="nav-link active" id="nav-student-tab" data-bs-toggle="tab" data-bs-target="#nav-student" type="button" role="tab" aria-controls="nav-student" aria-selected="true"> الطلاب المشتركين </button>
              <button class="nav-link" id="nav-teacher-tab" data-bs-toggle="tab" data-bs-target="#nav-teacher" type="button" role="tab" aria-controls="nav-teacher" aria-selected="false"> الاساتذة المشتركين</button>
              <button class="nav-link" id="nav-user-tab" data-bs-toggle="tab" data-bs-target="#nav-user" type="button" role="tab" aria-controls="nav-user" aria-selected="false"> مستخدمو النظام</button>



            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade active show" id="nav-student" role="tabpanel" aria-labelledby="nav-student-tab">

              <div class="row g-3">
              <div class="col-md-12 col-lg-12 ">
              <a href="add_suscribers.php" class="btn_details btn btn btn-primary btn-sm delete btn-flat" style="float: left;">اضافة طالب جديد<i class="fa fa-plus" style="margin-right: 5px;"></i> </a>
              </div>
                <div class="col-md-4 col-lg-4  order-md-last   order-sm-last  order-last  ">
                </div>
                <div class="col-md-2 col-lg-2 " id="freeDive">
                  <div class="col-md-2 col-lg-2  col-sm-0 order-md-0  order-sm-0  order-0 ">
                    <br><br>
                  </div>
                </div>

                <div class="col-md-5 col-lg-5 ">

                  <br>
                  <form class="">
                    <input type="search" class="form-control form-control-light" placeholder="بحث...." aria-label="Search" id="search_student">
                  </form>

                </div>

              </div>
              <h3>الطلاب المشتركين</h3>
              <div class="card-body table-responsive" style="overflow:auto;height:400px;width:100%; direction:rtl">
                <table class="table table-bordered table-striped table-sm" id="student_table">
                  <!-- جدول لجلب البيانات الى داخلة -->
                </table>
              </div>

            </div>




            <div class="tab-pane" id="nav-teacher" role="tabpanel" aria-labelledby="nav-teacher-tab">

              <div class="row g-3">
              <div class="col-md-12 col-lg-12 ">
              <a href="add_suscribers.php" class="btn_details btn btn btn-primary btn-sm delete btn-flat" style="float: left;">اضافة استاذ جديد<i class="fa fa-plus" style="margin-right: 5px;"></i> </a>
              </div>
                <div class="col-md-4 col-lg-4  order-md-last   order-sm-last  order-last  ">

                </div>
                <div class="col-md-2 col-lg-2 " id="freeDive">
                  <div class="col-md-2 col-lg-2  col-sm-0 order-md-0  order-sm-0  order-0 ">
                    <br><br>
                  </div>
                </div>

                <div class="col-md-5 col-lg-5 ">

                  <br>
                  <form class="">
                    <input type="search" class="form-control form-control-light" placeholder="بحث...." aria-label="Search" id="search_teacher">
                  </form>

                </div>

              </div>
              <h3>الاساتذة المشتركين</h3>
              <div class="card-body table-responsive" style="overflow:auto;height:400px;width:100%; direction:rtl">
                <table class="table table-bordered table-striped table-sm" id="teacher_table">
                  <!-- جدول لجلب البيانات الى داخلة -->
                </table>
              </div>
            </div>

            <div class="tab-pane " id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">

              <div class="row g-3">
              <div class="col-md-12 col-lg-12 ">
              <a href="add_suscribers.php" class="btn_details btn btn btn-primary btn-sm delete btn-flat" style="float: left;">اضافة موظف جديد<i class="fa fa-plus" style="margin-right: 5px;"></i> </a>
              </div>
                <div class="col-md-4 col-lg-4  order-md-last   order-sm-last  order-last  ">

                </div>
                <div class="col-md-2 col-lg-2 " id="freeDive">
                  <div class="col-md-2 col-lg-2  col-sm-0 order-md-0  order-sm-0  order-0 ">
                    <br><br>
                  </div>
                </div>

                <div class="col-md-5 col-lg-5 ">

                  <br>
                  <form class="">
                    <input type="search" class="form-control form-control-light" placeholder="بحث...." aria-label="Search" id="search_user">
                  </form>

                </div>

              </div>
              <h3> مستخدمو النظام</h3>
              <div class="card-body table-responsive" style="overflow:auto;height:400px;width:100%; direction:rtl">
                <table class="table table-bordered table-striped table-sm" id="user_table">
                  <!-- جدول لجلب البيانات الى داخلة -->
                </table>
              </div>
            </div>

          </div>
        </div>


        <!-- foter stat -->

        <?php
        include 'some_blocks/footer.php'
        ?>
        <!-- foter end -->




        <!-- <div id="update_user_overlay">
   
  </div> -->





      </main>
    </div>

  </div>
  <div id="warnning_div" title="Warrning">
    <p>هل ان متاكد من الحذف حقاً؟</p>
  </div>

  <!-- dialog for update start-->
  <div id="overlay_div">
    <div id="student_dialog" class="border rounded up-f-dialog" style="max-width: 1200px;margin: 1.75rem auto;height: 90%; max-width: 1100px;">
      <?php include 'some_blocks/student_model.php' ?>
    </div>
    <div id="user_dialog" class="border rounded up-f-dialog" style="max-width: 1200px;margin: 1.75rem auto;height: 90%; max-width: 1100px;">
      <?php include 'some_blocks/user_model.php' ?>
    </div>
    <div id="teacher_dialog" class="border rounded up-f-dialog" style="max-width: 1200px;margin: 1.75rem auto;height: 90%; max-width: 1100px;">
      <?php include 'some_blocks/teacher_model.php' ?>
    </div>
  </div>
  <!--dialog for updatte  end  -->
  <!-- dilog ovarlay start -->
  <?php
  include 'some_blocks/loader_dialog.php';
  ?>
  <!-- dialogre overlay ens -->



   
  <!-- كود الجافا سكريبت -->

  <script>
    // var ajax_url = "../search_queries/";
    // var ajax_url2 = "students_ajax.php";
    // var update_url = "updates_ajax.php";
    // var coll_object;
    // var depart_object;
    // var student_id, teacher_id, user_id;
    // var student_data = {};
    // var user_data = {};
    // var teacher_data = {};
    // //adding data to call and depart
    // $.getJSON(ajax_url2, {
    //   call_type: 'get_collages'
    // }, function(data) {
    //   coll_object = data;
    // });
    // $.getJSON(ajax_url2, {
    //   call_type: 'get_depart'
    // }, function(data) {
    //   depart_object = data;
    // });
    // //search student 
    //     $('#search_student').on('keyup', function(event) {
    //       event.preventDefault();
    //       //mgt.js
    //       seachMembers("#student_table",$('#search_student').val(),'search_student');
    //     });
    // //search teacher
    //     $('#search_teacher').on('keyup', function(event) {
    //       event.preventDefault();
    //       //mgt.js
    //       seachMembers("#teacher_table",$('#search_teacher').val(),'search_teacher');
    //     });
    // //saerch user
    //     $('#search_user').on('keyup', function(event) {
    //       event.preventDefault();
    //       //mgt.js
    //       seachMembers("#user_table",$('#search_user').val(),'search_user');
    //     });
    // //when  clicking updata student 
    // $(document).on('click', '.btn_update_student', function(event) {
    //   event.preventDefault();
    //   student_img_name = '';
    //   var tbl_row = $(this).closest('tr');
    //   var row_id = $(tbl_row).attr('row_id');
    //   var img;
    //   // var data = {};
    //   tbl_row.find('.row_data_img').each(function(index, val) {
    //     img = $(this).attr('col_name');
    //   });

    //   tbl_row.find('.row_data').each(function(index, val) {
    //     var col_name = $(this).attr('col_name');
    //     student_data[col_name] = $(this).text().trim();

    //   });
    //   student_data['img'] = img;
    //   student_data['id'] = row_id;
    //   student_data['email'] = $(tbl_row).attr('em');
    //   student_data['address'] = $(tbl_row).attr('ad');
    //   showStudentDialog(student_data);
    //   getCollagesIntoSelect(coll_object);
    //   getDepartsIntoSelect(depart_object);

    //   $(document).find("#student_department option").each(function() {
    //     if ($(this).text() == student_data['Department_Name']) {
    //       $(this).prop('selected', true);
    //       return false;
    //     }
    //   });
    //   $(document).find("#student_collage option").each(function() {
    //     if ($(this).text() == student_data['College_Name']) {
    //       $(this).prop('selected', true);
    //       return false;
    //     }
    //   });

    // });

    //when clcking apdate usr
  //btn_update_user
    // $(document).on('click', '.btn_update_user', function(event) {
    //   event.preventDefault();
    //   user_img_name = '';
    //   var tbl_row = $(this).closest('tr');
    //   var row_id = tbl_row.attr('row_id');
    //   var img;
    //   // var data = {};
    //   tbl_row.find('.row_data_img').each(function(index, val) {
    //     img = $(this).attr('col_name');
    //   });

    //   tbl_row.find('.row_data').each(function(index, val) {
    //     var col_name = $(this).attr('col_name');
    //     user_data[col_name] = $(this).text().trim();

    //   });
    //   user_data['img'] = img;
    //   user_data['id'] = row_id;
    //   // user_id = row_id;
    //   showUserDialog(user_data);
    //   //pop_update_user
    //   console.log(user_data);
    // });

    // //update useer
    // $(document).on('click', '.btn_update_teacher', function(event) {
    //   event.preventDefault();
    //   teacher_img_name = '';
    //   var tbl_row = $(this).closest('tr');
    //   var row_id = tbl_row.attr('row_id');
    //   var img;
    //   // var data = {};
    //   tbl_row.find('.row_data_img').each(function(index, val) {
    //     img = $(this).attr('col_name');
    //   });

    //   tbl_row.find('.row_data').each(function(index, val) {
    //     var col_name = $(this).attr('col_name');
    //     teacher_data[col_name] = $(this).text().trim();

    //   });
    //   teacher_data['img'] = img;
    //   teacher_data['id'] = row_id;
    //   // teacher_id = row_id;
    //   showteacherDialog(teacher_data);
    //   //pop_update_user
    //   console.log(teacher_data);
    // });

    //when clicking cancel button
    // //call function to hide the dialoge
    // $(".cancel").on('click', function(event) {
    //   event.preventDefault();
    //   hideUpdateDialog();
    // });
    // //on clicking message buttn
    // $('#dialog_button').on('click', hide_dialog);
    // $(document).on('click', '.cancel', hideUpdateDialog());
    // //change depart on change collage
    // $("#student_collage").on('change', changeDepartsInSelect(depart_object));


    //()==>dailog events
    //events belong to the dialog events
    // var student_img_name = '';
    // var student_img_size = '';

    // //eventlistner for student file
    // $(document).on('change', '#student_inputfile', function(event) {
    //   const file = event.target.files[0];
    //   var reader = new FileReader();
    //   reader.readAsDataURL(file);
    //   reader.onload = function(e) {
    //     //متغير يحتوي الصورة
    //     //الحدث onload يحدث اثناء العملية الحالية 
    //     document.getElementById("student_img").setAttribute('src', e.target.result);
    //   }
    // });
  // //save edited student
  //   $("#student_submit_button").on('click', function(event) {
  //     event.preventDefault();
  //     let valid = validateInputs('#student_dialog');
  //     if (valid) {
  //       try {
  //         var formData = new FormData();
  //         const fileInput = document.getElementById("student_inputfile");
  //         let file=fileInput.files[0];
  //         formData.append('profiles',file)
  //         formData.append('fname', $('#student_name').val());
  //         formData.append('fUnumbere', $('#student_Unumber').val());
  //         formData.append('fphone', $('#student_phone').val());
  //         formData.append('coll_dep_id', $('#student_department').val());
  //         formData.append('fadress', $('#student_address').val());
  //         formData.append('femail', $('#student_email').val());
  //         formData.append('fgender', $('#student_gander').val());
  //         formData.append('call_type', 'update_student_data');

  //         $.post({
  //           url:update_url,
  //           data: formData,
  //           processData: false,
  //           contentType: false,
  //           success: function(data) {
  //             var d1 = JSON.parse(data);
  //             if (d1.status == "error") {
  //               $("#dialog_message").text(d1.msg);
  //               showfaild();
  //             } else if (d1.status == "success") {
  //               $("#dialog_message").text(d1.msg);
  //               showsucess();
  //               clearForm('#nav-student');
  //             } else {
  //               $("#dialog_message").innerHTML = d1.msg;
  //               showfaild();
  //             }
  //           }
  //         });
         
  //       } catch (error) {
  //         $("#dialog_message").innerHTML = error.message;
  //         showfaild();
  //       } 
  //     }

  //   }); //student script end

    //teacher scripts start
    // var teacher_img_name = "";
    // var teacher_img_size = "";
    // $("#teacher_inputfile").on('change', function(event) {
    //   const file = event.target.files[0];
    //   var reader = new FileReader();
    //   reader.readAsDataURL(file);
    //   reader.onload = function(e) {
    //     //متغير يحتوي الصورة
    //     //الحدث onload يحدث اثناء العملية الحالية 
    //     document.getElementById("teacher_img").setAttribute('src', e.target.result);
    //   }
    // });
    // //when clicking save techer
    // $(document).on('click', '#teacher_submit_button', function(event) {

    //   let valid = validateInputs('#teacher_dialog');
    //   if (valid) {
    //     try {
    //       event.preventDefault();
    //       var formData = new FormData();
    //       var fileinput = document.getElementById("teacher_inputfile");
    //       let file = fileinput.files[0];
    //       formData.append('profiles', file);
    //       formData.append('id',teacher_data['id'])
    //       formData.append('fname', $("#teacher_name").val());
    //       formData.append('fphone', $("#teacher_phone").val());
    //       formData.append('fadress', $("#teacher_address").val());
    //       formData.append('femail', $("#teacher_email").val());
    //       formData.append('fgender', $("#teacher_gander").val());
    //       formData.append('call_type', 'update_teacher_data');
    //       $.post({
    //         url: update_url,
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         success: function(data) {
    //           var d1 = JSON.parse(data);
    //           if (d1.status == "error") {
    //             $("#dialog_message").text(d1.msg);
    //             showfaild();
    //           } else if (d1.status == "success") {
    //             $("#dialog_message").text(d1.msg);
    //             showsucess();
    //             clearForm('#nav-teacher');
    //           } else {
    //             $("#dialog_message").innerHTML = d1.msg;
    //             showfaild();
    //           }
    //         }
    //       });
       

    //     } catch (error) {
    //       console.log(error.message);
    //     } 
    //   }
    // });

    //teacher_scripts end



    //user scripts start

    // var user_img_name = "";
    // var user_img_size = "";
    // //user input file scripts start
    // $("#user_inputfile").on('change', function(event) {
    //     const file = event.target.files[0];
    //     var reader = new FileReader();
    //     reader.readAsDataURL(file);
    //     reader.onload = function(e) {
    //       //متغير يحتوي الصورة
    //       //الحدث onload يحدث اثناء العملية الحالية 
    //       document.getElementById("user_img").setAttribute('src', e.target.result);
    //     }      
    // });
// //save user btn
//     $(document).on('click', '#user_submit_button',async function(event) {

//       event.preventDefault();
//       let valid =await validateInputs('#user_dialog');
//       if (valid) {
//         showLoading();
//         var formData = new FormData();
//         const fileinput = document.getElementById("user_inputfile");
//        let file=fileinput.files[0];
//        formData.append('profiles', file);
//         formData.append('fname', $("#user_name").val());
//         formData.append('fNameOfUser', $("#NameOfUser").val());
//         formData.append('fphone', $("#user_phone").val());
//         formData.append('femail', $("#user_email").val());
//         formData.append('call_type', 'update_librarian');
//         $.post({
//           url: update_url,
//           data: formData,
//           processData: false,
//           contentType: false,
//           success: function(data) {
//             var d1 = JSON.parse(data);
//             if (d1.status == "error") {
//               $("#dialog_message").text(d1.msg);
//               showfaild();
//             } else if (d1.status == "success") {
//               $("#dialog_message").text(d1.msg);
//               hideUpdateDialog();
//               showsucess();
//             } else {
//               $("#dialog_message").innerHTML = d1.msg;
//               showfaild();
//             }
//           }
//         });

       
//       }
//     });
    // $(".close").on('click', function(event) {
    //   // event.preventDefault();
    //   hideUpdaeFileDialog();
    // });

    //user scripts end
  </script>
  <!-- هنا نهاية  عملي  -->
  <script src="../assest/js/bootstrap.bundle.min.js"></script>
</body>

</html>