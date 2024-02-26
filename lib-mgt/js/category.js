$(document).ready(function(){
var ajax_url='ajax/autherintereis.php';
// var ajax_url3=
 //hide the message
 $("#dialog_button").on('click', hide_dialog);

 //whene clicking add category
     $('#btn_add_cat').on('click', function(event) {
       if (($('#cat_name').val()).trim().length) {
         showLoading();
         $.post(ajax_url, {
           cat_name:$('#cat_name').val(),
           call_type: 'add_cat'
         }, function(data) {
           var d1 = JSON.parse(data);
           if (d1.status == 'success') {
             //consol.succss
             $("#dialog_message").text(d1.msg);
             showsucess();
             $('#cat_name').val("");
 
           } else {
             //echo error
             $("#dialog_message").text(d1.msg);
             showfaild();
           }
         })
       } else {
         $("#dialog_message").text('خطأ');
         showfaild();
         $('#cat_name').focus();
       }
 
     });

 //on click second tab
     $('#nav-an-tab').on('click', function() {
       showLoading();
       getcol_dep_cat_names(ajax_url3);
       hide_dialog();
     });
//whene select collage
     $('#col_select').on('change', function(event) {
       event.preventDefault();
       changeDepart();
     });
 
 //btn connect cat with collages and departtment
   $('#add_con_cat').on('click', function(event) {
     event.preventDefault();
     if($('#col_select').val()==''){
      return;
     }
     if($('#cat_select').val()==''){
      return;
     }
     if($('#depart_select').val()==''){
      return;
     }
     console.log($('#depart_select').val());
     console.log($('#cat_select').val());

    //  console.log($('#depart_select').val());
   if (($('#depart_select').val())!="") {
         showLoading();
         data_obj = {
           col_dep_id: $('#depart_select').val(),
           cat_id: $('#cat_select').val(),
           call_type: 'connect_cat',
         };
         $.post('ajax/autherintereis.php',data_obj,function(data){
           var d1 = JSON.parse(data);
           if (d1.status == 'success') {
             //consol.succss
             $("#dialog_message").text(d1.msg);
             showsucess();
             $('#cat_name').val("");
 
           } else {
             //echo error
             $("#dialog_message").text(d1.msg);
             showfaild();
           }
         });       
       }else {
         $("#dialog_message").text('خطأ');
         showfaild();
         // $('#cat_name').focus();
       }
     });

///function on searching colage
    $('#serch-cat').on('keyup', function(event) {
        try{
        event.preventDefault();
        $.post('search_queries/category-query.php', {
        call_type: 'search_category',
        cat_name: $(this).val().trim(),
        }, function(data) {
        $('#cat-table').html(data);
        // console.log('ss');
        });
    }catch(error){
        console.log(error.stack);
    }
    });
///whene clicking delete category
    $(document).on('click','.btn_delete_cat', function() {
        try{
            let row=$(this).closest('tr');
        let row_id=$(row).attr('row_id');
        console.log(row_id);
        let conf=confirm('هل تريد الحذف حقا');
        if(conf){
        $.post('ajax/delete-record.php', {
        call_type: 'cat_record',
        row_id:row_id,
        }, function(data) {
        //   $('#dep-table').html(data);
        alert('done');
        //notification
        //add notification
        $(row).hide();
        // console.log('ss');
        });
        }
        }catch(error){
        console.log(error.stack);
    }
    });
    
 /// when clicking edit collage
    $(document).on('click','.btn_update_cat', function() {
        //edit_type="click"
            let row=$(this).closest('tr');
            let row_id=$(row).attr('row_id');
            $(row).find('.btn_delete_cat').hide();
            $(row).find('.btn_cat_con').hide();
            $(row).find('.btn_save_cat').show();
            $(row).find('.btn_cancel_cat').show();
            $(row).find('.row-data')
            .attr('contenteditable', 'true')
            .attr('edit_type', 'button')
            .addClass('bg-warning')
            .css('padding','3px');
            $(this).hide();
        });
 
 //whene clicking cancel 
    $(document).on('click','.btn_cancel_cat', function() {
        //edit_type="click"
        let row=$(this).closest('tr');
        let row_id=$(row).attr('row_id');
        $(row).find('.btn_delete_cat').show();
        $(row).find('.btn_update_cat').show();
        $(row).find('.btn_cat_con').show();
        $(row).find('.btn_save_cat').hide();
        $(row).find('.btn_cancel_cat').hide();
        $(row).find('.row-data')
        .attr('contenteditable', 'false')
        .attr('edit_type', 'click')
        .removeClass('bg-warning')
        .css('padding','');
        $(this).hide();
        });
 
 ///whene clicking save category
    $(document).on('click','.btn_save_cat', function() {
        try{
        let row=$(this).closest('tr');
        let row_id=$(row).attr('row_id');
        let row_data=$(row).find('.row-data').text();
        if(row_data.length<5){
            return;
            //add message
        }
        console.log(row_id);
        $.post('ajax/autherintereis.php', {
        call_type: 'edit_cat',
        row_id:row_id,
        cat_name:row_data,
        }, function(data) {
            let d1=JSON.parse(data);
            if(d1.status=='success'){
                $(row).find('.btn_cancel_cat').click();
                alert('done');
            }else{
                console.log(data);
            }
        });
        }catch(error){
        console.log(error.stack);
    }
    });
 
////whene clicking category connectios
//whene clicking collage departs
    $(document).on('click','.btn_cat_con', function() {
        try{
        let row_id=$(this).closest('tr').attr('row_id');
        console.log(row_id);
        $.post('search_queries/category-query.php', {
        call_type: 'search_cat_connection',
        row_id:row_id,
        }, function(data) {
        $('#cat-con-table').html(data);
        // console.log('ss');

        });
    }catch(error){
        console.log(error.stack);
    }
    });

/// whene clicking delete connection
    $(document).on('click','.btn_delete_cat_con', function() {
        try{
            let row=$(this).closest('tr');
        let row_id=$(row).attr('row_id');
        let cat_id=$(row).attr('cat_id');
        console.log(row_id);
        let conf=confirm('هل تريد الحذف حقا');
        if(conf){
        $.post('ajax/delete-record.php', {
        call_type: 'cat_con_record',
        row_id:row_id,
        cat_id:row_id,
        }, function(data) {
        //   $('#dep-table').html(data);
        alert('done');
        //add notification
        $(row).hide();
        // console.log('ss');
        });
        }
        }catch(error){
        console.log(error.stack);
    }
    });


})