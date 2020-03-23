<?
	//
	//  name.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
		session_start();
		$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
		$objDB = mysql_select_db("db_rcms");
		$strSQL = "INSERT INTO db_userupdate ";
		$strSQL .="(UserID,IpDevice,Date,Time,Data_update) ";
		$strSQL .="VALUES ";
		$strSQL .="('".$_SESSION['UserID']."','".$_POST["txtIpDev"]."','".date("Y-m-d")."' ";
		$strSQL .=",'".date("H:i:s")."','hostname : ".$_POST["txtSt"]."')";
		$objQuery = mysql_query($strSQL);
		if($objQuery){
			echo "Save Done.";
		}
		else{
			echo "Error Save [".$strSQL."]";
		}
		mysql_close($objConnect);
		snmp2_set($_POST["txtIpDev"], $_POST["txtWriteCom"], "iso.3.6.1.2.1.1.5.0", "s", $_POST["txtSt"]);
		echo "OK";
?>
  