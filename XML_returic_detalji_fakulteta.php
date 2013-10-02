<?php

	include_once('Framework/glavniPHP.php');
	
	if(isset($_SESSION['korisnik']) && isset($_GET['fakultet']))
	{

		$natjecaj = new natjecaj();
		
		$kolicinaStranica = 10;
				
		if (isset($_GET['stranica'])) 
		{
		
			$_GET['stranica'] = $_GET['stranica'] - 1; 
			 
		}
		
		
		$prijavljeniKorisnik = $_SESSION['korisnik'];
		$ukupno = sizeof(natjecaj::preuzmiSveNatjecaje("fakultet='".$_GET['fakultet']."'")); 
		$offset = $_GET['stranica'] * $kolicinaStranica;
		$stranice = ceil($ukupno / $kolicinaStranica);
		$natjecaji = natjecaj::preuzmiSveNatjecaje("fakultet='".$_GET['fakultet']."'"," LIMIT $kolicinaStranica OFFSET $offset");
		

		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
		$xml .= '<natjecaji>';
		
		if(sizeof($natjecaji) >= 1)
		{

			foreach($natjecaji as $natjecaj)
			{
				
				$xml .= '<natjecaj idn="' . $natjecaj->id_natjecaj . '" nazivNatjecaja="' . $natjecaj->naziv . '" brojMjesta="' . $natjecaj->broj_mjesta . '" rokPrijave="'.date("Y-m-d H:i:s",$natjecaj->rok_prijave).'" odobren="'.$natjecaj->odobren.'" kreirao="'. $natjecaj->korisnik .'" tipPrijavljenog="'.$prijavljeniKorisnik->tip_korisnika.'" idPrijavljenog="'.$prijavljeniKorisnik->id_korisnik.'"> </natjecaj>';
				
			}
			
		}
		$xml .= '<stranicenje brojStranica="' . $stranice . '"></stranicenje>';
		$xml .= '</natjecaji>';
		header("Content-Type: text/xml");
		print $xml;
	
	} else {
		$smarty->assign("zabranjenPristup","Stranica ne sadrži nikakve podatke!");
		$smarty->display("index.tpl");
	}

?>