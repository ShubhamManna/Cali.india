<?php
require('top.inc.php');
if(!isset($_SESSION['USER_S'])){
	?>
	<script type="text/javascript">
		window.location.href="index.php";
	</script>
  
<?php }
$uid=$_SESSION['U_ID'];
$u_det=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$uid'"));
$opass=$u_det['password'];
if(isset($_POST['update'])){
$oname=get_safe_value($con,$_POST['name']);
$oaddr1=get_safe_value($con,$_POST['addr']);
$oaddr2=get_safe_value($con,$_POST['addr_l2']);  
$olname=get_safe_value($con,$_POST['lname']);
$oemail=get_safe_value($con,$_POST['email']);
$omobile=get_safe_value($con,$_POST['mobile']);
$ocity=get_safe_value($con,$_POST['city']);
$ostate=get_safe_value($con,$_POST['state']);
$opin=get_safe_value($con,$_POST['pin']);
$sql="update users set name='$oname',lname='$olname',mobile='$omobile',email='$oemail',addr='$oaddr1',addr_l2='$oaddr2',city='$ocity',state='$ostate',pin='$opin' where id='$uid'";
  mysqli_query($con,$sql);
  $u_det=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$uid'"));
}
?>

<main class="loginPage">
	<div class="titles container-fluid">
		My Account
	</div>
	<br>
		<form class="row" method="post">
            <div class="logintitles" id="chktlogin">
                Edit User Details
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">Name<font color="red">*</font></label>
            </div>
            <div class="row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="First name *" aria-label="First name" id="name" name="name" value="<?php echo $u_det['name'];?>" required>
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lname" id="lname" value="<?php echo $u_det['lname'];?>">
                </div>
            </div>
            <div class="col-md-12 my-3">
              <label for="email" class="form-label">Email<font color="red">*</font></label>
              <input type="email" class="form-control" placeholder="example@abc.com" name="email" id="email" value="<?php echo $u_det['email'];?>" required>
            </div>
            <div class="col-md-10 my-3">
              <label for="mobile" class="form-label">Contact no. (+91)<font color="red">*</font><font size="1px">&nbsp; ( Do not Add Country Code below )</font></label>
              <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Enter 10 digit no. ex. 1234567890" pattern="[1-9]{1}[0-9]{9}" maxlength="10" value="<?php echo $u_det['mobile'];?>" required>
            </div>
            <div class="col-12 my-3">
              <label for="addr" class="form-label">Address<font color="red">*</font></label>
              <input type="text" class="form-control" name="addr" id="addr" placeholder="1234 Main St" value="<?php echo $u_det['addr'];?>" required>
            </div>
            <div class="col-12 my-3">
              <label for="addr_l2" class="form-label">Address Line 2 / Landmark</label>
              <input type="text" class="form-control" name="addr_l2" id="addr_l2" placeholder="Apartment, studio, or floor" value="<?php echo $u_det['addr_l2'];?>">
            </div>
            <div class="col-md-6 my-3">
              <label for="city" class="form-label">City<font color="red">*</font></label>
              <input type="text" class="form-control" placeholder="Mumbai" name="city" id="city" value="<?php echo $u_det['city'];?>" required>
            </div>
            <div class="col-md-4 my-3">
              <label for="state" class="form-label">State<font color="red">*</font></label>
              <select name="state" id="state" class="form-select" >
                <option disabled>Choose...</option>
                <option value="maharastra" <?php if($u_det['state']=="maharashtra") echo "selected";?>>Maharashtra</option>
                <option value="bihar" <?php if($u_det['state']=="bihar") echo "selected";?>> Bihar</option>
              </select>
            </div>
            <div class="col-md-4 my-3">
              <label for="pin" class="form-label">Pin-Code<font color="red">*</font></label>
              <input type="text" class="form-control" name="pin" id="pin" value="<?php echo $u_det['pin'];?>" required>
            </div>
            <div class="col-12 my-3">
              <button type="submit" name="update" class="btn" >Update Account</button>
            </div>
            
          </form>

          <br><br>

          <form class="row">
            <div class="logintitles" id="chktlogin">
                Update Password
            </div>
            <br>
            <div class="col-md-12">
                <label for="opass" class="form-label">Old Password<font color="red">*</font></label>
            </div>
            <div class="row">
                <div class="col">
                  <input type="Password" class="form-control" placeholder="Old Password" aria-label="Old Password" id="opass" name="opass" value="" required>
                </div>
                </div>
              </div>
              <br>
              <div class="col-md-12">
                <label for="npass" class="form-label">New Password<font color="red">*</font></label>
            </div>
              <div class="row">
                <div class="col">
                  <input type="Password" class="form-control" placeholder="New Password" aria-label="New Password" id="npass" name="npass" value="" required>
                </div>
              </div>
              <br>
              <div class="col-md-12">
                <label for="npass1" class="form-label">Retype New Password<font color="red">*</font></label>
            </div>
              <div class="row">
                <div class="col">
                  <input type="Password" class="form-control" placeholder="Retype New Password" aria-label="New Password" id="npass1" name="npass1" value="" required><br>
                 <div id="repass" class=" login_error">&nbsp;</div>
                </div>
              </div>
              <div class="col-12 my-3">
              <input type="button" class="btn" onclick="repasschk()" value="Change Password">
            </div>
          </form>
	<br>
</main>
<?php
include('footer.inc.php');
?>