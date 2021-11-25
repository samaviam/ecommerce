require('./bootstrap');

$('.add-to-cart-form').submit(function (e) {
    e.preventDefault();
    var form = $(this);
    axios({
        method: 'post',
        url: this.action,
        data: new FormData(this),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    }).then(function ({data}) {
        $('.minicart .index span').text(data.total);
        form.find('.add-to-cart span').css({display: 'flex'});
    });
});

$('.cart-item-delete').submit(function (e) {
    e.preventDefault();
    $(this).closest('.pr-cart-item').remove();
    axios({
        method: 'post',
        url: this.action,
        data: {'_method': 'DELETE'},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    }).then(function ({data}) {
        if (!data.quantity) {
            location.reload();
        }
        $('.minicart .index span').text(data.quantity);
        $('.sub-total-info .index, .total-info .index').text(data.subtotal);
    });
});