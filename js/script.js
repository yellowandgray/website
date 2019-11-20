function registerTask() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/insert_task',
        data: {a: $('#a').val(), b: $('#b').val(), c: $('#c').val(), d: $('#d').val(), member_id: $('#member_id').val(), mobile: $('#mobile').val()},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                $('#a').val('');
                $('#b').val('');
                $('#c').val('');
                $('#d').val('');
                $('#member_id').val('');
                $('#mobile').val('');
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