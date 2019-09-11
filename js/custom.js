jQuery(document).ready(function () {
    jQuery("#carm3").change(function () {
        if (jQuery(this).val() === 'Book_a_Coaching_and_Training_Session') {
            jQuery('#session-class').show();
        } else {
            jQuery('#session-class').hide();
        }
    });
});


jQuery(document).ready(function () {
    jQuery("#carm3").change(function () {
        if (jQuery(this).val() === 'Rent_a_Space') {
            jQuery('#date-picker').show();
        } else {
            jQuery('#date-picker').hide();
        }
    });
});

jQuery(document).ready(function () {
    jQuery("#carm3").change(function () {
        if (jQuery(this).val() === 'Others') {
            jQuery('#other-text').show();
        } else {
            jQuery('#other-text').hide();
        }
    });
});
