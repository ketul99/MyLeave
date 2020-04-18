<?php

	include '../php/config.php';

	$user_email = $_SESSION["user_email"];

	$select_query = "select employee_code,name from employee where employee_id like '$user_email'";
	$result = mysqli_query($conn, $select_query);

	$value = mysqli_fetch_row($result);
	$id = $value[0];
	$name = $value[1];

	echo '<p>ID : ' . $id . '&nbsp&nbsp Name : ' . $name . '</p>';
	echo '<div class="text-center" style="font-size: 25px;">
					Leave Report
			</div>';
	echo '<br>';
	
	$leave_type = array("Casual Leave", "Half Day Leave", "Paid Leave", "Medical Leave", "Work Leave");

	foreach ($leave_type as $type_leave) 
	{
		$query = "select SUM(DATEDIFF(STR_TO_DATE(to_date,'%d/%m/%Y'),STR_TO_DATE(from_date,'%d/%m/%Y'))+1) from request_leave where id like '$id' and leave_type like '$type_leave' and status like 'Accepted'";
		$result = mysqli_query($conn, $query);

		$value = mysqli_fetch_row($result);

		echo '<p>' . $type_leave . ' : ' . $value[0] . '</p>';
	}

?>