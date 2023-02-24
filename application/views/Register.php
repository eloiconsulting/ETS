<?php 
  include('template/header.php');?>


   <div class="container">
            <div class="row">
                  <div class="col-4"></div>
                  <div class="col-lg-5 col-md-5 col-sm-4 col-sx-4 mt-5">
                        <div class="card box_shadow">
                         <h2 align="center">Register</h2>
                          <div class="card-body">
                            <form name="signup" id="signup" method="post" action="" >
                              <div class="imgcontainer">
                                        <img src="<?php echo base_url();?>assets/images/eloi_icon.png" alt="Avatar" class="avatar">
                                      </div>

                                      <div class="container">
                                        <label for="username"><b>Username</b></label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username"  required>
                                        <br>
                                        <label for="email"><b>Email</b></label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email"  required>
                                        <br>
                                        <label for="password"><b>Password</b></label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
                                            
                                        <button type="submit" id="submit">Register</button>
                                        <label>
                                          <!-- <input type="checkbox" checked="checked" name="remember"> Remember me -->
                                        </label>
                                      </div>

                                      <div class="container" style="background-color:transparent;">
                                        <button type="button" class="cancelbtn" style="color:#000">Already have an acoount click here<a href="<?php echo base_url();?>LoginCtrl/index"> <u>SignIn</u></a></button>
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
  //   $("#signup").validate({
    
  //   rules: {
  //     username: {
  //       required: true
  //     },
  //     email: {
  //       required: true,
  //       email: true
  //     },
  //     password: {
  //       required: true,
  //       minlength: 5
  //     }
  //   },
    
  //   messages: {
  //     username:{
  //       required:"Please enter a User Name"
  //     },
  //      email: {
  //       required:"Please enter a email address",
  //       email: "Enter a Valid email"
  //     },
  //     password: {
  //       required: "Please provide a password",
  //       minlength: "Your password must be at least 5 characters long"
  //     }

  //   },
   
    
  // });

    $("#signup").submit(function(){
      
      var uname = $("#username").val();
      
      var email = $("#email").val();
      var password = $("#password").val();

      $.ajax({
        type : 'POST',
        url : '<?php echo base_url();?>LoginCtrl/addregisterdata',
        data : {uname : uname,email : email,password : password},
        dataType : 'json',
        success:function(data){
          console.log(data);
          if(data == false){
            toastr.error("Oops User Not Register!");
            setTimeout(function(){// wait for 5 secs(2)
                    //window.location.href = "<?php echo base_url();?>LoginCtrl/index" ;
              }, 2000);
          }else{
            toastr.success("User Register Successfully");
            setTimeout(function(){// wait for 5 secs(2)
                    window.location.href = "<?php echo base_url();?>LoginCtrl/index" ;
              }, 2000);
          }
          
        }
      });
      return false;
    });
  });
</script>