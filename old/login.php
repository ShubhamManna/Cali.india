<?php
require('top.inc.php');
if(!isset($_GET['lid']))
  $lid=0;
else
  $lid=$_GET['lid'];
if($lid!=1)
  $lid=0;
?>
<?php
if(isset($_SESSION['USER_S'])){
  echo "<script>window.location.href='myaccount.php'</script>";
} 
else { ?>
<main class="loginPage">
        <form class="row ">
            <div class="logintitles">
                SIGN IN
            </div>
            <div class="col-md-12">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control" id="login_email">
              <span id="log_email" class="text-danger login_error">&nbsp;</span>
            </div>
            <div class="col-md-12 my-1">
              <label for="inputPassword4" class="form-label">Password</label>
              <input type="password" class="form-control" id="login_pass">
              <div id="log_pass" class="text-danger login_error">&nbsp;</div>
            </div>
            <div class="col-12 my-1">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="col-12 my-1">
              <button type="button" class="btn" onclick="user_login(<?php echo $lid;?>)">Sign in</button>
              <span id="log_status" class="text-danger login_error">&nbsp;</span>
            </div>
            <div class="col-12 my-1">
              <a href="forgotp.php" class="btn"><font size="-2px">Forgot Password ?</font></a>
            </div>
          </form>
          <div class="mx-5 my-3">
              New User? Register Instead
          </div>
          <form class="row ">
            <div class="logintitles">
                REGISTER
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">Name<font color="red">*</font></label>
            </div>
            <div class="row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="First name *" aria-label="First name" id="name">
                  <span id="reg_name_error" class="text-danger field_error">&nbsp;</span>
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" id="lname">
                </div>
            </div>
            <div class="col-md-12 my-3">
              <label for="inputEmail4" class="form-label">Email<font color="red">*</font></label>
              <input type="email" class="form-control" placeholder="example@abc.com" id="email">
              <span id="reg_email_error" class="text-danger field_error">&nbsp;</span>
              <br>
              <a class="btn col-md-3" id="sendotp" onclick="reg_otp()">Send Otp</a>
            </div>
            <div class="col-md-12 my-3" id="reg_email_otp" style="display: none;">
              <label for="votp" class="form-label">OTP<font color="red">*</font></label>
              <input type="text" maxlength="6" pattern="[0-9]{6}" class="form-control" id="votp" name="votp">
              <br>
              <a class="btn col-md-3" onclick="ver_reg_otp()">Verify Otp</a>
            </div>
            <div class="col-md-12 my-3">
              <label for="inputPassword4" class="form-label">Password<font color="red">*</font></label>
              <input type="password" class="form-control" id="pass">
              <span id="reg_pass_error" class="text-danger field_error">&nbsp;</span>
            </div>
            <div class="col-md-8 my-3">
              <label for="inputMobile" class="form-label">Contact no. (+91)</label>
              <input type="tel" class="form-control" id="mobile" placeholder="Enter 10 digit no. ex. 1234567890" pattern="[1-9]{1}[0-9]{9}" maxlength="10" required>
            </div>
            <div class="col-12 my-3">
              <label for="inputAddress" class="form-label">Address</label>
              <input type="text" class="form-control" id="addr" placeholder="1234 Main St" >
            </div>
            <div class="col-12 my-3">
              <label for="inputAddress2" class="form-label">Address Line 2 / Landmark</label>
              <input type="text" class="form-control" id="addr_l2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-md-6 my-3">
              <label for="inputCity" class="form-label">City</label>
              <input type="text" class="form-control" placeholder="Mumbai" id="city">
            </div>
            <div class="col-md-4 my-3">
              <label for="inputState" class="form-label">State</label>
              <select id="state" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
            <div class="col-md-4 my-3">
              <label for="inputZip" class="form-label">Pin-Code</label>
              <input type="text" class="form-control" id="pin">
            </div>
            <div class="col-12 my-3">
              <button type="button" class="btn" onclick="user_reg()">Register</button>
              <span id="reg_status" class="text-danger field_error">&nbsp;</span>
            </div>
          </form>
    </main>
<?php }
include('footer.inc.php');
?>