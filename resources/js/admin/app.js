//-------- Admin --------//
var spinner = $('#spinner');
$.ajaxSetup({
    beforeSend: () => { spinner.show() },
    complete: () => { spinner.hide() },
});

function showSuccess(message) {
  $.toast({
    heading: message[0],
    text: message[1],
    showHideTransition: 'slide',
    icon: 'success',
    loaderBg: '#f96868',
    position: 'top-left'
  });
}

function showError(message) {
  $.toast({
    heading: message[0],
    text: message[1],
    showHideTransition: 'slide',
    icon: 'error',
    loaderBg: '#f96868',
    position: 'top-left'
  });
}

window.updateStatus = function (id) {
  event.preventDefault();
  var el = event.target;
  $.ajax({
    method: 'POST',
    url: location.origin + location.pathname + '/' + id + '/change-status',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: message => {
      $(el).html($(el).hasClass('badge-danger') ? '<i class="mdi mdi-check"></i> ' + $(el).data('text-active') : '<i class="mdi mdi-close"></i> ' + $(el).data('text-inactive'));
      $(el).toggleClass(['badge-danger', 'badge-success']);
      showSuccess(message);
    },
    error: message => {
      showError(message.responseJSON);
    }
  });
}

window.remove = id => {
    var el = event.target;
    $.ajax({
        method: 'POST',
        url: location.origin + location.pathname + '/' + id,
        data: {'_method': 'DELETE'},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        success: message => {
            $(el).parents('tr').remove();
            showSuccess(message);
        },
        error: message => {
            showError(message.responseJSON);
        }
    });
}

//-------- Admin Create Product --------//
window.toSlug = function (el, input) {
    let str = $(el).val();
    str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
    str = str.replace(/^\s+|\s+$/gm, '');
    str = str.replace(/\s+/g, '-');
    $(input).val(str);
}