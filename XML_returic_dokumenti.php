<?php

	include_once('Framework/glavniPHP.php');
	
	
	if(!empty($_GET['idKor']))
	{
		$prijavljeniKorisnik = $_SESSION['korisnik'];
		
		$dokumenti = new dokument();
		
		$dokumenti = dokument::preuzmiSveDokumente("korisnik='". $_GET['idKor'] . "'");

		$preporuke = preporuka::preuzmiSvePreporuke("korisnik='". $_GET['idKor'] . "'");
		
		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
		$xml .= '<dokumenti idPrijavljenog="'.$prijavljeniKorisnik->id_korisnik.'" korIme="'.$prijavljeniKorisnik->korisnicko_ime.'">';
		
		if(sizeof($dokumenti) >= 1)
		{

			foreach($dokumenti as $dokument)
			{

				$xml .= '<dokument idd="'.$dokument->id_dokument.'" naziv="' . $dokument->dokument . '"> </dokument>';
				
			}
			
			if(sizeof($preporuke) >= 1)
			{
				
				foreach($preporuke as $preporuka)
				{

					$xml .= '<preporuka idp="'.$preporuka->id_preporuka.'" nazivPreporuke="' . $preporuka->pismo_preporuke . '"> </preporuka>';
					
				}
					
			}
			
		}
		$xml .= '</dokumenti>';
		header("Content-Type: text/xml");
		print $xml;
	
	} else {
		$smarty->assign("zabranjenPristup","Stranica ne sadrži nikakve podatke!");
		$smarty->display("index.tpl");
	}
	
?>