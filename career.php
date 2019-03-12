<!DOCTYPE html>
<html lang="zxx">

    <!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Mar 2019 06:06:12 GMT -->
    <?php
    include 'head.php';
    $page = 'withus';
    ?>
    <body class="inner-page">
        <!--Preloader area start here-->
        <div class="book_preload">
            <div class="book">
                <div class="book__page"></div>
                <div class="book__page"></div>
                <div class="book__page"></div>
            </div>
        </div>
        <!--Preloader area end here-->

        <!--Full width header Start-->
        <?php include 'menu_1.php'; ?>
        <!--Full width header End-->

        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs bg7 breadcrumbs-overlay" style="background-image: url(images/sub-banner/sub-01.jpg) !important;">
            <div class="breadcrumbs-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1 class="page-title">Career</h1>
                            <ul>
                                <li>
                                    <a class="active" href="index-2.html">Home</a>
                                </li>
                                <li>Career</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- History Start -->
        <section id="about-section" class="padding-100 bg-gray">
            <div class="container  contact-page-section">
                <div class="contact-comment-section">
                    <h3>Career Form</h3>
                    <div id="form-messages"></div>
                    <form role="form" id="contact-form" class="career" enctype="multipart/form-data">
                        <fieldset>
                            <div class="row">                                      
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input name="fname" id="fname" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="lname" id="lname" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input name="email" id="email" class="form-control" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Select Job Role</label>
                                        <ul class="job-drop-down">
                                            <li>
                                                <select>
                                                    <option>---</option>
                                                    <option>Teacher</option>
                                                    <option>Central Manager</option>
                                                </select>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Address-1</label>
                                        <input name="email" id="email" class="form-control" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Address-2</label>
                                        <input name="subject" id="subject" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-12 col-sm-12">    
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea cols="40" rows="10" id="message" name="message" class="textarea form-control"></textarea>
                                    </div>
                                </div>
                            </div>							        
                            <div class="form-group mb-0">
                                <input class="btn-send" type="submit" value="Submit Now">
                            </div>

                        </fieldset>
                    </form>						
                </div>
                </div>
        </section>
      
        <!-- Footer Start -->
        <?php include 'footer-1.php'; ?>
    </body>

    <!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Mar 2019 06:06:32 GMT -->
</html>