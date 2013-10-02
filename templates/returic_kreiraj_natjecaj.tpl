		{include file="zaglavlje.tpl"}
		<div id="csadrzaj">
			<form action="returic_kreiraj_natjecaj.php?idFakultet={$smarty.get.idFakultet}" method="post" enctype="multipart/form-data">
				<table class="forma">
					<tr>
						<td>
							<span class='pogreska'>{$poruka}</span>
							<label for="naziv">
								Naziv:
							</label>
						</td>
						<td><input type="text" name="naziv" id="naziv" /> 
							<span class='pogreska'>{$greske.naziv}</span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="opis">
								Opis:
							</label>
						</td>
						<td><textarea style="resize: none;" id="opis" name="opis" cols=54 rows=5></textarea>
							<span class='pogreska'>{$greske.opis}</span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="broj_mjesta">
								Broj slobodnih mjesta:
							</label>
						</td>
						<td><input type="text" name="broj_mjesta" id="broj_mjesta" /> 
							<span class='pogreska'>{$greske.broj_mjesta}</span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="troskovi">
								Troškovi:
							</label>
						</td>
						<td><input type="text" name="troskovi" id="troskovi" /> 
							<span class='pogreska'>{$greske.troskovi}</span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="cijena">
								Cijena prijave:
							</label>
						</td>
						<td><input type="text" name="cijena" id="cijena" /> 
							<span class='pogreska'>{$greske.cijena}</span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="rok">
								Rok prijave:
							</label>
						</td>
						<td><input type="text" name="rok" id="rok" /> 
							<span class='pogreska'>{$greske.rok}</span>
						</td>
					</tr>
					{if $smarty.session.korisnik->tip_korisnika == 3}
					<tr>
						<td>
							<label for="odobri">
								Odobri:
							</label>
						</td>
						<td><input type="checkbox" name="odobri" id="odobri" value="1"/> 
						</td>
					</tr>
					{/if}
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="ok" value="Kreiraj Natječaj"/>
						</td>
					</tr>
					</table>
				</form>
		</div>
		{include file="podnozje.tpl"}	