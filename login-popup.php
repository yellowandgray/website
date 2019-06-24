<div id="id01" class="modal">

    <div class="modal-content animate">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display = 'none'" class="close" title="Close Modal">&times;</span>
        </div>
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Login')" id="defaultOpen">Login</button>
            <button class="tablinks" onclick="openCity(event, 'Register')">Register</button>
        </div>
        <div id="Login" class="tabcontent">
            <form>
                <div class="container">
                    <h2 class="text-center mr-1">Login</h2>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="uname"><b>User Name</b></label>
                            <input type="text" id="user_name" class="form-control rounded-0" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="psw"><b>Password</b></label>
                            <input type="password" id="password" class="form-control rounded-0" required>
                        </div>
                    </div>
                    <label>
                        <input type="checkbox" name="remember" value="remember"> Remember me
                    </label>
                    <div class="row form-group">
                        <div class="col-md-12 login-button">
                            <a href=""><button type="submit" class="btn btn-black">Login</button></a>
                        </div>
                    </div>
                </div>
                <div class="container" style="background-color:#f1f1f1;">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="psw">Forgot <a href="#" onclick="document.getElementById('id02').style.display = 'block'" style="width:auto;">password?</a></span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="Register" class="tabcontent">
            <form>
                <div class="container">
                    <h2 class="text-center mr-1">Register</h2>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="uname"><b>Your Name</b></label>
                            <input type="text" id="uname" class="form-control rounded-0" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="uname"><b>User Name</b></label>
                            <input type="text" id="user_name" class="form-control rounded-0" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="email"><b>Email</b></label>
                            <input type="email" id="email" class="form-control rounded-0" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="mobile_number"><b>Mobile Number</b></label>
                            <input type="text" id="mobile_number" class="form-control rounded-0" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="psw"><b>Password</b></label>
                            <input type="password" id="password" class="form-control rounded-0" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="re_psw"><b>Repeat Password</b></label>
                            <input type="password" id="repeat_password" class="form-control rounded-0" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 login-button">
                            <a href=""><button type="submit" class="btn btn-black">Sign Up</button></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>