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
                        <div class="col-md-3">
                            <img src="img/clients/logo-citygas.jpg">
                        </div>
                        <div class="col-md-3">
                            <img src="img/clients/logo-solenis.jpg">
                        </div>
                        <div class="col-md-3">
                            <img src="img/clients/logo-civil-service.jpg">
                        </div>
                        <div class="col-md-3">
                            <img src="img/clients/logo-auo.jpg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <img src="img/clients/logo-sit.jpg">
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