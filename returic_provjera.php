<?php
	
	include_once('Framework/glavniPHP.php');
	
	if(isset($_GET['kor']))
	{ 
	
		$kor = $_GET['kor'];
		
		$korisnici = korisnik::preuzmiSve(" korisnicko_ime='$kor'");

		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
		$xml .= '<korisnickoIme>';
		
		if( sizeof($korisnici) == 1 )
		{
		
				$xml .= '<korisnik pronaden="true"> '. $korisnici->korisnicko_ime .' </korisnik> '."\n";
		
		} else {
		
				$xml .= '<korisnik pronaden="false"> </korisnik> '."\n";
				
		}
		
		$xml .= '</korisnickoIme>';
		header("Content-Type: text/xml");
		print $xml;
		
	}
	
?>