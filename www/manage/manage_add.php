<?
	//
	//  manage_add_function.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "INSERT INTO db_user ";
	$strSQL .="(UserID,Username,Password,Status) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST['atxtUserID']."','".$_POST["atxtUsername"]."','".$_POST["atxtPassword"]."' ";
	$strSQL .=",'".$_POST["atxtStatus"]."')";

	$objQuery = mysql_query($strSQL);
	if($objQuery)
	{
		echo "Save Done.";
		$strSQL = "INSERT INTO db_userdata ";
		$strSQL .="(UserID,Name,Email,Phone,Mobile,Department,Description) ";
		$strSQL .="VALUES ";
		$strSQL .="('".$_POST['atxtUserID']."','".$_POST["atxtName"]."','".$_POST["atxtEmail"]."' ";
		$strSQL .=",'".$_POST["atxtPhone"]."','".$_POST["atxtMobile"]."','".$_POST["atxtDepartment"]."' ";
		$strSQL .=",'".$_POST["atxtDescription"]."')";
		$objQuery = mysql_query($strSQL);
		if($objQuery){
			echo "Save Done.";
		}
		else{
			echo "Error Save [".$strSQL."]";
		}
	}
	else{
		echo "Error Save [".$strSQL."]";
	}
	mysql_close($objConnect);
?>