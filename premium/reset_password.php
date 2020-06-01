<div id = 'myReset' class = 'modal styled hide fade' tabindex = '-1' role = 'dialog' aria-labelledby = 'myResetModalLabel' aria-hidden = 'true'>
    <div class = 'modal-header'>
        <button type = 'button' class = 'close' data-dismiss = 'modal' aria-hidden = 'true'>×</button>
        <h4 id = 'myResetModalLabel'>Reset your <strong>password</strong></h4>
    </div>
    <div class = 'modal-body'>
        <form class = 'form-horizontal' onsubmit="return changePassword();">
            <div class = 'control-group'>
                <label class = 'control-label' for = 'user_name'>Username</label>
                <div class = 'controls'>
                    <input type = 'text' id = 'user_name' placeholder = '' required>
                </div>
            </div>
            <div class = 'control-group'>
                <label class = 'control-label' for = 'password'>New Password</label>
                <div class = 'controls'>
                    <input type = 'password' id = 'password' placeholder = '' required>
                </div>
            </div>
            <div class = 'control-group'>
                <label class = 'control-label' for = 'confirm_password'>Confirm Password</label>
                <div class = 'controls'>
                    <input type = 'password' id = 'confirm_password' placeholder = '' required>
                </div>
            </div>
            <div class = 'control-group'>
                <div class = 'controls'>
                    <button type = 'submit' class = 'btn btn-custom'>Reset password</button>
                </div>
<!--                <p class = 'aligncenter margintop20'>
                    Please put your registered user name. you have reset the your password...
                </p>-->
            </div>
        </form>
    </div>
</div>