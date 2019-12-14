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


function makePayment() {
    var rzpOptions = {
        key: "rzp_test_zksOkaS0IXezA2",
        amount: (($('#cart_quantity').val() * 8000) * 100),
        name: $('#fname').val(),
        description: "Purchase product",
        image: "https://phalamrutha.com/images/razorpay.png",
        handler: function (response) {
            var data = {action: 'credit', amount: amt, user_code: code, remark: 'RazorpayTransaction', identity: 'Transaction id: ' + response.razorpay_payment_id};
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
        },
        prefill: {
            name: $('#fname').val(),
            email: $('#email').val(),
            contact: $('#mobile').val()
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

function loadCartDetails() {
    var cartItems = JSON.parse(sessionStorage.getItem('shoppingCart'));
    if (cartItems === null || cartItems.length === 0) {
        window.location = 'index.php';
    } else {
        console.log(cartItems);
        $('#cart_quantity').val(cartItems[0].count);
    }
}

function removeProduct() {
    shoppingCart.clearCart();
    window.location = 'index.php';
}