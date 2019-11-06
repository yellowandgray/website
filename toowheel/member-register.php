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
        <script src="https://www.paypal.com/sdk/js?client-id=ARkbHw__nsXW1AJ3lAhXdKsIKUHMLOowBnKaEvdQ2vrepjFyBgiplpKkuvleAR9P9uhB2_djrTJ2iFJj&currency=MYR"></script>
        <?php include "menu.php"; ?>
        <div class="padding-top-108"></div>
        <div class="member-register-section">
            <div class="container">
                <div class="col-md-12 hidden" id="smartwizard_container">
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Step 1<br /><small>Enter Your Information</small></a></li>
                            <li><a href="#step-2">Step 2<br /><small>Choose Your Club</small></a></li>
                            <li><a href="#step-3">Step 3<br /><small>Payment Method</small></a></li>
                            <li><a href="#step-4">Step 4<br /><small>All Information Finish</small></a></li>
                        </ul>
                        <div class="registation-step">
                            <div id="step-1" class="">
                                <h2>Member Registration</h2>
                                <h4>Basic Information</h4>
                                <form id="basic_information">
                                    <div class="form-row">
                                        <div class="col-xl-4 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                            <label for="type">Type</label>
                                                                                            <span class="red-i">*</span>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-motorcycle" aria-hidden="true"></i><span class="red-i">*</span></span>
                                                </div>
                                                <select class="form-control" name="type" id="type" onchange="loadClubs(this.value);">
                                                    <option value="0">Type</option>
                                                    <option value="four_wheel">4 Wheel</option>
                                                    <option value="two_wheel">2 Wheel</option>
                                                </select>
                                            </div>
                                            <div id="type_error"></div>
                                        </div>
                                        <div class="col-xl-4 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                            <label for="first_name"></label>
                                                                                            <span class="red-i">*</span>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i><span class="red-i">*</span></span>
                                                </div>
                                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required-i onchange="removeValidation('first_name');" />
                                            </div>
                                            <div id="first_name_error"></div>
                                        </div>
                                        <div class="col-xl-4 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                            <label for="last_name">Last Name</label>
                                                                                            <span class="red-i">*</span>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i><span class="red-i">*</span></span>
                                                </div>
                                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required-i onchange="removeValidation('last_name');" />
                                            </div>
                                            <div id="last_name_error"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-4 col-sm-12 margin-b-20">
                                            <div class="form-group">
                                                <div id="upload_container">
                                                    <label class="font-size-12" for="upload-profile"><i class="fa fa-picture-o" aria-hidden="true"></i> Upload Your Profile Picture</label>
                                                    <input type="file" class="form-control-file" id="profile_image" onchange="attachFile('profile_image');" />
                                                </div>
                                                <div class="image-preview hidden" id="preview_container">
                                                    <button type="button" onclick="closeProfilePic();" class="close-button-profile-img"><i class="fa fa-close"></i></button>
                                                    <img src="" alt="image" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                            <label for="gender">Gender</label>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                </div>
                                                <select class="form-control" id="gender" name="gender">                                            
                                                    <option value="0">Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                            <label for="age">Age</label>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                </div>
                                                <select class="form-control" id="age" name="age">
                                                    <option value="0">age</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18" selected>18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>
                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>
                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                    <option value="60">60</option>
                                                    <option value="61">61</option>
                                                    <option value="62">62</option>
                                                    <option value="63">63</option>
                                                    <option value="64">64</option>
                                                    <option value="65">65</option>
                                                    <option value="66">66</option>
                                                    <option value="67">67</option>
                                                    <option value="68">68</option>
                                                    <option value="69">69</option>
                                                    <option value="70">70</option>
                                                    <option value="71">71</option>
                                                    <option value="72">72</option>
                                                    <option value="73">73</option>
                                                    <option value="74">74</option>
                                                    <option value="75">75</option>
                                                    <option value="76">76</option>
                                                    <option value="77">77</option>
                                                    <option value="78">78</option>
                                                    <option value="79">79</option>
                                                    <option value="80">80</option>
                                                    <option value="81">81</option>
                                                    <option value="82">82</option>
                                                    <option value="83">83</option>
                                                    <option value="84">84</option>
                                                    <option value="85">85</option>
                                                    <option value="86">86</option>
                                                    <option value="87">87</option>
                                                    <option value="88">88</option>
                                                    <option value="89">89</option>
                                                    <option value="90">90</option>
                                                    <option value="91">91</option>
                                                    <option value="92">92</option>
                                                    <option value="93">93</option>
                                                    <option value="94">94</option>
                                                    <option value="95">95</option>
                                                    <option value="96">96</option>
                                                    <option value="97">97</option>
                                                    <option value="98">98</option>
                                                    <option value="99">99</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-6 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--<label for="age">Marital Status</label>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-users" aria-hidden="true"></i></span>
                                                </div>
                                                <select class="form-control" id="marital_status" name="marital_status">
                                                    <option value="0">Marital Status</option>
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                                <label for="ic_passport">IC Number / Passport Number</label> 
                                                                                                <span class="red-i">*</span>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-id-card-o" aria-hidden="true"></i><span class="red-i">*</span></span>
                                                </div>
                                                <input type="text" class="form-control" name="ic_passport" id="ic_passport" placeholder="IC Number / Passport Number" required-i onchange="removeValidation('ic_passport');" />
                                            </div>
                                            <div id="ic_passport_error"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-4 col-sm-12 margin-b-20">
                                            <label class="font-size-12" for="dob_date">Date of Birth</label> 
                                            <span class="red-i">*</span>
                                            <div class="input-group">
                                                <select class="form-control" id="dob_date" name="dob_date" required-i onchange="removeValidation('dob_date');">
                                                    <option value="">Day</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>
                                            </div>
                                            <div id="dob_date_error"></div>
                                        </div>
                                        <div class="col-xl-4 col-sm-12 margin-b-20">
                                            <label class="d-none-600" for="dob_month">&nbsp;</label>
                                            <select class="form-control" id="dob_month" name="dob_month" required-i>
                                                <option value="0">Month</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                            <div id="dob_month_error"></div>
                                        </div>
                                        <div class="col-xl-4 col-sm-12 margin-b-20">
                                            <label class="d-none-600" for="dob_year">&nbsp;</label>
                                            <select class="form-control" id="dob_year" name="dob_year" required-i>
                                                <option value="0">Year</option>
                                                <option value="1947">1947</option>
                                                <option value="1948">1948</option>
                                                <option value="1949">1949</option>
                                                <option value="1950">1950</option>
                                                <option value="1951">1951</option>
                                                <option value="1952">1952</option>
                                                <option value="1953">1953</option>
                                                <option value="1954">1954</option>
                                                <option value="1955">1955</option>
                                                <option value="1956">1956</option>
                                                <option value="1957">1957</option>
                                                <option value="1958">1958</option>
                                                <option value="1959">1959</option>
                                                <option value="1960">1960</option>
                                                <option value="1961">1961</option>
                                                <option value="1962">1962</option>
                                                <option value="1963">1963</option>
                                                <option value="1964">1964</option>
                                                <option value="1965">1965</option>
                                                <option value="1966">1966</option>
                                                <option value="1967">1967</option>
                                                <option value="1968">1968</option>
                                                <option value="1969">1969</option>
                                                <option value="1970">1970</option>
                                                <option value="1971">1971</option>
                                                <option value="1972">1972</option>
                                                <option value="1973">1973</option>
                                                <option value="1974">1974</option>
                                                <option value="1975">1975</option>
                                                <option value="1976">1976</option>
                                                <option value="1977">1977</option>
                                                <option value="1978">1978</option>
                                                <option value="1979">1979</option>
                                                <option value="1980">1980</option>
                                                <option value="1981">1981</option>
                                                <option value="1982">1982</option>
                                                <option value="1983">1983</option>
                                                <option value="1984">1984</option>
                                                <option value="1985">1985</option>
                                                <option value="1986">1986</option>
                                                <option value="1987">1987</option>
                                                <option value="1988">1988</option>
                                                <option value="1989">1989</option>
                                                <option value="1990">1990</option>
                                                <option value="1991">1991</option>
                                                <option value="1992">1992</option>
                                                <option value="1993">1993</option>
                                                <option value="1994">1994</option>
                                                <option value="1995">1995</option>
                                                <option value="1996">1996</option>
                                                <option value="1997">1997</option>
                                                <option value="1998">1998</option>
                                                <option value="1999">1999</option>
                                                <option value="2000">2000</option>
                                                <option value="2001">2001</option>
                                                <option value="2002">2002</option>
                                                <option value="2003">2003</option>
                                            </select>
                                            <div id="dob_year_error"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-6 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                                <label for="contact_number">Contact Number</label> 
                                                                                                <span class="red-i">*</span>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i><span class="red-i">*</span></span>
                                                </div>
                                                <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Contact Number" required-i onchange="removeValidation('contact_number');" />
                                            </div>
                                            <div id="contact_number_error"></div>
                                        </div>
                                        <div class="col-xl-6 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                                <label for="email_id">Email Address</label> -->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                                </div>

                                                <input type="email" class="form-control" name="email_id" id="email_id" placeholder="Email Address" required-i />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-12 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                        <label for="address">Address</label> 
                                                                                        <span class="red-i">*</span>-->
                                                <div class="input-group-prepend" style="display: flex;">
                                                    <span class="input-group-text"><i class="fa fa-map-marker" aria-hidden="true"></i><span class="red-i">*</span></span>
                                                </div>
                                                <textarea class="form-control" placeholder="Address" name="address" id="address" type="text" rows="3" required-i onchange="removeValidation('address');"></textarea>
                                            </div>
                                            <div id="address_error"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-4 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                            <label for="country">Country</label> 
                                                                                            <span class="red-i">*</span>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                                        <span class="red-i">*</span>
                                                    </span>
                                                </div>
                                                <input placeholder="Country" name="country" id="country" type="text" class="form-control" required-i onchange="removeValidation('country');" value="Malaysia" readonly />
                                            </div>
                                            <div id="country_error"></div>
                                        </div>
                                        <div class="col-xl-4 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                            <label for="state_id">State</label> 
                                                                                            <span class="red-i">*</span>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-check" aria-hidden="true"></i><span class="red-i">*</span></span>
                                                </div>
                                                <select class="form-control" id="state_id" name="state_id" required-i onchange="removeValidation('state_id');">
                                                    <option value="">State</option>
                                                    <?php foreach ($states as $row) { ?>
                                                        <option value="<?php echo $row['state_id']; ?>"><?php echo $row['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div id="state_id_error"></div>
                                        </div>
                                        <div class="col-xl-4 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                            <label for="zip_code">Zip Code</label>
                                                                                            <span class="red-i">*</span>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-list-ol" aria-hidden="true"></i><span class="red-i">*</span></span>
                                                </div>
                                                <input placeholder="Zip Code" name="zip_code" id="zip_code" type="text" required-i class="form-control" onchange="removeValidation('zip_code');">
                                            </div>
                                            <div id="zip_code_error"></div>
                                        </div>
                                    </div>
                                    <br/>
                                    <h4>Referral</h4>
                                    <div class="form-row">
                                        <div class="col-xl-6 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                            <label for="referral_member_id">Member ID</label>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
                                                </div>
                                                <input placeholder="Member ID" name="referral_member_id" id="referral_member_id" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                            <label for="referral_club_id">Club ID</label>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
                                                </div>
                                                <input placeholder="Club ID" id="referral_club_id" name="referral_club_id" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <h4>Login Information</h4>
                                    <div class="form-row">
                                        <div class="col-xl-4 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                            <label for="email"> Username</label> 
                                                                                            <span class="red-i">*</span>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="User Name" required-i onchange="removeValidation('email');" />
                                            </div>
                                            <div id="email_error"></div>
                                        </div>
                                        <div class="col-xl-4 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                            <label for="password">Password</label> 
                                                                                            <span class="red-i">*</span>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required-i onchange="removeValidation('password');" onKeyUp="checkPasswordStrength();" />
                                                <span class="input-group-addon eye-icon" onclick="showTextPassword()"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                            </div>
                                            <div id="password_error"></div>
                                        </div>
                                        <div class="col-xl-4 col-sm-12 margin-b-20">
                                            <div class="input-group">
                                                <!--                                            <label for="cnfpassword">Confirm Password</label> 
                                                                                            <span class="red-i">*</span>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="password" class="form-control" name="cnfpassword" id="cnfpassword" placeholder="Confirm Password" required-i onchange="removeValidation('cnfpassword');" />
                                                <span class="input-group-addon eye-icon" onclick="showTextPassword1()"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                            </div>
                                            <div id="cnfpassword_error"></div>
                                        </div>
                                    </div>
                                    <span class="terms-text"><input type="checkbox" id="terms_agree" value="1" name="agree" onchange="removeValidation('terms_agree');" /> By clicking Next, you agree to our <a href="terms?type=<?php echo $type; ?>" target="_blank">Terms and Conditions.</a></span>
                                    <div id="terms_agree_error"></div>
                                </form>
                            </div>
                            <div id="step-2" class="">
                                <h2>Choose A Club</h2>
                                <div class="row margin-rl-25">
                                    <div class="search-section">
                                        <input type="text" name="search" placeholder="Search Club Name" id="filter_name" />
                                        <a href="#" onclick="filterClub();" class="search-btn">Search</a>
                                    </div>
                                    <div class="search-sort-order">
                                        <label>Sort:</label>
                                        <select onchange="filterClub();" id="filter_order">
                                            <option value="asc">A-Z</option>
                                            <option value="desc">Z-A</option>
                                        </select>
                                    </div>
                                    <div class="search-sort-order">
                                        <label>Category:</label>
                                        <select onchange="filterClub();" id="filter_category">
                                            <option value="">All</option>
                                        </select>
                                    </div>
                                    <div class="search-sort-order">
                                        <label>Location by States:</label>
                                        <select onchange="filterClub();" id="filter_state">
                                            <option value="">All</option>
                                            <?php foreach ($states as $row) { ?>
                                                <option value="<?php echo $row['state_id']; ?>"><?php echo $row['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" id="club_list"></div>
                                <p class="member-t margin-top-30"><a href="#" onclick="skipClubSelection();">Skip</a></p>
                            </div>
                            <div id="step-3" class="">
                                <h2>Make Payment</h2>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
                                        <div class="member-register-btn"><a id="paywith_paypal"></a></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="member-register-btn cdm-found"><a href="#">CDM / Fund Transfer</a></div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-12">
                                        <div class="pop-1 member-register-popup"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                            <div class="margin-top-30">
                                                <h4>UPLOAD DEPOSIT SLIP OR FUND TRANSFER RECEIPT</h4>
                                                <h5>TOOWHEEL BANK ACCOUNT DETAILS</h5>
                                                <table class="bank-details">
                                                    <tr>
                                                        <td>Bank</td>
                                                        <th>CIMB</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Bank Account Name</td>
                                                        <th>Toowheel Maxcom Synergy</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Bank Account Number</td>
                                                        <th>8603753851</th>
                                                    </tr>
                                                </table>
                                                <br/>
                                                <br/>
                                                <form>
                                                    <div id="upload_receipt_container">
                                                        <label>Upload Your Receipt</label>
                                                        <input type="file" name="payment_receipt2" id="payment_receipt2" onchange="showSlipPreview(this);" />
                                                    </div>
                                                    <div class="image-preview hidden" id="preview_receipt_container" style="width: 200px; height: 200px; margin: 0 auto;">
                                                        <button type="button" onclick="closeReceiptPic();" class="close-button-profile-img"><i style="position: static; font-size: 14px; color: #000000;" class="fa fa-close"></i></button>
                                                        <img src="" alt="image" />
                                                    </div>
                                                    <br/>
                                                    <br/>
                                                    <center>
                                                        <a href="#" type="button" onclick="attachFile('payment_receipt2');">Submit</a>
                                                    </center>
                                                    <br/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-4" class="text-center">
                                <h2 id="registration_status"></h2>
                                <div class="text-center">
                                    <div id="success_member_section"></div>
                                    <br/>
                                </div>
                                <br/>
                                <div class="">
                                    <span class="member-t">
                                        <a href="member-benefits?type=<?php echo $type; ?>">My Benefits</a>
                                    </span>
                                    <span class="member-t">
                                        <a href="index">Back to Homepage</a>
                                    </span>
                                </div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="loader loader-default"></div>
        <?php include "footer.php"; ?>
        <script src="js/bootbox.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script>
                                                            loadClubs('four_wheel');
                                                            $(".cdm-found").click(
                                                                    function () {
                                                                        $(".pop-1").fadeIn("slow");
                                                                    }
                                                            );
                                                            $(".pop-1 i.fa-times-circle").click(
                                                                    function () {
                                                                        $(".pop-1").fadeOut("fast");
                                                                        $("#payment_receipt2").val('');
                                                                        $("#preview_receipt_container").addClass('hidden');
                                                                        $("#upload_receipt_container").removeClass('hidden');
                                                                    }
                                                            );
                                                            paypal.Buttons({
                                                                createOrder: function (data, actions) {
                                                                    // Set up the transaction
                                                                    return actions.order.create({
                                                                        purchase_units: [{
                                                                                amount: {
                                                                                    value: "80.00"
                                                                                }
                                                                            }]
                                                                    });
                                                                },
                                                                onApprove: function (data, actions) {
                                                                    return actions.order.capture().then(function (details) {
                                                                        paypal_response = JSON.stringify(details);
                                                                        paypal_trans_id = data.orderID;
                                                                        payment_type = 'paypal';
                                                                        inserted = true;
                                                                        activated = 1;
                                                                        registerMember();
                                                                    });
                                                                }
                                                            }).render("#paywith_paypal");
        </script>
    </body>
</html>
