<?php

	class bazaPodatakaKonfiguracija 
	{
		public function __construct() 
		{
		
			global $DBServer, $DBKorisnik, $DBLozinka, $DBIme;
			mysql_connect($DBServer, $DBKorisnik, $DBLozinka) or die(mysql_error());
			mysql_select_db($DBIme) or die(mysql_error());
			mysql_query("set names utf8");
			
		}
		
		public function upit($sql) 
		{
		
			global $debug;
			if ($debug) echo $sql;
			$rs = mysql_query($sql) or die (mysql_error());		
			return $rs;
			
		}
		
		public function zatvori() 
		{
		
			mysql_close();
			
		}	
	}

?>