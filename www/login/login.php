<?
	//
	//  login.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>R-CMS : Router Configuration And Monitoring System</title>
<link rel="stylesheet" media="screen" href="../css/style.css" />
</head>

<script type="text/javascript" src="./js/login_ajax.js"></script>
<script type="text/javascript" src="../data/js/time_ajax.js"></script>

<body Onload="JavaScript:fncAlertTime();" onkeypress="if(event.keyCode == 13){JavaScript:doCallAjax();}">

<div id="daddy">
	<div id="header">
		<div id="logo"><a href="./login.php"><img src="../images/logo.gif" width="318" height="85" /></a><span id="logo-text"><a href="./login.php">RCMS</a></span></div><!-- logo -->
		<div id="menu">
			<ul>
				<li><a href="./login.php">Login</a></li>
				<li><a href="JavaScript:doCallPage('about_login.php');">About</a></li>
				<li><a href="JavaScript:doCallPage('contact_login.php');">Contact</a></li>
			</ul>
			</ul>
	    </div><!-- menu -->
		<div id="ticker">
			Log in using <a href="./login.php">RCMS</a> , or contact us about our programs, as well as feedback.
		</div><!-- ticker -->
		</div>
        <div id="loginbox" align="center">
        	<table width="270" height="100" id="imgLoading" style="display:none;" >
            	<tr>
                	<td align="center"><img src="../images/loading.gif"></td>
                </tr>
				<tr>
                	<td align="center">Now is Loading...</td>
                </tr>
            </table>
			<span id="mySpan"></span><!-- worning password -->
        	<table width="270" height="100" id="pg">
        		<tr>
            		<td>Username</td>
                    <td><input type="text" name="txtUsername" id="txtUsername"></td>
            	</tr>
                <tr>
                	<td>Password</td>
                    <td><input type="password" name="txtPassword" id="txtPassword"></td>	
                </tr>
                <tr>
					<td></td>
                	<td align="right"><input name="btnLogin" type="button" id="btnLogin" OnClick="JavaScript:doCallAjax();" value="LOGIN"></td>
                </tr>      
        	</table>
        </div><!-- loginbox -->
		
		<div id="aboutc" style="display:none;" align="right">
			<table>
				<tr><td align="right"><a href="JavaScript:doClosePage();">X</a></td></tr>
            	<tr>
                	<td><span id="aboutSpan"></span></td>
                </tr>
            </table>
		</div><!-- aboutc -->
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
