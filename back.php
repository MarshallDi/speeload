<?php include("head.php");?>
<h5>Find back your files.</h5>
<br/>
<?php
	echo $bti;
	$auto=(isset($_GET["auto"]))?"auto":false;
	$sbu=(isset($_POST["usr_s"])&&!empty($_POST["usr_s"]))?sha1(md5($_POST["usr_s"])):false;
	$sbp=(isset($_POST["pw_s"])&&!empty($_POST["pw_s"]))?sha1($_POST["pw_s"]."spd"):false;
	if($auto||$sbu){
		if($auto){
			$ip=sha1(md5(getIp()));
			if(file_exists($d1.$ip)){
				$j=json_decode(file_get_contents($d1.$ip),true);
				echo tabJson($j);
				}else{
				echo ic("No file found.","You haven't uploaded any file yet.");
			}
			}else if($sbu&&$sbp){
			if(file_exists($d1.$sbu)){
				$j=json_decode(file_get_contents($d1.$sbu),true);
				if($j["pwd"]==$sbp){
					echo tabJson($j);
					}else{
					echo ic("Access forbidden.","Incorrect password.");
				}
				}else{
				echo ic("No file found.","This repertory doesn't exists.");
			}
		}
	}
include("foo.php");?>			