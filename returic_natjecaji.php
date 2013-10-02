<?php

	include_once('Framework/scale.php');
	include_once('Framework/glavniPHP.php');
	include_once('Framework/klasaNatjecaji.php');
	
	$smarty->assign("naslov","Natječaji");
	
	$komentar = new komentar();
	$pomoc = mysql_fetch_array(mysql_query('SELECT MAX(DISTINCT id_komentar)FROM komentar'));
	$_SESSION['pomoc'] = $pomoc[0]+1;
	
	$smarty->display("returic_natjecaji.tpl");
	
?>