<!DOCTYPE html>
<html>
    <?php
    $page = 'project';
    include 'head.php';
    ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="sub-banner-section">
            <div class="container sub-banner-content">
                <h3>Everest Projects</h3>
            </div>
        </div>
        <section class="about-company-section title-bg">
            <div class="container">
			<div class="row">
                    <div class="col-md-12">
                        <h3>Tower Scaffold Projects</h3>
                    </div>
				</div>
				<div class="project-bg">
                <div class="row">
                    <div class="col-md-12">
                        <div class="everest-about">
                            <p><strong>Project</strong> - 60 Meter Access Tower Scaffold Erection @  Shaft Cable Tunnel</p>
                        </div>
                    </div>
                </div>               
                <br/>
                <div class="row">
                    <div class="col-md-4">
                        <img src="img/scaffold/cable-tunnel-01.jpg" alt="" />
                    </div>
                    <div class="col-md-4">
                        <img src="img/scaffold/cable-tunnel-02.jpg" alt="" />
                    </div>
                    <div class="col-md-4">
                        <img src="img/scaffold/cable-tunnel-03.jpg" alt="" />
                    </div>
                </div>
				</div>
                <br/>
                <br/>
				<div class="project-bg">
                <div class="row">
                    <div class="col-md-12">
                        <div class="everest-about">
                            <p><strong>Project</strong> - Access Tower Scaffold Erection at Launch Shaft T228 Gardens By The Bay Station & Tunnel</p>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-4">
                        <img src="img/scaffold/t2228-01.jpg" alt="" />
                    </div>
                    <div class="col-md-4">
                        <img src="img/scaffold/t2228-02.jpg" alt="" />
                    </div>
                    <div class="col-md-4">
                        <img src="img/scaffold/t2228-03.jpg" alt="" />
                    </div>
                </div>
				</div>
                <br/>
                <br/>
				<div class="project-bg">
                <div class="row">
                    <div class="col-md-12">
                        <div class="everest-about">
                            <p><strong>Project</strong> -  T211 Bright Hill Station & Tunnels</p>
                        </div>
                    </div>
                </div>                
                <br/>
                <div class="row">
                    <div class="col-md-4">
                        <img src="img/scaffold/t211-01.jpg" alt="" />
                    </div>
                    <div class="col-md-4">
                        <img src="img/scaffold/t211-02.jpg" alt="" />
                    </div>
                    <div class="col-md-4">
                        <img src="img/scaffold/t211-03.jpg" alt="" />
                    </div>
                </div>
				</div>
                <br/><hr class="border-dark" /><br/>    
                <div class="row">
                    <div class="col-md-12">
                        <h3>Suspended Scaffold Projects</h3>
                    </div>
				</div>
				<div class="row">
                    <div class="col-md-12">
						<div class="project-bg">
							<div class="everest-about">
								<p><strong>Project</strong> - Erection of Suspended Scaffold @ The New State Courts Tower Building</p><br>
								<img src='img/scaffold/susepended-03.jpg' alt='' />
							</div>
						</div>
                    </div>
                </div>
                <br/><hr class="border-dark" /><br/>
				<div class="row">
                    <div class="col-md-12">
                        <h3>Independent Scaffold Projects</h3>
                    </div>
				</div>
                <div class="row">
                    <div class="col-md-12">
						<div class="project-bg">
							<div class="everest-about">
								<p><strong>Project</strong> - Independent Scaffold Erection for Membrane Works @ Desalination Plant</p><br>
								<img src='img/scaffold/independent-04.jpg' alt='' />
							</div>
						</div>
                    </div>
                </div>
                <br/><hr class="border-dark" /><br/>
				<div class="row">
                    <div class="col-md-12">
                        <h3>CatchNet Scaffold Projects</h3>
                    </div>
				</div>
				<div class="project-bg">
				<div class="row">
				<div class="col-md-12">
                        <div class="everest-about">	<p><strong>Project</strong> - CatchNet Scaffold installation @Paya Lebar Apartment Quarters</p><br></div>
				</div>
				</div>
                <div class="row">
                    <div class="col-md-6">
                        <img src='img/scaffold/catch-net-01.jpg' alt='' />
                    </div>
                    <div class="col-md-6">
                        <img src='img/scaffold/catch-net-02.jpg' alt='' />
                    </div>
                </div>
				</div>
            </div>
        </section> 

        <?php include 'footer.php'; ?>
        <script type="text/javascript">

            //Client Slider JS //
            $(document).ready(function () {
                $('.customer-logos').slick({
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 1500,
                    arrows: false,
                    dots: false,
                    pauseOnHover: false,
                    responsive: [{
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3
                            }
                        }, {
                            breakpoint: 520,
                            settings: {
                                slidesToShow: 2
                            }
                        }]
                });
            });

            $(document).ready(function () {
                $('.project-slider').slick({
                    slidesToShow: 3,
                    slidesToScroll: 2,
                    autoplay: true,
                    autoplaySpeed: 1500,
                    arrows: false,
                    dots: false,
                    pauseOnHover: false,
                    responsive: [{
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2
                            }
                        }, {
                            breakpoint: 520,
                            settings: {
                                slidesToShow: 1
                            }
                        }]
                });
            });
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