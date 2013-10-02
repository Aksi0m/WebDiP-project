<?php

	include_once('Framework/vrijeme.php');
	include_once('Framework/scale.php');
	include_once('Framework/glavniPHP.php');
	
	$dokument = new dokument();
	
	$smarty->assign("naslov","Dokumenti");

	if(!empty($_GET['korisnik']))
	{
		
		$prijavljeniKorisnik = $_SESSION['korisnik'];
		
		if($_GET['korisnik'] == $prijavljeniKorisnik->id_korisnik || $prijavljeniKorisnik->tip_korisnika == 3)
		{
			$noviDirektorij = "/var/www/WebDiP/2011_projekti/WebDiP2011_125/Dokumenti/" . $prijavljeniKorisnik->korisnicko_ime;
			
			if (!file_exists($noviDirektorij)) 
			{ 
				mkdir($noviDirektorij); 
				chmod($noviDirektorij, 0777);
			}
			
			if(isset($_POST['ok'])){
			
				$dokument = dokument::noviDokument();
				$dokument->dokument = $_FILES['udokument']['name'];
				$greske = $dokument->provjeraDokumenta();
				$smarty->assign("greske", $greske);
				
				if(empty($greske))
				{
					move_uploaded_file($_FILES["udokument"]["tmp_name"],"Dokumenti/" . $prijavljeniKorisnik->korisnicko_ime . "/" . $_FILES["udokument"]["name"]);
					$dokument->spremanjePodataka();
				} 
				
				$smarty->display("returic_dokumenti.tpl");
			} else {
				$smarty->display("returic_dokumenti.tpl");
			}
			
		} else {
			$errorMessage = date("Y-m-d H:i:s", vrijeme::preuzmiTrenutnoVrijeme());
			$errorMessage.= "; stranica: returic_dokumenti.php; korisnik: (" . $prijavljeniKorisnik->korisnicko_ime . ") -" . $prijavljeniKorisnik->ime . " " . $prijavljeniKorisnik->prezime . "-; uneseni korisnik:" . $_GET['korisnik'];
			$errorMessage.="\n";
			error_log($errorMessage, 3, "errorlog_dokumenti.txt");
			$smarty->assign("ZabranjenPristup","Nemate prava za pristup toj stranici");
			$smarty->display("index.tpl");
		}
	} else {
		$smarty->assign("ZabranjenPristup","Morate biti prijavljeni kako bi pristupili toj stranici");
		$smarty->display("returic_prijava.tpl");
	}
?>