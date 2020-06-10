<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head_landing.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu_landing.php'; ?>
            <section id = "content" class="about-section-exam-horse">
                <div class = "container">
                    <div class = "row">
                        <div class = "col-md-6">
                            <img src = "img/about-examhorse.jpg" alt = "About Exam Horse" />
                        </div>
                        <div class = "col-md-6 about-content">
                            <h2 style="border-bottom:2px solid #f03c02">About Us</h2>
                            <p>With the mission of making Learning easy, a team of passionate educational researchers has made use of the old adage "A Picture Worth Thousand Words". Having Bachelor's and Masters's degrees from the reputed institutes both in India and the USA helped this mission very much.</p>
                        </div>
                    </div>
                </div>
            </section>
            <section id = "content" class="about-section-exam-horse2">
                <div class = "container">
                    <div class = "row">
                        <div class = "col-md-6">
                            <h2 style="border-bottom:2px solid #f03c02">Our Mission</h2>
                            <div class="about-ul">
                                <ul>
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i><li>The concept of Microlearning through the Visual Memory helps the Smart Neuron to Remember, Recollect, and Reproduce in a much faster way and much longer</li>

                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i><li>Understanding of the concept at the micro-level builds up the ladder</li>

                                </ul>
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <img src = "img/examhorse-mission.jpg" alt = "Exam Horse Mission" />
                        </div>
                    </div>
                </div>
            </section>            
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
<!--        <script>
            wow = new WOW(
                    {
                        animateClass: 'animated',
                        offset: 100,
                        callback: function (box) {
                            //console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
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
    </body>

</html>
