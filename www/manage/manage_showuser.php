<?
	//
	//  manage_showusertable_module.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	if($_POST['Like']==""){
		$strSQL = "SELECT * FROM db_user,db_userdata WHERE db_user.UserID = db_userdata.UserID;";
	}
	else{
		$strSQL = "SELECT * FROM db_user,db_userdata WHERE db_user.UserID = db_userdata.UserID AND Username LIKE '%".$_POST['Like']."%' OR db_user.UserID = db_userdata.UserID AND Name LIKE '%".$_POST['Like']."%' OR db_user.UserID = db_userdata.UserID AND Email LIKE '%".$_POST['Like']."%' OR db_user.UserID = db_userdata.UserID AND Mobile LIKE '%".$_POST['Like']."%' OR db_user.UserID = db_userdata.UserID AND Status LIKE '%".$_POST['Like']."%'";
	}
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
	<table border="1">
  	<tr>
		<th><div align="center"></div></th>
    	<th width="100"> <div>Username</div></th>
    	<th width="194"> <div>Name</div></th>
    	<th width="150"> <div>Email</div></th>
    	<th width="60"> <div>Mobile</div></th>
    	<th width="70"> <div>Status</div></th>
  	</tr>
<?
	while($objResult = mysql_fetch_array($objQuery)){
?>
  <tr>
	<th><input type="button" value="  Info  " OnClick="JavaScript:showBox('manage_information.php','<?=$objResult["UserID"];?>');" /></th>
    <td><?=$objResult["Username"];?></td>
    <td><?=$objResult["Name"];?></td>
    <td><?=$objResult["Email"];?></td>
    <td align="right"><?=$objResult["Mobile"];?></td>
    <td align="right"><?=$objResult["Status"];?></td>
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