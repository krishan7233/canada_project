@extends('layout.commonlayout')

@section('content')
<!-- Form section start here -->
<div class="hero-image main-slider">
  <div class="container">
  <!--<div class="row">
  	<div class="col-lg-6 col-md-6 col-sm-12">
        <div class="hero-text">
          <h1 class="text-pink">Compare in Seconds, Save for a Lifetime,<span>Buy with Confidence</span></h1>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12"> <img src="assets/images/slider-2.png">
        
      </div>
  </div>-->
  
    <div class="row">
	  <div class="col-lg-12 col-md-12 col-sm-12">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active"> 
			<img src="assets/images/banner-1.png" alt="..."> 
			<div class="carousel-caption">
				<div class="hero-text">
				  <h1 class="text-pink">Compare in Seconds, Save for a Lifetime,<span>Buy with Confidence</span></h1>
				  <button type="Submit" class="btn btn-prim-round">Get a Quote</button>
				</div>
		  </div>
			</div>
            <div class="carousel-item"> 
			<img src="assets/images/banner-2.png" alt="..."> 
			<div class="carousel-caption">
				<div class="hero-text">
				  <h1 class="text-pink">Insure Your Peace of Mind  <span>with PolicyMarket</span></h1>
				  <button type="Submit" class="btn btn-prim-round">Get a Quote</button>
				</div>
		  </div>
			</div>
			<div class="carousel-item"> 
			<img src="assets/images/banner-3.png" alt="...">
			<div class="carousel-caption">
				<div class="hero-text">
				  <h1 class="text-pink">Your Insurance Journey Begins  <span>at PolicyMarket.ca</span></h1>
				  <button type="Submit" class="btn btn-prim-round">Get a Quote</button>
				</div>
		  </div>
			</div>
          </div>
          <!--<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>--> </div>
      </div>
	  
	  
    </div>
    <div class="poins">
      <h4>Select a product to see your quotes</h4>
      <div class="row">
        <div class="col-lg-4"> <a href="#">
          <div class="numbers"> <img src="assets/images/super-visa-insurence.png" class="img-fluid" alt="">
            <h2>Super Visa <br />
              Insurance</h2>
          </div>
          </a> </div>
        <div class="col-lg-4"> <a href="#">
          <div class="numbers"> <img src="assets/images/visitor-to-canada.png" class="img-fluid" alt="">
            <h2>Visitor To Canada<br />
              Insurance</h2>
          </div>
          </a> </div>
        <div class="col-lg-4">
          <div class="numbers"> <img src="assets/images/canadian-travelling.png" class="img-fluid" alt="">
            <h2>Canadian Travelling Out of Country / Province</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section-larger about-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="title-center">
          <h2>About <span>PolicyMarket</span></h2>
        </div>
      </div>
    </div>
    <div class="row vertical-cntr">
      <div class="col-lg-12">
        <p>At PolicyMarket, we're all about simplifying your insurance journey. We understand that finding the right insurance coverage can be a daunting task, and that's why we're here to transform the experience into something seamless, easy, and tailored to your unique needs. Our one-stop platform empowers you to compare options, receive expert advice, purchase policies, and manage your insurance portfolio effortlessly.</p>
        <p>Since 2008, we've been navigating the world of financial services, dedicating ourselves to crafting personalized solutions that cater to your specific requirements. From safeguarding your health to ensuring your family's financial security, we've got you covered. Planning a global adventure or welcoming visitors to Canada? Explore our competitive travel health and medical insurance options. Whether it's Personal, Business, Life, Investments, retirement planning, or employee benefits, our experienced brokers are here to guide you towards the ideal plan.</p>
      </div>
      <!--<div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="img-container">
                     <img src="assets/images/home_img_1.png" class="img-fluid mt" alt="">
                  </div>
                  
               </div>-->
    </div>
  </div>
</div>
<section class="partner-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="title-center">
          <h2>Our <span>Partners</span></h2>
        </div>
      </div>
    </div>
    <div class="customer-logos slider">
      <div class="slide"><img src="assets/images/partner-logo/21-century-travel-insurance.png"></div>
      <div class="slide"><img src="assets/images/partner-logo/allianz.png"></div>
      <div class="slide"><img src="assets/images/partner-logo/assumption-life.png"></div>
      <div class="slide"><img src="assets/images/partner-logo/beneva.png"></div>
      <div class="slide"><img src="assets/images/partner-logo/bmo-insurance.png"></div>
      <div class="slide"><img src="assets/images/partner-logo/canada-life.png"></div>
      <div class="slide"><img src="assets/images/partner-logo/canada-protection-plan.png"></div>
      <div class="slide"><img src="assets/images/partner-logo/desjardins.png"></div>
      <div class="slide"><img src="assets/images/partner-logo/destination-canada-travel.png"></div>
      <div class="slide"><img src="assets/images/partner-logo/edge-benefits.png"></div>
      <div class="slide"><img src="assets/images/partner-logo/empire-life.png"></div>
    </div>
  </div>
</section>


<section class="CounterSection">
	<div class="container">
		<h4>Why Choose PolicyMarket ?</h4>
		<div class="row">
			<div class="col-lg-3">
				<div class="conterBox GrayBg">
					<div class="ImgBox">
						<img src="assets/images/user.png">
					</div>
					<div class="ContentBox">
						<h3>5M+</h3>
						<p>shoppers served</p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3">
				<div class="conterBox WhiteBg">
					<div class="ImgBox">
						<img src="assets/images/cashless.png">
					</div>
					<div class="ContentBox">
						<h3>2000+</h3>
						<p>Cashless Healthcare Providers</p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3">
				<div class="conterBox GrayBg">
					<div class="ImgBox">
						<img src="assets/images/healthcare.png">
					</div>
					<div class="ContentBox">
						<h3>3 Lakh+</h3>
						<p>Lives Covered Since Inception</p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3">
				<div class="conterBox WhiteBg">
					<div class="ImgBox">
						<img src="assets/images/24x7-support.png">
					</div>
					<div class="ContentBox">
						<h3>24x7</h3>
						<p>Claim and Customer Support</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="make-us-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="title-center">
          <h2>What Makes Us <span>Different</span></h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="box">
			<span><img src="assets/images/comparison.png" class="img-fluid" alt=""></span>
          <h3>Simplified Comparison Shopping</h3>
          <p>Bid farewell to the hassle of filling out forms across multiple websites. With PolicyMarket's modern tools, you can effortlessly compare quotes from leading insurance companies side by side within 30 seconds. Already insured? We're here to help you explore better options, including potential lower rates.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="box">
		<span><img src="assets/images/advice.png" class="img-fluid" alt=""></span>
          <h3>Client-Centric <br />
            Advice</h3>
          <p>Your interests always take precedence at PolicyMarket. Our licensed insurance agents and well-researched articles are at your service whether you want to engage in live conversations or conduct independent research. We're committed to not only selling products but also ensuring that you're equipped with the knowledge to make </p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="box">
		<span><img src="assets/images/support.png" class="img-fluid" alt=""></span>
          <h3>Unwavering<br />
            Support</h3>
          <p>Our commitment doesn't end after the sale. We're available to answer your queries at any time, without the need for appointments. Your needs are our priority, and we're here to assist you through every step of the way, including the often complex and stressful claims process. </p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="faq-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-md-10 col-sm-12 m-auto">
        <div class="title-center">
          <h2>Top Questions People <span>Ask Us</span></h2>
        </div>
        <div class="accordion" id="accordionExample">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h2>
                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo"> Question? </button>
              </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <p>Answer.</p></div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h2>
                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> 							Question? </button>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <p>Answer</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h2>
                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Question?</button>
              </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                <p>Answer</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingFour">
              <h2>
                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> Question?</button>
              </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
              <div class="card-body">
                <p>Answer</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>




<div class="section testimonials">
	<div class="container">
	<div class="row">
      <div class="col-lg-12">
        <div class="title-center">
          <h2>Customer's  <span>Feedback</span></h2>
        </div>
      </div>
    </div>
	  
         <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 vertical-cntr">
               <div class="feedback">
                  <img src="assets/images/feedback_bg.png" class="img-fluid" alt="">
                  <h2>Words of Appreciation</h2>
                  
               <div class="img-container">
                  <img src="assets/images/feedback.png" class="img-fluid" alt="">
               </div>
                  </div>
            </div>
            
			
			<div class="col-lg-6 col-md-6 col-sm-12 offset-lg-1 offset-md-1">
               <div class="feedback-list">
                  <div class="client-feedback-left owl-carousel owl-theme">
                     <div class="item-1">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="feedback-content-left">  
                                    <div class="feedback-text-left">
                                       <h6><!--BMW Owner, NYC-->
                                          <span>Sonia Khanna</span>
                                       </h6>
                                       <p>Got good deal without agent calling or speaking to anyone!!</p>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                     <div class="item-1">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="feedback-content-left">
                                    <div class="feedback-text-left">
                                       <h6><!--BMW Owner, NYC-->
                                          <span>Sonia Khanna</span>
                                       </h6>
                                       <p>Got good deal without agent calling or speaking to anyone!!</p>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                     <div class="item-1">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="feedback-content-left"> 
                                    <div class="feedback-text-left">
                                       <h6><!--BMW Owner, NYC-->
                                          <span>Sonia Khanna</span>
                                       </h6>
                                       <p>Got good deal without agent calling or speaking to anyone!!</p>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                     
                  </div>
               </div>
            </div>
			
         </div>
      </div>
   </div>



<div class="section-large blog-section">
   <div class="container-fluid">
   <div class="row">
      <div class="col-lg-12">
        <div class="title-center">
          <h2>Latest  <span>Blog</span></h2>
        </div>
      </div>
    </div>
      <div class="row ">
         <div class="col-lg-12">
            <div class="text-center">
               <div class="container"> 
                  <div class="row">
                     <div class="col-lg-4 col-md-6 col-sm-6 team-list">
                        <div class="team" data-aos="flip-left">
                           <img src="assets/images/3-effective-ways-to-pay-off-your-student-loan.jpg" class="img-fluid" alt="">
                           <div class="blog-info">
                              <h5><a href="#">3 effective ways to pay off your student loan </a></h5>
                              <p>Finished school? Now, it's time to pay off your student loan quickly to get on with your new life as soon as possible. </p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="team" data-aos="flip-left">
                           <img src="assets/images/5-essential-financial-products-you-must-consider.jpg" class="img-fluid" alt="">
                           <div class="blog-info">
                              <h5><a href="#">5 essential financial products you must consider </a></h5>
                              <p>In order to build a significant amount of wealth, one needs to invest in the market. However, it is not easy to ...</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="team" data-aos="flip-left">
                           <img src="assets/images/4-signs-it-is-time-to-buy-life-insurance.jpg" class="img-fluid" alt="">
                           <div class="blog-info">
                              <h5><a href="#">4 signs it's time to buy life insurance  </a></h5>
                              <p>If you haven't taken life insurance into consideration yet then, look for these signs that say you should. </p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col text-center">
                        <button type="button" class="btn btn-prim-round mt-4" onclick="window.location.href='team.html';">Read more</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>





<!-- Form section Ends here -->
@endsection 