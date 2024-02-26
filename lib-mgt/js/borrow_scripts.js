var borrow_data = {};
var book_info = {};
var book_op = '';
var ajax_url = "search_queries/borrow_queries.php";
var ajax_url3 = "ajax/students_ajax.php";
var update_url = "ajax/updates_ajax.php";
var ajax_url2 = "ajax/files_ajax.php";
$(document).ready(function(){

//intial dates values
let date= new Date();
//  let dtf=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate();
// $('#tb_due_date').val(dtf);
// $('#due_date').val(dtf);
$('.cancel-change').on('click',function(){
  $('#U').toggle();
});
// $('#btn-print-repo').on('click',function(){
//   let divprint=$('#mo-repo-container');
//   let printWindow=window.open(",",'left=100,top=0,width=200,height=500,toolbar=0,scrollbars=0,status=0');
//   printWindow.document.write($(divprint).html());
//   printWindow.document.close();
//   printWindow.focus();
//   printWindow.print();
// });


//set index of file type
$('#book_type').prop('selectedIndex',0);
$("#tb_book_type").prop('selectedIndex',0);

//hide dialog
$("#dialog_button").on('click', hide_dialog);
//set on search for student 
//on search for studnt
  $("#search_student").on('keyup', function() {
    let select = $('#student_list');
    if ($(select).css('display') == 'none') {
        $(select).toggle();
    }
    const input = $("#search_student");
    if (($(input).val()).trim().length) {
        fetshStudentData(input.val(), ajax_url, 'getstudent_names', "student"); 
    }
  }); //end search_student
//for search for books for student
$("#search_student_book").on('keyup', function(event) {
  event.preventDefault();
  const input = $('#search_student_book');
  if($('#student_book_list').css('display')=='none'){
      $('#student_book_list').toggle();
  }
  if (($(input).val()).trim().length) {
      if ($("#book_type").val() == "book") {
          fetshBooktData(input.val(),'#student_book_list');
      } else if ($("#book_type").val() == "doc") {
          fetshdoctData(input.val(),'#student_book_list');   
      }
  }
});
///end search for books for student

//set on change file type
$('#book_type').on('change', function() {
  const input = $('#search_student_book');
  if (($(input).val()).trim().length) {
    if ($("#book_type").val() == "book") {
        fetshBooktData(input.val(),'#student_book_list');
    } else if ($("#book_type").val() == "doc") {
        fetshdoctData(input.val(),'#student_book_list');   
    }
}
});
//whene choesieng student from list
 $(document).on('click', '.student_option', function(event) {
  event.preventDefault();
  let val = $(this).attr('val');
  // console.log(val);
  if (val.length) {
      $("#search_student").val($(this).text());
      // console.log("sdddddddddddddd");
      borrow_data['id'] = $(this).attr('val');
      $("#p_student_name").text($(this).text());
      $("#student_img").attr('src', "../profiles/" + $(this).attr("pic"));
      const st = $(this).attr("status");
      $("#student_accont_status").text(st == 1 ? "نشط" : "غير نشط");
      $('#student_list').toggle();
  } else {
      $("#search_student").focus();
  }
})//end choesieng student from list

//when select book for student
 $(document).on('click', '.book_option', function(event) {
  let val = $(this).attr('val');
  if (val.length) {
      book_op = $(this);
      // console.log(book_op);
      $("#search_student_book").val(($(this).text()));
      $("#student_BookName").text($(this).text());
      const st = $(this).attr("status");
      $("#BAcDc").text(st === 1 ? "متوفر" : "غير متاح");
      const pic = $(this).attr("pic");
      if (pic.length) {
          $("#student_book_img").attr('src', "../books_imgs/" + pic);
      } else {
          getPdfImg($(this).attr("pdf"), "student");
      }
      $('#student_book_list').toggle();
  }
});//end select book for student

//whene chose file for student
$('#btn_add_selecte_student_book').on('click', function(event) {
  event.preventDefault();
  if (book_op.length) {
      $("#student_selected_book_menu").append(book_op);
      book_op = '';
  }
});//end choese file for student


//whene add trans clicking for student
$("#btn_borrow_student").on("click", function (event) {
  event.preventDefault();
  if (borrow_data["id"] == undefined || borrow_data["id"] < 1) {
    return;
  }
  showLoading();
  var books = [];
  var docs = [];
  var items = $("#student_selected_book_menu").find("li");
  // let t_name=$('#p_student_name').text();
  if (
    borrow_data["id"] === undefined ||
    borrow_data["id"].length < 1 ||
    items === undefined ||
    items.length < 1
  ) {
    $("#dialog_message").text("خطأ");
    showfaild();
    return;
  }
  items.each(function (index, value) {
    const tp = $(this).attr("tp");
    // alert(tp);
    if (tp == "book") {
      books.push($(this).attr("val"));
    } else if (tp == "doc") {
      docs.push($(this).attr("val"));
    }
  });
  var data_obj = {
    trans_id: 2,
    account_id: borrow_data["id"],
    due_date: $("#due_date").val(),
    books: books,
    docs: docs,
    call_type: "add_trans",
  };
  $.post(ajax_url, data_obj, function (data) {
    var d1 = JSON.parse(data);
    if (d1.status == "success") {
      $("#dialog_message").text(d1.msg);
     // showsucess();
      $("#student_selected_book_menu").html("");
      let t_id=d1.trans_id;
      showsucess();
    //  let items= $("#teacher_selected_book_menu").find('li');
    setTimeout(()=>{
      hide_dialog();
      $('#U').toggle();
      $('#repo-op-no').text(t_id);
      $('#repo-person').text($('#p_student_name').text());
      $('#repo-date').text( $('#due_date').val());
      $('#b-repo-ul').html(items);
     
    },100);
      //
      book_op = "";
    } else {
      $("#dialog_message").text(d1.msg);
      showfaild();
    }
  });
});//end add trans clicking for student



///teacher_scripts start

//search teacher name
$("#search_teacher").on('input', function(event) {
  event.preventDefault();
  // const select = $('#teacher_list');
  if ($('#teacher_list').css('display') === 'none') {
      $('#teacher_list').toggle();
  }
  if(event.keyCode!=8){
  let input = $("#search_teacher");
  if (($(input).val()).trim().length) {
    fetshteachertData($(input).val(), ajax_url, 'getteacher_names');
  } else {
      $(input).focus();
      return;
  }
}
});//end search teacher name

//search teacher book
$("#search_teacher_book").on('input', function() {
  const input = $('#search_teacher_book');
  // const select = $('#teacher_book_list');
  if($('#teacher_book_list').css('display')=='none'){
    $('#teacher_book_list').toggle();
  }
  if (($(input).val()).trim().length) {
      if ($("#tb_book_type").val() == "book") {
        fetshBooktData(input.val(),'#teacher_book_list');
      } else if ($("#tb_book_type").val() == "doc") {
          fetshdoctData(input.val(),'#teacher_book_list');
      }
  }
});//end search teacher book

//on change file type
$("#tb_book_type").on('change',function(){
  let text=$("#search_teacher_book").val();
  if(text.trim().length){
  if ($("#tb_book_type").val() == "book") {
    fetshBooktData(text,'#teacher_book_list');
  } else if ($("#tb_book_type").val() == "doc") {
      fetshdoctData(text,'#teacher_book_list');
  }}
})

//click  teacher book
$(document).on('click','#teacher_book_list .book_option',function(event) {
  // let ul=$(this).closest('ul');
  book_op = '';
  const val = $(this).attr('val');
  console.log($(this).attr('val'));
  if (val) { 
      // book_info['id'] = $(this).attr('val');
      book_op=$(this);
      console.log(book_op);
      // console.log(book_info['id'])
      $("#search_teacher_book").val(($(this).text()));
      // book_info['b_name'] = $(this).text();
      $("#teacher_BookName").text($(this).text());
   
      const st = $(this).attr("status");
      $("#teacher_book_status").text(st == 1 ? "متوفر" : "غير متاح");
      const pic = $(this).attr("pic");
      if (pic.length) {
          $("#teacher_book_img").attr('src', "../books_imgs/" + pic);
      } else {
          getPdfImg($(this).attr("pdf"), "teacher");
      }
       $('#teacher_book_list').toggle();
  }
  // $(document).find("#teacher_book_list").toggle();
  // $('#student_book_list').toggle();
});//click  teacher book


//  select teacher dd
    $(document).on('click', '.teacher_option', function(event) {
      event.preventDefault();
      console.log($(this));
      let val = $(this).attr('val');
      if (val.length) {
          // console.log('#student_list');
          borrow_data['id'] = $(this).attr('val');
          $("#search_teacher").val($(this).text());
          $("#p_teacher_name").text($(this).text());
          $("#teacher_img").attr('src', "../profiles/" + $(this).attr("pic"));
          // console.log(option.attr("pic"));
          const st = $(this).attr("status");
          $("#teacher_accont_status").text(st == 1 ? "نشط" : "غير نشط");
          $('#teacher_list').toggle();
      }

  });// end  select teacher dd


 //add teacher selected book
 $('#btn_add_selecte_teacher_book').on('click', function(event) {
  event.preventDefault();
  console.log(book_op);
  if (book_op!='') {
      $("#teacher_selected_book_menu").append(book_op);
      book_op = '';
  } else {
      $("#search_teacher_book").focus();
      return;
  }
});//end teacher selected book



 //borrow teacher
  $('#btn_borrow_teacher').on('click', function(event) {
    event.preventDefault();
    let t_name= $("#p_teacher_name").text();
    let t_notice=$('#tb_notice').text();
    showLoading();
    var books = [];
    var docs = [];
    var items = $("#teacher_selected_book_menu").find('li');
    if (borrow_data['id'] === undefined || borrow_data['id'].length < 1 || items === undefined || items.length < 1) {
        $("#dialog_message").text('خطأ');
        showfaild();
      return;
    }
    items.each(function(index, value) {

        let tp = $(this).attr('tp');
        // alert(tp);
        if (tp == 'book') {
            books.push($(this).attr('val'));
        } else if (tp == 'doc') {
            docs.push($(this).attr('val'));
        }
    })
    var data_obj = {
        trans_id:1,
        account_id: borrow_data['id'],
        due_date: $('#tb_due_date').val(),
        books: books,
        docs: docs,
        call_type: 'add_trans'
    };
    // console.log(data_obj);
    $.post(ajax_url, data_obj, function(data) {
        var d1 = JSON.parse(data);
        if (d1.status == 'success') {
           
            $("#dialog_message").text(d1.msg);
            let t_id=d1.trans_id;
            showsucess();
          //  let items= $("#teacher_selected_book_menu").find('li');
          setTimeout(()=>{

            $('#U').toggle();
            $('#repo-op-no').text(t_id);
            $('#repo-person').text(t_name);
            $('#repo-date').text( $('#tb_due_date').val());
            $('#b-repo-ul').html(items);
           
          },100);
          $("#teacher_selected_book_menu").html('');
            $('#student_book_list').html('');

        } else {
            //echo error
            $("#dialog_message").text(d1.msg);
            showfaild();
        }
    });


});// end borrow teacher








});

//function to fetch student data
function fetshStudentData(sarch_text,ajax_url,call_type){
   let data_object={
    call_type: call_type,
    text_to_search:sarch_text
}
$.post(ajax_url , data_object, function(data) {
  var opt = '';
  if(data!=''){ 
    let d1=JSON.parse(data);
    $.each(d1, function(index, val) {
        opt += '<li class="student_option" val="' + val['Account_ID'] + '" pic="'+ val['Photo']+'"  status="'+val['Status']+'" >' + val['Student_Name'] + '</li>';
    
    });}
    if(opt===''){
      opt+=' <li class="student_option"  val="">لا يوجد</li>';
    }
    $(document).find('#student_list').html(opt);
});
  
}
//function to fetch book data into menu
function fetshBooktData(sarch_text, el_id) {
 let data_object = {
    call_type:'getbook_names',
    text_to_search: sarch_text
  }
  $.post('search_queries/borrow_queries.php', data_object, function (data) {
    
      let opt = '';
      if (data != '') {
      let d1=JSON.parse(data);
      $.each(d1, function (index, val) {

        opt += '<li tp="book" class="book_option" val="' + val['Book_ID'] + '" pic="' + val['Photo'] + '" pdf="' + val['FileName'] + '"   status="' + val['status'] + '">' + val['Book_Title'] + '</li>';

      });
      }
      if (opt === '') {
        opt += ' <li val="">لا يوجد</li>';
      }
      $(document).find(el_id).html(opt);
      // console.log("after fetch" + Date.now())
    
  });
  // console.log("insid" + Date.now());

}//
//fetch docs data for student
function fetshdoctData(sarch_text, el_id){
  let data_object = {
    call_type: 'getdoc_names',
    text_to_search: sarch_text
  }
  $.post('search_queries/borrow_queries.php', data_object, function (data) {
    let opt = '';
    if(data!=''){
      let d1=JSON.parse(data);

$.each(d1, function(index, val) {
  opt += '<li tp="doc" class="book_option" val="' + val['Document_ID'] + '" pic="'+ val['Photo']+'" pdf="'+ val['FileName']+'"   status="'+val['status']+'">' + val['Document_Title'] + '</li>';
});}
else{
opt+=' <li val="">لا يوجد</li>';
}
$(document).find(el_id).html(opt);
  });

}//

//function to fetch teacher data
function fetshteachertData(sarch_text, ajax_url, call_type) {
  let data_object = {
    call_type: call_type,
    text_to_search: sarch_text
  }
  $.post(ajax_url, data_object, function (data) {
    var opt = '';
    if (data != '') {
      let d1=JSON.parse(data);
      $.each(d1, function (index, val) {

        opt += '<li class="teacher_option" val="' + val['Account_ID'] + '" pic="' + val['Photo'] + '"   status="' + val['Status'] + '"  >' + val['Teacher_Name'] + '</li>';

      });
    }
    else {
      opt += ' <li val="">لا يوجد</li>';
    }
    $(document).find('#teacher_list').html(opt);

  });
}
//function to set 
// function getTrnasId(ajax_url){
//     $.getJSON(ajax_url, {
//         call_type: 'gettrans_id'
//       }, function(data) {
//         return data['id'];
//       });
// }
//function- to show pdf img
function getPdfImg(filename,tb){
  let img;
  if (tb == "teacher") {
    img = document.getElementById("teacher_book_img");
  } else if (tb == "student") {
    img = document.getElementById("student_book_img");
  }
    const file_path="../books/"+filename;
    var pdfjsLib = window['pdfjs-dist/build/pdf'];
    pdfjsLib.getDocument(file_path).promise.then(function(pdf) {
      return pdf.getPage(1);
    }).then(function(page) {
      // Get the cover photo of the PDF file as a data URL
      // return page.getViewport({ scale: 1 });
      const canvas = document.createElement('canvas');
      const canvasContext = canvas.getContext('2d');
      const viewport = page.getViewport({
        scale: 1
      });
      canvas.width = viewport.width;
      canvas.height = viewport.height;
      return page.render({
        canvasContext,
        viewport
      }).promise.then(function() {
        return canvas.toDataURL('image/jpeg', 0.8);
      });

    }).then(function(coverPhotoDataUrl) {
      // Set the cover photo as the source of the img tag
      img.setAttribute('src', coverPhotoDataUrl);
    });
}//end of shw pdf mg function
//
//
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