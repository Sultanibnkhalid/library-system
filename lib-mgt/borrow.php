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
    <title>الاعارات</title>


    <!--  CSS -->
    <link href="../assest/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assest/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/dialog_style.css">
    <link href="../css/sidebars.css" rel="stylesheet">
    <script src="../assest/js/bootstrap.bundle.min.js"></script>

    <!-- js -->
    <script src="../jquery3_6_0.js"></script>
    <script src="../js/dialog_script.js"></script>

    <script src="../build/pdf.js"></script>
    <script src="../build/pdf.worker.js"></script>
    <script src="../pdf.worker.min.js"></script>
    <script src="../pdf.min.js"></script>
    <script src="js/borrow_scripts.js"></script>

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
            /* height: 80px; */
            /* overflow: scroll;  */
        }

        .autocomplete-select {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            border: 1px solid #ccc;
            background-color: #fff;
            z-index: 1;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border: 4px;
            font-size: 16px;
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            height: 40px;
            ;

        }

        .autocomplete-select li {
            list-style-type: none;
            background-color: #f5f5f5;
            padding: 10px;
            margin: 5px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .autocomplete-select li:hover {
            background-color: #f2f2f2;

        }

        /* list */
        .autocomplete-list {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            border: 1px solid #ccc;
            background-color: #fff;
            z-index: 1;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border: 4px;
            font-size: 16px;
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            height: 40px;
            ;

        }

        .autocomplete-list li {
            list-style-type: none;
            background-color: #f5f5f5;
            padding: 10px;
            margin: 5px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;


        }

        .autocomplete-list li:hover {
            background-color: #f2f2f2;

        }
    </style>


    <!-- Custom styles for this template -->
    <!-- <link href="dashboard.rtl.css" rel="stylesheet"> -->
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
                <div class="bd-example" style="align-items: center; align-content:center">
                    <nav style="background-color: #dee2e6 ;">
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist" style="place-content: center;">
                            <button class="nav-link active" id="nav-name-tab" data-bs-toggle="tab" data-bs-target="#nav-name" type="button" role="tab" aria-controls="nav-name" aria-selected="true"> اعارة
                                الطلاب</button>
                            <button class="nav-link" id="nav-an-tab" data-bs-toggle="tab" data-bs-target="#nav-an" type="button" role="tab" aria-controls="nav-an" aria-selected="false"> اعاره الاساتذه </button>


                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <!-- student panal -->
                        <!-- student panal -->
                        <!-- student panal -->

                        <div class="tab-pane fade active show" id="nav-name" role="tabpanel" aria-labelledby="nav-name-tab">
                            <div class="row g-3">
                                <div class="col-md-4 col-lg-4  order-md-last   order-sm-last  order-last  ">
                                    <!-- card start -->
                                    <div class="card">
                                        <div class="card-body p-1">
                                            <h5 class="card-title"> قائمة الكتب المختاره</h5>
                                            <div class="card p-1 mt-3">
                                                <div class="cos" style=" height: 200px;">
                                                    <ul id="student_selected_book_menu">

                                                    </ul>

                                                </div>

                                            </div>
                                            <div class="card p-1 mt-0">
                                                <form class="card ">
                                                    <label for="tb_notice" class="form-label">الملاحظات</label>
                                                    <textarea class="form-control" id="st_notice"></textarea>
                                                    <label for="due_date" class="form-label">التاريخ المحدد للارجاع</label>
                                                    <input type="date" class="form-control" id="due_date">
                                                    <hr class="my-1">
                                                    <button class="w-100 btn btn-primary btn-lg" id="btn_borrow_student">اعارة</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7 col-lg-8 ">
                                    <div class="row g-3">
                                        <!-- student _section -->
                                        <div class="col-md-6 col-lg-6 card ">
                                            <form class="needs-validation" action="#">
                                                <div class="row g-3">
                                                    <div class="col-sm-12">
                                                        <label class="form-label" style="margin-right: 0;margin-bottom: 10px;">رقم العملية</label>
                                                        <input type="text" id="transNo" class="form-control " style="margin-right: 0;width: 30%;" disabled>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label for="search_student" class="form-label">اسم الطالب</label>
                                                        <input type="text" class="form-control" id="search_student" placeholder="search..." autocomplete="off">
                                                        <div class="invalid-feedback">
                                                            يرجى إدخال الاسم بشكل صحيح صحيح.
                                                        </div>
                                                        <div class="autocomplete">
                                                            <ul class="autocomplete-list" id="student_list">
                                                                <ul val="">لا يوجد</ul>
                                                            </ul>
                                                        </div>
                                                        <!-- <datalist id="student_list">
                                                    <option value="f">gggggggggggg</option>
                                                </datalist> -->
                                                    </div>


                                                </div>

                                            </form>
                                            <div class="row g-3">
                                                <div class="col-sm-12">
                                                    <div class="card p-1 mt-5">
                                                        <div class="cos">
                                                            <div class="row g-3 overflow-hidden flex-md-row mb-0 shadow-sm h-md-250 position-relative" style="height: 100%;">
                                                                <div class="col p-2 d-flex flex-column position-static">
                                                                    <strong class="d-inline-block mb-2 text-primary">معلومات الطالب</strong>
                                                                    <div class="mb-1 text-muted">الاسم</div>
                                                                    <p id="p_student_name" class="card-text mb-auto"></p>
                                                                    <!-- <p href="#" id="p_students_tatus" class="card-text">حالت الحساب </p> -->
                                                                    <p href="#" id="student_accont_status" class="card-text" style="margin-top: 35px;"> نشط/غير نشط </p>
                                                                </div>
                                                                <div class="col-md-3 col-sm-3   d-lg-block order-last">
                                                                    <div class="col">
                                                                        <div class="card shadow-sm">
                                                                            <img id="student_img" class="bd-placeholder-img card-img-top" width="50%" height="160" alt="...">
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                        <!-- book sction -->
                                        <div class="col-md-6 col-lg-6  order-md-last   order-sm-last  order-last card">


                                            <form class="needs-validation " action="#">
                                                <div class="row g-3">
                                                    <div class="col-sm-12">
                                                        <label class="form-label" style="margin-right: 0;margin-bottom: 10px;">نوع الوثيقة</label>
                                                        <select class="form-select" id="book_type" required="">
                                                            <option value="book">كتاب</option>
                                                            <option value="doc">وثيقة</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <label for="search_student_book" class="form-label">اسم الكتاب/الوثيقة</label>
                                                        <input type="search" class="form-control" id="search_student_book" placeholder="search..." autocomplete="off">
                                                        <div class="invalid-feedback">
                                                            يرجى إدخال الاسم بشكل صحيح صحيح.
                                                        </div>
                                                        <div class="autocomplete">
                                                            <ul class="autocomplete-list" id="student_book_list">
                                                                <li val="">لا يوجد</li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <button id="btn_add_selecte_student_book" class="form-control">اضافة
                                                        </button>

                                                    </div>




                                                </div>

                                            </form>

                                            <div class="row g-3" style="margin-top: 10px;">
                                                <div class="card p-1 mt-5">
                                                    <div class="cos ">
                                                        <div class="row g-3 overflow-hidden flex-md-row mb-0 shadow-sm h-md-250 position-relative" style="height: 100%;">
                                                            <div class="col p-2 d-flex flex-column position-static">
                                                                <strong class="d-inline-block mb-2 text-primary">معلومات الكتاب</strong>
                                                                <div class="mb-1 text-muted">العنوان</div>
                                                                <p id="student_BookName" class="card-text "> </p>
                                                                <div>
                                                                    <!-- <p href="#" id="student_BookStatus" class="card-text" style="float: right;">حالت الكتاب </p> -->
                                                                    <p href="#" id="BAcDc" class="card-text" style="float: right;"> متوفر/غير متوفر </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-3   d-lg-block order-last">
                                                                <div class="col">
                                                                    <div class="card shadow-sm">
                                                                        <img id="student_book_img" class="bd-placeholder-img card-img-top" width="50%" height="160" alt="...">
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>



                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>



                        <!-- teacher_panal -->
                        <div class="tab-pane " id="nav-an" role="tabpanel" aria-labelledby="nav-an-tab">
                            <!-- start- teacher panal -->
                            <div class="row g-3">
                                <div class="col-md-4 col-lg-4  order-md-last   order-sm-last  order-last  ">
                                    <!-- card start -->
                                    <div class="card">
                                        <div class="card-body p-1">
                                            <h5 class="card-title"> قائمة الكتب المختاره</h5>
                                            <div class="card p-1 mt-3">
                                                <div class="cos" style=" height: 200px;">
                                                    <ul id="teacher_selected_book_menu">

                                                    </ul>

                                                </div>

                                            </div>
                                            <div class="card p-1 mt-0">
                                                <form class="card ">
                                                    <label for="tb_notice" class="form-label">الملاحظات</label>
                                                    <textarea class="form-control" id="tb_notice"></textarea>
                                                    <label for="tb_due_date" class="form-label">التاريخ المحدد للارجاع</label>
                                                    <input type="date" class="form-control" id="tb_due_date">
                                                    <hr class="my-1">
                                                    <button class="w-100 btn btn-primary btn-lg" id="btn_borrow_teacher">اعارة</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7 col-lg-8 ">
                                    <div class="row g-3">
                                        <!-- teacher _section -->
                                        <div class="col-md-6 col-lg-6 card ">
                                            <form class="needs-validation" action="#">
                                                <div class="row g-3">
                                                    <div class="col-sm-12">
                                                        <label class="form-label" style="margin-right: 0;margin-bottom: 10px;">رقم العملية</label>
                                                        <input type="text" id="tb_transNo" class="form-control " style="margin-right: 0;width: 30%;" disabled>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label for="search_teacher" class="form-label">اسم الاستاذ</label>
                                                        <input type="text" class="form-control" id="search_teacher" placeholder="search..." autocomplete="off">
                                                        <div class="invalid-feedback">
                                                            يرجى إدخال الاسم بشكل صحيح صحيح.
                                                        </div>

                                                        <!-- <datalist id="student_list">
                                                    <option value="f">gggggggggggg</option>
                                                </datalist> -->
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="autocomplete">
                                                            <ul class="autocomplete-list" id="teacher_list">
                                                                <li val=''>لا يوجد</li>
                                                            </ul>
                                                        </div>
                                                    </div>


                                                </div>

                                            </form>
                                            <div class="row g-3">
                                                <div class="col-sm-12">
                                                    <div class="card p-1 mt-5">
                                                        <div class="cos">
                                                            <div class="row g-3  overflow-hidden flex-md-row mb-0 shadow-sm h-md-250 position-relative" style="height: 100%;">
                                                                <div class="col p-2 d-flex flex-column position-static">
                                                                    <strong class="d-inline-block mb-2 text-primary">معلومات الاستاذ</strong>
                                                                    <div class="mb-1 text-muted">الاسم</div>
                                                                    <p id="p_teacher_name" class="card-text "></p>
                                                                    <!-- <p href="#" id="p_students_tatus" class="card-text">حالة الحساب </p> -->
                                                                    <p href="#" id="teacher_accont_status" class="card-text" style="margin-top: 35px;"> نشط/غير نشط </p>

                                                                </div>
                                                                <div class="col-md-3 col-sm-3   d-lg-block order-last">
                                                                    <div class="col">
                                                                        <div class="card shadow-sm">
                                                                            <img id="teacher_img" class="bd-placeholder-img card-img-top" width="50%" height="160" alt="...">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                        <!--teacher book sction -->
                                        <div class="col-md-6 col-lg-6  order-md-last   order-sm-last  order-last card">

                                            <form class="needs-validation " action="#">
                                                <div class="row g-3">
                                                    <div class="col-sm-12">
                                                        <label class="form-label" style="margin-right: 0;margin-bottom: 10px;">نوع الوثيقة</label>
                                                        <select class="form-select" id="tb_book_type" required="">
                                                            <option value="book">كتاب</option>
                                                            <option value="doc">وثيقة</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="row g-3">


                                                            <div class="col-sm-9">
                                                                <label for="search_teacher_book" class="form-label">اسم الكتاب/الوثيقة</label>
                                                                <input type="search" class="form-control" id="search_teacher_book" placeholder="search..." autocomplete="off">
                                                                <div class="invalid-feedback">
                                                                    يرجى إدخال الاسم بشكل صحيح صحيح.
                                                                </div>
                                                                <div class="autocomplete">
                                                                    <ul class="autocomplete-list" id="teacher_book_list">
                                                                        <li val=''>لا يوجد</li>
                                                                    </ul>
                                                                </div>


                                                            </div>
                                                            <div class="col-sm-3">
                                                                <button id="btn_add_selecte_teacher_book" class="form-control">اضافة
                                                                </button>

                                                            </div>






                                                        </div>

                                                    </div>

                                                </div>

                                            </form>
                                            <div class="row g-3" style="margin-top: 10px;">
                                                <div class="card p-1 mt-5">
                                                    <div class="cos ">
                                                        <div class="row g-3 overflow-hidden flex-md-row mb-0 shadow-sm h-md-250 position-relative" style="height: 100%;">
                                                            <div class="col p-2 d-flex flex-column position-static">
                                                                <strong class="d-inline-block mb-2 text-primary">معلومات الكتاب</strong>
                                                                <div class="mb-1 text-muted">العنوان</div>
                                                                <p id="teacher_BookName" class="card-text "></p>
                                                                <div>
                                                                    <!-- <p href="#" id="student_BookStatus" class="card-text" style="float: right;">حالت الكتاب </p> -->
                                                                    <p href="#" id="teacher_BookStatus" class="card-text" style="float: right;"> متوفر/غير متوفر </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-3   d-lg-block order-last">
                                                                <div class="col">
                                                                    <div class="card shadow-sm">
                                                                        <img id="teacher_book_img" class="bd-placeholder-img card-img-top" width="30%" height="169" alt="...">
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>



                                        </div>
                                    </div>

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
    include 'some_blocks/borrow-repo-model.php'
    ?>
    <!-- loader -->
    <?php
    include 'some_blocks/loader_dialog.php'
    ?>
    <!--report-->
   





</body>

</html>