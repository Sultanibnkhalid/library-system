///this file for user operation

//function
$(document).ready(function () {
  //get cats
  $.getJSON(
    "user_queries/search_files.php",
    {
      call_type: "get_doc_col_year",
    },
    function (data) {
      if (data != "") {
        // console.log(data);
        let opt = ' <option class="cat-option" value="-1">الكل</option>';
        $.each(data, function (index1, value) {
          opt +=
            ' <option class="cat-option" value="' +
            value["collage_ID"] +
            '">' +
            value["College_Name"] +
            " " +
            value["PublishingYear"] +
            "</option>";
        });
        $(document).find("#cat-select").html(opt);
        $("#cat-select").selectedIndex = 0;
      }
    }
  ); //end grt cats
  //get random fles
  searchFiles();

  //andel events
  //   $("#input-search").on("keyup", function (event) {
  //     event.preventDefault();
  //     console.log($("#input-search").val());
  //   });
  //handel serch buttin event
  var col = '';
  var col_txt = '';
  $(document).on('change', '#cat-select', function () {
    col = $(this).val();
    col_txt = $(this).find('option:selected').text();
    console.log(col);
    console.log(col_txt);
  })
  $("#btn-search").on("click", function () {
    // event.preventDefault();
    let text = $("#input-search").val();
    // let col = $("#cat-select").val();
    // let col_txt = $("#cat-select").text();
    let p_year = "";
    let arr = col_txt.split(' ');
    // console.log(col_txt);
    // console.log(arr);
    // console.log(col);


    if (arr.length > 1) {
      p_year = arr[arr.length - 1];
    }
    console.log(p_year);
    searchFilesWithParms(text, col, p_year);
    // console.log(text + cat);
    // if (cat && text) {
    //   searchFilesWithParms(text, cat);
    // } else {
    //   $("#input-search").focus();
    //   return;
    // }
  });
  //prevent saving
  $(document).on("contextmenu", function (e) {
    e.preventDefault();
  });

  //jmkhjn

  $('#iframe-modle').find("button").each(function () {
    $(this).on("click", function () {
      $('#iframe-modle').toggle();
    });
  });
  //show file content
  //handel button show event
  $(document).on("click", ".f-button", function () {
    console.log("hi");
    let el = $(this).closest("div");
    console.log(el);
    let pdf = el.attr("pdf");
    let pic = el.attr("pic");
    let f_t = el.attr("f-t");
    console.log(pdf);

    if (pdf.length) {
      let iframe = $("#iframe-modle");
      $(iframe).toggle();
      //handel close btn
      // $(iframe)
      //   .find("button")
      //   .each(function () {
      //     $(this).on("click", function () {
      //       $(iframe).toggle();
      //     });
      //   });
        // pdf=pdf.replace("../","");
        pdf=pdf.replace("../books","");
        console.log(pdf);
        $("#f-t").text(f_t);
        
        ///strt pdf.js
      // $(iframe).css('display','block');
    
      $("#f-iframe").attr("src", "books/" + pdf);
      // $("#f-iframe").attr("src", "http://docs.google.com/viewer?url=http://localhost:8080/thamar-lib/books/" + pdf + "&embedded=true");

      //"books/"+pdf
      //use this url to prevent user from download fil
      //"http://docs.google.com/gview?url=books/"+pdf+"&embedded=true"

      // $(iframe).on("contextmenu", function (e) {
      //   e.preventDefault();
      // });
    } else if (pic.length) {
      $("#inf-container").html("");
      let el2 = $(el).parent("div");
      let details = $("#details-modle");
      $(details).toggle();
      $("#b-d-img").attr("src", "books_imgs/" + pic);
      //handel close btn
      $(details)
        .find("button")
        .each(function () {
          $(this).on("click", function () {
            $(details).toggle();
          });
        });

      $("#d-t").text(f_t);
      let infos = $(el2).find(".f-info").clone();
      $(infos).removeClass("card-text");
      $("#inf-container").append(infos);
      // $(el2).find('.f-info').clone().each(function(){
      //   $('#inf-container').append($(this));
      // });
    } else {
      return;
    }
  });

  $(document).on('click','.colos_detils',function(){
    $('#details-modle').toggle();
  });
  $(document).on('click','.close_iframe',function(){
    $('#iframe-modle').toggle();
});
});
// // //set botom pos
function checkContent() {
  let ch_d = $("body").outerHeight();
  let w_h = $(window).height();
  let fotter = $(document).find(".footer-bottom");
  if (ch_d > w_h) {
    console.log(ch_d);
    console.log(w_h);
    //fixed-bottom sticky-bottom
    let fotter = $(document).find(".footer-bottom");
    $(fotter).removeClass("fixed-bottom", "sticky-bottom");

    $(fotter).css("position", "absolut").css("bottom", 0);
  } else {
    $(fotter).addClass("fixed-bottom", "sticky-bottom");
  }
}
//function for earing for a file with two parms
async function searchFilesWithParms(text, col, p_year) {
  let book = "";
  let data_obj = {
    call_type: "get_docs_by_year",
    text: text,
    col_id: col,
    p_year: p_year,
  };
  let data = await $.ajax({
    url: "user_queries/search_files.php",
    type: "POST",
    data: data_obj,
  });
  //   console.log(data);
  if (data != "") {
    let d1 = JSON.parse(data);
    if (d1.length > 0) {
      $.each(d1, function (index, val) {
        book +=
          '<div class="card col-sm-6 col-md-6  col-lg-3 book-container f-card">' +
          '<div class="row g-0">' +
          '<div class="col-12">' +
          '<div class="row g-3">' +
          '<div class="col-sm-5 f-img-card" pic="' +
          val["Photo"] +
          '" pdf="' +
          val["FileName"] +
          '">' +
          '<img class="f-img" src="books_imgs/1.jpg" width="100%" height="100%"></div>';

        book += '<div class="col-sm-7 " fNo="">';
        book +=
          '<p class="card-text  f-info"> العنوان' +
          val["Document_Title"] +
          "</p>";
        book +=
          ' <p  class="card-text  f-info"> المؤلف:' + val["Author"] + "</p>";
        book +=
          '<p class=" card-text  f-info">الموضوع:' + val["Subject"] + "</p>";
        book += '<p  class="card-text  f-info">' + val["College_Name"] + "</p>";
        book += '<p  class="card-text  f-info"> صفحة:' + val["Pages"] + "</p>";

        book +=
          ' <div class="col" style="text-align:right" pic="' +
          val["Photo"] +
          '" pdf="' +
          val["FileName"] +
          '" f-t="' +
          val["Document_Title"] +
          '" >';
        book +=
          '<small class="text-muted  f-info"style="margin-left:3px">بتاريخ' +
          val["PublishingYear"] +
          "</small>";
        let st = val["FileName"];
        if (st !='') {
          book +=
            '<button type="button"  data-bs-toggle="modal" class="btn btn-sm  btn-outline-secondary f-button" data-bs-target="#iframe-modle" >عرض</button>';
        } else {
          book +=
            '<button type="button" data-bs-toggle="modal" data-bs-target="#details-modle" class="btn btn-sm  btn-outline-secondary f-button">تفاصيل اكثر</button>';
        }
        book +=
          " </div>" + "</div>" + "  </div>" + "</div>" + "  </div>" + "</div>";
      });
      $(document).find("#result-container").html(book);
      checkContent();
      showImages();
    }
  }
} //get books end
//function for earing for a file without parms
async function searchFiles() {
  let book = "";
  let data_obj = {
    call_type: "get_docs",
  };

  let data = await $.ajax({
    url: "user_queries/search_files.php",
    type: "POST",
    data: data_obj,
  });
  // console.log(data);
  if (data != "") {
    let d1 = JSON.parse(data);
    if (d1.length > 0) {
      $.each(d1, function (index, val) {
        book +=
          '<div class="card col-sm-6 col-md-6  col-lg-3 book-container f-card">' +
          '<div class="row g-0">' +
          '<div class="col-12">' +
          '<div class="row g-3">' +
          '<div class="col-sm-5 f-img-card" pic="' +
          val["Photo"] +
          '" pdf="' +
          val["FileName"] +
          '">' +
          '<img class="f-img" src="books_imgs/1.jpg" width="100%" height="100%"></div>';

        book += '<div class="col-sm-7 " fNo="">';
        book +=
          '<p class="card-text  f-info"> العنوان' +
          val["Document_Title"] +
          "</p>";
        book +=
          ' <p  class="card-text  f-info"> المؤلف:' + val["Author"] + "</p>";
        book +=
          '<p class=" card-text  f-info">الموضوع:' + val["Subject"] + "</p>";
        book += '<p  class="card-text  f-info">' + val["College_Name"] + "</p>";
        book += '<p  class="card-text  f-info"> صفحة:' + val["Pages"] + "</p>";

        book +=
          ' <div class="col" style="text-align:right" pic="' +
          val["Photo"] +
          '" pdf="' +
          val["FileName"] +
          '" f-t="' +
          val["Document_Title"] +
          '" >';
        book +=
          '<small class="text-muted  f-info" style="margin-left:3px">بتاريخ' +
          val["PublishingYear"] +
          "</small>";
          let st = val["FileName"];
        if (st !='') {
          book +=
            '<button type="button"  data-bs-toggle="modal" class="btn btn-sm  btn-outline-secondary  f-button" data-bs-target="#iframe-modle">عرض</button>';
        } else {
          book +=
            '<button type="button" data-bs-toggle="modal" data-bs-target="#details-modle" class="btn btn-sm  btn-outline-secondary f-button">تفاصيل اكثر</button>';
        }
        book +=
          " </div>" + "</div>" + "  </div>" + "</div>" + "  </div>" + "</div>";
      });
      $(document).find("#result-container").html(book);
      checkContent();
      showImages();
    }
  }
}
//functio
//show files mages
//from img-url
function showImages() {
  $(document)
    .find(".f-img-card")
    .each(function (index, value) {
      const $div = $(value);
      var pic = $div.attr("pic");
      var file = $div.attr("pdf");
      var $img = $div.find("img");
      // console.log("url is: " + file + " " + pic);

      if (pic.length < 1) {
        var pdfurl = "books/" + file;
        var pdfjsLib = window["pdfjs-dist/build/pdf"];
        pdfjsLib
          .getDocument(pdfurl)
          .promise.then(function (pdf) {
            return pdf.getPage(1);
          })
          .then(function (page) {
            // Get the cover photo of the PDF file as a data URL
            // return page.getViewport({ scale: 1 });
            const canvas = document.createElement("canvas");
            const canvasContext = canvas.getContext("2d");
            const viewport = page.getViewport({
              scale: 1,
            });
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            return page
              .render({
                canvasContext,
                viewport,
              })
              .promise.then(function () {
                return canvas.toDataURL("image/jpeg", 0.8);
              });
          })
          .then(function (coverPhotoDataUrl) {
            // Set the cover photo as the source of the img tag
            $img.attr("src", coverPhotoDataUrl);
          });
      } else {
        // picurl = "uploads/1.png";
        $img.attr("src", "books_imgs/" + pic);
      }
    });
} // end get images functionfunction
