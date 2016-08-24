<?php
/* 
-- Id: site/includes/03_servicios.php 2014-11-19 
-- Copyright (c) 2014 MovimientoWeb.com
-- Created by: Raul Morales Ferrer
*/

if($t<=0) { $t=1; } 
if($t>8) { $t=1; }

$selected_1=0; 
$selected_2=0; 
$selected_3=0; 
$selected_4=0; 
$selected_5=0; 
$selected_6=0; 
$selected_7=0; 
$selected_8=0; 
switch((int)$t)
{ 
	case 1:  $selected_1=1; break; 
	case 2:  $selected_2=1; break; 
	case 3:  $selected_3=1; break; 
	case 4:  $selected_4=1; break; 
	case 5:  $selected_5=1; break; 
	case 6:  $selected_6=1; break; 
	case 7:  $selected_7=1; break; 
	case 8:  $selected_8=1; break; 
	default: $selected_1=1; break; 
} 

?><script language="javascript" type="text/javascript"> 
	function mw_servicios_contenido(servicio_seleccionado)
	{
		var servicio_anterior=document.getElementById('servicio_anterior').value; 
		
		document.getElementById('mw_servicios_list_0' + servicio_anterior).className='mw_servicios_list'; 
		document.getElementById('mw_servicios_list_0' + servicio_seleccionado).className='mw_servicios_list_selected'; 
		
		var servicio_anterior=document.getElementById('servicio_anterior').value=servicio_seleccionado; 
		
		switch(parseInt(servicio_seleccionado)) 
		{
			case 2: 
				document.title='Construccion y Diseño - Servicios - ICOM Ingenieria y Construccion'; 
				var servicio_html='<img src="../images/servicios/servicios_02.jpg" class="mw_servicios_banner" border="0" /><br />'; 
				//var servicio_html= servicio_html + '<span class="mw_tit">CONSTRUCCI&Oacute;N Y DISE&Ntilde;O</span>'; 
				var servicio_html= servicio_html + '<br />Contamos con personal capacitado y maquinaria para realizar obras en cualquier parte del pa&iacute;s.'; 
				var servicio_html= servicio_html + '<ul class="fa-ul">'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Excavaciones.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Nivelaciones.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Edificaciones Comerciales e Industriales.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Estructuras Met&aacute;licas.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Remodelaciones.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Acabados Especiales.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Pintura.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Plafones y Muros falsos.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Impermeabilizantes.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Dise&ntilde;o estructural aceso y concreto.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Evaluaci&oacute;n de proyectos.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Administraci&oacute;n de proyectos.</li>'; 
				var servicio_html= servicio_html + '</ul>'; 
				var servicio_html= servicio_html + '<br /><span class="mw_servicios_tit">DISE&Ntilde;O ARQUITECT&Oacute;NICO</span><br />'; 
				var servicio_html= servicio_html + 'En la actualidad, el dise&ntilde;o arquitect&oacute;nico, debe satisfacer las necesidades de espacios habitables para el ser humano, tanto est&eacute;tico como en lo tecnol&oacute;gico.'; 
				var servicio_html= servicio_html + '<br />&nbsp;<br /><span class="mw_servicios_tit">DISE&Ntilde;O INDUSTRIAL</span><br />'; 
				var servicio_html= servicio_html + 'El dise&ntilde;o industrial es una actividad que tiene que ver con el dise&ntilde;o de productos seriados y/o industriales.'; 
				var servicio_html= servicio_html + '<br />&nbsp;<br /><span class="mw_servicios_tit">DISE&Ntilde;O INTERIOR</span><br />'; 
				var servicio_html= servicio_html + 'El dise&ntilde;o interior es una pr&aacute;ctica creativa que analiza la informaci&oacute;n program&aacute;tica, establece una direcci&oacute;n conceptual, refina la direcci&oacute;n del dise&ntilde;o, y elabora documentos gr&aacute;ficos de comunicaci&oacute;n y contrucci&oacute;n.'; 
				var servicio_html= servicio_html + '<br />'; 
			break; 
			case 3: 
				document.title='Ingenieria y Desarrollo - Servicios - ICOM Ingenieria y Construccion'; 
				var servicio_html='<img src="../images/servicios/servicios_03.jpg" class="mw_servicios_banner" border="0" /><br />'; 
				//var servicio_html= servicio_html + '<span class="mw_tit">INGENIER&Iacute;A Y DESARROLLO</span>'; 
				var servicio_html= servicio_html + '<br />Contamos con personal capacitado y maquinaria para realizar obras en cualquier parte del pa&iacute;s.'; 
				var servicio_html= servicio_html + '<ul class="fa-ul">'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Ingenier&iacute;a Conceptual, b&aacute;sica y detalle (Mec&aacute;nico y Civil).</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Ingenier&iacute;a de campo - Incluyendo equipo.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Nivelaci&oacute;n y alimentaci&oacute;n de maquinaria</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Elaboraci&oacute;n y actualizaci&oacute;n de planos.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Elaboraci&oacute;n de memoria de c&aacute;lculo.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Pruebas de dureza y PND en campo.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Instalaci&oacute;n y montaje de equipo.</li>'; 					
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Elaboraci&oacute;n de estructuras en general.</li>'; 
				var servicio_html= servicio_html + '</ul>'; 
			break; 
			case 4: 
				document.title='Sistemas Contra Incendios - Servicios - ICOM Ingenieria y Construccion'; 
				var servicio_html='<img src="../images/servicios/servicios_04.jpg" class="mw_servicios_banner" border="0" /><br />'; 
				//var servicio_html= servicio_html + '<span class="mw_tit">SISTEMAS DE PROTECCI&Oacute;N CONTRA INCENDIOS</span>'; 
				var servicio_html= servicio_html + '<br />Consultor&iacute;a, dise&ntilde;o, ingenier&iacute;a y contrucci&oacute;n con especializaci&oacute;n en sistemas de protecci&oacute;n contra incendios.'; 
				var servicio_html= servicio_html + '<br /><span class="mw_servicios_tit">SISTEMAS CONTRA INCENDIO:</span><br />'; 
				var servicio_html= servicio_html + '<ul class="fa-ul">'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Sistemas de rociaciones autom&aacute;ticos.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Sistemas de detecci&oacute;n y alarmas contra incendios.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Sistemas de redes exteriores.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Sistemas de hidrantes.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Sistemas de bombeo.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Sistemas de extintores.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Dise&ntilde;o y c&aacute;lculo para tanques de almacenamiento.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Estudios de clasificaci&oacute;n de riesgos.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Estudios para dise&ntilde;o y c&aacute;lculo de rutas de evacuaci&oacute;n y medios de egreso.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Dise&ntilde;o y c&aacute;lculo de muros cortafuego.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Mantenimiento de sistemas contra incendio.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Control de obra, programaci&oacute;n y monitoreo de estatus financiero.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Supervisi&oacute;n externa.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Seguridad de obra.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Proyecci&oacute;n arquitect&oacute;nica e ingenier&iacute;a.</li>'; 
				var servicio_html= servicio_html + '</ul>'; 
				var servicio_html= servicio_html + 'Contamos con certificaci&oacute;n de la <strong>National Fire Protection Association</strong> y <strong>Seminarios avalados por la IFST (International Fire Safety Training)</strong>.'; 
				var servicio_html= servicio_html + '<br />'; 
			break; 
			case 5: 
				document.title='Areas Verdes y Deportivas - Servicios - ICOM Ingenieria y Construccion'; 
				var servicio_html='<img src="../images/servicios/servicios_05.jpg" class="mw_servicios_banner" border="0" /><br />'; 
				//var servicio_html= servicio_html + '<span class="mw_tit">MANTENIMIENTO DE AREAS VERDES Y DEPORTIVAS</span>'; 
				var servicio_html= servicio_html + '<br />Contamos con un equipo de profesionales, t&eacute;cnicos e ingenieros altamente capacitados, para poder asesorarlo y definir la mejor alternativa de dise&ntilde;o que asegure el &eacute;xito de su proyecto de &aacute;reas verdes y deportivas.'; 
				var servicio_html= servicio_html + '<ul class="fa-ul">'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i><strong>Pasto artificial</strong>: Asesor&iacute;a, dise&ntilde;o, venta e instalaci&oacute;n.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i><strong>Mantenimiento Profesional</strong>: Mantenimiento preventivo y correctivo, colocaci&oacute;n de agregados, limpieza, resane de uniones.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i><strong>Preparaci&oacute;n de terreno</strong>: Terracer&iacute;as, topograf&iacute;a, nivelaci&oacute;n, y compactaci&oacute;n.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i><strong>Iluminaci&oacute;n de campos deportivos</strong>: Instalaci&oacute;n y mantenimiento de luminarias de acuerdo a est&aacute;ndares deportivos.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i><strong>Malla perimetral</strong>: Instalaci&oacute;n de todo tipo de mallas a la medida y reparaci&oacute;n.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i><strong>Accesorios</strong>: Instalaci&oacute;n de accesorios, gradas, porter&iacute;as, tableros electr&oacute;nicos, redes de protecci&oacute;n, balones, equipamiento deportivo.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i><strong>&Aacute;reas recreativas</strong>: Dise&ntilde;o, construcci&oacute;n e instalaci&oacute;n de juegos infantiles.</li>'; 
				var servicio_html= servicio_html + '</ul>'; 
				var servicio_html= servicio_html + '<br />'; 
			break; 
			case 6: 
				document.title='Recubrimientos y Superficies - Servicios - ICOM Ingenieria y Construccion'; 
				var servicio_html='<img src="../images/servicios/servicios_06.jpg" class="mw_servicios_banner" border="0" /><br />'; 
				//var servicio_html= servicio_html + '<span class="mw_tit">RECUBRIMIENTOS Y SUPERFICIES</span>'; 
				var servicio_html= servicio_html + '<br />Contamos tambi&eacute;n con la aplicaci&oacute;n de sistemas de recubrimiento ep&oacute;xico en superficies, esto con la finalidad de ayudar a las empresas a mantener y alcanzar los est&aacute;ndares de seguridad e higiene requeridos por las normativas nacionales e internacionales.'; 
				var servicio_html= servicio_html + '<ul class="fa-ul">'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i><strong>Recubrimiento y abrillantado de concreto</strong>: Aplicaci&oacute;n de recubrimiento ep&oacute;xico industrial y comercial, abrillantado de contreto.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i><strong>Lineas de delimitaci&oacute;n</strong>: Aplicaci&oacute;n de l&iacute;neas con pintura ep&oacute;xica para delimitar &aacute;reas en el color que el cliente requiera.</li>'; 
				var servicio_html= servicio_html + '</ul>'; 
				var servicio_html= servicio_html + '<br />'; 
			break; 
			case 7: 
				document.title='Plataformas de elevacion - Servicios - ICOM Ingenieria y Construccion'; 
				var servicio_html='<img src="../images/servicios/servicios_07.jpg" class="mw_servicios_banner" border="0" /><br />'; 
				//var servicio_html= servicio_html + '<span class="mw_tit">LOGÍSTICA Y PLATAFORMAS DE ELEVACIÓN</span>'; 

/*
				var servicio_html= servicio_html + '<br />Dentro del <strong>Grupo ICOM</strong> se encuentra <strong>Pentakar</strong>, empresa enfocada en la transportaci&oacute;n de maquinaria pesada, exceso de dimensiones, y a la renta de plataformas de elevaci&oacute;n de personal.<br />&nbsp;'; 
*/
				var servicio_html= servicio_html + '<br /><span class="mw_servicios_tit">LOG&Iacute;STICA</span><br />'; 

				var servicio_html= servicio_html + '<ul class="fa-ul">'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Tracto camiones.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>LOWBOY 60 TON.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Gr&uacute;a de plataforma.</li>'; 
				var servicio_html= servicio_html + '</ul>'; 
				var servicio_html= servicio_html + '<span class="mw_servicios_tit">PLATAFORMAS DE ELEVACI&Oacute;N</span><br />'; 
				var servicio_html= servicio_html + '<ul class="fa-ul">'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Articuladas.</li>';
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Telesc&oacute;picas.</li>';
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Tijera.</li>';
				var servicio_html= servicio_html + '</ul>'; 
				var servicio_html= servicio_html + '<br />'; 
			break; 
			case 8: 
				document.title='Carpinteria - Servicios - ICOM Ingenieria y Construccion'; 
				var servicio_html='<img src="../images/servicios/servicios_08.jpg" class="mw_servicios_banner" border="0" /><br />'; 
				//var servicio_html= servicio_html + '<span class="mw_tit">CARPINTERIA</span>'; 
				var servicio_html= servicio_html + '<br />Se cuenta con un taller especializado en carpinter&iacute;a.<br />&nbsp;<br />Personal altamente capacitado desarrollan proyectos a la medida de nuestros clientes:'; 
				var servicio_html= servicio_html + '<ul class="fa-ul">'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Puertas.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Muebles para interior.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Muebles para exterior.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Cocinas.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Muebles de oficina.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>Pisos y zoclo.</li>'; 
				var servicio_html= servicio_html + '</ul>'; 
				var servicio_html= servicio_html + '<br />'; 
			break; 
			case 1: 
			default: 
				document.title='Cimentaciones - Servicios - ICOM Ingenieria y Construccion'; 
				var servicio_html='<img src="../images/servicios/servicios_01.jpg" class="mw_servicios_banner" border="0" /><br />'; 
				//var servicio_html= servicio_html + '<span class="mw_tit">CIMENTACIONES</span>'; 
				var servicio_html= servicio_html + '<br />Nos especializamos en la construcci&oacute;n de pilas de cimentaci&oacute;n profundas. Contamos con el equipo mas moderno del mercado, tecnolog&iacute;a de punta, equipos de marca SILMEC, LLAMADA Y TESCAR.'; 
				var servicio_html= servicio_html + '<br />&nbsp;<br />'; 
				var servicio_html= servicio_html + 'Perforamos cualquier tipo de terreno (Arcillas, conglomerados, lutitas, etc.). Contamos con personal altamente calificado para la ejecici&oacute;n y supervisi&oacute;n de su proyecto.'; 
				var servicio_html= servicio_html + '<br />&nbsp;<br /><span class="mw_servicios_tit">PILOTEADORAS SOBRE ORUGAS</span><br />'; 
				var servicio_html= servicio_html + '<ul class="fa-ul">'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>ACCESO A CUALQUIER TIPO DE TERRENO, CAPACIDAD DE PERFORACI&Oacute;N HASTA 40M.</li>'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>DI&Aacute;METRO HASTA 1.80 M. O MAYORES SEG&Uacute;N LO REQUIERA EL PROYECTO.</li>'; 
				var servicio_html= servicio_html + '</ul>'; 
				var servicio_html= servicio_html + '<span class="mw_servicios_tit">PILOTEADORAS SOBRE CAMI&Oacute;N</span><br />'; 
				var servicio_html= servicio_html + '<ul class="fa-ul">'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>VERS&Aacute;TIL EN MOVIMIENTO Y TRASLADO A CUALQUIER OBRA.</li>';
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>CAPACIDAD DE PERFORACI&Oacute;N HASTA 30M.</li>';
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>DI&Aacute;METRO HASTA 1.50 M. O MAYORES SEG&Uacute;N LO REQUIERA EL PROYECTO.</li>';
				var servicio_html= servicio_html + '</ul>'; 
				var servicio_html= servicio_html + '<span class="mw_servicios_tit">EQUIPOS DE PERFIL BAJO</span><br />'; 
				var servicio_html= servicio_html + '<ul class="fa-ul">'; 
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>TAMBI&Eacute;N CONTAMOS CON EQUIPOS DE LOS M&Aacute;S COMPACTOS DEL MERCADO, CAPAZ DE TRABAJAR EN LUGARES CON POCA ALTURA COMO BODEGAS, NAVES INDUSTRIALES Y TORRES DE ALTA TENSI&Oacute;N, AS&Iacute; MISMO PUEDE MANIOBRAR EN LUGARES MUY REDUCIDOS.</li>';
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>CAPACIDAD DE PERFORACI&Oacute;N HASTA 20M.</li>';
					var servicio_html= servicio_html + '<li><i class="fa-li fa fa-check-square-o"></i>DI&Aacute;METRO HASTA 1.20M</li>'; 
				var servicio_html= servicio_html + '</ul>'; 
				var servicio_html= servicio_html + '<br />'; 
			break; 
		} 
		document.getElementById('mw_servicios_contenido').innerHTML=servicio_html; 
		document.location='#icom_servicios';
	}
</script>
<input type="hidden" value="<?php echo (int)$t; ?>" id="servicio_anterior" name="servicio_anterior" />
<table cellpadding="0" cellspacing="0" align="center" id="mw_content_layer" name="mw_content_layer">
	<tr>
		<td id="mw_servicios_contenido_img_00" name="mw_servicios_contenido_img_00">
			<img src="../images/servicios_img_00.jpg" id="mw_servicios_img_00" name="mw_servicios_img_00" border="0" title="ICOM Ingenier&iacute;a y Construcci&oacute;n" alt="ICOM Ingenier&iacute;a y Construcci&oacute;n" />
		</td>
	</tr>
	<tr>
		<td id="mw_servicios_contenido_img_01" name="mw_servicios_contenido_img_01">
			<img src="../images/servicios_img_01.jpg" id="mw_servicios_img_01" name="mw_servicios_img_01" border="0" title="Servicios - ICOM Ingenier&iacute;a y Construcci&oacute;n" alt="Servicios - ICOM Ingenier&iacute;a y Construcci&oacute;n" />
		</td>
	</tr>
</table>
<table cellpadding="0" cellspacing="0" align="center" id="mw_content_layer" name="mw_content_layer">
	<tr>
		<td style="vertical-align:top;" valign="top">
			
			<div id="mw_servicios_menu" name="mw_servicios_menu">
				<a href="javascript:mw_servicios_contenido(1);" class="<?php if($selected_1==1) { echo 'mw_servicios_list_selected'; } else { echo 'mw_servicios_list'; } ?>" id="mw_servicios_list_01" name="mw_servicios_list_01">Cimentaciones</a>
				<a href="javascript:mw_servicios_contenido(2);" class="<?php if($selected_2==1) { echo 'mw_servicios_list_selected'; } else { echo 'mw_servicios_list'; } ?>" id="mw_servicios_list_02" name="mw_servicios_list_02">Construcci&oacute;n y Dise&ntilde;o</a>
				<a href="javascript:mw_servicios_contenido(3);" class="<?php if($selected_3==1) { echo 'mw_servicios_list_selected'; } else { echo 'mw_servicios_list'; } ?>" id="mw_servicios_list_03" name="mw_servicios_list_03">Ingenier&iacute;a y Desarrollo</a>
				<a href="javascript:mw_servicios_contenido(4);" class="<?php if($selected_4==1) { echo 'mw_servicios_list_selected'; } else { echo 'mw_servicios_list'; } ?>" id="mw_servicios_list_04" name="mw_servicios_list_04">Sistemas Contra Incendios</a>
				<a href="javascript:mw_servicios_contenido(5);" class="<?php if($selected_5==1) { echo 'mw_servicios_list_selected'; } else { echo 'mw_servicios_list'; } ?>" id="mw_servicios_list_05" name="mw_servicios_list_05">&Aacute;reas Verdes y Deportivas</a>
				<a href="javascript:mw_servicios_contenido(6);" class="<?php if($selected_6==1) { echo 'mw_servicios_list_selected'; } else { echo 'mw_servicios_list'; } ?>" id="mw_servicios_list_06" name="mw_servicios_list_06">Recubrimientos y Superficies</a>
				<a href="javascript:mw_servicios_contenido(7);" class="<?php if($selected_7==1) { echo 'mw_servicios_list_selected'; } else { echo 'mw_servicios_list'; } ?>" id="mw_servicios_list_07" name="mw_servicios_list_07">Plataformas de Elevaci&oacute;n</a>
				<a href="javascript:mw_servicios_contenido(8);" class="<?php if($selected_8==1) { echo 'mw_servicios_list_selected'; } else { echo 'mw_servicios_list'; } ?>" id="mw_servicios_list_08" name="mw_servicios_list_08">Carpinter&iacute;a</a>
			</div>
			<a id="icom_servicios" name="icom_servicios"></a>
			<div id="mw_servicios_contenido" name="mw_servicios_contenido">Cargando...</div>
		</td>
	</tr>
</table>
<script language="javascript" type="text/javascript">
	mw_servicios_contenido(<?php echo (int)$t; ?>); 
</script>
