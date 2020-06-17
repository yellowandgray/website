<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
$languages = $obj->selectAll('*', 'language', 'status = 1');
?>
<html lang="en">
    <?php include 'head_landing.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu_landing.php'; ?>
            <section id="featured-1">
                <div class="container">
                    <div class="select-language-section">
                        <div class="language-header">
                            <a href="free-sample-introduction"><i class="fa fa-angle-left"></i></a>
                            <h4 class="text-center" style='font-weight: 600'>Select Your Choice</h4>
                        </div>
                        <div class="language-content">
                            <?php foreach ($languages as $val) { ?>
                                <div class="language_section">
                                    <h6 class="sub-title">
                                        <?php if ($val['name'] == 'Tamil') { ?>
                                            தமிழ்                                         
                                        <?php } else { ?>
                                            <?php echo $val['name']; ?>
                                        <?php } ?>
                                    </h6>
                                    <ul>
                                        <?php if ($val['name'] == 'Tamil') { ?>
                                            <li>
                                                <i class="fa fa-angle-double-right"></i>
                                                <a href="free-select-year?lan=<?php echo $val['name']; ?>"><i class="fa fa-calendar"></i>ஆண்டு வரிசை</a>                             
                                            </li> 
                                            <li>
                                                <i class="fa fa-angle-double-right"></i>
                                                <a href="free-select-subject?lan=<?php echo $val['name']; ?>"><i class="fa fa-book"></i>பாடத்திட்ட வரிசை</a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <i class="fa fa-angle-double-right"></i>
                                                <a href="free-select-year?lan=<?php echo $val['name']; ?>"><i class="fa fa-calendar"></i> Year Wise</a>                             
                                            </li> 
                                            <li>
                                                <i class="fa fa-angle-double-right"></i>
                                                <a href="free-select-subject?lan=<?php echo $val['name']; ?>"><i class="fa fa-book"></i> Subject Wise</a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'footer_landing.php'; ?>
        <?php include 'landing_script.php'; ?>
    </body>

</html>