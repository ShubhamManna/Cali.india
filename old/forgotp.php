<?php
require('top.inc.php');
?>
<br><br><br><br><br>
<main>
<div class="titles">Forgot Password</div>

<br><br>
	<form class="row mx-auto col-md-5" id="f1">
		<br>
			<label for="email" class="form-label">Enter Email</label>
			<input type="email" class="form-control" id="email" name="email">
			<br>
			<div id="forp_err1" class="text-danger login_error"></div>
			<a class="btn col-md-4" onclick='forgot()'>Submit Email</a>
		
	</form>
	<form class="row mx-auto col-md-5" id="f2" style="display: none;" >
		<br>
			<label for="fpotp" class="form-label" >Enter OTP sent to your Email</label>
			<input type="text" maxlength="6" class="form-control col-md-5" id="fpotp" name="fpotp" pattern="[0-9]{6}"required>
			<br>
			<div id="forp_err2" class="text-danger login_error"></div>
			<a class="btn col-md-4" onclick="ver_otp()">Verify OTP</a>
			<a class="btn col-md-4" onclick="forp_back()">Back</a>

	</form>
	<form class="row mx-auto col-md-5" id="f3" style="display: none;">
		<br>
			<label for="npass" class="form-label" >Enter new Password</label>
			<input type="password" class="form-control col-md-5" id="npass" name="npass" required>
			<br>
			<div id="forp_err3" class="text-danger login_error"></div>
			<a class="btn col-md-5" onclick="upd_pass()">Update Password</a>
			<a class="btn col-md-4" onclick="forp_back()">Back</a>
	</form>
</main>
<?php
	include('footer.inc.php');
?>