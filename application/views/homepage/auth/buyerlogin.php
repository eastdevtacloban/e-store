<section style="margin-top: 10px;">
  	<div class="container">
  		<div class="row">
	  		<div class="col-md-6">
	  			
	  		</div>	
	  		<div class="col-md-6">
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
	  			<div class="card">
	  				<div class="card-header">
	  					<div class="card-title">
				    		<h3>Login</h3>
	  					</div>
	  				</div>
				    <div class="card-body">


				    	<form action="<?php echo base_url(); ?>welcome/login" method="post" role="form" id="quickForm">
			                <div class="card-body">
			                  	<div class="form-group">
			                    	<label for="exampleInputEmail1">Email address</label>
			                    	<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
			                  	</div>
			                  	<div class="form-group">
			                    	<label for="exampleInputPassword1">Password</label>
			                    	<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			                  	</div>
			                </div>
			                <!-- /.card-body -->
			                <div class="card-footer">
			                  <button type="submit" class="btn btn-primary form-control" name="login">Submit</button>
			                </div>
			            </form>
				    </div>
				</div>
	  		</div>
  		</div>
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
	      	password: {
	        	required: true,
	        	minlength: 5
	      	},
	      	terms: {
	        	required: true
	      	},
	    },
	    messages: {
	      	email: {
	        	required: "Please enter a email address",
	        	email: "Please enter a vaild email address"
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