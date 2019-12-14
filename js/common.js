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


function buyProduct() {
    var rzpOptions = {
        key: "rzp_test_zksOkaS0IXezA2",
        amount: ((amt + (amt * 0.01)) * 100),
        name: name,
        description: "Account Recharge",
        image: "https://phalamrutha.com/images/razorpay.png",
        handler: function (response) {
            var data = {action: 'credit', amount: amt, user_code: code, remark: 'RazorpayTransaction', identity: 'Transaction id: ' + response.razorpay_payment_id};
            $.isLoading({text: 'Loading...'});
            var api = new $.RestClient('v1/');
            api.add('user', {url: 'transaction', stripTrailingSlash: true});
            var result = api.user.create(data);
            result.done(function (rs) {
                if (rs.result.error === false) {
                    if (type === 'checkout') {
                        window.location = 'checkout.php';
                    }
                    if (type === 'payment') {
                        window.location = 'mypayments.php';
                    }
                } else {
                    swal('Error', rs.result.message, 'error');
                    $.isLoading('hide');
                }
            });
            result.fail(function (err) {
                $.isLoading('hide');
                swal('Error', 'Process failed!!', 'error');
            });
        },
        prefill: {
            name: name,
            email: email,
            contact: mobile
        },
        notes: {
            address: "RazorpayTransaction"
        },
        theme: {
            color: "#086f31"
        }
    };
    var rzp1 = new Razorpay(rzpOptions);
    rzp1.open();
}

function goToCheckout() {
    if (shoppingCart.totalCount() > 0) {
        window.location = 'checkout.php';
    } else {
        swal('Information', 'Your cart is empty', 'info')
    }
}