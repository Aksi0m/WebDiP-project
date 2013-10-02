{include file="zaglavlje.tpl"}
<div id="csadrzaj">
	<form action="returic_dokumenti.php?korisnik={$smarty.session.korisnik->id_korisnik}" method="post" enctype="multipart/form-data">
		<table class="forma">
			<tr >
				<td>
					<label for="ime">
							Dokument:
					</label>
				</td>
				<td>
					<input type="file" name="udokument" id="udokument" />
					<input type="hidden" name="idd" value="default"/>
					<input type="hidden" name="idkoriskika" value="{$smarty.session.korisnik->id_korisnik}"/>
					<input type="submit" name="ok" value="Upload" />
					<span class='pogreska'>{$greske.udokument}</span>
				</td>
			</tr>
		</table>
	</form>
	<hr>
	<div id="Dokumenti">
	</div>
</div>
{include file="podnozje.tpl"}	