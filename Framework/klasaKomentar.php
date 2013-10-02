<?php

	require_once ("glavniPHP.php");
	
	class komentar extends bazaPodatakaObjekt 
	{
	
		public $id_komentar = 0;
		public $vrijeme_komentiranja = "";
		public $tekst = "";
		public $korisnik = "";
		public $komentar = "";
		public $natjecaj = "";
		
		public static function noviKomentar()
		{
			
			$komentar = new komentar();
			
			$komentar->id_komentar =  mysql_real_escape_string(0);
			$komentar->vrijeme_komentiranja =  mysql_real_escape_string(date("Y-m-d H:i:s", vrijeme::preuzmiTrenutnoVrijeme()));
			$komentar->tekst =  mysql_real_escape_string($_POST['post']);
			$komentar->korisnik =  mysql_real_escape_string($_POST['korsinik']);
			$komentar->komentar =  mysql_real_escape_string($_POST['komentar']);
			$komentar->natjecaj =  mysql_real_escape_string($_POST['natjecaj']);

			
			return $komentar;
		
		}
		
		
		function provjeraKomentara() 
		{
			
			if (empty($_POST['post'])) {
				
				$greske['komentar'] = "Unesite neki tekst";
				
			}
			
			return $greske;
			
		}
		
		public static function preuzmiSveKomentare($where = "", $limit = "") 
		{
		
			$komentar = new komentar();
			$sql = "SELECT * FROM komentar";
			
			if (!empty($where)) 
			{
			
				$sql .= " WHERE $where";

			}
			
			$sql .= $limit;
			$rs = $komentar->upit($sql);
			$komentari = array();
			
			if ($rs) 
			{
			
				while($red = mysql_fetch_assoc($rs)) 
				{
				
					$komentar = new komentar();
					foreach(get_object_vars($komentar) as $kvar => $kval) 
					{						
					
						$komentar->$kvar=$red[$kvar];						

					}
					
					$komentari[] = $komentar;
				}
				
			}
	
			return $komentari;
			
		}
		
	}

?>