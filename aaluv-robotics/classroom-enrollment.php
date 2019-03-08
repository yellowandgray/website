<html>
    <?php
    include 'head.php';
    $page = 'classroom-enroll';
    ?>
    <body>
        <?php include 'menu.php'; ?>
        <!-- Banner Section -->
        <div class="sub-banner-section" style="background: url(img/sub-banner/enrolling.jpg)no-repeat; height: 250px;"></div>
        <!-- End Banner Section -->

        <!-- Breadcrumb section -->
        <div class="site-breadcrumb">
            <div class="container">
                <a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
                <span>Classroom Enrollment</span>
            </div>
        </div>
        <!-- Breadcrumb section end -->

        <section class="padding-b-70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 padding-b-20">
                        <h3>Student Details</h3>
<!--                        <span class="font-12">(*) Indicates Required Fields.</span>-->
                    </div>
                    <div class="col-md-12">
                        <div class="contact-form">
                            <form class="comment-form contact classroom-textarea">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Name of Student</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" name="name" placeholder="Name of Student">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Date of Birth</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="date" name="date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Address of Student</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <textarea type="text" name="address_student"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Contact No</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" name="mobile" placeholder="Contact No">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Interests</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" name="interests" placeholder="Interests">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Course</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" name="course" value="Maths">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>School Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Name of School</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" name="name_school" placeholder="Name of School">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Address of School</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <textarea type="text" name="addres_school"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>Family Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Father's Name</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" name="father_name" placeholder="Father's Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Occupation</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" name="occupation" placeholder="Occupation">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Office Address</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <textarea type="text" name="office_address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Office Contact No's</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" name="office_contact" placeholder="Office Contact No's">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="email" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-lg-9"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Mother's Name</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" name="mother_name" placeholder="Mother's Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Occupation</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" name="occupation_mother" placeholder="Occupation">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Office Address</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <textarea type="text" name="office_address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Office Contact No's</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" name="office_contact" placeholder="Office Contact No's">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="email" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>How do you Know?</h4>
                                <p>You heard of aaluv first at</p>
                                <div class="row padding-b-20">
                                    <div class="col-md-3">
                                        <input type="checkbox" name="friend" value="Friends"> Friends
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="news_paper" value="News Paper"> News Paper
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="school" value="School"> School
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" name="other" value="Others"> Others
                                    </div>
                                </div>
                                <h4>Reason</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Reason for enrolling your child</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="reason_enrolling" placeholder="Reason for enrolling your child">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Captcha</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="g-recaptcha" data-sitekey="6LdcMI8UAAAAAPt3UZa7vt8OiUTOI37LTsYBf0Vg"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-center margin-top-20">
                                        <button class="site-btn">Send</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.php'; ?>
    </body>
</html>