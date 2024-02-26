<?php
?>

<div class="footer-bottom fixed-bottom  sticky-bottom" style="background-color: #2795b6;height: 50px;">
    <div class="container pt-20 pb-20" style="max-width: 100%;">
      <div class="row">
        <div class="col-md-6" id="foName">
          <p class="font-11 text-white  m-2">جميع الحقوق محفوظة © المكتبة الاليكترونية</p>
        </div>
        <div class="col-md-6 text-right">
          <div class="widget no-border m-0">
            <ul class="list-inline sm-text-center mt-2 font-12" style="display: flex;">
              <li class="nav-item">
                <a style="color: snow;" class="nav-link " aria-current="page" href="#"> تواصل بنا</a>

              </li>
              <li class="nav-item" style="margin-right: 0;">
                <a style="color: snow;" class="nav-link " aria-current="page" href="#"> <i class="fab fa-facebook"></i></a>

              </li>
              <li class="nav-item" style="margin-right: 0;">
                <a style="color: snow;" class="nav-link " aria-current="page" href="#"> <i class="fab fa-twitter"></i></a>

              </li>
              <li class="nav-item" style="margin-right: 0;">
                <a style="color: snow;" class="nav-link " aria-current="page" href="#"> <i class="fab fa-linkedin"></i></a>

              </li>

            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
<script>
  //set fotter pos
  // $('.footer-bottom').css('position','absolut').css('bottom',0);
  let ch_d = $('body').outerHeight();
  let w_h = $(window).height();
  let fotter = $(document).find('.footer-bottom');
  if (ch_d > w_h) {
    // console.log(ch_d);
    // console.log(w_h);
    //fixed-bottom sticky-bottom
    let fotter = $(document).find('.footer-bottom');
    $(fotter).removeClass('fixed-bottom', 'sticky-bottom');

    $(fotter).css('position', 'absolut').css('bottom', 0);
  } else {
    $(fotter).addClass('fixed-bottom', 'sticky-bottom');
    
  }
  //function
  function toggleElementByWidth(elementId, minWidth, displayStyle) {
    const  element =$('#'+elementId);
  if (window.innerWidth >= minWidth) {
    $(element).css('display',displayStyle);
  } else {
    $(element).css('display','none');
 }
}
$(window).on('resize', function(event) {
  toggleElementByWidth('foName', 768, 'block');  
});
</script>