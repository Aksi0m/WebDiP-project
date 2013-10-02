<?php
	
	include_once('Framework/glavniPHP.php');
	include ('ajaxCRUD/preheader.php');
	include ('ajaxCRUD/ajaxCRUD.class.php');
	
	$prijavljeniKorisnik = $_SESSION['korisnik'];
	if(isset($_SESSION['korisnik']) && $prijavljeniKorisnik->tip_korisnika == "3")
	{
	
		$smarty->assign("naslov","CRUD operacije");
		$smarty->display("zaglavlje.tpl");
	} else {
		$smarty->assign("ZabranjenPristup","Nemate prava pristupiti toj stranici");
		$smarty->display("index.tpl");
	}
	?>
	<div id="csadrzaj">	
	<?php
	
		$preporuka = new ajaxCRUD("preporuka", "preporuka", "id_preporuka"); //radi tablicu
		$preporuka->omitPrimaryKey(); //ne prikazuj primary key
		$preporuka->showTable(); // prikazi tablicu
		
		$dokument = new ajaxCRUD("dokument", "dokument", "id_dokument"); //radi tablicu
		$dokument->omitPrimaryKey(); //ne prikazuj primary key
		$dokument->showTable(); // prikazi tablicu
				
		$fakultet = new ajaxCRUD("fakultet", "fakultet", "id_fakultet"); //radi tablicu
		$fakultet->omitPrimaryKey(); //ne prikazuj primary key
		$fakultet->showTable(); // prikazi tablicu
		
		$galerija = new ajaxCRUD("galerija", "galerija", "id_galerija"); //radi tablicu
		$galerija->omitPrimaryKey(); //ne prikazuj primary key
		$galerija->showTable(); // prikazi tablicu
		
		$komentar = new ajaxCRUD("komentar", "komentar", "id_komentar"); //radi tablicu
		$komentar->omitPrimaryKey(); //ne prikazuj primary key
		$komentar->showTable(); // prikazi tablicu
			
		$natjecaj = new ajaxCRUD("natjecaj", "natjecaj", "id_natjecaj"); //radi tablicu
		$natjecaj->omitPrimaryKey(); //ne prikazuj primary key
		$natjecaj->showTable(); // prikazi tablicu
		
		$ocjena = new ajaxCRUD("ocjena", "ocjena", "id_ocjena"); //radi tablicu
		$ocjena->omitPrimaryKey(); //ne prikazuj primary key
		$ocjena->showTable(); // prikazi tablicu
		
		$portfelj_dokumenata = new ajaxCRUD("portfelj_dokumenata", "portfelj_dokumenata", "id_portfelj_dokumenata"); //radi tablicu
		$portfelj_dokumenata->omitPrimaryKey(); //ne prikazuj primary key
		$portfelj_dokumenata->showTable(); // prikazi tablicu
		
		$prijavnica = new ajaxCRUD("prijavnica", "prijavnica", "id_prijavnica"); //radi tablicu
		$prijavnica->omitPrimaryKey(); //ne prikazuj primary key
		$prijavnica->showTable(); // prikazi tablicu
	

	
?>
	<div style="height=200px;"> </div>
	</div>
<?php $smarty->display("podnozje.tpl"); ?>

