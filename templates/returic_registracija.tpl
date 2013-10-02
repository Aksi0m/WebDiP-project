		{include file="zaglavlje.tpl"}
		<div id="csadrzaj">
			<form action="returic_registracija.php" method="post" enctype="multipart/form-data">
				<table class="forma">
					<tr>
						<td>
							<label for="ime">
								Ime:
							</label>
						</td>
						<td><input type="text" name="ime" id="ime" /> 
							<span class='pogreska'>{$greske.ime}</span>
						</td>
					</tr>

					<tr>
						<td>
							<label for="prezime">
								Prezime:
							</label>
						</td>
						<td><input type="text" name="prezime" id="prezime" />
							<span class='pogreska'>{$greske.prezime}</span>						
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="datumr">
								Datum rođenja (gggg-mm-dd):
							</label>
						</td>
						<td><input type="text"  name="datumr" id="datumr" />
							<span class='pogreska'>{$greske.datumr}</span>								
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="uslika">
									Slika:
							</label>
						</td>
						<td><input type="file" name="uslika" id="uslika" />
							<span class='pogreska'>{$greske.uslika}</span>
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="e-mail">
								E-mail:
							</label>
						</td>
						<td><input type="text" name="email" id="e-mail" />
							<span class='pogreska'>{$greske.email}</span>
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="kime">
								Korisničko ime:
							</label>
						</td>
						<td><input type="text" name="kime" id="kime" />
							<span class='pogreska'>{$greske.kime}</span>							
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="lozinka">
								Lozinka:
							</label>
						</td>
						<td><input type="password" name="lozinka" id="lozinka" />
							<span class='pogreska'>{$greske.lozinka}</span>
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="plozinka">
								Potvrda lozinke:
							</label>
						</td>
						<td><input type="password" name="plozinka" id="plozinka" />
							<span class='pogreska'>{$greske.plozinka}</span>
							<input type="hidden" name="idk" value="default"/>
							<input type="hidden" name="tipkorisnika" value="1"/>
							<input type="hidden" name="statusk" value="1"/>
							<input type="hidden" name="blok" value="0000-00-00 00:00:00"/>
							<input type="hidden" name="fakultet" value="null"/>
							
						</td>
					</tr>
					<tr>
						<td colspan="2">
							{$recaptcha}
							<span class='pogreska'>{$recaptchag}</span> 
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="ok" value="Pošalji podatke"/>
						</td>
					</tr>

				</table>
			</form>
		</div>
		{include file="podnozje.tpl"}