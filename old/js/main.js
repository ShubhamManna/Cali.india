function user_login(id=0){
	jQuery('.login_error').html('&nbsp');
	var email=jQuery('#login_email').val();
	var pass=jQuery('#login_pass').val();
	var is_er='';
	if(email==""){
		jQuery("#log_email").html("Please enter email !");
		is_er='yes';
	}
	if(pass==""){
		jQuery("#log_pass").html("Please enter password !");
		is_er='yes';
	}
	if(is_er==''){
		jQuery.ajax({
			url:'log.php',
			type:'post',
			data:'email='+email+'&pass='+pass,
			success:function(result){
				if(result=='match'){
					jQuery("#log_status").html("Login Successful!");
					if(id==1)
						window.location.href='checkout.php';
					else
					window.location.href='index.php';
				}
				else if(result=='fail')
					jQuery("#log_status").html("Wrong Email/Password!");
				else
					jQuery("#log_status").html(result);
			}
		});
	}
}

function user_reg(){
	jQuery('.field_error').html('&nbsp;');
	var name=jQuery("#name").val();
	var lname=jQuery("#lname").val();
	var email=jQuery("#email").val();
	var pass=jQuery("#pass").val();
	var addr=jQuery("#addr").val();
	var addr_l2=jQuery("#addr_l2").val();
	var city=jQuery("#city").val();
	var state=jQuery("#state").val();
	var pin=jQuery("#pin").val();
	var mobile=jQuery('#mobile').val();
	var is_er="";
	if(name==""){
		jQuery('#reg_name_error').html('Please enter Name');
		is_er="yes";
	}
	if(email==""){
		jQuery("#reg_email_error").html("Please enter email !");
		is_er='yes';
	}
	if(pass==""){
		jQuery("#reg_pass_error").html("Please enter password !");
		is_er='yes';
	}
	if(is_er==''){
		jQuery.ajax({
			url:'chkemail.php',
			type:'post',
			data:'chk=chk',
			success:function(result){
				if(result=='ok'){
					jQuery.ajax({
					url:'register.php',
					type:'post',
					data:'name='+name+'&lname='+lname+'&email='+email+'&pass='+pass+'&mobile='+mobile+'&addr='+addr+'&addr_l2='+addr_l2+'&city='+city+'&state='+state+'&pin='+pin,
					success:function(result){
					if(result=='success')
						jQuery("#reg_status").html("Thank you for registeration. Now you can login.");
					else if(result=='already')
						jQuery("#reg_status").html("Email already exists");
					else
						jQuery("#reg_status").html(result);
						}
					});
				}
				else if(result=='not_ok')
					jQuery("#reg_status").html("Email is not verified.");
				else
					jQuery("#reg_status").html(result);
			}
		});
	}
}


/**First SLider */
$(".vibes-slider-one")
.not(".slick-initialized")
.slick({
    slidesToShow: 2,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: ".site-slider .slider-btn .prev",
    nextArrow: ".site-slider .slider-btn .next"
});
/**First SLider */
$(".slider-one")
.not(".slick-initialized")
.slick({
    slidesToShow: 2,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: true,
    prevArrow: ".site-slider .slider-btn .prev",
    nextArrow: ".site-slider .slider-btn .next"
});

function manage_cart(pid,type){
	var qty=jQuery("#prod_qty").val();
	var size=jQuery("#prod_size").val();
		jQuery.ajax({
			url:'manage_cart.php',
			type:'post',
			data:'pid='+pid+'&qty='+qty+'&size='+size+'&type='+type,
			success:function(result){
				jQuery('no_prod').html(result);
			}
		});
}
function goback(){
	window.history.back();
}
function repasschk(){
	var npass=jQuery('#npass').val();
	var npass1=jQuery('#npass1').val();
	var opass=jQuery('#opass').val();
	if(opass!=''){
		jQuery.ajax({
			url:'passchk.php',
			type:'post',
			data:'opass='+opass,
			success:function(result){
				if(result=='pass'){
					jQuery("#repass").html("Old Password Matched");
					jQuery('#repass').css('color','green');
					if(npass==npass1 && npass!=''){
						jQuery.ajax({
							url:'updatepass.php',
							type:'post',
							data:'npass='+npass,
							success:function(result1){
							jQuery('#repass').append('<br>Updated Password Successfully.');
							jQuery('#repass').css('color','green');
							}
						});
					}
					else{
						jQuery('#repass').append('<br>But New Passwords do not match.');
						jQuery('#repass').css('color','red');
					}
				}
				else if(result=='fail'){
					jQuery("#repass").html("Wrong Password. Please Try again.");
					jQuery('#repass').css('color','red');

				}
				else
					jQuery("#repass").html(result);
					jQuery('#repass').css('color','red');
			}
		});
	}
}
function forgot(){
	var email=jQuery('#email').val();
	if(email!=''){
		jQuery("#forp_err1").html("Sending OTP.....");
		jQuery.ajax({
			url:'chkemail.php',
			type:'post',
			data:'email='+email,
			success:function(result){
				if(result=='match_done'){
					jQuery("#f1").css("display","none");
					jQuery("#f2").css("display","block");
					jQuery("#forp_err2").html("OTP sent to your given Email.");
				}
				else if(result=='match_not_done'){
					jQuery("#forp_err1").html("Could not send OTP right now, Please try again later.");
				}
				else if(result=='mismatch'){
					jQuery("#forp_err1").html("Email not found. Please enter a registered Email.");
				}
				else{
					jQuery("#forp_err1").html(result);
				}
			}
		});
	}
}
function ver_otp(){
	var otp=jQuery("#fpotp").val();
	if(otp!=''){
		jQuery.ajax({
			url:'chkemail.php',
			type:'post',
			data:'otp='+otp,
			success:function(result){
				if(result=='otp_match'){
					jQuery("#f2").css("display","none");
					jQuery("#f3").css("display","block");
					jQuery("#forp_err3").html("OTP verified. Now enter your new password.");
				}
				else if(result=='mismatch'){
					jQuery('#forp_err2').html("Wrong OTP Entered. Please try again.")
				}
				else
					jQuery("#forp_err2").html(result);
			}
		});
	}
}
function upd_pass(){
	var pass=jQuery("#npass").val();
	if(pass!=''){
		jQuery.ajax({
			url:'chkemail.php',
			type:'post',
			data:'pass='+pass,
			success:function(result){
				if(result=='pass'){
					jQuery("#forp_err3").html("Password Updated. Login to continue.");
				}
				else if(result=='fail')
					jQuery("#forp_err3").html("Can't update Password. Please check Email once.");
				else
					jQuery('#forp_err3').html(result);
			}
		});
	}
}
function forp_back(){
	jQuery("#f2").css("display","none");
	jQuery('#f3').css("display","none");
	jQuery("#f1").css("display","block");
	jQuery("#forp_err1").html("");
	jQuery("#forp_err2").html("");
	jQuery("#forp_err3").html("");
}
function reg_otp(){
	var email=jQuery('#email').val();
	if(email!=''){
		jQuery("#reg_email_error").html("Sending OTP.....");
		jQuery.ajax({
			url:'chkemail.php',
			type:'post',
			data:'regemail='+email,
			success:function(result){
				if(result=='sent'){
					jQuery("#sendotp").html("Resend OTP");
					jQuery("#reg_email_otp").css("display","block");
					jQuery("#reg_email_error").html("OTP sent to your given Email.");
				}
				else if(result=='not_sent'){
					jQuery("#reg_email_error").html("Could not send OTP right now, Please try again later.");
				}
				else{
					jQuery("#reg_email_error").html(result);
				}
			}
		});
	}
	else
		jQuery("#reg_email_error").html("Please Enter Email.");
}
function ver_reg_otp(){
	var otp=jQuery("#votp").val();
	if(otp!=''){
		jQuery.ajax({
			url:'chkemail.php',
			type:'post',
			data:'votp='+otp,
			success:function(result){
				if(result=='otp_match'){
					jQuery("#reg_email_otp").css("display","none");
					jQuery("#reg_email_error").html("OTP verified. Email is verified.");
					jQuery("#sendotp").html("Send OTP");
				}
				else if(result=='mismatch'){
					jQuery('#reg_email_error').html("Wrong OTP Entered. Please try again.")
				}
				else
					jQuery("#reg_email_error").html(result);
			}
		});
	}
}