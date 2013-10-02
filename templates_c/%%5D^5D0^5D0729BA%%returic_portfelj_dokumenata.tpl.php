<?php /* Smarty version 2.6.6, created on 2012-05-30 17:40:24
         compiled from returic_portfelj_dokumenata.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zaglavlje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="csadrzaj">
	<form action="returic_portfelj_dokumenata.php?PDkorisnik=<?php echo $_SESSION['korisnik']->id_korisnik; ?>
" method="post" enctype="multipart/form-data">
		<table class="forma">
			<tr >
				<td>
					<label for="naziv">
							Naziv portfelja:
					</label>
				</td>
				<td>
					<input type="text" name="naziv" id="naziv" />
					<input type="submit" name="ok" value="Kreiraj" />
					<span class='pogreska'></span>
				</td>
			</tr>
		</table>
	</form>
	<hr>
	<div id="portfelj">
	</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "podnozje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	