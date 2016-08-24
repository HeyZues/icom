<?php
/* 
-- Id: site/includes/04_proyectos.php 2014-11-19 
-- Copyright (c) 2014 MovimientoWeb.com
-- Created by: Raul Morales Ferrer
*/

?><table cellpadding="0" cellspacing="0" align="center" id="mw_content_layer" name="mw_content_layer">
	<tr>
		<td id="mw_proyectos_contenido_img_00" name="mw_proyectos_contenido_img_00">
			<img src="../images/proyectos_img_00.jpg" id="mw_proyectos_img_00" name="mw_proyectos_img_00" border="0" title="ICOM Ingenier&iacute;a y Construcci&oacute;n" alt="ICOM Ingenier&iacute;a y Construcci&oacute;n" />
		</td>
	</tr>
	<tr>
		<td id="mw_proyectos_contenido_img_01" name="mw_proyectos_contenido_img_01">
			<img src="../images/proyectos_img_01.jpg" id="mw_proyectos_img_01" name="mw_proyectos_img_01" border="0" title="Proyectos - ICOM Ingenier&iacute;a y Construcci&oacute;n" alt="Proyectos - ICOM Ingenier&iacute;a y Construcci&oacute;n" />
		</td>
	</tr>
	<tr>
		<td id="mw_proyectos_contenido_txt" name="mw_proyectos_contenido_txt">
			Conozca algunos de los proyectos en los cuales <strong>ICOM Ingenier&iacute;a y Construcci&oacute;n</strong> ha participado:<br /> 
			<span class="mw_proyectos_msg">(Haga clic sobre las im&aacute;genes para ingresar al proyecto deseado y ver m&aacute;s fotograf&iacute;as)</span>
		</td>
	</tr>
</table>
<table cellpadding="0" cellspacing="0" align="center" id="mw_content_layer" name="mw_content_layer">
	<tr>
		<td><table cellpadding="0" cellspacing="0" align="center" id="mw_proyectos_images" name="mw_proyectos_images"><tr><td><?php 
			$sql_projects="SELECT mw_proyectos.*, (SELECT COUNT(IMAGEN_ID) FROM mw_proyectos_imagenes WHERE ESTATUS_ID=1 AND PROYECTO_ID=mw_proyectos.PROYECTO_ID) AS FOTOS FROM mw_proyectos 
								WHERE 
									mw_proyectos.ESTATUS_ID=1 AND 
									(SELECT COUNT(IMAGEN_ID) FROM mw_proyectos_imagenes WHERE PROYECTO_ID=mw_proyectos.PROYECTO_ID)>0 
								ORDER BY ORDEN DESC "; 
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
						?><div class="mw_proyectos_list"><table cellpadding="0" cellspacing="0" align="center">
							<tr><td class="mw_proyectos_tit"><?php echo $PROYECTO_NOMBRE; ?></td></tr>
							<tr>
								<td>
									<img src="<?php echo '../images/proyectos/'.$PROYECTO_PORTADA; ?>" id="proyecto<?php echo $PROYECTO_ID; ?>" name="proyecto<?php echo $PROYECTO_ID; ?>" class="mw_proyectos_thumb" border="0" alt="<?php echo $PROYECTO_NOMBRE; ?>" title="<?php echo $PROYECTO_NOMBRE; ?>" />
									
								</td>
							</tr>
						</table></div><?php 
					} 
				} 
			} 
		?></td></tr></table></td>
	</tr>
</table><br />
<script language="javascript" type="text/javascript"> 
	jQuery(document).ready(function($) { 
		<?php 
		$sql_projects="SELECT mw_proyectos.*, (SELECT COUNT(IMAGEN_ID) FROM mw_proyectos_imagenes WHERE ESTATUS_ID=1 AND PROYECTO_ID=mw_proyectos.PROYECTO_ID) AS FOTOS FROM mw_proyectos 
							WHERE 
								mw_proyectos.ESTATUS_ID=1 AND 
								(SELECT COUNT(IMAGEN_ID) FROM mw_proyectos_imagenes WHERE PROYECTO_ID=mw_proyectos.PROYECTO_ID)>0 
							ORDER BY ORDEN DESC "; 
		$result_projects = @mysql_query($sql_projects); 
		if(@mysql_num_rows($result_projects)>0) 
		{
			while($row_projects=@mysql_fetch_array($result_projects)) 
			{
				$PROYECTO_ID=$row_projects["PROYECTO_ID"]; 
				?>$("#proyecto<?php echo $PROYECTO_ID; ?>").click(function() { <?php 
					$sql_images="SELECT mw_proyectos_imagenes.* FROM mw_proyectos_imagenes 
										WHERE 
											mw_proyectos_imagenes.ESTATUS_ID=1 AND 
											mw_proyectos_imagenes.PROYECTO_ID='".$PROYECTO_ID."' 
										ORDER BY PORTADA DESC, IMAGEN_ID DESC "; 
					$result_images = @mysql_query($sql_images); 
					if(@mysql_num_rows($result_images)>0) 
					{
						$count_result_images=(int)@mysql_num_rows($result_images); 
						$count_exists_images=0; 
						?>$.lightbox([ <?php 
						while($row_images=@mysql_fetch_array($result_images)) 
						{
							$IMAGEN_ID=$row_images["IMAGEN_ID"];
							$IMAGEN=$row_images["IMAGEN"];
							$DESCRIPCION=$row_images["DESCRIPCION"]; 
							
							if($IMAGEN && @file_exists('../images/proyectos/'.$IMAGEN)) 
							{ 
								if($count_exists_images>0) { ?>, <?php } 
								?>{ href : "../images/proyectos/<?php echo $IMAGEN; ?>", title : "<?php echo $DESCRIPCION; ?>" }<?php 
								$count_exists_images++; 
							} 							
						} 
						?>]); return false; <?php 
					} 
				?>}); <?php 
			} 
		} 
		?>
	}); 
</script>
