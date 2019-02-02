jQuery(document).ready(function ($) {
    "use strict";

    //Contact
    $('form.contact').submit(function () {
        var f = $(this).find('.form-group'),
                ferror = false,
                emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

        f.children('input').each(function () { // run all inputs

            var i = $(this); // current input
            var rule = i.attr('data-rule');

            if (rule !== undefined) {
                var ierror = false; // error flag for current input
                var pos = rule.indexOf(':', 0);
                if (pos >= 0) {
                    var exp = rule.substr(pos + 1, rule.length);
                    rule = rule.substr(0, pos);
                } else {
                    rule = rule.substr(pos + 1, rule.length);
                }

                switch (rule) {
                    case 'required':
                        if (i.val() === '') {
                            ferror = ierror = true;
                        }
                        break;

                    case 'minlen':
                        if (i.val().length < parseInt(exp)) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'email':
                        if (!emailExp.test(i.val())) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'checked':
                        if (!i.is(':checked')) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'regexp':
                        exp = new RegExp(exp);
                        if (!exp.test(i.val())) {
                            ferror = ierror = true;
                        }
                        break;
                }
                i.next('.validation').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
            }
        });
        f.children('textarea').each(function () { // run all inputs

            var i = $(this); // current input
            var rule = i.attr('data-rule');

            if (rule !== undefined) {
                var ierror = false; // error flag for current input
                var pos = rule.indexOf(':', 0);
                if (pos >= 0) {
                    var exp = rule.substr(pos + 1, rule.length);
                    rule = rule.substr(0, pos);
                } else {
                    rule = rule.substr(pos + 1, rule.length);
                }

                switch (rule) {
                    case 'required':
                        if (i.val() === '') {
                            ferror = ierror = true;
                        }
                        break;

                    case 'minlen':
                        if (i.val().length < parseInt(exp)) {
                            ferror = ierror = true;
                        }
                        break;
                }
                i.next('.validation').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
            }
        });
        if (ferror)
            return false;
        else
            var str = $(this).serialize();
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "contact-form.php",
            data: str,
            success: function (msg) {
                // alert(msg);
                if (msg == 'OK') {
                    $("#sendmessage").addClass("show");
                    $("#errormessage").removeClass("show");
                    $('.contact').find("input, textarea").val("");
                    swal("Success", "Thank you, We will contact you soon!", 'success');
                } else {
                    $("#sendmessage").removeClass("show");
                    $("#errormessage").addClass("show");
                    $('#errormessage').html(msg);
                }

            }
        });
        return false;
    });

});

//jQuery(document).ready(function ($) {
//    "use strict";
//
//    //Contact
//    $('form.enquiry').submit(function () {
//        var f = $(this).find('.form-group'),
//                ferror = false,
//                emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;
//
//        f.children('input').each(function () { // run all inputs
//
//            var i = $(this); // current input
//            var rule = i.attr('data-rule');
//
//            if (rule !== undefined) {
//                var ierror = false; // error flag for current input
//                var pos = rule.indexOf(':', 0);
//                if (pos >= 0) {
//                    var exp = rule.substr(pos + 1, rule.length);
//                    rule = rule.substr(0, pos);
//                } else {
//                    rule = rule.substr(pos + 1, rule.length);
//                }
//
//                switch (rule) {
//                    case 'required':
//                        if (i.val() === '') {
//                            ferror = ierror = true;
//                        }
//                        break;
//
//                    case 'minlen':
//                        if (i.val().length < parseInt(exp)) {
//                            ferror = ierror = true;
//                        }
//                        break;
//
//                    case 'email':
//                        if (!emailExp.test(i.val())) {
//                            ferror = ierror = true;
//                        }
//                        break;
//
//                    case 'checked':
//                        if (!i.is(':checked')) {
//                            ferror = ierror = true;
//                        }
//                        break;
//
//                    case 'regexp':
//                        exp = new RegExp(exp);
//                        if (!exp.test(i.val())) {
//                            ferror = ierror = true;
//                        }
//                        break;
//                }
//                i.next('.validation').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
//            }
//        });
//        f.children('textarea').each(function () { // run all inputs
//
//            var i = $(this); // current input
//            var rule = i.attr('data-rule');
//
//            if (rule !== undefined) {
//                var ierror = false; // error flag for current input
//                var pos = rule.indexOf(':', 0);
//                if (pos >= 0) {
//                    var exp = rule.substr(pos + 1, rule.length);
//                    rule = rule.substr(0, pos);
//                } else {
//                    rule = rule.substr(pos + 1, rule.length);
//                }
//
//                switch (rule) {
//                    case 'required':
//                        if (i.val() === '') {
//                            ferror = ierror = true;
//                        }
//                        break;
//
//                    case 'minlen':
//                        if (i.val().length < parseInt(exp)) {
//                            ferror = ierror = true;
//                        }
//                        break;
//                }
//                i.next('.validation').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
//            }
//        });
//        if (ferror)
//            return false;
//        else
//            var str = $(this).serialize();
//        $.ajax({
//            type: "POST",
//            dataType: 'json',
//            url: "contact-form.php",
//            data: str,
//            success: function (msg) {
//                // alert(msg);
//                if (msg == 'OK') {
//                    $("#sendmessage").addClass("show");
//                    $("#errormessage").removeClass("show");
//                    swal("Success", "Thank you, We will contact you soon!", 'success');
//                } else {
//                    $("#sendmessage").removeClass("show");
//                    $("#errormessage").addClass("show");
//                    $('#errormessage').html(msg);
//                }
//
//            }
//        });
//        return false;
//    });
//
//});
//
//jQuery(document).ready(function ($) {
//    "use strict";
//
//    //Contact
//    $('form.career').submit(function () {
//        var f = $(this).find('.form-group'),
//                ferror = false,
//                emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;
//
//        f.children('input').each(function () { // run all inputs
//
//            var i = $(this); // current input
//            var rule = i.attr('data-rule');
//
//            if (rule !== undefined) {
//                var ierror = false; // error flag for current input
//                var pos = rule.indexOf(':', 0);
//                if (pos >= 0) {
//                    var exp = rule.substr(pos + 1, rule.length);
//                    rule = rule.substr(0, pos);
//                } else {
//                    rule = rule.substr(pos + 1, rule.length);
//                }
//
//                switch (rule) {
//                    case 'required':
//                        if (i.val() === '') {
//                            ferror = ierror = true;
//                        }
//                        break;
//
//                    case 'minlen':
//                        if (i.val().length < parseInt(exp)) {
//                            ferror = ierror = true;
//                        }
//                        break;
//
//                    case 'email':
//                        if (!emailExp.test(i.val())) {
//                            ferror = ierror = true;
//                        }
//                        break;
//
//                    case 'checked':
//                        if (!i.is(':checked')) {
//                            ferror = ierror = true;
//                        }
//                        break;
//
//                    case 'regexp':
//                        exp = new RegExp(exp);
//                        if (!exp.test(i.val())) {
//                            ferror = ierror = true;
//                        }
//                        break;
//                }
//                i.next('.validation').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
//            }
//        });
//        f.children('textarea').each(function () { // run all inputs
//
//            var i = $(this); // current input
//            var rule = i.attr('data-rule');
//
//            if (rule !== undefined) {
//                var ierror = false; // error flag for current input
//                var pos = rule.indexOf(':', 0);
//                if (pos >= 0) {
//                    var exp = rule.substr(pos + 1, rule.length);
//                    rule = rule.substr(0, pos);
//                } else {
//                    rule = rule.substr(pos + 1, rule.length);
//                }
//
//                switch (rule) {
//                    case 'required':
//                        if (i.val() === '') {
//                            ferror = ierror = true;
//                        }
//                        break;
//
//                    case 'minlen':
//                        if (i.val().length < parseInt(exp)) {
//                            ferror = ierror = true;
//                        }
//                        break;
//                }
//                i.next('.validation').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
//            }
//        });
//        if (ferror)
//            return false;
//        else
//            var form = $('#resume').attr('files');
//        var formData = new FormData(this);
//        $.ajax({
//            type: "POST",
//            dataType: 'json',
//            url: "career-form.php",
//            data: formData,
//            cache: false,
//            contentType: false,
//            processData: false,
//            success: function (msg) {
//                // alert(msg);
//                if (msg == 'OK') {
//                    $("#sendmessage").addClass("show");
//                    $("#errormessage").removeClass("show");
//                    swal("Success", "Thank you, We will contact you soon!", 'success');
//                } else {
//                    $("#sendmessage").removeClass("show");
//                    $("#errormessage").addClass("show");
//                    $('#errormessage').html(msg);
//                }
//
//            }
//        });
//        return false;
//    });
//
//});

function submitForm(id) {
    if (validForm(id)) {
        var data = {data: []};
        $('#' + id + ' .field').each(function (key, ele) {
            var value = $.trim($(ele).val());
            var label = $(ele).data('emaillabel');
            data.data.push({value: value, label: label});
        });
        $('.form-loader').removeClass('hidden');
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "submitform.php",
            data: data,
            success: function (response) {
                $('.form-loader').addClass('hidden');
                if (response.error === false) {
                    $('.submit-response').html(response.message).fadeOut(3000);
                    $('.field').each(function (key, ele) {
                        $(ele).val('');
                    });
                }
            }
        });
    }
    return false;
}

function validForm(id) {
    var msg = '';
    $('#' + id + ' .mandatory').each(function (key, ele) {
        if ($.trim($(ele).val()) === '') {
            msg = $(ele).data('message');
            return false;
        }
    });
    if (msg !== '') {
        alert(msg);
        return false;
    } else {
        return true;
    }
}