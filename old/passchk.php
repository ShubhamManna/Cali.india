<?php
require('connection.inc.php');
require('functions.inc.php');
$uid=$_SESSION['U_ID'];
$pass=get_safe_value($con,$_POST['opass']);
$chk=mysqli_query($con,"select password from users where id='$uid' and password='$pass'");
$check_user=mysqli_num_rows($chk);
if($check_user>0){
	echo "pass";
}
else{
	echo "fail";
}
?>