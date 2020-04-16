function late_entry_val()
{
	var today = new Date();
	var from_date = document.late_entry.from_date.value;
	var date_pat = /^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[\/](0?\d{4})$/;

	if(!(date_pat.test(from_date)))
	{
		alert("Enter Valid From Date");
		document.late_entry.from_date.focus();
		return false;
	}


	if(regs = from_date.match(date_pat))
	{
		if(regs[3] != 2020)
		{
			alert("Enter Valid Year");
			document.late_entry.from_date.focus();
			return false;
		}
		if(regs[2] <= today.getMonth())
		{
			alert("Enter Valid Month");
			document.late_entry.from_date.focus();
			return false;	
		}
		else
		{
			if(regs[2] == today.getMonth()+1 && regs[1] < today.getDate())
			{
				alert("Enter Valid Day");
				document.late_entry.from_date.focus();
				return false;
			}
		}
		if(regs[2] == 4 || regs[2] == 6 || regs[2] == 9 || regs[2] == 11)
		{
			if(regs[1] > 30)
			{
				alert("Enter Valid Day");
				document.late_entry.from_date.focus();
				return false;	
			}
		}
		else if(regs[2] == 2)
		{
			if(regs[1] > 29)
			{
				alert("Enter Valid Day");
				document.late_entry.from_date.focus();
				return false;
			}
		}
	}

	var to_date = document.late_entry.to_date.value;

	if(!(date_pat.test(to_date)))
	{
		alert("Enter Valid To Date");
		document.late_entry.to_date.focus();
		return false;
	}

	if(regs = to_date.match(date_pat))
	{
		regs_from = from_date.match(date_pat);
		if(regs[3] != regs_from[3])
		{
			alert("Enter Valid Year");
			document.late_entry.to_date.focus();
			return false;
		}
		if(regs[2] < regs_from[2])
		{
			alert("Enter Valid Month");
			document.late_entry.to_date.focus();
			return false;
		}
		if(regs[2] == regs_from[2] && regs[1] < regs_from[1])
		{
			alert("Enter Valid Day");
			document.late_entry.to_date.focus();
			return false;
		}
		if(regs[2] == 4 || regs[2] == 6 || regs[2] == 9 || regs[2] == 11)
		{
			if(regs[1] > 30)
			{
				alert("Enter Valid Day");
				document.late_entry.to_date.focus();
				return false;	
			}
		}
		else if(regs[2] == 2)
		{
			if(regs[1] > 29)
			{
				alert("Enter Valid Day");
				document.late_entry.to_date.focus();
				return false;
			}
		}
	}

	var time = document.late_entry.time.value;
	var time_pat = /^([0-1][0-9]|2[0-3]):([0-5][0-9])$/;

	if(!(time_pat.test(time)))
	{
		alert("Enter Valid Time");
		document.late_entry.time.focus();
		return false;
	}

	//For Organization having Working hours (10:00 to 18:00 )
	//Late Entry Permission (10:10 to 12:00)

	if(regs = time.match(time_pat))
	{
		if(regs[1] < 10 || regs[1] > 12)
		{
			alert("Invalid Value for Hour");
			document.late_entry.time.focus();
			return false;			
		}
		else
		{
			if(regs[1] == 12 && regs[2] > 0)
			{
				alert("Please Apply for Half Day Leave");
				return false;
			}
			else if(regs[1] == 10 && regs[2] <= 10)
			{
				alert("Enter Time after 10:10 ");
				document.late_entry.time.focus();
				return false;
			}
		}
	}

	var late_entry_reason = document.late_entry.late_entry_reason.value;

	if(late_entry_reason == "")
	{
		alert("Enter Valid Reason");
		document.late_entry.late_entry_reason.focus();
		return false;
	}


}