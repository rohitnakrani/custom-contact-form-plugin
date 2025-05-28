jQuery(document).ready(function($) {
    $('#ccfp-contact-form').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        var data = form.serialize();
        $.post(ccfp_ajax_obj.ajax_url, data, function(response) {
            if (response.success) {
                $('#ccfp-response').html(response.data).css('color', 'green');
                form[0].reset();
            } else {
                $('#ccfp-response').html(response.data).css('color', 'red');
            }
        });
    });
});
