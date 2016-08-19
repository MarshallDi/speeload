<?php
	$d1="users/";
	$d2="uploads/";
	$bti="<a href='index.php' class='btn'>Back to index page</a>";
	$fb="http://flavien.berwick.fr/projects/speeload/uploads/";
	
	function tabJson($j){
		$r="<table class=\"responsive-table\"><th>Name</th><th>Ext.</th><th>Options</th><th>Date</th>";
		foreach($j["files"] as $f){
			$r.= "<tr><td>{$f["name"]}</td><td><span class=\"collection badge yellow\" style=\"right:initial;position:relative;\">{$f["ext"]}</span></td><td><b><a href='uploads/{$f["comp"]}'>Download</a></b></td><td>".date("d/m/y h:i:s",$f["date"])."</td></tr>";
		}
		$r.="</table>";
		return $r;
	}
	
	function moku($d2,$comp,$name){
		echo msg_ok("","User file created : <b><a target='blank' href='$d2$comp'>{$name}</a></b>.");
	}
	
	function msg_ok($t,$s=""){
		echo "<div class=\"collection\">
		<div class=\"collection-item\"><span class=\"new badge green\">{$t}</span>{$s}</div>
		</div>";
	}
	
	function msg_err($t,$s=""){
		echo "<div class=\"collection\">
		<div class=\"collection-item\"><span class=\"new badge red\">{$t}</span>{$s}</div>
		</div>";
	}
	
	function getIp(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	
	function createFileU($usru,$cont){
		$c="users/".$usru;
		del($c);
		return file_put_contents($c,$cont);
	}
	
	function del($s){
		@unlink($s);
	}
?>