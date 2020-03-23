<?
	//
	//  ssh.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	$strFileName = "ssh.txt";
	$objFopen = fopen($strFileName, 'w');
	$strText1 = $_POST["txtCommand"]."\r\n";
	fwrite($objFopen, $strText1);
	if($objFopen){
		//echo "File writed.";
	}
	else{
		//echo "File can not write";
	}
	fclose($objFopen);

	$strFileName = "ssh.txt";
	$objFopen = fopen($strFileName, 'r');
	if ($objFopen) {
    	while (!feof($objFopen)) {
        	$file = fgets($objFopen, 4096);
        	echo $file." : ";
			if($ssh = ssh2_connect($_POST["txtIpDev"], 22)) {
    			if(ssh2_auth_password($ssh, 'admin', '1234')) {
        		$stream = ssh2_exec($ssh, $file);
        		stream_set_blocking($stream, true);
        		$data = '';
        		while($buffer = fread($stream, 4096)) {
            		$data .= $buffer;
        		}
        		echo $data; // user
    			}
			}
			echo "<br>";
    	}
		fclose($stream);
    	fclose($objFopen);
	}
?>