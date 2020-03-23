<?
	//
	//  snmp.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	if($_SESSION['UserID'] == ""){
		echo "Please Login";
		header("Location:../login/login.php");
		exit();
	}
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>R-CMS : Router Configuration And Monitoring System</title>
<link rel="stylesheet" media="screen" href="../css/style.css" />
</head>

<script type="text/javascript" src="../data/js/time_ajax.js"></script>
<script type="text/javascript" src="./js/snmp.js"></script>
<?
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "SELECT * FROM db_device WHERE UserID = '".$_POST['UserID']."'AND IpDev = '".$_POST['IpDev']."'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	mysql_close($objConnect);
?>
<body Onload="JavaScript:fncAlertTime();doMonitor('<?=$objResult['IpDev']?>','<?=$objResult['ReadCom']?>','<?=$objResult['WriteCom']?>','<?=$objResult['SnmpVer']?>')">
<div id="daddy">
	<div id="header">
		<div id="logo"><a href="./login.php"><img src="../images/logo.gif" width="318" height="85" /></a><span id="logo-text"><a href="./login.php">RCMS</a></span></div><!-- logo -->
		<div id="menu">
			<ul>
				<li><a href="../data/seccionToUser">Home</a></li>
				<li><a id="active" href="../device/device.php">Device</a></li>
				<?if($_SESSION['Status']=="ADMIN"){?><li><a href="../manage/manage.php">Manage</a></li><? } ?>
				<li><a  href="./about/about.php">About</a></li>
				<li><a href="../contact/contact.php">Contact</a></li>
				<li><a href="../login/logout.php">Logout</a></li>
			</ul>
			</ul>
	  </div><!-- menu -->
		<div id="ticker">
<?
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "SELECT * FROM db_userdata WHERE UserID = '".$_SESSION['UserID']."'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	mysql_close($objConnect);
?>
			Wellcome user <a href="../admin/admin_page.php"><?=$objResult["Name"];?></a> : <?=$_SESSION['Status']?> status , or contact us about our programs, as well as feedback.
		</div><!-- ticker -->
		</div>
		
		
		<div id="content">
		<div id="cA">
			<div class="Ctopleft"></div>
			<h3></h3>
			<br>
<?
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "SELECT * FROM db_device WHERE UserID = '".$_SESSION['UserID']."'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
			<h2>Other Device</h2>
			<ul class="sidemenu">
<?
	while($objResult = mysql_fetch_array($objQuery)){
?>
				<li>
<?
	if($objResult["Status"]=='T'){
?>
	<a href="JavaScript:doMonitor('<?=$objResult['IpDev']?>','<?=$objResult['ReadCom']?>','<?=$objResult['WriteCom']?>','<?=$objResult['SnmpVer']?>')"><?=$objResult["IpDev"];?> ONLINE </a>
<?
	}
	else{
?>
	<?=$objResult["IpDev"];?> OFFLINE
<?
	}
?>
				</li>
<?
	}
	mysql_close($objConnect);
?>
			</ul>	
		</div><!-- cA -->
		<div id="cB">
			<div class="Ctopright"></div>
            <br>
<?
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "SELECT * FROM db_device WHERE UserID = '".$_POST['UserID']."'AND IpDev = '".$_POST['IpDev']."'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	mysql_close($objConnect);
?>
			<h3>Information <input name="btnSend" type="button" id="btnSend" value="Webmanage" onClick="JavaScript:window.location='<?=$objResult['Web']?>'"></h3>
            <br>
            <br>
			<span id="mySpan"></span><!-- mySpan -->
            
			<center><table width="270" height="100" id="imgLoading">
            	<tr>
                	<td align="center"><img src="../images/loading.gif"></td>
                </tr>
				<tr>
                	<td align="center">Now is Loading...</td>
                </tr>
            </table></center>
            <br>
            
 
            
			<br>
            
<table width="680" height="320" border="1" cellpadding="2" cellspacing="2" id="myssh" style="display:none;">
  <tr>
    <td width="680" height="291" valign="top">
	<div style=width:670;height:280;overflow:auto> 
		<span id="mysshcom"></span>
	</div>
	</td>
  </tr>
  
  <tr>
    <td height="22" valign="top"><form action="" method="post" name="frmMain" id="frmMain">
      <div align="center">
        Command : 
        <input name="txtCommand" type="text" id="txtCommand" size="80">
        <input name="btnSend" type="button" id="btnSend" value="Send" onClick="JavaScript:doSsh('<?=$_POST['IpDev']?>','<?=$objResult['Userssh']?>','<?=$objResult['Passssh']?>')">
      </div>
    </form></td>
  </tr>
</table>
		</div><!-- cB -->
		<div class="Cpad">
			<br class="clear" /><div class="Cbottomleft"></div><div class="Cbottom"></div><div class="Cbottomright"></div>
		</div><!-- Cpad -->
	</div><!-- content -->
		
		
	<div id="properspace"></div><!-- properspace -->
</div><!-- daddy -->




<div id="footer">
	<div id="foot">
		<div id="foot1"><span id="myTime"></span></div><!-- foot1 -->
		<div id="foot2">
		<span class="valid">Valid <a href="http://www.w3schools.com/html/html_xhtml.asp">XHTML</a> + <a href="http://www.w3schools.com/css/">CSS</a> + <a href="http://www.w3schools.com/ajax/default.asp">AJAX</a></span>Copyright 2012, Programming by <a href="">KRAILERKM<span class="star">*</span></a></div><!-- foot1 -->
	</div><!-- foot -->
</div><!-- footer -->
</body>
</html>
