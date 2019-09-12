<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <div class="club-register-section">
            <div class="container">
                <div class="row">
                    <form id="club-register" action="" method="post">
                        <h3>Register Your Club</h3>
                        <fieldset>
                            <input placeholder="Your club name" type="text" tabindex="1" required autofocus>
                        </fieldset>
                        <fieldset>
                            <input placeholder="State" type="text" tabindex="2" required>
                        </fieldset>
                        <fieldset>
                            <input placeholder="City" type="text" tabindex="3" required>
                        </fieldset>
                        <fieldset>
                            <input placeholder="Zip" type="text" tabindex="4" required>
                        </fieldset>
                        <fieldset>
                            <textarea placeholder="Address" type="text" tabindex="5" required></textarea>
                        </fieldset>
                        <fieldset>
                            <input placeholder="Club Leader name (Full Name)" type="text" tabindex="6" required>
                        </fieldset>
                        <fieldset>
                            <input placeholder="No. of Members" type="text" tabindex="7" required>
                        </fieldset>
                        <fieldset>
                            <input placeholder="Email Address" type="email" tabindex="8" required>
                        </fieldset>
                        <fieldset>
                            <input placeholder="Contact No." type="text" tabindex="9" required>
                        </fieldset>
                        <fieldset>
                            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>