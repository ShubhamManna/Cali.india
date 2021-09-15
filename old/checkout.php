<?php
require('top.inc.php');
if(!isset($_SESSION['cart']) || ($tp<=0)){
	?>
	<script type="text/javascript">
		window.location.href="index.php";
	</script>
	<?php
}
$total=0;
foreach ($_SESSION['cart'] as $key => $value ){
  $prod=get_product($con,'','','','',$key);
  $price=$prod[0]['price'];
  $tq=0;
  foreach ($value as $size => $qty){
    $tq=$tq+$qty['qty'];
  }
  $tpr=$tq*$price;
  $total=$total+$tpr;
}
$total=$total+100;
$uid=$_SESSION['U_ID'];
$u_det=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$uid'"));
//prx($u_det);
if(isset($_POST['submit'])){
  $ofname=$_POST['name'];
  $olname=$_POST['lname'];
  $oaddr1=$_POST['addr'];
  $oaddr2=$_POST['addr_l2'];
  $tname=$ofname." ".$olname;
  $taddr=$oaddr1.", ".$oaddr2;

  $oname=get_safe_value($con,$tname);
  $oaddr=get_safe_value($con,$taddr);
  $oemail=get_safe_value($con,$_POST['email']);
  $omobile=get_safe_value($con,$_POST['mobile']);
  $ocity=get_safe_value($con,$_POST['city']);
  $ostate=get_safe_value($con,$_POST['state']);
  $opin=get_safe_value($con,$_POST['pin']);
  $op_type=get_safe_value($con,$_POST['p_type']);
  $pay_status="pending";
  $ord_status="pending";
  $oadded_on=date('Y-n-j g:i:s');
  mysqli_query($con,"insert into orders(user_id,name,email,mobile,addr,city,state,pin,total_price,payment_type,payment_status,order_status,added_on) values ('$uid','$oname','$oemail','$omobile','$oaddr','$ocity','$ostate','$opin','$total','$op_type','$pay_status','$ord_status','$oadded_on')");
  $order_id=mysqli_insert_id($con);
  foreach ($_SESSION['cart'] as $key => $value ) {
  $prod=get_product($con,'','','','',$key);
  $price=$prod[0]['price'];
  $tq=0;
  $qtyxs="| ";
  foreach ($value as $size => $qty){
    $tq=$tq+$qty['qty'];
    $qtyxs=$qtyxs.$qty['qty']." x ".$size." | ";
  }
  $tpr=$tq*$price;
  mysqli_query($con,"insert into order_details(order_id,product_id,qty_x_size,price) values ('$order_id','$key','$qtyxs',$tpr)");
}
unset($_SESSION['cart']); ?>
<script type="text/javascript">
    window.location.href="thankyou.php";
  </script><?php
}
?>
<br><br><br>

<main class="loginPage">
	<div class="titles container-fluid">
		Checkout
	</div>
	<br>
	
	<?php if(!isset($_SESSION['USER_S'])){
		echo "<div class='titles' style='border-bottom: 0px'>
				Please Login to Continue.<br>
				<div class='container'>
					<a href='login.php?lid=1' class='btn'>&nbsp;Login/Register&nbsp;</a>
				</div>
			</div>
		</div>";
	}
	else{ ?>
		<form class="row" method="post">
            <div class="logintitles" id="chktlogin">
                Fill All The Details
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
                <option value="maharashtra" <?php if($u_det['state']=="maharashtra") echo "selected";?>>Maharashtra</option>
                <option value="bihar" <?php if($u_det['state']=="bihar") echo "selected";?>> Bihar</option>
              </select>
            </div>
            <div class="col-md-4 my-3">
              <label for="pin" class="form-label">Pin-Code<font color="red">*</font></label>
              <input type="text" class="form-control" name="pin" id="pin" value="<?php echo $u_det['pin'];?>" required>
            </div>
            <div class="col-md-8 my-3">
              <label class="form-label">Payment Type<font color="red">*</font></label>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="payment" value="payu" name="p_type" checked>
                <label for="p_type" class="form-check-label">PayU (Online Payment)</label>
                <br>
                <label class="form-check-label">Cash on Delivery (Not Available)</label>
              </div>
            </div>
            <div class="col-12 my-3">
              <button type="submit" name="submit" class="btn" >Pay $ <?php echo $total; echo "*<br>(inc. of all taxes)";?></button>
              <br><br>
              <span><?php echo "*$".$total-100?> (Total Price) + $100 for Delivery Charges.</span>
            </div>
          </form>

	<?php }
	?>
	<br>
	<div class="container">
		<a href='cart.php' class="btn">&nbsp;❮ Back to cart&nbsp;</a>
	</div>
</main>
<?php
include('footer.inc.php');
?>

<!--(
    [name] => Mayank
    [lname] => Vinayak
    [email] => mayankvinayak8406@gmail.com
    [mobile] => 1234560789
    [addr] => Jaggi ka Chauraha , Mughalpura ,Patna City , Patna
    [addr_l2] => Near Azad Shadi Mahal
    [city] => Patna
    [state] => br
    [pin] => 800008
    [p_type1] => payu
    [submit] => 
)-->