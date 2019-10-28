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
var BASE_IMAGE_URL = 'http://www.toowheel.com/toowheel/api/v1/';

function attachFile(id) {
    var val = $('#' + id).val();
    if ($.trim(val) != '') {
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
                        $("#preview_container").removeClass('hidden');
                        $("#upload_container").addClass('hidden');
                        avatar = data.result.data;
                        $("#preview_container img").attr("src", BASE_IMAGE_URL + avatar);
                    }
                    if (id == 'payment_receipt' || id == 'payment_receipt2') {
                        payment_receipt = data.result.data;
                        payment_type = 'receipt';
                        $('#smartwizard').smartWizard("next");
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
                    swal('Information', data.result.message, 'info');
                }
            },
            error: function (err) {
                $('.loader').removeClass('is-active');
                swal('Error', err.statusText, 'error');
            }
        });
    } else {
        if (id != 'profile_image') {
            swal('Information', 'Please attach slip', 'info');
        }
    }
}

function closeProfilePic() {
    $("#profile_image").val('');
    $("#preview_container").addClass('hidden');
    $("#upload_container").removeClass('hidden');
}

function closeReceiptPic() {
    $("#payment_receipt2").val('');
    $("#preview_receipt_container").addClass('hidden');
    $("#upload_receipt_container").removeClass('hidden');
}

function showSlipPreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#preview_receipt_container img').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
    $("#preview_receipt_container").removeClass('hidden');
    $("#upload_receipt_container").addClass('hidden');
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
                loadCategoryByType(type);
            },
            error: function (err) {
                console.log(err.statusText);
            }
        });
        $('#type_error').html('').removeClass('error-msg');
    }
}

function loadProfileUpdateClub(type, clubid) {
    if (type != '') {
        $.ajax({
            type: "GET",
            url: 'api/v1/get_club_by_type/' + type,
            processData: false,
            contentType: false,
            success: function (data) {
                var div = '<option value="0">None</option>';
                if (data.result.error === false) {
                    $('#club_id').empty();
                    $.each(data.result.data, function (key, val) {
                        var selected = '';
                        if (val.club_id == club_id) {
                            div = div + '<option value="' + val.club_id + '" ' + selected + '>' + val.name + '</option>';
                        }
                    });
                    $('#club_id').append(div);
                } else {
                    $('#club_id').empty();
                }
            },
            error: function (err) {
                console.log(err.statusText);
            }
        });
        $('#type_error').html('').removeClass('error-msg');
    }
}

function loadCategoryByType(type) {
    var url = '';
    if (type == 'two_wheel') {
        url = 'get_two_wheel_category';
    } else {
        url = 'get_four_wheel_category';
    }
    $.ajax({
        type: "GET",
        url: 'api/v1/' + url,
        processData: false,
        contentType: false,
        success: function (data) {
            var div = '';
            if (data.result.error === false) {
                $('#filter_category').empty();
                $.each(data.result.data, function (key, val) {
                    div = div + '<option value="' + val.category_id + '">' + val.name + '</option>';
                });
                $('#filter_category').append('<option value="">All</option>' + div);
            } else {
                $('#filter_category').empty();
            }
        },
        error: function (err) {
            console.log(err.statusText);
        }
    });
}

function selectClub(cid, ele) {
    club_id = cid;
    $('.club-box.pointer').removeClass('selected-club');
    $(ele).addClass('selected-club');
}

function removeValidation(id) {
    $('#' + id + '_error').html('').removeClass();
}

function emailVaildation(id) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if (!emailReg.test(id)) {
        alert('Invalid Email Type');
        return;
    }
}

$("#smartwizard").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
    var change = true;
    $('.sw-btn-next').removeClass('hidden');
    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
    switch (stepNumber) {
        case 0:
        case '0':
            if ($.trim($('#type').val()) === '') {
                $('#type_error').html('Select category').addClass('error-msg');
                $('#type').focus();
                change = false;
            }
            if (!$('#terms_agree').is(':checked')) {
                $('#terms_agree_error').html('Accept terms').addClass('error-msg');
                $('#terms_agree').focus();
                change = false;
            }
            if ($.trim($('#cnfpassword').val()) !== $.trim($('#password').val())) {
                $('#cnfpassword_error').html('Password mismatch').addClass('error-msg');
                $('#cnfpassword').focus();
                $(window).scrollTop($('#cnfpassword').position().top);
                change = false;
            }
            if ($.trim($('#password').val()) === '' || $('#password').val().length < 8 || $('#password').val().match(number) == null || $('#password').val().match(alphabets) == null || $('#password').val().match(special_characters) == null) {
                //$('#password_error').html('Enter password').addClass('error-msg');
                $('#password').focus();
                $(window).scrollTop($('#password').position().top);
                change = false;
            }
            if (validateEmail($.trim($('#email').val())) === false) {
                $('#email_error').html('Enter a valid email').addClass('error-msg');
                $('#email').focus();
                $(window).scrollTop($('#email').position().top);
                change = false;
            }
            if ($.trim($('#email').val()) === '') {
                $('#email_error').html('Enter email').addClass('error-msg');
                $('#email').focus();
                $(window).scrollTop($('#email').position().top);
                change = false;
            }
            if ($.trim($('#zip_code').val()) === '') {
                $('#zip_code_error').html('Enter ZIP code').addClass('error-msg');
                $('#zip_code').focus();
                $(window).scrollTop($('#zip_code').position().top);
                change = false;
            }
            if ($.trim($('#state_id').val()) === '') {
                $('#state_id_error').html('Select state').addClass('error-msg');
                $('#state_id').focus();
                change = false;
            }
            if ($.trim($('#country').val()) === '') {
                $('#country_error').html('Enter country').addClass('error-msg');
                $('#country').focus();
                $(window).scrollTop($('#country').position().top);
                change = false;
            }
            if ($.trim($('#address').val()) === '') {
                $('#address_error').html('Enter address').addClass('error-msg');
                $('#address').focus();
                $(window).scrollTop($('#address').position().top);
                change = false;
            }
            if ($.trim($('#contact_number').val()) === '') {
                $('#contact_number_error').html('Enter contact number').addClass('error-msg');
                $('#contact_number').focus();
                $(window).scrollTop($('#contact_number').position().top);
                change = false;
            }
            if ($.trim($('#dob_year').val()) === '') {
                $('#dob_year_error').html('Select year').addClass('error-msg');
                $('#dob_year').focus();
                $(window).scrollTop($('#dob_year').position().top);
                change = false;
            }
            if ($.trim($('#dob_month').val()) === '') {
                $('#dob_month_error').html('Select month').addClass('error-msg');
                $('#dob_month').focus();
                $(window).scrollTop($('#dob_month').position().top);
                change = false;
            }
            if ($.trim($('#dob_date').val()) === '') {
                $('#dob_date_error').html('Select date').addClass('error-msg');
                $('#dob_date').focus();
                $(window).scrollTop($('#dob_date').position().top);
                change = false;
            }
            if ($.trim($('#ic_passport').val()) === '') {
                $('#ic_passport_error').html('Enter passport/IC number').addClass('error-msg');
                $('#ic_passport').focus();
                $(window).scrollTop($('#ic_passport').position().top);
                change = false;
            }
            if ($.trim($('#last_name').val()) === '') {
                $('#last_name_error').html('Enter last name').addClass('error-msg');
                $('#last_name').focus();
                $(window).scrollTop($('#last_name').position().top);
                change = false;
            }
            if ($.trim($('#first_name').val()) === '') {
                $('#first_name_error').html('Enter first name').addClass('error-msg');
                $('#first_name').focus();
                $(window).scrollTop($('#first_name').position().top);
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
            if (stepDirection === 'forward') {
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
        data: {type: $('#type').val(), first_name: $('#first_name').val(), last_name: $('#last_name').val(), profile_picture: avatar, gender: $('#gender').val(), age: $('#age').val(), ic_passport: $('#ic_passport').val(), dob_date: $('#dob_date').val(), dob_month: $('#dob_month').val(), dob_year: $('#dob_year').val(), contact_number: $('#contact_number').val(), address: $('#address').val(), country: $('#country').val(), state_id: $('#state_id').val(), referral_member_id: $('#referral_member_id').val(), referral_club_id: $('#referral_club_id').val(), marital_status: $('#marital_status').val(), zip_code: $('#zip_code').val(), email: $('#email').val(), password: $('#password').val(), club_id: club_id, payment_type: payment_type, paypal_response: paypal_response, paypal_transaction_id: paypal_trans_id, fund_transfer_file: payment_receipt, activated: activated},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                $('#success_member_section').empty();
                var msg = '';
                if (payment_type == 'paypal') {
                    $('#registration_status').html('Registration Successful');
                    msg = '<h5>Congratulations!</h5><p class="text-center" style="margin-bottom: 0">You are now Official Member of TooWheel.</p><strong>Membership ID: ' + data.result.data + '</strong>';
                } else if (payment_type == 'receipt') {
                    $('#registration_status').html('Registration Pending');
                    msg = '<h5>Thank you!</h5><p class="text-center" style="margin-bottom: 0">Verification process may take 24hrs. You will receive a SMS or Email once your account has been activated.</p>';
                } else {
                    $('#registration_status').html('Registration Pending');
                    msg = '<h5>Thank you!</h5><p class="text-center" style="margin-bottom: 0">Please make payment to activate your account</p>';
                }
                $('#success_member_section').append(msg);
                $('#smartwizard').smartWizard("next");
            } else {
                swal('Information', data.result.message, 'info');
            }
        },
        error: function (err) {
            $('.loader').removeClass('is-active');
            swal('Error', err.statusText, 'error');
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
    if ($('#club_list .club-box:not(.hidden)').length === 0) {
        $('#club_list').append('<div id="no_club_found" class="no-club-found">No Club Found</div>');
    } else {
        $('#no_club_found').remove();
        sortClub();
        if (typeof filter_limit !== 'undefined' && filter_limit !== '') {
            $('#club_list .club-box:gt(' + filter_limit + ')').addClass('hidden');
        }
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

function validateEmail(emailField) {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test(emailField) === false) {
        return false;
    }
    return true;
}

function validForgotPasswordForm() {
    var change = true;
    if ($.trim($('#forgotpassword_email').val()) === '') {
        $('#forgotpassword_email_error').html('Enter email').addClass('error-msg');
        change = false;
    }
    if (validateEmail($.trim($('#forgotpassword_email').val())) === false) {
        $('#forgotpassword_email_error').html('Enter a valid email').addClass('error-msg');
        change = false;
    }
    return change;
}

function forgotPassword() {
    if (validForgotPasswordForm()) {
        $('.loader').addClass('is-active');
        $.ajax({
            type: "POST",
            url: 'api/v1/forgotpassword',
            data: {email: $('#forgotpassword_email').val()},
            success: function (data) {
                $('.loader').removeClass('is-active');
                $(".pop").fadeOut('fast');
                swal('Information', data.result.message, 'info');
            },
            error: function (err) {
                $(".pop").fadeOut('fast');
                $('.loader').removeClass('is-active');
                swal('Error', err.statusText, 'error');
            }
        });
    }
}

function validChangePasswordForm() {
    var change = true;
    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
    if ($.trim($('#password').val()) === '' || $('#password').val().length < 8 || $('#password').val().match(number) == null || $('#password').val().match(alphabets) == null || $('#password').val().match(special_characters) == null) {
        $('#password_error').html('Enter password').addClass('error-msg');
        $('#password').focus();
        change = false;
    }
    if ($.trim($('#confirm_password').val()) !== $.trim($('#password').val())) {
        $('#confirm_password_error').html('Password mismatch').addClass('error-msg');
        $('#confirm_password').focus();
        change = false;
    }
    return change;
}

function changePassword(code) {
    if (validChangePasswordForm()) {
        $('.loader').addClass('is-active');
        $.ajax({
            type: "POST",
            url: 'api/v1/reset_password',
            data: {auth: code, password: $('#confirm_password').val()},
            success: function (data) {
                $('.loader').removeClass('is-active');
                swal('Information', data.result.message, 'info');
                setTimeout(function () {
                    window.location = 'login.php?type=two_wheel';
                }, 2000);
            },
            error: function (err) {
                $('.loader').removeClass('is-active');
                swal('Error', err.statusText, 'error');
            }
        });
    }
    return false;
}

function changeUserPassword(code) {
    if (validChangePasswordForm()) {
        $('.loader').addClass('is-active');
        $.ajax({
            type: "POST",
            url: 'api/v1/reset_user_password',
            data: {auth: code, password: $('#confirm_password').val()},
            success: function (data) {
                $('.loader').removeClass('is-active');
                swal('Information', data.result.message, 'info');
                setTimeout(function () {
                    window.location = '../admin';
                }, 2000);
            },
            error: function (err) {
                $('.loader').removeClass('is-active');
                swal('Error', err.statusText, 'error');
            }
        });
    }
    return false;
}

function validUpdatePasswordForm() {
    var change = true;
    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
    if ($.trim($('#curr_password').val()) === '') {
        $('#curr_password_error').html('Enter current password').addClass('error-msg');
        $('#curr_password').focus();
        change = false;
    }
    if ($.trim($('#password').val()) === '' || $('#password').val().length < 8 || $('#password').val().match(number) == null || $('#password').val().match(alphabets) == null || $('#password').val().match(special_characters) == null) {
        $('#password_error').html('Enter new password').addClass('error-msg');
        $('#password').focus();
        change = false;
    }
    if ($.trim($('#confirm_password').val()) !== $.trim($('#password').val())) {
        $('#confirm_password_error').html('New password mismatch').addClass('error-msg');
        $('#confirm_password').focus();
        change = false;
    }
    return change;
}

function updatePassword() {
    if (validUpdatePasswordForm()) {
        $('.loader').addClass('is-active');
        $.ajax({
            type: "POST",
            url: 'api/v1/change_password',
            data: {old_password: $('#curr_password').val(), new_password: $('#password').val()},
            success: function (data) {
                $('.loader').removeClass('is-active');
                $(".password-popup").fadeOut('fast');
                swal('Information', data.result.message, 'info');
            },
            error: function (err) {
                $(".password-popup").fadeOut('fast');
                $('.loader').removeClass('is-active');
                swal('Error', err.statusText, 'error');
            }
        });
    }
}

function updateProfile(id, type) {
    var data = {};
    if (type == 'basic') {
        var dob = new Date($('#dob').val());
        data.age = $('#age').val();
        data.gender = $('#gender').val();
        data.dob_date = dob.getDate();
        data.dob_month = (dob.getMonth() + 1);
        data.dob_year = dob.getFullYear();
        data.address = $('#address').val();
    }
    if (type == 'coverage') {
        if (typeof $('#coverage_spouse_name').val() !== 'undefined') {
            data.coverage_spouse_name = $('#coverage_spouse_name').val();
            data.coverage_spouse_ic = $('#coverage_spouse_ic').val();
            data.coverage_kid1_name = $('#coverage_kid1_name').val();
            data.coverage_kid1_ic = $('#coverage_kid1_ic').val();
            data.coverage_kid2_name = $('#coverage_kid2_name').val();
            data.coverage_kid2_ic = $('#coverage_kid2_ic').val();
            data.coverage_kid3_name = $('#coverage_kid3_name').val();
            data.coverage_kid3_ic = $('#coverage_kid3_ic').val();
        }
        if (typeof $('#coverage_person_name').val() !== 'undefined') {
            data.coverage_person_name = $('#coverage_person_name').val();
            data.coverage_person_ic = $('#coverage_person_ic').val();
            data.coverage_person_address = $('#coverage_person_address').val();
        }
    }
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/update_record/member/member_id=' + id,
        data: data,
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                location.reload();
            } else {
                swal('Information', data.result.message, 'info');
            }
        },
        error: function (err) {
            $('.loader').removeClass('is-active');
            swal('Error', err.statusText, 'error');
        }
    });
}

function enableCoverageEdit() {
    $('.coverage-normal-action-icon').addClass('hidden');
    $('.coverage-edit-action-icon').removeClass('hidden');
    $('.coverage-info-fixed').addClass('hidden');
    $('.coverage-info-edit').removeClass('hidden');
}

function disableCoverageEdit() {
    $('.coverage-normal-action-icon').removeClass('hidden');
    $('.coverage-edit-action-icon').addClass('hidden');
    $('.coverage-info-edit').addClass('hidden');
    $('.coverage-info-fixed').removeClass('hidden');
}

function enableProfileEdit() {
    $('.basic-info-normal-action-icon').addClass('hidden');
    $('.member-basic-info-fixed').addClass('hidden');
    $('.basic-info-edit-action-icon').removeClass('hidden');
    $('.member-basic-info-edit').removeClass('hidden');
}

function disableProfileEdit() {
    $('.basic-info-normal-action-icon').removeClass('hidden');
    $('.basic-info-edit-action-icon').addClass('hidden');
    $('.member-basic-info-edit').addClass('hidden');
    $('.member-basic-info-fixed').removeClass('hidden');
}

function checkPasswordStrength() {
    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
    if ($('#password').val().length < 8) {
        $('#password_error').removeClass();
        $('#password_error').addClass('weak-password');
        $('#password_error').html("Weak (should be atleast 8 characters.)");
    } else {
        if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
            $('#password_error').removeClass();
            $('#password_error').addClass('strong-password');
            $('#password_error').html("Strong");
        } else {
            $('#password_error').removeClass();
            $('#password_error').addClass('medium-password');
            $('#password_error').html("Medium (should include alphabets, numbers and special characters.)");
        }
    }
}

function logoutUser() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/logout_user',
        data: {},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                window.location = 'login.php?type=two_wheel';
            } else {
                swal('Information', data.result.message, 'info');
            }
        },
        error: function (err) {
            $('.loader').removeClass('is-active');
            swal('Error', err.statusText, 'error');
        }
    });
}

function enableProfileImageEdit() {
    $('#profile_image').trigger('click');
}

function changeAvatar(id) {
    if ($('#profile_image')[0]) {
        $('.loader').addClass('is-active');
        var form = new FormData();
        form.append('file', $('#profile_image')[0].files[0]);
        $.ajax({
            type: "POST",
            url: 'api/v1/upload_file',
            processData: false,
            contentType: false,
            data: form,
            success: function (data) {
                if (data.result.error === false) {
                    $.ajax({
                        type: "POST",
                        url: 'api/v1/update_record/member/member_id=' + id,
                        data: {profile_picture: data.result.data},
                        success: function (data) {
                            $('.loader').removeClass('is-active');
                            if (data.result.error === false) {
                                location.reload();
                            } else {
                                swal('Information', data.result.message, 'info');
                            }
                        },
                        error: function (err) {
                            $('.loader').removeClass('is-active');
                            swal('Error', err.statusText, 'error');
                        }
                    });
                } else {
                    $('.loader').removeClass('is-active');
                    swal('Information', data.result.message, 'info');
                }
            },
            error: function (err) {
                $('.loader').removeClass('is-active');
                swal('Error', err.statusText, 'error');
            }
        });
    }
}

function loadEditProfile(type) {
    window.location = 'profile-edit.php?type=' + type;
}

function validUpdateProfile() {
    var change = true;
    if ($.trim($('#type').val()) === '') {
        $('#type_error').html('Select category').addClass('error-msg');
        $('#type').focus();
        change = false;
    }
    if ($.trim($('#zip_code').val()) === '') {
        $('#zip_code_error').html('Enter ZIP code').addClass('error-msg');
        $('#zip_code').focus();
        $(window).scrollTop($('#zip_code').position().top);
        change = false;
    }
    if ($.trim($('#state_id').val()) === '') {
        $('#state_id_error').html('Select state').addClass('error-msg');
        $('#state_id').focus();
        change = false;
    }
    if ($.trim($('#country').val()) === '') {
        $('#country_error').html('Enter country').addClass('error-msg');
        $('#country').focus();
        $(window).scrollTop($('#country').position().top);
        change = false;
    }
    if ($.trim($('#address').val()) === '') {
        $('#address_error').html('Enter address').addClass('error-msg');
        $('#address').focus();
        $(window).scrollTop($('#address').position().top);
        change = false;
    }
    if ($.trim($('#contact_number').val()) === '') {
        $('#contact_number_error').html('Enter contact number').addClass('error-msg');
        $('#contact_number').focus();
        $(window).scrollTop($('#contact_number').position().top);
        change = false;
    }
    if ($.trim($('#dob_year').val()) === '') {
        $('#dob_year_error').html('Select year').addClass('error-msg');
        $('#dob_year').focus();
        $(window).scrollTop($('#dob_year').position().top);
        change = false;
    }
    if ($.trim($('#dob_month').val()) === '') {
        $('#dob_month_error').html('Select month').addClass('error-msg');
        $('#dob_month').focus();
        $(window).scrollTop($('#dob_month').position().top);
        change = false;
    }
    if ($.trim($('#dob_date').val()) === '') {
        $('#dob_date_error').html('Select date').addClass('error-msg');
        $('#dob_date').focus();
        $(window).scrollTop($('#dob_date').position().top);
        change = false;
    }
    if ($.trim($('#ic_passport').val()) === '') {
        $('#ic_passport_error').html('Enter passport/IC number').addClass('error-msg');
        $('#ic_passport').focus();
        $(window).scrollTop($('#ic_passport').position().top);
        change = false;
    }
    if ($.trim($('#last_name').val()) === '') {
        $('#last_name_error').html('Enter last name').addClass('error-msg');
        $('#last_name').focus();
        $(window).scrollTop($('#last_name').position().top);
        change = false;
    }
    if ($.trim($('#first_name').val()) === '') {
        $('#first_name_error').html('Enter first name').addClass('error-msg');
        $('#first_name').focus();
        $(window).scrollTop($('#first_name').position().top);
        change = false;
    }
    return change;
}

function updateMemberProfile(mid, type) {
    if (validUpdateProfile()) {
        var data = {type: $('#type').val(), first_name: $('#first_name').val(), last_name: $('#last_name').val(), gender: $('#gender').val(), age: $('#age').val(), marital_status: $('#marital_status').val(), ic_passport: $('#ic_passport').val(), dob_date: $('#dob_date').val(), dob_month: $('#dob_month').val(), dob_year: $('#dob_year').val(), contact_number: $('#contact_number').val(), address: $('#address').val(), state_id: $('#state_id').val(), zip_code: $('#zip_code').val(), referral_member_id: $('#referral_member_id').val(), referral_club_id: $('#referral_club_id').val()};
        $('.loader').addClass('is-active');
        $.ajax({
            type: "POST",
            url: 'api/v1/update_record/member/member_id=' + mid,
            data: data,
            success: function (data) {
                $('.loader').removeClass('is-active');
                if (data.result.error === false) {
                    window.location = 'my-account.php?type=' + type;
                } else {
                    swal('Information', data.result.message, 'info');
                }
            },
            error: function (err) {
                $('.loader').removeClass('is-active');
                swal('Error', err.statusText, 'error');
            }
        });
    }
    return false;
}