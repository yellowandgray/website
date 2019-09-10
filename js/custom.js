jQuery(document).ready(function () {
    jQuery("#carm3").change(function () {
        if (jQuery(this).val() === 'Book_a_Training_Session') {
            jQuery('#session-class').show();
        } else {
            jQuery('#session-class').hide();
        }
    });
});


jQuery(document).ready(function () {
    jQuery("#carm3").change(function () {
        if (jQuery(this).val() === 'Rent_our_Space') {
            jQuery('#date-picker').show();
        } else {
            jQuery('#date-picker').hide();
        }
    });
});