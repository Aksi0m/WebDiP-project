<?php

	include_once('Framework/glavniPHP.php');
	
	
	if(!empty($_GET['idGalerija']))
	{
		
		$prijavljeniKorisnik = $_SESSION['korisnik'];
		
		$slika = new slika();
		
		$slike = slika::preuzmiSveSlike("galerija='". $_GET['idGalerija'] . "'");
		$fakultet = mysql_fetch_array(mysql_query("SELECT fakultet FROM natjecaj WHERE (id_natjecaj in (SELECT natjecaj FROM galerija WHERE id_galerija='".$_GET['idGalerija']."'))"));
		
		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
		$xml .= '<slikeGalerije  idg="'.$_GET['idGalerija'].'" tipPrijavljenog="'.$prijavljeniKorisnik->tip_korisnika.'" fakultetPrijavljenog="'.$prijavljeniKorisnik->fakultet.'" galerijaPripadaFakultetu="'.$fakultet[0].'">';
		
		
		if(sizeof($slike) >= 1)
		{

			foreach($slike as $slika)
			{
				
				$xml .= '<slika ids="'. $slika->id_slika .'" nazivSlike="' . $slika->slika . '" opisSlike="' . $slika->opis . '" vrijeme_uploadanja="' . $slika->vrijeme_uploadanja . '" galerijaID="' . $slika->galerija . '"> </slika>';

			}
			
		}
		$xml .= '</slikeGalerije>';
		header("Content-Type: text/xml");
		print $xml;
	
	} else {
		$smarty->assign("zabranjenPristup","Stranica ne sadrži nikakve podatke!");
		$smarty->display("index.tpl");
	}

?>