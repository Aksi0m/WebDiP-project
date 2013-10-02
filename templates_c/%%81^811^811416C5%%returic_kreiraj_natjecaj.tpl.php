<?php /* Smarty version 2.6.6, created on 2012-05-28 20:31:28
         compiled from returic_kreiraj_natjecaj.tpl */ ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zaglavlje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="csadrzaj">
			<form action="returic_kreiraj_natjecaj.php?idFakultet=<?php echo $_GET['idFakultet']; ?>
" method="post" enctype="multipart/form-data">
				<table class="forma">
					<tr>
						<td>
							<span class='pogreska'><?php echo $this->_tpl_vars['poruka']; ?>
</span>
							<label for="naziv">
								Naziv:
							</label>
						</td>
						<td><input type="text" name="naziv" id="naziv" /> 
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['naziv']; ?>
</span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="opis">
								Opis:
							</label>
						</td>
						<td><textarea style="resize: none;" id="opis" name="opis" cols=54 rows=5></textarea>
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['opis']; ?>
</span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="broj_mjesta">
								Broj slobodnih mjesta:
							</label>
						</td>
						<td><input type="text" name="broj_mjesta" id="broj_mjesta" /> 
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['broj_mjesta']; ?>
</span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="troskovi">
								Troškovi:
							</label>
						</td>
						<td><input type="text" name="troskovi" id="troskovi" /> 
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['troskovi']; ?>
</span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="cijena">
								Cijena prijave:
							</label>
						</td>
						<td><input type="text" name="cijena" id="cijena" /> 
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['cijena']; ?>
</span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="rok">
								Rok prijave:
							</label>
						</td>
						<td><input type="text" name="rok" id="rok" /> 
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['rok']; ?>
</span>
						</td>
					</tr>
					<?php if ($_SESSION['korisnik']->tip_korisnika == 3): ?>
					<tr>
						<td>
							<label for="odobri">
								Odobri:
							</label>
						</td>
						<td><input type="checkbox" name="odobri" id="odobri" value="1"/> 
						</td>
					</tr>
					<?php endif; ?>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="ok" value="Kreiraj Natječaj"/>
						</td>
					</tr>
					</table>
				</form>
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "podnozje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	