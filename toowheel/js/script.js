var avatar = '';
var payment_receipt = '';
var paypal_trans_id = '';
var paypal_response = '';
var payment_type = '';
var club_id = 0;
var inserted = false;
var cover_image = '';
var logo = '';
var activated = 0;
var club_video = '';
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
                    payment_type = 'receipt';
                }
                if (id == 'cover_image') {
                    cover_image = data.result.data;
                }
                if (id == 'logo') {
                    logo = data.result.data;
                }
                if (id == 'club_video') {
                    club_video = data.result.data;
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
                    $('#club_list').empty();
                    $.each(data.result.data, function (key, val) {
                        var rank = '';
                        if (val.rank != '' && val.rank != 0) {
                            rank = '<span>#' + val.rank + '</span>';
                        }
                        div = div + '<div class="club-box pointer col-md-2 col-sm-6" onclick="selectClub(' + val.club_id + ', this);"data-name="' + val.name + '" data-state="' + val.state_id + '" data-category="' + val.category_id + '"><div class="rank-button">' + rank + '</div><img src="' + BASE_IMAGE_URL + val.logo + '" alt="" /><h3>' + val.name + '</h3><p>' + val.city + '</p><div class="club-btn"><div class="eff-9"></div><a href="club-page.php?cid=' + val.club_id + '" target="_blank">Read More</a></div></div>';
                    });
                    $('#club_list').append(div);
                } else {
                    $('#club_list').empty();
                }
            },
            error: function (err) {
                console.log(err.statusText);
            }
        });
        $('#type_error').html('').removeClass('error-msg');
    }
}

function selectClub(cid, ele) {
    club_id = cid;
    $('.club-box.pointer').removeClass('selected-club');
    $(ele).addClass('selected-club');
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
            if ($.trim($('#state_id').val()) === '') {
                $('#state_id_error').html('Select state').addClass('error-msg');
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
            if (change == true) {
                $.ajax({
                    type: "POST",
                    url: 'api/v1/check_member_exist',
                    data: {email: $('#email').val()},
                    success: function (data) {
                        if (data.result.error === true) {
                            $('#smartwizard').smartWizard("prev");
                            swal('Information', data.result.message, 'info');
                        }
                    },
                    error: function (err) {
                        swal('Error', err.statusText, 'error');
                    }
                });
            }
            break;
        case '2':
        case 2:
            if (payment_type !== '') {
                if (inserted == false) {
                    registerMember();
                    change = false;
                    inserted = true;
                } else {
                    change = true;
                }
            } else {
                swal('Information', 'Please select payment method', 'info');
                change = false;
            }
            break;
        default:
            break;
    }
    return change;
});

function uploadLater() {
    inserted = true;
    registerMember();
}

function skipClubSelection() {
    club_id = 0;
    $('#smartwizard').smartWizard("next");
}

function registerMember() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/insert_member',
        data: {type: $('#type').val(), first_name: $('#first_name').val(), profile_picture: avatar, gender: $('#gender').val(), age: $('#age').val(), ic_passport: $('#ic_passport').val(), dob_date: $('#dob_date').val(), dob_month: $('#dob_month').val(), dob_year: $('#dob_year').val(), contact_number: $('#contact_number').val(), license_category: $('#license_category').val(), address: $('#address').val(), country: $('#country').val(), state_id: $('#state_id').val(), referral_member_id: $('#referral_member_id').val(), referral_club_id: $('#referral_club_id').val(), coverage_full_name: $('#coverage_full_name').val(), coverage_contact_number: $('#coverage_contact_number').val(), coverage_address: $('#coverage_address').val(), email: $('#email').val(), password: $('#password').val(), club_id: club_id, payment_type: payment_type, paypal_response: paypal_response, paypal_transaction_id: paypal_trans_id, fund_transfer_file: payment_receipt, activated: activated},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                $('#success_member_section').empty();
                var msg = '';
                if (payment_type == 'paypal') {
                    msg = '<h5>Congratulations!</h5><p class="text-center" style="margin-bottom: 0">You are now Official Member of TooWheel.</p><strong>Membership ID: ' + data.result.data + '</strong>';
                } else if (payment_type == 'receipt') {
                    msg = '<h5>Thank you!</h5><p class="text-center" style="margin-bottom: 0">Verification process may take 24hrs. You will receive an SMS or Email once your account has been activated</p>';
                } else {
                    msg = '<h5>Thank you!</h5><p class="text-center" style="margin-bottom: 0">Please make payment to activate your account</p>';
                }
                $('#success_member_section').append(msg);
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

function registerClub() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/insert_club',
        data: {type: $('#type').val(), category_id: $('#category_id').val(), name: $('#name').val(), cover_image: cover_image, logo: logo, state: $('#state').val(), city: $('#city').val(), zip: $('#zip').val(), landmark: $('#landmark').val(), address: $('#address').val(), club_leader_name: $('#club_leader_name').val(), no_of_member: $('#no_of_member').val(), email: $('#email').val(), mobile: $('#mobile').val(), about: $('#about').val(), facebook_link: $('#facebook_link').val(), youtube_link: $('#youtube_link').val(), twitter_link: $('#twitter_link').val(), instagram_link: $('#instagram_link').val(), rank: 0, published: 0, source: 'web', club_video: club_video},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                $('#type').val('');
                $('#category_id').val('');
                $('#name').val('');
                cover_image = '';
                logo = '';
                $('#state').val('')
                $('#city').val('');
                $('#zip').val('')
                $('#landmark').val('');
                $('#address').val('');
                $('#club_leader_name').val('');
                $('#no_of_member').val('');
                $('#email').val('');
                $('#mobile').val('');
                $('#about').val('');
                $('#facebook_link').val('');
                $('#youtube_link').val('');
                $('#twitter_link').val('');
                $('#instagram_link').val('');
                club_video = '';
                swal("Thank you!", " Our Team will get in touch with you soon.", "success");
            } else {
                swal("Oops!", data.result.message, "info");
            }
        },
        error: function (err) {
            $('.loader').removeClass('is-active');
            swal("Oops!", err.statusText, "error");
        }
    });
    return false;
}

function renderCategory(type) {
    $('#category_id').empty();
    if (type != '') {
        $.ajax({
            type: "GET",
            url: 'api/v1/get_' + type + '_category',
            success: function (data) {
                if (data.result.error === false) {
                    var option = '<option value="">Category</option>';
                    $.each(data.result.data, function (key, val) {
                        option = option + '<option value="' + val.category_id + '">' + val.name + '</option>';
                    });
                    $('#category_id').append(option);
                }
            },
            error: function (err) {
                console.log(err.statusText);
            }
        });
    } else {
        $('#category_id').append('<option value="">Category</option>');
    }
}

function filterClub() {
    var filter_name = ($('#filter_name').val()).toLowerCase();
    var filter_category = $('#filter_category').val();
    var filter_limit = $('#filter_limit').val();
    var filter_state = $('#filter_state').val();
    $('.club-box').removeClass('hidden');
    $('.club-box').each(function (index, ele) {
        if (filter_name !== '') {
            if (typeof $(ele).data('name') !== 'undefined' && (($(ele).data('name')).toLowerCase()).indexOf(filter_name) < 0) {
                $(ele).addClass('hidden');
            }
        }
        if (filter_category !== '') {
            if (typeof $(ele).data('category') !== 'undefined' && $(ele).data('category') != filter_category) {
                $(ele).addClass('hidden');
            }
        }
        if (filter_state !== '') {
            if (typeof $(ele).data('state') !== 'undefined' && $(ele).data('state') != filter_state) {
                $(ele).addClass('hidden');
            }
        }
    });
    sortClub();
    if (typeof filter_limit !== 'undefined' && filter_limit !== '') {
        $('#club_list .club-box:gt(' + filter_limit + ')').addClass('hidden');
    }
    return false;
}

function sortClub() {
    var filter_order = $('#filter_order').val();
    var items = $('#club_list .club-box');
    if (filter_order == 'asc') {
        items.sort(function (a, b) {
            return ($(b).data('name')) < ($(a).data('name')) ? 1 : -1;
        });
    } else {
        items.sort(function (a, b) {
            return ($(b).data('name')) > ($(a).data('name')) ? 1 : -1;
        });
    }
    items.appendTo('#club_list');
}

function subscribeNewsLetter() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/subscribe_news_letter',
        data: {email: $('#newsletter_email').val()},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                $('#newsletter_email').val('');
                swal("Thanks for the subscription", "we will get in touch with you", "success");
            } else {
                swal("Oops!", data.result.message, "info");
            }
        },
        error: function (err) {
            swal("Oops!", err.statusText, "error");
        }
    });
    return false;
}

function loginMember() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/loginmember',
        data: {email: $('#email').val(), password: $('#password').val()},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                window.location = 'my-account.php?type=two_wheel';
            } else {
                swal('Information', data.result.message, 'info');
            }
        },
        error: function (err) {
            $('.loader').removeClass('is-active');
            swal('Error', err.statusText, 'error');
        }
    });
    return false;
}