<div id="myModal-2" class="modal-1">
    <!--            Modal content -->
    <div class="modal-content-1">
        <div class="modal-header-1">
            <span class="close-2">&times;</span>
            <h2 style="text-align: center">Join The Community</h2>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="images/bg/cheryl-07.jpg" alt="" class="img-2"/>
                    </div>
                    <div class="col-lg-8">
                        <p class="text-justify">Just an invitation - come and be a part of this wonderful community. I’ll be traveling the world, sharing my WOW-moments, delivering content to inspire you, sharing tools & tips to be more and live more. Don’t worry, I hate spam as much as you do. I promise to send you an email only once a month with awesome, relevant value for you.</p>
                    </div>
                </div>
                <form class="text-bg">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Name</label>
                            <input type="text" name="fname" style="border-bottom: 1px solid #000;">
                        </div>
                        <div class="col-lg-6">
                            <label>Email Address</label>
                            <input type="email" name="email" style="border-bottom: 1px solid #000;">
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="button-1 font-16"><span class="color-w">Join us!</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Get the modal
    var mode = document.getElementById('myModal-2');
    // Get the button that opens the modal
    var btnn = document.getElementById("myBtn-1");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close-2")[0];
    // When the user clicks the button, open the modal 
    btnn.onclick = function () {
        mode.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        mode.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == mode) {
            mode.style.display = "none";
        }
    }
</script>