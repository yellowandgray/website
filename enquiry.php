<div class="quick-1">
    <button class="open-button" onclick="openForm()">Enquiry</button>
</div>
<div class="form-popup" id="contact-form">
    <div class="enquiry-form">
        <div class="field">
            <form class="form-container enquiry-section" id="form-messages">
                <h2 class="text-center">Connect With Us</h2>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="text" name="fname" placeholder="Name" required>
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="text" inputmode="numeric"  name="phone" placeholder="Phone" maxlength="10" required>
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="col-md-12 form-group">
                        <textarea name="message" placeholder="Comments" required></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                        <select name="segment" required>
                            <option value="">Choose your Segment</option>
                            <option value="textile">Textile</option>
                            <option value="surface">Surface</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="submit" placeholder="submit">
                        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>