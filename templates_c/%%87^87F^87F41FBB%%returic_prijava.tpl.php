<?php /* Smarty version 2.6.6, created on 2012-06-02 12:31:23
         compiled from returic_prijava.tpl */ ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zaglavlje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="csadrzaj">
			<div id="csadrzajp">
				<form action="returic_prijava.php" method="post">
					<table class="forma">
						<tr>
							<td>
								<label for="kimep">
									Korisničko ime:
								</label>
							</td>
							<td><input type="text" name="kimep" id="kimep" value="<?php echo $this->_tpl_vars['CookieKorisnik']; ?>
" /> </td>
						</tr>
						<tr>
							<td>
								<label for="lozinkap">
									Lozinka:
								</label>
							</td>
							<td><input type="password" name="lozinkap" id="lozinkap" /> 
								<br/><span class='pogreska'><?php echo $this->_tpl_vars['aktivan'];  echo $this->_tpl_vars['logiranje'];  echo $this->_tpl_vars['ZabranjenPristup']; ?>
</span>
							</td>
						</tr>
						<tr>
							<td>
								<label for="Zapamtip">
									Zapamti me:
								</label>
							</td>
							<td><input type="checkbox" name="Zapamtip" id="Zapamtip" <?php if ($this->_tpl_vars['CookieKorisnik'] != ""): ?>checked="checked"<?php endif; ?>/></td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="submit" name="ok" value="Pošalji podatke"/>
							</td>
						</tr>
					</table>	
				</form>
				<button id="zaboravljenaLozinka" > Zaboravili ste lozinku? </button>
			</div>
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "podnozje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	