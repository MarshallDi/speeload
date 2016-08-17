<?php
	
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