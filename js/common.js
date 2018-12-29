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
            $('#video_container').html('');
            return $sidenav.removeClass('open');
        } else {
            $('#video_container').html('<iframe src="https://www.youtube.com/embed/0p3787JiFgQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
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
$(document).ready(function () {
    $('#get-started1').on('click', function () {
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
    $('#get-started1').on('click', function () {
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
    $(".popup-container").fadeIn(3500);
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

function openForm() {
    $(".chat-popup").fadeIn(2500);
    document.getElementById("myQus").style.display = "block";
}

function closeForm() {
    document.getElementById("myQus").style.display = "none";
}

//window.onload = function () {
//    document.getElementById('noteButton').onclick = showNote;
//};



function showNote(e) {
    var x = 0, y = 0;
    if (!e)
        e = window.event;
    if (e.pageX || e.pageY) {
        x = e.pageX;
        y = e.pageY;
    } else if (e.clientX || e.clientY) {
        x = e.clientX + document.body.scrollLeft
                + document.documentElement.scrollLeft;
        y = e.clientY + document.body.scrollTop
                + document.documentElement.scrollTop;
    }
    var noteDiv = document.getElementById("noteDiv");
    noteDiv.style.display = "block";
    noteDiv.style.left = (x + 20) + "px";
    noteDiv.style.top = (y) + "px";
}

function hideNote() {
    document.getElementById("noteDiv").style.display = "none";
}