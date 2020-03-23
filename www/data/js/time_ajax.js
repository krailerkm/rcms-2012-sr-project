//
//  timehost_ajax.php
//  RCMS
//
//  Created by KRAILERKM on 1/30/55 BE.
//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
//  
function doClosePage() { /* Close PAGE ABOUT AND CONTACT */
	document.getElementById("aboutc").style.display = 'none';
}
	   
function fncAlertTime(){
	setTimeout("fncDisplyTime();",1000) 
}

function fncDisplyTime(){
	myTime.innerHTML = new Date();	
	fncAlertTime();
}
