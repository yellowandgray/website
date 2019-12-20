function registerStudent() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/insert_student',
        data: {user_name: $('#user_name').val(), student_name: $('#student_name').val(), parent_name: $('#parent_name').val(), mobile: $('#mobile').val(), city: $('#city').val(), pin: $('#pin').val(), school_name: $('#school_name').val(), select_standard: $('#select_standard').val(), email: $('#email').val(), password: $('#password').val(), confirm_password: $('#confirm_password').val()},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                $('#user_name').val('');
                $('#student_name').val('');
                $('#parent_name').val('');
                $('#mobile').val('');
                $('#city').val('');
                $('#pin').val('')
                $('#school_name').val('');
                $('#select_standard').val('');
                $('#email').val('');
                $('#password').val('');
                $('#confirm_password').val('');
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

function loginStudent() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/loginstudent',
        data: {user_name: $('#user-name').val(), password: $('#password1').val()},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                window.location = 'home_subject';
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