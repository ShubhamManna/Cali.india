<?php
require('connection.inc.php');
require('functions.inc.php');
$uid=$_SESSION['U_ID'];
$pass=get_safe_value($con,$_POST['npass']);
mysqli_query($con,"update users set password='$pass' where id='$uid'");
if(mysqli_affected_rows($con)>0){
	echo "pass";
}
else{
	echo "fail";
}
?>