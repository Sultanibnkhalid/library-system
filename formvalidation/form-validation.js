async function validateInputs(el_id){
  let valide=true;
  try{
  //check inputs
  let element= $(el_id);
  let inputs=$(element).find('input');
  $(inputs).each(function(){
    let input=$(this);
    if($(input).hasClass('rq')){
      if($(input).val()==''){
        let ifb=$(input).next();
        if($(ifb).hasClass('invalid-feedback')){         
          $(ifb).show();
          valide=false;
          return false;
        }else{
          $(input).css('border','1px solid red');
          $(input).focus();
          valide=false;
          return false;
        }
      }
    }
  });
  //check selects
  let selects=$(element).find('select');
  $(selects).each(function(){
    let select=$(this);
    if($(select).hasClass('rq')){
      if($(select).val()==''){
        let ifb=$(select).next();
        if($(ifb).hasClass('invalid-feedback')){         
          $(ifb).show();
          valide=false;
          return false;
        }else{
          $(select).css('border','1px solid red');
          $(select).focus();
          valide=false;
          return valide;
        }
      }
    }
  });
 return valide;
  }catch(error){
    console.log(error.stack);
    valide=false;
    return valide;
  }finally{
    return valide;
  }
}
//event
//hide error 
$(document).on('click','input',function(){
  $('.invalid-feedback').hide();
  $('select').css('border','1px solid #ced4da');
  $('input').css('border','1px solid #ced4da');

});
//function
//clear data after submitting
function clearForm(el_id){
  $(el_id).find('input').val('');
}