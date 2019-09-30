<footer class="ftco-footer ftco-section">
       <div class="row">
            <div class="mouse">
                <a href="#" class="mouse-icon">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                </a>
            </div>
        </div>
        <div class="row footer-h">
            <div class="footer-1">
                <div class="ftco-footer-widget mb-4">
                    <img src="images/logo-01.png" alt=""/>
                    <!--                  <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                        </ul>-->
                </div>
            </div>
            <div class="footer-1">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Menu</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Products</a></li>
                        <li><a href="#" class="py-2 d-block">Applications</a></li>
                        <li><a href="#" class="py-2 d-block">Artifacts</a></li>
                        <li><a href="#" class="py-2 d-block">Testimonial</a></li>
                        <li><a href="#" class="py-2 d-block">About</a></li>
                        <li><a href="#" class="py-2 d-block">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-1">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Our Brands</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                            <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                            <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">FAQs</a></li>
                            <li><a href="#" class="py-2 d-block">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-1">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Fresche Newsletter</h2>
                    <div class="block-23 mb-3">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <form>
                            <div class="news">
                                <input type="text" name="fname" placeholder="Name">
                            </div>
                            <div class="news">
                                <input type="email" name="email" placeholder="Email Address">
                            </div>

                            <div class="button-2">
                                <div class="eff-1"></div>
                                <a href="#">SUBMIT</a>
                            </div>
                            </ul>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center copy">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>
<script src="js/materialize.min.js" type="text/javascript"></script>
<script src="js/materialize.js" type="text/javascript"></script>
<script>
                        $(document).ready(function () {
                            var owl = $('.owl-carousel');
                            owl.owlCarousel({
                                items: 3,
                                loop: true,
                                margin: 10,
                                autoplay: true,
                                autoplayTimeout: 2000,
                                autoplayHoverPause: true
                            });
                            $('.play').on('click', function () {
                                owl.trigger('play.owl.autoplay', [0])
                            })
                            $('.stop').on('click', function () {
                                owl.trigger('stop.owl.autoplay')
                            })
                        })
</script>
<script>
    function openForm() {
        document.getElementById("contact-form").style.display = "block";
    }

    function closeForm() {
        document.getElementById("contact-form").style.display = "none";
    }
</script>
<script>
    window.onscroll = function () {
        myFunction()
    };

    var navbar = document.getElementById("ftco-navbar");
    var sticky = 50;//navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>