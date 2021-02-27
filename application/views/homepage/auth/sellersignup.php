<section style="margin-top: 10px;">
  	<div class="container">

  		<div class="card">
  			<div class="card-header">
  				<div class="card-title">
  					<h3 class="card-header">Welcome To E-store</h3>
  				</div>
  			</div>
  		</div>
	  			<?php if ($this->session->flashdata('successmessage')): ?>
	                <div class="callout callout-success" id="hideMsg">
	                  <h4><?php echo $this->session->flashdata('successmessage'); ?><input type="hidden" value="3" name=""></h4>
	                </div>
	            <?php endif ?>

	            <?php if ($this->session->flashdata('errormessage')): ?>
	                <div class="callout callout-danger" id="hideMsg">
	                  <h4><?php echo $this->session->flashdata('errormessage'); ?><input type="hidden" value="3" name=""></h4>
	                </div>
	            <?php endif ?>
  		<div class="row">
	  		<div class="col-md-6">
<form action="<?php echo base_url(); ?>/seller/register" method="post" role="form" id="quickForm">	
	  			<div class="card">
				    <div class="card-body">
			            <div class="card-body">
			            	<div class="form-group">
			                    <label for="exampleInputfirstName">First Name</label>
			                    <input type="text" name="first_name" class="form-control" id="exampleInputfirstName" placeholder="Enter First Name">
			                 </div>
			                 <div class="form-group">
			                    <label for="exampleInputlastName">Last Name</label>
			                    <input type="text" name="last_name" class="form-control" id="exampleInputlastName" placeholder="Enter Last Name">
			                 </div>
			                 <div class="form-group">
			                    <label for="exampleInputmidName">Middle Name</label>
			                    <input type="text" name="mid_name" class="form-control" id="exampleInputmidName" placeholder="Enter Middle Name">
			                 </div>
			            </div>
			        </div>
			    </div>
			    <div class="card">
				    <div class="card-body">
			            <div class="card-body">
			                <div class="form-group">
			                    <label for="exampleInputcontactNo">Contact No.</label>
			                    <input type="number" name="contactNo" class="form-control" id="exampleInputcontactNo" placeholder="Enter Contact No">
			                </div>
			            </div>
			        </div>
			    </div>
			    <div class="card">
				    <div class="card-body">
			            <div class="card-body">
			            	<h4>Choose Current Location</h4>
			                 	<div class="form-group">
			                    	<label><input type="radio" name="current_location" value="1"> Within Metro Manila</label><br>	
			                    	<label><input type="radio" name="current_location" value="2"> Outside Metro Manila</label><br>
			                    	<label><input type="radio" name="current_location" value="3"> Visayas</label><br>
			                    	<label><input type="radio" name="current_location" value="4"> Mindanao</label><br>
			                 	</div>
			            </div>
			        </div>
			    </div>
	  		</div>	
	  		<div class="col-md-6">
	  			<div class="card">
				    <div class="card-body">
			                <div class="card-body">
			                  	<h4>Product Focus</h4>
				                 	<div class="form-group">
				                    	<label><input type="radio" name="product_focus" value="1"> Fashion</label><br>	
				                    	<label><input type="radio" name="product_focus" value="2"> Electronics</label><br>
				                    	<label><input type="radio" name="product_focus" value="3"> Toys Babies & Kids</label><br>
				                    	<label><input type="radio" name="product_focus" value="4"> Healthy and Beauty</label><br>
				                    	<label><input type="radio" name="product_focus" value="5"> Home Appliances</label><br>
				                    	<label><input type="radio" name="product_focus" value="6"> Hobbies, Sports & Motors</label><br>
				                 	</div>
			                </div>
			                <!-- /.card-body -->
				    </div>
				</div>

				<div class="card">
				    <div class="card-body">
			                <div class="card-body">
			                  	<div class="form-group">
				                    <label for="exampleInputEmail1">Email</label>
				                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
				                </div>
				                <div class="form-group">
				                    <label for="exampleInputEmail1">Password</label>
				                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password">
				                </div>
			                </div>
			                <!-- /.card-body -->
				    </div>
				</div>

	  		</div>
  		</div>
  		<button type="submit" class="btn btn-block bg-gradient-primary btn-flat">Save</button>
</form>
  	</div>
</section>
<script type="text/javascript">
	$(document).ready(function () {
	  
	  $('#quickForm').validate({
	    rules: {
		    email: {
		        required: true,
		        email: true,
		    },
		    first_name: {
		        required: true
		    },
		    last_name: {
		        required: true
		    },
		    mid_name: {
		        required: true
		    },
		    contactNo: {
		        required: true
		    },
	      	password: {
	        	required: true,
	        	minlength: 5
	      	}
	    },
	    messages: {
	      	email: {
	        	required: "Please enter a email address",
	        	email: "Please enter a vaild email address"
	      	},
	      	first_name: {
	        	required: "Please enter a First Name"
	      	},
	      	last_name: {
	        	required: "Please enter a Last Name"
	      	},
	      	mid_name: {
	        	required: "Please enter a Middle Name"
	      	},
	      	contactNo: {
	        	required: "Please enter a Contact No"
	      	},
	      	password: {
	        	required: "Please provide a password",
	        	minlength: "Your password must be at least 5 characters long"
	      	},
	      terms: "Please accept our terms"
	    },
	    errorElement: 'span',
	    errorPlacement: function (error, element) {
	      error.addClass('invalid-feedback');
	      element.closest('.form-group').append(error);
	    },
	    highlight: function (element, errorClass, validClass) {
	      $(element).addClass('is-invalid');
	    },
	    unhighlight: function (element, errorClass, validClass) {
	      $(element).removeClass('is-invalid');
	    }
	  });
	});
</script>