@extends('layout.commonlayout')
@section('content')
<!-- Form section start here -->
<div class="section-larger">

<div class="container">
@include('layout.email_and_whatsapp')
</div>



<div class="plan-details-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left">
                <p><a href="#"><i class="fa fa-pencil"></i></a></p>
                    <img src="assets/images/c-logo.png" />
                    <div class="price-section">
              <h3><span>$</span>977<span>.62</span></h3>
              <h3><span><strong>81.47</strong>/month</span></h3>
              <a href="tel:6475709070" class="call-btn"><i class="fa fa-mobile"></i> (647) 570-9070</a>
            </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="right">
                <p>To begin your application process, please enter your contact details</p>
                	<form>
                    	<div class="form-field-row">
                        	<input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        
                        <div class="form-field-row">
                        	<input type="text" name="phone" class="form-control" placeholder="Phone number" required>
                        </div>
                        
                        
                        <div class="form-field-row">
                        	<input type="email" name="name" class="form-control" placeholder="Email address" required>
                        </div>
                        
                         <div class="form-field-row">
                        	<input type="submit" class="form-control" value="Continue" >
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="plan-details-summery">
    <div class="container">
    <h3>Plan Details</h3>
    	<div class="row">
      <button class="accordion">Benefit Summary</button>
      <div class="panel">
        <div class="panel-inner">
        	<table class="table table-striped">
  <tbody>
  <tr>
      <td colspan="2">Basic Benefits</td>
    </tr>
    <tr>
      <td><strong>Covid-19</strong></td>
      <td><strong>Hospitalization Covered</strong></td>
    </tr>
    <tr>
      <td><strong>Ambulance</strong>	</td>
      <td>Max <strong>$5,000</strong></td>
    </tr>
   <tr>
      <td><strong>Hospitalization</strong><br />
      	<span>(Related to Emergency)</span>
      </td>
      <td>Up to Coverage Amount</td>
    </tr>
  </tbody>
</table>
        </div>
      </div>
      <button class="accordion">Eligibility Requirements</button>
      <div class="panel">
        <div class="panel-inner">
        	ddd
        </div>
      </div>
      
    </div>
    </div>
    </div>
    
</div>
  
</div>
<!-- Form section Ends here -->
@endsection