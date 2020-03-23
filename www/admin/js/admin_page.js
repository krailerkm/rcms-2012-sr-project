//
//  admin.js
//  RCMS
//
//  Created by KRAILERKM on 1/30/55 BE.
//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
//

var HttPRequest = false;

function setAjax(){ //setajax
	HttPRequest = false;
	if (window.XMLHttpRequest) { // Mozilla, Safari,...
		HttPRequest = new XMLHttpRequest();
		if (HttPRequest.overrideMimeType) {
			HttPRequest.overrideMimeType('text/html');
		}
	} else if (window.ActiveXObject) { // IE
		try {
			HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	} 
		  
	if (!HttPRequest) {
		alert('Cannot create XMLHTTP instance');
		return false;
	}
} 

function LoadOnFC(){ //load first open page 
	LoopShowBoxTBOnload();
	setTimeout("showBox('admin_information.php');",1000);
	//showBox('device_information.php',user);
}

function LoopShowBoxTBOnload(){ //loop show table update 3 sec
	showBoxUP();
	setTimeout("LoopShowBoxTB();",1000);
}

function LoopShowBoxTB(){ // loop show table update
	LoopShowBoxTBOnload();
}

function showBoxUP() { //show update table
	setAjax();
	var url = "admin_showupdate.php";
	var pmeters = "Like=" + encodeURI(document.getElementById("Likebox").value);
	HttPRequest.open('POST',url,true);

	HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.setRequestHeader("Content-length", pmeters.length);
	HttPRequest.setRequestHeader("Connection", "close");
	HttPRequest.send(pmeters);
			
			
	HttPRequest.onreadystatechange = function(){

		if(HttPRequest.readyState == 3)  // Loading Request
		{
			//document.getElementById("showBoxUpdate").innerHTML = "";
		}

		if(HttPRequest.readyState == 4) // Return Request
		{
			document.getElementById("imgLoadingTB").style.display = 'none';
			document.getElementById('showBoxUpdate').innerHTML = HttPRequest.responseText;			
		}				
	}

}

function showBox(url) { //show informationmyuser
	setAjax();
	var pmeters = "";

	HttPRequest.open('POST',url,true);

	HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.setRequestHeader("Content-length", pmeters.length);
	HttPRequest.setRequestHeader("Connection", "close");
	HttPRequest.send(pmeters);
			
			
	HttPRequest.onreadystatechange = function(){

		if(HttPRequest.readyState == 3)  // Loading Request
		{
			document.getElementById("imgLoading").style.display = '';
			document.getElementById("showBox").innerHTML = "";
		}

		if(HttPRequest.readyState == 4) // Return Request
		{			  
			document.getElementById("imgLoading").style.display = 'none';
			document.getElementById('showBox').innerHTML = HttPRequest.responseText;
		}				
	}

}

function editAjax() { //edit page
	setAjax();
	var url = "admin_update.php";
	var pmeters = "txtUserID=" + encodeURI( document.getElementById("txtUserID").value) +
							"&txtUsername=" + encodeURI( document.getElementById("txtUsername").value ) +
							"&txtPassword=" + encodeURI( document.getElementById("txtPassword").value ) +
							"&txtName=" + encodeURI( document.getElementById("txtName").value ) +
							"&txtEmail=" + encodeURI( document.getElementById("txtEmail").value ) +
							"&txtPhone=" + encodeURI( document.getElementById("txtPhone").value ) +
							"&txtMobile=" + encodeURI( document.getElementById("txtMobile").value )+
							"&txtDepartment=" + encodeURI( document.getElementById("txtDepartment").value ) +
							"&txtDescription=" + encodeURI( document.getElementById("txtDescription").value )+
							"&txtStatus=" + encodeURI( document.getElementById("txtStatus").value );

	HttPRequest.open('POST',url,true);

	HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.setRequestHeader("Content-length", pmeters.length);
	HttPRequest.setRequestHeader("Connection", "close");
	HttPRequest.send(pmeters);
			
			
	HttPRequest.onreadystatechange = function(){

		if(HttPRequest.readyState == 3)  // Loading Request
		{
			document.getElementById("imgLoading").style.display = '';
			document.getElementById("showBox").innerHTML = "";
		}

		if(HttPRequest.readyState == 4) // Return Request
		{			  
			//document.getElementById('showBox').innerHTML = HttPRequest.responseText;
			showBox('admin_information.php');
		}				
	}

}