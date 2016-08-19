<?php
	include("head.php");
	?>
	<center>
		<form class="bs" id="fo" method="POST" action="" enctype="multipart/form-data">
			<div id="infos" class="collection">
				Loading the page...
			</div>
			<?php
				if(isset($_POST["sb_u"])){
				$tos=$_SESSION["token"];
				$top=$_POST["tok"];
				if(isset($tos)&&isset($top)&&$tos==$top){
				unset($_SESSION["token"]);
					$f = $_FILES['files'];
					if(!empty($f)&&$f["size"][0]!=0){
						for($i=0;$i<count($f["name"]);$i++){
							$name=$f["name"][$i];
							if($f["error"][$i]==0){
								$size=$f["size"][$i];
								if($size<10000000){
									$ex=explode(".",$name);
									$ext=$ex[count($ex)-1];
									$tmp=$f["tmp_name"][$i];
									$cf=false;
									$md5=substr(base64_encode(md5(uniqid().time().$name)),0,10);
									$comp=$md5.".".$ext;
									$ova=array("name"=>$name,"md5"=>$md5,"comp"=>$comp,"ext"=>$ext,"size"=>$size,"date"=>time());
									if(move_uploaded_file($tmp,$d2.$comp)){
										$ip=getIp();
										$usru=$_POST["usr_u"];
										$usrp=$_POST["pw_u"];
										if(isset($usru)&&!empty($usru)&&isset($usrp)&&!empty($usrp)){
											$nf=$d1.sha1(md5($usru));
											$usrp=sha1($_POST["pw_u"]."spd");
											if(file_exists($nf)){
												$json=json_decode(file_get_contents($nf),true);
												if($json["pwd"]==$usrp){
													array_push($json["files"],$ova);
													del($nf);
													$a=file_put_contents($nf,json_encode($json));
													if($a){
														$cf=true;
													}
													}else{
													msg_err("Switching to default","Wrong password.");
												}
												}else{
												$a=file_put_contents($nf,json_encode(array("pwd"=>$usrp,"files"=>array(0=>$ova))));
												if($a){
													$cf=true;
												}
											}
										}
										
										if($cf!==true){
											$usru=sha1(md5($ip));
											$nf=$d1.$usru;
											if(file_exists($nf)){
												$c=json_decode(file_get_contents($nf),true);
												array_push($c["files"],$ova);
												}else{
												$c=array("files"=>array(0=>$ova));
											}
											$cfu=createFileU($usru,json_encode($c));
											if ($cfu) {
												moku($d2,$comp,$name);
												}else{
												echo msg_err("Switching to default","Impossible to create the file for the user");
												del($d2.$md5);
											}
											}else{
											moku($d2,$comp,$name);
										}
									}
									}else{
									echo msg_err("File too large.","The file : {$name} weights more than 10 Mo.");
								}
								}else{
								echo msg_err("Error while uploading.","The file : {$name} was not able to be downloaded.");
							}
						}
						}else{
						echo msg_err("No file.","Please place a file before validating.");
					}
				}else{
				echo msg_err("Error.","You've already sent this file.");
				}
				}
				$tok=md5(time().uniqid());
				$_SESSION["token"]=$tok;
			?>
			<div class="file-field input-field">
				<div class="btn blue">
					<span>Files</span>
					<input type="file" id="fi" name="files[]" multiple>
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" placeholder="Upload one or more files (10 Mo. max.)">
				</div>
			</div>
			<h5>Upload in account (facultative)</h5>
			<p>Save your files in an account allow you to recover your files from anywhere. Leave empty if you don't want to.</p>
			<div class="input-field col l6 m12 s12">
				<input placeholder="" name="usr_u" type="text" class="validate">
				<label for="usr_u">Username</label>
			</div>
			<div class="input-field col l6 m12 s12">
				<input name="pw_u" type="password" class="validate">
				<label for="pw_u">Password</label>
			</div>
			<input type="hidden" name="tok" value="<?=$tok;?>"/>
			<button class="btn blue" id="sbu" type="submit" onclick="dis()" name="sb_u">Validate</button>
		</form>
	</center>
	<div class="bs">
		<h4>Recover your files</h4>
		<center>
			<a href="back.php?auto" class="btn">Auto search my files</a>
			<br/>
			<h6>- OR -</h6>
			<form method="POST" action="back.php">
				<div class="input-field col l6 m12 s12">
					<input placeholder="" name="usr_s" type="text" class="validate">
					<label for="usr_s">Username</label>
				</div>
				<div class="input-field col l6 m12 s12">
					<input name="pw_s" type="password" class="validate">
					<label for="pw_s">Password</label>
				</div>
				<button class="btn" type="submit" name="sb_s">Search by account</button>
			</form>
		</center>
	</div>
	<?php include("foo.php");?>	