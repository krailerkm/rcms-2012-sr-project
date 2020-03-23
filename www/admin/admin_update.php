<?
	//
	//  admin_update_function.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "UPDATE db_user SET ";
	$strSQL .="Password = '".$_POST["txtPassword"]."' ";
	$strSQL .=",Status = '".$_POST["txtStatus"]."' ";
	$strSQL .="WHERE UserID = '".$_POST['txtUserID']."' ";
	$objQuery = mysql_query($strSQL);
	if($objQuery){
		echo "Save Done.";
		$strSQL = "UPDATE db_userdata SET ";
		$strSQL .="Name = '".$_POST["txtName"]."' ";
		$strSQL .=",Email = '".$_POST["txtEmail"]."' ";
		$strSQL .=",Phone = '".$_POST["txtPhone"]."' ";
		$strSQL .=",Mobile = '".$_POST["txtMobile"]."' ";
		$strSQL .=",Department = '".$_POST["txtDepartment"]."' ";
		$strSQL .=",Description = '".$_POST["txtDescription"]."' ";
		$strSQL .="WHERE UserID = '".$_POST['txtUserID']."' ";
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