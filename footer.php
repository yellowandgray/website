<!--Footer Start-->
<footer class="h3footer wf100">
    <div class="container">
        <div class="row">
            <!--Footer Widget Start-->
            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="footer-widget">
                    <h3>About VPN</h3>
                    <p> When you embrace eco awareness as a part of your daily life, you can defintiely think about the Environment business.</p>
                    <p> Here we have some our Promises: </p>

                </div>
            </div>
            <!--Footer Widget End--> 
            <!--Footer Widget Start-->
            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="footer-widget">
                    <h3>Menu</h3>
                    <ul class="quick-links">
                        <li><a href="index.php"><i class="fas fa-angle-right"></i> Home</a></li>
                        <li><a href="about.php"><i class="fas fa-angle-right"></i> About Us</a></li>
                        <li><a href="tele-communication.php"><i class="fas fa-angle-right"></i> Products</a></li>
                        <li><a href="partners.php"><i class="fas fa-angle-right"></i> Our Partners</a></li>
                        <li><a href="contact.php"><i class="fas fa-angle-right"></i> Contact </a></li>
                    </ul>
                </div>
            </div>
            <!--Footer Widget End--> 
            <!--Footer Widget Start-->
            <div class="col-md-4 col-sm-12">
                <div class="footer-widget">
                    <h3>Join Us</h3>
                    <div class="newsletter">
                        <form class="enquiry-footer-form">
                            <ul>
                                <li class="form-group">
                                    <input type="text" placeholder="Your Name" name="fname" required>
                                </li>
                                <li class="form-group">
                                    <input type="email" placeholder="Your Email" name="email" required>
                                </li>
                                <li>
                                    <input type="submit" value="Enquiry Now">
                                </li>
                            </ul>
                        </form>
                    </div>
                    <!--<div class="footer-social"><a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-linkedin-in"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a href="#"><i class="fab fa-instagram"></i></a> <a href="#"><i class="fab fa-youtube"></i></a> </div>-->
                </div>
            </div>
            <!--Footer Widget End--> 
        </div>
        <div class="row footer-copyr">
            <div class="col-md-12 col-sm-12">
                <p>© 2019 VPN Commodities Pte Ltd | Design &amp; Developed By: <a href="http://yellowandgray.sg/" target="blank">YG STUDIO</a> </p>
            </div>
        </div>
    </div>
</footer>
<!--Footer End--> 

<!--   JS Files Start  --> 
<script src="js/jquery-3.3.1.min.js"></script> 
<script src="js/jquery-migrate-1.4.1.min.js"></script> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/jquery.prettyPhoto.js"></script> 
<script src="js/isotope.min.js"></script> 
<script src="js/custom.js"></script>
<script src="js/wow.js"></script>
<script src="js/contact.form.js" type="text/javascript"></script>
<script src="js/sweetalert.min.js" type="text/javascript"></script>
<!--<script>
    wow = new WOW(
            {
                animateClass: 'animated',
                offset: 100,
                callback: function (box) {
                    console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                }
            }
    );
    wow.init();
    document.getElementById('moar').onclick = function () {
        var section = document.createElement('section');
        section.className = 'section--purple wow fadeInDown';
        this.parentNode.insertBefore(section, this);
    };
</script>-->
<script>
    window.onscroll = function () {
        myFunction()
    };

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>
<script>
    function openForm() {
        document.getElementById("contact-form").style.display = "block";
    }

    function closeForm() {
        document.getElementById("contact-form").style.display = "none";
    }
</script>
<!--loadingpage-->
<script>
    setTimeout(function () {
        $('.inner div').addClass('done');

        setTimeout(function () {
            $('.inner div').addClass('page');

            setTimeout(function () {
                $('.pageLoad').addClass('off');

                $('body, html').addClass('on');


            }, 1000)
        }, 1000)
    }, 1500)
</script>