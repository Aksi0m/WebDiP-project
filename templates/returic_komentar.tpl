		{include file="zaglavlje.tpl"}
		<div id="csadrzaj">
			<div id="OdgovorNa"></div>
			<form action="returic_komentar.php?komentar={$komentar}" method="post" enctype="multipart/form-data">
				<table class="forma">
					<tr colspan="3" align="center">
						<th id="zaglavljeKomentara"> Vaš komentar <th> 
					</tr>
					<tr colspan="3">
						<td>
							<textarea style="resize: none;" id="post" name="post" cols=52 rows=15> {$pocetakKomentara} </textarea>
							<br><span class='pogreska'>{$greske.komentar}</span>
							<input type="hidden" name="korsinik" value="{$prijavljeniKorisnik->id_korisnik}"/>
							<input type="hidden" name="natjecaj" value="{$postojeciKomentar->natjecaj}"/>	
							{if $postojeciKomentar->komentar != ""} <input type="hidden" name="komentar" value="{$postojeciKomentar->komentar}"/>
							{else} <input type="hidden" name="komentar" value="{$postojeciKomentar->id_komentar}"/>
							{/if}
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
		{include file="podnozje.tpl"}	