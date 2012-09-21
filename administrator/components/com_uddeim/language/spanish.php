<?php
// *******************************************************************
// Title          udde Instant Mensajes (uddeIM)
// Description    Instant Mensajes System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         © 2007-2010 Stephan Slabihoud, © 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
// *******************************************************************
// Language file: Castellano (source file is Latin-1)
// Translator:     José Chancosa Gimeno <noemail> 
// Translator:     Willieram
// Translator:     Pablo Baltodano
// *******************************************************************

DEFINE ('_UDDEADM_TRANSLATORS_CREDITS', 'Translated by José Chancosa Gimeno, Willieram and <a href="https://twitter.com/palinair" target="_new">Pablo Baltodano</a>');	// Enter your credits line here, e.g. 'Translation by <a href="http://domain.com" target="_new">John Doe</a>'

// New: 2.8
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_11', '...set default for postbox');
DEFINE ('_UDDEADM_POSTBOX_HEAD', 'Enable Postbox');
DEFINE ('_UDDEADM_POSTBOX_EXP', 'Enables the Postbox.');
DEFINE ('_UDDEIM_FILTER_TITLE_POSTBOX', 'Show from/to this user only');
DEFINE ('_UDDEIM_MESSAGES', 'Messages');
DEFINE ('_UDDEIM_POSTBOX', 'Postbox');
DEFINE ('_UDDEIM_FILTEREDUSER', 'user filtered');
DEFINE ('_UDDEIM_FILTEREDUSERS', 'users filtered');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_POSTBOX', ' postbox');
DEFINE ('_UDDEIM_NOMESSAGES_POSTBOX', 'You have no messages in your postbox.');
DEFINE ('_UDDEIM_DISPLAY', 'Display');
DEFINE ('_UDDEIM_HELP_POSTBOX', 'The <b>Postbox</b> holds all your incoming and outgoing messages.');
DEFINE ('_UDDEIM_HELP_PREAD', 'The message has been read (inbox=you can toggle the status).');
DEFINE ('_UDDEIM_HELP_PUNREAD', 'The message is still unread (inbox=you can toggle the status).');

// New: 2.7
DEFINE ('_UDDEADM_MOOTOOLS_NONEMEIO', 'do not load MooTools (use MEIO)');
DEFINE ('_UDDEADM_MOOTOOLS_13MEIO', 'force loading MooTools 1.3 (use MEIO)');

// New: 2.6
DEFINE ('_UDDEADM_DONTSEFMSGLINK_HEAD', 'No usar SEF para %msglink%');
DEFINE ('_UDDEADM_DONTSEFMSGLINK_EXP', 'No usar SEF para %msglink% variables contenedoras en las notificaciones de correo electrónico.');
DEFINE ('_UDDEADM_STIME_HEAD', 'Utilice calendarios especiales');
DEFINE ('_UDDEADM_STIME_EXP', 'Cuando está activo en sitios que utilizan el archivo de idioma farsi, el calendario persa es utilizado.');
DEFINE ('_UDDEADM_RESTRICTREM_HEAD', 'Eliminar conexiones huérfanas');
DEFINE ('_UDDEADM_RESTRICTREM_EXP', 'Elimine automáticamente conexiones huérfanas cuando se guarda una lista de contactos existente.');
DEFINE ('_UDDEADM_RESTRICTCON_HEAD', 'Mostrar sólo las conexiones');
DEFINE ('_UDDEADM_RESTRICTCON_EXP', 'Los usuarios que aparecen en la lista se pueden limitar a conexiones CB/CBE/JS (ocultar los usuarios de la lista de usuarios no tiene ningún efecto aquí si está habilitado).');
DEFINE ('_UDDEADM_RESTRICTCON0', 'desactivado');
DEFINE ('_UDDEADM_RESTRICTCON1', 'usuarios registrados');
DEFINE ('_UDDEADM_RESTRICTCON2', 'registrados, usuarios especiales');
DEFINE ('_UDDEADM_RESTRICTCON3', 'todos los usuarios (incl. administradores)');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_10', '...configurar por defecto para mostrar conexiones');

// New: 2.4
DEFINE ('_UDDEIM_SECURITYCODE', 'Código de seguridad:');

// New: 2.3
DEFINE ('_UDDEADM_CC_HEAD', 'Botón "Mostrar linea CC:"');
DEFINE ('_UDDEADM_CC_EXP', 'Cuando está activo, el usuario puede elegir si uddeIM agrega o no una línea CC: que contiene todos los destinatarios de un mensaje.');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_9', '...configurar por defecto para línea CC: line, y moderación');
DEFINE ('_UDDEIM_TOOLBAR_MCP', 'Centro de Mensajes');
DEFINE ('_UDDEIM_TOOLBAR_REMOVEMESSAGE', 'Eliminar mensaje');
DEFINE ('_UDDEIM_TOOLBAR_DELIVERMESSAGE', 'Entregar mensaje');
DEFINE ('_UDDEADM_OOD_MCP', 'El plug-in del Centro de Mensajes está desactualizado!');
DEFINE ('_UDDEADM_MCP_STAT', 'Mensajes a moderar:');
DEFINE ('_UDDEADM_MCP_TRASHED', 'Enviado a papelera');
DEFINE ('_UDDEADM_MCP_NOTEDEL', '¿Eliminar este mensaje de la base de datos?');
DEFINE ('_UDDEADM_MCP_NOTEDELIVER', '¿Entregar este mensaje al destinatario?');
DEFINE ('_UDDEADM_MCP_SHOWHIDE', 'Mostrar/Ocultar');
DEFINE ('_UDDEADM_MCP_EDIT', 'Centro de Control de Mensajes');
DEFINE ('_UDDEADM_MCP_FROM', 'De');
DEFINE ('_UDDEADM_MCP_TO', 'Para');
DEFINE ('_UDDEADM_MCP_TEXT', 'Mensaje');
DEFINE ('_UDDEADM_MCP_DELETE', 'Eliminar');
DEFINE ('_UDDEADM_MCP_DATE', 'Fecha');
DEFINE ('_UDDEADM_MCP_DELIVER', 'Entregar');
DEFINE ('_UDDEADM_USERSET_MODERATE', 'Mod');
DEFINE ('_UDDEADM_USERSET_SELMODERATE', '- Mod -');
DEFINE ('_UDDEIM_MCP_MODERATED', 'Tus mensajes serán moderados. Un moderador los revisará antes de ser entregados a los destinatarios.');
DEFINE ('_UDDEIM_STATUS_DELAYED', 'Pendientes de moderación');
DEFINE ('_UDDEADM_MODNEWUSERS_HEAD', 'Moderar nuevos usuarios');
DEFINE ('_UDDEADM_MODNEWUSERS_EXP', 'Cuando está activo, los mensajes de los nuevos usuarios registrados son moderados por defecto.');
DEFINE ('_UDDEADM_MODPUBUSERS_HEAD', 'Moderar usuarios públicos');
DEFINE ('_UDDEADM_MODPUBUSERS_EXP', 'Cuando está activo, los mensajes de los usuarios públicos son moderados.');
DEFINE ('_UDDEIM_MENUICONS_P3', 'No hay menú');

// New: 2.2
DEFINE ('_UDDEADM_OOD_PF', 'El plug-in de interfaz pública está desactualizado!');
DEFINE ('_UDDEADM_OOD_A', 'El plug-in de archivos adjuntos está desactualizado!');
DEFINE ('_UDDEADM_OOD_RSS', 'El plug-in RSS está desactualizado!');
DEFINE ('_UDDEADM_OOD_ASC', 'El plug-in del Centro de Mensajes de Reporte está desactualizado!');
DEFINE ('_UDDEIM_NOMESSAGES3_FILTERED', '<b>Usted no tiene mensajes filtrados en su%s.</b>');
DEFINE ('_UDDEIM_FILTER_UNREAD', 'no leído');
DEFINE ('_UDDEIM_FILTER_FLAGGED', 'marcado');
DEFINE ('_UDDEADM_GRAVATAR_HEAD', 'gravatar activado');
DEFINE ('_UDDEADM_GRAVATAR_EXP', 'Enables gravatar support.');
DEFINE ('_UDDEADM_GRAVATARD_HEAD', 'conjunto de imágenes gravatar');
DEFINE ('_UDDEADM_GRAVATARD_EXP', 'Seleccione el conjunto de imágenes para las imágenes por defecto.');
DEFINE ('_UDDEADM_GRAVATARR_HEAD', 'clasificación gravatar');
DEFINE ('_UDDEADM_GRAVATARR_EXP', 'Por defecto, sólo las imágenes clasificadas "G" son mostradas a menos que se indique clasificaciones más altas. "X" muestra todas las imágenes gravatar.');
DEFINE ('_UDDEADM_GR404', '404');
DEFINE ('_UDDEADM_GRMM', 'mm');
DEFINE ('_UDDEADM_GRIDENTICON', 'identicon');
DEFINE ('_UDDEADM_GRMONSTERID', 'monsterid');
DEFINE ('_UDDEADM_GRWAVATAR', 'wavatar');
DEFINE ('_UDDEADM_GRRETRO', 'retro');
DEFINE ('_UDDEADM_GRDEFAULT', 'por defecto');
DEFINE ('_UDDEADM_GRG', 'G = General');
DEFINE ('_UDDEADM_GRPG', 'PG = Supervisión de padres');
DEFINE ('_UDDEADM_GRR', 'R = Restringido');
DEFINE ('_UDDEADM_GRX', 'X = Sólo adultos');
DEFINE ('_UDDEADM_NINJABOARD', 'Ninjaboard');
DEFINE ('_UDDEADM_KUNENA16', 'Kunena 1.6+');
DEFINE ('_UDDEIM_PROCESSING', 'Procesando...');
DEFINE ('_UDDEIM_SEND_NONOTIFY', 'No envíe correos electrónicos de notificación');
DEFINE ('_UDDEIM_SYSGM_NONOTIFY', 'No serán enviadas notificaciones por correo electrónico');
DEFINE ('_UDDEIM_SYSGM_FORCEEMBEDDED', 'El texto será incrustado en la notificación por correo electrónico');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_8', '...configurar por defecto para las miniaturas');
DEFINE ('_UDDEADM_AVATARWH_HEAD', 'Tamaño de despliegue de las miniaturas');
DEFINE ('_UDDEADM_AVATARWH_EXP', 'Anchura y altura (en píxeles) de las miniaturas (0 = tamaño no será cambiado).');
DEFINE ('_UDDEIM_SAVE', 'Guardar');

// New: 2.1
DEFINE ('_UDDEIM_BODY_SPAMREPORT',
"Hola %you%,\n\n%touser% ha reportado un mensaje sospechoso de %fromuser%. Por favor, entrar y revísalo!\n\n%livesite%");
DEFINE ('_UDDEIM_SUBJECT_SPAMREPORT', 'Un mensaje se ha reportado en %site%');
DEFINE ('_UDDEADM_KBYTES', 'KByte');
DEFINE ('_UDDEADM_MBYTES', 'MByte');
DEFINE ('_UDDEIM_ATT_FILEDELETED', 'El archivo ha sido borrado');
DEFINE ('_UDDEIM_ATT_FILENOTEXISTS', 'Error: El archivo no existe');
DEFINE ('_UDDEIM_ATTACHMENTS2', 'Archivos adjuntos (max. %s por archivo):');
DEFINE ('_UDDEADM_JOOCM', 'Joo!CM');
DEFINE ('_UDDEADM_UNPROTECTATTACHMENT_HEAD', 'Descargas de archivos no protegidos');
DEFINE ('_UDDEADM_UNPROTECTATTACHMENT_EXP', 'Por lo general, uddeIM no da a conocer la ruta del servidor de archivos adjuntos, para que nadie - incluso cuando el nombre del archivo es conocido - pueda descargar el archivo. Al activar esta opción uddeIM es obligado a devolver la ruta completa del servidor. Por razones de seguridad, uddeIM añade un hash MD5 con el nombre del archivo original. Los usuarios pueden descargar el archivo directamente cuando la ruta completa es conocida. Sólo utilice con cuidado! LEA EL FAQ AL UTILIZAR ESTA OPCIÓN!');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_7', '...configurar por defecto para los archivos adjuntos, interfaz pública');
DEFINE ('_UDDEIM_FILETYPE_NOTALLOWED', 'Tipo de archivo no permitido');
DEFINE ('_UDDEADM_ALLOWEDEXTENSIONS_HEAD', 'Extensiones permitidas');
DEFINE ('_UDDEADM_ALLOWEDEXTENSIONS_EXP', 'Escriba todas las extensiones permitidas (separados por ";"). Dejar en blanco para ninguna restricción.');
DEFINE ('_UDDEADM_PUBEMAIL_HEAD', 'Correo electrónico obligatorio');
DEFINE ('_UDDEADM_PUBEMAIL_EXP', 'Cuando está activa, un usuario público debe introducir una dirección de correo electrónico.');
DEFINE ('_UDDEADM_WAITDAYS_HEAD', 'Días de espera');
DEFINE ('_UDDEADM_WAITDAYS_EXP', 'Especifique el número de días que un usuario debe esperar hasta que se le permita enviar mensajes (para 3 horas introducir 0,125).');
DEFINE ('_UDDEIM_WAITDAYS1', 'Usted tiene que esperar ');
DEFINE ('_UDDEIM_WAITDAYS2', ' días hasta que pueda enviar mensajes.');
DEFINE ('_UDDEIM_WAITDAYS2H', ' horas hasta que pueda enviar mensajes.');

// New: 2.0
DEFINE ('_UDDEADM_RECAPTCHAPRV_HEAD', 'Clave privada reCaptcha');
DEFINE ('_UDDEADM_RECAPTCHAPRV_EXP', 'Cuando quiera usar reCAPTCHA, introduzca su clave privada aquí.');
DEFINE ('_UDDEADM_RECAPTCHAPUB_HEAD', 'Clave pública reCaptcha');
DEFINE ('_UDDEADM_RECAPTCHAPUB_EXP', 'Cuando quiera usar reCAPTCHA, introduzca su clave pública aquí.');
DEFINE ('_UDDEADM_CAPTCHA_INTERNAL', 'Interno');
DEFINE ('_UDDEADM_CAPTCHA_RECAPTCHA', 'reCaptcha');
DEFINE ('_UDDEADM_CAPTCHATYPE_HEAD', 'Servicio captcha');
DEFINE ('_UDDEADM_CAPTCHATYPE_EXP', '¿Qué servicio captcha desea utilizar: el servicio incorporado o reCaptcha (ver <a href="http://recaptcha.net" target="_new">reCaptcha</a> para más información)?');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_6', '...configurar por defecto el servicio captcha');
DEFINE ('_UDDEADM_AUP', 'AlphaUserPoints');
DEFINE ('_UDDEADM_CHECKFILESFOLDER', 'Por favor mover <i>\uddeimfiles</i> a <i>\images\uddeimfiles</i>. Consulte la documentación!');
DEFINE ('_UDDEADM_CRYPT4', 'Encriptación fuerte');
DEFINE ('_UDDEADM_ALLOWTOALL2_HEAD', 'Permitir el envío de mensajes del sistema');
DEFINE ('_UDDEADM_ALLOWTOALL2_EXP', 'uddeIM es compatible con los mensajes del sistema. Estos son enviados a todos los usuarios de su sistema. Úselos con moderación.');
DEFINE ('_UDDEADM_ALLOWTOALL2_0', 'desactivado');
DEFINE ('_UDDEADM_ALLOWTOALL2_1', 'administradores solamente');
DEFINE ('_UDDEADM_ALLOWTOALL2_2', 'administradores y gestores');

// New: 1.9
DEFINE ('_UDDEIM_FILEUPLOAD_FAILED', 'Fallo en la carga de archivos');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_5', '...configurar por defecto para los archivos adjuntos');
DEFINE ('_UDDEADM_ENABLEATTACHMENT_HEAD', 'Habilitar archivos adjuntos');
DEFINE ('_UDDEADM_ENABLEATTACHMENT_EXP', 'Esto permite el envío de archivos adjuntos para todos los usuarios registrados o administradores solamente.');
DEFINE ('_UDDEADM_MAXSIZEATTACHMENT_HEAD', 'Max. tamaño de archivo');
DEFINE ('_UDDEADM_MAXSIZEATTACHMENT_EXP', 'Tamaño máximo de archivo permitido para los archivos adjuntos.');
DEFINE ('_UDDEIM_FILESIZE_EXCEEDED', 'Tamaño máximo de archivo excedido');
DEFINE ('_UDDEADM_BYTES', 'Bytes');
DEFINE ('_UDDEADM_MAXATTACHMENTS_HEAD', 'Max. adjuntos');
DEFINE ('_UDDEADM_MAXATTACHMENTS_EXP', 'Número máximo de archivos adjuntos por mensaje.');
DEFINE ('_UDDEIM_DOWNLOAD', 'Descargar');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_HEAD', 'Supresiones de archivos invocado');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_YES', 'por administradores solamente');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_NO', 'por cualquier usuario');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_MANUALLY', 'manualmente');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_EXP', 'Supresiones automáticas crean una sobrecarga del servidor. Si usted elige <b>por administradores solamente</b> las supresiones automáticas se invocan cuando un administrador revisa su bandeja de entrada. Elija esta opción si un administrador revisa con regularidad la bandeja de entrada. Los sitios pequeños o administrados rara vez pueden elegir <b>por cualquier usuario</b>.');
DEFINE ('_UDDEADM_FILEMAINTENANCE_PRUNE', 'Cortar archivos ahora');
DEFINE ('_UDDEADM_FILEMAINTENANCEDEL_HEAD', 'Invocar supresión de archivos');
DEFINE ('_UDDEADM_FILEMAINTENANCEDEL_EXP', 'Elimina los archivos borrados de la base de datos. Esto es lo mismo que \'Cortar los archivos ahora\' en la lengüeta sistema.');
DEFINE ('_UDDEADM_FILEMAINTENANCEDEL_ERASE', 'BORRAR');
DEFINE ('_UDDEIM_ATTACHMENTS', 'Adjuntos (max. %u bytes por archivo):');
DEFINE ('_UDDEADM_MAINTENANCE_F1', 'Archivos adjuntos huérfanos almacenados en sistema de archivos: ');
DEFINE ('_UDDEADM_MAINTENANCE_F2', 'Eliminando archivos huérfanos');
DEFINE ('_UDDEADM_BACKUP_DONE', 'Respaldo de configuración hecha.');
DEFINE ('_UDDEADM_RESTORE_DONE', 'Restauración de configuración hecha.');
DEFINE ('_UDDEADM_PRUNE_DONE', 'Corte del mensaje realizado.');
DEFINE ('_UDDEADM_FILEPRUNE_DONE', 'Corte del archivo adjunto realizado.');
DEFINE ('_UDDEADM_FOLDERCREATE_ERROR', 'Error al crear carpeta: ');
DEFINE ('_UDDEADM_ATTINSTALL_WRITEFAILED', 'Error al crear archivo: ');
DEFINE ('_UDDEADM_ATTINSTALL_IGNORE', 'Puede pasar por alto este error cuando usted no tiene el plug-in premium de archivos adjuntos (ver FAQ).');
DEFINE ('_UDDEADM_ATTACHMENTGROUPS_HEAD', 'Grupos permitidos');
DEFINE ('_UDDEADM_ATTACHMENTGROUPS_EXP', 'Grupos que se les permite enviar archivos adjuntos.');
DEFINE ('_UDDEIM_SELECT', 'Seleccionar');
DEFINE ('_UDDEIM_ATTACHMENT', 'Adjunto');
DEFINE ('_UDDEADM_SHOWLISTATTACHMENT_HEAD', 'Mostrar iconos de archivo adjunto');
DEFINE ('_UDDEADM_SHOWLISTATTACHMENT_EXP', 'Mostrar iconos de archivo adjunto en las listas de mensajes (bandeja de entrada, salida, archivo).');
DEFINE ('_UDDEIM_HELP_ATTACHMENT', 'El mensaje contiene un archivo adjunto.');
DEFINE ('_UDDEADM_MAINTENANCE_COUNTFILES', 'Referencias a archivos en la base de datos:');
DEFINE ('_UDDEADM_MAINTENANCE_COUNTFILESDISTINCT', 'Archivos adjuntos almacenados:');
DEFINE ('_UDDEADM_SHOWMENUCOUNT_HEAD', 'Mostrar contadores');
DEFINE ('_UDDEADM_SHOWMENUCOUNT_EXP', 'Cuando se establece en <b>si</b>, la barra de menús contiene contadores de mensajes. Nota: Esto requiere varias consultas de bases de datos adicionales así que no se use en sistemas débiles.');
DEFINE ('_UDDEADM_CONFIG_FTPLAYER', 'Configuración (acceso con capa FTP):');
DEFINE ('_UDDEADM_ENCODEHEADER_HEAD', 'Codificar encabezados de los mensajes');
DEFINE ('_UDDEADM_ENCODEHEADER_EXP', 'Establecer en <b>si</b>, cuando los encabezados de correo (como el asunto) deben ser codificados rfc 2047. Resulta útil cuando se tienen problemas con caracteres especiales.');
DEFINE ('_UDDEIM_UP', 'ordenar ascendente');
DEFINE ('_UDDEIM_DOWN', 'ordenar descendente');
DEFINE ('_UDDEIM_UPDOWN', 'ordenar');
DEFINE ('_UDDEADM_ENABLESORT_HEAD', 'Habilitar ordenamiento');
DEFINE ('_UDDEADM_ENABLESORT_EXP', 'Establecer en <b>si</b>, cuando el usuario debe ser capaz de ordenar las bandejas de entrada y salida y el archivo (crea una carga adicional en el servidor de base de datos).');

// New: 1.8
// %s will be replaced by _UDDEIM_NOMESSAGES_FILTERED_INBOX, _UDDEIM_NOMESSAGES_FILTERED_OUTBOX, _UDDEIM_NOMESSAGES_FILTERED_ARCHIVE
// Translators help: When having problems with the grammar, you can also move some text (e.g. "in your") to _UDDEIM_NOMESSAGES_FILTERED_* variables, e.g.
// instead of "_UDDEIM_NOMESSAGES_FILTERED_INBOX=inbox" you can also use "_UDDEIM_NOMESSAGES_FILTERED_INBOX=in your inbox"
DEFINE ('_UDDEIM_NOMESSAGES2_FR_FILTERED', '<b>Usted no tiene mensajes de este usuario en su%s.</b>');
DEFINE ('_UDDEIM_NOMESSAGES2_TO_FILTERED', '<b>Usted no tiene mensajes para este usuario en su%s.</b>');
DEFINE ('_UDDEIM_NOMESSAGES2_UNFR_FILTERED', '<b>Usted no tiene mensajes no leídos de este usuario en su%s.</b>');
DEFINE ('_UDDEIM_NOMESSAGES2_UNTO_FILTERED', '<b>Usted no tiene mensajes no leídos para este usuario en su%s.</b>');

// New: 1.7
DEFINE ('_UDDEADM_EMAILSTOPPED', '\'Detener correo\' habilitado.');
DEFINE ('_UDDEIM_ACCOUNTLOCKED', 'El acceso a su buzón de correo ha sido bloqueado. Por favor, póngase en contacto con el administrador del sitio.');
DEFINE ('_UDDEADM_USERSET_LOCKED', 'Bloqueado');
DEFINE ('_UDDEADM_USERSET_SELLOCKED', '- Bloqueado -');
DEFINE ('_UDDEADM_CBBANNED_HEAD', 'Comprobar usuarios CB suspendidos');
DEFINE ('_UDDEADM_CBBANNED_EXP', 'Cuando se activa uddeIM revisa si un usuario ha sido suspendido en CB y no le permite el acceso a uddeIM. Además, los otros usuarios no serán capaces de enviar mensajes a un usuario suspendido.');
DEFINE ('_UDDEIM_YOUAREBANNED', 'Has sido suspendido. Por favor, póngase en contacto con el administrador o moderador.');
DEFINE ('_UDDEIM_USERBANNED', 'El usuario ha sido suspendido');
DEFINE ('_UDDEADM_JOOBB', 'Joo!BB');
DEFINE ('_UDDEPLUGIN_SEARCHSECTION', 'Mensajería Privada');
DEFINE ('_UDDEPLUGIN_MESSAGES', 'Mensajes Privados');
DEFINE ('_UDDEADM_MAINTENANCEDEL_HEAD', 'Invocar borrado de mensajes');
// note "This  is the same as _UDDEADM_MAINTENANCE_PRUNE on the system tab."
DEFINE ('_UDDEADM_MAINTENANCEDEL_EXP', 'Elimina los mensajes borrados de la base de datos. Esto es lo mismo que \'Cortar los mensajes ahora\' en la lengüeta sistema.');
DEFINE ('_UDDEADM_MAINTENANCEDEL_ERASE', 'BORRAR');
DEFINE ('_UDDEADM_REPORTSPAM_HEAD', 'Reportar enlace del mensaje');
DEFINE ('_UDDEADM_REPORTSPAM_EXP', 'Cuando es activado éste muestra un enlace \'Reportar mensaje\' que permite a los usuarios reportar SPAM a el administrador.');
DEFINE ('_UDDEIM_TOOLBAR_REMOVESPAM', 'Borrar mensaje');
DEFINE ('_UDDEIM_TOOLBAR_REMOVEREPORT', 'Eliminar reporte');
DEFINE ('_UDDEIM_TOOLBAR_SPAMCONTROL', 'Control de Reporte');
DEFINE ('_UDDEADM_INFORMATION', 'Información');
DEFINE ('_UDDEADM_SPAMCONTROL_STAT', 'Mensajes reportados:');
DEFINE ('_UDDEADM_SPAMCONTROL_TRASHED', 'Enviado a papelera');
DEFINE ('_UDDEADM_SPAMCONTROL_NOTEDEL', 'Borrar este mensaje de la base de datos?');
DEFINE ('_UDDEADM_SPAMCONTROL_NOTEREMOVE', 'Eliminar este reporte?');
DEFINE ('_UDDEADM_SPAMCONTROL_SHOWHIDE', 'Mostrar/Ocultar');
DEFINE ('_UDDEADM_SPAMCONTROL_EDIT', 'Centro de Control de Reportes');
DEFINE ('_UDDEADM_SPAMCONTROL_FROM', 'De');
DEFINE ('_UDDEADM_SPAMCONTROL_TO', 'Para');
DEFINE ('_UDDEADM_SPAMCONTROL_TEXT', 'Mensaje');
DEFINE ('_UDDEADM_SPAMCONTROL_DELETE', 'Borrar');
DEFINE ('_UDDEADM_SPAMCONTROL_REMOVE', 'Eliminar');
DEFINE ('_UDDEADM_SPAMCONTROL_DATE', 'Fecha');
DEFINE ('_UDDEADM_SPAMCONTROL_REPORTED', 'Reportado');
DEFINE ('_UDDEIM_SPAMCONTROL_REPORT', 'Reportar mensaje');
DEFINE ('_UDDEIM_SPAMCONTROL_MARKED', 'El mensaje ha sido reportado');
DEFINE ('_UDDEIM_SPAMCONTROL_UNREPORT', 'Recordar este informe');
DEFINE ('_UDDEADM_JOMSOCIAL', 'JomSocial');
DEFINE ('_UDDEADM_KUNENA', 'Kunena');
DEFINE ('_UDDEADM_ADMIN_FILTER', 'Filtro');
DEFINE ('_UDDEADM_ADMIN_DISPLAY', 'Visualización #');
DEFINE ('_UDDEADM_TRASHORIGINALSENT_HEAD', 'Enviar a papelera el mensaje enviado');
DEFINE ('_UDDEADM_TRASHORIGINALSENT_EXP', 'Cuando es activado se incluirá una casilla de verificación junto al botón \'Enviar\' llamada \'mensaje a papelera\' la cual no está marcada por defecto. Los usuarios pueden marcar ésta casilla si desean enviar a la papelera un mensaje inmediatamente después de haberlo enviado.');
DEFINE ('_UDDEIM_TRASHORIGINALSENT', 'mensaje a papelera');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_4', '...configurar por defecto para el mensaje de eliminar enviados, reportar como spam, usuarios CB suspendidos');
DEFINE ('_UDDEADM_VERSIONCHECK_IMPORTANT', 'Enlaces importantes:');
DEFINE ('_UDDEADM_VERSIONCHECK_HOTFIX', 'Parche');
DEFINE ('_UDDEADM_VERSIONCHECK_NONE', 'Ninguno');
DEFINE ('_UDDEADM_MAINTENANCEFIX_HEAD', "Mantenimiento de compatibilidad");
DEFINE ('_UDDEADM_MAINTENANCEFIX_EXP', "uddeIM utiliza dos archivos XML para asegurar que los paquetes se pueden instalar en Joomla 1.0 y 1.5. En Joomla 1.5 un archivo XML no es necesario y esto hace que el gestor de extensiones muestre una advertencia de incompatibilidad lo cual está mal). Esto elimina los archivos innecesarios, por lo que la advertencia no volverá a aparecer.");
DEFINE ('_UDDEADM_MAINTENANCE_FIX', "SOLUCIÓN");
DEFINE ('_UDDEADM_MAINTENANCE_XML1', "Existen instaladores XML de Joomla 1.0 y Joomla 1.5 para los paquetes uddeIM.<br />");
DEFINE ('_UDDEADM_MAINTENANCE_XML2', "Esto es necesario debido a la instalación de paquetes en Joomla 1.0 y Joomla 1.5.<br />");
DEFINE ('_UDDEADM_MAINTENANCE_XML3', "Dado que no se requiere después de que la instalación haya terminado, el instalador de Joomla 1.0 puede ser eliminado en los sistemas con Joomla 1.5.<br />");
DEFINE ('_UDDEADM_MAINTENANCE_XML4', "Esto se hará para los siguientes paquetes:<br />");
DEFINE ('_UDDEADM_MAINTENANCE_FXML1', "Los instaladores XML innecesarios para los siguientes paquetes uddeIM serán eliminados:<br />");
DEFINE ('_UDDEADM_MAINTENANCE_FXML2', "No hay instaladores XML innecesarios para los paquetes de uddeIM encontrados!<br />");
DEFINE ('_UDDEADM_SHOWMENUICONS1_HEAD', 'Apariencia de la barra de menú');
DEFINE ('_UDDEADM_SHOWMENUICONS1_EXP', 'Aquí puedes configurar si la barra de menú se debe mostrar con iconos y/o texto.');
DEFINE ('_UDDEIM_MENUICONS_P1', 'Iconos y texto');
DEFINE ('_UDDEIM_MENUICONS_P2', 'Sólo iconos');
DEFINE ('_UDDEIM_MENUICONS_P0', 'Sólo texto');
DEFINE ('_UDDEIM_LISTSLIMIT_2', 'Número máximo de destinatarios en la lista:');
DEFINE ('_UDDEADM_ADDEMAIL_ADMIN', 'Los administradores pueden seleccionar');
DEFINE ('_UDDEAIM_ADDEMAIL_SELECT', 'La notificación contiene un mensaje');
DEFINE ('_UDDEAIM_ADDEMAIL_TITLE', 'Incluir el mensaje completo en la notificación por correo electrónico.');

// New: 1.6
DEFINE ('_UDDEIM_NOLISTSELECTED', 'Lista usuarios no seleccionada');
DEFINE ('_UDDEADM_NOPREMIUM', 'Premium plug-in no instalado');
DEFINE ('_UDDEIM_LISTGLOBAL_CREATOR', 'Creador:');
DEFINE ('_UDDEIM_LISTGLOBAL_ENTRIES', 'Entradas');
DEFINE ('_UDDEIM_LISTGLOBAL_TYPE', 'Tipo');
DEFINE ('_UDDEIM_LISTGLOBAL_NORMAL', 'Normal');
DEFINE ('_UDDEIM_LISTGLOBAL_GLOBAL', 'Global');
DEFINE ('_UDDEIM_LISTGLOBAL_RESTRICTED', 'Restringido');
DEFINE ('_UDDEIM_LISTGLOBAL_P0', 'Lista de contactos normal');
DEFINE ('_UDDEIM_LISTGLOBAL_P1', 'Lista de contactos global');
DEFINE ('_UDDEIM_LISTGLOBAL_P2', 'Lista de contactos restringido (sólo los miembros pueden acceder a la lista)');
DEFINE ('_UDDEIM_TOOLBAR_USERSETTINGS', 'Configuración de usuario');
DEFINE ('_UDDEIM_TOOLBAR_REMOVESETTINGS', 'Eliminar configuración');
DEFINE ('_UDDEIM_TOOLBAR_CREATESETTINGS', 'Crear configuración');
DEFINE ('_UDDEIM_TOOLBAR_SAVE', 'Guardar');
DEFINE ('_UDDEIM_TOOLBAR_BACK', 'Atrás');
DEFINE ('_UDDEIM_TOOLBAR_TRASHMSGS', 'Mensajes a papelera');
DEFINE ('_UDDEIM_CBPLUG_CONT', '[continuar]');
DEFINE ('_UDDEIM_CBPLUG_UNBLOCKNOW', '[desbloquear]');
DEFINE ('_UDDEIM_CBPLUG_DOBLOCK', 'Bloquear usuario');
DEFINE ('_UDDEIM_CBPLUG_DOUNBLOCK', 'Desbloquear usuario');
DEFINE ('_UDDEIM_CBPLUG_BLOCKINGCFG', 'Bloqueando');
DEFINE ('_UDDEIM_CBPLUG_BLOCKED', 'Usted ha bloqueado este usuario.');
DEFINE ('_UDDEIM_CBPLUG_UNBLOCKED', 'Este usuario puede ponerse en contacto con usted.');
DEFINE ('_UDDEIM_CBPLUG_NOWBLOCKED', 'El usuario está bloqueado ahora.');
DEFINE ('_UDDEIM_CBPLUG_NOWUNBLOCKED', 'El usuario no está bloqueado.');
DEFINE ('_UDDEADM_PARTIALIMPORTDONE', 'Se ha realizado la importación parcial de los mensajes desde el viejo PMS. No importe esta parte una vez más ya que al hacerlo va a importar los mensajes de nuevo y aparecerán dos veces.');
DEFINE ('_UDDEADM_IMPORT_HELP', 'Nota: Los mensajes pueden ser importados todos a la vez o en partes. La importación en partes puede ser necesario cuando la importación muere a causa de demasiados mensajes a importar.');
DEFINE ('_UDDEADM_IMPORT_PARTIAL', 'Importación parcial:');
DEFINE ('_UDDEADM_UPDATEYOURDB', 'Importante: No se han actualizado su base de datos! Por favor, consulte el archivo README sobre cómo actualizar uddeIM correctamente!');
DEFINE ('_UDDEADM_RESTRALLUSERS_HEAD', 'Prohibir el acceso "Todos los usuarios"');
DEFINE ('_UDDEADM_RESTRALLUSERS_EXP', 'Puede restringir el acceso a la lista "Todos los usuarios". Por lo general, el la lista "Todos los usuarios" está disponible para todos (<i> sin restricción </ i>).');
DEFINE ('_UDDEADM_RESTRALLUSERS_0', 'sin restricción');
DEFINE ('_UDDEADM_RESTRALLUSERS_1', 'usuarios especiales');
DEFINE ('_UDDEADM_RESTRALLUSERS_2', 'solo administradores');
DEFINE ('_UDDEIM_MESSAGE_UNARCHIVED', 'Mensaje desarchivado.');
DEFINE ('_UDDEADM_AUTOFORWARD_SPECIAL', 'usuarios especiales');
DEFINE ('_UDDEIM_HELP', 'Ayuda');
DEFINE ('_UDDEIM_HELP_HEADLINE1', 'Ayuda de uddeIM');
DEFINE ('_UDDEIM_HELP_HEADLINE2', 'Breve revisión de todas las opciones');
DEFINE ('_UDDEIM_HELP_INBOX', 'La <b>Bandeja de Entrada</b> tiene todos los mensajes que llegan, cada mail que recibes se deposita allí.');
DEFINE ('_UDDEIM_HELP_OUTBOX', 'La <b>Bandeja de  Salida</b> guarda una copia de cada mensaje que envías, puedes volver a ella en cualquier momento y ver qué has enviado.');
DEFINE ('_UDDEIM_HELP_TRASHCAN', 'La <b>Papelera</b> retiene todos los mensajes borrados. Los Mensajes no se borran inmediatamente, se guardan por un período de tiempo. Mientras el mensaje esté en la papelera, lo podrás recuperar.');
DEFINE ('_UDDEIM_HELP_ARCHIVE', 'El <b>Archivo</b> tiene todos los mensajes archivados de la bandeja de entrada. Sólo puedes archivar mensajes de tu bandeja de entrada. Cuando necesitas archivar un mensaje tuyo, asegúrate que hayas seleccionado <i>copiarme</i> cuando lo envías.');
DEFINE ('_UDDEIM_HELP_USERLISTS', '<b>Contactos</b> permite manejar listas de contactos (también conocidas como listas de distribución). Estas listas permiten enviar mensajes a múltiples destinatarios. En lugar de agregar múltiples destinatarios, simplemente puedes ingresar <i>#nombre_de_la_lista</i>.');
DEFINE ('_UDDEIM_HELP_SETTINGS', '<b>Configuración</b> comprende todas las opciones configurables por el usuario.');
DEFINE ('_UDDEIM_HELP_COMPOSE', '<b>Nuevo mensaje</b> permite crear un nuevo mensaje privado.');
DEFINE ('_UDDEIM_HELP_IREAD', 'El mensaje fué leído (puedes cambiar este estado).');
DEFINE ('_UDDEIM_HELP_IUNREAD', 'El mensaje está aún sin leer (puedes cambiar este estado).');
DEFINE ('_UDDEIM_HELP_OREAD', 'El mensaje fué leído.');
DEFINE ('_UDDEIM_HELP_OUNREAD', 'El mensaje está aún sin leer. Los mensajes no leídos pueden ser recuperados.');
DEFINE ('_UDDEIM_HELP_TREAD', 'El mensaje fué leído.');
DEFINE ('_UDDEIM_HELP_TUNREAD', 'El mensaje está aún sin leer.');
DEFINE ('_UDDEIM_HELP_FLAGGED', 'El mensaje fué destacado, o sea, para mensajes importantes (puedes cambiar este estado).');
DEFINE ('_UDDEIM_HELP_UNFLAGGED', 'Mensaje <i>Normal</i> (puedes cambiar este estado).');
DEFINE ('_UDDEIM_HELP_ONLINE', 'El usuario está actualmente conectado.');
DEFINE ('_UDDEIM_HELP_OFFLINE', 'El usuario está actualmente des-conectado.');
DEFINE ('_UDDEIM_HELP_DELETE', 'Borar un mensaje (mover el mensaje a la papelera).');
DEFINE ('_UDDEIM_HELP_FORWARD', 'Re-enviar un mensaje a otro destinatario.');
DEFINE ('_UDDEIM_HELP_ARCHIVEMSG', 'Archivar un mensaje. Los mensajes archivados no serán borrados automáticamente cuando el administrador haya configurado un tiempo límite para los mensajes en la bandeja de entrada.');
DEFINE ('_UDDEIM_HELP_UNARCHIVEMSG', 'Des-archivar un mensaje. El mensaje será movido nuevamente a la bandeja de entrada.');
DEFINE ('_UDDEIM_HELP_RECALL', 'Recuperar un mensaje. Los mensajes enviados pueden ser recuperados cuando no han sido leídos aún por el destinatario.');
DEFINE ('_UDDEIM_HELP_RECYCLE', 'Reciclar un mensaje (mover el mensaje de la papelera de nuevao a la bandeja de entrada o de salida).');
DEFINE ('_UDDEIM_HELP_NOTIFY', 'Configuración de notificación por email cuando te llega un nuevo mensaje ');
DEFINE ('_UDDEIM_HELP_AUTORESPONDER', 'Cuando la autorespuesta está habilitada, cada mensaje recibido es respondido automáticamente.');
DEFINE ('_UDDEIM_HELP_AUTOFORWARD', 'Los nuevos mensajes pueden enviarse a otro usuario automáticamente.');
DEFINE ('_UDDEIM_HELP_BLOCKING', 'Puedes bloquear usuarios. Estos usuarios no pueden enviarte mensajes privados.');
DEFINE ('_UDDEIM_HELP_MISC', 'Aquí encontrarás algunas opciones adicionales de configuración');
DEFINE ('_UDDEIM_HELP_FEED', 'Puedes acceder a tu bandeja de entrada usando un feed RSS.');
DEFINE ('_UDDEADM_SEPARATOR_HEAD', 'Separador');
DEFINE ('_UDDEADM_SEPARATOR_EXP', 'Selecciona el separador usado para múltiples destinatarios (por omisión es",").');
DEFINE ('_UDDEADM_SEPARATOR_P0', 'coma (por omisión)');
DEFINE ('_UDDEADM_SEPARATOR_P1', 'punto y coma');
DEFINE ('_UDDEADM_RSSLIMIT_HEAD', 'Ítems RSS');
DEFINE ('_UDDEADM_RSSLIMIT_EXP', 'Limitar el número de ítems RSS  (0: sin límite).');
DEFINE ('_UDDEADM_SHOWHELP_HEAD', 'Mostrar botón de ayuda');
DEFINE ('_UDDEADM_SHOWHELP_EXP', 'Cuando está habilitada muestra un botón de ayuda.');
DEFINE ('_UDDEADM_SHOWIGOOGLE_HEAD', 'Mostrar el botón de iGoogle');
DEFINE ('_UDDEADM_SHOWIGOOGLE_EXP', 'Cuando está habilitada el botón <i>Agregar a iGoogle</i> del gadget de uddeIM para iGoogle gadget aparece entre las preferencias del usuario.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE11', 'no cargar MooTools (se usa 1.1)');
DEFINE ('_UDDEADM_MOOTOOLS_NONE12', 'no cargar MooTools (se usa 1.2)');
DEFINE ('_UDDEIM_RSS_INTRO1', 'Puedes acceder a tu bandeja de entrada usando un feed RSS (0.91).');
DEFINE ('_UDDEIM_RSS_INTRO1B', 'La URL de acceso es:');
DEFINE ('_UDDEIM_RSS_INTRO2', 'No des esta URL a otros usuarios porque permite que accedan a tu bandeja de entrada.');
DEFINE ('_UDDEIM_RSS_FEED', 'Feed RSS de Mensaje');
DEFINE ('_UDDEIM_RSS_NOOBJECT', 'Error del tipo \'No object\'...');
DEFINE ('_UDDEIM_RSS_USERBLOCKED', 'Usuario bloqueado...');
DEFINE ('_UDDEIM_RSS_NOTALLOWED', 'Acceso no permtido...');
DEFINE ('_UDDEIM_RSS_WRONGPASSWORD', 'Usuario o contraseña erróneos...');
DEFINE ('_UDDEIM_RSS_NOMESSAGES', 'Sin Mensajes');
DEFINE ('_UDDEIM_RSS_NONEWMESSAGES', 'Sin mensajes nuevos');
DEFINE ('_UDDEADM_ENABLERSS_HEAD', 'Habilitar RSS');
DEFINE ('_UDDEADM_ENABLERSS_EXP', 'Cuando esta opción está habilitada, los mensajes pueden recibirse a través de un feed RSS. Los usuarios encontrarán la URL requerida en sus perfiles.');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_3', '...por omisión para RSS, iGoogle, ayuda, separador');
DEFINE ('_UDDEADM_DELETEM_DELETING', 'Borrando mensajes:');
DEFINE ('_UDDEADM_DELETEM_FROMUSER', 'Borrando mensajes del usuario ');
DEFINE ('_UDDEADM_DELETEM_MSGSSENT', '- mensajes enviados: ');
DEFINE ('_UDDEADM_DELETEM_MSGSRECV', '- mensajes recibidos: ');
DEFINE ('_UDDEIM_PMNAV_THISISARESPONSE', 'Esta es una respuesta a :');
DEFINE ('_UDDEIM_PMNAV_THEREARERESPONSES', 'Respuestas a ésto:');
DEFINE ('_UDDEIM_PMNAV_DELETED', 'Mensaje no disponible');
DEFINE ('_UDDEIM_PMNAV_EXISTS', 'ir al mensaje');
DEFINE ('_UDDEIM_PMNAV_COPY2ME', '(Copiar)');
DEFINE ('_UDDEADM_PMNAV_HEAD', 'Permitir navegación');
DEFINE ('_UDDEADM_PMNAV_EXP', 'Muestra una barra de navegación que permite navegar a través de las conversaciones.');
DEFINE ('_UDDEADM_MAINTENANCE_ALLDAYS', 'Mensajes:');
DEFINE ('_UDDEADM_MAINTENANCE_7DAYS', 'Mensajes en 7 días:');
DEFINE ('_UDDEADM_MAINTENANCE_30DAYS', 'Mensajes en 30 días:');
DEFINE ('_UDDEADM_MAINTENANCE_365DAYS', 'Mensajes en 365 días:');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD1', 'Enviando recordatorios a (Olvidos: %s días):');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD2', 'En %s días enviando recordatorios a:');
DEFINE ('_UDDEADM_MAINTENANCE_NO', 'No:');
DEFINE ('_UDDEADM_MAINTENANCE_USERID', 'ID de usuario:');
DEFINE ('_UDDEADM_MAINTENANCE_TONAME', 'Nombre:');
DEFINE ('_UDDEADM_MAINTENANCE_MID', 'ID Mensaje:');
DEFINE ('_UDDEADM_MAINTENANCE_WRITTEN', 'Escrito:');
DEFINE ('_UDDEADM_MAINTENANCE_TIMER', 'Cronómetro:');

// New: 1.5
DEFINE ('_UDDEMODULE_ALLDAYS', ' mensajes');
DEFINE ('_UDDEMODULE_7DAYS', ' mensajes en los últimos 7 días');
DEFINE ('_UDDEMODULE_30DAYS', ' mensajes en los últimos 30 días');
DEFINE ('_UDDEMODULE_365DAYS', ' mensajes en los últimos 365 días');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_WARNING', '<br /><b>Nota:<br />¡Cuando se usa mosMail, se debe configurar una dirección de e-mail válida!!</b>');
DEFINE ('_UDDEIM_FILTEREDMESSAGE', 'mensaje filtrado');
DEFINE ('_UDDEIM_FILTEREDMESSAGES', 'mensajes filtrados');
DEFINE ('_UDDEIM_FILTER', 'Filtro:');
DEFINE ('_UDDEIM_FILTER_TITLE_INBOX', 'Mostrar de esta persona solamente');
DEFINE ('_UDDEIM_FILTER_TITLE_OUTBOX', 'Mostrar para esta persona solamente');
DEFINE ('_UDDEIM_FILTER_UNREAD_ONLY', 'solo no leídos');
DEFINE ('_UDDEIM_FILTER_SUBMIT', 'Filtro');
DEFINE ('_UDDEIM_FILTER_ALL', '- todos -');
DEFINE ('_UDDEIM_FILTER_PUBLIC', '- usuarios públicos -');
DEFINE ('_UDDEADM_FILTER_HEAD', 'Habilitar Filtro');
DEFINE ('_UDDEADM_FILTER_EXP', 'Si los usuarios habilitados pueden filtrar su bandejas para mostrar sólo un destinatario o receptor.');
DEFINE ('_UDDEADM_FILTER_P0', 'deshabilitado');
DEFINE ('_UDDEADM_FILTER_P1', 'arriba de la lista de mensajes');
DEFINE ('_UDDEADM_FILTER_P2', 'abajo de la lista de mensajes');
DEFINE ('_UDDEADM_FILTER_P3', 'arriba y abajo de la lista de mensajes');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED', '<b>No tienes mensajes %s en tu %s.</b>');	// see next also six lines
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_UNREAD', ' sin leer');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_FROM', ' de esta persona');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_TO', ' para esta persona');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_INBOX', ' bandeja de entrada');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_OUTBOX', ' bandeja de salida');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_ARCHIVE', ' archivo');
DEFINE ('_UDDEIM_TODP_TITLE', 'Destinatario');
DEFINE ('_UDDEIM_TODP_TITLE_CC', 'Uno o más destinatarios (separados por comas)');
DEFINE ('_UDDEIM_ADDCCINFO_TITLE', 'Cuando se marca, se agrega una línea al mensajee con todos los destinatarios.');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_2', '...opciones por omisión para autorespuesta, autoenvío, cuadro de entrada, filtro');
DEFINE ('_UDDEADM_AUTORESPONDER_HEAD', 'Habilitar Autorespuesta');
DEFINE ('_UDDEADM_AUTORESPONDER_EXP', 'Cuando la autorespuesta está habilitada, al usuario le aparece la opción de habilitar un mensaje de autorespuesta en sus opciones personales.');
DEFINE ('_UDDEIM_EMN_AUTORESPONDER', 'Habilitar Autorespuesta');
DEFINE ('_UDDEIM_AUTORESPONDER', 'Autorespuesta');
DEFINE ('_UDDEIM_AUTORESPONDER_EXP', 'Cuando la autorespuesta está habilitada cada mensaje recibido se responde automáticamente.');
DEFINE ('_UDDEIM_AUTORESPONDER_DEFAULT', "Mis disculpas, pero ahora no  estoy disponible. Voy a leer los mensajes tan pronto como pueda.");
DEFINE ('_UDDEADM_USERSET_AUTOR', 'AutoR');
DEFINE ('_UDDEADM_USERSET_SELAUTOR', '- AutoR -');
DEFINE ('_UDDEIM_USERBLOCKED', 'Usuario bloqueado.');
DEFINE ('_UDDEADM_AUTOFORWARD_HEAD', 'Habilitar Autoenvío');
DEFINE ('_UDDEADM_AUTOFORWARD_EXP', 'Cuando el autoenvío está habilitado, el usuario puede enviarse los nuevos mensajes a otro usuario automáticamente.');
DEFINE ('_UDDEIM_EMN_AUTOFORWARD', 'Habilitar Autoenvío');
DEFINE ('_UDDEADM_USERSET_AUTOF', 'AutoF');
DEFINE ('_UDDEADM_USERSET_SELAUTOF', '- AutoF -');
DEFINE ('_UDDEIM_AUTOFORWARD', 'Autoenvío');
DEFINE ('_UDDEIM_AUTOFORWARD_EXP', 'Los nuevos mensajes pueden enviarse a otro usuario automáticamente.');
DEFINE ('_UDDEIM_THISISAFORWARD', 'Autoenviar un menesaje originalmente enviado a ');
DEFINE ('_UDDEADM_COLSROWS_HEAD', 'Cuadro de Mensaje (cols/filas)');
DEFINE ('_UDDEADM_COLSROWS_EXP', 'Esto especifica las columnas y filas del cuadro donde se escriben los mensajes (normalmente es 60/10).');
DEFINE ('_UDDEADM_WIDTH_HEAD', 'Cuadro de mensaje (ancho)');
DEFINE ('_UDDEADM_WIDTH_EXP', 'Esto especifica el ancho del cuadro de mensajes en pixels (por omisión es 0). Si es 0, el ancho se toma de la hoja de estilos (CSS).');
DEFINE ('_UDDEADM_CBE', 'CB Potenciado');

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'IMPORTAR');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'Cargar MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'Esto especifica cómo uddeIM carga MooTools (MooTools se requiere para  el Autocompletador): <i>Ninguno</i> es útil cuando tu plantilla ya carga MooTools, <i>Auto</i> es lo recomendado  (el mismo comportamiento que en uddeIM 1.2), cuando se usa Joomla 1.0 también puedes forzar la carga de MooTools 1.1 o 1.2.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'no cargar MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'auto');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'forzar carga de MooTools 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'forzar carga de MooTools 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...confirguando valor por omisión para MooTools');
DEFINE ('_UDDEADM_AGORA', 'Agora');

/ New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Coficiación Base64');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Ajustar zona horaria');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'Cuando uddeIM muestra mal el horario puedes ajustar la zona horaria aquí. Usualmente, cuando todo se configura correctamente este valor debe ser 0, pero de todos modos puede haber casos raros donde necesites modificar este valor.');
DEFINE ('_UDDEADM_HOURS', 'horas');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Información de la versión:');
DEFINE ('_UDDEADM_STATISTICS', 'Estadísticas:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Mostrar estadísticas');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Esto muestra algunas estadísticas como el número de mensajes almacenados, e tc.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'MOSTRAR ESTADÍSTICAS');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Mensajes almancenados en la base de datos: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Mensajes descartados  por el destinatario: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Mensajes descartados por el remitente: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Mensajes en espera para ser purgados: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Forzar Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'Usualmente uddeIM intenta detectar el Itemid correcto cuando no está indicado. En algunos casos puede ser necesario forzar este valor, p. ej. cuando seusan varias entradas de menú a uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'Itemid detectado es: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Usar Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Usear este Itemid en lugar del detectado.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Usar vículos al perfil');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Cuando se elige <i>sí</i>, todos los usuarios que se muestran en uddeIM se mostrarán como vínculos  a su perfil de usuario.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Mostrar miniaturas');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'When set to <i>yes</i>, la miniatura del usuario respectivo se muestra al leer un mensaje.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Mostrar miniaturas en listas');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Elegir <i>sí</i> si quieres mostrar las miniaturas de los usuarios en las listas de mensajes (bandejas de entrada, salida, etc.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Deshabilitado');
DEFINE ('_UDDEADM_ENABLED', 'Habilitado');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Importante');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Permitir etiquetado de mensajes');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Permite el etiquetado de mensajes (uddeIM muesetra una estrella en las listas de mensajes que se puede resaltar para marcar mensajes importantes).');
DEFINE ('_UDDEADM_REVIEWUPDATE', '¡Importante: Cuando actualizas uddeIM desde una versión anterior, por favor revisar el README. Algunas veces debes agregar o cambiar tablas de la base de datos o campos!');
DEFINE ('_UDDEIM_ADDCCINFO', 'Agregar línea CC:');
DEFINE ('_UDDEIM_CC', 'CC:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Truncar texto citado');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Truncar el texto citado a 2/3 del largo maximo si excede el límite para mensajes.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Entradas en la bandeja ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Último ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' entradas');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Estado');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Remitente');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Mensaje');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Bandeja vacía');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Acceso a la papelera no permitido.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Restringir el acceso a la papelera');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'Puedes restringir el acceso a la papelera. Usualmente está disponible para todos (<i>sin restricciones</i>). Puedes restringir el acceso a grupos especiales de usuarios o solo los administradores, para que los grupos de menores privilegios no puedan reciclar mensajes.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'sin restricciones');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'usuarios especiales');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'sólo admins');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Ocultar usuarios de la lista de usuarios');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Ingresa la lista de IDs de usuario que quieres ocultar de la lista pública de usuarios (p.ej. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Ocultar usuarios de la lista de usuarios');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Ingresa los IDs de usuario que quieres ocultar de la lista de usuarios (p.ej. 65,66,67). Los admins siempre verán la lista completa.');
DEFINE ('_UDDEIM_ERRORCSRF', 'Ataque CSRF reconocido');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'Protección CSRF');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'Esto protege de todas formas de ataque del tipo "Cross-Site Request Forgery". Usualmente esto debería estar habilitado. Sólo cuando tienes problemas extraños lo deberías apagar.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'No puedes responder a mensajes archivados.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Las repuestas a usuarios no registrados no pueden ser recuperadas.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Permitir respuestas');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Permitir respuestas directas a mensajes de los usuarios públicos.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Hola %you%,\n\n%user% ha enviado el siguiente mensaje privado al sitio %site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Mostrar nombres reales');
DEFINE ('_UDDEADM_PUBNAMESDESC', '¿Mostrar nombres reales o de usuario en la Interfaz Pública?');
DEFINE ('_UDDEIM_USERLIST', 'Lista de usuarios');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Lo sentimos, debes esperar para volver a enviar un nuevo mensaje');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Último enviado');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Retardo');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Tiempo en segundos que un usuario debe esperar antes de que pueda enviar un próximo mensaje (0 es sin retardos).');
DEFINE ('_UDDEADM_SECONDS', 'segundos');
DEFINE ('_UDDEIM_PUBLICSENT', 'Mensaje enviado.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Error en el nombres del remitente');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Error en la dirección de email');
DEFINE ('_UDDEIM_YOURNAME', 'Tu nombre:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Tu email:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Estás usando uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'Ya estás usando la última versión de uddeIM.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'La versión actual es ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Información de actualización:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Buscar actualizaciones');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'Estos contacta al sitio de uddeIM para recibir información sobre la versión actual de uddeIM.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'BUSCAR AHORA');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'No fue posible obtener la información de versión.');
DEFINE ('_UDDEIM_NOSUCHLIST', '¡Lista de contactos no encontrada!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Número máximo de destinatarios excedido (max. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Máx número de entradas');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Máx número de entradas permitidas por lista de contactos.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Las listas de contactos no están habilitadas');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Habilitar listas de contactos');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM permite a los usuarios crear listas de contactos. Estas listas pueden usarse para enviar mensajes a múltiples personas. No olvides habilitar la opción de múltiples destinatarios cuando uses listas de contactos.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'deshabilitadas');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'usuarios registrados');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'usuarios especiales');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'solamente admins');
DEFINE ('_UDDEIM_LISTSNEW', 'Crear nueva lista de contactos');
DEFINE ('_UDDEIM_LISTSSAVED', 'Lista de contactos grabada');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Lista de contactos actualizada');
DEFINE ('_UDDEIM_LISTSDESC', 'Descripción');
DEFINE ('_UDDEIM_LISTSNAME', 'Nombre');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Nombre (sin espacios)');
DEFINE ('_UDDEIM_EDITLINK', 'editar');
DEFINE ('_UDDEIM_LISTS', 'Contactos');
DEFINE ('_UDDEIM_STATUS_READ', 'leído');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'sin leer');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'conectado');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'desconectado');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'Mostrar la galería de fotos de CB');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'Por omisión uddeIM muestra sólo los avatars que los usuarios han subido. Si se habilita esta opción uddeIM también mostrará fotos de la galería de avatars de CB.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'Desbloquear las conexiones de CB');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'Puedes permitir mensajes a destinatarios cuando el usuario registrado está en la lista de conexiones de CB (incluso cuando el destinatario está en un grupo bloqueado). Esto es independiente del bloqueo individual que cada usuario puede configurar cuando está habilitado (ver opciones arriba).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'No estás habilidatdo para enviar a este grupo.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'El recipiente te tiene bloqueado.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Grupos bloqueados (usuarios registrados)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Grupos a los que los usuarios registrados no se les permite enviar enviar mensajes. Esto es para usuarios registrados solamente. Los usuarios especiales y los administradores no son afectados  por esta opción. Esta opción es independiente del bloqueo individual que cada usuario puede configurar cuando así está habilitado (ver opciones arriba).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Grupos Bloqueados (usuarios públicos)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Grupos a los que los usuarios públicos no pueden enviarles mensajes. Esta opción es independiente del bloqueo individual que cada usuario puede configurar cuando así está habilitado (ver opciones arriba). Cuando bloqueas un grupo, los usuarios en el mismo no pueden ver la opción de habilitar la Interfaz Pública del sitio en sus opciones de perfil.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Usuario público');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'Conexión CB');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Usuario registrado');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Autor');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Editor');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Publicador');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Gerente');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Administrador');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'SuperAdmin');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'El usuario acepta sólo mensajes de usuarios registrados.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Ocultar al público la lista "Todos"');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'Puedes ocultar ciertos grupos en la lista "Todos". Nota: esto oculta sólo los nombres, los usuarios aún pueden recibir mensajes. Los usuarios que no han habilitado la Interfaz Pública nunca estarán en esta lista.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Ocultar de la lista "Todos"');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'Puedes ocultar ciertos grupos en la lista "Todos". Nota: esto oculta sólo los nombres, los usuarios aún pueden recibir mensajes.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'ninguno');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'sólo superadmins');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'sólo admins');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'usuarios especiales');
DEFINE ('_UDDEADM_PUBLIC', 'Público');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Comportamiento del vínculo "Todos"');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Elija entre si el vínculo "Todos" debería suprimirse en la Interfaz Pública, debería mostrarse ó si siempre todos los usuarios deberían mostrarse.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Frente Público');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- seleccionar público -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Permitir que usuarios públicos envíen mensajes');
DEFINE ('_UDDEIM_MSGLIMITREACHED', '¡Límite de mensajes alcanzado!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Usuario Público');
DEFINE ('_UDDEIM_DELETEDUSER', 'Usuario eliminado');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Longitud del Captcha');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Especifica cuántos caracteres se deben ingresar.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Protección Captcha contra spam');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Especifica quién tiene que ingresar un Captcha cuando se envía un mensaje');
DEFINE ('_UDDEADM_CAPTCHAF0', 'deshabilitado');
DEFINE ('_UDDEADM_CAPTCHAF1', 'sólo usuarios públicos');
DEFINE ('_UDDEADM_CAPTCHAF2', 'usuarios públicos y registrados');
DEFINE ('_UDDEADM_CAPTCHAF3', 'usuarios públicos, registrados, especiales');
DEFINE ('_UDDEADM_CAPTCHAF4', 'todos los usuarios (incl. admins)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Habilitar la Interfaz Pública');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'Cuando está habilitado, los usuarios públicos pueden enviar mensajes a los usuarios registrados (estos pueden especificar en sus opciones personles si quieren o no esta posibilidad).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Frente Público por omisión');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'Este es el valor por omisión si a un usuario público se le permite enviar un mensaje a un usuario registrado.');
DEFINE ('_UDDEADM_PUBDEF0', 'deshabilitado');
DEFINE ('_UDDEADM_PUBDEF1', 'habilitado');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Código de seguridad equivocado');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'ninguno o desconocido');
DEFINE ('_UDDEADM_DONATE', 'Si te gusta uddeIM y quieres apoyar su desarrollo por favor haz una pequeña donación.');

// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Configuración encontrada en la base de datos: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Resguardar y restaurar la configuración');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Puedes resguardar tu configuración en la base de datos y reastaurarla cuando sea necesario. Esto es útil cuando actualizas uddeIM o cuando quieres guardar cierta configuración mientras haces pruebas.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'BACKUP');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'RESTAURAR');
DEFINE ('_UDDEADM_CANCEL', 'Cancelar');

// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Código de caracteres del archivo de idiomas');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Generalmente <strong>default</strong> (ISO-8859-1) es la configuración correcta para Joomla 1.0 y <strong>UTF-8</strong> para Joomla 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'default');
DEFINE ('_UDDEIM_READ_INFO_1', 'Los mensajes leídos estarán en la bandeja de entrada por ');
DEFINE ('_UDDEIM_READ_INFO_2', ' días max. antes de que se borren automáticamente.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Los mensajes NO leídos estarán en la bandeja de entrada por ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' días max. antes de que se borren automáticamente.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Los mensajes enviados estarán en la bandeja de salida por ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' días max. antes de que se borren automáticamente.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Mostrar nota de la bandeja de entrada para mensajes leídos');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Mostrar nota "Los mensajes leídos se borrarán luego de n días"');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Mostrar nota de la bandeja de entrada para mensajes NO leídos');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Mostrar nota "Los mensajes NO leídos se borrarán luego de n días"');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Mostrar nota de la bandeja de salida para mensajes enviados');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Mostrar nota "Los mensajes enviados se borrarán luego de n días"');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Mostrar nota de la papelera para mensajes enviados');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Mostrar nota "Los mensajes de la papelera se purgarán luego de n días"');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Mensajes enviados retenidos por (días)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Ingrese el número de días hasta que los mensajes <b>enviados</b> se borrarán automáticamente de la bandeja de salida.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'enviar a todos los usuarios especiales');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Mensaje para <strong>todos los usuarios especiales</strong>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- seleccionar usuario -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- seleccionar nombre -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Editar opciones de usuario');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'existente');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'no existente');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- seleccionar entrada -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- seleccionar notificación -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- seleccionar ventana emergente (popup) -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Usuario');
DEFINE ('_UDDEADM_USERSET_NAME', 'Nombre');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Notificación');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Emergente');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Último acceso');
DEFINE ('_UDDEADM_USERSET_NO', 'No');
DEFINE ('_UDDEADM_USERSET_YES', 'Sí');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'desconocido');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Cuando estoy desconectado (excepto respuestas)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Siempre (excepto respuestas)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Cuando esto desconectado');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Siempre');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Sin notificación');
DEFINE ('_UDDEADM_WELCOMEMSG', "¡Bienvenido a uddeIM!\n\nHas instalado exitosamente uddeIM.\n\nPrueba ver este mensaje con diferentes plantillas. Puedes seleccionarlas en el panel de administración de  uddeIM.\n\nuddeIM es un project en desarrollo. Si encuentras errores (bugs) o debilidades, por favor escríbeme para que podamos mejorar uddeIM entre todos.\n\n¡Buena Suerte y que te diviertas!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'instalación de uddeIM completa.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Por favor continúa con el panel de administración y revisa las opciones.');
DEFINE ('_UDDEADM_REVIEWLANG', 'Si estás ejecutando el CMS en un conjunto de caracteres que no sea ISO 8859-1 asegúrate de ajustar las opciones correspondientes.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'Luego de la instalación, todo el tráfico de emails de uddeIM (notificaciones de email, emails de olvido) está deshabilitado para que no se envíen emails mientras haces las pruebas. No te olvides de deshabilitar la opción "Para email" en el panel de administración cuando hayas terminado.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Máx de destinatarios');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Máx número de destinatarios que son permitidos por mensaje (0=sin límite)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'demasiados destinatarios');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Envío de emails deshabilitado.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Buscar adentro del texto');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'El Autocompletador busca dentro del texto (sino busca desde el comienzo solamente)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'Comportamiento del link "Todos"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Elija si el link "Todos" debería suprimirse, mostrarse o si siempre deberían mostrarse todos los usuarios');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Suprimir el linke "Todos"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Mostrar el link "Todos"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Siempre mostrar todos los usuarios');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'La configuración no es grabable:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'La configuration es grabable:');
DEFINE ('_UDDEIM_FORWARDLINK', 're-enviar');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'destinatario encontrado');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'destinatarios encontrados');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (default)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Mailsystem');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'Seleccione el sistema de mail que uddeIM debería usar para enviar notificaciones.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Mostrar los grupos de Joomla');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Mostrar los grupos de Joomla groups en las lista de mensajes generales.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Re-envío de mensajes');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Permitir el re-envío de mensajes.');
DEFINE ('_UDDEIM_FWDFROM', 'Mensaje original de');
DEFINE ('_UDDEIM_FWDTO', 'para');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Desarchivar mensaje');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'No se puede desarchivar el mensaje');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Permitir múltiples destinatarios');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Permitir múltiples destinatarios (separados por comas).');
DEFINE ('_UDDEIM_CHARSLEFT', 'caracteres quedan sin usar');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Mostrar contador de caracteres');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Muestra un contador que indica cuántos caracteres quedan por escribir.');
DEFINE ('_UDDEIM_CLEAR', 'Limpiar');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Agregar los destinatarios seleccionados a la lista');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Esto permite seleccionar múltiples destinatarios.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Agregar las conexiones seleccionadas a la lista');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Esto permite seleccionar múltiples destinatarios.');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS encontrado: ');
DEFINE ('_UDDEIM_ENTERNAME', 'ingrese un nombre');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Usar autocompletar');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Usar autocompletar para los nombres de los destinatarios.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Clave usarda para ofuscación');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Ingresa la clave que será usada para ofuscación de mensajes. No cambie este valor luego de que se haya habilitado la ofuscación de mensajes.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', '¡Se encontró un archivo de configuración erróneo!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Versión encontrada:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Versión esperada:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Actualizando configuración...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Listo!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Error crítico: Falló la grabación del archivo de configuración:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', '¡Mensaje encriptado! - ¡No es posible bajarlo!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', '¡Clave errónera! - ¡No es posible bajarlo!');
DEFINE ('_UDDEIM_WRONGPW', '¡Clave errónera! - ¡Por favor contáctese con el administrador!');
DEFINE ('_UDDEIM_WRONGPASS', '¡Clave errónera!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Fechas de papelera erróneas (bandejas de entrada/salida): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Corrigiendo las fechas erróneas de papelera');
DEFINE ('_UDDEIM_TODP', 'Para: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Podar mensajes ahora');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Mostrar íconocs de acción');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'Cuando se elige <i>sí</i>, los vínculos de acción se mostrarán con un  ícono.');
DEFINE ('_UDDEIM_UNCHECKALL', 'desmarcar todos');
DEFINE ('_UDDEIM_CHECKALL', 'marcar todos');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Mostrar íconos en el pie');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'Cuando se elije <i>sís</i>, los vínculos del pie se mostrarán con un  ícono.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Usar emoticonos animados');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Usar emoticonos animados en lugar de los fijos.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'Más emoticonos animados');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Mostrar más emoticonos animados.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Mensaje encriptado - Se requiere contraseña');
DEFINE ('_UDDEIM_PASSWORD', '<strong>Contraseña requerida</strong>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Contraseña');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (text de encripción)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (texto de des-encripción)');
DEFINE ('_UDDEIM_MORE', 'MAS');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Mensajes privados');
DEFINE ('_UDDEMODULE_NONEW', 'no hay nuevos');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Nuevos mensajes: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'mensaje');
DEFINE ('_UDDEMODULE_MESSAGES', 'mensajes');
DEFINE ('_UDDEMODULE_YOUHAVE', 'Tienes');
DEFINE ('_UDDEMODULE_HELLO', 'Hola');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Centro de mensajes');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Usar encripción');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Encriptar mensajes almacenados');
DEFINE ('_UDDEADM_CRYPT0', 'Ninguna');
DEFINE ('_UDDEADM_CRYPT1', 'Ofuscar mensajes');
DEFINE ('_UDDEADM_CRYPT2', 'Encriptar mensajes');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Por omisión para notificaciones por email');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Valor por omisión para la notificación por email (para usuarios que no han cambiado sus preferencias todavía).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Sin notificación');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Siempre');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Cuando estoy desconectado');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Suprimir vínculo "Todos"');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Suprimir vínculo "Todos" en el cuadro de escribir un mensaje nuevo  (útil cuando hay muchos usuarios registrados).');
DEFINE ('_UDDEADM_POPUP_HEAD','Notificación emergente');
DEFINE ('_UDDEADM_POPUP_EXP','Mostrar un mensaje emergente (popup) cuando llega un mensaje nuevo (requiere mod_uddeim)');
DEFINE ('_UDDEIM_OPTIONS', 'Más opciones');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Aquí puedes configurar más opciones.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Mostrar un mensaje emergente (popup) cuando llega un mensaje nuevo');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Notificacion emergente (Popup) por omisión');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Habilitar la notificación con una ventana emergente (popup) por omisión (para los usuarios que no han cambiado sus preferencias todavía).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Mantenimiento');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Mantenimiento de la base de datos');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'CHECK');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'REPARAR');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "Cuando un usuario es purgado de la bse de datos sus menesajes usualmente se retienen. Esta función permite revisar si es necesario purgar mensajes huérfanos y si se pueden purgar si es requerido.<br />Esto también chequea algunos errores en la base de datos que serán corregidos.");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "Verificando...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (Usuario): [inbox|inbox trashed|outbox|outbox trashed]</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>inbox: mensajes almacenados en las inbox de los usuarios</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>inbox trashed: mensajes borrados en las inbox de los usuarios, pero que todavía está en la outbox de alguien</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>outbox: mensajes almacenados en las outbox de los usuarios</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>outbox trashed: mensajes borrados de las outbox de los usuarios, peroq ue están todavía en la inbox de alguien</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "Purgando...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "no encontrado (de/para/opciones/bloqueador/bloqueado):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "borrar todas las preferencias para el usuario");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "borrar el bloqueo del usuario");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "borrar todos los mensajes enviados al usuario eliminado en la bandeja de salida del remitente y en la de entrada del usuario eliminado");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "borrar todos los mensajes enviados del usuario eliminado en su bandeja de salida y la de entrada del remitente");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Nada que hacer</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Mantenimiento requerido</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Mostrar nombres reales');
DEFINE ('_UDDEADM_NAMESDESC', '¿Nombres reales o de usuario?');
DEFINE ('_UDDEADM_REALNAMES', 'Nombre reales');
DEFINE ('_UDDEADM_USERNAMES', 'Nombres de usuario');
DEFINE ('_UDDEADM_CONLISTBOX', 'Lista de conexiones');
DEFINE ('_UDDEADM_CONLISTBOXDESC', '¡Mostrar mis conexiones en una lista o una tabla?');
DEFINE ('_UDDEADM_LISTBOX', 'Lista');
DEFINE ('_UDDEADM_TABLE', 'Tabla');
DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Los mensajes estarán en la papelera durante 24hs antes de que sean purgados. Solo puedes ver las primeras palabras del mensaje. Para leer el mensaje entero necesitas restaurarlo primero.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Los mensajes estarán en la papelera durante ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' hs antes de que sean purgados. Solo puedes ver las primeras palabras del mensaje. Para leer el mensaje entero necesitas restaurarlo primero.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Este mensaje ha sido recuperado. Ahora puedes editarlo o volverlo a mandar.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'El mensaje no ha podido ser recuperado (probablemente porque ha sido le&iacute;do o borrado.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'La restauraci&oacute;n del mensaje ha fallado. ( Debe haber estado demasiado tiempo en la papelera y ha sido borrado.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'La restauraci&oacute;n del mensaje ha fallado.');
DEFINE ('_UDDEIM_DONTSEND', 'No enviar');
DEFINE ('_UDDEIM_SENDAGAIN', 'Reenviar');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'No has iniciado sesi&oacute;n');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>No hay mensajes en tu bandeja de entrada.</strong>');
	// changed in 0.4 (one dot that was too much after </strong> deleted)
	
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>No hay mensajes en tu bandeja de salida.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>No hay mensajes en tu papelera.</strong>');
DEFINE ('_UDDEIM_INBOX', 'Bandeja de entrada');
DEFINE ('_UDDEIM_OUTBOX', 'Bandeja de salida');
DEFINE ('_UDDEIM_TRASHCAN', 'Papelera');
DEFINE ('_UDDEIM_CREATE', 'Nuevo mensaje');
DEFINE ('_UDDEIM_UDDEIM', 'Mensajes privados');
DEFINE ('_UDDEIM_READSTATUS', 'Le&iacute;do');
DEFINE ('_UDDEIM_FROM', 'De');
DEFINE ('_UDDEIM_FROM_SMALL', 'de');
DEFINE ('_UDDEIM_TO', 'Para');
DEFINE ('_UDDEIM_TO_SMALL', 'para');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Tu bandeja de salida contiene todos los mensajes que has enviado y no has borrado todavía. Puedes memorizar un mensaje en tu bandeja de salida si este no ha sido leído. Si haces esto, ya no podrá ser leído por el destinatario del mensaje. ');
	// changed in 0.4
DEFINE ('_UDDEIM_RECALL', 'recuperar');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Recuperar este mensaje');
DEFINE ('_UDDEIM_RESTORE', 'restaurar');
DEFINE ('_UDDEIM_MESSAGE', 'Mensaje');
DEFINE ('_UDDEIM_DATE', 'Fecha');
DEFINE ('_UDDEIM_DELETED', 'Borrado');
DEFINE ('_UDDEIM_DELETE', 'borrar');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'borrar');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Este mensaje no puede ser mostrado. <br />Motivos posibles:<ul><li>No tienes permiso para leer este mensaje particular</li><li>Este mensaje ha sido borrado</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Has movido este mensaje a la papelera.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Mensaje de ');
DEFINE ('_UDDEIM_MESSAGETO', 'Mensaje para ');
DEFINE ('_UDDEIM_REPLY', 'Responder');
DEFINE ('_UDDEIM_SUBMIT', 'Enviar');
DEFINE ('_UDDEIM_DELETEREPLIED', 'Mover el mensaje a la papelera después de responderlo');
	// translators info: _UDDEIM_DELETEREPLIED is obsolete in 0.4. You can delete it.
DEFINE ('_UDDEIM_NOID', 'Error: No se ha encontrado la ID del destinatario. No se ha enviado el mensaje.');
DEFINE ('_UDDEIM_NOMESSAGE', 'Error: El mensaje esta vacío! No se ha enviado el mensaje.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Respuesta enviada');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Mensaje enviado');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' y el mensaje original ha sido enviado a la papelera');
DEFINE ('_UDDEIM_NOSUCHUSER', 'No existe ning&uacute;n usuario con este nombre!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'No es posible enviarse mensajes a si mismo!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Acceso denegado!</b> No tienes el permiso para realizar esta acci&oacute;n!');
DEFINE ('_UDDEIM_PRUNELINK', 'Solo administradores: Pasa');
// Admin
DEFINE ('_UDDEADM_SETTINGS', 'Administraci&oacute;n uddeIM ');
DEFINE ('_UDDEADM_GENERAL', 'General');
DEFINE ('_UDDEADM_ABOUT', 'Acerca de');
DEFINE ('_UDDEADM_DATESETTINGS', 'Fecha/hora');
DEFINE ('_UDDEADM_PICSETTINGS', 'Iconos');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Mantener mensajes leídos durante (días)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Mantener mensajes NO leídos durante (días)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Mantener mensajes en la papelera durante (días)');
DEFINE ('_UDDEADM_DAYS', 'día(s)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Introduce el numero de días que permanecerán los mensajes <b>leídos</b> en la bandeja de entrada. Si no quieres que se borren los mensajes automáticamente, introduce un numero alto (por ejemplo, 36524 días equivalen a un siglo). Pero recuerda que la Base de datos se llenara rápidamente si conservas todos los mensajes.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Introduce el numero de días que permanecerán los mensajes que <b>NO</b> han sido leídos a&uacute;n por el destinatario antes de borrarse.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Introduce el numero de días que permanecerán los mensajes en la papelera antes de purgarse. Valores menores de un día están permitidos. Por ejemplo: Para borrar los mensajes de la papelera desp&uacute;es de 3 horas, introduce 0.125 como valor.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Formato de la fecha');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Elige el formato en el cual ser&aacute; mostrada la fecha/hora del mensaje. Los meses son abreviados de acuerdo a las preferencias de lenguaje en Mambo (si se encuentra un archivo de lenguaje de uddeIM que coincida).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Formato de fecha largo');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Cuando se muestra el mensaje hay m&aacute;s espacio para mostrar la fecha. Elige el formato de fecha que se mostrar&aacute; cuando se abra un mensaje. Para los días de la semana y los meses, se aplicar&aacute;n las preferencias de lenguaje de Mambo (si se encuentra un archivo de lenguaje de uddeIM que coincida).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Borrado solo por administradores');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'si, solo por admins');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'no, por cualquier usuario');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Los borrados automáticos son una pesada carga para los servidores y las bases de datos. Si elige "<i>si,&nbsp;solo&nbsp;por&nbsp;admins</i>" el borrado automático de acuerdo con la configuraci&oacute;n de arriba (de todos los mensajes de usuario) es invocado cuando cualquier administrador comprueba su bandeja de entrada. Elija esta opci&oacute;n si cualquier administrador comprueba su bandeja de entrada todos los días o m&aacute;s frecuentemente, que es el caso de la mayoría de sitios web. (Si tu sitio web tiene m&aacute;s de un administrador, no importa cual de todos es el que entra porque el borrado es invocado automáticamente cuando entra cualquier admin.) Para sitios web peque&ntilde;os o poco administrados donde no suelen entrar los administradores a consultar sus bandejas de entrada, elije "<i>no,&nbsp;por&nbsp;cualquier&nbsp;usuario</i>". Si no entiendes esto o no sabes que opci&oacute;n elegir, elige "<i>no, por cualquier usuario</i>".');
DEFINE ('_UDDEADM_SAVESETTINGS', 'Guardar Configuraci&oacute;n');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'Los siguientes ajustes se han guardado en el archivo de configuraci&oacute;n:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'La Configuraci&oacute;n ha sido guardada.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Icono: Usuario en linea');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Introduce la ubicaci&oacute;n del icono que ser&aacute; mostrado al lado del nombre de usuario cuando este este en linea.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Icono: Usuario desconectado');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Introduce la ubicaci&oacute;n del icono que ser&aacute; mostrado al lado del nombre de usuario cuando este este conectado.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Icono: Mensaje leído');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Introduce la ubicaci&oacute;n del icono que ser&aacute; mostrado para los mensajes leídos');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Icono: Mensaje no leído');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Introduce la ubicaci&oacute;n del icono que ser&aacute; mostrado para los mensajes <b>NO</b> leídos');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Modulo: Icono de nuevos mensajes');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Esta opci&oacute;n hace referencia al modulo mod_uddeim_new. Introduce la ubicaci&oacute;n del icono que ser&aacute; mostrado cuando hayan nuevos mensajes.');
// admin import tab
DEFINE ('_UDDEADM_UDDEINSTALL', 'Instalaci&oacute;n uddeIM ');
DEFINE ('_UDDEADM_FINISHED', 'La instalaci&oacute;n ha terminado. Bienvenido a uddeIM. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">No tienes el "Mambo Community Builder" instalado. no vas a poder usar uddeIM.</span><br /><br />Deberías descargar <a href="http://www.mambojoe.com">"Mambo Community Builder"</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'continuar');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Hay ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' mensajes en tu instalaci&oacute;n de PMS. ¿Deseas importarlos a uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Esto no alterara los mensajes o tu instalaci&oacute;n de PMS. Permanecerán intactos. as&iacute; puedes importarlos a uddeIM de forma segura, incluso si piensas seguir usando PMS. (Debes salvar cualquier cambio que hayas hecho a la configuraci&oacute;n antes de ejecutar la importaci&oacute;n!) Cualquier mensaje que ya tengas en la base de datos de uddeIM permanecerá intacto.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4
	
DEFINE ('_UDDEADM_IMPORT_YES', 'Importar los mensajes de PMS a uddeIM ahora');
DEFINE ('_UDDEADM_IMPORT_NO', 'No, no importar ning&uacute;n mensaje');  
DEFINE ('_UDDEADM_IMPORTING', 'Por favor espere mientras los mensajes son importados.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Importaci&oacute;n de mensajes desde PMS concluida. No vuelva a ejecutar este script de instalaci&oacute;n porque si lo hace importara los mensajes otra vez y se mostrar&aacute;n duplicados.'); 
DEFINE ('_UDDEADM_IMPORT', 'Importar');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Importar mensajes desde PMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'No se ha encontrado una instalaci&oacute;n de PMS. No es posible importar.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Ya has importado los mensajes de PMS a uddeIM.</span>');
// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Blocked');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'No se ha podido enviar (el usuario le ha bloqueado)');
DEFINE ('_UDDEIM_BLOCKNOW', 'usuario&nbsp;bloqueado');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Esta es una lista de los usuario que has bloqueado. Estos usuarios no pueden enviarte mensajes privados.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Actualmente no tienes ning&uacute;n usuario bloqueado.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Actualmente tienes ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' usuario(s) bloqueado(s).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[desbloquear]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Si un usuario bloqueado intenta enviarte un mensaje, &eacute;l o ella ser&aacute; informado de que ha sido bloqueado y de que el mensaje no se ha enviado.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Un usuario bloqueado no puede ver que lo has bloqueado');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'No puedes bloquear a los administradores.');
// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Activar el sistema de bloqueo');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Cuando esta activo, los usuarios pueden bloquear a otros usuarios. Un usuario bloqueado no puede enviar mensajes a el usuario que lo ha bloqueado. Los administradores no pueden ser bloqueados.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'S&iacute;');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'No');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Usuarios bloqueados reciben mensaje');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Si elige <i>S&iacute;</i>, el usuario bloqueado sera informado de que su mensaje no ha podido ser enviado porque ha sido bloqueado por el receptor. Si elige <i>No</i>, el usuario bloqueado no recibir&aacute; ninguna notificaci&oacute;n de que su mensaje no se ha enviado.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'S&iacute;');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'No');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Sistema de bloqueo no activo');
// DEFINE ('_UDDEADM_DELETIONS', 'Mensajes'); 
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Borrados'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Bloqueos');
// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Integraci&oacute;n');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Mostrar el estado del usuario');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Si elige <i>S&iacute;</i>, uddeIM mostrar&aacute; cada nombre de usuario con un peque&ntilde;o icono que informa de si ese usuario esta en linea o no. Puedes cambiar estos iconos en la pesta&ntilde;a Iconos.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Permitir notificaci&oacute;n por correo');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Si elige <i>S&iacute;</i>, cada usuario podr&aacute; elegir si quiere recibir un correo cada vez que reciba un mensaje en su bandeja de entrada.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'El correo contiene el mensaje');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Si esta en <i>No</i>, este correo solo contendr&aacute; informaci&oacute;n sobre quien y cuando ha enviado el mensaje, pero no contendr&aacute; el mensaje en si.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Correo recordatorio');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Esta caracter&iacute;stica  manda - independientemente de los ajustes del usuario - un correo a el usuario que tiene mensajes no le&iacute;dos en su bandeja de entrada desde hace mucho tiempo (ver abajo). Esta caracter&iacute;stica es independiente de opci&oacute;n "permitir notificaciones por correo" de arriba. Si no quieres que se env&iacute;e ning&uacute;n correo, deber&aacute; desactivar las dos opciones.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Enviar correo recordatorio despu&eacute;s de');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Si la opci&oacute;n de recordatorio (ver arriba) est&aacute; en <i>S&iacute;</i>, pon aqu&iacute; cuantos d&iacute;as tardaran en ser enviados los correos de recordatorio avisando de que hay mensajes sin leer.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Lista de los primeros caracteres');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Aqu&iacute; puedes poner cuantos caracteres de el contenido de un mensaje se mostraran en la bandeja de entrada, salida y papelera.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Longitud m&aacute;xima del mensaje');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Pon aqu&iacute; la longitud m&aacute;xima de el mensaje. El mensaje ser&aacute; cortado autom&aacute;ticamente por esta longitud. Si se pone a "0" se permitir&aacute;n mensajes de cualquier longitud (no recomendado).');
DEFINE ('_UDDEADM_YES', 'S&iacute;');
DEFINE ('_UDDEADM_NO', 'No');
DEFINE ('_UDDEADM_ADMINSONLY', 'solo administradores');
DEFINE ('_UDDEADM_SYSTEM', 'Sistema');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Nombre de usuario para mensajes del sistema');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM soporta mensajes del sistema. Estos no tienen un remitente visible y los usuarios no podr&aacute;n responder al mensaje. Introduce aqu&iacute; el alias para los mensajes del sistema (por ejemplo <i>Soporte</i> o <i>Informaci&oacute;n</i> or <i>Administrador de la comunidad</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Permitir a los administradores enviar mensajes generales');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM soporta mensajes generales. Estos son enviados a todos los usuarios del sistema. No abuse de ellos.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Nombre del remitente del correo');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Introduce el nombre del remitente que usaran las notificaciones de correo (por ejemplo <i>ELNOBREDESUSITIOWEB</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Direcci&oacute;n de correo del remitente');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Introduzca la direcci&oacute;n de correo desde la cual ser&aacute;n enviadas las notificaciones de correo (esta debe ser la direcci&oacute;n principal del correo de contacto de su sitio web).');
DEFINE ('_UDDEADM_VERSION', 'versi&oacute;n uddeIM ');
DEFINE ('_UDDEADM_ARCHIVE', 'Archivo'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Activar archivo');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Elija si se permite a los usuarios guardar los mensajes en el archivo. Los mensajes en el archivo no ser&aacute;n borrados.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Numero m&aacute;ximo de mensajes en el archivo del usuario');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Pon cuantos mensajes podr&aacute; guardar cada usuario en el archivo (este limite no se aplica a los administradores).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Permitir auto copias');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Permite a los usuarios recibir copias de los mensajes que manden. Estas copias aparecer&aacute;n en la bandeja de entrada.');
DEFINE ('_UDDEADM_MESSAGES', 'Mensajes');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Sugerir descartar el original');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Cuando esta activa esta opci&oacute;n, pondr&aacute; una casilla al lado de el bot&oacute;n \'Enviar\' llamada \'descartar original\' que estar&aacute; activa por defecto. En este caso, el mensaje sera inmediatamente movido de la bandeja de entrada a la papelera cuando la respuesta se haya enviado. Esta opci&oacute;n mantiene baja la cantidad de mensajes en la base de datos. Los usuarios siempre pueden deseleccionar la casilla si quieren conservar el mensaje en la bandeja de entrada.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
	
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Mensajes por p&aacute;gina');	
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Define el numero de mensajes que ser&aacute;n mostrados por p&aacute;gina en la bandeja de entrada, salida, papelera y archivo.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Juego de caracteres usado');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Si tienes problemas mostrando juegos de caracteres no latinos, aqu&iacute; puedes introducir el juego de caracteres que usara uddeIM para convertir la salida de datos de la base de datos a HTML. <b>Si no sabes que significa esto, no cambies el valor por defecto! (Para Castellano el valor por defecto es el correcto)</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Juego de caracteres usado en correos');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Si tienes problemas mostrando juegos de caracteres no latinos, puedes introducir el juego de caracteres que usara uddeIM para enviar correos. <b>Si no sabes que significa esto, no cambies el valor por defecto! (Para Castellano el valor por defecto es el correcto)</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
		
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Este es el contenido de el correo que los usuarios recibir&aacute;n cuando la opci&oacute;n de arriba este activada. El contenido del mensaje no se incluir&aacute; en el correo. No cambies las variables %you%, %user% y %site%. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Este es el contenido de el correo que los usuarios recibir&aacute;n cuando la opci&oacute;n de arriba este activada. Este correo tendr&aacute; el contenido del mensaje. No cambies las variables %you%, %user%, %pmessage% y %site%. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Este es el contenido del correo de recordatorio que los usuarios recibir&aacute;n cuando la opci&oacute;n de arriba este activada. No cambies las variables %you% y %site%. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Permitir a los usuarios descargar mensajes de su archivo envi&aacute;ndoselos como correo.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Permitir descarga');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Este es el formato del correo que los usuarios recibir&aacute;n cuando se descarguen sus mensajes del archivo. No cambies las variables %user%, %msgdate% y %msgbody%. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 
DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Activar el limite de la bandeja de entrada');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Puedes a&ntilde;adir la cantidad de mensajes en la bandeja de entrada en el numero m&aacute;ximo de mensajes en el archivo. En este caso, el numero total de mensajes de la bandeja de entrada m&aacute;s los de el archivo no exceder&aacute; el numero fijado arriba. Alternativamente puedes fijar el limite de la bandeja de entrada sin un archivo. En este caso, los usuarios no podr&aacute;n tener en sus bandejas de entrada m&aacute;s mensajes que la cantidad fijada arriba. Si esa cantidad es alcanzada, no podr&aacute;n seguir respondiendo a los mensajes o crear nuevos hasta que hayan borrado mensajes de su bandeja de entrada o de su archivo respectivamente. (Los usuarios podr&aacute;n seguir recibiendo mensajes y leerlos.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Mostrar el limite de uso en la bandeja de entrada');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Muestra cuantos mensajes tienen los usuarios almacenados (y cuantos pueden almacenar) en una linea debajo de su bandeja de entrada.');
		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Has desactivado el archivo. ¿Que quieres hacer con los mensajes que hay guardados en el archivo?');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Dejarlos');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Dejarlos en el archivo (el usuario no podr&aacute; acceder a ellos y seguir&aacute;n contando para los limites de los mensajes).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Moverlos a la bandeja de entrada');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Los mensajes archivados ser&aacute;n movidos a las bandejas de entrada');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Los mensajes ser&aacute;n movidos a las bandejas de entradas de sus respectivos usuarios ( o descartados a la papelera si son m&aacute;s antiguos de lo permitido en la bandeja de entrada).');		
		
// 0.4 frontend, admins only (no translation necessary)		
DEFINE ('_UDDEIM_VALIDFOR_1', 'valido para ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' horas. 0=para siempre (los borrados autom&aacute;ticos se aplicaran)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Crear mensaje de sistema o general]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Crear mensaje normal (est&aacute;ndar)]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'No est&aacute;n permitidos los mensajes de sistema o generales.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Tipo de mensaje');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Ayuda para los mensajes de sistema');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(se abre en una nueva ventana)');
DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Estas a punto de enviar el mensaje mostrado abajo. Por favor revisalo y confirmalo o cancelalo!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Mensaje para <strong>todos los usuarios</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Mensaje para <strong>todos los administradores</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Mensaje para <strong>todos los usuarios actualmente logeados</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Los receptores no podr&aacute;n responder a este mensaje.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'El mensaje sera enviado con <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> como nombre de usuario');
DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'El mensaje expirar&aacute; ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'El mensaje no expirar&aacute;');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Revisa el enlace (haciendo clic en &eacute;l) antes de seguir!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Uso <strong>solo para mensajes de sistema</strong>:<br /> [b]<strong>negrita</strong>[/b] [i]<em>cursiva</em>[/i]<br />
[url=http://www.unenlace.com]un enlace[/url] o [url]http://www.unenlace.com[/url] son enlaces validos');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Error: No se han encontrado receptores. Mensaje no enviado.');		
		
		
// 0.4 frontend (all users, translation needed)
DEFINE ('_UDDEIM_CANTREPLY', 'No puedes responder a este mensaje.');
DEFINE ('_UDDEIM_EMNOFF', 'La notificaci&oacute;n por correo esta desactivada. ');
DEFINE ('_UDDEIM_EMNON', 'La notificaci&oacute;n por correo esta activada. ');
DEFINE ('_UDDEIM_SETEMNON', '[activarla]');
DEFINE ('_UDDEIM_SETEMNOFF', '[desactivarla]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE', 'Hola %you%, 
%user% te ha enviado un mensaje privado en %site%.
Por favor accede y leelo!');
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', 'Hola %you%, 
%user% Te ha enviado el siguiente mensaje en %site%.
Por favor accede para responder al mensaje!
__________________
%pmensaje%
');
DEFINE ('_UDDEIM_EMN_FORGETMENOT', 'Hola %you%,
tienes mensajes privados sin leer en %site%.
Por favor accede y leelos! 
');
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Tienes mensajes en %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'enviar como mensaje del sistema (los receptores no lo podr&aacute;n responder)');
DEFINE ('_UDDEIM_SEND_TOALL', 'enviar a todos los usuarios');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'enviar a todos los administradores');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'enviar a todos los usuarios que est&aacute;n en linea');
DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Error inesperado: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'El archivo no esta activado.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'El almacenado del mensaje en el archivo ha fallado.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Tienes guardados ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>No tienes guardado ning&uacute;n mensaje en el archivo todav&iacute;a.</strong>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' mensajes');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Tienes almacenado un mensaje');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Para guardar mensajes, tienes que borrar otros mensajes primero.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Puedes guardar un m&aacute;ximo de ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' mensajes.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Tienes ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' mensajes en tu');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'archivo');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'bandeja de entrada');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'bandeja de entrada y archivo');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'El m&aacute;ximo permitido es ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Tu puedes recibir y leer mensajes pero no podr&aacute;s responderlos o crear nuevos hasta que borres mensajes.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Mensajes guardados: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(de un m&aacute;ximo ');
DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Mensaje guardado en el archivo.');
DEFINE ('_UDDEIM_STORE', 'archivar');
		// translators info: as in: 'store this mensaje in archive now'
DEFINE ('_UDDEIM_BACK', 'volver');
DEFINE ('_UDDEIM_TRASHCHECKED', 'descartar seleccionados');
	// translators info: plural!
	
DEFINE ('_UDDEIM_SHOWALL', 'mostrar todos los mensajes');
	// translators example "SHOW ALL mensajes"
	
DEFINE ('_UDDEIM_ARCHIVE', 'Archivo');
	// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'El archivo esta lleno. No se ha guardado.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'No hay mensajes seleccionados.');
DEFINE ('_UDDEIM_THISISACOPY', 'Copia de el mensaje enviado para ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'copia para mi');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'copia para el archivo');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'descartar el original');
DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Descarga del Mensaje');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Env&iacute;o del correo con los mensajes exportados');
DEFINE ('_UDDEIM_EXPORT_NOW', 'correo enviado a mi');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Este correo incluye tus mensajes privados.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'No puedo enviar el correo conteniendo los mensajes');
DEFINE ('_UDDEIM_LIMITREACHED', 'Limite del mensaje! No restaurado.');
DEFINE ('_UDDEIM_WRITEMSGTO', 'Escribir un mensaje a ');
$udde_smon[1]="Ene";
$udde_smon[2]="Feb";
$udde_smon[3]="Mar";
$udde_smon[4]="Abr";
$udde_smon[5]="May";
$udde_smon[6]="Jun";
$udde_smon[7]="Jul";
$udde_smon[8]="Ago";
$udde_smon[9]="Sep";
$udde_smon[10]="Oct";
$udde_smon[11]="Nov";
$udde_smon[12]="Dic";
$udde_lmon[1]="Enero";
$udde_lmon[2]="Febrero";
$udde_lmon[3]="Marzo";
$udde_lmon[4]="Abril";
$udde_lmon[5]="Mayo";
$udde_lmon[6]="Junio";
$udde_lmon[7]="Julio";
$udde_lmon[8]="Agosto";
$udde_lmon[9]="Septiembre";
$udde_lmon[10]="Octubre";
$udde_lmon[11]="Noviembre";
$udde_lmon[12]="Diciembre";
$udde_lweekday[0]="Domingo";
$udde_lweekday[1]="Lunes";
$udde_lweekday[2]="Martes";
$udde_lweekday[3]="Miercoles";
$udde_lweekday[4]="Jueves";
$udde_lweekday[5]="Viernes";
$udde_lweekday[6]="Sabado";
$udde_sweekday[0]="Dom";
$udde_sweekday[1]="Lun";
$udde_sweekday[2]="Mar";
$udde_sweekday[3]="Mie";
$udde_sweekday[4]="Jue";
$udde_sweekday[5]="Vie";
$udde_sweekday[6]="Sab";
// new in 0.5 ADMIN
// Translators observe: Search for _UDDEIM_SYSGM_SHORTHELP (above)
// and change this text so that it no longer contains 
// information abouth the [newurl] code. [newurl] is no 
// longer supported by this version of uddeIM.
// already done in this file!
// 
// PLEASE
// When you're done translating, please change the
	// version       0.4+
// at the top of this file into
	// version       0.5
// and delete the line right after it that says
	// (0.4 plus 0.5 strings in English)
// as well as these comments. Thank you.
DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'Plantilla uddeIM');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Elije una plantilla para usar con uddeIM');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Mostrar conexiones');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Usar <i>sí</i> si tienes CB/CBE/JS instalado y quieres presentar al usuario los nombres de sus conexiones al escribir un mensaje.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Mostrar opciones');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'El vínculo a opciones aparece en uddeIM si tienes activadas las notificaciones de e-mail o el bloqueo de usuarios. Si no quieres ésto, lo puedes apagar aquí. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'sí, al final');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Permitir BB codes');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'formato de fuentes solamente');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Usar <i>formato de fuentes solamente</i> para permitir que los usuarios puedan usar BB codes para negrita, itálico, subrayado, color de fuente y su tamaño. Cuando eliges <i>sí</i> en esta opción, los usuarios pueden usar <strong>todos</strong> los BB codes soportados en sus mensajes (incluso vínculos e imágenes).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Permitir Emotíconos');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Cuando se elije <i>sí</i>, los códigos de emotíconos como :-) se reemplazan con gráficos al mostrar el mensaje. Ver el archivo readme para una lista de los emotíconos soportados.');
DEFINE ('_UDDEADM_DISPLAY', 'Mostrar');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Mostrar Íconos de Menú');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Cuando se elige <i>sís</i>, los vínculos de menu y acción serán mostrados con un ícono.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Título del Componente');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Ingrese el título que tendrá el componente de mensajería privada, por ejemplo \'Centro de Mensajes\'. Déjalo vacío si no quieres mostrar un título.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Mostrar vínculo \'Acerca de\'');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Elegir <i>sí</i> para mostrar un vínculo al sitio de uddeIM y su licencia. Este link se ubicará en el fondo de la salida HTML de uddeIM.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Para e-mail ahora');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Marca esta opción para prevenir que uddeIM envíe emails (notificaciones de mensajes y de olvido) sin importar las preferencias de los usuarios, por ejemplo cuando se está instalando el sitio. Si no quieres esta facilidad nunca, deja todas las opciones de arriba en <i>no</i>.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manualmente');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'Miniaturas de CB en las listas');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Elige <i>sí</i> si quieres mostrar las miniaturas de CB de los usuarios en las listas de mensajes (bandeja de entarada, de salida, etc.)');
// new in 0.5 FRONTEND
DEFINE ('_UDDEIM_SHOWUSERS', 'Mostrar Usuarios');
DEFINE ('_UDDEIM_CONNECTIONS', 'Conexiones');
DEFINE ('_UDDEIM_SETTINGS', 'Configuración');
DEFINE ('_UDDEIM_NOSETTINGS', 'No hay configuraciones para ajustar.');
DEFINE ('_UDDEIM_ABOUT', 'Acerca de'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Nuevo mensaje'); // as in "write new mensaje", but only one word
DEFINE ('_UDDEIM_EMN', 'Notificación por e-mail');
DEFINE ('_UDDEIM_EMN_EXP', 'Puedes recibir un e-mail cuando un nuevo mensaje te es enviado.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Notificación por e-mail para nuevos mensajes');
DEFINE ('_UDDEIM_EMN_NONE', 'Sin notificacion por e-mail');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Notificación por e-mail cuando estoy desconectado');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'No me envíen notificaciones de respuestas');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Bloqueo de usuarios'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Puedes impedir que los usuarios te envíen mensajes bloqueándolos. Elegí <i>bloquear usuario</i> cuando ves un mensaje del usuario en cuestión.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Guardar cambio');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'Códigos BB Code para producir texto en negrita. Uso: [b]negrita[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'Códigos BB Code para producir texto en itálico. Uso: [i]itálico[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'Códigos BB Code para producir texto subrayado. Uso: [u]subrayado[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'Códigos BB Code para producir texto en colores. Uso:  [color=#XXXXXX]coloreado[/color] donde XXXXXX es el código de color, por ejemplo FF0000 es rojo.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'Códigos BB Code para producir texto en colores. Uso:  [color=#XXXXXX]coloreado[/color] donde XXXXXX es el código de color, por ejemplo 00FF00 es verde.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'Códigos BB Code para producir texto en colores. Uso:  [color=#XXXXXX]coloreado[/color] donde XXXXXX es el código de color, por ejemplo 0000FF es azul.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'Códigos BB Code para producir texto muy pequeño. Uso: [size=1]Texto muy pequeño.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'Códigos BB Code para producir texto pequeño. Uso: [size=2]texto pequeño.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'Códigos BB Code para producir texto grande. Uso: [size=4]texto grande.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'Códigos BB Code para producir texto muy grande. Uso: [size=5]texto muy grande.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'Códigos BB Code para insertar un vínculo a una imagen. Uso: [img]URL-de-la-imagen[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'Códigos BB Code para insertar un vínculo. Uso: [url]direccion-web[/url]. ¡No olvidar poner el http:// al comienzo de las direcciones web!');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Cerrar todos los BB codes abiertos.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' mensaje en tu'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "mensaje in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>No tienes mensajes en tu archivo.</strong>'); 
