<!DOCTYPE html>
<html>
    <?php $page = 'award';
    include 'head.php';
    ?>
    <body>
<?php include 'menu.php'; ?>
        <div class="sub-banner-section">
            <div class="container sub-banner-content">
                <h3>Awards</h3>
            </div>
        </div>
        <div class="award-main-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>BCA</h3>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="award-img">
                                    <img id="myImg" style="border:1px solid #d7d7d7" src="img/certificate/bca-cert-full.jpg" alt="" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="award-img">
                                    <img id="myImg1" style="border:1px solid #d7d7d7" src="img/certificate/crs-app-cert.jpg" alt="" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="award-img">
                                    <img id="myImg2" style="border:1px solid #d7d7d7" src="img/certificate/crs-page.jpg" alt="" />
                                </div>
                            </div>
                        </div>
                        <br/><br/>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <h3>ASPRI</h3>
                                <div class="award-img">
                                    <img id="myImg3" style="border:1px solid #d7d7d7" src="img/certificate/aspri-cert.jpg" alt="ASPRI Certificate" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <h3>APPROVED SCAFFOLD CONTRACTOR</h3>
                                <div class="award-img">
                                    <img id="myImg4" style="border:1px solid #d7d7d7" src="img/certificate/asc-cert.jpg" alt="APPROVED SCAFFOLD CONTRACTOR Certificate" />
                                </div>
                            </div>
                        </div>
                        <br/><br/>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <h3>ISO 9001</h3>
                                <div class="award-img">
                                    <img id="myImg5" style="border:1px solid #d7d7d7" src="img/certificate/9001-cert.jpg" alt="ISO 9001 Certificate" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <h3>ISO 45001</h3>
                                <div class="award-img">
                                    <img id="myImg6" style="border:1px solid #d7d7d7" src="img/certificate/45001-cert.jpg" alt="ISO 45001 Certificate" />
                                </div>
                            </div>
                        </div>
                        <br/><br/>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <h3>Biz Star</h3>
                                <div class="award-img">
                                    <img id="myImg7" style="border:1px solid #d7d7d7" src="img/certificate/bizstar-cert.jpg" alt="Biz Star Certificate" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
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

        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function () {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }
        </script>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg1");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function () {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }
        </script>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg2");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function () {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }
        </script>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg3");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function () {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }
        </script>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg4");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function () {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }
        </script>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg5");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function () {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }
        </script>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg6");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function () {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }
        </script>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg7");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function () {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }
        </script>
    </body>
</html>