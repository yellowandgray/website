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

function MemberInsert() {
    $.ajax({
        type: "POST",
        url: './api/v1/insert_front_member',
        data: {fname: $('#fname').val(), lname: $('#lname').val(), mobile: $('#mobile').val(), address: $('#address').val(), state: $('#state').val(), city: $('#city').val(), pincode: $('#pincode').val(), email: $('#email').val(), altmobile: $('#altmobile').val()},
        success: function (data) {
            if (data.result.error === false) {
                $('#name').val(''); 
                $('#mobile').val(''); 
                $('#address').val(''); 
                $('#state').val(''); 
                $('#city').val(''); 
                $('#pincode').val(''); 
                $('#email').val('');
                $('#altmobile').val('');
                swal("Thanks for the registration", "", "success");
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