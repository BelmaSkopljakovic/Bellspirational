<?php
	session_start();
	if(!file_exists('korisnici/' . $_SESSION['username'] . '.xml')){
		header('Location: index.php');
		die;
	}
	$greske_slanje = array();
	$bezGreske = true;
	if(isset($_POST['slanje'])){
		$izvodjac = htmlEntities($_POST['ime'], ENT_QUOTES);
		$izvodjac = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $izvodjac);
		$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $izvodjac);
		if(strlen($provjera) < 2) {
			$greske_slanje[] = "Ime mora sadržati barem dva karaktera.";
			$bezGreske = false;
		}
		$pjesma = htmlEntities($_POST['komentar'], ENT_QUOTES);
		$pjesma = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $pjesma);
		$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $pjesma);
		if(strlen($provjera) < 2) {
			$greske_slanje[] = "Komentar mora sadržati barem dva karaktera.";
			$bezGreske = false;
		}
		
		if($bezGreske){
			$xml = new SimpleXMLElement('<?xml version = "1.0" encoding = "utf-8"?><pjesma></pjesma>');
			$xml->addChild('ime', $izvodjac);
			$xml->addChild('komentar', $pjesma);
			
			$xml->asXML('quotes/' . 'citat_' . date("Y-m-d-H-i-s"). '.xml');
			header('Location: quotes.php');
			die;
		}
		unset($_POST['slanje']);
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
<script src="localStorageQ.js"></script>
<p id = "poruka-log">
			Ulogovani ste kao: <?php echo $_SESSION['username']; ?>.
			<a id = "odjava" href = "odjava.php">Odjavite se</a></p>
		</p>
		<div class="red">

			<ul class="header">
			
  				<li><a class="podstranica" href="home.php">Home</a></li>
				<li><a class="active" href="quotes.php">Quotes</a> </li>
				<li><a class="podstranica" href="stories.php">Stories</a> </li>
				<li><a class="podstranica" href="favorites.php">Favorites</a></li>	     
				<li><a class="podstranica" href="contactUs.php">Contact Us</a></li>
			</ul>
		</div>

<div class="red">




<div class="kolona cetri"><b>
			"Svi postojimo za ljubav. Ona je pravilo egzistencije i njezina jedina svrha."</b>
		</div>

</div>



<h1>Love</h1>
<div class="red">
	<div class="kolona jedan" style="background-color:inherit">
				<a target="_blank" href="love1.jpg">
					<img src="love1.jpg" alt="love1" width="281" height="200">
				</a>
			</div>
	<div class="kolona jedan" style="background-color:inherit">
				<a target="_blank" href="love2.jpg">
					<img src="love2.jpg" alt="love2" width="281" height="200">
				</a>
			</div>
	<div class="kolona jedan" style="background-color:inherit">
				<a target="_blank" href="love3.jpg">
					<img src="love3.jpg" alt="love3" width="281" height="200">
				</a>
			</div>
	<div class="kolona jedan" style="background-color:inherit">
				<a target="_blank" href="love4.jpg">
					<img src="love4.jpg" alt="love4" width="281" height="200">
				</a>
			</div></div>





<h2><br>Life</h2>
<div class="red">
	<div class="kolona jedan" style="background-color:inherit">
				


					<img id="life1" src="life1.jpg" alt="life1" width="281" height="200" onclick="makeModalImage('life1');">
	</div>
	<div class="kolona jedan" style="background-color:inherit">
				
					<img id="life2" src="life2.jpg" alt="life2" width="282" height="200" onclick="makeModalImage('life2');">
	</div>
	<div class="kolona jedan" style="background-color:inherit">
				
					<img id="life3" src="life3.jpg" alt="life3" width="282" height="200" onclick="makeModalImage('life3');">

	</div>
	<div class="kolona jedan" style="background-color:inherit">
	
				<img id="life4" src="life4.jpg" alt="life4" width="282" height="200" onclick="prikaz('life4');">

	</div>
</div>

<div class="w3-content w3-display-container">
<div class="red">
<div class="kolona dva">
<button id="b" class="w3-btn-floating w3-display-left" onclick="plusDivs(-1)">Prethodna</button></div>
<div class="kolona dva">
  <button id="b2" class="w3-btn-floating w3-display-right" onclick="plusDivs(1)" position:right>Sljedeća</button>
  </div>
 </div>
<div class="red">
<div class="kolona jedan"></div>
<div class="kolona dva" id="k">
  <img id="slajd1" class="mySlides" src="life1.jpg" width="482" height="200">
  <img id="slajd2" class="mySlides" src="life2.jpg" width="482" height="200">
  <img id="slajd2" class="mySlides" src="life3.jpg" width="482" height="200">
  <img id="slajd2" class="mySlides" src="life4.jpg" width="482" height="200"></div>
<div class="kolona jedan"></div>
  </div>
 

  
</div>




<div class="red" id="formaquote">
<div class="kolona dva" id="bm" >
<div class="formapitanje">
	<form id="A" method = "post" action = "">
<h1>Možete podijeliti s drugima svoj omiljeni citat: </h1><br>
  Ime:<br>
  <input id="imeinput" type="text" name="ime" value="" placeholder="Obavezno polje">
  <br>
  Quote: <br>
  <input id="komentarinput" type="text" name="komentar" value="" placeholder="Vaš omiljeni citat">
  <br><br>

 
<input name = "slanje" type = "submit" value = "Pošalji">
<?php
									if(count($greske_slanje) > 0){
										
										foreach($greske_slanje as $g){
											echo '<li style = "color:red; list-style: none;">- ' . $g . '</li>';
										}
										
									}
								?>
  <br>
  <button type="button" onclick="objeq() ">Help</button>
  <p id="demoquote"></p>

</form>
</div>

	</div></div>

	


<div class="clearfix"></div>
		
		<div class="footer">
			Copyright © Belma Skopljakovic | All rights reserved
		</div>






	
	</body>  
</html>