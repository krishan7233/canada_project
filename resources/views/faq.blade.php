@extends('layout.commonlayout')

@section('content')
<!-- Form section start here -->

<div class="hero-image-small hero-small-about inner-bridecrumb">
      <div class="container">
         <div class="hero-text-inner">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-12 m-auto text-center">
                  <h3><span class="sub-heading-1">Faqs</span></h3>
                  
               </div>
            </div>
         </div>
      </div>
   </div>


<section class="faq-section inner-faq">
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





<!-- Form section Ends here -->
@endsection 