$(function () {
    var errorPlacement = function (error, element) {
        if (element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
            var controls = element.closest('div[class*="col-"]');
            if (controls.find(':checkbox,:radio').length > 1)
                controls.append(error);
            else
                error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if (element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if (element.is('.chosen-select')) {
            error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
        }
        else
            error.insertAfter(element.parent());
    };

    $('#login_form').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        rules: {
            uname: {
                required: {
                    depends: function () {
                        $(this).val($.trim($(this).val()));
                        return true;
                    }
                }
            },
            password: {
                required: {
                    depends: function () {
                        $(this).val($.trim($(this).val()));
                        return true;
                    }
                }
            }
        },
        messages: {
            uname: {
                required: 'Please provide a valid username.'
            },
            password: {
                required: 'Please specify a password.'
            }
        },
        submitHandler: function (form) {
            loginAdmin();
        }
    });

    $('#add_event').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        rules: {
            eventtitle: {
                required: {
                    depends: function () {
                        $(this).val($(this).val());
                        return true;
                    }
                }
            },
            eventdate: {
                required: {
                    depends: function () {
                        $(this).val($(this).val());
                        return true;
                    }
                }
            }
        },
        messages: {
            eventtitle: {
                required: 'Please provide a valid Name.'
            },
            eventdate: {
                required: 'Please provide a valid Date.'
            }
        },
        highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },
        success: function (e) {
            $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
            $(e).remove();
        },
        errorPlacement: errorPlacement,
        submitHandler: function (form) {
            //$.isLoading({text: 'Signing In...'});
            var data = new FormData(form);
            data.append('ID', 0);
            var api = new $.RestClient('../v1/');
            api.add('master', {url: 'events', stripTrailingSlash: true, multipart: true});
            var result = api.master.create(data);
            result.done(function (rs) {
                //$.isLoading('hide');
                listevents();
                if (rs.result.error === false) {
                    //window.location = 'index.php';
                    swal('Success', rs.result.message, 'success');
                    $('#collapseOneHeading').addClass('collapsed');
                    $('#collapseTwoHeading').removeClass('collapsed');
                    $('#collapseOne').removeClass('in');
                    $('#collapseTwo').addClass('in');
                } else {
                    swal('Error', 'Failed!!', 'error');
                    //showNonStickyToast(rs.result.message, 'error');
                }
            });
            result.fail(function (err) {
                //$.isLoading('hide');
                swal('Error', 'Process failed!!', 'error');
            });
            return false;
        }
    });
    $('#update_banner').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        rules: {
            bannertitle: {
                required: {
                    depends: function () {
                        $(this).val($(this).val());
                        return true;
                    }
                }
            },
            bannercontent: {
                required: {
                    depends: function () {
                        $(this).val($(this).val());
                        return true;
                    }
                }
            }
        },
        messages: {
            bannertitle: {
                required: 'Please provide a valid Name.'
            },
            bannercontent: {
                required: 'Please provide a valid Name.'
            }
        },
        highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },
        success: function (e) {
            $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
            $(e).remove();
        },
        errorPlacement: errorPlacement,
        submitHandler: function (form) {
            //$.isLoading({text: 'Signing In...'});
            var data = new FormData(form);
            data.append('ID', 0);
            var api = new $.RestClient('../v1/');
            api.add('master', {url: 'banners', stripTrailingSlash: true, multipart: true});
            var result = api.master.update(data);
            result.done(function (rs) {
                //$.isLoading('hide');
                listBanner();
                if (rs.result.error === false) {
                    //window.location = 'index.php';
                    swal('Success', rs.result.message, 'success');
                    $('#collapseOneHeading').addClass('collapsed');
                    $('#collapseTwoHeading').removeClass('collapsed');
                    $('#collapseOne').removeClass('in');
                    $('#collapseTwo').addClass('in');
                } else {
                    swal('Error', 'Failed!!', 'error');
                    //showNonStickyToast(rs.result.message, 'error');
                }
            });
            result.fail(function (err) {
                //$.isLoading('hide');
                swal('Error', 'Process failed!!', 'error');
            });
            return false;
        }
    });

});
 