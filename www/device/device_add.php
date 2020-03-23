<?
	//
	//  device_add_function.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "INSERT INTO db_device ";
	$strSQL .="(UserID,IpDev,ReadCom,WriteCom,Userssh,Passssh,Web,TypeDev) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST['atxtUserID']."','".$_POST["atxtIpDev"]."','".$_POST["atxtReadCom"]."' ";
	$strSQL .=",'".$_POST["atxtWriteCom"]."','".$_POST["atxtUserssh"]."','".$_POST["atxtPassssh"]."' ";
	$strSQL .=",'".$_POST["atxtWeb"]."','".$_POST["atxtTypeDev"]."')";

	$objQuery = mysql_query($strSQL);
	if($objQuery){
		echo "Save Done.";
	}
	else{
		echo "Error Save [".$strSQL."]";
	}
	mysql_close($objConnect);
?>