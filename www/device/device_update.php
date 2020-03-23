<?
	//
	//  device_update_function.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "UPDATE db_device SET ";
	$strSQL .="ReadCom = '".$_POST["etxtReadCom"]."' ";
	$strSQL .=",WriteCom = '".$_POST["etxtWriteCom"]."' ";
	$strSQL .=",Userssh = '".$_POST["etxtUserssh"]."' ";
	$strSQL .=",Passssh = '".$_POST["etxtPassssh"]."' ";
	$strSQL .=",Web = '".$_POST["etxtWeb"]."' ";
	$strSQL .=",TypeDev = '".$_POST["etxtTypeDev"]."' ";
	$strSQL .="WHERE UserID = '".$_POST["etxtUserID"]."' AND IpDev = '".$_POST["etxtIpDev"]."'";
	$objQuery = mysql_query($strSQL);
	if($objQuery){
		echo "Save Done.";
	}
	else{
		echo "Error Save [".$strSQL."]";
	}
	mysql_close($objConnect);
?>