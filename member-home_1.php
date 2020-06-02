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
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="member-full-version-secttion">
            <div class="container">
                <div class="row">
                    <div class="span6">
                        <div class="member-banner">
                            <img src="img/member-banner.jpg" alt="member-banner" />
                            <h3>Title Comes Here</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="member-text-content">
                            <div class="member-content">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>
                            </div>
                            <div class="start-quiz-btn">
                                <a href="#" class="btn btn-green">START QUIZ</a>
                            </div>
                            <table class="full-member-table">
                                <tbody>
                                    <tr>
                                        <th>Title</th>
                                        <th>Title</th>
                                        <th>Title</th>
                                        <th>Title</th>
                                    </tr>
                                    <tr>
                                        <td>Data</td>
                                        <td>Data</td>
                                        <td>Data</td>
                                        <td>Data</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="seemore-btn">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
