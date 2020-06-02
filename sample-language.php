<?php
//session_start();
require_once 'api/include/common.php';
$obj = new Common();
$languages = $obj->selectAll('*', 'language', 'status = 1');
?>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section id="featured-1">
                <div id="mySignin" tabindex="-1" aria-labelledby="mySigninModalLabel" aria-hidden="true">
                    <div class="modal styled">
                        <div class="modal-header login-section">
                            <a href="sample-intro"><i class="font-icon-arrow-simple-left"></i></a>
                            <h4 id="mySigninModalLabel" class="text-center" style='font-weight: 600'>Select Your Choice</h4>
                            <a class="home_link" href="index">
                                <i class="icon-home"></i>
                            </a>
                        </div>
                        <div class="modal-body">

                            <?php foreach ($languages as $val) { ?>
                                <div class="language_section">
                                    <h6 class="sub-title"><?php echo $val['name']; ?></h6>
                                    <ul>
                                        <?php if($val['name']== 'Tamil') { ?>
                                        <li>
                                            <i class="icon-double-angle-right"></i>
                                            <a href="qorder-years-freesample?lan=<?php echo $val['name']; ?>"><i class="icon-calendar"></i> ஆண்டு வரிசை</a>                             
                                        </li> 
                                        <li>
                                            <i class="icon-double-angle-right"></i>
                                            <a href="subject_freesample?lan=<?php echo $val['name']; ?>"><i class="icon-book"></i> பாடத்திட்ட வரிசை</a>
                                        </li>
                                        <?php } else { ?>
                                        <li>
                                            <i class="icon-double-angle-right"></i>
                                            <a href="qorder-years-freesample?lan=<?php echo $val['name']; ?>"><i class="icon-calendar"></i> Year Wise</a>                             
                                        </li> 
                                        <li>
                                            <i class="icon-double-angle-right"></i>
                                            <a href="subject_freesample?lan=<?php echo $val['name']; ?>"><i class="icon-book"></i> Subject Wise</a>
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
        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>
    </body>

</html>