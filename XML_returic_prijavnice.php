<?php

	include_once('Framework/glavniPHP.php');
	
	
	if(!empty($_GET['natjecaj']) || !empty($_GET['idK']))
	{
	
		$prijavljeniKorisnik = $_SESSION['korisnik'];
		
		if(isset($_GET['natjecaj']))
		{
			
			
			$prijavnice = new prijavnica();
			
			$prijavnice = prijavnica::preuzmiSvePrijavnice("natjecaj='".$_GET['natjecaj']."'");
			
			$natjecaji = natjecaj::preuzmiSveNatjecaje("id_natjecaj='".$_GET['natjecaj']."'");
			$natjecaji = $natjecaji[0];
			
			$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
			$xml .= '<prijavnice nazivNattjecaja="'.$natjecaji->naziv.'" idNatjecaja="'.$prijavnica->natjecaj.'" idPrijavljenog="'.$prijavljeniKorisnik->id_korisnik.'" korIme="'.$prijavljeniKorisnik->korisnicko_ime.'">';
			
			if(sizeof($prijavnice) >= 1)
			{

				foreach($prijavnice as $prijavnica)
				{
					$portfelj = portfelj_dokumenata::preuzmiSvePortfelje("id_portfelj_dokumenata='".$prijavnica->portfelj_dokumenata."'");
					$portfelj = $portfelj[0];
					$korisnik = korisnik::preuzmiSve("id_korisnik='".$portfelj->korisnik."'");
					$korisnik = $korisnik[0];
					$xml .= '<prijavnica prijavioKorisnik="'.$korisnik->id_korisnik.'" email="'.$korisnik->email.'" idp="'.$prijavnica->id_prijavnica.'" odobren="' . $prijavnica->prijava_prihvacena . '" vrijeme="' . $prijavnica->vrijeme_prijave . '" idPortfelja="' . $prijavnica->portfelj_dokumenata . '"> </prijavnica>';
					
				}
				
				
			}
			$xml .= '</prijavnice>';
				
		
		} else if (isset($_GET['idK']))
		{
			
			$prijavnice = new prijavnica();
			
			$prijavnice = mysql_query("SELECT * FROM prijavnica WHERE (portfelj_dokumenata in (SELECT id_portfelj_dokumenata FROM portfelj_dokumenata WHERE korisnik='".$_GET['idK']."'))");
			
			
			
			$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
			$xml .= '<prijavnice idPrijavljenog="'.$prijavljeniKorisnik->id_korisnik.'" korIme="'.$prijavljeniKorisnik->korisnicko_ime.'">';
			

			while ($red = mysql_fetch_array($prijavnice)) {
						
				$natjecaji = natjecaj::preuzmiSveNatjecaje("id_natjecaj='".$red['natjecaj']."'");
				$natjecaji = $natjecaji[0];
				$xml .= '<prijavnica nazivNatjecaja="'.$natjecaji->naziv.'" idp="'.$red['id_prijavnica'].'" odobren="' . $red['prijava_prihvacena'] . '" vrijeme="' . $red['vrijeme_prijave'] . '" idPortfelja="' . $red['portfelj_dokumenata'] . '"> </prijavnica>';
									
			}

			$xml .= '</prijavnice>';
		
		}

		header("Content-Type: text/xml");
		print $xml;
	
	} else {
		$smarty->assign("zabranjenPristup","Stranica ne sadrži nikakve podatke!");
		$smarty->display("index.tpl");
	}
	
?>