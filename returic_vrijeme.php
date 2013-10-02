<?php
	
	include_once('Framework/glavniPHP.php');
	include_once('Framework/klasaKorisnik.php');
	
	$smarty->assign("naslov","Vrijeme");
	
	if (!isset($_SESSION['korisnik'])) {
		
		$smarty->assign("ZabranjenPristup", "Morate biti prijavljeni za pristup traženoj stranici");
		$smarty->display("returic_prijava.tpl");
		
	}else {
		
		$prijavljeniKorisnik = $_SESSION['korisnik'];

		if($prijavljeniKorisnik->tip_korisnika == 3)
		{
					
			if(isset($_POST["ok"]))
			{
			
				vrijeme::uskladiVrijeme();
			
			}
			
			
			$vrijeme = vrijeme::preuzmiTrenutnoVrijeme();
			
			$smarty->assign("vrijeme",$vrijeme);
			$smarty->display('returic_vrijeme.tpl');
			
		} else {
			
			$smarty->assign("Prava","Nemate prava pristupiti stranici returic_vrijeme.php!");
			$smarty->display('index.tpl');
		}
	
	}

?>