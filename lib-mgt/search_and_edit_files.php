<?php
include_once  '../inc/connect.php';
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
  <title>ادارة الملفات</title>


  <!--  CSS -->
  <link href="../assest/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assest/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="../css/dialog_style.css">
  <link href="../css/sidebars.css" rel="stylesheet">
  <!-- js-->
  <script src="../jquery3_6_0.js"></script>
  <script src="../js/dialog_script.js"></script>
  <script src="../build/pdf.js"></script>
  <script src="../build/pdf.worker.js"></script>
  <script src="../pdf.worker.min.js"></script>
  <script src="../pdf.min.js"></script>
  <script src="js/some_functions.js"></script>
  <script src="js/form-validation.js"></script>
  <script src="js/mgt.js"></script>
  <script src="js/search-files.js"></script>
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

    /* table tbody tr td {
      overflow: hidden;
      direction: rtl;
      text-align: right;

      text-overflow: ellipsis;
    }
     */

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

      <?php
      include 'some_blocks/side-menu.php'
      ?>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="bd-example">
          <nav style="background-color: #dee2e6 ;">
            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist" style="place-content: center;">
              <button  class="nav-link active" id="nav-book-tab" data-bs-toggle="tab" data-bs-target="#nav-book" type="button" role="tab" aria-controls="nav-book" aria-selected="true"> كتاب</button>
              <button class="nav-link" id="nav-document-tab" data-bs-toggle="tab" data-bs-target="#nav-document" type="button" role="tab" aria-controls="nav-document" aria-selected="false"> وثيقة </button>



            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade active show" id="nav-book" role="tabpanel" aria-labelledby="nav-book-tab">

              <div class="row g-3">
              <div class="col-md-12 col-lg-12 ">
              <a href="add_files.php" class="btn_details btn btn btn-primary btn-sm delete btn-flat" style="float: left;">اضافة كتاب جديد<i class="fa fa-plus" style="margin-right: 5px;"></i> </a>
              </div>
                <div class="col-md-4 col-lg-4  order-md-last   order-sm-last  order-last  ">
                  <form class="">
                    <div class="col-md-5">

                      <!-- <select class="form-select" id="category" required="" style="margin-top: 21px;">
                        <option>بحث حسب</option>

                      </select> -->

                    </div>


                  </form>

                </div>
                <div class="col-md-2 col-lg-2 " id="freeDive">
                  <div class="col-md-2 col-lg-2  col-sm-0 order-md-0  order-sm-0  order-0 ">
                    <br><br>
                  </div>
                </div>

                <div class="col-md-5 col-lg-5 ">

                  <br>
                  <form class="">
                    <input type="search" class="form-control form-control-light" placeholder="بحث...." aria-label="Search" id="txt_search_book">
                  </form>

                </div>

              </div>
              <h2>الكتب الموجودة</h2>
              <div class="card-body table-responsive" id="table_container" style="overflow:auto;height:400px;width:100%; direction:rtl">
                <!-- book table -->
                <table class="table table-bordered table-striped table-sm" id="book_table" style="width: 100%;">
                  <!-- جدول لجلب البيانات الى داخلة -->
                </table>
              </div>

            </div>




            <div class="tab-pane " id="nav-document" role="tabpanel" aria-labelledby="nav-document-tab">
              <div class="row g-3">
              <div class="col-md-12 col-lg-12 ">
              <a href="add_files.php" class="btn_details btn btn btn-primary btn-sm delete btn-flat" style="float: left;">اضافة وثيقة جديد<i class="fa fa-plus" style="margin-right: 5px;"></i> </a>
              </div>

                <div class="col-md-4 col-lg-4  order-md-last   order-sm-last  order-last  ">
                  <form class="">
                    <div class="col-md-5">


                    </div>


                  </form>

                </div>
                <div class="col-md-2 col-lg-2 " id="freeDive">
                  <div class="col-md-2 col-lg-2  col-sm-0 order-md-0  order-sm-0  order-0 ">
                    <br><br>
                  </div>
                </div>

                <div class="col-md-5 col-lg-5 ">

                  <br>
                  <form class="">
                    <input type="search" class="form-control form-control-light" placeholder="بحث...." aria-label="Search" id="search_doc">
                  </form>

                </div>

              </div>
              <h2>الوثائق الموجودة</h2>
              <div class="card-body table-responsive" id="table_container" style="overflow:auto;height:400px;width:100%; direction:rtl">
                <!-- document table -->
                <table class="table table-bordered table-striped table-sm" id="doc_table" style="width: 100%;">
                  <!-- جدول لجلب البيانات الى داخلة -->
                </table>
              </div>
            </div>

          </div>
        </div>








        <!-- foter stat -->

        <!-- foter stat -->

        <?php
        include 'some_blocks/footer.php'
        ?>
        <!-- foter end -->
        <!-- foter end -->
      </main>
    </div>

  </div>

  <!-- dialog for update start-->
  <div id="overlay_div">
    <!-- book model -->
    <div id="book_dialog" class="border rounded up-f-dialog" style="max-width: 1200px;margin: 1.75rem auto;height: 90%; max-width: 1100px;">
      <?php include 'some_blocks/book_model.php' ?>
    </div>
    <!-- document model -->
    <div id="doc_dialog" class="border rounded up-f-dialog" style="max-width: 1200px;margin: 1.75rem auto;height: 90%; max-width: 1100px;">
      <?php include 'some_blocks/document-model.php' ?>
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
    // var ajax_url3 = "students_ajax.php";
    // var update_url = "updates_ajax.php";
    // var ajax_url2 = "files_ajax.php";
    // var book_img_name = '';
    // var book_data = {};
    // var cat_data_obj;
    // var col_data_obj;


    // $.getJSON(ajax_url2, {
    //   call_type: 'get_category'
    // }, function(data) {
    //   cat_data_obj = data;
    // });
    // $.getJSON(ajax_url2, {
    //   call_type: 'get_collages'
    // }, function(data) {
    //   col_data_obj = data;
    // });
    //  //whene searching books
    //     $(document).on('keyup', '#txt_search_book', function(event) {
    //       if (($(this).val()).trim().length) {
    //         $.ajax({
    //           type: "POST",
    //           url: ajax_url + "search_book_query.php",
    //           data: {
    //             'text_search_book': text,
    //             call_type: 'search_book',
    //           },
    //           success: function(data) {
    //             $("#book_table").html(data);
    //             showImages("#book_table");
    //           }
    //         });
    //       }
    //     });
    //search books
    // function searchBook(text) {
    //   if (text != '' && text != null) {
    //     $.ajax({
    //       type: "POST",
    //       url: ajax_url + "search_book_query.php",
    //       data: {
    //         'text_search_book': text,
    //         call_type: 'search_book',
    //       },
    //       success: function(data) {
    //         $("#book_table").html(data);
    //         showImages("#book_table");
    //       }
    //     });
    //   }
    //   // showImages();
    // }
    //function shows imges in the tables
    // function showImages(el_id) {
    //   let el=$(el_id);
    //   $(el).find('.imgs').each(function(index, value) {
    //     const $div = $(value);
    //     var pic = $div.attr('pic');
    //     var file = $div.attr('pdf');
    //     var $img = $div.find('img');
    //     // console.log("url is: " + file + " " + pic);

    //     if (pic.length < 1) {
    //       var pdfurl = "../books/" + file;
    //       var pdfjsLib = window['pdfjs-dist/build/pdf'];
    //       pdfjsLib.getDocument(pdfurl).promise.then(function(pdf) {
    //         return pdf.getPage(1);
    //       }).then(function(page) {
    //         // Get the cover photo of the PDF file as a data URL
    //         // return page.getViewport({ scale: 1 });
    //         const canvas = document.createElement('canvas');
    //         const canvasContext = canvas.getContext('2d');
    //         const viewport = page.getViewport({
    //           scale: 1
    //         });
    //         canvas.width = viewport.width;
    //         canvas.height = viewport.height;
    //         return page.render({
    //           canvasContext,
    //           viewport
    //         }).promise.then(function() {
    //           return canvas.toDataURL('image/jpeg', 0.8);
    //         });

    //       }).then(function(coverPhotoDataUrl) {
    //         // Set the cover photo as the source of the img tag
    //         $img.attr('src', coverPhotoDataUrl);
    //       });
    //     } else {
    //       // picurl = "uploads/1.png";
    //       $img.attr('src', "../books_imgs/" + pic);
    //     }

    //   });
    // } // end get images functionfunction
    //scripts for updating book
    // var book_cover_img_name = '';
    // var book_file_name = '';
    // var book_data = {};
    // var book_img_size;
    // $(document).on('click', '.btn_update_book', function(event) {
    //   event.preventDefault();
    //   book_cover_img_name = '';
    //   book_file_name = '';
    //   var tbl_row = $(this).closest('tr');
    //   var row_id = tbl_row.attr('row_id');
    //   var img = '';
    //   var file = '';
    //   // var data = {};
    //   tbl_row.find('.imgs').each(function(index, val) {
    //     img = $(this).attr('pic');
    //     file = $(this).attr('pdf');

    //   });

    //   tbl_row.find('.row_data').each(function(index, val) {
    //     var col_name = $(this).attr('col_name');
    //     book_data[col_name] = $(this).text().trim();

    //   });
    //   book_data['img'] = img;
    //   book_data['filename'] = file;
    //   book_data['id'] = row_id;
    //   showBookDialog(book_data);
    //   getCategoris(cat_data_obj);
    //   // seachCats("#book_category");
    //   setTimeout(() => {
    //     $(document).find("#book_category option").each(function() {
    //       if ($(this).text() == book_data['Category_Name']) {
    //         $(this).prop('selected', true);
    //         return false;
    //       }
    //     });
    //   }, 1000)
    //   //add code to set book category
    //   console.log(book_data);

    // });
    // ///on clicking book or doc dialog input    
    // //whene change  document status
    // $("#doc_status").on('change', function() {
    //   var fileinput = document.getElementById("doc_fileinput");
    //   var v = document.getElementById("doc_status").value;
    //   if (v == 0) {
    //     fileinput.accept = 'image/jpg,image/jpeg,image/png'

    //   } else {
    //     fileinput.accept = 'applcation/pdf'
    //   }
    // });
    // //whene change  book status
    // $("#book_status").on('change', function() {
    //   var fileinput = document.getElementById("book_inputfile");
    //   var v = document.getElementById("book_status").value;
    //   if (v == 0) {
    //     fileinput.accept = 'image/jpg,image/jpeg,image/png'

    //   } else {
    //     fileinput.accept = 'applcation/pdf'
    //   }
    // });

    // //on add book file or imag

    // $("#book_inputfile").on('change', function(event) {
    //   //editting later
    //   const file = event.target.files[0];
    //   if (file.type == 'application/pdf') {
    //     book_file_name = file.name;
    //     var coverPhotoImg = document.getElementById("book_cover_img")
    //     var half_name = file.name;
    //     const reader = new FileReader();
    //     reader.onload = function(event) {
    //       const pdfDataUrl = event.target.result;

    //       // Load the PDF.js library
    //       const pdfjsLib = window['pdfjs-dist/build/pdf'];
    //       pdfjsLib.GlobalWorkerOptions.workerSrc = 'pdf.worker.min.js';

    //       // Load the PDF file using PDF.js
    //       pdfjsLib.getDocument({
    //         data: atob(pdfDataUrl.split(',')[1])
    //       }).promise.then(function(pdfDoc) {
    //         // Get the first page of the PDF file
    //         document.getElementById("book_pages").value = pdfDoc.numPages;
    //         return pdfDoc.getPage(1);
    //       }).then(function(page) {
    //         // Get the cover photo of the PDF file as a data URL
    //         // return page.getViewport({ scale: 1 });
    //         const canvas = document.createElement('canvas');
    //         const canvasContext = canvas.getContext('2d');
    //         const viewport = page.getViewport({
    //           scale: 1
    //         });
    //         canvas.width = viewport.width;
    //         canvas.height = viewport.height;
    //         return page.render({
    //           canvasContext,
    //           viewport
    //         }).promise.then(function() {
    //           return canvas.toDataURL('image/jpeg', 0.8);
    //         });

    //       }).then(function(coverPhotoDataUrl) {
    //         // Set the cover photo as the source of the img tag
    //         coverPhotoImg.src = coverPhotoDataUrl;
    //       });
    //     }
    //     reader.readAsDataURL(file);
    //   } else {
    //     book_cover_img_name = file.name;
    //     book_img_size = file.size;
    //     var reader = new FileReader();
    //     reader.readAsDataURL(file);
    //     reader.onload = function(e) {
    //       //متغير يحتوي الصورة
    //       //الحدث onload يحدث اثناء العملية الحالية 
    //       document.getElementById("book_cover_img").setAttribute('src', e.target.result);
    //     }
    //   }
    // });
    // //on chang docfile

    //docoment input file
    // $("#doc_fileinput").on('change', function(event) {

    //   const file = event.target.files[0];
    //   if (file.type == 'application/pdf') {
    //     var coverPhotoImg = document.getElementById("doc_cover_img")
    //     var half_name = file.name;
    //     const reader = new FileReader();
    //     reader.onload = function(event) {
    //       const pdfDataUrl = event.target.result;

    //       // Load the PDF.js library
    //       const pdfjsLib = window['pdfjs-dist/build/pdf'];
    //       pdfjsLib.GlobalWorkerOptions.workerSrc = 'pdf.worker.min.js';

    //       // Load the PDF file using PDF.js
    //       pdfjsLib.getDocument({
    //         data: atob(pdfDataUrl.split(',')[1])
    //       }).promise.then(function(pdfDoc) {
    //         // Get the first page of the PDF file
    //         document.getElementById("doc_pages").value = pdfDoc.numPages;
    //         return pdfDoc.getPage(1);
    //       }).then(function(page) {
    //         // Get the cover photo of the PDF file as a data URL
    //         // return page.getViewport({ scale: 1 });
    //         const canvas = document.createElement('canvas');
    //         const canvasContext = canvas.getContext('2d');
    //         const viewport = page.getViewport({
    //           scale: 1
    //         });
    //         canvas.width = viewport.width;
    //         canvas.height = viewport.height;
    //         return page.render({
    //           canvasContext,
    //           viewport
    //         }).promise.then(function() {
    //           return canvas.toDataURL('image/jpeg', 0.8);
    //         });

    //       }).then(function(coverPhotoDataUrl) {
    //         // Set the cover photo as the source of the img tag
    //         coverPhotoImg.src = coverPhotoDataUrl;
    //       });
    //     }
    //     reader.readAsDataURL(file);
    //   } else {
    //     doc_img_name = file.name;
    //     doc_img_size = file.size;
    //     var reader = new FileReader();
    //     reader.readAsDataURL(file);

    //     reader.onload = function(e) {
    //       //متغير يحتوي الصورة

    //       //الحدث onload يحدث اثناء العملية الحالية 
    //       document.getElementById("doc_cover_img").setAttribute('src', e.target.result);
    //     }
    //   }
    // });

    // //for hide dialogs
    // $(".cancel").on('click', function(event) {
    //   event.preventDefault();
    //   hideUpdaeFileDialog();
    // });
    // //whene clicking
    // $('#dialog_button').on('click', hide_dialog());

    // //on save update book//
    // $("#update_book").on('click', async function(event) {
    //   event.preventDefault();
    //   let valid = await validateInputs('#book_dialog');
    //   if (valid) {
    //     try {
    //       showLoading();
    //       const fileInput = document.getElementById("book_inputfile");
    //       var formData = new FormData();
    //       let file = fileInput.files[0];
    //       formData.append('file', file);
    //       formData.append('id', book_data['id']);
    //       formData.append('book_Title', $("#book_title").val());
    //       formData.append('book_subject', $("#book_title").val());
    //       formData.append('book_author', $("#book_author").val());
    //       formData.append('book_category', $("#book_category").val());
    //       formData.append(' book_publisher', $('#book_publisher').val());
    //       formData.append('publish_date', $("#publish_date").val());
    //       formData.append('copiesNo', $("#book_copies").val());
    //       formData.append('status', $("#book_status").val());
    //       formData.append('lockerNo', $("#book_locker_no").val());
    //       formData.append('book_pages', $("#book_pages").val());
    //       formData.append('call_type', 'update_book_data');

    //       $.post({
    //         url: 'updates_ajax.php',
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
    //             // clearForm('#nav-book');
    //             $(document).find('.cancel').click();

    //           } else {
    //             $("#dialog_message").innerHTML = d1.msg;
    //             showfaild();
    //           }
    //         }
    //       });
    //     } catch (error) {
    //       console.log(error.stack);
    //       showfaild();
    //     }
    //   }

    // }); //=>//submiting update book end

    //=>add codes for doc









    //()=>end doc script
  </script>
  <!-- هنا نهاية  عملي  -->
  <script src="../assest/js/bootstrap.bundle.min.js"></script>
</body>

</html>