<div id="id01" class="modal">

    <form class="modal-content-box animate" action="/action_page.php" method="post">
        <div class="imgcontainer">
            <span onclick="closepop()" class="close" title="Close Modal">&times;</span>
            <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
        </div>

        <div class="container" id="login">
            <input type="text" placeholder="Username" name="uname" required>

            <input type="password" placeholder="Password" name="psw" required>
            <span class="psw">Forgot <a href="#">password?</a></span>
            <div class="add-submit">
                <button class="button-addcart" type="submit">LOGIN</button>
            </div>
            <p class="new-acc">If you don't have a account? <a onclick="loginpopup()">Sign up</a> </p>
        </div>


        <div class="container" id="signup" style="display: none">
            <input type="text" placeholder="Enter Email/Phone Number" name="email" required>

            <input type="text" placeholder="Enter OTP" name="otp" required>
            <input type="text" placeholder="Set Passwort" name="psw" required>
            <div class="add-submit">
                <button class="button-addcart" type="submit">SIGNUP</button>
            </div>
        </div>
    </form>
</div>
