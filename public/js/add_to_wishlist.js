$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".product_fav").click(function () {
        let item = $(this).children(".product_fav_value").val();
        console.log();
        let btn = $(this);
        if ($(this).hasClass("active")) {
            $.ajax({
                type: 'delete',
                url: `/wishlist/delete/${item}`,
                dataType: 'json',
                success: function (data) {
                    $(".wishlist_count").html(data.count);
                    btn.removeClass("active");
                    console.log(data.count);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        } else {
            $.ajax({
                type: 'post',
                url: `/wishlist/${item}`,
                dataType: 'json',
                success: function (data) {
                    $(".wishlist_count").html(data.count);
                    btn.addClass("active");
                    console.log(data.count);
                },
                error: function (data) {
                    console.log(data.responseJSON);
                }
            });
        }
    });
});
