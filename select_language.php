<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <div id="wrapper">
            <section id="featured-1">

                <div id="mySignin" tabindex="-1" aria-labelledby="mySigninModalLabel" aria-hidden="true">
                    <div class = 'logo'>
                        <a href='index'>
                            <img src = 'img/logo.png' alt = '' class = 'logo' />
                        </a>

                    </div>
                    <div class="modal styled">
                        <div class="modal-header login-section">
                            <a href="index"><i class="font-icon-arrow-simple-left"></i></a>
                            <h4 id="mySigninModalLabel"  class="text-center">Select <strong>Language</strong></h4>
                        </div>
                        <div class="modal-body">
                            <div class="language_section">
                                <ul>
                                    <i class="icon-check"></i> <a href="years"><li> தமிழ்</li></a>
                                    <i class="icon-check"></i> <a href="years"><li> English</li></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Reset Modal -->
            <?php include 'reset_password.php'; ?>
            <!-- end reset modal -->
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>
