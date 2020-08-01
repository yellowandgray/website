<!DOCTYPE html>
<html>
    <?php
    include 'head.php';
    $page = 'services';
    ?>
    <body>
        <!-- Header -->
<?php include 'menu.php'; ?>
        <div class="sub-banner">
            <div class="container">
                <div class="sub-banner-content">
                    <h1>Services</h1>
                    <div class="scp-breadcrumb">
                        <ul class="breadcrumb">
                            <li><a href="index"><i class="fa fa-home" aria-hidden="true" style="color: orangered;"></i> Home</a></li>
                            <li class="active">Services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="service-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="service-title">
                            <h3>Services</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="service-box">
                            <div class="icon-section">
                                <i class="fa fa-building" aria-hidden="true"></i>
                            </div>
                            <div class="title-section">
                                <h3>Property Loans</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-box">
                            <div class="icon-section">
                                <i class="fa fa-line-chart" aria-hidden="true"></i>
                            </div>
                            <div class="title-section">
                                <h3>Loans against Shares</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-box">
                            <div class="icon-section">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <div class="title-section">
                                <h3>Personal Loans</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-box">
                            <div class="icon-section">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                            </div>
                            <div class="title-section">
                                <h3>Business Loans</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="service-box">
                            <div class="icon-section">
                                <i class="fa fa-industry" aria-hidden="true"></i>
                            </div>
                            <div class="title-section">
                                <h3>Demand Loans</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-box">
                            <div class="icon-section">
                                <i class="fa fa-usd" aria-hidden="true"></i>
                            </div>
                            <div class="title-section">
                                <h3>Others – based on case to case</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-box">
                            <div class="icon-section">
                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                            </div>
                            <div class="title-section">
                                <h3>Title Comes Here</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-box">
                            <div class="icon-section">
                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                            </div>
                            <div class="title-section">
                                <h3>Title Comes Here</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include 'footer.php'; ?>
        <script>
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