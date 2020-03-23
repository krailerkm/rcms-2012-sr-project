//
//  login_ajax.php
//  RCMS
//
//  Created by KRAILERKM on 1/30/55 BE.
//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
//
var HttPRequest = false;

function ajaxset(){
	HttPRequest = false;
	if (window.XMLHttpRequest) { // Mozilla, Safari,...
		HttPRequest = new XMLHttpRequest();
		if (HttPRequest.overrideMimeType) {
			HttPRequest.overrideMimeType('text/html');
		}
	} 
	else if (window.ActiveXObject) { // IE
		try {
			HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} 
		catch (e) {
			try {
				HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} 
			catch (e) {}
		}
	} 	  
	if (!HttPRequest) {
		alert('Cannot create XMLHTTP instance');
		return false;
	}
}

function doCallAjax() { /* CHECK USER, PASS, DOWNLOAD */
	ajaxset();	
	//check user
	var url = '../login/function_check_login.php';
	var pmeters = "tUsername=" + encodeURI( document.getElementById("txtUsername").value) + "&tPassword=" + encodeURI( document.getElementById("txtPassword").value );
	HttPRequest.open('POST',url,true);
	HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.setRequestHeader("Content-length", pmeters.length);
	HttPRequest.setRequestHeader("Connection", "close");
	HttPRequest.send(pmeters);
	HttPRequest.onreadystatechange = function(){
		if(HttPRequest.readyState == 3){  // Loading Request
			document.getElementById("pg").style.display = 'none';
			document.getElementById("mySpan").style.display = 'none';
			document.getElementById("imgLoading").style.display = '';
		}
		if(HttPRequest.readyState == 4){ // Return Request
			if(HttPRequest.responseText == 'YES'){ //ADMIN USER
				window.location = '../admin/admin_page.php'; //admin page
			}
			else{
				document.getElementById("mySpan").style.display = '';
				document.getElementById("pg").style.display = '';
				document.getElementById("imgLoading").style.display = 'none';
				document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
			}
		}
	}
}

function doCallPage(url) { /* SHOW PAGE ABOUT AND CONTACT */
	ajaxset();
	var pmeters = "";
	HttPRequest.open('POST',url,true);
	HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.setRequestHeader("Content-length", pmeters.length);
	HttPRequest.setRequestHeader("Connection", "close");
	HttPRequest.send(pmeters);
	HttPRequest.onreadystatechange = function(){
		if(HttPRequest.readyState == 3){  // Loading Request
			document.getElementById("aboutc").style.display = '';
			document.getElementById("aboutSpan").innerHTML = "Now is Loading...";
		}
		if(HttPRequest.readyState == 4){ // Return Request	
			document.getElementById("aboutc").style.display = '';
			document.getElementById('aboutSpan').innerHTML = HttPRequest.responseText;
		}				
	}
}
	   
function doClosePage() { /* Close PAGE ABOUT AND CONTACT */
	document.getElementById("aboutc").style.display = 'none';
}
	   
/*function fncAlertTime(){
	setTimeout("fncDisplyTime();",1000) 
}

function fncDisplyTime(){
	myTime.innerHTML = new Date();	
	fncAlertTime();
}*/