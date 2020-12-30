<?php 
	
	require 'frontend_header1.php'

?>

	<style type="text/css" media="screen">
		.map-responsive{
			overflow: hidden;     
			padding-bottom: 50%;
			position: relative;
			height: 0;
}

		.map-responsive iframe{
			left: 0;
			top: 0;
			height: 100%;
			width: 100%;
			position: absolute;
}
	</style>
  <div class="container mt-3">
    <div class="row">
      <div class="col-12">
        <h1 class="display-1 text-center">Contact</h1>
      </div>
    </div>
  </div>

	<div class="container my-5">
		<div class="row">
			<div class="col-lg-5 col-md-12 col-sm-12">
                <h3 class="text-center mb-4">Send Message Us</h3>
                	<form action="" method="post" role="form" class="contactForm">
                     <!--  <div id="sendmessage">Your message has been sent. Thank you!</div> -->
                      <div id="errormessage"></div>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                              <div class="validation"></div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button type="submit" class="button button-a button-big button-rouded">Send Message</button>
                        </div>
                      </div>
                    </form>
                  </div>

            <div class="col-lg-7 col-md-12 col-sm-12">
            	<h3 class="text-center mb-4">Our Location</h3>
            	<div class="map-responsive my-5">
            	
            	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.6333602423956!2d96.13394544977!3d16.844535288349217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c194962007f863%3A0x1ce0d39a47ca647c!2sLOTTE%20HOTEL%20YANGON!5e0!3m2!1sen!2smm!4v1573705211617!5m2!1sen!2smm" width="600" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            	</div>
            </div>

		</div>
	</div>

<?php require 'frontend_footer.php' ?>