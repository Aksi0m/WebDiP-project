function prikaziPodatke(stranica)
{	
	
	$.ajax({
		url: 'XML_returic_natjecaji.php',
		data: {stranica: stranica},
		type: 'GET',
		dataType: 'xml',
		success: function(xml) 
		{
			//dinamicki kreiramo tablicu (slicno kao document.createElement)
			var tablica = $('<table class="korisnici">');
			tablica.append('<tr id="zaglavlje" ><th>Naziv natječaja</th><th>Broj slobodnih mjesta</th><th>Rok prijave</th>');
			$(xml).find('natjecaj').each(function(){
				//generiramo redove iz xml-a i dodajemo ih na tablicu
				tablica.append('<tr><td><a href="returic_natjecaji.php?idNatjecaj=' + $(this).attr('id') + '-'+ stranica +'" > ' + $(this).attr('naziv') + '</a>' + '</td><td>' +$(this).attr('broj_mjesta') + "</td><td>" + $(this).attr('rok_prijave') + "</td></tr>");
			});
			//gotovu tablicu postavimo na pripremljeno mjesto
			$('#novaTablica').append(tablica);
			//prikazemo rezultat uz animaciju po zelji
			$('#novaTablica').show('blind', 300);
		}
	});
}	

function stranicenje(stranica)
{
	var stranicenje = new Array();
	$.ajax({
		url: 'XML_returic_natjecaji.php',
		type: 'GET',
		dataType: 'xml',
		success: function(xml) 
		{
			var paginacija=$('<div id="stranicenje">');
			$(xml).find('stranice').each(function(){
				stranicenje['pocetakStranice'] = $(this).attr('pocetakStranice');
				stranicenje['krajStranice'] = $(this).attr('krajStranice');
				stranicenje['stranice'] = $(this).attr('stranice');
			});
			if(stranicenje['stranice'] > 2)
			{
				if(parseInt(stranica)>1){
					paginacija.append('<a href="?stranica=1"> &lt;&lt;  </a>');		
					paginacija.append('<a href="?stranica='+(parseInt(stranica)-1)+'"> &lt; </a>');
				}
				for(var i=stranicenje['pocetakStranice'];i<stranicenje['krajStranice'];i++)
				{
					if(i==stranica)
					{
						paginacija.append('<span>'+i+'</span>');
					}else{
						paginacija.append('<a href="?stranica='+i+'">'+i+'</a>');
					}
				}
				if(stranica < stranicenje['stranice'] - 1)
				{
					paginacija.append('<a href="?stranica='+(parseInt(stranica)+1)+'">  &gt;  </a>');
					paginacija.append('<a href="?stranica='+(stranicenje['stranice']-1)+'"> &gt;&gt; </a>');
				}
				$('#novoStranicenje').append(paginacija);
			}
		}
	
	});
}

var listaKomentara = $('<ul class="razina1">');

var ocjenaN = null;
var ocjenaK = null;
function detaljiNatjecaja(idNatjecaj,stranica)
{
	
	$.ajax({
		url: 'XML_returic_natjecaji.php',
		data: {idNatjecaj: idNatjecaj, stranica: stranica},
		type: 'GET',
		dataType: 'xml',
		success: function(xml) 
		{
			var tablica = $('<table class="korisnici">');
			
			$(xml).find('natjecaj').each(function(){
				//generiramo redove iz xml-a i dodajemo ih u tablicu
				if(idNatjecaj == $(this).attr('id'))
				{

					tablica.append('<tr id="zaglavljeNatjecaja" ><th colspan="2"> Naziv: ' + $(this).attr('naziv') + '</th><th> Broj slobodnih mjesta: ' + $(this).attr('broj_mjesta') + "</th><th> Rok prijave: " + $(this).attr('rok_prijave') + "</th>");
					tablica.append('<tr> <td colspan="4"> <h2> Opis natječaja: </h2> </br>' + $(this).attr('opis') + '</td></tr>');
					tablica.append('<tr> <td> Cijena prijave: ' + $(this).attr('cijena_prijave') + ' kn </td><td> Natječaj pripada fakultetu:' + $(this).attr('fakultet') + '</td> <td> Troškovi natječaja:' + $(this).attr('troskovi') + ' kn </td> <td> Ocjena: ' + $(this).attr('prosjekNatjecaj') + ' / 5</td> </tr>'); 
					tablica.append('<tr id="podnozjeNatejcaja"> <td colspan="2"> <a href="returic_galerija.php?galerijaNatjecaja=' + idNatjecaj +'" > Galerije slika </a> </td> <td colspan="2"> <a href="returic_prijavnica.php?prijavaNatjecaj=' + idNatjecaj +'" > Prijavi se </a> </td> </tr>');
					//Prikaz ocjene korisnika ako vec postoji
						
						if($(this).attr('korisnikOcjenaNatjecaj') != "")	ocjenaN = parseInt($(this).attr('korisnikOcjenaNatjecaj'));	
							
						//Ocjena natjecaja
						$('#ocjenaNatjecaja').raty({
							score: ocjenaN,
							click: function(score, evt){

								$.ajax({
									type: 'GET',
									url: 'returic_ocjena.php',
									data: {ocjena: score, komentar: 0, natjecaj: idNatjecaj},
									success: function() 
									{
										$('#ocjenaNatjecaja').append('<p> Vaša ocjena je: ' + score + '</p>');
										$('#ocjenaNatjecaja p').fadeOut(1000);
									}
								
								});
							}
						});
						//**********
					
					
					//Prikazi komentare ako postoje za trenutni natjecaj
					$('#komentari').prepend('<h2>Komentari: </h2>');

					$(xml).find('komentar').each(function(){
						if(idNatjecaj == $(this).attr('natjecaj'))
						{
						
							if($(this).attr('komentar') == "")
							{
								
								var roditelj = $(this).attr('id');
								$('.razina1').append('<li> <table class="komentar"> <tr class="zaglavljeKomentara"> <th> Autor: ' + $(this).attr('autor') + ' </th> <th> <button class="odgovoriNa" value=' + $(this).attr('id') + '> Odgovori</button > </th>  <th class="vrijeme"> ' + $(this).attr('vrijeme_komentiranja') + ' </th> </tr> <tr> <td colspan="3" >' + $(this).attr('tekst') + '</td></tr> <tr class="podnozjeKomentara"> <td colspan="2" > <div class="' + $(this).attr('id') + '" > </div> </td> <td> ' + $(this).attr('prosjekKomentar') + ' / 5 </td> </tr> </table> </li>');
								//traženje da li ima podkomentara
								var podlistaKomentara = $('<ul class="razina2" id="' + $(this).attr('id')+ '">');
								var ima = "0";
								if($(this).attr('korisnikOcjena') != "") ocjenaK = parseInt($(this).attr('korisnikOcjena'));
								ocjenaKomentara($(this).attr('id'));
								ocjenaK = null;
								$(xml).find('komentar').each(function(){
									
									if($(this).attr('komentar') == roditelj)
									{	
										$('.razina1').append(podlistaKomentara);
										$(podlistaKomentara).append('<li> <table class="komentar"> <tr class="zaglavljeKomentara"> <th> Autor: ' + $(this).attr('autor') + ' </th> <th> <button class="odgovoriNa" value=' + $(this).attr('komentar') + '> Odgovori</button > </th> <th class="vrijeme"> ' + $(this).attr('vrijeme_komentiranja') + ' </th> </tr> <tr> <td colspan="3" >' + $(this).attr('tekst') + '</td></tr> <tr  class="podnozjeKomentara"> <td colspan="2"> <div class="' + $(this).attr('id') + '" > </div> </td> <td> ' + $(this).attr('prosjekKomentar') + ' / 5 </td> </tr> </table> </li>');
										ima = "1";
										if($(this).attr('korisnikOcjena') != "") ocjenaK = parseInt($(this).attr('korisnikOcjena'));
										ocjenaKomentara($(this).attr('id'));
										ocjenaK = null;
									}
									
								});
								if (ima == "0") $('.razina1').append('<ul class="razina2" id="' + roditelj + '">');
							}
						} 	
					});
				}
			});
			
			$('#novaTablica').append(tablica);

		}
	});
	
}

function trenutnoVrijeme()
{
	var vrijeme = new Date();
	var format = vrijeme.f("yyyy-MM-dd HH:mm:ss");  
	return format;
}

//Ocjena komentara
function ocjenaKomentara(identifikator)
{

	$('.' + identifikator +'').raty({
		score: ocjenaK,
		click: function(score, evt){

			$.ajax({
				type: 'GET',
				url: 'returic_ocjena.php',
				data: {ocjena: score, komentar: identifikator, natjecaj: 0},
				success: function() {
				
				
				}
			
			});
		}
	});
	if($('input[name*="autor"]').val() < "1") $('#' + identifikator +'').hide();

}
$(function(){
		$("#jMenu").jMenu();
		// more complex jMenu plugin called
		$("#jMenu").jMenu({
			ulWidth : 'auto',
			effects : {	effectSpeedOpen : 300},
			animatedText : false
		});
		$("#vrati").hide();
		var url = location.search;
		url = url.replace('?', '');
		var vrijednost = url.split('=');
		if(vrijednost[0] == "stranica" && typeof(vrijednost[1]) != "undefined" && vrijednost[1] !== null) //Popis natjecaja
		{
			$("form").hide();
			$("hr").hide();
			prikaziPodatke(vrijednost[1]);
			stranicenje(vrijednost[1]);
		}else if(typeof(vrijednost[1]) == "undefined" && vrijednost[1] == null){ //Popis natjecaja (pocetna)
			
			
			$("form").hide();
			$("hr").hide();
			prikaziPodatke(1);
			stranicenje(1);
			
		}else if(vrijednost[0] == "idNatjecaj" && vrijednost[1] !== null){ //detalji natjecaja
		
			var identifikator = vrijednost[1].split('-');
			detaljiNatjecaja(identifikator[0],identifikator[1]);
			$("span").text("Unesite neki tekst!").hide();
			if(!($('input[name*="autor"]').val() < "1")){
				
			
				//Odgovaranje na komentar 
				$("button").live("click", function(){
								
					$("form").appendTo($(this).closest('li'));
					$("#post").val('@'+$(this).closest('tr').children(':first-child').text()+' : ');				
					
					$('input[name*="komentar"]').get(0).setAttribute('value',$(this).attr("value"));
					$("form textarea").focus();
					$("#vrati").show();
					
					$("#vrati").live("click", function() {
						$("#vrati").hide();
						$('html, body').animate({scrollTop:$(document).height()}, 'fast');
						$("form").appendTo('#noviKomentar');
						$("#post").val('');
						$("form textarea").focus();
					});
				});
				//**************************************************************
				
				
				
				$('form').submit(function() {
				  if (!$.trim($("#post").val())) {
					$("span").text("Unesite neki tekst!").show().delay(800).fadeOut(1000);
					return false;
				  } else {
					
					$('input[name*="natjecaj"]').get(0).setAttribute('value',identifikator[0]);
					$('input[name*="vrijeme"]').get(0).setAttribute('value', trenutnoVrijeme());

					$.ajax({
						type: 'POST',
						url: 'returic_komentar.php',
						data: $('form').serialize(),
						success: function() 
						{
							if($('input[name*="komentar"]').attr('value') == "null") // stvaranje novih komentara
							{
								$('.razina1').append('<li> <table class="komentarr"> <tr class="zaglavljeKomentara"> <th> Autor: ' + $('input[name*="autor"]').val() + ' </th> <th> <button class="odgovoriNa" value="' + $('input[name*="pomoc"]').attr('value') + '"> Odgovori</button>  </th>  <th class="vrijeme"> ' + $('input[name*="vrijeme"]').val() + ' </th> </tr> <tr> <td colspan="3" >' + $("#post").val() + '</td></tr> <tr class="podnozjeKomentara"> <td colspan="2"> <div class="' + $('input[name*="pomoc"]').attr('value') + '" > </div> </td> <td> 0 / 5 </td> </tr> </table> </li>');
								$('.razina1 li').last().hide();
								$('.razina1 li').last().fadeIn(2000);
								$("#post").val('');
								$('.razina1').append('<ul class="razina2" id="' + $('input[name*="pomoc"]').attr('value') + '"></ul>');

							}
							else { //stvaranje podkomentara
								

								$('ul #'+ $('input[name*="komentar"]').attr('value') +'').append('<li> <table class="komentarr"> <tr class="zaglavljeKomentara"> <th> Autor: ' + $('input[name*="autor"]').val() + ' </th> <th> <button class="odgovoriNa" value="' + $('form').closest('li').children(':first').find("button").attr('value') + '"> Odgovori</button>  </th>  <th class="vrijeme"> ' + $('input[name*="vrijeme"]').val() + ' </th> </tr> <tr> <td colspan="2" >' + $("#post").val() + '</td></tr> <tr class="podnozjeKomentara"> <td colspan="2"> <div class="' + $('input[name*="pomoc"]').attr('value') + '" > </div> </td> <td> 0 / 5 </td></tr> </table> </li> ');
								$('ul #'+ $('input[name*="komentar"]').attr('value') +' li').last().hide();
								$('ul #'+ $('input[name*="komentar"]').attr('value') +' li').last().fadeIn(2000);
								
							}
								
								
								ocjenaKomentara($('input[name*="pomoc"]').attr('value'));
								var idKomentar = parseInt($('input[name*="pomoc"]').attr('value'));
								$('input[name*="pomoc"]').attr('value',idKomentar+1);
								$('html, body').animate({scrollTop: $(".komentarr").offset().top}, 1000); 
								$('table[class*="komentarr"]').get(0).setAttribute('class', "komentar").delay(1000);
								
								
								
						}
					});
					return false;
				  }
				});
			} else {
				$("span").text("Morate biti prijavljeni kako bi mogli komentirati").show();
				$("#ocjenaNatjecaja").hide();
				
			}
		}		
});



 function echo(objekt) {
	console.log(objekt);
}