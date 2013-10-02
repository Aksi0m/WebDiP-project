<?php

function uzmiVrijeme(){

	mysql_connect("localhost","WebDiP2011_125","admin_1cfM") or die('Problem sa spajanjem na bazu');
	mysql_select_db("WebDiP2011_125") or die ('problem baza');
	mysql_query("set names utf8");
	$red = mysql_fetch_array(mysql_query("select pomak from vrijeme"));
    $pomak = $red['pomak'];
	$pomak = $pomak * 60 * 60 + time();
	
	return $pomak;
}

?>