@extends('layout.commonlayout')

@section('content')



<div class="hero-image-small hero-small-about inner-bridecrumb">
      <div class="container">
         <div class="hero-text-inner">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-12 m-auto text-center">
                  <h3><span class="sub-heading-1">Contact Us</span></h3>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
   
   
   <div class="section-first">
    <div class="container">
	
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4">
                   <div class="contact contact-box">
                      <img src="assets/images/send-email-2.png" class="img-fluid" alt="" data-aos="flip-left" data-aos-delay="50">
                      <span class="lable">Email -</span>
                      <p><a href="mailto:info@policymarket.ca">info@policymarket.ca</a></p>
                   </div>
                </div>
				
				
				<div class="col-lg-4 col-md-4 col-sm-4">
                   <div class="contact contact-box">
                      <img src="assets/images/mobile-phone-2.png" class="img-fluid" alt="" data-aos="flip-left" data-aos-delay="150">
                      <span class="lable">Call -</span>
                      <p><a href="tel:+19058777777">905-877-7777</a></p>
                   </div>
                </div>
				
				<div class="col-lg-4 col-md-4 col-sm-4">
                   <div class="contact contact-box">
                      <img src="assets/images/flag.png" class="img-fluid" alt="" data-aos="flip-left" data-aos-delay="350">
                      <span class="lable">Location -</span>
                      <p>52680 Matheson Blvd E, Suite # 102, Mississauga, ON, L4W 0A5</p>
                   </div>
                </div>
				
				
	</div>

       <div class="row mt-50"> 
          <div class="col-lg-6 col-md-12 col-sm-12">
		  <div class="contact-form-bg">
		  <h3>Get in Touch</h3>
		  	<form>
                <div class="form-group">
                   <label for="formGroupExampleInput1">Name</label>
                   <input type="text" class="form-control" placeholder="Your name">
                </div>
				<div class="form-group">
                   <label for="exampleFormControlInput1">Phone</label>
                   <input type="text" class="form-control" placeholder="Your Phone">
                </div>
                <div class="form-group">
                   <label for="exampleFormControlInput1">Email</label>
                   <input type="email" class="form-control" placeholder="Your Email Address">
                </div>
                <div class="form-group">
                   <label for="formGroupExampleInput2">Subject</label>
                   <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Subject">
                </div>
                <div class="form-group">
                   <label for="exampleFormControlTextarea1">Message</label>
                   <textarea class="form-control msg-area" id="exampleFormControlTextarea1" placeholder="Message" rows="2" data-gramm="false" wt-ignore-input="true"></textarea>
                </div>
                <button type="button" class="btn btn-prim-round">Submit</button>
             </form>
		  </div>
             
          </div>
		  
		  <div class="col-lg-6 col-md-12 col-sm-12">
		  	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2886.3150628713433!2d-79.60371172334708!3d43.66241690183404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b39ab7d21e253%3A0xffcf4e0dca4f791b!2sMississauga%2C%20ON%20L4W%200A5%2C%20Canada!5e0!3m2!1sen!2sin!4v1698045713210!5m2!1sen!2sin" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		  </div>
		  
       </div>
    </div>
 </div>



@endsection 