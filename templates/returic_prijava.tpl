		{include file="zaglavlje.tpl"}
		<div id="csadrzaj">
			<div id="csadrzajp">
				<form action="returic_prijava.php" method="post">
					<table class="forma">
						<tr>
							<td>
								<label for="kimep">
									Korisničko ime:
								</label>
							</td>
							<td><input type="text" name="kimep" id="kimep" value="{$CookieKorisnik}" /> </td>
						</tr>
						<tr>
							<td>
								<label for="lozinkap">
									Lozinka:
								</label>
							</td>
							<td><input type="password" name="lozinkap" id="lozinkap" /> 
								<br/><span class='pogreska'>{$aktivan}{$logiranje}{$ZabranjenPristup}</span>
							</td>
						</tr>
						<tr>
							<td>
								<label for="Zapamtip">
									Zapamti me:
								</label>
							</td>
							<td><input type="checkbox" name="Zapamtip" id="Zapamtip" {if $CookieKorisnik != ""}checked="checked"{/if}/></td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="submit" name="ok" value="Pošalji podatke"/>
							</td>
						</tr>
					</table>	
				</form>
				<button id="zaboravljenaLozinka" > Zaboravili ste lozinku? </button>
			</div>
		</div>
		{include file="podnozje.tpl"}	