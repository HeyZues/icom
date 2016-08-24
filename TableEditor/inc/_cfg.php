<?php 

// Rutas
if(!@defined('mw_te_path'))					{ @define("mw_te_path",					'../TableEditor/'); 									} 
if(!@defined('mw_te_client_path')) 			{ @define("mw_te_client_path",			'../admin/'); 											} 
if(!@defined('mw_te_path_css'))				{ @define("mw_te_path_css",				mw_te_path.'css/'); 									} 

// Identificación de usuarios
if(!@defined('mw_te_sys_usr')) 				{ @define("mw_te_sys_usr",				'03236e4bcf27ed8af24bf3298e72b3c8'); 					} 
if(!@defined('mw_te_sys_pwd')) 				{ @define("mw_te_sys_pwd",				'db6a467519b208dc1716b92a8479fda8'); 					} 
if(!@defined('mw_te_sys_id')) 				{ @define("mw_te_sys_id",				'26717491'); 											} 
if(!@defined('mw_te_sys_name')) 			{ @define("mw_te_sys_name",				'Administrador'); 										} 
if(!@defined('mw_te_sys_type')) 			{ @define("mw_te_sys_type",				'1'); 													} 
if(!@defined('mw_te_sys_subtype')) 			{ @define("mw_te_sys_subtype",			'101'); 												} 
if(!@defined('mw_te_adm_type')) 			{ @define("mw_te_adm_type",				'2'); 													} 

// Nombres de sesiones
if(!@defined('mw_te_session_id')) 			{ @define("mw_te_session_id",			'mwte_session_id');										} 
if(!@defined('mw_te_session_name')) 		{ @define("mw_te_session_name",			'mwte_session_name');									} 
if(!@defined('mw_te_session_type')) 		{ @define("mw_te_session_type",			'mwte_session_type'); 									} 
if(!@defined('mw_te_session_subtype')) 		{ @define("mw_te_session_subtype",		'mwte_session_subtype'); 								} 

// Tablas de base de datos 
if(!@defined('mw_te_db_cfg_bool')) 			{ @define('mw_te_db_cfg_bool', 			'mw_te_cfg_bool'); 										} 
if(!@defined('mw_te_db_cfg_status')) 		{ @define('mw_te_db_cfg_status',	 	'mw_te_cfg_status'); 									} 
if(!@defined('mw_te_db_access')) 			{ @define('mw_te_db_access', 			'mw_te_accesos'); 										} 
if(!@defined('mw_te_db_menus')) 			{ @define('mw_te_db_menus', 			'mw_te_menus'); 										} 
if(!@defined('mw_te_db_menus_profiles'))	{ @define('mw_te_db_menus_profiles',	'mw_te_menus_perfiles'); 								} 
if(!@defined('mw_te_db_menus_users')) 		{ @define('mw_te_db_menus_users', 		'mw_te_menus_usuarios'); 								} 
if(!@defined('mw_te_db_users')) 			{ @define('mw_te_db_users', 			'mw_te_usuarios'); 										} 
if(!@defined('mw_te_db_users_profiles')) 	{ @define('mw_te_db_users_profiles',	'mw_te_usuarios_perfiles'); 							} 

// Requiere autenticacion (true/false)
if(!@defined('mw_te_session_required')) 	{ @define("mw_te_session_required",		true); 												} 
// Mostrar menu y banner superior de navegación
if(!@defined('mw_te_show_menu')) 			{ @define("mw_te_show_menu",			true);												} 
// Mostrar titulo de "table" antes de TE 
if(!@defined('mw_te_show_tit')) 			{ @define("mw_te_show_tit",				true);												} 
	
// Textos
if(!@defined('mw_te_head_title')) 			{ @define("mw_te_head_title",			'Administrador de Contenido Web'); 						} 
if(!@defined('mw_te_login_title')) 			{ @define('mw_te_login_title', 			'Escribe tu usuario y contraseña:');					} 
if(!@defined('mw_te_login_txt_usr')) 		{ @define('mw_te_login_txt_usr', 		'Usuario');												} 
if(!@defined('mw_te_login_txt_pwd')) 		{ @define('mw_te_login_txt_pwd', 		'Contraseña');											} 
if(!@defined('mw_te_login_txt_submit')) 	{ @define('mw_te_login_txt_submit', 	'Ingresar');											} 
if(!@defined('mw_te_home_tit')) 			{ @define('mw_te_home_tit', 			'Bienvenido(a)');										} 
if(!@defined('mw_te_class_001')) 			{ @define('mw_te_class_001', 			'Editar registro');										} 
if(!@defined('mw_te_btn_add')) 				{ @define('mw_te_btn_add',				'Agregar');												} 
if(!@defined('mw_te_btn_edit')) 			{ @define('mw_te_btn_edit',				'Editar');												} 
if(!@defined('mw_te_btn_del')) 				{ @define('mw_te_btn_del',				'Eliminar');											} 
if(!@defined('mw_te_btn_del_confirm'))		{ @define("mw_te_btn_del_confirm",		'En realidad deseas borrar este registro?');			}
if(!@defined('mw_te_btn_close')) 			{ @define("mw_te_btn_close",			'Cerrar');												} 
if(!@defined('mw_te_btn_save')) 			{ @define('mw_te_btn_save',				'Guardar');												} 
if(!@defined('mw_te_btn_search')) 			{ @define("mw_te_btn_search",			'Buscar');												} 
if(!@defined('mw_te_btn_search_clear')) 	{ @define("mw_te_btn_search_clear",		'Cancelar búsqueda'); 									} 
if(!@defined('mw_te_pager_first')) 			{ @define("mw_te_pager_first",			'Primer página'); 										} 
if(!@defined('mw_te_pager_last')) 			{ @define("mw_te_pager_last",			'Última página'); 										} 
if(!@defined('mw_te_pager_prev')) 			{ @define("mw_te_pager_prev",			'Página anterior'); 									} 
if(!@defined('mw_te_pager_next')) 			{ @define("mw_te_pager_next",			'Página siguiente'); 									} 
if(!@defined('mw_te_pager_pages')) 			{ @define("mw_te_pager_pages",			'Página(s)'); 											} 
if(!@defined('mw_te_pager_showing_msg')) 	{ @define('mw_te_pager_showing_msg',	'Listando registros del %s al %s de %d registros.'); 	} 
if(!@defined('mw_te_frm_select_tit')) 		{ @define('mw_te_frm_select_tit',		'Seleccione...'); 										} 
if(!@defined('mw_te_frm_required')) 		{ @define("mw_te_frm_required",			'(*) Campos obligatorios para guardar');				}
if(!@defined('mw_te_menu_cfg')) 			{ @define("mw_te_menu_cfg",				'Configuración'); 										} 
if(!@defined('mw_te_menu_security')) 		{ @define("mw_te_menu_security",		'Seguridad'); 											} 
if(!@defined('mw_te_menu_profiles')) 		{ @define("mw_te_menu_profiles",		'Perfiles de Usuario'); 								} 
if(!@defined('mw_te_menu_users')) 			{ @define("mw_te_menu_users",			'Usuarios'); 											} 
if(!@defined('mw_te_menu_log_access')) 		{ @define("mw_te_menu_log_access",		'Log de Accesos'); 										} 
if(!@defined('mw_te_profiles_cfg_name')) 	{ @define("mw_te_profiles_cfg_name",	'Perfil'); 												} 
if(!@defined('mw_te_profiles_cfg_add')) 	{ @define("mw_te_profiles_cfg_add",		'Agregar'); 											} 
if(!@defined('mw_te_profiles_cfg_edit')) 	{ @define("mw_te_profiles_cfg_edit",	'Editar'); 												} 
if(!@defined('mw_te_profiles_cfg_del')) 	{ @define("mw_te_profiles_cfg_del",		'Eliminar');											} 
if(!@defined('mw_te_profiles_cfg_actions')) { @define("mw_te_profiles_cfg_actions",	'PERMISOS PARA ESTE PERFIL');							} 
if(!@defined('mw_te_profiles_cfg_menus')) 	{ @define("mw_te_profiles_cfg_menus", 	'MENÚS A LOS QUE PODRÁ ACCEDER ESTE PERFIL');			} 
if(!@defined('mw_te_users_cfg_name')) 		{ @define("mw_te_users_cfg_name",		'Nombre');												} 
if(!@defined('mw_te_users_cfg_lastname')) 	{ @define("mw_te_users_cfg_lastname",	'Apellido Paterno');									} 
if(!@defined('mw_te_users_cfg_mmname')) 	{ @define("mw_te_users_cfg_mmname",		'Apellido Materno');									} 
if(!@defined('mw_te_users_cfg_login')) 		{ @define("mw_te_users_cfg_login", 		'INFORMACIÓN DE ACCESO A LA APLICACIÓN');				} 
if(!@defined('mw_te_users_cfg_contact')) 	{ @define("mw_te_users_cfg_contact", 	'INFORMACIÓN DE CONTACTO');								} 
if(!@defined('mw_te_users_status_tit')) 	{ @define("mw_te_users_status_tit", 	'ESTATUS DEL USUARIO');									} 
if(!@defined('mw_te_users_pwd_change')) 	{ @define("mw_te_users_pwd_change",		'Nueva Contraseña');									} 
if(!@defined('mw_te_users_mobile')) 		{ @define("mw_te_users_mobile",			'Tel. Móvil');											} 
if(!@defined('mw_te_users_email')) 			{ @define("mw_te_users_email",			'Correo Electrónico');									} 
if(!@defined('mw_te_users_photo_tit')) 		{ @define("mw_te_users_photo_tit",		'FOTOGRAFÍA DE ESTE USUARIO');							} 
if(!@defined('mw_te_users_photo')) 			{ @define("mw_te_users_photo",			'Fotografía');											} 
if(!@defined('mw_te_access_cfg_date')) 		{ @define("mw_te_access_cfg_date",		'Fecha');												} 
if(!@defined('mw_te_access_cfg_ip')) 		{ @define("mw_te_access_cfg_ip",		'Dirección IP');										} 
if(!@defined('mw_te_access_cfg_user')) 		{ @define("mw_te_access_cfg_user",		'Usuario');												} 
if(!@defined('mw_te_field_status')) 		{ @define('mw_te_field_status',			'Estatus');												} 
if(!@defined('mw_te_current_file_view')) 	{ @define("mw_te_current_file_view",	'Ver archivo actual');									} 

// Textos Errores
if(!@defined('mw_te_37707_l001')) 			{ @define('mw_te_37707_l001', 			'Escribe tu nombre de usuario!');						} 
if(!@defined('mw_te_37707_l002')) 			{ @define('mw_te_37707_l002', 			'Escribe tu contraseña!');								} 
if(!@defined('mw_te_37707_l003')) 			{ @define('mw_te_37707_l003', 			'Error L603: Datos de acceso incorrectos!');			} 
if(!@defined('mw_te_37707_l004')) 			{ @define('mw_te_37707_l004', 			'Error L604: Datos de acceso incorrectos!');			} 
if(!@defined('mw_te_37707_l005')) 			{ @define('mw_te_37707_l005', 			'Error L605: Datos de acceso incorrectos!');			} 
if(!@defined('mw_te_37707_t301')) 			{ @define("mw_te_37707_t301",			'Error T301: Error de conexion a la base de datos!');	} 
if(!@defined('mw_te_37707_t302')) 			{ @define("mw_te_37707_t302",			'Error T302: Este módulo está desactivado!'); 			} 
if(!@defined('mw_te_37707_t303')) 			{ @define('mw_te_37707_t303',			'Registro duplicado: Ya existe un registro con "%s" en el campo "%s"!'); 	} 
if(!@defined('mw_te_37707_t304')) 			{ @define("mw_te_37707_t304",			'No existe el campo'); 									} 
if(!@defined('mw_te_37707_t305')) 			{ @define("mw_te_37707_t305",			"Función incorrecta!");									} 
if(!@defined('mw_te_37707_t306')) 			{ @define("mw_te_37707_t306",			"Error T306: Error de base de datos; "); 				} 
if(!@defined('mw_te_37707_t307')) 			{ @define('mw_te_37707_t307',			'No se encontró ningún registro!'); 					} 
if(!@defined('mw_te_37707_t308')) 			{ @define("mw_te_37707_t308",			'Error T308: Usted no tiene privilegios para realizar esta acción!'); } 
if(!@defined('mw_te_37707_t309')) 			{ @define('mw_te_37707_t309',			'Error T309: Error al eliminar el registro!'); 			} 
if(!@defined('mw_te_37707_t310')) 			{ @define('mw_te_37707_t310',			'El registro solicitado no existe o usted no tiene privilegios para verlo!'); } 
if(!@defined('mw_te_37707_t311')) 			{ @define("mw_te_37707_t311",			"Este campo es obligatorio para guardar");				}
if(!@defined('mw_te_37707_t312')) 			{ @define('mw_te_37707_t312',			'Ocurrió un error al agregar registro!'); 				} 
if(!@defined('mw_te_37707_t313')) 			{ @define('mw_te_37707_t313',			'Ocurrió un error al editar registro!'); 				} 
if(!@defined('mw_te_37707_t314')) 			{ @define("mw_te_37707_t314",			'Formato de E-mail incorrecto!');						} 
if(!@defined('mw_te_37707_t315'))			{ @define("mw_te_37707_t315",			'Solo se permiten las siguientes extensiones');			} 
if(!@defined('mw_te_37707_t316'))			{ @define("mw_te_37707_t316",			'No hay tipos de archivos para cargar!'); 				} 
if(!@defined('mw_te_37707_t317'))			{ @define("mw_te_37707_t317",			'No se ha definido la ruta para cargar!'); 				} 
if(!@defined('mw_te_37707_t318')) 			{ @define("mw_te_37707_t318",			'La información escrita debe ser un número!');			} 
if(!@defined('mw_te_37707_t319')) 			{ @define("mw_te_37707_t319",			'El campo "R. F. C." solo debe contener entre 12 y 13 caracteres!'); } 
if(!@defined('mw_te_37707_t320')) 			{ @define("mw_te_37707_t320",			'La fecha es incorrecta!'); 							} 

// Textos Errores JavaScript
if(!@defined('mw_te_37707_tj01')) 			{ @define('mw_te_37707_tj01', 			'Este campo es obligatorio!');							}
if(!@defined('mw_te_37707_tj02')) 			{ @define('mw_te_37707_tj02',			'Este campo contiene información incorrecta!');			}

// Menu's Default
if(!@defined('mw_te_menu_home')) 			{ @define("mw_te_menu_home",			"Inicio");												}
if(!@defined('mw_te_menu_mobile')) 			{ @define("mw_te_menu_mobile",			"Menú");												}
if(!@defined('mw_te_menu_exit')) 			{ @define("mw_te_menu_exit",			"Salir");												}


/******/
// Paths predefinidos...
if(!@defined('TEJsPath')) 					{ @define("TEJsPath",					"".mw_te_path."TEditorJs/"); 				}

// Constantes para El TableEditor...  
if(!@defined('TEListZeroRecords')) 			{ @define("TEListZeroRecords",			"No hay ningún registro actualmente!"); 					}
if(!@defined('TEFieldFormatTitle')) 		{ @define("TEFieldFormatTitle",			"Formato");													}
if(!@defined('TEColorSelectColor')) 		{ @define('TEColorSelectColor',			'Seleccione color');										}
if(!@defined('TEColorSelectColorTit')) 		{ @define('TEColorSelectColorTit',		'Selector de color');										}
if(!@defined('TEColorSelectColorTitB')) 	{ @define('TEColorSelectColorTitB',		'Seleccione el color frontal');								}
if(!@defined('TEColorBlank')) 				{ @define("TEColorBlank",				"Dejar en blanco");											}

?>