<?php
	echo '<span style="color:#AFA;"></span>';
	$greske = array();
	if(isset($_POST['register'])){
		$username = htmlEntities($_POST['username'], ENT_QUOTES);
		$username = preg_replace('/[^A-Za-z0-9 ščćžđŠČĆŽĐ]/', '', $username);
		$email = htmlEntities($_POST['email'], ENT_QUOTES);
		$password = htmlEntities($_POST['password'], ENT_QUOTES);
		$c_password = htmlEntities($_POST['c_password'], ENT_QUOTES);
		if(file_exists('korisnici/' . $username . '.xml')){ $greske[] = 'Username već postoji'; }
		if($username == ''){ $greske[] = 'Niste unijeli username'; }
		if($email == ''){ $greske[] = 'Niste unijeli email'; }
		if($password == '' || $c_password == ''){ $greske[] = 'Niste unijeli password'; }
		if($password != $c_password){ $greske[] = 'Passwordi se ne poklapaju'; }
		if(strlen($password) < 5){ $greske[] = 'Password mora sadržati najmanje 5 karaktera'; }
		if(strlen($username) < 3){ $greske[] = 'Username mora sadržati najmanje 3 karaktera'; }
		if (!preg_match("/^[a-zA-Z0-9 ščćžđŠČĆŽĐ]*$/", $password)) { $greske[] = 'Password može sadržati samo slova i brojeve'; }
		if (!preg_match("/^[a-zA-Z0-9 ščćžđŠČĆŽĐ]*$/", $username)) { $greske[] = 'Username može sadržati samo slova i brojeve'; }
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $greske[] = "Neispravan format e-maila"; }
		if(count($greske) == 0){
			$xml = new SimpleXMLElement('<?xml version = "1.0" encoding = "utf-8"?><user></user>');
			$xml->addChild('username', $username);
			$xml->addChild('password', md5($password));
			$xml->addChild('email', $email);
			$xml->asXML('korisnici/' . $username . '.xml');
			header('Location: index.php');
			die;
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link rel="shortcut icon" href="masna.png"  />

		<title>Bellspiration</title>
	  
	</head>
<body>
	<div class = "okvir">
		<div class = "banner">
			<img src = "albert.jpg" alt = "Albert"/>
		</div>
		<div class = "login-page">
		  <div class = "form">
			<div id = "registracija-div">
				<form method = "post" class = "register-form" action = "">
					<input type = "text" name = "username" placeholder = "username"/>
					<input type = "password" name = "password" placeholder = "password"/>
					<input type = "password" name = "c_password" placeholder = "potvrdite password"/>
					<input type = "text" name = "email" placeholder = "email"/>
					<?php
						if(count($greske) > 0){
							echo 'Greške pri pokušaju registracije:';
							foreach($greske as $g){
								echo '<li style = "color:red; list-style: none;">- ' . $g . '</li>';
							}
							
						}
					?>
					<input type = "submit" name = "register" value = "Kreiraj"/>
					<p class = "message">Već ste registrovani? <a href = "index.php">Ulogujte se</a></p>
				</form>
			</div>
		  </div>
		</div>
		<div class="footer">
			Copyright © Belma Skopljakovic | All rights reserved

		</div>
	</div>
</body>
</html>