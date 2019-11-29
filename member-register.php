<html lang="en">
    <?php
    $page = 'about';
    include 'head.php';
    ?>
    <body class="goto-here">
        <section>
            <?php include 'menu.php'; ?>
        </section>
        <div class="hero-wrap hero-bread" style="background-image: url('images/bg_04.jpg'); background-size: cover;">

            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <h1 class="mb-0 bread">Member Registration</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span><span class="mr-2">-</span> <span>Member Registration</span></p>

                    </div>
                </div>
            </div>
        </div>
        <section class="member-register-section">
            <div class="container">
                <div class="member-register-form">
                    <h4>Member Register</h4>
                    <h6>Member Information:</h6>
                    <form>
                        <div class="form-group">
                            <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email Address">
                        </div>
                        <h6>Login Information:</h6>
                        <div class="form-group">
                            <input type="text" name="user_name" class="form-control" id="user_name" placeholder="User Name">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-forget">Submit</button>
                    </form>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>