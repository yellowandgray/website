<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-52115242-17"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-52115242-17');
    </script>
    <meta charset="utf-8">
    <title>Project Next Door</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootstrap HTML template and UI kit by Medium Rare">
    <!-- Begin loading animation -->
    <style>
        @keyframes hideLoader{ 0%{ width: 100%; height: 100%; } 100%{ width: 0; height: 0; } } body > div.loader{ position: fixed; background: white; width: 100%; height: 100%; z-index: 1071; opacity: 0; transition: opacity .5s ease; overflow: hidden; pointer-events: none; display: flex; align-items: center; justify-content: center; } body:not(.loaded) > div.loader{ opacity: 1; } body:not(.loaded){ overflow: hidden; } body.loaded > div.loader{ animation: hideLoader .5s linear .5s forwards; } .loading-animation{width:40px;height:40px;margin:100px auto;background-color:#2568ef;border-radius:100%;animation:pulse 1s infinite ease-in-out}@keyframes pulse{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}
    </style>
    <script type="text/javascript">
        window.addEventListener("load", function () {
            document.querySelector('body').classList.add('loaded');
        });
    </script>
    <!-- End loading animation -->
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" media="all" />

    <!--    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,700&amp;display=swap" rel="stylesheet">-->
    <style>
        @font-face {font-family: "Nexa Bold";
                    src: url("fonts/nexa-bold/c9f309b3d47969ecac64a77a6c672594.eot"); /* IE9*/
                    src: url("fonts/nexa-bold/c9f309b3d47969ecac64a77a6c672594.eot") format("embedded-opentype"), /* IE6-IE8 */
                        url("fonts/nexa-bold/c9f309b3d47969ecac64a77a6c672594.woff2") format("woff2"), /* chrome、firefox */
                        url("fonts/nexa-bold/c9f309b3d47969ecac64a77a6c672594.woff") format("woff"), /* chrome、firefox */
                        url("fonts/nexa-bold/c9f309b3d47969ecac64a77a6c672594.ttf") format("truetype"), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
                        url("fonts/nexa-bold/c9f309b3d47969ecac64a77a6c672594.svg") format("svg"); /* iOS 4.1- */
        }
        @font-face {font-family: "DashNess";
                    src: url("fonts/dash-ness/ee1c62326ab59c0683247d7a66322c8b.eot"); /* IE9*/
                    src: url("fonts/dash-ness/ee1c62326ab59c0683247d7a66322c8b.eot?#iefix") format("embedded-opentype"), /* IE6-IE8 */
                        url("fonts/dash-ness/ee1c62326ab59c0683247d7a66322c8b.woff2") format("woff2"), /* chrome、firefox */
                        url("fonts/dash-ness/ee1c62326ab59c0683247d7a66322c8b.woff") format("woff"), /* chrome、firefox */
                        url("fonts/dash-ness/ee1c62326ab59c0683247d7a66322c8b.ttf") format("truetype"), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
                        url("fonts/dash-ness/ee1c62326ab59c0683247d7a66322c8b.svg#DashNess") format("svg"); /* iOS 4.1- */
        }
        @font-face {font-family: "Quicksandlight";
                    src: url("fonts/quick-sand/QuicksandLight-Regular.eot"); /* IE9*/
                    src: url("fonts/quick-sand/QuicksandLight-Regular.otf") format("embedded-opentype"), /* IE6-IE8 */
                        url("fonts/quick-sand/QuicksandLight-Regular.ttf") format("woff2"), /* chrome、firefox */
                        url("fonts/quick-sand/QuicksandLight-Regular.woff") format("woff"), /* chrome、firefox */
                        url("fonts/quick-sand/QuicksandLight-Regular.woff2") format("truetype"), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
                        url("fonts/quick-sand/QuicksandLight-Regular.svg#DashNess") format("svg"); /* iOS 4.1- */
        }
        @font-face {
            font-family: 'TeXGyreAdventor-Regular';
            src: local('TeXGyreAdventor-Regular'), url('fonts/tex-gyre/texgyreadventor-regular.woff') format('woff');
        }


        @font-face {
            font-family: 'TeXGyreAdventor-Italic';
            src: local('TeXGyreAdventor-Italic'), url('fonts/tex-gyre/texgyreadventor-italic.woff') format('woff');
        }


        @font-face {
            font-family: 'TeXGyreAdventor-Bold';
            font-style: normal;
            font-weight: normal;
            src: local('TeXGyreAdventor-Bold'), url('fonts/tex-gyre/texgyreadventor-bold.woff') format('woff');
        }


        @font-face {
            font-family: 'TeXGyreAdventor-BoldItalic';
            font-style: normal;
            font-weight: normal;
            src: local('TeXGyreAdventor-BoldItalic'), url('fonts/tex-gyre/texgyreadventor-bolditalic.woff') format('woff');
        }
    </style>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/all.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
</head>