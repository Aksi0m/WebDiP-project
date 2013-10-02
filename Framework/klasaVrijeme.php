<?php

	class vrijeme extends bazaPodatakaObjekt 
	{
	
		public $pomak = 0;
		
		public static function uskladiVrijeme() {
			
			$url = "http://arka.foi.hr/PzaWeb/PzaWeb2004/config/pomak.xml";
		      
			if(! ($fp = fopen($url,'r')))
			{
			
			  echo "URL se ne može otvoriti: " . $url;
			  exit;
			  
			}
			
			$sati = 0;
			$xml = fread($fp, 10000);
			fclose($fp);
			$domdoc = new DOMDocument;
			$domdoc->loadXML($xml);    
			$params = $domdoc->getElementsByTagName('pomak');
			
			foreach ($params as $param) 
			{
			
				$attributes = $param->attributes;
				foreach ($attributes as $attr => $val) 
				{
				
				    if($attr == "brojSati")
					{
					
						$sati = $val->value;
					  
					}
					
			    }
				
			}
					
			$serverskoVrijeme = time();
			$vrijemeSustava = $serverskoVrijeme + ($sati * 60 * 60);
			$vrijeme = new vrijeme();
			$vrijeme->upit("UPDATE vrijeme SET pomak='$sati'");
			return $sati;
		}
		
	
		
		public static function preuzmiTrenutnoVrijeme()
		{
		
			$vrijeme = new vrijeme();
			$red = mysql_fetch_array($vrijeme->upit("SELECT pomak FROM vrijeme"));
			$pomak=$red['pomak'];			
			return $pomak * 60 * 60 + time();
			
		}
	
	}
	
?>