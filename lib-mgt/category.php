<?php
include '../inc/connect.php';
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
  <title>التصنيفات</title>

  <!-- CSS -->
  <link href="../assest/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assest/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="../css/dialog_style.css">
  <link href="../css/sidebars.css" rel="stylesheet">
<!-- js -->
  <script src="../js/dialog_script.js"></script>
  <script src="../jquery3_6_0.js"></script>
  <script src="js/col_cat_scripts.js"></script>
  <script src="js/category.js"></script>

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

    .form1 {

      width: 100%;
      max-width: 630px;
      padding: 15px;
      margin: auto;
      margin-top: 8%;
      border-radius: 20px;
      box-shadow: 1px 1px 15px 0.1px #004679;
      background-color: #fff;
      padding-bottom: 40px;
      padding-top: 40px;
    }

    .form-control {
      margin-right: 25%;
      width: 50%
    }

    .form-label {
      margin-right: 40%;
      margin-bottom: 30px;
    }

    .form-select {
      width: 50%;
      margin-right: 25%;
      margin-bottom: 30px;
    }

    .cos {
      width: 100%;
      height: 200px;
    }

    .counterup .box .text {
      float: right;

      text-align: right;
    }

    .counterup .box .icon {
      float: left;
    }
  </style>
</head>

<body>

  <?php
  include 'some_blocks/header.php'
  ?>

  <div class="container-fluid">
    <div class="row">
      <!-- hbgjhgvj -->

      <?php
      include 'some_blocks/side-menu.php'
      ?>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-1">


        <div class="bd-example">
          <nav style="background-color: #dee2e6 ;">
            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist" style="place-content: center;">
              <button  class="nav-link active" id="nav-name-tab" data-bs-toggle="tab" data-bs-target="#nav-name" type="button" role="tab" aria-controls="nav-home" aria-selected="true"> اضافة
                صنف</button>
              <button class="nav-link" id="nav-an-tab" data-bs-toggle="tab" data-bs-target="#nav-an" type="button" role="tab" aria-controls="nav-an" aria-selected="false"> انتماء الصنف </button>
              <button class="nav-link" id="nav-search-tab" data-bs-toggle="tab" data-bs-target="#nav-search" type="button" role="tab" aria-controls="nav-search" aria-selected="false"> بحث </button>

            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade active show" id="nav-name" role="tabpanel" aria-labelledby="nav-name-tab">
              <form class="form1">
                <div class="mb-3">
                  <label for="cat_name" class="form-label"> ادخل اسم الصنف</label>
                  <input type="text" class="form-control" id="cat_name" placeholder="اسم الصنف">
                </div>
                <button style="margin-right: 25%; margin-top: 10px;" type="button" id="btn_add_cat" class="w-50 btn btn-outline-primary btn-sm">حفظ</button>
              </form>

            </div>
            <div class="tab-pane " id="nav-an" role="tabpanel" aria-labelledby="nav-an-tab">
              <form class="form1">
                <div class="mb-3">
                  <label class="form-label"> اختار اسم الصنف</label>
                  <select class="form-select form-select-md" id="cat_select" aria-label=".form-select-sm">
                    <option selected=""> اسم الصنف </option>
                    <option value="1">واحد</option>
                    <option value="2">اثنان</option>
                    <option value="3">ثلاثة</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label"> اختار اسم الكليه</label>
                  <select class="form-select form-select-md" id="col_select" aria-label=".form-select-sm">
                    <option selected=""> اسم الكليه </option>
                    <option value="1">واحد</option>
                    <option value="2">اثنان</option>
                    <option value="3">ثلاثة</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label style="margin-bottom: 10px;margin-top: 20px;" class="form-label"> اختار اسم القسم</label>
                  <select class="form-select form-select-md" id="depart_select" aria-label=".form-select-sm">
                    <option selected=""> اسم القسم </option>
                    <option value="1">واحد</option>
                    <option value="2">اثنان</option>
                    <option value="3">ثلاثة</option>
                  </select>
                </div>

                <button style="margin-right: 25%; margin-top: 10px;" type="button" class="w-50 btn btn-outline-primary btn-sm" id="add_con_cat">حفظ</button>
              </form>

            </div>
            <div class="tab-pane " id="nav-search" role="tabpanel" aria-labelledby="nav-search-tab">
              <div class="row g-2">

                <div class="col-md-6 col-lg-6">
                  <form class="col-sm-12">
                    <input type="search" class="form-control form-control-light" placeholder="بحث...." aria-label="Search" id="serch-cat">
                  </form>
                  <div class="card-body table-responsive" id="table_container" style="overflow:auto;height:auto;width:100%; direction:rtl">
                    <table class="table table-bordered table-striped table-sm" id="cat-table" style="width: 100%;">
                    </table>

                  </div>
                </div>
                <div class="col-md-6 col-lg-6 order-last">
                  <div class="card-body table-responsive" id="table_container" style="overflow:auto;height:auto;width:100%; direction:rtl">
                    <table class="table table-bordered table-striped table-sm" id="cat-con-table" style="width: 100%;">
                    </table>

                  </div>
                </div>
              </div>
              <!-- <form class="d-flex" style="width: 100%;max-width: 430px;padding: 15px;margin: auto;margin-top: 2%;border-radius: 20px;box-shadow: 5px 5px 15px 6px #004679; background-color: snow;float: right;">
                <input style="width: 100%;margin-right: 0;" class="form-control me-2" type="search" placeholder="بحث" aria-label="بحث">
                <div class="spinner-border text-primary" role="status">
                  <span class="visually-hidden">جار التحميل...</span>
                </div>
              </form> -->
            </div>
          </div>
        </div>

        <!-- foter stat -->

        <?php
        include 'some_blocks/footer.php'
        ?>
        <!-- foter end -->
      </main>

    </div>

  </div>
  <?php
  include 'some_blocks/loader_dialog.php'
  ?>
  <script>
    var ajax_url = "<?php echo APPURL; ?>/ajax/autherintereis.php";
    var ajax_url3 = "<?php echo APPURL; ?>/ajax/students_ajax.php";
    var update_url = "<?php echo APPURL; ?>/ajax/updates_ajax.php";
    var ajax_url2 = "<?php echo APPURL; ?>/ajax/files_ajax.php";
    //     //hide the message
    //     $("#dialog_button").on('click', hide_dialog);

    // //whene clicking add category
    //     $('#btn_add_cat').on('click', function(event) {
    //       if (($('#cat_name').val()).trim().length) {
    //         showLoading();
    //         $.post(ajax_url, {
    //           cat_name: $('#cat_name').val(),
    //           call_type: 'add_cat'
    //         }, function(data) {
    //           var d1 = JSON.parse(data);
    //           if (d1.status == 'success') {
    //             //consol.succss
    //             $("#dialog_message").text(d1.msg);
    //             showsucess();
    //             $('#cat_name').val("");

    //           } else {
    //             //echo error
    //             $("#dialog_message").text(d1.msg);
    //             showfaild();
    //           }
    //         })
    //       } else {
    //         $("#dialog_message").text('خطأ');
    //         showfaild();
    //         $('#cat_name').focus();
    //       }

    //     });


    //  //on click second tab
    //     $('#nav-an-tab').on('click', function() {
    //       showLoading();
    //       getcol_dep_cat_names(ajax_url3);
    //       hide_dialog();



    //     });
    //   //whene select collage
    //     $('#col_select').on('change', function(event) {
    //       event.preventDefault();
    //       changeDepart();
    //     });

    //   //btn connect cat with collages and departtment
    //   $('#add_con_cat').on('click', function(event) {
    //     event.preventDefault();
    //     console.log($('#depart_select').val());
    //       if (($('#depart_select').val()).length) {
    //         showLoading();
    //         data_obj = {
    //           col_dep_id: $('#depart_select').val(),
    //           cat_id: $('#cat_select').val(),
    //           call_type: 'connect_cat',
    //         };
    //         $.post('autherintereis.php',data_obj,function(data){
    //           var d1 = JSON.parse(data);
    //           if (d1.status == 'success') {
    //             //consol.succss
    //             $("#dialog_message").text(d1.msg);
    //             showsucess();
    //             $('#cat_name').val("");

    //           } else {
    //             //echo error
    //             $("#dialog_message").text(d1.msg);
    //             showfaild();
    //           }
    //         });       
    //       }else {
    //         $("#dialog_message").text('خطأ');
    //         showfaild();
    //         // $('#cat_name').focus();
    //       }
    //     });








    //     document.getElementById("q").addEventListener("click", function() {
    //       self.location = 'index.php';
    //     })
    //   
  </script>

  <script src="../assest/js/bootstrap.bundle.min.js"></script>
</body>

</html>