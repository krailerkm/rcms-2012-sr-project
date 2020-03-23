<?
	//
	//  device_delete_function.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "DELETE FROM db_device ";
	$strSQL .="WHERE UserID = '".$_POST["dUserID"]."' AND IpDev = '".$_POST["dIpDev"]."' ";
	$objQuery = mysql_query($strSQL);
	if($objQuery){
		echo "Delete Done.".$_POST["dUserID"].$_POST["dIpDev"];
	}
	else{
		echo "Error Delete [".$strSQL."]";
	}
	mysql_close($objConnect);
?>