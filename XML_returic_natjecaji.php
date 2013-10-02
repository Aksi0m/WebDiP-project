<?php
	
	include_once('Framework/scale.php');
	include_once('Framework/glavniPHP.php');
	include_once('Framework/klasaNatjecaji.php');
	$natjecaji = new natjecaj();
	
	$smarty->assign("naslov","Natječaji");
	$stranica = 0;

	if(isset($_GET['stranica']))
	{ 
		$stranica = mysql_real_escape_string($_GET['stranica']);
		$stranica = $stranica - 1; 
	}	
	
	$ukupno = sizeof(natjecaj::preuzmiSveNatjecaje("odobren='1' AND rok_prijave > ".vrijeme::preuzmiTrenutnoVrijeme()."")); 
	$offset = $stranica * 5;
	$stranice = ceil($ukupno / 5) + 1;
	$natjecaji = natjecaj::preuzmiSveNatjecaje("odobren='1' AND rok_prijave > ".vrijeme::preuzmiTrenutnoVrijeme()."", " LIMIT 5 OFFSET $offset");
	$komentari = komentar::preuzmiSveKomentare();
	
	if ($stranice > 5) 
	{
	
		$pocetakStranice = max($stranica - 2, 1);
		$krajStranice = min($stranice, $stranica + 5);		
			
	} else {
	
		$pocetakStranice = 1;
		$krajStranice = $stranice;
			
	}
	
	$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
	$xml .= '<aktivniNatjecaji>';
	$prijavljeniKorisnik = $_SESSION['korisnik'];
	if( sizeof($natjecaji) >= 1 )
	{
		
		
		foreach($natjecaji as $natjecaj)
		{
			
			$xml .= '<natjecaji>';
			
			$prosjekNatjecaj = mysql_fetch_array(mysql_query("SELECT AVG(ocjena) FROM ocjena WHERE natjecaj='". $natjecaj->id_natjecaj ."'"));
			$ocjenaNatjecaja = ocjena::preuzmiSveOcjene("natjecaj='". $natjecaj->id_natjecaj ."' AND korisnik='". $prijavljeniKorisnik->id_korisnik ."'");
			$ocjenaNatjecaja = $ocjenaNatjecaja[0];
						
			$xml .= '<natjecaj korisnikOcjenaNatjecaj="' . $ocjenaNatjecaja->ocjena . '" id="' . $natjecaj->id_natjecaj . '" naziv="'. $natjecaj->naziv .'" broj_mjesta="'. $natjecaj->broj_mjesta .'" rok_prijave="'. date("Y-m-d H:i:s",$natjecaj->rok_prijave) .'" troskovi="'. $natjecaj->troskovi .'" cijena_prijave="'. $natjecaj->cijena_prijave .'" opis="'. $natjecaj->opis .'" fakultet="'. $natjecaj->fakultet .'" prosjekNatjecaj="' . $prosjekNatjecaj[0] . '">  </natjecaj> '."\n";
						

			$xml .= '<komentari>';
			
			foreach($komentari as $komentar)
			{
					
					
				if($komentar->natjecaj == $natjecaj->id_natjecaj)
				{
					$prosjekKomentar = mysql_fetch_array(mysql_query("SELECT AVG(ocjena) FROM ocjena WHERE komentar='". $komentar->id_komentar ."'"));
					$ocjeneKomentara = ocjena::preuzmiSveOcjene("komentar='". $komentar->id_komentar ."' AND korisnik='". $prijavljeniKorisnik->id_korisnik ."'");
					$ocjeneKomentara = $ocjeneKomentara[0];
					$korisnik = korisnik::preuzmiSve(" id_korisnik='" . $komentar->korisnik . "'");
					$korisnik = $korisnik[0];
					if($prosjekKomentar[0] == "") $prosjekKomentar[0] = "0";
					$xml .= '<komentar prosjekKomentar="' . $prosjekKomentar[0] .'" korisnikOcjena="'. $ocjeneKomentara->ocjena .'" autor="' . $korisnik->korisnicko_ime . '" id="' . $komentar->id_komentar . '" vrijeme_komentiranja="' . $komentar->vrijeme_komentiranja . '" tekst="' . $komentar->tekst . '" korisnik="' . $komentar->korisnik . '" komentar="' . $komentar->komentar . '" natjecaj="' . $komentar->natjecaj . '" > </komentar> '."\n";
				
				}
				
			}
			
			$xml .= '</komentari>';
			
			$xml .= '</natjecaji>';
			
		}
	
	}
	$xml .= '<stranice pocetakStranice="' . $pocetakStranice . '" krajStranice="' . $krajStranice . '" stranice="' . $stranice . '" > </stranice>' . "\n";
	$xml .= '</aktivniNatjecaji>';
	header("Content-Type: text/xml");
	print $xml;
	
?>