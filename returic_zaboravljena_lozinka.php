<?php
	include_once('Framework/glavniPHP.php');
	
	if(isset($_POST['korisnickoIme']))
	{
		
		$korisnik = new korisnik();
		$korisnik = korisnik::preuzmiSve("korisnicko_ime='".$_POST['korisnickoIme']."'");
		if(sizeof($korisnik) == 0){
		
			$smarty->assign("logiranje","Zahtjev za novom lozinkom nije uspio jer unešeno korisničko ime ne postoji!");
			$smarty->display("returic_prijava.tpl");
		
		} else {
		
			
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
			$korisnik = $korisnik[0];
			$korisnik->azuriranjePodataka("lozinka='".$password."' WHERE id_korisnik='".$korisnik->id_korisnik."'");
			
			$dnevnik = dnevnik::noviDnevnik();
			$dnevnik->dogadaj =  mysql_real_escape_string("Korisnik ".$korisnik->korisnicko_ime." (ID = ".$korisnik->id_korisnik.") je zatražio NOVU LOZINKU");
			$dnevnik->spremanjePodataka();
			
			$mail_to = $korisnik->email;
			$mail_from = "From: returic@foi.hr";
			$mail_subject = "Promjena lozinke";
			$mail_body = "Zahtjevom nove lozinke, generirali smo za vas novu lozinku, koju kasnije možete promjeniti u postavkama korisničkog računa. Vaša nova lozinka je: \n Nova lozinka: ". $password;
			mail($mail_to, $mail_subject, $mail_body, $mail_from);
			

		}		
		
		
	} else {
		
		$smarty->assign("logiranje","Niste Unjeli korisničko ime kod zahtjeva za novom lozinkom.");
		$smarty->display("returic_prijava.tpl");
	
	}

?>