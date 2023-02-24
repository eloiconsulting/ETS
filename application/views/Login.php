<?php 
	include('template/header.php');?>

<?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div> 
        <?php } ?>
	 <div class="container">
	 	<div class="row">
	 		<div class="col-4"></div>
	 		<div class="col-lg-5 col-md-5 col-sm-4 col-sx-4 mt-5">
	 			<div class="card box_shadow">
				 <h2 align="center">Login</h2>
				  <div class="card-body">
				    <form name="login" id="login" method="post" action="" >
				    	<div class="imgcontainer">
						    <img src="<?php echo base_url();?>assets/images/eloi_icon.png" alt="Avatar" class="avatar">
						  </div>

						  <div class="container">
						    <label for="email"><b>Username</b></label>
						    <input type="text" name="email" id="email" placeholder="Enter Username"  required>
						    <br>
						    <label for="password"><b>Password</b></label>
						    <input type="password" name="password" id="password" placeholder="Enter Password" required>
						        
						    <button type="submit" id="submit">Login</button>
						    <label>
						      <input type="checkbox"  name="remember"> Remember me
						    </label>
						  </div>

						  <div class="container" style="background-color:transparent;">
						    <button type="button" class="cancelbtn"><a href="<?php echo base_url();?>LoginCtrl/registration">SignUp</a></button>
						    <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
						  </div>
				    </form>
				  </div>
				</div>
	 		</div>
	 		
	 	</div>
	 </div>
<?php include('template/footer.php');?>

<script>
	$(document).ready(function(){
		$("#login").validate({
    
    rules: {
     
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 5
      }
    },
    
    messages: {
      
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      email: "Please enter a valid email address"
    },
   
    
  });

		$("#login").submit(function(){
			var username = $("#email").val();
			var password = $("#password").val();

			$.ajax({
				type : 'POST',
				url : '<?php echo base_url();?>LoginCtrl/Loginvalidation',
				data : {username : username,password : password},
				dataType : 'json',
				success:function(data){
					console.log(data);
					if(data == false){
						toastr.error("Oops wrong Details Enterd!");
						setTimeout(function(){// wait for 5 secs(2)
				            //window.location.href = "<?php echo base_url();?>LoginCtrl/index" ;
				      }, 2000);
					}else{
						toastr.success("Login Successfully");
						setTimeout(function(){// wait for 5 secs(2)
				            window.location.href = "<?php echo base_url();?>DashboardCtrl/index" ;
				      }, 2000);
					}
					
				}
			});
			return false;
		});
	});
</script>