$(document).ready(function () {
    /* JS is enabled */
    $('.no-js').removeClass('no-js');

    /* Variables */
    var currentNews = 0;
    var nbNews = $('.news').length;
    var tempo;

    /* Initialization */
    $('.news').eq(currentNews).removeClass('off').addClass('on');

    function changeNews() {
        currentNews++;
        if (currentNews < nbNews) {
            $('.on').toggleClass('off').toggleClass('on');
            $('.off').eq(currentNews).toggleClass('off').toggleClass('on');
        } else {
            currentNews = 0;
            $('.on').toggleClass('off').toggleClass('on');
            $('.off').eq(currentNews).toggleClass('off').toggleClass('on');
        }
    }

    tempo = setInterval(changeNews, 3000);

});