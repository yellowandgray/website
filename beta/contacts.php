<!DOCTYPE html>
<html lang="en">
    <?php
    $page = 'contact';
    include 'head.php';
    ?>
    <body>
        <div id="wrapper">
<?php include 'menu.php'; ?>
            <!-- end header -->
            <section id="inner-headline">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="pageTitle">Contact Us</h2>
                        </div>
                    </div>
                </div>
            </section>
            <section id="content">

                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>

                        <li>Contact</li>
                    </ul>
                    <div class="row"> 
                        <div class="col-md-12 wow fadeInUp">
                            <div class="about-logo">
                                <h2><span class="coloured">Get</span> in Touch</h2>
                                <p class="text-justify">Please contact the Golden Avenue Team to acquire Knowledge and Knowhow and take advantage of our expertise to help solve serious problems and accomplish your critical objectives</p>
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 wow fadeInLeft">
<!--                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do tempor.</p>-->

                            <!-- Form itself -->
                            <form name="sentMessage" id="contactForm"  novalidate>
                                <h3>Contact Us</h3>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" class="form-control" 
                                               placeholder="Full Name" id="name" required
                                               data-validation-required-message="Please enter your name" />
                                        <p class="help-block"></p>
                                    </div>
                                </div> 
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" class="form-control" 
                                               placeholder="Phone Number" id="name" required
                                               data-validation-required-message="Please enter your Phone Number" />
                                        <p class="help-block"></p>
                                    </div>
                                </div> 

                                <div class="control-group">
                                    <div class="controls">
                                        <input type="email" class="form-control" placeholder="Email" 
                                               id="email" required
                                               data-validation-required-message="Please enter your email" />
                                        <p class="help-block"></p>
                                    </div>
                                </div> 	
                                <div class="control-group">
                                    <div class="controls">
<!--                                        <input type="text" class="form-control" 
                                               placeholder="Subject" id="name" required
                                               data-validation-required-message="Please enter your Subject" />-->
                                        <select type="text" class="form-control" required>
                                            <option>Subject</option>
                                            <option value="Products">Product</option>
                                            <option value="Services">Services</option>
                                            <option value="Annual Maintenance Contract">Annual Maintenance Contract</option>
                                            <option value="others">Others</option>
                                        </select>
                                        <p class="help-block"></p>
                                    </div>
                                </div> 

                                <div class="control-group">
                                    <div class="controls">
                                        <textarea rows="10" cols="100" class="form-control" 
                                                  placeholder="Message" id="message" required
                                                  data-validation-required-message="Please enter your message" minlength="5" 
                                                  data-validation-minlength-message="Min 5 characters" 
                                                  maxlength="999" style="resize:none"></textarea>
                                    </div>
                                </div> 		 
                                <!--                                <div id="success"> </div>  For success/fail messages -->
                                <div class="text-center"><button type="submit" class="btn btn-primary">Submit</button></div><br/>
                            </form>
                        </div>
                        <div class="col-md-6 wow fadeInRight">
                            <div class="margin-top-45">
                                <h3>Address:</h3>
                                <h4>Golden Avenue</h4>  
                                <p>P.O.Box-122041<br/> Dubai, U.A.E.</p>
                            </div>
                            <i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+9714266 8272">+971 4 266 8272</a><br/>
                            <i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+9714271 3404">+971 4 271 3404</a><br/>
                            <i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:enquiry@goldenavenue.ae">enquiry@goldenavenue.ae</a><br/><br/>
<!--                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.9212659987456!2d55.30032966499177!3d25.273233884813532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4d09e02d95c4b7dc!2sGOLDEN+AVENUE+GENERAL+TRADING+LLC!5e0!3m2!1sen!2sin!4v1545205970728" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                            <!--                            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                                                        <div style="overflow:hidden;height:300px;width:600px;">
                                                            <div id="gmap_canvas" style="height:500px;width:600px;"></div>
                                                            <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
                                                            <a class="google-map-code" href="http://www.trivoo.net" id="get-map-data">trivoo</a>
                                                        </div>
                                                        <script type="text/javascript"> function init_map() {
                                                                var myOptions = {zoom: 14, center: new google.maps.LatLng(40.805478, -73.96522499999998), mapTypeId: google.maps.MapTypeId.ROADMAP};
                                                                map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
                                                                marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(40.805478, -73.96522499999998)});
                                                                infowindow = new google.maps.InfoWindow({content: "<b>The Breslin</b><br/>2880 Broadway<br/> New York"});
                                                                google.maps.event.addListener(marker, "click", function () {
                                                                    infowindow.open(map, marker);
                                                                });
                                                                infowindow.open(map, marker);
                                                            }
                                                            google.maps.event.addDomListener(window, 'load', init_map);
                                                        </script>-->
                        </div>
                    </div>
                </div>

            </section>
<?php include 'footer.php'; ?>
        </div>
    </body>
</html>
