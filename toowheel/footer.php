<footer class="footer">
    <div class="footer-sec">
        <div class="footer-section fooetr-1">
            <img src="img/footer-logo.png" alt=""/>
        </div>
        <div class="footer-section fooetr-2">
            <ul class="footer__nav">
                <li class="nav__item">
                    <h2 class="nav__title">PAGES</h2>
                    <ul class="nav__ul">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">News & Media</a>
                        </li>
                        <li>
                            <a href="#">Press Release</a>
                        </li>
                        <li>
                            <a href="#">Gallery</a>
                        </li>
                        <li>
                            <a href="#">Join A Club</a>
                        </li>
                        <li>
                            <a href="#">Partners</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="footer-section  fooetr-3">
            <ul class="footer__nav">
                <li class="nav__item">
                    <h2 class="nav__title">ABOUT US</h2>
                    <ul class="nav__ul">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">News & Media</a>
                        </li>
                        <li>
                            <a href="#">Press Release</a>
                        </li>
                        <li>
                            <a href="#">Gallery</a>
                        </li>
                        <li>
                            <a href="#">Join A Club</a>
                        </li>
                        <li>
                            <a href="#">Partners</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="footer-section fooetr-4">
            <ul class="footer__nav">
                <li class="nav__item">
                    <h2 class="nav__title">CAREERS</h2>
                    <ul class="nav__ul">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">News & Media</a>
                        </li>
                        <li>
                            <a href="#">Press Release</a>
                        </li>
                        <li>
                            <a href="#">Gallery</a>
                        </li>
                        <li>
                            <a href="#">Join A Club</a>
                        </li>
                        <li>
                            <a href="#">Partners</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="footer-section fooetr-5">
            <ul class="footer__nav">
                <li class="nav__item">
                    <h2 class="nav__title">ALWAYS GET IN TOUCH</h2>
                    <ul class="nav__ul">
                        <li>
                            <a href="#">Receive updates on our Upcoming Events</a>
                        </li>
                        <li>
                            <input type="email" placeholder="Email Address">
                            <button type="submit">submit</button>
                        </li>
                        <li class="i-con">
                            <i class="fa fa-facebook-square" aria-hidden="true"></i>
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
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
<script>
    function openNav() {
        document.getElementById("mySidenav").style.height = "100%";
        document.getElementById("mySidenav").style.top = "108px";
    }
    function closeNav() {
        document.getElementById("mySidenav").style.height = "0";
        document.getElementById("mySidenav").style.top = "-60px";
    }

//    var modal = document.getElementById("mySidenav");
//    window.onclick = function (event) {
//        if (event.target == modal) {
//            modal.style.height = "0%";
//            modal.style.top = "-60px";
//        }
//    };

    $(document).ready(function () {
        $('#nav-icon3').click(function () {
            $(this).toggleClass('open');
            if ($(this).hasClass('open')) {
                openNav();
            } else {
                closeNav();
            }
        });
    });
</script>
<script>
    function signIn() {
        document.getElementById("sign-up").style.display = "block";
        document.getElementById("log-in").style.display = "none";
    }
    function logIn() {
        document.getElementById("sign-up").style.display = "none";
        document.getElementById("log-in").style.display = "block";
    }

</script>
<!--mega-menu-->
<!--calender-->
<script src="js/calender.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {

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
    });
</script>
<!--mega-menu-->
