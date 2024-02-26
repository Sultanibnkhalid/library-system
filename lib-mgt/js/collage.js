$(document).ready(function(){
  ///hied dalog
  $("#dialog_button").on('click', hide_dialog);
//get collages from fnction in mgt-js file 
    $(document).ready(function() {
      seachCollages('#col-select');
    })
  //add deprat
    $('#add_depart').on('click', function(event) {
        event.preventDefault();
    
        if (($('#depart_name').val()).trim().length) {
          // showLoading();
          var opt = '<li>' + $('#depart_name').val() + '</li>';
          $('#depart_list').append(opt);
          $('#depart_name').val('');
        } else {
          $("#dialog_message").text('خطأ');
          showfaild();
          $('#depart_name').focus();
        }
    
      });
      $('#col-select').on('change', function() {
        // let  col_txt=$(this).find('option:selected').text()
        // $('#col_name').prop('disable',true);
        let val=$(this).find('option:selected').val();
        if(val){
          $('#col_name').val($(this).find('option:selected').text());
        }else{
          $('#col_name').val('');

        }
      })
//on naming colage
$('#col_name').on('input',function(){
  $("#col_select").prop('selectedIndex', 0);
})

  //add collage with departs
      $('#add_col').on('click', function(event) {
    
        event.preventDefault();
        var departs = [];
        showLoading();
        if (($('#col_name').val()).trim().length > 5) {
          // showLoading();
          const deps = $('#depart_list').find('li');
          if (deps.length) {
            deps.each(function(index, value) {
              departs.push($(this).text());
            })
          }
          let col_select = $('#col-select');
          let col_val = $(col_select).find('option:selected').val();
          let col_txt = $(col_select).find('option:selected').text();
          if(col_txt!=$('#col_name').val()){
            col_val='';
          }
          $.post('ajax/autherintereis.php', {
            col_val: col_val,
            col_name: $('#col_name').val(),
            departs: departs,
            call_type: 'add_col_and_dep'
          }, function(data) {
            var d1 = JSON.parse(data);
            if (d1.status == 'success') {
              //consol.succss
              $("#dialog_message").text(d1.msg);
              showsucess();
              $('#cat_name').val("");
              $('#depart_list').html('');
              $(col_select).prop('selectedIndex', 0);
    
            } else {
              //echo error
              $("#dialog_message").text(d1.msg);
              showfaild();
            }
          })
        } else {
          $("#dialog_message").text('خطأ');
          showfaild();
          $('#col_name').focus();
        }
    
      });
    
    
///function on searching colage
      $('#serch-collage').on('keyup', function(event) {
        try{
        event.preventDefault();
        $.post('search_queries/collage-query.php', {
          call_type: 'search_colage',
          col_name: $(this).val().trim(),
        }, function(data) {
          $('#col-table').html(data);
          // console.log('ss');
        });
      }catch(error){
        console.log(error.stack);
      }
      });
//whene clicking collage departs
      $(document).on('click','.btn_col_dep', function() {
        try{
         let row_id=$(this).closest('tr').attr('row_id');
         console.log(row_id);
        $.post('search_queries/collage-query.php', {
          call_type: 'search_collages_dep',
          row_id:row_id,
        }, function(data) {
          $('#dep-table').html(data);
          // console.log('ss');

        });
      }catch(error){
        console.log(error.stack);
      }
      });
///whene clicking delete collage
   $(document).on('click','.btn_delete_col', function() {
    try{
        let row=$(this).closest('tr');
     let row_id=$(row).attr('row_id');
     console.log(row_id);
     let conf=confirm('هل تريد الحذف حقا');
     if(conf){
    $.post('ajax/delete-record.php', {
      call_type: 'collage_record',
      row_id:row_id,
    }, function(data) {
    //   $('#dep-table').html(data);
    let d1=JSON.parse(data);
    if(d1.status=='success')
    {
      alert(d1.msg);
      //add notification
      $(row).hide();
    }else{
      alert(d1.msg);
    }
    
      // console.log('ss');
    });
    }
    }catch(error){
    console.log(error.stack);
   }
   });
/// when clicking edit collage
    $(document).on('click','.btn_update_col', function() {
    //edit_type="click"
        let row=$(this).closest('tr');
        let row_id=$(row).attr('row_id');
        $(row).find('.btn_delete_col').hide();
        $(row).find('.btn_col_dep').hide();
        $(row).find('.btn_save_col').show();
        $(row).find('.btn_cancel_col').show();
        $(row).find('.row-data')
        .attr('contenteditable', 'true')
        .attr('edit_type', 'button')
        .addClass('bg-warning')
        .css('padding','3px');
        $(this).hide();
    });
 //whene clicking cancel colage
   $(document).on('click','.btn_cancel_col', function() {
    //edit_type="click"
      let row=$(this).closest('tr');
      let row_id=$(row).attr('row_id');
      $(row).find('.btn_delete_col').show();
      $(row).find('.btn_update_col').show();
      $(row).find('.btn_col_dep').show();
      $(row).find('.btn_save_col').hide();
      $(row).find('.btn_cancel_col').hide();
      $(row).find('.row-data')
      .attr('contenteditable', 'false')
      .attr('edit_type', 'click')
      .removeClass('bg-warning')
      .css('padding','');
      $(this).hide();
    });
///whene clicking save collage
   $(document).on('click','.btn_save_col', function() {
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
      call_type: 'edit_collage',
      row_id:row_id,
      col_name:row_data,
    }, function(data) {
        let d1=JSON.parse(data);
        if(d1.status=='success'){
            $(row).find('.btn_cancel_col').click();
            alert('done');
        }else{
            console.log(data);
        }
    });
    }catch(error){
    console.log(error.stack);
   }
   });

/// whene clicking delete depart
$(document).on('click','.btn_delete_dep', function() {
    try{
        let row=$(this).closest('tr');
     let row_id=$(row).attr('row_id');
     console.log(row_id);
     let conf=confirm('هل تريد الحذف حقا');
     if(conf){
    $.post('ajax/delete-record.php', {
      call_type: 'department_record',
      row_id:row_id,
    }, function(data) {
    //   $('#dep-table').html(data);
    let d1=JSON.parse(data);
    if(d1.status=='success')
    {
      alert(d1.msg);
      //add notification
      $(row).hide();
    }else{
      alert(d1.msg);
    }
     
      // console.log('ss');
    });
    }
    }catch(error){
    console.log(error.stack);
   }
   });

//whene clicking edite  depart
$(document).on('click','.btn_update_dep', function() {
    //edit_type="click"
      let row=$(this).closest('tr');
      let row_id=$(row).attr('row_id');
      $(row).find('.btn_delete_dep').hide();
      $(row).find('.btn_save_dep').show();
      $(row).find('.btn_cancel_dep').show();
      $(row).find('.row-data')
      .attr('contenteditable', 'true')
      .attr('edit_type', 'button')
      .addClass('bg-warning')
      .css('padding','3px');
      $(this).hide();
    });
//whene clicking cancel colage
$(document).on('click','.btn_cancel_dep', function() {
    //edit_type="click"
      let row=$(this).closest('tr');
      let row_id=$(row).attr('row_id');
      $(row).find('.btn_delete_dep').show();
      $(row).find('.btn_update_dep').show();
      $(row).find('.btn_save_dep').hide();
      $(row).find('.btn_cancel_dep').hide();
      $(row).find('.row-data')
      .attr('contenteditable', 'false')
      .attr('edit_type', 'click')
      .removeClass('bg-warning')
      .css('padding','');
      $(this).hide();
    });

///whene clicking save collage
$(document).on('click','.btn_save_dep', function() {
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
      call_type: 'edit_dep',
      row_id:row_id,
      dep_name:row_data,
    }, function(data) {
        let d1=JSON.parse(data);
        if(d1.status=='success'){
            $(row).find('.btn_cancel_dep').click()
            alert('done');
        }else{
            console.log(data);
        }
    });
    }catch(error){
    console.log(error.stack);
   }
   });


});