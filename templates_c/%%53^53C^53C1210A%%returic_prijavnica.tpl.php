<?php /* Smarty version 2.6.6, created on 2012-06-04 21:06:06
         compiled from returic_prijavnica.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zaglavlje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="csadrzaj">
	<div id="preporuka">
		<button id="posaljiMail"> Pošalji e-mail </button>
	</div>
	<div id="popisPortfelja"></div>
	<form action="returic_prijavnica.php?prijavaNatjecaj=<?php echo $_GET['prijavaNatjecaj']; ?>
" method="post" enctype="multipart/form-data">
		<input type="hidden" name="idPortfelja" />
		<input style="margin-left:417px;" type="submit" name="ok" value="Prijavi se" />
		<span class='pogreska'></span>
	</form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "podnozje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	