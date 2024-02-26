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
    <title>االحسابات</title>

    <!-- CSS -->
    <link href="../assest/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assest/css/fontawesome-all.min.css">
    <script src="../assest/js/bootstrap.bundle.min.js"></script>
    <link href="../css/sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dialog_style.css">
    <!-- js -->
    <script src="../jquery3_6_0.js"></script>
    <script src="../js/dialog_script.js"></script>
    <script src="js/accounts.js"></script>
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
<!-- header -->
    <?php
    include 'some_blocks/header.php'
    ?>

    <div class="container-fluid">
        <div class="row">
            <!-- dd -->
<!-- side menu -->
            <?php
            include 'some_blocks/side-menu.php'
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-1">
                <div class="bd-example">
                    <nav style="background-color: #dee2e6 ;">
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist" style="place-content: center;">
                            <button  class="nav-link active" id="nav-account-tab" data-bs-toggle="tab" data-bs-target="#nav-account" type="button" role="tab" aria-controls="nav-account" aria-selected="true"> االحسابات</button>


                        </div>
                    </nav>
                            <div class="col-md-12 col-lg-12">

                                <br>
                            </div>
                            <div class="row g-2">

                                <div class="col-md-6 col-lg-6">
                                    <form class="col-sm-12">
                                        <input type="search" class="form-control form-control-light" placeholder="بحث...." aria-label="Search" id="serch-account">
                                    </form>
                                    <div class="card-body table-responsive" id="table_container" style="overflow:auto;width:100%; direction:rtl">
                                        <table class="table table-bordered table-striped table-lg" id="account-table" style="width: 100%;">
                                        </table>

                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 order-last">
                                    <div class="card-body table-responsive account-info-div" id="account-info_container" style="overflow:auto;height:auto;width:100%; direction:rtl;border: 1px solid;background-color:rgba(0, 0, 0, 0.05);border-radius: 20px;">

                                    <!-- accont detailes -->

                                    </div>
                                </div>
                            </div>
                     
               
            </main>

        </div>

    </div>
    <!-- loader -->
    <?php
    include 'some_blocks/loader_dialog.php'
    ?>
   
</body>

</html>