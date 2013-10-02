<?php
	
	require_once ("glavniPHP.php");
	
	class portfelj_dokumenata extends bazaPodatakaObjekt 
	{
		 
		public $id_portfelj_dokumenata = 0;
		public $naziv = "";
		public $datum_kreiranja = "";
		public $korisnik = "";
		
		
		public static function noviPortfeljDokumenata()
		{
		
			$portfelj_dokumenata = new portfelj_dokumenata();
			
			$portfelj_dokumenata->id_portfelj_dokumenata =  mysql_real_escape_string(0);
			$portfelj_dokumenata->naziv =  mysql_real_escape_string($_POST['naziv']);
			$portfelj_dokumenata->korisnik =  mysql_real_escape_string($_POST['idkoriskika']);
			
			return $portfelj_dokumenata;
		}
		
		public static function preuzmiSvePortfelje($where = "", $limit = "") 
		{
		
			$portfelj_dokumenata = new portfelj_dokumenata();
			$sql = "SELECT * FROM portfelj_dokumenata";
			
			if (!empty($where)) 
			{
			
				$sql .= " WHERE $where";

			}
			
			$sql .= $limit;
			$rs = $portfelj_dokumenata->upit($sql);
			$portfelji = array();
			
			if ($rs) 
			{
			
				while($red = mysql_fetch_assoc($rs)) 
				{
				
					$portfelj_dokumenata = new portfelj_dokumenata();
					foreach(get_object_vars($portfelj_dokumenata) as $kvar => $kval) 
					{						
					
						$portfelj_dokumenata->$kvar=$red[$kvar];						

					}
					
					$portfelji[] = $portfelj_dokumenata;
				}
				
			}
	
			return $portfelji;
			
		}
		
	}
?>