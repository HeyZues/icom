<?php
/* 
-- Id: site/includes/01_inicio.php 2014-11-20 
-- Copyright (c) 2014 MovimientoWeb.com
-- Created by: Raul Morales Ferrer
*/

?><table cellpadding="0" cellspacing="0" align="center" id="mw_content_layer" name="mw_content_layer">
	<tr><td><div id="Stage" class="EDGE-5077574"></div></td></tr>
	<tr>
		<td id="mw_inicio_contenido_txt" name="mw_inicio_contenido_txt">
			<img src="../images/inicio_img_00.jpg" align="right" id="mw_inicio_img_00" name="mw_inicio_img_00" border="0" title="ICOM Ingenier&iacute;a y Construcci&oacute;n" alt="ICOM Ingenier&iacute;a y Construcci&oacute;n" />
			<span class="mw_tit">BIENVENIDO</span><br />
			ICOM es una empresa mexicana con amplia experiencia en el giro de construcci&oacute;n tanto industrial como civil. Contamos con m&aacute;s de 14 a&ntilde;os de 
			experiencia realizando obras en el mercado nacional, satisfaciendo las necesidades de construcci&oacute;n y maquinaria de nuestros clientes. 
			<br />
			<a href="../nosotros/" class="mw_inicio_link_ver" title="Ver m&aacute;s">Ver m&aacute;s</a>
			<br />&nbsp;<br />
		</td>
	</tr>
</table>
<br />
<table cellpadding="0" cellspacing="0" align="center" id="mw_content_layer" name="mw_content_layer">
	<tr>
		<td>
			<table cellpadding="0" cellspacing="0" align="center" id="mw_inicio_servicios" name="mw_inicio_servicios">
				<tr>
					<td>
						<div class="mw_inicio_servicios_bloque">
							<a href="../servicios-construccion/" title="Construcci&oacute;n y Dise&ntilde;o"><img src="../images/inicio/bloque1.jpg" border="0" class="mw_inicio_servicios_bloque_img" title="Construcci&oacute;n y Dise&ntilde;o" alt="Construcci&oacute;n y Dise&ntilde;o" /></a>
							<span class="mw_inicio_servicios_bloque_tit">Construcci&oacute;n y Dise&ntilde;o</span>
							<br />
							<span class="mw_inicio_servicios_bloque_txt">
							Dise&ntilde;o Arquitect&oacute;nico<br />
							Dise&ntilde;o Industrial<br />
							Dise&ntilde;o Interior
							<br />
							</span>
							<a href="../servicios-construccion/" title="Construcci&oacute;n y Dise&ntilde;o" class="mw_inicio_servicios_bloque_link">Ver m&aacute;s detalles...</a>
						</div>
						<div class="mw_inicio_servicios_bloque">
							<a href="../servicios-ingenieria/" title="Ingenier&iacute;a y Desarrollo"><img src="../images/inicio/bloque2.jpg" border="0" class="mw_inicio_servicios_bloque_img" title="Ingenier&iacute;a y Desarrollo" alt="Ingenier&iacute;a y Desarrollo" /></a>
							<span class="mw_inicio_servicios_bloque_tit">Ingenier&iacute;a y Desarrollo</span>
							<br />
							<span class="mw_inicio_servicios_bloque_txt">
								Ingenier&iacute;a Conceptual<br />
								Ingenier&iacute;a de campo<br />
								Nivelaci&oacute;n y alimentaci&oacute;n
								<br />
							</span>
							<a href="../servicios-ingenieria/" title="Ingenier&iacute;a y Desarrollo" class="mw_inicio_servicios_bloque_link">Ver m&aacute;s detalles...</a>
						</div>
						<div class="mw_inicio_servicios_bloque">
							<a href="../servicios-contra-incendios/" title="Sistemas Contra Incendios"><img src="../images/inicio/bloque3.jpg" border="0" class="mw_inicio_servicios_bloque_img" title="Sistemas Contra Incendios" alt="Sistemas Contra Incendios" /></a>
							<span class="mw_inicio_servicios_bloque_tit">Sistemas Contra Incendios</span>
							<br />
							<span class="mw_inicio_servicios_bloque_txt">
							Sistemas de extintores<br />
							Seguridad de obra<br />
							Sistemas de hidrantes
							<br />
							</span>
							<a href="../servicios-contra-incendios/" title="Sistemas Contra Incendios" class="mw_inicio_servicios_bloque_link">Ver m&aacute;s detalles...</a>
						</div>
						<div class="mw_inicio_servicios_bloque">
							<a href="../servicios-cimentacion/" title="Cimentaciones"><img src="../images/inicio/bloque4.jpg" border="0" class="mw_inicio_servicios_bloque_img" title="Cimentaciones" alt="Cimentaciones" /></a>
							<span class="mw_inicio_servicios_bloque_tit">Cimentaciones</span>
							<br />
							<span class="mw_inicio_servicios_bloque_txt">
							Piloteadoras sobre orugas<br />
							Piloteadoras sobre cami&oacute;n<br />
							Equipos de perfil bajo
							<br />
							</span>
							<a href="../servicios-cimentacion/" title="Cimentaciones" class="mw_inicio_servicios_bloque_link">Ver m&aacute;s detalles...</a>
						</div>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br />
<table cellpadding="0" cellspacing="0" align="center" id="mw_content_layer" name="mw_content_layer">
	<tr style="vertical-align:top;" valign="top">
		<td id="mw_inicio_proyectos_imagen" name="mw_inicio_proyectos_imagen"><?php 
			$sql_projects="SELECT mw_proyectos.*, (SELECT COUNT(IMAGEN_ID) FROM mw_proyectos_imagenes WHERE ESTATUS_ID=1 AND PROYECTO_ID=mw_proyectos.PROYECTO_ID) AS FOTOS FROM mw_proyectos 
								WHERE 
									mw_proyectos.ESTATUS_ID=1 AND 
									(SELECT COUNT(IMAGEN_ID) FROM mw_proyectos_imagenes WHERE PROYECTO_ID=mw_proyectos.PROYECTO_ID)>0 
								ORDER BY ORDEN DESC LIMIT 1 "; 
			$result_projects = @mysql_query($sql_projects); 
			if(@mysql_num_rows($result_projects)>0) 
			{
				while($row_projects=@mysql_fetch_array($result_projects)) 
				{
					$PROYECTO_ID=$row_projects["PROYECTO_ID"];
					$PROYECTO_NOMBRE=$row_projects["PROYECTO_NOMBRE"];
					$PROYECTO_PORTADA=''; 
					$sql_images="SELECT mw_proyectos_imagenes.* FROM mw_proyectos_imagenes 
										WHERE 
											mw_proyectos_imagenes.ESTATUS_ID=1 AND 
											mw_proyectos_imagenes.PROYECTO_ID='".$PROYECTO_ID."' 
										ORDER BY PORTADA DESC, IMAGEN_ID DESC "; 
					$result_images = @mysql_query($sql_images); 
					if(@mysql_num_rows($result_images)>0) 
					{
						while($row_images=@mysql_fetch_array($result_images)) 
						{
							$IMAGEN_ID=$row_images["IMAGEN_ID"];
							$IMAGEN=$row_images["IMAGEN"];
							$DESCRIPCION=$row_images["DESCRIPCION"]; 
							$PORTADA=$row_images["PORTADA"]; 
							
								if($IMAGEN && @file_exists('../images/proyectos/'.$IMAGEN) && $PORTADA==1 && !$PROYECTO_PORTADA) { $PROYECTO_PORTADA=$IMAGEN; } 
							elseif($IMAGEN && @file_exists('../images/proyectos/'.$IMAGEN) && !$PROYECTO_PORTADA) 				 { $PROYECTO_PORTADA=$IMAGEN; } 
							
						} 
					} 
					
					if($PROYECTO_PORTADA) 
					{ 
						?><a href="../proyectos/" title="<?php echo $PROYECTO_NOMBRE; ?>">
							<img src="<?php echo '../images/proyectos/'.$PROYECTO_PORTADA; ?>" id="proyecto<?php echo $PROYECTO_ID; ?>" name="proyecto<?php echo $PROYECTO_ID; ?>" class="mw_inicio_proyectos_thumb" border="0" alt="<?php echo $PROYECTO_NOMBRE; ?>" title="<?php echo $PROYECTO_NOMBRE; ?>" />
						</a><?php 
					} 
				} 
			} 
		?></td>
		<td id="mw_inicio_proyectos_ultimos" name="mw_inicio_proyectos_ultimos">
			<div class="mw_inicio_proyectos_bigtit">&Uacute;LTIMOS PROYECTOS: </div>
			<?php 
			
			$sql_projects="SELECT mw_proyectos.*, (SELECT COUNT(IMAGEN_ID) FROM mw_proyectos_imagenes WHERE ESTATUS_ID=1 AND PROYECTO_ID=mw_proyectos.PROYECTO_ID) AS FOTOS FROM mw_proyectos 
								WHERE 
									mw_proyectos.ESTATUS_ID=1 AND 
									(SELECT COUNT(IMAGEN_ID) FROM mw_proyectos_imagenes WHERE PROYECTO_ID=mw_proyectos.PROYECTO_ID)>0 
								ORDER BY ORDEN DESC LIMIT 0, 2 "; 
			$result_projects = @mysql_query($sql_projects); 
			if(@mysql_num_rows($result_projects)>0) 
			{
				while($row_projects=@mysql_fetch_array($result_projects)) 
				{
					$PROYECTO_ID=$row_projects["PROYECTO_ID"];
					$PROYECTO_NOMBRE=$row_projects["PROYECTO_NOMBRE"];
					$PROYECTO_DESCRIPCION=$row_projects["PROYECTO_DESCRIPCION"]; 
					
					?><br /><div class="mw_inicio_proyectos_descr">
						<a href="../proyectos/" class="mw_inicio_proyectos_name" title="<?php echo $PROYECTO_NOMBRE; ?>"><?php echo $PROYECTO_NOMBRE; ?></a><br />
						<a href="../proyectos/" class="mw_inicio_proyectos_descr" title="<?php echo $PROYECTO_DESCRIPCION; ?>"><?php echo $PROYECTO_DESCRIPCION; ?></a>
					</div><br />&nbsp;<br /><?php 
					
				} 
			} 
					
			?>
			<a href="../proyectos/" title="M&aacute;s Proyectos" class="mw_inicio_proyectos_btn">M&Aacute;S PROYECTOS</a>
		</td>
	</tr>
</table>
<br />