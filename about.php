<!DOCTYPE html>
<html>
    <?php include 'head.php'; $page = 'about'; ?>
    <body>
        <!-- Header -->
        <?php include 'menu.php'; ?>
        <div class="sub-banner">
            <div class="container">
                <div class="sub-banner-content">
                    <h1>About Us</h1>
                    <div class="scp-breadcrumb">
                        <ul class="breadcrumb">
                            <li><a href="index"><i class="fa fa-home" aria-hidden="true" style="color: orangered;"></i> Home</a></li>
                            <li class="active">About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/about-company.jpg" alt="About Image" />
                    </div>
                    <div class="col-md-6">
                        <h3>About Company</h3>
                        <p>Radhasoami Resources is a closely held public company, having its head office in Chennai, Tamil Nadu. The company has been in existence from 1996 during which time it has went through numerous transformations and growth.</p>
                        <p>In its present avatar, RRL is an non-deposit taking NBFC loan company having registration no. B-07.00812, dealing in all areas of SME financing including Term Loans, 3rd Party Bank Guarantees, Loans against Securities, Loans against Properties as well as a small portfolio of retail loans.</p>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Why Us?</h3>
                        <p>The company prides itself for the professional and efficient way of its operations which involves transparency with all its stakeholders. No hidden costs, genuine advice and friendly way of working sets us apart from the others. Our employees go out of their way to help our clients achieve their goals.</p>
                        <p>We believe in building strong relations which stand the test of time, built on honesty, truthfulness, transparency and comfort. We also believe that relations once build need to be nurtured and hence we help our clients perform well by understanding their financial needs at its core.</p>
                    </div>
                    <div class="col-md-6">
                        <img src="img/about-company.jpg" alt="About Image" />
                    </div>
                </div>
            </div>
        </div>
        <div class="about-feature-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="feature-content">
                            <h3>Why Choose Us</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-content">
                            <h3>What You Get</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-content">
                            <h3>Meet The Energy</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-team">
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