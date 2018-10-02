$(document).ready(function () {
    listUser();
});

$(document).on("click", ".pagination li a", function (e) {
    e.preventDefault();

    var url = $(this).attr("href");

    $.ajax({
        type: 'GET',
        url: url,
        success: function (data) {
            $('#list-users').empty().html(data);
        }
    });
});

var listUser = function () {
    $.ajax({
        type: 'GET',
        url: 'listUser',
        success: function (data) {
            $('#list-users').empty().html(data);
        }
    });
};

var Mostrar = function (id)
{
    var route = "user/"+id+"/edit";

    $.get(route, function (data) {
        $(".modal-body #dimension_id").val( data.id );
        $(".modal-body #firstname").val(data.firstname);
        $(".modal-body #lastname").val(data.lastname);
        $(".modal-body #email").val(data.email);
        $(".modal-body #password").val(data.password);

    });

    //*************Category*******************//
    $.ajax({
        type:'GET',
        url: 'select/category',
        data: 'id=' + id
    }).done(function(data){
        $(".modal-body #category").html('');
        $.each(data, function (i) {
            $(".modal-body #category").append("<option value=\"" + data[i].id + "\">" + data[i].category + "<\/option>");
        });
    });

    //*************Position*******************//
    $.ajax({
        type:'GET',
        url: 'select/position',
        data: 'id=' + id
    }).done(function(data){
        $(".modal-body #position").html('');
        $.each(data, function (i) {
            $(".modal-body #position").append("<option value=\"" + data[i].id + "\">" + data[i].position + "<\/option>");
        });
    });

    //*************Subject*******************//
    $.ajax({
        type:'GET',
        url: 'select/subject',
        data: 'id=' + id
    }).done(function(data){
        $(".modal-body #subject").html('');
        $.each(data, function (i) {
            $(".modal-body #subject").append("<option value=\"" + data[i].id + "\">" + data[i].subject + "<\/option>");
        });
    });

    //*************Role*******************//
    $.ajax({
        type:'GET',
        url: 'select/role',
        data: 'id=' + id
    }).done(function(data){
        $(".modal-body #role").html('');
        $.each(data, function (i) {
            $(".modal-body #role").append("<option value=\"" + data[i].id + "\">" + data[i].role + "<\/option>");
        });
    });

};

$("#update-user").click(function(e){
    e.preventDefault();
    var id = $(".modal-body #dimension_id").val();
    var firstname = $("#editModal").find("input[name='firstname']").val();
    var lastname = $("#editModal").find("input[name='lastname']").val();
    var email = $("#editModal").find("input[name='email']").val();
    var password = $("#editModal").find("input[name='password']").val();
    var category = $("#editModal #category").val();
    var position = $("#editModal #position").val();
    var subject = $("#editModal #subject").val();
    var role = $("#editModal #role").val();
    var token = $("#token").val();

    $.ajax({
        dataType: 'json',
        type:'PUT',
        data: { testData: 'this is a test' , '_method':'PUT'},
        headers: { 'X-CSRF-TOKEN': token },
        url: "user/"+id+"",
        data:{firstname:firstname, lastname:lastname, email:email, password:password, category:category, position:position, subject:subject, role:role}
    }).done(function(data){
        listUser();
        $(".modal").modal('hide');
        toastr.success('Registro modificado.', {timeOut: 5000});

    });
});

$(document).on("click",".remove-dimension",function(){
    $('.did').text($(this).attr('data-id'));
    $('.actionBtn').addClass('delete');
    //$('#delete-dimension').modal('show');
});

$(document).on("click",".delete",function(){
    var token = $("#token").val();
    $.ajax({
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        data: { testData: 'this is a test' , '_method':'DELETE'},
        url: 'user' + '/' + $('.did').text()
    }).done(function(data){
        $('.item' + $('.did').text()).remove();
        toastr.success('Registro eliminado.', {timeOut: 5000});
        listUser();
    });
});

$("#searchUser").keyup(function(){
    $.ajax({
        type:'GET',
        url: 'searchUser',
        data: 'findUser=' + $("#searchUser").val(),
        success: function(data){
            $('#list-users').empty().html(data);
        }
    })
});