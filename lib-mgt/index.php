<?php
include_once '../inc/connect.php';
include_once '../login/user-login.php';
//  session_start();
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
  <title>الرئيسية</title>
  <!-- css -->

  <link href="../assest/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assest/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="../css/dialog_style.css">
  <!-- js -->
  <script src="../jquery3_6_0.js"></script>
  <link href="../css/sidebars.css" rel="stylesheet">
  <script src="../js/dialog_script.js"></script>
  
  <style>
    @media only screen and (max-width: 89px) {

      /* Hide the sidebar */
      .w {
        width: 0;
      }
    }


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


    a {
      color: #fff
    }

    .counterup .box .text {
      float: right;

      text-align: right;
    }

    .counterup .box .icon {
      float: left;
    }
 

    .counterup .box {
      width: 100%;
      height: 130px;
      background: #00C0EF;
      padding: 10px 10px;
      margin-bottom: 30px;
      color: #fff;

    }

    .counterup .box2 {
      background: #00A65A;
    }

    .counterup .box3 {
      background: #DD4B39;
    }

    .counterup .box4 {
      background: #F39C12;
    }

    .counterup .box:hover {
      transform: scale(1.1);
      -webkit-transition: ease .5s all;
      -moz-transition: ease .5s all;
      -ms-transition: ease .5s all;
      -o-transition: ease .5s all;
      transition: ease .5s all;
    }

    .counterup .box .icon {
      width: 15%;
      float: left;
    }

    .counterup .box .text {
      width: 70%;
      float: right;
    }

    .counterup .box i {
      font-size: 30px;
      color: #ddd;
      margin-top: 20px;
    }

    .counterup .box span {
      margin-right: 5px;
    }

    .counterup .box h2 {
      font-weight: bold;
      margin-top: 10px;
      color: #fff;
    }

    .counterup .box h4 a {
      text-decoration: none;
      text-transform: capitalize;

      margin-top: 0;

    }

    .row {
      margin-left: 0;
    }

    .row>* {
      padding-left: 0;
    }

    .container-fluid {
      padding-left: 0;
      padding-right: 0;
    }
  </style>


  <!-- Custom styles for this template -->
  <!-- <link href="dashboard.rtl.css" rel="stylesheet"> -->


</head>

<body>
  <!-- include header -->
  <?php
  include 'some_blocks/header.php'
  ?>

  <div class="container-fluid" style="padding-left:0;">
    <div class="row" style="margin-left:0;">

      <!-- include side-menu-->
      <?php
      include 'some_blocks/side-menu.php'
      ?>
      <!-- end-side-menue -->
      <div class="col-md-9 ms-sm-auto col-lg-10 px-md-0">

        <div class="container" style="padding-right: 65px;padding-left: 65px;padding-top: 30px;background-image: url(../img/3.jpg);background-position: center;height: 690px;background-size: cover;max-width: 100%; overflow: auto;">
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-md-6">
              <div class="left" style="text-align: right;">
                <a style="margin-left:8px;font-size: 20px;" href="#"> معلومات عامه<i style="margin-left:8px;font-size: 20px;" class="fas fa-home"></i></a>

              </div>
            </div>
            <div class="col-md-6">
              <div class="text-right" style="text-align: right;">


              </div>
            </div>
          </div>
          <div class="row counterup">
            <div class="col-md-4 col-sm-6 col-xs-12 control">

              <div class="box">
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <div class="text">
                  <h3><span class="counter" id="av-b-count">400</span></h3>
                  <h4><a href="#" id="avbook">الكتب المتوفرة</a></h4>
                </div>
              </div>

            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 control">
              <div class="box box2">
                <div class="icon">
                  <i class="fa fa-rocket"></i>
                </div>
                <div class="text">
                  <h3><span class="counter" id="bo-b-count">92</span></h3>
                  <h4><a href="#" id="urbbook">الكتب المستعارة</a></h4>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 control">
              <div class="box box3">
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <div class="text">
                  <h3><span class="counter" id="b-count">308</span></h3>
                  <h4><a href="#" id="gbook">الكتب</a></h4>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 control">
              <div class="box">
                <div class="text">
                  <h3><span class="counter" id="m-count">200</span></h3>
                  <h4><a href="#">الاعضاء</a></h4>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>

              </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 control">
              <div class="box box4">
                <div class="icon">
                  <i class="fas fa-user"></i>
                </div>
                <div class="text">
                  <h3><span class="counter" id="t-count">30</span></h3>
                  <h4 class="mt-20"><a href="#">الاساتذه </a></h4>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 control">
              <div class="box">
                <div class="icon">
                  <i class="fas fa-user"></i>
                </div>
                <div class="text">
                  <h3><span class="counter" id="st-count">170</span></h3>
                  <h4 class="mt-20"><a href="#">الطلاب</a></h4>
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

      </div>
    </div>
  </div>
  <!-- model for som detailes -->
  <div class="modal fade" id="U" tabindex="-1" style="display: none;z-index: 9999;opacity:100;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" id="btn_clos_model" class="btn btn-close btn-outline-danger  border rounded btn-lg" data-bs-dismiss="modal" aria-label="إغلاق" style="border: 1px solid red!important;"></button>
        </div>
        <div class="modal-body" id="info_container">

          <!-- model bdy -->
          <!--  -->
        </div>
      </div>
    </div>
  </div>
<?php
include 'some_blocks/loader_dialog.php';
?>


  <script>
    $(document).ready(function() {
      get_info();
      $('#gbook').on('click',function(){
       
        $('#U').toggle();
        $.get('search_queries/all-books.php',function(data){
          $('#info_container').html(data);
        });
      });
      $('#urbbook').on('click',function(){
         
        $('#U').toggle();
        $.get('search_queries/unreturned-books.php',function(data){
          $('#info_container').html(data);
        });
      });
      $('#avbook').on('click',function(){
        $('#U').toggle();
        $.get('search_queries/availabel-books.php',function(data){
          $('#info_container').html(data);
        });
      });

      $('#btn_clos_model').on('click',function(){
        $('#U').toggle();

      });
    });
    async function get_info() {
      let data = await $.ajax({
        url: "search_queries/general_info.php",
        type: "GET",
        data: {
          call_type: 'get_mgt_g_info'
        },
      });
      if (data != 0 || data != '') {
        let d1 = JSON.parse(data);
        if (d1.status == 'success') {
          $('#b-count').text(d1.b_count);
          // $('d-count').text(d1.d_count);
          $('#m-count').text(d1.m_count);
          $('#st-count').text(d1.st_count);
          $('#t-count').text(d1.t_count);
          $('#av-b-count').text(d1.ava_books);
          $('#bo-b-count').text(d1.borrow_b_count);
          // $('m-count').text(d1.fine);


        } else {
          console.log(d1);
        }

      } else {
        console.log(data);

      }
    
    }
  </script>
  <script src="../assest/js/bootstrap.bundle.min.js"></script>


</body>

</html>