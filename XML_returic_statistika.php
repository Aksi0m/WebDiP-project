<?php

	include_once('Framework/glavniPHP.php');
	

	if(isset($_GET['statistika']))
	{
		$prijavnica = new prijavnica();
		
		$prijavljeniKorisnik = $_SESSION['korisnik'];
	
		$prijavnica = prijavnica::preuzmiSvePrijavnice("natjecaj='".$_GET['statistika']."'");
		$brojPrijavnica = sizeof($prijavnica);
		
		$prijavnica = prijavnica::preuzmiSvePrijavnice("natjecaj='".$_GET['statistika']."' AND prijava_prihvacena='1'");
		$brojPrihvacenihPrijava = sizeof($prijavnica);
		
	
		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
		$xml .= '<statistike idPrijavljenog="'.$prijavljeniKorisnik->id_korisnik.'" korIme="'.$prijavljeniKorisnik->korisnicko_ime.'">';

		
		$xml .= '<statistika brojPrijavnica="'.$brojPrijavnica.'" prihvacene="' . $brojPrihvacenihPrijava . '"> </statistika>';
							
			
		$xml .= '</statistike>';
		header("Content-Type: text/xml");
		print $xml;
	
	}

?>