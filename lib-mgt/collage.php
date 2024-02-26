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
  <title>الكليات والاقسام</title>

  <!-- CSS -->
  <link href="../assest/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assest/css/fontawesome-all.min.css">
  <link href="../css/sidebars.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/dialog_style.css">
  <!-- js -->
  <script src="../jquery3_6_0.js"></script>
  <script src="../js/dialog_script.js"></script>
  <script src="js/col_cat_scripts.js"></script>
  <script src="js/mgt.js"></script>
  <script src="js/collage.js"></script>




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
      /* padding-bottom: 40px; */
      /* padding-top: 40px; */
    }
  </style>
</head>

<body>

  <?php
  include 'some_blocks/header.php'
  ?>

  <div class="container-fluid">
    <div class="row">
      <!-- dd -->

      <?php
      include 'some_blocks/side-menu.php'
      ?>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-1">
        <div class="bd-example">
          <nav style="background-color: #dee2e6 ;">
            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist" style="place-content: center;">
              <button  class="nav-link active" id="nav-name-tab" data-bs-toggle="tab" data-bs-target="#nav-name" type="button" role="tab" aria-controls="nav-name" aria-selected="true"> اضافة
                كليه</button>
              <button class="nav-link" id="nav-search-tab" data-bs-toggle="tab" data-bs-target="#nav-search" type="button" role="tab" aria-controls="nav-search" aria-selected="false"> بحث </button>

            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade active show" id="nav-name" role="tabpanel" aria-labelledby="nav-name-tab">
              <form class="form1">
                <div class="row g-3">
                  <div class="col-12">
                    <div class="row g-3">

                      <label for="col-select" class="form-label">اختر كلية</label>
                      <select id="col-select" class="form-control">

                      </select>
                    </div>
                  </div>
                </div>
                <div class="row g-3">
                  <div class="col-12">
                    <div class="row g-3">
                      <div class="col-8">
                        <label for="col_name" class="form-label"> ادخل اسم الكلية</label>
                        <input type="text" class="form-control" id="col_name" placeholder="اسم الكلية">
                      </div>
                      <div class="col-4">
                        <br>
                        <button type="button" class="w-50 btn btn-outline-primary form-button " id="add_col">حفظ</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row g-3">
                      <div class="col-8">
                        <label for="depart_name" class="form-label"> ادخل اسم القسم</label>
                        <input type="text" class="form-control" id="depart_name" placeholder="اسم القسم">

                      </div>
                      <div class="col-4">
                        <br>
                        <button type="button" class="w-50 btn btn-outline-primary form-button" id="add_depart">اضافة</button>

                      </div>

                    </div>
                  </div>
                  <div class="col-12">
                    <ul id="depart_list">

                    </ul>
                  </div>

                </div>

              </form>


            </div>
            <div class="tab-pane " id="nav-search" role="tabpanel" aria-labelledby="nav-search-tab">

              <div class="col-md-12 col-lg-12">

                <br>
              </div>
              <div class="row g-2">

                <div class="col-md-6 col-lg-6">
                  <form class="col-sm-12">
                    <input type="search" class="form-control form-control-light" placeholder="بحث...." aria-label="Search" id="serch-collage">
                  </form>
                  <div class="card-body table-responsive" id="table_container" style="overflow:auto;height: 400px;;width:100%; direction:rtl">
                    <table class="table table-bordered table-striped table-sm" id="col-table" style="width: 100%;">
                    </table>

                  </div>
                </div>
                <div class="col-md-6 col-lg-6 order-last">
                  <div class="card-body table-responsive" id="table_container" style="overflow:auto;height:auto;width:100%; direction:rtl">
                    <table class="table table-bordered table-striped table-sm" id="dep-table" style="width: 100%;">
                    </table>

                  </div>
                </div>
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
  <!-- <script>
    $("#dialog_button").on('click', hide_dialog);

    $(document).ready(function() {
      seachCollages('#col-select');
    })
  </script> -->

  <script src="../assest/js/bootstrap.bundle.min.js"></script>
</body>

</html>