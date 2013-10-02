<?php /* Smarty version 2.6.6, created on 2012-05-24 20:46:39
         compiled from returic_komentar.tpl */ ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zaglavlje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="csadrzaj">
			<div id="OdgovorNa"></div>
			<form action="returic_komentar.php?komentar=<?php echo $this->_tpl_vars['komentar']; ?>
" method="post" enctype="multipart/form-data">
				<table class="forma">
					<tr colspan="3" align="center">
						<th id="zaglavljeKomentara"> Vaš komentar <th> 
					</tr>
					<tr colspan="3">
						<td>
							<textarea style="resize: none;" id="post" name="post" cols=52 rows=15> <?php echo $this->_tpl_vars['pocetakKomentara']; ?>
 </textarea>
							<br><span class='pogreska'><?php echo $this->_tpl_vars['greske']['komentar']; ?>
</span>
							<input type="hidden" name="korsinik" value="<?php echo $this->_tpl_vars['prijavljeniKorisnik']->id_korisnik; ?>
"/>
							<input type="hidden" name="natjecaj" value="<?php echo $this->_tpl_vars['postojeciKomentar']->natjecaj; ?>
"/>	
							<?php if ($this->_tpl_vars['postojeciKomentar']->komentar != ""): ?> <input type="hidden" name="komentar" value="<?php echo $this->_tpl_vars['postojeciKomentar']->komentar; ?>
"/>
							<?php else: ?> <input type="hidden" name="komentar" value="<?php echo $this->_tpl_vars['postojeciKomentar']->id_komentar; ?>
"/>
							<?php endif; ?>
						</td>
					</tr>
					<tr colspan="3" align="center">
						<td>
							<input type="submit" name="ok" value="Pošalji komentar"/>
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