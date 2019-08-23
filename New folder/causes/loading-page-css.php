<style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300);

        .inner {
            position: absolute; 
            margin: auto; 
            width: 50px; 
            height: 95px; 
            top: 0px; 
            left: 0px; 
            bottom: 0px; 
            right: 0px; 
        }

        .inner > div {
            width: 50px; 
            height: 50px; 
            background-color: rgba(255, 255, 255, 0.7); 
            border-radius: 100%; 
            position: absolute; 
            transition: all 0.5s ease; 
        }

        .inner > div:first-child {
            margin-left: -27px; 
            animation: one 1.5s linear 1; 
        }

        .inner > div:nth-child(2) {
            margin-left: 27px; 
            animation: two 1.5s linear 1; 
        }

        .inner > div:nth-child(3) {
            margin-top: 54px; 
            margin-left: -27px; 
            animation: four 1.5s linear 1; 
        }

        .inner > div:nth-child(4) {
            margin-top: 54px; 
            margin-left: 27px; 
            animation: three 1.5s linear 1; 
        }

        @keyframes one {
            0% {
                transform: scale(1);
            }
            25% {
                transform: scale(0.3);
            }
            50% {
                transform: scale(1);
            }
            75% {
                transform: scale(1.4);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes two {
            0% {
                transform: scale(1.4);
            }
            25% {
                transform: scale(1);
            }
            50% {
                transform: scale(0.3);
            }
            75% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.4);
            }
        }

        @keyframes three {
            0% {
                transform: scale(1);
            }
            25% {
                transform: scale(1.4);
            }
            50% {
                transform: scale(1);
            }
            75% {
                transform: scale(0.3);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes four {
            0% {
                transform: scale(0.3);
            }
            25% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.4);
            }
            75% {
                transform: scale(1);
            }
            100% {
                transform: scale(0.3);
            }
        }

        .inner > div.done {
            margin-left: 0px; 
            margin-top:  27px; 
        }

        .inner > div.page {
            transform: scale(2); 
        }

        .pageLoad {
            position: fixed;  
            top: 0px; 
            left: 0px;  
            width: 100%; 
            height: 100vh; 
            background-color: #0A0A0A; 
            transition: all 0.3s ease; 
            z-index: 2; 
        }

        .pageLoad.off {
            opacity: 0; 
            pointer-events: none; 
        }

        h1 {
            text-indent: 5%; 
        }


        body, html {
            margin: 0px; 
            background-color: white; 
            overflow: hidden; 
            font-family: 'Open Sans';
        }

        body, html.on {
            overflow: auto; 
        }
    </style>