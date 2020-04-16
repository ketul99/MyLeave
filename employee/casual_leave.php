<?php

	session_start();
	 
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["type"] === "admin")
	{
	    header("location: ../index.php");
	    exit;
	}

	if(isset($_POST["submit"]))
	{
		$user_email = $_SESSION["user_email"]; 
		$leave_type = 'Casual Leave';
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];
		$session = null;
		$leave_reason = $_POST['leave_reason'];
		$file = null;
		$status = 'pending';
		include '../php/request_leave.php';
		header("location: casual_leave.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Casual Leave</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/emp_style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" href="../images/cp.png"/>
</head>
<body>
	<script type="text/javascript" src="../js/casual_leave_val.js"></script>
	<?php

		include 'employee_header_nav.php';

	?>
	<form name="casual_leave" method="POST" onSubmit="return casual_leave_val()" action="casual_leave.php" style="font-family: Comic Sans MS;">
		<br>
		<div class="row" >
			<div class="col-sm-1"></div>
			<div class="col-sm-4">
				<div class="text-center" style="font-size: 20px;">
					Casual Leave Application
				</div>
				<div class="form-group">
					<label for="from_date">From Date:</label>
					<input type="text" name="from_date" placeholder="DD/MM/YYYY" class="form-control">	
				</div>
				<div class="form-group">
					<label for="to_date">To Date:</label>
					<input type="text" name="to_date" placeholder="DD/MM/YYYY" class="form-control">	
				</div>
				<div class="form-group">
					<label for="leave_reason">Reason for Leave:</label>
					<textarea name="leave_reason" placeholder="Enter Reason" class="form-control" rows="3" style="resize: none;"></textarea>	
				</div>
				<div class="text-center">
					<button type="submit" name="submit" class="btn btn-dark">Submit</button>		
				</div>
			</div>
			<div class="col-sm-1"></div>
			<div class="col-sm-5">
				<?php 
					$leave_type = 'Casual Leave';
					include '../php/retrive.php' 

				?>
   			</div>		
			</div>
	</form>
</body>
</html>