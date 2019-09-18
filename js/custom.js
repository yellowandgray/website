var add_date_rows = 0;
jQuery(document).ready(function () {
    jQuery("#carm3").change(function () {
        if (jQuery(this).val() === 'Book_a_Coaching_and_Training_Session') {
            jQuery('#session-class').show();
        } else {
            jQuery('#session-class').hide();
        }
    });
    jQuery("#carm3").change(function () {
        if (jQuery(this).val() === 'Rent_a_Space') {
            jQuery('#date-picker').show();
        } else {
            jQuery('#date-picker').hide();
        }
    });
    jQuery("#carm3").change(function () {
        if (jQuery(this).val() === 'Others') {
            jQuery('#other-text').show();
        } else {
            jQuery('#other-text').hide();
        }
    });
});
function submitRecordDate() {
    if (validDateTime()) {
        var name = $.trim($('#name').val());
        var email = $.trim($('#email').val());
        var mobile = $.trim($('#mobile').val());
        var notes_message = $.trim($('#notes_message').val());
        var dates = [];
        var row = 0;
        $('.datepicker').each(function (key, ele) {
            if (typeof dates[key] === 'undefined') {
                dates[key] = {};
            }
            dates[key].date = ele.value;
        });
        $('.timepicker').each(function (key, ele) {
            if (key % 2 === 0) {
                dates[row].from_time = ele.value;
            } else {
                dates[row].to_time = ele.value;
                row = row + 1;
            }
        });
        swal({
            title: "Confirmation",
            text: "Your'e booking " + row + ' space',
            icon: "info",
            button: {
                text: 'Yes',
                closeModal: false
            }
        }).then((book) => {
            if (book) {
                $.ajax({
                    type: "POST",
                    url: 'api/v1/space_rent',
                    data: {name: name, email: email, mobile: mobile, notes: notes_message, dates: dates},
                    success: function (data) {
                        if (data.result.code === 200) {
                            $('#name').val('');
                            $('#email').val('');
                            $('#mobile').val('');
                            $('#notes_message').val('');
                            $('#new_date_section').empty();
                            $('.timepicker').val('');
                            $('.datepicker').val('');
                            swal("Thanksyou for Booking with us.", data.result.message, "success");
                        } else {
                            swal("Failed", data.result.message, "error");
                        }
                    },
                    error: function (err) {
                        swal("Alert", err.statusText, "info");
                    }
                });
            }
        });
    }
}

function validDateTime() {
    var msg = '';
    var error = false;
    var row = 0;
    var name = $.trim($('#name').val());
    var email = $.trim($('#email').val());
    var mobile = $.trim($('#mobile').val());
    $('.datepicker').each(function (key, ele) {
        if ($.trim(ele.value) === '') {
            msg = 'Select date in row ' + (key + 1);
            error = true;
            return false;
        }
    });
    $('.timepicker').each(function (key, ele) {
        if (key % 2 === 0) {
            row = row + 1;
        }
        if ($.trim(ele.value) === '') {
            var time = 'from';
            if (key % 2 === 1) {
                time = 'to';
            }
            msg = 'Select ' + time + ' time in row ' + row;
            error = true;
            return false;
        }
    });
    if (error === true) {
        swal("Alert", msg, "info");
        return false;
    }
    if (name === '') {
        swal("Alert", 'Please enter your name', "info");
        return false;
    }
    if (email === '') {
        swal("Alert", 'Please enter your email', "info");
        return false;
    }
    if (mobile === '') {
        swal("Alert", 'Please enter your mobile', "info");
        return false;
    }
    return true;
}

function addDateRow() {
    add_date_rows = add_date_rows + 1;
    var row = '<div class="row" id="add_date_row_' + add_date_rows + '"><div class="col-md-3 mb-3 mb-md-4"><div><input type="text" placeholder="Select Date" class="datepicker" /></div></div><div class="col-md-5 mb-3 mb-md-4" id="time-picker"><div class="flex-row"><div class="margin-tb-5 time-overlay"><input type="text" placeholder="From Time" class="timepicker" /><input type="text" placeholder="To Time" class="timepicker" /></div></div><div id="time_container"></div></div><div class="col-md-4"><button class="btn btn-cancel" id="timeButton" onclick="removeDateRow(' + add_date_rows + '); "><span>Remove</span></button></div></div>';
    $('#new_date_section').append(row);
    $('.timepicker').timepicker();
    $('.datepicker').datepicker();
}

function removeDateRow(id) {
    $('#add_date_row_' + id).remove();
}