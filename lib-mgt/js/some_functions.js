//i used thi file to provide som js functions for reuse
//used in serch_susribers/files

 function checkValidText(text){
   text=text.trim();
   return text;
 }

//get collages
function getCollagesIntoSelect(coll_object) {
    var opt = '';
    opt += '<option value=""> اختر... </option>'
    $.each(coll_object, function(index, val) {
      opt += '<option value="' + val['College_ID'] + '" >' + val['College_Name'] + '</option>';
    });

    $(document).find('#student_collage').html(opt);
   // document.getElementById('student_collage').selectedIndex = 0;

  };
  //get departs
  function getDepartsIntoSelect(depart_object){
    var opt = '';
    opt += '<option value=""> اختر... </option>'
    $.each(depart_object, function(index, val) {
    
        opt += '<option value="' + val['ColDep_ID'] + '" >' + val['Department_Name'] + '</option>';
    
    });
    $(document).find('#student_department').html(opt);

  }
  //get collage departs
  function changeDepartsInSelect(depart_object){
    var selectedcollage = document.getElementById('student_collage').value;
    var opt = '';
    opt += '<option value=""> اختر... </option>'
    $.each(depart_object, function(index, val) {
      if (val['College_ID'] == selectedcollage) {
        opt += '<option value="' + val['ColDep_ID'] + '" >' + val['Department_Name'] + '</option>';
      }
    });
    $(document).find('#student_department').html(opt);
    document.getElementById('student_department').selectedIndex = 0;
  }
  //function to get departs into selectbook dialog
  function getCategoris(cat_data_obj){
   var opt = '<option value=""> اختر... </option>'
    $.each(cat_data_obj, function(index, val) {
      opt += '<option value="' + val['Category_ID'] + '" >' + val['Category_Name'] + '</option>';});
      $(document).find('#book_category').html(opt);
  }
  // function to get collages into docselect dialog
  function getCollages(col_data_obj){
   var opt2 = '<option value=""> اختر... </option>'
    $.each(col_data_obj, function(index, val) {
      opt2 += '<option value="' + val['College_ID'] + '" >' + val['College_Name'] + '</option>';});
      $(document).find('#doc_collage').html(opt2);
  } 
 //function to show student data
 function showStudentDialog(data){
  document.getElementById('overlay_div').style.display = "block";
  document.getElementById('student_dialog').style.display = "block";
  document.getElementById("student_name").value=data['Student_Name'];
  document.getElementById("student_phone").value=data['PhoneNamber'];
  document.getElementById("student_Unumber").value=data['University_Number'];
  document.getElementById("student_img").setAttribute('src',"../profiles/"+data['img']);
  document.getElementById("student_address").value=data['address'];
  document.getElementById("student_email").value=data['email'];


}

//function to show user data
function showUserDialog(data){
  document.getElementById('overlay_div').style.display = "block";
  document.getElementById('user_dialog').style.display = "block";
  document.getElementById("user_name").value=data['UserName'];
  document.getElementById("user_phone").value=data['ContactNo'];
  document.getElementById("user_img").setAttribute('src',"../profiles/"+data['img']);
  document.getElementById("user_email").value=data['Email'];
  document.getElementById("NameOfUser").value=data['row_id'];
}

//show teacher dailoge
function showteacherDialog(data){
  document.getElementById('overlay_div').style.display = "block";
  document.getElementById('teacher_dialog').style.display = "block";
  document.getElementById("teacher_name").value=data['Teacher_Name'];
  document.getElementById("teacher_phone").value=data['PhoneNamber'];
  document.getElementById("teacher_img").setAttribute('src',"../profiles/"+data['img']);
  // document.getElementById("teacher_inputfile").value=data["img"];
  document.getElementById("teacher_email").value=data['Email'];
  // document.getElementById("teacher_gander").value=data['Gander'];
 document.getElementById("teacher_address").value=data['Address'];

  
}

//function to hide update dialog
function hideUpdateDialog(){
  document.getElementById('overlay_div').style.display = "none";
  document.getElementById('student_dialog').style.display = "none";
  document.getElementById('user_dialog').style.display = "none";
  document.getElementById('teacher_dialog').style.display = "none";
}
//function to hide book dialog
function hideUpdaeFileDialog(){
  document.getElementById('overlay_div').style.display = "none";
  document.getElementById('book_dialog').style.display = "none";
  document.getElementById('doc_dialog').style.display = "none";
}
//function  to show book dialog 
function showBookDialog(data){
  document.getElementById('overlay_div').style.display = "block";
  document.getElementById('book_dialog').style.display = "block";

  document.getElementById("book_title").value=data['Book_Title'];
  document.getElementById("book_author").value=data['Author'];
  document.getElementById("book_subject").value=data['Subject'];
  //three
  document.getElementById("book_publisher").value=data['Publisher'];
  document.getElementById('book_pages').value=data['Pages'];
  document.getElementById("publish_date").value=data['Publishing_Date'];
  document.getElementById("book_locker_no").value=data['Locker_No'];
  document.getElementById("book_copies").value=data['numberOfcopis'];
  $(document).find("#book_status").each(function() {
    if ($(this).text() == data['status']) {
      $(this).prop('selected', true);
      return false;
    }
  });
  // document.getElementById("book_status").value=data['status'];
  var img=document.getElementById("book_cover_img");//.setAttribute('src',"img/avatar.jpg");
  try{
  var pic=data['img'];
  if(pic==null ||pic.length<1){
    const file_path="../books/"+data['filename'];
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
  }else{
    img.setAttribute('src', "../books_imgs/"+pic);
  }

  }catch(error){
    console.log("eror ocur");
  }

}
//show update document function
function showdocDialog(data){
  console.log(data);
  document.getElementById('overlay_div').style.display = "block";
  document.getElementById('doc_dialog').style.display = "block";
  $("#doc_title").val(data['Document_Title']);
  $("#doc_subject").val(data['Subject']);
  $("#doc_author").val(data['Author']);
  // $('#doc_collage').val(data[''])publish_date
  $('#doc_pages').val(data['Pages']);
  $("#doc_publishing_year").val(data['PublishingYear']);
  $("#doc_number_copies").val(data['NumberOfCopies']);
  $("#doc_locker_no").val(data['Locker_No']);
  $(document).find("#doc_status").each(function() {
    if ($(this).text() == data['status']) {
      $(this).prop('selected', true);
      return false;
    }
  });
  var img=document.getElementById("doc_cover_img");//.setAttribute('src',"img/avatar.jpg");
  try{
  var pic=data['img'];
  if(pic==null ||pic.length<1){
    const file_path="../books/"+data['pdf'];
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
  }else{
    img.setAttribute('src', "../books_imgs/"+pic);
  }

  }catch(error){
    console.log("eror ocur");
  }

}
