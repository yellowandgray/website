<html lang="en">
    <?php
    require_once 'api/include/common.php';
    $page = 'about';
    include 'head.php';
    $obj = new Common();
    $states = $obj->selectAll('*', 'state', 'state_id > 0');
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
                    <form onsubmit="return MemberInsert();">
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
                            <textarea type="text" rows="4" name="address" class="form-control" id="address" placeholder="Address"></textarea>
                        </div>
                        <div class="form-group">
                            <select id="state">
                                <?php foreach ($states as $row) { ?>
                                    <option value="<?php echo $row['state_id']; ?>"><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="city" class="form-control" id="city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <input type="text" name="pincode" class="form-control" id="pincode" placeholder="Pincode">
                        </div>
                        <h6>Login Information:</h6>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-forget">Submit</button>
                    </form>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>