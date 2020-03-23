<?
	//
	//  monitoring.php
	//  RCMS
	//
	//  Created by KRAILERKM on 1/30/55 BE.
	//  Copyright (c) 2555 __MyCompanyName__. All rights reserved.
	//
	function validName($str) { //split " "  : EX:string "R1" --> "R1"
	list($type, $name) = split(" ",$str,2);
    return $name;
	} 	
	function validNameP($str) { //split " "  : EX:string "R1" --> "R1"
	list($p, $name) = split('[\".\"]',$str);
    return $name;
	} 

	
	$name = snmp2_get(trim($_POST["txtIpDev"]), trim($_POST["txtReadCom"]), "iso.3.6.1.2.1.1.5.0");
	$b = snmp2_get(trim($_POST["txtIpDev"]), trim($_POST["txtReadCom"]), "iso.3.6.1.2.1.2.1.0");
	$c = snmp2_walk(trim($_POST["txtIpDev"]), trim($_POST["txtReadCom"]), "iso.3.6.1.2.1.2.2.1.2");
	$d = snmp2_walk(trim($_POST["txtIpDev"]), trim($_POST["txtReadCom"]), "iso.3.6.1.2.1.2.2.1.5");
	$e = snmp2_walk(trim($_POST["txtIpDev"]), trim($_POST["txtReadCom"]), "iso.3.6.1.2.1.2.2.1.6");
	$model = snmp2_get(trim($_POST["txtIpDev"]), trim($_POST["txtReadCom"]), "iso.3.6.1.2.1.47.1.1.1.1.2.1");
	$g = snmp2_walk(trim($_POST["txtIpDev"]), trim($_POST["txtReadCom"]), "1.3.6.1.2.1.2.2.1.7");
	$timeup = snmp2_get(trim($_POST["txtIpDev"]), trim($_POST["txtReadCom"]), "1.3.6.1.2.1.1.3.0");
	$contact = snmp2_get(trim($_POST["txtIpDev"]), trim($_POST["txtReadCom"]), "1.3.6.1.2.1.1.4.0");
	$location = snmp2_get(trim($_POST["txtIpDev"]), trim($_POST["txtReadCom"]), "1.3.6.1.2.1.1.6.0");
	$description= snmp2_get(trim($_POST["txtIpDev"]), trim($_POST["txtReadCom"]), "1.3.6.1.2.1.1.1.0");
	$ipinterface = snmp2_walk(trim($_POST["txtIpDev"]), trim($_POST["txtReadCom"]), "1.3.6.1.2.1.4.20.1.1");
	$ipinterfaceindex = snmp2_walk(trim($_POST["txtIpDev"]), trim($_POST["txtReadCom"]), "1.3.6.1.2.1.4.20.1.2");
	for($i=0; $i<(validName($b)-1); $i++){
		$ipif[$i]="N/A";
	}
	//foreach ($ipinterfaceindex as $val) { !! SHOW IP INTERFACE 1 IP FOR INTERFACE !!
	for($i=0; $i<(validName($b)-1); $i++){
		for($j=0; $j<(validName($b)-1); $j++){
			if(validName($ipinterfaceindex[$i])==$j+1){
				$ipif[$j]=validName($ipinterface[$i]);
			}
		}
	}
	//}
?>
		
<p><strong><em>System</em></strong></p>
<table>
      <tr>
        <td>Name: </td>
        <td>
			<div id="namesu"><?=validNameP(validName($name));?> <input type="button" name="edit" value="  Edit  " OnClick="JavaScript:showName();"></div><div id="nameru" style="display:none;"><input type="text" id="txtName" value="<?=validNameP(validName($name));?>"><input type="button" name="save" value="  Save  " OnClick="JavaScript:statusName('<?=$_POST["txtIpDev"]?>','<?=$_POST["txtReadCom"]?>','<?=$_POST["txtWriteCom"]?>','<?=$_POST["txtSnmpVer"]?>')"><input type="button" name="cancel" value="  Cancel  " OnClick="JavaScript:cancelName();"></div>
        </td>
      </tr> 
	  <tr>
        <td>Model: </td>
        <td><?=validNameP(validName($model));?>
        </td>
      </tr>
	  <tr>
	    <td>UpTime: </td>
	    <td><?=validName($timeup);?></td>
  </tr>
	  <tr>
	    <td>Contact: </td>
	    <td>
			<div id="contactsu"><?=validNameP(validName($contact));?> <input type="button" name="edit" value="  Edit  " OnClick="JavaScript:showContact();"></div><div id="contactru" style="display:none;"><input type="text" id="txtContact" value="<?=validNameP(validName($contact));?>"><input type="button" name="save" value="  Save  " OnClick="JavaScript:statusContact('<?=$_POST["txtIpDev"]?>','<?=$_POST["txtReadCom"]?>','<?=$_POST["txtWriteCom"]?>','<?=$_POST["txtSnmpVer"]?>')"><input type="button" name="cancel" value="  Cancel  " OnClick="JavaScript:cancelContact();"></div>
		</td>
  </tr>
	  <tr>
	    <td>Location: </td>
	    <td>
			<div id="locationsu"><?=validNameP(validName($location));?> <input type="button" name="edit" value="  Edit  " OnClick="JavaScript:showLocation();"></div><div id="locationru" style="display:none;"><input type="text" id="txtLocation" value="<?=validNameP(validName($location));?>"><input type="button" name="save" value="  Save  " OnClick="JavaScript:statusLocation('<?=$_POST["txtIpDev"]?>','<?=$_POST["txtReadCom"]?>','<?=$_POST["txtWriteCom"]?>','<?=$_POST["txtSnmpVer"]?>')"><input type="button" name="cancel" value="  Cancel  " OnClick="JavaScript:cancelLocation();"></div>
		</td>
  </tr>
	  <tr>
	    <td>Descr: </td>
	    <td><?=validNameP(validName($description));?></td>
  </tr>
 </table>
 <br />
 <p><strong><em>Interface : 
  <?=validName($b)-1;?>
 </em> </strong></p>
 <table width="680" border="1">
      <tr>
      	<td>Interface Name</td>
		<td>Speed</td>
		<td>Physical Address</td>
        <td>IP Address</td>
		<td>IF Status</td>
	  </tr>
      <tr>
		<td><? for($i=0; $i<(validName($b)-1); $i++){echo validNameP(validName($c[$i]))."<br>";} ?></td>
		<td><? for($i=0; $i<(validName($b)-1); $i++){echo validName($d[$i])/1000000; echo "Mbps <br>";} ?></td>
		<td><? for($i=0; $i<(validName($b)-1); $i++){echo validName($e[$i])."<br>";} ?></td>
        <td><? for($i=0; $i<(validName($b)-1); $i++){echo $ipif[$i]."<br>";} ?></td>
		<td><? for($i=0; $i<(validName($b)-1); $i++){ if(validName($g[$i])==2){ ?> <img src="./image/f.gif"> Down 
		  <input type="button" name="up" value="  up  " OnClick="JavaScript:statusIF('<?=$_POST["txtIpDev"]?>','<?=$_POST["txtReadCom"]?>','<?=$_POST["txtWriteCom"]?>','<?=$_POST["txtSnmpVer"]?>','<?=$i+1;?>','1')"><br/> 
		  <? } else { ?>
		<img src="./image/t.gif">Up 
		<input type="button" name="down" value=" down " OnClick="JavaScript:statusIF('<?=$_POST["txtIpDev"]?>','<?=$_POST["txtReadCom"]?>','<?=$_POST["txtWriteCom"]?>','<?=$_POST["txtSnmpVer"]?>','<?=$i+1;?>','2')"><br/><? } } ?></td>
	  </tr>
     
  </table>
