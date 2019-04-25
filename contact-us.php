<!DOCTYPE html>
<html lang="en">
    <?php
    include 'head.php';
    $page = 'home'
    ?>
    <body>
        <?php include 'menu.php'; ?>
        <!-- END nav -->
        <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <h1 class="mb-2 bread">Contact Us</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i> </span><span>Contact us</span></p>
                    </div>
                </div>
            </div>
        </section>


        <section class="ftco-section py-5 ftco-consult ftco-no-pt ftco-no-pb pad-30" style="background-image: url(images/bg_5.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-6 py-5 px-md-5 bg-primary">
                        <div class="heading-section heading-section-white ftco-animate mb-5">
                            <h2 class="mb-4">Contact Us</h2>
                            <p>Please fill the form and get interesting articles. Your details will not be shared.</p>
                        </div>
                        <form action="#" class="appointment-form ftco-animate">
                            <div class="d-md-flex">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                                <div class="form-group ml-md-4">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="d-md-flex">
                                <!--                                <div class="form-group">
                                                                    <div class="form-field">
                                                                        <div class="select-wrap">
                                                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="">Select Your Course</option>
                                                                                <option value="">Art Lesson</option>
                                                                                <option value="">Language Lesson</option>
                                                                                <option value="">Music Lesson</option>
                                                                                <option value="">Sports</option>
                                                                                <option value="">Other Services</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>-->
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="email">
                                </div>
                                <div class="form-group ml-md-4">
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="d-md-flex">
                                <div class="form-group">
                                    <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group ml-md-4">
                                    <input type="submit" value="submit" class="btn btn-secondary py-3 px-4">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        <?php include'footer.php'; ?>

    </body>
</html>