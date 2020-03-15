jQuery(document).ready(function ($) {

    //===============================================

    // Extra Service add by selected services

    //===============================================

    $(".ex_time_add").on("click", function (e) {

        e.preventDefault();


        var $last_count = $('.ex_time_last_count');
        var $last_count_val = parseInt($last_count.val());

        $last_count_val++;

        $last_count.val($last_count_val);


        var fields = '<p><input type="text" name="ex_time[' + $last_count_val + '][start_time]" class="datepicker time_field" > - <input type="text" name="ex_time[' + $last_count_val + '][end_time]" class="datepicker time_field" >' +
            '<a href="" class="button ex_time_remove"><span class="dashicons dashicons-trash" style="margin-top: 3px;color: red;"></span>Remove</a></p>';

        $('.ex_date_time_section .time_input').append(fields);


    });

    //================

    // Remove extra service section specific row

    //================
    $(".ex_date_time_section").on("click", ".ex_time_remove", function (e) {

        e.preventDefault();

        $(this).closest('p').remove();
    });

    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
    });


});
