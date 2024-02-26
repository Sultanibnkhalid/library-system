//variables used in categry.php to select deparments and catgories
var col_data = "";
var cat_data = "";
var depart_data = "";
//funcion used in categry.php to select deparments and catgories
  function getcol_dep_cat_names(ajax_url) {
    var col = '<option value="">--اختر--</option>';
    var cat ='<option value="">--اختر--</option>';
    var dep ='<option value="">--اختر--</option>';
    $.getJSON(
      ajax_url,
      {
        call_type: "get_collages",
      },
      function (data) {
        // col_data = data;
        col_data = data;
        if (data != "") {
          $.each(data, function (index, val) {
            col +=
              '<option value="' +
              val["College_ID"] +
              '" >' +
              val["College_Name"] +
              "</option>";
          });
        }
        $(document).find("#col_select").html(col);
      }
    );
    $.getJSON(
      ajax_url,
      {
        call_type: "get_depart",
      },
      function (data) {
        depart_data = data;
        if (data != "") {
          $.each(data, function (index, val) {
            dep +=
              ' <option value="' +
              val["ColDep_ID"] +
              '" >' +
              val["Department_Name"] +
              "</option>";
          });
        }
        $(document).find("#depart_select").html(dep);
      }
    );
    $.getJSON(
      ajax_url,
      {
        call_type: "get_cat",
      },
      function (data) {
        cat_data = data;
        if (data != "") {
          $.each(data, function (index, val) {
            cat +=
              ' <option value="' +
              val["Category_ID"] +
              '" >' +
              val["Category_Name"] +
              "</option>";
          });
        }
        $(document).find("#cat_select").html(cat);
      }
    );
    //
  // Full texts
  // Category_ID	
  // Category_Name
  }
//function used in category.php whene chose colage
  function changeDepart() {
    //    var select= document.getElementById('col_select');
    var selectedcollage = document.getElementById("col_select").value;
    var opt = "";
    // opt += '<option value=""> اختر... </option>'
    $.each(depart_data, function (index, val) {
      if (val["College_ID"] == selectedcollage) {
        opt +=
          '<option value="' +
          val["ColDep_ID"] +
          '" >' +
          val["Department_Name"] +
          "</option>";
      }
    });
    $(document).find("#depart_select").html(opt);
    //document.getElementById("#depart_select").selectedIndex = 0;
  }

