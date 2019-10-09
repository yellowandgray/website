var avatar = '';
var payment_receipt = '';
var paypal_trans_id = '';
var paypal_response = '';
var payment_type = '';
var club_id = 0;
var inserted = false;
var BASE_IMAGE_URL = 'http://www.toowheel.com/beta/toowheel/api/v1/';

function attachFile(id) {
    $('.loader').addClass('is-active');
    var form = new FormData();
    form.append('file', $('#' + id)[0].files[0]);
    $.ajax({
        type: "POST",
        url: 'api/v1/upload_file',
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                if (id == 'profile_image') {
                    avatar = data.result.data;
                }
                if (id == 'payment_receipt' || id == 'payment_receipt2') {
                    payment_receipt = data.result.data;
                }
            } else {
                bootbox.alert(data.result.message);
            }
        },
        error: function (err) {
            $('.loader').removeClass('is-active');
            bootbox.alert(err.statusText);
        }
    });
}

function loadClubs(type) {
    if (type != '') {
        $.ajax({
            type: "GET",
            url: 'api/v1/get_club_by_type/' + type,
            processData: false,
            contentType: false,
            success: function (data) {
                var div = '';
                if (data.result.error === false) {
                    $('#category_clubs').empty();
                    $.each(data.result.data, function (key, val) {
                        var rank = '';
                        if (val.rank != '' && val.rank != 0) {
                            rank = '<span>#' + val.rank + '</span>';
                        }
                        div = div + '<div class="col-md-3 col-sm-6"><div class="club-box">' + rank + '<img src="' + BASE_IMAGE_URL + val.logo + '" alt="" /><h3>' + val.name + '</h3><p>' + val.city + '</p><div class="club-btn"><div class="eff-9"></div><a href="club-page.php?cid=' + val.club_id + '">Read More</a></div></div></div>';
                    });
                    $('#category_clubs').append(div);
                } else {
                    $('#category_clubs').empty();
                }
            },
            error: function (err) {
                console.log(err.statusText);
            }
        });
        $('#type_error').html('').removeClass('error-msg');
    }
}

function removeValidation(id) {
    $('#' + id + '_error').html('').removeClass('error-msg');
}

$("#smartwizard").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
    var change = true;
    switch (stepNumber) {
        case 0:
        case '0':
            if ($.trim($('#type').val()) === '') {
                $('#type_error').html('Select category').addClass('error-msg');
                change = false;
            }
            if ($.trim($('#first_name').val()) === '') {
                $('#first_name_error').html('Enter first name').addClass('error-msg');
                change = false;
            }
            if ($.trim($('#ic_passport').val()) === '') {
                $('#ic_passport_error').html('Enter passport/IC number').addClass('error-msg');
                change = false;
            }
            if ($.trim($('#dob_date').val()) === '') {
                $('#dob_date_error').html('Select date').addClass('error-msg');
                change = false;
            }
            if ($.trim($('#dob_month').val()) === '') {
                $('#dob_month_error').html('Select month').addClass('error-msg');
                change = false;
            }
            if ($.trim($('#dob_year').val()) === '') {
                $('#dob_year_error').html('Select year').addClass('error-msg');
                change = false;
            }
            if ($.trim($('#contact_number').val()) === '') {
                $('#contact_number_error').html('Enter contact number').addClass('error-msg');
                change = false;
            }
            if ($.trim($('#license_category').val()) === '') {
                $('#license_category_error').html('Select license category').addClass('error-msg');
                change = false;
            }
            if ($.trim($('#address').val()) === '') {
                $('#address_error').html('Enter address').addClass('error-msg');
                change = false;
            }
            if ($.trim($('#country').val()) === '') {
                $('#country_error').html('Enter country').addClass('error-msg');
                change = false;
            }
            if ($.trim($('#state').val()) === '') {
                $('#state_error').html('Enter state').addClass('error-msg');
                change = false;
            }
            if ($.trim($('#email').val()) === '') {
                $('#email_error').html('Enter email').addClass('error-msg');
                change = false;
            }
            if ($.trim($('#password').val()) === '') {
                $('#password_error').html('Enter password').addClass('error-msg');
                change = false;
            }
            if ($.trim($('#cnfpassword').val()) !== $.trim($('#password').val())) {
                $('#cnfpassword_error').html('Password mismatch').addClass('error-msg');
                change = false;
            }

            break;
        case '2':
        case 2:
            if (inserted == false) {
                registerMember();
                change = false;
                inserted = true;
            } else {
                change = true;
            }
            break;
        default:
            break;
    }
    return change;
});

function skipClubSelection() {
    $('#smartwizard').smartWizard("next");
}

function registerMember() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/insert_member',
        data: {type: $('#type').val(), first_name: $('#first_name').val(), profile_picture: avatar, gender: $('#gender').val(), age: $('#age').val(), ic_passport: $('#ic_passport').val(), dob_date: $('#dob_date').val(), dob_month: $('#dob_month').val(), dob_year: $('#dob_year').val(), contact_number: $('#contact_number').val(), license_category: $('#license_category').val(), address: $('#address').val(), country: $('#country').val(), state: $('#state').val(), referral_member_id: $('#referral_member_id').val(), referral_club_id: $('#referral_club_id').val(), coverage_full_name: $('#coverage_full_name').val(), coverage_contact_number: $('#coverage_contact_number').val(), coverage_address: $('#coverage_address').val(), email: $('#email').val(), password: $('#password').val(), club_id: club_id, payment_type: payment_type, paypal_response: paypal_response, paypal_transaction_id: paypal_trans_id, fund_transfer_file: payment_receipt},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                $('#smartwizard').smartWizard("next");
            } else {
                bootbox.alert(data.result.message);
            }
        },
        error: function (err) {
            $('.loader').removeClass('is-active');
            bootbox.alert(err.statusText);
        }
    });
}