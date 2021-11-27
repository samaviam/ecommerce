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

$('.btn-increase, .btn-reduce').click(function () {
    var $this = $(this),
        id = $this.parents('.pr-cart-item').data('item-id'),
        qntInput = $this.siblings('input[name="product-quatity"]'),
        currentVal = parseInt(qntInput.val());
    
    qntInput.val($this.hasClass('btn-increase') ? currentVal + 1 : currentVal > 1 ? currentVal - 1 : currentVal);

    axios({
        method: 'post',
        url: location.origin + '/cart/' + id,
        data: {_method: 'PUT', quantity: qntInput.val()},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    }).then(function ({data}) {
        $('.pr-cart-item[data-item-id="' + id + '"] .sub-total .price').text(data.total);
        $('.minicart .index span').text(data.quantity);
        $('.sub-total-info .index, .total-info .index').text(data.subtotal);
    });
});