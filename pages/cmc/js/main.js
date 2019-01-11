function sendForm() {
	var errorMsg = document.getElementById("errorMsg");
	var errorContainer = document.getElementById("errorContainer");
	var errorIcon = document.getElementById("errorIcon");

    var x = document.getElementsByName('inputRequest')
    for(var k=0;k<x.length;k++) {
      if(x[k].checked){
        var request = x[k].value
      }
  	}

	var fname = document.getElementById("inputFirstName").value;
	var lname = document.getElementById("inputLastName").value;
	var phone = document.getElementById("inputPhone").value;
	var email = document.getElementById("inputEmail").value;
	var make = document.getElementById("inputMake").value;
	var model = document.getElementById("inputModel").value;
	var year = document.getElementById("inputYear").value;
	var message = document.getElementById("inputMessage").value;
	var urlx = document.getElementById("urlx").value;

	if (fname != "" && lname != "" && phone != "") {
		errorMsg.innerText = "Sending...";

		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    	
			    errorContainer.style.color = "green";
				errorContainer.style.display = "block";
			    errorMsg.innerHTML=xmlhttp.responseText;
				errorIcon.className = "glyphicon glyphicon-ok";
		    }
		  }
		xmlhttp.open("POST","./email.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("url="+urlx+"&message_request="+request+"&first_name="+fname+"&last_name="+lname+"&telephone="+phone+"&email="+email+"&make="+make+"&model="+model+"&year="+year+"&comments="+message);

	}
	else {
		errorContainer.style.color = "red";
		errorContainer.style.display = "block";
		errorMsg.innerText = "Please enter your first name, last name and phone number.";
	}		
}