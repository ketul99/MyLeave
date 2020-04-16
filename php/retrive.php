<?php

	include 'config.php';

	$user_email = $_SESSION["user_email"];

	$select_query = "select employee_code from employee where employee_id like '$user_email'";
	$result = mysqli_query($conn, $select_query);

	$value = mysqli_fetch_row($result);
	$id = $value[0];

	if($leave_type == 'Casual Leave' || $leave_type == 'Paid Leave' || $leave_type == 'Medical Leave' || $leave_type == 'Work Leave')
	{
	$retrive_query = "select from_date,to_date,leave_reason,status,remark,reviewedby from request_leave where id like '$id' and leave_type like '$leave_type'";
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
		echo'<p class="card-text"><b>From Date: </b>' . $row['from_date'] . '&nbsp &nbsp <b>To Date: </b>' .  $row['to_date'] . '</p>';
		echo '<p class="card-text"><b>Reason: </b>' . $row['leave_reason'] . '</p>';
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
	}
	else if($leave_type == 'Half Day Leave')
	{
		$retrive_query = "select from_date,session,leave_reason,status,remark,reviewedby from request_leave where id like '$id' and leave_type like '$leave_type'";
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
			echo'<p class="card-text"><b>Date: </b>' . $row['from_date'] . '&nbsp &nbsp <b>Session: </b>' .  $row['session'] . '</p>';
			echo '<p class="card-text"><b>Reason: </b>' . $row['leave_reason'] . '</p>';
			if(!$row['reviewedby'] == null)
			{
				echo '<p class="card-text"><b>Remark: </b>' . $row['remark'] . '</p>';
			}
			echo '<p class="card-text"><b>Status: </b>' . $row['status'];
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
	}

?>