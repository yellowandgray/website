<div class="quick">
    <button class="open-button" onclick="openForm()">Enquiry</button>
</div>
<div class="form-popup" id="contact-form">
    <form class="form-container" id="form-messages">
        <h1>Sales Enquiry</h1>
        <div class="form-group">
        <input type="text" placeholder="Name *" name="fname" required>
        </div>
        <div class="form-group">
        <input type="text" placeholder="Your Email *" name="email" required>
        </div>
        <div class="form-group">
        <input type="text" placeholder="Phone *" name="phone" required>
        </div>
        <div class="form-group">
        <textarea type="text" placeholder="Comments" name="message" required></textarea>
        </div>
        <button type="submit" class="btn">Submit</button>
        <button type="button" class="btn-1 cancel" onclick="closeForm()"><i class="fas fa-times"></i></button>
    </form>
</div>