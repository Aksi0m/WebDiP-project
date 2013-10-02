<?php
	
	require_once ("glavniPHP.php");
	
	class dnevnik extends bazaPodatakaObjekt 
	{
	
		public $id_dnevnik = 0;
		public $dogadaj = "";
		public $vrijeme = "";

		public static function noviDnevnik()
		{
		
			$dnevnik = new dnevnik();
			
			$dnevnik->id_dnevnik = mysql_real_escape_string(0);
			$dnevnik->vrijeme = mysql_real_escape_string(date("Y-m-d", vrijeme::preuzmiTrenutnoVrijeme()));

			return $dnevnik;
		}
		
		public static function preuzmiPodatkeIzDnevnika($where = "", $limit = "")
		{
		
			$dnevnik = new dnevnik();
			
			$sql = "SELECT * FROM dnevnik";
			
			if (!empty($where)) 
			{
			
				$sql .= " WHERE $where";

			}
			
			$sql .= $limit;
			$rs = $dnevnik->upit($sql);
			$dnevnici = array();
			
			if ($rs) 
			{
			
				while($red = mysql_fetch_assoc($rs))  
				{
				
					$dnevnik = new dnevnik();
					foreach(get_object_vars($dnevnik) as $kvar => $kval) 
					{						
					
						$dnevnik->$kvar=$red[$kvar];						

					}
					
					$dnevnici[] = $dnevnik;
				}
				
			}
	
			return $dnevnici;
		
		}
		
	}

?>
