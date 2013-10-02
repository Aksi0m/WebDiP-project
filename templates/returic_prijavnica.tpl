{include file="zaglavlje.tpl"}
<div id="csadrzaj">
	<div id="preporuka">
		<button id="posaljiMail"> Pošalji e-mail </button>
	</div>
	<div id="popisPortfelja"></div>
	<form action="returic_prijavnica.php?prijavaNatjecaj={$smarty.get.prijavaNatjecaj}" method="post" enctype="multipart/form-data">
		<input type="hidden" name="idPortfelja" />
		<input style="margin-left:417px;" type="submit" name="ok" value="Prijavi se" />
		<span class='pogreska'></span>
	</form>
</div>
{include file="podnozje.tpl"}	