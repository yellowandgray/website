<!-- basic scripts -->
<!--[if !IE]> -->
<script src="../js/libs/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="../js/libs/jquery-1.11.3.min.js"></script>
<![endif]-->

<!-- ace settings handler -->
<script src="../js/libs/ace-extra.min.js"></script>

<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--[if lte IE 8]>
<script src="../js/libs/html5shiv.min.js"></script>
<script src="../js/libs/respond.min.js"></script>
<![endif]-->

<script src="../js/libs/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!-- ace scripts -->
<script src="../js/libs/ace-elements.min.js"></script>
<script src="../js/libs/ace.min.js"></script>
<script src="../js/libs/sweetalert.min.js"></script>
<script src="../js/libs/jquery.validate.min.js"></script>
<script src="../js/libs/jquery-dateFormat.min.js"></script>
<script src="../js/libs/jquery.rest.js"></script>
<script src="../js/libs/jquery.dataTables.min.js"></script>
<script src="../js/libs/jquery.dataTables.bootstrap.min.js"></script>
<script src="../js/libs/dataTables.buttons.min.js"></script>
<script src="../js/libs/pdfmake.min.js"></script>
<script src="../js/libs/vfs_fonts.js"></script>
<script src="../js/libs/buttons.flash.min.js"></script>
<script src="../js/libs/buttons.html5.min.js"></script>
<script src="../js/libs/buttons.print.min.js"></script>
<script src="../js/libs/buttons.colVis.min.js"></script>
<script src="../js/libs/bootstrap-tagsinput.js"></script>
<script src="../js/validation.js"></script>
<script src="../js/common.js"></script>
<script src="../js/script.js"></script>

<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) {
        document.write("<script src='../js/libs/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    }
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {
        $('#id-change-style').on(ace.click_event, function () {
            var toggler = $('#menu-toggler');
            var fixed = toggler.hasClass('fixed');
            var display = toggler.hasClass('display');

            if (toggler.closest('.navbar').length === 1) {
                $('#menu-toggler').remove();
                toggler = $('#sidebar').before('<a id="menu-toggler" data-target="#sidebar" class="menu-toggler" href="#">\
                                        <span class="sr-only">Toggle sidebar</span>\
                                        <span class="toggler-text"></span>\
                                 </a>').prev();

                var ace_sidebar = $('#sidebar').ace_sidebar('ref');
                ace_sidebar.set('mobile_style', 2);

                var icon = $(this).children().detach();
                $(this).text('Hide older Ace toggle button').prepend(icon);

                $('#id-push-content').closest('div').hide();
                $('#id-push-content').removeAttr('checked');
                $('.sidebar').removeClass('push_away');
            } else {
                $('#menu-toggler').remove();
                toggler = $('.navbar-brand').before('<button data-target="#sidebar" id="menu-toggler" class="three-bars pull-left menu-toggler navbar-toggle" type="button">\
                                        <span class="sr-only">Toggle sidebar</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>\
                                </button>').prev();

                var ace_sidebar = $('#sidebar').ace_sidebar('ref');
                ace_sidebar.set('mobile_style', 1);

                var icon = $(this).children().detach();
                $(this).text('Show older Ace toggle button').prepend(icon);

                $('#id-push-content').closest('div').show();
            }

            if (fixed)
                toggler.addClass('fixed');
            if (display)
                toggler.addClass('display');

            $('.sidebar[data-sidebar-hover=true]').ace_sidebar_hover('reset');
            $('.sidebar[data-sidebar-scroll=true]').ace_sidebar_scroll('reset');

            return false;
        });

        $('#id-push-content').removeAttr('checked').on('click', function () {
            $('.sidebar').toggleClass('push_away');
        });
    });
</script>