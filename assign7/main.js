$(document).ready(function () {
  // show diagram
  $("#diagram-btn").click(function () {
    $("#diagram").toggleClass("d-none");
  });

  // select active row
  $("tr").click(function () {
    $(".table-active").removeClass("table-active");
    $(this).addClass("table-active");
    $("#removing").removeClass("table-active");

    var id = $(this.children[0]).text();
    var title = $(this.children[1]).text();
    var genre = $(this.children[2]).text();
    var year = $(this.children[3]).text();
    var link = $($(".web", this)[0]).prop("href").substring(8);
    var runtime = $(this.children[5]).text();

    // update form
    $("input[name=idUpdate]").val(id);
    $("input[name=titleUpdate]").val(title);
    $("#genreUpdate").val(genre);
    $("input[name=yearUpdate]").val(year);
    $("input[name=linkUpdate]").val(link);
    $("input[name=runtimeUpdate]").val(runtime);

    // remove form
    $("input[name=idRemove]").val(id);
    $("input[name=titleRemove]").val(title);
    $("#genreRemove").val(genre);
    $("input[name=yearRemove]").val(year);
    $("input[name=linkRemove]").val(link);
    $("input[name=runtimeRemove]").val(runtime);

    // populate remove table row
    $("#rmvId").text(id);
    $("#rmvTitle").text(title);
    $("#rmvGenre").text(genre);
    $("#rmvYear").text(year);
    $("#rmvLink").text(link);
    $("#rmvRuntime").text(runtime);
  });

  // sort column
  $(document).on("click", ".column_sort", function () {
    var column_name = $(this).attr("id");
    var order = $(this).data("order");
    $.ajax({
      url: "sort.php",
      method: "POST",
      data: { column_name: column_name, order: order },
      success: function (data) {
        $("#movieTable").html(data);
      },
    });
  });

  // show form for Add
  $("#add-btn").click(function () {
    $("#update-form").addClass("d-none");
    $("#remove-form").addClass("d-none");
    $("#add-form").removeClass("d-none");
    $("#add-form")[0].scrollIntoView();
  });

  // show form for Update
  $("#update-btn").click(function () {
    $("#add-form").addClass("d-none");
    $("#remove-form").addClass("d-none");
    $("#update-form").removeClass("d-none");
    $("#update-form")[0].scrollIntoView();
  });

  // show form for Remove
  $("#remove-btn").click(function () {
    $("#add-form").addClass("d-none");
    $("#update-form").addClass("d-none");
    $("#remove-form").removeClass("d-none");
    $("#remove-form")[0].scrollIntoView();
  });
});
