//
//  snmp.js
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

function doMonitor(txtIpDev,txtReadCom,txtWriteCom,txtSnmpVer) { /* CHECK USER, PASS, DOWNLOAD */
	ajaxset();	
	//check user
	var url = 'monitoring.php';
	var pmeters = "txtIpDev=" + txtIpDev +
					"&txtReadCom=" + txtReadCom +
					"&txtWriteCom=" + txtWriteCom +
					"&txtSnmpVer=" + txtSnmpVer ;

	HttPRequest.open('POST',url,true);

	HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.setRequestHeader("Content-length", pmeters.length);
	HttPRequest.setRequestHeader("Connection", "close");
	HttPRequest.send(pmeters);
			
	HttPRequest.onreadystatechange = function(){

		if(HttPRequest.readyState == 3)  // Loading Request
		{	
			document.getElementById("mySpan").innerHTML = 'LOAD SNMP';
			//document.getElementById("imgLoading").style.display = '';
		}
		if(HttPRequest.readyState == 4) // Return Request
		{
			document.getElementById("imgLoading").style.display = 'none';
			document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
			document.getElementById("myssh").style.display = '';
			document.getElementById("container").style.display = '';
		}
				
	}

}
	   
function doSsh(txtIpDev,txtUser,txtPass) { /* CHECK USER, PASS, DOWNLOAD */
	ajaxset();	
	//check user
	var url = './ssh/sshinterface.php';
	var pmeters = "txtIpDev=" + txtIpDev +
					"&txtUser=" + txtUser +
					"&txtPass=" + txtPass +
					"&txtCommand=" +encodeURI( document.getElementById("txtCommand").value);

	HttPRequest.open('POST',url,true);

	HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.setRequestHeader("Content-length", pmeters.length);
	HttPRequest.setRequestHeader("Connection", "close");
	HttPRequest.send(pmeters);
			
			
	HttPRequest.onreadystatechange = function()
	{
		if(HttPRequest.readyState == 3)  // Loading Request
		{	
			document.getElementById("mysshcom").innerHTML = 'LOAD SSH';
			//document.getElementById("imgLoading").style.display = '';
		}
		if(HttPRequest.readyState == 4) // Return Request
		{
				document.getElementById("imgLoading").style.display = 'none';
				document.getElementById("mysshcom").innerHTML = HttPRequest.responseText;
		}
				
	}

}

function statusIF(txtIpDev,txtReadCom,txtWriteCom,txtSnmpVer,txtNum,txtSt) { /* CHECK USER, PASS, DOWNLOAD */
	ajaxset();	
	//check user
	var url = './config/ifstatus.php';
	var pmeters = "txtIpDev=" + txtIpDev +
				"&txtNum=" + txtNum +
				"&txtWriteCom=" + txtWriteCom +
				"&txtSnmpVer=" + txtSnmpVer + "&txtSt=" + txtSt ;
	HttPRequest.open('POST',url,true);

	HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.setRequestHeader("Content-length", pmeters.length);
	HttPRequest.setRequestHeader("Connection", "close");
	HttPRequest.send(pmeters);
			
			
	HttPRequest.onreadystatechange = function()
	{

		if(HttPRequest.readyState == 3)  // Loading Request
		{	
			//document.getElementById("mySpan").innerHTML = 'LOAD SNMP';
			//document.getElementById("imgLoading").style.display = '';
		}
		if(HttPRequest.readyState == 4) // Return Request
		{
			//document.getElementById("imgLoading").style.display = 'none';
			//document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
			doMonitor(txtIpDev,txtReadCom,txtWriteCom,txtSnmpVer);
		}
				
	}

}

function statusName(txtIpDev,txtReadCom,txtWriteCom,txtSnmpVer) { /* CHECK USER, PASS, DOWNLOAD */

	ajaxset();	
	//check user
	var url = './config/namestatus.php';
	var pmeters = "txtIpDev=" + txtIpDev +
					"&txtWriteCom=" + txtWriteCom +
					"&txtSnmpVer=" + txtSnmpVer + "&txtSt=" + encodeURI( document.getElementById("txtName").value) ;

	HttPRequest.open('POST',url,true);

	HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.setRequestHeader("Content-length", pmeters.length);
	HttPRequest.setRequestHeader("Connection", "close");
	HttPRequest.send(pmeters);
			
			
	HttPRequest.onreadystatechange = function()
	{

		if(HttPRequest.readyState == 3)  // Loading Request
		{	
			//document.getElementById("mySpan").innerHTML = 'LOAD SNMP';
			//document.getElementById("imgLoading").style.display = '';
		}
		if(HttPRequest.readyState == 4) // Return Request
		{
				//document.getElementById("imgLoading").style.display = 'none';
				//document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
				doMonitor(txtIpDev,txtReadCom,txtWriteCom,txtSnmpVer);
		}
				
	}

}
	   
function statusLocation(txtIpDev,txtReadCom,txtWriteCom,txtSnmpVer) { /* CHECK USER, PASS, DOWNLOAD */
	ajaxset();	
	//check user
	var url = './config/locationstatus.php';
	var pmeters = "txtIpDev=" + txtIpDev +
					"&txtWriteCom=" + txtWriteCom +
					"&txtSnmpVer=" + txtSnmpVer + "&txtSt=" + encodeURI( document.getElementById("txtLocation").value) ;

	HttPRequest.open('POST',url,true);

	HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.setRequestHeader("Content-length", pmeters.length);
	HttPRequest.setRequestHeader("Connection", "close");
	HttPRequest.send(pmeters);
			
			
	HttPRequest.onreadystatechange = function()
	{

		if(HttPRequest.readyState == 3)  // Loading Request
		{	
			//document.getElementById("mySpan").innerHTML = 'LOAD SNMP';
			//document.getElementById("imgLoading").style.display = '';
		}
		if(HttPRequest.readyState == 4) // Return Request
		{
			//document.getElementById("imgLoading").style.display = 'none';
			//document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
			doMonitor(txtIpDev,txtReadCom,txtWriteCom,txtSnmpVer);
		}
				
	}

}
	   
function statusContact(txtIpDev,txtReadCom,txtWriteCom,txtSnmpVer) { /* CHECK USER, PASS, DOWNLOAD */
	ajaxset();	
	//check user
	var url = './config/contactstatus.php';
	var pmeters = "txtIpDev=" + txtIpDev +
					"&txtWriteCom=" + txtWriteCom +
					"&txtSnmpVer=" + txtSnmpVer + "&txtSt=" + encodeURI( document.getElementById("txtContact").value) ;

	HttPRequest.open('POST',url,true);

	HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.setRequestHeader("Content-length", pmeters.length);
	HttPRequest.setRequestHeader("Connection", "close");
	HttPRequest.send(pmeters);
			
			
	HttPRequest.onreadystatechange = function()
	{

		if(HttPRequest.readyState == 3)  // Loading Request
		{	
			//document.getElementById("mySpan").innerHTML = 'LOAD SNMP';
			//document.getElementById("imgLoading").style.display = '';
		}
		if(HttPRequest.readyState == 4) // Return Request
		{
				//document.getElementById("imgLoading").style.display = 'none';
				//document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
				doMonitor(txtIpDev,txtReadCom,txtWriteCom,txtSnmpVer);
		}
				
	}

}
	   
function showName() { /* CHECK USER, PASS, DOWNLOAD */
	document.getElementById("nameru").style.display = '';
	document.getElementById("namesu").style.display = 'none';
}

function cancelName() { /* CHECK USER, PASS, DOWNLOAD */
	document.getElementById("nameru").style.display = 'none';
	document.getElementById("namesu").style.display = '';
}

function showContact() { /* CHECK USER, PASS, DOWNLOAD */
	document.getElementById("contactru").style.display = '';
	document.getElementById("contactsu").style.display = 'none';
}

function cancelContact() { /* CHECK USER, PASS, DOWNLOAD */
	document.getElementById("contactru").style.display = 'none';
	document.getElementById("contactsu").style.display = '';
}

function showLocation() { /* CHECK USER, PASS, DOWNLOAD */
	document.getElementById("locationru").style.display = '';
	document.getElementById("locationsu").style.display = 'none';
}

function cancelLocation() { /* CHECK USER, PASS, DOWNLOAD */
	document.getElementById("locationru").style.display = 'none';
	document.getElementById("locationsu").style.display = '';
}