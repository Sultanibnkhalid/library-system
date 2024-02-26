//this file script for search-subscribers.php
//
$(document).ready(function(){
//variables
    var ajax_url = "search_queries/";
    var ajax_url2 = "ajax/students_ajax.php";
    var update_url = "ajax/updates_ajax.php";
    var coll_object;
    var depart_object;
    var student_data = {};
    var user_data = {};
    var teacher_data = {};
    //adding data to colage and depart
    $.getJSON(ajax_url2, {
      call_type: 'get_collages'
    }, function(data) {
      coll_object = data;
    });
    $.getJSON(ajax_url2, {
      call_type: 'get_depart'
    }, function(data) {
      depart_object = data;
    });
//
//search student 
$('#search_student').on('keyup', function(event) {
    event.preventDefault();
    //mgt.js
    seachMembers("#student_table",$('#search_student').val(),'search_student');
  });
//search teacher
$('#search_teacher').on('keyup', function(event) {
    event.preventDefault();
    //mgt.js
    seachMembers("#teacher_table",$('#search_teacher').val(),'search_teacher');
  });

//saerch user
    $('#search_user').on('keyup', function(event) {
      event.preventDefault();
      //mgt.js
      seachMembers("#user_table",$('#search_user').val(),'search_user');
    });
//when  clicking updata student 
  $(document).on('click', '.btn_update_student', function(event) {
    event.preventDefault();
   
    var tbl_row = $(this).closest('tr');
    student_data['id']= $(tbl_row).attr('row_id');
   
   
    tbl_row.find('.row_data_img').each(function(index, val) {
     student_data['img'] = $(this).attr('col_name');
    });

    tbl_row.find('.row_data').each(function(index, val) {
      var col_name = $(this).attr('col_name');
      student_data[col_name] = $(this).text().trim();

    });
    

    student_data['email'] = $(tbl_row).attr('em');
    student_data['address'] = $(tbl_row).attr('ad');
    showStudentDialog(student_data);
    getCollagesIntoSelect(coll_object);
    getDepartsIntoSelect(depart_object);

    $(document).find("#student_department option").each(function() {
      if ($(this).text() == student_data['Department_Name']) {
        $(this).prop('selected', true);
        return false;
      }
    });
    $(document).find("#student_collage option").each(function() {
      if ($(this).text() == student_data['College_Name']) {
        $(this).prop('selected', true);
        return false;
      }
    });

  });
 //btn_update_user
 //when clcking apdate usr
    $(document).on('click', '.btn_update_user', function(event) {
        event.preventDefault();
        // user_img_name = '';
        var tbl_row = $(this).closest('tr');
        user_data['row_id'] = tbl_row.attr('row_id');
        $(tbl_row).find('.row_data_img').each(function(index, val) {
          user_data['img'] = $(this).attr('col_name');
        });

        tbl_row.find('.row_data').each(function(index, val) {
        var col_name = $(this).attr('col_name');
        user_data[col_name] = $(this).text().trim();

        });
        showUserDialog(user_data);
        console.log(user_data);
    });

//update techer btn
$(document).on('click', '.btn_update_teacher', function(event) {
    event.preventDefault();
     
    var tbl_row = $(this).closest('tr');
    teacher_data['id']= tbl_row.attr('row_id');
    
    tbl_row.find('.row_data_img').each(function(index, val) {
        teacher_data['img']  = $(this).attr('col_name');
    });

    tbl_row.find('.row_data').each(function(index, val) {
      let col_name = $(this).attr('col_name');
      teacher_data[col_name] = $(this).text().trim();

    });
     
    showteacherDialog(teacher_data);
    $(document).find("#teacher_gander option").each(function() {
        if ($(this).text() == teacher_data['Gander']) {
          $(this).prop('selected', true);
          return false;
        }
      });
    //pop_update_user
    console.log(teacher_data);
  });

//change depart on change collage
 $("#student_collage").on('change', changeDepartsInSelect(depart_object));

 //save edited student
 $("#student_submit_button").on('click', function(event) {
    event.preventDefault();
    let valid = validateInputs('#student_dialog');
    if (valid) {
      try {
        var formData = new FormData();
        const fileInput = document.getElementById("student_inputfile");
        let file=fileInput.files[0];
        formData.append('file',file);
        formData.append('id',student_data['id']);
        formData.append('fname', $('#student_name').val());
        formData.append('fUnumbere', $('#student_Unumber').val());
        formData.append('fphone', $('#student_phone').val());
        formData.append('coll_dep_id', $('#student_department').val());
        formData.append('fadress', $('#student_address').val());
        formData.append('femail', $('#student_email').val());
        formData.append('fgender', $('#student_gander').val());
        formData.append('call_type', 'update_student_data');
        
        $.post({
          url:update_url,
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
              hideUpdateDialog();
              showsucess();
              
            } else {
              $("#dialog_message").innerHTML = d1.msg;
              showfaild();
            }
          }
        });
       
      } catch (error) {
        $("#dialog_message").innerHTML = error.message;
        showfaild();
      } 
    }

  }); //student script end

//eventlistner for student file
  $(document).on('change', '#student_inputfile', function(event) {
    const file = event.target.files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function(e) {
      //متغير يحتوي الصورة
      //الحدث onload يحدث اثناء العملية الحالية 
      document.getElementById("student_img").setAttribute('src', e.target.result);
    }
  });
//eventlistner for teacher file
  $("#teacher_inputfile").on('change', function(event) {
    const file = event.target.files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function(e) {
      //متغير يحتوي الصورة
      //الحدث onload يحدث اثناء العملية الحالية 
      document.getElementById("teacher_img").setAttribute('src', e.target.result);
    }
  });
//when clicking save techer
  $(document).on('click', '#teacher_submit_button', function(event) {

    let valid = validateInputs('#teacher_dialog');
    if (valid) {
      try {
        event.preventDefault();
        var formData = new FormData();
        var fileinput = document.getElementById("teacher_inputfile");
        let file = fileinput.files[0];
        formData.append('file', file);
        formData.append('id',teacher_data['id'])
        formData.append('fname', $("#teacher_name").val());
        formData.append('fphone', $("#teacher_phone").val());
        formData.append('fadress', $("#teacher_address").val());
        formData.append('femail', $("#teacher_email").val());
        formData.append('fgender', $("#teacher_gander").val());
        formData.append('call_type', 'update_teacher_data');
        $.post({
          url: update_url,
          data: formData,
          processData: false,
          contentType: false,
          success: function(data) {
            // console.log(data);
            var d1 = JSON.parse(data);
            if (d1.status == "error") {
              $("#dialog_message").text(d1.msg);
              showfaild();
            } else if (d1.status == "success") {
              $("#dialog_message").text(d1.msg);
              hideUpdateDialog();
              showsucess();
               
            } else {
              $("#dialog_message").innerHTML = d1.msg;
              showfaild();
            }
          }
        });
     

      } catch (error) {
        console.log(error.message);
      } 
    }
  });
//user input file scripts start
$("#user_inputfile").on('change', function(event) {
    const file = event.target.files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function(e) {
      //متغير يحتوي الصورة
      //الحدث onload يحدث اثناء العملية الحالية 
      document.getElementById("user_img").setAttribute('src', e.target.result);
    }      
});
//save user btn
$(document).on('click', '#user_submit_button',async function(event) {

    event.preventDefault();
    let valid =await validateInputs('#user_dialog');
    if (valid) {
      showLoading();
      var formData = new FormData();
      const fileinput = document.getElementById("user_inputfile");
     let file=fileinput.files[0];
     formData.append('file', file);
     formData.append('id',user_data['row_id']);
      formData.append('fname', $("#user_name").val());
      formData.append('fNameOfUser', $("#NameOfUser").val());
      formData.append('fphone', $("#user_phone").val());
      formData.append('femail', $("#user_email").val());
      formData.append('call_type', 'update_user_data');
      $.post({
        url: update_url,
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
            hideUpdateDialog();
            showsucess();
          } else {
            $("#dialog_message").innerHTML = d1.msg;
            showfaild();
          }
        }
      });

     
    }
  });

//close
$(".close").on('click', function(event) {
   hideUpdateDialog();
  });
//call function to hide the dialoge
  $(".cancel").on('click', function(event) {
    hideUpdateDialog();
  });
//on clicking message buttn
  $('#dialog_button').on('click', hide_dialog);










}) 