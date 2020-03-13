jQuery(document).ready(function ($) {

    //===============================================

    // Extra Service add by selected services

    //===============================================
    $(".ex_service_price_add").on("click", function (e) {


        e.preventDefault();

        var $post_id = $(".selected_services").val();

        var ex_service_name = $('.ex_service_name').val();
        var ex_service_price = $('.ex_service_price').val();
        var ex_service_time = $('.ex_service_time').val();

        var fields = '<tr>' +
            '<td><input type="hidden" required value="' + ex_service_name + '" name="ex_service_name" class="ex_service_name" />' + ex_service_name + '</td>' +
            '<td><input type="hidden" value="' + ex_service_price + '" name="ex_service_price" class="ex_service_price" />' + ex_service_price + '</td>' +
            '<td><input type="hidden" value="' + ex_service_time + '" name="ex_service_time" class="ex_service_time" />' + ex_service_time + '</td>' +
            '<td><a href="" class="ex_service_remove button"><span class="dashicons dashicons-trash" style="margin-top: 3px;color: red;"></span> Remove </a></td>' +
            '</tr>';

        $('.service_pricing_table table').append(fields);


        var $last_count = $('.service_price_last_count');
        var $last_count_val = parseInt($last_count.val());

        $last_count_val++;

        $last_count.val($last_count_val);

    });

    //================

    // Remove extra service section specific row

    //================
    $(".extra_service_section").on("click", ".ex_service_remove", function (e) {

        e.preventDefault();

        $(this).closest('tr').remove();
    });


});
