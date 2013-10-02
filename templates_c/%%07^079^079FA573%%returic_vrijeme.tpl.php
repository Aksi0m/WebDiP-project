<?php /* Smarty version 2.6.6, created on 2012-05-12 17:30:19
         compiled from returic_vrijeme.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'returic_vrijeme.tpl', 4, false),)), $this); ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zaglavlje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="csadrzaj">
			<form action="returic_vrijeme.php" method="post">
				<h2>Stvarno vrijeme: <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d. %m. %Y. %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d. %m. %Y. %H:%M:%S")); ?>
</h2>
				<h2>Vrijeme sustava: <?php echo ((is_array($_tmp=$this->_tpl_vars['vrijeme'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d. %m. %Y. %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d. %m. %Y. %H:%M:%S")); ?>
</h2>
				<a href="http://arka.foi.hr/PzaWeb/PzaWeb2004/config/vrijeme.html" target="_blank">Postavi pomak</a>
				<input type="submit" name="ok" value="Sinkronizacija vremena" /> </p>
			</form>
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "podnozje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>