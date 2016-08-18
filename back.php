<?php include("head.php");?>
	<h5>Find back your files.</h5>
	<br/>
	<?php
		$auto=(isset($_GET["auto"]))?$_GET["auto"]:null;
		$sbs=(isset($_POST["sb_s"]))?$_POST["sb_s"]:null;
		if(isset($auto)||isset($sbs)){
			if(isset($auto)){
				$ip=sha1(md5(getIp()));
				if(file_exists($d1.$ip)){
					$j=json_decode(file_get_contents($d1.$ip),true);
					echo "<table>
					<th>Name</th><th>Options</th><th>Date</th>";
					foreach($j["files"] as $f){
						echo "<tr><td>{$f["name"]}</td><td><b><a href='uploads/{$f["comp"]}'>Download</a></b></td><td>".date("d/m/y h:i:s",$f["date"])."</td></tr>";
					}
					echo "</table>";
				}else{
				echo msg_err("No file found.","You've not uploaded any file yet.");
				}
				}else if(isset($sbs)){
				
			}
		}
	include("foo.html");?>			