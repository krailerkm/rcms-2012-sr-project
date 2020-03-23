//
//  manage_showusertable_module.php
//  RCMS
//
//  Created by KRAILERKM on 1/30/55 BE.
//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
//
var HttPRequest = false;

function setAjax(){
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

function showBox(url,UserID) {
	setAjax();
	var pmeters = "UserID="+UserID;

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

function editAjax(UserID) {
	setAjax();
	var url = "manage_update.php";
	var user = encodeURI( document.getElementById("txtUserID").value);
	var pmeters = "etxtUserID=" + encodeURI( document.getElementById("txtUserID").value) +
							"&etxtUsername=" + encodeURI( document.getElementById("txtUsername").value ) +
							"&etxtPassword=" + encodeURI( document.getElementById("txtPassword").value ) +
							"&etxtName=" + encodeURI( document.getElementById("txtName").value ) +
							"&etxtEmail=" + encodeURI( document.getElementById("txtEmail").value ) +
							"&etxtPhone=" + encodeURI( document.getElementById("txtPhone").value ) +
							"&etxtMobile=" + encodeURI( document.getElementById("txtMobile").value )+
							"&etxtDepartment=" + encodeURI( document.getElementById("txtDepartment").value ) +
							"&etxtDescription=" + encodeURI( document.getElementById("txtDescription").value )+
							"&etxtStatus=" + encodeURI( document.getElementById("txtStatus").value );

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
			showBox('manage_information.php',UserID);
		}				
	}

}

function addAjax(user) {
	setAjax();
	var url = "manage_add.php";
	var pmeters = "atxtUserID=" + encodeURI( document.getElementById("txtUserID").value) +
							"&atxtUsername=" + encodeURI( document.getElementById("txtUsername").value ) +
							"&atxtPassword=" + encodeURI( document.getElementById("txtPassword").value ) +
							"&atxtName=" + encodeURI( document.getElementById("txtName").value ) +
							"&atxtEmail=" + encodeURI( document.getElementById("txtEmail").value ) +
							"&atxtPhone=" + encodeURI( document.getElementById("txtPhone").value ) +
							"&atxtMobile=" + encodeURI( document.getElementById("txtMobile").value )+
							"&atxtDepartment=" + encodeURI( document.getElementById("txtDepartment").value ) +
							"&atxtDescription=" + encodeURI( document.getElementById("txtDescription").value )+
							"&atxtStatus=" + encodeURI( document.getElementById("txtStatus").value );

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
			showBox('manage_information.php',user);
		}				
	}

}

function deleteAjax(user,myID) {
	setAjax();
	var url = "manage_delete.php";
	var pmeters = "dtxtUserID=" + user; 
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
			showBox('manage_information.php',myID);
		}				
	}

}
function showBoxTB() {
	setAjax();
	var url = "manage_showuser.php";
	var pmeters = "Like=" + encodeURI( document.getElementById("Likebox").value);

	HttPRequest.open('POST',url,true);

	HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.setRequestHeader("Content-length", pmeters.length);
	HttPRequest.setRequestHeader("Connection", "close");
	HttPRequest.send(pmeters);
			
			
	HttPRequest.onreadystatechange = function(){

		if(HttPRequest.readyState == 3)  // Loading Request
		{
			//document.getElementById("showBoxUser").innerHTML = "";
		}

		if(HttPRequest.readyState == 4) // Return Request
		{
			document.getElementById("imgLoadingTB").style.display = 'none';
			document.getElementById('showBoxUser').innerHTML = HttPRequest.responseText;			
		}				
	}

}	

function LoopShowBoxTBOnload(){
	showBoxTB();
	setTimeout("LoopShowBoxTB();",1000);
}

function LoopShowBoxTB(){
	LoopShowBoxTBOnload();
}

function LoadOnFC(user){
	LoopShowBoxTBOnload();
	setTimeout("showBox('manage_information.php',"+user+");",1000);
	//showBox('manage_information.php',user);
}
