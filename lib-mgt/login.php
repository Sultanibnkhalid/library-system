<!DOCTYPE html>
<?php
include '../inc/connect.php'
?>
<html lang="ar">

<head>
    <title>Log in</title>
    <meta charset="utf-8" dir="ltr">
    <meta name="discription" content="this page is to fil login informatoin">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    

<style>
    html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

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
    
</style>

      <link href="../assest/css/bootstrap.rtl.css" rel="stylesheet">
      <link href="../assest/css/bootstrap.rtl.min.css" rel="stylesheet">
    <script src="../jquery3_6_0.js"></script>

</head>

<body>

        <main class="form-signin">
            <form style="direction: rtl;">
                <img class="mb-4" src="../small_logo.png" alt="" width="100%" height="200">
                <h1 class="h3 mb-3 fw-normal"  id="error-msg" style="text-align: center;">قم بتسجيل الدخول</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" id="user-name" required placeholder="">
                    <label for="floatingInput">اسم المستخدم </label>
                </div>
                <br>
                
                <br>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" required placeholder="Password">
                    <label for="floatingPassword">كلمة المرور</label>
                </div>

                
                <button class="w-100 btn btn-lg btn-primary" type="button" id="btn-login">تسجيل الدخول</button>

                <div class="checkbox mb-3">
                    <label>
                    <a href="forgetpassword.php">نسيت كلمة المرور؟</a>
                    </label>
                </div>
                <!-- <p class="mt-5 mb-3 text-muted">مكتبة جامعة ذمار</p> -->
            </form>
        </main>

    <!-- </div> -->
    <script>
$('#btn-login').on('click',function(event){
    event.preventDefault();
    $.post('../login/user-login.php',{call_type:"emp_login",password:$('#password').val(),username:$('#user-name').val()},function(data){
        console.log(data);
        if(data!=''){
            let d1= JSON.parse(data);
            if(d1.status=='success'){         
            window.location.href='index.php';
            }
            else{
                $('#error-msg').text(d1.msg);
            return;
            }  
                    
        }else{
            // window.location.href='index.php';
        }
    })
})


    </script>
</body>

</html>