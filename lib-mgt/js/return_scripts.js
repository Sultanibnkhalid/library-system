var student_data;
var book_data ;
var doc_data ;
var borrow_data;
var borro_details;
var book_id ;
var account_id;

//function search for borrowed mebers
function searchMember(sarch_text,call_type,t_type){
    // console.log("from sarch function");
// var data_obj;
   var data_object={
      call_type: call_type,
      text_to_search:sarch_text
}
$.post('search_queries/return_queries.php' , data_object, function(data) {
    var opt='';  
    if(data!=""){
      //check member type is student
        if(t_type==="student"){
            d1=JSON.parse(data);
            $.each(d1, function(index, val) {
              opt += '<li class="member_option" val="' + val['Transaction_ID'] + '" ac="'+ val['Account_ID']+'" >' + val['Student_Name'] + '</li>';
            });
        }
      //check member type is teacher

         if(t_type==="teacher"){
         
            d1 =JSON.parse(data);
            $.each(d1, function(index, val) {
              opt += '<li class="member_option" val="' + val['Transaction_ID'] + '" ac="'+ val['Account_ID']+'" >' + val['Teacher_Name'] + '</li>';
            });
        }
    }else{
      opt+=' <li val="">لا يوجد</li>';
    }
    $(document).find('#member_list').html(opt);
  });
}///function search for borrowed mebers end


///search for files the fils
function searchFiles(trans_id,call_type,t_type){
  showLoading();
 // console.log("from sarch function");
// var data_obj;
    var data_object={
        call_type: call_type,
        trans_id:trans_id,
        // member_id:member_id
    }
$.post('search_queries/return_queries.php', data_object, function(data) {  
  var opt='';
    if(data!=""){
        if(t_type=="book"){
          book_data=JSON.parse(data);
            d1 =JSON.parse(data);   
            $.each(d1, function(index, val) {

                opt += '<li class="book_option" dt="' + val['Borrow_Date'] + '" pic="'+ val['Photo']+'" pdf="'+ val['FileName']+'" >' + val['Book_Title'] + '</li>';
              
              });
        }    
        else if(t_type=="doc"){
          doc_data=JSON.parse(data);
          d1 =JSON.parse(data); 
          $.each(d1, function(index, val) {
   
            opt += '<li class="book_option" dt="' + val['Borrow_Date'] + '" pic="'+ val['Photo']+'" pdf="'+ val['FileName']+'"   >' + val['Document_Title'] + '</li>';
          });

        }
    }else{
      
        opt+=' <li dt="">لا يوجد</li>';
        
    }
    $(document).find('#book_list').html(opt);
    hide_dialog(); 
});

}//get borrowed files end


 //function to show returned files  


function  showRetunedFiles(){
 
  try{
  var opt = '<li style="color:blue;">  تم ارجاع الملفات :</li>';
   $.each(doc_data, function(index, val) {
     opt += '<li class="book_option" dt="' + val['Borrow_Date'] + '" pic="'+ val['Photo']+'" pdf="'+ val['FileName']+'"   ><div style="color:#0f0">&#10003</div>' + val['Document_Title'] + ':وثيقة  </li>';
   });
   //append books
   $.each(book_data, function(index, val) {
    opt += '<li class="book_option" dt="' + val['Borrow_Date'] + '" pic="'+ val['Photo']+'" pdf="'+ val['FileName']+'" ><div style="color:#0f0">&#10003</div>' + val['Book_Title'] + ':كتاب</li>';
  });
  $('#rturned_book_list').html(opt);
  $('#b-repo-ul').html(opt);
  }catch(error){

    console.log(error.message);
  }
}
//functin to get bok img
   function getPdfImg(filename){
    const file_path="../books/"+filename;
    // const img=document.getElementById("book_img");
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
      // img.setAttribute('src', coverPhotoDataUrl);
      $("#book_img").attr('src',coverPhotoDataUrl);
    });
  }
















