require('./bootstrap');

function updateMiniCart(quantity) {
    $('.minicart .index span').text(quantity);
}

$('#search').keyup(function () {
    var search = $(this).val();
    if (search) {
      axios({
          method: 'get',
          url: location.origin + '/search?product=' + search,
      }).then(function ({data}) {
          $('#suggestions').html(data).show();
      });
    }
});

$('#search').blur(function () {
    $('#suggestions').hide().html('');
});

$('body').on('submit', '.add-to-cart-form', function (e) {
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
        updateMiniCart(data.total);
        window.localStorage.setItem('cart', JSON.stringify({quantity: data.total}));
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
        updateMiniCart(data.quantity);
        window.localStorage.setItem('cart', JSON.stringify({quantity: data.quantity}));
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
        updateMiniCart(data.quantity);
        window.localStorage.setItem('cart', JSON.stringify({quantity: data.quantity}));
        $('.sub-total-info .index, .total-info .index').text(data.subtotal);
    });
});

$('select[name="order-by"], select[name="per-page"]').chosen().change(function () {
    var name = $(this).attr('name'),
        value = $(this).val();

    axios({
        method: 'get',
        url: location.href + `?${name}=${value}`,
    }).then(function ({data}) {
        $('.products.row').html(data);
    });
});

$(document).ready(function () {
    Echo.channel('cart-updated')
        .listen('CartUpdated', function (e) {
            console.log(e);
            // $('.minicart .index span').text(e.quantity);
            // $('.sub-total-info .index, .total-info .index').text(e.subtotal);
        });

    window.addEventListener('storage', event => {
        switch (event.key) {
            case 'cart':
                updateMiniCart(JSON.parse(event.newValue).quantity);
                break;
        }
    });
});
