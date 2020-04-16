<?php

	include 'config.php';

	$dec_id = mysqli_real_escape_string($conn,$_GET['id']);
	$employee_code = openssl_decrypt ($dec_id, "Encryption Method", 
	"Encryption Key(String)", 0, 'Encryption IV(16 Digit Number)');
	mysqli_query($conn,"UPDATE employee set verification_status='1' where employee_code='$employee_code'");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Account Verified</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<link rel="icon" type="image/png" href="../images/cp.png"/>
</head>
<body>
	<div class="limiter">
		<div class="container-login">
			<div class="wrap-login">
				<form name="verification" method="POST" style="width: 100%">
					<span class="form-text" align="center">
						Your Account Verified Successfully..!!
					</span>
					<br>
					<div class="text-center">
					<button type="submit" class="btn btn-dark" formaction="../index.php">Sign In</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>