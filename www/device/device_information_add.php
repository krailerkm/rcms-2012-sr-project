<?
	//
	//  device_information_add.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
?>
<div>
<div id="search">
	<input type="submit" class="submit" value="Save" OnClick="JavaScript:addAjax('<?=$_SESSION['UserID']?>')"/>
	<input type="submit" class="submit" value="Cancel" OnClick="JavaScript:showBox('device_information.php','<?=$_SESSION['UserID']?>','')"/>
</div><!-- search -->
<table>
		<tbody>
			<tr>
				<td> &nbsp;IpDev:</td>
				<td><input type="text" id="txtIpDev"></td>
			</tr>
				
			<tr>
				<td> &nbsp;ReadCom:</td>
				<td><input type="text" id="txtReadCom"></td>
			</tr>
				
			<tr>
				<td> &nbsp;WriteCom:</td>
				<td><input type="text" id="txtWriteCom"></td>
			</tr>
				
			<tr>
				<td>&nbsp;Userssh:</td>
				<td><input type="text" id="txtUserssh"></td>
			</tr>
        
       		<tr>
				<td>&nbsp;Passssh:</td>
				<td><input type="text" id="txtPassssh"></td>
			</tr>
				
				<tr>
					<td> &nbsp;Web:</td>
					<td><input type="text" id="txtWeb"></td>
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