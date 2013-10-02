<?php

	require_once ("Framework/glavniPHP.php");
	
	$smarty->assign("naslov","Prijavnica");
	
	if(isset($_SESSION['korisnik']))
	{
		$prijavljeniKorisnik = $_SESSION['korisnik'];
		if(isset($_POST['mail']))
		{
			$password = "";
			$possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ!#$%&=?*";
			$maxlength = strlen($possible);
			
			$i = 0; 

			while ($i < 6) { 

			  $char = substr($possible, mt_rand(0, $maxlength-1), 1);
				
			  if (!strstr($password, $char)) { 
				$password .= $char;
				$i++;
			  }
			}
			
			$imeKorisnika = "";
			$moguce = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
			$max = strlen($moguce);
			
			$j = 0;
			
			while($j < 4){
				$znak = substr($moguce, mt_rand(0, $max-1), 1);
				
				if (!strstr($imeKorisnika, $znak)) { 
					$imeKorisnika .= $znak;
					$j++;
				}
			}
			
			$korisnik = new korisnik();
			$korisnik->id_korisnik =  mysql_real_escape_string(0);
			$korisnik->ime =  mysql_real_escape_string("null");
			$korisnik->prezime =  mysql_real_escape_string("null");
			$korisnik->datum_rodenja = mysql_real_escape_string("null");
			$korisnik->korisnicko_ime = mysql_real_escape_string($imeKorisnika);
			$korisnik->email = mysql_real_escape_string($_POST['mail']);
			$korisnik->lozinka = mysql_real_escape_string($password);		
			$korisnik->tip_korisnika = mysql_real_escape_string("4");	
			$korisnik->status_korisnika = mysql_real_escape_string("1");		
			$korisnik->blokiran_do = mysql_real_escape_string("0000-00-00 00:00:00");
			$korisnik->fakultet = mysql_real_escape_string("null");
			$korisnik->spremanjePodataka();
			$mail_to = $_POST['mail'];
			$mail_from = "From: returic@foi.hr";
			$mail_subject = "Molba za pismo preporuke";
			$mail_body = "Korisnik našeg sustava (".$prijavljeniKorisnik->ime. " " .$prijavljeniKorisnik->prezime.") vas moli da uz njegovu prijavu priložite vaše pismo preporuke. Kako bi proložili pismo preporuke kliknite na sljedeći link: " . $putanjaAplikacije . "returic_prijava.php?k=" . $prijavljeniKorisnik->id_korisnik . " Vaši podaci za spajanje na podsustav za upload dokumenata su: \n \n Korisničko ime: ". $imeKorisnika ." \n Lozinka: ". $password ." \n \n Hvala unaprijed na vašem uloženom trudu i vremenu!";
			mail($mail_to, $mail_subject, $mail_body, $mail_from);
		
		}else{
		
			if(isset($_POST['ok']))
			{

				$prijavnica = new prijavnica();
				$prijavnica = prijavnica::novaPrijavnica();
				
				$greske = $prijavnica->provjeraPrijavnice();
				
				if(empty($greske))
				{
					$prijavnica->vrijeme_prijave = mysql_real_escape_string(date("Y-m-d H:i:s", vrijeme::preuzmiTrenutnoVrijeme()));
					$prijavnica->natjecaj = mysql_real_escape_string($_GET['prijavaNatjecaj']);
					
					$prijavnica->spremanjePodataka();
					$dnevnik = dnevnik::noviDnevnik();
					$dnevnik->dogadaj =  mysql_real_escape_string("Korisnik ". $prijavljeniKorisnik->korisnicko_ime ." (ID = ".$prijavljeniKorisnik->id_korisnik .") je kreirao novu PRIJAVNICU za natječaj (ID Natječaja = ".$prijavnica->natjecaj .")");
					$dnevnik->spremanjePodataka();
				}
			
			}
			$smarty->display("returic_prijavnica.tpl");
		}
	
		
		
	}else {
		$smarty->assign("logiranje","Morate biti prijavljeni kako bi se prijavili na natjecaj");
		$smarty->display("returic_prijava.tpl");
	}
?>