<?php
	//
	//  function_check_login.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//

	session_start();

	$strUsername = trim($_POST["tUsername"]);
	$strPassword = trim($_POST["tPassword"]);
	
	//*** Check Username ***//
	if(trim($strUsername) == "")
	{
		echo "<font color=red size=\"3\">**</font><font size=\"2\"> Plase input [Username]</font>";
		exit();
	}
	
	//*** Check Password ***//
	if(trim($strPassword) == "")
	{
		echo "<font size=\"3\" color=red>**</font><font size=\"2\"> Plase input [Password]</font>";
		exit();
	}
	

	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");


	//*** Check Username & Password ***//

	$strSQL = "SELECT * FROM db_user WHERE Username = '".$strUsername."' and Password = '".$strPassword."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	if($objResult["Status"] == "ADMIN" || $objResult["Status"] == "USER")
	{

		echo 'YES'; //return admin status
		
		//*** Session ***//
		$_SESSION["Status"] = $objResult["Status"];
		$_SESSION["UserID"] = $objResult["UserID"];
		session_write_close();
		
	}
	else
	{
		echo "<font color=red size=\"3\">**</font><font size=\"2\"> Username & Password is wrong</font>";
	}

	mysql_close($objConnect);
?>