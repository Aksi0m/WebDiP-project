<?php

	include('Framework/glavniPHP.php');
	$smarty->assign("naslov","Aktivacija");
	
	if( isset($_GET['token']) && isset($_GET['kime']) ) 
	{
		
		$korisnici = korisnik::preuzmiSve(" aktivacijski_kod='".$_GET['token']."'");
		$korisnici = $korisnici[0];

		if(sizeof($korisnici) == 1)
		{
				
			if(vrijeme::preuzmiTrenutnoVrijeme() < $korisnici->aktivacijski_kod)
			{
			
				mysql_query("update korisnik set status_korisnika='2' where aktivacijski_kod='".$_GET['token']."'");
				mysql_close();
				$poruka = "Uspješno ste aktivirali svoj korisnički račun!";
				
			} else {
			
				$poruka = "Došlo je do greške. Vrijeme za aktivaciju je isteklo!";
			
			}
			
		} else {
			
			$poruka = "Došlo je do greške. Ne postoji taj aktivacijski_kod u bazi!";
		
		}
		
	} else {

		$poruka = "GET parametri su prazni";
	
	}
	
	$smarty->assign("poruka", $poruka);
	$smarty->display("returic_aktivacija.tpl");		
	
?>
		