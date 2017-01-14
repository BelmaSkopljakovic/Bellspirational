<?php
	$greska = false;
	if(isset($_POST['login'])){   
		$username = htmlEntities($_POST['username'], ENT_QUOTES);
		$username = preg_replace('/[^A-Za-z0-9 ščćžđŠČĆŽĐ]/', '', $username);
		$password = md5($_POST['password']);
		if(file_exists('korisnici/' . $username . '.xml')){
			$xml = new SimpleXMLElement('korisnici/' . $username . '.xml', 0, true);
			if($password == $xml->password){
				session_start();
				$_SESSION['username'] = $username;
				header('Location: home.php');
				die;
			}
		}
		$greska = true;
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
		  <div class = "form" style="background-color: #FFB6C1">
			<div id = "login-div">
				<form method = "post" class = "login-form" action = "">
					<input type = "text" name = "username" placeholder = "username"/>
					<input type = "password" name = "password" placeholder = "password"/>
					<?php
						if($greska){
							echo '<span style = "color:blue;">Pogrešan username ili password</span>';
							$greska = false;
						}
					?>
					<input type = "submit" name = "login" value = "Login"/>
					<p class = "message">Niste registrovani? <a href = "registracija.php">Kreirajte novi račun</a></p>
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