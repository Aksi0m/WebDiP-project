
	{include file="zaglavlje.tpl"}
	<div id="csadrzajj">
		<div id="specifikacije">
			<h1>Specifikacije projektnog zadatka</h1>
			<p id="naslovSpecifikacija"> Sustav omogućuje kreiranje i prijavu na studijske programe ponuđene od strane  članica sustava. Sustav ima sljedeće korisnike: </p>
			<p id="opisZadatka">
	
			<p style="font-weight: bolder;"> neregistrirani korisnik </p> je korisnik koji nema korisnički račun na sustavu.  Članom sustava može postati u 
			slučaju registracije na sustav, bilo putem OpenID računa (Google, Facebook i drugi sustavi koji podržavaju OID) ili 
			putem ugrađenog sustava za registraciju korisnika.  Korisnik se smatra registriranim tek nakon aktivacije računa putem 
			aktivacijkse poruke elektroničke pošte (link za aktivaciju vrijedi 24 sati). Neregistrirani korisnik ima mogućnost uvida u 
			natječaje stavljene u sustav od strane administratora studija, potrebnu dokumentaciju te rokove za predaju potrebnih 
			dokumenata. <br>
			<p style="font-weight: bolder;">registrirani korisnik </p> je korisnik koji ima kreiran i aktiviran korisnički račun. U slučaju tri neuspješne prijave na 
			sustav (za redom), korisniku se zaključava pristup sustavu; u tom slučaju  se  aktiviranje korisničkog računa obavlja od 
			strane administratora sustava. U slučaju uspješne prijave na sustav, kreira se korisnička sesija. 
			Registrirani korisnik ima sva prava kao i neregistrirani korisnik plus mogućnost kreiranja svojeg digitalnog portfelja 
			dokumenata potrebnih za slanje prijave. U portfelju se mogu nalaziti dokumenti u pdf, doc, docx, odt,  jpg i jpeg 
			formatu. Pohranjivanje datoteka drugih ekstenzija nije dozvoljen. Osim pohranjivanja svojih podataka, ima pravo uvida 
			i u vlastite prijave poslane na objavljene natječaje kao i uvid u sve natječaje koji su trenutno aktivni u sustavu tj. čiji 
			datum prijave je veći od trenutnog virtualnog datuma. Maksimalan broj aktivnih natječaja je 10 po strani. U slučaju da 
			postoji više od 10 aktivnih natječaja u sustavu njihov ispis se realizira putem straničenja. Za svaki aktivan natječaj 
			korisnik može vidjeti galeriju slika natječaja (npr. institucija, uredi, laboratoriji, sheme programa, studentski život i 
			slično), poslati prijavu i komentirati sam natječaj. Komentari natječaja su vidljivi za sve korisnike. Uz samo 
			komentiranje, moguće je i ocjenjivati komentare. Prijava na aktivni natječaj se realizira kreiranjem portfelja za svaku 
			aplikaciju i odabirom digitalnih dokumenata koji se žele priložiti uz prijavu. Potrebni dokumenti se odabiru između 
			dokmenata pohranjenih u sustav. Pisma preporuke se  prilažu, nakon slanja poruke na navedenu e-mail adresu 
			preporučivaća, putem linka koji omogućuje upload dokumenata. Sa samom elektroničkom porukom svaki preporučivač
			dobiva i korisničke podatke za pristup podsustavu za slanje dokumenata. Svaki korisnik se može prijaviti na jedan ili 
			više natječaja sa različitih Fakulteta/Sveučilišta. Prilikom slanja natječaja on se stavlja u košaricu sa osnovnim 
			podacima radi finalne provjere podataka prije stvarnog slanja prijave na natječaj. <br>
			<p style="font-weight: bolder;"> administrator Fakulteta </p>ima sve ovlasti kao i registrirani korisnik uz mogućnosti kreiranja natječaja za 
			diplomske i poslijediplomske studije. Pri kreiranju natječaja se definiraju svojstva natječaja kao što su broj mjesta, 
			trajanje natječaja, trškovi programa, linije financiranja, cijena prijave, galerija slika i tome slično. Jedan administrator 
			fakulteta može upravljati natječajem na samo jednom Fakultetu dok jedan Fakultet može imati više administratora 
			svojih otvorenih natječaja. Korisnik koji kreira natječaj je zadužen za korisnike koji se javljaju na natječaj. On ima 
			mogućnost uvida u njihove osobne podatke, njihove priložene dokumente (npr. pregled dokumenata unutar preglednika 
			putem google docs preglednika), komunikaciju sa preporučivačima ali tek nakon isteka roka za prijavu. Nakon 
			donošenja odluke o prihvaćanju/odbijanju korisnikove prijave, administrator zadužen za natječaj označava sve pristigle 
			prijave sa primljen/odbijen oznakom. Svakom korisniku sustav šalje automatsku elektroničku poštu nakon označavanja 
			prijave sa standardnim tekstom u kojem se mijenja ime i prezime te status prijave. Osim toga, svaki administrator 
			fakulteta ima mogućnost uvida u statistiku za natječaje koje je kreirao. <br>
			<p style="font-weight: bolder;"> administrator sustava </p> ima sva prava kao i administrator fakulteta uz ovlasti upravljanja korisničkim podacima 
			svakog korisnika, uvida u statistiku rada sustava,  uvid u statistiku pojedinog korisnika (status prijave, uvid u 
			dokumente, status korisničkog računa), blokiranja korisničkih računa u slučaju povrede pravila korištenja (pritužba 
			drugih korisnika, pritužba moderatora  časopisa, vulgarni komentari i tome slično), zamrzavanje korištenja računa na 
			određeno vrijeme (X sati, X dana,...), deaktiviranje korisničkih računa u slučaju treće opomene, kreiranje Fakulteta, 
			odobravanje natječaja, odobravanje moderatora za pojedini Fakultet, brisanje moderatora poedinog Fakulteta. Osim 
			toga, on ima mogućnost upravljanja "sustavskim vremenom" radi simuliranja protoka vremena na projektnoj aplikaciji.
						
			</p>
		
		</div>
		<div id="galerija">	
			<h1>Dijagrami</h1>
				<ul id="dijagrami">
					<li> <a href="returic_era.php" target="_self" > <img  src='Slike/baza.jpg'  alt=''/> <br/> ERA dijagrami </a> </li>
					<li> <a href="returic_uml.php" target="_self" > <img  src='Slike/dijagram1.jpeg'  alt=''/> <br/> UML dijagrami </a> </li>
				</ul>
		</div>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		<div id="popisDatoteka">	
			<h1>Popis datoteka</h1>
			<h2> .PHP datoteke</h2>
			<p>
				index.php,
ispis.php,
recaptchalib.php,
returic_aktivacija.php,
returic_CRUD.php,
returic_detalji_fakulteta.php,
returic_dnevnik.php,
returic_dokument_portfelj.php,
returic_dokumentacija.php,
returic_dokumenti.php,
returic_era.php,
returic_fakulteti.php,
returic_galerija.php,
returic_komentar.php,
returic_korisnici.php,
returic_kreiraj_natjecaj.php,
returic_natjecaji.php,
returic_ocjena.php,
returic_osobna.php,
returic_pismo_preporuke.php,
returic_portfelj_dokumenata.php,
returic_prijava.php,
returic_prijave.php,
returic_prijavnica.php,
returic_provjera.php,
returic_registracija.php,
returic_slika.php,
returic_uml.php,
returic_uredi.php,
returic_vrijeme.php,
returic_zaboravljena_lozinka.php,
XML_returic_detalji_fakulteta.php,
XML_returic_dnevnik.php,
XML_returic_dokument_portfelj.php,
XML_returic_dokumenti.php,
XML_returic_fakulteti.php,
XML_returic_galerija.php,
XML_returic_natjecaji.php,
XML_returic_portfelj_dokumenata.php,
XML_returic_prijavnice.php,
XML_returic_slika.php,
XML_returic_statistika.php,
bazaPodatakaKonfiguracija.php,
bazaPodatakaObjekt.php,
glavniPHP.php,
klasaDnevnik.php,
klasaDokumenti.php,
klasaFakultet.php,
klasaGalerija.php,
klasaKomentar.php,
klasaKorisnik.php,
klasaNatjecaji.php,
klasaOcjena.php,
klasaPismoPreporuke.php,
klasaPortfeljDokumenata.php,
klasaPrijavnica.php,
klasaSlika.php,
klasaVrijeme.php,
konfiguracija.php,
scale.php,
vrijeme.php

			</p>
			<h2> .TPL datoteke</h2>
			<p style="text-align:justify;">index.tpl, podnozje.tpl, returic_aktivacija.tpl, returic_detalji_fakulteta.tpl, returic_dnevnik.tpl, returic_dokument_portfelj.tpl, returic_dokumentacija.tpl, 
			returic_dokumenti.tpl, returic_era.tpl, returic_fakulteti.tpl, returic_galerija.tpl, returic_komentar.tpl, returic_korisnici.tpl
			returic_kreiraj_natjecaj.tpl, returic_natjecaji.tpl, returic_osobna.tpl, returic_pismo_preporuke.tpl, returic_portfelj_dokumenata.tpl,
			returic_prijava.tpl, returic_prijave.tpl, returic_prijavnica.tpl, returic_registracija.tpl, returic_uml.tpl, returic_uredi.tpl,
			returic_vrijeme.tpl, zaglavlje.tpl, zaglavlje_natjecaj.tpl, zaglavlje_pocetna.tpl</p>
			<h2> .CSS datoteke</h2>
				<p>returic_top.css</p>
			<h2> .JS datoteke</h2>
			<p>returic.js, returic_pocetna.js, returic_natjecaji.js</p>
			
			
		</div>
		<div id="tehnologija">	
			<h1>Korištena tehnoglogija</h1>
			Za realizaciju ovog projektnog zadatka i web mjesta korištene su sljedeće tehnologije i alati:
			<p><a href="http://www.php.net/">PHP</a> - Skriptni jezik za programiranje na strani poslužitelja</p>
			<p><a href="http://www.javascriptsource.com/">JavaScript</a> -  Skriptni programski jezik, koji se izvršava u web pregledniku na strani korisnika</p>
			<p><a href="http://www.w3.org/MarkUp/">HTML</a> - HyperText Markup Language prezentacijski jezik za izradu web stranica</p>
			<p><a href="http://www.w3.org/Style/CSS/">CSS</a> - Cascading Style Sheets (Stilski jezik za opis prezentacije dokumenta napisanog pomoću markup (HTML) jezika</p>
			<p><a href="http://www.smarty.net/">Smarty</a> - PHP Template Engine </p>
			<p><a href="http://jquery.com/">jQuery</a> - JavaScript biblioteka</p>
			<p><a href="http://jqueryui.com/">jQuery UI</a> - JavaScript biblioteka za dodatne ukrase</p>
			<p><a href="http://mootools.net/">Mootools</a> - JavaScript biblioteka</p>
			<h2> Plug-ins </h2>
			<p>jMenu_v1.8 - jQuery Plug-in za navigacijski meni</p>
			<p>jPaginate - jQuery Plug-in za straničenje podataka</p>
			<p>lightbox - jQuery Plug-in za pregledavanje slika</p>
			<p>raty - jQuery Plug-in za ocjenjivanje sadržaja</p>
			<p>jqBarGraph.1.1 - jQuery Plug-in za grafički prikaz podataka</p>
			<p>picnet.table.filter - jQuery Plug-in za filtriranje sadržaja u tablici</p>
			<p>tinytab - Mootools Plug-in za prikaz sadržaja u tabovima</p>			
		</div>
		<div id="mapaMjesta">
			<h1>Mapa mjesta</h1>
			<p>
				<h2>Glavni Sustav</h2>
				<ul>
					<li>Poćetna</li>
					<li>Korisnici</li>
					<li>Portfelj Dokumenata</li>
					<ul><li>Dokumenti</li></ul>
					<li>Natječaji</li>
						<ul><li>Detalji Natječaja</li>
							<li>Pregled Galerija</li>
							<li>Prijavi se</li>
						</ul>
					<li>Fakulteti</li>
						<ul><li>Detalji Fakulteta</li>
							<li>Kreiraj Natječaj</li>
						</ul>
					<li>Upravljanje Sustavom</li>
					<ul><li>Vrijeme</li>
						<li>Dnevnik</li>
						<li>CRUD Operacije</li>
					</ul>
					<li>Prijave</li>
					<li>Registracija</li>
					<li>Prijava</li>
					<li>Odjava</li>
				</ul>
				<h2>Podsustav za preporučivaće</h2>
				<ul>
					<li>Prijava</li>
					<ul><li>Upload preporuka</li></ul>
					<li>Odjava</li>
				</ul>
			</p>
		</div>
		<div id="opisZavrsenostiProjekta">
			<h1>Opis završenosti projekta</h1>
			<p>
				Ugrađene su sve funkcionalnosti navedene u specifikaciji projekta.
				<h2>TODO</h2>
				*.htaccess ispis korisnika<br/>
				*korištenje OpenID/Facebook za prijavu
			</p>
		</div>
		<div id="uoceniProblemi">	
			<h1>Uočeni problemi</h1>
			<p>Prilikom prijave na natječaj već odabrani portfelj dokumenata neće biti zapisan kao priloženi portfelj. Već se prvo mora odabrati bilo koji drugi portfelj i onda ponovo kliknuti na onaj portfelj koji je pri otvaranju stranice bio zabilježen kako bi se uspješno zapisao u bazu.</p>
			<p>Prilikom grafičkog prikaza statistike natječaja ispod prvog stupca se ispiše "undefined" preko riječi "Broj Prijava"</p>
			<p>U FireFox Browseru ne radi vizualno dodavanje dokumenata u portfelj, ali uspješno zapiše promjene u bazu podataka"</p>
			<p>Nije moguć zapis hrvatskih znakova preko ajaxCRUD klase, čitanje je moguće"</p>
		</div>
		
		<div style="height:100px;"></div>
	</div>
	{include file="podnozje.tpl"}
