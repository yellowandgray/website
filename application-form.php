value="male"<!doctype html>
<html lang="en">
    <?php
    $page = 'career';
    include 'head.php';
    ?>

    <body>
        <div class="wrapper">
            <!--Header Start-->
            <?php include 'menu.php'; ?>
            <div id="search">
                <
                type="button" class="close">×</button>
                <form class="search-overlay-form">
                    <input type="search" value="" placeholder="type keyword(s) here" />
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <!--Header End-->
            <!--Inner Header Start-->
            <section class="wf100 p100 inner-header" style="background: url(images/sub-banner/banner-06.jpg) no-repeat;">
                <div class="container">
                    <h1>Application Form</h1>
                    <!--                    <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#"> Contact </a></li>
                    
                                        </ul>-->
                </div>
            </section>
            <!--Inner Header End--> 
            <?php include 'admission-content.php'; ?>
            <!--Contact Start-->
            <section class="contact-page wf100 p80">
                <div class="container contact-dropdown-from">
                    <div class="row">
                        <div class="col-md-12 bg-blue text-center">
                            <h4>Application Form</h4>
                        </div>
                        <div class="contact-form cform">
                            <form role="form" class="application-form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="class" placeholder="Class" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="age_group" placeholder="Age Group" required>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Pre KG: 2.5 to 3.5yrs | L.K.G: 3.6 to 4.5yrs | U.K.G: 4.6 to 5.5yrs</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="child's_surname" placeholder="Child's Surname" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="child’s_first_name" placeholder="Child’s First Name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="date_of_birth" placeholder="Date of Birth" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="age" placeholder="Age" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="sex" placeholder="Sex" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="blood_group" placeholder="Blood Group" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="place_of_birth" placeholder="Place of Birth" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="nationality" placeholder="Nationality" required>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="mother_tongue" placeholder="Mother Tongue" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="other_languages_known" placeholder="Other languages known" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="religion" placeholder="Religion" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="caste" placeholder="Caste" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="home_address" placeholder="Home Address" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="home_telephone" placeholder="Home Telephone" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="mobile" placeholder="Mobile" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="email" placeholder=" Email" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="pin_code" placeholder="Pin Code" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="child's_siblings_name(s)" placeholder="Child’s Siblings Name(s)" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="age_1" placeholder="Age" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="siblings_education" placeholder="Siblings Education" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="class_1" placeholder=" Class" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="name_of_school" placeholder="Name of School" required>
                                    </div>
                                </div>
                                <div class="col-md-12 bg-green text-center">
                                    <p>PARENT INFORMATION</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="father's_name" placeholder="Father’s Name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="age_2" placeholder="Age" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="education" placeholder="Education" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="occupation" placeholder="Occupation" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="organisation" placeholder="Organisation" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="work_number" placeholder="Work Number" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="mobile_1" placeholder="Mobile" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="email_1" placeholder=" Email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="mother's_name" placeholder="Mother’s Name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="age_3" placeholder="Age" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="education_1" placeholder="Education" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="occupation_1" placeholder="Occupation" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="organisation_1" placeholder="Organisation" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="work_number_1" placeholder="Work Number" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="mobile_2" placeholder="Mobile" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="email_2" placeholder=" Email" required>
                                    </div>
                                </div>
                                <div class="col-md-12 bg-green text-center">
                                    <p>Emergency Contact INFO(other than parents)</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="contact_name_1" placeholder="Contact Name 1" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="relatiion_to_child" placeholder="Relation to child" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="contact_name_2" placeholder="Contact Name 2" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="relatiion_to_child_1" placeholder="Relation to child" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="phone_number_1" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-md-12 bg-green text-center">
                                    <p>HEALTH INFORMATION</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>If you answer “yes” to any of the questions below, please place additional information at the bottom of this form</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>Does your child have any allergies? Is</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for=radio9>Yes</label>
                                        <input id="radio9" name="radio1" type="radio" value="yes">
                                        <label for="radio10">No</label>
                                        <input id="radio10" name="radio1" type="radio" value="no">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>Does your child have any allergies? IsYour child under any medication?</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for=radio11>Yes</label>
                                        <input id="radio11" name="radio1" type="radio" value="yes">
                                        <label for="radio12">No</label>
                                        <input id="radio12" name="radio1" type="radio" value="no">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>Has your child been diagnosed with any special needs? (If yes enclose authenticated documents)</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for=radio13>Yes</label>
                                        <input id="radio13" name="radio1" type="radio" value="yes">
                                        <label for="radio14">No</label>
                                        <input id="radio14" name="radio1" type="radio" value="no">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>Does your child have any conditions such as asthma?</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for=radio15>Yes</label>
                                        <input id="radio15" name="radio1" type="radio" value="yes">
                                        <label for="radio16">No</label>
                                        <input id="radio16" name="radio1" type="radio" value="no">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="additional_information" placeholder="Additional Information" required>
                                    </div>
                                </div>
                                <div class="col-md-12 bg-green text-center">
                                    <p>GENERAL INFORMATION<p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="question_1" placeholder="What are your child’s favorite snack foods?" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="question_2" placeholder="What are your child’s interests/activity?" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="question_3" placeholder="Has your child gone to any other pre school before? " required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="question_4" placeholder="Is your child toilet trained?" required>
                                    </div>
                                </div>
                                <div class="col-md-12 bg-green text-center">
                                    <p>PERMISSION</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>I give the management/staff of ENPEE International School, the authority :</p>
                                        <p>To use the name and/or photo of my child for :</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>School displays, School website </p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for=radio1>Yes</label>
                                        <input id="radio1" name="radio1" type="radio" value="yes">
                                        <label for="radio2">No</label>
                                        <input id="radio2" name="radio1" type="radio" value="no">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>Promotional use including media</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for=radio3>Yes</label>
                                        <input id="radio3" name="radio2" type="radio" value="yes">
                                        <label for="radio4">No</label>
                                        <input id="radio4" name="radio2" type="radio" value="no">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>To share group photos that my child is in, with families that use the service.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for=radio5>Yes</label>
                                        <input id="radio5" name="radio3" type="radio">
                                        <label for="radio6">No</label>
                                        <input id="radio6" name="radio3" type="radio">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>To apply sunscreen for outside play</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for=radio7>Yes</label>
                                        <input id="radio7" name="radio" type="radio">
                                        <label for="radio8">No</label>
                                        <input id="radio8" name="radio" type="radio">
                                    </div>
                                </div>
                                <div class="col-md-12 bg-green text-center">
                                    <p>DECLARATION</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>I hereby certify that the information given in the admission form is complete and accurate. I understand and agree that misrepresentation or
                                            omission of facts will justify the denial of admission, the cancellation of admission or expulsion.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="signature_of_father" placeholder="Signature of Father" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="signature_of_mother" placeholder="Signature of Mother" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="date" placeholder="Date" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="place" placeholder="Place" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>For Office use only :</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-6">
                                            <p><i class="fa fa-circle-thin" aria-hidden="true"></i> Birth Certificate</p>
                                            <p><i class="fa fa-circle-thin" aria-hidden="true"></i> Medical Certificate</p>
                                        </div> 
                                        <div class="col-md-6">
                                            <p><i class="fa fa-circle-thin" aria-hidden="true"></i> Admission fees</p>
                                            <p><i class="fa fa-circle-thin" aria-hidden="true"></i> Other Documents (If any)</p>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-6">
                                            <p><i class="fa fa-circle-thin" aria-hidden="true"></i> Passport Document</p>
                                            <p><i class="fa fa-circle-thin" aria-hidden="true"></i> Address Proof</p>
                                        </div> 
                                        <div class="col-md-6">
                                            <p><i class="fa fa-circle-thin" aria-hidden="true"></i> Photograph</p>
                                            <p><i class="fa fa-circle-thin" aria-hidden="true"></i> Aadhaar card</p>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-12 bg-green text-center">
                                    <p>Obligations</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>These terms and conditions govern the basis on which we agree to provide childcare services to you.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 list-margin">
                                        <ol>
                                            <li>Inform us if your child is suffering from any contagious disease immediately. For the benefit of other children, you must not allow your child to attend the preschool if he/she is suffering from any contagious disease. The child would be allowed to attend school only after a doctor has cleared it to do so</li>
                                            <li>The persons who will be collecting your child from the school have to be registered with the preschool by providing necessary identification documents. Any other person who is not registered would not be allowed to collect the child. It is the responsibility of the parents to collect the child from the preschool in case the authorized person is not available to collect the child. </li>
                                            <li>Parents must arrive within 15 minutes from the time of dispersal to collect the child. In case of late pick up more than 3 times in a month, a late pick up fee would be charged.</li>
                                            <li>Late fee of 100 Rupees per 15 mins per child will be charged for any late pick ups</li>
                                            <li>Inform us of any change in your contact details immediately.</li>
                                            <li>Children are encouraged not to bring their own toys from home unless specifically asked to do so for any activity. We carry a wide range of toys and equipment necessary for engaging the children at the preschool.</li>
                                            <li>Photographs would be taken of the children engaged in activities as part of the documentation of classroom activities. In case you do not wish your child&#39;s photographs for promotional purposes please inform us about the same in writing in advance.</li>
                                            <li>Fees must be paid in two instalments. All payments made should be through cheque I debit card I credit card I through payment gateway.</li>
                                            <li>In case of failure to make the fee payment before the stipulated date, we would withdraw the provision of childcare to the child. Nonpayment of the fees beyond 1month from the due-date would result in the termination of admission of the child.</li>
                                            <li>No refunds would be given for periods for which the School is not attended by your child for any reason whatsoever, including any natural calamities like flood, fire, rain.</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Signature of the parent / guardian :</p>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="date_1" placeholder="Date" required>
                                    </div>
                                </div>
                            </form>
                            <!--                            <ul class="cform">
                                                            <form role="form" class="career" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <li class="half pr-15">
                                                                        <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                                                                    </li>
                                                                </div>
                                                                <div class="form-group">
                                                                    <li class="half pl-15">
                                                                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                                                                    </li>
                                                                </div>
                                                                <div class="form-group">
                                                                    <li class="half pr-15">
                                                                        <input type="text" pattern="^\d{10}$" class="form-control" name="mobile" placeholder="Contact Number" required>
                                                                    </li>
                                                                </div>
                                                                <div class="form-group">
                                                                    <li class="half pl-15">
                                                                        <select name="select_role" class="form-control">
                                                                            <option value="Select Job Role">Select Job Role</option>
                                                                            <option value="Admin Manager">Admin Manager</option>
                                                                            <option value="Front Office Staff">Front Office staff</option>
                                                                            <option value="Teacher">Teacher</option>
                                                                        </select>
                                                                    </li>
                                                                </div>
                                                                <div class="form-group">
                                                                    <li class="half pr-15">
                                                                        <input type="text" class="form-control" name="address_1" placeholder="Address-1" required>
                                                                                                                        <div class="multiselect">
                                                                                                                            <select id="contactform" class="form-control" name="preffred_classes[]" multiple required>
                                                                                                                                <option value="L.K.G">Pre-KG</option>
                                                                                                                                <option value="L.K.G">LKG</option>
                                                                                                                                <option value="L.K.G">UKG</option>
                                                                                                                                <option value="I STD">I STD</option>
                                                                                                                                <option value="II STD">II STD</option>
                                                                                                                                <option value="III STD ">III STD </option>
                                                                                                                                <option value="IV STD">IV STD</option>
                                                                                                                                <option value="V STD">V STD</option>
                                                                                                                            </select>
                                                                        
                                                                                                                        </div>
                                                                    </li>
                                                                </div>
                                                                <div class="form-group">
                                                                    <li class="half pl-15">
                                                                        <input type="text" class="form-control" name="address_2" placeholder="Address-2" required>
                                                                    </li>
                                                                </div>
                                                                <div class="form-group">
                                                                    <li class="full">
                                                                        <select name="social_media" class="form-control">
                                                                            <option value="">How did you here about us?</option>
                                                                            <option value="Facebook">Facebook</option>
                                                                            <option value="Linked-In">Linked-In</option>
                                                                            <option value="YouTube">YouTube</option>
                                                                            <option value="Google Search">Google Search</option>
                                                                            <option value="SMS">SMS</option>
                                                                            <option value="Whatsapp">Whatsapp</option>
                                                                            <option value="TV">TV</option>
                                                                            <option value="Other Reference">Other Reference</option>
                                                                        </select>
                                                                    </li>
                                                                </div>
                                                                <div class="form-group">
                                                                    <li class="full">
                                                                        <textarea class="textarea-control" name="message" placeholder="Message" required></textarea>
                                                                    </li>
                                                                </div>
                                                                <div class="form-group">
                                                                    <li class="full">
                                                                        Submit Your CV / Resume: <input type="file" name="resume" id="resume">
                                                                    </li>
                                                                </div>
                                                                <li class="full">
                                                                    <input type="submit" value="Submit" class="fsubmit btn-primary" style="width: 200px;">
                                                                </li>
                                                            </form>
                                                        </ul>-->

                        </div>
                    </div>
                </div>
                <!--                <div class="container contact-info">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Contact Information</h3>
                                        </div>
                                        Contact Info Start
                                        <div class="col-md-4 text-right">
                                            <div class="c-info">
                                                <h6>Address:</h6>
                                                <p><strong>ENPEE International School</strong><br/> <i>Château Français</i><br/>
                                                    ENPEE Enclave, 241/2, Puthakudy Village,  <br/> 
                                                    Vadamattam Main Road, Nedunkadu Panchayat, <br/>
                                                    Karaikal – 609603, U.T of Puducherry
                                                </p>
                                            </div>
                                        </div>
                                        Contact Info End 
                                        Contact Info Start
                                        <div class="col-md-4 text-right">
                                            <div class="c-info">
                                                <h6>Contact:</h6>
                                                <p><strong>Telephone:</strong><a href="tel:04368 265 265"> 04368 265 265</a></p>
                                                <p><strong>Phone:</strong><a href="tel:+91 8300111265"> +91 8300 111 265</a></p>
                                            </div>
                                        </div>
                                        Contact Info End 
                                        Contact Info Start
                                        <div class="col-md-4 text-right">
                                            <div class="c-info">
                                                <h6>For More Information:</h6>
                                                <p><strong>Email:</strong><a href="mailto:info@enpeekl.com"> info@enpeekkl.com</a></p>
                                                <p><a href="mailto:admin@enpeekl.com">admin@enpeekkl.com</a></p>
                                            </div>
                                        </div>
                                        Contact Info End 
                                    </div>
                                </div>-->
            </section>
            <!--Contact End--> 
            <?php include 'footer.php'; ?>
            <script>
                $('#contactform').multiSelect({
                    noneText: 'Choose Your Program'});
            </script>
        </div>

    </body>
</html>
