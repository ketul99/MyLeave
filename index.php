<?php 
	
	session_start();

	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
	{
	    header("location: " . $_SESSION["type"] . ".php");
	    exit;
	}

	if(isset($_POST["submit"]))
	{
		$user_email = $_POST['user_email'];
		$user_pass = md5($_POST['user_pass']);
		$type = $_POST['type'];

		include 'php/config.php';

		$query = "select * from $type where " . $type . "_id like '$user_email' and " . $type . "_pass like '$user_pass'";
		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) == 1)
		{
			$value = mysqli_fetch_row($result);
			if(!$value[5])
			{
				$error = "Please Verify Your Account!!";
			}
			else
			{
				$_SESSION["loggedin"] = true;
				$_SESSION["type"] = $type;
				$_SESSION["user_email"] = $user_email; 
				header("Location: " . $type . ".php");
			}	
		} 
		else
		{
			$error = "Email and Password Don't Match";
		}

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>MyLeave</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<link rel="icon" type="image/png" href="images/cp.png"/>
</head>
<body>
	<script type="text/javascript" src="js/login_val.js"></script>
	<div class="limiter">
		<div class="container-login">
			<div class="wrap-login">
				<form name="login_form" method="POST" onSubmit="return login_val()" style="width: 100%" action="index.php">
					<span class="icon">
						<img src="images/cp.png">
					</span>
					<span class="form-title" align="center">
						Login
					</span>
					<?php
						if(isset($error))
						{
							echo '<p class="text-danger text-center">'. $error . '</p>';
						}
					?>
					<div class="form-group">
						<input type="text" name="user_email" placeholder="Email" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" name="user_pass" placeholder="Password" class="form-control">
					</div>
					<div align="center" style="margin: 5px 0px;">
						<label class="radio-inline" style="margin: 0px 5px;font-family: Comic Sans MS;"><input type="radio" name="type" value="admin"> Admin</label>
						<label class="radio-inline" style="font-family: Comic Sans MS;"><input type="radio" name="type" value="employee"> Employee</label>
					</div>
					<button type="submit" name="submit" class="btn btn-dark btn-block" style="font-family: Comic Sans MS;">Login</button>
					<div class="bottom">
						<span class="txt">
							Don't have an account?
						</span>
						<a class="txt" href="register_user.php">
							Sign Up
						</a>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>