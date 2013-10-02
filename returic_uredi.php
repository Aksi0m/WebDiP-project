<?php

	include_once('Framework/vrijeme.php');
	include_once('Framework/scale.php');
	include_once('Framework/glavniPHP.php');
	include_once('Framework/klasaKorisnik.php');
	$korisnik = new korisnik();
	$smarty->assign("naslov","Uređivanje");

	if (!isset($_SESSION['korisnik'])) {
		
		$smarty->assign("ZabranjenPristup", "Morate biti prijavljeni za pristup traženoj stranici");
		$smarty->display("returic_prijava.tpl");
		
	}else {

		if (isset($_GET['urediID']))
		{		
		
			$kime = $_GET['urediID'];
			$urediKorisnika = korisnik::preuzmiSve(" korisnicko_ime='$kime'");
			$urediKorisnika = $urediKorisnika[0];
			$prijavljeniKorisnik = $_SESSION['korisnik'];
			
			if(($prijavljeniKorisnik->tip_korisnika == 3) || ($_GET['urediID'] == $prijavljeniKorisnik->korisnicko_ime))
			{
				
				if(isset($_POST["uredeno"]))
				{
				
					$korisnik = korisnik::noviPOST();
					
					if(empty($_FILES['uslika']['name']))
					{
						
						$korisnik->avatar = $urediKorisnika->avatar;
					
					} else {
						
						scaleUpload();
						$korisnik->avatar = $_FILES['uslika']['name'];
						
					}
					
					
					$greske = $korisnik->provjeraUnosa();
						
					if(empty($greske))
					{
					
						$korisnik->aktivacijski_kod = $_POST['akt'];
						
						if($korisnik->korisnicko_ime != $urediKorisnika->korisnicko_ime)
						{
							 
							$korisnik->azuriranjePodataka();									
							header( 'refresh: 5; url='.$putanjaAplikacije.'returic_prijava.php?Odjava' );
							$smarty->assign("redirekcija","<h2>Uspiješno ste promjenili korisničko ime, vraćam vas na prijavu . . . <h2>");
								
						} else {
							
							
							$korisnik->azuriranjePodataka();	
							header("Location:returic_uredi.php?urediID=$urediKorisnika->korisnicko_ime");
						
						}
					
					}
					
					$smarty->assign("urediKorisnika", $urediKorisnika);
					$smarty->assign("prijavljeniKorisnik",$prijavljeniKorisnik);
					$smarty->assign("greske", $greske);
					$smarty->display('returic_uredi.tpl');
					
				} else {
					
					$smarty->assign("urediKorisnika", $urediKorisnika);
					$smarty->assign("prijavljeniKorisnik",$prijavljeniKorisnik);
					$smarty->assign("greske", $greske);
					$smarty->display('returic_uredi.tpl');

				}
			
			} else {

				$errorMessage = date("Y-m-d H:i:s", vrijeme::preuzmiTrenutnoVrijeme());
				$errorMessage.= "; stranica: returic_uredi.php; korisnik: (" . $prijavljeniKorisnik->korisnicko_ime . ") -" . $prijavljeniKorisnik->ime . " " . $prijavljeniKorisnik->prezime . "-; uneseni id:" . $_GET['urediID'];
				$errorMessage.="\n";
				error_log($errorMessage, 3, "Errorlogs/errorlog_uredivanje.txt");
				$smarty->assign("ZabranjenPristup", "Pristup zabranjen!");
				$smarty->display("index.tpl");
			
			}
		}
	}


?>