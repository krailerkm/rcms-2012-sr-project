<?
	//
	//  manage_information_add_module.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "SELECT MAX(UserID)+1 AS Max FROM db_user";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$myUserID = str_pad($objResult["Max"], 4, "0", STR_PAD_LEFT); 
	mysql_close($objConnect);
?>
<div>
	<div id="search">
		<input type="submit" class="submit" value="Save" OnClick="JavaScript:addAjax('<?=$myUserID?>')"/>
		<input type="submit" class="submit" value="Cancel" OnClick="JavaScript:showBox('manage_information.php','<?=$_SESSION['UserID']?>')"/>
	</div><!-- search -->
	<table>
		<tbody>
			<tr>
				<td> &nbsp;UserID:</td>
				<td><input type="text" id="txtUserID" value="<?=$myUserID?>" disabled=true></td>
			</tr>
				
			<tr>
				<td> &nbsp;Username:</td>
				<td><input type="text" id="txtUsername"></td>
			</tr>
				
			<tr>
				<td> &nbsp;Password:</td>
				<td><input type="text" id="txtPassword"></td>
			</tr>
				
			<tr>
				<td>&nbsp;Name:</td>
				<td><input type="text" id="txtName"></td>
			</tr>
				
			<tr>
				<td> &nbsp;Email:</td>
				<td><input type="text" id="txtEmail"></td>
			</tr>
				
			<tr>
				<td> &nbsp;Phone:</td>
				<td><input type="text" id="txtPhone"></td>
			</tr>
				
			<tr>
				<td> &nbsp;Mobile:</td>
				<td><input type="text" id="txtMobile"></td>
			</tr>
				
			<tr>
				<td> &nbsp;Department:</td>
				<td><input type="text" id="txtDepartment"></td>
			</tr>
				
			<tr>
				<td> &nbsp;Description:</td>
				<td><input type="text" id="txtDescription"></td>
			</tr>
				
			<tr>
				<td> &nbsp;Status:</td>
				<td>
                	<select id="txtStatus">
                    	<option value="USER">User</option>
						<option value="ADMIN">Admin</option>	
					</select>
                </td>
			</tr>
		</tbody>
	</table>
</div>