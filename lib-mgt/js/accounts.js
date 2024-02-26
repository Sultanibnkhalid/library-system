$(document).ready(function(){

 $("#dialog_button").on('click', hide_dialog());
///function on searching acount
    $('#serch-account').on('keyup', function(event) {
        try{
        event.preventDefault();
        $.post('search_queries/accounts-query.php', {
        call_type: 'search_account',
        acc_name: $(this).val().trim(),
        }, function(data) {
        $('#account-table').html(data);
        // console.log('ss');
        });
    }catch(error){
        console.log(error.stack);
    }
    });
//btn_activ
//btn_cancel
//btn_details
//btn_send
///whene clicking disactive account
$(document).on("click", ".btn_cancel", function () {
  try {
    let row = $(this).closest("tr");
    let td = $(this).closest("td");
    let st = $(td).attr("status");
    if (st == 0) {
      alert("غير  منشط بالفعل");
      $(row).find(".btn_cancel").hide();
      return;
    } else {
      let row_id = $(row).attr("row_id");
      // console.log(row_id);
      let conf = confirm("هل تريد تعطيل الحساب حقا");
      if (conf) {
        $.post(
          "ajax/autherintereis.php",
          {
            call_type: "stop_acount",
            row_id: row_id,
          },
          function (data) {
            let d1 = JSON.parse(data);
            alert(d1.msg);
            //notification
            //add notification
            $(row).find(".btn_cancel").hide();
            $(row).find(".btn_active").show();
            // console.log('ss');
          }
        );
      }
    }
  } catch (error) {
    console.log(error.stack);
  }
});
///whene clicking active account
$(document).on('click','.btn_active', function() {
    try{
    let td=$(this).closest('td');
    let st=$(td).attr('status');
    let new_st=(st==1)?0:1;
    if(st==1){
        alert('منشط بالفعل' );
        $(this).hide();
        return;
    }else{
        let row=$(this).closest('tr');
        let row_id=$(row).attr('row_id');
        $.post('ajax/autherintereis.php', {
        call_type: 'active_acount',
        row_id:row_id,
        }, function(data) {
            let d1=JSON.parse(data);
            alert(d1.msg);
        alert('done');
        //notification
        //add notification
        $(td).attr('status',new_st);
        $(this).hide();
        $(row).find('.btn_cancel').show();
        // console.log('ss');
        });
    }
    }catch(error){
    console.log(error.stack);
}
});
///whene clicking send email
$(document).on('click','.btn_send', function() {
    try{
    let row=$(this).closest('tr');
    let row_id=$(row).attr('row_id');
    let td=$(row).find('.email');
    let st=$(td).text();
        $.post('ajax/autherintereis.php', {
        call_type: 'send_password',
        email:st,
        row_id:row_id,
        }, function(data) {
        //   $('#dep-table').html(data);
        let d1=JSON.parse(data);
        showsucess();
        $("#dialog_message").text(d1.msg);
       
        
        // alert(d1.msg);
        //notification
        //add notificatio
        });
    }catch(error){
    console.log(error.stack);
}
});
///whene clicking accont details
$(document).on('click','.btn_details', function() {
    try{
    let row=$(this).closest('tr');
    let row_id=$(row).attr('row_id');
    let row_type=$(row).attr('row_type');
    // console.log(row_id);
    // console.log(row_type);

        $.post('search_queries/accounts-query.php', {
        call_type: 'account_info',
        row_type:row_type,
        row_id:row_id,
        }, function(data) {
            // console.log(data);
           $('#account-info_container').html(data);
        //notification
        //add notificatio
        });
    }catch(error){
    console.log(error.stack);
}
});
$('#dialog_button').on('click',function(event){
  hide_dialog();
});

})