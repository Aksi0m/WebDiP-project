<?php

	require_once('recaptchalib.php');
	include_once('Framework/scale.php');
	include_once('Framework/glavniPHP.php');
	include_once('Framework/klasaKorisnik.php');
	$korisnik = new korisnik();
	$smarty->assign("naslov","Registracija");
	
	$resp = null;
	$error = null;
	
	if (isset($_POST['kime'])) {
		
		$korisnik = korisnik::noviPOST();
		
		scaleUpload();
		$korisnik->avatar = $_FILES['uslika']['name'];
		
		$greske = $korisnik->provjeraUnosa();
	
		if ($_POST["recaptcha_response_field"]) 
		{
		
				$resp = recaptcha_check_answer ($privatekey,
								$_SERVER["REMOTE_ADDR"],
								$_POST["recaptcha_challenge_field"],
								$_POST["recaptcha_response_field"]);
			
				if ($resp->is_valid) 
				{
					
				} else {
				
					# set the error code so that we can display it
					$error = $resp->error;
					$smarty->assign("recaptchag","<br>Unesite pravilno prikazane riječi");
					
					
				}
				
		} else {
		
				$smarty->assign("recaptchag","<br>Niste unijeli vrijednost za reCAPTCHA");
				
		}
		
		$smarty->assign("recaptcha", recaptcha_get_html($publickey, $error));
		$smarty->assign("greske", $greske);		
		
		if (empty($greske)) 
		{
								
			$korisnik->aktivacijski_kod = vrijeme::preuzmiTrenutnoVrijeme() + (24*60*60);
			$korisnik->fakultet = mysql_real_escape_string("null"); 
			$mail_to = $korisnik->email;
			$mail_from = "From: returic@foi.hr";
			$mail_subject = "Aktivacija korisnickog računa";
			$mail_body = "Kako bi aktivirali korisnički račun, kliknite na link za aktivaciju: " . $putanjaAplikacije . "returic_aktivacija.php?kime=" . $korisnik->korisnicko_ime . "&token=".$korisnik->aktivacijski_kod;
			mail($mail_to, $mail_subject, $mail_body, $mail_from);
			$korisnik->spremanjePodataka();
			$dnevnik = dnevnik::noviDnevnik();
			$dnevnik->dogadaj =  mysql_real_escape_string("REGISTRIRAO se novi korisnik (Ime i Prezime: ".$korisnik->ime." ".$korisnik->prezime." | Korisničko ime: ".$korisnik->korisnicko_ime.")");
			$dnevnik->spremanjePodataka();
			$smarty->assign("registracija","<h2>Uspješno ste se registrirali</h2>. <br>Link za aktivaciju korisničkog računa je poslan na vaš mail!");
			$smarty->display("index.tpl");
				
		} else {
		
			$smarty->display("returic_registracija.tpl");
		
		}
			
	} else {
		
		
		$smarty->assign("recaptcha", recaptcha_get_html($publickey, $error));
		$smarty->display("returic_registracija.tpl");
		
	}
?>