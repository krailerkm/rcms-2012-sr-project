<?
	//
	//  device_information.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	$myUser = $_POST["sUserID"];
	$myIP = $_POST["sIpDev"];
	
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "SELECT * FROM db_device WHERE UserID = '".$myUser."' AND IpDev = '".$myIP."'";
	if($myIP==""){
		$strSQL = "SELECT * FROM db_device WHERE UserID = '".$myUser."'";
	}
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	mysql_close($objConnect);
?>
<div id="search">
	<input type="submit" class="submit" value="Edituser" OnClick="JavaScript:showBox('device_information_edit.php','<?=$objResult["UserID"];?>','<?=$objResult["IpDev"];?>')" />
    <input type="submit" class="submit" value="Dorpuser" OnClick="JavaScript:deleteAjax('<?=$_SESSION['UserID']?>','<?=$objResult["UserID"];?>','<?=$objResult["IpDev"];?>')" />
</div><!-- search -->

<table>
	<tbody>
		<tr>
			<td> &nbsp;IpDev:</td>
			<td><?=$objResult["IpDev"];?></td>
		</tr>
			
		<tr>
			<td> &nbsp;ReadCom:</td>
			<td><?=$objResult["ReadCom"];?></td>
		</tr>
				
		<tr>
			<td> &nbsp;WriteCom:</td>
			<td><?=$objResult["WriteCom"];?></td>
		</tr>
				
		<tr>
			<td>&nbsp;Userssh:</td>
			<td><?=$objResult["Userssh"];?></td>
		</tr>
        
        <tr>
			<td>&nbsp;Passssh:</td>
			<td><?=$objResult["Passssh"];?></td>
		</tr>
				
        <tr>
			<td> &nbsp;Web:</td>
			<td><a href="<?=$objResult["Web"];?>"><?=$objResult["Web"];?></a></td>
		</tr>
				
		<tr>
			<td> &nbsp;TypeDev:</td>
			<td><?=$objResult["TypeDev"];?></td>
		</tr>
				
	</tbody>
</table>