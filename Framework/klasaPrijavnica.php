<?php

	require_once ("glavniPHP.php");
	
	class prijavnica extends bazaPodatakaObjekt 
	{
	
		public $id_prijavnica = 0;
		public $prijava_prihvacena = "";
		public $vrijeme_prijave = "";
		public $natjecaj = "";
		public $portfelj_dokumenata = "";
	
		
		public static function novaPrijavnica() 
		{
		
			$prijavnica = new prijavnica();
			
			$prijavnica->id_prijavnica =  mysql_real_escape_string(0);
			$prijavnica->prijava_prihvacena =  mysql_real_escape_string("0");
			$prijavnica->portfelj_dokumenata =  mysql_real_escape_string($_POST['idPortfelja']);
			
			return $prijavnica;		
		}
		
		function provjeraPrijavnice() 
		{
						
			if (empty($this->portfelj_dokumenata))
			{
			
				$greske['portfelj'] = 'Izaberite jedan poortfelj dokumenata';
			
			}
			
			
			return $greske;
		
		}
		
		public static function preuzmiSvePrijavnice($where = "", $limit = "") 
		{
		
			$prijavnica = new prijavnica();
			$sql = "SELECT * FROM prijavnica";
			
			if (!empty($where)) 
			{
			
				$sql .= " WHERE $where";

			}
			
			$sql .= $limit;
			$rs = $prijavnica->upit($sql);
			$prijavnice = array();
			
			if ($rs) 
			{
			
				while($red = mysql_fetch_assoc($rs)) 
				{
				
					$prijavnica = new prijavnica();
					foreach(get_object_vars($prijavnica) as $kvar => $kval) 
					{						
					
						$prijavnica->$kvar=$red[$kvar];						

					}
					
					$prijavnice[] = $prijavnica;
				}
				
			}
	
			return $prijavnice;
			
		}
		
	}
?>