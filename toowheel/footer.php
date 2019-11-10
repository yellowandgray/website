<footer class="footer">
    <div class="container">
        <div class="footer-sec">
            <div class="footer-section fooetr-1">
                <img src="img/footer-logo.png" alt=""/>
            </div>
            <div class="footer-section fooetr-2">
                <ul class="footer__nav">
                    <li class="nav__item">
                        <a href="index?type=two_wheel" class="footer-text">2 Wheel</a>
                        <br/>
                        <a href="index?type=four_wheel" class="footer-text">4 Wheel</a>
                        <br/>
                        <a href="news-updates?type=<?php echo $type; ?>" class="footer-text">NEWS & MEDIA</a>
                        <br/>
                        <a href="events?type=<?php echo $type; ?>" class="footer-text">UPCOMING EVENTS</a>
                        <br/>
                        <a href="press-release?type=<?php echo $type; ?>" class="footer-text">PRESS RELEASE</a>
                    </li>
                </ul>
            </div>
            <div class="footer-section fooetr-3">
                <ul class="footer__nav">
                    <li class="nav__item">
                        <h2 class="nav__title">MEMBERS</h2>
                        <ul class="nav__ul">
                            <li>
                                <a href="login?type=<?php echo $type; ?>">Login</a>
                            </li>
                            <li>
                                <a href="member-register?type=<?php echo $type; ?>">Be A Member</a>
                            </li>
                            <li>
                                <a href="member-benefits?type=<?php echo $type; ?>">Member Benefits</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="footer__nav">
                    <li class="nav__item">
                        <h2 class="nav__title">CLUB</h2>
                        <ul class="nav__ul">
                            <li>
                                <a href="find-a-club?type=<?php echo $type; ?>">Find A Club</a>
                            </li>
                            <li>
                                <a href="club-register?type=<?php echo $type; ?>">Register My Club</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="footer-section fooetr-4">
                <ul class="footer__nav">
                    <li class="nav__item">
                        <h2 class="nav__title">TOOWHEEL</h2>
                        <ul class="nav__ul">
                            <li>
                                <a href="about?type=<?php echo $type; ?>">About us</a>
                            </li>
                            <li>
                                <a href="#">Contact us</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="footer-section fooetr-5">
                <ul class="footer__nav">
                    <li class="nav__item">
                        <h2 class="nav__title color-w">ALWAYS GET IN TOUCH</h2>
                        <span>Receive updates on our Upcoming Events</span>
                        <ul class="nav__ul" style="margin-top: 10px;">
                            <li>
                                <form onsubmit="return subscribeNewsLetter();">
                                    <input type="email" id="newsletter_email" name="newsletter_email" placeholder="Email Address" required="" />
                                    <button type="submit">submit</button>
                                </form>
                            </li>
                            <li class="i-con text-center">
                                <a href="https://www.facebook.com/Toowheel-Malaysia-102602757819930" target="_blank"><img src="img/social-icons/fb.png" alt="fb"></a>
                                <a href="https://www.instagram.com/p/B2iG45lnGi-/" target="_blank"><img src="img/social-icons/insta.png" alt="fb"></a>
                                <a href="https://twitter.com/@ToowheelM" target="_blank"><img src="img/social-icons/twitter.png" alt="fb"></a>
                                <a href="https://www.youtube.com/channel/UCueyRbB52hjc0XUIqbkYxcg" target="_blank"><img src="img/social-icons/yt.png" alt="fb"></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/slick-slider.js" type="text/javascript"></script>
<script src="js/rangeslider.min.js" type="text/javascript"></script>
<script src="js/jquery.easing.min.js" type="text/javascript"></script>
<script src="js/jquery.smartWizard_step_by.min.js" type="text/javascript"></script>
<script src="js/html5lightbox.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/fs-gal.js" type="text/javascript"></script>
<script src="js/sweet-alert.min.js" type="text/javascript"></script>
<script src="js/jquery.autocomplete.min.js" type="text/javascript"></script>
<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
<script>
                                    function showTextPassword() {
                                        var x = document.getElementById("password");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                    }
                                    function showTextPassword1() {
                                        var x = document.getElementById("cnfpassword");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                    }
                                    function showTextPassword2() {
                                        var x = document.getElementById("confirm_password");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                    }
</script>
<script type="text/javascript">

    $(document).ready(function () {
        $('#close-btn').click(function () {
            $('#search-menu-overlay').fadeOut();
            $('#search-menu-btn').show();
        });
        $('#search-menu-btn').click(function () {
            $(this).hide();
            $('#search-menu-overlay').fadeIn();
        });
    });
</script>
<script type="text/javascript">
    function openNav() {
        document.getElementById("mySidenav").style.height = "100%";
        document.getElementById("mySidenav").style.top = "95px";
    }
    function closeNav() {
        document.getElementById("mySidenav").style.height = "0";
        document.getElementById("mySidenav").style.top = "-800px";
    }
    $(document).ready(function () {
        $('#nav-icon3').click(function () {
            $(this).toggleClass('open');
            if ($(this).hasClass('open')) {
                openNav();
            } else {
                closeNav();
            }
        });
        $('body').click(function () {
            if (!$('#nav-icon3').hasClass('open')) {
                closeNav();
            }
        });
        // Step show event
        $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
            $('.sw-btn-next').removeClass('hidden');
            $('.sw-btn-prev').removeClass('hidden');
            if (stepNumber === 2) {
                $('.sw-btn-next').addClass('hidden');
            }
            if (stepNumber === 0) {
                $('#smartwizard').smartWizard("disabledSteps", 2);
            }
            if (stepNumber === 3) {
                $('.sw-btn-next').addClass('hidden');
                $('.sw-btn-prev').addClass('hidden');
            }
        });

        // Toolbar extra buttons
        var btnFinish = $('<button></button>').text('Finish')
                .addClass('btn btn-info')
                .on('click', function () {
                    alert('Finish Clicked');
                });
        var btnCancel = $('<button></button>').text('Cancel')
                .addClass('btn btn-danger')
                .on('click', function () {
                    $('#smartwizard').smartWizard("reset");
                });

        // Please note enabling option "showStepURLhash" will make navigation conflict for multiple wizard in a page.
        // so that option is disabling => showStepURLhash: false

        // Smart Wizard 1
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'arrows',
            transitionEffect: 'fade',
            showStepURLhash: false,
            anchorClickable: false,
            enableAllAnchors: false,
            useURLhash: false,
            anchorSettings: {
                enableAnchorOnDoneStep: false
            },
            toolbarSettings: {toolbarPosition: 'both',
                toolbarExtraButtons: [btnFinish, btnCancel]
            }
        });
        $('#smartwizard_container').removeClass('hidden');
        $(".set > a").on("click", function () {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(this)
                        .siblings(".content")
                        .slideUp(200);
                $(".set > a i")
                        .removeClass("fa-minus")
                        .addClass("fa-plus");
            } else {
                $(".set > a i")
                        .removeClass("fa-minus")
                        .addClass("fa-plus");
                $(this)
                        .find("i")
                        .removeClass("fa-plus")
                        .addClass("fa-minus");
                $(".set > a").removeClass("active");
                $(this).addClass("active");
                $(".content").slideUp(200);
                $(this)
                        .siblings(".content")
                        .slideDown(200);
            }
        });
    });
    $.each(autocomplete_club, function (key, val) {
        autocomplete_suggestion.push({value: val.name, data: {category: 'Club', id: val.club_id}});
    });
    $.each(autocomplete_news, function (key, val) {
        autocomplete_suggestion.push({value: val.title, data: {category: 'News', id: val.news_id}});
    });
    $.each(autocomplete_press_release, function (key, val) {
        autocomplete_suggestion.push({value: val.title, data: {category: 'Press Release', id: val.press_release_id}});
    });
    $('.head-search').devbridgeAutocomplete({
        lookup: autocomplete_suggestion,
        minChars: 1,
        onSelect: function (suggestion) {
            if (suggestion.data.category == 'News') {
                window.location = 'news?nid=' + suggestion.data.id;
            }
            if (suggestion.data.category == 'Club') {
                window.location = 'club-page?cid=' + suggestion.data.id;
            }
            if (suggestion.data.category == 'Press Release') {
                window.location = 'press?pid=' + suggestion.data.id;
            }
        },
        showNoSuggestionNotice: true,
        noSuggestionNotice: 'Sorry, no matching results',
        groupBy: 'category'
    });
    $("#open-logout").click(function (e) {
        console.log("test");
        e.stopPropagation();
        $("#logout-dropdown").show("fast");
    });
    $(document).click(function (e) {
        if (!(e.target.id === 'logout-dropdown')) {
            $("#logout-dropdown").hide("fast");
        }
    });
    $("#open-logout1").click(function (e) {
        console.log("test");
        e.stopPropagation();
        $("#logout-dropdown1").show("fast");
    });
    $(document).click(function (e) {
        if (!(e.target.id === 'logout-dropdown1')) {
            $("#logout-dropdown1").hide("fast");
        }
    });
</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script>
<!--mega-menu-->
