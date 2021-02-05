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
                                                <a href="https://twitter.com/FrescheIndia" target="block"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                                                <a href="https://www.facebook.com/FrescheGHMIndia/" target="block"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                                <a href="https://youtu.be/hL0eNG_99HM" target="block"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                                <a class="whatsapp" href="https://api.whatsapp.com/send?phone=+918409012345" target="block"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                                <a class="phone" href="tel:+917373387504" target="block"><i class="fa fa-phone-square" aria-hidden="true"></i><p>+91 8409 012345</p></a>
                                                <a class="mail" href="mailto:info@ghmindia.com" target="block"><i class="fa fa-envelope" aria-hidden="true"></i><p>info@ghmindia.com</p></a>
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
                                    if (isset($page) && $page == 'products') {
                                        echo 'active';
                                    }
                                    ?>"><a href="product.php" class="nav-link">Products</a></li>

                                    <li class="nav-item <?php
                                    if (isset($page) && $page == 'applications') {
                                        echo 'active';
                                    }
                                    ?>"><a href="application.php" class="nav-link">Applications</a></li>

                                    <li class="nav-item <?php
                                    if (isset($page) && $page == 'technology') {
                                        echo 'active';
                                    }
                                    ?>"><a href="technology.php" class="nav-link">Technology</a></li>

                                    <!--                                    <li class="nav-item <?php
                                    if (isset($page) && $page == 'testimonial') {
                                        echo 'active';
                                    }
                                    ?>"><a href="#" class="nav-link">Testimonial</a></li>-->

                                    <li class="nav-item <?php
                                    if (isset($page) && $page == 'about') {
                                        echo 'active';
                                    }
                                    ?>"><a href="about.php" class="nav-link">About</a></li>

                                    <li class="nav-item <?php
                                    if (isset($page) && $page == 'contact') {
                                        echo 'active';
                                    }
                                    ?>"><a href="contact.php" class="nav-link">Contact</a></li>
                                    <li class=" menu-icon nav-item cta cta-colored"><a href="javascript: goToCheckout();" class="nav-link" data-target="#cart"><span class="icon-shopping_cart"></span><span class="total-count"></span></a></li>
<!--                                    <li class=" menu-icon nav-item cta cta-colored" data-toggle="modal" data-target="#myModal"><a href="#" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i></a></li>-->
                                    <!--<li class=" menu-icon nav-item cta cta-colored"><a onclick="document.getElementById('id01').style.display = 'block'" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i></a></li>-->
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

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <!--                        <button type="button" class="close" data-dismiss="modal">&times;</button>-->
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="user_name" placeholder="Enter Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="Enter Your Password" required>
                    </div>
                    <button type="submit" class="btn-forget">Submit</button>
                    <br/>
                    <a href="member-register.php" class="text-center margin-top-10">Not to Quardian? Create Your Account</a>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


