<?php

	require_once ("Framework/glavniPHP.php");
	
	$smarty->assign("naslov","Pismo Preporuke");
	
	$preporuka = new preporuka();
	
	if(isset($_GET['upload']))
	{
		
		$prijavljeniKorisnik = korisnik::preuzmiSve("id_korisnik='".$_GET['upload']."'");
		$prijavljeniKorisnik = $prijavljeniKorisnik[0];
		
		$noviDirektorij = "/var/www/WebDiP/2011_projekti/WebDiP2011_125/Dokumenti/".$prijavljeniKorisnik->korisnicko_ime."/Preporuke";
			
		if (!file_exists($noviDirektorij)) 
		{ 
			mkdir($noviDirektorij); 
			chmod($noviDirektorij, 0777);
		}
		
		
		if(isset($_POST['ok'])){

			$preporuka = preporuka::novaPreporuka();
			$preporuka->pismo_preporuke = mysql_real_escape_string($_FILES['upismo']['name']);
			
			if(!empty($_FILES['upismo']['name']))
			{
				$preporuka->vrijeme_uploadanja =  mysql_real_escape_string(date("Y-m-d H:i:s", vrijeme::preuzmiTrenutnoVrijeme()));
				$preporuka->prijavnica =  mysql_real_escape_string("1");
				$preporuka->suglasnost = mysql_real_escape_string("1");
				move_uploaded_file($_FILES["upismo"]["tmp_name"],"Dokumenti/" . $prijavljeniKorisnik->korisnicko_ime . "/Preporuke/" . $_FILES["upismo"]["name"]);
				$preporuka->spremanjePodataka();

			} 

			$smarty->display("returic_pismo_preporuke.tpl");
		} else {

			$smarty->display("returic_pismo_preporuke.tpl");
		}
		
	} else $smarty->display("returic_pismo_preporuke.tpl");
	

	
?>