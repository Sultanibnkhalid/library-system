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
  <title>اضافةمشترك</title>

  <!-- CSS -->
  <link href="../assest/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assest/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="../css/dialog_style.css">
  <link href="../css/sidebars.css" rel="stylesheet">
  <!-- js -->
  <script src="../jquery3_6_0.js"></script>
  <script src="../js/dialog_script.js"></script>
  <script src="js/form-validation.js"></script>

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
    }

    .bg-dark {
      background-color: #073f5f !important;
    }

    .mb-1 {
      direction: rtl;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
      color: #495057;
      background-color: #fff;
      border-color: #dee2e6 #dee2e6 #fff;
      font-size: 16px;
    }

    .btn-toggle-nav a {
      font-size: 14px;
    }
  </style>

</head>

<body>

  <!-- includ header-->

  <?php
  include 'some_blocks/header.php'
  ?>

  <div class="container-fluid">
    <div class="row">

      <!-- includ side menu -->
      <?php
      include 'some_blocks/side-menu.php'
      ?>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="bd-example">
          <nav style="background-color: #dee2e6 ;">
            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist" style="place-content: center;">
              <button class="nav-link active" id="nav-student-tab" data-bs-toggle="tab" data-bs-target="#nav-student" type="button" role="tab" aria-controls="nav-student" aria-selected="true"> اضافة طالب</button>
              <button class="nav-link" id="nav-teacher-tab" data-bs-toggle="tab" data-bs-target="#nav-teacher" type="button" role="tab" aria-controls="nav-teacher" aria-selected="false"> اضافة استاذ </button>
              <button class="nav-link" id="nav-user-tab" data-bs-toggle="tab" data-bs-target="#nav-user" type="button" role="tab" aria-controls="nav-user" aria-selected="false"> اضافة مستخدم </button>


            </div>
          </nav>

          <div class="tab-content" id="nav-tabContent">
            <!-- بنل الطالب -->
            <div class="tab-pane fade active show" id="nav-student" role="tabpanel" aria-labelledby="nav-student-tab">

              <div class="row g-3">
              <div class="col-md-12 col-lg-12 ">
              <a href="search_and_Edite_suscriber.php" class="btn_details btn btn btn-primary btn-sm delete btn-flat" style="float: left;left: 1.5%;position: absolute;">بحث<i class="fa fa-search" style="margin-right: 5px;"></i> </a>
              </div>
                <div class="col-md-5 col-lg-4  order-md-last   order-sm-last  order-last  ">
                <canvas class="my-4 w-100" id="conval" width="100%" height="5"></canvas>

                  <div class="col">
                    <div class="card shadow-sm">
                      <img id="student_img" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="...">


                    </div>
                  </div>




                  <form class="card p-2" method="POST" action="" name="form1" id="form1" enctype="multipart/form-data">
                    <div class="input-group">
                      <input type="file" id="student_inputfile" name="student_inputfile" accept="image/*"  class="form-control rq" placeholder="اختيار صورة">
                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" onclick="onsubmitting(event)" id="student_submit_button">اضافة</button>
                  </form>
                </div>

                <div class="col-md-7 col-lg-8 ">
                  <h4 class="mb-3">نموذج بيانات الطالب </h4>
                  <h4 class="mb-3" id="h_error"></h4>
                  <form class="needs-validation" action="">
                    <div class="row g-3">
                      <div class="col-sm-12">
                        <label for="student_name" class="form-label">الاسم </label>
                        <input type="text" class="form-control  rq" id="student_name" placeholder="" required="true">
                        <div class="invalid-feedback">
                          يرجى إدخال الاسم بشكل صحيح صحيح.
                        </div>
                      </div>
                      <!-- add pattern to the input -->
                      <div class="col-sm-6">
                        <label for="student_phone" class="form-label">رقم الهاتف</label>
                        <input type="number" class="form-control  rq" id="student_phone" placeholder="" value="" required="true">
                        <div class="invalid-feedback">
                          يرجى إدخال رقم هاتف صحيح.
                        </div>
                      </div>


                      <div class="col-6">
                        <label for="student_Unumber" class="form-label">الرقم الجامعي</label>
                        <div class="input-group has-validation">
                          <!-- <span class="input-group-text">@</span> -->
                          <input type="number" class="form-control  rq" id="student_Unumber" placeholder="الرقم الجامعي" required="true">
                          <div class="invalid-feedback">
                            الرقم الجامعي مطلوب.
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <label for="student_collage" class="form-label">الكلية</label>
                        <select class="form-select  rq" id="student_collage" required="">

                        </select>
                        <div class="invalid-feedback">
                          كلية بشكل صحيح.
                        </div>
                      </div>

                      <div class="col-md-4">
                        <label for="student_department" class="form-label">القسم</label>
                        <select class="form-select  rq" id="student_department" required="">

                        </select>
                        <div class="invalid-feedback">
                          يرجى اختيار اسم القسم بشكل صحيح.
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="student_gander" class="form-label">النوع</label>
                        <select class="form-select  rq" id="student_gander" required="">
                          <option value="ذكر">ذكر</option>
                          <option value="انثى">انثى</option>
                        </select>
                        <div class="invalid-feedback">
                          يرجى اختيار النوع بشكل صحيح.
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="studen_temail" class="form-label">البريد الإلكتروني <span class="text-muted">(اختياري)</span></label>
                      <input type="email" class="form-control" id="student_email" placeholder="you@example.com">
                      <div class="invalid-feedback">
                        يرجى إدخال عنوان بريد إلكتروني صحيح لاستعادة كلمة المرور .
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="student_address" class="form-label">العنوان</label>
                      <input type="text" class="form-control" id="student_address" placeholder="ذمار شارع رداع" required="">
                      <div class="invalid-feedback">

                      </div>
                    </div>


                    <hr class="my-4">


                  </form>
                </div>
              </div>

            </div>


            <!-- بنل المكتبي -->

            <div class="tab-pane " id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
              <div class="row g-3">
              <div class="col-md-12 col-lg-12 ">
              <a href="search_and_Edite_suscriber.php" class="btn_details btn btn btn-primary btn-sm delete btn-flat" style="float: left;left: 1.5%;position: absolute;">بحث<i class="fa fa-search" style="margin-right: 5px;"></i> </a>
              </div>
                <div class="col-md-5 col-lg-4  order-md-last   order-sm-last  order-last  ">
                <canvas class="my-4 w-100" id="conval" width="100%" height="5"></canvas>


                  <div class="col">
                    <div class="card shadow-sm">
                      <img id="user_img" src="#" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="...">


                    </div>
                  </div>




                  <form class="card p-2">

                    <div class="input-group">
                      <input type="file" id="user_inputfile" accept="image/*" class="form-control  rq" placeholder="اختيار صورة">

                    </div>


                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" id="user_submit_button">اضافة</button>
                  </form>
                </div>

                <div class="col-md-7 col-lg-8 ">
                  <h4 class="mb-3">نموذج بيانات الموضف </h4>
                  <h4 class="mb-3" id="h3_error"></h4>
                  <form class="needs-validation" action="#">
                    <div class="row g-3">
                      <div class="col-sm-12">
                        <label for="user_name" class="form-label">الاسم </label>
                        <input type="text" class="form-control  rq" id="user_name" placeholder="" required="true">
                        <div class="invalid-feedback">
                          يرجى إدخال الاسم بشكل صحيح صحيح.
                        </div>
                      </div>
                      <!-- add pattern to this input -->
                      <div class="col-sm-12">
                        <label for="user_phone" class="form-label">رقم الهاتف</label>
                        <input type="number" class="form-control  rq" id="user_phone" placeholder="" value="" required="true">
                        <div class="invalid-feedback">
                          يرجى إدخال رقم الهاتف بشكل صحيح.
                        </div>
                      </div>
                    </div>

                    <!-- <div class="col-md-6">
                      <label for="user_gander" class="form-label">النوع</label>
                      <select class="form-select" id="user_gander" required="">
                        <option value="ذكر">ذكر</option>
                        <option value="انثى">انثى</option>
                      </select>
                      <div class="invalid-feedback">
                        يرجى اختيار النوع بشكل صحيح.
                      </div>
                    </div> -->

                    <div class="col-12">
                      <label for="user_email" class="form-label">البريد الإلكتروني <span class="text-muted">(مطلوب)</span></label>
                      <input type="email" class="form-control  rq" id="user_email" placeholder="you@example.com">
                      <div class="invalid-feedback">
                        يرجى إدخال عنوان بريد إلكتروني صحيح للتواصل.
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="NameOfUser" class="form-label">الاسم الوضيفي</label>
                      <input type="text" class="form-control  rq" id="NameOfUser" required="true">
                      <div class="invalid-feedback">
                        يرجى ادخال الاسم الوضيفي
                      </div>
                    </div>
                    <!-- <div class="col-12">
                      <label for="user_address" class="form-label">العنوان</label>
                      <input type="text" class="form-control" id="user_address" placeholder="ذمار شارع رداع" required="">
                      <div class="invalid-feedback">

                      </div>
                    </div> -->


                    <hr class="my-4">



                  </form>
                </div>
              </div>
            </div>
            <!-- end user panal -->

            <!-- بنل الاستاذ -->
            <!-- teacher panal start -->
            <div class="tab-pane " id="nav-teacher" role="tabpane3" aria-labelledby="nav-teacher-tab">
              <div class="row g-3">
              <div class="col-md-12 col-lg-12 ">
              <a href="search_and_Edite_suscriber.php" class="btn_details btn btn btn-primary btn-sm delete btn-flat" style="float: left;left: 1.5%;position: absolute;">بحث<i class="fa fa-search" style="margin-right: 5px;"></i> </a>
              </div>
                <div class="col-md-5 col-lg-4  order-md-last   order-sm-last  order-last  ">
                <canvas class="my-4 w-100" id="conval" width="100%" height="5"></canvas>

                  <div class="col">
                    <div class="card shadow-sm">
                      <img id="teacher_img" src="#" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="...">


                    </div>
                  </div>




                  <form class="card p-2">
                    <div class="input-group">
                      <input type="file" accept="image/*"  id="teacher_inputfile" class="form-control  rq" placeholder="اختيار صورة">

                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" id="teacher_submit_button">اضافة</button>
                  </form>
                </div>

                <div class="col-md-7 col-lg-8 ">
                  <h4 class="mb-3">نموذج بيانات الاستاذ </h4>
                  <h4 class="mb-3" id="h2_error"></h4>
                  <form class="needs-validation" action="#">
                    <div class="row g-3">
                      <div class="col-sm-12">
                        <label for="teacher_name" class="form-label">الاسم </label>
                        <input type="text" class="form-control  rq" id="teacher_name" placeholder="" required="true">
                        <div class="invalid-feedback">
                          يرجى إدخال الاسم بشكل صحيح صحيح.
                        </div>
                      </div>
                    </div>


                    <div class="col-12">
                      <label for="teacher_phone" class="form-label">رقم الهاتف</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text">@</span> -->
                        <input type="number" class="form-control  rq" id="teacher_phone" required="true">
                        <div class="invalid-feedback">
                          رقم الهاتف مطلوب.
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <label for="teacher_gander" class="form-label">النوع</label>
                      <select class="form-select  rq" id="teacher_gander" required="">
                        <option value="ذكر">ذكر</option>
                        <option value="انثى">انثى</option>
                      </select>
                      <div class="invalid-feedback">
                        يرجى اختيار النوع بشكل صحيح.
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="teacher_email" class="form-label">البريد الإلكتروني <span class="text-muted">(اختياري)</span></label>
                      <input type="email" class="form-control" id="teacher_email" placeholder="you@example.com">
                      <div class="invalid-feedback">
                        يرجى إدخال عنوان بريد إلكتروني صحيح لاستعادة كلمة المرور .
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="teacher_address" class="form-label">العنوان</label>
                      <input type="text" class="form-control" id="teacher_address" placeholder="ذمار شارع رداع" required="">
                      <div class="invalid-feedback">

                      </div>
                    </div>


                    <hr class="my-4">


                  </form>

                </div>
              </div>
            </div>
            <!-- end teacher paal -->

          </div>

        </div>


        <!-- dialog tages -->

        <?php
        include 'some_blocks/loader_dialog.php'
        ?>
        <!-- dialog tages -->

        <!-- foter stat -->

        <?php
        include 'some_blocks/footer.php'
        ?>
        <!-- foter end -->



      </main>
    </div>

  </div>
  <!-- my scripts start -->


  <!-- بداية الجافا سكريبت -->

  <script>
    //variables

    var student_img_name = '';
    var student_img_size = '';

    //eventlistner for student file
    $("#student_inputfile").on('change', function(event) {

      const file = event.target.files[0];
      student_img_name = file.name;
      student_img_size = file.size;
      var reader = new FileReader();
      reader.readAsDataURL(file);

      reader.onload = function(e) {
        //متغير يحتوي الصورة

        //الحدث onload يحدث اثناء العملية الحالية 
        document.getElementById("student_img").setAttribute('src', e.target.result);
      }
    });


    var ajax_url = "ajax/students_ajax.php";
    var coll_object;
    var depart_object;
    //adding data to selects
    $.getJSON(ajax_url, {
      call_type: 'get_collages'
    }, function(data) {
      coll_object = data;
    });
    $.getJSON(ajax_url, {
      call_type: 'get_depart'
    }, function(data) {
      depart_object = data;
    });


    $("#dialog_button").on('click', hide_dialog);
    //on load
    //  DOMContentLoaded

    document.addEventListener("DOMContentLoaded", function() {
      setTimeout(() => {
        getCollages()
      }, 1000);
    });

    function getCollages() {
      var opt = '';
      opt += '<option value=""> اختر... </option>'
      $.each(coll_object, function(index, val) {
        opt += '<option value="' + val['College_ID'] + '" >' + val['College_Name'] + '</option>';
      });

      $(document).find('#student_collage').html(opt);
      document.getElementById('student_collage').selectedIndex = 0;

    };

    $("#student_collage").on("change", function() {
      var selectedcollage = document.getElementById('student_collage').value;
      var opt = '';
      opt += '<option value=""> اختر... </option>'
      $.each(depart_object, function(index, val) {
        if (val['College_ID'] == selectedcollage) {
          opt += '<option value="' + val['ColDep_ID'] + '" >' + val['Department_Name'] + '</option>';
        }
      });
      $(document).find('#student_department').html(opt);
      document.getElementById('student_department').selectedIndex = 0;
    });


    //function when submit new student data    
    async function onsubmitting(event) {
      event.preventDefault();
      try {
        let valid = await validateInputs('#nav-student');
        if (valid) {
          showLoading();
          const fileInput = document.getElementById("student_inputfile");
          var student_img = fileInput.files[0];
          var formData = new FormData();
          formData.append('profiles', student_img);
          //  alert(student_img_name);
          if (student_img_size == 0) {
            //|| student_img_size > 600
            document.getElementById("h_error").innerHTML = "يرى اختيار الصورة بشكل صحيح";
            //  alert(student_img_size);
            return;
          }
          formData.append('fname', $('#student_name').val());
          formData.append('fUnumbere', $('#student_Unumber').val());
          formData.append('fphone', $('#student_phone').val());
          formData.append('coll_dep_id', $('#student_department').val());
          formData.append('fadress', $('#student_address').val());
          formData.append('femail', $('#student_email').val());
          formData.append('fgender', $('#student_gander').val());
          formData.append('call_type', 'add_new_student');

          $.post({
            url: ajax_url,
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
              var d1 = JSON.parse(data);
              if (d1.status == "error") {
                $("#dialog_message").text(d1.msg);
                showfaild();
              } else if (d1.status == "success") {
                $("#dialog_message").text(d1.msg);
                showsucess();
                clearForm('#nav-student');
              } else {
                $("#dialog_message").innerHTML = d1.msg;
                showfaild();
              }
            }
          });
        }
      } catch (error) {
        alert(error.stack);
        console.log(error.stack);
        showfaild();
      }
    } //student script end

    //teacher scrept start

    var teacher_img_name = "";
    var teacher_img_size = "";
    $("#teacher_inputfile").on('change', function(event) {

      const file = event.target.files[0];
      teacher_img_name = file.name;
      teacher_img_size = file.size;
      var reader = new FileReader();
      reader.readAsDataURL(file);

      reader.onload = function(e) {
        //متغير يحتوي الصورة

        //الحدث onload يحدث اثناء العملية الحالية 
        document.getElementById("teacher_img").setAttribute('src', e.target.result);
      }
    });

    // //whene submitting new teacher data
    // const teacher=document.getElementById("teacher_submit_button");
    // teacher.addEventListener("click",function(event){
    $("#teacher_submit_button").on('click', async function(event) {
      event.preventDefault();
      let valid = await validateInputs('#nav-teacher');
      if (valid) {
        try {
          showLoading();
          var formData = new FormData();
          var fileinput = document.getElementById("teacher_inputfile");
          var file = fileinput.files[0];
          formData.append('profiles', file);
          formData.append('fname', $("#teacher_name").val());
          formData.append('fphone', $("#teacher_phone").val());
          formData.append('fadress', $("#teacher_address").val());
          formData.append('femail', $("#teacher_email").val());
          formData.append('fgender', $("#teacher_gander").val());
          formData.append('call_type', 'add_new_teacher');
          $.post({
            url: ajax_url,
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
              var d1 = JSON.parse(data);
              if (d1.status == "error") {
                $("#dialog_message").text(d1.msg);
                showfaild();
              } else if (d1.status == "success") {
                $("#dialog_message").text(d1.msg);
                showsucess();
                clearForm('#nav-teacher');
              } else {
                $("#dialog_message").innerHTML = d1.msg;
                showfaild();
              }
            }
          });


        } catch (error) {
          console.log(error.message);
          showfaild();
        }

      }

    });
    //teacher scrept end


    //user script start
    var user_img_name = "";
    var user_img_size = "";
    $("#user_inputfile").on('change', function(event) {

      const file = event.target.files[0];
      user_img_name = file.name;
      user_img_size = file.size;
      var reader = new FileReader();
      reader.readAsDataURL(file);

      reader.onload = function(e) {
        //متغير يحتوي الصورة

        //الحدث onload يحدث اثناء العملية الحالية 
        document.getElementById("user_img").setAttribute('src', e.target.result);
      }
    });
    //submmt user
    $("#user_submit_button").on('click', async function(event) {
      event.preventDefault();
      let valid = await validateInputs('#nav-user');
      if (valid) {
        showLoading();
        var formData = new FormData();
        var fileinput = document.getElementById("user_inputfile");
        var file = fileinput.files[0];
        formData.append('profiles', file);
        formData.append('fname', $("#user_name").val());
        formData.append('fNameOfUser', $("#NameOfUser").val());
        formData.append('fphone', $("#user_phone").val());
        formData.append('femail', $("#user_email").val());
        formData.append('call_type', 'add_new_librarian');
       
        $.post({
          url: ajax_url,
          data: formData,
          processData: false,
          contentType: false,
          success: function(data) {
            var d1 = JSON.parse(data);
            if (d1.status == "error") {
              $("#dialog_message").text(d1.msg);
              showfaild();
            } else if (d1.status == "success") {
              $("#dialog_message").text(d1.msg);
              showsucess();
              clearForm('#nav-user');
            } else {
              $("#dialog_message").innerHTML = d1.msg;
              showfaild();
            }
          }
        });

      }
    });

    //user script end
  </script>



  <!-- my script end -->

  <script src="../assest/js/bootstrap.bundle.min.js"></script>

</body>

</html>