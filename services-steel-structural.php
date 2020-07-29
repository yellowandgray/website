<!DOCTYPE html>
<html>
    <?php
    $page = 'service';
    include 'head.php';
    ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="sub-banner-section">
            <div class="container sub-banner-content">
                <h3>Structural Steel Fabrication & Erection Services</h3>
            </div>
        </div>
        <section class="about-company-section title-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>1.	Bondeck Installation</h3><br>
						<div class="everest-about">
						<p>BONDEK Structural Steel Decking is a highly lightweight efficient, versatile and robust formwork. It is a profiled steel sheet which saves time and shortens construction process.<br>
Steel decking allows installation of suspended services and ceilings without any drilling required . A reliable interlock mechanism provides vertical lapping for fast installation. The steel deck has a galvanized coat finish.<br>It is secured with Steel Studs at every pan at ends of the sheets which also serves as a permanent support for Slab Casting.
</p>
						</div>
                    </div>                    
					<div class="col-md-6">
                        <img src="img/erection/bondeck-installation.jpg" alt="" />
                    </div>
                </div>
				<br><hr class="border-dark" /><br>
				<div class="row">
                    <div class="col-md-4">
                        <h3>2.	Steel Gratings Installation</h3><br>
						<div class="everest-about">
						<p>A grating are like any regular spaced collection of essentially identical, parallel, elongated elements. Gratings usually consist of a single set of elongated elements, but can consist of two sets, in which case the second set is usually perpendicular to the first.</p>
						</div>
                    </div>
                    <div class="col-md-4">
                        <img src="img/erection/steel-grating-01.jpg" alt="" />
                    </div>
					<div class="col-md-4">
                        <img src="img/erection/steel-grating-02.jpg" alt="" />
                    </div>
                </div>
				<br><hr class="border-dark" /><br>
				<div class="row">
                    <div class="col-md-6">
                        <h3>3.	Roof Structure Installation</h3><br>
						<div class="everest-about">
						<p></p>
						</div>
                    </div>
                    <div class="col-md-6">
                        <img src="img/erection/Roof-Structure-Installation.jpg" alt="" />
                    </div>
                </div>
                <br/><hr class="border-dark" /><br/>
				<div class="row">
                    <div class="col-md-6">
                        <h3>4.	Beam Structure Installation</h3><br>
						<div class="everest-about">
						<p></p>
						</div>
                    </div>
                    <div class="col-md-6">
                        <img src="img/erection/Beam-Structure-Installation.jpg" alt="" />
                    </div>
                </div>
				<br/><hr class="border-dark" /><br/>
				 <div class="row">
                    <div class="col-md-6">
                        <h3>5.	Unistrut & Column Installation</h3><br>
						<div class="everest-about">
						<p></p>
						</div>
                    </div>
                    <div class="col-md-6">
                        <img src="img/erection/Unistrut-Column-Installation.jpg" alt="" />
                    </div>
                </div> 
                <br/><hr class="border-dark" /><br/>
				<div class="row">
                    <div class="col-md-6">
                        <h3>6.	Link Bridge Structure Installation</h3><br>
						<div class="everest-about">
						<p></p>
						</div>
                    </div>
                    <div class="col-md-6">
                        <img src="img/erection/Link-Bridge-Structure-Installation.jpg" alt="" />
                    </div>
                </div>
				<br/><hr class="border-dark" /><br/>
				<div class="row">
                    <div class="col-md-6">
                        <h3>7.	Unistrut & Pipe Installation</h3><br>
						<div class="everest-about">
						<p></p>
						</div>
                    </div>
                    <div class="col-md-6">
                        <img src="img/erection/Unistrut-Pipe-Installation.jpg" alt="" />
                    </div>
                </div>
				<br/><hr class="border-dark" /><br/>
				<div class="row">
                    <div class="col-md-6">
                        <h3>8.	Staircase Access Structure Installation</h3><br>
						<div class="everest-about">
						<p></p>
						</div>
                    </div>
                    <div class="col-md-6">
                        <img src="img/erection/Staircase-Access-Structure-Installation.jpg" alt="" />
                    </div>
                </div>
				<br/><hr class="border-dark" /><br/>
				<div class="row">
                    <div class="col-md-6">
                        <h3>9.	Curve Channel Installation</h3><br>
						<div class="everest-about">
						<p></p>
						</div>
                    </div>
                    <div class="col-md-6">
                        <img src="img/erection/Curve-Channel-Installation.jpg" alt="" />
                    </div>
                </div>
				<br/><hr class="border-dark" /><br/>
				<div class="row">
                    <div class="col-md-6">
                        <h3>10.	Vertical Channel Installation</h3><br>
						<div class="everest-about">
						<p></p>
						</div>
                    </div>
                    <div class="col-md-6">
                        <img src="img/erection/Vertical-Channel-Installation.jpg" alt="" />
                    </div>
                </div>
				<br/><hr class="border-dark" /><br/>
				<div class="row">
                    <div class="col-md-6">
                        <h3>11.	Louver Support Installation</h3><br>
						<div class="everest-about">
						<p></p>
						</div>
                    </div>
                    <div class="col-md-6">
                        <img src="img/erection/Louver-Support-Installation.jpg" alt="" />
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