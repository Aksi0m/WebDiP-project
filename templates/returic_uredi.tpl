		{include file="zaglavlje.tpl"}
		<div id="csadrzaj">
			<form action="returic_uredi.php?urediID={$urediKorisnika->korisnicko_ime}" method="post" enctype="multipart/form-data">
				<table class="forma">
					<tr >
						<td>
							<label for="kime">
								Korisnicko ime:
							</label>
						</td>
						<td><input type="text" name="kime" id="kime" {if $prijavljeniKorisnik->korisnicko_ime != $urediKorisnika->korisnicko_ime} readonly="readonly" {/if} value="{$urediKorisnika->korisnicko_ime}"/> 
							<span class='pogreska'>{$greske.korisnicko_ime}</span>
						</td>
					</tr>

					<tr >
						<td>
							<label for="ime">
								Ime:
							</label>
						</td>
						<td><input type="text" name="ime" id="ime" value="{$urediKorisnika->ime}"/> 
							<span class='pogreska'>{$greske.ime}</span>
							<input type="hidden" id="uredeno" name="uredeno" value="1"/>
							<input type="hidden" name="idk" value="{$urediKorisnika->id_korisnik}"/>
							<input type="hidden" name="blok" value="{$urediKorisnika->blokiran_do}"/>
							<input type="hidden" name="akt" value="{$urediKorisnika->aktivacijski_kod}"/>
						</td>
					</tr>

					<tr>
						<td>
							<label for="prezime">
								Prezime:
							</label>
						</td>
						<td><input type="text" name="prezime" id="prezime" value="{$urediKorisnika->prezime}"/>					
							<span class='pogreska'>{$greske.prezime}</span>	
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="datumr">
								Datum rođenja (gggg-mm-dd):
							</label>
						</td>
						<td><input type="text"  name="datumr" id="datumr" value="{$urediKorisnika->datum_rodenja}"/>	
							<span class='pogreska'>{$greske.datumr}</span>
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="uslika">
								Slika:
							</label>
						</td>
						<td>
							<img style="width: 100px; height: 100px; border: 1pt solid yellow;" src="../returic/Upload/{$urediKorisnika->avatar}" alt=''/><br/>
							<input type="file" name="uslika" id="uslika" />
							<span class='pogreska'>{$greske.uslika}</span>
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="e-mail">
								E-mail:
							</label>
						</td>
						<td><input type="text" name="email" id="e-mail" value="{$urediKorisnika->email}"/>
							<span class='pogreska'>{$greske.email}</span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="lozinka">
								Lozinka:
							</label>
						</td>
						<td><input type="password" name="lozinka" id="lozinka" value="{$urediKorisnika->lozinka}"/>
							<span class='pogreska'>{$greske.lozinka}</span>
						</td>
					</tr>
					
					<tr>
						<td>
							<label for="plozinka">
								Potvrda lozinke:
							</label>
						</td>
						<td><input type="password" name="plozinka" id="plozinka" value="{$urediKorisnika->lozinka}"/>
							<span class='pogreska'>{$greske.plozinka}</span>
						</td>
					</tr>
					{if $prijavljeniKorisnik->tip_korisnika == 3}
						<tr>
							<td>
								<label for="blok">
									Blokiran do (gggg-mm-dd):
								</label>
							</td>
							<td><input type="text" name="blok" id="blok" value="{$urediKorisnika->blokiran_do}"/>
									<span class='pogreska'>{$greske.blok}</span>
							</td>
						</tr>	
						<tr>
							<td>
								<label for="tipkorisnika">
									Tip korisnika:
								</label>
							</td>
							<td><input  name="tipkorisnika" id="tipkorisnika" value="{$urediKorisnika->tip_korisnika}"/>
								<span class='pogreska'>{$greske.tipkorisnika}</span>
							</td>
						</tr>
						<tr>
							<td>
								<label for="statusk">
									Status korinsika:
								</label>
							</td>
							<td><input type="text" name="statusk" id="statusk" value="{$urediKorisnika->status_korisnika}"/>
								<span class='pogreska'>{$greske.statusk}</span>
							</td>
						</tr>	
						<tr>
							<td>
								<label for="statusk">
									Admin Fakulteta:
								</label>
							</td>
							<td><input type="text" name="fakultet" id="fakultet" value="{$urediKorisnika->fakultet}"/>
							</td>
						</tr>						
					 {else}
						<tr>
							<td>
								<input type="hidden" name="blok" id="blok" value="{$urediKorisnika->blokiran_do}"/>
								<input type="hidden" name="tipkorisnika" id="tipkorisnika" value="{$urediKorisnika->tip_korisnika}"/>
								<input type="hidden" name="statusk" id="statusk" value="{$urediKorisnika->status_korisnika}"/>
								<input type="hidden" name="fakultet" id="fakultet" value="{$urediKorisnika->fakultet}"/>
							</td>
						</tr>	
					 {/if}
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="ok" value="Pošalji podatke"/>
						</td>
						{$redirekcija}
					</tr>

				</table>
			</form>
		</div>
		{include file="podnozje.tpl"}	