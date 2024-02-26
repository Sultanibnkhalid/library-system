$(document).ready(function(){
// seachCollages(el_id)
// seachCats(el_id)

var book_img_name = '';
var cat_data_obj;
var col_data_obj;
var book_cover_img_name = '';
var book_file_name = '';
var book_data = {};
var book_img_size;
//get category into object
$.getJSON('ajax/files_ajax.php', {
    call_type: 'get_category'
}, function(data) {
    cat_data_obj = data;
});
//get collages into object
$.getJSON('ajax/files_ajax.php', {
    call_type: 'get_collages'
}, function(data) {
    col_data_obj = data;
});
 //function shows imges in the tables
function showImages(el_id) {
        let el=$(el_id);
        $(el).find('.imgs').each(function(index, value) {
        const $div = $(value);
        var pic = $div.attr('pic');
        var file = $div.attr('pdf');
        var $img = $div.find('img');
        // console.log("url is: " + file + " " + pic);

        if (pic.length < 1) {
            var pdfurl = "../books/" + file;
            var pdfjsLib = window['pdfjs-dist/build/pdf'];
            pdfjsLib.getDocument(pdfurl).promise.then(function(pdf) {
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
            $img.attr('src', coverPhotoDataUrl);
            });
        } else {
            // picurl = "uploads/1.png";
            $img.attr('src', "../books_imgs/" + pic);
        }

        });
    } // end get images functionfunction
//search_doc
//whene esarching for document
 $('#search_doc').on('keyup',function(){
        if (($(this).val()).trim().length) {
            $.ajax({
            type: "POST",
            url:"search_queries/document-query.php",
            data: {
                'text_search_doc': $(this).val(),
                call_type: 'search_document',
            },
            success: function(data) {
                $("#doc_table").html(data);
                showImages('#doc_table');
            }
            });
        }
    });
//whene searching books
    $(document).on('keyup', '#txt_search_book', function(event) {
        if (($(this).val()).trim().length) {
        $.ajax({
            type: "POST",
            url: "search_queries/search_book_query.php",
            data: {
            'text_search_book':$(this).val(),
            call_type: 'search_book',
            },
            success: function(data) {
            $("#book_table").html(data);
            showImages("#book_table");
            }
        });
        }
    });
//whene clicking  save apadting book
//whene click edit document
var document_data={};
$(document).on('click', '.btn_update_doc', function(event) {
    event.preventDefault();
    //get the row
    let tbl_row = $(this).closest('tr');
    //get the row_id
    document_data['id'] = tbl_row.attr('row_id');
    document_data['Pages']=$(tbl_row).attr('pNo');
    //get the img
    tbl_row.find('.imgs').each(function(index, val) {
        document_data['img']=$(this).attr('pic');
        document_data['pdf']=$(this).attr('pdf');;
    });
    //add row content to document_data
    tbl_row.find('.row_data').each(function(index, val) {
      let col_name = $(this).attr('col_name');
      document_data[col_name] = $(this).text().trim();

    });
    showdocDialog(document_data);
    getCollages(col_data_obj);
    setTimeout(() => {
      $(document).find("#doc_collage option").each(function() {
        if ($(this).text() == document_data['College_Name']) {
          $(this).prop('selected', true);
          return false;
        }
      });
    }, 1000)
  });

//save document updates
$("#submit_new_doc").on('click',async function(event) {

    event.preventDefault();
    let valid = await validateInputs('#doc_dialog');
    console.log(valid);
    if (valid) {
      try {
        showLoading();
        // var file_name = "";
        const fileInput = document.getElementById("doc_fileinput");
        var doc_img = fileInput.files[0];
        var formData = new FormData();
        // if (doc_img.type == 'application/pdf') {
        //   file_name = doc_img.name;
        // }
        formData.append('file', doc_img);
        // for (let i = 0; i < 1; i++) {
        //   formData.append('pdfs_images', doc_img);
        //   // alert(student_img.name);
        // }

        //  alert(student_img_name);


        // if (doc_img_size == 0) {
        //   //|| student_img_size > 600
        //   // document.getElementById("h_error").innerHTML = "يرى اختيار الصورة بشكل صحيح";
        //   //  alert(student_img_size);
        //   // return;

        // }
        formData.append('row_id',document_data['id']);

        formData.append('doc_Title',$("#doc_title").val());
        formData.append('doc_subjct',$("#doc_subject").val());
        formData.append('doc_author',$("#doc_author").val());
        formData.append('doc_collage',$('#doc_collage').val());
        formData.append('doc_pages',$('#doc_pages').val());
        formData.append('publish_date',$("#doc_publishing_year").val());
        formData.append('copiesNo',$("#doc_number_copies").val());
        formData.append('lockerNo',$("#doc_locker_no").val());
        formData.append('status',$("#doc_status").val());
        formData.append('call_type', 'update_document');
        $.post({
          url:'ajax/updates_ajax.php',
          data: formData,
          processData: false,
          contentType: false,
          success: function(data) {
            var d1 = JSON.parse(data);
            if (d1.status == "error") {
              $("#dialog_message").text(d1.msg);
              showfaild();
            } else if (d1.status == "success") {
              $("#dialog_message").text(d1.msg);
              hideUpdaeFileDialog();
              showsucess(); 
            } else {
              $("#dialog_message").innerHTML = d1.msg;
              showfaild();
            }
          }
        });
             } catch (error) {
        document.getElementById("dialog_message").innerHTML = error.message;
        showfaild();
      }
     
    }
  });

 //
 //on save update book//
 $("#update_book").on('click', async function(event) {
    event.preventDefault();
    let valid = await validateInputs('#book_dialog');
    if (valid) {
      try {
        showLoading();
        const fileInput = document.getElementById("book_inputfile");
        var formData = new FormData();
        let file = fileInput.files[0];
        formData.append('file', file);
        formData.append('id', book_data['id']);
        formData.append('book_Title', $("#book_title").val());
        formData.append('book_subject', $("#book_title").val());
        formData.append('book_author', $("#book_author").val());
        formData.append('book_category', $("#book_category").val());
        formData.append(' book_publisher', $('#book_publisher').val());
        formData.append('publish_date', $("#publish_date").val());
        formData.append('copiesNo', $("#book_copies").val());
        formData.append('status', $("#book_status").val());
        formData.append('lockerNo', $("#book_locker_no").val());
        formData.append('book_pages', $("#book_pages").val());
        formData.append('call_type', 'update_book_data');

        $.post({
          url: 'ajax/updates_ajax.php',
          data: formData,
          processData: false,
          contentType: false,
          success: function(data) {
            var d1 = JSON.parse(data);
            if (d1.status == "error") {
              $("#dialog_message").text(d1.msg);
              showfaild();
            } else if (d1.status == "success") {
              $("#dialog_message").text(d1.msg);
              showsucess();
              // clearForm('#nav-book');
              $(document).find('.cancel').click();

            } else {
              $("#dialog_message").innerHTML = d1.msg;
              showfaild();
            }
          }
        });
      } catch (error) {
        console.log(error.stack);
        showfaild();
      }
    }

  }); //=>//submiting update book end
  $("#doc_fileinput").on('change', function(event) {

    const file = event.target.files[0];
    if (file.type == 'application/pdf') {
      var coverPhotoImg = document.getElementById("doc_cover_img")
      var half_name = file.name;
      const reader = new FileReader();
      reader.onload = function(event) {
        const pdfDataUrl = event.target.result;

        // Load the PDF.js library
        const pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'pdf.worker.min.js';

        // Load the PDF file using PDF.js
        pdfjsLib.getDocument({
          data: atob(pdfDataUrl.split(',')[1])
        }).promise.then(function(pdfDoc) {
          // Get the first page of the PDF file
          document.getElementById("doc_pages").value = pdfDoc.numPages;
          return pdfDoc.getPage(1);
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
          coverPhotoImg.src = coverPhotoDataUrl;
        });
      }
      reader.readAsDataURL(file);
    } else {
      doc_img_name = file.name;
      doc_img_size = file.size;
      var reader = new FileReader();
      reader.readAsDataURL(file);

      reader.onload = function(e) {
        //متغير يحتوي الصورة

        //الحدث onload يحدث اثناء العملية الحالية 
        document.getElementById("doc_cover_img").setAttribute('src', e.target.result);
      }
    }
  });

  //for hide dialogs
  $(".cancel").on('click', function(event) {
    event.preventDefault();
    hideUpdaeFileDialog();
  });
  //whene clicking
//   $('#dialog_button').on('click', hide_dialog());

  $(document).on('click', '.btn_update_book', function(event) {
    event.preventDefault();
    book_cover_img_name = '';
    book_file_name = '';
    var tbl_row = $(this).closest('tr');
    var row_id = tbl_row.attr('row_id');
    var img = '';
    var file = '';
    book_data['Pages']=$(tbl_row).attr('pNo')
    // var data = {};
    tbl_row.find('.imgs').each(function(index, val) {
      img = $(this).attr('pic');
      file = $(this).attr('pdf');

    });

    tbl_row.find('.row_data').each(function(index, val) {
      var col_name = $(this).attr('col_name');
      book_data[col_name] = $(this).text().trim();

    });
    book_data['img'] = img;
    book_data['filename'] = file;
    book_data['id'] = row_id;
    showBookDialog(book_data);
    getCategoris(cat_data_obj);
    // seachCats("#book_category");
    setTimeout(() => {
      $(document).find("#book_category option").each(function() {
        if ($(this).text() == book_data['Category_Name']) {
          $(this).prop('selected', true);
          return false;
        }
      });
    }, 1000)
    //add code to set book category
    console.log(book_data);

  });
  ///on clicking book or doc dialog input    
  //whene change  document status
  $("#doc_status").on('change', function() {
    var fileinput = document.getElementById("doc_fileinput");
    var v = document.getElementById("doc_status").value;
    if (v == 0) {
      fileinput.accept = 'image/jpg,image/jpeg,image/png'

    } else {
      fileinput.accept = 'applcation/pdf'
    }
  });
  //whene change  book status
  $("#book_status").on('change', function() {
    var fileinput = document.getElementById("book_inputfile");
    var v = document.getElementById("book_status").value;
    if (v == 0) {
      fileinput.accept = 'image/jpg,image/jpeg,image/png'

    } else {
      fileinput.accept = 'applcation/pdf'
    }
  });

  //on add book file or imag
  $("#book_inputfile").on('change', function(event) {
    //editting later
    const file = event.target.files[0];
    if (file.type == 'application/pdf') {
      book_file_name = file.name;
      var coverPhotoImg = document.getElementById("book_cover_img")
      var half_name = file.name;
      const reader = new FileReader();
      reader.onload = function(event) {
        const pdfDataUrl = event.target.result;

        // Load the PDF.js library
        const pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'pdf.worker.min.js';

        // Load the PDF file using PDF.js
        pdfjsLib.getDocument({
          data: atob(pdfDataUrl.split(',')[1])
        }).promise.then(function(pdfDoc) {
          // Get the first page of the PDF file
          document.getElementById("book_pages").value = pdfDoc.numPages;
          return pdfDoc.getPage(1);
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
          coverPhotoImg.src = coverPhotoDataUrl;
        });
      }
      reader.readAsDataURL(file);
    } else {
      book_cover_img_name = file.name;
      book_img_size = file.size;
      var reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = function(e) {
        //متغير يحتوي الصورة
        //الحدث onload يحدث اثناء العملية الحالية 
        document.getElementById("book_cover_img").setAttribute('src', e.target.result);
      }
    }
  });
  //on
//close click
$(".close").on('click', function(event) {
  // event.preventDefault();
  hideUpdaeFileDialog();
});
//hide mesage
$('#dialog_button').on('click',function(event){
  hide_dialog();
});



})