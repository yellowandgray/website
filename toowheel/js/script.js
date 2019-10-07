function attachFile(id) {
    $('.loader').addClass('is-active');
    var form = new FormData();
    form.append('file', $('#' + id)[0].files[0]);
    $.ajax({
        type: "POST",
        url: 'admin/v1/upload_file',
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                file = data.result.data;
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