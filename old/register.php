<?php
require('connection.inc.php');
require('functions.inc.php');
$name=get_safe_value($con,$_POST['name']);
$email=get_safe_value($con,$_POST['email']);
$pass=get_safe_value($con,$_POST['pass']);
$lname=get_safe_value($con,$_POST['lname']);
$addr=get_safe_value($con,$_POST['addr']);
$addr_l2=get_safe_value($con,$_POST['addr_l2']);
$state=get_safe_value($con,$_POST['state']);
$city=get_safe_value($con,$_POST['city']);
$pin=get_safe_value($con,$_POST['pin']);
$mobile=get_safe_value($con,$_POST['mobile']);
$check_user=mysqli_num_rows(mysqli_query($con,"select * from users where email='$email'"));
if($check_user>0)
	echo "already";
else{
	$time=date('Y-n-j g:i:s');
	mysqli_query($con,"insert into users(name,password,email,mobile,added_on,lname,addr,addr_l2,state,city,pin) values('$name','$pass','$email','$mobile','$time','$lname','$addr','$addr_l2','$state','$city','$pin')");
	echo "success";
}
?>