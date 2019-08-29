<div class="quick">
    <button class="open-button" onclick="openForm()">Enquiry</button>
</div>
<div class="form-popup" id="contact-form">
    <form action="/action_page.php" class="form-container" id="form-messages">
        <h1>Sales Enquiry</h1>
        <input type="text" placeholder="Name *" name="fname" required>
        <input type="text" placeholder="Your Email *" name="email" required>
        <input type="text" placeholder="Phone *" name="phone" required>
        <textarea type="text" placeholder="Comments" name="message" required></textarea>
        <button type="submit" class="btn">Submit</button>
        <button type="button" class="btn-1 cancel" onclick="closeForm()"><i class="fas fa-times"></i></button>
    </form>
</div>