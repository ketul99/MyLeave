<?php
	
	session_start();
	include 'config.php';

	$leave_id = $_GET['leave_id'];
	$status = $_GET['status'];
	$remark = $_POST['remark'];
	$user_email = $_SESSION["user_email"];
	$select_admin_name = "select name from admin where admin_id like '$user_email'";
	$result_select_admin_name = mysqli_query($conn, $select_admin_name);
	$reviewedby = mysqli_fetch_row($result_select_admin_name);

	$update_query = "UPDATE request_leave SET status='$status',remark='$remark',reviewedby='$reviewedby[0]' WHERE leave_id like '$leave_id'";

	if(mysqli_query($conn, $update_query))
	{ 
		header("Location: ../admin/leave_application.php"); 
	} 	
	else 
	{ 
	    echo '<script type="text/javascript">alert("Error")</script>'; 
	}  

?>
