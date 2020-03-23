<?
	//
	//  admin_information_edit.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	$objConnect = mysql_connect("localhost","root","sk8357ys") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "SELECT * FROM db_user,db_userdata WHERE db_user.UserID = db_userdata.UserID AND db_user.UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	mysql_close($objConnect);
?>
<div>
<div id="search">
	<input type="submit" class="submit" value="Save" OnClick="JavaScript:editAjax()"/>
    <input type="submit" class="submit" value="Cancel" OnClick="JavaScript:showBox('admin_information.php')"/>
</div><!-- search -->
	<table>
		<tbody>
			<tr>
				<td> &nbsp;UserID:</td>
				<td><input type="text" id="txtUserID" value="<?=$objResult["UserID"];?>" disabled=true></td>
			</tr>
				
			<tr>
				<td> &nbsp;Username:</td>
				<td><input type="text" id="txtUsername" value="<?=$objResult["Username"];?>" disabled=true></td>
			</tr>
				
			<tr>
				<td> &nbsp;Password:</td>
				<td><input type="text" id="txtPassword" value="<?=$objResult["Password"];?>"></td>
			</tr>
				
				<tr>
					<td>&nbsp;Name:</td>
					<td><input type="text" id="txtName" value="<?=$objResult["Name"];?>"></td>
				</tr>
				
				<tr>
					<td> &nbsp;Email:</td>
					<td><input type="text" id="txtEmail" value="<?=$objResult["Email"];?>"></td>
				</tr>
				
				<tr>
					<td> &nbsp;Phone:</td>
					<td><input type="text" id="txtPhone" value="<?=$objResult["Phone"];?>"></td>
				</tr>
				
				<tr>
					<td> &nbsp;Mobile:</td>
					<td><input type="text" id="txtMobile" value="<?=$objResult["Mobile"];?>"></td>
				</tr>
				
				<tr>
					<td> &nbsp;Department:</td>
					<td><input type="text" id="txtDepartment" value="<?=$objResult["Department"];?>"></td>
				</tr>
				
				<tr>
					<td> &nbsp;Description:</td>
					<td><input type="text" id="txtDescription" value="<?=$objResult["Description"];?>"></td>
				</tr>
				
				<tr>
					<td> &nbsp;Status:</td>
					<td><input type="text" id="txtStatus" value="<?=$objResult["Status"];?>" disabled=true></td>
				</tr>
			</tbody>
	</table>
</div>