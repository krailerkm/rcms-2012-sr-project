//
//  devicea_jax.js
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

function showBox(url,UserID,IpDev) {
	setAjax();
	var pmeters = "sUserID="+UserID+"&sIpDev="+IpDev;

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

function editAjax(UserID,IpDev) {
	setAjax();
	var url = "device_update.php";
	var pmeters = "etxtUserID=" + UserID +
							"&etxtIpDev=" + encodeURI( document.getElementById("txtIpDev").value ) +
							"&etxtReadCom=" + encodeURI( document.getElementById("txtReadCom").value ) +
							"&etxtWriteCom=" + encodeURI( document.getElementById("txtWriteCom").value ) +
							"&etxtUserssh=" + encodeURI( document.getElementById("txtUserssh").value ) +
							"&etxtPassssh=" + encodeURI( document.getElementById("txtPassssh").value ) +
							"&etxtWeb=" + encodeURI( document.getElementById("txtWeb").value ) +
							"&etxtTypeDev=" + encodeURI( document.getElementById("txtTypeDev").value );

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
			showBox('device_information.php',UserID,'');
		}				
	}

}

function snmp(UserID,IpDev) {
	window.location = '../admin/admin_page.php';
}

function addAjax(UserID) {
	setAjax();
	var url = "device_add.php";
	var pmeters = "atxtUserID=" + UserID +
							"&atxtIpDev=" + encodeURI( document.getElementById("txtIpDev").value ) +
							"&atxtReadCom=" + encodeURI( document.getElementById("txtReadCom").value ) +
							"&atxtWriteCom=" + encodeURI( document.getElementById("txtWriteCom").value ) +
							"&atxtUserssh=" + encodeURI( document.getElementById("txtUserssh").value ) +
							"&atxtPassssh=" + encodeURI( document.getElementById("txtPassssh").value ) +
							"&atxtWeb=" + encodeURI( document.getElementById("txtWeb").value ) +
							"&atxtTypeDev=" + encodeURI( document.getElementById("txtTypeDev").value );

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
			showBox('device_information.php',UserID,'');
		}				
	}

}

function deleteAjax(MyID,UserID,IpDev) {
	setAjax();
	var url = "device_delete.php";
	var pmeters = "dUserID=" + UserID + "&dIpDev="+IpDev; 
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
			showBox('device_information.php',MyID);
		}				
	}

}
function showBoxTB() {
	setAjax();
	var url = "device_showuser.php";
	var pmeters = "Like="  +encodeURI(document.getElementById("Likebox").value);
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
	setTimeout("showBox('device_information.php',"+user+",'');",1000);
	//showBox('device_information.php',user);
}
