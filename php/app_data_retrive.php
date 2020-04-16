<?php

	include 'config.php';

	$late_entry_id = $_POST['late_entry_id'];
	$query = "select id,from_date,to_date,time,status from request_late_entry where late_entry_id like '$late_entry_id'";
	$result = mysqli_query($conn, $query);

	$data = array();

	while ($row = mysqli_fetch_array($result)) {

			array_push($data, array(
			'id'=>$row['id'],
			'from_date'=>$row['from_date'],
			'to_date'=>$row['to_date'],
			'time'=>$row['time'],
			'status'=>$row['status']			
		));
	}

	echo json_encode(array('data'=>$data));

?>