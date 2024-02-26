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
//  if(!isset($_SESSION['type'] )){
//   header('Location: login.php');
//   exit();
//  }
?>
<!doctype html>
<!-- تم تعديل اروابط -->
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>اضافةملف </title>


  <!--  CSS -->
  <link href="../assest/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assest/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="../css/dialog_style.css">
  <link href="../css/sidebars.css" rel="stylesheet">
  <!-- js-->
  <script src="../jquery3_6_0.js"></script>
  <script src="../assest/js/bootstrap.bundle.min.js"></script>
  <script src="../js/dialog_script.js"></script>
  <script src="../build/pdf.js"></script>
  <script src="../build/pdf.worker.js"></script>
  <script src="../pdf.worker.min.js"></script>
  <script src="../pdf.min.js"></script>
  <script src="js/form-validation.js"></script>
  <script src="js/mgt.js"></script>


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

  <?php
  include 'some_blocks/header.php'
  ?>

  <div class="container-fluid">
    <div class="row">

      <?php
      include 'some_blocks/side-menu.php'
      ?>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="bd-example">
          <nav style="background-color: #dee2e6 ;">
            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist" style="place-content: center;">
           
              <button  class="nav-link active" id="nav-book-tab" data-bs-toggle="tab" data-bs-target="#nav-book" type="button" role="tab" aria-controls="nav-book" aria-selected="true"> اضافة كتاب</button>
              <button class="nav-link" id="nav-document-tab" data-bs-toggle="tab" data-bs-target="#nav-document" type="button" role="tab" aria-controls="nav-document" aria-selected="false"> اضافة مشروع </button>


            </div>
          </nav>

          <div class="tab-content" id="nav-tabContent">
            <!-- بنل الكتاب -->
            <div class="tab-pane fade active show" id="nav-book" role="tabpanel" aria-labelledby="nav-book-tab">


              <div class="row g-3">
              <div class="col-md-12 col-lg-12 ">
              <a href="search_and_edit_files.php" class="btn_details btn btn btn-primary btn-sm delete btn-flat" style="float: left;left: 1.5%;position: absolute;">بحث<i class="fa fa-search" style="margin-right: 5px;"></i> </a>
              </div>
                <div class="col-md-5 col-lg-4  order-md-last   order-sm-last  order-last  ">
                  <canvas class="my-4 w-100" id="conval" width="100%" height="5"></canvas>


                  <div class="col">
                    <div class="card shadow-sm">
                      <label for="book_cover_img" class="form-label">صورة الغلاف</label>
                      <img id="book_cover_img" src="#" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="...">
                    </div>
                  </div>




                  <form class="card p-2">
                    <div class="input-group">
                      <input type="file" id="book_inputfile" class="form-control  rq" placeholder="اختيار صورة">

                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" id="submit_new_book">اضافة</button>
                  </form>
                </div>

                <div class="col-md-7 col-lg-8 ">
                  <h4 class="mb-3">بيانات الكتاب</h4>
                  <h4 class="mb-3" id="h_error"></h4>
                  <form class="needs-validation" action="#">
                    <div class="row g-3">
                      <div class="col-sm-6">
                        <label for="book_title" class="form-label">عنوان الكتاب</label>
                        <input type="text" class="form-control rq" id="book_title" placeholder="" required="true">
                        <div class="invalid-feedback">
                          يرجى إدخال الاسم بشكل صحيح.
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label for="book_author" class="form-label">المؤلف</label>
                        <input type="text" class="form-control rq" id="book_author" placeholder="" value="" required="true">
                        <div class="invalid-feedback">
                          مطلوب
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="book_subject" class="form-label">موضوع الكتاب</label>
                        <div class="input-group has-validation">
                          <!-- <span class="input-group-text">@</span> -->
                          <input type="text" class="form-control rq" id="book_subject" required="true">
                          <div class="invalid-feedback">
                            مطلوب
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <label for="book_publisher" class="form-label">الناشر</label>
                        <div class="input-group has-validation">
                          <!-- <span class="input-group-text">@</span> -->
                          <input type="text" class="form-control rq" id="book_publisher" placeholder="الناشر" required="true">
                          <div class="invalid-feedback">
                            مطلوب.
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <label for="book_category" class="form-label"> تصنيف الكتاب</label>
                        <select class="form-select rq" id="book_category" required="">

                        </select>
                        <div class="invalid-feedback">
                          الرجاء تحديد الصنف بشكل صحيح.
                        </div>
                      </div>

                      <div class="col-6">
                        <label for="publish_date" class="form-label">تاريخ النشر </label>
                        <div class="input-group has-validation">
                          <!-- <span class="input-group-text">@</span> -->
                          <input type="date" class="form-control rq" id="publish_date" value="2020-01-10" required="true">
                          <div class="invalid-feedback">
                            مطلوب
                          </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="book_locker_no" class="form-label">مكان الكتاب</label>
                        <input type="text" class="form-control" id="book_locker_no" placeholder="">
                        <div class="invalid-feedback">
                          <!-- مكان -->
                        </div>
                      </div>

                      <div class="col-4">
                        <label for="book_copies" class="form-label">عدد النسخ المطبوعة</label>
                        <input type="number" min="0" class="form-control" id="book_copies" value="0" required="">
                        <div class="invalid-feedback">
                          <!--  -->
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="book_pages" class="form-label">عدد صفحات الكتاب</label>
                        <input type="number" min="0" value="0" class="form-control" id="book_pages" required="">
                        <div class="invalid-feedback">
                          <!--  -->
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="book_status" class="form-label">حالة الكتاب</label>
                        <select class="form-select rq" id="book_status" required="">
                          <option value="0">غير متاح</option>
                          <option value="1">متاح</option>
                        </select>
                        <div class="invalid-feedback">
                          <!--  -->
                        </div>
                      </div>

                      <hr class="my-4">

                    </div>
                  </form>
                </div>
              </div>




            </div>

            <!-- بنل المشروع -->
            <!-- بنل المشروع -->
            <!-- بنل المشروع -->
     

            <div class="tab-pane " id="nav-document" role="tabpanel" aria-labelledby="nav-document-tab">

              <div class="row g-3">
              <div class="col-md-12 col-lg-12 ">
              <a href="search_and_edit_files.php" class="btn_details btn btn btn-primary btn-sm delete btn-flat" style="float: left;left: 1.5%;position: absolute;">بحث<i class="fa fa-search" style="margin-right: 5px;"></i> </a>
              </div>
                <div class="col-md-5 col-lg-4  order-md-last   order-sm-last  order-last  ">
                  <canvas class="my-4 w-100" id="conval" width="100%" height="5"></canvas>


                  <div class="col">
                    <div class="card shadow-sm">
                      <label for="doc_cover_img" class="form-label"> صورة الغلاف للمشروع </label>
                      <img id="doc_cover_img" src="#" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="...">


                    </div>
                  </div>




                  <form class="card p-2">
                    <div class="input-group">
                      <input type="file" id="doc_fileinput" class="form-control rq" placeholder="اختيار صورة">

                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" id="submit_new_doc">اضافة</button>
                  </form>
                </div>

                <div class="col-md-7 col-lg-8 ">
                  <h4 class="mb-3">بيانات المشروع</h4>
                  <h4 class="mb-3" id="h_error"></h4>
                  <form class="needs-validation" action="#">
                    <div class="row g-3">
                      <div class="col-sm-6">
                        <label for="doc_title" class="form-label">عنوان المشروع</label>
                        <input type="text" class="form-control rq" id="doc_title" placeholder="" required="true">
                        <div class="invalid-feedback">
                          يرجى إدخال الاسم بشكل صحيح.
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label for="doc_author" class="form-label">المؤلف </label>
                        <input type="text" class="form-control rq" id="doc_author" placeholder="" value="" required="true">
                        <div class="invalid-feedback">
                          مطلوب
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="doc_subject" class="form-label">ملخص المشروع</label>
                        <div class="input-group has-validation">
                          <!-- <span class="input-group-text">@</span> -->
                          <input type="text" multiline="true" class="form-control rq" id="doc_subject" required="true">
                          <div class="invalid-feedback">
                            مطلوب
                          </div>
                        </div>
                      </div>
                      <!-- <div class="col-md-3">
                        <label for="doc_abstract" class="form-label">ملخص</label>
                        <input type="text" class="form-control" id="doc_abstract" required="true">
                          <div class="invalid-feedback">
                       
                      </div> -->
                      <div class="col-6">
                        <label for="doc_collage" class="form-label">الكلية</label>
                        <div class="input-group has-validation">
                          <!-- <span class="input-group-text">@</span> -->
                          <select class="form-select rq" id="doc_collage" required="">

                          </select>
                          <div class="invalid-feedback">
                            مطلوب.
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <label for="doc_publishing_year" class="form-label">سنة النشر </label>
                        <div class="input-group has-validation">
                          <!-- <span class="input-group-text">@</span> -->
                          <input type="date" class="form-control rq" id="doc_publishing_year" required="true">
                          <div class="invalid-feedback">
                            مطلوب
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <label for="doc_locker_no" class="form-label">مكان المشروع</label>
                        <input type="text" class="form-control" id="doc_locker_no" placeholder="">
                        <div class="invalid-feedback">
                          <!-- مكان -->
                        </div>
                      </div>

                      <div class="col-4">
                        <label for="doc_number_copies" class="form-label">عدد النسخ المطبوعة</label>
                        <input type="number" min="0" value="0" value="0" class="form-control" id="doc_number_copies" required="">
                        <div class="invalid-feedback">
                          <!--  -->
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="doc_pages" class="form-label">صفحات الكتاب</label>
                        <input type="number" min="0" value="0" class="form-control" id="doc_pages" required="">
                        <div class="invalid-feedback">
                          <!--  -->
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="doc_status" class="form-label">حالة المشروع</label>
                        <select class="form-select rq" id="doc_status" required="">
                          <option value="0">غير متاح</option>
                          <option value="1">متاح</option>
                        </select>
                        <div class="invalid-feedback">
                          مطلوب
                        </div>
                      </div>

                      <hr class="my-4">

                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- end doc panal -->

          </div>

        </div>
        <!-- dialog lements start-->
        <?php
        include 'some_blocks/loader_dialog.php';
        ?>
        <!-- dialog lements end-->

        <!-- foter stat -->

        <?php
        include 'some_blocks/footer.php'
        ?>
        <!-- foter end -->


      </main>
    </div>

  </div>
  <!-- my scrit start -->
  <script>
    // var pdfjsLib=window['pdfjs-dist/build/pdf'];
    var ajax_url = "<?php echo APPURL; ?>/ajax/files_ajax.php";
    $("#dialog_button").on('click', hide_dialog);
    $("#doc_status").on('change', function() {
      var fileinput = document.getElementById("doc_fileinput");
      var v = document.getElementById("doc_status").value;
      if (v == 0) {
        fileinput.accept = 'image/jpg,image/jpeg,image/png'

      } else {
        fileinput.accept = 'applcation/pdf'
      }
    });

    $("#book_status").on('change', function() {
      var fileinput = document.getElementById("book_inputfile");
      var v = document.getElementById("book_status").value;
      if (v == 0) {
        fileinput.accept = 'image/jpg,image/jpeg,image/png'

      } else {
        fileinput.accept = 'applcation/pdf'
      }



    });
    var col_data_obj;
    var cat_data_obj;

    //   $.getJSON(ajax_url, {
    //   call_type: 'get_category'
    // }, function(data) {
    //   cat_data_obj= data;
    // });


    // $.getJSON(ajax_url, {
    //   call_type: 'get_collages'
    // }, function(data) {
    //   col_data_obj = data;
    // });
    // document.addEventListener("DOMContentLoaded", function() {
    //   setTimeout(getcategory, 1000);
    // });
    $(document).ready(function() {
      seachCats('#book_category');
    });
    // function getcategory() {

    //   // showLoading();
    //   var opt = '';
    //   var opt2 = '';
    //   //add categories
    //   // opt += '<option value=""> اختر... </option>'
    //   // $.each(cat_data_obj, function(index, val) {
    //   //   opt += '<option value="' + val['Category_ID'] + '" >' + val['Category_Name'] + '</option>';
    //   // });
    //   // $('#book_category').html(opt);
    //   //  document.getElementById('book_category').selectedIndex = 0;

    //   //add collages
    //   // opt2 += '<option value=""> اختر... </option>'
    //   // $.each(col_data_obj, function(index, val) {
    //   //   opt2 += '<option value="' + val['College_ID'] + '" >' + val['College_Name'] + '</option>';
    //   // });
    //   // $(document).find('#doc_collage').html(opt2);
    //   // document.getElementById('doc_collage').selectedIndex = 0;


    //   hide_dialog();
    // }
    $("#nav-document-tab").on("click", function() {
      seachCollages('#doc_collage');
      // var opt2 = '<option value=""> اختر... </option>'
      // $.each(col_data_obj, function(index, val) {
      //   opt2 += '<option value="' + val['College_ID'] + '" >' + val['College_Name'] + '</option>';
      // });
      // $(document).find('#doc_collage').html(opt2);
      // document.getElementById('doc_collage').selectedIndex = 0;

    });


    var book_img_name = "";
    var book_img_size = "";
    var doc_img_name = "";
    var doc_img_size = "";

    // input book
    $("#book_inputfile").on('change', function(event) {
      //editting later
      const file = event.target.files[0];
      if (file.type == 'application/pdf') {
        var coverPhotoImg = document.getElementById("book_cover_img")
        var half_name = file.name;
        const reader = new FileReader();
        reader.onload = function(event) {
          const pdfDataUrl = event.target.result;

          // Load the PDF.js library
          const pdfjsLib = window['pdfjs-dist/build/pdf'];
          pdfjsLib.GlobalWorkerOptions.workerSrc = 'pdf.worker.min.js';

          // Load the PDF file using PDF.js
          pdfjsLib.getDocument({
            data: atob(pdfDataUrl.split(',')[1])
          }).promise.then(function(pdfDoc) {
            // Get the first page of the PDF file
            document.getElementById("book_pages").value = pdfDoc.numPages;
            return pdfDoc.getPage(1);
          }).then(function(page) {
            // Get the cover photo of the PDF file as a data URL
            // return page.getViewport({ scale: 1 });
            const canvas = document.createElement('canvas');
            const canvasContext = canvas.getContext('2d');
            const viewport = page.getViewport({
              scale: 1
            });
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            return page.render({
              canvasContext,
              viewport
            }).promise.then(function() {
              return canvas.toDataURL('image/jpeg', 0.8);
            });

          }).then(function(coverPhotoDataUrl) {
            // Set the cover photo as the source of the img tag
            coverPhotoImg.src = coverPhotoDataUrl;
          });
        }
        reader.readAsDataURL(file);
      } else {
        book_img_name = file.name;
        book_img_size = file.size;
        var reader = new FileReader();
        reader.readAsDataURL(file);

        reader.onload = function(e) {
          //متغير يحتوي الصورة

          //الحدث onload يحدث اثناء العملية الحالية 
          document.getElementById("book_cover_img").setAttribute('src', e.target.result);
        }
      }
    });

    //docoment input
    $("#doc_fileinput").on('change', function(event) {

      const file = event.target.files[0];
      if (file.type == 'application/pdf') {
        var coverPhotoImg = document.getElementById("doc_cover_img")
        var half_name = file.name;
        const reader = new FileReader();
        reader.onload = function(event) {
          const pdfDataUrl = event.target.result;

          // Load the PDF.js library
          const pdfjsLib = window['pdfjs-dist/build/pdf'];
          pdfjsLib.GlobalWorkerOptions.workerSrc = 'pdf.worker.min.js';

          // Load the PDF file using PDF.js
          pdfjsLib.getDocument({
            data: atob(pdfDataUrl.split(',')[1])
          }).promise.then(function(pdfDoc) {
            // Get the first page of the PDF file
            document.getElementById("doc_pages").value = pdfDoc.numPages;
            return pdfDoc.getPage(1);
          }).then(function(page) {
            // Get the cover photo of the PDF file as a data URL
            // return page.getViewport({ scale: 1 });
            const canvas = document.createElement('canvas');
            const canvasContext = canvas.getContext('2d');
            const viewport = page.getViewport({
              scale: 1
            });
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            return page.render({
              canvasContext,
              viewport
            }).promise.then(function() {
              return canvas.toDataURL('image/jpeg', 0.8);
            });

          }).then(function(coverPhotoDataUrl) {
            // Set the cover photo as the source of the img tag
            coverPhotoImg.src = coverPhotoDataUrl;
          });
        }
        reader.readAsDataURL(file);
      } else {
        doc_img_name = file.name;
        doc_img_size = file.size;
        var reader = new FileReader();
        reader.readAsDataURL(file);

        reader.onload = function(e) {
          //متغير يحتوي الصورة

          //الحدث onload يحدث اثناء العملية الحالية 
          document.getElementById("doc_cover_img").setAttribute('src', e.target.result);
        }
      }
    });
    //submiting new book start
    $("#submit_new_book").on('click', async function(event) {
      event.preventDefault();

      let valid = await validateInputs('#nav-book');
      if (valid) {
        try {
          showLoading();
          var file_name = "";
          const fileInput = document.getElementById("book_inputfile");
          var book_img = fileInput.files[0];
          var formData = new FormData();
          formData.append('file', book_img);
          // if (book_img.type == 'application/pdf') {
          //   file_name = book_img.name;
          // }
          // for (let i = 0; i < 1; i++) {
          //   formData.append('pdfs_images', book_img);
          //   // alert(student_img.name);
          // }

          //  alert(student_img_name);


          if (book_img_size == 0) {
            //|| student_img_size > 600
            // document.getElementById("h_error").innerHTML = "يرى اختيار الصورة بشكل صحيح";
            //  alert(student_img_size);
            // return;

          }
          formData.append('book_Title', $("#book_title").val());
          formData.append('book_subject', $("#book_title").val());
          formData.append('book_author', $("#book_author").val());
          formData.append('book_category', $("#book_category").val());
          formData.append(' book_publisher', $('#book_publisher').val());
          formData.append('publish_date', $("#publish_date").val());
          formData.append('copiesNo', $("#book_copies").val());
          formData.append('status', $("#book_status").val());
          formData.append('lockerNo', $("#book_locker_no").val());
          formData.append('book_pages', $("#book_pages").val());
          formData.append('call_type', 'add_new_book');

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
                clearForm('#nav-book');
              } else {
                $("#dialog_message").innerHTML = d1.msg;
                showfaild();
              }
            }
          });
        } catch (error) {
          console.log(error.stack);
          showfaild();
        }
      }


    }); //=>//submiting new book end

    //submiting new doc start
    $("#submit_new_doc").on('click',async function(event) {

      event.preventDefault();
      let valid = await validateInputs('#nav-document');
      console.log(valid);
      if (valid) {
        try {
          showLoading();
          // var file_name = "";
          const fileInput = document.getElementById("doc_fileinput");
          var doc_img = fileInput.files[0];
          var formData = new FormData();
          // if (doc_img.type == 'application/pdf') {
          //   file_name = doc_img.name;
          // }
          formData.append('file', doc_img);
          // for (let i = 0; i < 1; i++) {
          //   formData.append('pdfs_images', doc_img);
          //   // alert(student_img.name);
          // }

          //  alert(student_img_name);


          if (doc_img_size == 0) {
            //|| student_img_size > 600
            // document.getElementById("h_error").innerHTML = "يرى اختيار الصورة بشكل صحيح";
            //  alert(student_img_size);
            // return;

          }
          formData.append('doc_Title',$("#doc_title").val());
          formData.append('doc_subjct',$("#doc_subject").val());
          formData.append('doc_author',$("#doc_author").val());
          formData.append('doc_collage',$('#doc_collage').val());
          formData.append('doc_pages',$('#doc_pages').val());
          formData.append('publish_date',$("#doc_publishing_year").val());
          formData.append('copiesNo',$("#doc_number_copies").val());
          formData.append('lockerNo',$("#doc_locker_no").val());
          formData.append('status',$("#doc_status").val());
          formData.append('call_type', 'add_new_document');

          // object for data of student
          // var data_object = {
          //   doc_Title: document.getElementById("doc_title").value,
          //   doc_subjct: document.getElementById("doc_subject").value,
          //   doc_author: document.getElementById("doc_author").value,
          //   doc_collage: document.getElementById('doc_collage').value,
          //   doc_pages: document.getElementById('doc_pages').value,
          //   publish_date: document.getElementById("doc_publishing_year").value,
          //   photo: doc_img_name,
          //   copiesNo: document.getElementById("doc_number_copies").value,
          //   status: document.getElementById("doc_status").value,
          //   lockerNo: document.getElementById("doc_locker_no").value,
          //   file_name: file_name,
          //   call_type: 'add_new_document',
          // };
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
                clearForm('#nav-document');
              } else {
                $("#dialog_message").innerHTML = d1.msg;
                showfaild();
              }
            }
          });
          // $.post(ajax_url, data_object, function(data) {
          //   // document.getElementById("h_error").innerHTML="لم تتم العملية هناك خطا يمنعك من الاضافة"+JSON.stringify(arr, null, 2);

          //   // alert(data);
          //   //النتيجة الراجعة من اضافة بيانات الطالب
          //   var d1 = JSON.parse(data);
          //   if (d1.status == "error") {
          //     //لم تتم الاضافة
          //     // document.getElementById("h_error").innerHTML = "لم تتم العملية هناك خطا يمنعك من الاضافة"; 
          //     // console.log(data); 
          //     document.getElementById("dialog_message").innerHTML = d1.msg;
          //     showfaild();


          //   } else if (d1.status == "success") {
          //     // تم الاضافة يرفع الصورة
          //     fetch('uploades_queryies.php', {
          //       method: 'POST',
          //       body: formData
          //     }).then(response => {
          //       return response.text();
          //     }).then(data => {
          //       // console.log(data);
          //       // alert(data);


          //     });
          //     document.getElementById("dialog_message").innerHTML = d1.msg;
          //     showsucess();
          //   }
          //   // else {
          //   //   //if unexpected error occur
          //   //   document.getElementById("h_error").innerHTML = "لم تتم العملية هناك خطا يمنعك من الاضافة";
          //   //   alert("not done");
          //   // }
          // });
        } catch (error) {
          document.getElementById("dialog_message").innerHTML = error.message;
          showfaild();
        }
       
      }
    });



    ////
    // function dataURItoBlob(dataURI) {
    //   var byteString = atob(dataURI.split(',')[1]);
    //   var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
    //   var ab = new ArrayBuffer(byteString.length);
    //   var ia = new Uint8Array(ab);
    //   for (var i = 0; i < byteString.length; i++) {
    //     ia[i] = byteString.charCodeAt(i);
    //   }
    //   return new Blob([ab], {
    //     type: mimeString
    //   });
    // }
  </script>
  <!-- my scrit end -->
</body>

</html>