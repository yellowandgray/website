var avatar = '';

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
                avatar = data.result.data;
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

function loadClubs(type) {
    var form = new FormData();
    form.append('file', type);
    $.ajax({
        type: "POST",
        url: 'api/v1/get_club_by_type',
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            $('#type').empty();
            var div = '';
            if (data.result.error === false) {
                $('#category_clubs').empty();
                $.each(data.result.data, function (key, val) {
                    div = div + '<div class="col-md-3 col-sm-6"><div class="club-box"><span>#1</span><img src="img/find-club/dummy-logo.png" alt="" /><h3>Frendly Bikers</h3><p>Kuala Lumpur</p><div class="club-btn"><div class="eff-9"></div><a href="club-page.php">Read More</a></div></div></div>';
                });
                $('#category_clubs').append(div);
            } else {
                $('#category_clubs').empty();
            }
        },
        error: function (err) {
            console.log(err.statusText);
        }
    });
}

function leaveAStepCallback(obj, context) {
    alert("Leaving step " + context.fromStep + " to go to step " + context.toStep);
    return validateSteps(context.fromStep); // return false to stay on step and true to continue navigation 
}

function onFinishCallback(objs, context) {
    if (validateAllSteps()) {
        $('form').submit();
    }
}

// Your Step validation logic
function validateSteps(stepnumber) {
    var isStepValid = true;
    // validate step 1
    if (stepnumber == 1) {
        // Your step validation logic
        // set isStepValid = false if has errors
    }
    // ...      
}

function validateAllSteps() {
    var isStepValid = true;
    // all step validation logic     
    return isStepValid;
}