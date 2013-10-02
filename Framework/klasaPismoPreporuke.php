<?php

	require_once ("glavniPHP.php");
	
	class preporuka extends bazaPodatakaObjekt 
	{
	
		public $id_preporuka = 0;
		public $pismo_preporuke = "";
		public $suglasnost = "";
		public $vrijeme_uploadanja = "";
		public $prijavnica = "";
		public $korisnik = "";
	
		
		public static function novaPreporuka() 
		{
		
			$preporuka = new preporuka();
			
			$preporuka->id_preporuka =  mysql_real_escape_string(0);
			$preporuka->korisnik =  mysql_real_escape_string($_GET['upload']);
			
			return $preporuka;		
		}
		
		function provjeraPreporuke() 
		{
						
			if (!preg_match("/(pdf|doc|docx|odt)$/i", $this->pismo_preporuke))  
			{
				
				$greske['upismo'] = '<br>Dokument mora biti .pdf .doc .docx ili .odt formata';
			
			}

			return $greske;
		
		}
		
		public static function preuzmiSvePreporuke($where = "", $limit = "") 
		{
		
			$preporuka = new preporuka();
			$sql = "SELECT * FROM preporuka";
			
			if (!empty($where)) 
			{
			
				$sql .= " WHERE $where";

			}
			
			$sql .= $limit;
			$rs = $preporuka->upit($sql);
			$preporuke = array();
			
			if ($rs) 
			{
			
				while($red = mysql_fetch_assoc($rs)) 
				{
				
					$preporuka = new preporuka();
					foreach(get_object_vars($preporuka) as $kvar => $kval) 
					{						
					
						$preporuka->$kvar=$red[$kvar];						

					}
					
					$preporuke[] = $preporuka;
				}
				
			}
	
			return $preporuke;
			
		}
		
	}
?>