<?php

	include_once('Framework/glavniPHP.php');
	
	class slika extends bazaPodatakaObjekt 
	{
		 
		public $id_slika = 0;
		public $slika = "";
		public $vrijeme_uploadanja = "";
		public $galerija = "";

		
		
		public static function novaSlika()
		{
		
			$slika = new slika();
			
			$slika->id_slika =  mysql_real_escape_string($_POST['ids']);
			$slika->slika =  mysql_real_escape_string($_POST['slika']);
			$slika->vrijeme_uploadanja =  mysql_real_escape_string($_POST['vrijeme_uploadanja']);
			$slika->galerija =  mysql_real_escape_string($_POST['idg']);
			
			return $slika;
		}
		
		function provjeraSlike()
		{
			
			if (!preg_match("/(png||jpg|jpeg)$/i", $this->slika))  
			{
				
				$greske['uslika'] = '<br>Dokument mora biti .png  ili .jpg formata';
			
			}

			return $greske;
		
		}
		
		public static function preuzmiSveSlike($where = "", $limit = "") 
		{
		
			$slika = new slika();
			$sql = "SELECT * FROM slika";
			
			if (!empty($where)) 
			{
			
				$sql .= " WHERE $where";

			}
			
			$sql .= $limit;
			$rs = $slika->upit($sql);
			$slike = array();
			
			if ($rs) 
			{
			
				while($red = mysql_fetch_assoc($rs)) 
				{
				
					$slika = new slika();
					foreach(get_object_vars($slika) as $kvar => $kval) 
					{						
					
						$slika->$kvar=$red[$kvar];						

					}
					
					$slike[] = $slika;
				}
				
			}
	
			return $slike;
			
		}
		
	}

?>