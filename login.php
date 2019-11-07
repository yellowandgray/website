<div id="id01" class="modal">

    <form class="modal-content-box animate" action="/action_page.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display = 'none'" class="close" title="Close Modal">&times;</span>
            <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <input type="text" placeholder="Username" name="uname" required>

            <input type="password" placeholder="Password" name="psw" required>
            <span class="psw">Forgot <a href="#">password?</a></span>
            <div class="add-submit">
                <button class="button-addcart" type="submit">Login</button>
            </div>
        </div>

        <div class="container">
            <!--            <button type="button" onclick="document.getElementById('id01').style.display = 'none'" class="cancelbtn">Cancel</button>-->
            <p class="new-acc">If you don't have a account? <a href="#">Sign up</a> </p>
        </div>
    </form>
</div>