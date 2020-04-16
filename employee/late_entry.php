<?php

	session_start();
	 
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["type"] === "admin")
	{
	    header("location: index.php");
	    exit;
	}

	if(isset($_POST["submit"]))
	{
		$user_email = $_SESSION["user_email"]; 
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];
		$time = $_POST['time'];
		$late_entry_reason = $_POST['late_entry_reason'];
		$status = 'pending';

		include '../php/config.php';

		$select_query = "select employee_code from employee where employee_id like '$user_email'";
		$result = mysqli_query($conn, $select_query);

		$value = mysqli_fetch_row($result);
		$id = $value[0];
		$late_entry_id = uniqid($id);

		$insert_query = "insert into request_late_entry (late_entry_id, id, from_date, to_date, time, late_entry_reason, status) values ('$late_entry_id','$id', '$from_date', '$to_date', '$time', '$late_entry_reason', '$status')";

		if($conn->query($insert_query) === TRUE)
		{
			echo '<script type="text/javascript">alert("Leave Applied");</script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("Error");</script>';
		}	

		header("location: late_entry.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Late Entry</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/emp_style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" href="../images/cp.png"/>
</head>
<body>
	<script type="text/javascript" src="../js/late_entry_val.js"></script>
	<?php

		include 'employee_header_nav.php';

	?>
	<form name="late_entry" method="POST" onSubmit="return late_entry_val()" action="late_entry.php" style="font-family: Comic Sans MS;">
		<br>
		<div class="row" >
			<div class="col-sm-1"></div>
			<div class="col-sm-4">
				<div class="text-center" style="font-size: 20px;">
					Late Entry Application
				</div>
				<div class="row" style="margin-top: 5px;">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="from_date">From Date:</label>
							<input type="text" name="from_date" placeholder="DD/MM/YYYY" class="form-control">	
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="to_date">To Date:</label>
							<input type="text" name="to_date" placeholder="DD/MM/YYYY" class="form-control">	
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="time">Time:</label>
					<input type="text" name="time" placeholder="HH:MM (24-HR)" class="form-control">	
				</div>
				<div class="form-group">
					<label for="late_entry_reason">Reason for Leave:</label>
					<textarea name="late_entry_reason" placeholder="Enter Reason" class="form-control" rows="3" style="resize: none;"></textarea>	
				</div>
				<div class="text-center">
					<button type="submit" name="submit" class="btn btn-dark">Submit</button>		
				</div>
			</div>
			<div class="col-sm-1"></div>
			<div class="col-sm-5">
				<?php 
					
					include '../php/config.php';

					$user_email = $_SESSION["user_email"];

					$select_query = "select employee_code from employee where employee_id like '$user_email'";
					$result = mysqli_query($conn, $select_query);

					$value = mysqli_fetch_row($result);
					$id = $value[0]; 

					$retrive_query = "select from_date,to_date,time,late_entry_reason,status,remark,reviewedby from request_late_entry where id like '$id'";
					$retrive_result = mysqli_query($conn, $retrive_query);

					$count = mysqli_num_rows($retrive_result);

					if($count == 0)
					{
						echo "<html>";
						echo "<body>";
						echo '<p class="text-center">No Result Found</p>';
						echo "</body>";
						echo "</html>";
					}

					while ($row = mysqli_fetch_array($retrive_result))
					{
						echo "<html>";
						echo "<body>";
						echo '<div class="card" style="max-height: 250px; margin-bottom: 5px;">';
					    echo '<div class="card-body">';
						echo'<p class="card-text"><b>From Date: </b>' . $row['from_date'] . '&nbsp &nbsp <b>To Date: </b>' .  $row['to_date'] . '&nbsp &nbsp <b>Time: </b>' . $row['time'] . '</p>';
						echo '<p class="card-text"><b>Reason: </b>' . $row['late_entry_reason'] . '</p>';
						if(!$row['reviewedby'] == null)
						{
							echo '<p class="card-text"><b>Remark: </b>' . $row['remark'] . '</p>';
						}
						echo '<p class="card-text"><b>Status: </b>' . $row['status'] ;
						if(!$row['reviewedby'] == null)
						{
							echo '&nbsp &nbsp <b>Reviewed By: </b>' . $row['reviewedby'];
						}
						echo '</p>';
						echo '</div>';
						echo '</div>';
						echo "</body>";
						echo "</html>";
					}

				?>
   			</div>		
			</div>
	</form>
</body>
</html>