<?php

	include_once('Framework/vrijeme.php');
	include_once('Framework/glavniPHP.php');
	
	$portfelj_dokumenata = new portfelj_dokumenata();
	
	$smarty->assign("naslov","Portfelj Dokumenata");

	if(!empty($_GET['PDkorisnik']))
	{
		
		$prijavljeniKorisnik = $_SESSION['korisnik'];
		
		if($_GET['PDkorisnik'] == $prijavljeniKorisnik->id_korisnik || $prijavljeniKorisnik->tip_korisnika == 3)
		{
			
			if(isset($_POST['ok'])){
			
				$portfelj_dokumenata = portfelj_dokumenata::noviPortfeljDokumenata();	
				$portfelj_dokumenata->datum_kreiranja =  mysql_real_escape_string(date("Y-m-d H:i:s", vrijeme::preuzmiTrenutnoVrijeme()));
				$portfelj_dokumenata->korisnik =  mysql_real_escape_string($_GET['PDkorisnik']);

				$portfelj_dokumenata->spremanjePodataka();
				
				$smarty->display("returic_portfelj_dokumenata.tpl");
			} else {
				$smarty->display("returic_portfelj_dokumenata.tpl");
			}
			
		} else {
			$errorMessage = date("Y-m-d H:i:s", vrijeme::preuzmiTrenutnoVrijeme());
			$errorMessage.= "; stranica: returic_portfelj_dokumenata.php; korisnik: (" . $prijavljeniKorisnik->korisnicko_ime . ") -" . $prijavljeniKorisnik->ime . " " . $prijavljeniKorisnik->prezime . "-; uneseni PDkorisnik:" . $_GET['PDkorisnik'];
			$errorMessage.="\n";
			error_log($errorMessage, 3, "errorlog_portfelj_dokumenata.txt");
			$smarty->assign("ZabranjenPristup","Nemate prava za pristup toj stranici");
			$smarty->display("index.tpl");
		}
	} else {
		$smarty->assign("ZabranjenPristup","Morate biti prijavljeni kako bi pristupili toj stranici");
		$smarty->display("returic_prijava.tpl");
	}
?>