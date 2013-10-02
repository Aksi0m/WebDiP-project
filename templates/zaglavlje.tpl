<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr-HR" lang="hr-HR"> 
	<head>
		<title> {$naslov} </title>	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="CSS/returic_top.css"/>
		<link rel="stylesheet" type="text/css" href="ajaxCRUD/css/default.css"/>
		
		<link rel="stylesheet" type="text/css" href="js/jMenu_v1.8/jquery/jMenu.jquery.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="js/jPaginate/css/style.css"/>

		<link rel="stylesheet" type="text/css" href="js/lightbox/css/jquery.lightbox-0.5.css" media="screen"/>
		<link rel="shortcut icon" href="Slike/Ikone/projekt.ico" />
		<script type="text/javascript" src="js/formatTime.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/lightbox/js/jquery.lightbox-0.5.js"></script>
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
		

		
		<script type="text/javascript" src="js/jMenu_v1.8/jquery/jMenu.jquery.js"></script>
		<script type="text/javascript" src="js/picnet.table.filter.min.js"></script>
		<script type="text/javascript" src="ajaxCRUD/javascript_functions.js"></script>
		<script type="text/javascript" src="js/jqBarGraph.1.1.js"></script>
		<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7/themes/smoothness/jquery-ui.css"/>
		<script type="text/javascript" src="js/jPaginate/jquery.paginate.js"></script>
		<script type="text/javascript" src="js/returic.js"></script>
	</head>
	<body>
	<div id="kon">
		<div id="cizbornik">
			<div id="zaglavljeStranice">
				Sustav za administraciju prijava na diplomske / poslijediplomske studije
			</div>
			<div id="menubar">
				<ul id="jMenu">
					<li><a class="fNiv" href="index.php" target="_self">Početna</a> </li>
					{if empty($smarty.session.korisnik)}<li><a class="fNiv" href="returic_registracija.php" target="_self">Registracija</a> </li>{/if}
					{if isset($smarty.session.korisnik)}<li><a class="fNiv" href="returic_korisnici.php" target="_self">Korisnici</a> </li>{/if}
					{if isset($smarty.session.korisnik)} <li><a class="fNiv" href="returic_portfelj_dokumenata.php?PDkorisnik={$smarty.session.korisnik->id_korisnik}" target="_self">Portfelji Dokumenata</a>
							
							<ul>
							<li class="arrow"></li>
								{if isset($smarty.session.korisnik)}<li><a href="returic_dokumenti.php?korisnik={$smarty.session.korisnik->id_korisnik}" target="_self">Dokumenti</a> </li>{/if}
							</ul>
						</li>{/if}
					<li><a class="fNiv" href="returic_natjecaji.php" target="_self">Natječaji</a></li>
					{if $smarty.session.korisnik->tip_korisnika >= 2}<li><a href="returic_fakulteti.php" target="_self">Fakulteti</a></li>{/if}
					{if empty($smarty.session.korisnik)}<li><a href="returic_prijava.php" target="_self">Prijava</a> </li>{/if}
					{if $smarty.session.korisnik->tip_korisnika == 3} <li> <a class="fNiv" href="#" >Upravljanje sustavom </a>
						
						<ul>
							<li class="arrow"></li> 
							<li><a href="returic_vrijeme.php" target="_self">Vrijeme</a> </li>
							<li><a href="returic_dnevnik.php" target="_self">Dnevnik</a> </li>
							<li><a href="returic_CRUD.php" target="_self">CRUD operacije</a> </li>
						</ul>
					</li>
					{if isset($smarty.session.korisnik)}<li><a class="fNiv" href="returic_prijave.php?idK={$smarty.session.korisnik->id_korisnik}" target="_self">Prijave</a> </li>{/if}
					{/if}
				</ul>
				
			</div>
			{if isset($smarty.session.korisnik)}
				<div id="prijavljen">
					Prijavljeni ste kao korisnik:<br/><a href="returic_uredi.php?urediID={$smarty.session.korisnik->korisnicko_ime}">{$smarty.session.korisnik->korisnicko_ime}</a><br/>
					<img src="../WebDiP2011_125/Upload/{$smarty.session.korisnik->avatar}" alt=''/><br/>
					<a href="returic_prijava.php?Odjava=true">Odjava</a>
				</div>		
			{/if}
		</div>