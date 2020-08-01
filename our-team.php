<!DOCTYPE html>
<html>
    <?php
    include 'head.php';
    $page = 'our-team';
    ?>
    <body>
        <!-- Header -->
        <?php include 'menu.php'; ?>
        <div class="sub-banner">
            <div class="container">
                <div class="sub-banner-content">
                    <h1>Our Team</h1>
                    <div class="scp-breadcrumb">
                        <ul class="breadcrumb">
                            <li><a href="index"><i class="fa fa-home" aria-hidden="true" style="color: orangered;"></i> Home</a></li>
                            <li class="active">Our Team</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="our-team-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section">
                            <h3>OUR TEAM</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <img src="img/about-team/team-1.jpg" alt="team" />
                        <div class="team-detail">
                            <h3>Jonathon Andrew</h3>
                            <span>CEO, Project Manager</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <img src="img/about-team/team-2.jpg" alt="team" />
                        <div class="team-detail">
                            <h3>Jesmin Martina</h3>
                            <span>CEO, Project Manager</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <img src="img/about-team/team-3.jpg" alt="team" />
                        <div class="team-detail">
                            <h3>Deu John</h3>
                            <span>CEO, Project Manager</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <img src="img/about-team/team-4.jpg" alt="team" />
                        <div class="team-detail">
                            <h3>Anderson Martin</h3>
                            <span>CEO, Project Manager</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
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