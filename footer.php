<!-- copy right -->
<p class="footer-class">© 2018 ALIAS. All Rights Reserved | Design by
    <a href="http://www.yellowandgray.com/" target="_blank">YG Studio</a>
</p>
<!-- //copy right -->
<!-- bootstrap-pop-up for login and register -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Be a Member of Revenue
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <section>
                <div class="modal-body">
                    <div class="loginf_module">
                        <div class="module form-module">
                            <div class="toggle">
                                <i class="fa fa-times fa-pencil"></i>
                                <div class="tooltip">Click Me</div>
                            </div>
                            <div class="form">
                                <h3>Login to your account</h3>
                                <form action="#" method="post">
                                    <input type="text" name="Username" placeholder="Username" required="">
                                    <input type="password" name="Password" placeholder="Password" required="">
                                    <input type="submit" value="Login">
                                </form>
                                <div class="cta">
                                    <a href="#">Forgot password?</a>
                                </div>
                            </div>
                            <div class="form">
                                <h3>Create a new account</h3>
                                <form action="#" method="post">
                                    <input type="text" name="Username" placeholder="Username" required="">
                                    <input type="password" name="Password" placeholder="Password" required="">
                                    <input type="email" name="Email" placeholder="Email address" required="">
                                    <input type="text" name="Phone" placeholder="Phone Number" required="">
                                    <input type="submit" value="Register">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- //bootstrap-pop-up for login and register-->

<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- //js -->
<!-- about numscroller -->
<script src="js/numscroller-1.0.js"></script>
<!-- //about numscroller -->
<!-- banner Slider starts Here -->
<script src="js/responsiveslides.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 3
        $("#slider3").responsiveSlides({
            auto: true,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!-- //banner slider script ends -->
<!-- sign in and signup pop up toggle script -->
<script>
    $('.toggle').click(function () {
        // Switches the Icon
        $(this).children('i').toggleClass('fa-pencil');
        // Switches the forms  
        $('.form').animate({
            height: "toggle",
            'padding-top': 'toggle',
            'padding-bottom': 'toggle',
            opacity: "toggle"
        }, "slow");
    });
</script>
<!-- sign in and signup pop up toggle script -->
<!-- team desoslide-JavaScript -->
<script src="js/jquery.desoslide.js"></script>
<script>
    $('#demo1_thumbs').desoSlide({
        main: {
            container: '#demo1_main_image',
            cssClass: 'img-responsive'
        },
        effect: 'sideFade',
        caption: true
    });
</script>
<script>
    $(document).ready(function () {
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 1
                    }
                }]
        });
    });
</script>
<!-- //team desoslide-JavaScript -->
<!-- Flexslider-js for-testimonials -->
<script src="js/jquery.flexisel.js"></script>
<script>
    $(window).load(function () {
        $("#flexiselDemo1").flexisel({
            visibleItems: 1,
            animationSpeed: 1000,
            autoPlay: false,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 1
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 1
                }
            }
        });

    });
</script>
<!-- //Flexslider-js for-testimonials -->
<!-- start-smooth-scrolling -->
<script src="js/move-top.js"></script>
<script src="js/easing.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
<script>
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear' 
         };
         */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<script src="js/SmoothScroll.min.js"></script>
<!-- //smooth-scrolling-of-move-up -->
<!-- gallery smoothbox -->
<script src="js/smoothbox.jquery2.js"></script>
<script src="js/wow.js" type="text/javascript"></script>
<!-- //gallery smoothbox -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap.js"></script>