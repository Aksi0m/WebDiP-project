<?php

	class bazaPodatakaObjekt extends bazaPodatakaKonfiguracija
	{

		function provjeraUnosa()
		{//provjerava da li su sva polja forme ispunjena

			$greske= array();
			
			foreach ($_POST as $k => $vr)
			{
				if(empty($vr)) 
				{
					
					$greske[$k] = "Unesite vrijednost";
					
				}
			}
			
			return $greske;
			
		}//validacija polja

		function spremanjePodataka()
		{
			
			$klasa = strtolower(get_class($this)); //preuzmi ime klase
			$idPolje="id_". $klasa;
			
			$kljucevi = "";
			$vrijednosti = "";
			
			foreach(get_object_vars($this) as $k => $vr)
			{
			
				if($k == $idPolje) continue; // idPolje se zapisuje inkrementalno(skip)
				$kljucevi .= $k . ',';
				if($vr == 'null') $vrijednosti .= "" . $vr .",";
				else $vrijednosti .= "'" . $vr . "',";		
				
			}
			
			$kljucevi= substr($kljucevi, 0, -1 );
			$vrijednosti= substr($vrijednosti, 0, -1 );
			$upit= "INSERT INTO $klasa ($kljucevi) VALUES ($vrijednosti)";
			$this->upit($upit);//izvrsi upit

		}
		
		function azuriranjePodataka($set = "")
		{
		
				$klasa = strtolower(get_class($this)); //preuzmi ime klase
				$upit="UPDATE $klasa SET ";
				
				if (!empty($set)) 
				{
			
					$upit .= "$set";

				} else {
						
					$idPolje="id_". $klasa;
				
					$kljucevi = "";
					$vrijednosti = "";
					
					foreach(get_object_vars($this) as $k => $vr)
					{
					
						if($k == $idPolje) continue;
						$upit .= $k . "=";
						if($vr == 'null' || $vr === NULL) $upit .= "" . $vr .",";
						else $upit .= "'" . $vr . "',";	
					
					}//for
					
					$upit = substr($upit, 0, -1);
					$upit .= " WHERE $idPolje='".$this->$idPolje."'";
				}

			$this->upit($upit);//izvrsi upit
			
		}
		
	}
	
?>