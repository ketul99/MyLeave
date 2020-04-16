<?php
	
	include 'config.php';

	$select_query = "select employee_code from employee where employee_id like '$user_email'";
	$result = mysqli_query($conn, $select_query);

	$value = mysqli_fetch_row($result);
	$id = $value[0];
	$leave_id = uniqid($id);
	$flag = 1;

	if($leave_type == 'Medical Leave' || $leave_type == 'Work Leave')
	{

		$target_dir = "../images/";
		$filename = $_FILES["fileToUpload"]["name"];
		$file_ext = substr($filename, strripos($filename, '.'));
		$target = $target_dir . $id.'_'.$leave_type.$file_ext;
		$file = $id.'_'.$leave_type.$file_ext;

		if ($_FILES["fileToUpload"]["size"] > 2097152) 
		{
    		//echo '<script type="text/javascript">alert("Size should be less than 2MB");</script>';
    		$flag = 0;
		}

		if($file_ext != ".jpg" && $file_ext != ".png" && $file_ext != ".jpeg" && $file_ext != ".pdf" ) 
		{
			//echo '<script type="text/javascript">alert("Sorry, only JPG, JPEG, PNG & PDF files are allowed");</script>';
    		$flag = 0;
		}

		if($flag == 0)
		{
			//Error
		}
		else
		{
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target))
	    	{
	    		//File has been Uploaded
	    	} 
	    	else 
	    	{
	        	//echo "Sorry, there was an error uploading your file.";
	    	}
		}
    	
	}

	if($flag == 1)
	{
		$query = "insert into request_leave (leave_id, id, leave_type, from_date, to_date, session, leave_reason, file, status) values ('$leave_id','$id','$leave_type','$from_date','$to_date', '$session', '$leave_reason', '$file', '$status')";

		if($conn->query($query) === TRUE)
		{
			echo '<script type="text/javascript">alert("Leave Applied");</script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("Error");</script>';
		}	
	}
	else
	{
		//Error
	}

		
?>