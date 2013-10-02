<?php
	
	require_once ("glavniPHP.php");
	
	class dokument extends bazaPodatakaObjekt 
	{
		 
		public $id_dokument = 0;
		public $dokument = "";
		public $vrijeme_uploadanja = "";
		public $korisnik = "";
		
		
		public static function noviDokument()
		{
		
			$dokument = new dokument();
			
			$dokument->id_dokument =  mysql_real_escape_string($_POST['idd']);
			$dokument->vrijeme_uploadanja =  mysql_real_escape_string(date("Y-m-d H:i:s", vrijeme::preuzmiTrenutnoVrijeme()));
			$dokument->korisnik =  mysql_real_escape_string($_POST['idkoriskika']);
		
			return $dokument;
		}
		
		function provjeraDokumenta() 
		{
			
			if (!preg_match("/(pdf|doc|docx|odt|jpg|jpeg)$/i", $this->dokument))  
			{
				
				$greske['udokument'] = '<br>Dokument mora biti .pdf .doc .docx .odt ili .jpg formata';
			
			}

			return $greske;
		
		}
		
		public static function preuzmiSveDokumente($where = "", $limit = "") 
		{
		
			$dokument = new dokument();
			$sql = "SELECT * FROM dokument";
			
			if (!empty($where)) 
			{
			
				$sql .= " WHERE $where";

			}
			
			$sql .= $limit;
			$rs = $dokument->upit($sql);
			$dokumenti = array();
			
			if ($rs) 
			{
			
				while($red = mysql_fetch_assoc($rs)) 
				{
				
					$dokument = new dokument();
					foreach(get_object_vars($dokument) as $kvar => $kval) 
					{						
					
						$dokument->$kvar=$red[$kvar];						

					}
					
					$dokumenti[] = $dokument;
				}
				
			}
	
			return $dokumenti;
			
		}
		
	}
?>