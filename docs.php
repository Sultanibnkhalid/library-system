<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="this page allow the user to search books by different categories">
  <meta name="devloper" content="sultan alashojify">
  <title>المكتبة الاليكترونية-الكتب</title>
  <!--  CSS -->
  <link href="assest/css/bootstrap.rtl.min.css" rel="stylesheet">
   
  <link rel="stylesheet" href="assest/css/fontawesome-all.min.css">
   
  <!-- jqury -->
  <script src="jquery3_6_0.js"></script>
  <!-- pdf scripts -->
  <script src="build/pdf.js"></script>
  <script src="build/pdf.worker.js"></script>
  <script src="pdf.worker.min.js"></script>
  <script src="pdf.min.js"></script>

  <!-- <script src="js/dialog_script.js"></script> -->
  <script src="js/main.js"></script>
  <script src="js/docs-scripts.js"></script>


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

    .mb-1.text-muted {
      float: right;
      margin-left: 10px;
    }

    .BImage {
      width: 150px;
      height: 200px;
    }

    .cos {
      width: 100%;
      height: 200px;
    }

    .book-container {
      /* margin: 2px; */
      padding: 3px;
    }
    .card-text{
      overflow: hidden;
      direction: rtl;
      text-align: right;
      white-space: nowrap;
      text-overflow: ellipsis;
    }
    #inf-container{
      width: 100%;
      height:auto;
    }
    #inf-container .f-info{     
      white-space:normal;
    }
    /* body{
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    } */
    .b-c-an{
        animation: wait_an 1s linear infinite;
        background-size: 400%;
        background-image: linear-gradient(
            to right, #f2f2f2 0%, #f2f2f2 30%,
            #d9d9d9 45%,#d9d9d9 50%,
            #f2f2f2 60%,#f2f2f2 100%
        );
    }
    @keyframes wait_an {
        0%{
            background-position: 0%;
        }
        100%{
            background-position: 100%;
        }
    }

    .card{
      
      border: 0px solid;
   
    }

    .g-0{

background-color: whitesmoke;
      border: 1px solid;
      border-radius: .25rem;
    
    }

    p{
      margin-bottom: 0.7rem;
    }

    .f-button{
      float: left;
      margin-bottom: 4px;
      margin-left: 3px;
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


    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" aria-label="Eleventh navbar example" style="direction: ltr; background-color: #2795b6!important;padding-top:0;padding-bottom: 0;">
      <div class="container-fluid">

        <img src="small_logo.png" width="80" height="80" class="navbar-brand" alt="Bootstrap" loading="lazy" style=" margin-left:10px;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav  mb-2 mb-lg-0" style="direction: rtl;">






          <li class="nav-item" style="margin: 0px;">
            <form class="d-flex">
                <div class=" dropdown">
                <div class="d-flex align-items-center " id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  <a href="#">
                    <img src="img/avatar.jpg" width="50" height="50" class="mx-auto d-block rounded-circle my-1" id="avatar-img" alt="Bootstrap" loading="lazy" style="border-radius: 30px;"> </a>
                </div>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li id="prof"><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#proFile" href="#">الملف
                        الشخصي</a>
                    </li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li id="pass"><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#password" href="#">تغيير كلمة
                        المرور</a></li>
                  </ul>
                </div>
              </form>
            </li>

            <li class="nav-item" style="margin: 10px;">
              <a style="color:snow;font-size: 18px;" class="nav-link  " href="#"> <i class="fa fa-bell"></i></a>

            </li>

            <li class="nav-item " style="margin: 15px;">
              <a type="button" class="btn btn-outline-light btn-sm" href="login/logout.php">تسجيل الخروج</a>
            </li>



          </ul>









        </div>
      </div>
      <nav id="navbar-example2" class="navbar navbar-expand-lg sticky-top navbar-light bg-light" aria-label="Eleventh navbar example" style=" background-color: #2795b6!important; width: 100%;direction: rtl;place-content: flex-start;">
        
      <form class="d-flex" style="width: 65%;">
      <button class="btn btn-outline-light" style="margin: 0px 10px 0px 10px; width: 20%;" type="button" id="btn-search">بحث</button>
          <input class="form-control me-2" type="search" placeholder="بحث" aria-label="Search" style="text-align: right;width: 80%;" id="input-search" required>
         
        </form>
      <ul class="navbar-nav  mb-0 mb-lg-0 " style="padding-left: 0;width: 35%;">
          <li>
            <select class="form-select form-select-md" aria-label=".form-select-md" style="direction: rtl;" id="cat-select">
              <option selected="">عام</option>
              <option value="1">ت</option>
              <option value="2">اثنان</option>
              <option value="3">ثلاثة</option>
            </select>
          </li>
        </ul>
        
        <div class=" dropdown mt-2 mt-lg-0"  style="margin-right: 10px;">
                <a   class="btn   btn-light  dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  الوثائق
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width: -webkit-fill-available;">
                  <li ><a class="dropdown-item"  href="docs.php">الوثائق</a></li>
                    
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li ><a class="dropdown-item" href="books.php">الكتب</a>
                    </li>
                  </ul>
                </div>
      </nav>

    </nav>


    <div class="row" style="margin-inline: auto;max-width: 99.5%;">

<div class="col-12">
<div class="row" id="result-container" >
  
    </div>
</div>
</div>


  </div>




  <div class="footer-bottom fixed-bottom  sticky-bottom" style="background-color: #2795b6;height: 50px;">
    <div class="container pt-20 pb-20" style="max-width: 100%;">
      <div class="row">
        <div class="col-md-6" id="foName">
          <p class="font-11 text-white  m-2">جميع الحقوق محفوظة © لمكتبة جامعة ذمار</p>
        </div>
        <div class="col-md-6 text-right">
          <div class="widget no-border m-0">
            <ul class="list-inline sm-text-center mt-2 font-12" style="display: flex;">
              <li class="nav-item">
                <a style="color: snow;" class="nav-link " aria-current="page" href="#"> تواصل بنا</a>

              </li>
              <li class="nav-item" style="margin-right: 0;">
                <a style="color: snow;" class="nav-link " aria-current="page" href="#"> <i class="fab fa-facebook"></i></a>

              </li>
              <li class="nav-item" style="margin-right: 0;">
                <a style="color: snow;" class="nav-link " aria-current="page" href="#"> <i class="fab fa-twitter"></i></a>

              </li>
              <li class="nav-item" style="margin-right: 0;">
                <a style="color: snow;" class="nav-link " aria-current="page" href="#"> <i class="fab fa-linkedin"></i></a>

              </li>

            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center  active"><i class="fa fa-arrow-up"></i></a>



  <div class="modal fade" id="proFile" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content" style="height: 95%;">
        <div class="modal-header" style="background-color:#2795b6;color:snow;">
          <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">الملف الشخصي</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
        </div>
        <div class="modal-body">
          <div class="cos">
            <form class="d-flex" style="width: 40%;margin-right: 150px;">

              <img src="img/avatar.jpg" class="mx-auto d-block rounded-circle my-1 user-img" alt="لا يوجد" loading="lazy" style="border-radius: 80px;width:100%;
    height: 150px;">

            </form>
            <div class="col p-2 d-flex flex-column position-static">
              <!-- <button type="button" class="btn btn-outline-primary btn-sm" style="width:25%;margin-right: 39%;">تغيير
                الصوره</button> -->
              <strong class="d-inline-block mb-2 text-primary">معلومات العضو</strong>
              <div>
                <div class="mb-1 text-muted" style="float: right;margin-left: 10px;"> الاسم : </div>
                <input class="form-control" id="user-nameofuser" type="text" placeholder="هنا اسم العضو" disabled>
              </div>
              <div>
                <div class="mb-1 text-muted" style="float: right;margin-left: 10px;"> اسم المستخدم : </div>
                <input class="form-control" id="user-name" type="text" placeholder="هنا اسم المستخدم">
              </div>
              <div>
                <div class="mb-1 text-muted" style="float: right;margin-left: 10px;"> البريد الالكتروني : </div>
                <input class="form-control" type="email" id="user-email" placeholder="">
              </div>
              <div>

              </div>
              <p id="error-pr-text"></p>


              <!-- <div id="status-container" class="d-flex justify-content-between align-items-center" style="margin-top: 60px;">
                <small class="text-muted" style="color: red!important;">حالت الحساب</small>
                <div class="btn-group">
                  <small id="account-status" class="text-muted">نشط</small>
                </div>
              </div> -->
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn_close_prof">إغلاق</button>
          <button type="button" data-bs-dismiss="modal" id="btn_save_profil_changes" class="btn btn-primary">حفظ التغيرات</button>
        </div>
      </div>
    </div>
  </div>


  
  <div class="modal fade" id="password" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content" style="height: 60%;">
        <div class="modal-header" style="background-color:#2795b6;color:snow;">
          <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">تغيير كلمة المرور </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
        </div>
        <div class="modal-body">
          <div class="cos">

            <div class="col p-2 d-flex flex-column position-static">

              <strong class="d-inline-block mb-2 text-primary" style="margin-right: 40%;"> كلمة المرور</strong>
              <div>
                <div class="mb-1 text-muted" style="float: right;margin-left: 10px;"> كلمة المرور القديمة : </div>
                <input class="form-control" type="password" id="old-password" placeholder="ادخل كلمة المرور القديمه">
              </div>
              <div>
                <div class="mb-1 text-muted" style="float: right;margin-left: 10px;"> كلمة المرور الجديدة : </div>
                <input class="form-control" id="new-password" type="password" placeholder="ادخل كلمة المرور الجديده">
              </div>
              <div>
                <div class="mb-1 text-muted" style="float: right;margin-left: 10px;"> تاكيد كلمة المرور : </div>
                <input class="form-control" id="retype-password" type="password" placeholder="">
              </div>
              <div>
                <p id="error-text" ></p>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" id="cancel-change" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
          <button type="button" id="btn-change-password"data-bs-dismiss="modal" class="btn btn-primary">حفظ التغيرات</button>
        </div>
      </div>
    </div>
  </div>


  <!-- iframe modLe start -->
  <div class="modal fade" id="iframe-modle" tabindex="-1" style="display: none; opacity:100" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 80%;">
      <div class="modal-content" style="height: 95%;">
        <div class="modal-header" style="background-color:#2795b6;color:snow;">
          <h5 class="modal-title" id="f-t">عنوان الكتاب</h5>
          <button type="button" class="btn-close close_iframe" data-bs-dismiss="modal" aria-label="إغلاق"></button>
        </div>
        <div class="modal-body">
          <!-- <div id="f-canvas" style="width:100%; height:auto;"></div> -->
          <iframe id="f-iframe" href='#' style="width:100% ;height:100%;" frameborder="0">

          </iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close_iframe" data-bs-dismiss="modal">إغلاق</button>
        </div>
      </div>
    </div>
  </div>
  <!-- iframe modLe end -->

  <!-- deails -model start-->
  <div class="modal fade" id="details-modle" tabindex="-1" style="display: none;  opacity:100" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 80%;">
      <div class="modal-content" style="height: 95%;">
        <div class="modal-header" style="background-color:#2795b6;color:snow;">
          <h5 class="modal-title" id="d-t">الملف الشخصي</h5>
          <button type="button" class="btn-close colos_detils" data-bs-dismiss="modal" aria-label="إغلاق"></button>
        </div>
        <div class="modal-body" style="align-items: center; align-content:center;text-align:center;">
            <img id="b-d-img" width="auto" height="auto" src="#">
            <div>
              <div id="inf-container" s>

              </div>
                     

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary colos_detils" data-bs-dismiss="modal">إغلاق</button>
        </div>
      </div>
    </div>
  </div>
  <!-- deails -model end-->


<!-- js links -->
  <script src="assest/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="cheatsheet.js"></script> -->


</body>


</html>