<?php
require('connection.inc.php');
require('functions.inc.php');

if(isset($_POST['email'])){
$email=get_safe_value($con,$_POST['email']);

if($email!=''){
	$_SESSION['omail']=$email;
	$ce=mysqli_query($con,"select email from users where email='$email'");
	$cnt=mysqli_num_rows($ce);
	if($cnt>0){
		$otp=rand(100000,999999);
		$_SESSION['eotp']=$otp;
		$html="$otp is your otp for password reset for Cali account. If it isn't you please reset your password ASAP.";	
		include('smtp/PHPMailerAutoload.php');
		$mail=new PHPMailer(true);
		$mail->isSMTP();
		$mail->Host="smtp.gmail.com";
		$mail->Port=587;
		$mail->SMTPSecure="tls";
		$mail->SMTPAuth=true;
		$mail->Username="foroutsidepurpose";
		$mail->Password="M@yank8406";
		$mail->SetFrom("foroutsidepurpose@gmail.com");
		$mail->addAddress($email);
		$mail->IsHTML(true);
		$mail->Subject="New OTP";
		$mail->Body=$html;
		$mail->SMTPOptions=array('ssl'=>array(
			'verify_peer'=>false,
			'verify_peer_name'=>false,
			'allow_self_signed'=>false
		));
		if($mail->send())
			echo "match_done";
		else
			echo "match_not_done";
	}
	else
		echo "mismatch";
}
}
if(isset($_POST['otp'])){
$uotp=get_safe_value($con,$_POST['otp']);
$otp=$_SESSION['eotp'];

if($uotp!=''){
	if($uotp==$otp){
		echo "otp_match";
		$_SESSION['osts']='match';
	}
	else{
			echo "mismatch";
			$_SESSION['osts']='mismatch';
		}
}
}
if(isset($_POST['pass'])){
$pass=get_safe_value($con,$_POST['pass']);
$osts=$_SESSION['osts'];
$omail=$_SESSION['omail'];
$op=mysqli_fetch_assoc(mysqli_query($con,"select password from users where email='$omail'"));
if($op['password']==$pass)
		echo "New Password can't be old Password.";
else{
if($osts=='match'){
	mysqli_query($con,"update users set password='$pass' where email='$omail'");
	if(mysqli_affected_rows($con)>0){
		echo "pass";
		}
	
	else{
		echo "fail";
		}
}
else if($osts=='mismatch'){
	echo "Please enter Email again and try.";
	}
	unset($_SESSION['omail']);
	unset($_SESSION['eotp']);
	unset($_SESSION['osts']);
	}
}
if(isset($_POST['regemail'])){
	$email=get_safe_value($con,$_POST['regemail']);
	if($email!=''){
		$otp=rand(100000,999999);
		$_SESSION['regotp']=$otp;
		$html="$otp is your otp for verifying your email for Cali account.";	
		include('smtp/PHPMailerAutoload.php');
		$mail=new PHPMailer(true);
		$mail->isSMTP();
		$mail->Host="smtp.gmail.com";
		$mail->Port=587;
		$mail->SMTPSecure="tls";
		$mail->SMTPAuth=true;
		$mail->Username="foroutsidepurpose";
		$mail->Password="M@yank8406";
		$mail->SetFrom("foroutsidepurpose@gmail.com");
		$mail->addAddress($email);
		$mail->IsHTML(true);
		$mail->Subject="New OTP";
		$mail->Body=$html;
		$mail->SMTPOptions=array('ssl'=>array(
			'verify_peer'=>false,
			'verify_peer_name'=>false,
			'allow_self_signed'=>false
		));
		if($mail->send())
			echo "sent";
		else
			echo "not_sent";
	}
}
if(isset($_POST['votp'])){
$votp=get_safe_value($con,$_POST['votp']);
$otp=$_SESSION['regotp'];
if($votp!=''){
	if($votp==$otp){
		echo "otp_match";
		$_SESSION['vosts']='match';
		unset($_SESSION['regotp']);
	}
	else{
			echo "mismatch";
			$_SESSION['vosts']='mismatch';
		}
		
	}
}
if(isset($_POST['chk'])){
if(isset($_SESSION['vosts']))
{
	$sts=$_SESSION['vosts'];
	if($sts=='match'){
			echo "ok";
			unset($_SESSION['vosts']);
		}
		else if($vosts=='mismatch'){
			echo "not_ok";
		}
		else
			echo "Some technical error. Please retry verifying.";
}
else
	echo "Please verify email first.";
}
?>