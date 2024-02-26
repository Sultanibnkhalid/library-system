//check user login

//page ids
//user-img
//user-nameofuser
//user-name
//user-email
//account-status
//status-container
var user_data = {};
try{
  $.post(
    "login/check-session.php",
    { call_type: "check_login_info" },
    function (data) {
      if (data != "") {
        // console.log(data);
        //get user session data
        let d1 = JSON.parse(data);
        if (d1.status == "success") {
          try {
            setTimeout(() => {
              $("#avatar-img").attr("src", "profiles/" + d1["img"]);
              user_data["NameOfUser"] = d1["NameOfUser"];
              user_data["email"] = d1["email"];
              user_data["name"] = d1["name"];
              user_data["img"] = d1["img"];
            }, 50);
          } catch (error) {
            console.log(error.stack);
          }
        } else {
         window.location.href = "login.php";
          return;
        }
      } else {
       window.location.href = "index.php";
        return;
      }
      
    }
  );
}catch(error){
   window.location.href = "index.php";
  console.log(error.stack);

}

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
    $.post('login/edit_profils.php', data_obj, function(data) {
      if (data != '') {
        let d1 = JSON.parse(data);
        if (d1.status == 'success') {
          $('#password').toggle();
          
          
        } else {
          $('#error-text').text(d1.msg);
           
           return;
        }
      }
    });
  }

});

$(document).on("click", "#prof", function () {
  $("#user-nameofuser").val(user_data["NameOfUser"]);
  $("#user-name").val(user_data["name"]);
  $("#user-email").val(user_data["email"]);
  $("img.user-img").each(function () {
    $(this).attr("src", "profiles/" + user_data["img"]);
  });
  //add the code of acount status
  //then dislay it
  //  $('#status-container').css('display'='none');
});
//function to control footter style
function toggleElementByWidth(elementId, minWidth, displayStyle) {
  const element = document.getElementById(elementId);
  if (window.innerWidth >= minWidth) {
    element.style.display = displayStyle;
  } else {
    element.style.display = 'none';
  }
}
$(window).on('resize', function(event) {
  toggleElementByWidth('foName', 768, 'block');  
});
//on click change
//change profile  "btn_save_profil_changes"
//"user-email"
//"user-email"
$(document).on('click','#btn_save_profil_changes',function(){
  let user_name=$("#user-name").val();
  let user_email=$("#user-email").val();
  if(user_name.trim()==''||user_email.trim()==''){
    $('#error-pr-text').text('كلمة المرور فارغة');
    return;
  }
  
  else{
    let data_obj={
      call_type:'edit_profile_data',
      user_email:user_email,
      user_name:user_name,
    }
    $.post('login/edit_profils.php',data_obj,function(data){
      if(data!=''){
        let d1=JSON.parse(data);
        if(data.status=='success'){
          $('#proFile').dismiss();
          alert(d1.msg);
        }else{
          $('#error-text').text(d1.msg);
          alert(d1.msg);
         return;
        }
      }
    });
  }
});//end chang button event
// $(document).ready(function(){
//   $(document).on('click','.colos_detils',function(){
//     $('#details-modle').toggle();
//   });
//   $(document).on('click','.close_iframe',function(){
//     $('#iframe-modle').toggle();
// });

// });