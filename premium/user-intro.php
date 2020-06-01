<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section id="featured-1">
                <div class="container">
                    <div class="row">
                        <div class="span6">
                            <div class="p-t-b-30px user-intro-content">
                                <div class="intro-title">
                                    <h2>Where Success Happens</h2>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>
                                <br/>
                                <form class="subscription">
                                    <a href="select_language">Start Here</a>
                                </form>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="p-t-b-30px">
                                <!--                            <h3>Sample screenshots</h3>-->
                                <img src="../examhorse-landing/img/welcome-page-paid-user.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php include 'footer.php'; ?>
        </div>
        <?php include 'script.php'; ?>
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
