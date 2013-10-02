<?php /* Smarty version 2.6.6, created on 2012-05-22 17:38:54
         compiled from returic_uredi.tpl */ ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zaglavlje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="csadrzaj">
			<form action="returic_uredi.php?urediID=<?php echo $this->_tpl_vars['urediKorisnika']->korisnicko_ime; ?>
" method="post" enctype="multipart/form-data">
				<table class="forma">
					<tr >
						<td>
							<label for="kime">
								Korisnicko ime:
							</label>
						</td>
						<td><input type="text" name="kime" id="kime" <?php if ($this->_tpl_vars['prijavljeniKorisnik']->korisnicko_ime != $this->_tpl_vars['urediKorisnika']->korisnicko_ime): ?> readonly="readonly" <?php endif; ?> value="<?php echo $this->_tpl_vars['urediKorisnika']->korisnicko_ime; ?>
"/> 
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['korisnicko_ime']; ?>
</span>
						</td>
					</tr>

					<tr >
						<td>
							<label for="ime">
								Ime:
							</label>
						</td>
						<td><input type="text" name="ime" id="ime" value="<?php echo $this->_tpl_vars['urediKorisnika']->ime; ?>
"/> 
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['ime']; ?>
</span>
							<input type="hidden" id="uredeno" name="uredeno" value="1"/>
							<input type="hidden" name="idk" value="<?php echo $this->_tpl_vars['urediKorisnika']->id_korisnik; ?>
"/>
							<input type="hidden" name="blok" value="<?php echo $this->_tpl_vars['urediKorisnika']->blokiran_do; ?>
"/>
							<input type="hidden" name="akt" value="<?php echo $this->_tpl_vars['urediKorisnika']->aktivacijski_kod; ?>
"/>
						</td>
					</tr>

					<tr>
						<td>
							<label for="prezime">
								Prezime:
							</label>
						</td>
						<td><input type="text" name="prezime" id="prezime" value="<?php echo $this->_tpl_vars['urediKorisnika']->prezime; ?>
"/>					
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['prezime']; ?>
</span>	
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="datumr">
								Datum rođenja (gggg-mm-dd):
							</label>
						</td>
						<td><input type="text"  name="datumr" id="datumr" value="<?php echo $this->_tpl_vars['urediKorisnika']->datum_rodenja; ?>
"/>	
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['datumr']; ?>
</span>
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="uslika">
								Slika:
							</label>
						</td>
						<td>
							<img style="width: 100px; height: 100px; border: 1pt solid yellow;" src="../returic/Upload/<?php echo $this->_tpl_vars['urediKorisnika']->avatar; ?>
" alt=''/><br/>
							<input type="file" name="uslika" id="uslika" />
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['uslika']; ?>
</span>
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="e-mail">
								E-mail:
							</label>
						</td>
						<td><input type="text" name="email" id="e-mail" value="<?php echo $this->_tpl_vars['urediKorisnika']->email; ?>
"/>
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['email']; ?>
</span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="lozinka">
								Lozinka:
							</label>
						</td>
						<td><input type="password" name="lozinka" id="lozinka" value="<?php echo $this->_tpl_vars['urediKorisnika']->lozinka; ?>
"/>
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['lozinka']; ?>
</span>
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="plozinka">
								Potvrda lozinke:
							</label>
						</td>
						<td><input type="password" name="plozinka" id="plozinka" value="<?php echo $this->_tpl_vars['urediKorisnika']->lozinka; ?>
"/>
							<span class='pogreska'><?php echo $this->_tpl_vars['greske']['plozinka']; ?>
</span>
						</td>
					</tr>
					<?php if ($this->_tpl_vars['prijavljeniKorisnik']->tip_korisnika == 3): ?>
						<tr>
							<td>
								<label for="blok">
									Blokiran do (gggg-mm-dd):
								</label>
							</td>
							<td><input type="text" name="blok" id="blok" value="<?php echo $this->_tpl_vars['urediKorisnika']->blokiran_do; ?>
"/>
									<span class='pogreska'><?php echo $this->_tpl_vars['greske']['blok']; ?>
</span>
							</td>
						</tr>	
						<tr>
							<td>
								<label for="tipkorisnika">
									Tip korisnika:
								</label>
							</td>
							<td><input  name="tipkorisnika" id="tipkorisnika" value="<?php echo $this->_tpl_vars['urediKorisnika']->tip_korisnika; ?>
"/>
								<span class='pogreska'><?php echo $this->_tpl_vars['greske']['tipkorisnika']; ?>
</span>
							</td>
						</tr>
						<tr>
							<td>
								<label for="statusk">
									Status korinsika:
								</label>
							</td>
							<td><input type="text" name="statusk" id="statusk" value="<?php echo $this->_tpl_vars['urediKorisnika']->status_korisnika; ?>
"/>
								<span class='pogreska'><?php echo $this->_tpl_vars['greske']['statusk']; ?>
</span>
							</td>
						</tr>	
						<tr>
							<td>
								<label for="statusk">
									Admin Fakulteta:
								</label>
							</td>
							<td><input type="text" name="fakultet" id="fakultet" value="<?php echo $this->_tpl_vars['urediKorisnika']->fakultet; ?>
"/>
							</td>
						</tr>						
					 <?php else: ?>
						<tr>
							<td>
								<input type="hidden" name="blok" id="blok" value="<?php echo $this->_tpl_vars['urediKorisnika']->blokiran_do; ?>
"/>
								<input type="hidden" name="tipkorisnika" id="tipkorisnika" value="<?php echo $this->_tpl_vars['urediKorisnika']->tip_korisnika; ?>
"/>
								<input type="hidden" name="statusk" id="statusk" value="<?php echo $this->_tpl_vars['urediKorisnika']->status_korisnika; ?>
"/>
								<input type="hidden" name="fakultet" id="fakultet" value="<?php echo $this->_tpl_vars['urediKorisnika']->fakultet; ?>
"/>
							</td>
						</tr>	
					 <?php endif; ?>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="ok" value="Pošalji podatke"/>
						</td>
						<?php echo $this->_tpl_vars['redirekcija']; ?>

					</tr>

				</table>
			</form>
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "podnozje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	