<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar  ftco-navbar-light-01" id="ftco-navbar">
    <div class="row width-100">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 top-1">
                    <a class="navbar-brand" href="index.php"><img src="images/logo-01.png" alt="" class="img-responsive"/></a>
                </div>
                <div class="col-md-9 ">
                    <div class="row">
                        <div class="col-md-12 top-2 social-i">
                            <div class="no-gutters float-right d-flex align-items-start align-items-center px-md-0">
                                <div class="d-block">
                                    <div class="width-100">
                                        <div class="s-icon-2 align-items-center">
                                            <div class="float-right">
                                                <i class="fa fa-facebook-square" aria-hidden="true"></i>
                                                <i class="fa fa-youtube" aria-hidden="true"></i>
                                                <a class="whatsapp" href="https://api.whatsapp.com/send?phone=+918409012345"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                                <a class="phone" href="tel:+917373387504"><i class="fa fa-phone-square" aria-hidden="true"></i><p>+91 8409 012345</p></a>
                                                <a class="mail" href="mailto:info@ghmindia.com"><i class="fa fa-envelope" aria-hidden="true"></i><p>info@ghmindia.com</p></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 top-3">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="oi oi-menu"></span> Menu
                            </button>

                            <div class="collapse navbar-collapse" id="ftco-nav">
                                <ul class="navbar-nav ml-auto">
                                    <!--                                                <li class="nav-item"><a href="about.html" class="nav-link">Products</a></li>
                                                                                    <li class="nav-item"><a href="blog.html" class="nav-link">Applications</a></li>
                                                                                    <li class="nav-item"><a href="contact.html" class="nav-link">Artifacts</a></li>
                                                                                    <li class="nav-item"><a href="contact.html" class="nav-link">Testimonial</a></li>
                                                                                    <li class="nav-item active"><a href="index.html" class="nav-link">About</a></li>
                                                                                    <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                                                                                    <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>-->
                                    <li class="nav-item <?php
                                    if ($page == 'products') {
                                        echo 'active';
                                    }
                                    ?>"><a href="product.php" class="nav-link">Products</a></li>

                                    <li class="nav-item <?php
                                    if ($page == 'applications') {
                                        echo 'active';
                                    }
                                    ?>"><a href="application.php" class="nav-link">Applications</a></li>

                                    <li class="nav-item <?php
                                    if ($page == 'technology') {
                                        echo 'active';
                                    }
                                    ?>"><a href="technology.php" class="nav-link">Technology</a></li>

                                    <!--                                    <li class="nav-item <?php
                                    if ($page == 'testimonial') {
                                        echo 'active';
                                    }
                                    ?>"><a href="#" class="nav-link">Testimonial</a></li>-->

                                    <li class="nav-item <?php
                                    if ($page == 'about') {
                                        echo 'active';
                                    }
                                    ?>"><a href="about.php" class="nav-link">About</a></li>

                                    <li class="nav-item <?php
                                    if ($page == 'contact') {
                                        echo 'active';
                                    }
                                    ?>"><a href="contact.php" class="nav-link">Contact</a></li>
                                    <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link" ><span class="icon-shopping_cart"></span> (<span class="total-count"></span>)</a></li>
                                    <li class="nav-item cta cta-colored"><a onclick="document.getElementById('id01').style.display = 'block'" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                    <!--<li class="nav-item cta cta-colored"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">Cart (<span class="total-count"></span>)</button><button class="clear-cart btn btn-danger">Clear Cart</button></li>-->
                                    <?php include 'login.php'; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>