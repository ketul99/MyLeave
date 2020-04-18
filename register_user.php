<?php 
	
	if(isset($_POST["submit"]))
	{
		$name = $_POST['name'];
		$user_emp_id = strtoupper($_POST['user_emp_id']);
		$user_mob = $_POST['user_mob'];
		$user_email = $_POST['user_email'];
		$user_pass = md5($_POST['user_pass']);
		$enc_id = openssl_encrypt($user_emp_id, "Encryption Method", 
			"Encryption Key(String)", 0, 'Encryption IV(16 Digit Number)');

		include 'php/config.php';

		$query = "insert into employee (name, employee_code, employee_mob, employee_id, employee_pass) values ('$name','$user_emp_id','$user_mob','$user_email','$user_pass')";
		
		if($conn->query($query) === TRUE)
		{
			$message_body = "Please confirm your account registration by clicking the link : <a href='http://(YOUR IP ADDRESS/DOMAIN NAME)/myleave/php/verification.php?id=" . $enc_id . "'>Click Here</a><br><br><p>--<br>Regards,<br>MyLeave(Pearson Hardman)<br>+91 XXXXX XXXXX</p>";
			$mail_status = sendverification($user_email,$message_body);
			echo '<script type="text/javascript">alert("Check Your Inbox for Email Verification");window.location = "index.php";</script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("Account Already Exist");window.location = "register_user.php";</script>';
		}
	}
	function sendverification($email,$message_body) {
	  require('php/phpmailer/class.phpmailer.php');
	  require('php/phpmailer/class.smtp.php');

	  $mail = new PHPMailer();
	  $mail->IsSMTP();
	  $mail->SMTPAuth = true;
	  $mail->SMTPSecure = "tls";
	  $mail->Port     = 587;
	  $mail->Mailer   = "smtp";
	  $mail->Host     = "smtp.gmail.com"; //For Gmail

	  $mail->Username = "Your Email";
	  $mail->Password = "Your Password";
	  
	  $mail->SetFrom("Your Email","Your/Organization Name");
	  $mail->AddAddress($email);
	  $mail->Subject = "Email Verification";
	  $mail->MsgHTML($message_body);
	  $mail->IsHTML(true);  
	  $result = $mail->Send();
	  return $result;
 }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<link rel="icon" type="image/png" href="images/cp.png"/>
</head>
<body>
	<script type="text/javascript" src="js/register_val.js"></script>
	<div class="limiter">
		<div class="container-login">
			<div class="wrap-login">
				<form name="register_form" method="POST" onSubmit="return register_val()" style="width: 100%" >
					<span class="form-title" align="center">
						Register
					</span>
					<div class="form-group">
						<input type="text" name="name" placeholder="Name" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="user_emp_id" placeholder="Employee ID" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="user_mob" placeholder="Mobile" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="user_email" placeholder="Email" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" name="user_pass" placeholder="Password" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" name="user_pass_conf" placeholder="Confirm Password" class="form-control">
					</div>
					<button type="submit" name="submit" class="btn btn-dark btn-block">Register</button>
					<div class="bottom">
						<span class="txt">
							Already have an account?
						</span>
						<a class="txt" href="index.php">
							Sign In
						</a>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>