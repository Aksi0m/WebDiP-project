<?php

	include_once('Framework/glavniPHP.php');
	include_once('Framework/klasaKorisnik.php');
	$korisnik = new korisnik();
	$smarty->assign("naslov","Prijava");

	if (isset ($_GET['Odjava']))
	{		
			$prijavljeniKorisnik = $_SESSION['korisnik'];
			$dnevnik = dnevnik::noviDnevnik();
			$dnevnik->dogadaj =  mysql_real_escape_string("Korisnik (".$prijavljeniKorisnik->korisnicko_ime.") se uspješno ODJAVIO");
			$dnevnik->spremanjePodataka();
			unset($_SESSION['korisnik']);
			session_destroy();
			header('Location:returic_prijava.php');
			
	}
	
	if(isset($_GET['k']))
	{
		
		if(isset($_POST['ok']))
		{
			$preporucivac = korisnik::preuzmiSve(" korisnicko_ime='". $_POST['kp'] . "' AND lozinka='". $_POST['lp'] ."' AND tip_korisnika='4'");
			if(!empty($preporucivac))
			{
				$getKorisnik = $_GET['k'];
				header('Location:returic_pismo_preporuke.php?upload='.$getKorisnik);
				
			} else {
			
				$smarty->assign("greska","Unjeli ste krive podatke");
				$smarty->display("returic_pismo_preporuke.tpl");
				
			}
		
		} else {
		
			$smarty->display("returic_pismo_preporuke.tpl");
	
		}
	} else {

		if(!isset($_POST["kimep"]))
		{

				$CookieKorisnik="";
				if (isset($_COOKIE['CookieKorisnik'])) 	$CookieKorisnik = $_COOKIE['CookieKorisnik'];
				$smarty->assign("CookieKorisnik", $CookieKorisnik);
				$smarty->display("returic_prijava.tpl");
			
		} else {
			
			$KorisnickoIme = $_POST["kimep"];
			$Lozinka = $_POST["lozinkap"];
			
			if(!(empty($KorisnickoIme) && empty($Lozinka)))
			{

					$aktivanKorisnik = korisnik::preuzmiSve(" korisnicko_ime='$KorisnickoIme' AND lozinka='$Lozinka' AND status_korisnika=2");
									
					if(!empty($aktivanKorisnik))
					{

						$_SESSION['korisnik'] = $aktivanKorisnik[0];
						
						if (isset($_POST['Zapamtip']))
						{

							setcookie("CookieKorisnik", $KorisnickoIme, time()+60*60*24*90);
						
						} else {

							setcookie ("CookieKorisnik", "", time() - 3600);

						}

						$korisnik->azuriranjePodataka("neuspjele_prijave='0' WHERE korisnicko_ime='$KorisnickoIme'");
						$dnevnik = dnevnik::noviDnevnik();
						$dnevnik->dogadaj =  mysql_real_escape_string("Korisnik (".$KorisnickoIme.") se uspješno PRIJAVIO");
						$dnevnik->spremanjePodataka();
						header('Location:returic_korisnici.php');
						
					} else {
						
						
						
						$provjera = korisnik::preuzmiSve(" korisnicko_ime='$KorisnickoIme' AND status_korisnika=2");
						$provjera = $provjera[0];
						$brojac = $provjera->neuspjele_prijave+1;
						if ($brojac < 3 && !empty($provjera))
						{
						
							$korisnik->azuriranjePodataka("neuspjele_prijave='$brojac' WHERE korisnicko_ime='$KorisnickoIme'");
							$smarty->assign("aktivan","Pogrešna lozinka ili korisničko ime!");
							
						
						} else {
						
							$korisnik->azuriranjePodataka("status_korisnika='4' WHERE korisnicko_ime='$KorisnickoIme'");
							$dnevnik = dnevnik::noviDnevnik();
							$dnevnik->dogadaj =  mysql_real_escape_string("Korisniku (".$KorisnickoIme.") je ZAKLJUČAN KORISNIČKI RAČUN zbog tri neuspješne prijave!");
							$dnevnik->spremanjePodataka();
							$smarty->assign("aktivan","Korisnički račun ( $KorisnickoIme ) je zaključan! Kontaktirajte administratora sutava za pomoć");
							
						
						}
						
						$smarty->display("returic_prijava.tpl");
						
					}
				
			} else {
			
				$smarty->assign("logiranje","Niste unjeli podatke");
				$smarty->display("returic_prijava.tpl");
			
			}
			
		}
	}

?>