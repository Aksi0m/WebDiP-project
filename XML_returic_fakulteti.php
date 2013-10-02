<?php

	include_once('Framework/glavniPHP.php');
	
	if(!empty($_SESSION['korisnik']))
	{
		
		$fakultet = new fakultet();
		
		$kolicinaStranica = 10;
				
		if (isset($_GET['stranica'])) 
		{
		
			$_GET['stranica'] = $_GET['stranica'] - 1; 
			 
		}
		
		
		$prijavljeniKorisnik = $_SESSION['korisnik'];
		$ukupno = sizeof(fakultet::preuzmiSveFakultete()); 
		$offset = $_GET['stranica'] * $kolicinaStranica;
		$stranice = ceil($ukupno / $kolicinaStranica);
		$fakulteti = fakultet::preuzmiSveFakultete(""," LIMIT $kolicinaStranica OFFSET $offset");
		

		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
		$xml .= '<fakulteti>';
		
		if(sizeof($fakulteti) >= 1)
		{

			foreach($fakulteti as $fakultet)
			{
				

				$xml .= '<fakultet idf="' . $fakultet->id_fakultet . '" nazivFakulteta="' . $fakultet->naziv . '" adresaFakulteta="' . $fakultet->adresa . '" tipPrijavljenog="'.$prijavljeniKorisnik->tip_korisnika.'" fakultetPrijavljenog="'.$prijavljeniKorisnik->fakultet.'"> </fakultet>';
				
			}
			
		}
		$xml .= '<stranicenje brojStranica="' . $stranice . '"></stranicenje>';
		$xml .= '</fakulteti>';
		header("Content-Type: text/xml");
		print $xml;
	
	} else {
		$smarty->assign("zabranjenPristup","Stranica ne sadrži nikakve podatke!");
		$smarty->display("index.tpl");
	}

?>