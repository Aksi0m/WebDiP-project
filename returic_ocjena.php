<?php

	include_once('Framework/glavniPHP.php');
	
	if (!isset($_SESSION['korisnik'])) {
		
		$smarty->assign("ZabranjenPristup", "Morate biti prijavljeni kako bi mogli ocjenjivati sadrzaj");
		$smarty->display("returic_prijava.tpl");
		
	}else {

		if(isset($_GET['ocjena'])){
			$prijavljeniKorisnik = $_SESSION['korisnik'];
			$ocjena = new ocjena();
			
			if($_GET['komentar'] == "0")
			{
				
				$ocjenio = $ocjena->preuzmiSveOcjene("korisnik='" . $prijavljeniKorisnik->id_korisnik . "' AND natjecaj='" . $_GET['natjecaj'] . "'");
				
				if(sizeof($ocjenio) == 1)
				{	
					$ocjena->azuriranjePodataka("ocjena='" . $_GET['ocjena'] . "' WHERE korisnik='" . $prijavljeniKorisnik->id_korisnik . "' AND natjecaj='" . $_GET['natjecaj'] . "'");	
					
				} else {
				$ocjena = ocjena::novaOcjena();

				$ocjena->ocjena =  mysql_real_escape_string($_GET['ocjena']);
				$ocjena->vrijeme_ocjenjivanja =  mysql_real_escape_string(date("Y-m-d H:i:s", vrijeme::preuzmiTrenutnoVrijeme()));
				$ocjena->korisnik =  mysql_real_escape_string($prijavljeniKorisnik->id_korisnik);
				$ocjena->natjecaj =  mysql_real_escape_string($_GET['natjecaj']);
				if($_GET['komentar'] == "0") $ocjena->komentar =  mysql_real_escape_string("null");
				}
				
			}elseif($_GET['natjecaj'] == "0")
			{
				$ocjenio = $ocjena->preuzmiSveOcjene("korisnik='" . $prijavljeniKorisnik->id_korisnik . "' AND komentar='" . $_GET['komentar'] . "'");
				if(sizeof($ocjenio) == 1)
				{	
					$ocjena->azuriranjePodataka("ocjena='" . $_GET['ocjena'] . "' WHERE korisnik='" . $prijavljeniKorisnik->id_korisnik . "' AND komentar='" . $_GET['komentar'] . "'");	
					
				} else {
				$ocjena = ocjena::novaOcjena();

				$ocjena->ocjena =  mysql_real_escape_string($_GET['ocjena']);
				$ocjena->vrijeme_ocjenjivanja =  mysql_real_escape_string(date("Y-m-d H:i:s", vrijeme::preuzmiTrenutnoVrijeme()));
				$ocjena->korisnik =  mysql_real_escape_string($prijavljeniKorisnik->id_korisnik);
				$ocjena->komentar =  mysql_real_escape_string($_GET['komentar']);
				if($_GET['natjecaj'] == "0") $ocjena->natjecaj =  mysql_real_escape_string("null");
				}
			}
				
			$ocjena->spremanjePodataka();
		}
		
	}

?>