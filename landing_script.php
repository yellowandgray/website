<script src="examhorse-landing/js/common.js" type="text/javascript"></script>
<script src="examhorse-landing/js/jquery.min.js" type="text/javascript"></script>
<script src="examhorse-landing/js/bootstrap.min.js" type="text/javascript"></script>
<script src="examhorse-landing/js/wow.js" type="text/javascript"></script>
<script src="examhorse-landing/js/sweetalert.min.js" type="text/javascript"></script>
<script src="js/common.js" type="text/javascript"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js" type="text/javascript"></script>
<script src="js/contactjs.js" type="text/javascript"></script>
<script type="text/javascript">
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
    $("#open-logout-1").click(function (e) {
        //console.log("test");
        e.stopPropagation();
        $(".logout_dropdown_1").show("fast");
    });
    $(document).click(function (e) {
        if (!(e.target.class === 'logout_dropdown_1')) {
            $(".logout_dropdown_1").hide("fast");
        }
    });
</script>