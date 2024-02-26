//this file provides some js function for lib-mgt section

//functio t o search members from database
function seachMembers(el_id,text,call_type){
    
    if (text.trim() === "" || text === null) {
        $(document).find('input').focus();
        return;
      } else {
        let ajax_url=call_type+'.php';
        $.ajax({
          type: "POST",
          url:'search_queries/'+ ajax_url,
          data: {
            'text_to_search': text,
            call_type:call_type,
          },
          success: function(data) {
            $(el_id).html(data);
            showMembersImags(el_id);

          }
        });
      }

}//function end

//function to show imags for persons returnd from db
function showMembersImags(el_id){
    let element=$(el_id);
    let divs=$(element).find('.row_data_img');
    $(divs).each(function(){
        let img_name=$(this).attr('col_name');
        if(img_name.length){
            $(this).find('img').attr('src','../profiles/'+img_name);
        }else{
            $(this).find('img').attr('src','../profiles/avatar.jpg');
        }
    });
}//end function
//function to delete records from db
async function deleteRecord(element,row_id,call_type){
    let confirmed = confirm("هل ان متاكد من الحذف حقاً؟");
    if (confirmed) {
      let res = await $.ajax({
        url: "ajax/delete-record.php",
        type: "POST",
        data: { row_id: row_id, call_type, call_type },
      });
      if (res != null) {
        let d1 = JSON.parse(res);
        if (d1.status == "success") {
          $(element).closest("tr").hide();
          alert(d1.msg);
        } else {
          alert(d1.msg);
        }
      }
    } 
}
//delete student
$(document).on('click','.btn_delete_student',function(event){
    event.preventDefault();
    let element=$(this);
    deleteRecord(element,$(element).attr('row_id'),'student_record');
});
//dlet teacher
$(document).on('click','.btn_delete_teacher',function(event){
    event.preventDefault();
    let element=$(this);
    deleteRecord(element,$(element).attr('row_id'),'teacher_record');
});
//delet user
$(document).on('click','.btn_delete_user',function(event){
    event.preventDefault();
    let element=$(this);
    deleteRecord(element,$(element).attr('row_id'),'librarian_record');
});
//delete book
$(document).on('click','.btn_delete_book',function(event){
    event.preventDefault();
    let element=$(this);
    deleteRecord(element,$(element).attr('row_id'),'book_record');
});
//delete doc
$(document).on('click','.btn_delete_doc',function(event){
    event.preventDefault();
    let element=$(this);
    deleteRecord(element,$(element).attr('row_id'),'doc_record');
});


// function
//function to seach and set cats for book in add book
function seachCats(el_id){
 $.ajax({url:'ajax/files_ajax.php',type:'GET',data:{call_type: 'get_category'},success:function(data){
  let d1= JSON.parse(data);
  let opt='';
  
  opt += '<option value=""> اختر... </option>'
  $.each(d1, function(index,val) {
    opt += '<option value="' + val['Category_ID'] + '" >' + val['Category_Name'] + '</option>';
  });
  $(el_id).html(opt);
  $(el_id).prop('selectedIndex',0);
  //  document.getElementById('book_category').selectedIndex = 0;
 }});
}//end function

// function
//function to seach and set collages for book in add book,collages pags
function seachCollages(el_id){
  $.ajax({url:'ajax/files_ajax.php',type:'GET',data:{call_type: 'get_collages'},success:function(data){
   let opt='';
   let d1= JSON.parse(data);
   opt += '<option value=""> اختر... </option>'
   $.each(d1, function(index, val) {
     opt += '<option value="' + val['College_ID'] + '" >' + val['College_Name'] + '</option>';
   });
   $(el_id).html(opt);
   $(el_id).prop('selectedIndex',0);
   //  document.getElementById('book_category').selectedIndex = 0;
  }});
 }//end function
 