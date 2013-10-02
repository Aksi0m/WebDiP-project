<?php /* Smarty version 2.6.6, created on 2012-06-01 15:12:03
         compiled from returic_detalji_fakulteta.tpl */ ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zaglavlje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="csadrzaj">
			<div id="kreirajNatjecaj"> <a href="returic_kreiraj_natjecaj.php?idFakultet=<?php echo $_GET['fakultet']; ?>
"> Kreiraj novi Natjecaj</a></div>
			<div id="popisNatjecaja" ></div>
			<div id="stranicenjeNatjecaja" ></div>		
			<div id="graf" ></div>
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "podnozje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	