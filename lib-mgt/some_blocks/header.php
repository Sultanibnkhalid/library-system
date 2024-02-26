<?php
?>


<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow" style="background-color: #2795b6!important;">

  <a id="LibName" class="navbar-brand  col-md-3 col-lg-2 me-0 px-3 " href="#" style="background-color: #2795b6!important;">
  المكتبة الاليكترونية</a>

  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="عرض/إخفاء لوحة التنقل">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="col-sm-2  px-3" style="margin-right: 20%;">
  <a href="../index.php">
  <img src="../small_logo.png" width="60" height="60" class="d-inline-block align-top" alt="Bootstrap" loading="lazy">
  </a>
   

  </div>
  <ul class="navbar-nav col-md-3 col-lg-2 me-0 px-3" style="direction: ltr;">
    <li class="nav-item text-nowrap">
      <form class="d-flex ">
        <div class=" dropdown ">
          <div class="d-flex align-items-center " id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <a href="#">
              <img id="emp-img" src="../profiles/<?php echo isset($_SESSION['type']) ? $_SESSION["img"] : "../img/avatar.jpg" ?>" class="mx-auto d-block rounded-circle my-1" style="float: left; width: 50px; height: 50px; ">

            </a>
          </div>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="position: absolute;left: 0;width: 260px;height: 265px;border: 1px solid #2795b6;border-radius: .25rem;padding-top: 1px;">
            <li id="prof" style="height: 200px;padding: 18px; background-color: #2795b6;">
              <img id="emp-img" src="../profiles/<?php echo isset($_SESSION['type']) ? $_SESSION["img"] : "../img/avatar.jpg" ?>" class="mx-auto d-block rounded-circle my-1" style=" width: 100%; height: 120px;max-width: 60%;border: 1px solid green;border-radius: .25rem; ">
              <p id="emp-name" style="font-size: 16px;text-align: center;margin-top: 15px;color: snow;"><?php echo isset($_SESSION['type']) ? $_SESSION["name"] : "..not-defined" ?></p>

            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <!-- <li id="pass"><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#password" href="#">تغيير كلمة
                        المرور</a></li> -->
            <li style="background-color: whitesmoke;padding: 0px 3px 3px 3px;">

              <button type="button" class="btn btn-outline-primary  rounded-pill" data-bs-toggle="modal" data-bs-target="#Upassword">كلمة المرور</button>
              <button type="button" class="btn btn-outline-primary  rounded-pill" style="float: left; " data-bs-toggle="modal" data-bs-target="#Ulogout">تسجيل الخروج</button>
            </li>



          </ul>
        </div>

      </form>
    </li>
  </ul>
</header>
<!--  -->

<script>
  function toggleElementByWidth(elementId, minWidth, displayStyle) {
    const element = document.getElementById(elementId);
    if (window.innerWidth >= minWidth) {
      element.style.display = displayStyle;
    } else {
      element.style.display = 'none';
    }
  }

  $(window).on('resize', function(event) {
    toggleElementByWidth('LibName', 768, 'block');

  });
</script>


<!-- change password -->
<div class="modal fade" id="Upassword" tabindex="-1" style="display: none;z-index: 9999;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <button type="button" class="btn btn-close btn-outline-danger  border rounded btn-lg" data-bs-dismiss="modal" aria-label="إغلاق" style="border: 1px solid red!important;margin-right: 10px;margin-top: 10px;"></button>

      <div class="modal-body">


        <div class="col p-2 d-flex flex-column position-static">

          <strong class="d-inline-block mb-2 text-primary" style="margin-right: 40%;"> كلمة المرور</strong>
          <div>
            <div class="mb-1 text-muted" style="float: right;margin-left: 10px;"> كلمة المرور القديمة : </div>
            <input class="form-control" type="password" id="old-password" placeholder="ادخل كلمة المرور القديمه">
          </div>
          <div>
            <div class="mb-1 text-muted" style="float: right;margin-left: 10px;"> كلمة المرور الجديدة : </div>
            <input class="form-control" type="password" id="new-password" placeholder="ادخل كلمة المرور الجديده">
          </div>
          <div>
            <div class="mb-1 text-muted" style="float: right;margin-left: 10px;"> تاكيد كلمة المرور : </div>
            <input class="form-control" type="password" id="retype-password" placeholder="">
          </div>
          <div>
            <p id='error-text' style="color: red;"></p>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="justify-content: space-between;">
        <button type="button" id="cancel-change" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
        <button type="button" id="btn-change-password" class="btn btn-primary">حفظ التغيرات</button>
      </div>
    </div>
  </div>
</div>



<!-- log out -->
<div class="modal fade" id="Ulogout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class=" btn btn-close btn-outline-danger  border rounded btn-lg" data-bs-dismiss="modal" aria-label="إغلاق" style="border: 1px solid red!important;"></button>
      </div>
      <div class="modal-body">
        <h5 style="text-align: center;margin-bottom: 30px;margin-top: 30px;">هل انت متاكد من تسجيل الخروج</h5>
      </div>
      <div class="modal-footer" style="justify-content: space-between;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">تراجع</button>
        <a href="../login/logout.php">
          <button type="button" id="btn_logout" class="btn btn-primary">تسجيل الخروج
          </button>
        </a>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).on('click', '#btn-change-password', function() {
    let old_password = $("#old-password").val();
    let new_password = $("#new-password").val();
    let retype_password = $("#retype-password").val();
    if (retype_password.trim() == '' || new_password.trim() == '' || old_password.trim() == '') {
      $('#error-text').text('كلمة المرور فارغة');
      makevibration();
      return;
    }
    if (new_password.trim() !== retype_password.trim()) {
      makevibration();
      $('#error-text').text('كلمة المرور مختلفة');
      return;
    } else {
      let data_obj = {
        call_type: 'reset_password',
        npassword: new_password,
        oldpassword: old_password,
      }
      $.post('../login/edit_profils.php', data_obj, function(data) {
        if (data != '') {
          let d1 = JSON.parse(data);
          if (d1.status == 'success') {
            $('#cancel-change').click();
            showsucess();
            $("#dialog_message").text(d1.msg);
          } else {
            $('#error-text').text(d1.msg);
            makevibration();
             return;
          }
        }
      });
    }

  }); //end chang button event
</script>