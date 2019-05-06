<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-onload-content">
            <div class="modal-header-1">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <img  class="img-width" src="img/sub-banner/onload-pic-1.jpg" alt="Cyber Security Awareness Workshop"/>
                <h3 class="text-center margin-top-10">Cyber Security Awareness Workshop at your Premise</h3>
                <ul>
                    <li>Protect your business</li>
                    <li>Make employees your active defense against cyber threats</li>
                </ul>
            </div>
            <div class="modal-body-1">
                <form onsubmit="return submitForm('onload_form');" id="onload_form">
                    <input class="form-control mandatory field" name="name" id="first_name" placeholder="Name *" type="text" required data-message="Enter name" data-emaillabel="Name" />
                    <input class="form-control mandatory field" name="email" id="email" type="email" placeholder="Your Email *" data-message="Enter email" data-emaillabel="Email" />
                    <input class="form-control mandatory field" name="phone" placeholder="Phone *" id="phone" type="text" data-message="Enter phone" data-emaillabel="Phone" />
                    <input class="form-control mandatory field" type="text" name="number_of_persons" placeholder="Number of Employees *" id="number_of_persons" data-message="Enter number of employees" data-emaillabel="No. Of Employees" />
                    <center>
                        <input type="submit" class="btn btn-blue" value="beginning success" />
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>