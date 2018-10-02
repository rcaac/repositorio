$(document).ready(function () {
    listBook();
});

$(document).on("click", ".pagination li a", function (e) {
    e.preventDefault();

    var url = $(this).attr("href");

    $.ajax({
        type: 'GET',
        url: url,
        success: function (data) {
            $('#list-books').empty().html(data);
        }
    });
});

var listBook = function () {
    $.ajax({
        type: 'GET',
        url: 'listBook',
        success: function (data) {
            $('#list-books').empty().html(data);
        }
    });
};

