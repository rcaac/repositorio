$(document).ready(function () {
    listInvestigation();
});

$(document).on("click", ".pagination li a", function (e) {
    e.preventDefault();

    var url = $(this).attr("href");

    $.ajax({
        type: 'GET',
        url: url,
        success: function (data) {
            $('#list-investigation').empty().html(data);
        }
    });
});

var listInvestigation = function () {
    $.ajax({
        type: 'GET',
        url: 'listInvestigation',
        success: function (data) {
            $('#list-investigation').empty().html(data);
        }
    });
};

//EDIT

//UPDATE

//DELETE
$(document).on("click",".remove-investigation",function(){
    $('.inv').text($(this).attr('data-id'));
    $('.actionInv').addClass('destroy');
    //$('#delete-dimension').modal('show');
});

$(document).on("click",".destroy",function(){
    var token = $("#token").val();
    $.ajax({
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        data: { testData: 'this is a test' , '_method':'DELETE'},
        url: 'investigation' + '/' + $('.inv').text()
    }).done(function(data){
        $('.item' + $('.inv').text()).remove();
        toastr.success('Registro eliminado.', {timeOut: 5000});
        listInvestigation();
    });
});
