function subscribeNewsLetter() {
    $.ajax({
        type: "POST",
        url: './api/v1/subscribe_news_letter',
        data: {name: $('#news_name').val(), email: $('#news_email').val()},
        success: function (data) {
            if (data.result.error === false) {
                $('#news_name').val(''), $('#news_email').val('');
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