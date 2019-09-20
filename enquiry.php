<div class="quick">
    <button class="open-button" onclick="openForm()">Enquiry</button>
</div>
<div class="form-popup" id="contact-form">
    <div class="enquiry-form">
        <div class="field">
            <form action="/action_page.php" class="form-container" id="form-messages">
                <h2 class="text-center">Quick Enquiry</h2>

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="fname" placeholder="name">
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="fname" placeholder="Phone">
                    </div>
                    <div class="col-md-12">
                        <input type="email" name="fname" placeholder="Email">
                    </div>
                    <div class="col-md-12">
                        <textarea name="fname" placeholder="Comments"></textarea>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" placeholder="submit">
                        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>