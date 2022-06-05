function validateAll()			//Validating all
{
	var status = true;
	status = status && validatePassword();
	status = status && validateConfirm();
	status = status && validatePhoto();
	return status;	
}

function validatePassword()		// Valdiating Password
{
	var reg = /[0-9]/;
	if(pass.value.length<8)
			alert("Password must contain 8 characters");
	else if(!reg.test(pass.value))
			alert("Password must contain a digit");
	else
		return true;
	return false;
}

function validateConfirm()		//Validating Confirm Password
{
	if(pass.value != confirmpass.value)
	{
		alert("Confirm password does not match with entered password");
		return false;
	}
	return true;
}

function validatePhoto()		// Validating Photo
{
	var file = document.getElementById('pic').files[0];
	if (!/^(image)/.test(file.type))
		alert("Please select an image file");
	else if (file.size>1887437)
		alert("Image File should be less than 1.8MB");
	else
		return true;
	return false;
}

function updateDetails()
{
	var url = "regE.php?name="+fname.value+"&prof="+prof.value+"&loc="+loc.value+"&dob="+dob.value+"&email="+mail.value+"";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
		if(this.readyState==4 && this.status==200)
			if(this.responseText == 'true')	
				alert("Profile Updated Successfully");
			else if(this.responseText == 'false')
				alert("Unable to update profile");
	}
	xmlhttp.open("GET",url,true);
	xmlhttp.send();	
}


