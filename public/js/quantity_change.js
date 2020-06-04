$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btn-quantity-change').click(function () {
        let inputString = $('#'+$(this).attr('id')+'-input');
        //increase quantity
        if($(this).val() === '+1'){
            let product = $(this).attr('id');
            $.ajax({
                type: 'PUT',
                url: `/cart/inc_q/${product}`,
                dataType: 'json',
                success: function (data) {
                    $("#cart_count").html(data.count);
                    $("#cart_price").html(data.totalPrice.toFixed(2)+' ₽');
                    $(".order_total_amount").html(data.totalPrice.toFixed(2)+' ₽');
                    $(`.cart_item_quantity_${product}`).html(data.itemQuantity);
                    $(`.cart_item_total_${product}`).html(data.itemTotalPrice.toFixed(2)+' ₽');
                    inputString.val(parseInt(inputString.val())+1);
                },

                error: function (data) {
                    console.log(data.responseJSON);
                }
            });
        //decrease quantity
        } else {
            if (inputString.val() > 1) {
                let product = $(this).attr('id');
                $.ajax({
                    type: 'PUT',
                    url: `/cart/dec_q/${product}`,
                    dataType: 'json',
                    success: function (data) {
                        $("#cart_count").html(data.count);
                        $("#cart_price").html(data.totalPrice.toFixed(2)+' ₽');
                        $(".order_total_amount").html(data.totalPrice.toFixed(2)+' ₽');
                        $(`.cart_item_quantity_${product}`).html(data.itemQuantity);
                        $(`.cart_item_total_${product}`).html(data.itemTotalPrice.toFixed(2)+' ₽');
                        inputString.val(parseInt(inputString.val()) - 1);
                    },

                    error: function (data) {
                        console.log(data.responseJSON);
                    }
                });
            }
        }
    });

});
