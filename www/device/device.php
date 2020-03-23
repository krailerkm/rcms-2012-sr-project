<?
	//
	//  device.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
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
<script type="text/javascript" src="./js/device_js.js"></script>

<body Onload="JavaScript:fncAlertTime();LoadOnFC(<?=$_SESSION['UserID']?>)">
<div id="daddy">
	<div id="header">
		<div id="logo"><a href="../login/logout.php"><img src="../images/logo.gif" width="318" height="85" /></a><span id="logo-text"><a href="../login/logout.php">RCMS</a></span></div><!-- logo -->
		<div id="menu">
			<ul>
				<li><a href="../data/seccionToUser">Home</a></li>
				<li><a id="active" href="./device.php">Device</a></li>
				<?if($_SESSION['Status']=="ADMIN"){?><li><a  href="../manage/manage.php">Manage</a></li><? } ?>
				<li><a href="../about/about.php">About</a></li>
				<li><a href="../contact/contact.php">Contact</a></li>
				<li><a href="../login/logout.php">Logout</a></li>
			</ul>
			</ul>
	  </div><!-- menu -->
		<div id="ticker">
			Wellcome user <a href="../admin/admin_page.php"><?=$objResult["Name"];?></a> : <?=$_SESSION['Status']?> status , or contact us about our programs, as well as feedback.
		</div><!-- ticker -->
		</div><!-- header -->
        
        
	<div id="content">
		<div id="cA">
			<div class="Ctopleft"></div>
			<h3>Device Information</h3>
			<div align="center"><table width="100" height="200" id="imgLoading">
            	<tr>
                	<td><img src="../images/loading.gif"></td>
                </tr>
				<tr>
                	<td>Now is Loading...</td>
                </tr>
            </table></div><!-- loadicon -->
			<span id="showBox"></span><!-- Info -->
		</div><!-- cA -->
        
		<div id="cB">
			<div class="Ctopright"></div>
			<h3>Device Manage</h3>
			<div id="search">
				<input type="text" class="search" id="Likebox"/>
                <input type="submit" class="submit" value="SEARCH"/>
                <input type="submit" class="submit" value="Adduser" OnClick="JavaScript:showBox('device_information_add.php','<?=$_SESSION['UserID']?>','')"/>
			</div><!-- search -->
            
			<div align="center"><table width="100" height="200" id="imgLoadingTB">
            	<tr>
                	<td><img src="../images/loading.gif"></td>
                </tr>
				<tr>
                	<td>Now is Loading...</td>
                </tr>
            </table></div><!-- loadicon -->
			<div align="center">
			<span id="showBoxUser"></span><!-- showuser -->
			</div>
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