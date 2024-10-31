$(document).ready(function () {
  var container = $(".container");
  var btn_list_news = container.find("#btn-list-news");
  var list = container.find("#list");

  btn_list_news.on("click", function () {
    $.ajax({
      url: "/news/listNews",
      dataType: "json",
      success: function (data) {
        var htmlNews = "";

        $.each(data, function (key, value) {
          htmlNews += "<p>" + data[key].TbNewsText + "</p>";
        });

        list.html(htmlNews);
      },
      error: function (xhr, ajaxOptions, throwError) {
        console.log(xhr.responseText);
      },
    });
  });
});
