<?php

	include_once('Framework/glavniPHP.php');
	
	$slika = new slika();
	
	$smarty->assign("naslov","Slike");

	if(isset($_SESSION['korisnik']))
	{
	
		$prijavljeniKorisnik = $_SESSION['korisnik'];
		
		if($prijavljeniKorisnik->tip_korisnika >= 2)
		{
			$slika = slika::novaSlika();
			
			$slika->slika = mysql_real_escape_string($_FILES['uslika']['name']);
			$greske = $slika->provjeraSlike();
			
			
			if(empty($greske))
			{
			
				$slika->id_slika = mysql_real_escape_string(0);
				
				$slika->vrijeme_uploadanja = mysql_real_escape_string(date("Y-m-d H:i:s", vrijeme::preuzmiTrenutnoVrijeme()));
				
				$galerija = galerija::preuzmiSveGalerije("id_galerija='".$_POST['idg']."'");
				$galerija = $galerija[0];
				move_uploaded_file($_FILES['uslika']['tmp_name'],"Natjecaji/" . $galerija->natjecaj . "/" . $_POST['idg'] . "/" . $_FILES['uslika']['name']);

				$slika->spremanjePodataka();
				
				$dnevnik = dnevnik::noviDnevnik();
				$dnevnik->dogadaj =  mysql_real_escape_string("Korisnik ".$prijavljeniKorisnik->korisnicko_ime." (ID = ".$prijavljeniKorisnik->id_korisnik.") je UPLOADO novu SLIKU: ".$slika->slika." (Galerija: ".$galerija->naziv.")");
				$dnevnik->spremanjePodataka();
			}
			
			header("Location: ".$putanjaAplikacije."returic_galerija.php?galerijaNatjecaja=".$galerija->natjecaj);
						
		} else {

			$smarty->assign("ZabranjenPristup","Nemate prava za tu radnju");
			$smarty->display("index.tpl");
		}
	} else {
		$smarty->assign("ZabranjenPristup","Morate biti prijavljeni kako bi pristupili toj stranici");
		$smarty->display("returic_prijava.tpl");
	}

?>