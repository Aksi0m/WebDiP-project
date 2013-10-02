		{include file="zaglavlje.tpl"}
		<div id="csadrzaj">
			<table class="korisnici">
				<tr id = "zaglavlje">
					<th>Slika</th>
					<th>Korisničko ime</th>
					<th>Ime</th>
					<th>Prezime</th>
					<th>E-mail</th>
				</tr>
				
				{section name=i loop=$korisnici}
				
				<tr id = "red" >
					<td><a href="../WebDiP2011_125/Upload/{$korisnici[i]->avatar}" target="_blank"><img src="../WebDiP2011_125/Upload/Thumbnails/{$korisnici[i]->avatar}"/></a></td>
					<td>{if $smarty.session.korisnik->tip_korisnika == 3}
							<a href="returic_uredi.php?urediID={$korisnici[i]->korisnicko_ime}" >{$korisnici[i]->korisnicko_ime}</a>
						{else}
							{$korisnici[i]->korisnicko_ime}
						{/if}
					</td>
					<td>{$korisnici[i]->ime}</td>
					<td>{$korisnici[i]->prezime}</td>
					<td>{$korisnici[i]->email}</td>
					{if $smarty.session.korisnik->tip_korisnika == 3}<td> <a href="returic_dokumenti.php?korisnik={$korisnici[i]->id_korisnik}" > Dokumenti </a> </td> {/if}
				</tr>
				
				{/section}
				
			</table>
			
			{if $stranice > 2}
	 
		    <div id="stranicenje">
			
			{if $stranica > 1}
			
			    <a href="?stranica=1">&lt;&lt;</a>		
			    <a href="?stranica={$stranica-1}">&lt;</a>
				
			{/if}
			
			{section name=p start=$pocetakStranice loop=$krajStranice step=1}
			
			     {if $smarty.section.p.index==$stranica}
				 
					<span>{$smarty.section.p.index}</span>
				
			     {else}
				 
					<a href="?stranica={$smarty.section.p.index}">{$smarty.section.p.index}</a>
				 
			     {/if}
			    
			{/section}
			
			{if $stranica < $stranice-1}			
			    <a href="?stranica={$stranica+1}">&gt;</a>
			    <a href="?stranica={$stranice-1}">&gt;&gt;</a>	
			{/if}
		    </div>
		
	    {/if}
		</div>
		{include file="podnozje.tpl"}