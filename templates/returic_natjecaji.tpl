		{include file="zaglavlje_natjecaj.tpl"}
		<div id="csadrzaj">
			<div id="novaTablica"></div>
			<div id="novoStranicenje"></div>
			<div id="ocjenaNatjecaja"></div>
			<div id="komentari">
				<ul class="razina1"> </ul>
			</div>
			<hr>
			<div id="noviKomentar">
				<form method="post" enctype="multipart/form-data">				
					<table class="forma">
						<tr colspan="3" align="center">
							<th class="zaglavljeKomentara" > Vaš komentar <th> 
						</tr>
						<tr colspan="3">
							<td>
								<textarea style="resize: none;" id="post" name="post" cols=54 rows=5></textarea>
								<br><span class='pogreska'></span>
								<input type="hidden" name="komentar" value="null"/>
								<input type="hidden" name="natjecaj" />
								<input type="hidden" name="vrijeme" />
								<input type="hidden" name="pomoc" value="{$smarty.session.pomoc}"/>
								<input type="hidden" name="autor" value="{$smarty.session.korisnik->korisnicko_ime}" />
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
			<button id="vrati" value="null">Novi komentar</button>
		</div>
		<div style="height: 20px;"></div>
		{include file="podnozje.tpl"}	