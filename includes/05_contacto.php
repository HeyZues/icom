<?php
/* 
-- Id: site/includes/05_contacto.php 2014-11-13 
-- Copyright (c) 2014 MovimientoWeb.com
-- Created by: Raul Morales Ferrer
*/

?><table cellpadding="0" cellspacing="0" align="center" id="mw_content_layer" name="mw_content_layer">
	<tr>
		<td id="mw_contacto_contenido_img_00" name="mw_contacto_contenido_img_00">
			<img src="../images/contacto_img_00.jpg" id="mw_contacto_img_00" name="mw_contacto_img_00" border="0" title="ICOM Ingenier&iacute;a y Construcci&oacute;n" alt="ICOM Ingenier&iacute;a y Construcci&oacute;n" />
		</td>
	</tr>
	<tr>
		<td id="mw_contacto_contenido_img_01" name="mw_contacto_contenido_img_01">
			<img src="../images/contacto_img_01.jpg" id="mw_contacto_img_01" name="mw_contacto_img_01" border="0" title="Contacto - ICOM Ingenier&iacute;a y Construcci&oacute;n" alt="Contacto - ICOM Ingenier&iacute;a y Construcci&oacute;n" />
		</td>
	</tr>
	<?php 
		if(isset($_GET["result"])) { $result=(int)$_GET["result"]; } else { $result=""; } 
			if($result==1) { ?><tr><td><div class="mw_msg">Muchas gracias por enviar tus comentarios. En breve nos pondremos en contacto contigo!</div></td></tr><?php 	} 
		elseif($result==2) { ?><tr><td><div class="mw_error">Tu informaci&oacute;n no pudo ser enviada. Int&eacute;ntalo nuevamente!</div></td></tr><?php 				} 
	?>
	<tr>
		<td><table cellpadding="0" cellspacing="0" align="center">
			<tr style="vertical-align:top;" valign="top">
				<td id="mw_contacto_frm_layer" name="mw_contacto_frm_layer"><form id="mw_contacto_frm" name="mw_contacto_frm" action="../contacto_envio/" method="post">
					<table cellpadding="0" cellspacing="0" align="center">
						<tr><td>Escriba su nombre: </td></tr>
						<tr><td><input type="text" id="nombre" name="nombre" tabindex="1" class="mw_contacto_inputs" maxlength="255" required="required" value="" placeholder="Nombre" /></td></tr>
						<tr><td>Escriba su e-mail (sunombre@dominio.com): </td></tr>
						<tr><td><input type="email" id="email" name="email" tabindex="2" class="mw_contacto_inputs" maxlength="255" required="required" value="" placeholder="Correo electrónico" /></td></tr>
						<tr><td>Escriba su tel&eacute;fono (10 d&iacute;gitos): </td></tr>
						<tr><td><input type="text" id="telefono" name="telefono" tabindex="3" class="mw_contacto_inputs" maxlength="255" value="" placeholder="Teléfono" /></td></tr>
						<tr><td>Escriba su mensaje: </td></tr>
						<tr><td><textarea type="text" id="comentarios" name="comentarios" tabindex="14" class="mw_contacto_inputs" maxlength="255" required="required" value="" placeholder="Comentarios adicionales" style="height:82px;"></textarea></td></tr>
						<tr><td align="center" style="text-align:center;"><input type="submit"  class="mw_contacto_btn" value="ENVIAR" title="ENVIAR" alt="ENVIAR" /></td></tr>
					</table>
				</form></td>
				<td id="mw_contacto_mapa_layer" name="mw_contacto_mapa_layer">
					<table cellpadding="0" cellspacing="0" align="center">
						<tr>
							<td><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1797.0529635658652!2d-100.33563294740605!3d25.734010380650343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1416075743003" frameborder="0" style="border:0" id="mw_contacto_mapa_frame" name="mw_contacto_mapa_frame"></iframe></td>
						</tr>
						<tr>
							<td><table cellpadding="0" cellspacing="0" align="left">
								<tr>
									<td style="text-align:left;">
										<ul class="fa-ul">
											<li><i class="fa-li fa fa-phone-square"></i>+52 (81) 1937-3097</li>
											<li><i class="fa-li fa fa-map-marker"></i>Oficinas Corporativas:<br />Jos&eacute; Trevi&ntilde;o No. 200, Col. Chepevera, Monterrey, N. L., M&eacute;xico. </li>
											<li><i class="fa-li fa fa-map-marker"></i>Oficinas Operativas:<br />Santiago No. 2275, Col. Topo Chico, Monterrey, N. L., M&eacute;xico. </li>
										</ul>
									</td>
								</tr>
							</table></td>
						</tr>
					</table>
				</td>
			</tr>
		</table></td>		
	</tr>
</table>