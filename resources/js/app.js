require('./bootstrap');

$('#add-to-cart-form').submit(function (e) {
    e.preventDefault();
    axios({
        method: 'post',
        url: location.origin + '/cart',
        data: new FormData(this),
    }).then(function ({data}) {
        $('.minicart .index span').text(data.total);
        $('.add-to-cart span').css({display: 'flex'});
    });
});