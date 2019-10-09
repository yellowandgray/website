var avatar = '';
var payment_receipt = '';
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
                        if (val.rank != '') {
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
                $('#type_error').html('Select type').addClass('error-msg');
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
        default:
            break;
    }
    return change;
});

function skipClubSelection() {
    $('#smartwizard').smartWizard("next");
}

function leaveAStepCallback(obj, context) {
    alert('fffffffffff');
    alert("Leaving step " + context.fromStep + " to go to step " + context.toStep);
    return validateSteps(context.fromStep); // return false to stay on step and true to continue navigation 
}

function onFinishCallback(objs, context) {
    if (validateAllSteps()) {
        $('form').submit();
    }
}

// Your Step validation logic
function validateSteps(stepnumber) {
    var isStepValid = true;
    // validate step 1
    if (stepnumber == 1) {
        // Your step validation logic
        // set isStepValid = false if has errors
    }
    // ...      
}

function validateAllSteps() {
    var isStepValid = true;
    // all step validation logic     
    return isStepValid;
}