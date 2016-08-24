<?php
/* 
-- Id: includes/top.php 2014-11-12 
-- Copyright (c) 2014 MovimientoWeb.com
-- Created by: Raul Morales Ferrer
*/

if(!stristr($_SERVER['PHP_SELF'], '/includes/top.php')) { } else { @header('Location: ../inicio/'); @exit(); } 

?><div class="mw_top_bar">
	<table cellpadding="0" cellspacing="0" align="center" id="mw_top_bar_layer" name="mw_top_bar_layer">
		<tr>
			<td id="mw_top_bar_left" name="mw_top_bar_left">
				<a href="../inicio/" class="<?php if(!$p) { echo 'mw_top_bar_menu_selected'; } else { echo 'mw_top_bar_menu_link'; } ?>" title="www.iicom.mx">www.iicom.mx</a>
			</td>
			<td id="mw_top_bar_menu" name="mw_top_bar_menu">
				<a href="../inicio/" 	class="<?php if(!$p) 			{ echo 'mw_top_bar_menu_selected'; } else { echo 'mw_top_bar_menu_link'; } ?>" title="Inicio"	>Inicio</a>
				<a href="../nosotros/" 	class="<?php if($p=='nosotros') { echo 'mw_top_bar_menu_selected'; } else { echo 'mw_top_bar_menu_link'; } ?>" title="Nosotros"	>Nosotros</a>
				<a href="../servicios/" class="<?php if($p=='servicios'){ echo 'mw_top_bar_menu_selected'; } else { echo 'mw_top_bar_menu_link'; } ?>" title="Servicios">Servicios</a>
				<a href="../proyectos/" class="<?php if($p=='proyectos'){ echo 'mw_top_bar_menu_selected'; } else { echo 'mw_top_bar_menu_link'; } ?>" title="Proyectos">Proyectos</a>
				<a href="../contacto/" 	class="<?php if($p=='contacto') { echo 'mw_top_bar_menu_selected'; } else { echo 'mw_top_bar_menu_link'; } ?>" title="Contacto"	>Contacto</a>
			</td>
		</tr>
	</table>
</div>