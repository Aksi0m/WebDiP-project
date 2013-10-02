<html>
	<head>
		<meta http-equiv="Content-Type" 
			content="text/html; charset=utf-8"/>
	</head>
<?php
	mysql_connect("localhost","WebDiP2011_125","admin_1cfM") or die('Problem sa spajanjem na bazu');
	mysql_select_db("WebDiP2011_125") or die ('problem baza');
	mysql_query("set names utf8");
	$rs = mysql_query("select * from korisnik");
	
	while ($red = mysql_fetch_array($rs)) {
		echo $red['ime'] . ' ' . $red['prezime'] . ' ' . $red['status_korisnika'] . '<br/>';
	}			

?>