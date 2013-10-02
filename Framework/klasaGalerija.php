<?php

	include_once('Framework/glavniPHP.php');
	
	class galerija extends bazaPodatakaObjekt 
	{
		 
		public $id_galerija = 0;
		public $naziv = "";
		public $natjecaj = "";

		
		
		public static function novaGalerija()
		{
		
			$galerija = new galerija();
			
			$galerija->id_galerija =  mysql_real_escape_string($_POST['idg']);
			$galerija->naziv =  mysql_real_escape_string($_POST['nazivGalerije']);
			$galerija->natjecaj =  mysql_real_escape_string($_POST['natjecaj']);
		
			return $galerija;
		}
		
		public static function preuzmiSveGalerije($where = "", $limit = "") 
		{
		
			$galerija = new galerija();
			$sql = "SELECT * FROM galerija";
			
			if (!empty($where)) 
			{
			
				$sql .= " WHERE $where";

			}
			
			$sql .= $limit;
			$rs = $galerija->upit($sql);
			$galerije = array();
			
			if ($rs) 
			{
			
				while($red = mysql_fetch_assoc($rs)) 
				{
				
					$galerija = new galerija();
					foreach(get_object_vars($galerija) as $kvar => $kval) 
					{						
					
						$galerija->$kvar=$red[$kvar];						

					}
					
					$galerije[] = $galerija;
				}
				
			}
	
			return $galerije;
			
		}
		
	}

?>