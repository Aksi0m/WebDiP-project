		{include file="zaglavlje.tpl"}
		<div id="csadrzaj">
			{if $smarty.session.korisnik->tip_korisnika == 3}
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
							<span class='pogreska'>{$greske.naziv}</span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="adresa">
								Adresa:
							</label>
						</td>
						<td><input type="text" name="adresa" id="adresa" /> 
							<span class='pogreska'>{$greske.adresa}</span>
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
				{/if}
			<div id="popisFakulteta"></div>
			<div id="stranicenjeFakulteta"></div>
		</div>
		{include file="podnozje.tpl"}	