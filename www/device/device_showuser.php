<?php
	//
	//  device_showuser.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	//$strSQL = "SELECT * FROM db_device WHERE UserID = '".$_SESSION['UserID']."'";
	if($_POST['Like']==""){
		$strSQL = "SELECT * FROM db_device WHERE UserID = '".$_SESSION['UserID']."'";
	}
	else{
		$strSQL = "SELECT * FROM db_device WHERE UserID = '".$_SESSION['UserID']."' AND IpDev LIKE '%".$_POST['Like']."%' OR UserID = '".$_SESSION['UserID']."' AND Web LIKE '%".$_POST['Like']."%' OR UserID = '".$_SESSION['UserID']."' AND TypeDev LIKE '%".$_POST['Like']."%'";
	}
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table border="1">
  <tr>
	<th><div align="center">Info</div></th>
	<th>Show</th>
    <th width="200"> <div>IpDev</div></th>
    <th width="250"> <div>Web</div></th>
	<th width="100"> <div>TypeDev</div></th>
    <th width="20"> <div>Online</div></th>
  </tr>
<?
	while($objResult = mysql_fetch_array($objQuery)){
?>
  <tr>	
	<th><input type="button" value="  Info  " OnClick="JavaScript:showBox('device_information.php','<?=$objResult["UserID"];?>','<?=$objResult["IpDev"];?>');" /></th>
	<th>
<?
	if($objResult["Status"]=='T'){
?>
	<form  method="post" action="../snmp/snmp.php"><input type="text" name="UserID" id="UserID" value="<?=$objResult["UserID"];?>" style="display:none;"><input type="text" name="IpDev" id="IpDev" value="<?=$objResult["IpDev"];?>" style="display:none;"><input type="submit" value="  Show  "></form>
<?
	}
	else{
?>
	<form  method="post" action="../snmp/snmp.php"><input type="text" name="UserID" id="UserID" value="<?=$objResult["UserID"];?>" style="display:none;"><input type="text" name="IpDev" id="IpDev" value="<?=$objResult["IpDev"];?>" style="display:none;"><input type="submit" value="  Show  " disabled=true></form>
<?
	}
?>
    
    
    
    </th>
    <td><?=$objResult["IpDev"];?></td>
    <td><?=$objResult["Web"];?></td>
	<td><?=$objResult["TypeDev"];?></td>
    <td>
<?
	if($objResult["Status"]=='T'){
?>
	<img src="../snmp/image/t.gif" width="18" height="18" />
<?
	}
	else{
?>
	<img src="../snmp/image/f.gif" width="18" height="18" />
<?
	}
?>
    </td>
  </tr>
<?
	}
?>
</table>
<!--<div align="right">-->
<?
	//echo "Load Table : ".date("H:i:s");
	mysql_close($objConnect);
?>
<!--</div>-->