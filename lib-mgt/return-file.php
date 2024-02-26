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

if(!isset($_SESSION['type'] )||($_SESSION['type'] != 'موظف')){
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
    <title>ارجاع ملف </title>


   
<!-- CSS -->
<link href="../assest/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assest/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/dialog_style.css">
    <link href="../css/sidebars.css" rel="stylesheet">
    <!-- js -->
    <script src="../jquery3_6_0.js"></script>
    <script src="../assest/js/bootstrap.bundle.min.js"></script>
    <script src="../js/dialog_script.js"></script>
    <script src="../build/pdf.js"></script>
    <script src="../build/pdf.worker.js"></script>
    <script src="../pdf.worker.min.js"></script>
    <script src="../pdf.min.js"></script>
    <!-- <script src="js/col_cat_scripts.js"></script> -->
    <script src="js/return_scripts.js"></script>    
    
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

        .autocomplete {
            position: relative;

        }

        .autocomplete_list {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            border: 1px solid #ccc;
            background-color: #fff;
            z-index: 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border: 4px;
            font-size: 16px;
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            height: 40px;
            ;

        }

        .autocomplete_list li {
            /* position: absolute; */
            /* z-index: 1; */
            list-style-type: none;
            background-color: #f0f0f0;
            padding:10px;
            margin: 5px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;

        }
        ul li:selected{
            background-color: #ddd;
        }

        .autocomplete_list li:hover {
            background-color: #f2f2f2;

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
                            <button  class="nav-link active" id="nav-book-tab" data-bs-toggle="tab" data-bs-target="#nav-book" type="button" role="tab" aria-controls="nav-book" aria-selected="true"> ارجاع الملفات</button>
                            
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <!-- بنل الكتاب -->
                        <div class="tab-pane fade active show" id="nav-book" role="tabpanel" aria-labelledby="nav-book-tab">


                            <div class="row g-3">
                                <div class="col-md-5 col-lg-4  order-md-first   order-sm-first  order-first  ">
                                    <div class="col-12">
                                        <select id="member_type" class="form-select">
                                            <option value="student">طالب</option>
                                            <option value="teacher">استاذ</option>
                                        </select>

                                    </div>
                                    <h4 class="mb-3">الشخص </h4>


                                    <form class="card p-2">
                                        <div class="input-group">
                                            <input type="search" id="search_member" class="form-control" placeholder="التحقق من العضو">

                                        </div>
                                        <div class="col-12 autocomplete">
                                            <ul id="member_list" class="autocomplete_list">
                                                <!-- <li val=''> لا يوجد</li> -->
                                            </ul>
                                        </div>

                                        <hr class="my-4">

                                    </form>
                                    <div class="col-12">
                                        <p id="p_member_name"> </p>
                                        <p id="p_member_details"> </p>

                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-5 card ">
                                    <h4 class="mb-3">الكتب المستعارة</h4>
                                    <div class=" col-12">
                                        <label class="form-label" style="margin-right: 0;margin-bottom: 10px;">نوع الوثيقة</label>
                                        <select class="form-select" id="book_type" required="">
                                            <option value="book">كتاب</option>
                                            <option value="doc">وثيقة</option>
                                        </select>
                                        <!-- <hr class="my-4"> -->
                                        <div class="input-group">
                                            <button class="form-control" id="check_books">
                                                التحقق من الكتاب
                                            </button>
                                            
                                        </div>
                                        <div class="col-12 autocomplete">
                                            <ul id="book_list" class="autocomplete_list">
                                                <!-- <li val=''> لا يوجد</li> -->
                                            </ul>
                                        </div>
                                        <hr class="my-4">
                                        <label class="form-label" for="notice">ملاحظات
                                        </label>
                                        <input id="notice" class="form-control" type="text">
                                         
                                        <button class="w-100 btn btn-primary form-button" id="btn_return">
                                            استعادة
                                        </button>

                                    </div>
                                    <br>
                                    <div class="row g-3" style="height: 200px;">
                                        <div class="col-sm-4">
                                            <img id="book_img" width="100px" height="100px"  alt="...">
                                        </div>
                                        <div class="col-sm-5">
                                            <p id="p_book_title"></p>
                                            <p id="p_borrowDate"></p>
                                            <p id="p_dueDate"></p>
                                        </div>
                                        <!-- <div class="col-sm-3">
                                            <button class="w-100 btn btn-primary " id="btn_return">
                                                استعادة
                                            </button>
                                        </div> -->

                                    </div>
                                    <!-- <div class="col-12">
                                        <form>
                                            <label class="form-label" for="notice">ملاحظات
                                            </label>
                                            <textarea id="notice" class="form-control">
                                                </textarea>
                                        </form>
                                    </div> -->
                                </div>
                                <!-- third section returned books -->
                                <div class="col-md-2 col-lg-3  order-md-last  order-sm-last  order-last  ">
                                    <div class="row g-3">
                                        <div class="col-12" id="returned_books">
                                            <ul id="rturned_book_list">

                                            </ul>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                       
                    </div>



         <!-- foter start -->

        <?php
    include 'some_blocks/footer.php'
    ?>
        <!-- foter end -->
                
            </main>
        </div>
    </div>
    <!-- incload loader -->
    <?php
    include 'some_blocks/loader_dialog.php';
    ?>
    <?php  
    include 'some_blocks/return-repo-model.php';
    ?>
    <script>
        var ajax_url = "search_queries/return_queries.php";
        var ajax_url3 = "<?php echo APPURL; ?>/ajax/students_ajax.php";
        var update_url = "<?php echo APPURL; ?>/ajax//updates_ajax.php";
        var ajax_url2 = "<?php echo APPURL; ?>/ajax//files_ajax.php";
        var member_id;
        var borrow_data = {}
        $("#dialog_button").on('click', hide_dialog);
        // document.getElementById("book_type").selectedIndex=0;
        $('#book_type').prop('selectedIndex',0);
        $('#member_type').prop('selectedIndex',0);
        $('#member_type').on('change', function() {
            $('#member_list').html('');
            $('#member_list').hide();
        });
        
        // $('#book_type').on('change', function() {
        //     $('#book_list').html('');
        // });
        $('#book_type').on('change', function(event) {
            event.preventDefault();
            showLoading();
             
            console.log($(this).val());
            if ($(this).val() == "book") {
                 searchFiles(borrow_data['trans_id'], 'getBookbyA', "book");
               
            } else if ($(this).val() == "doc") {
                 searchFiles(borrow_data['trans_id'], 'getdocbyA', "doc");
            }

        });
        ///member_type//
        //search_member
        //member_list//p_member_name//p_member_details
        //"p_book_title//
        //p_borrowDate
        //p_dueDate
        //btn_return
        //

        //serch member
      $('#search_member').on('keyup', function(event) {
            event.preventDefault(); 
            if($("#member_list").css("display")=="none"){
             
                $('#member_list').toggle();
            }
            borrow_data['trans_id'] ='';
            borrow_data['account_id'] ='';
            const tmp = $('#member_type').val();
            const input = $("#search_member");
            if (tmp === "student") {
                searchMember($(input).val(), 'getStudent', "student");
                return;

            }
            else if (tmp === "teacher") {
                searchMember($(input).val(),  'getTeacher', "teacher");
                return;
            } 
           else{

            alert(tmp);
           }
           console.log("end");
           // $('#member_list').html('');
        
        });
 
$(document).on('click','.member_option', function(event) {
            event.preventDefault();
           // showLoading();
            let tmp = $(this).attr('val');
            console.log( $(this).attr('val'));
            if (tmp.length) {
                borrow_data['trans_id'] = $(this).attr('val');
                borrow_data['account_id'] = $(this).attr('ac');
                $("#search_member").val(($(this).text()));
                $("#p_member_name").text($(this).text());
                $("#p_member_details").text('');
                $('#member_list').toggle();
                const tp = $("#book_type").val();
                if (tp === "book") {
                       searchFiles(borrow_data['trans_id'],'getBookbyA', "book");
                        
                } else if (tp === "doc") {
                      searchFiles(borrow_data['trans_id'],'getdocbyA', "doc");
                 
                }

            }
            //    hide_dialog(); 
        });

        //click book
        $(document).on('click','.book_option', function(event) {

            event.preventDefault();
            
            const tmp = $(this).attr('dt');
            if (tmp.length) {
                $("#book_list").toggle();
                $('#p_borrowDate').text("تاريخ الاعارة" + $(this).attr('dt'));
                $('#p_book_title').text($(this).text());
                // $('#p_dueDate').text();
                const pic = $(this).attr('pic');
                if (pic.length) {
                    $("#book_img").attr('src',"../books_imgs/" + pic);
                } else {
                    getPdfImg($(this).attr('pdf'));
                }
                //   
            }
        });

        //return borrow
        $("#btn_return").on('click', function(event) {
        //    console.log("hi_return");
            event.preventDefault();
            // console.log("hi_return");
            showLoading();
            const tmp = $(this).attr('dt');
            if (borrow_data["trans_id"]) {
                data_obj = {
                    trans_id: borrow_data["trans_id"],
                    call_type: 'return_books',
                    fine: $("#notice").val(),
                }
                console.log( $("#notice").val());
                $.post(ajax_url, data_obj, function(data) {
                    // console.log(data);
                    var d1 = JSON.parse(data);
                    if (d1.status == "success") { 
                    
                        $("#book_list").html('');
                       // borrow_data['trans_id'] = '';
                        $("#dialog_message").text(d1.msg);
                        showsucess();
                       let t_id= borrow_data['trans_id'];
                       borrow_data['trans_id']='';
                        // console.log('fdfdf dafsd');
                        $('#search_member').val('');
                        showRetunedFiles();
                        // showsucess();
          //  let items= $("#teacher_selected_book_menu").find('li');
                setTimeout(()=>{

                   $('#U').toggle();
                   $('#repo-op-no').text(t_id);
                   $('#repo-person').text($("#p_member_name").text());
            //$('#repo-date').text( $('#tb_due_date').val());
            //    $('#b-repo-ul').html(items);
           
          },100);

                        

                    } else {
                        $("#dialog_message").text(d1.msg);
                        showfaild();
                    }

                })
            } else {
                $("#dialog_message").text('خطأ في هذة العملية');
                  showfaild();
            }
            // hide_dialog(); 
        });
        //on check_books click
        $('#check_books').on('click', function(event) {
            event.preventDefault();
            // console.log("hi_ch");
            $("#book_list").toggle();

        });
        // function getbooks(){}


       
//print 
function printElement() {
  var printContents = document.getElementById("Pcontent").outerHTML;
    var originalContents = document.body.innerHTML;
    var printWindow = window.open('', '', 'height=600,width=800');
  
    printWindow.document.write('<html><head><title></title>');
    var styles = '';
    for (var i = 0; i < document.styleSheets.length; i++) {
      var styleSheet = document.styleSheets[i];
      var rules;
      try {
        rules = styleSheet.cssRules || styleSheet.rules;
      } catch (error) {
        continue;
      }
      if (!rules) {
        continue;
      }
      styles += '<style>';
      for (var j = 0; j < rules.length; j++) {
        var rule = rules[j];
        if (rule.selectorText && rule.style) {
          if (document.querySelector(rule.selectorText)) {
            styles += rule.selectorText + ' {' + rule.style.cssText + '}\n';
          }
        }
      }
      styles += '</style>';
    }
    printWindow.document.write(styles);
    printWindow.document.write('</head><body dir="rtl">');
    printWindow.document.write(printContents);
    printWindow.document.write('</body></html>');
  
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
    printWindow.close();
  
    //document.body.innerHTML = originalContents;
      }

      $('.cancel-change').on('click',function(){
    $('#U').toggle();
});
    </script>
</body>

</html>