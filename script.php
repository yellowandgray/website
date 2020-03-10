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
<script src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
<script type="text/javascript">
    /*
     MathJax.Hub.Config({
     skipStartupTypeset: true,
     tex2jax: {inlineMath: [['$', '$'], ['\\(', '\\)']]}
     });
     */
    applyMathAjax();
    function applyMathAjax() {
        if (typeof MathJax !== 'undefined') {
            MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
        }

        MathJax.Hub.Config({
            tex2jax: {inlineMath: [['$', '$'], ['\\(', '\\)']]}
        });
    }
</script>
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
<script>
    $(".radio-btn-section input[name='method']").click(function () {
        $('#checkbox-btn').css('display', ($(this).val() === 'learn') ? 'block' : 'none');
        $('#tets').css('display', ($(this).val() !== 'learn && test') ? 'block' : '');
    });
    $("#tets").click(function () {
        $("#testval").data("test", "1");
    });
</script>
<script type="text/javascript">
    var imm = 0;
    $("#tets").click(function () {

        if ($('#show-immediately').prop('checked')) {
            imm = 1;
        } else {
            imm = 0;
        }
       //alert(imm)
        $.ajax({
            url: "immediate.php",
            type: "POST",
            data: {immediate: imm},
            success: function (response) {
                // You will get response from your PHP page (what you echo or print)
                window.location = 'select_chapter?difficult=<?php echo $row['name']; ?>'
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });


</script>