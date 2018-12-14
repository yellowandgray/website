$(document).ready(function () {
    $('#get-started').on('click', function () {
        var $sidenav, $this;
        $this = $(this);
        $sidenav = $('#popup-container');
        if ($this.hasClass('active')) {
            $this.removeClass('active');
            return $sidenav.removeClass('active');
        } else {
            $this.addClass('active');
            return $sidenav.addClass('active');
        }
    });
    $('#get-started').on('click', function () {
        var $sidenav, $this;
        $this = $(this);
        $sidenav = $('#popup-container');
        if ($this.hasClass('open')) {
            $this.removeClass('open');
            return $sidenav.removeClass('open');
        } else {
            $this.addClass('open');
            return $sidenav.addClass('open');
        }
    });
    $('#popup-container').find('.close').on('click', function () {
        $(this).parent().removeClass('open');
        $('#get-started').removeClass('open')
        return $('#popup-container').removeClass('open');
        return $('#get-started').removeClass('open');
    });
});

// When the DOM is ready, run this function
$(document).ready(function () {
    //Set the carousel options
    $('#quote-carousel').carousel({
        pause: true,
        interval: 4000,
    });
});

$(window).load(function () {
    $(".trigger_popup_fricc").click(function () {
        $('.hover_bkgr_fricc').show();
    });
//    $('.hover_bkgr_fricc').click(function () {
//        $('.hover_bkgr_fricc').hide();
//    });
    $('.popupCloseButton').click(function () {
        $('.hover_bkgr_fricc').hide();
    });
});