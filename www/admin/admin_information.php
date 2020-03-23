<?
	//
	//  admin_information_edit.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "SELECT * FROM db_user,db_userdata WHERE db_user.UserID = db_userdata.UserID AND db_user.UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	mysql_close($objConnect);
?>
<div>
	<div id="search">
		<input type="submit" class="submit" value="Edit" OnClick="JavaScript:showBox('admin_information_edit.php')"/>
	</div><!-- search -->
	<table>
		<tbody>
			<tr>
				<td> &nbsp;UserID:</td>
				<td><?=$objResult["UserID"];?></td>
			</tr>
				
			<tr>
				<td> &nbsp;Username:</td>
				<td><?=$objResult["Username"];?></td>
			</tr>
				
			<tr>
				<td> &nbsp;Password:</td>
				<td><?=$objResult["Password"];?></td>
			</tr>
				
			<tr>
				<td>&nbsp;Name:</td>
				<td><?=$objResult["Name"];?></td>
			</tr>
				
			<tr>
				<td> &nbsp;Email:</td>
				<td><?=$objResult["Email"];?></td>			
            </tr>
				
			<tr>
				<td> &nbsp;Phone:</td>
				<td><?=$objResult["Phone"];?></td>
			</tr>
				
			<tr>
				<td> &nbsp;Mobile:</td>
                <td><?=$objResult["Mobile"];?></td>
			</tr>
				
			<tr>
				<td> &nbsp;Department:</td>
				<td><?=$objResult["Department"];?></td>
			</tr>
				
			<tr>
				<td> &nbsp;Description:</td>
				<td><?=$objResult["Description"];?></td>
			</tr>
				
			<tr>
				<td> &nbsp;Status:</td>
				<td><?=$objResult["Status"];?></td>
			</tr>
		</tbody>
	</table>
</div>