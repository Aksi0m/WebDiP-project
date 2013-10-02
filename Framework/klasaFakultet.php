<?php
	
	require_once ("glavniPHP.php");
	
	class fakultet extends bazaPodatakaObjekt 
	{
	
		public $id_fakultet = 0;
		public $naziv = "";
		public $adresa = "";

		
		public static function noviFakultet()
		{
		
			$fakultet = new fakultet();
			
			$fakultet->id_fakultet = mysql_real_escape_string($_POST['idf']);
			$fakultet->naziv = mysql_real_escape_string($_POST['naziv']);
			$fakultet->adresa = mysql_real_escape_string($_POST['adresa']);
		
			return $fakultet;
		}
		
		function provjeraFakulteta()
		{
			//$greske = parent::provjeraFakulteta();
			
			if(empty($this->naziv))
			{
			
				$greske['naziv'] = 'Unesite naziv fakulteta';
			
			}
			
			if(empty($this->adresa))
			{
			
				$greske['adresa'] = 'Unesite adresu fakulteta';
			
			}
			
			return $greske;
			
		}
		
		public static function preuzmiSveFakultete($where = "", $limit = "")
		{
		
			$fakultet = new fakultet();
			
			$sql = "SELECT * FROM fakultet";
			
			if (!empty($where)) 
			{
			
				$sql .= " WHERE $where";

			}
			
			$sql .= $limit;
			$rs = $fakultet->upit($sql);
			$fakulteti = array();
			
			if ($rs) 
			{
			
				while($red = mysql_fetch_assoc($rs))  
				{
				
					$fakultet = new fakultet();
					foreach(get_object_vars($fakultet) as $kvar => $kval) 
					{						
					
						$fakultet->$kvar=$red[$kvar];						

					}
					
					$fakulteti[] = $fakultet;
				}
				
			}
	
			return $fakulteti;
		
		}
		
	}

?>
