<?php


	include_once('Framework/glavniPHP.php');

	$smarty->assign("naslov","Prijave");

	if (!isset($_SESSION['korisnik'])) {
		
		$smarty->assign("ZabranjenPristup", "Morate biti prijavljeni za pristup traženoj stranici");
		$smarty->display("returic_prijava.tpl");
		
	}else {

		if (isset($_POST['email']))
		{	
			
			$mail_to = $_POST['email'];
			$mail_from = "From: returic@foi.hr";
			$mail_subject = "Prijava na natjecaj";
			$mail_body = "Obavještavamo vas da je vaša prijava na natječaj: (".$_POST['naziv'].") odobrena! Uskoro ćemo vam se javitti i dati daljnje upute. \n Čestitamo!";
			mail($mail_to, $mail_subject, $mail_body, $mail_from);
			
			$prijavnica = new prijavnica();
			
			$prijavnica->azuriranjePodataka("prijava_prihvacena='".$_POST['odobri']."' WHERE id_prijavnica='".$_POST['idp']."'");
			
		} else {
		
			$smarty->display("returic_prijave.tpl");
			
		}
		
		
	}


?>