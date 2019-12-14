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
    if (validDetails()) {
        var rzpOptions = {
            key: "rzp_test_zksOkaS0IXezA2",
            amount: (($('#cart_quantity').val() * 8000) * 100),
            name: $('#fname').val(),
            description: "Purchase product",
            image: "https://phalamrutha.com/images/razorpay.png",
            handler: function (response) {
                var data = {fname: $.trim($('#fname').val()), lname: $.trim($('#lname').val()), email: $.trim($('#email').val()), mobile: $.trim($('#mobile').val()), address: $.trim($('#address').val()), city: $.trim($('#city').val()), pincode: $.trim($('#pincode').val()), alt_mobile: $.trim($('#altphone').val()), quantity: $('#cart_quantity').val(), state_id: $('#state').val(), grand_total: ($('#cart_quantity').val() * 8000), transaction_id: response.razorpay_payment_id};
                $.ajax({
                    type: "POST",
                    url: './api/v1/new_order',
                    data: data,
                    success: function (data) {
                        if (data.result.error === false) {
                            swal("Success", data.result.message, "success");
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
                color: "#0072bb"
            }
        };
        var rzp1 = new Razorpay(rzpOptions);
        rzp1.open();
    }
    return false;
}

function validDetails() {
    if ($.trim($('#fname').val()) === '') {
        swal('Information', 'Please provide first name', 'info');
        $('#fname').focus();
        return false;
    }
    if ($.trim($('#lname').val()) === '') {
        swal('Information', 'Please provide last name', 'info');
        $('#lname').focus();
        return false;
    }
    if ($.trim($('#email').val()) === '') {
        swal('Information', 'Please provide email', 'info');
        $('#email').focus();
        return false;
    }
    if ($.trim($('#mobile').val()) === '') {
        swal('Information', 'Please provide mobile', 'info');
        $('#mobile').focus();
        return false;
    }
    if ($.trim($('#address').val()) === '') {
        swal('Information', 'Please provide address', 'info');
        $('#address').focus();
        return false;
    }
    if ($.trim($('#city').val()) === '') {
        swal('Information', 'Please provide city', 'info');
        $('#city').focus();
        return false;
    }
    if ($.trim($('#pincode').val()) === '') {
        swal('Information', 'Please provide pincode', 'info');
        $('#pincode').focus();
        return false;
    }
    return true;
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