<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['student_register_id'])) {
    $login_student = $obj->selectRow('*', 'student_register', 'student_register_id = ' . $_SESSION["student_register_id"]);
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head_landing.php'; ?>
    <body>
        <?php include 'menu_landing.php'; ?>
        <div class="sample-learning-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-t-b-30px">
                            <div class="intro-title">
                                <h2>Get Started to a Great Career</h2>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            <div class="sample-screenshot">
                                <ul>
                                    <li><i class="fa fa-check"></i> Year Order / Subject Order</li>
                                    <li><img src="img/screenshots/year-subject.png" alt="" /></li>
                                    <li><i class="fa fa-check"></i> Explanation Image</li>
                                    <li><img src="img/screenshots/explanation.png" alt="" /></li>
                                    <li><i class="fa fa-check"></i> Detail Result</li>
                                    <li><img src="img/screenshots/result.png" alt="" /></li>
                                </ul>
                            </div>
                            <!--<div class="price-detail">
                                <h4><strike>₹999</strike> Avail the Best Discount <span>₹499</span></h4>
                            </div>-->

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-t-b-30px">
                            <!--                        <div class="p-t-b-30px">
                                                        <h3>Sample screenshots</h3>
                                                        <div class="slick-carousel">
                                                             <div><div class="slide-content"><img src="examhorse-landing/img/project-slide/slide-site.png" alt="" /></div></div>
                                                            <div><div class="slide-content"><img src="examhorse-landing/img/project-slide/login-1.png" alt="" /></div></div>
                                                            <div><div class="slide-content"><img src="examhorse-landing/img/project-slide/language.png" alt="" /></div></div>
                                                            <div><div class="slide-content"><img src="examhorse-landing/img/project-slide/login.png" alt="" /></div></div> 
                                                            <div><div class="slide-content"><img src="examhorse-landing/img/project-slide/year.png" alt="" /></div></div>
                                                            <div><div class="slide-content"><img src="examhorse-landing/img/project-slide/quiz.png" alt="" /></div></div>
                                                            <div><div class="slide-content"><img src="examhorse-landing/img/project-slide/score.png" alt="" /></div></div>
                                                        </div>
                                                    </div>-->
                            <div class="pay-register">
                                <div class="intro-title">
                                    <h3>Introductory Offer</h3>
                                </div>
                                <div class="price-detail">
                                    <h4><strike>₹999 </strike> &nbsp;&nbsp; <span> ₹499</span></h4>
                                </div>
                                <a href="register_user" class="btn btn-green" style="font-size: 20px">Pay Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer_landing.php'; ?>
    </div>
    <?php include 'landing_script.php'; ?>
    <script type="text/javascript">
        $(document).ready(function () {
            var showHeaderAt = 150;
            var win = $(window),
                    body = $('body');
            // Show the fixed header only on larger screen devices
            if (win.width() > 600) {
                // When we scroll more than 150px down, we set the
                // "fixed" class on the body element.
                win.on('scroll', function (e) {
                    if (win.scrollTop() > showHeaderAt) {
                        body.addClass('fixed');
                    } else {
                        body.removeClass('fixed');
                    }
                });
            }
        });
    </script>
    <script>
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
    </script>

    <script type="text/javascript">
        $("#open-logout").click(function (e) {
            //console.log("test");
            e.stopPropagation();
            $(".logout_dropdown").show("fast");
        });
        $(document).click(function (e) {
            if (!(e.target.class === 'logout_dropdown')) {
                $(".logout_dropdown").hide("fast");
            }
        });
    </script>
    <script type="text/javascript">
        $().ready(function () {
            $('.slick-carousel').slick({
                arrows: false,
                centerPadding: "0px",
                dots: true,
                slidesToShow: 1,
                infinite: false,
                autoplay: true,
            });
        });
    </script>
</body>
</html>
