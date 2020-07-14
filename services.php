<!DOCTYPE html>
<html>
    <?php $page = 'service'; include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="sub-banner-section">
            <div class="container sub-banner-content">
                <h3>Services</h3>
            </div>
        </div>
        <div class="services-section">
            <div class="container">
                <div class="service-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="service-bg-section" onclick="window.location = '#'">
                                <div class="service-bg">
                                    <h3>Scrubber Maintenance</h3>
                                </div>
                                <div class="service-bg-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <a href="#" class="btn btn-custome">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="service-bg-section" onclick="window.location = '#'">
                                <div class="service-bg">
                                    <h3>Cooling Tower Maintenance</h3>
                                </div>
                                <div class="service-bg-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <a href="#" class="btn btn-custome">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="service-bg-section" onclick="window.location = '#'">
                                <div class="service-bg">
                                    <h3>Mechanical & Electrical Services</h3>
                                </div>
                                <div class="service-bg-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <a href="#" class="btn btn-custome">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="service-bg-section" onclick="window.location = 'piping-insulation'">
                                <div class="service-bg">
                                    <h3>Electrical and Piping Works</h3>
                                </div>
                                <div class="service-bg-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <a href="#" class="btn btn-custome">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="service-bg-section" onclick="window.location = '#'">
                                <div class="service-bg">
                                    <h3>Air-Conditioning System</h3>
                                </div>
                                <div class="service-bg-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <a href="#" class="btn btn-custome">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="service-bg-section" onclick="window.location = '#'">
                                <div class="service-bg">
                                    <h3>Pump & Motor Services</h3>
                                </div>
                                <div class="service-bg-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <a href="#" class="btn btn-custome">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="service-bg-section" onclick="window.location = 'piping-insulation'">
                                <div class="service-bg">
                                    <h3>General Engineering Contractor</h3>
                                </div>
                                <div class="service-bg-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <a href="#" class="btn btn-custome">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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