<?php

	include_once('Framework/glavniPHP.php');
	
	$natjecaj = new natjecaj();
	
	$smarty->assign("naslov","Kreiraj natječaj");

	if(!empty($_SESSION['korisnik']))
	{
		if(!empty($_GET['idFakultet']))
		{
			$prijavljeniKorisnik = $_SESSION['korisnik'];
			
			if($prijavljeniKorisnik->tip_korisnika == 3 || ($prijavljeniKorisnik->tip_korisnika == 2 && $prijavljeniKorisnik->fakultet == $_GET['idFakultet']))
			{
				
				if(isset($_POST['ok'])){
					
					$natjecaj = natjecaj::noviNatjecaj();
					$greske = $natjecaj->provjeraNatjecaja();
					$smarty->assign("greske", $greske);
		
					if(empty($greske))
					{
						$natjecaj->fakultet = mysql_real_escape_string($_GET['idFakultet']);
						$natjecaj->rok_prijave = mysql_real_escape_string(strtotime($_POST['rok']));
						$natjecaj->korisnik = mysql_real_escape_string($prijavljeniKorisnik->id_korisnik);
						if($_POST['odobri'] == '1')  $natjecaj->odobren = mysql_real_escape_string("1");

						$natjecaj->spremanjePodataka();
						
						$zadnjiNatjecaj = mysql_fetch_array(mysql_query('SELECT MAX(DISTINCT id_natjecaj)FROM natjecaj'));

						
						$noviDirektorij = "/var/www/WebDiP/2011_projekti/WebDiP2011_125/Natjecaji/" . $zadnjiNatjecaj[0];
			
						if (!file_exists($noviDirektorij)) 
						{ 
							mkdir($noviDirektorij); 
							chmod($noviDirektorij, 0777);
						}
						
						
						$dnevnik = dnevnik::noviDnevnik();
						$dnevnik->dogadaj =  mysql_real_escape_string("Korisnik ".$prijavljeniKorisnik->korisnicko_ime." (ID = ".$prijavljeniKorisnik->id_korisnik.") je kreirao novi natječaj pod nazivom: ".$natjecaj->naziv."");
						$dnevnik->spremanjePodataka();
						
						$smarty->assign("poruka","Kreirali ste novi natječaj - " . $natjecaj->naziv . "!<br>");
					}
					
					$smarty->display("returic_kreiraj_natjecaj.tpl");
					
					
				} else {
					$smarty->display("returic_kreiraj_natjecaj.tpl");
				}
			
			} else {
				$errorMessage = date("Y-m-d H:i:s", vrijeme::preuzmiTrenutnoVrijeme());
				$errorMessage.= "; stranica: returic_kreiraj_natjecaj.php; korisnik: (" . $prijavljeniKorisnik->korisnicko_ime . ") -" . $prijavljeniKorisnik->ime . " " . $prijavljeniKorisnik->prezime . "- uneseni Fakultet: ". $_GET['idFakultet'] .";";
				$errorMessage.="\n";
				error_log($errorMessage, 3, "Errorlogs/errorlog_kreiraj_natjecaj.txt");
				$smarty->assign("ZabranjenPristup","Nemate prava za pristup toj stranici");
				$smarty->display("index.tpl");
			}
			
		} else if(isset($_GET['idNatjecaj']) && isset($_GET['odobri']))
		{
			$natjecaj = natjecaj::noviNatjecaj();
			$natjecaj->azuriranjePodataka("odobren='" . $_GET['odobri'] . "' WHERE id_natjecaj='" . $_GET['idNatjecaj'] ."'");	
		}
	} else {
		$smarty->assign("ZabranjenPristup","Morate biti prijavljeni kako bi pristupili toj stranici");
		$smarty->display("returic_prijava.tpl");
	}

?>