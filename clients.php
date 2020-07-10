<!DOCTYPE html>
<html>
    <?php
    $page = 'client';
    include 'head.php';
    ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="sub-banner-section">
            <div class="container sub-banner-content">
                <h3>Clients</h3>
            </div>
        </div>
        <div class="client-main-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Our Clients</h3>
                    </div>
                </div>
                <div class="client-image-section">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="img/clients/client-img/sin-guan-teck-pte-ltd.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/WOG-TECHNOLOGIES.jpg">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/MEIDEN-SINGAPORE PTE-LTD.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/CITIC-ENGINEERING-PTE-LTD.jpg">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/TORISHIMA-SERVICE-SOLUTIONS.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/SPRINGLEAF.jpg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="img/clients/client-img/TTJ-ENGINEERING.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/KIM-SENG-HENG.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/OILMAC-ENGINEERING.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/CHINA-CONSTRUCTION.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/CKR-ENGINEERING.jpg">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/W2-ENGINEERING.jpg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="img/clients/client-img/INNOVENG-ENGINEERING.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/STEADFAST-ENGINEERING.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/OCEAN-TANKERS.jpg">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/KAMIGUMI-SINGAPORE.jpg">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/YU-SIN-ENGINEERING.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/MILLIONBUILT.jpg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="img/clients/client-img/YONGNAM-ENGINEERING.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/PFEIFER-STRUCTURES.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/HIAP-NGAI-ENGINEERING.jpg">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/HELMSION.jpg">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/UES-HOLDINGS.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/AWIN-ENGINEERING.jpg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="img/clients/client-img/logo-springunited.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/SINGAPORE-INNOVATE.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/RUI-LI-ENGINEERING.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/PRIMUSTECH PTE-LTD.jpg">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/WYVAN-TECHNOLOGY.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/logo-wellex.png">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="img/clients/client-img/logo-kuekkim.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/logo-steelgiant.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/logo-tyengineering.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/logo-woh-hup.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/logo-samsung.png">
                        </div>
                        <div class="col-md-2">
                            <img src="img/clients/client-img/logo-tec.png">
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