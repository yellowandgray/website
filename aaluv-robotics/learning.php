<html>
    <?php
    include 'head.php';
    $page = 'learning';
    ?>
    <body>
        <?php include 'menu.php'; ?>
        <!-- Banner Section -->
        <div class="sub-banner-section" style="background: url(img/sub-banner/learning.jpg)no-repeat; height: 250px;"></div>
        <!-- End Banner Section -->

        <!-- Breadcrumb section -->
        <div class="site-breadcrumb">
            <div class="container">
                <a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
                <span>Larning</span>
            </div>
        </div>
        <!-- Breadcrumb section end -->

        <section class="classroom-section spad pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="color-blue">AALUV FOCUS on LEARNING</h2>
                        <ul class="list-style-none p-margin">
                            <i class="fas fa-check"></i><li>EMOTIONAL ENGAGEMENT !</li>
                            <i class="fas fa-check"></i><li>INTERACTION WITH PHYSICAL DEVICES !</li>
                            <i class="fas fa-check"></i><li>PRACTICAL LEARNING !</li>
                            <i class="fas fa-check"></i><li>MULTI-DISCIPLINARY LEARNING !</li>
                            <i class="fas fa-check"></i><li>CONSTRUCTIVIST APPROACH !</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <img src="img/learning.png" alt="" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="color-blue">STRENGTHS OF ROBOTICS IN EDUCATION</h2>
                        <p>TRAINED TEACHERS – “teach as they were taught,.. Not as they are told to teach”</p>
                        <p>WELL DEFINED CURRICULAM – Aligned with academic curriculam”</p>
                        <p>PROPER EDUCATION PHILOSOPHY – “ to evoke interest and enthusiasm in subject”</p>
                        <p>SUPPORTIVE LEARNING ENVIRONMENT - “Our success is shifting focus from Technology to Pedagogy”</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Enroll section -->
        <section class="enroll-section spad set-bg" data-setbg="img/enroll-bg.jpg">
            <div class="container">
                <h2 class="text-center color-white">WHAT ROBOTICS CAN TEACH?</h2>
                <div class="row">
                    <div class="col-md-4 margin-b-20 wow fadeInDown">
                        <div class="shadow">
                            <div class="text-center">
                                <img class="contents" src="img/icon7.png">
                                <h2 class="color-white">ENDOW RIGOR</h2>
                            </div>
                            <ul class="list-style-none color-white">
                                <i class="fa fa-check" aria-hidden="true"></i><li>Learn something real</li>
                                <i class="fa fa-check" aria-hidden="true"></i><li>Teach the realities and depth of science</li>
                            </ul>
                            <div class="text-center">
                                <button class="site-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 margin-b-20 wow fadeInDown">
                        <div class="shadow">
                            <div class="text-center">
                                <img class="contents" src="img/icon8.png">
                                <h2 class="color-white">DESIGN</h2>
                            </div>
                            <ul class="list-style-none color-white">
                                <i class="fa fa-check" aria-hidden="true"></i><li>Tinkering to explore</li>
                                <i class="fa fa-check" aria-hidden="true"></i><li>Connect high and low level issues</li>
                                <i class="fa fa-check" aria-hidden="true"></i><li>learn uncertainty & variability of world</li>
                            </ul>
                            <div class="text-center">
                                <button class="site-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 margin-b-20 wow fadeInDown">
                        <div class="shadow">
                            <div class="text-center">
                                <img class="contents" src="img/icon9.png">
                                <h2 class="color-white">WORK IN TEAMS</h2>
                            </div>
                            <ul class="list-style-none color-white">
                                <i class="fa fa-check" aria-hidden="true"></i><li>Performance assessment through Competition</li>
                                <i class="fa fa-check" aria-hidden="true"></i><li>Faster team spirit and camaraderie</li>
                            </ul>
                            <div class="text-center">
                                <button class="site-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Enroll section end -->

        <section class="classroom-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="color-blue">Who Needs Robotics in Education?</h2>
                        <ul class="list-style-none p-margin">
                            <i class="fas fa-check"></i><li>Teachers / Educators</li>
                            <i class="fas fa-check"></i><li>Students / Learners</li>
                        </ul>
                        <p>IN SCIENCE / MATHS / INFORMATICS / TECHNOLOGY…</p>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.php'; ?>
        <script>
            // Acc
            $(document).on("click", ".naccs .menu div", function () {
                var numberIndex = $(this).index();

                if (!$(this).is("active")) {
                    $(".naccs .menu div").removeClass("active");
                    $(".naccs ul li").removeClass("active");

                    $(this).addClass("active");
                    $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

                    var listItemHeight = $(".naccs ul")
                            .find("li:eq(" + numberIndex + ")")
                            .innerHeight();
                    $(".naccs ul").height(listItemHeight + "px");
                }
            });

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
    </body>
</html>