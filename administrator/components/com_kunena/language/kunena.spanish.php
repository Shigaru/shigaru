<?php
/**
* @version $Id: kunena.cpanel.php 2667 2010-05-13 JoniJnm.es $
* Kunena Component
* @package Kunena
*
* @Copyright (C) 2008 - 2009 Kunena Team All rights reserved
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @link http://www.kunena.com
*
* Based on FireBoard Component
* @Copyright (C) 2006 - 2007 Best Of Joomla All rights reserved
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @link http://www.bestofjoomla.com
*
* Based on Joomlaboard Component
* @copyright (C) 2000 - 2004 TSMF / Jan de Graaff / All Rights Reserved
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @author TSMF & Jan de Graaff
**/

// Dont allow direct linking
defined( '_JEXEC' ) or defined ('_VALID_MOS') or die('Restricted access');

// 1.5.12
define('_COM_A_URLLENGHT','Máxima longitud del enlace de las URLs e imágenes');
define('_COM_A_URLLENGHT_DESC','Máxima longitud del enlace de las URLs e imágenes en el editor de Kunena');
define('COM_KUNENA_BBCODE_CONFIDENTIAL_TEXT','Información confidencial:');
define('_KUNENA_CATEGORY_ORPHAN','Huérfano');
define('_KUNENA_CATEGORY_ORPHAN_DESC','Tienes categorías huérfanas o perdidas. Por favor, cambia su padre para que sea válida.');
define('_KUNENA_SECTION','Sección');
define('_KUNENA_NOBODY','Nadie');
// Disable userlist
define('_USERLIST_DISABLED','La lista de usuarios de Kunena ha sido deshabilitada, no puedes acceder a ella.');
define('_KUNENA_ADMIN_CONFIG_USERLIST_ENABLE','Activar la lista de usuarios');
define('_KUNENA_ADMIN_CONFIG_USERLIST_ENABLE_DESC','Activa o desactiva la lista de usuarios según la vayas a usar o no.');
// Anonymous posting
define('_KUNENA_CATEGORY_ANONYMOUS',"Anónimo");
define('_KUNENA_CATEGORY_ANONYMOUS_ALLOW',"Permitir mensajes anónimos");
define('_KUNENA_CATEGORY_ANONYMOUS_ALLOW_DESC',"Anonymous messages can be used by registered users to post sensitive information to this category: <b>No user related information</b> will be stored to anonymous messages (including IP address).");
define('_KUNENA_CATEGORY_ANONYMOUS_DEFAULT',"By default post replies as");
define('_KUNENA_CATEGORY_ANONYMOUS_DEFAULT_DESC',"If anonymous messages have been enabled, this option selects default choice for the user. Regular users can later edit their own posts to be anonymous, but only moderators have the ability to edit anonymous posts.");
define('_KUNENA_CATEGORY_ANONYMOUS_X_REG',"Usuario registrado");
define('_KUNENA_CATEGORY_ANONYMOUS_X_ANO',"Usuario anónimo");
define('_KUNENA_BACK',"Volver");
define('_KUNENA_POST_AS_ANONYMOUS',"Post de un anónimo");
define('_KUNENA_POST_AS_ANONYMOUS_DESC',"This post contains sensitive information. Remove all user information from this post.");
define('_KUNENA_POST_ERROR_NO_CATEGORY',"No has seleccionado una categoría para guardar tus mensajes");
define('_KUNENA_POST_ERROR_IS_SECTION',"No puedes escribir mensajes es una sección.");
define('_KUNENA_POST_ERROR_ANONYMOUS_FORBITTEN',"This category does not allow you to write anonymous posts. To keep your privacy, message was not sent.");
define('_KUNENA_USERNAME_ANONYMOUS',"Anónimo");

// 1.5.10
DEFINE('_KUNENA_PARENTDESC', 'Nota: Para crear una categoría, elija <em>Categoría de Nivel Superior</em> como categoría padre. Una categoría sirve como un contenedor para los foros.<br />Un foro <strong>sólo</strong> puede ser creado dentro de una categoría, seleccione una categoría existente como la categoría padre o principal para el foro.<br /> Los mensajes sólo pueden ser creados en los foros, no en las categorías.');
DEFINE('_KUNENA_ADMIN', 'Administración Kunena');
DEFINE('_KUNENA_NOTEUS', 'NOTA: Solo los usuarios con la banderilla de moderador en su perfil serán mostrados aquí. Con el fin de poder añadir un moderador, debes dar al usuario el rango de moderador, ve a <a href="index2.php?option=com_Kunena&task=profiles">Administración de usuarios</a> y busque al usuario que quiera hacer moderador. Seleccione su perfil y actualícelo. El rango de moderador solo puede ser dado por un Administrador del Sitio. ');
DEFINE('_KUNENA_SHOW_AVATAR_ON_CAT_DESC', 'Defina a <em>Si</em>, si quiere mostrar el avatar de los usuarios en la lista de Categorías, Discusiones Recientes y Mis Discusiones.');
DEFINE('_KUNENA_SHOW_AVATAR_ON_CAT', 'Mostrar Avatares?');
DEFINE('_KUNENA_SORTID', 'Ordenar por userID');
DEFINE('_KUNENA_SORTMOD', 'Ordenar por Moderador');
DEFINE('_KUNENA_SORTNAME', 'Ordenar por Nombre');
DEFINE('_KUNENA_SORTREALNAME', 'Ordenar por Nombre Real');
DEFINE('_KUNENA_PDF_NOT_GENERATED_MESSAGE_DELETED', 'El PDF no se puede generar porque se eliminó el hilo.');
//Hide IP
DEFINE('_KUNENA_COM_A_HIDE_IP', 'Ocultar IP en mensajes de moderadores.');
DEFINE('_KUNENA_COM_A_HIDE_IP_DESC', 'Oculta la IP en los mensajes de los moderadores y muestra sólo la IP¨a los administradores.');
//JomSocial Activity Stream Integration disable/enable
DEFINE('_COM_A_JS_ACTIVITYSTREAM_INTEGRATION', 'Habilitar integración con Actividades Recientes de Jomsocial');
DEFINE('_COM_A_JS_ACTIVITYSTREAM_INTEGRATION_DESC', 'En el muro de Actividades Recientes de Jomsocial se mostrarán los últimos mensajes y temas creados en el Foro Kunena.');
// Email
DEFINE('_KUNENA_EMAIL_INVALID', 'El foro trató de enviar un email desde una dirección no válida. Póngase en contacto con el administrador del sitio!');
DEFINE('_KUNENA_MY_EMAIL_INVALID', 'Su dirección de correo electrónico no es válida. Se requiere de una dirección válida de correo electrónico para poder postear en este foro!');

// 1.5.8

define('_KUNENA_USRL_REALNAME', 'Nombre real');
define('_KUNENA_USRL_NAME', 'Nombre de usuario');
define('_KUNENA_SEO_SETTINGS', 'Opciones SEO');
define('_KUNENA_SEF', 'Urls amigables para el motor de búsquedas');
define('_KUNENA_SEF_DESC', 'Selecciona qué urls serán optimizadas para el motor de búsquedas. NOTA: Kunena acepta URLs SEF aunque esta opción esté deshabilitada.');
define('_KUNENA_SEF_CATS', 'No usar IDs de categoría');
// Please use words from your own (or nearby) language in the next URL, but only using a-z:
define('_KUNENA_SEF_CATS_DESC', 'ALERTA: Si seleccionas no, kunena no podrá aceptar URLs del tipo: http://www.dominio.com/foro/categoria/123-mensaje');
define('_KUNENA_SEF_UTF8', 'Permitir soporte UTF8');
// Please use words from your own (or nearby) language in the next URL, but make sure that they contain UTF8 letters:
define('_KUNENA_SEF_UTF8_DESC', 'Si seleccionas sí podrás ver acentos o eñes en las urls (foro/categorÍa/123-mensaje) NOTA: Kunena acepta URLs UTF8 incluyo si está deshabilitada.');
define('_KUNENA_SYNC_USERS_OPTIONS', 'Opciones');
define('_KUNENA_SYNC_USERS_CACHE', 'Borrar cache de usuarios');
define('_KUNENA_SYNC_USERS_CACHE_DESC', 'Si has cambiado el grupo de usuario (administrador, autor, ect), con esta función el usuario podrá ver los foros nuevos ocultos según el grupo.');
define('_KUNENA_SYNC_USERS_ADD', 'Añadir perfil a todos');
define('_KUNENA_SYNC_USERS_ADD_DESC', 'Kunena sólo crea el perfil del usuario si este entra en el foro. Con esta función se creará el perfil a todos los usuarios.');
define('_KUNENA_SYNC_USERS_DEL', 'Eliminar perfiles de usuarios eliminados');
define('_KUNENA_SYNC_USERS_DEL_DESC', 'Kunena no borra los perfiles de los usuarios eliminados, sólo los oculta. Con esta opción se eliminarán los perfiles de los usuarios borrados.');
define('_KUNENA_SYNC_USERS_RENAME', 'Actualizar el nombre del autor en los posts');
define('_KUNENA_SYNC_USERS_RENAME_DESC', 'Kunena actualizará el nombre de usuario o nombre real del autor según tu configuración.');
define('_KUNENA_SYNC_USERS_DO_CACHE', 'Caché de usuarios eliminada.');
define('_KUNENA_SYNC_USERS_DO_ADD', 'Perfiles de usuarios añadidos:');
define('_KUNENA_SYNC_USERS_DO_DEL', 'Perfiles de usuarios eliminados:');
define('_KUNENA_SYNC_USERS_DO_RENAME', 'Mensajes actualizados:');

// 1.5.7

define('_KUNENA_JS_ACTIVITYSTREAM_CREATE_MSG1', 'creó un nuevo mensaje');
define('_KUNENA_JS_ACTIVITYSTREAM_CREATE_MSG2', 'en el foro.');
define('_KUNENA_JS_ACTIVITYSTREAM_REPLY_MSG1', 'respondió a un mensaje');
define('_KUNENA_JS_ACTIVITYSTREAM_REPLY_MSG2', 'en el foro.');

define('_KUNENA_AUP_ALPHAUSERPOINTS', 'AlphaUserPoints');
define('_KUNENA_AUP_ENABLED_POINTS_IN_PROFILE', 'Permitir puntos en el perfil');
define('_KUNENA_AUP_ENABLED_POINTS_IN_PROFILE_DESC', 'Si has instalado AlphaUserPoints, puedes configurar Kunena para que muestre los puntos de los usuarios en su perfil');
define('_KUNENA_AUP_ENABLED_RULES', 'Permitir reglas de puntos');
define('_KUNENA_AUP_ENABLED_RULES_DESC', 'You can use the pre-installed rules in AlphaUserPoints to attribs points on new topic and reply. You must have AlphaUserPoints 1.5.3 or later installed. If you have an older version, you must install manually the rules (See AlphaUserPoints documentation).');
define('_KUNENA_AUP_MINIMUM_POINTS_ON_REPLY', 'Caracteres mínimos en la respuesta');
define('_KUNENA_AUP_MINIMUM_POINTS_ON_REPLY_DESC', 'Minimum characters in reply text to earn points on reply topic.');
define('_KUNENA_AUP_MESSAGE_TOO_SHORT', 'Tu respuesta fue muy corta para obtener puntos.');
define('_KUNENA_AUP_POINTS', 'Puntos:');

// 1.0.11 and 1.5.4
DEFINE('_KUNENA_MOVED', 'Movido');

// 1.0.11 and 1.5.3
DEFINE('_KUNENA_VERSION_SVN', 'Revisión SVN');
DEFINE('_KUNENA_VERSION_DEV', 'Instantanea del Desarrollo');
DEFINE('_KUNENA_VERSION_ALPHA', 'Lanzamiento Alpha');
DEFINE('_KUNENA_VERSION_BETA', 'Lanzamiento Beta');
DEFINE('_KUNENA_VERSION_RC', 'Versión Candidata');
DEFINE('_KUNENA_VERSION_INSTALLED', 'Has instalado Kunena %s (%s).');
DEFINE('_KUNENA_VERSION_SVN_WARNING', '¡Nunca use una revisión SVN para cualquier otra cosa que no sea el desarrollo de software!');
DEFINE('_KUNENA_VERSION_DEV_WARNING', '¡Esta versión interna sólo debe utilizarse por los desarrolladores y probadores!');
DEFINE('_KUNENA_VERSION_ALPHA_WARNING', 'Esta versión no debe ser utilizada en centros de producción.');
DEFINE('_KUNENA_VERSION_BETA_WARNING', 'Esta versión no está recomendada para ser utilizado en centros de producción.');	
DEFINE('_KUNENA_VERSION_RC_WARNING', 'Esta versión puede contener errores, que se arreglarán en la versión final.');	
DEFINE('_KUNENA_ERROR_UPGRADE', 'La actualización de Kunena a la versión %s ha fallado');
DEFINE('_KUNENA_ERROR_UPGRADE_WARN', 'En su foro pueden faltar algunas correcciones importantes y algunas características pueden estar quebradas u obsoletas.');
DEFINE('_KUNENA_ERROR_UPGRADE_AGAIN', 'Por favor, intente actualizar de nuevo. Si no puede actualizar a Kunena %s, usted puede hacer un downgrade a la última versión funcional.');
DEFINE('_KUNENA_PAGE', 'Página');
DEFINE('_KUNENA_RANK_NO_ASSIGNED', 'Rango no asignado');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_GENERAL', 'Problemas detectados en la integración con Community Builder:');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_INSTALL', 'La integración con Community Builder sólo funcionará si usted tiene instalada la versión %s o superior de Community Builder.');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_PUBLISH', 'La integración con el Perfil de Community Builder sólo funcionará si el perfil del usuario Community Builder ha sido publicado.');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_UPDATE', 'La integración con el Perfil de Community Builder sólo funcionará si está utilizando la versión% s o superior de Community Builder.');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_XHTML', 'La integración con el Perfil de Community Builder sólo funcionará si está Community Builder en modo de cumplimiento con los estadares de W3C XHTML 1.0 Trans.');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_INTEGRATION', 'La integración con el Perfil de Community Builder sólo funciona si el plug-in de integración se ha habilitado en la administración de Kunena para Community Builder.');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_HIDE', 'Guardar la configuración Kunena desactivar integración y ocultar esta advertencia.');

// 1.0.10
DEFINE('_KUNENA_BACK', 'Volder');
DEFINE('_KUNENA_SYNC', 'Sincronizar');
DEFINE('_KUNENA_NEW_SMILIE', 'Nuevo emoticono');
DEFINE('_KUNENA_PRUNE', 'Prune');

// Editor
DEFINE('_KUNENA_EDITOR_LINK_URL', ' URL: ');
DEFINE('_KUNENA_EDITOR_LINK_TEXT', ' Texto: ');
DEFINE('_KUNENA_EDITOR_LINK_INSERT', 'Insertar');
DEFINE('_KUNENA_EDITOR_IMAGE_SIZE', ' Tamaño (1-499): ');
DEFINE('_KUNENA_EDITOR_IMAGE_URL', ' URL: ');
DEFINE('_KUNENA_EDITOR_IMAGE_INSERT', 'Insertar');
DEFINE('_KUNENA_EDITOR_VIDEO_SIZE', 'Tamaño: ');
DEFINE('_KUNENA_EDITOR_VIDEO_WIDTH', 'Ancho: ');
DEFINE('_KUNENA_EDITOR_VIDEO_HEIGHT', 'Alto:');
DEFINE('_KUNENA_EDITOR_VIDEO_URL', 'URL: ');
DEFINE('_KUNENA_EDITOR_VIDEO_ID', 'ID: ');
DEFINE('_KUNENA_EDITOR_VIDEO_PROVIDER', 'Proveedor: ');
DEFINE('_KUNENA_EDITOR_HELPLINE_BOLD', 'Negrita: [b]texto[/b]');
DEFINE('_KUNENA_EDITOR_HELPLINE_ITALIC', 'Cursiva: [i]texto[/i]');
DEFINE('_KUNENA_EDITOR_HELPLINE_UNDERL', 'Subrayado: [u]texto[/u]');
DEFINE('_KUNENA_EDITOR_HELPLINE_STRIKE', 'Texto Tachado: [strike]texto[/strike]');
DEFINE('_KUNENA_EDITOR_HELPLINE_SUB', 'Subíndice: [sub]texto[/sub]');
DEFINE('_KUNENA_EDITOR_HELPLINE_SUP', 'Superíndice: [sup]texto[/sup]');
DEFINE('_KUNENA_EDITOR_HELPLINE_QUOTE', 'Citar: [quote]texto[/quote]');
DEFINE('_KUNENA_EDITOR_HELPLINE_CODE', 'Código: [Xcode]código[X/code]');
DEFINE('_KUNENA_EDITOR_HELPLINE_UL', 'Lista Desordenada: [ul] [li]texto[/li] [/ul] - Pista: una lista debe tener Ítems');
DEFINE('_KUNENA_EDITOR_HELPLINE_OL', 'Lista Ordenada: [ol] [li]texto[/li] [/ol] - Pista: una lista debe tener Ítems');
DEFINE('_KUNENA_EDITOR_HELPLINE_LI', 'Listar Ítem: [li] listar ítem [/li]');
DEFINE('_KUNENA_EDITOR_HELPLINE_ALIGN_LEFT', 'Alinear a la izquierda: [left]Texto[/left]');
DEFINE('_KUNENA_EDITOR_HELPLINE_ALIGN_CENTER', 'Alinear al centro: [center]Texto[/center]');
DEFINE('_KUNENA_EDITOR_HELPLINE_ALIGN_RIGHT', 'Alinear a la derecha: [right]Texto[/right]');
DEFINE('_KUNENA_EDITOR_HELPLINE_IMAGELINK', 'Insertar Imagen: [img size=(01-499)]http://www.google.com/images/web_logo_left.gif[/img]');
DEFINE('_KUNENA_EDITOR_HELPLINE_IMAGELINKSIZE', 'Insertar Imagen: Tamaño desde 1 a 499');
DEFINE('_KUNENA_EDITOR_HELPLINE_IMAGELINKURL', 'Insertar Imagen: URL del Enlace de la Imagen');
DEFINE('_KUNENA_EDITOR_HELPLINE_IMAGELINKAPPLY', 'Insertar Imagen: Aplicar Insertar Imagen');
DEFINE('_KUNENA_EDITOR_HELPLINE_LINK', 'Enlace: [url=http://www.zzz.com/]Esto es un enlace[/url]');
DEFINE('_KUNENA_EDITOR_HELPLINE_LINKURL', 'Enlace: URL del enlace');
DEFINE('_KUNENA_EDITOR_HELPLINE_LINKTEXT', 'Enlace: Descripción del enlace');
DEFINE('_KUNENA_EDITOR_HELPLINE_LINKAPPLY', 'Enlace: Insertar enlace');
DEFINE('_KUNENA_EDITOR_HELPLINE_HIDE','Ocultar texto: [hide]ocultar cualquier texto[/hide] – Oculta parte del mensaje a los Invitados');
DEFINE('_KUNENA_EDITOR_HELPLINE_SPOILER', 'Spoiler: El texto sólo es mostrado tras hacer click en el spoiler.');
DEFINE('_KUNENA_EDITOR_HELPLINE_COLOR', 'Color: [color=#FF6600]texto[/color]');
DEFINE('_KUNENA_EDITOR_HELPLINE_FONTSIZE', 'Tamaño de Fuente: [size=1]tamaño de fuente[/size] - Pista: el rango de tamaños va de 1 a 5');
DEFINE('_KUNENA_EDITOR_HELPLINE_FONTSIZESELECTION', 'Tamaño de Fuente: Elige Tamaño de la Fuente, selecciona el texto y pulsa el botón de la izquierda desde aquí');
DEFINE('_KUNENA_EDITOR_HELPLINE_EBAY', 'eBay: [ebay]Número de Ítem[/ebay]');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEO', 'Video: Elige Modo Proveedor o URL');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOSIZE', 'Video: Tamaño del video');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOWIDTH', 'Video: Ancho de video');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOHEIGHT', 'Video: Alto del video');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOPROVIDER', 'Video: Elige proveedor del video');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOID', 'Video: ID del Video – puedes verlo en la URL del video');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOAPPLY1', 'Video: [video size=100 width=480 height=360 provider=clipfish]3423432[/video]');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOURL', 'Video: URL del Video');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOAPPLY2', 'Video: [video size=100 width=480 height=360]http://myvideodomain.com/myvideo[/video]');
DEFINE('_KUNENA_EDITOR_HELPLINE_IMGPH', 'Inserta [img], marcador de posición en el mensaje para la imagen adjuntada');
DEFINE('_KUNENA_EDITOR_HELPLINE_FILEPH', 'Inserta [file], marcador de posición en el mensaje para el archivo adjuntado ');
DEFINE('_KUNENA_EDITOR_HELPLINE_SUBMIT', 'Haz click aquí para enviar tu mensaje');
DEFINE('_KUNENA_EDITOR_HELPLINE_PREVIEW', 'Haz click aquí para ver una vista previa de tu mensaje antes de enviarlo');
DEFINE('_KUNENA_EDITOR_HELPLINE_CANCEL', 'Haz click click aquí para cancelar tu mensaje');
DEFINE('_KUNENA_EDITOR_HELPLINE_HINT', 'Ayuda bbCode - Pista: bbCode puede ser usado en texto seleccionado');

DEFINE('_KUNENA_BBCODE_HIDDENTEXT', '<span class="fb_quote">Parte del texto está oculto para los invitados. Por favor, identifícate o regístrate para verlo.</span>');
DEFINE('_KUNENA_PROFILE_BIRTHDAY', 'Cumpleaños');
DEFINE('_KUNENA_DT_MONTHDAY_FMT','%d/%m');
DEFINE('_KUNENA_CFC_FILENAME','Archivos CSS para ser modificados');
DEFINE('_KUNENA_CFC_SAVED','Archivo CSS guardado');
DEFINE('_KUNENA_CFC_NOTSAVED','Archivo CSS no guardado.');
DEFINE('_KUNENA_JS_WARN_NAME_MISSING','Falta tu nombre');
DEFINE('_KUNENA_JS_WARN_UNAME_MISSING','Fatal tu nombre de usuario');
DEFINE('_KUNENA_JS_WARN_VALID_AZ09','El campo contiene caracteres no válidos');
DEFINE('_KUNENA_JS_WARN_MAIL_MISSING','Falta el e-mail');
DEFINE('_KUNENA_JS_WARN_PASSWORD2','Introduce el password válido');
DEFINE('_KUNENA_JS_PROMPT_UNAME','Vuelva a ingresar su nombre de usuario');
DEFINE('_KUNENA_JS_PROMPT_PASS','Vuelva a ingresar el password');
DEFINE('_KUNENA_DT_LMON_DEC', 'Diciembre');
DEFINE('_KUNENA_DT_MON_DEC', 'Dic');
DEFINE('_KUNENA_NOGENDER', 'Desconocido');
DEFINE('_KUNENA_ERROR_INCOMPLETE_ERROR', 'Ha instalación de Kunena se ha completado');
DEFINE('_KUNENA_ERROR_INCOMPLETE_OFFLINE', 'Debido a los errores anteriores, el foro está ahora fuera de línea y la administración del mismo se ha inhabilitado.');
DEFINE('_KUNENA_ERROR_INCOMPLETE_REASONS', 'Posibles razones de este error:');
DEFINE('_KUNENA_ERROR_INCOMPLETE_1', '1) La instalación de Kunena ha fallado por falta de tiempo (prueba, si quieres, de nuevo)');
DEFINE('_KUNENA_ERROR_INCOMPLETE_2', '2) Has eliminado alguna tabla de Kunena en tu base de datos');
DEFINE('_KUNENA_ERROR_INCOMPLETE_3', '3) La base de datos está dañada');
DEFINE('_KUNENA_ERROR_INCOMPLETE_SUPPORT', 'Nuestro foro de soporte se puede encontrar en:');

// 1.0.9
DEFINE('_KUNENA_INSTALLED_VERSION', 'Installed version');
DEFINE('_KUNENA_COPYRIGHT', 'Copyright');
DEFINE('_KUNENA_LICENSE', 'License');
DEFINE('_KUNENA_PROFILE_NO_USER', 'User does not exist.');
DEFINE('_KUNENA_PROFILE_NOT_FOUND', 'User has not yet visited forum and has no profile.');

// Search
DEFINE('_KUNENA_SEARCH_RESULTS', 'Resultados de la Búsqueda');
DEFINE('_KUNENA_SEARCH_ADVSEARCH', 'Búsqueda Avanzada');
DEFINE('_KUNENA_SEARCH_SEARCHBY_KEYWORD', 'Buscar palabra clave');
DEFINE('_KUNENA_SEARCH_KEYWORDS', 'Palabras clave');
DEFINE('_KUNENA_SEARCH_SEARCH_POSTS', 'Buscar mensajes enteros');
DEFINE('_KUNENA_SEARCH_SEARCH_TITLES', 'Buscar sólo títulos');
DEFINE('_KUNENA_SEARCH_SEARCHBY_USER', 'Buscar por nombre de usuario');
DEFINE('_KUNENA_SEARCH_UNAME', 'Nombre de usuario');
DEFINE('_KUNENA_SEARCH_EXACT', 'Nombre exacto');
DEFINE('_KUNENA_SEARCH_USER_POSTED', 'Mensajes escritos por');
DEFINE('_KUNENA_SEARCH_USER_STARTED', 'Temas comenzados por');
DEFINE('_KUNENA_SEARCH_USER_ACTIVE', 'Activity in threads');
DEFINE('_KUNENA_SEARCH_OPTIONS', 'Opciones de búsqueda');
DEFINE('_KUNENA_SEARCH_FIND_WITH', 'Find Threads with');
DEFINE('_KUNENA_SEARCH_LEAST', 'Mínimo');
DEFINE('_KUNENA_SEARCH_MOST', 'Máximo');
DEFINE('_KUNENA_SEARCH_ANSWERS', 'Respuestas');
DEFINE('_KUNENA_SEARCH_FIND_POSTS', 'Encontrar mensajes desde');
DEFINE('_KUNENA_SEARCH_DATE_ANY', 'Cualquier fecha');
DEFINE('_KUNENA_SEARCH_DATE_LASTVISIT', 'Última visita');
DEFINE('_KUNENA_SEARCH_DATE_YESTERDAY', 'Ayer');
DEFINE('_KUNENA_SEARCH_DATE_WEEK', 'Hace 1 semana');
DEFINE('_KUNENA_SEARCH_DATE_2WEEKS', 'Hace 2 semanas');
DEFINE('_KUNENA_SEARCH_DATE_MONTH', 'Hace 1 mes');
DEFINE('_KUNENA_SEARCH_DATE_3MONTHS', 'Hace 3 meses');
DEFINE('_KUNENA_SEARCH_DATE_6MONTHS', 'Hace 6 meses');
DEFINE('_KUNENA_SEARCH_DATE_YEAR', 'Hace un año');
DEFINE('_KUNENA_SEARCH_DATE_NEWER', 'Y más recientes');
DEFINE('_KUNENA_SEARCH_DATE_OLDER', 'Y más antíguos');
DEFINE('_KUNENA_SEARCH_SORTBY', 'Ordenar resultados por');
DEFINE('_KUNENA_SEARCH_SORTBY_TITLE', 'Título');
DEFINE('_KUNENA_SEARCH_SORTBY_POSTS', 'Número de mensajes');
DEFINE('_KUNENA_SEARCH_SORTBY_VIEWS', 'Número de vistas');
DEFINE('_KUNENA_SEARCH_SORTBY_START', 'Fecha de inicio del tema');
DEFINE('_KUNENA_SEARCH_SORTBY_POST', 'Fecha de publicación');
DEFINE('_KUNENA_SEARCH_SORTBY_USER', 'Nombre de usuario');
DEFINE('_KUNENA_SEARCH_SORTBY_FORUM', 'Foro');
DEFINE('_KUNENA_SEARCH_SORTBY_INC', 'Orden ascendente');
DEFINE('_KUNENA_SEARCH_SORTBY_DEC', 'Orden descendente');
DEFINE('_KUNENA_SEARCH_START', 'Ir a número de resultados');
DEFINE('_KUNENA_SEARCH_LIMIT5', 'Mostrar 5 resultados');
DEFINE('_KUNENA_SEARCH_LIMIT10', 'Mostrar 10 resultados');
DEFINE('_KUNENA_SEARCH_LIMIT15', 'Mostrar 15 resultados');
DEFINE('_KUNENA_SEARCH_LIMIT20', 'Mostrar 20 resultados');
DEFINE('_KUNENA_SEARCH_SEARCHIN', 'Buscar en categorías');
DEFINE('_KUNENA_SEARCH_SEARCHIN_ALLCATS', 'Todas las categorías');
DEFINE('_KUNENA_SEARCH_SEARCHIN_CHILDREN', 'Buscar también en los subforos');
DEFINE('_KUNENA_SEARCH_SEND', 'Enviar');
DEFINE('_KUNENA_SEARCH_CANCEL', 'Cancelar');
DEFINE('_KUNENA_SEARCH_ERR_NOPOSTS', 'No se han encontrado mensajes que contengan todos los términos de búsqueda.');
DEFINE('_KUNENA_SEARCH_ERR_SHORTKEYWORD', '¡Al menos una palabra debería tener más de 3 caracteres!');

// 1.0.8
DEFINE('_KUNENA_CATID', 'Id');
DEFINE('_POST_NOT_MODERATOR', 'Usted no posee permisos como moderador!');
DEFINE('_POST_NO_FAVORITED_TOPIC', 'Este tema <b>NO</b> ha sido agregado a sus favoritos');
DEFINE('_COM_C_SYNCEUSERSDESC', 'Sincronizar Kunena con la tabla de usuarios de Joomla!');
DEFINE('_POST_FORGOT_EMAIL', 'Se le olvidó incluir su dirección de correo electrónico..  Click en el botón atras del browser&#146s para intentarlo nuevamente.');
DEFINE('_KUNENA_POST_DEL_ERR_FILE', 'Todo ha sido eliminida, solo han quedado unos poco archivos no encontrados!');
DEFINE('_KUNENA_RETRY', 'Reintentar');

// New strings for initial forum setup. Replacement for legacy sample data
DEFINE('_KUNENA_SAMPLE_FORUM_MENU_TITLE', 'Foro');
DEFINE('_KUNENA_SAMPLE_MAIN_CATEGORY_TITLE', 'Foro Principal');
DEFINE('_KUNENA_SAMPLE_MAIN_CATEGORY_DESC', 'Este es el foro principal de la categoría. Es creada el nivel de una categoría que sirve como un contenedor para cada tema o foros. También se le conoce como una categoría de nivel 1 y es la que debe tener cualquier Foro Kunena en su configuración.');
DEFINE('_KUNENA_SAMPLE_MAIN_CATEGORY_HEADER', 'Con el fin de proporcionar información adicional para que los invitados y los miembros, La cabecera del foro se puede aprovechar para mostrar texto en la parte superior de una categoría.');
DEFINE('_KUNENA_SAMPLE_FORUM1_TITLE', 'Bienvenido Mat');
DEFINE('_KUNENA_SAMPLE_FORUM1_DESC', 'Alentamos a los nuevos miembros a enviar una breve introducción de sí mismos en esta categoría del foro. Es creada para aprender a conocerse mutuamente y saber que intereses comunes comparten.<br>');
DEFINE('_KUNENA_SAMPLE_FORUM1_HEADER', '<strong>Bienvenido a Kuena Foros!</strong><br><br>Nos cuentan los miembros acerca de ellos, Qué te gusta y por qué se convirtió en miembro de este sitio.<br>Damos la bienvenida a todos los nuevos miembros y esperamos verte en torno al grupo!<br>');
DEFINE('_KUNENA_SAMPLE_FORUM2_TITLE', 'Buzón de Sugerencias');
DEFINE('_KUNENA_SAMPLE_FORUM2_DESC', 'Tienes algún comentario o aporte para compartir?<br>No seas tímido y envíanos una nota. Queremos saber de ti y tratar de hacer nuestro sitio el mejor y más fácil de usar para nuestros clientes y miembros.');
DEFINE('_KUNENA_SAMPLE_FORUM2_HEADER', 'Esta es la cabecera del foro opcional para el Buzón de sugerencias.<br>');
DEFINE('_KUNENA_SAMPLE_POST1_SUBJECT', 'Bienvenido a Kunena!');
DEFINE('_KUNENA_SAMPLE_POST1_TEXT', '[size=4][b]Bienvenido a Kunena![/b][/size]

Gracias por elegir Kunena foro para las necesidades de su comunidad en Joomla.

KKunena, es traducido del swahili que significa "hablar", es construido por un equipo de profesionales de código abierto con el objetivo de proporcionar una alta calidad, foro  perfectamente unificado como solución para Joomla. Kunena incluso soporta la creación de redes sociales como componentes de Community Builder y JomSocial.


[size=4][b]Recursos Adicionales para Kunena[/b][/size]

[b]Documentación sobre Kunena:[/b] http://www.kunena.com/docs
(http://docs.kunena.com)

[b]Foros de Soporte Kunena[/b]: http://www.kunena.com/forum
(http://www.kunena.com/index.php?option=com_kunena&Itemid=125)

[b]Descargar Kunena:[/b] http://www.kunena.com/downloads
(http://joomlacode.org/gf/project/kunena/frs/)

[b]Kunena Blog:[/b] http://www.kunena.com/blog
(http://www.kunena.com/index.php?option=com_content&view=section&layout=blog&id=7&Itemid=128)

[b]Envía tus ideas:[/b] http://www.kunena.com/uservoice
(http://kunena.uservoice.com/pages/general?referer_type=top3)

[b]Sigue a Kunena en el Twitter:[/b] http://www.kunena.com/twitter
(https://twitter.com/kunena)');

// 1.0.6
DEFINE('_KUNENA_JOMSOCIAL', 'JomSocial');

// 1.0.5
DEFINE('_COM_A_HIGHLIGHTCODE', 'Activar ayudante de Código');
DEFINE('_COM_A_HIGHLIGHTCODE_DESC', 'Activa el ayudante Kuena de código java script. Si tus miembros publican php o otros fragmentos de código similares con los tags de código, activando esta opción, coloreará el código. Si en tu foro no se hace uso de mensajes con lenguaje de programación, seguramente preferirás desactivarlo para evitar con los tags de código se formen mal.');
DEFINE('_COM_A_RSS_TYPE', 'Tipo RSS por defecto');
DEFINE('_COM_A_RSS_TYPE_DESC', 'Escoge entre feeds RSS por tema o por mensaje. Por tema significa que solo se creará una entrada por tema en el feed RSS, independientemente del número de respuestas que se hagan. Por tema crea un feed RSS más corto y compacto, pero no listará todas las respuestas.');
DEFINE('_COM_A_RSS_BY_THREAD', 'Por Tema');
DEFINE('_COM_A_RSS_BY_POST', 'Por Mensaje');
DEFINE('_COM_A_RSS_HISTORY', 'Historia RSS');
DEFINE('_COM_A_RSS_HISTORY_DESC', 'Selecciona cuanta historia debe incluir el feed RSS. Por defecto es un mes, pero puede que prefieras limitarla a 1 semana en páginas con un alto volumen.');
DEFINE('_COM_A_RSS_HISTORY_WEEK', '1 Semana');
DEFINE('_COM_A_RSS_HISTORY_MONTH', '1 Mes');
DEFINE('_COM_A_RSS_HISTORY_YEAR', '1 Año');
DEFINE('_COM_A_FBDEFAULT_PAGE', 'Página de Kunena por defecto');
DEFINE('_COM_A_FBDEFAULT_PAGE_DESC', 'Selecciona la página que se mostrará por defecto en Kunena cuando se presiona un vínculo al foro o se entra inicialmente al mismo. Por defecto es Discusiones Recientes. Deberia seleccionarse a Categorias para plantillas que no sigan el esquema de default_ex (todas las básicas). Si se selecciona "Mis Discusiones", a los huespedes se les muesta "Discusiones recientes".');
DEFINE('_COM_A_FBDEFAULT_PAGE_RECENT', 'Discusiones recientes');
DEFINE('_COM_A_FBDEFAULT_PAGE_MY', 'Mis discusiones');
DEFINE('_COM_A_FBDEFAULT_PAGE_CATEGORIES', 'Categorias');
DEFINE('_KUNENA_BBCODE_HIDE', 'Esta parte del contenido esta oculta para usuarios no registrados:');
DEFINE('_KUNENA_BBCODE_SPOILER', '¡Cuidado, Spoiler! - Presiona aquí para verlo.');
DEFINE('_KUNENA_FORUM_SAME_ERR', 'El foro padre no debe ser el mismo.');
DEFINE('_KUNENA_FORUM_OWNCHILD_ERR', 'El foro padre es uno de sus propios hijos.');
DEFINE('_KUNENA_FORUM_UNKNOWN_ERR', 'El ID del foro no existe.');
DEFINE('_KUNENA_RECURSION', 'Recursividad detectada.');
DEFINE('_POST_FORGOT_NAME_ALERT', 'Has olvidado escribir tu nombre.');
DEFINE('_POST_FORGOT_EMAIL_ALERT', 'Has olvidado escribir tu email.');
DEFINE('_POST_FORGOT_SUBJECT_ALERT', 'Has olvidado escribir el título.');
DEFINE('_KUNENA_EDIT_TITLE', 'Edita tus detalles');
DEFINE('_KUNENA_YOUR_NAME', 'Nombre:');
DEFINE('_KUNENA_EMAIL', 'e-mail:');
DEFINE('_KUNENA_UNAME', 'Nombre de usuario:');
DEFINE('_KUNENA_PASS', 'Contraseña:');
DEFINE('_KUNENA_VPASS', 'Confirmar contraseña:');
DEFINE('_KUNENA_USER_DETAILS_SAVE', 'Detalles del usuario guardados.');
DEFINE('_KUNENA_TEAM_CREDITS', 'Créditos');
DEFINE('_COM_A_BBCODE', 'BBCode');
DEFINE('_COM_A_BBCODE_SETTINGS', 'Opciones de BBCode');
DEFINE('_COM_A_SHOWSPOILERTAG', 'Mostrar el botón de spoiler en la barra de edición');
DEFINE('_COM_A_SHOWSPOILERTAG_DESC', 'Configura a "Si" si quieres que el tag [spoiler] este listado en la barra de edición.');
DEFINE('_COM_A_SHOWVIDEOTAG', 'Mostrar botón de vídeo en la barra de edición');
DEFINE('_COM_A_SHOWVIDEOTAG_DESC', 'Configura a "Si" si quieres que el tag [vídeo] este listado en la barra de edición.');
DEFINE('_COM_A_SHOWEBAYTAG', 'Mostrar tag de eBay en la barra de edición');
DEFINE('_COM_A_SHOWEBAYTAG_DESC', 'Configura a "Si" si quieres que el tag [ebay] este listado en la barra de edición.');
DEFINE('_COM_A_TRIMLONGURLS', 'Recortar URLs largas');
DEFINE('_COM_A_TRIMLONGURLS_DESC', 'Configura a "si" si quieres que se recorten las URLs largas. Consulta las opciones de recorte por delante y por detrás.');
DEFINE('_COM_A_TRIMLONGURLSFRONT', 'Porción frontal de las URLs recortadas');
DEFINE('_COM_A_TRIMLONGURLSFRONT_DESC', 'Nº de caracteres a recortar por delante. Recortar URLs largas ha de estar activado.');
DEFINE('_COM_A_TRIMLONGURLSBACK', 'Porción posterior de las URLs acortadas');
DEFINE('_COM_A_TRIMLONGURLSBACK_DESC', 'Nº de caracteres a recortar por detrás. Recortar URLs largas ha de estar activado.');
DEFINE('_COM_A_AUTOEMBEDYOUTUBE', 'Auto incrustar vídeos de youtube');
DEFINE('_COM_A_AUTOEMBEDYOUTUBE_DESC', 'Configura a "SI" si quieres que las URLs de youtube se auto incrusten.');
DEFINE('_COM_A_AUTOEMBEDEBAY', 'Auto incrustar artículos de eBay');
DEFINE('_COM_A_AUTOEMBEDEBAY_DESC', 'Configura a "SI" si quieres que tus artículos y búsquedas de ebay se auto incrusten.');
DEFINE('_COM_A_EBAYLANGUAGECODE', 'Código de idioma del widget eBay');
DEFINE('_COM_A_EBAYLANGUAGECODE_DESC', 'Es importante configurar el código de lenguaje apropiado ya que el widget de ebay deriva idioma y moneda de el. Por defecto, en-us de ebay.com. Ejemplos: ebay.de: de-de, ebay.at: de-at, ebay.co.uk: en-gb');
DEFINE('_COM_A_KUNENA_SESSION_TIMEOUT', 'Fin de sesión');
DEFINE('_COM_A_KUNENA_SESSION_TIMEOUT_DESC', 'Por defecto será 1800 [segundos]. El termino de vida de la sesión (timeout) en segundos será similar al tiempo de vida de las sesiones de Joomla. El tiempo de vida de las sesiones es importante para recalcular los derechos de accesos, mostrar quien está conectado y para el indicador de nuevos mensajes. Una vez que expire el período de sesiones más allá de ese tiempo, los derechos de acceso y el indicador de nuevos mesnajes se restableceran.');

// Advanced administrator merge-split functions
DEFINE('_GEN_MERGE', 'Unir');
DEFINE('_VIEW_MERGE', '');
DEFINE('_POST_MERGE_TOPIC', 'Unir este tema con');
DEFINE('_POST_MERGE_GHOST', 'Dejar copia del tema');
DEFINE('_POST_SUCCESS_MERGE', 'Temas unidos con éxito.');
DEFINE('_POST_TOPIC_NOT_MERGED', 'Fallo al unir los temas.');
DEFINE('_GEN_SPLIT', 'Separar');
DEFINE('_GEN_DOSPLIT', 'Adelante');
DEFINE('_VIEW_SPLIT', '');
DEFINE('_POST_SUCCESS_SPLIT', 'Hilo separado con éxito.');
DEFINE('_POST_SUCCESS_SPLIT_TOPIC_CHANGED', 'Título modificado con éxito.');
DEFINE('_POST_SPLIT_TOPIC_NOT_CHANGED', 'Fallo al cambiar el título.');
DEFINE('_POST_TOPIC_NOT_SPLIT', 'Fallo al separar el tema.');
DEFINE('_POST_DUPLICATE_IGNORED', 'Duplicado, los mensajes idénticos han sido ignorados.');
DEFINE('_POST_SPLIT_HINT', 'Truco: Puedes ascender un mensaje a tema si lo seleccionas en la segunda columna pero no marcas nada para separar.');
DEFINE('_POST_LINK_ORPHANS_TOPIC', 'Vincular huerfanos al tema');
DEFINE('_POST_LINK_ORPHANS_TOPIC_TITLE', 'Vincular huerfanos al tema posteado.');
DEFINE('_POST_LINK_ORPHANS_PREVPOST', 'Vincular huerfanos al mensaje anterior');
DEFINE('_POST_LINK_ORPHANS_PREVPOST_TITLE', 'Vincular huerfanos al mensaje anterior.');
DEFINE('_POST_MERGE', 'unir');
DEFINE('_POST_MERGE_TITLE', 'Adjuntar a este hilo objetivos posteados primero.');
DEFINE('_POST_INVERSE_MERGE', 'separar');
DEFINE('_POST_INVERSE_MERGE_TITLE', 'Fije metas al primer mensaje posteado a este hilo.');

// Additional
DEFINE('_POST_UNFAVORITED_TOPIC', 'Se ha borrado este hilo de tus favoritos.');
DEFINE('_POST_NO_UNFAVORITED_TOPIC', '<b>NO</b> se ha borrado el hilo de tus favoritos');
DEFINE('_POST_SUCCESS_UNFAVORITE', 'Se ha procesado tu petición para quitar de favoritos.');
DEFINE('_POST_UNSUBSCRIBED_TOPIC', 'Se ha eliminado este hilo de tus suscripciones.');
DEFINE('_POST_NO_UNSUBSCRIBED_TOPIC', '<b>NO</b> se ha eliminado el hilo de tus suscripciones.');
DEFINE('_POST_SUCCESS_UNSUBSCRIBE', 'Se ha procesado tu petición para quitar de las suscripciones.');
DEFINE('_POST_NO_DEST_CATEGORY', 'No se ha seleccionado categoría de destino. No se ha movido nada.');
// Default_EX template
DEFINE('_KUNENA_ALL_DISCUSSIONS', 'Discusiones Recientes');
DEFINE('_KUNENA_MY_DISCUSSIONS', 'Mis Discusiones');
DEFINE('_KUNENA_MY_DISCUSSIONS_DETAIL', 'Discusiones que han iniciado o respondido a');
DEFINE('_KUNENA_CATEGORY', 'Categoría:');
DEFINE('_KUNENA_CATEGORIES', 'Categorías');
DEFINE('_KUNENA_POSTED_AT', 'Posteado');
DEFINE('_KUNENA_AGO', 'Hace');
DEFINE('_KUNENA_DISCUSSIONS', 'Temas');
DEFINE('_KUNENA_TOTAL_THREADS', 'Temas totales:');
DEFINE('_SHOW_DEFAULT', 'Por defecto');
DEFINE('_SHOW_MONTH', 'Mes');
DEFINE('_SHOW_YEAR', 'Año');

// 1.0.4
DEFINE('_KUNENA_COPY_FILE', 'Copiando "%src%" a "%dst%"...');
DEFINE('_KUNENA_COPY_OK', 'OK');
DEFINE('_KUNENA_CSS_SAVE', 'Guardando archivo CSS, debería ser este...archivo="%file%"');
DEFINE('_KUNENA_UP_ATT_10', '¡Tabla de adjuntos actualizada satisfactoriamente a la estructura de la serie 1.0.x!');
DEFINE('_KUNENA_UP_ATT_10_MSG', 'Adjuntos en la tabla de mensajes actualizados satisfactoriamente a la estructura de la serie 1.0.x!');
DEFINE('_KUNENA_TOPIC_MOVED', '---');
DEFINE('_KUNENA_TOPIC_MOVED_LONG', '------------');
DEFINE('_KUNENA_POST_DEL_ERR_CHILD', 'No se ha podido ascender al hijo en la jerarquía de mensajes. No se ha borrado nada.');
DEFINE('_KUNENA_POST_DEL_ERR_MSG', 'No se ha podido borrar el mensaje(s) - no se ha borrado nada más');
DEFINE('_KUNENA_POST_DEL_ERR_TXT', 'No se han podido borrar los textos del mensaje(s). Actualiza la base de datos manualmente. (mesid=%id%).');
DEFINE('_KUNENA_POST_DEL_ERR_USR', 'Se ha borrado todo, pero no se ha podido actualizar el conteo de mensajes por usuario!');
DEFINE('_KUNENA_POST_MOV_ERR_DB', 'Error grave en la base de datos. Actualízala manualmente para que las respuestas a los hilos se correspondan en el nuevo foro también');
DEFINE('_KUNENA_UNIST_SUCCESS', 'Componente Kunena desinstalado satisfactoriamente!');
DEFINE('_KUNENA_PDF_VERSION', 'Versión del componente de Foros Kunena: %versión%');
DEFINE('_KUNENA_PDF_DATE', 'Generado: %date%');
DEFINE('_KUNENA_SEARCH_NOFORUM', 'No hay foros donde buscar.');

DEFINE('_KUNENA_ERRORADDUSERS', 'Error al añadir usuarios:');
DEFINE('_KUNENA_USERSSYNCDELETED', 'Usuarios sincronizados; Borrados:');
DEFINE('_KUNENA_USERSSYNCADD', ', Agregar:');
DEFINE('_KUNENA_SYNCUSERPROFILES', 'Perfiles de usuario.');
DEFINE('_KUNENA_NOPROFILESFORSYNC', 'No se han encontrado perfiles aptos para sincronizar.');
DEFINE('_KUNENA_SYNC_USERS', 'Sincronizar usuarios');
DEFINE('_KUNENA_SYNC_USERS_DESC', 'Sincronizar tabla de usuarios de Kunena con la de Joomla!');
DEFINE('_KUNENA_A_MAIL_ADMIN', 'Email Administradores');
DEFINE('_KUNENA_A_MAIL_ADMIN_DESC',
    'Configúralo a &quot;Si&quot; si quieres que se envíe una notificación por email al administrador(es) de sistema con cada nuevo mensaje.');
DEFINE('_KUNENA_RANKS_EDIT', 'Editar rangos');
DEFINE('_KUNENA_USER_HIDEEMAIL', 'Ocultar Email');
DEFINE('_KUNENA_DT_DATE_FMT','%d/%m/%Y');
DEFINE('_KUNENA_DT_TIME_FMT','%H:%M');
DEFINE('_KUNENA_DT_DATETIME_FMT','%d/%m/%Y %H:%M');
DEFINE('_KUNENA_DT_LDAY_SUN', 'Domingo');
DEFINE('_KUNENA_DT_LDAY_MON', 'Lunes');
DEFINE('_KUNENA_DT_LDAY_TUE', 'Martes');
DEFINE('_KUNENA_DT_LDAY_WED', 'Miércoles');
DEFINE('_KUNENA_DT_LDAY_THU', 'Jueves');
DEFINE('_KUNENA_DT_LDAY_FRI', 'Viernes');
DEFINE('_KUNENA_DT_LDAY_SAT', 'Sábado');
DEFINE('_KUNENA_DT_DAY_SUN', 'Dom');
DEFINE('_KUNENA_DT_DAY_MON', 'Lun');
DEFINE('_KUNENA_DT_DAY_TUE', 'Mar');
DEFINE('_KUNENA_DT_DAY_WED', 'Mie');
DEFINE('_KUNENA_DT_DAY_THU', 'Jue');
DEFINE('_KUNENA_DT_DAY_FRI', 'Vie');
DEFINE('_KUNENA_DT_DAY_SAT', 'Sab');
DEFINE('_KUNENA_DT_LMON_JAN', 'Enero');
DEFINE('_KUNENA_DT_LMON_FEB', 'Febrero');
DEFINE('_KUNENA_DT_LMON_MAR', 'Marzo');
DEFINE('_KUNENA_DT_LMON_APR', 'Abril');
DEFINE('_KUNENA_DT_LMON_MAY', 'Mayo');
DEFINE('_KUNENA_DT_LMON_JUN', 'Junio');
DEFINE('_KUNENA_DT_LMON_JUL', 'Julio');
DEFINE('_KUNENA_DT_LMON_AUG', 'Agosto');
DEFINE('_KUNENA_DT_LMON_SEP', 'Septiembre');
DEFINE('_KUNENA_DT_LMON_OCT', 'Octubre');
DEFINE('_KUNENA_DT_LMON_NOV', 'Noviembre');
DEFINE('_KUNENA_DT_LMON_DEV', 'Diciembre');
DEFINE('_KUNENA_DT_MON_JAN', 'Ene');
DEFINE('_KUNENA_DT_MON_FEB', 'Feb');
DEFINE('_KUNENA_DT_MON_MAR', 'Mar');
DEFINE('_KUNENA_DT_MON_APR', 'Abr');
DEFINE('_KUNENA_DT_MON_MAY', 'May');
DEFINE('_KUNENA_DT_MON_JUN', 'Jun');
DEFINE('_KUNENA_DT_MON_JUL', 'Jul');
DEFINE('_KUNENA_DT_MON_AUG', 'Ago');
DEFINE('_KUNENA_DT_MON_SEP', 'Sep');
DEFINE('_KUNENA_DT_MON_OCT', 'Oct');
DEFINE('_KUNENA_DT_MON_NOV', 'Nov');
DEFINE('_KUNENA_DT_MON_DEV', 'Dec');
DEFINE('_KUNENA_CHILD_BOARD', 'Foro hijo');
DEFINE('_WHO_ONLINE_GUEST', 'Invitado');
DEFINE('_WHO_ONLINE_MEMBER', 'Miembro');
DEFINE('_KUNENA_IMAGE_PROCESSOR_NONE', 'ninguno');
DEFINE('_KUNENA_IMAGE_PROCESSOR', 'Procesador de Imagen:');
DEFINE('_KUNENA_INSTALL_CLICK_TO_CONTINUE', 'Presiona para continuar...');
DEFINE('_KUNENA_INSTALL_APPLY', 'Aplicar!');
DEFINE('_KUNENA_NO_ACCESS', 'No tienes acceso a este foro!');
DEFINE('_KUNENA_TIME_SINCE', 'hace %time%');
DEFINE('_KUNENA_DATE_YEARS', 'Años');
DEFINE('_KUNENA_DATE_MONTHS', 'Meses');
DEFINE('_KUNENA_DATE_WEEKS','Semanas');
DEFINE('_KUNENA_DATE_DAYS', 'Días');
DEFINE('_KUNENA_DATE_HOURS', 'Horas');
DEFINE('_KUNENA_DATE_MINUTES', 'Minutos');
// 1.0.3
DEFINE('_KUNENA_CONFIRM_REMOVESAMPLEDATA', 'Estas seguro que quieres eliminar los datos de ejemplo? Esta acción es irreversible.');
// 1.0.2
DEFINE('_KUNENA_HEADERADD', 'header del foro:');
DEFINE('_KUNENA_ADVANCEDDISPINFO', "Formato del foro");
DEFINE('_KUNENA_CLASS_SFX', "Forum CSS class suffix");
DEFINE('_KUNENA_CLASS_SFXDESC', "CSS suffix aplicado a index, showcat, view y permite diferentes diseños por foro.");
DEFINE('_COM_A_USER_EDIT_TIME', 'Tiempo del usuario para editar');
DEFINE('_COM_A_USER_EDIT_TIME_DESC', 'Configúralo a 0 para tiempo ilimitado, sino, ventana de tiempo
en segundos desde que se escribió, o edito por última vez el mensaje.');
DEFINE('_COM_A_USER_EDIT_TIMEGRACE', 'Tiempo de gracia de edición');
DEFINE('_COM_A_USER_EDIT_TIMEGRACE_DESC', 'Por defecto, 600 [segundos],
permite guardar la modificación hasta 600 segundos después de que el link de edición haya desaparecido');
DEFINE('_KUNENA_HELPPAGE','Activar página de ayuda');
DEFINE('_KUNENA_HELPPAGE_DESC','Si se configura a &quot;Si&quot; en el menú de la cabecera aparecerá un link a tu página de ayuda.');
DEFINE('_KUNENA_HELPPAGE_IN_FB','Mostrar la ayuda en Kunena');
DEFINE('_KUNENA_HELPPAGE_IN_KUNENA_DESC','Si se configura a &quot;Si&quot; el contenido de la ayuda se incluirá en Kunena y el link a la página de ayuda externa no funcionará. <b>Nota:</b> Debes añadir "Help Content ID" .');
DEFINE('_KUNENA_HELPPAGE_CID','Help Content ID');
DEFINE('_KUNENA_HELPPAGE_CID_DESC','Debes configurarlo a <b>"SI"</b> para la configuración "Mostrar la ayuda en Kunena".');
DEFINE('_KUNENA_HELPPAGE_LINK',' Vínculo a página de ayuda externa');
DEFINE('_KUNENA_HELPPAGE_LINK_DESC','Si muestras vínculo a página de ayuda externa, por favor, configura "Mostrar la ayuda en Kunena" a <b>"NO"</b>.');
DEFINE('_KUNENA_RULESPAGE','Activar página de reglas');
DEFINE('_KUNENA_RULESPAGE_DESC','Si se configura a &quot;Si&quot; se mostrará un vínculo en el menú de la cabecera a tu página de reglas.');
DEFINE('_KUNENA_RULESPAGE_IN_FB','Mostrar reglas en Kunena');
DEFINE('_KUNENA_RULESPAGE_IN_KUNENA_DESC','Si se configura a &quot;Si&quot; el contenido de las reglas se incluirá en Kunena y la página externa de reglas no funcionará. <b>Nota:</b> Debes añadir "Rules Content ID" .');
DEFINE('_KUNENA_RULESPAGE_CID','Rules Content ID');
DEFINE('_KUNENA_RULESPAGE_CID_DESC','Debes configurarlo a <b>"SI"</b> para la configuración "Mostrar reglas en Kunena".');
DEFINE('_KUNENA_RULESPAGE_LINK',' Vínculo a página de reglas externa');
DEFINE('_KUNENA_RULESPAGE_LINK_DESC','Si muestras vínculo a página de reglas externa, por favor, configura "Mostrar reglas en Kunena" a <b>"NO"</b>.');
DEFINE('_KUNENA_AVATAR_GDIMAGE_NOT','No se ha encontrado librería GD');
DEFINE('_KUNENA_AVATAR_GD2IMAGE_NOT','No se ha encontrado librería GD2');
DEFINE('_KUNENA_GD_INSTALLED','GD está disponible en la versión ');
DEFINE('_KUNENA_GD_NO_VERSION','No se puede detectar ninguna versión de GD');
DEFINE('_KUNENA_GD_NOT_INSTALLED','GD no está instado, puedes encontrar más información ');
DEFINE('_KUNENA_AVATAR_SMALL_HEIGHT','Altura de la imagen pequeña:');
DEFINE('_KUNENA_AVATAR_SMALL_WIDTH','Anchura de la imagen pequeña:');
DEFINE('_KUNENA_AVATAR_MEDIUM_HEIGHT','Altura de la imagen mediana:');
DEFINE('_KUNENA_AVATAR_MEDIUM_WIDTH','Anchura  de la imagen mediana:');
DEFINE('_KUNENA_AVATAR_LARGE_HEIGHT','Altura de la imagen grande:');
DEFINE('_KUNENA_AVATAR_LARGE_WIDTH','Anchura  de la imagen grande:');
DEFINE('_KUNENA_AVATAR_QUALITY','Calidad de los avatares');
DEFINE('_KUNENA_WELCOME','Bienvenido a Kunena');
DEFINE('_KUNENA_WELCOME_DESC','Gracias por escoger Kunena como tu foro. Esta pantalla te dará una pequeña muestra de las varias estadísticas de tu foro. Los vínculos a la izquierda de esta pantalla te permitirán controlar todos los aspectos de tu foro. Cada página tendrá instrucciones en como usar estas herramientas.');
DEFINE('_KUNENA_STATISTIC','Estadísticas');
DEFINE('_KUNENA_VALUE','Valor');
DEFINE('_GEN_CATEGORY','Categoria');
DEFINE('_GEN_STARTEDBY','Iniciado por: ');
DEFINE('_GEN_STATS','Estadísticas');
DEFINE('_STATS_TITLE',' Estadísticas del foro');
DEFINE('_STATS_GEN_STATS','Estadísticas generales');
DEFINE('_STATS_TOTAL_MEMBERS','Miembros:');
DEFINE('_STATS_TOTAL_REPLIES','Respuestas:');
DEFINE('_STATS_TOTAL_TOPICS','Temas:');
DEFINE('_STATS_TODAY_TOPICS','Temas hoy:');
DEFINE('_STATS_TODAY_REPLIES','Respuestas hoy:');
DEFINE('_STATS_TOTAL_CATEGORIES','Categorías:');
DEFINE('_STATS_TOTAL_SECTIONS','Secciones:');
DEFINE('_STATS_LATEST_MEMBER','Último miembro:');
DEFINE('_STATS_YESTERDAY_TOPICS','Temas ayer:');
DEFINE('_STATS_YESTERDAY_REPLIES','Respuestas ayer:');
DEFINE('_STATS_POPULAR_PROFILE','Los 10 miembros más populares (visitas al perfil)');
DEFINE('_STATS_TOP_POSTERS','Mayores participantes');
DEFINE('_STATS_POPULAR_TOPICS','Temas más populares');
DEFINE('_COM_A_STATSPAGE','Activar página de estadísticas');
DEFINE('_COM_A_STATSPAGE_DESC','Si se configura a &quot;Si&quot; se mostrará un vínculo público en el menú de la cabecera a la página de estadísticas de tu foro. Esta página mostrará varias estadísticas sobre tu foro. <em>La página de estadísticas siempre estará disponible para los administradores independientemente de esta configuración!</em>');
DEFINE('_COM_C_JBSTATS','Estadísticas del foro');
DEFINE('_COM_C_JBSTATS_DESC','Estadísticas del foro');
define('_GEN_GENERAL','General');
define('_PERM_NO_READ','No tienes permisos suficientes para acceder a este foro.');
DEFINE ('_KUNENA_SMILEY_SAVED','Smiley salvado');
DEFINE ('_KUNENA_SMILEY_DELETED','Smiley borrado');
DEFINE ('_KUNENA_CODE_ALLREADY_EXITS','Ese código ya existe');
DEFINE ('_KUNENA_MISSING_PARAMETER','Falta un parámetro');
DEFINE ('_KUNENA_RANK_ALLREADY_EXITS','Ya existe ese rango');
DEFINE ('_KUNENA_RANK_DELETED','Rango borrado');
DEFINE ('_KUNENA_RANK_SAVED','Rango salvado');
DEFINE ('_KUNENA_DELETE_SELECTED','Borrar lo seleccionado');
DEFINE ('_KUNENA_MOVE_SELECTED','Mover lo seleccionado');
DEFINE ('_KUNENA_REPORT_LOGGED','Identificado');
DEFINE ('_KUNENA_GO','Ir');
DEFINE('_KUNENA_MAILFULL','Incluye el mensaje completo en el email enviado a los suscriptores');
DEFINE('_KUNENA_MAILFULL_DESC','Si No - los suscriptores recibirán solo el título de los mensajes');
DEFINE('_KUNENA_HIDETEXT','Por favor, identifícate para ver este contenido!');
DEFINE('_BBCODE_HIDE','Texto oculto: [hide]cualquier texto oculto[/hide] - oculta parte del mensaje de los invitados');
DEFINE('_KUNENA_FILEATTACH','Archivo adjunto: ');
DEFINE('_KUNENA_FILENAME','Nombre de archivo: ');
DEFINE('_KUNENA_FILESIZE','Tamaño del archivo: ');
DEFINE('_KUNENA_MSG_CODE','Código: ');
DEFINE('_KUNENA_CAPTCHA_ON','Sistema de protección antiSPAM');
DEFINE('_KUNENA_CAPTCHA_DESC','Activar/desactivar sistema Antispam y bot CAPTCHA');
DEFINE('_KUNENA_CAPDESC','Introducir código aquí');
DEFINE('_KUNENA_CAPERR','Código incorrecto!');
DEFINE('_KUNENA_COM_A_REPORT', 'Reportar mensaje');
DEFINE('_KUNENA_COM_A_REPORT_DESC', 'Si quieres que tus usuarios puedan reportar mensajes, escoge si.');
DEFINE('_KUNENA_REPORT_MSG', 'Mensaje reportado');
DEFINE('_KUNENA_REPORT_REASON', 'Razón');
DEFINE('_KUNENA_REPORT_MESSAGE', 'Tu mensaje');
DEFINE('_KUNENA_REPORT_SEND', 'Enviar');
DEFINE('_KUNENA_REPORT', 'Reportar a un moderador');
DEFINE('_KUNENA_REPORT_RSENDER', 'Origen: ');
DEFINE('_KUNENA_REPORT_RREASON', 'Razón: ');
DEFINE('_KUNENA_REPORT_RMESSAGE', 'Mensaje reportado: ');
DEFINE('_KUNENA_REPORT_POST_POSTER', 'Autor del mensaje: ');
DEFINE('_KUNENA_REPORT_POST_SUBJECT', 'Título del mensaje: ');
DEFINE('_KUNENA_REPORT_POST_MESSAGE', 'Mensaje: ');
DEFINE('_KUNENA_REPORT_POST_LINK', 'Vínculo al mensaje: ');
DEFINE('_KUNENA_REPORT_INTRO', 'se te ha mandado un mensaje porque');
DEFINE('_KUNENA_REPORT_SUCCESS', 'Reportado correctamente!');
DEFINE('_KUNENA_EMOTICONS', 'Smileys');
DEFINE('_KUNENA_EMOTICONS_SMILEY', 'Smiley');
DEFINE('_KUNENA_EMOTICONS_CODE', 'Código');
DEFINE('_KUNENA_EMOTICONS_URL', 'URL');
DEFINE('_KUNENA_EMOTICONS_EDIT_SMILEY', 'Editar Smiley');
DEFINE('_KUNENA_EMOTICONS_EDIT_SMILIES', 'Editar Smileys');
DEFINE('_KUNENA_EMOTICONS_EMOTICONBAR', 'Barra de smileys');
DEFINE('_KUNENA_EMOTICONS_NEW_SMILEY', 'Nuevo Smiley');
DEFINE('_KUNENA_EMOTICONS_MORE_SMILIES', 'Más Smileys');
DEFINE('_KUNENA_EMOTICONS_CLOSE_WINDOW', 'Cerrar ventana');
DEFINE('_KUNENA_EMOTICONS_ADDITIONAL_EMOTICONS', 'Smileys adicionales');
DEFINE('_KUNENA_EMOTICONS_PICK_A_SMILEY', 'Escoger un smiley');
DEFINE('_KUNENA_MAMBOT_SUPPORT', 'Soporte para mambot joomla');
DEFINE('_KUNENA_MAMBOT_SUPPORT_DESC', 'Activar soporte para mambot joomla');
DEFINE('_KUNENA_MYPROFILE_PLUGIN_SETTINGS', 'Configuración del plugin myprofile');
DEFINE('_KUNENA_USERNAMECANCHANGE', 'Permitir cambio de nombre de usuario');
DEFINE('_KUNENA_USERNAMECANCHANGE_DESC', 'Permitir cambiar el nombre de usuario en la página del plugin myprofile');
DEFINE ('_KUNENA_RECOUNTFORUMS','Recontar estadísticas de las categorías');
DEFINE ('_KUNENA_RECOUNTFORUMS_DONE','Se han recontado las estadísticas de todas las categorías.');
DEFINE ('_KUNENA_EDITING_REASON','Razón para la edición');
DEFINE ('_KUNENA_EDITING_LASTEDIT','Última edición');
DEFINE ('_KUNENA_BY','por');
DEFINE ('_KUNENA_REASON','Razón');
DEFINE('_GEN_GOTOBOTTOM', 'Abajo');
DEFINE('_GEN_GOTOTOP', 'Arriba');
DEFINE('_STAT_USER_INFO', 'Información de usuario');
DEFINE('_USER_SHOWEMAIL', 'Mostrar Email'); // <=FB 1.0.3
DEFINE('_USER_SHOWONLINE', 'Mostrar Online');
DEFINE('_KUNENA_HIDDEN_USERS', 'Ocultar usuarios');
DEFINE('_KUNENA_SAVE', 'Guardar');
DEFINE('_KUNENA_RESET', 'Restablecer');
DEFINE('_KUNENA_DEFAULT_GALLERY', 'Galería por defecto');
DEFINE('_KUNENA_MYPROFILE_PERSONAL_INFO', 'Información personal');
DEFINE('_KUNENA_MYPROFILE_SUMMARY', 'Sumario');
DEFINE('_KUNENA_MYPROFILE_MYAVATAR', 'Mi avatar');
DEFINE('_KUNENA_MYPROFILE_FORUM_SETTINGS', 'Configuración del ');
DEFINE('_KUNENA_MYPROFILE_LOOK_AND_LAYOUT', 'Estilo y distribución');
DEFINE('_KUNENA_MYPROFILE_MY_PROFILE_INFO', 'Información de mi perfil');
DEFINE('_KUNENA_MYPROFILE_MY_POSTS', 'Mis mensajes');
DEFINE('_KUNENA_MYPROFILE_MY_SUBSCRIBES', 'Mis suscripciones');
DEFINE('_KUNENA_MYPROFILE_MY_FAVORITES', 'Mis favoritos');
DEFINE('_KUNENA_MYPROFILE_PRIVATE_MESSAGING', 'Mensajería privada');
DEFINE('_KUNENA_MYPROFILE_INBOX', 'Bandeja de entrada');
DEFINE('_KUNENA_MYPROFILE_NEW_MESSAGE', 'Nuevo mensaje');
DEFINE('_KUNENA_MYPROFILE_OUTBOX', 'Bandeja de salida');
DEFINE('_KUNENA_MYPROFILE_TRASH', 'Papelera');
DEFINE('_KUNENA_MYPROFILE_SETTINGS', 'Opciones');
DEFINE('_KUNENA_MYPROFILE_CONTACTS', 'Contactos');
DEFINE('_KUNENA_MYPROFILE_BLOCKEDLIST', 'Lista de bloqueados');
DEFINE('_KUNENA_MYPROFILE_ADDITIONAL_INFO', 'Información adicional');
DEFINE('_KUNENA_MYPROFILE_NAME', 'Nombre');
DEFINE('_KUNENA_MYPROFILE_USERNAME', 'Nombre de usuario');
DEFINE('_KUNENA_MYPROFILE_EMAIL', 'Email');
DEFINE('_KUNENA_MYPROFILE_USERTYPE', 'Tipo de usuario');
DEFINE('_KUNENA_MYPROFILE_REGISTERDATE', 'Registrado desde: ');
DEFINE('_KUNENA_MYPROFILE_LASTVISITDATE', 'Última visita');
DEFINE('_KUNENA_MYPROFILE_POSTS', 'Mensajes');
DEFINE('_KUNENA_MYPROFILE_PROFILEVIEW', 'Ver perfil');
DEFINE('_KUNENA_MYPROFILE_PERSONALTEXT', 'Texto personal');
DEFINE('_KUNENA_MYPROFILE_GENDER', 'Sexo');
DEFINE('_KUNENA_MYPROFILE_BIRTHDATE', 'Fecha de nacimiento');
DEFINE('_KUNENA_MYPROFILE_BIRTHDATE_DESC', 'Año (YYYY) - Mes (MM) - Día (DD)');
DEFINE('_KUNENA_MYPROFILE_LOCATION', 'Localización');
DEFINE('_KUNENA_MYPROFILE_ICQ', 'ICQ');
DEFINE('_KUNENA_MYPROFILE_ICQ_DESC', 'Tu número ICQ.');
DEFINE('_KUNENA_MYPROFILE_AIM', 'AIM');
DEFINE('_KUNENA_MYPROFILE_AIM_DESC', 'Dirección AOL Instant Messenger.');
DEFINE('_KUNENA_MYPROFILE_YIM', 'YIM');
DEFINE('_KUNENA_MYPROFILE_YIM_DESC', 'Dirección Yahoo! Instant Messenger.');
DEFINE('_KUNENA_MYPROFILE_SKYPE', 'SKYPE');
DEFINE('_KUNENA_MYPROFILE_SKYPE_DESC', 'Contacto Skype.');
DEFINE('_KUNENA_MYPROFILE_GTALK', 'GTALK');
DEFINE('_KUNENA_MYPROFILE_GTALK_DESC', 'Dirección Gtalk.');
DEFINE('_KUNENA_MYPROFILE_WEBSITE', 'Página Web');
DEFINE('_KUNENA_MYPROFILE_WEBSITE_NAME', 'Nombre de tu página web');
DEFINE('_KUNENA_MYPROFILE_WEBSITE_NAME_DESC', 'Ejemplo: Voces del Vicio');
DEFINE('_KUNENA_MYPROFILE_WEBSITE_URL', 'Dirección URL');
DEFINE('_KUNENA_MYPROFILE_WEBSITE_URL_DESC', 'Ejemplo: www.vocesdelvicio.com');
DEFINE('_KUNENA_MYPROFILE_MSN', 'MSN');
DEFINE('_KUNENA_MYPROFILE_MSN_DESC', 'Dirección MSN Messenger.');
DEFINE('_KUNENA_MYPROFILE_SIGNATURE', 'Firma');
DEFINE('_KUNENA_MYPROFILE_MALE', 'Hombre');
DEFINE('_KUNENA_MYPROFILE_FEMALE', 'Mujer');
DEFINE('_KUNENA_BULKMSG_DELETED', 'Los mensajes se han borrado con éxito');
DEFINE('_KUNENA_DATE_YEAR', 'Año');
DEFINE('_KUNENA_DATE_MONTH', 'Mes');
DEFINE('_KUNENA_DATE_WEEK','Semana');
DEFINE('_KUNENA_DATE_DAY', 'Día');
DEFINE('_KUNENA_DATE_HOUR', 'Hora');
DEFINE('_KUNENA_DATE_MINUTE', 'Minuto');
DEFINE('_KUNENA_IN_FORUM', ' en el foro: ');
DEFINE('_KUNENA_FORUM_AT', ' Foro en: ');
DEFINE('_KUNENA_QMESSAGE_NOTE', 'Por favor, aunque no se vea ningún BBcode ni botones de smiley, son usables igualmente ');

// 1.0.1
DEFINE ('_KUNENA_FORUMTOOLS','Herramientas del foro');

//userlist
DEFINE ('_KUNENA_USRL_USERLIST','Lista de usuarios');
DEFINE ('_KUNENA_USRL_REGISTERED_USERS','%s tiene <b>%d</b> usuarios registrados');
DEFINE ('_KUNENA_USRL_SEARCH_ALERT','Por favor, introduce el valor a buscar!');
DEFINE ('_KUNENA_USRL_SEARCH','Encontrar usuario');
DEFINE ('_KUNENA_USRL_SEARCH_BUTTON','Buscar');
DEFINE ('_KUNENA_USRL_LIST_ALL','Listar todos');
DEFINE ('_KUNENA_USRL_USERNAME','Nombre de usuario');
DEFINE ('_KUNENA_USRL_GROUP','Grupo');
DEFINE ('_KUNENA_USRL_POSTS','Mensajes');
DEFINE ('_KUNENA_USRL_KARMA','Karma');
DEFINE ('_KUNENA_USRL_HITS','Hits');
DEFINE ('_KUNENA_USRL_EMAIL','E-mail');
DEFINE ('_KUNENA_USRL_USERTYPE','Tipo de usuario');
DEFINE ('_KUNENA_USRL_JOIN_DATE','Registrado');
DEFINE ('_KUNENA_USRL_LAST_LOGIN','Última visita');
DEFINE ('_KUNENA_USRL_NEVER','Nunca');
DEFINE ('_KUNENA_USRL_ONLINE','Estado');
DEFINE ('_KUNENA_USRL_AVATAR','Avatar');
DEFINE ('_KUNENA_USRL_ASC','Ascendente');
DEFINE ('_KUNENA_USRL_DESC','Descendente');
DEFINE ('_KUNENA_USRL_DISPLAY_NR','Mostrar');
DEFINE ('_KUNENA_USRL_DATE_FORMAT','%d/%m/%Y');

DEFINE('_KUNENA_ADMIN_CONFIG_PLUGINS','Plugins');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST','Lista de usuarios');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_ROWS_DESC','Número de filas en la lista de usuarios');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_ROWS','Número de filas en la lista de usuarios');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERONLINE','Online?');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERONLINE_DESC','Muestra si el usuario está online');

DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_AVATAR','Mostrar Avatar');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERLIST_AVATAR_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_NAME','Mostrar nombre real');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_name_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERNAME','Mostrar nombre de usuario');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERNAME_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_GROUP','Mostrar grupo de usuario');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_GROUP_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_POSTS','Mostrar número de mensajes');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_POSTS_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_KARMA','Mostrar Karma');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_KARMA_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_EMAIL','Mostrar Email');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_EMAIL_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERTYPE','Mostrar tipo de usuario');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERTYPE_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_JOINDATE','Mostrar registro');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_JOINDATE_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_LASTVISITDATE','Mostrar última visita');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_LASTVISITDATE_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_HITS','Mostrar visitas al perfil');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_HITS_DESC','');
DEFINE('_KUNENA_DBWIZ', 'Asistente de base de datos');
DEFINE('_KUNENA_DBMETHOD', 'Por favor escoge el método para completar tu instalación:');
DEFINE('_KUNENA_DBCLEAN', 'Instalación limpio');
DEFINE('_KUNENA_DBUPGRADE', 'Actualizar desde Joomlaboard');
DEFINE('_KUNENA_TOPLEVEL', 'Categoria superior');
DEFINE('_KUNENA_REGISTERED', 'Registrado');
DEFINE('_KUNENA_PUBLICBACKEND', 'Panel de administración público');
DEFINE('_KUNENA_SELECTANITEMTO', 'Escoge un objeto para');
DEFINE('_KUNENA_ERRORSUBS', 'Algo ha ido mal al borrar mensajes y suscripciones');
DEFINE('_KUNENA_WARNING', 'Warning...');
DEFINE('_KUNENA_CHMOD1', 'CHMOD este archivo a 766 para poder actualizar este archivo.');
DEFINE('_KUNENA_YOURCONFIGFILEIS', 'Tu archivo de configuración esta');
DEFINE('_KUNENA_KUNENA', 'Kunena');
DEFINE('_KUNENA_CLEXUS', 'Clexus PM');
DEFINE('_KUNENA_CB', 'Community Builder');
DEFINE('_KUNENA_MYPMS', 'myPMS II Open Source');
DEFINE('_KUNENA_UDDEIM', 'Uddeim');
DEFINE('_KUNENA_JIM', 'JIM');
DEFINE('_KUNENA_MISSUS', 'Missus');
DEFINE('_KUNENA_SELECTTEMPLATE', 'Escoger plantilla');
DEFINE('_KUNENA_CONFIGSAVED', 'Configuración guardada.');
DEFINE('_KUNENA_CONFIGNOTSAVED', 'FATAL ERROR: No se ha podido guardar la configuración.');
DEFINE('_KUNENA_TFINW', 'No se puede escribir en el archivo.');
DEFINE('_KUNENA_FBCFS', 'Se ha guardado el archivo CSS de Kunena.');
DEFINE('_KUNENA_SELECTMODTO', 'Escoge un moderador para');
DEFINE('_KUNENA_CHOOSEFORUMTOPRUNE', 'Debes escoger el foro a limpiar!');
DEFINE('_KUNENA_DELMSGERROR', 'Ha fallado el borrado de mensajes:');
DEFINE('_KUNENA_DELMSGERROR1', 'Ha fallado el borrado del texto de los mensajes:');
DEFINE('_KUNENA_CLEARSUBSFAIL', 'Ha fallado la limpieza de las suscripciones:');
DEFINE('_KUNENA_FORUMPRUNEDFOR', 'Próxima limpieza en ');
DEFINE('_KUNENA_PRUNEDAYS', 'días');
DEFINE('_KUNENA_PRUNEDELETED', 'borrado:');
DEFINE('_KUNENA_PRUNETHREADS', 'temas');
DEFINE('_KUNENA_ERRORPRUNEUSERS', 'Error limpiando usuarios:');
DEFINE('_KUNENA_USERSPRUNEDDELETED', 'Usuarios limpiados; Borrados:'); // <=FB 1.0.3
DEFINE('_KUNENA_PRUNEUSERPROFILES', 'perfiles de usuario'); // <=FB 1.0.3
DEFINE('_KUNENA_NOPROFILESFORPRUNNING', 'No hay perfiles aptos para limpieza.'); // <=FB 1.0.3
DEFINE('_KUNENA_TABLESUPGRADED', 'se han actualizado las tablas de Kunena a la versión');
DEFINE('_KUNENA_FORUMCATEGORY', 'Categoria del foro');
DEFINE('_KUNENA_SAMPLWARN1', '-- Asegúrate de que cargas los datos de ejemplo en tablas de Kunena completamente vacías. Si hubiese algo en ellas, no funcionará!');
DEFINE('_KUNENA_FORUM1', 'Foro 1');
DEFINE('_KUNENA_SAMPLEPOST1', 'Post de ejemplo 1');
DEFINE('_KUNENA_SAMPLEFORUM11', 'Foro de ejemplo 1\r\n');
DEFINE('_KUNENA_SAMPLEPOST11', '[b][size=4][color=#FF6600]Post de ejemplo[/color][/size][/b]\nFelicidades por tu nuevo foro!\n\n[url=http://www.vocesdelvicio.com]- Voces del vicio - tu página de videojuegos, por jugadores[/url]');
DEFINE('_KUNENA_SAMPLESUCCESS', 'Datos de ejemplo cargados');
DEFINE('_KUNENA_SAMPLEREMOVED', 'Datos de ejemplo eliminados');
DEFINE('_KUNENA_CBADDED', 'Añadido perfil Community Builder');
DEFINE('_KUNENA_IMGDELETED', 'Imagen borrada');
DEFINE('_KUNENA_FILEDELETED', 'Archivo borrado');
DEFINE('_KUNENA_NOPARENT', 'Sin padre');
DEFINE('_KUNENA_DIRCOPERR', 'Error: Archivo');
DEFINE('_KUNENA_DIRCOPERR1', 'no ha podido ser copiado!\n');
DEFINE('_KUNENA_INSTALL1', '<strong>Foro Kunena</strong> Componente <em>para Joomla! CMS</em> <br />&copy; 2006 - 2008 by Best Of Joomla<br />All rights reserved.');
DEFINE('_KUNENA_INSTALL2', 'Transferencia/Instalación :</code></strong><br /><br /><font color="red"><b>completada con éxito');
DEFINE('_KUNENA_FORUMPRF_TITLE', 'Opciones de perfil');
DEFINE('_KUNENA_FORUMPRF', 'Perfil');
DEFINE('_KUNENA_FORUMPRRDESC', 'Si tienes los componentes Clexus PM o Community Builder instalados, puedes configurar Kunena para usar sus páginas de perfil de usuarios.');
DEFINE('_KUNENA_USERPROFILE_PROFILE', 'Perfil');
DEFINE('_KUNENA_USERPROFILE_PROFILEHITS', '<b>Visitas al perfil</b>');
DEFINE('_KUNENA_USERPROFILE_MESSAGES', 'Mensajes totales en el foro');
DEFINE('_KUNENA_USERPROFILE_TOPICS', 'Temas');
DEFINE('_KUNENA_USERPROFILE_STARTBY', 'Iniciado por');
DEFINE('_KUNENA_USERPROFILE_CATEGORIES', 'Categorías');
DEFINE('_KUNENA_USERPROFILE_DATE', 'Fecha');
DEFINE('_KUNENA_USERPROFILE_HITS', 'Visitas');
DEFINE('_KUNENA_USERPROFILE_NOFORUMPOSTS', 'Ningún mensaje en el foro');
DEFINE('_KUNENA_TOTALFAVORITE', 'Favoritos:  ');
DEFINE('_KUNENA_SHOW_CHILD_CATEGORY_COLON', 'Número de columnas de foros hijo ');
DEFINE('_KUNENA_SHOW_CHILD_CATEGORY_COLONDESC', 'Número de formateo de la columna de foros hijo, bajo la categoría principal ');
DEFINE('_KUNENA_SUBSCRIPTIONSCHECKED', 'Auto-suscripción tras publicar mensaje marcada por defecto?');
DEFINE('_KUNENA_SUBSCRIPTIONSCHECKED_DESC', 'Configúrala a "Si" si quieres que suscripción esté siempre seleccionada');
// Errors (Re-integration from Joomlaboard 1.2)
DEFINE('_KUNENA_ERROR1', 'La categoría / o el foro deben tener un nombre');
// Forum Configuration (New in Kunena)
DEFINE('_KUNENA_SHOWSTATS', 'Mostrar estadísticas');
DEFINE('_KUNENA_SHOWSTATSDESC', 'Si quieres mostrar estadísticas, escoge "Si"');
DEFINE('_KUNENA_SHOWWHOIS', 'Mostrar "Quien está Online"');
DEFINE('_KUNENA_SHOWWHOISDESC', 'Si quieres mostrar "Quien está Online, escoge "Si"');
DEFINE('_KUNENA_STATSGENERAL', 'Mostrar estadísticas generales');
DEFINE('_KUNENA_STATSGENERALDESC', 'Si quieres mostrar estadísticas generales, selecciona "Si"');
DEFINE('_KUNENA_USERSTATS', 'Mostrar estadísticas de Usuarios Populares');
DEFINE('_KUNENA_USERSTATSDESC', 'Si quieres mostrar estadísticas de usuarios populares, escoge "Si"');
DEFINE('_KUNENA_USERNUM', 'Número de Usuarios Populares');
DEFINE('_KUNENA_USERPOPULAR', 'Mostrar estadísticas de Temas Populares');
DEFINE('_KUNENA_USERPOPULARDESC', 'Si quieres mostrar estadísticas de Temas populares, escoge "Si"');
DEFINE('_KUNENA_NUMPOP', 'Número de Temas Populares');
DEFINE('_KUNENA_INFORMATION',
    'El equipo Best of Joomla se enorgullece de presentar Kunena 1.0.5. Última release estable antes de Kunena 2. Kunena es un componente que dota a joomla de un potente y moderno foro. Basado inicialmente en el trabajo del equipo Joomlaboard (Kunena 2, ha sido totalmente reescrito) y nuestras alabanzas para ellos. Este es un trabajo en colaboración de varios desarrolladores que han participado amablemente y han hecho posible esta distribución. Desde aquí les damos las gracias y esperamos disfrutéis de ella! Best of Joomla - Kunena Team');
DEFINE('_KUNENA_INSTRUCTIONS', 'Instrucciones');
DEFINE('_KUNENA_FINFO', 'Información del foro Kunena');
DEFINE('_KUNENA_CSSEDITOR', 'Editor de la plantilla CSS Kunena');
DEFINE('_KUNENA_PATH', 'Ruta:');
DEFINE('_KUNENA_CSSERROR', 'Atención: La plantilla CSS debe tener permisos de escritura para poder guardar los cambios.');
// User Management
DEFINE('_KUNENA_FUM', 'Panel de control de perfiles de usuarios Kunena');
DEFINE('_KUNENA_SORTID', 'Ordenar por userID');
DEFINE('_KUNENA_SORTMOD', 'Ordenar por moderadores');
DEFINE('_KUNENA_SORTNAME', 'Ordenar por nombres');
DEFINE('_KUNENA_VIEW', 'Ver');
DEFINE('_KUNENA_NOUSERSFOUND', 'No se han encontrado perfiles de usuarios.');
DEFINE('_KUNENA_ADDMOD', 'Añadir moderador a ');
DEFINE('_KUNENA_NOMODSAV', 'No se han encontrado moderadores posibles. Lee la nota debajo.');
DEFINE('_KUNENA_NOTEUS',
    'NOTA: Solo los usuarios con la marca de moderador en su perfil se muestran aquí. Para poder añadir un moderador, debes dar al usuario la marca de moderador, ves a <a href="index2.php?option=com_Kunena&task=profiles">Administración de usuarios</a> y busca al usuario que quieras hacer moderador. Selecciona su perfil y actualízalo. La marca de moderador solo puede ser dada por un administrador. ');
DEFINE('_KUNENA_PROFFOR', 'Perfil de');
DEFINE('_KUNENA_GENPROF', 'Opciones de perfil general');
DEFINE('_KUNENA_PREFVIEW', 'Visionado preferido:');
DEFINE('_KUNENA_PREFOR', 'Ordenado de mensajes preferido:');
DEFINE('_KUNENA_ISMOD', 'Moderador:');
DEFINE('_KUNENA_ISADM', '<strong>Si</strong> (no se puede cambiar, este usuario es un administrador)');
DEFINE('_KUNENA_COLOR', 'Color');
DEFINE('_KUNENA_UAVATAR', 'Avatar:');
DEFINE('_KUNENA_NS', 'Ninguno seleccionado');
DEFINE('_KUNENA_DELSIG', ' Marca esta opción para borrar la firma');
DEFINE('_KUNENA_DELAV', ' Marca esta opción para borrar el avatar');
DEFINE('_KUNENA_SUBFOR', 'Suscripciones para');
DEFINE('_KUNENA_NOSUBS', 'Este usuario no tiene suscripciones');
// Forum Administration (Re-integration from Joomlaboard 1.2)
DEFINE('_KUNENA_BASICS', 'Básicos');
DEFINE('_KUNENA_BASICSFORUM', 'Información básica del foro');
DEFINE('_KUNENA_PARENT', 'Padre:');
DEFINE('_KUNENA_PARENTDESC',
    'Nota: Para crear una categoría, escoge "categoría de primer nivel" como padre. Una categoría sirve como contenedor para los foros.<br />Un foro <strong>solo</strong> se puede crear dentro de una categoría, escogiendo una categoría creada previamente como padre del foro.<br /> <strong>NO</strong> se puede postear en las categorías; solo en los foros.');
DEFINE('_KUNENA_BASICSFORUMINFO', 'Nombre y descripción de los foros');
DEFINE('_KUNENA_NAMEADD', 'Nombre:');
DEFINE('_KUNENA_DESCRIPTIONADD', 'Descripción:');
DEFINE('_KUNENA_ADVANCEDDESC', 'Configuración avanzada del foro');
DEFINE('_KUNENA_ADVANCEDDESCINFO', 'Seguridad y acceso al foro');
DEFINE('_KUNENA_LOCKEDDESC', 'Configúralo a &quot;Si&quot; si quieres cerrar este foro a todo el mundo, excepto a Moderadores y Administradores que pueden crear nuevos hilos o respuestas en foros cerrados (o mover temas a ellos).');
DEFINE('_KUNENA_LOCKED1', 'Cerrado:');
DEFINE('_KUNENA_PUBACC', 'Nivel de acceso público:');
DEFINE('_KUNENA_PUBACCDESC',
    'Para crear un foro No-Público puedes especificar el nivel de usuario mínimo que pueda ver/entrar en ese foro, Por defecto, el nivel de usuario mínimo esta definido a &quot;Todo el mundo&quot;.<br /><b>Nota</b>: Si restringes el acceso a una categoría completa, a uno o más grupos, esconderá todos los foros contenidos en esa categoría a cualquiera que no tenga los privilegios requeridos.<br /> Es independiente del hecho de que las categorías no pueden ser moderadas; los moderadores pueden añadirse a la lista de moderadores.');
DEFINE('_KUNENA_CGROUPS', 'Incluir grupos hijo:');
DEFINE('_KUNENA_CGROUPSDESC', 'Deberían los grupos hijo compartir este acceso? Si se escoge &quot;No&quot; el acceso a este foro estará restringido <b>solamente</b> al grupo seleccionado');
DEFINE('_KUNENA_ADMINLEVEL', 'Nivel de acceso de administración:');
DEFINE('_KUNENA_ADMINLEVELDESC',
    'Si creas un foro con restricciones de acceso público, puedes especificar un nivel de acceso administrativo adicional.<br /> Si restringes el acceso al foro a un grupo de usuarios del frontend, y no especificas un grupo de backend aquí, los administradores no podrán ver ni entrar al foro.');
DEFINE('_KUNENA_ADVANCED', 'Avanzado');
DEFINE('_KUNENA_CGROUPS1', 'Incluir grupos hijo:');
DEFINE('_KUNENA_CGROUPS1DESC', 'Debe permitirsele el acceso también a los grupos hijo? Si se configura a &quot;No &quot; el acceso a este foro estará restringido <b>solamente</b> al grupo seleccionado');
DEFINE('_KUNENA_REV', 'Revisar mensajes:');
DEFINE('_KUNENA_REVDESC',
    'Configura a &quot;Si&quot; si quieres que los mensajes sean revisados por los moderadores antes de ser publicados en el foro. Esto es útil solamente en foros moderados!<br />Si configuras esto sin haber especificado ningún moderador, el administrador del sitio será el único responsable de aprobar/borrar mensajes y se quedaran en espera!');
DEFINE('_KUNENA_MOD_NEW', 'Moderación');
DEFINE('_KUNENA_MODNEWDESC', 'Moderación del foro y moderadores del foro');
DEFINE('_KUNENA_MOD', 'Moderado:');
DEFINE('_KUNENA_MODDESC',
    'Configura a &quot;Si&quot; si quieres ser capaz de asignar moderadores a este foro.<br /><strong>Nota:</strong> Esto no significa que los nuevos mensajes deban ser revisados antes de ser publicados en el foro!<br /> Si quisieses activar esa opción, deberías activar la opción &quot;Revisar mensajes&quot; en la pestaña avanzado..<br /><br /> <strong>Nota:</strong> Tras configurar la moderación a &quot;Si&quot; debes guardar la configuración del foro antes de poder usar el botón para agregar nuevos moderadores.');
DEFINE('_KUNENA_MODHEADER', 'Opciones de moderación para este foro');
DEFINE('_KUNENA_MODSASSIGNED', 'Moderadores asignados a este foro:');
DEFINE('_KUNENA_NOMODS', 'No hay moderadores asignados a este foro');
// Some General Strings (Improvement in Kunena)
DEFINE('_KUNENA_EDIT', 'Editar');
DEFINE('_KUNENA_ADD', 'Añadir');
// Reorder (Re-integration from Joomlaboard 1.2)
DEFINE('_KUNENA_MOVEUP', 'Mover arriba');
DEFINE('_KUNENA_MOVEDOWN', 'Mover abajo');
// Groups - Integration in Kunena
DEFINE('_KUNENA_ALLREGISTERED', 'Todos registrados');
DEFINE('_KUNENA_EVERYBODY', 'Todo el mundo');
// Removal of hardcoded strings in admin panel (Re-integration from Joomlaboard 1.2)
DEFINE('_KUNENA_REORDER', 'Reordenar');
DEFINE('_KUNENA_CHECKEDOUT', 'Check Out');
DEFINE('_KUNENA_ADMINACCESS', 'Acceso administrativo');
DEFINE('_KUNENA_PUBLICACCESS', 'Acceso público');
DEFINE('_KUNENA_PUBLISHED', 'Publicado');
DEFINE('_KUNENA_REVIEW', 'Revisar');
DEFINE('_KUNENA_MODERATED', 'Moderado');
DEFINE('_KUNENA_LOCKED', 'Cerrado');
DEFINE('_KUNENA_CATFOR', 'Categoria / Foro');
DEFINE('_KUNENA_ADMIN', 'Administración del Foro');
DEFINE('_KUNENA_CP', 'Panel de Control de Kunena');
// Configuration page - Headings (Re-integrated from Joomlaboard 1.2)
DEFINE('_COM_A_AVATAR_INTEGRATION', 'Integración de Avatar');
DEFINE('_COM_A_RANKS_SETTINGS', 'Rangos');
DEFINE('_COM_A_RANKING_SETTINGS', 'Configuración de rangos');
DEFINE('_COM_A_AVATAR_SETTINGS', 'Configuración de avatares');
DEFINE('_COM_A_SECURITY_SETTINGS', 'Opciones de seguridad');
DEFINE('_COM_A_BASIC_SETTINGS', 'Opciones básicas');
// Kunena 1.0.0
//
DEFINE('_COM_A_FAVORITES', 'Permitir favoritos');
DEFINE('_COM_A_FAVORITES_DESC', 'Define a &quot;Si&quot; si quieres permitir a los usuarios registrados para marcar temas como favoritos ');
DEFINE('_USER_UNFAVORITE_ALL', 'Marca esta caja para <b><u>quitar la marca de favorito</u></b> de todos los temas (incluyendo los invisibles para resolución de problemas)');
DEFINE('_VIEW_FAVORITETXT', 'Marcar como favorito ');
DEFINE('_USER_UNFAVORITE_YES', 'Has desmarcado el tema como favorito.');
DEFINE('_POST_FAVORITED_TOPIC', 'Se ha añadido este tema a favoritos.');
DEFINE('_VIEW_UNFAVORITETXT', 'No favorito');
DEFINE('_VIEW_UNSUBSCRIBETXT', 'Anular suscripción');
DEFINE('_USER_NOFAVORITES', 'No Favoritos');
DEFINE('_POST_SUCCESS_FAVORITE', 'Tu petición para añadir a favoritos se ha procesado.');
DEFINE('_COM_A_MESSAGES_SEARCH', 'Resultados de la búsqueda');
DEFINE('_COM_A_MESSAGES_DESC_SEARCH', 'Mensajes por página en los resultados de búsqueda');
DEFINE('_KUNENA_USE_JOOMLA_STYLE', 'Usar estilos de Joomla?');
DEFINE('_KUNENA_USE_JOOMLA_STYLE_DESC', 'Si quieres usar el estilo de joomla, configura a SI. (class: como sectionheader, sectionentry1 ...) ');
DEFINE('_KUNENA_SHOW_CHILD_CATEGORY_ON_LIST', 'Mostrar imagen en las categorías hijas');
DEFINE('_KUNENA_SHOW_CHILD_CATEGORY_ON_LIST_DESC', 'Si quieres mostrar un pequeño icono de las categorías hijas en la lista de tu foro, configura a SI.');
DEFINE('_KUNENA_SHOW_ANNOUNCEMENT', 'Mostrar anuncios');
DEFINE('_KUNENA_SHOW_ANNOUNCEMENT_DESC', 'Define a "Si", si quieres mostrar la caja de anuncios en la portada del foro.');
DEFINE('_KUNENA_SHOW_AVATAR_ON_CAT', 'Mostrar avatares en la lista de categorías?');
DEFINE('_KUNENA_SHOW_AVATAR_ON_CAT_DESC', 'Define a "Si", si quieres mostrar el avatar de los usuarios en la lista de categorías de foro.');
DEFINE('_KUNENA_RECENT_POSTS', 'Configuración mensajes recientes');
DEFINE('_KUNENA_SHOW_LATEST_MESSAGES', 'Mostrar mensajes recientes.');
DEFINE('_KUNENA_SHOW_LATEST_MESSAGES_DESC', 'Definir a "Si" si quieres mostrar el plugin de últimos mensajes en tu foro.');
DEFINE('_KUNENA_NUMBER_OF_LATEST_MESSAGES', 'Número de mensajes recientes');
DEFINE('_KUNENA_NUMBER_OF_LATEST_MESSAGES_DESC', 'Número de mensajes recientes');
DEFINE('_KUNENA_COUNT_PER_PAGE_LATEST_MESSAGES', 'Mensajes por pestaña ');
DEFINE('_KUNENA_COUNT_PER_PAGE_LATEST_MESSAGES_DESC', 'Número de mensajes en cada pestaña');
DEFINE('_KUNENA_LATEST_CATEGORY', 'Mostrar categoría');
DEFINE('_KUNENA_LATEST_CATEGORY_DESC', 'Categorías especificas a mostrar en los mensajes recientes. Por ejemplo: 2,3,7 ');
DEFINE('_KUNENA_SHOW_LATEST_SINGLE_SUBJECT', 'Mostrar categoría única');
DEFINE('_KUNENA_SHOW_LATEST_SINGLE_SUBJECT_DESC', 'Mostrar tema único');
DEFINE('_KUNENA_SHOW_LATEST_REPLY_SUBJECT', 'Mostrar respuesta única');
DEFINE('_KUNENA_SHOW_LATEST_REPLY_SUBJECT_DESC', 'Mostrar título de la respuesta (Re:)');
DEFINE('_KUNENA_LATEST_SUBJECT_LENGTH', 'Largo del título');
DEFINE('_KUNENA_LATEST_SUBJECT_LENGTH_DESC', 'Largo del título');
DEFINE('_KUNENA_SHOW_LATEST_DATE', 'Mostrar fecha');
DEFINE('_KUNENA_SHOW_LATEST_DATE_DESC', 'Mostrar fecha');
DEFINE('_KUNENA_SHOW_LATEST_HITS', 'Mostrar visitas');
DEFINE('_KUNENA_SHOW_LATEST_HITS_DESC', 'Mostrar visitas');
DEFINE('_KUNENA_SHOW_AUTHOR', 'Mostrar autor');
DEFINE('_KUNENA_SHOW_AUTHOR_DESC', '1=nombre de usuario, 2=nombre, 0=ninguno');
DEFINE('_KUNENA_STATS', 'Configuración del plugin de estadísticas ');
DEFINE('_KUNENA_CATIMAGEPATH', 'Ruta de las imágenes de categorías ');
DEFINE('_KUNENA_CATIMAGEPATH_DESC', 'Ruta de las imágenes de categorías. Si configuras la ruta de "category_images/" será "your_html_rootfolder/images/fbfiles/category_images/');
DEFINE('_KUNENA_ANN_MODID', 'IDs de los moderadores de anuncios ');
DEFINE('_KUNENA_ANN_MODID_DESC', 'Añade las IDs de usuarios que moderarán los anuncios. ej. 62,63,... los moderadores de anuncios, pueden añadir, editar y borrar anuncios.');
//
DEFINE('_KUNENA_FORUM_TOP', 'Categorías del foro ');
DEFINE('_KUNENA_CHILD_BOARDS', 'Subforos ');
DEFINE('_KUNENA_QUICKMSG', 'Respuesta rápida ');
DEFINE('_KUNENA_THREADS_IN_FORUM', 'Temas en el foro ');
DEFINE('_KUNENA_FORUM', 'Foro ');
DEFINE('_KUNENA_SPOTS', 'Destacados');
DEFINE('_KUNENA_CANCEL', 'cancelar');
DEFINE('_KUNENA_TOPIC', 'TEMA: ');
DEFINE('_KUNENA_POWEREDBY', 'Gracias a ');
// Time Format
DEFINE('_TIME_TODAY', '<b>Hoy</b> ');
DEFINE('_TIME_YESTERDAY', '<b>Ayer</b> ');
//  STARTS HERE!
DEFINE('_KUNENA_WHO_LATEST_POSTS', 'Últimos mensajes');
DEFINE('_KUNENA_WHO_WHOISONLINE', 'Quién está Online?');
DEFINE('_KUNENA_WHO_MAINPAGE', 'Foro principal');
DEFINE('_KUNENA_GUEST', 'Invitado');
DEFINE('_KUNENA_PATHWAY_VIEWING', 'viendo');
DEFINE('_KUNENA_ATTACH', 'adjuntos');
// Favorite
DEFINE('_KUNENA_FAVORITE', 'Favorito');
DEFINE('_USER_FAVORITES', 'Mis favoritos');
DEFINE('_THREAD_UNFAVORITE', 'Quitar de favoritos');
// profilebox
DEFINE('_PROFILEBOX_WELCOME', 'Bienvenido');
DEFINE('_PROFILEBOX_SHOW_LATEST_POSTS', 'Mostrar últimos mensajes');
DEFINE('_PROFILEBOX_SET_MYAVATAR', 'Definir Avatar');
DEFINE('_PROFILEBOX_MYPROFILE', 'Mi perfil');
DEFINE('_PROFILEBOX_SHOW_MYPOSTS', 'Mostrar mis mensajes');
DEFINE('_PROFILEBOX_GUEST', 'Invitado');
DEFINE('_PROFILEBOX_LOGIN', 'Identificarse');
DEFINE('_PROFILEBOX_REGISTER', 'Registrarse');
DEFINE('_PROFILEBOX_LOGOUT', 'Salir');
DEFINE('_PROFILEBOX_LOST_PASSWORD', 'Contraseña olvidada?');
DEFINE('_PROFILEBOX_PLEASE', 'Por favor');
DEFINE('_PROFILEBOX_OR', 'o');
// recentposts
DEFINE('_RECENT_RECENT_POSTS', 'Mensajes recientes');
DEFINE('_RECENT_TOPICS', 'Tema');
DEFINE('_RECENT_AUTHOR', 'Autor');
DEFINE('_RECENT_CATEGORIES', 'categorías');
DEFINE('_RECENT_DATE', 'Fecha');
DEFINE('_RECENT_HITS', 'Visitas');
// announcement

DEFINE('_ANN_ANNOUNCEMENTS', 'Anuncios');
DEFINE('_ANN_ID', 'ID');
DEFINE('_ANN_DATE', 'Fecha');
DEFINE('_ANN_TITLE', 'Título');
DEFINE('_ANN_SORTTEXT', 'Texto corto');
DEFINE('_ANN_LONGTEXT', 'Texto largo');
DEFINE('_ANN_ORDER', 'Orden');
DEFINE('_ANN_PUBLISH', 'Publicar');
DEFINE('_ANN_PUBLISHED', 'Publicado');
DEFINE('_ANN_UNPUBLISHED', 'No publicado');
DEFINE('_ANN_EDIT', 'Editar');
DEFINE('_ANN_DELETE', 'Borrar');
DEFINE('_ANN_SUCCESS', 'Éxito');
DEFINE('_ANN_SAVE', 'Guardar');
DEFINE('_ANN_YES', 'Si');
DEFINE('_ANN_NO', 'No');
DEFINE('_ANN_ADD', 'añadir nuevo');
DEFINE('_ANN_SUCCESS_EDIT', 'Editado con éxito');
DEFINE('_ANN_SUCCESS_ADD', 'Añadido con éxito');
DEFINE('_ANN_DELETED', 'Borrado con éxito');
DEFINE('_ANN_ERROR', 'ERROR');
DEFINE('_ANN_READMORE', 'Leer más...');
DEFINE('_ANN_CPANEL', 'Panel de control de anuncios');
DEFINE('_ANN_SHOWDATE', 'Mostrar fecha');
// Stats
DEFINE('_STAT_FORUMSTATS', 'Estadísticas del foro');
DEFINE('_STAT_GENERAL_STATS', 'Estadísticas generales');
DEFINE('_STAT_TOTAL_USERS', 'Total de usuarios');
DEFINE('_STAT_LATEST_MEMBERS', 'Último miembro');
DEFINE('_STAT_PROFILE_INFO', 'Ver información del perfil');
DEFINE('_STAT_TOTAL_MESSAGES', 'Mensajes totales');
DEFINE('_STAT_TOTAL_SUBJECTS', 'Temas totales');
DEFINE('_STAT_TOTAL_CATEGORIES', 'Categorías totales');
DEFINE('_STAT_TOTAL_SECTIONS', 'Secciones totales');
DEFINE('_STAT_TODAY_OPEN_THREAD', 'Creados hoy');
DEFINE('_STAT_YESTERDAY_OPEN_THREAD', 'Creados ayer');
DEFINE('_STAT_TODAY_TOTAL_ANSWER', 'Respuestas hoy');
DEFINE('_STAT_YESTERDAY_TOTAL_ANSWER', 'Respuestas ayer');
DEFINE('_STAT_VIEW_RECENT_POSTS_ON_FORUM', 'Ver últimos mensajes');
DEFINE('_STAT_MORE_ABOUT_STATS', 'Más sobre las estadísticas');
DEFINE('_STAT_USERLIST', 'Lista de usuarios');
DEFINE('_STAT_TEAMLIST', 'Equipo del foro');
DEFINE('_STATS_FORUM_STATS', 'Estadísticas del foro');
DEFINE('_STAT_POPULAR', 'Popular');
DEFINE('_STAT_POPULAR_USER_TMSG', 'Usuarios (Mensajes Totales) ');
DEFINE('_STAT_POPULAR_USER_KGSG', 'Temas ');
DEFINE('_STAT_POPULAR_USER_GSG', 'Usuarios (Total de visitas al perfil) ');
//Team List
DEFINE('_MODLIST_ONLINE', 'Usuario Online');
DEFINE('_MODLIST_OFFLINE', 'Usuario Offline');
// Whoisonline
DEFINE('_WHO_WHOIS_ONLINE', 'Quién está online?');
DEFINE('_WHO_ONLINE_NOW', 'Online');
DEFINE('_WHO_ONLINE_MEMBERS', 'Miembros');
DEFINE('_WHO_AND', 'y');
DEFINE('_WHO_ONLINE_GUESTS', 'Invitados');
DEFINE('_WHO_ONLINE_USER', 'Usuario');
DEFINE('_WHO_ONLINE_TIME', 'Tiempo');
DEFINE('_WHO_ONLINE_FUNC', 'Acción');
// Userlist
DEFINE('_USRL_USERLIST', 'Lista de usuarios');
DEFINE('_USRL_REGISTERED_USERS', '%s tiene <b>%d</b> usuarios registrados');
DEFINE('_USRL_SEARCH_ALERT', 'Por favor, escribe el valor a buscar!');
DEFINE('_USRL_SEARCH', 'Encontrar usuario');
DEFINE('_USRL_SEARCH_BUTTON', 'Buscar');
DEFINE('_USRL_LIST_ALL', 'Listar todos');
DEFINE('_USRL_NAME', 'Nombre');
DEFINE('_USRL_USERNAME', 'Nombre de usuario');
DEFINE('_USRL_EMAIL', 'E-mail');
DEFINE('_USRL_USERTYPE', 'Tipo de usuario');
DEFINE('_USRL_JOIN_DATE', 'Miembro desde');
DEFINE('_USRL_LAST_LOGIN', 'Última visita');
DEFINE('_USRL_NEVER', 'Nunca');
DEFINE('_USRL_BLOCK', 'Estado');
DEFINE('_USRL_MYPMS2', 'MyPMS');
DEFINE('_USRL_ASC', 'Ascendente');
DEFINE('_USRL_DESC', 'Descendente');
DEFINE('_USRL_DATE_FORMAT', '%d/%m/%Y');
DEFINE('_USRL_TIME_FORMAT', '%H:%M');
DEFINE('_USRL_USEREXTENDED', 'Detalles');
DEFINE('_USRL_COMPROFILER', 'Perfil');
DEFINE('_USRL_THUMBNAIL', 'Imagen');
DEFINE('_USRL_READON', 'Mostrar');
DEFINE('_USRL_MYPMSPRO', 'Clexus PM');
DEFINE('_USRL_MYPMSPRO_SENDPM', 'Enviar MP');
DEFINE('_USRL_JIM', 'MP');
DEFINE('_USRL_UDDEIM', 'MP');
DEFINE('_USRL_SEARCHRESULT', 'Resultados de búsqueda para');
DEFINE('_USRL_STATUS', 'Estado');
DEFINE('_USRL_LISTSETTINGS', 'Opciones de la lista de usuarios');
DEFINE('_USRL_ERROR', 'Error');

//changed in 1.1.4 stable
DEFINE('_COM_A_PMS_TITLE', 'Componente de mensajería privada');
DEFINE('_COM_A_COMBUILDER_TITLE', 'Community Builder');
DEFINE('_FORUM_SEARCH', 'Buscado por: %s');
DEFINE('_MODERATION_DELETE_MESSAGE', 'Estas seguro que quieres eliminar este mensaje? \n\n NOTA: No hay ninguna manera de recuperar los mensajes borrados!');
DEFINE('_MODERATION_DELETE_SUCCESS', 'Éxito borrando mensaje(s)');
DEFINE('_COM_A_RANKING', 'Ranking');
DEFINE('_COM_A_BOT_REFERENCE', 'Mostrar la tabla de referencia de bots');
DEFINE('_COM_A_MOSBOT', 'Activar el Discuss Bot');
DEFINE('_PREVIEW', 'previsualizar');
DEFINE('_COM_A_MOSBOT_TITLE', 'Discussbot');
DEFINE('_COM_A_MOSBOT_DESC', 'El Discuss Bot permite a los usuarios discutir el contenido en los foros. El título del contenido se usa como título de los temas en el foro.'
           . '<br />Si un tema no existe aún, se crea uno nuevo. Si el tema ya existe, se muestra el hilo al usuario y puede participar en el.' . '<br /><strong>Necesitas descargar e instalar el bot por separado.</strong>'
           . '<br />Busca en <a href="http://www.bestofjoomla.com">Best of Joomla Site</a> para más información.' . '<br />Cuando este instalado tendrás que añadir la siguiente orden en el contenido para que funcione:' . '<br />{mos_KUNENA_discuss:<em>catid</em>}'
           . '<br />La <em>catid</em> es la categoría en la que el se discutirá el contenido. Para encontrar la catid adecuada, simplemente, comprueba en los foros' . 'y comprueba el id de la categoría en la URL de la barra de búsqueda de tu navegador.'
           . '<br />Ejemplo: si quieres discutir un artículo en el foro con la catid 26, el bot debería ser algo así: {mos_KUNENA_discuss:26}'
           . '<br />Puede parecer algo difícil, pero permite que cada contenido sea discutido en el foro más apropiado.');
//new in 1.1.4 stable
// search.class.php
DEFINE('_FORUM_SEARCHTITLE', 'Buscar');
DEFINE('_FORUM_SEARCHRESULTS', 'mostrando %s resultados de %s.');
// Help, FAQ
DEFINE('_COM_FORUM_HELP', 'FAQ');
// rules.php
DEFINE('_COM_FORUM_RULES', 'Reglas');
DEFINE('_COM_FORUM_RULES_DESC', '<ul><li>Edita este archivo para insertar tus reglas joomlaroot/administrator/components/com_Kunena/language/spanish.php</li><li>Regla 2</li><li>Regla 3</li><li>Regla 4</li><li>...</li></ul>');
//smile.class.php
DEFINE('_COM_BOARDCODE', 'BBCode');
// moderate_messages.php
DEFINE('_MODERATION_APPROVE_SUCCESS', 'Se ha aprobado este mensaje(s)');
DEFINE('_MODERATION_DELETE_ERROR', 'ERROR: No se ha(n) podido borrar este mensaje(s)');
DEFINE('_MODERATION_APPROVE_ERROR', 'ERROR: No se ha(n) podido aprobar este mensaje(s)');
// listcat.php
DEFINE('_GEN_NOFORUMS', 'No hay ningún foro en esta categoría!');
//new in 1.1.3 stable
DEFINE('_POST_GHOST_FAILED', 'Fallo al crear copia del tema en el foro original!');
DEFINE('_POST_MOVE_GHOST', 'Dejar copia del tema en el foro original');
//new in 1.1 Stable
DEFINE('_GEN_FORUM_JUMP', 'Saltar al foro');
DEFINE('_COM_A_FORUM_JUMP', 'Activar Saltar al Foro');
DEFINE('_COM_A_FORUM_JUMP_DESC', 'Si se configura a &quot;Si&quot; muestra un selector en las páginas del foro que permite saltar rápidamente de un foro o categoría a otr@.');
//new in 1.1 RC1
DEFINE('_GEN_RULES', 'Reglas');
DEFINE('_COM_A_RULESPAGE', 'Activar página de reglas');
DEFINE('_COM_A_RULESPAGE_DESC',
    'Si se configura a &quot;Si&quot; se mostrará un vínculo en el menú de la cabecera a tu página de reglas. Esta página usarse para otras cosas. Puedes alterar el contenido de este archivo abriendo el archivo rules.php en /joomla_root/components/com_Kunena. <em>Asegurate de que siempre tengas una copia de seguridad de este archivo ya que se sobreescribirá al actualizar!</em>');
DEFINE('_MOVED_TOPIC', 'MOVIDO:');
DEFINE('_COM_A_PDF', 'Activar creación de PDF');
DEFINE('_COM_A_PDF_DESC',
    'Si se configura a &quot;Si&quot; si quieres permitir que los usuarios puedan descargar PDFs simples con los contenidos del tema..<br />Es un documento PDF <u>simple</u>; sin marcas, sin estilo ni parecidos, pero contiene todo el texto en el tema.');
DEFINE('_GEN_PDFA', 'Presiona este botón para crear un documento PDF a partir de este tema (abre una ventana nueva).');
DEFINE('_GEN_PDF', 'PDF');
//new in 1.0.4 stable
DEFINE('_VIEW_PROFILE', 'Presiona aquí para ver el perfil de este usuario');
DEFINE('_VIEW_ADDBUDDY', 'Presiona aquí para añadir este usuario a  tu lista de amigos');
DEFINE('_POST_SUCCESS_POSTED', 'Tu mensaje se ha publicado con éxito');
DEFINE('_POST_SUCCESS_VIEW', '[ Volver al tema ]');
DEFINE('_POST_SUCCESS_FORUM', '[ Volver al foro ]');
DEFINE('_RANK_ADMINISTRATOR', 'Administrador');
DEFINE('_RANK_MODERATOR', 'Moderador');
DEFINE('_SHOW_LASTVISIT', 'Desde la última visita');
DEFINE('_COM_A_BADWORDS_TITLE', 'Filtrado de palabras malsonantes');
DEFINE('_COM_A_BADWORDS', 'Utilizar el filtrado de palabras malsonantes');
DEFINE('_COM_A_BADWORDS_DESC', 'Selecciona "Si" si quieres filtrar mensajes que contengan palabras inadecuadas utilizando la configuración del Componente Badword. Para utilizar esta función, debes tener instalado el Componente Badword');
DEFINE('_COM_A_BADWORDS_NOTICE', '* Se ha censurado este mensaje porque contenía una o más palabras prohibidas por la administración *');
DEFINE('_COM_A_COMBUILDER_PROFILE', 'Crear perfil del foro en Community Builder');
DEFINE('_COM_A_COMBUILDER_PROFILE_DESC',
    'Haz clic en el vínculo para crear los "fields" del foro en el perfil de usuario de Community Builder. Cuando estén creados eres libre de moverlos como quieras usando el administrador de Community Builder, pero no les cambies el nombre ni las opciones. Si los borras del administrador de Community Builder, puedes crearlos de nuevo usando este botón, si no es para recrearlos, no presiones el link de nuevo!');
DEFINE('_COM_A_COMBUILDER_PROFILE_CLICK', '> Presiona aquí <');
DEFINE('_COM_A_COMBUILDER', 'Perfiles de usuario de Community Builder');
DEFINE('_COM_A_COMBUILDER_DESC',
    'Configurando a "Si" activará la integración con el componente Community Builder (www.joomlapolis.com). Todas las funciones de los perfiles de usuario Kunena se controlarán desde Community Builder y el vínculo al perfil en el foro te llevará al perfil de usuario de Community Builder. Esta configuración sobreescribe cualquier configuración de Clexus PM si ambos estuviesen configurados a "SI". Además, asegúrate de hacer los cambios necesarios en la base de datos de Community Builder con la opción de debajo.');
DEFINE('_COM_A_AVATAR_SRC', 'Usar imagen de avatar de');
DEFINE('_COM_A_AVATAR_SRC_DESC',
    'Si tienes los componente Clexus PM o Community Builder instalados, puedes configurar Kunena para usar las imágenes de avatar desde ellos. NOTA: Para CB tienes que tener activada la opción "thumbnail" porque el foro usa esa imagen, no el original.');
DEFINE('_COM_A_KARMA', 'Mostrar indicador de Karma');
DEFINE('_COM_A_KARMA_DESC', 'Configura a "SI" para mostrar el Karma del usuario y los botones relacionados (aumentar/disminuir) si las estadísticas de usuario están activadas.');
DEFINE('_COM_A_DISEMOTICONS', 'Desactivar smileys');
DEFINE('_COM_A_DISEMOTICONS_DESC', 'Configura a "SI" para desactivar totalmente los smileys gráficos.');
DEFINE('_COM_C_FBCONFIG', 'Configuración de Kunena');
DEFINE('_COM_C_FBCONFIGDESC', 'Configura todas las funcionalidades de Kunena');
DEFINE('_COM_C_FORUM', 'Administración del foro');
DEFINE('_COM_C_FORUMDESC', 'Añade categorías y foros y configúralos');
DEFINE('_COM_C_USER', 'Administración de usuarios');
DEFINE('_COM_C_USERDESC', 'Administración básica de usuarios y perfiles de usuario');
DEFINE('_COM_C_FILES', 'Navegador de archivos adjuntos');
DEFINE('_COM_C_FILESDESC', 'Navega y administra los archivos adjuntos');
DEFINE('_COM_C_IMAGES', 'Navegador de imágenes adjuntas');
DEFINE('_COM_C_IMAGESDESC', 'Navega y administra las imágenes adjuntas');
DEFINE('_COM_C_CSS', 'Editar el archivo CSS');
DEFINE('_COM_C_CSSDESC', 'Modificar el "look & feel" de Kunena');
DEFINE('_COM_C_SUPPORT', 'Página de soporte');
DEFINE('_COM_C_SUPPORTDESC', 'Conectar con la página de Best of Joomla (nueva ventana)');
DEFINE('_COM_C_PRUNETAB', 'Limpiar foros');
DEFINE('_COM_C_PRUNETABDESC', 'Borrar temas antiguos (configurable)');
DEFINE('_COM_C_PRUNEUSERS', 'Limpiar usuarios'); // <=FB 1.0.3
DEFINE('_COM_C_PRUNEUSERSDESC', 'Sincronizar la tabla de usuarios de Kunena con la tabla de usuarios de joomla!'); // <=FB 1.0.3
DEFINE('_COM_C_LOADSAMPLE', 'Cargar datos de ejemplo');
DEFINE('_COM_C_LOADSAMPLEDESC', 'Para facilitar empezar: Carga los datos de ejemplo en una base de datos limpia de Kunena');
DEFINE('_COM_C_REMOVESAMPLE', 'Eliminar datos de ejemplo');
DEFINE('_COM_C_REMOVESAMPLEDESC', 'Eliminar datos de ejemplo de tu base de datos');
DEFINE('_COM_C_LOADMODPOS', 'Cargar posiciones de módulos');
DEFINE('_COM_C_LOADMODPOSDESC', 'Cargar posiciones de módulos para plantillas Kunena');
DEFINE('_COM_C_UPGRADEDESC', 'Actualiza tu base datos a la última versión tras una actualización');
DEFINE('_COM_C_BACK', 'Volver al Panel de Control de Kunena');
DEFINE('_SHOW_LAST_SINCE', 'Temas activos desde la última visita:');
DEFINE('_POST_SUCCESS_REQUEST2', 'Tu petición se ha procesado');
DEFINE('_POST_NO_PUBACCESS3', 'Presiona aquí para registrarte.');
//==================================================================================================
//Changed in 1.0.4
//please update your local language file with these changes as well
DEFINE('_POST_SUCCESS_DELETE', 'Se ha borrado el mensaje con éxito.');
DEFINE('_POST_SUCCESS_EDIT', 'El mensaje se ha editado con éxito.');
DEFINE('_POST_SUCCESS_MOVE', 'El tema se ha movido con éxito.');
DEFINE('_POST_SUCCESS_POST', 'Tu mensaje se ha publicado con éxito.');
DEFINE('_POST_SUCCESS_SUBSCRIBE', 'Tu suscripción se ha procesado con éxito.');
//==================================================================================================
//new in 1.0.3 stable
//Karma
DEFINE('_KARMA', 'Karma');
DEFINE('_KARMA_SMITE', 'Boo!');
DEFINE('_KARMA_APPLAUD', 'Bien!');
DEFINE('_KARMA_BACK', 'Para volver al tema,');
DEFINE('_KARMA_WAIT', 'Solo puedes modificar el Karma de una persona cada 6 horas. <br/>Por favor, espera hasta entonces antes de intentar cambiar el Karma de alguien de nuevo.');
DEFINE('_KARMA_SELF_DECREASE', 'Por favor, no intentes disminuir tu propio Karma!');
DEFINE('_KARMA_SELF_INCREASE', 'Tu Karma ha disminuido por intentar incrementarlo tu mismo!');
DEFINE('_KARMA_DECREASED', 'Has disminuido el Karma del usuario. Si no vuelves automáticamente al tema en unos momentos,');
DEFINE('_KARMA_INCREASED', 'Has aumentado el Karma del usuario. Si no vuelves automáticamente al tema en unos momentos,');
DEFINE('_COM_A_TEMPLATE', 'Plantilla');
DEFINE('_COM_A_TEMPLATE_DESC', 'Escoge la plantilla a usar.');
DEFINE('_COM_A_TEMPLATE_IMAGE_PATH', 'Sets de imagen');
DEFINE('_COM_A_TEMPLATE_IMAGE_PATH_DESC', 'Escoge la plantilla del set de imágenes a usar.');
//==========================================
//new in 1.0 Stable
DEFINE('_COM_A_POSTSTATSBAR', 'Usar la barra de estadísticas de mensajes');
DEFINE('_COM_A_POSTSTATSBAR_DESC', 'Configúralo a "SI" si quieres mostrar el número de mensajes que un usuario ha hecho de forma gráfica en la barra de estadísticas.');
DEFINE('_COM_A_POSTSTATSCOLOR', 'Número de color para la barra de estadísticas');
DEFINE('_COM_A_POSTSTATSCOLOR_DESC', 'Escoge el número del color que quieres usar para la barra de estadísticas de mensajes');
DEFINE('_LATEST_REDIRECT',
    'Kunena necesita (re)establecer tus privilegios de acceso antes de que pueda crear una lista de los últimos mensajes para ti. \nNo te preocupes, es bastante normal tras más de 30 minutos de inactividad o tras identificarse de nuevo.\nPor favor, envía tu petición de búsqueda de nuevo.');
DEFINE('_SMILE_COLOUR', 'Color');
DEFINE('_SMILE_SIZE', 'Tamaño');
DEFINE('_COLOUR_DEFAULT', 'Estandard');
DEFINE('_COLOUR_RED', 'Rojo');
DEFINE('_COLOUR_PURPLE', 'Purpura');
DEFINE('_COLOUR_BLUE', 'Azul');
DEFINE('_COLOUR_GREEN', 'Verde');
DEFINE('_COLOUR_YELLOW', 'Amarillo');
DEFINE('_COLOUR_ORANGE', 'Naranja');
DEFINE('_COLOUR_DARKBLUE', 'Azul Oscuro');
DEFINE('_COLOUR_BROWN', 'Marrón');
DEFINE('_COLOUR_GOLD', 'Oro');
DEFINE('_COLOUR_SILVER', 'Plata');
DEFINE('_SIZE_NORMAL', 'Normal');
DEFINE('_SIZE_SMALL', 'Pequeño');
DEFINE('_SIZE_VSMALL', 'Muy pequeño');
DEFINE('_SIZE_BIG', 'Grande');
DEFINE('_SIZE_VBIG', 'Muy grande');
DEFINE('_IMAGE_SELECT_FILE', 'Escoger imagen a adjuntar');
DEFINE('_FILE_SELECT_FILE', 'Escoger archivo a adjuntar');
DEFINE('_FILE_NOT_UPLOADED', 'No se ha adjuntado tu archivo. Intenta publicar de nuevo, o editar el mensaje.');
DEFINE('_IMAGE_NOT_UPLOADED', 'No se ha adjuntado tu imagen. Intenta publicar de nuevo, o editar el mensaje.');
DEFINE('_BBCODE_IMGPH', 'Inserta el contenedor [Imagen] en el mensaje para la imagen adjuntada');
DEFINE('_BBCODE_FILEPH', 'Inserta el contenedor [Archivo] en el mensaje para el archivo adjuntado');
DEFINE('_POST_ATTACH_IMAGE', '[Imagen]');
DEFINE('_POST_ATTACH_FILE', '[Archivo]');
DEFINE('_USER_UNSUBSCRIBE_ALL', 'Marca esta opción para <b><u>borrar las suscripciones</u></b> a todos los temas (incluyendo los invisibles destinados a resolución de problemas)');
DEFINE('_LINK_JS_REMOVED', '<em>El vínculo activo que contenía JavaScript ha sido eliminado automáticamente</em>');
//==========================================
//new in 1.0 RC4
DEFINE('_COM_A_LOOKS', 'Aspecto y usabilidad');
DEFINE('_COM_A_USERS', 'Relacionado con los usuarios');
DEFINE('_COM_A_LENGTHS', 'Opciones de largo variable');
DEFINE('_COM_A_SUBJECTLENGTH', 'Largo máximo del título');
DEFINE('_COM_A_SUBJECTLENGTH_DESC',
    'Longitud de linea máxima para el título. El máximo soportado por la base de datos es de 255 caracteres. Si tu página está configurada para usar caracteres multi-byte como Unicode, UTF-8 o non-ISO-8599-x, hay que usar un máximo menos usando esta formula:<br/><tt>redondeando hacia abajo(255/(bytes máximos por caracter))</tt><br/> Ejemplo para UTF-8, para el que el tamaño máximo por caracter en bytes es 4 bytes: 255/4=63.');
DEFINE('_LATEST_THREADFORUM', 'Tema/Foro');
DEFINE('_LATEST_NUMBER', 'Nuevos mensajes');
DEFINE('_COM_A_SHOWNEW', 'Mostrar nuevos mensajes');
DEFINE('_COM_A_SHOWNEW_DESC', 'Si lo configuras a "SI" Kunena mostrara al usuario un indicador para foros que contiene mensajes nuevos y que mensajes son nuevos desde su última visita.');
DEFINE('_COM_A_NEWCHAR', 'Indicador "NUEVO"');
DEFINE('_COM_A_NEWCHAR_DESC', 'Define aquí lo que debería usarse para indicar los mensajes nuevos (por ejemplo NUEVO!, NEW!, o !)');
DEFINE('_LATEST_AUTHOR', 'Autor del último mensaje');
DEFINE('_GEN_FORUM_NEWPOST', 'Nuevos mensajes');
DEFINE('_GEN_FORUM_NOTNEW', 'No hay mensajes nuevos');
DEFINE('_GEN_UNREAD', 'Tema sin leer');
DEFINE('_GEN_NOUNREAD', 'Tema leído');
DEFINE('_GEN_MARK_ALL_FORUMS_READ', 'Marcar todos los foros como leídos');
DEFINE('_GEN_MARK_THIS_FORUM_READ', 'Marcar este foro como leído');
DEFINE('_GEN_FORUM_MARKED', 'Todos los mensajes en este foro se han marcado como leídos');
DEFINE('_GEN_ALL_MARKED', 'Todos los mensajes se han marcado como leídos');
DEFINE('_IMAGE_UPLOAD', 'Subir imagen');
DEFINE('_IMAGE_DIMENSIONS', 'El archivo de imagen tiene limitaciones de tamaño (ancho x alto - tamaño)');
DEFINE('_IMAGE_ERROR_TYPE', 'Por favor, usa solo imágenes jpeg, gif o png');
DEFINE('_IMAGE_ERROR_EMPTY', 'Por favor, escoge un archivo a cargar');
DEFINE('_IMAGE_ERROR_SIZE', 'El tamaño del archivo excede el máximo definido por los administradores.');
DEFINE('_IMAGE_ERROR_WIDTH', 'El ancho de la imagen excede el máximo definido por los administradores.');
DEFINE('_IMAGE_ERROR_HEIGHT', 'El alto  de la imagen excede el máximo definido por los administradores.');
DEFINE('_IMAGE_UPLOADED', 'Tu imagen se ha cargado con éxito.');
DEFINE('_COM_A_IMAGE', 'Imágenes');
DEFINE('_COM_A_IMGHEIGHT', 'Altura máxima de imagen');
DEFINE('_COM_A_IMGWIDTH', 'Anchura  máxima de imagen');
DEFINE('_COM_A_IMGSIZE', 'Tamaño máximo del archivo de imagen<br/><em>en Kilobytes</em>');
DEFINE('_COM_A_IMAGEUPLOAD', 'Permitir carga pública de imágenes');
DEFINE('_COM_A_IMAGEUPLOAD_DESC', 'Define a "SI" si quieres permitir a todo el mundo (público) cargar imágenes en el servidor.');
DEFINE('_COM_A_IMAGEREGUPLOAD', 'Permitir a los usuarios registrados cargar imágenes');
DEFINE('_COM_A_IMAGEREGUPLOAD_DESC', 'Define a "SI" si quieres permitir a los usuarios registrados y identificados cargar imágenes al servidor.<br/> Nota: Administradores y moderadores siempre podrán hacerlo.');
//New since preRC4-II:
DEFINE('_COM_A_UPLOADS', 'Uploads');
DEFINE('_FILE_TYPES', 'Tu archivo debe ser del tipo - tamaño máximo');
DEFINE('_FILE_ERROR_TYPE', 'Solo se te permite cargar archivos del tipo:');
DEFINE('_FILE_ERROR_EMPTY', 'Por favor, selecciona un archivo antes de cargar');
DEFINE('_FILE_ERROR_SIZE', 'El archivo excede el tamaño máximo definido por los administradores.');
DEFINE('_COM_A_FILE', 'Archivos');
DEFINE('_COM_A_FILEALLOWEDTYPES', 'Tipo de archivo permitido');
DEFINE('_COM_A_FILEALLOWEDTYPES_DESC', 'Especifica aquí de que tipos de archivo se permite la carga. Usa listas separadas por coma, sin espacio y minúsculas.<br />Ejemplo: zip,txt,exe,htm,html');
DEFINE('_COM_A_FILESIZE', 'Tamaño de archivo máximo <br/><em>en Kilobytes</em>');
DEFINE('_COM_A_FILEUPLOAD', 'Permitir la carga de archivos al público');
DEFINE('_COM_A_FILEUPLOAD_DESC', 'Configura a "SI" si quieres que todo el mundo (público) sea capaz de cargar un archivo.');
DEFINE('_COM_A_FILEREGUPLOAD', 'Permitir la carga de archivos a los usuarios registrados');
DEFINE('_COM_A_FILEREGUPLOAD_DESC', 'Configura a "SI" si quieres que los usuarios registrados y identificados puedan cargar archivos al servidor.<br/> Nota: Administradores y moderadores siempre podrán hacerlo.');
DEFINE('_SUBMIT_CANCEL', 'Se ha cancelado la publicación de tu mensaje');
DEFINE('_HELP_SUBMIT', 'Presiona aquí para enviar tu mensaje');
DEFINE('_HELP_PREVIEW', 'Presiona aquí para ver como será tu mensaje una vez enviado');
DEFINE('_HELP_CANCEL', 'Presiona aquí para cancelar tu mensaje');
DEFINE('_POST_DELETE_ATT', 'Si esta opción esta marcada, todas las imágenes y archivos adjuntas a los mensajes que vas a borrar, se borrarán también (recomendado).');
//new since preRC4-III
DEFINE('_COM_A_USER_MARKUP', 'Mostrar la marca "editado"');
DEFINE('_COM_A_USER_MARKUP_DESC', 'Configúralo a "SI" si quieres que aparezca una marca de "editado" cuando haya sido editado.');
DEFINE('_EDIT_BY', 'Mensaje editado por:');
DEFINE('_EDIT_AT', 'en:');
DEFINE('_UPLOAD_ERROR_GENERAL', 'Un error ha ocurrido al cargar tu avatar. Por favor inténtalo de nuevo o notifica el error al administrador del foro');
DEFINE('_COM_A_IMGB_IMG_BROWSE', 'Navegador de imágenes cargadas');
DEFINE('_COM_A_IMGB_FILE_BROWSE', 'Navegador de archivos cargados');
DEFINE('_COM_A_IMGB_TOTAL_IMG', 'Número de imágenes cargadas');
DEFINE('_COM_A_IMGB_TOTAL_FILES', 'Número de archivos cargados');
DEFINE('_COM_A_IMGB_ENLARGE', 'Presiona en la imagen para verla a tamaño completo');
DEFINE('_COM_A_IMGB_DOWNLOAD', 'Presiona en la imagen del archivo para descargarlo');
DEFINE('_COM_A_IMGB_DUMMY_DESC',
    'La opción "imagen de reemplazo" reemplazará la imagen seleccionada con una imagen de reemplazo.<br /> Esto te permitirá eliminar la imagen sin destruir el mensaje.<br /><small><em>Date cuenta que a veces un refresco explicito del navegador es necesario para que se haga el reemplazo.</em></small>');
DEFINE('_COM_A_IMGB_DUMMY', 'Imagen de reemplazo actual');
DEFINE('_COM_A_IMGB_REPLACE', 'Usar reemplazo');
DEFINE('_COM_A_IMGB_REMOVE', 'Eliminar totalmente');
DEFINE('_COM_A_IMGB_NAME', 'Nombre');
DEFINE('_COM_A_IMGB_SIZE', 'Tamaño');
DEFINE('_COM_A_IMGB_DIMS', 'Dimensiones');
DEFINE('_COM_A_IMGB_CONFIRM', 'Estas absolutamente seguro que quieres eliminar este archivo? Eliminar un archivo, dejara el mensaje referente incompleto...');
DEFINE('_COM_A_IMGB_VIEW', 'Abrir mensaje (para editar)');
DEFINE('_COM_A_IMGB_NO_POST', 'No hay mensaje relacionado!');
DEFINE('_USER_CHANGE_VIEW', 'Los cambios en estas opciones se harán efectivos la próxima vez que visites el foro.<br /> Si quieres cambiar la vista, puedes usar las opciones de la barra del menú del foro.');
DEFINE('_MOSBOT_DISCUSS_A', 'Discutir este articulo en el foro. (');
DEFINE('_MOSBOT_DISCUSS_B', ' mensajes)');
DEFINE('_POST_DISCUSS', 'Este tema discute el artículo');
DEFINE('_COM_A_RSS', 'Activar suscripciones RSS');
DEFINE('_COM_A_RSS_DESC', 'Las suscripciones RSS permite a los usuarios descargar los últimos mensajes a su escritorio/lector de RSS (consulta <a href="http://www.rssreader.com" target="_blank">rssreader.com</a> para un ejemplo.');
DEFINE('_LISTCAT_RSS', 'obtén los últimos mensajes directamente en tu escritorio');
DEFINE('_SEARCH_REDIRECT', 'El foro necesita (re)establecer tus privilegios de acceso antes de que pueda procesar tu petición de búsqueda.\nNo te preocupes, esto es muy normal tras más de 30 minutos de inactividad.\n por favor envía tu petición de búsqueda de nuevo.');
//====================
//admin.forum.html.php
DEFINE('_COM_A_CONFIG', 'Configuración de Kunena');
DEFINE('_COM_A_DISPLAY', 'Mostrar #');
DEFINE('_COM_A_CURRENT_SETTINGS', 'Configuración actual');
DEFINE('_COM_A_EXPLANATION', 'Explicación');
DEFINE('_COM_A_BOARD_TITLE', 'Título del foro');
DEFINE('_COM_A_BOARD_TITLE_DESC', 'El nombre de tu foro');
DEFINE('_COM_A_VIEW_TYPE', 'Estilo de visionado por defecto');
DEFINE('_COM_A_VIEW_TYPE_DESC', 'Escoge entre vista hilada o vista plana por defecto');
DEFINE('_COM_A_THREADS', 'Temas por página');
DEFINE('_COM_A_THREADS_DESC', 'Número de temas a mostrar por página');
DEFINE('_COM_A_REGISTERED_ONLY', 'Solo usuarios registrados');
DEFINE('_COM_A_REG_ONLY_DESC', 'Configura a "SI" para permitir que solo se permita a los usuarios registrados el uso del foro (ver y participar), configura a "NO" para permitir a cualquier visitante usar el foro');
DEFINE('_COM_A_PUBWRITE', 'Lectura/escritura pública');
DEFINE('_COM_A_PUBWRITE_DESC', 'Configura a "SI" para dar permisos de escritura pública, configura a "NO" para permitir a cualquier visitante leer los mensajes, pero escribir solo a los registrados');
DEFINE('_COM_A_USER_EDIT', 'Ediciones de usuario');
DEFINE('_COM_A_USER_EDIT_DESC', 'Configura a "SI" para permitir a los usuarios registrados editar sus mensajes.');
DEFINE('_COM_A_MESSAGE', 'Para guardar los cambios de los valores de arriba, presiona el botón "Guardar" arriba del todo.');
DEFINE('_COM_A_HISTORY', 'Mostrar histórico');
DEFINE('_COM_A_HISTORY_DESC', 'Configura a "SI" si quieres que el histórico del tema se muestre al escribir una respuesta/cita');
DEFINE('_COM_A_SUBSCRIPTIONS', 'Permitir suscripciones');
DEFINE('_COM_A_SUBSCRIPTIONS_DESC', 'Configura a "SI" si quieres permitir a los usuarios registrados suscribirse a los temas y recibir notificaciones por email de los nuevos mensajes');
DEFINE('_COM_A_HISTLIM', 'Limite del histórico');
DEFINE('_COM_A_HISTLIM_DESC', 'Número de mensajes a mostrar en el histórico');
DEFINE('_COM_A_FLOOD', 'Protección anti-Flood');
DEFINE('_COM_A_FLOOD_DESC', 'La cantidad de segundos que un usuario debe esperar entre dos mensajes consecutivos. Configura a 0 (cero) para apagar la protección anti-Flood. NOTA: La protección anti-Flood <em>puede</em> causar degradación del rendimiento...');
DEFINE('_COM_A_MODERATION', 'Email a los moderadores');
DEFINE('_COM_A_MODERATION_DESC',
    'Configura a "SI" si quieres enviar notificaciones por email de los nuevos mensajes a los moderadores del foro. NOTA: a pesar de que los administradores tienen automáticamente todos los privilegios de moderador, debes asignarlos explícitamente como moderadores
     para recibir los emails!');
DEFINE('_COM_A_SHOWMAIL', 'Mostrar Email');
DEFINE('_COM_A_SHOWMAIL_DESC', 'Configura a "NO" si no quieres mostrar la dirección de email de los usuarios; ni siquiera a los usuarios registrados.');
DEFINE('_COM_A_AVATAR', 'Permitir avatares');
DEFINE('_COM_A_AVATAR_DESC', 'Configura a "SI" si quieres permitir a los usuarios registrador tener un avatar (configurable desde su perfil)');
DEFINE('_COM_A_AVHEIGHT', 'Altura máxima del avatar');
DEFINE('_COM_A_AVWIDTH', 'Anchura máxima del avatar');
DEFINE('_COM_A_AVSIZE', 'Tamaño de archivo máximo del avatar <br/><em>en Kilobytes</em>');
DEFINE('_COM_A_USERSTATS', 'Mostrar estadísticas de usuario');
DEFINE('_COM_A_USERSTATS_DESC', 'Configura a "SI" para mostrar estadísticas de usuario como número de mensajes hechos por el usuario, etc..');
DEFINE('_COM_A_AVATARUPLOAD', 'Cargar nuevos avatares');
DEFINE('_COM_A_AVATARUPLOAD_DESC', 'Configura a "SI" para permitir a los usuarios registrados cargar sus propios avatares al servidor.');
DEFINE('_COM_A_AVATARGALLERY', 'Usar galería de avatares');
DEFINE('_COM_A_AVATARGALLERY_DESC', 'Configura a "SI" si quieres permitir a los usuarios registrados poder escoger un avatar de la galería que tu suministras (components/com_Kunena/avatars/gallery).');
DEFINE('_COM_A_RANKING_DESC', 'Configura a "SI" si quieres mostrar el rango que tienen los usuarios registrados basado en la cantidad de mensajes que hacen.<br/><strong>Debes activar las estadísticas de usuario en la pestaña avanzada para mostrarlo.</strong>');
DEFINE('_COM_A_RANKINGIMAGES', 'Usar imágenes de Rango');
DEFINE('_COM_A_RANKINGIMAGES_DESC',
    'Configura a "SI" si quieres mostrar el rango que tienen los usuarios registrados usando una imagen (desde components/com_Kunena/ranks). Apagando esto, se mostrará el rango en texto. Consulta la documentación en www.bestofjoomla.com para más información sobre imágenes de rango');

//email and stuff
$_COM_A_NOTIFICATION = "Nueva notificación de mensajes de ";
$_COM_A_NOTIFICATION1 = "Se ha publicado un nuevo mensaje en un tema al que estás suscrito en ";
$_COM_A_NOTIFICATION2 = "Puedes administrar tus suscripciones siguiendo el vínculo en 'mi perfil' desde el foro. Desde tu perfil también puedes de-suscribirte del tema.";
$_COM_A_NOTIFICATION3 = "No respondas a esta notificación por email ya que es un email auto generado.";
$_COM_A_NOT_MOD1 = "Se ha escrito un mensaje en un foro para el que eres moderador en ";
$_COM_A_NOT_MOD2 = "Por favor, revísalo cuando te hayas identificado en la página.";
DEFINE('_COM_A_NO', 'No');
DEFINE('_COM_A_YES', 'Si');
DEFINE('_COM_A_FLAT', 'Plano');
DEFINE('_COM_A_THREADED', 'Hilado');
DEFINE('_COM_A_MESSAGES', 'Mensajes por página');
DEFINE('_COM_A_MESSAGES_DESC', 'Número de mensajes por página a mostrar');
//admin; changes from 0.9 to 0.9.1
DEFINE('_COM_A_USERNAME', 'Nombre de usuario');
DEFINE('_COM_A_USERNAME_DESC', 'Configura a "SI" si quieres que el nombre de usuario (el de identificarse) se use en lugar del nombre real');
DEFINE('_COM_A_CHANGENAME', 'Permitir cambio de nombre');
DEFINE('_COM_A_CHANGENAME_DESC', 'Configura a "SI" si quieres que los usuarios registrados sean capaces de cambiar su nombre al escribir mensajes. Si lo configuras a "NO" los usuarios registrados no podrán editar su nombre');
//admin; changes 0.9.1 to 0.9.2
DEFINE('_COM_A_BOARD_OFFLINE', 'Foro Offline');
DEFINE('_COM_A_BOARD_OFFLINE_DESC', 'Configura a "SI" si quieres dejar al foro offline. El foro seguirá siendo navegable por los administradores.');
DEFINE('_COM_A_BOARD_OFFLINE_MES', 'Mensaje de foro Offline');
DEFINE('_COM_A_PRUNE', 'Limpiar foros');
DEFINE('_COM_A_PRUNE_NAME', 'Foro a limpiar:');
DEFINE('_COM_A_PRUNE_DESC',
    'La función de limpiar foros permite borrar temas en los que no haya habido respuestas en el número de días especificado. Esto no se aplica a los temas con chincheta o cerrados; estos deben ser cerrados manualmente. Los temas en foros cerrados no pueden ser limpiados.');
DEFINE('_COM_A_PRUNE_NOPOSTS', 'Limpiar temas sin mensajes en los últimos ');
DEFINE('_COM_A_PRUNE_DAYS', 'días');
DEFINE('_COM_A_PRUNE_USERS', 'Limpiar usuarios'); // <=FB 1.0.3
DEFINE('_COM_A_PRUNE_USERS_DESC',
    'Esta función te permite limpiar tu lista de usuarios Kunena comparándola con la lista de usuarios joomla!. Borrará todos los perfiles en Kunena que hayan sido borrados en tu instalación de joomla!<br/>Cuando éstes seguro de que quieres continuar, presiona "Empezar limpieza" en la barra de menú encima.'); // <=FB 1.0.3
//general
DEFINE('_GEN_ACTION', 'Acción');
DEFINE('_GEN_AUTHOR', 'Autor');
DEFINE('_GEN_BY', 'por');
DEFINE('_GEN_CANCEL', 'Cancelar');
DEFINE('_GEN_CONTINUE', 'Enviar');
DEFINE('_GEN_DATE', 'Fecha');
DEFINE('_GEN_DELETE', 'Borrar');
DEFINE('_GEN_EDIT', 'Editar');
DEFINE('_GEN_EMAIL', 'Email');
DEFINE('_GEN_EMOTICONS', 'Smileys');
DEFINE('_GEN_FLAT', 'Plano');
DEFINE('_GEN_FLAT_VIEW', 'Vista plana');
DEFINE('_GEN_FORUMLIST', 'Listado del foro');
DEFINE('_GEN_FORUM', 'Foro');
DEFINE('_GEN_HELP', 'Ayuda');
DEFINE('_GEN_HITS', 'Vistas');
DEFINE('_GEN_LAST_POST', 'Último mensaje');
DEFINE('_GEN_LATEST_POSTS', 'Ver últimos mensajes');
DEFINE('_GEN_LOCK', 'Cerrar');
DEFINE('_GEN_UNLOCK', 'Liberar');
DEFINE('_GEN_LOCKED_FORUM', 'El foro está cerrado');
DEFINE('_GEN_LOCKED_TOPIC', 'El tema está cerrado');
DEFINE('_GEN_MESSAGE', 'Mensaje');
DEFINE('_GEN_MODERATED', 'Foro moderado; Los mensajes se revisan antes de ser publicados.');
DEFINE('_GEN_MODERATORS', 'Moderadores');
DEFINE('_GEN_MOVE', 'Mover');
DEFINE('_GEN_NAME', 'Nombre');
DEFINE('_GEN_POST_NEW_TOPIC', 'Publicar nuevo tema');
DEFINE('_GEN_POST_REPLY', 'Publicar respuesta');
DEFINE('_GEN_MYPROFILE', 'Mi perfil');
DEFINE('_GEN_QUOTE', 'Citar');
DEFINE('_GEN_REPLY', 'Respuesta');
DEFINE('_GEN_REPLIES', 'Respuestas');
DEFINE('_GEN_THREADED', 'Hilada');
DEFINE('_GEN_THREADED_VIEW', 'Vista hilada');
DEFINE('_GEN_SIGNATURE', 'Firma');
DEFINE('_GEN_ISSTICKY', 'Tema con chincheta.');
DEFINE('_GEN_STICKY', 'Chinchetar');
DEFINE('_GEN_UNSTICKY', 'Soltar');
DEFINE('_GEN_SUBJECT', 'Título');
DEFINE('_GEN_SUBMIT', 'Enviar');
DEFINE('_GEN_TOPIC', 'Tema');
DEFINE('_GEN_TOPICS', 'Temas');
DEFINE('_GEN_TOPIC_ICON', 'Icono del tema');
DEFINE('_GEN_SEARCH_BOX', 'Buscar en el foro');
$_GEN_THREADED_VIEW = "Hilado";
$_GEN_FLAT_VIEW = "Plano";
//avatar_upload.php
DEFINE('_UPLOAD_UPLOAD', 'Cargar');
DEFINE('_UPLOAD_DIMENSIONS', 'Tu imagen puede tener limitaciones (ancho x alto - tamaño)');
DEFINE('_UPLOAD_SUBMIT', 'Enviar un nuevo avatar para cargar');
DEFINE('_UPLOAD_SELECT_FILE', 'Escoger archivo');
DEFINE('_UPLOAD_ERROR_TYPE', 'Por favor, usa solamente imágenes jpeg, gif o png');
DEFINE('_UPLOAD_ERROR_EMPTY', 'Por favor, escoge un archivo antes de cargar');
DEFINE('_UPLOAD_ERROR_NAME', 'El nombre del archivo de imagen solo debe contener caracteres alfanuméricos y sin espacios.');
DEFINE('_UPLOAD_ERROR_SIZE', 'El tamaño del archivo de imagen excede el máximo definido por los administradores.');
DEFINE('_UPLOAD_ERROR_WIDTH', 'El ancho de la imagen excede el máximo definido por los administradores.');
DEFINE('_UPLOAD_ERROR_HEIGHT', 'La altura de la imagen excede el máximo definido por los administradores.');
DEFINE('_UPLOAD_ERROR_CHOOSE', "No has escogido un avatar de la galería...");
DEFINE('_UPLOAD_UPLOADED', 'Se ha cargado tu avatar.');
DEFINE('_UPLOAD_GALLERY', 'Escoger un avatar de la galería:');
DEFINE('_UPLOAD_CHOOSE', 'Confirmar selección.');
// listcat.php
DEFINE('_LISTCAT_ADMIN', 'Un administrador debe crearlos antes desde ');
DEFINE('_LISTCAT_DO', 'Ellos sabrán que hacer ');
DEFINE('_LISTCAT_INFORM', 'Informales y diles que se den prisa!!');
DEFINE('_LISTCAT_NO_CATS', 'Aún no hay categorías en el foro definidas.');
DEFINE('_LISTCAT_PANEL', 'Panel de Administración del CMS Joomla!.');
DEFINE('_LISTCAT_PENDING', 'mensaje(s) pendiente(s)');
// moderation.php
DEFINE('_MODERATION_MESSAGES', 'No hay mensajes pendientes en este foro.');
// post.php
DEFINE('_POST_ABOUT_TO_DELETE', 'Estás a punto de borrar el mensaje');
DEFINE('_POST_ABOUT_DELETE', '<strong>NOTAS:</strong><br/>
-Si borras un tema (el primer mensaje en un tema) todas las respuestas al tema serán borradas también!
..Considera blanquear el mensaje y el nombre del autor si solo debe eliminarse el contenido...
<br/>
- Todos los hijos de un mensaje normal borrado avanzarán una posición en la jerarquía del tema.');
DEFINE('_POST_CLICK', 'Presiona aquí');
DEFINE('_POST_ERROR', 'No se ha podido encontrar el nombre de usuario/email. Error de base de datos severo no listado');
DEFINE('_POST_ERROR_MESSAGE', 'Un error de SQL desconocido y tu mensaje no se ha publicado. Si el problema persiste, por favor contacta con un administrador.');
DEFINE('_POST_ERROR_MESSAGE_OCCURED', 'Ha ocurrido un error y el mensaje no se ha actualizado. Por favor inténtalo de nuevo. Si este error persiste por favor contacta con el administrador.');
DEFINE('_POST_ERROR_TOPIC', 'Ha ocurrido un error durante el borrado. Por favor, comprueba el error a continuación:');
DEFINE('_POST_FORGOT_NAME', 'Has olvidado incluir tu nombre. Presiona el botón atrás de tu navegador e inténtalo de nuevo.');
DEFINE('_POST_FORGOT_SUBJECT', 'Has olvidado incluir un título- Presiona el botón atrás de tu navegador e inténtalo de nuevo.');
DEFINE('_POST_FORGOT_MESSAGE', 'Has olvidado incluir un mensaje. Presiona el botón atrás de tu navegador e inténtalo de nuevo.');
DEFINE('_POST_INVALID', 'Se ha pedido una id de mensaje invalida.');
DEFINE('_POST_LOCK_SET', 'Se ha cerrado el tema.');
DEFINE('_POST_LOCK_NOT_SET', 'No se ha podido cerrar el tema.');
DEFINE('_POST_LOCK_UNSET', 'Se ha desbloqueado el tema.');
DEFINE('_POST_LOCK_NOT_UNSET', 'No se ha podido desbloquear el tema.');
DEFINE('_POST_MESSAGE', 'Escribir un nuevo mensaje en ');
DEFINE('_POST_MOVE_TOPIC', 'Mover este tema al foro ');
DEFINE('_POST_NEW', 'Escribir un nuevo mensaje en: ');
DEFINE('_POST_NO_SUBSCRIBED_TOPIC', 'Tu suscripción a este tema no se ha podido procesar.');
DEFINE('_POST_NOTIFIED', 'Marca esta opción para ser notificado de las respuestas a este tema.');
DEFINE('_POST_STICKY_SET', 'Se ha puesto una chincheta a este tema.');
DEFINE('_POST_STICKY_NOT_SET', 'No se ha podido poner chincheta en este tema.');
DEFINE('_POST_STICKY_UNSET', 'Se ha quitado la chincheta al tema.');
DEFINE('_POST_STICKY_NOT_UNSET', 'No se ha podido quitar la chincheta al tema.');
DEFINE('_POST_SUBSCRIBE', 'Suscribirse');
DEFINE('_POST_SUBSCRIBED_TOPIC', 'Te has suscrito a este tema.');
DEFINE('_POST_SUCCESS', 'Tu mensaje se ha publicado con éxito.');
DEFINE('_POST_SUCCES_REVIEW', 'Tu mensaje se ha publicado con éxito. Será revisado por un moderador antes de ser publicado en el foro.');
DEFINE('_POST_SUCCESS_REQUEST', 'Se ha procesado tu petición. Si no vuelves automáticamente al tema en unos momentos,');
DEFINE('_POST_TOPIC_HISTORY', 'Histórico de mensajes del tema ');
DEFINE('_POST_TOPIC_HISTORY_MAX', 'Max. mostrando el último');
DEFINE('_POST_TOPIC_HISTORY_LAST', 'mensajes  -  <i>(Primero mensaje más reciente)</i>');
DEFINE('_POST_TOPIC_NOT_MOVED', 'No se ha podido mover tu tema. para volver al tema:');
DEFINE('_POST_TOPIC_FLOOD1', 'El administrador de este foro ha activado la protección anti-Flood y ha decidido que debes esperar ');
DEFINE('_POST_TOPIC_FLOOD2', ' segundos antes de poder escribir otro mensaje.');
DEFINE('_POST_TOPIC_FLOOD3', 'Por favor, presiona el botón "atrás" de tu navegador para volver al foro.');
DEFINE('_POST_EMAIL_NEVER', 'tu email nunca se mostrará en la página.');
DEFINE('_POST_EMAIL_REGISTERED', 'tu dirección de email solo será visible por usuarios registrados.');
DEFINE('_POST_LOCKED', 'Cerrado por el administrador.');
DEFINE('_POST_NO_NEW', 'No se permiten nuevas respuestas.');
DEFINE('_POST_NO_PUBACCESS1', 'El administrador ha deshabilitado los permisos de escritura pública.');
DEFINE('_POST_NO_PUBACCESS2', 'Solo a los usuarios registrados/identificados<br /> se les permite contribuir al foro.');
// showcat.php
DEFINE('_SHOWCAT_NO_TOPICS', '>> Aún no hay temas en el foro <<');
DEFINE('_SHOWCAT_PENDING', 'mensaje(s) pendiente(s)');
// userprofile.php
DEFINE('_USER_DELETE', ' marca esta opción para borrar tu firma');
DEFINE('_USER_ERROR_A', 'Has llegado a esta página por error. Por favor informa al administrador de que vínculos ');
DEFINE('_USER_ERROR_B', 'has seguido para llegar aquí. Ella o el podrán hacer un informe de bug.');
DEFINE('_USER_ERROR_C', 'Gracias!');
DEFINE('_USER_ERROR_D', 'Número de error a incluir en tu informe: ');
DEFINE('_USER_GENERAL', 'Opciones de perfil general');
DEFINE('_USER_MODERATOR', 'Se te ha asignado como moderador a los foros');
DEFINE('_USER_MODERATOR_NONE', 'No tienes foros asignados');
DEFINE('_USER_MODERATOR_ADMIN', 'Admins y moderadores en todos los foros.');
DEFINE('_USER_NOSUBSCRIPTIONS', 'No tienes ninguna suscripción');
DEFINE('_USER_PREFERED', 'Estilo de visionado preferido');
DEFINE('_USER_PROFILE', 'Perfil de ');
DEFINE('_USER_PROFILE_NOT_A', 'Tu perfil podría ');
DEFINE('_USER_PROFILE_NOT_B', 'no');
DEFINE('_USER_PROFILE_NOT_C', ' estar actualizado.');
DEFINE('_USER_PROFILE_UPDATED', 'Tu perfil está actualizado.');
DEFINE('_USER_RETURN_A', 'Si no se te lleva automáticamente a tu perfil en unos momentos ');
DEFINE('_USER_RETURN_B', 'presiona aquí');
DEFINE('_USER_SUBSCRIPTIONS', 'Tus suscripciones');
DEFINE('_USER_UNSUBSCRIBE', 'Quitar suscripción');
DEFINE('_USER_UNSUBSCRIBE_A', 'Podrías ');
DEFINE('_USER_UNSUBSCRIBE_B', 'no');
DEFINE('_USER_UNSUBSCRIBE_C', ' estar suscrito al tema.');
DEFINE('_USER_UNSUBSCRIBE_YES', 'Has eliminado tu suscripción al tema.');
DEFINE('_USER_DELETEAV', ' marca esta opción para borrar tu avatar');
//New 0.9 to 1.0
DEFINE('_USER_ORDER', 'Orden de mensajes preferido');
DEFINE('_USER_ORDER_DESC', 'Último mensaje primero');
DEFINE('_USER_ORDER_ASC', 'Primer mensaje primero');
// view.php
DEFINE('_VIEW_DISABLED', 'El administrador ha deshabilitado la escritura pública.');
DEFINE('_VIEW_POSTED', 'Escrito por');
DEFINE('_VIEW_SUBSCRIBE', ':: Suscribirse a este tema ::');
DEFINE('_MODERATION_INVALID_ID', 'Se ha pedido una id de mensaje invalida.');
DEFINE('_VIEW_NO_POSTS', 'No hay mensajes en este foro.');
DEFINE('_VIEW_VISITOR', 'Visitante');
DEFINE('_VIEW_ADMIN', 'Administrador');
DEFINE('_VIEW_USER', 'Usuario');
DEFINE('_VIEW_MODERATOR', 'Moderador');
DEFINE('_VIEW_REPLY', 'Responder a este mensaje');
DEFINE('_VIEW_EDIT', 'Editar este mensaje');
DEFINE('_VIEW_QUOTE', 'Citar este mensaje en un nuevo mensaje');
DEFINE('_VIEW_DELETE', 'Borrar este mensaje');
DEFINE('_VIEW_STICKY', 'Poner chincheta a este tema');
DEFINE('_VIEW_UNSTICKY', 'Quitar chincheta de este tema');
DEFINE('_VIEW_LOCK', 'Cerrar este tema');
DEFINE('_VIEW_UNLOCK', 'Desbloquear este tema');
DEFINE('_VIEW_MOVE', 'Mover este tema a otro foro');
DEFINE('_VIEW_SUBSCRIBETXT', 'Suscribirse a este tema y recibir notificaciones por email cuando se publiquen respuestas');
//NEW-STRINGS-FOR-TRANSLATING-READY-FOR-SIMPLEBOARD 9.2
DEFINE('_HOME', 'Foro');
DEFINE('_POSTS', 'Mensajes:');
DEFINE('_TOPIC_NOT_ALLOWED', 'Mensaje');
DEFINE('_FORUM_NOT_ALLOWED', 'Foro');
DEFINE('_FORUM_IS_OFFLINE', 'El foro esta Offline!');
DEFINE('_PAGE', 'Página: ');
DEFINE('_NO_POSTS', 'No hay mensajes');
DEFINE('_CHARS', 'Máximo de caracteres.');
DEFINE('_HTML_YES', 'el HTML está desactivado');
DEFINE('_YOUR_AVATAR', '<b>Tu avatar</b>');
DEFINE('_NON_SELECTED', 'Aún no está seleccionado <br />');
DEFINE('_SET_NEW_AVATAR', 'Seleccionar nuevo avatar');
DEFINE('_THREAD_UNSUBSCRIBE', 'Quitar suscripción');
DEFINE('_SHOW_LAST_POSTS', 'Temas activos en las últimas');
DEFINE('_SHOW_HOURS', 'horas');
DEFINE('_SHOW_POSTS', 'Total: ');
DEFINE('_DESCRIPTION_POSTS', 'Se muestran los mensajes más nuevos para los temas activos');
DEFINE('_SHOW_4_HOURS', '4 Horas');
DEFINE('_SHOW_8_HOURS', '8 Horas');
DEFINE('_SHOW_12_HOURS', '12 Horas');
DEFINE('_SHOW_24_HOURS', '24 Horas');
DEFINE('_SHOW_48_HOURS', '48 Horas');
DEFINE('_SHOW_WEEK', 'Semana');
DEFINE('_POSTED_AT', 'Escrito en');
DEFINE('_DATETIME', 'd/m/Y H:i');
DEFINE('_NO_TIMEFRAME_POSTS', 'No hay mensajes nuevos en la franja temporal seleccionada.');
DEFINE('_MESSAGE', 'Mensaje');
DEFINE('_NO_SMILIE', 'no');
DEFINE('_FORUM_UNAUTHORIZIED', 'Este foro está abierto a miembros registrados e identificados.');
DEFINE('_FORUM_UNAUTHORIZIED2', 'Si ya estas registrado, por favor, identifícate.');
DEFINE('_MESSAGE_ADMINISTRATION', 'Moderación');
DEFINE('_MOD_APPROVE', 'Aprobar');
DEFINE('_MOD_DELETE', 'Borrar');
//NEW in RC1
DEFINE('_SHOW_LAST', 'Ver mensajes más reciente');
DEFINE('_POST_WROTE', 'escribió');
DEFINE('_COM_A_EMAIL', 'Dirección email del foro');
DEFINE('_COM_A_EMAIL_DESC', 'Esta es la dirección de email de foro. Usa un email válido');
DEFINE('_COM_A_WRAP', 'Acorta palabras más largas de');
DEFINE('_COM_A_WRAP_DESC',
    'Entra el número máximo de caracteres que puede tener una palabra única. Esta prestación te permite ajustar la salida de los mensajes de Kunena a tu plantilla.<br/> 70 caracteres es probablemente el máximo para las plantillas de ancho fijo pero puede que quieras experimentar un poco..<br/>Las URLs, independientemente del largo, no se ven afectadas por el wordwrap');
DEFINE('_COM_A_SIGNATURE', 'Longitud máxima de las firmas');
DEFINE('_COM_A_SIGNATURE_DESC', 'Máximo número de caracteres permitido en las firmas de los usuarios.');
DEFINE('_SHOWCAT_NOPENDING', 'No hay mensaje(s) pendientes');
DEFINE('_COM_A_BOARD_OFSET', 'Franja horaria del servidor');
DEFINE('_COM_A_BOARD_OFSET_DESC', 'Los foros están ubicados en servidores en zonas horarias diferentes unos de otros. Selecciona la diferencia horaria en horas. Se pueden usar números positivos y negativos');
//New in RC2
DEFINE('_COM_A_BASICS', 'Básico');
DEFINE('_COM_A_FRONTEND', 'Frontal');
DEFINE('_COM_A_SECURITY', 'Seguridad');
DEFINE('_COM_A_AVATARS', 'Avatares');
DEFINE('_COM_A_INTEGRATION', 'Integración');
DEFINE('_COM_A_PMS', 'Activar mensajería instantánea');
DEFINE('_COM_A_PMS_DESC',
    'Selecciona el componente de mensajería instantánea apropiado si tienes alguno. Seleccionando Clexus PM también activará las opciones relacionadas con el perfil Clexus PM (como vínculos ICQ, AIM, Yahoo, MSN y  al perfil si esta soportado por la plantilla de Kunena)');
DEFINE('_VIEW_PMS', 'Presiona aquí para enviar un mensaje privado a este usuario');
//new in RC3
DEFINE('_POST_RE', 'Re:');
DEFINE('_BBCODE_BOLD', 'Negrita: [b]texto[/b] ');
DEFINE('_BBCODE_ITALIC', 'Cursiva: [i]texto[/i]');
DEFINE('_BBCODE_UNDERL', 'Subrayado: [u]texto[/u]');
DEFINE('_BBCODE_QUOTE', 'Citar: [quote]texto[/quote]');
DEFINE('_BBCODE_CODE', 'Mostrar código: [code]código[/code]');
DEFINE('_BBCODE_ULIST', 'Lista desordenada: [ul] [li]texto[/li] [/ul] - Consejo: una lista debe contener cosas listadas');
DEFINE('_BBCODE_OLIST', 'Lista ordenada: [ol] [li]texto[/li] [/ol] - Consejo: una lista debe contener cosas listadas');
DEFINE('_BBCODE_IMAGE', 'Imagen: [img size=(01-499)]http://www.google.com/images/web_logo_left.gif[/img]');
DEFINE('_BBCODE_LINK', 'Vínculo: [url=http://www.vocesdelvicio.com/]Esto es un link a voces del vicio[/url]');
DEFINE('_BBCODE_CLOSA', 'Cerrar todos los tags');
DEFINE('_BBCODE_CLOSE', 'Cerrar todos los tags BBCode abiertos');
DEFINE('_BBCODE_COLOR', 'Color: [color=#FF6600]texto[/color]');
DEFINE('_BBCODE_SIZE', 'Tamaño: [size=1]tamaño del texto[/size] - Consejo: Los tamaños oscilan entre 1 y 5');
DEFINE('_BBCODE_LITEM', 'Objeto listado: [li] Objeto listado [/li]');
DEFINE('_BBCODE_HINT', 'Ayuda BBCode - Consejo: El BBCode se puede usar en texto seleccionado!');
DEFINE('_COM_A_TAWIDTH', 'Ancho del área de texto');
DEFINE('_COM_A_TAWIDTH_DESC', 'Ajusta el ancho del área de texto de los mensajes/respuestas para ajustarlo a tu plantilla. <br/>La barra de smileys de las respuestas se ajusta en dos lineas si la anchura <= que 420 píxeles.');
DEFINE('_COM_A_TAHEIGHT', 'Altura del área de texto');
DEFINE('_COM_A_TAHEIGHT_DESC', 'Ajusta la altura del área de texto de los mensajes/respuestas para ajustarlo a tu plantilla.');
DEFINE('_COM_A_ASK_EMAIL', 'Requerir email');
DEFINE('_COM_A_ASK_EMAIL_DESC', 'Requerir una dirección de email cuando los usuarios o visitantes escriben una respuesta. Configura a "NO" si quieres que esta prestación se pase por alto en el frontal. No se pedirá el email a los autores..');

//Rank Administration - Dan Syme/IGD
define('_KUNENA_RANKS_MANAGE', 'Administración de rangos');
define('_KUNENA_SORTRANKS', 'Ordenar por rango');
define('_KUNENA_RANKSIMAGE', 'Imagen del rango');
define('_KUNENA_RANKS', 'Título del rango');
define('_KUNENA_RANKS_SPECIAL', 'Especial');
define('_KUNENA_RANKSMIN', 'Mínimo de mensajes');
define('_KUNENA_RANKS_ACTION', 'Acciones');
define('_KUNENA_NEW_RANK', 'Nuevo rango');

?>
