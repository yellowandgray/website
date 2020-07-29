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
                <h3>Fabrication & Installation Services</h3>
            </div>
        </div>
        <section class="about-company-section title-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>1.	MILD STEEL WELDING</h3><br>
						<div class="everest-about">
						<p>Mild steel is also known as low-carbon steel. It is commonly used in fabrication works because it is not expensive compared to other steel alloys and it is easy to weld. Mild steel can be welded using Tungsten Inert Gas (TIG) welding techniques, and the result is clean and neatly weld.</p>
						</div>
                    </div>
                    <div class="col-md-4">
                        <img src="img/fabrication/mild-weld-01.jpg" alt="" />
                    </div>
					<div class="col-md-4">
                        <img src="img/fabrication/mild-weld-02.jpg" alt="" />
                    </div>
                </div>
				<br><hr class="border-dark" /><br>
				<div class="row">
                    <div class="col-md-6">
                        <h3>2.	GALVANIZED STEEL JOINERY WELDING</h3><br>
						<div class="everest-about">
						<p>An application of zinc coating to a ferrous material. It is to prevent, corrosion. The zinc coating can be applied in many different ways including but not limited to hot-dipping, metal spray and electrode position.  Similar to galvanized steel is galvanneal steel. Galvanneal is the process of taking hot-dipped galvanized steel and passing it through a furnace to anneal the coating.  This process causes the iron and zinc layers to diffuse into one another causing the formation of zinc-iron alloy layers at the surface.</p>
						</div>
                    </div>
                    <div class="col-md-6">
                        <img src="img/fabrication/GALVANIZED-STEEL.jpg" alt="" />
                    </div>
                </div>
				<br><hr class="border-dark" /><br>
				<div class="row">
                    <div class="col-md-4">
                        <h3>3.	STAINLESS STEEL WELDING</h3><br>
						<div class="everest-about">
						<p>The way stainless steel is welded varies depending on the thickness and finish of the material, as well as the use of the finished product. While there are a variety of welding methods used for stainless steel, there are three methods that is commonly used most commonly used are TIG welding, Resistance welding, and MIG welding.</p>
						</div>
                    </div>
                    <div class="col-md-4">
                        <img src="img/fabrication/STAINLESS-STEEL-01.jpg" alt="" />
                    </div>
					<div class="col-md-4">
                        <img src="img/fabrication/STAINLESS-STEEL-02.jpg" alt="" />
                    </div>
                </div>
                <br/><hr class="border-dark" /><br/>
				<div class="row">
                    <div class="col-md-4">
                        <h3>4.	MIG WELDING</h3><br>
						<div class="everest-about">
						<p>MIG welding is an arc welding process in which a continuous solid wire electrode is fed through a welding gun and into the weld pool, joining two base materials together. A shielding gas is also sent through the welding gun and protects the weld pool from contamination. MIG stands for Metal Inert Gas.</p>
						</div>
                    </div>
                    <div class="col-md-4">
                        <img src="img/fabrication/mig-weld-01.jpg" alt="" />
                    </div>
					<div class="col-md-4">
                        <img src="img/fabrication/mig-weld-02.jpg" alt="" />
                    </div>
                </div>
				<br/><hr class="border-dark" /><br/>
				<div class="row">
                    <div class="col-md-4">
                        <h3>5.	ARGON WELDING</h3><br>
						<div class="everest-about">
						<p>Argon gas is your "shield" for the weld without any flux. Argon MIG is a wire fed gun. Feeding the wire by hand under the arc. The difference between the two arc types of welds has flux, and TIG welding is able to use argon as Inert Gas instead of using flux which has a cleaner finish.</p>
						</div>
                    </div>
                    <div class="col-md-4">
                        <img src="img/fabrication/argon-welding-01.jpg" alt="" />
                    </div>
					<div class="col-md-4">
                        <img src="img/fabrication/argon-welding-02.jpg" alt="" />
                    </div>
                </div>    
                <br/><hr class="border-dark" /><br/>
				<div class="row">
                    <div class="col-md-6">
                        <h3>6.	STUD WELDING</h3><br>
						<div class="everest-about">
						<p>Stud welding is a technique similar to flash welding where a fastener or specially formed nut is welded into another metal part, typically a base metal or substrate. The fastener can take different forms, but typically fall under threading, unthreaded, or tapped. The bolts may be automatically fed into the stud welding Gun.</p>
						</div>
                    </div>
                    <div class="col-md-6">
                        <img src="img/fabrication/stud-welding.jpg" alt="" />
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