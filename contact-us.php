<!DOCTYPE html>
<html>
    <?php $page = 'contact';
    include 'head.php'; ?>
    <body>
<?php include 'menu.php'; ?>
        <div class="sub-banner-section">
            <div class="container sub-banner-content">
                <h3>Contact Us</h3>
            </div>
        </div>
        <section class="certificate-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 quick-form">
                        <div class="enquiry-form">
                            <h3>Contact Us</h3>
                            <form>
                                <div class="form-group">
                                    <input name="name" class="form-control" type="text"  placeholder="Enter your Name" />
                                </div>
                                <div class="form-group">
                                    <input name="email" class="form-control" type="email"  placeholder="Enter your Email" />
                                </div>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option value="0">Select Subject</option>
                                        <option value="mechanical">Mechanical</option>
                                        <option value="Steel Structural">Steel Structural</option>
                                        <option value="Scaffolding">Scaffolding</option>
                                        <option value="Piping Insulation">Piping Insulation</option>
                                    </select>
                                </div>
                                <!--                                <div class="form-group">
                                                                    <input name="subject" class="form-control" type="text"  placeholder="Enter Subject" />
                                                                </div>-->
                                <div class="form-group">
                                    <textarea name="description" rows="6" class="form-control" type="text"  placeholder="Enter Your Commant"></textarea>
                                </div>
                                <a href="#" class="btn btn-primary">Submit</a>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 contact-section">
                        <div class="certificate-title">
                            <h3>Get in Touch!</h3>
                        </div>
                        <div class="text-center parent-content">
                            <h5>Dear Client & Partners,</h5>
                            <p>Whether you need or are looking for an engineered scaffold solution complete with erection and dismantling services, or just to rent of materials specialist to erect – We at <strong>Everest E&C Pte Ltd</strong> cater for all your scaffolding needs.</p>
                            <a href="#">Tel: +65 6898 0628</a> | <a href="#">Email: sales@everestscaffolding.com.sg</a>
                        </div>
                        <div class="contact-address">
                            <ul>
                                <li><strong>Office Address:</strong></li>
                                <li>1 North Bridge Road</li>
                                <li>#07 –10 High Street Centre</li>
                                <li>Singapore 179094</li>
                            </ul>
                            <ul>
                                <li><strong>Project Office and Warehouse:</strong></li>
                                <li>No. 34 Benoi Place</li>
                                <li>Singpore 629950</li>
                                <li><a href="#">Tel: +65 6898 0628</a> | <a href="#">Fax: +65 6898 0628</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php include 'footer.php'; ?>
        <script type="text/javascript">

            $(document).ready(function () {
                $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
                    $(this).toggleClass('open');
                });
            }
            );



            $(document).ready(function () {
                $("#nav-icon1").click(function () {
                    $(".mob-nav-bar").toggle();
                });
            });
        </script>
    </body>
</html>