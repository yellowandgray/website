<!DOCTYPE html>
<html>
    <?php
    include 'head.php';
    $page = 'clients';
    ?>
    <body>
        <!-- Header -->
<?php include 'menu.php'; ?>
        <div class="sub-banner">
            <div class="container">
                <div class="sub-banner-content">
                    <h1>Clients</h1>
                    <div class="scp-breadcrumb">
                        <ul class="breadcrumb">
                            <li><a href="index"><i class="fa fa-home" aria-hidden="true" style="color: orangered;"></i> Home</a></li>
                            <li class="active">Clients</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="client-section-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <img src="img/clients/001.png" alt="" />
                    </div>
                    <div class="col-md-3">
                        <img src="img/clients/002.png" alt="" />
                    </div>
                    <div class="col-md-3">
                        <img src="img/clients/003.jpg" alt="" />
                    </div>
                    <div class="col-md-3">
                        <img src="img/clients/004.jpg" alt="" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <img src="img/clients/005.png" alt="" />
                    </div>
                    <div class="col-md-3">
                        <img src="img/clients/006.jpg" alt="" />
                    </div>
                    <div class="col-md-3">
                        <img src="img/clients/007.png" alt="" />
                    </div>
                    <div class="col-md-3">
                        <img src="img/clients/008.jpg" alt="" />
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