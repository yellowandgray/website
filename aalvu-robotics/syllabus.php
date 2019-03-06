<!DOCTYPE html>
<html lang="en">
    <?php
    include 'head.php';
    $page = 'syllabus'
    ?>
    <body>

        <!-- header section -->
        <?php include 'menu.php'; ?>
        <!-- Header section end -->

        <!-- Banner Section -->
        <div class="sub-banner-section" style="background: url(img/sub-banner/syllabus.jpg)no-repeat; height: 250px;"></div>
        <!-- End Banner Section -->

        <!-- Breadcrumb section -->
        <div class="site-breadcrumb">
            <div class="container">
                <a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
                <span>Syllabus</span>
            </div>
        </div>
        <!-- Breadcrumb section end -->


        <!-- About section -->
        <section class="about-section spad pt-0">
            <div class="container syllabus">
                <div class="section-title text-center">
                    <h3>WELCOME TO AALUV</h3>
                </div>
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">London</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
                    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
                </div>

                <div id="London" class="tabcontent">
                    <table>
                        <tr>
                            <th>S.no</th>
                            <th>Topic</th>
                            <th>Activity</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>What is robot?</td>
                            <td>Jump for robots</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Introduction to types of robots</td>
                            <td>Av presentation to latest trends in robotics</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Introduction to WeDo robots</td>
                            <td>Exploring WeDo components</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Introduction to LegoWeDo graphical programming</td>
                            <td>Name the WeDo software blocks </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Human senses vs. robot senses</td>
                            <td>Oral av presentation contains sensor introduction</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Plant life</td>
                            <td>Save the plant – math kit activity</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Animal life</td>
                            <td>Alligator robot</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>patterns</td>
                            <td>Patternize the bricks</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Shapes and sizes</td>
                            <td>Sorting according to shapes</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Gears</td>
                            <td>Gear rack girl</td>
                        </tr>
                    </table>
                </div>

                <div id="Paris" class="tabcontent">
                    <h3>Paris</h3>
                    <p>Paris is the capital of France.</p> 
                </div>

                <div id="Tokyo" class="tabcontent">
                    <h3>Tokyo</h3>
                    <p>Tokyo is the capital of Japan.</p>
                </div>
            </div>
        </section>
        <!-- About section end-->

        <!-- Footer section -->
        <?php include 'footer.php'; ?>
        <!-- Footer section end-->
        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            document.getElementById("defaultOpen").click();
        </script>

    </body>
</html>