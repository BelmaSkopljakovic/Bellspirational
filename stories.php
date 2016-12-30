﻿<?php
	session_start();
	if(!file_exists('korisnici/' . $_SESSION['username'] . '.xml')){
		header('Location: index.php');
		die;
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
				<li><a class="podstranica" href="quotes.php">Quotes</a> </li>
				<li><a class="active" href="stories.php">Stories</a> </li>
				<li><a class="podstranica" href="favorites.php">Favorites</a></li>	        
				<li><a class="podstranica" href="contactUs.php">Contact Us</a></li>
			</ul>
		</div>

<div class="red">

<div class="kolona cetri"><b>
			Koliko drugih ljudi morate pratiti prije nego se okrenete sebi?</b>
		</div></div>




<div class="red">
<div class="kolona dva" style="background-color:#FDA4BA">
<b><br>Eric Thomas - How Bad Do You Want It</b><br><br>
Internet je prepun raznih motivacijskih gurua i ‘učitelja’, koji će vas za finu paru naučiti “tajnama uspjeha”. <br>Svi oni imaju manje više istu mantru i princip rada, ali rijetko koji uspijeva dobiti toliko pažnje šire javnosti kao Eric Thomas, čiji su govori često korišteni u raznim motivacijskim kompilacijama i kao vrlo jednostavno oruđe za inspiraciju onima koji žele uspjeti, ali jednostavno nemaju dovoljno snage i volje da to do kraja isfuraju. <br>Govor koji je Thomas održao grupici američkih studenata netko je snimio, okačio na Youtube i pretvorio u jedan od najgledanijih video klipova te vrste na internetu.
<br><br><br><br><br><br>
</div>
	<div class="kolona jedan" style="background-color:inherit">
				<a target="_blank" href="love1.jpg">
					<iframe width="620" height="327"
src="https://www.youtube.com/embed/lsSC2vx7zFQ">

</iframe>
				</a>
			</div></div>



<div class="red"></div>
<div class="red"></div>
<div class="red">
<div class="kolona dva" style="background-color:#BFBFFE">
<b><br>Peter Finch – Mad as Hell</b><br><br>
Zašto i kako neki film postaje kultni teško je odgovoriti, ali jedan je od važnijih razloga sigurno i njegova sveobuhvatnost, to jest bitnost u godinama koje dolaze. Network je snimljen davne 1976., dakle, prije gotovo 40 godina, a i dan danas je toliko realan, moderan i primjenjiv, da se pitamo je li ga pisao neki putnik kroz vrijeme? Kada bivši voditelj vijesti Howard Beale (glumi ga Peter Finch) dobije otkaz, njegova mržnja prema medijima i sustavu u kojem živi postaje nepodnošljiva, te se svim snagama odlučuje boriti protiv onih kojima je donedavno tako vjerno služio. Cijela situacija kulminira obraćanjem javnosti, koje će zauvijek ostati zapamćeno u analima velikih govora svjetske kinematografije.<br><br><br><br><br><br>
</div>
	<div class="kolona jedan" style="background-color:inherit">
				<a target="_blank" href="love1.jpg">
					<iframe width="620" height="327"
src="https://www.youtube.com/embed/WINDtlPXmmE">

</iframe>
				</a>
			</div></div>



<div class="red"></div>
<div class="red"></div>
<div class="red">
<div class="kolona dva" style="background-color:#FDA4BA">
<b><br>Steve Jobs – govor na Sveučilištu Stanford</b><br><br>
Možemo mi o Steveu Jobsu i njegovom Appleu govoriti što god želimo, ali činjenice su činjenice: radi se o jednom od najznačajnijih ljudi našega doba, čija je tvrtka odigrala možda i ključnu ulogu u cijeloj ovoj informatičkoj revoluciji. Danas, dvije godine nakon njegove smrti, legenda o mršavom ćelavku u prepoznatljivoj kombinaciji dolčevita-traperice živi i dalje, a jedan od najvećih spomenika njemu kao osobi ostaje govor koji je 2005. godine održao za brucoše fakulteta Stanford, inače jednog od najelitnijih u SAD-u. Koliko je mladih ljudi te generacije uistinu poslušalo Jobsove riječi i slijedilo njegove savjete, teško je reći, ali zahvaljujući Youtubeu, ovaj će govor još dugo godina ostati kao poticaj nadolazećim generacijama željnima uspjeha… barem se nadamo!<br><br><br><br><br>
</div>
	<div class="kolona jedan" style="background-color:inherit">
				<a target="_blank" href="love1.jpg">
					<iframe width="620" height="327"
src="https://www.youtube.com/embed/UF8uR6Z6KLc">

</iframe>
				</a>
			</div></div>




<div class="red"></div>
<div class="red"></div>
<div class="red">
<div class="kolona dva" style="background-color:#BFBFFE">
<b><br>Sylvester Stallone – govor Rockya Balboe</b><br><br>
Kakva bi ovo lista bila bez barem jednog govora Rockya Balboe (veæ smo utvrdili da se radi o velikom motivatoru), najveæeg prvaka s filmskog platna i legende koja se u ring vraæala više puta nego što su Rolling Stonesi imali oproštajnih turneja? Rocky (tj., deda Sylvester Stallone) želi održati još jednu, posljednju borbu, ali sinèiæ mu, inaèe totalna curica, zamjera takvu egzibiciju, jer eto, stari ga sramoti pred prijateljima. Bu bu bi bu… Rocky mirno i pažljivo sluša njegove argumente, a onda ga u samo jednoj minuti spusti na zemlju, te mu u prolazu uspije dobaciti da ne zaboravi posjetiti majku, aludirajuæi na to koliko je loš sin. Buuuurn!<br><br><br><br><br><br><br>
</div>
	<div class="kolona jedan" style="background-color:inherit">
				<a target="_blank" href="love1.jpg">
					<iframe width="620" height="327"
src="https://www.youtube.com/embed/D_Vg4uyYwEk">

</iframe>
				</a>
			</div></div>





<div class="clearfix"></div>
		
		<div class="footer">
			Copyright © Belma Skopljakovic | All rights reserved
		</div>
	
	</body>  
</html>