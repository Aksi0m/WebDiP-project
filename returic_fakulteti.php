<?php
	
	include_once('Framework/glavniPHP.php');
	
	$fakultet = new fakultet();
	
	$smarty->assign("naslov","Fakulteti");

	if(!empty($_SESSION['korisnik']))
	{
		
		$prijavljeniKorisnik = $_SESSION['korisnik'];
		
		if($prijavljeniKorisnik->tip_korisnika >= 2 )
		{
			
			if(isset($_POST['ok'])){
				
				$fakultet = fakultet::noviFakultet();
				$greske = $fakultet->provjeraFakulteta();
				$smarty->assign("greske", $greske);
				
				if(empty($greske))
				{
					$fakultet->spremanjePodataka();
					$dnevnik = dnevnik::noviDnevnik();
					$dnevnik->dogadaj =  mysql_real_escape_string("Korisnik ".$prijavljeniKorisnik->korisnicko_ime." (ID = ".$prijavljeniKorisnik->id_korisnik.") je kreirao novi FAKULTET pod nazivom: ".$fakultet->naziv."");
					$dnevnik->spremanjePodataka();
				} 
				
				$smarty->display("returic_fakulteti.tpl");
			} else {
				$smarty->display("returic_fakulteti.tpl");
			}
			
		} else {
			$errorMessage = date("Y-m-d H:i:s", vrijeme::preuzmiTrenutnoVrijeme());
			$errorMessage.= "; stranica: returic_fakulteti.php; korisnik: (" . $prijavljeniKorisnik->korisnicko_ime . ") -" . $prijavljeniKorisnik->ime . " " . $prijavljeniKorisnik->prezime . "-;";
			$errorMessage.="\n";
			error_log($errorMessage, 3, "Errorlogs/errorlog_fakulteti.txt");
			$smarty->assign("ZabranjenPristup","Nemate prava za pristup toj stranici");
			$smarty->display("index.tpl");
		}
	} else {
		$smarty->assign("ZabranjenPristup","Morate biti prijavljeni kako bi pristupili toj stranici");
		$smarty->display("returic_prijava.tpl");
	}

?>