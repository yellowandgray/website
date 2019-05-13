<div id="myModal-1" class="modal-1">
            <!-- Modal content -->
            <div class="modal-content-1">
                <div class="modal-header-1">
                    <span class="close-1">&times;</span>
                    <h2 style="text-align: center">Apply to Coach with Cheryl</h2>
                </div>
                <div class="modal-body">
                    <form class="form-2">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text" name="fname">
                            </div>
                            <div class="col-md-6">
                                <label>Email Address</label>
                                <input type="email" name="email"> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Contact Number</label>
                                <input type="text" name="contact"> 
                            </div>
                            <div class="col-md-6">
                                <label>How do you want to be contacted</label>
                                <select name="How-do-contacted">
                                    <option value="Email">Email</option>
                                    <option value="Whatsapp">Whatsapp</option>
                                </select>
                            </div>
                        </div>
                        <label>My current challenge that I want to overcome</label>
                        <textarea type="text" name="requirement" class="req"></textarea>
                        <div class="button discover_button" style="margin-top: 20px">
                            <a href="#" class="d-flex flex-row align-items-center justify-content-center">Send<img src="images/arrow_right.svg" alt=""></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            // Get the modal
            var modal = document.getElementById('myModal-1');
            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close-1")[0];
            // When the user clicks the button, open the modal 
            btn.onclick = function () {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>