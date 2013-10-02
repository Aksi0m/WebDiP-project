<?php /* Smarty version 2.6.6, created on 2012-05-30 16:30:34
         compiled from returic_galerija.tpl */ ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zaglavlje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="csadrzaj">
			
			<?php if ($_SESSION['korisnik']->tip_korisnika == 3 || ( $_SESSION['korisnik']->tip_korisnika == 2 && $_SESSION['korisnik']->fakultet == $this->_tpl_vars['natjecaj']->fakultet )): ?><form id="novaGalerija" action="returic_galerija.php?galerijaNatjecaja=<?php echo $_GET['galerijaNatjecaja']; ?>
" method="post">
				<table class="forma">
					<tr>
						<td>
							<label for="nazivGalerije">
								Naziv:
							</label>
						</td>
						<td><input type="text" name="nazivGalerije" id="nazivGalerije" value="" /> <input type="submit" name="ok" value="Kreiraj"/>	<br><span id="zaGaleriju" class='pogreska'></span></td>
					</tr>
				</table>	
			</form>
			<?php endif; ?>
			<div>
				<ul id="galerije"> </ul>
			</div>
			<div id="stranicenjeGalerija"></div>
			<hr>
			
			<div id="slikeGlaerije"></div>
			<div id="novaSlika"></div>
			<span class="pogreska"> <?php echo $this->_tpl_vars['greske']['uslika']; ?>
 </span>
			<div style="height: 50px;"></div>
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "podnozje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>