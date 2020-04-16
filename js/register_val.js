function register_val()
{
	var name = document.register_form.name.value;
	var name_pat = /^[a-zA-Z ]+$/;

	if(!(name_pat.test(name)))
		{
			alert("Enter Valid Name");
			document.register_form.name.focus();
			return false;
		}

	var user_emp_id = document.register_form.user_emp_id.value;
	var emp_id_pat = /^[A-Z]+[0-9]+$/;

	if(!(emp_id_pat.test(user_emp_id)))
		{
			alert("Enter Valid Employee ID");
			document.register_form.user_emp_id.focus();
			return false;
		}

	var user_mob = document.register_form.user_mob.value;
	var mob_pat = /^[0-9]{10}$/;
	
	if (!(mob_pat.test(user_mob)))
		{
			alert("Enter Valid Mobile Number");
			document.register_form.user_mob.focus();
			return false;
		}

	var user_email = document.register_form.user_email.value;
	var email_id_pat = /^[a-z0-9._-]+[@][a-z]+[.][a-z]{2,3}([.][a-z]{2})*$/;
	
	if(!(email_id_pat.test(user_email)))
		{
			alert("Enter Valid Email ID");
			document.register_form.user_email.focus();
			return false;
		}

	var user_pass = document.register_form.user_pass.value;
	var pass_pat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

	if(!(pass_pat.test(user_pass)))
		{
			alert("Password Must Contain: \n\u2022Minimum 8 Characters \n\u2022A Lowercase \n\u2022A Uppercase \n\u2022A Special Character");
			document.register_form.user_pass.focus();
			return false;
		}

	var user_pass_conf = document.register_form.user_pass_conf.value;
	
	if(user_pass != user_pass_conf)
		{
			alert("Password Don't Match");
			document.register_form.user_pass_conf.focus();
			return false;
		}
}