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
                <h3>Piping & Insulation Services</h3>
            </div>
        </div>
        <section class="about-company-section title-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Piping Works:</h3><br>
						<div class="everest-about">
						<p>A system of pipes used to convey fluids (liquids and gases) from one location to another. The engineering discipline of piping design studies the efficient transport of fluid.Industrial process piping (and accompanying in-line components) can be manufactured from wood, fiberglass, glass, steel, aluminum, plastic, copper, and concrete.<br><br>
The in-line components, known as fittings, valves, and other devices, typically sense and control the pressure, flowing rate and temperature of the transmitted fluid, and usually are included in the field of piping design (or piping engineering).</p>
						</div>
                    </div> 
                </div>
				<br><br>
				<div class="row">
                    <div class="col-md-6">
                        <h3>TYPES OF PIPING</h3><br>
						<div class="everest-about">
						<p>1) Copper Pipes (Metal)<br>
2) Galvanized Steel (Metal)<br>
3) Polyvinyl Chloride Pipes or PVC Pipes (Plastic)<br>
4) Chlorinated Polyvinyl Chloride Pipes or CPVC Pipes (Plastic)<br>
5) Cross-Linked Polyethylene or PEX Pipes (Plastic)</p>
						</div>
                    </div>
                    <div class="col-md-6">
                        <img src="" alt="" />
                    </div>
                </div>
				<br><hr class="border-dark" /><br>
				<div class="row">
                    <div class="col-md-12">
                        <h1>Insulation Works:</h3><br>
						<div class="everest-about">
						<p>Pipe insulation can prevent condensation forming Where pipes operate at below-ambient temperatures, the potential exists for water vapour to condense on the pipe surface. Moisture is known to contribute to many different types of corrosion, so preventing the formation of condensation on pipework is important.</p>
						</div>
                    </div> 
                </div>
				<br><br>
				<div class="row">
                    <div class="col-md-12">
                        <h3>TYPES OF Insulation</h3><br>						
                    </div>                    
                </div>
				<div class="row">
                    <div class="col-md-4">
                        <div class="everest-about"><p>1) Thermal Insulation</p>
						<ul>
						<li>Refractory</li>
						<li>Passive fire Protection</li>
						<li>Acid proof lining</li>
						<li>Scaffold Pipes</li></ul> 
						</div>
                    </div>
					<div class="col-md-4">
                        <div class="everest-about"><p>2) Thermal Insulation</p>
						<ul>
						<li>Hot</li>
						<li>Cold</li>
						<li>Cryogenic</li>
						<li>Acoustic</li>
						<li>Architectural</li>
						</ul> 
						</div>
                    </div>
					<div class="col-md-4">
                        <div class="everest-about"><p>3) Insulation/Fabrication</p>
						<ul>
						<li>Automatic Roll Former</li>
						<li>Plasma Cutter</li>
						<li>Guillotines</li>
						<li>Rollers</li>
						<li>Swaggers</li>
						<li>Folders</li>
						<li>Electric Nibbler</li>
						</ul> 
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