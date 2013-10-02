<?php

	include_once('Framework/glavniPHP.php');
	$smarty->display("returic_prijava.tpl");
	if (!isset($_SESSION['korisnik'])) {
		
		$smarty->assign("ZabranjenPristup", "Morate biti prijavljeni kako bi mogli komentirati");
		$smarty->display("returic_prijava.tpl");
		
	}else {
		if(isset($_POST['post'])) {
		$prijavljeniKorisnik = $_SESSION['korisnik'];
		$komentar = new komentar();
		$komentar = komentar::noviKomentar();		
		$komentar->korisnik =  mysql_real_escape_string($prijavljeniKorisnik->id_korisnik);
		$komentar->vrijeme_komentiranja = mysql_real_escape_string(date("Y-m-d H:i:s", vrijeme::preuzmiTrenutnoVrijeme()));
		if($_POST['komentar'] == "null") $komentar->komentar =  mysql_real_escape_string("null");
		$komentar->spremanjePodataka();

    /*$name = $_POST['post'];     
    ?>
    Your Name Is: <?php echo $name; ?><br />
    <?php
    die();
}*/
		}
	}
?>