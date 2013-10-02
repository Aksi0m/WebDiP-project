<?php

	include_once('Framework/glavniPHP.php');
	
	
	if(!empty($_GET['idKor']) || !empty($_GET['prijavaNatjecaj']))
	{
		
		$prijavljeniKorisnik = $_SESSION['korisnik'];
		
		$portfelji_dokumenata = new portfelj_dokumenata();
		
		$portfelji_dokumenata = portfelj_dokumenata::preuzmiSvePortfelje("korisnik='". $prijavljeniKorisnik->id_korisnik . "'");

		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
		$xml .= '<portfelji>';
		
		if(sizeof($portfelji_dokumenata) >= 1)
		{

			foreach($portfelji_dokumenata as $portfelj_dokumenata)
			{

				$xml .= '<portfelj idpd="'.$portfelj_dokumenata->id_portfelj_dokumenata.'" naziv="' . $portfelj_dokumenata->naziv . '" kreiran="'.$portfelj_dokumenata->datum_kreiranja.'"> </portfelj>';
				
			}
			
		}
		$xml .= '</portfelji>';
		header("Content-Type: text/xml");
		print $xml;
	
	} else {
		$smarty->assign("zabranjenPristup","Stranica ne sadrži nikakve podatke!");
		$smarty->display("index.tpl");
	}

?>