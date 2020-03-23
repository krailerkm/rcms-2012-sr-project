<?
	//
	//  device_information_edit.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "SELECT * FROM db_device WHERE UserID = '".$_POST['sUserID']."' AND IpDev = '".$_POST['sIpDev']."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	mysql_close($objConnect);
?>
<div>
<div id="search">
	<input type="submit" class="submit" value="Save" OnClick="JavaScript:editAjax('<?=$objResult["UserID"];?>','<?=$objResult["IpDev"];?>')"/>
	<input type="submit" class="submit" value="Cancel" OnClick="JavaScript:showBox('device_information.php','<?=$objResult["UserID"];?>','<?=$objResult["IpDev"];?>')"/>
</div><!-- search -->
<table>
	<tbody>
		<tr>
			<td> &nbsp;IpDev:</td>
			<td><input type="text" id="txtIpDev" value="<?=$objResult["IpDev"];?>" disabled=true></td>
		</tr>
				
		<tr>
			<td> &nbsp;ReadCom:</td>
			<td><input type="text" id="txtReadCom" value="<?=$objResult["ReadCom"];?>"></td>
		</tr>
				
		<tr>
			<td> &nbsp;WriteCom:</td>
			<td><input type="text" id="txtWriteCom" value="<?=$objResult["WriteCom"];?>"></td>
		</tr>

        <tr>
			<td>&nbsp;Userssh:</td>
			<td><input type="text" id="txtUserssh" value="<?=$objResult["Userssh"];?>"></td>
		</tr>
        
       	<tr>
			<td>&nbsp;Passssh:</td>
			<td><input type="text" id="txtPassssh" value="<?=$objResult["Passssh"];?>"></td>
		</tr>
				
		<tr>
			<td> &nbsp;Web:</td>
			<td><input type="text" id="txtWeb" value="<?=$objResult["Web"];?>"></td>
		</tr>
				
		<tr>
			<td> &nbsp;TypeDev:</td>
			<td>
            	<select id="txtTypeDev">
					<option value="Router">Router</option>
					<option value="Switch">Switch</option>
				</select>
            </td>
		</tr>
				
	</tbody>
</table>
</div>