<?php

	include_once("recaptchalib.php");
	include_once('Framework/glavniPHP.php');
	include_once('Framework/klasaKorisnik.php');
	$korisnik = new korisnik();

	$smarty->assign("naslov","Korisnici");

	if (!isset($_SESSION['korisnik'])) 
	{
		
		$smarty->assign("ZabranjenPristup", "Morate biti prijavljeni za pristup traženoj stranici");
		$smarty->display("returic_prijava.tpl");
		
	} else {
	
		$stranica = 0;
		$kolicinaStranica = 10;
		
		if (isset($_GET['stranica'])) 
		{
		
			$_GET['stranica'] = $_GET['stranica'] - 1; 
			 
		}

		$ukupno = sizeof(korisnik::preuzmiSve()); 
		$offset = $_GET['stranica'] * $kolicinaStranica;
		$stranice = ceil($ukupno / $kolicinaStranica) + 1;
		$korisnici = korisnik::preuzmiSve("", " LIMIT 10 OFFSET $offset");
		
		foreach($korisnici as $korisnik) 
		{
			
			$korisnik->email = recaptcha_mailhide_html ($mailhide_pubkey,$mailhide_privkey, $korisnik->email);
		
		}
		
		if ($stranice > 5) 
		{
		
			$pocetakStranice = max($_GET['stranica'] - 2, 1);
			$krajStranice = min($stranice, $_GET['stranica'] + 5);		
				
		} else {
		
			$pocetakStranice = 1;
			$krajStranice = $stranice;
				
		}
		
		$smarty->assign("korisnici", $korisnici);
		$smarty->assign("pocetakStranice", $pocetakStranice);
		$smarty->assign("krajStranice", $krajStranice);
		$smarty->assign("stranice", $stranice);
		$smarty->assign("stranica", $_GET['stranica'] + 1);
		$smarty->display("returic_korisnici.tpl");
	}

?>