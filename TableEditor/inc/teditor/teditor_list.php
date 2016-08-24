<?php 

if(!stristr($_SERVER['PHP_SELF'], '/TableEditor/inc/teditor/teditor_list.php')) { } else { header('Location: ../../../'); @exit(); } 

$this->displayHeader(); 

?><form name="mw_te_list_form" id="mw_te_list_form" onSubmit="return false;" class="mw_te_list_form">
	<table border="0" cellpadding="0" cellspacing="0" name="mw_te_list_table" id="mw_te_list_table" class="mw_te_list_table" align="center">
		<?php 
		if($this->getConfig('searchableFields'))
		{
			$url_search = new TableEditor_URL(); $url_search->removeQueryString('search'); $link_search=$url_search->getURL(true); 
			?><tr>
				<td name="mw_te_list_search_td" id="mw_te_list_search_td" class="mw_te_list_search_td"><table border="0" cellpadding="0" cellspacing="0" name="mw_te_list_search" id="mw_te_list_search" class="mw_te_list_search" align="center">
					<tr>
						<td id="mw_te_list_search_field_td" name="mw_te_list_search_field_td"><input type="hidden" id="mw_te_list_search_url" name="mw_te_list_search_url" value="<?php echo $link_search; ?>" /><input type="text" value="<?php echo $this->search; ?>" id="mw_te_list_search_field" name="mw_te_list_search_field" placeholder="<?php echo mw_te_htmlentities(mw_te_btn_search); ?>" onkeypress="app_te_search_event();" class="mw_te_list_search_field" /></td>
						<td id="mw_te_list_search_submit_td" name="mw_te_list_search_submit_td"><input type="button" id="mw_te_list_search_submit" name="mw_te_list_search_submit" class="mw_te_btn" value="<?php echo mw_te_htmlentities(mw_te_btn_search); ?>" title="<?php echo mw_te_htmlentities(mw_te_btn_search); ?>" alt="<?php echo mw_te_htmlentities(mw_te_btn_search); ?>" onclick="app_te_search()" /></td>
					</tr>
					<?php 
					if(isset($this->search)) 
					{ 
						?><tr>
							<td colspan="2" id="mw_te_list_search_clear_td" name="mw_te_list_search_clear_td">
								<a href="<?php echo $link_search; ?>" class="mw_te_list_search_clear_link" title="<?php echo mw_te_htmlentities(mw_te_btn_search_clear); ?>">
									<?php echo mw_te_htmlentities(mw_te_btn_search_clear); ?>
								</a>
							</td>
						</tr><?php 
					} 
					?>
				</table></td>
			</tr><?php 
		}
		?><tr><td name="mw_app_list_pager" id="mw_app_list_pager" class="mw_app_list_pager"><?php echo mw_te_pager_list($total, $this->config['perPage']); ?></td></tr>
		<tr><td name="mw_te_list_btns_top" id="mw_te_list_btns_top" class="mw_te_list_btns_top"><?php echo $this->displayActionButtons(); ?></td></tr>
		<?php 
		if(!empty($results)) 
		{ 
			$mw_te_tit_result_id=0; 
			?><tr>
				<td><table cellpadding="0" cellspacing="0" align="center" class="mw_te_list_table">
					<tr class="mw_te_list_tit"><?php 
						$mw_te_tits_count=0; 
						$mw_te_tits_result=0; 
						if(!empty($this->shortcuts[$this->table]['left_shortcut']))
						{
							foreach($this->shortcuts[$this->table]['left_shortcut'] as $shortcut => $html_shortcut) 
							{ 
								$mw_te_tits_count++; 
								?><td class="mw_te_list_tit_shortcut">&nbsp;</td><?php 
							} 
						} 
						foreach($this->fields as $field => $f) 
						{
							$mw_te_tits_result++; 
							if(empty($f['noDisplay'])) 
							{ 
								if($this->orderby['field'] == $field && $this->orderby['direction'] == 1) { $field_orderby=':desc'; } else { $field_orderby=''; } 
								$field_name_display=mw_te_field_name($f['display']); 
								
								$url_orderby = new TableEditor_URL(); $url_orderby->removeQueryString('orderby'); $url_orderby->addQueryString('orderby', $field.''.$field_orderby); 
								$link_orderby=$url_orderby->getURL(true); 
								
								if($this->pk==$field && $this->config['id_in_list']==false) { $mw_te_tit_result_id=$mw_te_tits_result; } 
								else
								{ 
									$mw_te_tits_count++; 
									
									?><td class="mw_te_list_tit" id="mw_te_list_tit_<?php echo $this->table; ?>_<?php echo $field; ?>" name="mw_te_list_tit_<?php echo $this->table; ?>_<?php echo $field; ?>"><a href="<?php echo $link_orderby; ?>" class="mw_te_list_tit_link" title="<?php echo mw_te_htmlentities(mw_app_str_A0028.' '.$field_name_display); ?>"><?php 
										echo $field_name_display; 
										if($this->orderby['field'] == $field)
										{ 
											if($this->orderby['direction'] == 1) 
											{ 
												echo mw_te_image('orderby_asc.png', ''.mw_te_path_css.'images/list/', 0, 0, '', 'mw_te_list_img_asc'); 
											} 
											else
											{ 
												echo mw_te_image('orderby_desc.png', ''.mw_te_path_css.'images/list/', 0, 0, '', 'mw_te_list_img_desc'); 
											}
										} 
									?></a></td><?php 
								} 
							} 
						} 
						if(!empty($this->shortcuts[$this->table]['right_shortcut']))
						{
							foreach($this->shortcuts[$this->table]['right_shortcut'] as $shortcut => $html_shortcut) 
							{ 
								$mw_te_tits_count++; 
								?><td class="mw_te_list_tit_shortcut">&nbsp;</td><?php 
							} 
						} 
					?></tr>
					<?php 
					foreach($results as $k => $row) 
					{ 
						if($k % 2 == 1) { $mw_te_row_class='mw_te_list_txt_row1'; } else { $mw_te_row_class='mw_te_list_txt_row2'; } 
						?><tr class="<?php echo $mw_te_row_class; ?>" onmouseover="app_te_class_change(this, '<?php echo $mw_te_row_class; ?>');" onmouseout="app_te_class_change(this, '<?php echo $mw_te_row_class; ?>');"><?php 
							if(!empty($this->shortcuts[$this->table]['left_shortcut']))
							{
								foreach($this->shortcuts[$this->table]['left_shortcut'] as $shortcut => $html_shortcut) 
								{ 
									$html_shortcut=str_replace('mw_te_id_ico', $nonFilteredData[$k][$this->pk], $html_shortcut); 
									?><td class="mw_te_list_txt_shortcut"><?php echo $html_shortcut; ?></td><?php 
								} 
							} 
							$count_column_result=0; 
							foreach($row as $v)
							{
								$count_column_result++; 
								if($count_column_result==$mw_te_tit_result_id && $this->config['id_in_list']==false) { } 
								else
								{ 
									$tits_count=0; $field_cur=''; 
									foreach($this->fields as $field => $f) 
									{ 
										if(empty($f['noDisplay'])) 
										{ 
											$tits_count++; if($tits_count==$count_column_result) { $field_cur=$field; } 
										} 
									} 
									
									$style=''; 
									if($this->fields[$field_cur]['fieldDisplayPosition']=="center")	{ $style=' style="text-align:center;"'; } 
									if($this->fields[$field_cur]['fieldDisplayPosition']=="left")	{ $style=' style="text-align:left;"'; }  
									if($this->fields[$field_cur]['fieldDisplayPosition']=="right")	{ $style=' style="text-align:right;"'; } 
									?><td id="mw_te_list_txt_<?php echo $this->table; ?>_<?php echo $field_cur; ?>" name="mw_te_list_txt_<?php echo $this->table; ?>_<?php echo $field_cur; ?>" class="mw_te_list_txt"<?php echo $style; ?>><?php 
										
										$v_len=strlen($v); 
										$false_v=array('<span class="mw_te_list_row_search">', '<', '/>'); $count_false_v=0; 
										foreach($false_v as $false_v_v) 
										{ 
											$pos = strpos(strtoupper($v), strtoupper($false_v_v)); if($pos === false) { } else { $count_false_v++; } 
										}
										if( $count_false_v==0 && $v_len>=30 ) { $v=substr($v,0,27).'...'; } elseif(!$v) { $v="&nbsp;"; } 
										echo $v; 
									?></td><?php 
								} 
							} 
							if(!empty($this->shortcuts[$this->table]['right_shortcut']))
							{
								foreach($this->shortcuts[$this->table]['right_shortcut'] as $shortcut => $html_shortcut) 
								{ 
									$html_shortcut=str_replace('mw_te_id_ico', $nonFilteredData[$k][$this->pk], $html_shortcut); 
									?><td class="mw_te_list_txt_shortcut"><?php echo $html_shortcut; ?></td><?php 
								} 
							} 
						?></tr><?php 
					} 
					?>
				</table></td>
			</tr><?php 
		} 
		else { ?><tr><td><div class="mw_te_error"><?php echo mw_te_htmlentities(mw_te_37707_t307); ?></div></td></tr><?php } ?>		 
		<tr><td name="mw_te_list_btns_foot" id="mw_te_list_btns_foot" class="mw_te_list_btns_foot"><?php echo $this->displayActionButtons(); ?></td></tr>
	</table>
</form>