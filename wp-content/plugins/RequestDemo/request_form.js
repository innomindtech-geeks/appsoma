
var httpReq = false;

function contact_mailer_POSTRequest(url, parameters) {
	

	
  httpReq = false;
  if (window.XMLHttpRequest) { // Mozilla, Safari,...
	 httpReq = new XMLHttpRequest();
	 if (httpReq.overrideMimeType) {
		
		httpReq.overrideMimeType('text/html');
	 }
  } else if (window.ActiveXObject) { // IE
	 try {
		httpReq = new ActiveXObject("Msxml2.XMLHTTP");
	 } catch (e) {
		try {
		   httpReq = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (e) {}
	 }
  }
  if (!httpReq) {
	 alert('Cannot create XMLHTTP instance');
	 return false;
  }
  //alert(parameters);
  httpReq.onreadystatechange = contact_mailerContents;
  httpReq.open('POST', url, true);
  httpReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  httpReq.setRequestHeader("Content-length", parameters.length);
  httpReq.setRequestHeader("Connection", "close");
  httpReq.send(parameters);
}

function contact_mailerContents() 
{
  //alert(httpReq.responseText);
  if (httpReq.readyState == 4) 
  {
	 if (httpReq.status == 200) 
	 {
		//alert(httpReq.responseText);
		if(httpReq.responseText == "Invalid security code.")
		{
			alert(httpReq.responseText);
			result = httpReq.responseText;
			document.getElementById('contact_mailer_alertmessage').innerHTML = result;
			document.getElementById("contact_mailer_captcha").value = "";
		}
		else if(httpReq.responseText == "Refresh the page and try again.")
		{
			alert(httpReq.responseText);
			result = httpReq.responseText;
			document.getElementById('contact_mailer_alertmessage').innerHTML = result;
			document.getElementById("contact_mailer_captcha").value = "";
		}
		else
		{
			alert(httpReq.responseText);
			 var results = 	document.getElementById('contact_mailer_alertmessage');

			result = httpReq.responseText;
			document.getElementById('contact_mailer_alertmessage').innerHTML = "";   
			document.getElementById("contact_mailer_email").value = "Email";
			document.getElementById("contact_mailer_name").value = "Name";
			document.getElementById("contact_mailer_phone").value = "Phone";
			document.getElementById("contact_mailer_message").value = "Message";
			document.getElementById("contact_mailer_captcha").value = "Enter below security code";
		}
	 } 
	 else 
	 {
		alert('There was a problem with the request.');
	 }
  }
}

function contact_mailer_submit(obj,url) 
{
	
	
	emailTxt=document.getElementById("contact_mailer_email");
	nameTxt=document.getElementById("contact_mailer_name");
	phoneTxt=document.getElementById("contact_mailer_phone");
	msgTxt=document.getElementById("contact_mailer_message");
	captchaTxt=document.getElementById("contact_mailer_captcha");
	
	if(nameTxt.value=="" || nameTxt.value=="Name" )
	{
		alert("Please enter the name.");
		nameTxt.focus();
		return false;    
	}
	else if(emailTxt.value=="" || emailTxt.value=="Email" )
	{
		alert("Please enter the email address.");
		emailTxt.focus();
		return false;    
	}
	else if(emailTxt.value!="" && (emailTxt.value.indexOf("@",0)==-1 || emailTxt.value.indexOf(".",0)==-1))
	{
		alert("Please enter valid email.")
		emailTxt.focus();
		emailTxt.select();
		return false;
	} 
	else if(phoneTxt.value=="" || phoneTxt.value=="Phone" )
	{
		alert("Please enter your phone.");
		msgTxt.focus();
		return false;    
	}
	else if(msgTxt.value=="" || phoneTxt.value=="Message")
	{
		alert("Please enter your message.");
		msgTxt.focus();
		return false;    
	}
	else if(captchaTxt.value=="" ||captchaTxt.value=="Enter below security code")
	{
		alert("Please enter enter below  code.");
		captchaTxt.focus();
		return false;    
	}

	document.getElementById('contact_mailer_alertmessage').innerHTML = "Sending..."; 
	
	var str = "contact_mailer_name=" + encodeURI( document.getElementById("contact_mailer_name").value ) + "&contact_mailer_email=" + encodeURI( document.getElementById("contact_mailer_email").value ) + "&contact_mailer_phone=" + encodeURI( document.getElementById("contact_mailer_phone").value ) + "&contact_mailer_message=" + encodeURI( document.getElementById("contact_mailer_message").value ) + "&contact_mailer_captcha=" + encodeURI( document.getElementById("contact_mailer_captcha").value );
				 
	contact_mailer_POSTRequest(url+'contact_save.php', str);
}
