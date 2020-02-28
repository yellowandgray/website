<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jcarousel/jquery.jcarousel.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/jquery.nivo.slider.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.ba-cond.min.js"></script>
<script src="js/jquery.slitslider.js"></script>
<script src="js/animate.js"></script>
<!-- Template Custom JavaScript File -->
<script src="js/custom.js"></script>
<script src="js/sweetalert.min.js" type="text/javascript"></script>
<script src="js/common.js" type="text/javascript"></script>
<script src="js/vue.min.js" type="text/javascript"></script>
<!--<script type="text/javascript">
$("#open-logout").click(function (e) {
    //console.log("test");
    e.stopPropagation();
    $(".logout_dropdown").show("fast");
});
$(document).click(function (e) {
    if (!(e.target.class === 'logout_dropdown')) {
        $(".logout_dropdown").hide("fast");
    }
});
</script>-->
<script type="text/javascript">
    var onevar = 1;
    function goBack() {
        window.history.back();
    }

    $('#open-logout').click(function () {

        if (onevar == 0) {
            onevar = 1;
            $('.logout_dropdown').hide(100);
        } else {
            onevar = 0;
            $('.logout_dropdown').show(100);
        }
    });
</script>
<!--<script type="text/javascript">
    $("#open-logout").click(function (e) {
        //console.log("test");
        e.stopPropagation();
        $(".logout_dropdown").show("fast");
    });
    $(document).click(function (e) {
        if (!(e.target.class === 'logout_dropdown')) {
            $(".logout_dropdown").hide("fast");
        }
    });
</script>-->