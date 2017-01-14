# Bellspirational
Bellspirational stranica predstavlja stranicu sa sadržajem inspirativnog i motivacionog karaktera. Belma Skopljaković, 16650


SPIRALA 4

1)Uradjeno:

a) Napravljena MySQL bazu sa tri povezane tabele: Korisnici, Knjige i Najbolje knjige;
b) Napravljena PHP skripta koja će sve podatke iz XML prebaciti u bazu podataka,
ova skripta se poziva na klik dugmeta kojeg može vidjeti samo administrator (username: belma; password: belma);
c) Prepravljene su PHP skripte tako da se podaci čuvaju i kupe iz baze podataka umjesto iz XML-a;
e) Napravljena jedna metoda REST web servisa koja vraća podatke u obliku JSON-a;Naravno, za zadani id koji treba navesti.
f) Testiran web servis koristeći POSTMAN i priložen odgovarajući izvještaj (screenshot 3-4 različita slučaja upotreba);

2)Deployment na OpenShift (zasad samo link od prosle spirale) Link http://sptri-bellspiration.44fs.preview.openshiftapps.com/
Nije uradjen deployment za ovu spiralu, imam izvjesne probleme kao http://pokit.org/get/?cf2690ea02e6a3d38fedf72922f59afc.jpg ili nakon nekoliko pokusaja http://pokit.org/get/?5f2be6ce06fe3de2cf86414f06fcbda3.jpg koje nisam uspjela riješiti :(

3)Lista fajlova: Pored navedenih za spiralu 3, dodane su sljedeće izmjene:
   1. home.php - skripta u kojoj su napravljene sve potrebne izmjene u vezi zadataka pod b) i c);
   2. webServis.php - skripta za zadatak e);
   3. postman_screensh  - folder za zadatak f) /testiranje web servisa;
   4. bellspirationwt.sql - baza export sa phpMyAdmin;
   5. bellspirationwt.pdf - izvjestaj za bazu skinut sa phpMyAdmin;
----------------------------------------------------------------------

SPIRALA 3

1)Uradjeno:
a)Koristeći PHP, napravljena je serijalizacija svih podataka u XML fajlove (sa svih formi - svaka forma drugi fajl). Omogućen je unos, izmjena i prikazivanje podataka, kao i brisanje (Sve navedeno je primijenjeno na tabeli na prvoj podstranici Home). Svi podaci koji se unose u XML fajlove su validirani (validacija i u PHPu i u JS - ostavila sam po dva dugmeta za prethodne forme, gdje sam staro dugme Posalji preimenovala u Help ili Prikazi greske, a novim button-om se salje u xml. Oba prikazuju greske i napomene u zavisnosti od greske prilikom unosa)
	*Napomena: za stranicu Favorities treba sacekati par sekundi da se sve prikaze i ucita. 
Unos, izmjenu i brisanje podataka iz tabele moze raditi samo admin korisnik. 

Adminovi podaci su zapisani u xml fajlu (username: belma, password: belma). 
Postoje jos neki zapisani korisnici prilikom moje provjere, kao npr obicni korisnik sa Username: sunce i Password:sunce.


b)Omogućeno je adminu download podataka (lista naziva knjiga koje su slali korisnici) u obliku csv fajla. *Podaci su iz xml-a, a ne hardkodirani podaci.

c)Napravljena je opcija generisanja izvještaja u obliku pdf fajla. Ovaj izvještaj sadrži podatke iz tabele na Home podstranici. Korištena je fpdf biblioteka. *Podaci su iz xml-a, a ne hardkodirani podaci.
	
d)Napravljena je opcija pretrage podataka. Pretraga radi za dva polja, za ime autora i naziv knjige. Kada korisnik pritisne na dugme po kojem se pretrazuje, prikazuju se svi rezultati koji zadovoljavaju uslov.
*Podaci su iz xml-a, a ne hardkodirani podaci.

2)Uradjen je i Deployment na OpenShift. Link http://sptri-bellspiration.44fs.preview.openshiftapps.com/


3)Lista fajlova: Pored navedenih za spiralu 2, dodane su sljedeće izmjene:
	0.Home.html -> Home.php podstranica, gdje je postavljena tabela sa svim aktivnostima za admina, zatim download pdf, pretraga, download csv podataka sa forme pored.
	1.Quotes.html -> Quotes.php podstranica, blage izmjene forme na dnu zbog php validacije.
	2.Favorities.html -> Favorities.php podstranica, blage izmjene forme na dnu radi php valdiacije;
	3.Stories.html -> Stories.php podstranica, nema izmjena
	4.ContactUs.html - ContactUs.php podstranica, blage izmjene forme radi php validacije;
	5.Style.css - css citavog projekta je u njemu, napravljene  potrebne izmjene;
	6.instantPretrazivanje.js - js fajl sa metodom za pretragu
	7.csv.js - js fajl za svrhu csv fajla
	8.loginRegistration - js fajl za svrhu login korisnika, dakle za formu sa nulte login, tj. registration podstranice
	9.script.js - js fajl za ostatak projekta;
	10.Folderi: feedback (xml-podaci sa forme ContactUs), fpdf biblioteka, knjige (podaci sa forme sa pocetne Home.php), knjige najbolje (podaci iz tabele sa Home.php), komentari (podaci sa forme na Favorities.php), quotes(podaci sa forme na Quotes.php).
	11.registracija.php i index.php (nulte podstranice za registraciju, tj login korisnika)
	12.odjava.php - za prekid/odjavu
	13.slika loginSlika - za login stranicu
	14.ReadMe.md - dodan opis za spiralu 3;






---------------------------------------------------
SPIRALA 2

1)Uradjeno:
	a)Sva polja imaju JavaScript validaciju, gdje nevalidan unos onemogućava submit i ispisuje odgovarajuću poruku koja jeste dovoljna korisniku da može ispraviti svoju grešku. Također, poruka o greškama se nalazi u sklopu stranice (ispod submit dugmeta).
	b)Koristeći JavaScript implementirane su sljedeće funkcionalnosti za 4Boda iz podzadatka b): Carousel i Korištenje localstorage za spašavanje posljednjeg unosa sa forme i prikaz pri ponovnom učitavanju stranice.*Napomena: za stranicu Favorities treba sacekati par sekundi da se prikaze prethodna vrijednost. 

2)Nije uradjeno:
Zadatak pod c), korištenje ajaxa.

3)Lista fajlova: Pored navedenih za spiralu 1, dodane su sljedeće izmjene:
	1.Quotes.html - Podstranica, gdje je postavljen carousel i blage izmjene forme na dnu;
	2.Favorities.html - Podstranica, blage izmjene forme na dnu;
	3.ContactUs.html - Podstranica, blage izmjene forme;
	4.Style.css - css citavog projekta je u njemu;
	5.localStorageF.js - js fajl za podstranicu Favorities;
	6.localStorageQ.js - js fajl za podstranicu Quotes;
	7.script.js - js fajl za ostatak projekta;
	7.ReadMe.md - dodan opis za spiralu 2;









---------------------------------------------------
SPIRALA 1

1)Uradjeno: 
	a)Napravljena skica (koristeći Paint) kako bi svaka podstranica izgledala (ima ih 5)! 
	b)Sve stranice imaju grid view izgled; I sve su responzivne.
	c)Napravljen je i izgled za mobilne uređaje koristeći media query-e.
	d)Implementirane su 3 html forme (Podijeli omiljeni citat na Quotes.html; Ostavi komentar na Favorities.html; Pošalji pitanje na ContactUs.html)
	e)Osmisljen je i implementiran meni web stranice koji je vidljiv na svim podstranicama.
	f)Izgled stranica je konzistentan, bez glitcheva i elementi na stranici su poravnati.

+

Stavljena je ikonica za stranicu (vidjeti na tabu otvorene web stranice - roze mašna);


2)Šta nije uradjeno:
	Izgled za mobilne uređaje bi se mogao poboljšati, posebno na Contact Us podstranici (Rjesenje: prilagoditi dimenzije i pozicije elemenata forme).
	Također, mogao se smanjiti font slova, dimenzije slika i videa, tako da sve izgleda preglednije i ljepše. (Rjesenje: napraviti postavke i prepravke u style.css za media query).

4)NAPOMENA: Trebala sam slike staviti u jedan poseban folder da bude preglednije, međutim tek na kraju sam skontala da ih ima puno, ali nisam odvojila jer bih morala prepravljati svaku putanju slike u projektu, sto bi mi oduzelo previse vremena (ne bih stigla sad).

3)Lista fajlova:
	1.Home.html - Početna stranica web stranice;
	2.Quotes.html - Podstranica;
	3.Stories.html - Podstranica;
	4.Favorities.html - Podstranica;
	5.ContactUs.html - Podstranica;
	6.Style.css - css citavog projekta je u njemu;
	7.ReadMe.md - opis projekta i SPIRALE 1;
	8..jpg i .pgn fajlovi - sve koristene slike od kojih su: - SkicaHomePage.pgn - skica za Home podstranicu,
	 - SkicaQuotesPage.pgn - skica za Quotes podstranicu,
	 - SkicaStoriesPage.pgn - skica za Stories podstranicu,
	 - SkicaFavoritiesPage.pgn - skica za Favorities podstranicu,
	 - SkicaContactUsPage.pgn - skica za Contact Us podstranicu,
	 - SveSkice_MobileForm.pgn - skice za mobile uredjaj za sve podstranice;
	9.provjera.html - ignorisati (suvisan fajl).


Belma Skopljakovic, 16650.
