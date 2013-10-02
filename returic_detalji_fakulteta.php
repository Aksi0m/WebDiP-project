<?php

	include_once('Framework/glavniPHP.php');
	
	$natjecaj = new natjecaj();
	
	$smarty->assign("naslov","Detalji fakulteta");
	
	if(!empty($_SESSION['korisnik']) || !empty($_GET['fakultet']))
	{
		
		$prijavljeniKorisnik = $_SESSION['korisnik'];
		
		if($prijavljeniKorisnik->tip_korisnika == 3 || ($prijavljeniKorisnik->tip_korisnika == 2 && $prijavljeniKorisnik->fakultet == $_GET['fakultet']))
		{

			$smarty->display("returic_detalji_fakulteta.tpl");
			
		} else {
			$errorMessage = date("Y-m-d H:i:s", vrijeme::preuzmiTrenutnoVrijeme());
			$errorMessage.= "; stranica: returic_detalji_fakulteta.php; korisnik: (" . $prijavljeniKorisnik->korisnicko_ime . ") -" . $prijavljeniKorisnik->ime . " " . $prijavljeniKorisnik->prezime . "- uneseni Fakultet: ". $_GET['fakultet'] .";";
			$errorMessage.="\n";
			error_log($errorMessage, 3, "Errorlogs/errorlog_detalji_fakulteta.txt");
			$smarty->assign("ZabranjenPristup","Nemate prava za pristup toj stranici");
			$smarty->display("index.tpl");
		}
	} else {
		$smarty->assign("ZabranjenPristup","Morate biti prijavljeni kako bi pristupili toj stranici");
		$smarty->display("returic_prijava.tpl");
	}

?>