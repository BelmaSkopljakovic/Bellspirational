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
			
			$xml->asXML('komentari/' . 'komentar_' . date("Y-m-d-H-i-s"). '.xml');
			header('Location: favorites.php');
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
	<script src="localStorageF.js"></script>
	<p id = "poruka-log">
			Ulogovani ste kao: <?php echo $_SESSION['username']; ?>.
			<a id = "odjava" href = "odjava.php">Odjavite se</a></p>
		</p>
		<div class="red">

			<ul class="header">
				<li><a class="podstranica" href="home.php">Home</a> </li>
				<li><a class="podstranica" href="quotes.php">Quotes</a> </li>
				<li><a class="podstranica" href="stories.php">Stories</a> </li>
				<li><a class="active" href="favorites.php">Favorites</a></li>	        
				<li><a class="podstranica" href="contactUs.php">Contact Us</a></li>
			</ul>
		</div>

<div class="red">

<div class="kolona cetri"><b>
			Inspiracija se nalazi svugdje oko nas i to svakog dana. Da li je nalazimo zavisi isključivo da li smo u trenutku. </b>
		</div></div>




<div class="red" dva"><b>NOVEMBER FAVORITIES</b></div><br><br>
<div class="red">

<div class="kolona dva" style="background-color:inherit">

<a href="/index.php/dogadajitop/94-dogadaji/15186-samira-poricanin-petresin-preporucuje-dogadaji-koje-ne-smijete-propustiti-ovaj-mjesec-u-sarajevu" target="_self">
															

<iframe width="620" height="327"
src="http://www.modamo.info/index.php/dogadajitop/94-dogadaji/15186-samira-poricanin-petresin-preporucuje-top-5-dogadaja-koje-biste-trebali-posjetiti-u-11-mjesecu-u-sarajevu">

</iframe>
															</a>
					
				

</div>
	<div class="kolona dva" style="background-color:#BFBFFE"><br><br>
<b>Sarajevo i događaji</b><br><br>
Voljeli biste ovaj vikend provesti u dragom društvu slušajući neke od najpoznatijih jazz umjetnika?<br>
Željeli biste se nasmijati na stand-up komediji u ugodnom ambijentu i pogledati predstavu koja okuplja sjajnu glumačku ekipu i tematiku dostojnu svjetskih kazališta? <br>Za 11.mjesec, u Sarajevu su već najavljeni programi par zanimljivih predstava, festivala, kao i koncerata.<br>

Kako bismo vam olakšali potragu, zamolili smo Samiru Poričanin-Petrešin, direktoricu Antene Sarajevo i autoricu bloga Prekardašijan da nam otkrije par cool događaja koje nipošto ne trebate propustiti ovaj mjesec. Pripremite olovke i vaše planere.<br>
<br>Zbog izuzetnog značaja ove teme, ovaj intervju zaslužuje da uđe u Favorite novembra.
				
			</div></div>




<div class="red">
<h><b>OCTOBER FAVORITIES</b></h><br><br></div>
<div class="red">
<div class="kolona dva" style="background-color:inherit">

<a target="_blank" href="love1.jpg">
					<iframe width="620" height="327"
src="http://www.bgonline.rs/embed/kako-uskladiti-roditeljstvo-i-karijeru-bussiness-cafe-zagreb/">

</iframe>
				</a>

</div>
	<div class="kolona dva" style="background-color:#BFBFFE"><br><br>
<b>Roditeljstvo i karijera</b><br><br>
Profesorica Nada Bučević, u Bussiness Cafe-u, ovog mjeseca priča o balansu između roditeljstva i karijere, te na koji način biti uspješan na oba polja. <br>Nadina nadahnuća:
<br>
Ispričavam vam se u ime roditelja koji vam nisu znali pružiti nježnost, primjer i stabilnost...
Ispričavam vam se u ime profesora koji vas nisu znali podučiti.
Ispričavam vam se u ime prijatelja koji vas nisu znali razumjeti...
Ispričavam vam se u ime partnera koji vas nisu znali voljeti...
Ispričavam vam se u ime djece koja vas nisu znala cijeniti...
Ispričavam vam se u ime društva koje vas nije znalo ostvariti...
Ispričavam vam se u ime cijelog svijeta što u njemu ne možete potpuno uživati...
<br>
Zbog bitnosti ove teme, ovaj intervju zaslužuje da uđe u Favorite oktobra.
				
			</div></div>



<div class="red"></div>
<div class="red"></div>


<div class="red" id="formakomentar">
<div class="kolona dva" id="fm" >
<div class="formapitanje">
	<form id="A" method = "post" action = "">
<h1>Komentare možete ostaviti ispod: </h1><br>
  Ime:<br>
  <input id="imeinput1" type="text" name="ime" value="" placeholder="Obavezno polje">
  <br>
  Komentar: <br>
  <input id="komentarinput1" type="text" name="komentar" value="" placeholder="Komentar">
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
  <button type="button" onclick="objef()">Help</button>
  <p id="demofavorite"></p>
</form>
</div>

	</div></div>


<div class="clearfix"></div>
		
		<div class="footer">
			Copyright © Belma Skopljakovic | All rights reserved
		</div>
	
	</body>  
</html>