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
            success: function(data) {
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
            error: function(err) {
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
        data: { user_name: $('#user_name').val(), student_name: $('#student_name').val(), parent_name: $('#parent_name').val(), profile_picture: avatar, gender: $('#gender').val(), mobile: $('#mobile').val(), city: $('#city').val(), pin: $('#pin').val(), school_name: $('#school_name').val(), standard: $('#standard').val(), email: $('#email').val(), password: $('#password').val(), confirm_password: $('#confirm_password').val() },
        success: function(data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                $('#user_name').val('');
                $('#student_name').val('');
                $('#parent_name').val('');
                $('#gender').val('');
                $("#profile_picture").val('');
                $('#parent_name').val('');
                $('#mobile').val('');
                $('#city').val('');
                $('#pin').val('');
                $('#school_name').val('');
                $('#standard').val('');
                $('#email').val('');
                $('#password').val('');
                $('#confirm_password').val('');
                swal("Thanks for Registration!", "Your Account Has been Created... Please wait, This page automatically go to the login page.", "success");
                setTimeout(function() {
                    window.location = 'login-page';
                }, 5000);
            } else {
                swal("Oops!", data.result.message, "info");
            }
        },
        error: function(err) {
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
        data: { user_name: $('#user-name').val(), password: $('#password1').val() },
        success: function(data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                swal('Yes!', 'You can, and You will', 'success');
                setTimeout(function() {
                    window.location = 'home_subject';
                }, 1000);
            } else {
                swal('Information', data.result.message, 'info');
            }
        },
        error: function(err) {
            $('.loader').removeClass('is-active');
            swal('Error', err.statusText, 'error');
        }
    });
    return false;
}


function logoutUser() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/logout_student',
        data: {},
        success: function(data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
//                swal('Thanks', 'Mr. XXXX for using Feringo to enrich your knowledge and score high marks', 'info');
                setTimeout(function() {
                    window.location = 'index';
                }, 3000);
            } else {
                swal('Information', data.result.message, 'info');
            }
        },
        error: function(err) {
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
        data: { user_name: $('#user_name').val(), password: $('#password').val(), confirm_password: $('#confirm_password').val() },
        success: function(data) {
            $('.loader').removeClass('is-active');
            swal('Information', data.result.message, 'info');
            //            setTimeout(function () {
            //                window.location = 'login-page';
            //            }, 2000);
        },
        error: function(err) {
            $('.loader').removeClass('is-active');
            swal('Error', err.statusText, 'error');
        }
    });
    return false;
}