<?
	//
	//  manage_update_function.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "UPDATE db_user SET ";
	$strSQL .="Password = '".$_POST["etxtPassword"]."' ";
	$strSQL .=",Status = '".$_POST["etxtStatus"]."' ";
	$strSQL .="WHERE UserID = '".$_POST["etxtUserID"]."' ";
	$objQuery = mysql_query($strSQL);
	if($objQuery){
		echo "Save Done.";
		$strSQL = "UPDATE db_userdata SET ";
		$strSQL .="Name = '".$_POST["etxtName"]."' ";
		$strSQL .=",Email = '".$_POST["etxtEmail"]."' ";
		$strSQL .=",Phone = '".$_POST["etxtPhone"]."' ";
		$strSQL .=",Mobile = '".$_POST["etxtMobile"]."' ";
		$strSQL .=",Department = '".$_POST["etxtDepartment"]."' ";
		$strSQL .=",Description = '".$_POST["etxtDescription"]."' ";
		$strSQL .="WHERE UserID = '".$_POST["etxtUserID"]."' ";
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