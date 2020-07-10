<!DOCTYPE html>
<html>
    <?php $page = 'about';
    include 'head.php'; ?>
    <body>
<?php include 'menu.php'; ?>
        <div class="sub-banner-section">
            <div class="container sub-banner-content">
                <h3>About Us</h3>
            </div>
        </div>
        <section class="about-company-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="everest-about">
                            <h3>Everest Engineering & Construction</h3>
                            <p>Incorporated on 26 September 2013 <strong>EVEREST E&C PTE LTD</strong> was established in Singapore with a vision to becoming a Specialist Solutions Contractor.</p>
                            <p>One of the Directors <strong>Mr PANNEER SURESH</strong> is a specialist in Metal Pipe Structure Systems has over 10 years of exposure and experience and is well recognised in the Plant, Oil & Gas Construction Sectors.</p>
                            <p>Its management team of Elite Specialists are well versed and trained in the industry have over 13 years of diplomatic relations and exposure to managing Projects to deliver on schedule.</p>
                            <p>Backed by a crew of (40) experienced labourers, <strong>@EVEREST E&C</strong> we aim to provide clients the best possible and fastest Solutions option to meeting their Projected deadlines.</p>
                            <p>Our men are trained to task and completes the erection fast, reliable, quality and safely.</p>
                            <p>They are trained to adapted to Situations and meets respective Operational Safety Standards, its complex claim Procedures, documented creation, detailed report submissions and records.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="img/pic-about-everest.jpg" alt="about everest" />
                    </div>
                </div>
            </div>
        </section>
        <div class="mision-vision-section">
            <div class="container">
                <div class="about-content">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Our Mission</h3>
                            <ul style="font-size: 18px">
                                <li>To Be recognized in the industry as a Reliable and competent Strategic Business Contractor delivering quality, safety Standards and offers at Competitive Costs <strong>"Success Through Quality"</strong></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3>Our Vision</h3>
                            <ul style="font-size: 18px">
                                <li>To Scale Greater Heights and achieve to becoming a Business Solutions Specialist in Singapore - <strong>"We shall strive hard to succeed".</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Org Chart -->
        <div class="container">
            <div class="about-content">
                <div class="row" style="text-align: center;">
                    <h3>Everest Organizational Chart</h3>
                    <img id="myImg" style="width:100%; max-width:900px; border:2px solid #f97723; padding:10px;cursor: pointer;" src="img/everest-org-chart.jpg" />
                </div>
            </div>
        </div>
        <section id="slider-container" class="mision-vision-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Testimonial</h3>
                        <div id="testimonials">
                            <figure class="single-testimonial">
                                <blockquote>
                                    <h3>Testimonial 1</h3>
                                    <p>"As an civil engineer I truly value the team at <strong>EVEREST E&C PTE LTD</strong> and the great impression they’ve made with many of our clients. They understand that the process is organic and they patiently offer their expertise and free consultation during the early stages of site survey upon request." </p>
                                    <footer>- <cite>Desmond Ho, Civil Engineer</cite></footer>
                                </blockquote>
                                <blockquote>
                                    <h3>Testimonial 2</h3>
                                    <p>"<strong>EVEREST E&C PTE LTD</strong> have a Team of dedicated specialist who approaches their work from an owner’s perspective. His firm is very responsive, creative and value conscious. <strong>EVEREST E&C PTE LTD</strong> always keeps sight of a project's goals and objectives."</p>
                                    <footer>- <cite>Quantity surveyor,Tampinese Town Hub</cite></footer>
                                </blockquote>
                                <blockquote>
                                    <h3>Testimonial 3</h3>
                                    <p>"<strong>EVEREST E&C PTE LTD</strong> and its employees have demonstrated a deep knowledge and commitment to their industry. We have been very happy with their work from the first time we hired them."</p>
                                    <footer>- <cite>Architect, Bugis SkyLine</cite></footer>
                                </blockquote>
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="video">
                            <h3>Video</h3>
                            <iframe src="https://www.youtube.com/embed/1TNLvtBYVag" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
    </body>
</html>