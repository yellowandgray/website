<div id="mySignin" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="mySigninModalLabel">Login to your <strong>account</strong></h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" onsubmit="return loginStudent();">
            <div class="control-group">
                <label class="control-label" for="user_name">Username</label>
                <div class="controls">
                    <input type="text" id="user-name" placeholder="Username">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                    <input type="password" id="password1" placeholder="Password">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="checkbox" id="rememberme"> Remember Me 
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn">Sign in</button> Forgot password? <a href="#myReset" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Reset</a>
                </div>
                <p class="aligncenter margintop20">
                    Click here to create the new account <a href = '#mySignup' data-dismiss="modal" aria-hidden="true" data-toggle="modal">Register Now!</a>
                </p>
            </div>
        </form>
    </div>
</div>