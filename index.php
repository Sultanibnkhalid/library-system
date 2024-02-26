<!doctype html>
<html lang="ar" dir="rtl">
  <!-- this page must be the index of the projct -->

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>المكتبة الاليكترونية</title>


    <!-- Bootstrap core CSS -->
    <link href="assest/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assest/css/fontawesome-all.min.css">
    <!-- js -->
    <script src="jquery3_6_0.js"></script>

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

      .carousel-caption {

        padding-bottom: 15.25rem;
      }

      .carousel-indicators {

        margin-bottom: 2rem;

      }

      .d {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.2s ease-in-out;


      }

      .d:hover {
        color: #0056b3;
        text-decoration: underline;
        background-color: #f8f9fa;
      }

      .d:visited {
        color: #6c757d;
      }

      .back-to-top {
  position: fixed;
  visibility: hidden;
  opacity: 0;
  left: 15px;
  bottom: 15px;
  z-index: 996;
  background: #47b2e4;
  width: 35px;
  height: 35px;
  border-radius: 50px;
  transition: all 0.4s;
}

.back-to-top i {
  font-size: 24px;
  color: #fff;
  line-height: 0;
}

.back-to-top:hover {
  background: #6bc1e9;
  color: #fff;
}

.back-to-top.active {
  visibility: visible;
  opacity: 1;
}


    </style>


  </head>

  <body style="display: block;">

    <div class="bd-example">


      <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light"
        style="background-color: #2795b6!important;">
        <div class="container-fluid">

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="تبديل التنقل">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item ">
                <a style="margin-top: 8px;" type="button" class="btn btn-outline-light btn-sm" id="btn-lib-mgt"
                  href="lib-mgt/index.php">الادارةالعامة للمكتبة</a>
              </li>
              <li class="nav-item ">
                <a style="margin-top: 8px;margin-right: 20px;" type="button" class="btn btn-outline-light btn-sm"
                  href="login.php">تسجيل الدخول</a>
              </li>
              <li class="nav-item" style="margin-right: 50px;">
                <a style="color: snow;" class="nav-link active" aria-current="page" href="#"> تواصل بنا</a>

              </li>
              <li class="nav-item" style="margin-right: 0;">
                <a style="color: snow;" class="nav-link active" aria-current="page" href="#"> <i
                    class="fab fa-facebook"></i></a>

              </li>
              <li class="nav-item" style="margin-right: 0;">
                <a style="color: snow;" class="nav-link active" aria-current="page" href="#"> <i
                    class="fab fa-twitter"></i></a>

              </li>
              <li class="nav-item" style="margin-right: 0;">
                <a style="color: snow;" class="nav-link active" aria-current="page" href="#"> <i
                    class="fab fa-linkedin"></i></a>

              </li>



            </ul>
            <form class="d-flex">
              <a style="padding:0;" class="navbar-brand" href="index.html">
                <img src="small_logo.png" width="80" height="80" class="d-inline-block align-top" alt="Bootstrap"
                  loading="lazy">
              </a>
            </form>
          </div>
        </div>
      </nav>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="position-absolute" style="z-index: 2; width: 100%; background:none;">
          <nav class="navbar navbar-expand-lg " style="background: none;">
            <ul class="navbar-nav justify-content-center mx-auto text-center me-auto mb-2 mb-lg-0">
              <li class="nav-item" style="margin: 30px;">
                <a class="nav-link d" href="books.php"> الاطلاع على الكتب</a>
              </li>
              <li class="nav-item" style="margin: 30px;">
                <a class="nav-link d" href="docs.php">الاطلاع على الوثائق</a>
              </li>
              <li class="nav-item" style="margin: 30px;">
                <a class="nav-link d" href="search-books.php">البحث في الكتب والوثائق</a>
              </li>
            </ul>
          </nav>
          <!-- style="background-color: #fefefe; margin: 20px;" -->
        </div>


        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class=""
            aria-label="الشريحة الأولى"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="الشريحة الثانية" class=""></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="الشريحة الثالثة" class="active" aria-current="true"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div style="width: 100%;height: 650px;"> <img src="img/3.jpg" style="width:100%;height:100%;">></div>


            <div class="carousel-caption d-none d-md-block">
              <!-- <h5>عنوان الشريحة الأولى</h5>
              <p>محتوى وصفي يعبئ فراغ الشريحة الأولى.</p> -->
            </div>
          </div>
          <div class="carousel-item">
            <div style="width: 100%;height: 650px;"> <img src="img/1.jpg" style="width:100%;height:100%;">></div>

            <div class="carousel-caption d-none d-md-block">
              <!-- <h5>عنوان الشريحة الثانية</h5>
              <p>محتوى وصفي يعبئ فراغ الشريحة الأولى.</p> -->
            </div>
          </div>
          <div class="carousel-item ">
            <div style="width: 100%;height: 650px;"> <img src="img/4.jpg" style="width:100%;height:100%;">></div>

            <div class="carousel-caption d-none d-md-block">
              <!-- <h5>عنوان الشريحة الثالثة</h5>
              <p>محتوى وصفي يعبئ فراغ الشريحة الأولى.</p> -->
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">السابق</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">التالي</span>
        </button>
      </div>
      <div
        style=" width: 100%;padding: 0 15px;padding-top: 70px;padding-bottom: 70px;background-color:#2795b6;border-bottom: 2px solid #000!important;">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-study  mt-5 text-theme-color-2"></i>
              <h2 data-animation-duration="2000" id='b-count' data-value="800"
                class="animate-number text-white mt-0 font-38 font-weight-500 appeared">800</h2>
              <h5 class="text-white text-uppercase mb-0"> عدد الكتب </h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-study  mt-5 text-theme-color-2"></i>
              <h2 data-animation-duration="2000" id='d-count' data-value="200"
                class="animate-number text-white mt-0 font-38 font-weight-500 appeared">200</h2>
              <h5 class="text-white text-uppercase mb-0"> عدد الوثائق </h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-study  mt-5 text-theme-color-2"></i>
              <h2 data-animation-duration="2000" data-value="220"
                class="animate-number text-white mt-0 font-38 font-weight-500 appeared" id="m-count">220</h2>
              <h5 class="text-white text-uppercase mb-0"> عدد الاعضاء </h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-study  mt-5 text-theme-color-2"></i>

            </div>
          </div>
        </div>
      </div>
    </div>




    <footer class="footer mt-auto py-3 bg-dark">
      <div class="container" style="  width: 100%;padding: 0 15px;padding-top: 70px;padding-bottom: 70px;">
        <div class="row border-bottom">



          <div class="col-sm-6 col-md-3">
            <div class="widget dark">
              <h4 class="widget-title line-bottom-theme-colored-2 text-white"> نبذة عن النظام </h4>
              <div class="text-white myP">
                <p>

                </p>

              </div>

            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="widget dark">
              <h4 class="widget-title line-bottom-theme-colored-2 text-white"> بيانات التواصل </h4>
              <div class="text-white myP">
                <p>
                المكتبة الاليكترونية: +967 - 06 - 425051/ 425573 فاكس: 425053 - ص.ب.: 87246
                  بريد إليكتروني: info@tu.edu.ye</p>

              </div>

            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="widget dark">
              <h4 class="widget-title line-bottom-theme-colored-2 text-white"> روابط هامة </h4>
              <div class="text-white myP">
                <p style="text-align: justify;">
                  <a href="#"><span style="color:#ffffff;">المكتبة الاليكترونية
                      والبحث
                      العلمي</span></a>
                </p>
                <p style="text-align: justify;">
                  <a href="#"><span style="color:#ffffff;">المكتبة الاليكترونية
                      الالكتروني</span></a>
                </p>

              </div>

            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="widget dark">
              <h4 class="widget-title line-bottom-theme-colored-2 text-white"> الدعم الفني </h4>
              <div class="text-white myP">
                <p>
                  <a href="mailto:support@tu.edu.ye">support@tu.com </a>
                </p>

              </div>

            </div>
          </div>

        </div>

      </div>
      <div class="footer-bottom bg-black-333">
        <div class="container pt-20 pb-20">
          <div class="row" style="background-color: #000;">
            <div class="col-md-6">
              <p class="font-11 text-white  m-0">جميع الحقوق محفوظة © المكتبة الاليكترونية </p>
            </div>
            <div class="col-md-6 text-right">
              <div class="widget no-border m-0">
                <ul class="list-inline sm-text-center mt-2 font-12">
                  <li>
                  </li>


                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center  active"><i class="fa fa-arrow-up"></i></a>
    <script src="assest/js/bootstrap.bundle.min.js"></script>

    <!-- <script src="cheatsheet.js"></script> -->
    <script>
  
      $(document).ready(function () {
      
            get_info();
        //     let data = await $.ajax({
        //   url: "user_queries/search_files.php",
        //   type: "GET",
        //   data: { call_type: 'get_g_info' },
        // });
        // console.log(data);
        // if (data != 0 || data != '') {
        //   let d1 = JSON.parse(data);
        //   if (d1.status == 'success') {
        //     $('#b-count').text(d1.b_count);
        //     $('#d-count').text(d1.d_count);
        //     $('#m-count').text(d1.m_count);
        //   } else {
        //     console.log(d1);
        //   }

        // } else {
        //   alert('الخادم متوقف');

        // }
      });

 async function get_info() {
        let data = await $.ajax({
          url: "user_queries/search_files.php",
          type: "GET",
          data: { call_type: 'get_g_info' },
        });
        console.log(data);
        if (data != 0 || data != '') {
          let d1 = JSON.parse(data);
          if (d1.status == 'success') {
            $('#b-count').text(d1.b_count);
            $('#d-count').text(d1.d_count);
            $('#m-count').text(d1.m_count);
          } else {
            console.log(d1);
          }

        } else {
          alert('الخادم متوقف');

        }

      }

    </script>

  </body>

</html>