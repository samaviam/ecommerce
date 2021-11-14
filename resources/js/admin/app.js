//-------- Admin --------//
var spinner = $('#spinner');
$.ajaxSetup({
    beforeSend: () => { spinner.show() },
    complete: () => { spinner.hide() },
});

//-------- Admin Products --------//
remove = id => {
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
            $.toast({
                heading: message[0],
                text: message[1],
                showHideTransition: 'slide',
                icon: 'success',
                loaderBg: '#f96868',
                position: 'top-left',
            });
        }
    });
}
