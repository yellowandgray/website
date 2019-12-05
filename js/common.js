
function registerClub() {
    if (validClub()) {
        $('.loader').addClass('is-active');
        $.ajax({
            type: "POST",
            url: 'api/v1/insert_club',
            data: {type: $('#type').val(), category_id: $('#category_id').val(), name: $('#name').val(), cover_image: cover_image, logo: logo, state: $('#state').val(), city: $('#city').val(), zip: $('#zip').val(), landmark: $('#landmark').val(), address: $('#address').val(), club_leader_name: $('#club_leader_name').val(), email: $('#email').val(), email_id: $('#email_id').val(), mobile: $('#mobile').val(), about: $('#about').val(), facebook_link: $('#facebook_link').val(), youtube_link: $('#youtube_link').val(), twitter_link: $('#twitter_link').val(), instagram_link: $('#instagram_link').val(), rank: 0, published: 0, source: 'web', club_video: club_video, password: $('#password').val()},
            success: function (data) {
                $('.loader').removeClass('is-active');
                if (data.result.error === false) {
                    $('#type').val('');
                    $('#category_id').val('');
                    $('#name').val('');
                    cover_image = '';
                    logo = '';
                    $('#state').val('')
                    $('#city').val('');
                    $('#zip').val('')
                    $('#landmark').val('');
                    $('#address').val('');
                    $('#club_leader_name').val('');
                    $('#email').val('');
                    $('#email_id').val('');
                    $('#mobile').val('');
                    $('#about').val('');
                    $('#facebook_link').val('');
                    $('#youtube_link').val('');
                    $('#twitter_link').val('');
                    $('#instagram_link').val('');
                    $('#password').val('');
                    $('#confirm_password').val('');
                    club_video = '';
                    swal("Thank you!", " Our Team will get in touch with you soon.", "success");
                } else {
                    swal("Oops!", data.result.message, "info");
                }
            },
            error: function (err) {
                $('.loader').removeClass('is-active');
                swal("Oops!", err.statusText, "error");
            }
        });
    }
    return false;
}
