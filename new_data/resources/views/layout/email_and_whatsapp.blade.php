<div class="row">
    	<div class="col-lg-12">
        	<div class="get-email">
            	<a href="#" id="EmailBtn">Email/Text these rates</a>
            </div>
			
			<div class="emailData" id="HiddnData">
				<a href="#" class="CloseBtn" id="DismissBtn"> <i class="fa fa-close"></i> </a>
			<h3>Get an Email/Text</h3>
				<form action="{{url('email-and-whatsapp-post')}}" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Your Name" name="name">
                        </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="form-group">
                            <input type="email" class="form-control"  placeholder="Email" name="email" required>
                        </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="form-group">
                            <input type="text" class="form-control" id="myInput" placeholder="Canadian Phone" name="mobile">
                            <span>Canadian Phone number only.</span>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <!-- <input type="submit" class="SendBtn" value="EMAIL/TEXT"> -->
                            <button class="SendBtn" value="1" name="send_type">EMAIL/TEXT</button>
                           
                            <a href="#" class="SendBtn" id="WhtsBtn" style="display: none">WHATSAPP</a>
                        </div>
                    </div>
		        </form>
			</div>
			
        </div>
    </div>