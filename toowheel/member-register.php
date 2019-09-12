<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="padding-top-108"></div>
        <div class="member-register-section">
            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <form id="msform" action="" method="post">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active"></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <fieldset>
                                <h3>Member Register</h3>
                                <select name="category">
                                    <option value="0">Select Category</option>
                                    <option value="4-wheels">4 Wheels</option>
                                    <option value="2-wheels">2 Wheels</option>
                                </select>

                                <input placeholder="First Name" type="text" tabindex="2" required>

                                <input placeholder="Last Name" type="text" tabindex="3" required>

                                <span class="flex-row">Upload Profile Picture: <input type="file" tabindex="4" required></span>

                                <select name="gender">
                                    <option value="0">Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>

                                <select name="gender">
                                    <option value="0">Age</option>
                                    <option value="20-30">20-30</option>
                                    <option value="31-40">30-40</option>
                                    <option value="41-50">41-50</option>
                                    <option value="51-60">51-60</option>
                                </select>

                                <input placeholder="IC Number/Passport number" type="text" tabindex="7" required>

                                <input placeholder="Date of Birth" type="date" tabindex="8" required>

                                <input placeholder="Contact Number" type="text" tabindex="9" required>

                                <select name="driver-license-category">
                                    <option value="0">Driver License Category</option>
                                </select>

                                <textarea placeholder="Address" type="text" tabindex="11" required></textarea>

                                <input placeholder="Country" type="text" tabindex="12" required>

                                <input placeholder="City" type="text" tabindex="13" required>

                                <input placeholder="Referral" type="text" tabindex="14" required>

                                <input placeholder="Member ID" type="text" tabindex="15" required>

                                <input placeholder="Club ID" type="text" tabindex="16" required>

                                <input placeholder="Coverage" type="text" tabindex="17" required>

                                <input placeholder="Full Name" type="text" tabindex="18" required>

                                <input placeholder="Contact Number" type="text" tabindex="19" required>

                                <textarea placeholder="Address" type="text" tabindex="20" required></textarea>

                                <br/>
                                <h3>Login Information</h3>
                                <input placeholder="Email Address" type="email" tabindex="21" required>

                                <input placeholder="Password" type="password" tabindex="22" required>

                                <input placeholder="Conform Password" type="password" tabindex="23" required>
                                <input type="button" name="next" class="next action-button" value="Next"/>

                            </fieldset>
                            <fieldset>
                                <h3>Member Register</h3>
<!--                                <select name="category">
                                    <option value="0">Select Category</option>
                                    <option value="4-wheels">4 Wheels</option>
                                    <option value="2-wheels">2 Wheels</option>
                                </select>

                                <input placeholder="First Name" type="text" tabindex="2" required>

                                <input placeholder="Last Name" type="text" tabindex="3" required>

                                <span class="flex-row">Upload Profile Picture: <input type="file" tabindex="4" required></span>

                                <select name="gender">
                                    <option value="0">Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>

                                <select name="gender">
                                    <option value="0">Age</option>
                                    <option value="20-30">20-30</option>
                                    <option value="31-40">30-40</option>
                                    <option value="41-50">41-50</option>
                                    <option value="51-60">51-60</option>
                                </select>

                                <input placeholder="IC Number/Passport number" type="text" tabindex="7" required>

                                <input placeholder="Date of Birth" type="date" tabindex="8" required>

                                <input placeholder="Contact Number" type="text" tabindex="9" required>

                                <select name="driver-license-category">
                                    <option value="0">Driver License Category</option>
                                </select>

                                <textarea placeholder="Address" type="text" tabindex="11" required></textarea>

                                <input placeholder="Country" type="text" tabindex="12" required>

                                <input placeholder="City" type="text" tabindex="13" required>

                                <input placeholder="Referral" type="text" tabindex="14" required>

                                <input placeholder="Member ID" type="text" tabindex="15" required>

                                <input placeholder="Club ID" type="text" tabindex="16" required>

                                <input placeholder="Coverage" type="text" tabindex="17" required>

                                <input placeholder="Full Name" type="text" tabindex="18" required>

                                <input placeholder="Contact Number" type="text" tabindex="19" required>

                                <textarea placeholder="Address" type="text" tabindex="20" required></textarea>

                                <br/>
                                <h3>Login Information</h3>
                                <input placeholder="Email Address" type="email" tabindex="21" required>

                                <input placeholder="Password" type="password" tabindex="22" required>

                                <input placeholder="Conform Password" type="password" tabindex="23" required>-->
                                <!--                                <div class="button-1">
                                                                <div class="eff-1"></div>
                                                                <a href="#">Submit</a>
                                                                </div>-->
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Next"/>
                            </fieldset>
                            <fieldset>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Submit"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <script>
//jQuery time
            var current_fs, next_fs, previous_fs; //fieldsets
            var left, opacity, scale; //fieldset properties which we will animate
            var animating; //flag to prevent quick multi-click glitches

            $(".next").click(function () {
                if (animating)
                    return false;
                animating = true;

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //activate next step on progressbar using the index of next_fs
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale current_fs down to 80%
                        scale = 1 - (1 - now) * 0.2;
                        //2. bring next_fs from the right(50%)
                        left = (now * 50) + "%";
                        //3. increase opacity of next_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({
                            'transform': 'scale(' + scale + ')',
                            'position': 'absolute'
                        });
                        next_fs.css({'left': left, 'opacity': opacity});
                    },
                    duration: 800,
                    complete: function () {
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
            });

            $(".previous").click(function () {
                if (animating)
                    return false;
                animating = true;

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //de-activate current step on progressbar
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale previous_fs from 80% to 100%
                        scale = 0.8 + (1 - now) * 0.2;
                        //2. take current_fs to the right(50%) - from 0%
                        left = ((1 - now) * 50) + "%";
                        //3. increase opacity of previous_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({'left': left});
                        previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
                    },
                    duration: 800,
                    complete: function () {
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
            });

            $(".submit").click(function () {
                return false;
            })
        </script>
    </body>
</html>