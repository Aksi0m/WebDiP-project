{include file="zaglavlje.tpl"}
<div id="csadrzaj">
	<form action="returic_portfelj_dokumenata.php?PDkorisnik={$smarty.session.korisnik->id_korisnik}" method="post" enctype="multipart/form-data">
		<table class="forma">
			<tr >
				<td>
					<label for="naziv">
							Naziv portfelja:
					</label>
				</td>
				<td>
					<input type="text" name="naziv" id="naziv" />
					<input type="submit" name="ok" value="Kreiraj" />
					<span class='pogreska'></span>
				</td>
			</tr>
		</table>
	</form>
	<hr>
	<div id="portfelj">
	</div>
</div>
{include file="podnozje.tpl"}	