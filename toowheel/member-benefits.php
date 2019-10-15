<?php
if (!isset($_GET['type'])) {
    header('Location: ../index.php');
}
$type = $_GET['type'];
require_once 'api/include/common.php';
$obj = new Common();
?>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <section style="background-image:url(img/member/member-01.jpg);background-repeat:no-repeat;background-size: cover;height: auto;padding: 40px 0 30px;background-position: center;position: relative;top: -6px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="member-text">
                            <h5>WHAT DO</h5>
                            <h3>MEMBERS GET?</h3>
                        </div>
                        <div class="member-list">
                            <ul class="padding-lr-0">
                                <img src="img/member/Group 88@2x.png" alt=""/><li>Exclusive TooWheel racing T-Shirt worth RM99.00</li>
                                <img src="img/member/Group 83@2x.png" alt=""/><li>Death coverage courtesy to Toowheel organization</li>
                                <img src="img/member/Group 82@2x.png" alt=""/><li>Access to all club portal/forum/updates and event</li>
                                <img src="img/member/Group 81@2x.png" alt=""/><li>Special discount for accessories by E-Kedai Toowheel</li>
                                <img src="img/member/Group 80@2x.png" alt=""/><li>Loyalty point with purchase of participant companies merchandise</li>
                                <img src="img/member/Group 79@2x.png" alt=""/><li>Special access to Toolwheel Events</li>
                                <img src="img/member/Group 78@2x.png" alt=""/><li>Be part of monthly contest and exciting giveaway</li>
                            </ul>
                        </div>
                        <div class="mem-sign">
                            <p><a href="member-register.php?type=<?php echo $type; ?>">SIGN UP</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 member-tt">
                        <h3>MEMBERS TESTIMONIALS</h3>
                        <div class="red-l"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="row mem-flex">
                            <div class="mem-flex-item">
                                <div class="member-box">
                                    <span class="testimonial-top">
                                        <div class="img-t">
                                            <img src="img/testimonial/Tuan-Haji-Ali-Hassan-Mohammad-Hassan.jpg" alt=""/>
                                        </div>
                                        <div class="text-center img-tt">
                                            <img src="img/member/asset1@2x.png" alt=""/>
                                        </div>
                                        <p class="text-center">Congratulations to TooWheel for their soft-launch event. Their Media and Digital Platform is a great way to strengthen the relationship of all motorsport club in Malaysia. A good way to increase communication and exchange feedback for a better future of the club and community.</p>
                                        <div class="rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span> 
                                        </div>
                                        <h3 class="text-center">Tuan Haji Ali Hassan Mohammad Hassan</h3>
                                        <h5 class="text-center">Founder of Al-Ikhsan And CEO of Prestige Sport</h5>
                                    </span>
                                </div>
                            </div>
                            <div class="mem-flex-item">
                                <div class="member-box">
                                    <span class="testimonial-top">
                                        <div class="img-t">
                                            <img src="img/testimonial/002.jpg" alt=""/>
                                        </div>
                                        <div class="text-center img-tt">
                                            <img src="img/member/asset1@2x.png" alt=""/>
                                        </div>
                                        <p class="text-center">An innovative idea to combine all car and motorcycle club under one platform. The portal is a great platform to combine all motorsport enthusiast to share their experiences, events and to showcase their club. And also, by bringing them closer regardless of distance, gender and nationality.</p>
                                        <div class="rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span> 
                                        </div>
                                        <h3 class="text-center">Ben Ng</h3>
                                        <h5 class="text-center">Director of NKS Distributors (KL) Sdn. Bhd</h5>
                                    </span>
                                </div>
                            </div>
                            <div class="mem-flex-item">
                                <div class="member-box">
                                    <span class="testimonial-top">
                                        <div class="img-t">
                                            <img src="img/testimonial/003.jpg" alt=""/>
                                        </div>
                                        <div class="text-center img-tt">
                                            <img src="img/member/asset1@2x.png" alt=""/>
                                        </div>
                                        <p class="text-center">Thank you TooWheel Malaysia for having such platform. Where we can exhibit our passion, make new friends and most especially we can have our second family.</p>
                                        <div class="rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span> 
                                        </div>
                                        <h3 class="text-center">Qasey & Club Members</h3>
                                        <h5 class="text-center">R25 Ladies Club</h5>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>


