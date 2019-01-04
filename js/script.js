function loginAdmin() {
    var uname = $.trim($('#uname').val());
    var pass = $.trim($('#password').val());
    if (uname === 'alfy' && pass === 'AlfyITC') {
        window.localStorage.setItem('session', true);
        window.location = '../4b-admin/dashboard.php';
    } else {
        swal('Information', 'Invalid login details', 'info');
    }
    return false;
}

function logoutAdmin() {
    window.localStorage.removeItem('session');
    window.location = '../admin/index.php';
}

//list pages
function listPages() {
    var api = new $.RestClient('../v1/');
    api.add('master', {url: 'pages', stripTrailingSlash: true});
    var result = api.master.read();
    result.done(function (rs) {
        $('#pages_table').empty();
        if (rs.result.error === false) {
            var table = '<table id="simple-table" class="table table-bordered table-hover">';
            table = table + '<thead><tr><th>ID</th><th>Page Name</th><th>Status</th><th>Created on</th><th></th></tr></thead><tbody>';
            var tab1Count = 0;
            $.each(rs.result.data, function (index, row) {
                tab1Count = tab1Count + 1;
                table = table + '<tr><td>' + row.ID + '</td><td>' + row.page_name + '</td><td>' + row.status + ' </td><td>' + $.format.date(row.created_at, 'dd MMM yyyy hh:mma') + '</td><td><div class="hidden-sm hidden-xs action-buttons"><a class="pointer" onclick="openModal(\'update_pages\', ' + row.ID + ');"><i class="green fa fa-pencil"></i></a><a class="pointer" onclick="deletePage(' + row.ID + ');"><i class="red fa fa-trash-o"></i></a></div></td></tr>';
            });
            table = table + '</tbody></table>';
            var cols = [
                {"bSortable": false},
                null, null,
                {"bSortable": false}
            ];
            $('#pages_table').append(table, cols);
            bindShowDetailClick();
            $('#tab1_count').html(tab1Count);
        } else {
            $('#tab1_table').append(rs.result.message);
            $('#tab2_table').append(rs.result.message);
        }
    });

    result.fail(function (err) {
        console.log('Error');
    });
}
//list sub titles
function listTitles() {
    var api = new $.RestClient('../v1/');
    api.add('master', {url: 'title', stripTrailingSlash: true});
    var result = api.master.read();
    result.done(function (rs) {
        $('#titles_table').empty();
        if (rs.result.error === false) {
            var table = '<table id="simple-table" class="table table-bordered table-hover">';
            table = table + '<thead><tr><th>ID</th><th>Page Name</th><th>Sub Title</th><th>Status</th><th>Created on</th><th></th></tr></thead><tbody>';
            var tab1Count = 0;
            $.each(rs.result.data, function (index, row) {
                tab1Count = tab1Count + 1;
                table = table + '<tr><td>' + row.ID + '</td><td>' + row.page_name + '</td><td>' + row.title + '</td><td>' + row.status + ' </td><td>' + $.format.date(row.created_at, 'dd MMM yyyy hh:mma') + '</td><td><div class="hidden-sm hidden-xs action-buttons"><a class="pointer" onclick="openModal(\'update_titles\', ' + row.ID + ');"><i class="green fa fa-pencil"></i></a><a class="pointer" onclick="deletetitle(' + row.ID + ');"><i class="red fa fa-trash-o"></i></a></div></td></tr>';
            });
            table = table + '</tbody></table>';
            var cols = [
                {"bSortable": false},
                null, null, null,
                {"bSortable": false}
            ];
            $('#titles_table').append(table, cols);
            bindShowDetailClick();
            $('#tab1_count').html(tab1Count);
        } else {
            $('#tab1_table').append(rs.result.message);
            $('#tab2_table').append(rs.result.message);
        }
    });

    result.fail(function (err) {
        console.log('Error');
    });
}
//list services
function listServices() {
    var api = new $.RestClient('../v1/');
    api.add('master', {url: 'service', stripTrailingSlash: true});
    var result = api.master.read();
    result.done(function (rs) {
        $('#service_table').empty();
        if (rs.result.error === false) {
            var table = '<table id="simple-table" class="table table-bordered table-hover">';
            table = table + '<thead><tr><th>ID</th><th>Service Name</th><th>Status</th><th>Created on</th><th></th></tr></thead><tbody>';
            var tab1Count = 0;
            $.each(rs.result.data, function (index, row) {
                tab1Count = tab1Count + 1;
                table = table + '<tr><td>' + row.ID + '</td><td>' + row.name + '</td><td>' + row.status + ' </td><td>' + $.format.date(row.created_at, 'dd MMM yyyy hh:mma') + '</td><td><div class="hidden-sm hidden-xs action-buttons"><a class="pointer" onclick="openModal(\'update_service\', ' + row.ID + ');"><i class="green fa fa-pencil"></i></a><a class="pointer" onclick="deleteService(' + row.ID + ');"><i class="red fa fa-trash-o"></i></a></div></td></tr>';
            });
            table = table + '</tbody></table>';
            var cols = [
                {"bSortable": false},
                null, null,
                {"bSortable": false}
            ];
            $('#service_table').append(table, cols);
            bindShowDetailClick();
            $('#tab1_count').html(tab1Count);
        } else {
            $('#tab1_table').append(rs.result.message);
            $('#tab2_table').append(rs.result.message);
        }
    });

    result.fail(function (err) {
        console.log('Error');
    });
}
//list reviews
function listReviews() {
    var api = new $.RestClient('../v1/');
    api.add('master', {url: 'review', stripTrailingSlash: true});
    var result = api.master.read();
    result.done(function (rs) {
        $('#reviews_table').empty();
        if (rs.result.error === false) {
            var table = '<table id="simple-table" class="table table-bordered table-hover">';
            table = table + '<thead><tr><th>ID</th><th>Student Name</th><th>Student Designation</th><th>Student Image</th><th>Student Review</th><th>Created on</th><th></th></tr></thead><tbody>';
            var tab1Count = 0;
            $.each(rs.result.data, function (index, row) {
                tab1Count = tab1Count + 1;
                table = table + '<tr><td>' + row.ID + '</td><td>' + row.student_name + '</td><td>' + row.student_designation + ' </td><td><img style="width:35%" src=http://localhost/alfyitc/v1/' + row.student_image + ' /></td><td>' + row.student_review + ' </td><td>' + $.format.date(row.created_at, 'dd MMM yyyy hh:mma') + '</td><td><div class="hidden-sm hidden-xs action-buttons"><!--<a class="pointer" onclick="openModal(\'update_review\', ' + row.ID + ');"><i class="green fa fa-pencil"></i></a>--><a class="pointer" onclick="deleteReview(' + row.ID + ');"><i class="red fa fa-trash-o"></i></a></div></td></tr>';
            });
            table = table + '</tbody></table>';
            var cols = [
                {"bSortable": false},
                null, null, null, null,
                {"bSortable": false}
            ];
            $('#reviews_table').append(table, cols);
            bindShowDetailClick();
            $('#tab1_count').html(tab1Count);
        } else {
            $('#tab1_table').append(rs.result.message);
            $('#tab2_table').append(rs.result.message);
        }
    });

    result.fail(function (err) {
        console.log('Error');
    });
}
//list banner
function listevents() {
    var api = new $.RestClient('../v1/');
    api.add('master', {url: 'events', stripTrailingSlash: true});
    var result = api.master.read();
    result.done(function (rs) {
        $('#event_table').empty();
        if (rs.result.error === false) {
            var table = '<table id="simple-table" class="table table-bordered table-hover">';
            table = table + '<thead><tr><th>ID</th><th>Event Image</th><th>Title</th><th>Date</th><th>Created on</th><th></th></tr></thead><tbody>';
            var tab1Count = 0;
            $.each(rs.result.data, function (index, row) {
                tab1Count = tab1Count + 1;
                table = table + '<tr><td>' + row.ID + '</td><td><img style="width:35%" src=https://www.yellowandgray.com/arunpla/v1/' + row.eventimage + ' /></td><td>' + row.eventtitle + ' </td><td>' + row.eventdate + ' </td><td>' + $.format.date(row.created_at, 'dd MMM yyyy hh:mma') + '</td><td><div class="hidden-sm hidden-xs action-buttons"><a class="pointer" onclick="deleteBanner(' + row.ID + ');"><i class="red fa fa-trash-o"></i></a></div></td></tr>';
            });
            table = table + '</tbody></table>';
            var cols = [
                {"bSortable": false},
                null, null, null, null,
                {"bSortable": false}
            ];
            $('#event_table').append(table, cols);
            bindShowDetailClick();
            $('#tab1_count').html(tab1Count);
        } else {
            $('#tab1_table').append(rs.result.message);
            $('#tab2_table').append(rs.result.message);
        }
    });

    result.fail(function (err) {
        console.log('Error');
    });
}
//list quotes
function listQuotes() {
    var api = new $.RestClient('../v1/');
    api.add('master', {url: 'quotes', stripTrailingSlash: true});
    var result = api.master.read();
    result.done(function (rs) {
        $('#quotes_table').empty();
        if (rs.result.error === false) {
            var table = '<table id="simple-table" class="table table-bordered table-hover">';
            table = table + '<thead><tr><th>ID</th><th>Name</th><th>Email Id</th><th>Phone Number</th><th>Created on</th><th></th></tr></thead><tbody>';
            var tab1Count = 0;
            $.each(rs.result.data, function (index, row) {
                tab1Count = tab1Count + 1;
                table = table + '<tr><td>' + row.ID + '</td><td>' + row.username + '</td><td>' + row.email + ' </td><td>' + row.mobile + ' </td><td>' + $.format.date(row.created_at, 'dd MMM yyyy hh:mma') + '</td><td><div class="hidden-sm hidden-xs action-buttons"><!--<a class="pointer" onclick="openModal(\'update_review\', ' + row.ID + ');"><i class="green fa fa-pencil"></i></a>--><a class="pointer" onclick="deleteQuote(' + row.ID + ');"><i class="red fa fa-trash-o"></i></a></div></td></tr>';
            });
            table = table + '</tbody></table>';
            var cols = [
                {"bSortable": false},
                null, null, null,
                {"bSortable": false}
            ];
            $('#quotes_table').append(table, cols);
            bindShowDetailClick();
            $('#tab1_count').html(tab1Count);
        } else {
            $('#tab1_table').append(rs.result.message);
            $('#tab2_table').append(rs.result.message);
        }
    });

    result.fail(function (err) {
        console.log('Error');
    });
}
//list resumes
function listResumes() {
    var api = new $.RestClient('../v1/');
    api.add('master', {url: 'resumes', stripTrailingSlash: true});
    var result = api.master.read();
    result.done(function (rs) {
        $('#resume_table').empty();
        if (rs.result.error === false) {
            var table = '<table id="simple-table" class="table table-bordered table-hover">';
            table = table + '<thead><tr><th>ID</th><th>Name</th><th>Email Id</th><th>Phone Number</th><th>Resume</th><th>Created on</th><th></th></tr></thead><tbody>';
            var tab1Count = 0;
            $.each(rs.result.data, function (index, row) {
                tab1Count = tab1Count + 1;
                table = table + '<tr><td>' + row.ID + '</td><td>' + row.man_name + '</td><td>' + row.man_email + ' </td><td>' + row.man_phone + ' </td><td><a href="http://localhost/alfyitc/v1/' + row.man_resume + '">Download Resume</a> </td><td>' + $.format.date(row.created_at, 'dd MMM yyyy hh:mma') + '</td><td><div class="hidden-sm hidden-xs action-buttons"><!--<a class="pointer" onclick="openModal(\'update_review\', ' + row.ID + ');"><i class="green fa fa-pencil"></i></a>--><a class="pointer" onclick="deleteResume(' + row.ID + ');"><i class="red fa fa-trash-o"></i></a></div></td></tr>';
            });
            table = table + '</tbody></table>';
            var cols = [
                {"bSortable": false},
                null, null, null,
                {"bSortable": false}
            ];
            $('#resume_table').append(table, cols);
            bindShowDetailClick();
            $('#tab1_count').html(tab1Count);
        } else {
            $('#tab1_table').append(rs.result.message);
            $('#tab2_table').append(rs.result.message);
        }
    });

    result.fail(function (err) {
        console.log('Error');
    });
}
//list page content
function listPageContent() {
    var api = new $.RestClient('../v1/');
    api.add('master', {url: 'pagecontent', stripTrailingSlash: true});
    var result = api.master.read();
    result.done(function (rs) {
        $('#pagecontent_table').empty();
        if (rs.result.error === false) {
            var table = '<table id="simple-table" class="table table-bordered table-hover">';
            table = table + '<thead><tr><th>ID</th><th>Sub Title</th><th>Content</th><th>Created on</th><th></th></tr></thead><tbody>';
            var tab1Count = 0;
            $.each(rs.result.data, function (index, row) {
                tab1Count = tab1Count + 1;
                table = table + '<tr><td>' + row.ID + '</td><td>' + row.sub_title + '</td><td>' + row.content + ' </td><td>' + $.format.date(row.created_at, 'dd MMM yyyy hh:mma') + '</td><td><div class="hidden-sm hidden-xs action-buttons"><a class="pointer" onclick="openModal(\'update_pagecontents\', ' + row.ID + ');"><i class="green fa fa-pencil"></i></a><a class="pointer" onclick="deletePagecontent(' + row.ID + ');"><i class="red fa fa-trash-o"></i></a></div></td></tr>';
            });
            table = table + '</tbody></table>';
            var cols = [
                {"bSortable": false},
                null, null,
                {"bSortable": false}
            ];
            $('#pagecontent_table').append(table, cols);
            bindShowDetailClick();
            $('#tab1_count').html(tab1Count);
        } else {
            $('#tab1_table').append(rs.result.message);
            $('#tab2_table').append(rs.result.message);
        }
    });

    result.fail(function (err) {
        console.log('Error');
    });
}
//list faq
function listfaq() {
    var api = new $.RestClient('../v1/');
    api.add('master', {url: 'faq', stripTrailingSlash: true});
    var result = api.master.read();
    result.done(function (rs) {
        $('#faq_table').empty();
        if (rs.result.error === false) {
            var table = '<table id="simple-table" class="table table-bordered table-hover">';
            table = table + '<thead><tr><th>ID</th><th>Questions</th><th>Answers</th><th>Created on</th><th></th></tr></thead><tbody>';
            var tab1Count = 0;
            $.each(rs.result.data, function (index, row) {
                tab1Count = tab1Count + 1;
                table = table + '<tr><td>' + row.ID + '</td><td>' + row.question + '</td><td>' + row.answer + ' </td><td>' + $.format.date(row.created_at, 'dd MMM yyyy hh:mma') + '</td><td><div class="hidden-sm hidden-xs action-buttons"><a class="pointer" onclick="openModal(\'update_faqs\', ' + row.ID + ');"><i class="green fa fa-pencil"></i></a><a class="pointer" onclick="deleteFaq(' + row.ID + ');"><i class="red fa fa-trash-o"></i></a></div></td></tr>';
            });
            table = table + '</tbody></table>';
            var cols = [
                {"bSortable": false},
                null, null,
                {"bSortable": false}
            ];
            $('#faq_table').append(table, cols);
            bindShowDetailClick();
            $('#tab1_count').html(tab1Count);
        } else {
            $('#tab1_table').append(rs.result.message);
            $('#tab2_table').append(rs.result.message);
        }
    });

    result.fail(function (err) {
        console.log('Error');
    });
}

function openModal(name, id) {
    if (name === 'update_template') {
        url = 'template';
        $('#template_form').validate().resetForm();
        $('#template_body_web').val('');
        $('#template_body_mobile').val('');
        $('#template_subject').val('');
        if (id > 0) {
            $('#update_template_id').val(id);
            var api = new $.RestClient('v1/');
            api.add('master', {url: url, stripTrailingSlash: true});
            var result = api.master.read(id);
            result.done(function (rs) {
                if (rs.result.error === false) {
                    $('#template_body_web').val(rs.result.data.body_web);
                    $('#template_body_mobile').val(rs.result.data.body_mobile);
                    $('#template_subject').val(rs.result.data.subject);
                }
            });
            result.fail(function (err) {
                console.log('Error');
            });
        }
    }
    if (name === 'update_pages') {
        //url = 'template';
        $('#update_pages').validate().resetForm();
        $('#update_page_name').val('');
        if (id > 0) {
            $('#update_page_id').val(id);
            var api = new $.RestClient('../v1/');
            api.add('master', {url: 'pages', stripTrailingSlash: true});
            var result = api.master.read(id);
            result.done(function (rs) {
                // console.log(rs);
                if (rs.result.error === false) {
                    $('#update_page_name').val(rs.result.data.page_name);
                }
            });
            result.fail(function (err) {
                console.log('Error');
            });
        }
    }
    if (name === 'update_service') {
        //url = 'template';
        $('#update_services').validate().resetForm();
        $('#update_service_name').val('');
        if (id > 0) {
            $('#update_service_id').val(id);
            var api = new $.RestClient('../v1/');
            api.add('master', {url: 'service', stripTrailingSlash: true});
            var result = api.master.read(id);
            result.done(function (rs) {
                // console.log(rs);
                if (rs.result.error === false) {
                    $('#update_service_name').val(rs.result.data.name);
                }
            });
            result.fail(function (err) {
                console.log('Error');
            });
        }
    }
    if (name === 'update_titles') {
        //url = 'template';
        $('#update_title').validate().resetForm();
        $('#update_page_id').val('');
        $('#update_title_name').val('');
        if (id > 0) {
            $('#update_title_id').val(id);
            var api = new $.RestClient('../v1/');
            api.add('master', {url: 'title', stripTrailingSlash: true});
            var result = api.master.read(id);
            result.done(function (rs) {
                //console.log(rs.result.data.title);
                if (rs.result.error === false) {
                    $('#update_title_name').val(rs.result.data.title);
                    $('#update_page_id').val(rs.result.data.page_id);

                }
            });
            result.fail(function (err) {
                console.log('Error');
            });
        }
    }
    if (name === 'update_review') {
        //url = 'template';
        $('#update_reviews').validate().resetForm();
        $('#update_student_name').val('');
        $('#update_student_designation').val('');
        //$('#update_student_image').val('');
        $('#update_student_reviews').val('');
        if (id > 0) {
            $('#update_review_id').val(id);
            var api = new $.RestClient('../v1/');
            api.add('master', {url: 'review', stripTrailingSlash: true});
            var result = api.master.read(id);
            result.done(function (rs) {
                //console.log(rs.result.data.title);
                if (rs.result.error === false) {
                    $('#update_student_name').val(rs.result.data.student_name);
                    $('#update_student_designation').val(rs.result.data.student_designation);
                    //$('#update_student_image').val(rs.result.data.student_image);
                    $('#update_student_reviews').val(rs.result.data.student_review);

                }
            });
            result.fail(function (err) {
                console.log('Error');
            });
        }
    }
    if (name === 'update_homebanner') {
        //url = 'template';
        $('#update_banner').validate().resetForm();
        $('#bannertitle').val('');
        $('#update_bannercontent').val('');
        if (id > 0) {
            $('#update_banner_id').val(id);
            var api = new $.RestClient('../v1/');
            api.add('master', {url: 'banners', stripTrailingSlash: true});
            var result = api.master.read(id);
            result.done(function (rs) {
                //console.log(rs.result.data.title);
                if (rs.result.error === false) {
                    $('#update_bannertitle').val(rs.result.data.bannertitle);
                    $('#update_bannercontent').val(rs.result.data.bannercontent);

                }
            });
            result.fail(function (err) {
                console.log('Error');
            });
        }
    }
    if (name === 'update_pagecontents') {
        //url = 'template';
        $('#update_pagecontent').validate().resetForm();
        $('#update_sub_title_id').val('');
        $('#update_content').val('');
        if (id > 0) {
            $('#update_pagecontent_id').val(id);
            var api = new $.RestClient('../v1/');
            api.add('master', {url: 'pagecontent', stripTrailingSlash: true});
            var result = api.master.read(id);
            result.done(function (rs) {
                //console.log(rs.result.data.title);
                if (rs.result.error === false) {
                    console.log(rs.result.data[0].sub_title_id);
                    $('#update_sub_title_id').val(rs.result.data[0].sub_title_id);
                    $('#update_content').val(rs.result.data[0].content);

                }
            });
            result.fail(function (err) {
                console.log('Error');
            });
        }
    }
    if (name === 'update_faqs') {
        //url = 'template';
        $('#update_faq').validate().resetForm();
        $('#update_questions').val('');
        $('#update_answers').val('');
        if (id > 0) {
            $('#update_faq_id').val(id);
            var api = new $.RestClient('../v1/');
            api.add('master', {url: 'faq', stripTrailingSlash: true});
            var result = api.master.read(id);
            result.done(function (rs) {
                //console.log(rs.result.data.title);
                if (rs.result.error === false) {
                    console.log(rs.result.data.question);
                    $('#update_questions').val(rs.result.data.question);
                    $('#update_answers').val(rs.result.data.answer);

                }
            });
            result.fail(function (err) {
                console.log('Error');
            });
        }
    }
    $('#' + name).modal('show');
}

function beforeDeleteCallback(e) {
    var form = $(e[0]);
    if (form.data('styled'))
        return false;

    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
    style_delete_form(form);

    form.data('styled', true);
}

function pickDate(cellvalue, options, cell) {
    setTimeout(function () {
        $(cell).find('input[type=text]')
                .datepicker({format: 'yyyy-mm-dd', autoclose: true});
    }, 0);
}

function aceSwitch(cellvalue, options, cell) {
    setTimeout(function () {
        $(cell).find('input[type=checkbox]')
                .addClass('ace ace-switch ace-switch-5')
                .after('<span class="lbl"></span>');
    }, 0);
}
function requeststatus(id, check) {
    var status = 0;
    var txt = 'Deactivate';
    if (check.checked === true) {
        status = 1;
        txt = 'Activate';
    }
    if (status === 1) {
        $(check).prop('checked', false);
    } else {
        $(check).prop('checked', true);
    }
    swal({
        title: 'Information',
        text: 'Are you sure to ' + txt + ' this request?',
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    },
    function () {
        var data = {ID: id, activated: status};
        var api = new $.RestClient('v1/');
        api.add('user', {url: 'requestactivate', stripTrailingSlash: true});
        var result = api.user.create(data);
        result.done(function (rs) {
            if (rs.result.error === false) {
                swal('Success', rs.result.message, 'success');
                location.reload();
            } else {
                swal('Error', rs.result.message, 'error');
            }
        });
        result.fail(function (err) {
            console.log('Error');
        });
    });

}
function requeststatustwo(id, check) {
    var status = 0;
    var txt = 'Deactivate';
    if (check.checked === true) {
        status = 2;
        txt = 'Activate';
    }
    if (status === 2) {
        $(check).prop('checked', false);
    } else {
        $(check).prop('checked', true);
    }
    swal({
        title: 'Information',
        text: 'Are you sure to ' + txt + ' this request?',
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    },
    function () {
        var data = {ID: id, activated: status};
        var api = new $.RestClient('v1/');
        api.add('user', {url: 'requestactivate', stripTrailingSlash: true});
        var result = api.user.create(data);
        result.done(function (rs) {
            if (rs.result.error === false) {
                swal('Success', rs.result.message, 'success');
                location.reload();
            } else {
                swal('Error', rs.result.message, 'error');
            }
        });
        result.fail(function (err) {
            console.log('Error');
        });
    });

}

function removeHomeSlider(key) {
    swal({
        title: 'Are you sure?',
        text: 'You will not be able to recover this!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    },
    function () {
        var api = new $.RestClient('v1/');
        api.add('master', {url: 'home_sliders', stripTrailingSlash: true});
        var result = api.master.del(key);
        result.done(function (rs) {
            if (rs.result.error === false) {
                swal('Deleted!', 'Slider has been deleted.', 'success');
                showConfigsPage(false);
            } else {
                swal('Error', 'Unable to delete slider.', 'error');
            }
        });
        result.fail(function (err) {
            swal('Error', 'Unable to delete slider.', 'error');
        });
    });
}
function showTemplatesPage() {
    var api = new $.RestClient('v1/');
    api.add('master', {url: 'template', stripTrailingSlash: true});
    var result = api.master.read();
    result.done(function (rs) {
        if (rs.result.error === false) {
            $('#template_content').empty();
            var table = '<table id="template_table" class="table table-bordered"><thead><tr><th>ID</th><th>Name</th><th>Type</th><th>Subject</th><th>Body</th><th></th></tr></thead><tbody>';
            $.each(rs.result.data, function (index, row) {
                table = table + '<tr><td>' + row.ID + '</td><td>' + row.name + '</td><td>' + row.type + '</td><td>' + row.subject + '</td><td>' + row.body_web + '</td><td><a class="green pointer" onclick="openModal(\'update_template\', ' + row.ID + ');"><i class="ace-icon fa fa-pencil bigger-130"></i></a></td></tr>';
            });
            table = table + '</tbody></table>';
            $('#template_content').append(table);
            var cols = [
                null, null, null, null, {"bSortable": false},
                {"bSortable": false}
            ];
            dataTable('template_table', 'template_tools', cols);
        }
    });
    result.fail(function (err) {
        swal('Error', 'Unable to get templates.', 'error');
    });
}

function activeUser(id, check) {
    var status = 0;
    var txt = 'Deactivate';
    if (check.checked === true) {
        status = 1;
        txt = 'Activate';
    }
    if (status === 1) {
        $(check).prop('checked', false);
    } else {
        $(check).prop('checked', true);
    }
    swal({
        title: 'Information',
        text: 'Are you sure to ' + txt + ' this user?',
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    },
    function () {
        var data = {ID: id, activated: status};
        var api = new $.RestClient('v1/');
        api.add('user', {url: 'activate', stripTrailingSlash: true});
        var result = api.user.create(data);
        result.done(function (rs) {
            if (rs.result.error === false) {
                listMembers();
                swal('Success', rs.result.message, 'success');
            } else {
                swal('Error', rs.result.message, 'error');
            }
        });
        result.fail(function (err) {
            console.log('Error');
        });
    });
}
function activeMeeting(id, check) {
    var status = 0;
    var txt = 'Reject';
    if (check.checked === true) {
        status = 1;
        txt = 'Accept';
    }
    if (status === 1) {
        $(check).prop('checked', false);
    } else {
        $(check).prop('checked', true);
    }
    swal({
        title: 'Information',
        text: 'Are you sure to ' + txt + ' this request?',
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    },
    function () {
        var data = {ID: id, activated: status};
        var api = new $.RestClient('v1/');
        api.add('master', {url: 'meetingactivate', stripTrailingSlash: true});
        var result = api.master.create(data);
        result.done(function (rs) {
            if (rs.result.error === false) {
                listMeetings();
                swal('Success', rs.result.message, 'success');
            } else {
                swal('Error', rs.result.message, 'error');
            }
        });
        result.fail(function (err) {
            console.log('Error');
        });
    });
}
function searchUser(id, txt) {
    $('#' + id + ' table tbody tr:not(tr.detail-row)').each(function (index) {
        var $row = $(this);
        var id = $row.find('td.member-name').not().text();
        if ((id).toLowerCase().indexOf((txt.value).toLowerCase()) !== 0) {
            $row.hide();
            $('.detail-row tr').removeAttr('style');
            $('tr.detail-row').removeClass('open');
        }
        else {
            $row.show();
        }
    });
}
function deletePage(id) {
    swal({
        title: 'Are you sure?',
        text: 'You will loose all the details and contents of this page!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    },
    function () {
        var api = new $.RestClient('../v1/');
        api.add('master', {url: 'pages', stripTrailingSlash: true});
        var result = api.master.del(id);
        result.done(function (rs) {
            if (rs.result.error === false) {
                swal('Deleted!', rs.result.message, 'success');
                listPages();
            } else {
                swal('Error', rs.result.message, 'error');
            }
        });
        result.fail(function (err) {
            swal('Error', 'Unable to delete product size.', 'error');
        });
    });
}
function deletetitle(id) {
    swal({
        title: 'Are you sure?',
        text: 'You will loose all the details and contents of this title!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    },
    function () {
        var api = new $.RestClient('../v1/');
        api.add('master', {url: 'title', stripTrailingSlash: true});
        var result = api.master.del(id);
        result.done(function (rs) {
            if (rs.result.error === false) {
                swal('Deleted!', rs.result.message, 'success');
                listTitles();
            } else {
                swal('Error', rs.result.message, 'error');
            }
        });
        result.fail(function (err) {
            swal('Error', 'Unable to delete product size.', 'error');
        });
    });
}
function deleteService(id) {
    swal({
        title: 'Are you sure?',
        text: 'You will loose all the details of this Service!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    },
    function () {
        var api = new $.RestClient('../v1/');
        api.add('master', {url: 'service', stripTrailingSlash: true});
        var result = api.master.del(id);
        result.done(function (rs) {
            if (rs.result.error === false) {
                swal('Deleted!', rs.result.message, 'success');
                listServices();
            } else {
                swal('Error', rs.result.message, 'error');
            }
        });
        result.fail(function (err) {
            swal('Error', 'Unable to delete product size.', 'error');
        });
    });
}
function deleteReview(id) {
    swal({
        title: 'Are you sure?',
        text: 'You will loose all the details of this Review!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    },
    function () {
        var api = new $.RestClient('../v1/');
        api.add('master', {url: 'review', stripTrailingSlash: true});
        var result = api.master.del(id);
        result.done(function (rs) {
            if (rs.result.error === false) {
                swal('Deleted!', rs.result.message, 'success');
                listReviews();
            } else {
                swal('Error', rs.result.message, 'error');
            }
        });
        result.fail(function (err) {
            swal('Error', 'Unable to delete product size.', 'error');
        });
    });
}
function deleteQuote(id) {
    swal({
        title: 'Are you sure?',
        text: 'You will loose all the details of this Quote!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    },
    function () {
        var api = new $.RestClient('../v1/');
        api.add('master', {url: 'quotes', stripTrailingSlash: true});
        var result = api.master.del(id);
        result.done(function (rs) {
            if (rs.result.error === false) {
                swal('Deleted!', rs.result.message, 'success');
                listQuotes();
            } else {
                swal('Error', rs.result.message, 'error');
            }
        });
        result.fail(function (err) {
            swal('Error', 'Unable to delete product size.', 'error');
        });
    });
}
function deleteResume(id) {
    swal({
        title: 'Are you sure?',
        text: 'You will loose all the details of this Resume!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    },
    function () {
        var api = new $.RestClient('../v1/');
        api.add('master', {url: 'resumes', stripTrailingSlash: true});
        var result = api.master.del(id);
        result.done(function (rs) {
            if (rs.result.error === false) {
                swal('Deleted!', rs.result.message, 'success');
                listResumes();
            } else {
                swal('Error', rs.result.message, 'error');
            }
        });
        result.fail(function (err) {
            swal('Error', 'Unable to delete product size.', 'error');
        });
    });
}
function deleteBanner(id) {
    swal({
        title: 'Are you sure?',
        text: 'You will loose all the details of this Event!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    },
    function () {
        var api = new $.RestClient('../v1/');
        api.add('master', {url: 'events', stripTrailingSlash: true});
        var result = api.master.del(id);
        result.done(function (rs) {
            if (rs.result.error === false) {
                swal('Deleted!', rs.result.message, 'success');
                listevents();
            } else {
                swal('Error', rs.result.message, 'error');
            }
        });
        result.fail(function (err) {
            swal('Error', 'Unable to delete product size.', 'error');
        });
    });
}
function deletePagecontent(id) {
    swal({
        title: 'Are you sure?',
        text: 'You will loose all the details of this Content!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    },
    function () {
        var api = new $.RestClient('../v1/');
        api.add('master', {url: 'pagecontent', stripTrailingSlash: true});
        var result = api.master.del(id);
        result.done(function (rs) {
            if (rs.result.error === false) {
                swal('Deleted!', rs.result.message, 'success');
                listPageContent();
            } else {
                swal('Error', rs.result.message, 'error');
            }
        });
        result.fail(function (err) {
            swal('Error', 'Unable to delete product size.', 'error');
        });
    });
}
function deleteFaq(id) {
    swal({
        title: 'Are you sure?',
        text: 'You will loose all the details of this Content!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    },
    function () {
        var api = new $.RestClient('../v1/');
        api.add('master', {url: 'faq', stripTrailingSlash: true});
        var result = api.master.del(id);
        result.done(function (rs) {
            if (rs.result.error === false) {
                swal('Deleted!', rs.result.message, 'success');
                listfaq();
            } else {
                swal('Error', rs.result.message, 'error');
            }
        });
        result.fail(function (err) {
            swal('Error', 'Unable to delete product size.', 'error');
        });
    });
}
function getUpdateAuthorlist() {
    var api = new $.RestClient('v1/');
    api.add('master', {url: 'author', stripTrailingSlash: true});
    var result = api.master.read();
    result.done(function (rs) {
        $.each(rs.result.data, function (index, row) {
            var select = '<option value="' + row.ID + '">' + row.name + '</option>';
            $('#item_author').append(select);
        });
    });
}