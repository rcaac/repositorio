$(document).ready(function() {
  $('.collapsible').collapsible({
    accordion: false
  });

  $('.modal-trigger').leanModal();

  $(document).on('click', '.delete-option', function() {
    $(this).parent(".input-field").remove();
  });

  // will replace .form-g class when referenced
  var material = '<div class="form-group input-field">' +
    '<label for="option_name">Opciones</label>' +
    '<input class="form-control" name="option_name[]" id="option_name[]" type="text">' +
    '<button type="button" style="float: right" class="btn btn-sm btn-pill btn-danger delete-option"><i class="icon-close"></i></button>'+
    '<button type="button" style="float: right" class="btn btn-sm btn-pill btn-primary add-option"><i class="icon-plus"></i></button>'+
    '</div>';

  var material2 = '<div class="form-group input-field">' +
      '<label for="option_name">Describe</label>' +
      '<input class="form-control" name="option_name[]" id="option_name[]" type="text">' +
      '</div>';

  var material3 = '<div class="form-group input-field">' +
      '<label for="option_name">Describe</label>' +
      '<textarea class="form-control" name="option_name[]"></textarea>' +
      '</div>';

  // for adding new option
  $(document).on('click', '.add-option', function() {
    $(".form-g").append(material);
  });
  // allow for more options if radio or checkbox is enabled
  $(document).on('change', '#question_type', function() {
    var selected_option = $('#question_type :selected').val();
    if (selected_option === "radio" || selected_option === "checkbox") {
      $(".form-g").html(material);
    }else if(selected_option === "text") {
        $(".form-g").html(material2);
    }else if(selected_option === "textarea") {
        $(".form-g").html(material3);
    }else {
      $(".input-g").remove();
    }
  });
});
