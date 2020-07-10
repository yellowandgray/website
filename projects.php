<!DOCTYPE html>
<html>
    <?php $page = 'project';
    include 'head.php';
    ?>
    <body>
<?php include 'menu.php'; ?>
        <div class="sub-banner-section">
            <div class="container sub-banner-content">
                <h3>Projects</h3>
            </div>
        </div>
        <div class="project-main-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section">
                            <h2>PROJECTS</h2>
                        </div>
                    </div>
                </div>
                <div class="our-project">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="project-box" onclick="window.location = '#'">
                                <div class="project-img">
                                    <img src="img/project/project-image-01.jpg" alt="" />
                                </div>
                                <div class="projects-content">
                                    <h4>Title Comes Here</h4>
                                    <span><strong>Category:</strong> Category Section</span>
                                    <br/>
                                    <span><strong>Client:</strong> AFPD PTE LTD</span>
                                    <p> In-house vendor since 2017. MAU servicing, AHU servicing, Air condition Maintenance Service, chiller, cooling tower maintenance and preventive maintenance contractor including cleanroom services.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="project-box" onclick="window.location = '#'">
                                <div class="project-img">
                                    <img src="img/project/project-image-02.jpg" alt="" />
                                </div>
                                <div class="projects-content">
                                    <h4>Title Comes Here</h4> 
                                    <span><strong>Category:</strong> Category Section</span>
                                    <br/>
                                    <span><strong>Client:</strong> Solenis</span>
                                    <p>Electrical maintenance such as power point installation, wiring, troubleshooting.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="project-box" onclick="window.location = '#'">
                                <div class="project-img">
                                    <img src="img/project/project-image-03.jpg" alt="" />
                                </div>
                                <div class="projects-content">
                                    <h4>Title Comes Here</h4>
                                    <span><strong>Category:</strong> Category Section</span>
                                    <br/>
                                    <span><strong>Client:</strong> City Gas Pte Ltd</span>
                                    <p>Pump & Motor - preventive maintenance, repair and replacement, cooling tower maintenance, AHU servicing, manpower supply, material supply.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="our-project">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="project-box" onclick="window.location = '#'">
                                <div class="project-img">
                                    <img src="img/project/project-image-04.jpg" alt="" />
                                </div>
                                <div class="projects-content">
                                    <h4>Title Comes Here</h4>
                                    <span><strong>Category:</strong> Category Section</span>
                                    <br/>
                                    <span><strong>Client:</strong> AFPD / Solenis/ City Gas</span>
                                    <p>Plumbing services, pipe maintenance, repair and installation service</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="project-box" onclick="window.location = '#'">
                                <div class="project-img">
                                    <img src="img/project/project-image-05.jpg" alt="" />
                                </div>
                                <div class="projects-content">
                                    <h4>Title Comes Here</h4>
                                    <span><strong>Category:</strong> Category Section</span>
                                    <br/>
                                    <span><strong>Client:</strong> WT Solutions Pte Ltd / CISCO Private Limited</span>
                                    <p>Installation of CCTV Security Systems at POLCAM PROJECT. Internet of Things, CAD drafting.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="project-box" onclick="window.location = '#'">
                                <div class="project-img">
                                    <img src="img/project/project-image-06.jpg" alt="" />
                                </div>
                                <div class="projects-content">
                                    <h4>Title Comes Here</h4>
                                    <span><strong>Category:</strong> Category Section</span>
                                    <br/>
                                    <span><strong>Client:</strong> Yashika Engineering Pte Ltd </span>
                                    <p>Renovation work</p>
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