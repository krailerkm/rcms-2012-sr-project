<?
	//
	//  manage_delete_function.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "DELETE FROM db_user ";
	if($_POST["dtxtUserID"]=='0001'||$_POST["dtxtUserID"]=='0002'){
		exit();
	}
	$strSQL .="WHERE UserID = '".$_POST["dtxtUserID"]."' ";
	$objQuery = mysql_query($strSQL);
	if($objQuery){
		echo "Delete Done.";
		$strSQL = "DELETE FROM db_userdata ";
		$strSQL .="WHERE UserID = '".$_POST["dtxtUserID"]."' ";
		$objQuery = mysql_query($strSQL);
		if($objQuery){
			echo "Delete Done.";
		}
		else{
			echo "Error Delete [".$strSQL."]";
		}
	}
	else{
		echo "Error Delete [".$strSQL."]";
	}
	mysql_close($objConnect);
?>