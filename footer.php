<!-- FOOTER
    ================================================== -->
<footer class="section " id="footer">
    <div class="overlay footer-overlay"></div>
    <!--Content -->
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-lg-8 col-sm-12">
                <div class="footer-widget">
                    <!-- Brand -->
                    <a href="#" class="footer-brand text-white">
                        SJ-VARIED
                    </a>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget">
                    <h3>About</h3>
                    <!-- Links -->
                    <ul class="footer-links ">
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Corporate fact sheet
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Gallery
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Media
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Technology
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> <!-- / .row -->
        <div class="row text-right pt-5">
            <div class="col-lg-12">
                <!-- Copyright -->
                <p class="footer-copy" style="text-align: left;">
                    &copy; Copyright <span class="current-year"></span> All rights reserved. Created By <a href="http://www.yellowandgray.com/">YGSTUDIO</a>
                </p>
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</footer>


<!--  Page Scroll to Top  -->

<a class="scroll-to-top js-scroll-trigger" href=".top-header">
    <i class="fa fa-angle-up"></i>
</a>

<!-- JAVASCRIPT
================================================== -->
<!-- Global JS -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>

<!-- Plugins JS -->
<script src="assets/js/bootstrap.min.js"></script>

<!-- Slick JS -->
<script src="assets/js/jquery.easing.1.3.js"></script>
<script src="assets/js/slick.min.js"></script>
<!-- Theme JS -->
<script src="assets/js/theme.js"></script>
<!--top scroll-->
<script>
    $(function () {
        var header = $(".header");
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 200) {
                header.removeClass('header').addClass("header-alt");
            } else {
                header.removeClass("header-alt").addClass('header');
            }
        });
    });
</script>
<script>
    /*
     ** With Slick Slider Plugin : https://github.com/marvinhuebner/slick-animation
     ** And Slick Animation Plugin : https://github.com/marvinhuebner/slick-animation
     */

// Init slick slider + animation
    $('.slider').slick({
        autoplay: true,
        speed: 800,
        lazyLoad: 'progressive',
        arrows: false,
        dots: true,
    }).slickAnimation();

</script>