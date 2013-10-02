<?php

	require_once ("glavniPHP.php");
	
	class ocjena extends bazaPodatakaObjekt 
	{
	
		public $id_ocjena = 0;
		public $ocjena = "";
		public $vrijeme_ocjenjivanja = "";
		public $korisnik = "";
		public $natjecaj = "";
		public $komentar = "";
		
		public static function novaOcjena()
		{
			
			$ocjena = new ocjena();
			
			$ocjena->id_ocjena =  mysql_real_escape_string(0);
			$ocjena->ocjena =  mysql_real_escape_string($_POST['post']);
			$ocjena->vrijeme_ocjenjivanja =  mysql_real_escape_string($_POST['korsinik']);
			$ocjena->korisnik =  mysql_real_escape_string($_POST['komentar']);
			$ocjena->natjecaj =  mysql_real_escape_string($_POST['natjecaj']);
			$ocjena->komentar =  mysql_real_escape_string($_POST['komentar']);
			
			return $ocjena;
		
		}
		
		public static function preuzmiSveOcjene($where = "", $limit = "") 
		{
		
			$ocjena = new ocjena();
			$sql = "SELECT * FROM ocjena";
			
			if (!empty($where)) 
			{
			
				$sql .= " WHERE $where";

			}
			
			$sql .= $limit;
			$rs = $ocjena->upit($sql);
			$ocjene = array();
			
			if ($rs) 
			{
			
				while($red = mysql_fetch_assoc($rs)) 
				{
				
					$ocjena = new ocjena();
					foreach(get_object_vars($ocjena) as $kvar => $kval) 
					{						
					
						$ocjena->$kvar=$red[$kvar];						

					}
					
					$ocjene[] = $ocjena;
				}
				
			}
	
			return $ocjene;
			
		}
		
	}
	
?>