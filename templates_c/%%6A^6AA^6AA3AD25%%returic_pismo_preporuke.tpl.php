<?php /* Smarty version 2.6.6, created on 2012-06-04 22:51:14
         compiled from returic_pismo_preporuke.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr-HR" lang="hr-HR"> 
	<head>
		<title> <?php echo $this->_tpl_vars['naslov']; ?>
 </title>	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="CSS/returic_top.css"/>
		<link rel="stylesheet" type="text/css" href="ajaxCRUD/css/default.css"/>
		<link rel="stylesheet" type="text/css" href="js/jPaginate/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="js/jMenu_v1.8/jquery/jMenu.jquery.css" media="screen" />

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
		<div id="csadrzaj">
			<div id="csadrzajpPreeporucivaca">
				<form id="slanjePreporuke" action="returic_prijava.php?k=<?php echo $_GET['k']; ?>
" method="post">
					<table class="forma">
						<tr>
							<td>
								<label for="kp">
									Korisničko ime:
								</label>
							</td>
							<td><input type="text" name="kp" id="kp"/> </td>
						</tr>
						<tr>
							<td>
								<label for="lp">
									Lozinka:
								</label>
							</td>
							<td><input type="password" name="lp" id="lp" /> 
								<br/><span class='pogreska'><?php echo $this->_tpl_vars['greska'];  echo $this->_tpl_vars['greske']['upismo']; ?>
</span>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="submit" name="ok" value="Logiraj se"/>
							</td>
						</tr>
					</table>	
				</form>
			</div>
			<div id="uploadPisma"></div>
		</div>
	</body>
</html>	