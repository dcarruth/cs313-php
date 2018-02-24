function create(){
	create = document.getElementById('createacc');
	create.style.visibility = "visible";
}

function loginValidate(){
	var uname = document.getElementById('uname').value;
	var passwd = document.getElementById('passwd').value;
	
	if (uname == ""){
		alert("Please enter a user name!");
		return false;
	}
	else if (passwd == ""){
		alert("Please enter a password!");
		return false;
	}
	else {
		return true;
	}
	
		
}

function createValidate(){
	var uname = document.getElementById('unameNew').value;
	var passwd = document.getElementById('passwdNew').value;
	var screen = document.getElementById('screenN').value;
	
	if (uname == ""){
		alert("Please enter a user name!");
		return false;
	}
	else if (passwd == ""){
		alert("Please enter a password!");
		return false;
	}
	else if (screen == ""){
		alert("Please enter a screen name!");
		return false;
	}
	else {
		return true;
	}
}