<?php

	include 'config.php';

	$select_query = "select * from request_leave where status like 'Accepted' or status like 'Rejected'";
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
	    echo '<p class="card-text"><b>Leave Type: </b>' . $row['leave_type'] . '</p>';

	    if($row['leave_type'] == 'Casual Leave' || $row['leave_type'] == 'Paid Leave')
	    {
		echo '<p class="card-text"><b>From Date: </b>' . $row['from_date'] . '&nbsp &nbsp <b>To Date: </b>' .  $row['to_date'] . '</p>';
		}
		else if($row['leave_type'] == 'Half Day Leave')
		{
			echo '<p class="card-text"><b>Date: </b>' . $row['from_date'] . '&nbsp &nbsp <b>Session: </b>' .  $row['session'] . '</p>';
		}
		else
		{
			echo '<p class="card-text"><b>From Date: </b>' . $row['from_date'] . '&nbsp &nbsp <b>To Date: </b>' .  $row['to_date'] . '&nbsp &nbsp <b>File: </b>' .  '<a href="../images/' . $row['file'] . '">' . $row['file'] . '</a>' . '</p>';
		}
		echo '<p class="card-text"><b>Reason: </b>' . $row['leave_reason'] . '</p>';
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