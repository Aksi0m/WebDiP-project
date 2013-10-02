<?php
	
	require_once ("glavniPHP.php");
	
	class natjecaj extends bazaPodatakaObjekt 
	{
	
		public $id_natjecaj = 0;
		public $naziv = "";
		public $opis = "";
		public $broj_mjesta = "";
		public $troskovi = "";
		public $cijena_prijave = "";
		public $rok_prijave = "";
		public $odobren = "";
		public $korisnik = "";
		public $fakultet = "";
		
		public static function noviNatjecaj()
		{
		
			$natjecaj = new natjecaj();
			
			$natjecaj->id_natjecaj = mysql_real_escape_string($_POST['id_natjecaj']);
			$natjecaj->naziv = mysql_real_escape_string($_POST['naziv']);
			$natjecaj->opis = mysql_real_escape_string($_POST['opis']);
			$natjecaj->broj_mjesta = mysql_real_escape_string($_POST['broj_mjesta']);
			$natjecaj->troskovi = mysql_real_escape_string($_POST['troskovi']);
			$natjecaj->cijena_prijave = mysql_real_escape_string($_POST['cijena']);
			$natjecaj->rok_prijave = mysql_real_escape_string($_POST['rok']);
		
			return $natjecaj;
		}
		
		function provjeraNatjecaja()
		{
		
			if(empty($this->naziv))
			{
			
				$greske['naziv'] = 'Unesite naziv natječaja';
			
			}
			
			if(empty($this->broj_mjesta) || $this->broj_mjesta < 1)
			{
			
				$greske['broj_mjesta'] = 'Broj slobodnih mjesta mora biti veći od 0';
			
			}
			
			if(!strlen(trim($this->opis)))
			{
				$greske['opis'] = 'Unesite neki opis';
			}
			
			if(empty($this->troskovi) || $this->troskovi < 0)
			{
			
				$greske['troskovi'] = 'Unesite troskove prijave';
			
			} else if($this->troskovi < 0) {$greske['cijena'] = 'Troškovi ne mogu biti negativni';}
			
			if(empty($this->cijena_prijave))
			{
			
				$greske['cijena'] = 'Unesite cijenu prijave';
			
			} else if($this->cijena_prijave < 0) {$greske['cijena'] = 'Cijena ne smije biti negativna';}
			
			
			if(empty($this->rok_prijave) || (strtotime($this->rok_prijave) < vrijeme::preuzmiTrenutnoVrijeme()))
			{
			
				$greske['rok'] = 'Rok prijave nije valjan';
			
			}
			
			return $greske;
			
		}
		
		public static function preuzmiSveNatjecaje($where = "", $limit = "")
		{
		
			$natjecaj = new natjecaj();
			
			$sql = "SELECT * FROM natjecaj";
			
			if (!empty($where)) 
			{
			
				$sql .= " WHERE $where";

			}
			
			$sql .= $limit;
			$rs = $natjecaj->upit($sql);
			$natjecaji = array();
			
			if ($rs) 
			{
			
				while($red = mysql_fetch_assoc($rs)) 
				{
				
					$natjecaj = new natjecaj();
					foreach(get_object_vars($natjecaj) as $kvar => $kval) 
					{						
					
						$natjecaj->$kvar=$red[$kvar];						

					}
					
					$natjecaji[] = $natjecaj;
				}
				
			}
	
			return $natjecaji;
		
		}
		
	}

?>