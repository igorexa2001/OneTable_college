$(document).ready(function () {
    $('#sort_select').change(function () {
        $('#sort_select_hidden').val($(this).val());
        $('#filter_form').submit();
    });
});

