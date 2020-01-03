<div id = 'mySignup' class = 'modal styled hide fade' tabindex = '-1' role = 'dialog' aria-labelledby = 'mySignupModalLabel' aria-hidden = 'true'>
    <div class = 'modal-header'>
        <button type = 'button' class = 'close' data-dismiss = 'modal' aria-hidden = 'true'>×</button>
        <h4 id = 'mySignupModalLabel'>Register <strong>Form</strong></h4>
    </div>
    <div class = 'modal-body'>
        <form class = 'form-horizontal student-register'onsubmit = 'return registerStudent();'>
            <div class = 'control-group'>
                <label class = 'control-label' for = 'username'>User Name</label>
                <div class = 'controls'>
                    <input type = 'text' id = 'user_name' placeholder = 'User Name' required>
                </div>
            </div>
            <div class = 'control-group'>
                <label class = 'control-label' for = 'student-name'>Student Name</label>
                <div class = 'controls'>
                    <input type = 'text' id = 'student_name' placeholder = 'Student Name' required>
                </div>
            </div>
            <div class = 'control-group'>
                <label class = 'control-label' for = 'parent_name'>Parent Name</label>
                <div class = 'controls'>
                    <input type = 'text' id = 'parent_name' placeholder = 'Parent Name' required>
                </div>
            </div>
            <div class = 'control-group'>
                <label class = 'control-label' for = 'mobile'>Mobile</label>
                <div class = 'controls'>
                    <input type = 'text' id = 'mobile' maxlength = '10' placeholder = 'Ex:123-456-7890' pattern = '[0-9]{10}' required>
                </div>
            </div>
            <div class = 'control-group'>
                <label class = 'control-label' for = 'city'>Town/City</label>
                <div class = 'controls'>
                    <input type = 'text' id = 'city' placeholder = 'Town/City' required>
                </div>
            </div>
            <div class = 'control-group'>
                <label class = 'control-label' for = 'pin'>Pin</label>
                <div class = 'controls'>
                    <input type = 'text' id = 'pin' placeholder = 'Pin' required>
                </div>
            </div>
            <div class = 'control-group'>
                <label class = 'control-label' for = 'school_name'>School Name</label>
                <div class = 'controls'>
                    <input type = 'text' id = 'school_name' placeholder = 'School Name' required>
                </div>
            </div>
            <div class = 'control-group'>
                <label class = 'control-label' for = 'slelct_standard'>Select Standard</label>
                <div class = 'controls'>
                    <select id = 'standard' required>
                        <option value = '10th-State-Board'>10th State Board</option>
                        <option value = '10th-CBSC'>10th CBSC</option>
                    </select>
                </div>
            </div>
            <div class = 'control-group'>
                <label class = 'control-label' for = 'password'>Password</label>
                <div class = 'controls'>
                    <input type = 'password' id = 'password' placeholder = 'Password' required>
                </div>
            </div>
            <div class = 'control-group'>
                <label class = 'control-label' for = 'confirm_password'>Confirm Password</label>
                <div class = 'controls'>
                    <input type = 'password' id = 'confirm_password' placeholder = 'Confirm Password' required>
                </div>
            </div>
            <div class = 'control-group'>
                <label class = 'control-label' for = 'email'>Email</label>
                <div class = 'controls'>
                    <input type = 'email' id = 'email' placeholder = 'Email (Option)'>
                </div>
            </div>
            <div class = 'control-group'>
                <div class = 'controls'>
                    <button name = 'submit' type = 'submit' id = 'contact-submit' class = 'btn'>Sign up</button>
                </div>
                <p class = 'aligncenter margintop20'>
                    Already have an account? <a href = '#mySignin' data-dismiss = 'modal' aria-hidden = 'true' data-toggle = 'modal'>Sign in</a>
                </p>
            </div>
        </form>
    </div>
</div>