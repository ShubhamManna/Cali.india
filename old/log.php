<?php
require('connection.inc.php');
require('functions.inc.php');
$email=get_safe_value($con,$_POST['email']);
$pass=get_safe_value($con,$_POST['pass']);
$chk=mysqli_query($con,"select * from users where email='$email' and password='$pass'");
$check_user=mysqli_num_rows($chk);
if($check_user>0){
	$row=mysqli_fetch_assoc($chk);
	$_SESSION['USER_S']='y';
	$_SESSION['U_ID']=$row['id'];
	$_SESSION['U_NAME']=$row['name'];
	echo "match";
}
else{
	echo "fail";
}
?>