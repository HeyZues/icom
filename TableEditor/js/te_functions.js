function app_te_search_event(e) { if(window.event) { if(window.event.keyCode==13) { app_te_search(); } } else { if(e) { if(e.which==13) { app_te_search(); } } } } 
function app_te_search() 
{ 
	var url=document.getElementById('mw_te_list_search_url').value; 
	var str=document.getElementById('mw_te_list_search_field').value; 
	location.href = url + (url.search.length ? '&' : '?') + 'search=' + str;
}
function app_te_class_change(trObj, classObj)
{
	if(trObj.className == 'mw_te_list_txt_row3') { trObj.className = classObj; } 
	else { trObj.className = 'mw_te_list_txt_row3'; } 
}
function app_te_email_validate(email) { if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) { return true; } else { return false; } } 

function mw_te_validation(frmName, error1, error2) 
{
	frmName=document.getElementById(frmName);
	var fields=frmName.length;
	if(fields>0)
	{
		for(var field_count=0; field_count<fields; field_count++)
		{
			var field_class=frmName.elements[field_count].className;
			var field_type=frmName.elements[field_count].type; 
			if((field_type=='text') || (field_type=='textarea') || (field_type=='password') || (field_type=='file')) 
			{ 
				frmName.elements[field_count].value=mw_te_trim(frmName.elements[field_count].value); 
			} 
			var field_value=frmName.elements[field_count].value; 
			var field_name=frmName.elements[field_count].name;
			var field_id=frmName.elements[field_count].id; 
			//alert("field_class: "+field_class+";\n field_type: "+field_type+";\n field_value: "+field_value+";\n field_name: "+field_name+";\n field_id: "+field_id);
			if(field_class)
			{
				switch(field_class)
				{
					case 'mw_te_frm_field_req': 
						if((field_type=='text') || (field_type=='textarea') || (field_type=='password') || (field_type=='select-one') || (field_type=='file')) 
						{
							if(!field_value) { if(error1) { alert(error1); } frmName.elements[field_count].focus(); return false; } 
						}
					break;
					case "mw_te_frm_field_email_req": 
						if(field_type=='text')
						{
							if(!field_value) { if(error1) { alert(error1); } frmName.elements[field_count].focus(); return false; } 
							else if(!app_te_email_validate(field_value)) 
							{ 
								frmName.elements[field_count].value=''; alert("Formato de correo electrónico incorrecto!"); 
								frmName.elements[field_count].focus(); return false; 
							}
						}
					break;
					case "mw_te_frm_field_email_noreq": 
						if(field_type=='text')
						{
							if(field_value && !app_te_email_validate(field_value)) 
							{ 
								frmName.elements[field_count].value=''; alert("Formato de correo electrónico incorrecto!"); 
								frmName.elements[field_count].focus(); return false; 
							}
						}
					break; 
					case "mw_te_frm_field_int_req":
						if(field_type=='text')
						{
							if(!field_value) { if(error1) { alert(error1); } frmName.elements[field_count].focus(); return false; } 
							else if(!mw_te_int(field_value)) 
							{ 
								frmName.elements[field_count].value=''; alert("Esto no es un número entero!\nNo debe contener Letras, comas, puntos, etc."); 
								frmName.elements[field_count].focus(); return false; 
							}
						}
					break;
					case "mw_te_frm_field_int_noreq":
						if(field_type=='text')
						{
							if(field_value && !mw_te_int(field_value)) 
							{ 
								frmName.elements[field_count].value=''; alert("Esto no es un número entero!\nNo debe contener Letras, comas, puntos, etc."); 
								frmName.elements[field_count].focus(); return false; 
							}
						}
					break;
					case "mw_te_frm_field_rfc_req": 
						if(field_type=='text')
						{
							if(!field_value) { if(error1) { alert(error1); } frmName.elements[field_count].focus(); return false; } 
							else if(!mw_te_rfc(field_value)) 
							{ 
								frmName.elements[field_count].value=''; alert("El campo R. F. C. solo debe contener entre 12 y 13 caracteres!"); 
								frmName.elements[field_count].focus(); return false; 
							}
						}
					break;
					case "mw_te_frm_field_rfc_noreq":
						if(field_type=='text')
						{
							if(field_value && !mw_te_rfc(field_value)) 
							{ 
								frmName.elements[field_count].value=''; alert("El campo R. F. C. solo debe contener entre 12 y 13 caracteres!"); 
								frmName.elements[field_count].focus(); return false; 
							}
						}
					break;
				} 
			} 			
		}
	} 
	return true;
} 

function mw_te_int(val) { for(var i=0;i<val.length;i++) { if(!mw_te_num(val.charAt(i))){return false;} } return true; } 
function mw_te_num(num) { if(num.length>1){return false;} var string="1234567890"; if(string.indexOf(num)!=-1){return true;} return false; }
function mw_te_rfc(rfc) { var Num=parseInt(rfc.length); if(Num!=12 && Num!=13) { return false; } else { return true; } } 

//-------------------------------------------------------------------
// Author: Matt Kruse <matt@mattkruse.com>
// Website: http://www.mattkruse.com/
//-------------------------------------------------------------------
function mw_te_l_trim(str) { if(str==null){return null;} for(var i=0;str.charAt(i)==" ";i++); return str.substring(i,str.length); } 
function mw_te_r_trim(str) { if(str==null){return null;} for(var i=str.length-1;str.charAt(i)==" ";i--); return str.substring(0,i+1); } 
function mw_te_trim(str) {return mw_te_l_trim(mw_te_r_trim(str)); }

//-------------------------------------------------------------------
// Author: <edanps@gmail.com
//-------------------------------------------------------------------
function mw_te_create_ajax() 
{
	var xmlhttp=false; 
	try 		{ xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); } 
	catch(e)	{ try 		{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); } catch(E) 	{ xmlhttp=false; } }
	if (!xmlhttp && typeof XMLHttpRequest!="undefined") { xmlhttp=new XMLHttpRequest(); }
	return xmlhttp;
}

function mw_te_load_list_ajax(field1, field2, path_ajax, field2_css_class, field2_name, field2_table, field1_table_fieldId, field2_table_fieldId, field2_js)
{
	var ajax_file=path_ajax + "ajax.php"; 
	var send_post_vars='field1=' + field1 + '&field2=' + field2 + '&field2_name=' + field2_name + '&field2_table=' + field2_table + '&field2_css_class=' + field2_css_class; 
	var send_post_vars=send_post_vars + '&field1_table_fieldId=' + field1_table_fieldId + '&field2_table_fieldId=' + field2_table_fieldId + '&field2_js=' + field2_js; 
	var id_value=document.getElementById(field1).value; 
	if(id_value) 
	{ 
		comboB=document.getElementById(field2); comboB.length=0; var newOption=document.createElement("option"); newOption.value=0; newOption.innerHTML="Cargando..."; 
		comboB.appendChild(newOption); comboB.disabled=true; 
		var send_post_vars=send_post_vars + '&id_value=' + id_value; 
		
		var ajax=mw_te_create_ajax(); ajax.open("POST", ajax_file, true); ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); ajax.send(send_post_vars); 
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==1) { }
			if (ajax.readyState==4)
			{
				if(!ajax.responseText) { }
				else 
				{
					var request=new Array(); request=ajax.responseText.split("*&*"); 
					document.getElementById("element_frm_" + field2).innerHTML=request[1]; 
				} 
			} 
		} 
	} 
}


//-------------------------------------------------------------------
// R E V I S A R
// Funciones de Validaciones en formularios 
// TableEditor/TEditorJs/TEFunctions.js
//-------------------------------------------------------------------
function TEValidacion(FormName, RequestRequiredBlank, RequestError, RequestOk) // Validación generica...
{
	FormName=document.getElementById(FormName);
	var Elements=FormName.length;
	if(Elements>0)
	{
		for(var i=0; i<Elements; i++)
		{
			var Class=FormName.elements[i].className;
			var Type=FormName.elements[i].type;
			if((Type=='text') || (Type=='textarea') || (Type=='password') || (Type=='file'))
			{ 
				FormName.elements[i].value=TETrim(FormName.elements[i].value); // Quitamos los espacios en blanco a la derecha y a la izquierda y actualizamos el Contenido del campo...
			}
			var Value=FormName.elements[i].value; // Obtenemos el Contenido ya sin espacios en blanco...
			var Name=FormName.elements[i].name;
			var Id=FormName.elements[i].id;
			//alert("Class: "+Class+";\nType: "+Type+";\nValue: "+Value+";\nName: "+Name+";\nId: "+Id);
			if(Class)
			{
				switch(Class)
				{
					case "TEInputDecRequired":
						if(Type=='text')
						{
							if(!Value) 
							{ 
								FormName.elements[i].style.border='1px solid #CC3333';
								if(RequestRequiredBlank) { alert(RequestRequiredBlank); }
								FormName.elements[i].focus();
								return false;
							}
							else if(!TEisNumeric(Value))
							{ 
								FormName.elements[i].style.border='1px solid #CC3333';
								FormName.elements[i].value='';
								if(RequestError) { alert("Esto no es un número!\nSolo puede contener un punto decimal\nNo debe contener comas ni algún otro signo de puntuación"); }
								FormName.elements[i].focus();
								return false;
							}
							else 
							{ 
								FormName.elements[i].style.border='1px solid #7f9db9';
								FormName.elements[i].className='TEInputDecRequired'; 
							}
						}
					break;
					case "TEInputDecNoRequired":
						if(Type=='text')
						{
							if(!TEisNumeric(Value) && (Value))
							{ 
								FormName.elements[i].style.border='1px solid #CC3333';
								FormName.elements[i].value='';
								if(RequestError) { alert("Esto no es un número!\nSolo puede contener un punto decimal\nNo debe contener comas ni algún otro signo de puntuación"); }
								FormName.elements[i].focus();
								return false;
							}
							else 
							{ 
								FormName.elements[i].style.border='1px solid #7f9db9';
								FormName.elements[i].className='TEInputDecRequired'; 
							}
						}
					break;
					case "TEInputDateRequired":
						if(Type=='text')
						{
							if(!Value) 
							{ 
								FormName.elements[i].style.border='1px solid #CC3333';
								if(RequestRequiredBlank) { alert("Escribe una fecha correcta!"); }
								FormName.elements[i].focus();
								return false;
							}
							else if(!isDate(Value,'dd/MM/yyyy'))
							{ 
								FormName.elements[i].style.border='1px solid #CC3333';
								FormName.elements[i].value='';
								if(RequestError) { alert(RequestError); }
								FormName.elements[i].focus();
								return false;
							}
							else 
							{ 
								FormName.elements[i].style.border='1px solid #7f9db9';
								FormName.elements[i].className='TEInputDateRequired'; 
							}
						}
					break;
					case "TEInputDateNoRequired":
						if(Type=='text')
						{
							if(!isDate(Value,'dd/MM/yyyy') && (Value))
							{ 
								FormName.elements[i].style.border='1px solid #CC3333';
								FormName.elements[i].value='';
								if(RequestError) { alert("Escribe una fecha correcta!"); }
								FormName.elements[i].focus();
								return false;
							}
							else 
							{ 
								FormName.elements[i].style.border='1px solid #7f9db9';
								FormName.elements[i].className='TEInputDateNoRequired'; 
							}
						}
					break;
					case "mw_te_btn": 
						if(Type=='submit' || Type=='button')
						{
							FormName.elements[i].disabled=true;
						}
					break;
					default: break;
				}
			}
		}
	}
	if(RequestOk) { alert(RequestOk); }
	return true;
}

//-------------------------------------------------------------------
// isNumeric(value) - Devuelve verdadero si "val" es un numero
//-------------------------------------------------------------------
function TEisNumeric(val){return(parseFloat(val,10)==(val*1));}

//-------------------------------------------------------------------
// TableEditor - Funciones generales del TableEditor
//-------------------------------------------------------------------
function TERowView()
{
	var checkboxes=document.getElementsByTagName('input'); var view='';
	for(var i=0; i<checkboxes.length; ++i) 
	{
		if(checkboxes[i].getAttribute('type') == 'checkbox' && checkboxes[i].getAttribute('id') == 'rowSelector' && checkboxes[i].checked) 
		{
			if(view.length > 0) { alert('Sólo puedes seleccionar un registro a la vez...'); return; } 
			else { view = 'view=' + encodeURIComponent(checkboxes[i].value); }
		}
	}
	if(view.length==0) { alert('Debes seleccionar un registro!'); return; }
	location.href = location.href + (location.search.length ? '&' : '?') + view;
}

//-------------------------------------------------------------------
// Otras Funciones
//-------------------------------------------------------------------
function TEWindowOpenPopup(Url, Name, Width, Height, Align, Bars)
{
	if(Align=="1") { var ScreenWidth=screen.width; var ScreenHeight=screen.height; var Left=(parseInt(ScreenWidth-Width)/2); var Top=(parseInt(ScreenHeight-Height)/2); }
	else { var Left=0; var Top=0; }
	if(!Name) { var Name="Popup"; }
	if(Bars==0) { var Parameters=" Scrollbars=yes, Directories=no, Location=no, Menubar=no, Status=no, Titlebar=no, Toolbar=no, Resizable=no "; }
	else if(Bars==1) { var Parameters=" Scrollbars=yes, Directories=yes, Location=yes, Menubar=yes, Status=yes, Titlebar=yes, Toolbar=yes, Resizable=yes "; }
	if(Url) { window.open(Url,Name,'width='+Width+', height='+Height+', left='+Left+', top='+Top+', '+Parameters+''); }
	else { alert("No se puede abrir el popup!"); }
}

function mw_te_current_time() // Devuelve la hora actual...
{
	var d = new Date();
	var hours   = d.getHours() > 9 ? d.getHours() : '0' + d.getHours();
	var minutes = d.getMinutes() > 9 ? d.getMinutes() : '0' + d.getMinutes();
	var seconds = d.getSeconds() > 9 ? d.getSeconds() : '0' + d.getSeconds();
	return hours + ':' + minutes + ':' + seconds;
}

function colorBlank(FieldName) { document.getElementById(FieldName).value=''; }
