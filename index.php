<?php
	include("functions.php");
	include("head.html");
	?>
				<center>
				<form method="POST" action="">
					<div class="file-field input-field">
						<div class="btn">
							<span>File</span>
							<input type="file" multiple>
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload one or more files">
						</div>
					</div>
					<h5>Upload in account</h5>
					<p>Please let theses inputs empty if you don't want to save the file(s) in an account.</p>
					<form method="POST" action="">
					<div class="input-field col l6 m12 s12">
						<input placeholder="" name="usr_u" type="text" class="validate">
						<label for="usr_u">Username</label>
					</div>
					<div class="input-field col l6 m12 s12">
						<input name="pw_u" type="text" class="validate">
						<label for="pw_u">Password</label>
					</div>
					<button class="btn" type="submit" name="sb_u">Validate</button>
				</form>
				</form>
				</center>
				<hr/>
				<h3>Find back your files</h3>
				<center>
				<a class="btn">Auto search my files</a><br/>
				<form method="POST" action="">
					<div class="input-field col l6 m12 s12">
						<input placeholder="" name="usr_s" type="text" class="validate">
						<label for="usr_s">Username</label>
					</div>
					<div class="input-field col l6 m12 s12">
						<input name="pw_s" type="text" class="validate">
						<label for="pw_s">Password</label>
					</div>
					<button class="btn" type="submit" name="sb_s">Search</button>
				</form>
				</center>
<?php include("foo.html");?>