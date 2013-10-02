<?php

	include_once('Framework/glavniPHP.php');
	
	
	if(!empty($_GET['galerijaNatjecaja']))
	{
		
		$galerija = new galerija();
		
		
		$kolicinaStranica = 4;
		
		if (isset($_GET['stranica'])) 
		{
		
			$_GET['stranica'] = $_GET['stranica'] - 1; 
			 
		}
		
		$ukupno = sizeof(galerija::preuzmiSveGalerije("natjecaj='". $_GET['galerijaNatjecaja'] . "'")); 
		$offset = $_GET['stranica'] * $kolicinaStranica;
		$stranice = ceil($ukupno / $kolicinaStranica);
		$galerije = galerija::preuzmiSveGalerije("natjecaj='". $_GET['galerijaNatjecaja'] . "'"," LIMIT $kolicinaStranica OFFSET $offset");
		
		
		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
		$xml .= '<galerijeNatjecaja>';
		
		
		if(sizeof($galerije) >= 1)
		{

			foreach($galerije as $galerija)
			{
				
				$xml .= '<galerija idg="'. $galerija->id_galerija .'" nazivGalerije="' . $galerija->naziv . '"> </galerija>';

			}
			
		}
		$xml .= '<stranicenje brojStranica="' . $stranice . '"></stranicenje>';
		$xml .= '</galerijeNatjecaja>';
		header("Content-Type: text/xml");
		print $xml;
	
	} else {
		$smarty->assign("zabranjenPristup","Stranica ne sadrži nikakve podatke!");
		$smarty->display("index.tpl");
	}

?>