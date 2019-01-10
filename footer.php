<!-- footer-top -->	
<div class="footer-top">
    <div class="container">
        <div class="col-md-3 foot-left">
            <h3>Get In Touch</h3>
<!--            <p>Lorem Ipsum is simply dummy text of the printing and typesetting dummy Ipsum text.</p>-->

            <div class="contact-btm">
                <span class="fa fa-map-marker" aria-hidden="true"></span>
                <p style="margin-left: 23px;margin-top: -23px;">Penthouse, 16-1, Level 16 Mz5, Wisma UOA Damansara II, No. 6, Changkat Semantan, Damansara Heights, 50490 Kuala Lumpur, Malaysia</p>
            </div>
            <div class="contact-btm">
                <span class="fa fa-phone" aria-hidden="true"></span>
                <p>+456-123-7890</p>
            </div>
            <div class="contact-btm">
                <span class="fa fa-file" aria-hidden="true"></span>
                <p>+145-6-123-7890</p>
            </div>
            <div class="contact-btm">
                <span class="fa fa-envelope-o" aria-hidden="true"></span>
                <p><a href="mailto:example@email.com">info@example.com</a></p>
            </div>
            <div class="contact-btm">
                <span class="fa fa-globe" aria-hidden="true"></span>
                <p><a href="#">www.website.com</a></p>
            </div>
            <div class="clearfix"></div>

        </div>
        <div class="col-md-3 foot-left">
            <h3>Recent Posts</h3>
            <div class="post1">
                <div class="col-md-3 icon">
                    <span class="fa fa-twitter" aria-hidden="true"></span>
                </div>
                <div class="col-md-9 text">
                    <p>Lorem Ipsum is simpl dummy text of the printing simple.</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="post1">
                <div class="col-md-3 icon">
                    <span class="fa fa-twitter" aria-hidden="true"></span>
                </div>
                <div class="col-md-9 text">
                    <p>Lorem Ipsum is simpl dummy text of the printing simple.</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="post1">
                <div class="col-md-3 icon">
                    <span class="fa fa-twitter" aria-hidden="true"></span>
                </div>
                <div class="col-md-9 text">
                    <p>Lorem Ipsum is simpl dummy text of the printing simple.</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-3 foot-left">
            <h3>Latest Works</h3>
            <ul>
                <li><a href="#"><img src="images/team1.jpg" alt="" class="img-responsive"></a></li>
                <li><a href="#"><img src="images/team2.jpg" alt="" class="img-responsive"></a></li>
                <li><a href="#"><img src="images/team3.jpg" alt="" class="img-responsive"></a></li>
                <li><a href="#"><img src="images/team2.jpg" alt="" class="img-responsive"></a></li>
                <li><a href="#"><img src="images/team1.jpg" alt="" class="img-responsive"></a></li>
                <li><a href="#"><img src="images/team3.jpg" alt="" class="img-responsive"></a></li>
                <li><a href="#"><img src="images/team3.jpg" alt="" class="img-responsive"></a></li>
                <li><a href="#"><img src="images/team2.jpg" alt="" class="img-responsive"></a></li>
                <li><a href="#"><img src="images/team1.jpg" alt="" class="img-responsive"></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-3 foot-left">
            <h3>Subscribe</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and Lorem Ipsum has text </p>
            <form action="#" method="post">	
                <input type="text" Name="Enter Your Name" placeholder="Enter Your Name" required="">
                <input type="email" Name="Enter Your Email" placeholder="Enter Your Email" required="">
                <input type="submit" value="Subscribe">
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- /footer-top -->							

<!-- footer -->
<div class="copy-right">
    <div class="container">
        <div class="col-md-8">
            <p>&copy; 2019 Alias Innovation SDN BHD. All rights reserved | Design by <a href="http://www.yellowandgray.com/">YG Studio.</a></p>
        </div>
        <div class="col-md-4">
            <ul class="footericons">
                <li><a href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
                <li><a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
                <li><a href="#"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
                <li><a href="#"><span class="fa fa-google-plus" aria-hidden="true"></span></a></li>
                <li><a href="#"><span class="fa fa-youtube" aria-hidden="true"></span></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //footer -->

<!-- Responsive slides -->
<script src="js/responsiveslides.min.js"></script>
<script>
    $(function () {
        $("#slider").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 1000,
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
<!-- //Responsive slides -->

<!-- carousel -->
<script src="js/owl.carousel.js"></script>
<script>
    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            items: 1,
            itemsDesktop: [768, 1],
            itemsDesktopSmall: [414, 1],
            lazyLoad: true,
            autoPlay: true,
            navigation: true,

            navigationText: false,
            pagination: true,

        });

    });
</script>
<!-- //carousel -->

<!-- bootstrap-modal-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Technical Solutions
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
            </div>
            <div class="modal-body">
                <img src="images/laptop.jpg" alt=" " class="img-responsive" />
                <p>Ut enim ad minima veniam, quis nostrum 
                    exercitationem ullam corporis suscipit laboriosam, 
                    nisi ut aliquid ex ea commodi consequatur? Quis autem 
                    vel eum iure reprehenderit qui in ea voluptate velit 
                    esse quam nihil molestiae consequatur, vel illum qui 
                    dolorem eum fugiat quo voluptas nulla pariatur.</p>
            </div>
        </div>
    </div>
</div>
<!-- //bootstrap-modal-pop-up --> 

<!-- start-smoth-scrolling -->
<script src="js/SmoothScroll.min.js"></script>

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>

<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear' 
         };
         */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<!-- //here ends scrolling icon -->

<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
