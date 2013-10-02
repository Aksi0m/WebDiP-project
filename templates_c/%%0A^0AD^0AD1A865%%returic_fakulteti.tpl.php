<?php /* Smarty version 2.6.6, created on 2012-05-28 14:43:08
         compiled from returic_fakulteti.tpl */ ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zaglavlje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="csadrzaj">
			<?php if ($_SESSION['korisnik']->tip_korisnika == 3): ?>
			<form action="returic_fakulteti.php" method="post" enctype="multipart/form-data">
				<table class="forma">
					<tr>
						<td>
							<label for="naziv">
								Naziv:
							</label>
						</td>
						<td><input type="text" name="naziv" id="naziv" /> 
							<input type="hidden" name="idf" id="idf" value=0/> 
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['naziv']; ?>
</span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="adresa">
								Adresa:
							</label>
						</td>
						<td><input type="text" name="adresa" id="adresa" /> 
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['adresa']; ?>
</span>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="ok" value="Kreiraj Fakultet"/>
						</td>
					</tr>
					</table>
				</form>
				<hr>
				<?php endif; ?>
			<div id="popisFakulteta"></div>
			<div id="stranicenjeFakulteta"></div>
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "podnozje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	