<?php

	include_once('Framework/glavniPHP.php');
	
	$smarty->assign("naslov","Galerija");
	
	if(isset($_GET['galerijaNatjecaja']))
	{
		$prijavljeniKorisnik = $_SESSION['korisnik'];
		
		$galerija = new galerija();
		
		$natjecaj = natjecaj::preuzmiSveNatjecaje("id_natjecaj='". $_GET['galerijaNatjecaja'] ."'");
		$natjecaj = $natjecaj[0];
		$smarty->assign("natjecaj",$natjecaj);
		if(isset($_POST['nazivGalerije'])){
			
			$galerija = galerija::novaGalerija();
			$galerija->id_galerija = mysql_real_escape_string("0");
			$galerija->natjecaj = mysql_real_escape_string($_GET['galerijaNatjecaja']);
			$galerija->spremanjePodataka();
			
			$zadnjaGalerija = mysql_fetch_array(mysql_query('SELECT MAX(DISTINCT id_galerija)FROM galerija'));

						
			$noviDirektorij = "/var/www/WebDiP/2011_projekti/WebDiP2011_125/Natjecaji/". $_GET['galerijaNatjecaja'] ."/" . $zadnjaGalerija[0];

			if (!file_exists($noviDirektorij)) 
			{ 
				mkdir($noviDirektorij); 
				chmod($noviDirektorij, 0777);
			}
			
			$dnevnik = dnevnik::noviDnevnik();
			$dnevnik->dogadaj =  mysql_real_escape_string("Korisnik ".$prijavljeniKorisnik->korisnicko_ime." (ID = ".$prijavljeniKorisnik->id_korisnik.") je kreirao novu GALERIJU pod nazivom: ".$galerija->naziv."");
			$dnevnik->spremanjePodataka();
			
			$smarty->display("returic_galerija.tpl");
		}else	$smarty->display("returic_galerija.tpl");
	}


?>