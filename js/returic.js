window.onload=function() {
	console.log('jej radi');
	var buttons = document.querySelectorAll("input[type=submit]");
	if (buttons.length == 1) {
		var buton = buttons[0];
		echo(buton);
		var uredeno;
		uredeno = document.getElementById('uredeno');
		echo(uredeno);
		if(uredeno == null)	buton.addEventListener('click', checkUser, true);
	}
	initInputs();
	tableRow();
	/*var dokumenti = document.getElementById('Dokumenti');
	if(dokumenti != null) prikazDokumenata();*/
}

//**********************PRIKAZ DOKUMENATA PUTEM AJAXA (returic_dokumenti.php)*********************************
function prikazDokumenata(korisnik)
{
	$.ajax({
		url: 'XML_returic_dokumenti.php',
		data: {idKor: korisnik},
		type: 'GET',
		dataType: 'xml',
		success: function(xml) 
		{
		//if (!preg_match("/(pdf|doc|docx|odt|jpg|jpeg)$/i", $this->dokument))   regexEmail.test(forma.elements["email"].value)
			var regexPDF =  /pdf/;
			var regexDOC =  /(.doc|.docx)/;
			var regexODT = /.odt/;
			var lista = $('<ul>');
			$(xml).find('dokument').each(function(){
				if(regexPDF.test($(this).attr('naziv')))
				{
				lista.append('<li> <a href="Dokumenti/'+$(xml).find('dokumenti').attr('korIme')+'/' + $(this).attr('naziv') + '" target="_blank"> <img src="Slike/Ikone/pdf.jpg"/> ' + $(this).attr('naziv') + ' </a></li>');
				}
				else if(regexDOC.test($(this).attr('naziv')))
				{
				lista.append('<li> <a href="http://docs.google.com/viewer?url=arka.foi.hr/WebDiP/2011_projekti/WebDiP2011_125/Dokumenti/'+$(xml).find('dokumenti').attr('korIme')+'/' + $(this).attr('naziv') + '" target="_blank"> <img src="Slike/Ikone/word.jpg"/> ' + $(this).attr('naziv') + ' </a></li>');
				}
				else if(regexODT.test($(this).attr('naziv')))
				{
				lista.append('<li> <a href="http://docs.google.com/viewer?url=arka.foi.hr/WebDiP/2011_projekti/WebDiP2011_125/Dokumenti/'+$(xml).find('dokumenti').attr('korIme')+'/' + $(this).attr('naziv') + '" target="_blank"> <img src="Slike/Ikone/odt.png"/> ' + $(this).attr('naziv') + ' </a></li>');
				}
				else 
				{
				lista.append('<li> <a href="Dokumenti/'+$(xml).find('dokumenti').attr('korIme')+'/' + $(this).attr('naziv') + '" target="_blank"> <img src="Slike/Ikone/jpg.png"/> ' + $(this).attr('naziv') + ' </a></li>');
				}
			});	
			$('#Dokumenti').append(lista);
		}				
	});
}

//****************************************PRIKAZ GALERIJA NATJECAJA**********************
function prikazGalerija(galerijaNatjecaja)
{
	$('#novaGalerija').submit(function() {	  		
		if (!$.trim($("#nazivGalerije").val()))
		{
			$("#zaGaleriju").text("Unesite naziv galerije!").show().delay(800).fadeOut(1000);	
			return false;	  
		} else return true;
	});
	
	$.ajax({
		url: 'XML_returic_galerija.php',
		data: {galerijaNatjecaja: galerijaNatjecaja},
		type: 'GET',
		dataType: 'xml',
		success: function(xml) 
		{	
		
			$(xml).find('galerija').each(function(){
				
				$("#galerije").append('<li> <img  id="' + $(this).attr('idg') + '" src=Natjecaji/galerija.jpg alt="' + $(this).attr('nazivGalerije') + '"/> </li>');
				
			});
			$(xml).find('stranicenje').each(function(){
				$("#stranicenjeGalerija").paginate({
					count 		: parseInt($(this).attr('brojStranica')),
					start 		: 1,
					display     : 5,
					border					: true,
					border_color			: 'yellow',
					text_color  			: 'yellow',
					background_color    	: '#666666',	
					border_hover_color		: '#666666',
					text_hover_color  		: '#666666',
					background_hover_color	: 'yellow', 
					images					: false,
					mouse					: 'press',
					onChange     			: function(page){

												$.ajax({
													url: 'XML_returic_galerija.php',
													data: {galerijaNatjecaja: galerijaNatjecaja, stranica: page},
													type: 'GET',
													dataType: 'xml',
													success: function(xml){
														$("#galerije").html('');
														$(xml).find('galerija').each(function(){
															
															$("#galerije").append('<li> <img  id="' + $(this).attr('idg') + '" src=Natjecaji/galerija.jpg alt="' + $(this).attr('nazivGalerije') + '"/> </li>').show();
															
														});
													}
		
												});
												
											  }
				});
			
			});
					
			$("img").live("click", function(){
				$.ajax({
					url: 'XML_returic_slika.php',
					data: {idGalerija: $(this).attr('id')},
					type: 'GET',
					dataType: 'xml',
					success: function(xml) 
					{
						var ispis = 0;
						var ispis2 = 0;
						$('#slikeGlaerije').html('<ul id="slikice"><ul>');
						$('#novaSlika').html('');
						if($(xml).find('slikeGalerije').attr('tipPrijavljenog') == "3" || ($(xml).find('slikeGalerije' ).attr('tipPrijavljenog') == "2" &&  $(xml).find('slikeGalerije' ).attr('fakultetPrijavljenog') == $(xml).find('slikeGalerije' ).attr('galerijaPripadaFakultetu')))
						{
							$('#novaSlika').append('<form id="uploadSlike" action="returic_slika.php" method="post" enctype="multipart/form-data">	<table class="forma"> <tr> <td>	<label for="ime"> Slika: </label> </td>	<td> <input type="file" name="uslika" id="uslika" /> <input type="submit" name="ok" value="Upload" /> <span id="zaSliku" class="pogreska"> </span> <input type="hidden" name="idg" value="'+ $(xml).find('slikeGalerije' ).attr('idg') +'" /></td> </tr> </table> </form>')
							$('#uploadSlike').submit(function(){
								var regexSlika =  /(.jpg|.png|.jpeg)/;
								
								if( !$('input[name*="uslika"]').val() )
								{
									$("#zaSliku").text("Unesite neku sliku!").show().delay(800).fadeOut(1000);
									return false;
								} else if(!regexSlika.test($('input[name*="uslika"]').val())){
									$("#zaSliku").text("Slika mora biti .jpg ili .png formata").show().delay(800).fadeOut(1000);
									return false;
								}
							});
							
						}
						$(xml).find('slika').each(function(){							
							$('#slikice').append('<li> <a href="Natjecaji/'+galerijaNatjecaja+'/'+$(this).attr('galerijaID')+'/'+$(this).attr('nazivSlike')+'" title="'+$(this).attr('nazivSlike')+'"> <img src="Natjecaji/'+galerijaNatjecaja+'/'+$(this).attr('galerijaID')+'/'+$(this).attr('nazivSlike')+'" width="72" height="72" alt="" /></a></li> </ul>');
							$('#slikice a').lightBox({
								imageLoading: 'js/lightbox/images/lightbox-ico-loading.gif',
								imageBtnClose: 'js/lightbox/images/lightbox-btn-close.gif',
								imageBtnPrev: 'js/lightbox/images/lightbox-btn-prev.gif',
								imageBtnNext: 'js/lightbox/images/lightbox-btn-next.gif',
								imageBlank:	'js/lightbox/images/lightbox-blank.gif'
								});	
						});
					}
				});
			});
		}
	});
	
	
	
	
}

//********************PRIKAZI SVE FAKULTETE******************
function prikaziFakultete()
{
	$.ajax({
		url: 'XML_returic_fakulteti.php',
		type: 'GET',
		dataType: 'xml',
		success: function(xml) 
		{	
			$("#popisFakulteta").append('<table class="korisnici"><tr id="zaglavlje" ><th>Naziv Fakulteta</th><th>Adresa Fakulteta</th> </table>')
			$(xml).find('fakultet').each(function(){
				
				if($(this).attr('tipPrijavljenog') == "3" || ($(this).attr('tipPrijavljenog') == "2" && $(this).attr('fakultetPrijavljenog') == $(this).attr('idf')))
				{
					$(".korisnici").append('<tr><td><a href="returic_detalji_fakulteta.php?fakultet=' + $(this).attr('idf') +'" > ' + $(this).attr('nazivFakulteta') + '</a>  </td><td>'+$(this).attr('adresaFakulteta') + '</td><td> <a href="returic_kreiraj_natjecaj.php?idFakultet=' + $(this).attr('idf') +'"> Kreiraj Natječaj </a></td></tr>').show();
				} else {
					$(".korisnici").append('<tr><td>' + $(this).attr('nazivFakulteta')+' </td><td>'+$(this).attr('adresaFakulteta') + '</td><td></td></tr>').show();
				}
				
			});
			$(xml).find('stranicenje').each(function(){
				$("#stranicenjeFakulteta").paginate({
					count 		: parseInt($(this).attr('brojStranica')),
					start 		: 1,
					display     : 5,
					border					: true,
					border_color			: 'yellow',
					text_color  			: 'yellow',
					background_color    	: '#666666',	
					border_hover_color		: '#666666',
					text_hover_color  		: '#666666',
					background_hover_color	: 'yellow', 
					images					: false,
					mouse					: 'press',
					onChange     			: function(page){

												$.ajax({
													url: 'XML_returic_fakulteti.php',
													data: {stranica: page},
													type: 'GET',
													dataType: 'xml',
													success: function(xml){
														$("#popisFakulteta").html('');
														$("#popisFakulteta").append('<table class="korisnici"><tr id="zaglavlje" ><th>Naziv Fakulteta</th><th>Adresa Fakulteta</th> </table>')
														$(xml).find('fakultet').each(function(){
															
															if($(this).attr('tipPrijavljenog') == "3" || ($(this).attr('tipPrijavljenog') == "2" && $(this).attr('fakultetPrijavljenog') == $(this).attr('idf')))
															{
																$(".korisnici").append('<tr><td> <a href="returic_detalji_fakulteta.php?fakultet=' + $(this).attr('idf') +'" > ' + $(this).attr('nazivFakulteta') + '</a> </td><td>'+$(this).attr('adresaFakulteta') + '</td><td> <a href="returic_kreiraj_natjecaj.php?idFakultet=' + $(this).attr('idf') +'"> Kreiraj Natječaj </a></td></tr>').show();
															} else {
																$(".korisnici").append('<tr><td>' + $(this).attr('nazivFakulteta')+' </td><td>'+$(this).attr('adresaFakulteta') + '</td><td> </td></tr>').show();
															}
														});		
													}
		
												});
												
											  }
				});
			
			});
		}
	});

}
//*********************PRIKAZI DETALJE FAKULTETA**********************************
function prikaziDetaljeFakulteta(fakultet)
{
	var odobren = "Odobren";
	var Da = "checked";
	var Ne = "";
	$.ajax({
		url: 'XML_returic_detalji_fakulteta.php',
		data: {fakultet: fakultet},
		type: 'GET',
		dataType: 'xml',
		success: function(xml) 
		{
			$("#popisNatjecaja").append('<table class="korisnici"><tr id="zaglavlje" ><th>Naziv Natječaja</th><th>Broj Mjesta</th><th>Rok Prijave</th><th>Odobren</th><th>Pregled Prijava</th> </table>');
			$(xml).find('natjecaj').each(function(){
				
				if($(this).attr('odobren') == "0") {odobren = "Nije odobren"; Da = ""; Ne = "checked"}
				if($(this).attr('tipPrijavljenog') == "3" || ($(this).attr('tipPrijavljenog') == "2" && $(this).attr('kreirao') == $(this).attr('idPrijavljenog')))
				{
					if($(this).attr('tipPrijavljenog') == "3")
					{
						$(".korisnici").append('<tr><td> <img id="s'+$(this).attr('idn')+'" src="Slike/Ikone/statistika.png" height="15" width="15"/>  '+ $(this).attr('nazivNatjecaja') +'</td><td>'+$(this).attr('brojMjesta') + '</td><td> ' + $(this).attr('rokPrijave') +'</td><td> <input  type="radio" name="'+ $(this).attr('idn') +'" value="da" '+Da+'> Da <input type="radio" name="'+ $(this).attr('idn') +'" value="Ne" '+Ne+'> Ne</td><td> <a href="returic_prijave.php?natjecaj='+ $(this).attr('idn') +'"> Prijave </a> </td></tr>').show();
						odobravanjeNatjecaja($(this).attr('idn'));
						prikaziGraf($(this).attr('idn'));
					} else{	
						$(".korisnici").append('<tr><td> <img id="s'+$(this).attr('idn')+'" src="Slike/Ikone/statistika.png" height="15" width="15"/>'+ $(this).attr('nazivNatjecaja') +'</td><td>'+$(this).attr('brojMjesta') + '</td><td> ' + $(this).attr('rokPrijave') +'</td><td>'+ odobren +'</td><td> <a href="returic_prijave.php?natjecaj='+ $(this).attr('idn') +'"> Prijave </a> </td></tr>').show();
						prikaziGraf($(this).attr('idn'));
					}
				} else {
					$(".korisnici").append('<tr><td>'+ $(this).attr('nazivNatjecaja') +'</td><td>'+$(this).attr('brojMjesta') + '</td><td> ' + $(this).attr('rokPrijave') +'</td><td>'+ odobren +'</td><td> </td></tr>').show();
				}
				Da = "checked";
				Ne = "";
			});
			
			$(xml).find('stranicenje').each(function(){
				$("#stranicenjeNatjecaja").paginate({
					count 		: parseInt($(this).attr('brojStranica')),
					start 		: 1,
					display     : 5,
					border					: true,
					border_color			: 'yellow',
					text_color  			: 'yellow',
					background_color    	: '#666666',	
					border_hover_color		: '#666666',
					text_hover_color  		: '#666666',
					background_hover_color	: 'yellow', 
					images					: false,
					mouse					: 'press',
					onChange     			: function(page){

												$.ajax({
													url: 'XML_returic_detalji_fakulteta.php',
													data: {fakultet: fakultet,stranica: page},
													type: 'GET',
													dataType: 'xml',
													success: function(xml){
														$("#popisNatjecaja").html('');
														$("#popisNatjecaja").append('<table class="korisnici"><tr id="zaglavlje" ><th>Naziv Natječaja</th><th>Broj Mjesta</th><th>Rok Prijave</th><th>Odobren</th><th>Pregled Prijava</th> </table>');
														$(xml).find('natjecaj').each(function(){
															if($(this).attr('odobren') == "0") {odobren = "Nije odobren"; Da = ""; Ne = "checked"}
															if($(this).attr('tipPrijavljenog') == "3" || ($(this).attr('tipPrijavljenog') == "2" && $(this).attr('kreirao') == $(this).attr('idPrijavljenog')))
															{
																if($(this).attr('tipPrijavljenog') == "3")
																{
																	$(".korisnici").append('<tr><td> <img id="s'+$(this).attr('idn')+'" src="Slike/Ikone/statistika.png" height="15" width="15"/>  '+ $(this).attr('nazivNatjecaja') +'</td><td>'+$(this).attr('brojMjesta') + '</td><td> ' + $(this).attr('rokPrijave') +'</td><td> <input  type="radio" name="'+ $(this).attr('idn') +'" value="da" '+Da+'> Da <input type="radio" name="'+ $(this).attr('idn') +'" value="Ne" '+Ne+'> Ne</td><td> <a href="returic_prijave.php?natjecaj='+ $(this).attr('idn') +'"> Prijave </a> </td></tr>').show();
																	odobravanjeNatjecaja($(this).attr('idn'));
																	prikaziGraf($(this).attr('idn'));
																} else{	
																	$(".korisnici").append('<tr><td> <img id="s'+$(this).attr('idn')+'" src="Slike/Ikone/statistika.png" height="15" width="15"/>'+ $(this).attr('nazivNatjecaja') +'</td><td>'+$(this).attr('brojMjesta') + '</td><td> ' + $(this).attr('rokPrijave') +'</td><td>'+ odobren +'</td><td> <a href="returic_prijave.php?natjecaj='+ $(this).attr('idn') +'"> Prijave </a> </td></tr>').show();
																	prikaziGraf($(this).attr('idn'));
																}
															} else {
																$(".korisnici").append('<tr><td>'+ $(this).attr('nazivNatjecaja') +'</td><td>'+$(this).attr('brojMjesta') + '</td><td> ' + $(this).attr('rokPrijave') +'</td><td>'+ odobren +'</td><td> </td></tr>').show();
															}
															Da = "checked";
															Ne = "";
														});		
													}
		
												});
												
											  }
				});
			
			});
		}
	});
}
function prikaziGraf(idNatjecaja)
{

	
	$("#s"+idNatjecaja+"").live("click",function(){
		
		$.ajax({
		url: 'XML_returic_statistika.php',
		data: {statistika: idNatjecaja},
		type: 'GET',
		dataType: 'xml',
		success: function(xml) 
		{
			$('#graf').html('');	
			graphData =  new Array(
			[parseInt($(xml).find("statistika").attr('brojPrijavnica')),'Sve prijave','#00bfff'],
			[parseInt($(xml).find("statistika").attr('prihvacene')),'Odobrene prijave','#ff0000']
			);

			$('#graf').jqBarGraph({ 
				data: graphData,
				});		
			$("#graf").css("border", "1pt solid yellow");
		}
	});
	});
}

function odobravanjeNatjecaja(name)
{
	$('input[name*="'+ name +'"]').change(function(){
		if ($('input[name*="'+ name +'"]:checked').val() == 'da')
			$.ajax({
				url: 'returic_kreiraj_natjecaj.php',
				data: {idNatjecaj: name,odobri: "1"},
				type: 'GET',
				dataType: 'xml',
				success: function(xml){}
			});
		else
			$.ajax({
				url: 'returic_kreiraj_natjecaj.php',
				data: {idNatjecaj: name,odobri: "0"},
				type: 'GET',
				dataType: 'xml',
				success: function(xml){}
			});
	});
}
//********************************************
//******************************PRIKAZI PORTFELJE****************************

function prikaziPortfelje(korisnik)
{
	$.ajax({
		url: 'XML_returic_portfelj_dokumenata.php',
		data: {idKor: korisnik},
		type: 'GET',
		dataType: 'xml',
		success: function(xml) 
		{
			$('#portfelj').append('<table class="korisnici"><tr id="zaglavlje" ><th>Naziv Portfelja</th><th>Datum Kreiranja</th> <th> </th></tr>  </table>');
			$(xml).find('portfelj').each(function(){
				$('.korisnici').append('<tr> <td> ' + $(this).attr('naziv') + ' </a> </td>  <td> '+ $(this).attr('kreiran') +' </td> <td> <a href="returic_dokument_portfelj.php?portfelj='+$(this).attr('idpd')+'" > Dodaj dokumente </a></td> </tr>').show();	
			});	
			
		}				
	});
}

function dokumentPortfelj(portfelj)
{
	var dokumentiUPortfelju = new Array();
	var index = 0;
	$.ajax({
		url: 'XML_returic_dokument_portfelj.php',
		data: {idPortfelj: portfelj},
		type: 'GET',
		dataType: 'xml',
		success: function(xml) 
		{
			
			$('#dokumentiPortfelja').append('<table class="korisnici"><tr id="zaglavlje" ><th>'+ $(xml).find('dokumentiPortfelji ').attr('nazivPortfelja') +'</th> </tr>  </table>');
			$(xml).find('dokumentPortfelj').each(function(){
				$('.korisnici').append('<tr id="d'+$(this).attr('idDokumenta')+'"> <td> <a href="Dokumenti/'+$(xml).find('dokumentiPortfelji ').attr('korIme')+'/' + $(this).attr('nazivDokumenta') + '" target="_blank">' + $(this).attr('nazivDokumenta') + ' </a> </td> </tr>').show();	
				dokumentiUPortfelju[index++] = $(this).attr('idDokumenta');
				
			});	
			
			$.ajax({
				url: 'XML_returic_dokumenti.php',
				data: {idKor: $(xml).find('dokumentiPortfelji ').attr('idPrijavljenog')},
				type: 'GET',
				dataType: 'xml',
				success: function(xml) 
				{
					var index2 = 0;
					var checked = "";
					var regexPDF =  /pdf/;
					var regexDOC =  /(.doc|.docx)/;
					var regexODT = /.odt/;
					var lista = $('<ul id="dokumentiKorisnika">');
					var lista2 = $('<ul id="preporuke">');
					$(xml).find('dokument').each(function(){
						
						for (index2 in dokumentiUPortfelju)
						{
							if(dokumentiUPortfelju[index2] == $(this).attr('idd')) checked = "checked"; 
						}
						if(regexPDF.test($(this).attr('naziv')))
						{
						lista.append('<li>  <input id="c'+ $(this).attr('idd') +'" type="checkbox" '+checked+'/> <a href="Dokumenti/'+$(xml).find('dokumenti').attr('korIme')+'/' + $(this).attr('naziv') + '" target="_blank"> <img src="Slike/Ikone/pdf.jpg"/> ' + $(this).attr('naziv') + ' </a></li>');
						}
						else if(regexDOC.test($(this).attr('naziv')))
						{
						lista.append('<li>  <input id="c'+ $(this).attr('idd') +'" type="checkbox" '+checked+'/> <a href="Dokumenti/'+$(xml).find('dokumenti').attr('korIme')+'/' + $(this).attr('naziv') + '" target="_blank"> <img src="Slike/Ikone/word.jpg"/> ' + $(this).attr('naziv') + ' </a> </li>');
						}
						else if(regexODT.test($(this).attr('naziv')))
						{
						lista.append('<li>  <input id="c'+ $(this).attr('idd') +'" type="checkbox" '+checked+'/> <a href="Dokumenti/'+$(xml).find('dokumenti').attr('korIme')+'/' + $(this).attr('naziv') + '" target="_blank"> <img src="Slike/Ikone/odt.png"/> ' + $(this).attr('naziv') + ' </a></li>');
						}
						else 
						{
						lista.append('<li>  <input id="c'+ $(this).attr('idd') +'" type="checkbox" '+checked+'/> <a href="Dokumenti/'+$(xml).find('dokumenti').attr('korIme')+'/' + $(this).attr('naziv') + '" target="_blank"> <img src="Slike/Ikone/jpg.png"/> ' + $(this).attr('naziv') + ' </a></li>');
						}
						izaberiDokument($(this).attr('idd'),portfelj,$(xml).find('dokumenti').attr('korIme'),$(this).attr('naziv'));
						checked = "";
					});	
					$('#Dokumenti').append(lista);
					$(xml).find('preporuka').each(function(){
						if(regexPDF.test($(this).attr('nazivPreporuke')))
						{
						lista2.append('<li>  <input id="c'+ $(this).attr('idp') +'" type="checkbox" /> <a href="Dokumenti/'+$(xml).find('dokumenti').attr('korIme')+'/Preporuke/' + $(this).attr('nazivPreporuke') + '" target="_blank"> <img src="Slike/Ikone/pdf.jpg"/> ' + $(this).attr('nazivPreporuke') + ' </a></li>');
						}
						else if(regexDOC.test($(this).attr('nazivPreporuke')))
						{
						lista2.append('<li>  <input id="c'+ $(this).attr('idp') +'" type="checkbox" /> <a href="Dokumenti/'+$(xml).find('dokumenti').attr('korIme')+'/Preporuke/' + $(this).attr('nazivPreporuke') + '" target="_blank"> <img src="Slike/Ikone/word.jpg"/> ' + $(this).attr('nazivPreporuke') + ' </a> </li>');
						}
						izaberiDokument($(this).attr('idp'),portfelj,$(xml).find('dokumenti').attr('korIme'),$(this).attr('nazivPreporuke'));
					});
					$('#Preporuke').append(lista2);
				}				
			});
	
		}				
	});

}

function izaberiDokument(idChb,portfelj,korisnickoIme,nazivDokumenta)
{

	$('#c'+idChb+'').live("click",function(){
   if($('#c'+idChb+'').is(':checked') == false) // makni kvacicu
   {      
		$.ajax({
				url: 'returic_dokument_portfelj.php',
				data: {portfelj: portfelj, dokument: idChb},
				type: 'GET',
				dataType: 'xml',
				success: function(xml) 
				{
					$('#d'+idChb+'').remove();
				}
			});
      
   } else if($('#c'+idChb+'').is(':checked')) { //za kvacicu
		
		$.ajax({
				url: 'returic_dokument_portfelj.php',
				data: {portfelj: portfelj, dokument: idChb},
				type: 'GET',
				dataType: 'xml',
				success: function(xml) 
				{
					$('.korisnici').append('<tr id="d'+idChb+'" > <td> <a href="Dokumenti/'+korisnickoIme+'/' + nazivDokumenta + '" target="_blank">' + nazivDokumenta + ' </a> </td> </tr>').show();	
				}
			});
   }
 });
	
}
//***************************************************************************
//********************** PRIJAVNICA ( PRIJAVA NA NATJECAJ ) ********************************

function prijavnica(idNatjecaj)
{
		$.ajax({
			url: 'XML_returic_portfelj_dokumenata.php',
			data: {prijavaNatjecaj: idNatjecaj},
			type: 'GET',
			dataType: 'xml',
			success: function(xml) 
			{
				$('#popisPortfelja').append('<table class="korisnici">  <tr id="zaglavlje" > <th></th> <th>Naziv Portfelja</th><th>Datum Kreiranja</th> <th> </th></tr>  </table>');
				$(xml).find('portfelj').each(function(){
					$('.korisnici').append('<tr> <td> <input id="'+$(this).attr('idpd')+'" type="radio" name="portfelj" checked/> </td> <td> ' + $(this).attr('naziv') + ' </a> </td>  <td> '+ $(this).attr('kreiran') +' </td> <td> <a href="returic_dokument_portfelj.php?portfelj='+$(this).attr('idpd')+'" > Dodaj dokumente </a></td> </tr>').show();	
					odabirPortfeljaZaNatjecaj($(this).attr('idpd'));
				});	
				
			}				
		});

		var dialog = $('<form id="slanjeMaila" action="returic_prijavnica.php" method="Post"> <label for="mail"> E-mail preporučivaća: </label><input name="mail" type="text" /> <input type="submit" value="Pošalji"/><span id="zaMail"></span></form>');
		dialog.dialog({ 
			 autoOpen: false, 
			 modal: true,
			 title: "Pošalji mail preporučivaću",
			 minWidth: 350,
			 resizable: false,
			 show: { effect: 'drop', direction: "up" }
		});
		
		$('#posaljiMail').click(function(){
			dialog.dialog("open");
			return false;
		});
		
		$('#slanjeMaila').submit(function(){
			var regexEmail = /^([a-zA-Z0-9_\W\.\-])+[^\W]\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(!regexEmail.test($('input[name*="mail"]').val())){
				$("#zaMail").text("Unesite valjani mail!").show().delay(800).fadeOut(1000);
			}else{
				$.ajax({
					url: 'returic_prijavnica.php',
					data: $('#slanjeMaila').serialize(),
					type: 'POST',
					success: function() 
					{
												
					}	
				});
				$("#zaMail").text("Mail je uspiješno poslan!").show().delay(1000).fadeOut(1000);
			
			}
			return false;
		});
		
}

function odabirPortfeljaZaNatjecaj(radio)
{
	$('input[id*="'+radio+'"]').change(function(){
		$('input[name*="idPortfelja"]').get(0).setAttribute('value',$(this).attr('id'));
	});

}
//******************************************************************************************
//*************************************** PISMO PREPORUKE **********************************

function pismoPreporuke(idKorisnika)
{
	$("#csadrzajpPreeporucivaca").hide();
	
	$("#uploadPisma").append('<div id="okvir"> <form id="uploadPreporuke" enctype="multipart/form-data" method="Post" action="returic_pismo_preporuke.php?upload='+idKorisnika+'"> <input type="file" name="upismo" /> <input type="submit" name="ok" value="Upload"/> <input type="hidden" name="idkorisnika" value="'+idKorisnika+'"/> <br> <span id="zaPismo"></span> </form></div>');

	$("#uploadPreporuke").submit(function(){
		var regexPismo =  /(.pdf|.odt|.doc|.docx)/;
			if(!regexPismo.test($('input[name*="upismo"]').val())){
				$("#zaPismo").text("Dokument mora biti ili .pdf .odt .doc ili .docx formata!").show().delay(800).fadeOut(1000);
				return false;
			}
			return true;
	});

}
//*************************************************************************************************************
//************************************ PREGLEDAVANJE PRIJAVA (KORISNIKA I ADMINA )*****************************
function prikaziPrijaveZaAdmina(idNatjecaj)
{
	var brojac = 0;
	$.ajax({
			url: 'XML_returic_prijavnice.php',
			data: {natjecaj: idNatjecaj},
			type: 'GET',
			dataType: 'xml',
			success: function(xml) 
			{
				$('#prijave').append('<table class="korisnici">  <tr id="zaglavlje" > <th>Identifikator Prijavljenog </th> <th>Vrijeme Prijave</th> <th>Priloženi Portfelj </th> <th>Odobreno</th> </tr>  </table>');
				$(xml).find('prijavnica').each(function(){
					if($(this).attr('odobren') == "0")
					{
						$('.korisnici').append('<tr id="p'+$(this).attr('idp')+'"> <td> '+$(this).attr('prijavioKorisnik')+' </td> <td>'+$(this).attr('vrijeme')+'</td> <td> <button name="zaPregledP" id="p'+$(this).attr('idPortfelja')+'">'+$(this).attr('idPortfelja')+'</button></td> <td> <form id="f'+$(this).attr('idp')+'">  <input type="hidden" name="email" value="'+$(this).attr('email')+'" />  <input type="hidden" name="odobri" value="0" /> <input type="hidden" name="idp" value="'+$(this).attr('idp')+'" /> <input type="hidden" name="naziv" value="'+$(xml).find('prijavnice').attr('nazivNattjecaja')+'" /> <input type="submit" value="Odobri"/></form> </td> </tr>').show();	
						odobriPrijavu($(this).attr('idp'));
						pregledPortfelja($(this).attr('idPortfelja'));
					}
				brojac = 1;
				});	
				if(brojac == 0)
				{
					$('.korisnici').remove();
					$('#prijave').append("<h2> Trenutno nema niti jedne nove prijave </h2>");
				}
			}				
		});


}

function pregledPortfelja(pregledID)
{
	var dialog = "";
	$('#p'+pregledID+'').live("click",function(){
		$.ajax({
			url: 'XML_returic_dokument_portfelj.php',
			data: {idPortfelj: pregledID},
			type: 'GET',
			dataType: 'xml',
			success: function(xml) 
			{
				
				dialog = $('<table class="korisnicii"><tr id="zaglavlje" ><th>'+ $(xml).find('dokumentiPortfelji ').attr('nazivPortfelja') +'</th> </tr>  </table>');
				$(xml).find('dokumentPortfelj').each(function(){
					dialog.append('<tr id="d'+$(this).attr('idDokumenta')+'"> <td> <a href="http://docs.google.com/viewer?url=arka.foi.hr/WebDiP/2011_projekti/WebDiP2011_125/Dokumenti/'+$(xml).find('dokumentiPortfelji ').attr('korIme')+'/' + $(this).attr('nazivDokumenta') + '" target="_blank">' + $(this).attr('nazivDokumenta') + ' </a> </td> </tr>').show();		
				});	
			
				dialog.dialog({ 
					 autoOpen: true, 
					 modal: true,
					 title: "Digitalni portfelj",
					 minWidth: 350,
					 resizable: false,
					 show: { effect: 'drop', direction: "up" }
				});

			}
		});
	});
}
function odobriPrijavu(idp)
{
	$('#f'+idp+'').submit(function(){
		$.ajax({
			url: 'returic_prijave.php',
			data: $('#f'+idp+'').serialize(),
			type: 'POST',
			success: function() 
			{
				$('#p'+idp+'').remove();					
			}	
		});
		return false;
	});
	

}

function prikaziPrijaveZaKorisnika(idKorisnika)
{
	var brojac = 0;
	$.ajax({
			url: 'XML_returic_prijavnice.php',
			data: {idK: idKorisnika},
			type: 'GET',
			dataType: 'xml',
			success: function(xml) 
			{
				
				$('#prijave').append('<table class="korisnici">  <tr id="zaglavlje" > <th>Naziv Natječaja</th> <th>Vrijeme Prijave</th> <th>Priloženi Portfelj </th> <th>Stanje</th> </tr>  </table>');
				$(xml).find('prijavnica').each(function(){
					if($(this).attr('odobren') == "1")
					{
						$('.korisnici').append('<tr> <td> '+$(this).attr('nazivNatjecaja')+' </td> <td>'+$(this).attr('vrijeme')+'</td> <td>'+$(this).attr('idPortfelja')+'</td> <td> Odobrena </td> </tr>').show();	
					} else
					{
						$('.korisnici').append('<tr> <td> '+$(this).attr('nazivNatjecaja')+' </td> <td>'+$(this).attr('vrijeme')+'</td> <td>'+$(this).attr('idPortfelja')+'</td> <td> Nije odobrena </td> </tr>').show();	
					}
					brojac = 1;
				});	
				if(brojac == 0)
				{
					$('.korisnici').remove();
					$('#prijave').append("<h2> Trenutno nemate niti jednu prijavu </h2>");
				}
				
			}				
		});
}


//*************************************************************************************************************
//*************************************** ZABORAVLJENA LOZINKA ************************************************
function zaboravljenaLozinka()
{

	var dialog = $('<form id="novaLozinka" action="returic_zaboravljena_lozinka.php" method="Post"> <label for="korisnickoIme"> Vaše korisničko ime: </label><input name="korisnickoIme" type="text" /> <input type="submit" value="Zatraži novu lozinku"/><br><span class="pogreska" id="zaKorisnickoIme"></span></form>');
	dialog.dialog({ 
		 autoOpen: false, 
		 modal: true,
		 title: "Zaboravljena lozinka",
		 minWidth: 350,
		 resizable: false,
		 show: { effect: 'drop', direction: "up" }
	});

	
	$('#zaboravljenaLozinka').click(function(){
			dialog.dialog("open");
			return false;
		});
		
	$('#novaLozinka').submit(function(){

		if(!$('input[name*="korisnickoIme"]').val()){
			$("#zaKorisnickoIme").text("Unesite vaše korsiničko ime!").show().delay(800).fadeOut(1000);
			
		}else{
			$.ajax({
				url: 'returic_zaboravljena_lozinka.php',
				data: $('#novaLozinka').serialize(),
				type: 'POST',
				success: function(data) 
				{
					if(data == ""){
						$("#zaKorisnickoIme").text("Nova lozinka vam je poslana na vaš mail!").show().delay(1000).fadeOut(500);	
					}else{
						$("#zaKorisnickoIme").text("To korisničko ime ne postoji!").show().delay(1000).fadeOut(500);
					}
				}	
			});
		}
		return false;
	});

}
//*************************************************************************************************************
//*************************************** D N E V N I K *******************************************************

function dnevnik()
{
	$.ajax({
		url: 'XML_returic_dnevnik.php',
		type: 'GET',
		dataType: 'xml',
		success: function(xml) 
		{	
			$("#dogadaji").append('<table class="korisnici"><thead><tr id="zaglavlje" ><th>Datum Događaja</th><th>Opis Događaja</th> </thead> </table>')
			$(xml).find('dogadaj').each(function(){
				
				$(".korisnici").append('<tr><td>' + $(this).attr('vrijeme')+' </td><td>'+$(this).attr('opisDogadaja') + '</td></tr>').show();
			
			});
			$('table').tableFilter();
			$(xml).find('stranicenje').each(function(){
				$("#stranicenje").paginate({
					count 		: parseInt($(this).attr('brojStranica')),
					start 		: 1,
					display     : 5,
					border					: true,
					border_color			: 'yellow',
					text_color  			: 'yellow',
					background_color    	: '#666666',	
					border_hover_color		: '#666666',
					text_hover_color  		: '#666666',
					background_hover_color	: 'yellow', 
					images					: false,
					mouse					: 'press',
					onChange     			: function(page){

											$.ajax({
												url: 'XML_returic_dnevnik.php',
												data: {stranica: page},
												type: 'GET',
												dataType: 'xml',
												success: function(xml){
													$("#dogadaji").html('');
													$("#dogadaji").append('<table class="korisnici"><thead><tr id="zaglavlje" ><th>Datum Događaja</th><th>Opis Događaja</th> </thead> </table>')
													$(xml).find('dogadaj').each(function(){
														
														$(".korisnici").append('<tr><td>' + $(this).attr('vrijeme')+' </td><td>'+$(this).attr('opisDogadaja') + '</td></tr>').show();
													
													});	
													$('table').tableFilter();
												}
	
											});
											
										  }
				});
			
			});
			
		}
	});
	
	

}


//*************************************************************************************************************

//jquery **********************
$(function(){
		
		$("#datumr" ).datepicker({ dateFormat: "yy-mm-dd" },{ changeYear: true },{ changeMonth: true });
		var changeMonth = $( "#datumr" ).datepicker( "option", "changeMonth" );
		$("#datumr" ).datepicker( "option", "changeMonth", true );
		var changeYear = $( "#datumr" ).datepicker( "option", "changeYear" );
		$("#datumr" ).datepicker( "option", "changeYear", true );
		$("#jMenu").jMenu();
	// more complex jMenu plugin called
		$("#jMenu").jMenu({
			ulWidth : 'auto',
			effects : {	effectSpeedOpen : 300},
			animatedText : false
		});
		
		var url = location.search;
		url = url.replace('?', '');
		var vrijednost = url.split('=');
		var putanja = window.location.pathname;

		if(vrijednost[0] == "korisnik" && typeof(vrijednost[1]) != "undefined")
		{	
			prikazDokumenata(vrijednost[1])
		}
		if(vrijednost[0] == "upload" && typeof(vrijednost[1]) != "undefined")
		{	
			pismoPreporuke(vrijednost[1])
		}
		if(vrijednost[0] == "prijavaNatjecaj" && typeof(vrijednost[1]) != "undefined")
		{	
			prijavnica(vrijednost[1])
		}
		if(vrijednost[0] == "portfelj" && typeof(vrijednost[1]) != "undefined")
		{	
			dokumentPortfelj(vrijednost[1])
		}
		if(vrijednost[0] == "PDkorisnik" && typeof(vrijednost[1]) != "undefined")
		{	
			prikaziPortfelje(vrijednost[1])
		}
		if(vrijednost[0] == "galerijaNatjecaja" && typeof(vrijednost[1]) != "undefined")
		{
			prikazGalerija(vrijednost[1]);
			
		}
		if(putanja == "/WebDiP/2011_projekti/WebDiP2011_125/returic_fakulteti.php")
		{
			prikaziFakultete();
		}
		if(vrijednost[0] == "fakultet" && typeof(vrijednost[1]) != "undefined")
		{
			prikaziDetaljeFakulteta(vrijednost[1]);
		
		}
		if(vrijednost[0] == "natjecaj" && typeof(vrijednost[1]) != "undefined")
		{
			prikaziPrijaveZaAdmina(vrijednost[1]);
		
		}	
		if(vrijednost[0] == "idK" && typeof(vrijednost[1]) != "undefined")
		{
			prikaziPrijaveZaKorisnika(vrijednost[1]);
		
		}		
		if(vrijednost[0] == "statistika" && typeof(vrijednost[1]) != "undefined")
		{
			
		}
		if(putanja == "/WebDiP/2011_projekti/WebDiP2011_125/returic_prijava.php")
		{
			zaboravljenaLozinka();
		}
		if(putanja == "/WebDiP/2011_projekti/WebDiP2011_125/returic_dnevnik.php")
		{
			dnevnik();
		}
		
		
		
		
});
//*********************************************



//**********************VALIDACIJA FORMI*********************************
var korIme
var forma
function checkUser(event) {
	

	korIme = document.getElementById('kime');
	echo(korIme);
	
	if (korIme != null) {
		forma = korIme.form;
		provjeraPostojanjaKorisnika('returic_provjera.php?kor='+ korIme.value);
		
		event.preventDefault();
		
		if (provjeriFormuRegistracije(forma)) {
			forma.submit();	
		}
	}
	korIme = document.getElementById('kimep');
	if(korIme != null){
		event.preventDefault();
		forma = korIme.form;
		if(provjeriFormuLogIn(forma)) {
			forma.submit();
		}
	
	}
}
//**********************VALIDACIJA LOGIN FORME*********************************
var isOk = true;
function provjeriFormuLogIn(forma){
        isOk = true;
	var spanovi = document.querySelectorAll("span.pogreska");
        echo(spanovi);
	for(i = 0; i < spanovi.length;i++) {
                spanovi[i].parentNode.removeChild(spanovi[i]);
	}
	for(i = 0; i < forma.elements.length; i++) {
		forma.elements.className = '';
                echo(forma.elements[i]);
		if(forma.elements[i].value=='') {
			isOk = false;
			var pogreska = document.createElement('span');
			pogreska.innerHTML='Molim unesite vrijednsot';
			pogreska.className='pogreska';
			forma.elements[i].parentNode.appendChild(pogreska);
			
		}
	}

	echo(isOk);
	return isOk
}
//**********************VALIDACIJA REGISTRACIJSKE FORME*********************************
function provjeriFormuRegistracije(forma) {	

	isOk = true;
	var regexLozinka = /(?=.*\d)(?=.*[a-z])(?=.*\W)(?=.*[A-Z]).{6,}/;
	var regexImePrezime = /^[A-ZŠĐČĆŽ][a-zA-ZšđčćžŠĐČĆŽ]+$/;
	var regexEmail = /^([a-zA-Z0-9_\W\.\-])+[^\W]\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var spanovi = document.querySelectorAll("span.pogreska");
	
	for(i = 0; i < spanovi.length;i++) {
		spanovi[i].parentNode.removeChild(spanovi[i]);
	}
	for(i = 0; i < forma.elements.length; i++) {
		forma.elements.className = '';
		if(forma.elements[i].value=='') {
			isOk = false;
			var pogreska = document.createElement('span');
			pogreska.innerHTML='<br>Molim unesite vrijednsot';
			pogreska.className='pogreska';
			forma.elements[i].parentNode.appendChild(pogreska);
			
		}
	}	
	

	if(forma.elements["lozinka"].value != '' && !(regexLozinka.test(forma.elements["lozinka"].value))){
		isOk = false;
		var pogreska = document.createElement('span');
		pogreska.innerHTML='Molim unesite pravilno lozinku';
		pogreska.className='pogreska';
		forma.elements["lozinka"].parentNode.appendChild(pogreska);	
		forma.elements["lozinka"].focus();
	}
	if(forma.elements["lozinka"].value != forma.elements["plozinka"].value){
		isOk = false;
		var pogreska = document.createElement('span');
		pogreska.innerHTML='<br>Lozinke moraju bit iste';
		pogreska.className='pogreska';
		forma.elements["plozinka"].parentNode.appendChild(pogreska);
		forma.elements["plozinka"].focus();
	}
	if(forma.elements["ime"].value != '' && !regexImePrezime.test(forma.elements["ime"].value)){
		isOk = false;
		var pogreska = document.createElement('span');
		pogreska.innerHTML='Mora sadržavati samo slova i prvo slovo mora biti veliko';
		pogreska.className='pogreska';
		forma.elements["ime"].parentNode.appendChild(pogreska);
		forma.elements["ime"].focus();
	}
	if(forma.elements["prezime"].value != '' && !regexImePrezime.test(forma.elements["prezime"].value)){
		isOk = false;
		var pogreska = document.createElement('span');
		pogreska.innerHTML='Mora sadržavati samo slova i prvo slovo mora biti veliko';
		pogreska.className='pogreska';
		forma.elements["prezime"].parentNode.appendChild(pogreska);
		forma.elements["prezime"].focus();
	}
	if(forma.elements["email"].value != '' && !regexEmail.test(forma.elements["email"].value)){
		isOk = false;
		var pogreska = document.createElement('span');
		pogreska.innerHTML='E-mail nije pravilno unešen';
		pogreska.className='pogreska';
		forma.elements["email"].parentNode.appendChild(pogreska);
		forma.elements["email"].focus();
	}
	
	return isOk;
}

//**********************HIGHLIGHT INPUT POLJA*********************************
function highlightInput(event) {   
	 
	if (!event) var event = window.event;      
	var element =  event.srcElement || event.target;      
	if(element != null){         
		       
		if(event.type == 'focus'){                
			         
			element.style.backgroundColor="#ffff00";         
		}         
		
		else if(event.type == 'blur'){             
			
			element.style.backgroundColor = "";  
			
		}      
	}
}

function initInputs() {   
	
	var inputs = document.getElementsByTagName("input");   
	
	for (i=0; i<inputs.length; i++) {      
	  var attr = inputs[i].getAttribute("type");      
	    
	  if ((attr == "text"|| attr == "password")) { 
			      
			if(window.addEventListener) {            
				inputs[i].addEventListener("focus",highlightInput,false);   
				inputs[i].addEventListener("blur", highlightInput,false);    
			}      
			       
			else if (window.attachEvent) {            
				inputs[i].attachEvent('onfocus', highlightInput);            
				inputs[i].attachEvent('onblur', highlightInput);     
			}      
	   }   
	}
}

//**********************HIGHLIGHT REDAKA U TABLICI*********************************
function highlightRow(event){

	if (!event) var event = window.event;      
	var element =  event.srcElement;
	if(element != null){         
		         
		if(event.type == 'mouseover'){                
			           
			this.style.backgroundColor="rgba(255,255,255,0.3)";         
		}         
		      
		else if(event.type == 'mouseout'){             
			this.style.backgroundColor = "";  
		}
	}
}

function tableRow(){

	var row = document.querySelectorAll("tr[id=red]");
	for(i=0; i < row.length; i++){
		if(window.addEventListener) {  
			row[i].addEventListener("mouseover",highlightRow,false);
			row[i].addEventListener("mouseout",highlightRow,false);
			}
			        
			else if (window.attachEvent) {            
				inputs[i].attachEvent('mouseover', highlightRow);            
				inputs[i].attachEvent('mouseout', highlightRow);     
			} 
	}
}

//**********************PROVJERA DA LI POSTOJI KORISNIK********************************* 
function getHTTPObject() {
  var xmlHttp = false;
  if (window.XMLHttpRequest) {
    xmlHttp = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    try {
      xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch(e) {
      try {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch(e) {
        xmlHttp = false;
      }
    }
  }
  return xmlHttp;
}


function provjeraPostojanjaKorisnika(url) {
  var xmlHttp = getHTTPObject();
  if (xmlHttp) {
    xmlHttp.onreadystatechange = function() {
	trazenje(xmlHttp);
    }
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
	
  }
}

function trazenje(xmlHttp) {
	if (xmlHttp.readyState == 4) {
		if (xmlHttp.status == 200 || xmlHttp.status == 304) {
			var podatci = xmlHttp.responseXML;

			var korisnickoIme = podatci.getElementsByTagName("korisnickoIme");

			for(i=0; i<korisnickoIme.length; i++){
			  var korisnik = korisnickoIme[i].getElementsByTagName("korisnik");
			  for(i=0; i<korisnik.length; i++){

			  if(korisnik.item(i).getAttribute("pronaden")=="true"){
					isOk = false;
					forma.elements["kime"].className='pogreska';
					var pogreska = document.createElement('span');
					pogreska.innerHTML='Korisničko ime već postoji';
					pogreska.className='pogreska';
					forma.elements["kime"].parentNode.appendChild(pogreska);
					return;
				}
			  }
			  isOk = true;
			}
		}
	}
}

 debug = true;
 function echo(objekt) {
	if(debug == true){
	console.log(objekt);}
}