<?php

	session_start();
	 
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["type"] === "employee")
	{
	    header("location: index.php");
	    exit;
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
	<?php

		include 'admin_header_nav.php';

	?>
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<?php

				include '../php/config.php';

				$select_query = "select * from request_late_entry where status like 'Accepted' or status like 'rejected'";
				$result = mysqli_query($conn, $select_query);

				$count = mysqli_num_rows($result);

				if($count == 0)
				{
					echo "<html>";
					echo "<body>";
					echo '<p class="text-center" style="margin-top:5px; font-family: Comic Sans MS;">No Result Found</p>';
					echo "</body>";
					echo "</html>";
				}

				while ($row = mysqli_fetch_array($result))
				{
					$user_id = $row['id'];
					$select_name = "select name from employee where employee_code like '$user_id'";
					$select_result = mysqli_query($conn, $select_name);
					$value = mysqli_fetch_row($select_result);
					$name = $value[0];

					echo "<html>";
					echo "<body>";
					echo '<div class="card" style="max-height: 250px; margin-top: 5px;">';
				    echo '<div class="card-body">';
				    echo '<div class="row">';
				    echo '<div class="col-sm-6">';
				    echo '<p class="card-text"><b>ID: </b>' . $row['id'] . '&nbsp &nbsp <b>Name: </b>' .  $name . '</p>';

				    echo'<p class="card-text"><b>From Date: </b>' . $row['from_date'] . '&nbsp &nbsp <b>To Date: </b>' .  $row['to_date'] . '&nbsp &nbsp <b>Time: </b>' . $row['time'] . '</p>';

				
					echo '<p class="card-text"><b>Reason: </b>' . $row['late_entry_reason'] . '</p>';
					echo '</div>';
					echo '<div class="col-sm-6">';
					echo '<p class="card-text"><b>Remark: </b>' . $row['remark'] . '</p>';
					echo '<p class="card-text"><b>Status: </b>' . $row['status'] . '</p>';
					echo '<p class="card-text"><b>Reviewed By: </b>' . $row['reviewedby'] . '</p>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo "</body>";
					echo "</html>";
				}

			?>
		</div>
		<div class="col-sm-1"></div>
	</div>
</body>
</html>