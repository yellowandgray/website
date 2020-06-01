<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section class="contact-section-examhorse">
                <div class="container">
                    <div class="row">
                        <div class="span6">
                            <div class="contact-form">
                                <h3>Contact Us</h3>
                                <span>Get in touch</span>
                                <br/>
                                <form>
                                    <div class="input-group">
                                        <input type="text" id="name" class="" Placeholder="Name" />
                                    </div>
                                    <div class="input-group">
                                        <input type="email" id="email" class="" Placeholder="Email" />
                                    </div>
                                    <div class="input-group">
                                        <input type="text" id="subject" class="" Placeholder="Subject" />
                                    </div>
                                    <div class="input-group">
                                        <textarea type="text" id="description" rows="5" class="" Placeholder="Message" ></textarea>
                                    </div>
                                    <button type="submit" class="">Send</button>
                                </form>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="contact-content">
                                <span>SAY HELLO</span>
                                <h3>Get in touch, send us an e-mail or call us</h3>
                                <p>Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum.</p>
                                <div class="call-as-now">
                                    <h5>Call us now</h5>
                                    <a href="#">98400 12345</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php include'footer.php'; ?>
        </div>
        <?php include 'script.php'; ?>
    </body>

</html>
