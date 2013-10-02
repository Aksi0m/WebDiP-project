<?php /* Smarty version 2.6.6, created on 2012-05-23 02:33:48
         compiled from returic_dokumenti.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zaglavlje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="csadrzaj">
	<form action="returic_dokumenti.php?korisnik=<?php echo $_SESSION['korisnik']->id_korisnik; ?>
" method="post" enctype="multipart/form-data">
		<table class="forma">
			<tr >
				<td>
					<label for="ime">
							Dokument:
					</label>
				</td>
				<td>
					<input type="file" name="udokument" id="udokument" />
					<input type="hidden" name="idd" value="default"/>
					<input type="hidden" name="idkoriskika" value="<?php echo $_SESSION['korisnik']->id_korisnik; ?>
"/>
					<input type="submit" name="ok" value="Upload" />
					<span class='pogreska'><?php echo $this->_tpl_vars['greske']['udokument']; ?>
</span>
				</td>
			</tr>
		</table>
	</form>
	<hr>
	<div id="Dokumenti">
	</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "podnozje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	