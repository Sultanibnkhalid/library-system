<?php 
// include '../inc/emp-login.php';
?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
    <div class="d-flex align-items-center pb-1 mb-3 link-dark text-decoration-none border-bottom">

<div style="width: 100px;;height: 90px;float:left"> <img id="emp-img" src="../profiles/<?php echo isset($_SESSION['type'] )?$_SESSION["img"]:"../img/avatar.jpg" ?>" class="mx-auto d-block rounded-circle my-1" style="width:90%;height:97%;border-radius: 40px; ">
</div>

<p id="emp-name" style="margin-left:5%;font-size:15px;margin-right:5%;"><?php echo isset($_SESSION['type'] )?$_SESSION["name"]:"..not-defined" ?></p>

</div>

        <ul class="list-unstyled ps-0">
            <!-- add links for the pages -->
            <li class="mb-2">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                    <a style="color: #000;" href="index.php"> <i class="fa fa-home">الرئيسية</i> </a>

                </button>
                <div class="collapse show" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="index.php" class="link-dark rounded">معلومات عامة</a></li>
                        <!-- <li><a href="#" class="link-dark rounded">الملف الشخصي</a></li> -->
                        <li class="mb-1" style="width: max-content;">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#member" aria-expanded="false">
                                <i class="fa fa-users"></i>. المشتركين
                            </button>
                            <div class="collapse" id="member">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="add_suscribers.php" class="link-dark rounded">اضافة مشترك </a></li>
                                    <li><a href="search_and_Edite_suscriber.php" class="link-dark rounded">تعديل مشترك</a></li>

                                </ul>
                            </div>
                        </li>
                        <li class="mb-1" style="width: max-content;">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#user" aria-expanded="false">
                      <i class="fa fa-user"></i>. الحسابات
                    </button>
                    <div class="collapse" id="user">
                      <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="accounts.php" class="link-dark rounded">ادارة الحسابات</a></li>
                        <!-- <li><a href="#" class="link-dark rounded">تعديل حساب</a></li> -->


                      </ul>
                    </div>
                  </li>
                        <li class="mb-1" style="width: max-content;">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#book" aria-expanded="false">
                                <i class="fa fa-book"></i>. الكتب
                            </button>
                            <div class="collapse" id="book">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="add_files.php" class="link-dark rounded">اضافة كتاب </a></li>
                                    <li><a href="search_and_edit_files.php" class="link-dark rounded">تعديل كتاب</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1" style="width: max-content;">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#borrw" aria-expanded="false">
                                <i class="fa fa-rocket"></i>. العمليات
                            </button>
                            <div class="collapse" id="borrw">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="borrow.php" class="link-dark rounded">اعارة كتاب </a></li>
                                    <li><a href="return-file.php" class="link-dark rounded">استرجاع كتاب</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1" style="width: max-content;">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#others" aria-expanded="false">
                                <i class="fa fa-star"></i>. اخرى
                            </button>
                            <div class="collapse" id="others">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="collage.php" class="link-dark rounded"> الكليات </a></li>
                                    <!-- <li><a href="#" class="link-dark rounded"> الاقسام</a></li> -->
                                    <li><a href="category.php" class="link-dark rounded"> الاصناف</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>


    </div>
</nav>
<script>
   $(document).on('mouseenter', '.mb-1', function() {
        let el=$(this).find('.collapse');
        if($(el).css('display')=='none')
           { $(this).find('.btn-toggle').click();
            }
  });
  $(document).on('mouseleave', '.mb-1', function() {
    let el=$(this).find('.collapse');
   if($(el).css('display')=='block'){
    $(this).find('.btn-toggle').click();

   }
  });
  
//   (function () {
//   'use strict'
//   var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
//   tooltipTriggerList.forEach(function (tooltipTriggerEl) {
//     new bootstrap.Tooltip(tooltipTriggerEl)
//   })
// })()
</script>
