<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <div class="member-register-section">
            <div class="container">
                <div class="col-md-12">
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Step 1<br /><small>Enter Your Information</small></a></li>
                            <li><a href="#step-2">Step 2<br /><small>Choose Your Club</small></a></li>
                            <li><a href="#step-3">Step 3<br /><small>Payment Get way</small></a></li>
                            <li><a href="#step-4">Step 4<br /><small>All Information Finish</small></a></li>
                        </ul>

                        <div class="registation-step">
                            <div id="step-1" class="">
                                <h2>Member Registration</h2>
                                <h4>Basic Information</h4>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category">
                                        <option value="0">Select Category</option>
                                        <option value="4-Wheel">4 Wheel</option>
                                        <option value="4-Wheel">2 Wheel</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" id="firstname" placeholder="First Name" required>
<!--                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                </div>
                                <div class="form-group">
                                    <label for="upload-profile">Upload Your Profile Picture</label>
                                    <input type="file" class="form-control-file" id="upload-profile">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" id="gender">
                                        <option value="0">gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <select class="form-control" id="age">
                                        <option value="0">Age</option>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                        <option value='5'>5</option>
                                        <option value='6'>6</option>
                                        <option value='7'>7</option>
                                        <option value='8'>8</option>
                                        <option value='9'>9</option>
                                        <option value='10'>10</option>
                                        <option value='11'>11</option>
                                        <option value='12'>12</option>
                                        <option value='13'>13</option>
                                        <option value='14'>14</option>
                                        <option value='15'>15</option>
                                        <option value='16'>16</option>
                                        <option value='17'>17</option>
                                        <option value='18'>18</option>
                                        <option value='19'>19</option>
                                        <option value='20'>20</option>
                                        <option value='21'>21</option>
                                        <option value='22'>22</option>
                                        <option value='23'>23</option>
                                        <option value='24'>24</option>
                                        <option value='25'>25</option>
                                        <option value='26'>26</option>
                                        <option value='27'>27</option>
                                        <option value='28'>28</option>
                                        <option value='29'>29</option>
                                        <option value='30'>30</option>
                                        <option value='31'>31</option>
                                        <option value='32'>32</option>
                                        <option value='33'>33</option>
                                        <option value='34'>34</option>
                                        <option value='35'>35</option>
                                        <option value='36'>36</option>
                                        <option value='37'>37</option>
                                        <option value='38'>38</option>
                                        <option value='39'>39</option>
                                        <option value='40'>40</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ic-no-passport-no">IC Number / Passport Number</label>
                                    <input type="text" class="form-control" id="state" placeholder="IC Number / Passport Number" required>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="date">Date</label>
                                        <select class="form-control" id="date">
                                            <option value="0">date</option>
                                            <option value='1'>1</option>
                                            <option value='2'>2</option>
                                            <option value='3'>3</option>
                                            <option value='4'>4</option>
                                            <option value='5'>5</option>
                                            <option value='6'>6</option>
                                            <option value='7'>7</option>
                                            <option value='8'>8</option>
                                            <option value='9'>9</option>
                                            <option value='10'>10</option>
                                            <option value='11'>11</option>
                                            <option value='12'>12</option>
                                            <option value='13'>13</option>
                                            <option value='14'>14</option>
                                            <option value='15'>15</option>
                                            <option value='16'>16</option>
                                            <option value='17'>17</option>
                                            <option value='18'>18</option>
                                            <option value='19'>19</option>
                                            <option value='20'>20</option>
                                            <option value='21'>21</option>
                                            <option value='22'>22</option>
                                            <option value='23'>23</option>
                                            <option value='24'>24</option>
                                            <option value='25'>25</option>
                                            <option value='26'>26</option>
                                            <option value='27'>27</option>
                                            <option value='28'>28</option>
                                            <option value='29'>29</option>
                                            <option value='30'>30</option>
                                            <option value='31'>31</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="month">Month</label>
                                        <select class="form-control" id='monthd'>
                                            <option value='0'>Month</option>
                                            <option value='1'>1</option>
                                            <option value='2'>2</option>
                                            <option value='3'>3</option>
                                            <option value='4'>4</option>
                                            <option value='5'>5</option>
                                            <option value='6'>6</option>
                                            <option value='7'>7</option>
                                            <option value='8'>8</option>
                                            <option value='9'>9</option>
                                            <option value='10'>10</option>
                                            <option value='11'>11</option>
                                            <option value='12'>12</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="year">Year</label>
                                        <select class="form-control" id='year'>
                                            <option value='0'>Year</option>
                                            <option value='1947'>1947</option>
                                            <option value='1948'>1948</option>
                                            <option value='1949'>1949</option>
                                            <option value='1950'>1950</option>
                                            <option value='1951'>1951</option>
                                            <option value='1952'>1952</option>
                                            <option value='1953'>1953</option>
                                            <option value='1954'>1954</option>
                                            <option value='1955'>1955</option>
                                            <option value='1956'>1956</option>
                                            <option value='1957'>1957</option>
                                            <option value='1958'>1958</option>
                                            <option value='1959'>1959</option>
                                            <option value='1960'>1960</option>
                                            <option value='1961'>1961</option>
                                            <option value='1962'>1962</option>
                                            <option value='1963'>1963</option>
                                            <option value='1964'>1964</option>
                                            <option value='1965'>1965</option>
                                            <option value='1966'>1966</option>
                                            <option value='1967'>1967</option>
                                            <option value='1968'>1968</option>
                                            <option value='1969'>1969</option>
                                            <option value='1970'>1970</option>
                                            <option value='1971'>1971</option>
                                            <option value='1972'>1972</option>
                                            <option value='1973'>1973</option>
                                            <option value='1974'>1974</option>
                                            <option value='1975'>1975</option>
                                            <option value='1976'>1976</option>
                                            <option value='1977'>1977</option>
                                            <option value='1978'>1978</option>
                                            <option value='1979'>1979</option>
                                            <option value='1980'>1980</option>
                                            <option value='1981'>1981</option>
                                            <option value='1982'>1982</option>
                                            <option value='1983'>1983</option>
                                            <option value='1984'>1984</option>
                                            <option value='1985'>1985</option>
                                            <option value='1986'>1986</option>
                                            <option value='1987'>1987</option>
                                            <option value='1988'>1988</option>
                                            <option value='1989'>1989</option>
                                            <option value='1990'>1990</option>
                                            <option value='1991'>1991</option>
                                            <option value='1992'>1992</option>
                                            <option value='1993'>1993</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact Number</label>
                                    <input type="text" class="form-control" id="contact" placeholder="Contact Number" required>
                                </div>
                                <div class="form-group">
                                    <label for="driver-license-category">Driver License Category</label>
                                    <select class="form-control" id='driver-license-category'>
                                        <option value='class3'>Class 3</option>
                                        <option value='class3a'>Class 3A</option>
                                        <option value='class3c'>Class 3C</option>
                                        <option value='class3ca'>Class 3CA</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" placeholder="Address" id="address" type="text" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input placeholder="Country" id="country" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" placeholder="State">
                                </div>
                                <br/>
                                <h4>Referral</h4>
                                <div class="form-group">
                                    <label for="member-id">Member ID</label>
                                    <input placeholder="Member ID" id="member-id" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="club-id">Club ID</label>
                                    <input placeholder="Club ID" id="club-id" type="text" class="form-control" required>
                                </div>
                                <br/>
                                <h4>Coverage</h4>
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input placeholder="Full Name" id="fullname" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Contact Number</label>
                                    <input type="text" class="form-control" id="mobile" placeholder="Contact Number" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" placeholder="Address" id="address" type="text" rows="3" required></textarea>
                                </div>
                                <br/>
                                <h4>Login Information</h4>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email Address" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="cnfpassword">Conform Password</label>
                                    <input type="password" class="form-control" id="cnfpassword" placeholder="Conform password" required>
                                </div>
                            </div>
                            <div id="step-2" class="">
                                <h2>Choose A Club</h2>
                                <div class="row margin-rl-25">
                                    <div class="search-section">
                                        <input type="text" name="search" placeholder="Search Club Name" />
                                        <a href="#" class="search-btn">Search</a>
                                    </div>
                                    <div class="search-sort-order">
                                        <label>Sort:</label>
                                        <select>
                                            <option value="A-Z">A-Z</option>
                                            <option value="Z-A">Z-A</option>
                                        </select>
                                    </div>
                                    <div class="search-sort-order">
                                        <label>Category:</label>
                                        <select>
                                            <option value="All">All</option>
                                            <option value="125cc">125cc</option>
                                            <option value="250cc">250cc</option>
                                            <option value="500cc">500cc</option>
                                        </select>
                                    </div>
                                    <div class="search-sort-order">
                                        <label>Location by States:</label>
                                        <select>
                                            <option value="All">All</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <span>#1</span>
                                            <img src="img/find-club/dummy-logo.png" alt="" />
                                            <h3>Frendly Bikers</h3>
                                            <p>Kuala Lumpur</p>
                                            <div class="club-btn">
                                                <div class="eff-9"></div>
                                                <a href="club-page.php">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <span>#1</span>
                                            <img src="img/find-club/dummy-logo.png" alt="" />
                                            <h3>Frendly Bikers</h3>
                                            <p>Kuala Lumpur</p>
                                            <div class="club-btn">
                                                <div class="eff-9"></div>
                                                <a href="club-page.php">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <span>#1</span>
                                            <img src="img/find-club/dummy-logo.png" alt="" />
                                            <h3>Frendly Bikers</h3>
                                            <p>Kuala Lumpur</p>
                                            <div class="club-btn">
                                                <div class="eff-9"></div>
                                                <a href="club-page.php">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <span>#1</span>
                                            <img src="img/find-club/dummy-logo.png" alt="" />
                                            <h3>Frendly Bikers</h3>
                                            <p>Kuala Lumpur</p>
                                            <div class="club-btn">
                                                <div class="eff-9"></div>
                                                <a href="club-page.php">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <span>#1</span>
                                            <img src="img/find-club/dummy-logo.png" alt="" />
                                            <h3>Frendly Bikers</h3>
                                            <p>Kuala Lumpur</p>
                                            <div class="club-btn">
                                                <div class="eff-9"></div>
                                                <a href="club-page.php">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <span>#1</span>
                                            <img src="img/find-club/dummy-logo.png" alt="" />
                                            <h3>Frendly Bikers</h3>
                                            <p>Kuala Lumpur</p>
                                            <div class="club-btn">
                                                <div class="eff-9"></div>
                                                <a href="club-page.php">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <span>#1</span>
                                            <img src="img/find-club/dummy-logo.png" alt="" />
                                            <h3>Frendly Bikers</h3>
                                            <p>Kuala Lumpur</p>
                                            <div class="club-btn">
                                                <div class="eff-9"></div>
                                                <a href="club-page.php">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <span>#1</span>
                                            <img src="img/find-club/dummy-logo.png" alt="" />
                                            <h3>Frendly Bikers</h3>
                                            <p>Kuala Lumpur</p>
                                            <div class="club-btn">
                                                <div class="eff-9"></div>
                                                <a href="club-page.php">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <span>#1</span>
                                            <img src="img/find-club/dummy-logo.png" alt="" />
                                            <h3>Frendly Bikers</h3>
                                            <p>Kuala Lumpur</p>
                                            <div class="club-btn">
                                                <div class="eff-9"></div>
                                                <a href="club-page.php">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <span>#1</span>
                                            <img src="img/find-club/dummy-logo.png" alt="" />
                                            <h3>Frendly Bikers</h3>
                                            <p>Kuala Lumpur</p>
                                            <div class="club-btn">
                                                <div class="eff-9"></div>
                                                <a href="club-page.php">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <span>#1</span>
                                            <img src="img/find-club/dummy-logo.png" alt="" />
                                            <h3>Frendly Bikers</h3>
                                            <p>Kuala Lumpur</p>
                                            <div class="club-btn">
                                                <div class="eff-9"></div>
                                                <a href="club-page.php">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="club-box">
                                            <span>#1</span>
                                            <img src="img/find-club/dummy-logo.png" alt="" />
                                            <h3>Frendly Bikers</h3>
                                            <p>Kuala Lumpur</p>
                                            <div class="club-btn">
                                                <div class="eff-9"></div>
                                                <a href="club-page.php">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="member-t"><a href="#">Skip</a></p>
                            </div>
                            <div id="step-3" class="">
                                <h2>Make Payment</h2>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="member-register-btn"><a href="#">PayPal</a></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="member-register-btn"><a href="#">CMD Found Transfer</a></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="member-register-btn"><a href="#">Upload Your Receipt</a></div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-4" class="text-center">
                                <h2>Registration Successful</h2>
                                <!--                                <div class="card-header">My Details</div>
                                                                    <div class="card-block p-0">
                                                                        <table class="table">
                                                                            <tbody>
                                                                                <tr> <th>Name:</th> <td>Tim Smith</td> </tr>
                                                                                <tr> <th>Email:</th> <td>example@example.com</td> </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>-->
                                <div class="text-center">
                                    <h5>Congratulations!</h5>
                                    <p class="text-center" style="margin-bottom: 0">You are now Offical Member of TooWheel.</p>
                                    <strong>Membership ID: (Unique Number)</strong>
                                    <br/>
                                </div>
                                <br/>
                                <div class="">
                                    <span class="member-t">
                                        <a href="member-benefits.php">My Benefits</a>
                                    </span>
                                    <span class="member-t">
                                        <a href="index.php">Back to Homepage</a>
                                    </span>
                                </div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>