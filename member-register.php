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
                            <textarea type="text" rows="4" name="address" class="form-control" id="address" placeholder="Address"></textarea>
                        </div>
                        <div class="form-group">
                            <select>
                                <option value="SELECT STATE">Select State</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Orissa">Orissa</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu" selected>Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="city" class="form-control" id="city" placeholder="City">
                        </div>
                        <h6>Login Information:</h6>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="c_password" class="form-control" id="password" placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-forget">Submit</button>
                    </form>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>