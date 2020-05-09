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
    /*
    test();
    function test() {
        if (typeof MathJax !== 'undefined') {
            MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
        }

        MathJax.Hub.Config({
            tex2jax: {inlineMath: [['$', '$'], ['\\(', '\\)']]}
     });     
    }
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
</script>
<script>
    function goBack() {
        window.history.back();
    }
    
    $(".radio-btn-section input[name='method']").click(function () {
        $('#tets').css('display', ($(this).val() !== 'learn && test') ? 'block' : '');
    });  
    
    function selmode(lang) {
        /*
        window.location = '#popup1'; 
        $('#tets').data('lang',lang);
        */
       window.location = 'question-subject-order?lan='+lang;
    }
    
    /*
    $("#tets").click(function () {            
         //alert(' val1 '+$("input[name='method']:checked").val());   
         
        if($("input[name='method']:checked").val()=='learn') {
            testmode = 1;
        }else {
            testmode = 0;
        }
        
         var lang = $('#tets').data('lang');

        if(lang!='') {
        
            $.ajax({
                url: "immediate.php",
                type: "POST",
                data: {testmode: testmode},
                success: function (response) {
                    // You will get response from your PHP page (what you echo or print)

                            window.location = 'question-subject-order?lan='+lang;        

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

         }else {
                    window.location = 'select_language';
            } 
       
        
 
    });
     
     */
    function chooseTestmode(testmode) {
         var lang = $('#tets').data('lang');

        if(lang!='') {
        
            $.ajax({
                url: "immediate.php",
                type: "POST",
                data: {testmode: testmode},
                success: function (response) {
                    // You will get response from your PHP page (what you echo or print)

                            window.location = 'question-subject-order?lan='+lang;        

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

         }else {
                    window.location = 'select_language';
            } 
    }
    
    
    /*
    $("input[name='method']").change(function () {            
         //alert(' val1 '+$("input[name='method']:checked").val());   
         
        if($("input[name='method']:checked").val()=='learn') {
            testmode = 1;
        }else {
            testmode = 0;
        }
        
         var lang = $('#tets').data('lang');

        if(lang!='') {
        
            $.ajax({
                url: "immediate.php",
                type: "POST",
                data: {testmode: testmode},
                success: function (response) {
                    // You will get response from your PHP page (what you echo or print)

                            window.location = 'question-subject-order?lan='+lang;        

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

         }else {
                    window.location = 'select_language';
            } 
       
        
 
    });
    */
    

</script>
