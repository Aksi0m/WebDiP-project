		{include file="zaglavlje.tpl"}
		<div id="csadrzaj">
			<form action="returic_vrijeme.php" method="post">
				<h2>Stvarno vrijeme: {$smarty.now|date_format:"%d. %m. %Y. %H:%M:%S"}</h2>
				<h2>Vrijeme sustava: {$vrijeme|date_format:"%d. %m. %Y. %H:%M:%S"}</h2>
				<a href="http://arka.foi.hr/PzaWeb/PzaWeb2004/config/vrijeme.html" target="_blank">Postavi pomak</a>
				<input type="submit" name="ok" value="Sinkronizacija vremena" /> </p>
			</form>
		</div>
		{include file="podnozje.tpl"}
