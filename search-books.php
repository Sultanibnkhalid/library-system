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
      a{
        text-decoration: none;
        
      }
      ul{
        list-style-type: none;
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


      <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light"style="background-color: #2795b6!important;">
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
              <a style="padding:0;" class="navbar-brand"href="index.html">
                <img src="small_logo.png" width="80" height="80" class="d-inline-block align-top" alt="Bootstrap"
                  loading="lazy">
              </a>
            </form>
          </div>
        </div>
      </nav>
      
     
      <nav id="NS"  class="navbar sticky-top row rg-3" style="margin-top: 5px;top: 100px; background-color: gainsboro;margin-inline: auto;max-width: 99.5%;">
        <form method="get" action="#" class="col-md-6 col-sm-12">
            <div class="row rg-2">
                <div class="col-9">
                <input type="search" class="form-control" required name="bname">
                </div>
                <div class="col-3">
                <input type="submit" name="submit" class="form-control" value="بحث">
                </div>

            </div>         
        </form>  
        <div class="col-md-6 col-sm-12 order-md-last  order-sm-first   order-first  mb-2">
        <a href="search-books.php" role="button" class="btn btn-outline-secondary link-active">البحث في الكتب</a>
          <a href="search-documents.php" role="button" class="btn btn-success ">البحث في الوثائق</a>

          <h4 style="float: left;">الكتب</h4>
          
        </div>   
      </nav>
     
      <hr>
      <div class="row" style="height:400px; overflow:auto; padding: 30px;margin-inline: auto;max-width: 99.5%;">
        <?php include 'user_queries/search1-books.php' ?>

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
              <p class="font-11 text-white  m-0">جميع الحقوق محفوظة © لمكتبة جامعة ذمار</p>
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
    </div>




    
<script>

function toggleElementByWidth(elementId, minWidth, top) {
    const  element =$('#'+elementId);
  if (window.innerWidth >= minWidth) {
    $(element).css('top',top);
  } else {
    $(element).css('top','65px');
 }
}
$(window).on('resize', function(event) {
  toggleElementByWidth('NS', 768, '100px');  
});
$(window).on('load', function(event) {
  toggleElementByWidth('NS', 768, '100px');  
});
</script>
  </body>

</html>