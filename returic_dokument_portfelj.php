<?php

	include_once('Framework/glavniPHP.php');
	
	$smarty->assign("naslov","Portfelj dokumenata");
	
	if(isset($_GET['portfelj']))
	{
		if(isset($_GET['portfelj']) && isset($_GET['dokument']))
		{
		
			$dokument = new dokument();
			
			$dokumentiPortfelji = mysql_fetch_array(mysql_query("SELECT * FROM dokument_portfelj WHERE portfelj_dokumenata='".$_GET['portfelj']."' AND dokument='".$_GET['dokument']."'"));
			
			if(isset($dokumentiPortfelji[0]))
			{
				mysql_query("DELETE FROM dokument_portfelj WHERE portfelj_dokumenata='".$_GET['portfelj']."' AND dokument='".$_GET['dokument']."'") or die (mysql_error());
			}else{
				mysql_query("INSERT INTO dokument_portfelj VALUES('".$_GET['dokument']."','".$_GET['portfelj']."')") or die (mysql_error());
			}
		}
		$smarty->display("returic_dokument_portfelj.tpl");
		
	} else {
		$smarty->assign("zabranjenPristup","Stranica ne sadrži nikakve podatke!");
		$smarty->display("index.tpl");
	}

?>