$(document).ready(function() {
    $('.quantity-plus').on('click', function() {
        var maxValue = $('.product-counter').attr('max');
        $('.product-counter').val(function(cur, val) {
            if(val < maxValue) {
                return ++val;
            } else {
                return val;
            }
        });
    });

    $('.quantity-minus').on('click', function() {
        var minValue = $('.product-counter').attr('min');
        $('.product-counter').val(function(cur, val) {
            if(val > minValue) {
                return --val;
            } else {
                return val;
            }
        });
    });

    $('.buy-btn').on('click', function() {
        var productId = $('.product-id').val();
        var productName = $('.product-name').text();
        var productPrice = $('.product-price').text();
        var productQuantity = $('.product-counter').val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        //*/
        $.ajax({
            method: 'POST',
            url: '/order/save',
            data: {
                _token: CSRF_TOKEN,
                product_id: productId,
                product_name: productName,
                price: productPrice,
                quantity: productQuantity
            },
            success: function() {
                $('.order-result').html('Товар приобретен');
            }
        });
        //*/

    });
});
