(function ($) {

    $(window).load(function () {
        // Import users notice dismiss clicked
        $('#sab_import_notice button.notice-dismiss').on('click', function () {
            var data = {
                'action': 'hide_import_notice',
            };

            $.post(ajaxurl, data, function (response) {
            });

        });
    });
})(jQuery);