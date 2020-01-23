<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
$language = $obj->selectRow( '*', 'language', 'language_id > 0' );
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
                        <a href="select_language"><i class="font-icon-arrow-simple-left"></i></a>
                        <h4 id="mySigninModalLabel" class="text-center"><?php echo $language['name'];
?> - Select <strong>Types</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="language_section">
                            <ul>
                                <li>
                                    <i class="icon-check"></i>
                                    <a href="order-years">Question Order</a>
                                </li>
                                <li>
                                    <i class="icon-check"></i>
                                    <a href="subject">Subject Order</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'script.php'; ?>
</body>

</html>