<?php
if (!isset($_GET["type"])) {
    header("Location: ../index.php");
}
$type = $_GET["type"];
require_once "api/include/common.php";
$obj = new Common();
$categories = $obj->selectAll('*', 'category', 'category_id > 0 AND type = \'' . $type . '\'');
$states = $obj->selectAll('*', 'state', 'state_id > 0');
?>
<!DOCTYPE html>
<html>
    <?php include "head.php"; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <div class="terms-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Terms and Conditions</h2>
                        <h4>Welcome to Toowheel!</h4>
                        <p>Toowheel builds technologies and services that enable people to connect with each other, build communities and grow businesses. These Terms govern your use of Toowheel, Messenger and the other products, features, apps, services, technologies and software that we offer (the Toowheel Products or Products), except where we expressly state that separate terms (and not these) apply. These Products are provided to you by Toowheel, Inc.</p>
                        <p>We don't charge you to use Toowheel or the other products and services covered by these Terms. Instead, businesses and organisations pay us to show you ads for their products and services. By using our Products, you agree that we can show you ads that we think will be relevant to you and your interests. We use your personal data to help determine which ads to show you.</p>
                        <p>We don't sell your personal data to advertisers, and we don't share information that directly identifies you (such as your name, email address or other contact information) with advertisers unless you give us specific permission. Instead, advertisers can tell us things such as the kind of audience that they want to see their ads, and we show those ads to people who may be interested. We provide advertisers with reports about the performance of their ads that help them understand how people are interacting with their content. See Section 2 below to learn more.</p>
                        <p>Our Data Policy explains how we collect and use your personal data to determine some of the ads that you see and provide all of the other services described below. You can also go to your settings at any time to review the privacy choices you have about how we use your data.</p>
                    </div>
                </div>
            </div>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>
