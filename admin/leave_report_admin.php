<?php

	include '../php/config.php';

	$ddmenu_query = "select name,employee_code from employee";
	$result = mysqli_query($conn, $ddmenu_query);

	echo '<br>';
	echo '<div class="text-center" style="font-size: 25px;">
					Leave Report
			</div>';
	echo '<br>';
	echo '<form name="leave_report_admin" method="POST">';
	echo '<div class="input-group">';
	echo '<select name="employee" class="custom-select" style="margin-bottom:5px;">';
	echo '<option selected disabled>Choose Employee</option>';

	while ($row = mysqli_fetch_array($result))
	{
		echo '<option value=' . $row["employee_code"] . '>' . $row['employee_code'] . ' - ' . $row['name'] . '</option>';
	}

	echo '</select>';
	echo '<button type="submit" name="submit" class="btn btn-dark" style="font-family: Comic Sans MS; margin-left: 5px;">Submit</button>';
	echo '</div>';
	echo '</form>';
	if(isset($_POST['submit']) && isset($_POST['employee']))
	{
		$id = $_POST['employee'];
		$select_query = "select name from employee where employee_code like '$id'";
		$result = mysqli_query($conn, $select_query);

		$value = mysqli_fetch_row($result);
		$name = $value[0];

		echo '<p>ID : ' . $id . '&nbsp&nbsp Name : ' . $name . '</p>';

		$leave_type = array("Casual Leave", "Half Day Leave", "Paid Leave", "Medical Leave", "Work Leave");

		foreach ($leave_type as $type_leave) 
		{
			if($type_leave == 'Half Day Leave')
			{
			$query = "select * from request_leave where id like '$id' and leave_type like '$type_leave' and status like 'Accepted'";
			$result = mysqli_query($conn, $query);

			$count = mysqli_num_rows($result);

			if($count>0)
			echo '<p>' . $type_leave . ' : ' . $count . '</p>';
			else
			echo '<p>' . $type_leave . ' : </p>';
			}
			else
			{
				$query = "select SUM(DATEDIFF(STR_TO_DATE(to_date,'%d/%m/%Y'),STR_TO_DATE(from_date,'%d/%m/%Y'))+1) from request_leave where id like '$id' and leave_type like '$type_leave' and status like 'accepted'";
				$result = mysqli_query($conn, $query);

				$value = mysqli_fetch_row($result);
				
				echo '<p>' . $type_leave . ' : ' . $value[0] . '</p>';
			}
			
		}
	
	}
?>