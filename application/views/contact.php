   <?php include 'header.php'?>  
 
 
 

<div class="container contact-form">
       
            <form id="contactforms">
                <h1>Contact Us  </h1>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="email" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                        </div>
                      
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" placeholder="Your Message For Better Service *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">  <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                        </div></div>
                           <div class="col-md-6 validate_success" style="display: none">   <p class="text-success">Enquiry Mail Sent Successfully.</p></div>
                </div>
            </form>
</div>
<?php include 'footer.php '?>