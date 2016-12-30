<?php
	session_start();
	if(!file_exists('korisnici/' . $_SESSION['username'] . '.xml')){
		header('Location: index.php');
		die;
	}
	$greskeFeedback = array();
	if(isset($_POST['email_slanje'])){
		$bezGreske3 = true;
		
		$email = htmlEntities($_POST['email'], ENT_QUOTES);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$greskeFeedback[] = "Neispravan format e-maila."; 
			$bezGreske3 = false;
		}
		$sadrzaj_emaila = htmlEntities($_POST['pitanje'], ENT_QUOTES);
		$sadrzaj_emaila = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ\.,?!-_()\n]#i", "", $sadrzaj_emaila);
		if(strlen($sadrzaj_emaila) < 11) {
			$greskeFeedback[] = "Sadržaj e-maila mora biti duži od 10 karaktera.";
			$bezGreske3 = false;
		}
		if($bezGreske3){
			$xml = new SimpleXMLElement('<?xml version = "1.0" encoding = "utf-8"?><feedback></feedback>');
			
			$xml->addChild('E-mail', $email);
			$xml->addChild('Sadržaj', $sadrzaj_emaila);
			$xml->asXML('feedback/' . $email . '.xml');
			echo "<meta http-equiv = 'refresh' content = '0'>";
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
	<script src="script.js"></script>
	<p id = "poruka-log">
			Ulogovani ste kao: <?php echo $_SESSION['username']; ?>.
			<a id = "odjava" href = "odjava.php">Odjavite se</a></p>
		</p>
		<div class="red">
			<ul class="header">
				<li><a class="podstranica" href="home.php">Home</a> </li>
				<li><a class="postranica" href="quotes.php">Quotes</a> </li>
				<li><a class="podstranica" href="stories.php">Stories</a> </li>
				<li><a class="podstranica" href="favorites.php">Favorites</a></li>	        
				<li><a class="active" href="contactUs.php">Contact Us</a></li>
			</ul>
		</div>

<div class="red">

<div class="kolona cetri"><b>
			Budite slobodni slati pitanja, sugestije i kritike putem forme ispod! </b>
		</div></div>


<div class="formapitanje">
<form class = "ocjena-str" name = "ocjena-str" action = "" onsubmit = "return obje()" method = "post">
	<form>
  <h2>E-mail:</h2> <br>
  <input id="emailinput" type="text" name="email" value="" placeholder="Unesite e-mail">
  <br>
  <h2>Pitanje:</h2> <br>
  <input id="pitanjeinput" type="text" name="pitanje" value="" placeholder="Pitanje koje postavljate">
  <br><br>
  <input type = "submit" value = "Pošalji" name = "email_slanje"> <br>
  
  <p id="democontact"></p>
</form></form>
<?php
					if(count($greskeFeedback) > 0){
						echo '<ul style = "color:black;">Greške pri pokušaju slanja pitanja!';
						
						
					}
				?>
				<button type="button" onclick="obje()">Provjeri greške</button>
	</div>



<div class="clearfix"></div>
		
		<div class="footer">
			Copyright © Belma Skopljakovic | All rights reserved
		</div>
	
	</body>  
</html>