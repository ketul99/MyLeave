function login_val()
{
	var user_email = document.login_form.user_email.value;
	var email_id_pat = /^[a-z0-9._-]+[@][a-z]+[.][a-z]{2,3}([.][a-z]{2})*$/;
	
	if(!(email_id_pat.test(user_email)))
		{
			alert("Enter Valid Email ID");
			document.login_form.user_email.focus();
			return false;
		}

	var user_pass = document.login_form.user_pass.value;

	if(user_pass == "")
	{
		alert("Enter Valid Password");
		document.login_form.user_pass.focus();
		return false;
	}

	if(document.login_form.type[0].checked == false && document.login_form.type[1].checked == false)
	{
		alert("Select Type of User");
		return false;
	}
}