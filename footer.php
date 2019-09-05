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

    <!--    <div class="legal">
            <p>&copy; 2019 TOOWHEEl. All Right Reserved</p>
            <span class="legal__links">
                <a href="#">Privacy Policy</a>
                <span></span>
                <a href="#">Terms of Use</a>
            </span>
        </div>-->
</footer>
<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/slick-slider.js" type="text/javascript"></script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.height = "100%";
        document.getElementById("mySidenav").style.top = "0px";
    }

    var modal = document.getElementById("mySidenav");
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.height = "0%";
            modal.style.top = "-60px";

        }
    }


</script>
<!--mega-menu-->
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

// Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>


