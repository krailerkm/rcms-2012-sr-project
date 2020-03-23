<?
	//
	//  login.php
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
	$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
	$objDB = mysql_select_db("db_rcms");
	$strSQL = "SELECT * FROM db_user,db_userdata WHERE db_user.UserID = db_userdata.UserID AND db_user.UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	mysql_close($objConnect);
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>R-CMS : Router Configuration And Monitoring System</title>
<link rel="stylesheet" media="screen" href="../css/style.css" />
</head>

<script type="text/javascript" src="../data/js/time_ajax.js"></script>

<body Onload="JavaScript:fncAlertTime();">
<div id="daddy">
	<div id="header">
		<div id="logo"><a href="../login/logout.php"><img src="../images/logo.gif" width="318" height="85" /></a><span id="logo-text"><a href="../login/logout.php">RCMS</a></span></div><!-- logo -->
		<div id="menu">
			<ul>
				<li><a href="../data/seccionToUser">Home</a></li>
				<li><a href="../device/onlineck.php">Device</a></li>
				<?if($_SESSION['Status']=="ADMIN"){?><li><a href="../manage/manage.php">Manage</a></li><? } ?>
				<li><a id="active" href="./about.php">About</a></li>
				<li><a href="../contact/contact.php">Contact</a></li>
				<li><a href="../login/logout.php">Logout</a></li>
			</ul>
			</ul>
	  </div><!-- menu -->
		<div id="ticker">
			Wellcome user <a href="../admin/admin_page.php"><?=$objResult["Name"];?></a> : <?=$_SESSION['Status']?> status , or contact us about our programs, as well as feedback.
		</div><!-- ticker -->
		</div>
        
        <div id="content">
		<div id="cA">
        
			<div class="Ctopleft"></div>
		  <h3 align="left"></h3>
          
          <img src="../images/router.png" width="257" height="164">
          
          </div><!-- cA -->
		<div id="cB">
        
			<div class="Ctopright"></div>
		  <h3>About  (R-CMS)</h3>
            <h2>   The system has verified the device settings of the router, a program that can display the operating status of the router equipment, and can set some status of the router equipment. This program will be able to add devices that need care. To help manage the device to be able to use more conveniently. And is part of the graduate project :) </h2>
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
			<span class="valid">Valid <a href="http://www.w3schools.com/html/html_xhtml.asp">XHTML</a> + <a href="http://www.w3schools.com/css/">CSS</a> + <a href="http://www.w3schools.com/ajax/default.asp">AJAX</a></span>Copyright 2012, Programming by <a href="">KRAILERKM<span class="star">*</span></a>
		</div><!-- foot1 -->
	</div><!-- foot -->
</div><!-- footer -->
</body>
</html>
