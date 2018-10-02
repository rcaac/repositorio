$(document).ready(function () {
    listValuation();
});

var listValuation = function () {
    $.ajax({
        type: 'GET',
        url: 'listValuation',
        success: function (data) {
            $('#list-valuation').empty().html(data);
        }
    });
};

