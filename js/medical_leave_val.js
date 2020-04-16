function medical_leave_val()
{
	var from_date = document.medical_leave.from_date.value;
	var date_pat = /^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[\/](0?\d{4}$)/;

	if(!(date_pat.test(from_date)))
	{
		alert("Enter Valid From Date");
		document.medical_leave.from_date.focus();
		return false;
	}

	if(regs = from_date.match(date_pat))
	{
		if(regs[3] != 2020)
		{
			alert("Enter Valid Year");
			document.medical_leave.from_date.focus();
			return false;
		}
		if(regs[2] == 4 || regs[2] == 6 || regs[2] == 9 || regs[2] == 11)
		{
			if(regs[1] > 30)
			{
				alert("Enter Valid Day");
				document.medical_leave.from_date.focus();
				return false;	
			}
		}
		else if(regs[2] == 2)
		{
			if(regs[1] > 29)
			{
				alert("Enter Valid Day");
				document.medical_leave.from_date.focus();
				return false;
			}
		}
	}

	var to_date = document.medical_leave.to_date.value;

	if(!(date_pat.test(to_date)))
	{
		alert("Enter Valid To Date");
		document.medical_leave.to_date.focus();
		return false;
	}

	if(regs = to_date.match(date_pat))
	{
		regs_from = from_date.match(date_pat);
		if(regs[3] != regs_from[3])
		{
			alert("Enter Valid Year");
			document.medical_leave.to_date.focus();
			return false;
		}
		if(regs[2] < regs_from[2])
		{
			alert("Enter Valid Month");
			document.medical_leave.to_date.focus();
			return false;
		}
		if(regs[2] == regs_from[2] && regs[1] < regs_from[1])
		{
			alert("Enter Valid Day");
			document.medical_leave.to_date.focus();
			return false;
		}
		if(regs[2] == 4 || regs[2] == 6 || regs[2] == 9 || regs[2] == 11)
		{
			if(regs[1] > 30)
			{
				alert("Enter Valid Day");
				document.medical_leave.to_date.focus();
				return false;	
			}
		}
		else if(regs[2] == 2)
		{
			if(regs[1] > 29)
			{
				alert("Enter Valid Day");
				document.medical_leave.to_date.focus();
				return false;
			}
		}
	}

	var leave_reason = document.medical_leave.leave_reason.value;

	if(leave_reason == "")
	{
		alert("Enter Valid Reason");
		document.medical_leave.leave_reason.focus();
		return false;
	}

	var file = document.medical_leave.fileToUpload.value;

	if(file == "")
	{
		alert("Select Valid Document");
		document.medical_leave.fileToUpload.focus();
		return false;
	}

}