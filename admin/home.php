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
	<title>Home</title>
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
	<div class="row" style="font-family: Comic Sans MS;">
		<div class="col-sm-1"></div>
		<div class="col-sm-4">
			<div style="font-size: 20px;">
				<?php

					include 'leave_report_admin.php';

				?>
			</div>
		</div>
		<div class="col-sm-1"></div>
		<div class="col-sm-5">
			<?php

			include '../php/config.php';

			$user_email = $_SESSION["user_email"];

			$select_query = "select name,admin_code from admin where admin_id like '$user_email'";
			$result = mysqli_query($conn, $select_query);

			$value = mysqli_fetch_row($result);
			$name = $value[0];
			$id = $value[1];

			echo '<div style="font-size:20px">';
			echo '<br>';
			echo '<p>ID : ' . $id . '</p>';
			echo '<p>Name : ' . $name . '</p>';
			echo '</div>';

			?>
		</div>
	</div>
</body>
</html>