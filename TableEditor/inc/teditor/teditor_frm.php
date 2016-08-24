<?php 

if(!stristr($_SERVER['PHP_SELF'], '/TableEditor/inc/teditor/teditor_frm.php')) { } else { header('Location: ../../../'); @exit(); } 

$url_frm = new TableEditor_URL(); 
$link_frm = $url_frm->getURL(true); 

$table=$this->table;
$edit=$this->edit;
$add=$this->add; 

?><form action="<?php echo $link_frm; ?>" method="post" enctype="multipart/form-data" id="mw_te_frm" name="mw_te_frm" onsubmit="return mw_te_validation('mw_te_frm', '<?php echo mw_te_htmlentities(mw_te_37707_tj01); ?>', '<?php echo mw_te_htmlentities(mw_te_37707_tj02); ?>');">
	<?php 
	foreach($row as $field => $value) 
	{ 
		$field_name=mw_te_htmlentities($field); $field_value=mw_te_htmlentities($value); 
		if(($this->fields[$field]['fieldHidden'])) 
		{ 
			?><input type="hidden" value="<?php echo $field_value; ?>" id="<?php echo $field_name; ?>" name="<?php echo $field_name; ?>" /><?php 
		} 
	} 
	?>
	<table border="0" cellpadding="0" cellspacing="0" align="center" id="mw_te_frm_table" name="mw_te_frm_table">
		<?php 
		$fields_count=0; 
		$fields_count_date=0; 
		$fields_count_currency=0; 
		$fields_required_count=0; 
		foreach($row as $field => $value) 
		{ 
			$field_name=mw_te_htmlentities($field); $field_value=mw_te_htmlentities($value); 
			if(!empty($_POST)) { if(isset($_POST[$field])) { $field_value=$_POST[$field]; } } 
			if( $this->fields[$field]['fieldHidden'] ) { } 
			else
			{
				$fields_count++; 
				if($this->fields[$field]['fieldTitle']) 
				{ 
					?><tr><td>&nbsp;</td></tr><tr><td colspan="2" id="title_<?php echo $field_name; ?>" name="title_<?php echo $field_name; ?>" class="mw_te_list_tit_field"><?php 
						echo $this->fields[$field]['fieldTitle']; 
					?></td></tr><?php 
				} 
				?><tr id="element_<?php echo $field_name; ?>" name="element_<?php echo $field_name; ?>" class="mw_te_frm_field_row">
					<td id="element_name_<?php echo $field_name; ?>" name="element_name_<?php echo $field_name; ?>" class="mw_te_list_tit mw_te_frm_tit_align"><?php 
						if(!empty($this->fields[$field]['required'])) { ?><span class="mw_te_frm_required">[*]</span><?php $fields_required_count++; } 
						echo mw_te_field_name($this->fields[$field]['display']).':'; 
					?></td>
					<td id="element_frm_<?php echo $field_name; ?>" name="element_frm_<?php echo $field_name; ?>" class="mw_te_frm_field"><?php 
						if(!empty($this->fields[$field]['required'])) { $field_css_class='mw_te_frm_field_req'; } else { $field_css_class='mw_te_frm_field_noreq'; } 
						$mw_te_input_default='  id="'.$field_name.'" name="'.$field_name.'" class="'.$field_css_class.'" tabindex="'.$fields_count.'"'; 
						if(!empty($this->fields[$field]['required'])) 	{ $mw_te_input_default.=' required="required"'; } 
						if($this->fields[$field]['uppersave']==true) 	{ $mw_te_input_default.=' style="text-transform:uppercase;"'; } 
						
						//echo $this->fields[$field]['input'];
						switch($this->fields[$field]['input']) 
						{
							case 'select': 
								$mw_te_js=''; 
								if($this->fields[$field]['fieldAjax']) 
								{ 
									$load_field2=$this->fields[$field]['fieldAjaxF2']; 
									$load_field2_name=$this->fields[$field]['fieldAjaxF2_name']; 
									$load_field2_table=$this->fields[$field]['fieldAjaxF2_table']; 
									$load_field1_tab_fId=$this->fields[$field]['fieldAjaxF1_tab_fId']; 
									$load_field2_tab_fId=$this->fields[$field]['fieldAjaxF2_tab_fId']; 
									$load_field2_js=$this->fields[$field]['fieldAjaxF2_js']; 
									if(!empty($this->fields[$load_field2]['required'])) { $field2_css_class='mw_te_frm_field_req'; } else { $field2_css_class='mw_te_frm_field_noreq'; } 
									$mw_te_js=' onchange="mw_te_load_list_ajax(\''.$field.'\', \''.$load_field2.'\', \''.mw_te_path.'\', \''.$field2_css_class.'\', \''.$load_field2_name.'\', \''.$load_field2_table.'\', \''.$load_field1_tab_fId.'\', \''.$load_field2_tab_fId.'\', \''.$load_field2_js.'\');'; 
									if($this->fields[$field]['fieldJs'] && $this->fields[$field]['fieldJsEvent']=='onchange') 
									{
										$mw_te_js.=$this->fields[$field]['fieldJsAction']; 
									}
									$mw_te_js.='" '; 
								} 
								?><select <?php echo $mw_te_input_default.$mw_te_js; ?>>
									<option value=""><?php echo mw_te_htmlentities(mw_te_frm_select_tit); ?></option>
									<?php 
									if($this->fields[$field]['values']) 
									{ 
										foreach($this->fields[$field]['values'] as $k => $v) 
										{ 
											if((string)$k === $field_value) { $field_default_selected=' selected'; } else { $field_default_selected=''; } 
											?><option value="<?php echo mw_te_htmlentities($k); ?>"<?php echo $field_default_selected; ?>><?php 
												echo mw_te_htmlentities($v); 
											?></option><?php 
										} 
									} 
								?></select><?php 
							break; 
							case 'textarea': 
								if(!empty($this->fields[$field]['required'])) { $field_css_class='mw_te_frm_field_tarea_req'; } else { $field_css_class='mw_te_frm_field_tarea_req'; } 
								$mw_te_input_default='  id="'.$field_name.'" name="'.$field_name.'" class="'.$field_css_class.'" tabindex="'.$fields_count.'"'; 
								$mw_te_input_default.=' placeholder="'.mw_te_field_name($this->fields[$field]['display']).'" '; 
								if($this->fields[$field]['uppersave']==true) 	{ $mw_te_input_default.=' style="text-transform:uppercase;"'; } 
								if(!empty($this->fields[$field]['required'])) 	{ $mw_te_input_default.=' required="required"'; } 
								?><textarea <?php echo $mw_te_input_default; ?>><?php echo $field_value; ?></textarea><?php 
							break; 
							case 'password': 
								if($this->add) 
								{
									$mw_te_input_default.=' value="'.$field_value.'"'; 
									$mw_te_input_default.=' placeholder="'.mw_te_field_name($this->fields[$field]['display']).'" '; 
									?><input type="password" <?php echo $mw_te_input_default; ?> /><?php 
								}
								else
								{ 
									$field_css_class='mw_te_frm_field_noreq'; 
									$mw_te_input_default='  id="'.$field_name.'_change" name="'.$field_name.'_change" class="'.$field_css_class.'" tabindex="'.$fields_count.'"'; 
									$mw_te_input_default.=' value=""'; 
									$mw_te_input_default.=' placeholder="'.mw_te_htmlentities(mw_te_users_pwd_change).'" '; 
									?><input type="hidden" id="<?php echo $field_name; ?>" name="<?php echo $field_name; ?>" value="<?php echo $field_value; ?>" /><?php 
									?><input type="password" <?php echo $mw_te_input_default; ?> /><?php 
								}
							break;
							case "email": 
								if(!empty($this->fields[$field]['required'])) { $field_css_class='mw_te_frm_field_email_req'; } else { $field_css_class='mw_te_frm_field_email_noreq'; } 
								$mw_te_input_default='  id="'.$field_name.'" name="'.$field_name.'" class="'.$field_css_class.'" tabindex="'.$fields_count.'"'; 
								if(!empty($this->fields[$field]['required'])) 	{ $mw_te_input_default.=' required="required"'; } 
								$mw_te_input_default.=' style="text-transform:lowercase;"'; 
								$mw_te_input_default.=' value="'.$field_value.'"'; 
								$mw_te_input_default.=' placeholder="'.mw_te_field_name($this->fields[$field]['display']).'" '; 
								?><input type="text" <?php echo $mw_te_input_default; ?> /><?php 
							break; 
							case 'file': 
								if($this->add) 
								{
									$mw_te_input_default.=' placeholder="'.mw_te_field_name($this->fields[$field]['display']).'" '; 
									$mw_te_input_default.=' value="'.$field_value.'"'; 
									?><input type="file" <?php echo $mw_te_input_default; ?> /><?php 
								} 
								elseif($this->edit>0)
								{ 
									if($field_value) 
									{ 
										$file_upload_path=$this->fields[$field]['fileUploadPath']; 
										
										?><a href="<?php echo $file_upload_path.$field_value; ?>" title="<?php echo mw_te_htmlentities(mw_te_current_file_view); ?>" class="mw_te_frm_current_file_view" target="_blank"><?php 
											$file_ext=mw_te_doctype($field_value, 1); 
											if(strtoupper($file_ext)=='JPG') 
											{ 
												echo mw_te_htmlentities(mw_te_current_file_view); 
											} 
											else { echo mw_te_htmlentities(mw_te_current_file_view); } 
										?></a><?php 
									} 
									if(!empty($this->fields[$field]['required'])) 
									{ 
										$field_css_class='mw_te_frm_field_req'; 
										if($field_value) { $field_css_class='mw_te_frm_field_noreq'; $mw_te_input_default.=' required="required"'; } 
									} 
									else { $field_css_class='mw_te_frm_field_noreq'; } 
									$mw_te_input_default='  id="'.$field_name.'_new" name="'.$field_name.'_new" class="'.$field_css_class.'" tabindex="'.$fields_count.'"'; 
									?><input type="hidden" id="<?php echo $field_name; ?>" name="<?php echo $field_name; ?>" value="<?php echo $field_value; ?>" /><?php 
									?><input type="file" <?php echo $mw_te_input_default; ?> /><?php 
								} 
							break; 
							case 'int': 
								if(!empty($this->fields[$field]['required'])) { $field_css_class='mw_te_frm_field_int_req'; } else { $field_css_class='mw_te_frm_field_int_noreq'; } 
								$mw_te_input_default='  id="'.$field_name.'" name="'.$field_name.'" class="'.$field_css_class.'" tabindex="'.$fields_count.'"'; 
								$mw_te_input_default.=' value="'.$field_value.'"'; 
								if(!empty($this->fields[$field]['required'])) 	{ $mw_te_input_default.=' required="required"'; } 
								
								?><input type="text" <?php echo $mw_te_input_default; ?> /><?php 
							break; 
							case 'date':
								$fields_count_date++; 
								if($fields_count_date==1)
								{ 
									?><script language="javascript" type="text/javascript" src="<?php echo mw_te_path; ?>js/jqueryui/ui/jquery.ui.datepicker.js"></script><?php 
								} 
								?><script type="text/javascript" language="javascript">
									$(function() {
										$( "#<?php echo $field_name; ?>" ).datepicker({
											dateFormat: "dd/mm/yy", 
											defaultDate: "+1w",
											changeMonth: true,
											numberOfMonths: 1<?php 
											if($this->fields[$field]['fieldDateRangeMinDate']) 
											{ 
												$fieldDateRangeMinDate=$this->fields[$field]['fieldDateRangeMinDate']; 
												echo ', 
												onClose: function( selectedDate ) { 
													$( "#'.$fieldDateRangeMinDate.'" ).datepicker( "option", "minDate", selectedDate );
												} '; 
											} 
											if($this->fields[$field]['fieldDateRangeMaxDate']) 
											{ 
												$fieldDateRangeMaxDate=$this->fields[$field]['fieldDateRangeMaxDate']; 
												echo ', 
												onClose: function( selectedDate ) { 
													$( "#'.$fieldDateRangeMaxDate.'" ).datepicker( "option", "maxDate", selectedDate );
												} '; 
											} ?>
										});
									});
								</script><?php 
								if(!empty($this->fields[$field]['required'])) { $field_css_class='mw_te_frm_field_date_req'; } else { $field_css_class='mw_te_frm_field_date_noreq'; } 
								$mw_te_input_default='  id="'.$field_name.'" name="'.$field_name.'" class="'.$field_css_class.'" tabindex="'.$fields_count.'"'; 
								$field_value_date=mw_te_MySQL_to_date($field_value); 
								if($field_value_date=='00/00/0000') { $field_value_date=''; } 
								$mw_te_input_default.=' value="'.$field_value_date.'"'; 
								?><input type="text" <?php echo $mw_te_input_default; ?> /><?php 
								
							break;
							case 'time': 
								if(!empty($this->fields[$field]['required'])) { $field_css_class='mw_te_frm_field_time_req'; } else { $field_css_class='mw_te_frm_field_time_noreq'; } 
								$time_array=explode(":", $field_value); $field_value_hour=$time_array[0]; $field_value_min=$time_array[1]; $field_value_sec=$time_array[2]; 
								
								$mw_date_input_time_hour=' id="'.$field_name.'_hour" name="'.$field_name.'_hour" class="'.$field_css_class.'" tabindex="'.$fields_count.'"'; 
								?><select <?php echo $mw_date_input_time_hour; ?>><?php 
									for ($hour = 0; $hour <= 23; $hour++) 
									{
										?><option value="<?php echo $hour; ?>" <?php if($hour==$field_value_hour) { echo 'selected'; } ?>><?php 
											echo mw_te_complete($hour, 2, '0', 1); ?></option><?php 
									} 
								?></select>:<?php 
								$fields_count++; 
								$mw_date_input_time_min=' id="'.$field_name.'_min" name="'.$field_name.'_min" class="'.$field_css_class.'" tabindex="'.$fields_count.'"'; 
								?><select <?php echo $mw_date_input_time_min; ?>><?php 
									for ($min = 0; $min <= 59; $min++) 
									{
										?><option value="<?php echo $min; ?>" <?php if($min==$field_value_min) { echo 'selected'; } ?>><?php 
											echo mw_te_complete($min, 2, '0', 1); ?></option><?php 
									} 
								?></select>:<?php 
								$fields_count++; 
								$mw_date_input_time_sec=' id="'.$field_name.'_sec" name="'.$field_name.'_sec" class="'.$field_css_class.'" tabindex="'.$fields_count.'"'; 
								?><select <?php echo $mw_date_input_time_sec; ?>><?php 
									for ($sec = 0; $sec <= 59; $sec++) 
									{
										?><option value="<?php echo $sec; ?>" <?php if($sec==$field_value_sec) { echo 'selected'; } ?>><?php 
											echo mw_te_complete($sec, 2, '0', 1); ?></option><?php 
									} 
								?></select><?php 
							break; 
							case 'currency':
								$fields_count_currency++; 
								if($fields_count_currency==1)
								{ 
									?><script language="javascript" type="text/javascript" src="<?php echo mw_te_path; ?>js/currency/jquery.formatCurrency-1.4.0.js"></script><?php 
									?><script language="javascript" type="text/javascript" src="<?php echo mw_te_path; ?>js/currency/jquery.formatCurrency.all.js"></script><?php 
								} 
								
								?><script language="javascript" type="text/javascript">
									$(document).ready(function() { 
										$('#<?php echo $field_name; ?>').blur(function() 
										{ 
											$('#<?php echo $field_name; ?>').formatCurrency({symbol:''}); 
										}); 
									}); 
								</script><?php 

								if(!empty($this->fields[$field]['required'])) { $field_css_class='mw_te_frm_field_currency_req'; } else { $field_css_class='mw_te_frm_field_currency_noreq'; } 
								$mw_te_input_default='  id="'.$field_name.'" name="'.$field_name.'" class="'.$field_css_class.'" tabindex="'.$fields_count.'"'; 
								$mw_te_input_default.=' value="'.$field_value.'"'; 
								//if(!empty($this->fields[$field]['required'])) 	{ $mw_te_input_default.=' required="required"'; } 
								?><input type="text" <?php echo $mw_te_input_default; ?> />
								<script language="javascript" type="text/javascript">
									$('#<?php echo $field_name; ?>').formatCurrency({symbol:''}); 
								</script><?php 
							break; 
							case 'rfc': 
								if(!empty($this->fields[$field]['required'])) { $field_css_class='mw_te_frm_field_rfc_req'; } else { $field_css_class='mw_te_frm_field_rfc_noreq'; } 
								$mw_te_input_default='  id="'.$field_name.'" name="'.$field_name.'" class="'.$field_css_class.'" tabindex="'.$fields_count.'"'; 
								$mw_te_input_default.=' value="'.$field_value.'"'; 
								$mw_te_input_default.=' placeholder="'.mw_te_field_name($this->fields[$field]['display']).'" '; 
								if($this->fields[$field]['uppersave']==true) 	{ $mw_te_input_default.=' style="text-transform:uppercase;"'; } 
								if(!empty($this->fields[$field]['required'])) 	{ $mw_te_input_default.=' required="required"'; } 
								
								?><input type="text" <?php echo $mw_te_input_default; ?> /><?php 
							break; 
							case 'phone':
							case 'text': 
							default: 
								$mw_te_input_default.=' value="'.$field_value.'"'; 
								$mw_te_input_default.=' placeholder="'.mw_te_field_name($this->fields[$field]['display']).'" '; 
								//echo $this->fields[$field]['input'];
								?><input type="text" <?php echo $mw_te_input_default; ?> /><?php 
							break; 
						}
					?></td>
				</tr><?php 
				if(!empty($this->contextErrors[$field])) 
				{ 
					?><tr><td colspan="2"><div class="mw_te_error"><?php echo $this->contextErrors[$field]; ?></div></td></tr><?php 
				} 
			} 
		} 
		?>
		<?php 
		if($this->config['frm_extends_file'] && @file_exists($this->config['frm_extends_file'])) 
		{ 
			?><tr><td colspan="2"><?php @include($this->config['frm_extends_file']); ?></td></tr><?php 
		} 
		else { ?><tr><td colspan="2">&nbsp;</td></tr><?php } 
		
		if($fields_required_count>0) 
		{ 
			?><tr><td colspan="2" class="mw_te_frm_required_info"><span class="mw_te_frm_required"><?php echo mw_te_frm_required; ?></span></td></tr><?php 
		} 
		?>
		<tr>
			<td colspan="2" id="mw_te_frm_element_submit" name="mw_te_frm_element_submit"><?php
				$btns='<input type="submit" class="mw_te_btn" id="mw_app_frm_submit" name="mw_app_frm_submit" value="'.mw_te_htmlentities(mw_te_btn_save).'" title="'.mw_te_htmlentities(mw_te_btn_save).'" alt="'.mw_te_htmlentities(mw_te_btn_save).'" />'; 
				$btns.='<input type="button" id="mw_te_btn_close" name="mw_te_btn_close" class="mw_te_btn" onclick="document.location=\''.mw_te_client_path.'\'" value="'.mw_te_htmlentities(mw_te_btn_close).'" title="'.mw_te_htmlentities(mw_te_btn_close).'" alt="'.mw_te_htmlentities(mw_te_btn_close).'" />'; 
				echo $btns; 
			?></td>
		</tr>
	</table>
</form><?php 

?>