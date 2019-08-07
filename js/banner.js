$(document).ready(function () {
    $(".SlickCarousel").slick({
        rtl: false, // If RTL Make it true & .slick-slide{float:right;}
        autoplay: true,
        autoplaySpeed: 2000, //  Slide Delay
        speed: 800, // Transition Speed
        slidesToShow: 1, // Number Of Carousel
        slidesToScroll: 1, // Slide To Move 
        pauseOnHover: false,
        dots: true,
        appendArrows: $(".Container .Head .Arrows"), // Class For Arrows Buttons
        prevArrow: '<i class="fas fa-chevron-circle-left"></i>',
        nextArrow: '<i class="fas fa-chevron-circle-right"></i>',
        easing: "linear",
        responsive: [
            {breakpoint: 801, settings: {
                    slidesToShow: 3
                }},
            {breakpoint: 641, settings: {
                    slidesToShow: 3
                }},
            {breakpoint: 481, settings: {
                    slidesToShow: 1
                }}
        ]
    });
});