<?
	//
	//  onlineck.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "SELECT * FROM db_device WHERE UserID = '".$_SESSION['UserID']."'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery)){
		$usenet = fsockopen($objResult["IpDev"], '22', $errno, $errstr, '6'); 
		if(!$usenet){
			$objConnect2 = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
			$objDB2 = mysql_select_db("db_rcms");
			$strSQL2 = "UPDATE db_device SET ";
			$strSQL2 .="Status = 'F' ";
			$strSQL2 .="WHERE UserID = '".$_SESSION['UserID']."' AND IpDev = '".$objResult["IpDev"]."'";
			$objQuery2 = mysql_query($strSQL2);
			if($objQuery2){
				echo "Save Done F.<br>";
			}
			else{
				echo "Error Save [".$strSQL."]";
			}
			
		}
		else { 
			$objConnect2 = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
			$objDB2 = mysql_select_db("db_rcms");
			$strSQL2 = "UPDATE db_device SET ";
			$strSQL2 .="Status = 'T' ";
			$strSQL2 .="WHERE UserID = '".$_SESSION['UserID']."' AND IpDev = '".$objResult["IpDev"]."'";
			$objQuery2 = mysql_query($strSQL2);
			if($objQuery2){
				echo "Save Done. T<br>";
			}
			else{
				echo "Error Save [".$strSQL."]";
			}
		}
	}
	mysql_close($objConnect);
	header("Location:./device.php");
?>
