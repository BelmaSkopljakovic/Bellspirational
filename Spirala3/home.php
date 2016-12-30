<?php
	function Nacin($tekst){
		$tekst = str_replace("š", "%9a", $tekst);
		$tekst = str_replace("č", "c", $tekst);
		$tekst = str_replace("ć", "c", $tekst);
		$tekst = str_replace("ž", "%9e", $tekst);
		$tekst = str_replace("đ", "dj", $tekst);
		$tekst = str_replace("Š", "%8a", $tekst);
		$tekst = str_replace("Č", "C", $tekst);
		$tekst = str_replace("Ć", "C", $tekst);
		$tekst = str_replace("Ž", "%8e", $tekst);
		$tekst = str_replace("Đ", "%d0", $tekst);
		return $tekst;
	}
	if(isset($_POST['pdfDownload'])){
		require("fpdf/fpdf.php");
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont("Arial", "B", 14);
		$tekst = "Knjige i registrovani korisnici";
		$tekst = Nacin($tekst);
		$tekst = urldecode($tekst);
		$pdf->Cell(50, 10, $tekst, 0, 1);
		$pdf->Cell(100, 10, "", 0, 1);
		$fajlovi = glob('knjige-najbolje/*.xml');
		if(count($fajlovi) > 0){
			$pdf->SetFont("Arial", "B", 12);
			$pdf->Cell(50, 10, "Najbolje knjige su: ", 0, 1);
		}
		$pdf->SetFont("Arial", "", 12);
		foreach($fajlovi as $fajl) {
			$xml = new SimpleXMLElement($fajl, 0, true);
			$pdf->Cell(30, 10, "ID", 1, 0);
			$pdf->Cell(150, 10, $xml->ID, 1, 1);
			$tekst = $xml->izvodjac;
			$tekst = Nacin($tekst);
			$tekst = urldecode($tekst);
			$pdf->Cell(30, 10, "Autor", 1, 0);
			$pdf->Cell(150, 10, $tekst, 1, 1);
			$tekst = $xml->pjesma;
			$tekst = Nacin($tekst);
			$tekst = urldecode($tekst);
			$pdf->Cell(30, 10, "Knjiga", 1, 0);
			$pdf->Cell(150, 10, $tekst, 1, 1);
			$pdf->Cell(50, 10, "", 0, 1);
		}
		$pdf->Cell(100, 10, "", 0, 1);
		$fajlovi = glob('knjige/*.xml');
		if(count($fajlovi) > 0){
			$pdf->SetFont("Arial", "B", 12);
			$tekst = "Predložene knjige su: ";
			$tekst = Nacin($tekst);
			$tekst = urldecode($tekst);
			$pdf->Cell(50, 10, $tekst, 0, 1);
		}
		$pdf->SetFont("Arial", "", 12);
		foreach($fajlovi as $fajl) {
			$xml = new SimpleXMLElement($fajl, 0, true);
			$tekst = $xml->izvodjac;
			$tekst = Nacin($tekst);
			$tekst = urldecode($tekst);
			$pdf->Cell(30, 10, "Autor", 1, 0);
			$pdf->Cell(150, 10, $tekst, 1, 1);
			$tekst = $xml->pjesma;
			$tekst = Nacin($tekst);
			$tekst = urldecode($tekst);
			$pdf->Cell(30, 10, "Knjiga", 1, 0);
			$pdf->Cell(150, 10, $tekst, 1, 1);
			
			$pdf->Cell(50, 10, "", 0, 1);
		}
		$pdf->Cell(100, 10, "", 0, 1);
		$fajlovi = glob('korisnici/*.xml');
		if(count($fajlovi) > 0){
			$pdf->SetFont("Arial", "B", 12);
			$pdf->Cell(50, 10, "Registrovani korisnici su: ", 0, 1);
		}
		$pdf->SetFont("Arial", "", 12);
		foreach($fajlovi as $fajl) {
			$xml = new SimpleXMLElement($fajl, 0, true);
			$tekst = $xml->username;
			$tekst = Nacin($tekst);
			$tekst = urldecode($tekst);
			$pdf->Multicell(0, 2, "- " . $tekst . "\n\n\n");
		}
		$pdf->output('D','Izvjestaj.pdf');
	}
	session_start();
	if(!file_exists('korisnici/' . $_SESSION['username'] . '.xml')){
		header('Location: index.php');
		die;
	}
	
	$greske_izmjena = array();
	$greske_dodavanje = array();
	$greske_slanje = array();
	$bezGreske = true;
	if(isset($_POST['slanje'])){
		$izvodjac = htmlEntities($_POST['izvodjac'], ENT_QUOTES);
		$izvodjac = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $izvodjac);
		$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $izvodjac);
		if(strlen($provjera) < 2) {
			$greske_slanje[] = "Naziv autora mora sadržati barem dva karaktera.";
			$bezGreske = false;
		}
		$pjesma = htmlEntities($_POST['pjesma'], ENT_QUOTES);
		$pjesma = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $pjesma);
		$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $pjesma);
		if(strlen($provjera) < 2) {
			$greske_slanje[] = "Naziv knjige mora sadržati barem dva karaktera.";
			$bezGreske = false;
		}
		
		if($bezGreske){
			$xml = new SimpleXMLElement('<?xml version = "1.0" encoding = "utf-8"?><pjesma></pjesma>');
			$xml->addChild('izvodjac', $izvodjac);
			$xml->addChild('pjesma', $pjesma);
			
			$xml->asXML('knjige/' . 'knjiga_' . date("Y-m-d-H-i-s"). '.xml');
			header('Location: home.php');
			die;
		}
		unset($_POST['slanje']);
	}
	
	if(isset($_POST['csvDownload'])){
		ob_end_clean();
		header('Content-Type: text/csv; charset = utf-8');
		header('Content-Disposition: attachment; filename = Knjige.csv');
		$fp = fopen('php://output', 'w');
		$fajlovi = glob('knjige/*.xml');
		foreach($fajlovi as $fajl) {
			$xml = new SimpleXMLElement($fajl, 0, true);
			$red = array($xml->izvodjac, $xml->pjesma);
			fputcsv($fp, $red, ',');
		}
		exit();
	}
	
	$ispis = "";
	if(isset($_POST['pretraga'])){
		$tekst = htmlEntities($_POST['pretrazivanje'], ENT_QUOTES);
		$tekst = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $tekst);
		if(strlen($tekst) > 0) {
			$fajlovi = glob('knjige-najbolje/*.xml');
			$rezultati_pretrage = array();
			foreach($fajlovi as $fajl) {
				$xml = new SimpleXMLElement($fajl, 0, true);
				if(stristr($xml->izvodjac, $tekst)){
					$rezultati_pretrage[] = $xml->izvodjac;
				}
				if (stristr($xml->pjesma, $tekst)){
					$rezultati_pretrage[] = $xml->pjesma;
				}
			}
			$broj_rezultata = count($rezultati_pretrage);
			if($broj_rezultata == 0){
				$ispis = "Nije pronađen niti jedan rezultat";
			}
			else {
				$ispis .= '<div>Rezultati pretrage:</div>';
				foreach($rezultati_pretrage as $rez){
					$ispis .= '<div>- ' . htmlspecialchars($rez, ENT_QUOTES, 'UTF-8') . '</div>';
				}
			}
		}
		else {
			$ispis = "Niste unijeli ispravan tekst za pretragu. Pokušajte ponovo.";
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
				<li><a class="active" href="home.php">Home</a> </li>
				<li><a class="podstranica" href="quotes.php">Quotes</a> </li>
				<li><a class="podstranica" href="stories.php">Stories</a> </li>
				<li><a class="podstranica" href="favorites.php">Favorites</a></li>	        
				<li><a class="podstranica" href="contactUs.php">Contact Us</a></li>
<br><br>

			</ul>
		</div>

<div class="red">

<div class="kolona cetri"><b>
<i> B  E  L  L  S  P  I  R  A  T  I  O  N  </i><br>
			Niko od nas neće odavde izaći živ!<br>
Zato vas molim prestanite prema sebi se ponašati onako kako vam drugi nameću.
Jedite tu ukusnu hranu, šetajte po suncu, skočite u more.
Recite istinu koju nosite u svom srcu poput blaga.
Budite blesavi.
Budite ljubazni.
Budite čudni.
Nema vremena nizašta drugo!</b>
		</div></div>

<div class="red"></div>
<div class="red"></div>
<div class="red"></div>
<div class="red">
				<div class="kolona dva" style="background-color:#BFBFFE">

				Svakoga se dana iznova uvjeravamo kako je malo toga nemoguće postići, ako su ljudski duh i tijelo spremni prihvatiti određenu žrtvu.<br> Bilo da savladava neki vlastiti hendikep, pokušava pomaknuti granice ili jednostavno živjeti u malo boljem svijetu, čovjek će naći način da to i učini.<br>
Šta god da mislite privućićete u svoj život. Ne ono što želite, već ono u šta ste se emotivno uključili!
<br>Sreća ne zavisi od toga šta imate ni od onoga ko ste, ona se isključivo oslanja na ono šta mislite! <br>Ipak, ponekad ju je potrebno malo pogurati, dati joj zdravog poticaja i otvoriti joj oči, a ako ne želite na svojoj koži osjetiti taj, ponekad vrlo neugodni ‘poziv na buđenje’, najbolje je pročitati, poslušati ili pogledati neki motivirajući, <br><b>inspirativni govor<b>.
				</div>
				<div class="kolona dva">
				
				<img src="albert.jpg" alt="inspiracija" width="640" height="250">
				</div>
			</div>





<div class="red">
<div class="kolona cetri"><b>
<i> M O T I V A T O R I </i><br>
			</b>
		</div></div>


<div class="red">
	<div class="kolona jedan" style="background-color:inherit">
				<a target="_blank" href="m1.jpg">
					<img src="m1.jpg" alt="m1" width="281" height="200">
				</a>
			</div>
	<div class="kolona jedan" style="background-color:inherit">
				<a target="_blank" href="m2.jpg">
					<img src="m2.jpg" alt="m2" width="281" height="200">
				</a>
			</div>
	<div class="kolona jedan" style="background-color:inherit">
				<a target="_blank" href="m3.jpg">
					<img src="m3.jpg" alt="m3" width="281" height="200">
				</a>
			</div>
	<div class="kolona jedan" style="background-color:inherit">
				<a target="_blank" href="m4.jpg">
					<img src="m4.jpg" alt="m4" width="281" height="200">
				</a>
			</div></div>
			

<div class = "top-pjesme">
				<form method = "post" name = "forma-najbolje-pjesme" action = "">
					<table class = "playlista" id = "pjesme_najbolje">
						<caption>Najbolje motivacione knjige</caption>
						<tr>
							<th>ID</th>
							<th>AUTOR</th>
							<th>KNJIGA</th>
						</tr>
						<?php
							$fajlovi = glob('knjige-najbolje/*.xml');
							foreach($fajlovi as $fajl) {
								$xml = new SimpleXMLElement($fajl, 0, true);
								echo '<tr>';
								echo '<td>'. htmlspecialchars($xml->ID, ENT_QUOTES, 'UTF-8') . '</td>';
								echo '<td>'. htmlspecialchars($xml->izvodjac, ENT_QUOTES, 'UTF-8') . '</td>';
								echo '<td>'. htmlspecialchars($xml->pjesma, ENT_QUOTES, 'UTF-8') . '</td>';
								if(stristr($_SESSION['username'], "belma")){
									echo '<td><form action = "" method = "POST"><input type = "hidden" name = "xkaodelete" value = "' . $xml->ID. '"/><input type = "submit" name = "izbrisi" value = "X" style = "width: 20px;"/></form></td>';
								}
								echo '</tr>';
							}
							if(stristr($_SESSION['username'], "belma")){
								echo '<tr>';
								echo '<td><input type = "text" style = "background-color: black; color: white;" name = "IDdodaj" class = "unos" placeholder = "jedinstveni ID knjige"></td>';
								echo '<td><input type = "text" style = "background-color: black; color: white;" name = "izvodjacdodaj" class = "unos" placeholder = "autor"></td>';
								echo '<td><input type = "text" style = "background-color: black; color: white;" name = "pjesmadodaj" class = "unos" placeholder = "nova knjiga"></td>';
								echo '<td><input type = "submit" name = "dodaj" class = "unos" value = "+" style = "width: 20px;"';
								echo '</tr>';
								
								echo '<tr>';
								echo '<td><input type = "text" style = "background-color: black; color: white;" name = "izmjena_ID" class = "unos" placeholder = "ID knjige koju editujete"></td>';
								echo '<td><input type = "text" style = "background-color: black; color: white;" name = "novi_izvodjac" class = "unos" placeholder = "editovan autor"></td>';
								echo '<td><input type = "text" style = "background-color: black; color: white;" name = "nova_pjesma" class = "unos" placeholder = "editovan naziv knjige"></td>';
								echo '<td><input type = "submit" name = "napravi_izmjene" class = "unos" value = "E" style = "width: 20px;"';
								echo '</tr>';
							}
							
							if(isset($_POST['napravi_izmjene'])){
								$fajlovi = glob('knjige-najbolje/*.xml');
								$bul = true;
								$bezGreske1 = true;
								foreach($fajlovi as $fajl) {
									$xml = new SimpleXMLElement($fajl, 0, true);
									if($xml->ID == $_POST['izmjena_ID']){
										$ID_d = $_POST['izmjena_ID'];
										$izvodjac_d = htmlEntities($_POST['novi_izvodjac'], ENT_QUOTES);
										$izvodjac_d = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $izvodjac_d);
										$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $izvodjac_d);
										if(strlen($provjera) < 2) {
											$greske_izmjena[] = "Naziv autora mora sadržati barem dva karaktera.";
											$bezGreske1 = false;
										}
										$pjesma_d = htmlEntities($_POST['nova_pjesma'], ENT_QUOTES);
										$pjesma_d = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $pjesma_d);
										$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $pjesma_d);
										if(strlen($provjera) < 2) {
											$greske_izmjena[] = "Naziv knjige mora sadržati barem dva karaktera.";
											$bezGreske1 = false;
										}
										$bul = false;
										if($bezGreske1){
											$fajl1 = "knjige-najbolje/" . $ID_d . ".xml";
											unlink($fajl1);
											$xml = new SimpleXMLElement('<?xml version = "1.0" encoding = "utf-8"?><pjesma></pjesma>');
											$xml->addChild('ID', $ID_d);
											$xml->addChild('izvodjac', $izvodjac_d);
											$xml->addChild('pjesma', $pjesma_d);
											$xml->asXML('knjige-najbolje/' . $ID_d . '.xml');
											echo "<meta http-equiv = 'refresh' content = '0'>";
										}
									}
								}
								if($bul){
									$greske_izmjena[] = "Ne postoji knjiga sa navedenim ID-om.";
								}
							}
							
							if(isset($_POST['dodaj'])){
								$fajlovi = glob('knjige-najbolje/*.xml');
								$bul = true;
								foreach($fajlovi as $fajl) {
									$xml1 = new SimpleXMLElement($fajl, 0, true);
									if($xml1->ID == $_POST['IDdodaj']){
										$bul = false;
									}
								}
								$bezGreske2 = true;
								if($bul){
									$ID_d = htmlEntities($_POST['IDdodaj'], ENT_QUOTES);
									$ID_d = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $ID_d);
									$provjera = preg_replace("#[^a-zA-ZščćžđŠČĆŽĐ]#i", "", $ID_d);
									if(strlen($provjera) > 0) {
										$greske_dodavanje[] = "ID mora sadržati samo brojeve.";
										$bezGreske2 = false;
									}
									$izvodjac_d = htmlEntities($_POST['izvodjacdodaj'], ENT_QUOTES);
									$izvodjac_d = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $izvodjac_d);
									$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $izvodjac_d);
									if(strlen($provjera) < 2) {
										$greske_dodavanje[] = "Naziv autora mora sadržati barem dva karaktera.";
										$bezGreske2 = false;
									}
									$pjesma_d = htmlEntities($_POST['pjesmadodaj'], ENT_QUOTES);
									$pjesma_d = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $pjesma_d);
									$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $pjesma_d);
									if(strlen($provjera) < 2) {
										$greske_dodavanje[] = "Naziv knjige mora sadržati barem dva karaktera.";
										$bezGreske2 = false;
									}
									if($bezGreske2){
										$xml = new SimpleXMLElement('<?xml version = "1.0" encoding = "utf-8"?><pjesma></pjesma>');
										$xml->addChild('ID', $ID_d);
										$xml->addChild('izvodjac', $izvodjac_d);
										$xml->addChild('pjesma', $pjesma_d);
										$xml->asXML('knjige-najbolje/' . $ID_d . '.xml');
										echo "<meta http-equiv = 'refresh' content = '0'>";
									}
								}
								else {
									$greske_dodavanje[] = "Već postoji knjiga sa unešenim ID-om. ID mora biti jedinstven.";
								}
							}
					
							if(isset($_POST['izbrisi'])){
								$ID_i = $_POST['xkaodelete'];
								$fajl = "knjige-najbolje/" . $ID_i . ".xml";
								unlink($fajl);
								echo "<meta http-equiv = 'refresh' content = '0'>";
							}
						?>
					</table>
					<?php
						if(count($greske_izmjena) > 0){
							echo 'Greške pri pokušaju izmjene podataka:';
							foreach($greske_izmjena as $g){
								echo '<li style = "color:red; list-style: none;">- ' . $g . '</li>';
							}
							
						}
						if(count($greske_dodavanje) > 0){
							echo 'Greške pri pokušaju dodavanja knjige:';
							foreach($greske_dodavanje as $g){
								echo '<li style = "color:red; list-style: none;">- ' . $g . '</li>';
							}
							
						}
					?>
			</div>
			
<form method = "post" class = "forma-pocetna" name = "forma-preuzimanje_pdf" action = "">
					<p class = "citati"><input name = "pdfDownload" type = "submit" value = "Download Izvještaj.pdf"></p>
				</form>
				
				<div>
					<form method = "post" class = "forma-pocetna" name = "forma-pretrazivanje" action = "">
						<table class = "pretraga_xml">
							<caption>Pretraga knjiga i autora</caption>
							<tr class = "red_pretraga">
								<td><input type = "text" style = "background-color: black; color: white;" name = "pretrazivanje" class = "unos" placeholder = "unesite tekst za pretragu" onkeyup = "prikaziDoDeset(this.value)"></td>
								<td><input name = "pretraga" type = "submit" value = "pretraži"></td>
							</tr>
							<tr class = "red_pretraga">
								<td><div class = "pjesma" id = "instant_pretraga"></div></td>
								<td></td>
							</tr>
						</table>
					</form>
					<script src = "js/instantPretrazivanje.js"></script>
				</div>
				<div class = "pjesma" id = "prikaz_div"></div>
			<script type = "text/javascript">
				function ispisiRezultate(tekst){
					document.getElementById("prikaz_div").innerHTML = tekst;
				}
			</script>
			<?php
				echo "<script> ispisiRezultate('$ispis'); </script>";
			?>
			<div class = "pjesma">
				<form method = "post" class = "forma-pocetna" name = "forma-pocetna" action = "" >
					<table class = "najbolja-pjesma">
						<caption>Predložite knjigu</caption>
						<tr>
							<td>Autor: </td>
							<td><input type = "text" name = "izvodjac" class = "unos"></td>
						</tr>
						<tr>
							<td>Knjiga: </td>
							<td><input type = "text" name = "pjesma" class = "unos"></td>
						</tr>
						
						<tr>
							<td></td>
							<td class = "desno"><input name = "slanje" type = "submit" value = "Pošalji"></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<?php
									if(count($greske_slanje) > 0){
										
										foreach($greske_slanje as $g){
											echo '<li style = "color:red; list-style: none;">- ' . $g . '</li>';
										}
										
									}
								?>
							</td>
						</tr>
					</table>
					<script src = "script.js"></script>
				</form>
				<form method = "post" class = "forma-pocetna" name = "forma-preuzimanje" action = "">
					<?php
						if(stristr($_SESSION['username'], "belma")){
							echo '<p class = "citati"><input name = "csvDownload" type = "submit" value = "Download predloženih knjiga.csv"></p>';
						}
					?>
				</form>
				
				
			</div>
			

<div class="clearfix"></div>
		
		<div class="footer">
			Copyright © Belma Skopljakovic | All rights reserved

		</div>
	
	</body>  
</html>