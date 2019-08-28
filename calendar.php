<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php include 'head.php'; ?>
    <body>
        <div mbsc-form>
            <div class="mbsc-grid">
                <div class="mbsc-row">
                    <div class="mbsc-col-sm-12 mbsc-col-md-4">
                        <div class="mbsc-form-group">
<!--                            <div class="mbsc-form-group-title">Multi-day</div>-->
                            <div id="demo-multi-day"></div>
                        </div>
                    </div>
                    <!--                    <div class="mbsc-col-sm-12 mbsc-col-md-4">
                                            <div class="mbsc-form-group">
                                                <div class="mbsc-form-group-title">Max days</div>
                                                <div id="demo-max-days"></div>
                                            </div>
                                        </div>-->
                    <!--                    <div class="mbsc-col-sm-12 mbsc-col-md-4">
                                            <div class="mbsc-form-group">
                                                <div class="mbsc-form-group-title">Counter</div>
                                                <div id="demo-counter"></div>
                                            </div>
                                        </div>-->
                </div>
            </div>
        </div>
        <script type="text/javascript">
            mobiscroll.settings = {
                lang: 'en', // Specify language like: lang: 'pl' or omit setting to use default
                theme: 'ios'                     // Specify theme like: theme: 'ios' or omit setting to use default
            };

            mobiscroll.calendar('#demo-multi-day', {
                display: 'inline', // Specify display mode like: display: 'bottom' or omit setting to use default
                select: 'multiple'               // More info about select: https://docs.mobiscroll.com/4-7-3/javascript/calendar#opt-select
            });

            mobiscroll.calendar('#demo-max-days', {
                display: 'inline', // Specify display mode like: display: 'bottom' or omit setting to use default
                select: 5, // More info about select: https://docs.mobiscroll.com/4-7-3/javascript/calendar#opt-select
                headerText: 'Pick up to 5 days'  // More info about headerText: https://docs.mobiscroll.com/4-7-3/javascript/calendar#opt-headerText
            });

            mobiscroll.calendar('#demo-counter', {
                display: 'inline', // Specify display mode like: display: 'bottom' or omit setting to use default
                select: 'multiple', // More info about select: https://docs.mobiscroll.com/4-7-3/javascript/calendar#opt-select
                counter: true                    // More info about counter: https://docs.mobiscroll.com/4-7-3/javascript/calendar#opt-counter
            });
        </script>
    </body>
</html>
