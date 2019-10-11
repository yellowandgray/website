<footer class="footer">
    <div class="footer-sec">
        <div class="footer-section fooetr-1">
            <img src="img/footer-logo.png" alt=""/>
        </div>
        <div class="footer-section fooetr-2">
            <ul class="footer__nav">
                <li class="nav__item">
                    <a href="index.php?type=two_wheel" class="footer-text">2 Wheel</a>
                    <br/>
                    <a href="index.php?type=four_wheel" class="footer-text">4 Wheel</a>
                    <br/>
                    <a href="news-updates.php?type=<?php echo $type; ?>" class="footer-text">NEWS & MEDIA</a>
                    <br/>
                    <a href="events.php?type=<?php echo $type; ?>" class="footer-text">UPCOMING EVENTS</a>
                    <br/>
                    <a href="press-release.php?type=<?php echo $type; ?>" class="footer-text">PRESS RELEASE</a>
                </li>
            </ul>
        </div>
        <div class="footer-section fooetr-3">
            <ul class="footer__nav">
                <li class="nav__item">
                    <h2 class="nav__title">MEMBERS</h2>
                    <ul class="nav__ul">
                        <li>
                            <a href="login.php?type=<?php echo $type; ?>">Login</a>
                        </li>
                        <li>
                            <a href="member-register.php?type=<?php echo $type; ?>">Be A Member</a>
                        </li>
                        <li>
                            <a href="member-benefits.php?type=<?php echo $type; ?>">Member Benefits</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="footer__nav">
                <li class="nav__item">
                    <h2 class="nav__title">CLUB</h2>
                    <ul class="nav__ul">
                        <li>
                            <a href="find-a-club.php?type=<?php echo $type; ?>">Find A Club</a>
                        </li>
                        <li>
                            <a href="club-register.php?type=<?php echo $type; ?>">Register My Club</a>
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
                            <a href="about.php?type=<?php echo $type; ?>">About us</a>
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
                            <a href="https://www.facebook.com/Toowheel-Malaysia-102602757819930" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            <a href="https://www.instagram.com/p/B2iG45lnGi-/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="https://twitter.com/@ToowheelM" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="https://www.youtube.com/channel/UCueyRbB52hjc0XUIqbkYxcg" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </li>
            </ul>
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
<script type="text/javascript">
                                function openNav() {
                                    document.getElementById("mySidenav").style.height = "100%";
                                    document.getElementById("mySidenav").style.top = "118px";
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
                                    // Step show event
                                    $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
                                        //alert("You are on step "+stepNumber+" now");
                                        if (stepPosition === 'first') {
                                            $("#prev-btn").addClass('disabled');
                                        } else if (stepPosition === 'final') {
                                            $("#next-btn").addClass('disabled');
                                        } else {
                                            $("#prev-btn").removeClass('disabled');
                                            $("#next-btn").removeClass('disabled');
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
                                        toolbarSettings: {toolbarPosition: 'both',
                                            toolbarExtraButtons: [btnFinish, btnCancel]
                                        }
                                    });
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
//                                $.each(autocomplete_club, function (key, val) {
//                                    autocomplete_suggestion.push({value: val.name, data: {category: 'club', id: val.club_id}});
//                                });
//                                $.each(autocomplete_news, function (key, val) {
//                                    autocomplete_suggestion.push({value: val.title, data: {category: 'news', id: val.news_id}});
//                                });
//                                $.each(autocomplete_press_release, function (key, val) {
//                                    autocomplete_suggestion.push({value: val.title, data: {category: 'press_release', id: val.press_release_id}});
//                                });
//                                console.log(autocomplete_suggestion);
//                                $('.head-search').devbridgeAutocomplete({
//                                    lookup: autocomplete_suggestion,
//                                    minChars: 1,
//                                    onSelect: function (suggestion) {
//                                        if (suggestion.data.category == 'news') {
//                                            window.location = 'news.php?nid=' + suggestion.data.id;
//                                        }
//                                        if (suggestion.data.category == 'news') {
//                                            window.location = 'news.php?nid=' + suggestion.data.id;
//                                        }
//
//                                    },
//                                    showNoSuggestionNotice: true,
//                                    noSuggestionNotice: 'Sorry, no matching results',
//                                    groupBy: 'category'
//                                });
</script>
<!--mega-menu-->
