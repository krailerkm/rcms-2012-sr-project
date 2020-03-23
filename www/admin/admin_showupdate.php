<?
	//
	//  admin_update_function.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	if($_POST['Like']==""){
		$strSQL = "SELECT * FROM db_userupdate WHERE UserID = '".$_SESSION['UserID']."' ORDER BY Date,Time DESC";
	}
	else{
		$strSQL = "SELECT * FROM db_userupdate WHERE UserID = '".$_SESSION['UserID']."' AND Data_update LIKE '%".$_POST['Like']."%' OR Time LIKE '%".$_POST['Like']."%' OR Date LIKE '%".$_POST['Like']."%' OR IpDevice LIKE '%".$_POST['Like']."%' ORDER BY Date,Time DESC";
	}
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	
?>

<table border="1">
  <tr>
    <th width="100"> <div>IpDevice</div></th>
    <th width="100"> <div>Date</div></th>
    <th width="100"> <div>Time</div></th>
    <th width="350"> <div>Data_update</div></th>
  </tr>
  
<?
	while($objResult = mysql_fetch_array($objQuery)){
?>

  <tr>
    <td><?=$objResult["IpDevice"];?></td>
    <td><?=$objResult["Date"];?></td>
    <td><?=$objResult["Time"];?></td>
    <td><?=$objResult["Data_update"];?></td>
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