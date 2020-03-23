<?
	//
	//  seccionToUser.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	if($_SESSION['UserID'] == ""){
		header("Location:../login/login.php");
	}
	else {
		header("Location:../admin/admin_page.php");
	}
?>