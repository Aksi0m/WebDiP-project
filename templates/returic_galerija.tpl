		{include file="zaglavlje.tpl"}
		<div id="csadrzaj">
			
			{if $smarty.session.korisnik->tip_korisnika == 3 || ($smarty.session.korisnik->tip_korisnika == 2 && $smarty.session.korisnik->fakultet == $natjecaj->fakultet)}<form id="novaGalerija" action="returic_galerija.php?galerijaNatjecaja={$smarty.get.galerijaNatjecaja}" method="post">
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
			{/if}
			<div>
				<ul id="galerije"> </ul>
			</div>
			<div id="stranicenjeGalerija"></div>
			<hr>
			
			<div id="slikeGlaerije"></div>
			<div id="novaSlika"></div>
			<span class="pogreska"> {$greske.uslika} </span>
			<div style="height: 50px;"></div>
		</div>
		{include file="podnozje.tpl"}