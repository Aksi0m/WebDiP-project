<?php

	require_once ("glavniPHP.php");
	
	class korisnik extends bazaPodatakaObjekt 
	{
	
		public $id_korisnik = 0;
		public $ime = "";
		public $prezime = "";
		public $datum_rodenja = "";
		public $korisnicko_ime = "";
		public $avatar = "";
		public $email = "";
		public $lozinka = "";
		public $aktivacijski_kod = "";
		public $broj_opomena = "";
		public $blokiran_do = "0000-00-00 00:00:00";
		public $neuspjele_prijave = 0;
		public $tip_korisnika = 1;
		public $status_korisnika = 1;
		public $fakultet = NULL;
		
		
		public static function noviPOST() 
		{
		
			$korisnik = new korisnik();
			
			$korisnik->id_korisnik =  mysql_real_escape_string($_POST['idk']);
			$korisnik->ime =  mysql_real_escape_string($_POST['ime']);
			$korisnik->prezime =  mysql_real_escape_string($_POST['prezime']);
			$korisnik->datum_rodenja = mysql_real_escape_string($_POST['datumr']);
			$korisnik->korisnicko_ime = mysql_real_escape_string($_POST['kime']);
			$korisnik->email = mysql_real_escape_string($_POST['email']);
			$korisnik->lozinka = mysql_real_escape_string($_POST['lozinka']);		
			$korisnik->tip_korisnika = mysql_real_escape_string($_POST['tipkorisnika']);	
			$korisnik->status_korisnika = mysql_real_escape_string($_POST['statusk']);		
			$korisnik->blokiran_do = mysql_real_escape_string($_POST['blok']);
			$korisnik->fakultet = mysql_real_escape_string($_POST['fakultet']);
			
			return $korisnik;		
		}
		
		function provjeraUnosa() 
		{
		
			$greske = parent::provjeraUnosa();
						
			if (!preg_match("#.*^(?=.*[a-z])(?=.{6,})(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $this->lozinka))
			{
			
				$greske['lozinka'] = 'Lozinka mora imati minimalno 6 znakova, mala i velika slova, brojeve i posebne znakove';
			
			}
			
			if ($this->lozinka != $_POST['plozinka']) 
			{
			
				$greske['plozinka'] = 'Lozinke nisu jednake';
			
			}
			
			if(empty($this->avatar))
			{
			
				$greske['uslika'] = 'Odredite putanju slike';
			
			} else {
			
				if (!preg_match("/(jpg|gif|jpeg|png)$/i", $this->avatar))  
				{
				
					$greske['uslika'] = '<br>Slika mora biti .png .gif ili .jpg formata';
					
				}
			
			}
			
			if (!($_POST['tipkorisnika'] == 1 || $_POST['tipkorisnika'] == 2 || $_POST['tipkorisnika'] == 3))
			{
						
				$greske['tipkorisnika'] = '1-Registriran|2-Admin fakulteta|3-Admin sustava'; 
							
			}
			
			if (!($_POST['statusk'] == 0 || $_POST['statusk'] == 1 || $_POST['statusk'] == 2 || $_POST['statusk'] == 3 || $_POST['statusk'] == 4))
			{
						
				$greske['statusk'] = '0-Obrisan|1-Neaktivan|2-Aktivan|3-Suspendiran|4-Zakljuèan';
										
			}
			
			return $greske;
		
		}
		
		public static function preuzmiSve($where = "", $limit = "") 
		{
		
			$korisnik = new korisnik();
			$sql = "SELECT * FROM korisnik";
			
			if (!empty($where)) 
			{
			
				$sql .= " WHERE $where";

			}
			
			$sql .= $limit;
			$rs = $korisnik->upit($sql);
			$korisnici = array();
			
			if ($rs) 
			{
			
				while($red = mysql_fetch_assoc($rs)) 
				{
				
					$korisnik = new korisnik();
					foreach(get_object_vars($korisnik) as $kvar => $kval) 
					{						
					
						$korisnik->$kvar=$red[$kvar];						

					}
					
					$korisnici[] = $korisnik;
				}
				
			}
	
			return $korisnici;
			
		}
		
	}
	session_start();
?>