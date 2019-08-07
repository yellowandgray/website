<footer class="footer">
    <div class="footer-top wf100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <!--Footer Widget Start-->
                    <div class="footer-widget">
                        <h4>Project Next Door</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        <a href="#" class="lm color-o">About us</a> 
                    </div>
                    <!--Footer Widget End--> 
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <!--Footer Widget Start-->
                    <div class="footer-widget">
                        <h4>Menu</h4>
                        <ul class="quick-links">
                            <li><i class="fas fa-arrow-right"></i> <a href="#">Home</a></li>
                            <li><i class="fas fa-arrow-right"></i> <a href="#">Who we are</a></li>
                            <li><i class="fas fa-arrow-right"></i> <a href="#">Services</a></li>
                            <li><i class="fas fa-arrow-right"></i> <a href="#">Gallery</a></li>
                            <li><i class="fas fa-arrow-right"></i> <a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <!--Footer Widget End--> 
                </div>

            </div>
        </div>
    </div>
    <div class="footer-copyr wf100">
        <div class="container">
            <div class="row">
                <!--<div class="col-md-4 col-sm-4"> <img src="images/logo.png" alt=""> </div>-->
                <div class="col-md-8 col-sm-8">
                    <p> All Rights Reserved of Project Next Door © 2019</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="js/jquery-3.3.1.min.js"></script> 
<script src="js/jquery-migrate-1.4.1.min.js"></script> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/jquery.prettyPhoto.js"></script> 
<script src="js/isotope.min.js"></script> 
<script src="js/custom.js"></script>
<!--popup-->
<script>

    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function () {
        modal.style.display = "block";
    }
    span.onclick = function () {
        modal.style.display = "none";
    }
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<!-- top nav fixed on based scroll -->
<script>
// When the user scrolls down 20px from the top of the document, slide down the navbar
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("navbar").style.top = "0";


        } else {
            document.getElementById("navbar").style.top = "50px";

        }
    }
</script>