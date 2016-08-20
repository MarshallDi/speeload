<?php
	$d1="users/";
	$d2="uploads/";
	$bti="<a href='index.php' class='btn'>Back to index page</a>";
	$fb=($_SERVER['HTTP_HOST']=="speeload.com")?"uploads/":"http://speeload.com/uploads/";
	
	function getToken($l=10){
		$token = "";
		$ca = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		$max = strlen($ca) - 1;
		for ($i=0; $i < $l; $i++) {
			$token .= $ca[crs(0, $max)];
		}
	return $token;}
	
	function crs($min, $max){
		$range = $max - $min;
		if ($range < 1) return $min;
		$log = ceil(log($range, 2));
		$bytes = (int) ($log / 8) + 1;
		$bits = (int) $log + 1;
		$filter = (int) (1 << $bits) - 1;
		do {
			$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
			$rnd = $rnd & $filter;
		} while ($rnd >= $range);
	return $min + $rnd;}
	
	function tabJson($j){
		$r="<table class=\"responsive-table stripped\"><th>Name</th><th>Ext.</th><th>Options</th><th>Date</th>";
		foreach($j["files"] as $f){
			$r.= "<tr><td>{$f["name"]}</td><td><span class=\"collection badge yellow\" style=\"right:initial;position:relative;\">{$f["ext"]}</span></td><td><b><a href='uploads/{$f["comp"]}'>Download</a></b></td><td>".date("d/m/y h:i:s",$f["date"])."</td></tr>";
		}
		$r.="</table>";
	return $r;}
	
	function moku($d2,$comp,$name){echo ic("","User file created : <b><a target='blank' href='$d2$comp'>{$name}</a></b>.","gr");}
	
	function ic($t,$s,$c="re"){
	if($c=="re"){
		$c="red";
	}elseif($c=="gr"){
		$c="green";
	}
	return "<div class=\"collection\"><div class=\"collection-item\"><span class=\"new badge {$c}\">{$t}</span>{$s}</div></div>";}
	
	function getIp(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
	return $ip;}
	
	function createFileU($usru,$cont){
		$c="users/".$usru;
		del($c);
	return file_put_contents($c,$cont);
	}
	
	function css($l){
		return '<link rel="preload" href="'.$l.'" onload="this.rel=\'stylesheet\'"><noscript><link rel="stylesheet" href="'.$l.'"></noscript>';
	}
	
	function del($s){@unlink($s);}
?>