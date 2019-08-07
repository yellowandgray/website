<!DOCTYPE html>
<html>
    <head>
        <title>Project Next Door</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/all.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" type="text/css"/>
        <link href="//cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js" rel="stylesheet" type="text/css"/>
        <link href="css/examples.css" rel="stylesheet" type="text/css"/>
        <link href="css/fullpage.css" rel="stylesheet" type="text/css"/>
        <link href="css/pickmeup.css" rel="stylesheet" type="text/css"/>
        <link href="css/demo.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>        
        <section id="gallery" class="section gallery" style="background: #eee;">
            <div class="header-style-1 text-center">
                <h1>Gallery</h1>
            </div>
            <div class="row">
                <div class="thumbnails grid">
                    <a href="#"><img src="img/gallery/gallery-001.jpg" alt=""></a>
                    <a href="#"><img src="img/gallery/gallery-002.jpg" alt=""></a>
                    <a href="#"><img src="img/gallery/gallery-003.jpg" alt=""></a>
                    <a href="#"><img src="img/gallery/gallery-004.jpg" alt=""></a>
                    <a href="#"><img src="img/gallery/gallery-005.jpg" alt=""></a>
                    <a href="#"><img src="img/gallery/gallery-006.jpg" alt=""></a>
                    <a href="#"><img src="img/gallery/gallery-007.jpg" alt=""></a>
                    <a href="#"><img src="img/gallery/gallery-008.jpg" alt=""></a>

<!--                        <a href="#"><img src="https://source.unsplash.com/featured/?sea" alt=""></a>
<a href="#"><img src="https://source.unsplash.com/featured/?green" alt=""></a>
<a href="#"><img src="https://source.unsplash.com/featured/?fashion" alt=""></a>
<a href="#"><img src="https://source.unsplash.com/featured/?architecture" alt=""></a>
<a href="#"><img src="https://source.unsplash.com/featured/?art" alt=""></a>
<a href="#"><img src="https://source.unsplash.com/featured/?style" alt=""></a>
<a href="#"><img src="https://source.unsplash.com/featured/?animal" alt=""></a>-->
                </div>

                <br>

                <!--                        <div class="thumbnails masonry">
                                            <a href="#"><img src="https://source.unsplash.com/featured/?man" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?woman" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?design" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?sky" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?tree" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?cat" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?dog" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?office" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?sea" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?green" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?fashion" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?architecture" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?art" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?style" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?animal" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?home" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?flower" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?grass" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?market" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?street" alt=""></a>
                                            <a href="#"><img src="https://source.unsplash.com/featured/?bird" alt=""></a>
                                        </div>-->
            </div>
        </section>
    </body>
    <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.plugin.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/all.min.js" type="text/javascript"></script>
    <script src="js/fontawesome.min.js" type="text/javascript"></script>

    <script>
        function openNav() {
            if (window.matchMedia("(max-width: 500px)").matches) {
                document.getElementById("mySidenav").style.width = "100vw";
                document.getElementById("main").style.marginRight = "499px";
                /* The viewport is less than, or equal to, 700 pixels wide */
            } else {
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginRight = "250px";
                /* The viewport is greater than 700 pixels wide */
            }

        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginRight = "0";
        }
    </script>
</html>