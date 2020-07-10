<footer>
    <div class="container">
        <div class="text-center copy-rights">
            <p>EVEREST E&C PTE LTD. Copyright &copy; All Rights Reserved</p>
        </div>
        <div class="footer-ul">
            <ul>
                <li><a href="index">HOME</a></li>
                <li><a href="about-us">ABOUT US</a></li>
                <!--                <li>MECHANICAL</li>
                                <li>STEEL STRUCTURE</li>
                                <li>SCAFFOLDING</li>
                                <li>PIPING & INSULATION</li>-->
                <li><a href="projects">PROJECTS</a></li>
                <li><a href="services">SERVICES</a></li>
                <li><a href="clients">CLIENTS</a></li>
                <li><a href="awards">AWARDS</a></li>
                <li><a href="contact-us">CONTACT US</a></li>
            </ul>
        </div>
    </div>
</footer>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/slick.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $('.carousel').carousel();

    // vars
    'use strict'
    var testim = document.getElementById("testim"),
            testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
            testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
            testimLeftArrow = document.getElementById("left-arrow"),
            testimRightArrow = document.getElementById("right-arrow"),
            testimSpeed = 4500,
            currentSlide = 0,
            currentActive = 0,
            testimTimer,
            touchStartPos,
            touchEndPos,
            touchPosDiff,
            ignoreTouch = 30;
    ;

    window.onload = function () {

        // Testim Script
        function playSlide(slide) {
            for (var k = 0; k < testimDots.length; k++) {
                testimContent[k].classList.remove("active");
                testimContent[k].classList.remove("inactive");
                testimDots[k].classList.remove("active");
            }

            if (slide < 0) {
                slide = currentSlide = testimContent.length - 1;
            }

            if (slide > testimContent.length - 1) {
                slide = currentSlide = 0;
            }

            if (currentActive != currentSlide) {
                testimContent[currentActive].classList.add("inactive");
            }
            testimContent[slide].classList.add("active");
            testimDots[slide].classList.add("active");

            currentActive = currentSlide;

            clearTimeout(testimTimer);
            testimTimer = setTimeout(function () {
                playSlide(currentSlide += 1);
            }, testimSpeed)
        }

        testimLeftArrow.addEventListener("click", function () {
            playSlide(currentSlide -= 1);
        })

        testimRightArrow.addEventListener("click", function () {
            playSlide(currentSlide += 1);
        })

        for (var l = 0; l < testimDots.length; l++) {
            testimDots[l].addEventListener("click", function () {
                playSlide(currentSlide = testimDots.indexOf(this));
            })
        }

        playSlide(currentSlide);

        // keyboard shortcuts
        document.addEventListener("keyup", function (e) {
            switch (e.keyCode) {
                case 37:
                    testimLeftArrow.click();
                    break;

                case 39:
                    testimRightArrow.click();
                    break;

                case 39:
                    testimRightArrow.click();
                    break;

                default:
                    break;
            }
        })

        testim.addEventListener("touchstart", function (e) {
            touchStartPos = e.changedTouches[0].clientX;
        })

        testim.addEventListener("touchend", function (e) {
            touchEndPos = e.changedTouches[0].clientX;

            touchPosDiff = touchStartPos - touchEndPos;

            console.log(touchPosDiff);
            console.log(touchStartPos);
            console.log(touchEndPos);


            if (touchPosDiff > 0 + ignoreTouch) {
                testimLeftArrow.click();
            } else if (touchPosDiff < 0 - ignoreTouch) {
                testimRightArrow.click();
            } else {
                return;
            }

        })
        ,
    };

</script>