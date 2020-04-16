function half_day_leave_val()
{
	var from_date = document.half_day_leave.from_date.value;
	var date_pat = /^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[\/](0?\d{4})$/;

	if(!(date_pat.test(from_date)))
	{
		alert("Enter Valid Date");
		document.half_day_leave.from_date.focus();
		return false;
	}

	if(regs = from_date.match(date_pat))
	{
		if(regs[3] != 2020)
		{
			alert("Enter Valid Year");
			document.half_day_leave.from_date.focus();
			return false;
		}
		if(regs[2] == 4 || regs[2] == 6 || regs[2] == 9 || regs[2] == 11)
		{
			if(regs[1] > 30)
			{
				alert("Enter Valid Day");
				document.half_day_leave.from_date.focus();
				return false;	
			}
		}
		else if(regs[2] == 2)
		{
			if(regs[1] > 29)
			{
				alert("Enter Valid Day");
				document.half_day_leave.from_date.focus();
				return false;
			}
		}
	}

	if(document.half_day_leave.session[0].checked == false && document.half_day_leave.session[1].checked == false)
	{
		alert("Select Session");
		return false;
	}

	var leave_reason = document.half_day_leave.leave_reason.value;

	if(leave_reason == "")
	{
		alert("Enter Valid Reason");
		document.half_day_leave.leave_reason.focus();
		return false;
	}


}