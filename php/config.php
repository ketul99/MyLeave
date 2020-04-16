<?php

	$conn = mysqli_connect("IP ADDRESS", "DATABASE USERNAME", "DATABASE PASSWORD", "DATABASE NAME");

	if(!$conn)
	{
		$error = "Not Connected to Database";
		exit();
	}

?>