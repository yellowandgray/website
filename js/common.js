var avatar = '';
var BASE_IMAGE_URL = 'api/v1/';

function attachFile(id) {
    var val = $('#' + id).val();
    var checkfiletype = false;
    if ($.trim(val) != '' && checkfiletype == false) {
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
                    if (id == 'profile_picture') {
                        $("#preview_container").removeClass('hidden');
                        $("#upload_container").addClass('hidden');
                        avatar = data.result.data;
                        $("#preview_container img").attr("src", BASE_IMAGE_URL + avatar);
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
        if (id != 'profile_picture' && checkfiletype == false) {
            swal('Information', 'Please attach profile', 'info');
        }
    }
}

function registerStudent() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/insert_student',
       data: {student_name: $('#student_name').val(), user_name: $('#user_name').val(), password: $('#password').val(), confirm_password: $('#confirm_password').val(), mobile: $('#mobile').val(), email: $('#email').val(), profile_picture: avatar, gender: $('#gender').val(), graduation: $('#graduation').val(), street: $('#street').val(), city: $('#city').val(), district: $('#district').val(), pin: $('#pin').val(), nearcity: $('#nearcity').val(), selectgroup: $('#selectgroup').val()},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                window.location = 'login-page';
//                $('#user_name').val('');
//                $('#student_name').val('');
//                $('#graduation').val('');
//                $('#gender').val('');
//                $("#profile_picture").val('');
//                $('#mobile').val('');
//                $('#street').val('');
//                $('#city').val('');
//                $('#pin').val('');
//                $('#district').val('');
//                $('#nearcity').val('');
//                $('#email').val('');
//                $('#password').val('');
//                $('#confirm_password').val('');
//                $('#group_one').val('');
//                $('#group_ywo').val('');
                swal("Thanks for Registration!", "Your Account Has been Created... Please wait, This page automatically go to the login page.", "success");
                setTimeout(function () {
                    window.location = 'login-page';
                }, 3000);
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

function loginStudent() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/loginstudent',
        data: {user_name: $('#user-name').val(), password: $('#password1').val()},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                swal('Yes!', 'You can, and You will', 'success');
                setTimeout(function () {
                    window.location = 'member-home';
                }, 3000);
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
function samplehomelogin() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/samplelogin',
        data: {name: $('#name').val(), phone: $('#phone').val(), email: $('#email').val()},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                window.location = 'sample-language';
                $('#name').val('');
                $('#phone').val('');
                $('#email').val('');
//                swal("Thanks for Registration!", "Your Account Has been Created... Please wait, This page automatically go to the login page.", "success");
                setTimeout(function () {
                    window.location = 'sample-intro';
                }, 3000);
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


function samplelogin() {
    $.ajax({
        type: "POST",
        url: 'api/v1/get_start',
        data: {email: $('#email').val()},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                window.location = 'sample-language';
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


function samplebuyregister() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/buy_user_register',
        data: {firstname: $('#fname').val(), lastname: $('#lname').val(), gender: $('#gender').val(), phone: $('#phone').val(), email: $('#email').val(), address: $('#address').val()},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                $('#fname').val('');
                $('#lname').val('');
                $('#mobile').val('');
                $('#email').val('');
                $('#gender').val('');
                $('#address').val('');
                swal("Thanks for Registration!", "Your Account Has been Created... Please wait, This page automatically go to the login page.", "success");
                setTimeout(function () {
                    window.location = 'login-page';
                }, 3000);
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



function logoutUser(name) {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/logout_student',
        data: {},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                swal('', 'Thanks ' + name + ' for using Exam Horse to enrich your knowledge and score high marks', 'info');
                setTimeout(function () {
                    window.location = 'index';
                }, 3000);
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

function closeProfilePic() {
    $("#profile_picture").val('');
    $("#preview_container").addClass('hidden');
    $("#upload_container").removeClass('hidden');
}

function changePassword() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/reset_password',
        data: {user_name: $('#user_name').val(), password: $('#password').val(), confirm_password: $('#confirm_password').val()},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                swal('Information', data.result.message, 'success');
                $('#user_name').val('');
                $('#password').val('');
                $('#confirm_password').val('');
                setTimeout(function () {
                    window.location = 'login-page';
                }, 2000);
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