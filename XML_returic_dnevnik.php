<?php

	include_once('Framework/glavniPHP.php');
	
	$prijavljeniKorisnik = $_SESSION['korisnik'];
	
	if(isset($prijavljeniKorisnik)&& $prijavljeniKorisnik->tip_korisnika == 3)
	{
		
		$dnevnik = new dnevnik();
		
		
		$kolicinaStranica = 20;
				
		if (isset($_GET['stranica'])) 
		{
		
			$_GET['stranica'] = $_GET['stranica'] - 1; 
			 
		}
		
		$ukupno = sizeof(dnevnik::preuzmiPodatkeIzDnevnika()); 
		$offset = $_GET['stranica'] * $kolicinaStranica;
		$stranice = ceil($ukupno / $kolicinaStranica);	
		$dnevnik = dnevnik::preuzmiPodatkeIzDnevnika(""," LIMIT $kolicinaStranica OFFSET $offset");

		
		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
		$xml .= '<dnevnik idPrijavljenog="'.$prijavljeniKorisnik->id_korisnik.'" korIme="'.$prijavljeniKorisnik->korisnicko_ime.'">';
		
		if(sizeof($dnevnik) >= 1)
		{

			foreach($dnevnik as $dogadaj)
			{

				$xml .= '<dogadaj iddnevnika="'.$dogadaj->id_dnevnik.'" opisDogadaja="' . $dogadaj->dogadaj . '" vrijeme="'.$dogadaj->vrijeme.'"> </dogadaj>';
				
			}
			
			
		}
		$xml .= '<stranicenje brojStranica="' . $stranice . '"></stranicenje>';
		$xml .= '</dnevnik>';
		header("Content-Type: text/xml");
		print $xml;
	
	} else {
		$smarty->assign("zabranjenPristup","Stranica ne sadrži nikakve podatke!");
		$smarty->display("index.tpl");
	}
	
?>