console.log("hello");
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#rppreview").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
    var filename = document.getElementById("file-name");
    filename.innerHTML = input.files[0].name;
  }

  console.log(e.target.result);
}

$("#rpphoto").change(function () {
  readURL(this);
});

// shorten repair titles

$(".repair-bottom h4").each(function () {
  console.log($(this).text());
  if ($(this).text().length > 13) {
    var shortname = $(this).text().substring(0, 13) + " ...";
    $(this).replaceWith("<h4>" + shortname + "</h4>");
  }
});

// search customer repair list
function search(device) {
  var term = $("#term").val();
  console.log(term);
  if (device !== "") {
    console.log(term);
    window.location.href =
      "myRepairList.php?device=" + device + "&term=" + term;
  } else {
    window.location.href = "myRepairList.php?&term=" + term;
  }
}

// search staff repair list
function searchstaff(device) {
  var term = $("#term").val();
  console.log(term);
  if (device !== "") {
    console.log(term);
    window.location.href =
      "allRepairList.php?device=" + device + "&term=" + term;
  } else {
    window.location.href = "allRepairList.php?&term=" + term;
  }
}
