<?php

	session_start();
	 
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["type"] === "admin")
	{
	    header("location: index.php");
	    exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>MyLeave</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/emp_style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" href="images/cp.png"/>
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row" style="margin-top: 10px;">
				<div class="col-sm-2 col-xs-4" style="margin-left: 0;">
					<a href="employee.php"><img class="img-size" src="images/cp.png"></a>
				</div>
				<div class="col-sm-8 col-xs-12">
					<p id="com_title" align="center">MyLeave</p>
					<p id="com_subtitle" align="center">Pearson Hardman</p>
				</div>
				<div class="col-sm-2 col-xs-4">
					<img class="img-size" src="images/cp.png">
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand navbar-dark bd-navbar" style="font-family: Comic Sans MS;">
		<ul class="navbar-nav">
    		<li class="nav-item">
	      		<a class="nav-link" href="employee/home.php"><svg class="bi bi-house-fill" align="center" width="2em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  			<path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 01-1.5 1.5h-9A1.5 1.5 0 012 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
	  			<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 011.414 0l6.647 6.646a.5.5 0 01-.708.708L8 2.207 1.354 8.854a.5.5 0 11-.708-.708L7.293 1.5z" clip-rule="evenodd"/>
				</svg></a>
    		</li>
    		<li class="nav-item dropdown">
    			<a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Leave Application</a>     			
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="employee/casual_leave.php">Casual Leave</a>
					<a class="dropdown-item" href="employee/half_day_leave.php">Halfday Leave</a>
					<a class="dropdown-item" href="employee/paid_leave.php">Paid Leave</a>
					<a class="dropdown-item" href="employee/medical_leave.php">Medical Leave</a>
					<a class="dropdown-item" href="employee/work_leave.php">Work Leave</a>
				</div>
			</li>
		    <li class="nav-item">
		      	<a class="nav-link" href="employee/late_entry.php">Late Entry</a>
		    </li>
  		</ul>
	  	<ul class="navbar-nav ml-md-auto">
	  		<li class="nav-item">
	      		<a class="nav-link disabled" style="color: white;">Hello, User</a>
	    	</li>
	  		<li class="nav-item">
	      		<a class="nav-link" href="php/logout.php">Logout</a>
	    	</li>
	  	</ul>
	</nav>
	<div class="text-center" style="margin-top: 50px;">
		<img src="images/logo.jfif">
	</div>
</body>
</html>