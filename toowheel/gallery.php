<?php
if (!isset($_GET['type'])) {
    header('Location: ../index.php');
}
$type = $_GET['type'];
require_once 'api/include/common.php';
$obj = new Common();
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <section id="gallery">
            <div class="container">
                <div id="image-gallery">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                            <div class="img-wrapper">
                                <a href="https://unsplash.it/500"><img src="https://unsplash.it/500" class="img-responsive"></a>
                                <div class="img-overlay">
                                    <div class="overlay-text">
                                        <h3>TITLE COMES HERE</h3>
                                        <p>Description</p>
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                            <div class="img-wrapper">
                                <a href="https://unsplash.it/600"><img src="https://unsplash.it/600" class="img-responsive"></a>
                                <div class="img-overlay">
                                    <div class="overlay-text">
                                        <h3>TITLE COMES HERE</h3>
                                        <p>Description</p>
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                            <div class="img-wrapper">
                                <a href="https://unsplash.it/700"><img src="https://unsplash.it/700" class="img-responsive"></a>
                                <div class="img-overlay">
                                    <div class="overlay-text">
                                        <h3>TITLE COMES HERE</h3>
                                        <p>Description</p>
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                            <div class="img-wrapper">
                                <a href="https://unsplash.it/800"><img src="https://unsplash.it/800" class="img-responsive"></a>
                                <div class="img-overlay">
                                    <div class="overlay-text">
                                        <h3>TITLE COMES HERE</h3>
                                        <p>Description</p>
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                            <div class="img-wrapper">
                                <a href="https://unsplash.it/900"><img src="https://unsplash.it/900" class="img-responsive"></a>
                                <div class="img-overlay">
                                    <div class="overlay-text">
                                        <h3>TITLE COMES HERE</h3>
                                        <p>Description</p>
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                            <div class="img-wrapper">
                                <a href="https://unsplash.it/1000"><img src="https://unsplash.it/1000" class="img-responsive"></a>
                                <div class="img-overlay">
                                    <div class="overlay-text">
                                        <h3>TITLE COMES HERE</h3>
                                        <p>Description</p>
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                            <div class="img-wrapper">
                                <a href="https://unsplash.it/1100"><img src="https://unsplash.it/1100" class="img-responsive"></a>
                                <div class="img-overlay">
                                    <div class="overlay-text">
                                        <h3>TITLE COMES HERE</h3>
                                        <p>Description</p>
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                            <div class="img-wrapper">
                                <a href="https://unsplash.it/1200"><img src="https://unsplash.it/1200" class="img-responsive"></a>
                                <div class="img-overlay">
                                    <div class="overlay-text">
                                        <h3>TITLE COMES HERE</h3>
                                        <p>Description</p>
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row -->
                </div><!-- End image gallery -->
            </div><!-- End container --> 
        </section>
        <?php include 'footer.php'; ?>
        <script>
            // Gallery image hover
            $(".img-wrapper").hover(
                    function () {
                        $(this).find(".img-overlay").animate({opacity: 1}, 600);
                    }, function () {
                $(this).find(".img-overlay").animate({opacity: 0}, 600);
            }
            );

// Lightbox
            var $overlay = $('<div id="overlay"></div>');
            var $image = $("<img>");
            var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left"></i></div>');
            var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right"></i></div>');
            var $exitButton = $('<div id="exitButton"><i class="fa fa-times"></i></div>');

// Add overlay
            $overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
            $("#gallery").append($overlay);

// Hide overlay on default
            $overlay.hide();

// When an image is clicked
            $(".img-overlay").click(function (event) {
                // Prevents default behavior
                event.preventDefault();
                // Adds href attribute to variable
                var imageLocation = $(this).prev().attr("href");
                // Add the image src to $image
                $image.attr("src", imageLocation);
                // Fade in the overlay
                $overlay.fadeIn("slow");
            });

// When the overlay is clicked
            $overlay.click(function () {
                // Fade out the overlay
                $(this).fadeOut("slow");
            });

// When next button is clicked
            $nextButton.click(function (event) {
                // Hide the current image
                $("#overlay img").hide();
                // Overlay image location
                var $currentImgSrc = $("#overlay img").attr("src");
                // Image with matching location of the overlay image
                var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
                // Finds the next image
                var $nextImg = $($currentImg.closest(".image").next().find("img"));
                // All of the images in the gallery
                var $images = $("#image-gallery img");
                // If there is a next image
                if ($nextImg.length > 0) {
                    // Fade in the next image
                    $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
                } else {
                    // Otherwise fade in the first image
                    $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);
                }
                // Prevents overlay from being hidden
                event.stopPropagation();
            });

// When previous button is clicked
            $prevButton.click(function (event) {
                // Hide the current image
                $("#overlay img").hide();
                // Overlay image location
                var $currentImgSrc = $("#overlay img").attr("src");
                // Image with matching location of the overlay image
                var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
                // Finds the next image
                var $nextImg = $($currentImg.closest(".image").prev().find("img"));
                // Fade in the next image
                $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
                // Prevents overlay from being hidden
                event.stopPropagation();
            });

// When the exit button is clicked
            $exitButton.click(function () {
                // Fade out the overlay
                $("#overlay").fadeOut("slow");
            });
        </script>
    </body>
</html>