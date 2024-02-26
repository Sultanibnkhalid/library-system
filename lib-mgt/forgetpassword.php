<!DOCTYPE html>
<?php  
include_once '../inc/connect.php'
?>
<html lang="ar" >
    <head>
        <title>forget password</title>
        <meta charset="utf-8" dir="ltr">
        <meta name="discription" content="this page is to fill reset password information " >
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
       
        <link href="../css/loginStyle.css"  rel="stylesheet">
    </head>
    <body>

    <div class="login-cards">
        <div  class="login-card">

            <label class="login-card-items" for="logof">يرجى ادخال البريد الاليكتروني  او رقم الهاتف</label>
            <form class="login-card-items" action="#" method="POST">
               
                <input type="text" placeholder="eample@mail.com" required  >
                
                <input type="submit"  value="ارسال"  >
               
            </form>
           
        </div>
       
    </div>
   
    </body>
    </html>