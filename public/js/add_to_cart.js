$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".buy_button_single").click(function () {
        let product = $(this).val();
        $.ajax({
            type: 'post',
            url: `/cart/${product}`,
            dataType: 'json',
            success: function (data) {
                $("#cart_count").html(data.count);

                console.log(data.totalPrice);
                $("#cart_price").html('$'+data.totalPrice.toFixed(2));
                $('#modal').modal('show');
            },

            error: function (data) {
                console.log(data.responseJSON);
            }
        });
    });
});
