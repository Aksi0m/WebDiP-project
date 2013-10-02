<?php

	include_once('Framework/glavniPHP.php');
	
	
	if(!empty($_GET['idPortfelj']))
	{
		
		$prijavljeniKorisnik = $_SESSION['korisnik'];
		
		$portfelji_dokumenata = new portfelj_dokumenata();
		$portfelji_dokumenata = portfelj_dokumenata::preuzmiSvePortfelje("id_portfelj_dokumenata='".$_GET['idPortfelj']."'");
		$portfelji_dokumenata = $portfelji_dokumenata[0];
		$dokumentiPortfelji = mysql_query("SELECT * FROM dokument_portfelj WHERE portfelj_dokumenata='".$_GET['idPortfelj']."'");

		
		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
		$xml .= '<dokumentiPortfelji idPrijavljenog="'.$prijavljeniKorisnik->id_korisnik.'" korIme="'.$prijavljeniKorisnik->korisnicko_ime.'" nazivPortfelja="'.$portfelji_dokumenata->naziv.'">';
		

		if(sizeof($portfelji_dokumenata) >= 1)
		{

			while ($red = mysql_fetch_array($dokumentiPortfelji)) {
				
				$dokument = dokument::preuzmiSveDokumente("id_dokument='".$red['dokument']."'");
				$dokument = $dokument[0];
				
				$xml .= '<dokumentPortfelj idDokumenta="'.$red['dokument'].'" nazivDokumenta="'.$dokument->dokument.'" idPortfelja="' .$red['portfelj_dokumenata'].'"> </dokumentPortfelj>';
				
			}
			
		}
		$xml .= '</dokumentiPortfelji>';
		header("Content-Type: text/xml");
		print $xml;
	
	} else {
		$smarty->assign("zabranjenPristup","Stranica ne sadrži nikakve podatke!");
		$smarty->display("index.tpl");
	}

?>