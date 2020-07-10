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
                            <h3>SPRING UNITED PTE LTD</h3>
                            <p>Incorporated in 2012 <strong>SPRING UNITED PTE LTD</strong> was established in Singapore with a vision to becoming a Specialist in preventive maintenance in various sectors.Our Service stands out in quality, commitment with professionalism.</p>
                            <p>Our team is specialized in General Engineering Contracts, Building Maintenance, Air-conditioning System, Mechanical & Electrical Services, Electrical and Piping Works, Internet of Things & CAD Drafting  (icon)
</p>
                            <p>Its management team of Elite Specialists are well versed and trained in the industry have over 8 years of diplomatic relations and exposure to managing Projects to deliver on schedule.</p>
                            <p><strong>Vision:</strong> To be a leading M&E contractor in delivering services beyond client’s expectation</p>
                            <p><strong>Mission:</strong> Delivering quality work within a reasonable time frame without compromising the safety & quality</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="img/pic-about-spring-united.jpg" alt="About Spring United" />
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
                                <li>Delivering quality work within a reasonable time frame without compromising the safety & quality</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3>Our Vision</h3>
                            <ul style="font-size: 18px">
                                <li>To be a leading M&E contractor in delivering services beyond client’s expectation</li>
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
                    <h3>Spring United Organizational Chart</h3>
                    <img id="myImg" style="width:100%; max-width:800px; border:2px solid #064b92; padding:10px;cursor: pointer;" src="img/spring-united-org-chart.jpg" />
                </div>
            </div>
        </div>
        <section id="slider-container" class="mision-vision-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Testimonial</h3>
                        <div id="testimonials">
                            <figure class="single-testimonial">
                                <blockquote>
                                    
                                    <p>"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content" </p>
                                    <footer>- <cite>Person Name, Organization</cite></footer>
                                </blockquote>
                                <blockquote>
                                    
                                    <p>"Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book."</p>
                                    <footer>- <cite>Person Name, Organization</cite></footer>
                                </blockquote>
                                <blockquote>
                                    
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas convallis placerat massa sed fringilla. Ut elementum urna sit amet lacinia molestie. Duis ut eros vitae nisi auctor porta nec nec dui."</p>
                                    <footer>- <cite>Person Name, Organization</cite></footer>
                                </blockquote>
                            </figure>
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