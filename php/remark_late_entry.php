<?php
	session_start();
	include 'config.php';
	include 'mail_function.php';

	$late_entry_id = $_GET['late_entry_id'];
	$status = $_GET['status'];
	$remark = $_POST['remark'];
	$user_email = $_SESSION["user_email"];
	$select_admin_name = "select name from admin where admin_id like '$user_email'";
	$result_select_admin_name = mysqli_query($conn, $select_admin_name);
	$reviewedby = mysqli_fetch_row($result_select_admin_name);

	$update_query = "UPDATE request_late_entry SET status='$status',remark='$remark',reviewedby='$reviewedby[0]' WHERE late_entry_id like '$late_entry_id'";

	if(mysqli_query($conn, $update_query))
	{
		$select_body = "select id,from_date,to_date,time,remark from request_late_entry where late_entry_id like '$late_entry_id'";
		$result = mysqli_query($conn, $select_body);
		$value = mysqli_fetch_row($result);
		$message_body = 'Your request for Late Entry is : ' . $status . '<br>From Date : ' . $value[1] . ' to ' . $value[2] . '<br>Time : ' . $value[3] . '<br>Remark : ' . $value[4];

		$select_email = "select employee_id from employee where employee_code like '" . $value[0] . "'";
		$result_email = mysqli_query($conn, $select_email);
		$email = mysqli_fetch_row($result_email);

		$mail_status = sendconfirmation($email[0],$message_body,$late_entry_id,$status);
   		header("Location: ../admin/late_entry.php"); 
	} 	
	else 
	{ 
	    echo '<script type="text/javascript">alert("Error")</script>'; 
	}  

?>
