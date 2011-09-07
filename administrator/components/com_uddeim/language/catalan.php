<?php
// *******************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         � 2007-2010 Stephan Slabihoud, � 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
// *******************************************************************
// Language file: Traducci� al catal� 
// Translator:     el_libre (catmidia.cat),el_libre@gmail.com i Pablo Querol (aka Seikei), info@joomlacat.org
// *******************************************************************

// New: 2.0
DEFINE ('_UDDEADM_RECAPTCHAPRV_HEAD', 'reCaptcha private key');
DEFINE ('_UDDEADM_RECAPTCHAPRV_EXP', 'When you want to use reCaptcha, enter your private key here.');
DEFINE ('_UDDEADM_RECAPTCHAPUB_HEAD', 'reCaptcha public key');
DEFINE ('_UDDEADM_RECAPTCHAPUB_EXP', 'When you want to use reCaptcha, enter your public key here.');
DEFINE ('_UDDEADM_CAPTCHA_INTERNAL', 'Internal');
DEFINE ('_UDDEADM_CAPTCHA_RECAPTCHA', 'reCaptcha');
DEFINE ('_UDDEADM_CAPTCHATYPE_HEAD', 'Captcha service');
DEFINE ('_UDDEADM_CAPTCHATYPE_EXP', 'Which captcha service do you want to use: The build-in service or reCaptcha (see <a href="http://recaptcha.net" target="_new">reCaptcha</a> for more information)?');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_6', '...set default for captcha service');
DEFINE ('_UDDEADM_AUP', 'AlphaUserPoints');
DEFINE ('_UDDEADM_CHECKFILESFOLDER', 'Please move <i>\uddeimfiles</i> to <i>\images\uddeimfiles</i>. Check the documentation!');
DEFINE ('_UDDEADM_CRYPT4', 'Strong encryption');
DEFINE ('_UDDEADM_ALLOWTOALL2_HEAD', 'Allow sending system messages');
DEFINE ('_UDDEADM_ALLOWTOALL2_EXP', 'uddeIM supports system messages. They are sent to all users on your system. Use them sparingly.');
DEFINE ('_UDDEADM_ALLOWTOALL2_0', 'disabled');
DEFINE ('_UDDEADM_ALLOWTOALL2_1', 'admins only');
DEFINE ('_UDDEADM_ALLOWTOALL2_2', 'admins and managers');

// New: 1.9
DEFINE ('_UDDEIM_FILEUPLOAD_FAILED', 'File uploading failed');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_5', '...set default for file attachments');
DEFINE ('_UDDEADM_ENABLEATTACHMENT_HEAD', 'Enable file attachments');
DEFINE ('_UDDEADM_ENABLEATTACHMENT_EXP', 'This enables sending file attachments for all registered users or admins only.');
DEFINE ('_UDDEADM_MAXSIZEATTACHMENT_HEAD', 'Max. file size');
DEFINE ('_UDDEADM_MAXSIZEATTACHMENT_EXP', 'Maximum file size allowed for file attachments.');
DEFINE ('_UDDEIM_FILESIZE_EXCEEDED', 'Maximum file size exceeded');
DEFINE ('_UDDEADM_BYTES', 'Bytes');
DEFINE ('_UDDEADM_MAXATTACHMENTS_HEAD', 'Max. attachments');
DEFINE ('_UDDEADM_MAXATTACHMENTS_EXP', 'Maximum number of attachments per message.');
DEFINE ('_UDDEIM_DOWNLOAD', 'Download');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_HEAD', 'File deletions invoked');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_YES', 'by admins only');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_NO', 'by any user');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_MANUALLY', 'manually');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_EXP', 'Automatic deletions create heavy server load. If you choose <b>by admins only</b> automatic deletions are invoked when an admin checks his inbox. Choose this option if an admin is checking the inbox regulary. Small or rarely administered sites may choose <b>by any user</b>.');
DEFINE ('_UDDEADM_FILEMAINTENANCE_PRUNE', 'Prune files now');
DEFINE ('_UDDEADM_FILEMAINTENANCEDEL_HEAD', 'Invoke file erasing');
DEFINE ('_UDDEADM_FILEMAINTENANCEDEL_EXP', 'Removes deleted files from the database. This is the same as \'Prune files now\' on the system tab.');
DEFINE ('_UDDEADM_FILEMAINTENANCEDEL_ERASE', 'ERASE');
DEFINE ('_UDDEIM_ATTACHMENTS', 'Attachments (max. %u bytes per file):');
DEFINE ('_UDDEADM_MAINTENANCE_F1', 'Orphaned attachments stored in filesystem: ');
DEFINE ('_UDDEADM_MAINTENANCE_F2', 'Deleting orphaned files');
DEFINE ('_UDDEADM_BACKUP_DONE', 'Backup configuration done.');
DEFINE ('_UDDEADM_RESTORE_DONE', 'Restore configuration done.');
DEFINE ('_UDDEADM_PRUNE_DONE', 'Message pruning done.');
DEFINE ('_UDDEADM_FILEPRUNE_DONE', 'File attachment pruning done.');
DEFINE ('_UDDEADM_FOLDERCREATE_ERROR', 'Error creating folder: ');
DEFINE ('_UDDEADM_ATTINSTALL_WRITEFAILED', 'Error creating file: ');
DEFINE ('_UDDEADM_ATTINSTALL_IGNORE', 'You can ignore this error when you do not own the File attachments premium plugin (see FAQ).');
DEFINE ('_UDDEADM_ATTACHMENTGROUPS_HEAD', 'Allowed groups');
DEFINE ('_UDDEADM_ATTACHMENTGROUPS_EXP', 'Groups which are allowed to send file attachments.');
DEFINE ('_UDDEIM_SELECT', 'Select');
DEFINE ('_UDDEIM_ATTACHMENT', 'Attachment');
DEFINE ('_UDDEADM_SHOWLISTATTACHMENT_HEAD', 'Show attachment icons');
DEFINE ('_UDDEADM_SHOWLISTATTACHMENT_EXP', 'Show attachment icons in the message lists (inbox, outbox, archive).');
DEFINE ('_UDDEIM_HELP_ATTACHMENT', 'The message contains a file attachment.');
DEFINE ('_UDDEADM_MAINTENANCE_COUNTFILES', 'File references in database:');
DEFINE ('_UDDEADM_MAINTENANCE_COUNTFILESDISTINCT', 'File attachments stored:');
DEFINE ('_UDDEADM_SHOWMENUCOUNT_HEAD', 'Show counters');
DEFINE ('_UDDEADM_SHOWMENUCOUNT_EXP', 'When set to <b>yes</b>, the menu bar contains message counters. Note: This will require several additional database queries so do not use on weak systems.');
DEFINE ('_UDDEADM_CONFIG_FTPLAYER', 'Configuration (access with FTP layer):');
DEFINE ('_UDDEADM_ENCODEHEADER_HEAD', 'Encode mail headers');
DEFINE ('_UDDEADM_ENCODEHEADER_EXP', 'Set to <b>yes</b>, when mail headers (like the subject) should be rfc 2047 encoded. Useful when you have problems with special characters.');
DEFINE ('_UDDEIM_UP', 'sort ascending');
DEFINE ('_UDDEIM_DOWN', 'sort descending');
DEFINE ('_UDDEIM_UPDOWN', 'sort');
DEFINE ('_UDDEADM_ENABLESORT_HEAD', 'Enable sorting');
DEFINE ('_UDDEADM_ENABLESORT_EXP', 'Set to <b>yes</b>, when the user should be able to sort the inbox, outbox and archive (creates additional load on the database server).');

// New: 1.8
// %s will be replaced by _UDDEIM_NOMESSAGES_FILTERED_INBOX, _UDDEIM_NOMESSAGES_FILTERED_OUTBOX, _UDDEIM_NOMESSAGES_FILTERED_ARCHIVE
// Translators help: When having problems with the grammar, you can also move some text (e.g. "in your") to _UDDEIM_NOMESSAGES_FILTERED_* variables, e.g.
// instead of "_UDDEIM_NOMESSAGES_FILTERED_INBOX=inbox" you can also use "_UDDEIM_NOMESSAGES_FILTERED_INBOX=in your inbox"
DEFINE ('_UDDEIM_NOMESSAGES2_FR_FILTERED', '<b>You have no messages from this user in your%s.</b>');
DEFINE ('_UDDEIM_NOMESSAGES2_TO_FILTERED', '<b>You have no messages to this user in your%s.</b>');
DEFINE ('_UDDEIM_NOMESSAGES2_UNFR_FILTERED', '<b>You have no unread messages from this user in your%s.</b>');
DEFINE ('_UDDEIM_NOMESSAGES2_UNTO_FILTERED', '<b>You have no unread messages to this user in your%s.</b>');

// New: 1.7
DEFINE ('_UDDEADM_EMAILSTOPPED', '\'Aturar enviament de missatges \'habilitat.');
DEFINE ('_UDDEIM_ACCOUNTLOCKED', 'L�acc�s a la teva b�stia de missatges ha estat tancada. Si us plau contacta amb l�administrador de l�espai web.');
DEFINE ('_UDDEADM_USERSET_LOCKED', 'Tancat');
DEFINE ('_UDDEADM_USERSET_SELLOCKED', '- Tancat -');
DEFINE ('_UDDEADM_CBBANNED_HEAD', 'Comproveu els usuaris prohibits a CB');
DEFINE ('_UDDEADM_CBBANNED_EXP', 'Quan s�activa uddeIM comprova si un usuari ha estat prohibit en el CB i no li permet l�acc�s a uddeIM. A m�s, altres usuaris no poden enviar missatges a un usuari prohibit.');
DEFINE ('_UDDEIM_YOUAREBANNED', 'Has estat prohibit. Si us plau contacta amb l�Administrador o moderador.');
DEFINE ('_UDDEIM_USERBANNED', 'L�usuari ha estat prohibit');
DEFINE ('_UDDEADM_JOOBB', 'Joo!BB');
DEFINE ('_UDDEPLUGIN_SEARCHSECTION', 'Misssatgeria privada');
DEFINE ('_UDDEPLUGIN_MESSAGES', 'Missatges privats');
DEFINE ('_UDDEADM_MAINTENANCEDEL_HEAD', 'Crida als missatges esborrats');
// note "This is the same as _UDDEADM_MAINTENANCE_PRUNE on the system tab."
DEFINE ('_UDDEADM_MAINTENANCEDEL_EXP', 'Elimina els missatges esborrats de la base de dades. Aix� �s el mateix que \'Suprimeix missatges ara\'al sistema de fitxes.');
DEFINE ('_UDDEADM_MAINTENANCEDEL_ERASE', 'ESBORRA');
DEFINE ('_UDDEADM_REPORTSPAM_HEAD', 'Informa sobre missatges enlla�ats');
DEFINE ('_UDDEADM_REPORTSPAM_EXP', 'Quan s�activa mostra un \'Informe de missatge \'enlla�at que permet als usuaris informar sobre spam a l�administrador.');
DEFINE ('_UDDEIM_TOOLBAR_REMOVESPAM', 'Esborra missatge');
DEFINE ('_UDDEIM_TOOLBAR_REMOVEREPORT', 'Elimina informe');
DEFINE ('_UDDEIM_TOOLBAR_SPAMCONTROL', 'Informe de control');
DEFINE ('_UDDEADM_INFORMATION', 'Informaci�');
DEFINE ('_UDDEADM_SPAMCONTROL_STAT', 'Missatges informats');
DEFINE ('_UDDEADM_SPAMCONTROL_TRASHED', 'Esborrats');
DEFINE ('_UDDEADM_SPAMCONTROL_NOTEDEL', 'Vols esborrar aquest missatge de la base de dades?');
DEFINE ('_UDDEADM_SPAMCONTROL_NOTEREMOVE', 'Eliminar aquest informe?');
DEFINE ('_UDDEADM_SPAMCONTROL_SHOWHIDE', 'Mostra/Amaga');
DEFINE ('_UDDEADM_SPAMCONTROL_EDIT', 'Centre de control d\informes');
DEFINE ('_UDDEADM_SPAMCONTROL_FROM', 'Des de');
DEFINE ('_UDDEADM_SPAMCONTROL_TO', 'Fins');
DEFINE ('_UDDEADM_SPAMCONTROL_TEXT', 'Missatge');
DEFINE ('_UDDEADM_SPAMCONTROL_DELETE', 'Esborra');
DEFINE ('_UDDEADM_SPAMCONTROL_REMOVE', 'Elimina');
DEFINE ('_UDDEADM_SPAMCONTROL_DATE', 'Data');
DEFINE ('_UDDEADM_SPAMCONTROL_REPORTED', 'Informat');
DEFINE ('_UDDEIM_SPAMCONTROL_REPORT', 'Missatge informat');
DEFINE ('_UDDEIM_SPAMCONTROL_MARKED', 'El missatge ha estat informat');
DEFINE ('_UDDEIM_SPAMCONTROL_UNREPORT', 'Recordatori d�aquest informe');
DEFINE ('_UDDEADM_JOMSOCIAL', 'JomSocial');
DEFINE ('_UDDEADM_KUNENA', 'Kunena');
DEFINE ('_UDDEADM_ADMIN_FILTER', 'Filtre');
DEFINE ('_UDDEADM_ADMIN_DISPLAY', 'Mostra #');
DEFINE ('_UDDEADM_TRASHORIGINALSENT_HEAD', 'Llen�a a la paperera el missatge un cop enviat');
DEFINE ('_UDDEADM_TRASHORIGINALSENT_EXP', 'Quan s�activa apareixer� una casella situada al costat del bot� \'Enviar\' amb el nom de \'Llen�a a la paperera el missatge un cop enviat\' que no est� activada per defecte. Els usuaris poden marcar la casella si volen enviar a la paperera un missatge immediatament despr�s d�enviar-lo.');
DEFINE ('_UDDEIM_TRASHORIGINALSENT', 'Llen�a el missatge un cop enviat');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_4', '...deixa-ho per defecte per esborrar missatges enviats, informes de spam, o usuaris prohibits a CB');
DEFINE ('_UDDEADM_VERSIONCHECK_IMPORTANT', 'Enlla�os importants:');
DEFINE ('_UDDEADM_VERSIONCHECK_HOTFIX', 'Revisi�');
DEFINE ('_UDDEADM_VERSIONCHECK_NONE', 'Cap');
DEFINE ('_UDDEADM_MAINTENANCEFIX_HEAD', "Manteniment de compatibilitat");
DEFINE ('_UDDEADM_MAINTENANCEFIX_EXP', "uddeIM utilitza dos arxius XML per garantir els paquets que es poden instal�lar en Joomla 1.0 i 1.5. Joomla 1.5 en un arxiu XML no �s necess�ri i aix� fa que el administrador d'extensions per mostrar una advert�ncia d�incompatibilitat (que est� malament). Aix� elimina els arxius innecessaris, per la qual cosa l'advert�ncia no ser� ja mostrada.");
DEFINE ('_UDDEADM_MAINTENANCE_FIX', "FIX");
DEFINE ('_UDDEADM_MAINTENANCE_XML1', "Es paquets XML, instal�ladors de Uddeim per Joomla 1.0 i Joomla 1.5 existeixen.<br />");
DEFINE ('_UDDEADM_MAINTENANCE_XML2', "Aix� �s necessari per poder instal�lar paquets en Joomla 1.0 i Joomla 1.5.<br />");
DEFINE ('_UDDEADM_MAINTENANCE_XML3', "Com que no �s necess�ria despr�s de la instal�laci�, l'instal�lador de Joomla 1.0 pot �sser eliminat en els sistemes de Joomla 1.5.<br />");
DEFINE ('_UDDEADM_MAINTENANCE_XML4', "Aix� es far� per als seg�ents paquets:<br />");
DEFINE ('_UDDEADM_MAINTENANCE_FXML1', "Els XML innecessaris per als instal�ladors d�uddeIM seg�ents seran eliminats:<br />");
DEFINE ('_UDDEADM_MAINTENANCE_FXML2', "No s�n innecessaris els paquets XML instal�ladors per uddeIM trobats!!!<br />");
DEFINE ('_UDDEADM_SHOWMENUICONS1_HEAD', 'Apari�ncia de la barra de men�s');
DEFINE ('_UDDEADM_SHOWMENUICONS1_EXP', 'Aqu� pots configurar si la barra de men� s�ha de mostrar amb icones i/o text.');
DEFINE ('_UDDEIM_MENUICONS_P1', 'Icones i text');
DEFINE ('_UDDEIM_MENUICONS_P2', 'Nom�s icones');
DEFINE ('_UDDEIM_MENUICONS_P0', 'Nom�s text');
DEFINE ('_UDDEIM_LISTSLIMIT_2', 'M�xim nombre de destinataris en una llista:');
DEFINE ('_UDDEADM_ADDEMAIL_ADMIN', 'Els administrador poden escollir');
DEFINE ('_UDDEAIM_ADDEMAIL_SELECT', 'Notificaci� amb el missatge');
DEFINE ('_UDDEAIM_ADDEMAIL_TITLE', 'Inclou el missatge complet al correu electr�nic de notificaci�.');

// New: 1.6
DEFINE ('_UDDEIM_NOLISTSELECTED', 'No hi ha llista d`usuaris/es seleccionada');
DEFINE ('_UDDEADM_NOPREMIUM', 'No s`ha instal�lat el connector Premium');
DEFINE ('_UDDEIM_LISTGLOBAL_CREATOR', 'Creador/a:');
DEFINE ('_UDDEIM_LISTGLOBAL_ENTRIES', 'Entrades');
DEFINE ('_UDDEIM_LISTGLOBAL_TYPE', 'Tipus');
DEFINE ('_UDDEIM_LISTGLOBAL_NORMAL', 'Normal');
DEFINE ('_UDDEIM_LISTGLOBAL_GLOBAL', 'Global');
DEFINE ('_UDDEIM_LISTGLOBAL_RESTRICTED', 'Restringit');
DEFINE ('_UDDEIM_LISTGLOBAL_P0', 'Llista de contactes Normal');
DEFINE ('_UDDEIM_LISTGLOBAL_P1', 'Llista de contactes Global');
DEFINE ('_UDDEIM_LISTGLOBAL_P2', 'Llista de contactes restringida (nom�s els/les membres de la llista hi poden accedir)');
DEFINE ('_UDDEIM_TOOLBAR_USERSETTINGS', 'Configuraci� d`usuari/a');
DEFINE ('_UDDEIM_TOOLBAR_REMOVESETTINGS', 'Esborra configuraci�');
DEFINE ('_UDDEIM_TOOLBAR_CREATESETTINGS', 'Crea configuraci�');
DEFINE ('_UDDEIM_TOOLBAR_SAVE', 'Salva');
DEFINE ('_UDDEIM_TOOLBAR_BACK', 'Torna');
DEFINE ('_UDDEIM_TOOLBAR_TRASHMSGS', 'Missatges de la Paperera');
DEFINE ('_UDDEIM_CBPLUG_CONT', '[continua]');
DEFINE ('_UDDEIM_CBPLUG_UNBLOCKNOW', '[desbloqueja]');
DEFINE ('_UDDEIM_CBPLUG_DOBLOCK', 'Bloquja usuari/a');
DEFINE ('_UDDEIM_CBPLUG_DOUNBLOCK', 'Desbloqueja usuari/a');
DEFINE ('_UDDEIM_CBPLUG_BLOCKINGCFG', 'Bloqujant');
DEFINE ('_UDDEIM_CBPLUG_BLOCKED', 'Has bloquejat aquest usuari/a.');
DEFINE ('_UDDEIM_CBPLUG_UNBLOCKED', 'Aquest usuari/a pot contactar amb tu.');
DEFINE ('_UDDEIM_CBPLUG_NOWBLOCKED', 'Aquest usuari/a ha estat bloquejat ara.');
DEFINE ('_UDDEIM_CBPLUG_NOWUNBLOCKED', 'L`usuari/a ja no est� bloquejat.');
DEFINE ('_UDDEADM_PARTIALIMPORTDONE', 'La importaci� de missatges privats antics ha estat acabada.No importis aquesta part perqu� fent-ho repetir�s els missatges.');
DEFINE ('_UDDEADM_IMPORT_HELP', 'Nota: Els missatges poden ser importats de cop o per parts.Importar en part �s requerit en cas que hi hagi tants missatges que la importaci� autom�tica no funcioni.');
DEFINE ('_UDDEADM_IMPORT_PARTIAL', 'Importaci� parcial:');
DEFINE ('_UDDEADM_UPDATEYOURDB', 'Important: No has actualitzat la teva base de dades.Rellegeix l`arxiu readme, per saber com actualitzar-la correctament.');
DEFINE ('_UDDEADM_RESTRALLUSERS_HEAD', 'Restringeix l`acc�s a "Tots els usuaris"');
DEFINE ('_UDDEADM_RESTRALLUSERS_EXP', 'Pots restringir l`acc�s a la llista de " Tots els usuaris/es". Normalment la llista de "Tots els usuaris/es" permet accedir a tothom (<i>sense restriccions</i>).');
DEFINE ('_UDDEADM_RESTRALLUSERS_0', 'sense restriccions');
DEFINE ('_UDDEADM_RESTRALLUSERS_1', 'usuaris/es especials');
DEFINE ('_UDDEADM_RESTRALLUSERS_2', 'administrdors/es nom�s');
DEFINE ('_UDDEIM_MESSAGE_UNARCHIVED', 'Missatge no arxivat.');
DEFINE ('_UDDEADM_AUTOFORWARD_SPECIAL', 'usuaris/es especials');
DEFINE ('_UDDEIM_HELP', 'Ajuda');
DEFINE ('_UDDEIM_HELP_HEADLINE1', 'Ajuda de uddeIM');
DEFINE ('_UDDEIM_HELP_HEADLINE2', 'Breu revisi� de totes les opcions');
DEFINE ('_UDDEIM_HELP_INBOX', 'La <b> Safata d`Entrada </b> t� tots els missatges que arriben, cada mail que reps es diposita all�.');
DEFINE ('_UDDEIM_HELP_OUTBOX', 'La <b> Safata de Sortida </b> guarda una c�pia de cada missatge que envies, pots tornar-hi en qualsevol moment i veure qu� has enviat.');
DEFINE ('_UDDEIM_HELP_TRASHCAN', 'La <b> Paperera </b> ret� tots els missatges esborrats. Els Missatges no s`esborren immediatament, es guarden per un per�ode de temps. Mentre el missatge estigui a la paperera, el podr�s recuperar.' );
DEFINE ('_UDDEIM_HELP_ARCHIVE', 'L`<b>Arxiu </b> t� tots els missatges arxivats de la safata d`entrada. Nom�s pots arxivar missatges de la vostra safata d`entrada. Quan necessites arxivar un missatge teu, assegura`t que has seleccionat <i> Copia </i> quan ho fas. ');
DEFINE ('_UDDEIM_HELP_USERLISTS', '<b> Contactes </b> permet gestionar llistes de contactes (tamb� conegudes com les llistes de correu). Aquestes llistes permeten enviar missatges a m�ltiples destinataris. En lloc d`afegir m�ltiples destinataris, simplement pots ingressar <i> # nombre_de_la_lista </i>.');
DEFINE ('_UDDEIM_HELP_SETTINGS', '<b> Configuraci� </b> compr�n totes les opcions configurables per l`usuari/a');
DEFINE ('_UDDEIM_HELP_COMPOSE', '<b> Nou missatge </b> permet crear un nou missatge privat.');
DEFINE ('_UDDEIM_HELP_IREAD', 'El missatge va ser llegit (pots canviar aquest estat ).');
DEFINE ('_UDDEIM_HELP_IUNREAD', 'El missatge est� encara sense llegir (pots canviar aquest estat ).');
DEFINE ('_UDDEIM_HELP_OREAD', 'El missatge va ser llegit.');
DEFINE ('_UDDEIM_HELP_OUNREAD', 'El missatge est� encara sense llegir. Els missatges no llegits poden ser recuperats.');
DEFINE ('_UDDEIM_HELP_TREAD', 'El missatge va ser llegit.');
DEFINE ('_UDDEIM_HELP_TUNREAD', 'El missatge est� encara sense llegir.');
DEFINE ('_UDDEIM_HELP_FLAGGED', 'El missatge va ser destacat, o sigui, per a missatges importants (pots canviar aquest estat ).');
DEFINE ('_UDDEIM_HELP_UNFLAGGED', 'Missatge <i> Normal </i> (pots canviar aquest estat ).');
DEFINE ('_UDDEIM_HELP_ONLINE', 'L`usuari/a est� actualment connectat.');
DEFINE ('_UDDEIM_HELP_OFFLINE', 'L`usuari/a est� actualment desconnectat.');
DEFINE ('_UDDEIM_HELP_DELETE', 'Esborra un missatge (moure el missatge a la paperera ).');
DEFINE ('_UDDEIM_HELP_FORWARD', 'Reenvia un missatge a un altre destinatari/a.');
DEFINE ('_UDDEIM_HELP_ARCHIVEMSG', 'Arxiva un missatge. Els missatges arxivats no seran esborrats autom�ticament quan l`administrador/a hagi configurat un temps l�mit per als missatges a la safata d`entrada.');
DEFINE ('_UDDEIM_HELP_UNARCHIVEMSG', 'Desarxivar un missatge. El missatge ser� mogut novament a la safata d`entrada.');
DEFINE ('_UDDEIM_HELP_RECALL', 'Restauraci� d`un missatge. Els missatges enviats poden ser recuperats quan no han estat llegits encara pel destinatari/a.');
DEFINE ('_UDDEIM_HELP_RECYCLE', 'Recicla un missatge (moure el missatge de la paperera de nou a la safata d`entrada o de sortida ).');
DEFINE ('_UDDEIM_HELP_NOTIFY', 'Configuraci� de notificaci� per e-mail quan t`arriba un nou missatge');
DEFINE ('_UDDEIM_HELP_AUTORESPONDER', 'Quan la resposta autom�tica est� habilitada, cada missatge rebut �s respost autom�ticament.');
DEFINE ('_UDDEIM_HELP_AUTOFORWARD', 'Els nous missatges poden enviar-se a un altre usuari/a autom�ticament.');
DEFINE ('_UDDEIM_HELP_BLOCKING', 'Pots bloquejar usuaris/es. Aquests usuaris/es no poden enviar missatges privats.');
DEFINE ('_UDDEIM_HELP_MISC', 'Aqu� trobar�s algunes opcions addicionals de configuraci�');
DEFINE ('_UDDEIM_HELP_FEED', 'Pots accedir a la teva safata d`entrada usant un feed RSS.');
DEFINE ('_UDDEADM_SEPARATOR_HEAD', 'Separador');
DEFINE ('_UDDEADM_SEPARATOR_EXP', 'El separador utilitzat per a m�ltiples destinataris (per defecte �s ",").');
DEFINE ('_UDDEADM_SEPARATOR_P0', 'coma (per defecte)');
DEFINE ('_UDDEADM_SEPARATOR_P1', 'punt i coma');
DEFINE ('_UDDEADM_RSSLIMIT_HEAD', '�tems RSS');
DEFINE ('_UDDEADM_RSSLIMIT_EXP', 'mantenir el nombre d`�tems RSS (0: sense l�mit ).');
DEFINE ('_UDDEADM_SHOWHELP_HEAD', 'Mostra bot� d`ajuda');
DEFINE ('_UDDEADM_SHOWHELP_EXP', 'Quan est� habilitada mostra un bot� d`ajuda.');
DEFINE ('_UDDEADM_SHOWIGOOGLE_HEAD', 'Mostra el bot� d`iGoogle');
DEFINE ('_UDDEADM_SHOWIGOOGLE_EXP', 'Quan est� habilitada el bot� <i> Afegir a iGoogle </i> del gadget d`uddeIM per iGoogle gadget apareix entre les prefer�ncies de l`usuari/a');
DEFINE ('_UDDEADM_MOOTOOLS_NONE11', 'no carregar mootools (s`usa 1.1)');
DEFINE ('_UDDEADM_MOOTOOLS_NONE12', 'no carregar mootools (s`usa 1.2)');
DEFINE ('_UDDEIM_RSS_INTRO1', 'Pots accedir a la teva safata d`entrada usant un feed RSS (0.91 ).');
DEFINE ('_UDDEIM_RSS_INTRO1B', 'L`Adre�a URL d`acc�s �s:');
DEFINE ('_UDDEIM_RSS_INTRO2', 'No donis aquesta adre�a URL a altres usuaris perqu� permet que accedeixin a la teva safata d`entrada.');
DEFINE ('_UDDEIM_RSS_FEED', 'Feed RSS del Missatge');
DEFINE ('_UDDEIM_RSS_NOOBJECT', 'Error del tipus \' No object \'...');
DEFINE ('_UDDEIM_RSS_USERBLOCKED', 'usuari/a bloquejat ...');
DEFINE ('_UDDEIM_RSS_NOTALLOWED', 'Acc�s no perm�s ...');
DEFINE ('_UDDEIM_RSS_WRONGPASSWORD', 'usuari/a o contrasenya erronis ...');
DEFINE ('_UDDEIM_RSS_NOMESSAGES', 'Sense Missatges');
DEFINE ('_UDDEIM_RSS_NONEWMESSAGES', 'Sense missatges nous');
DEFINE ('_UDDEADM_ENABLERSS_HEAD', 'Habilita RSS');
DEFINE ('_UDDEADM_ENABLERSS_EXP', 'Quan aquesta opci� est� habilitada, els missatges es poden rebre a trav�s d`una sindicaci� RSS. Els usuaris/es trobaran l`adre�a URL requerida en els seus perfils.');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_3', '... per defecte de RSS, iGoogle, ajuda, separador');
DEFINE ('_UDDEADM_DELETEM_DELETING', 'Esborrant missatges:');
DEFINE ('_UDDEADM_DELETEM_FROMUSER', 'Esborrant missatges de l`usuari');
DEFINE ('_UDDEADM_DELETEM_MSGSSENT', '- missatges enviats:');
DEFINE ('_UDDEADM_DELETEM_MSGSRECV', '- missatges rebuts:');
DEFINE ('_UDDEIM_PMNAV_THISISARESPONSE', 'Aquesta �s una resposta a:');
DEFINE ('_UDDEIM_PMNAV_THEREARERESPONSES', 'Respostes a aix�:');
DEFINE ('_UDDEIM_PMNAV_DELETED', 'Missatge no disponible');
DEFINE ('_UDDEIM_PMNAV_EXISTS', 'anar al missatge');
DEFINE ('_UDDEIM_PMNAV_COPY2ME', '(Copiar)');
DEFINE ('_UDDEADM_PMNAV_HEAD', 'Permetre navegaci�');
DEFINE ('_UDDEADM_PMNAV_EXP', 'Mostra una barra de navegaci� que permet navegar a trav�s de les converses.');
DEFINE ('_UDDEADM_MAINTENANCE_ALLDAYS', 'Missatges:');
DEFINE ('_UDDEADM_MAINTENANCE_7DAYS', 'Missatges 7 dies:');
DEFINE ('_UDDEADM_MAINTENANCE_30DAYS', 'Missatges en 30 dies:');
DEFINE ('_UDDEADM_MAINTENANCE_365DAYS', 'Missatges 365 dies:');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD1', 'Enviant recordatoris (missatges no oberts abans de: %s dies):');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD2', 'En %s dies enviant recordatoris:');
DEFINE ('_UDDEADM_MAINTENANCE_NO', 'No:');
DEFINE ('_UDDEADM_MAINTENANCE_USERID', 'ID d`usuari/a:');
DEFINE ('_UDDEADM_MAINTENANCE_TONAME', 'Nom:');
DEFINE ('_UDDEADM_MAINTENANCE_MID', 'ID Missatge:');
DEFINE ('_UDDEADM_MAINTENANCE_WRITTEN', 'Escrit:');
DEFINE ('_UDDEADM_MAINTENANCE_TIMER', 'Cron�metre:');

// New: 1.5
DEFINE ('_UDDEMODULE_ALLDAYS', 'missatges');
DEFINE ('_UDDEMODULE_7DAYS', 'missatges en els darrers 7 dies');
DEFINE ('_UDDEMODULE_30DAYS', 'missatges en els �ltims 30 dies');
DEFINE ('_UDDEMODULE_365DAYS', 'missatges en els darrers 365 dies');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_WARNING', '<br/> <b> Nota: <br/> Quan s`usa mosMail, s`ha de configurar una adre�a electr�nica v�lida!! </B>');
DEFINE ('_UDDEIM_FILTEREDMESSAGE', 'missatge filtrat');
DEFINE ('_UDDEIM_FILTEREDMESSAGES', 'missatges filtrats');
DEFINE ('_UDDEIM_FILTER', 'Filtre:');
DEFINE ('_UDDEIM_FILTER_TITLE_INBOX', 'Mostra d`aquesta persona solament');
DEFINE ('_UDDEIM_FILTER_TITLE_OUTBOX', 'Mostra per aquesta persona solament');
DEFINE ('_UDDEIM_FILTER_UNREAD_ONLY', 'nom�s els missatges no llegits');
DEFINE ('_UDDEIM_FILTER_SUBMIT', 'Filtra');
DEFINE ('_UDDEIM_FILTER_ALL', '- tots -');
DEFINE ('_UDDEIM_FILTER_PUBLIC', '- usuaris/es p�blics -');
DEFINE ('_UDDEADM_FILTER_HEAD', 'Habilita Filtre');
DEFINE ('_UDDEADM_FILTER_EXP', 'els usuaris habilitats poden filtrar la seva safata per mostrar nom�s un destinatari/a o receptor.');
DEFINE ('_UDDEADM_FILTER_P0', 'deshabilitat');
DEFINE ('_UDDEADM_FILTER_P1', 'a dalt de la llista de missatges');
DEFINE ('_UDDEADM_FILTER_P2', 'avall de la llista de missatges');
DEFINE ('_UDDEADM_FILTER_P3', 'amunt i avall de la llista de missatges');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED', '<b> No tens missatges %s%s. </b>'); // see next also six lines
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_UNREAD', 'sense llegir');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_FROM', 'd`aquesta persona');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_TO', ' d`aquesta persona');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_INBOX', 'en la safata d`entrada');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_OUTBOX', 'en la safata de sortida');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_ARCHIVE', 'arxiu');
DEFINE ('_UDDEIM_TODP_TITLE', 'Destinatari');
DEFINE ('_UDDEIM_TODP_TITLE_CC', 'Un o m�s destinataris/es (separats per comes)');
DEFINE ('_UDDEIM_ADDCCINFO_TITLE', 'Quan es marca, s`agrega una l�nia al missatge amb tots els destinataris.');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_2', '... opcions per defecte de resposta autom�tica, auto-enviament, quadre d`entrada, filtre');
DEFINE ('_UDDEADM_AUTORESPONDER_HEAD', 'Habilita resposta autom�tica');
DEFINE ('_UDDEADM_AUTORESPONDER_EXP', 'Quan la resposta autom�tica est� habilitada, a l`usuari/a li apareix l`opci� d`habilitar un missatge de resposta autom�tica a les seves opcions personals.');
DEFINE ('_UDDEIM_EMN_AUTORESPONDER', 'Habilita resposta autom�tica');
DEFINE ('_UDDEIM_AUTORESPONDER', 'Resposta autom�tica');
DEFINE ('_UDDEIM_AUTORESPONDER_EXP', 'Quan la resposta autom�tica est� habilitada cada missatge rebut es respon autom�ticament.');
DEFINE ('_UDDEIM_AUTORESPONDER_DEFAULT', "Les meves disculpes, per� ara no estic disponible. Llegir� els missatges tan aviat com pugui.");
DEFINE ('_UDDEADM_USERSET_AUTOR', 'Autor/a');
DEFINE ('_UDDEADM_USERSET_SELAUTOR', '- Autor/a -');
DEFINE ('_UDDEIM_USERBLOCKED', 'Usuari/a bloquejat.');
DEFINE ('_UDDEADM_AUTOFORWARD_HEAD', 'Habilita l`auto-enviament');
DEFINE ('_UDDEADM_AUTOFORWARD_EXP', 'Quan l`auto-enviament est� habilitat, l`usuari/a pot enviar els nous missatges a un altre usuari/a autom�ticament.');
DEFINE ('_UDDEIM_EMN_AUTOFORWARD', 'Habilita auto-enviament');
DEFINE ('_UDDEADM_USERSET_AUTOF', 'AutoF');
DEFINE ('_UDDEADM_USERSET_SELAUTOF', '- AutoF -');
DEFINE ('_UDDEIM_AUTOFORWARD', 'Auto-enviament');
DEFINE ('_UDDEIM_AUTOFORWARD_EXP', 'Els nous missatges poden enviar-se a un altre usuari/a autom�ticament.');
DEFINE ('_UDDEIM_THISISAFORWARD', 'Autoenviar un missatge originalment enviat a');
DEFINE ('_UDDEADM_COLSROWS_HEAD', 'Quadre de Missatge (cols / files)');
DEFINE ('_UDDEADM_COLSROWS_EXP', 'Aix� especifica les columnes i files del quadre on s`escriuen els missatges (normalment �s 60/10 ).');
DEFINE ('_UDDEADM_WIDTH_HEAD', 'Quadre de missatge (ample)');
DEFINE ('_UDDEADM_WIDTH_EXP', 'Aix� especifica l`amplada del quadre de missatges en p�xels (per defecte �s 0). Si �s 0, l`amplada es pren del full d`estils (CSS ).');
DEFINE ('_UDDEADM_CBE', 'CB Impulsat');


// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'IMPORTA');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'Carrega MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'Aix� especifica com uddeIM carrega MooTools (MooTools �s requerit per l`Autocompletador): <i>No</i> �s �til quan la teva plantilla fa servir MooTools, <i>Auto</i> �s el recomanable (igual que a uddeIM 1.2), quan es fa servir J1.0 tamb� pots for�ar la c�rrega de MooTools 1.1 or 1.2.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'no carreguis MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'auto');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'for�ant la c�rrega de 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'for�ant la c�rrega de MooTools 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...carregant per defecte MooTools');
DEFINE ('_UDDEADM_AGORA', '�gora');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'codificat en Base64');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Ajusta zona temporal');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'Quan uddeIM mostra l`hora de forma incorrecta pots ajustar la zona hor�ria aqu�. Normalment, quan tot �s configurat correctament, aquest valor hauria de ser zero. No obstant aix� hi podria haver casos en que necessitesis canviar aquest valor.');
DEFINE ('_UDDEADM_HOURS', 'hores');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Informaci� de la Versi�:');
DEFINE ('_UDDEADM_STATISTICS', 'Estad�stiques:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Veure Estad�stiques');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Aix� mostra algunes estad�stiques com el nombre de missatges enregistrats, etc.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'VEURE ESTAD�STIQUES');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Missatges enregistrats a la base de dades: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Missatges llen�ats pel destinatari: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Missatges llen�ats per emissor: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Missatges destinats a la purga: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Sobreescriure ID de l`�tem');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'Normalment uddeIM prova detectar corregir l`ID de l`�tem quan no en t�. En alguns cassos ser� necessari sobreescriure aquest valor, ex. quan tens molts enlla�os de men� cap a uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'ID de l`�tem Detectada : ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Usa ID de l`�tem');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Usa aquesta ID de l`�tem en comptes de la que es trobi.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Usa enlla�os de perfil');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Si actives <i>s�</i> tots els noms d`usuari/a seran enlla�os cap al seu perfil.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Mostra miniatures');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'Si actives <i>s�</i> la miniatura del perfil es mostrar� en llegir un missatge.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Mostra miniatures a les llistes');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Si actives <i>s�</i> es mostraran les miniatures en llistes (safata d`entrada, etc.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Desactivat');
DEFINE ('_UDDEADM_ENABLED', 'Activat');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Important');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Permetre l`etiquetatge dels missatges');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Permet l`etiquetatge de missatges (es mostra una estrella a les llistes que poden ser subratllades per marcar missatges importants).');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Important: Quan actualitzis uddeIM , si us plau llegeix l`arxiu README. �s probable que hagis d`afegir o alterar alguna taula o camp.');
DEFINE ('_UDDEIM_ADDCCINFO', 'Afegeix la l�nia CC:');
DEFINE ('_UDDEIM_CC', 'CC:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Trunca el text entre cometes (citat)');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Trunca el text a 2/3 del m�xim de la llargada del text si es sobrepassa del l�mit.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Entrades a la Safata ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Darrera(es) ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' entrades');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Estat');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Ho envia');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Missatge');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Buida la safata d`entrada');

// New: 1.1 fins aqu� la traducci� de joomlacat.org - - corregida i adaptada a les noves versions per el_libre  - - www.catmidia.cat
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'No es permet l`acc�s a la paperera.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Restringeix l`acc�s a la paperera');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'Pots restringir l`acc�s a la paperera. Normalment �s accessible per a tothom (<i>sense restriccions</i>). Pots restringir-ne l`acc�s a usuaris/es especials o nom�s administradors, aix� grups amb menys privilegis d`acc�s no podran reciclar un missatge.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'sense restriccions');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'usuaris/es especials');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'nom�s administradors/es');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Amaga usuaris/es de la llista d`usuaris/es p�blica');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Introdueix els IDs dels usuaris/es que haurien d`ocultar-se de la llista p�blica d`usuaris/es (e.g. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Amaga usuaris/es de la llista d`usuaris');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Introdueix els IDs dels usuaris/es que haurien d`ocultar-se de la llista d`usuaris/es (e.g. 65,66,67).');
DEFINE ('_UDDEIM_ERRORCSRF', 'Atac CSRF reconegut');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'Protecci� CSRF');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'Aix� protegeix de tots els formularis contra atacs Cross-Site Request Forgery. Normalment aix� hauria d`estar habilitat. Desactiveu-ho nom�s quan tingueu problemes estranys.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'No podeu contestar missatges arxivats.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Les r�pliques a usuaris/es no registrats no es poden tornar a cridar.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Permet r�pliques');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Permet respostes directes a missatges d`usuaris/es p�blics.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE', "Hola %user%,\n\n%you% us ha enviat el seg�ent missatge privat a %site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Mostra noms reals');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Tria si es mostren noms reals o noms d`usuaris/es a la portada');
DEFINE ('_UDDEIM_USERLIST', 'Llista d`usuaris');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Haureu d`esperar-vos abans d`enviar un altre missatge');
DEFINE ('_UDDEADM_USERSET_LASTSENT', '�ltim enviat');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Retard');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Temps en segons que un usuari/a ha d`esperar abans d`enviar un altre missatge (0 per a cap retard).');
DEFINE ('_UDDEADM_SECONDS', 'segons');
DEFINE ('_UDDEIM_PUBLICSENT', 'Missatge enviat.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Error en el nom del remitent');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Error en l`adre�a de correu electr�nic');
DEFINE ('_UDDEIM_YOURNAME', 'El vostre nom:');
DEFINE ('_UDDEIM_YOUREMAIL', 'El vostre correu:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Esteu utilitzant uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'Ja teniu la �ltima versi� de uddeIM.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'La versi� actual �s ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Informaci� de l`actualitzaci�:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Comprova les actualitzacions');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'Contacta la p�gina del desenvolupador del uddeIM per a rebre informaci� sobre l`�ltima versi� del uddeIM. No s`envia informaci� personal, nom�s el n�mero de versi� del uddeIM que esteu utilitzant.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'COMPROVA ARA');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'No s`ha pogut rebre informaci� de la versi�.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'No s`ha trobat la llista de contactes!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'S`ha excedit el nombre m�xim de contactes (max. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Nombre m�xim d`entrades');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Nombre m�xim d`entrades permeses per llista de contactes');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Les llistes de contactes no estan habilitades');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Habilita les llistes de contactes');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'L`uddeIM permet als usuaris/es crear llistes de contactes. Aquestes llistes poden ser utilitzades per a enviar missatges a m�ltiples usuaris. No us oblideu d`habilitar els m�ltiples destinataris per a utilitzar aquesta funci�.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'inhabilitades');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'usuaris/es registrats');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'usuaris/es especials');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'nom�s administradors');
DEFINE ('_UDDEIM_LISTSNEW', 'Crea una nova llista de contactes');
DEFINE ('_UDDEIM_LISTSSAVED', 'Llista desada');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Llista actualitzada');
DEFINE ('_UDDEIM_LISTSDESC', 'Descripci�');
DEFINE ('_UDDEIM_LISTSNAME', 'Nom (sense espais)');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Nom (sense espais)');
DEFINE ('_UDDEIM_EDITLINK', 'edita');
DEFINE ('_UDDEIM_LISTS', 'Contactes');
DEFINE ('_UDDEIM_STATUS_READ', 'llegits');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'no llegits');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'en l�nia');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'fora de l�nia');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'Mostra imatges del CB');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'Per defecte l`uddeIM nom�s mostra els avatars que els usuaris/es han pujat. Habilitant aix�, l`uddeIM tamb� mostrar� les imatges de la galeria del Community Builder.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'Desbloqueja connexions del CB');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'Pots enviar missatges a destinataris quan un usuari/a registrat �s a la llista de destinataris de les connexions del CB (encara que el destinatari estigui en un grup bloquejat). Aquesta opci� �s independent del bloqueig individual d`usuaris/es (vegeu les opcions de sota).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'No podeu enviar missatges a aquest grup.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'El destinatari us est� blocant.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Grups bloquejats (usuaris/es registrats)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Grups als quals els usuaris/es registrats no poden enviar missatges. Nom�s per a usuaris/es registrats; no afecta a usuaris/es especials ni administradors. Aquesta opci� �s independent del bloqueig individual que cada usuari/a pot configurar (vegeu les opcions de sobre).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Grups bloquejats (usuaris/es p�blics)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Grups als quals els usuaris/es p�blics no poden enviar missatges. Aquesta opci� �s independent del bloqueig individual que cada usuari/a pot configurar (vegeu les opcions de sobre). Quan bloquegeu un grup, els usuaris/es d`aquest grup no poden veure la opci� d`habilitar la portada p�blica en la seva configuraci�.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Usuari/a p�blic');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'Connexi� del CB');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Usuari/a registrat');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Autor/a');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Editor/a');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Publicador/a');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Gestor/a');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Administrador');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'SuperAdministrador');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'L`usuari/a nom�s accepta missatges d`usuaris/es registrats.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Amaga de la llista p�blica "tots els usuaris"');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'Pots amagar alguns grups de la llista p�blica "tots els usuaris". Av�s: nom�s amaga els noms, els usuaris/es encara poden rebre missatges. Els usuaris/es que no habilitin la portada p�blica mai seran llistats aqu�.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Amaga de la llista "tots els usuaris"');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'Pots amagar alguns grups de la llista "tots els usuaris". Av�s: nom�s amaga els noms, els usuaris/es encara poden rebre missatges.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'cap');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'nom�s superadministradors');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'nom�s administradors');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'usuaris/es especials');
DEFINE ('_UDDEADM_PUBLIC', 'P�blic');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Comportament de l`enlla� "tots els usuaris"');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Tria si l`enlla� "tots els usuaris" s`ha d`eliminar en la portada p�blica, si s`ha de mostrar, o si mostrar sempre tots els usuaris.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Portada p�blica');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- tria p�blic -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Permet als usuaris/es p�blics enviar missatges');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'S`ha arribat al l�mit de missatges!');
DEFINE ('_UDDEIM_PUBLICUSER', 'usuari/a p�blic');
DEFINE ('_UDDEIM_DELETEDUSER', 'usuari/a eliminat');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Longitud del captcha');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Especifica quants car�cters ha d`introduir un usuari/a');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Protecci� Captcha');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Especifica qui ha d`introduir un captcha a l`hora d`enviar un missatge');
DEFINE ('_UDDEADM_CAPTCHAF0', 'inhabilitat');
DEFINE ('_UDDEADM_CAPTCHAF1', 'nom�s usuaris/es p�blics');
DEFINE ('_UDDEADM_CAPTCHAF2', 'usuaris/es p�blics i registrats');
DEFINE ('_UDDEADM_CAPTCHAF3', 'usuaris/es p�blics, registrats i especials');
DEFINE ('_UDDEADM_CAPTCHAF4', 'tots els usuaris/es (incl. administradors)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Habilita portada p�blica');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'Quan est� habilitat els usuaris/es p�blics poden enviar missatges als usuaris/es registrats (aquests poden especificar a la seva configuraci� personal si volen utilitzar aquesta funci�).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Portada p�blica per defecte');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'Aquest �s el valor per defecte del par�metre si un usuari/a p�blic t� perm�s per a enviar missatges a usuaris/es registrats.');
DEFINE ('_UDDEADM_PUBDEF0', 'inhabilitat');
DEFINE ('_UDDEADM_PUBDEF1', 'habilitat');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Codi de seguretat erroni');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'cap o desconegut');
DEFINE ('_UDDEADM_DONATE', 'Si us agrada uddeIM o voleu donar suport al desenvolupament si us plau feu una petita donaci�.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Configuraci� trobada a la base de dades: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Copia i restaura la configuraci�');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Pots fer c�pia de seguretat de la configuraci� a la base de dades i restaurar-la quan sigui necessari. Aix� �s �til per a actualitzar l`uddeIM o quan heu de desar una certa configuraci� per a fer proves.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'COPIA');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'RESTAURA');
DEFINE ('_UDDEADM_CANCEL', 'Cancel�la');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Codificaci� del fitxer d`idioma');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Normalment el valor per <strong>defecte</strong> (ISO-8859-1) �s correcte per a Joomla! 1.0 i  <strong>UTF-8</strong> per a Joomla! 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'defecte');
DEFINE ('_UDDEIM_READ_INFO_1', 'Els missatges llegits estaran a la b�stia d`entrada durant ');
DEFINE ('_UDDEIM_READ_INFO_2', ' dies abans d`�sser esborrats autom�ticament.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Els missatges NO llegits estaran a la b�stia d`entrada durant ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' dies abans d`�sser esborrats autom�ticament.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Els missatges enviats estaran a la b�stia de sortida durant ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' dies abans de ser esborrats autom�ticament.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Mostra av�s a la b�stia d`entrada per als missatges llegits');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Mostra l`av�s "Els missatges llegits seran esborrats despr�s de n dies" a la b�stia d`entrada');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Mostra av�s a la b�stia d`entrada per als missatges no llegits');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Mostra l`av�s "Els missatges no llegits seran esborrats despr�s de n dies" a la b�stia d`entrada');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Mostra av�s a la b�stia de sortida per als missatges enviats');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Mostra l`av�s "Els missatges enviats seran esborrats despr�s de n dies" a la b�stia de sortida');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Mostra av�s a la paperera per als missatges esborrats');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Mostra l`av�s "Els missatges esborrats seran purgats despr�s de n dies" a la paperera');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Els missatges enviats es conserven (dies)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Introdueix el nombre de dies abans que s`eliminin els missatges <b>enviats</b> de la b�stia de sortida.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'envia a tots els usuaris/es especials');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Missatge a <strong>tots els usuaris/es especials</strong>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- trieu el nom d`usuari/a -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- trieu el nom -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Edita la configuraci� d`usuari');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'existent');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'no existent');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- trieu una entrada -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- trieu una notificaci� -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- trieu finestra emergent -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Nom d`usuari');
DEFINE ('_UDDEADM_USERSET_NAME', 'Nom');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Notificaci�');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Finestra emergent');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', '�ltim acc�s');
DEFINE ('_UDDEADM_USERSET_NO', 'No');
DEFINE ('_UDDEADM_USERSET_YES', 'S�');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'desconegut');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Quan estigui fora de l�nia (excepte respostes)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Sempre (excepte respostes)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Quan estigui fora de l�nia');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Sempre');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Cap notificaci�');
DEFINE ('_UDDEADM_WELCOMEMSG', "Benvinguts a l`uddeIM!\n\nL`heu instal�lat correctament.\n\nProveu de veure aquest missatge amb diverses plantilles. Pots establir-les al panell de configuraci� de l`uddeIM.\n\nL`uddeIM �s un projecte en desenvolupament. Si trobeu errors o mancances, informeu-ne a l`autor per tal que tots poguem fer un uddeIM millor.\n\nQue el disfruteu!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'Instal�laci� de l`uddeIM completada.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Si us plau aneu al panell d`administraci� i comproveu la configuraci�.');
DEFINE ('_UDDEADM_REVIEWLANG', 'Si esteu utilitzant un joc de car�cters diferent al ISO 8859-1 configureu-ho correctament.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'Despr�s de la instal�laci�, tot el tr�fic de correu electr�nic de l`uddeIM (notificacions) est� deshabilitat, per tal que no s`envi�n missatges mentre feu proves. No us oblideu d`inhabilitar "atura els correus" a la configuraci� quan acabeu.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Destinataris m�x.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Nombre m�xim de destinataris que es permeten per missatge (0=sense limitaci�)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'masses destinataris');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'L`enviament de correus electr�nic est� deshabilitat.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Cerca interna de text');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Autocompleta cerques dins del text (en comptes de cercar nom�s des del principi)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'Comportament de l`enlla� "Tots els usuaris"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Tria si l`enlla� "Tots els usuaris" s`ha de mostrar o no, i si sempre s`han de mostrar tots els usuaris.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Amaga l`enlla� "Tots els usuaris"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Mostra l`enlla� "Tots els usuaris"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Mostra sempre tots els usuaris');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'No es pot escriure a la configuraci�:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'Es pot escriure a la configuraci�:');
DEFINE ('_UDDEIM_FORWARDLINK', 'reenvia');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'destinatari trobat');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'destinataris trobats');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (defecte)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Sistema de correu');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'Trieu el sistema d`enviament de correu electr�nic que l`uddeIM ha de fer servir per a enviar les notificacions.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Mostra grups de Joomla');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Mostra grups de Joomla en la llista general de missatges.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Reenviament de missatges');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Permet el reenviament de missatges.');
DEFINE ('_UDDEIM_FWDFROM', 'Missatge original de');
DEFINE ('_UDDEIM_FWDTO', 'a');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Desarxiva missatge');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'No es pot desarxivar el missatge');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Permet m�ltiples destinataris');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Permet m�ltiples destinataris (separats amb comes).');
DEFINE ('_UDDEIM_CHARSLEFT', 'car�cters restants');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Mostra comptador de text');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Mostra un comptador de text que indica quants car�cters queden.');
DEFINE ('_UDDEIM_CLEAR', 'Neteja');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Afegeix els usuaris/es seleccionats als destinataris');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Aix� permet seleccionar m�ltiples destinataris de la llista "Tots els usuaris".');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Afegeix connexions seleccionades als destinataris');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Aix� permet seleccionar m�ltiples destinataris de la llista "Connexions CB".');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS trobat: ');
DEFINE ('_UDDEIM_ENTERNAME', 'introdu�u un nom');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Autocompleta');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Completa autom�ticament els noms dels destinataris.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Clau utilitzada per a l`ofuscaci�');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Introdueix la clau que s`utilitzar� per a ofuscar els missatges. No ho canvieu un cop hagueu habilitat la ofuscaci�.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'S`ha trobat un fitxer de configuraci� erroni!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Versi� trobada:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Versi� esperada:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Convertint la configuraci�...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Fet!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Error cr�tic: No s`ha pogut escriure al fitxer de configuraci�');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Missatge encriptat! - No es pot descarregar!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Contrasenya incorrecta! - No es pot descarregar!');
DEFINE ('_UDDEIM_WRONGPW', 'Contrasenya incorrecta! - Si us plau contacteu amb l`administrador de la base de dades!');
DEFINE ('_UDDEIM_WRONGPASS', 'Contrasenya incorrecta!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Dates d`eliminaci� incorrectes (entrada/sortida): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Corregint dates d`eliminaci� incorrectes');
DEFINE ('_UDDEIM_TODP', 'A: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Neteja els missatges ara');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Mostra icones d`acci�');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'Si trieu <i>S�</i>, els enlla�os d`acci� es mostraran amb una icona');
DEFINE ('_UDDEIM_UNCHECKALL', 'desmarca tots');
DEFINE ('_UDDEIM_CHECKALL', 'marca tots');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Mostra icones de sota');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'Si trieu <i>S�</i>, els enlla�os de sota es mostraran amb una icona.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Utilitza emoticones animades');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Utilitza emoticones animades en comptes de les est�tiques.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'M�s emoticones animades');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Mostra m�s emoticones animades.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Missatge encriptat - Es requereix contrasenya');
DEFINE ('_UDDEIM_PASSWORD', '<strong>Es necessita contrasenya</strong>');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Contrasenya');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (text d`encriptaci�)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (text de desencriptaci�)');
DEFINE ('_UDDEIM_MORE', 'M�S ICONES');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Missatges privats');
DEFINE ('_UDDEMODULE_NONEW', 'cap de nou');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Nous missatges: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'missatge');
DEFINE ('_UDDEMODULE_MESSAGES', 'missatges');
DEFINE ('_UDDEMODULE_YOUHAVE', 'Teniu');
DEFINE ('_UDDEMODULE_HELLO', 'Hola');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Missatge r�pid');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Utilitza encriptaci�');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Encripta els missatges emmagatzemats');
DEFINE ('_UDDEADM_CRYPT0', 'Cap');
DEFINE ('_UDDEADM_CRYPT1', 'Ofusca els missatges');
DEFINE ('_UDDEADM_CRYPT2', 'Encripta els missatges');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Defecte per a notificaci� per correu');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Valor per defecte de la notificaci� per correu electr�nic (per a usuaris/es que encara no hagin canviat les seves prefer�ncies).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Sense notificaci�');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Sempre');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Nom�s quan estiguin fora de l�nia');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Elimina l`enlla� "Tots els usuaris"');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Elimina l`enlla� "Tots els usuaris" a la caixa d`escriptura de nous missatges (�til per a quan hi ha molts usuaris/es registrats).');
DEFINE ('_UDDEADM_POPUP_HEAD','Notificaci� emergent');
DEFINE ('_UDDEADM_POPUP_EXP','Mostra una finestra emergent quan arriba un nou missatge (es necessita mod_uddeim o mod_cblogin apeda�at)');
DEFINE ('_UDDEIM_OPTIONS', 'M�s opcions');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Aqu� podeu configurar m�s opcions.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Mostra�m una finestra emergent quan arribi un missatge');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Notificaci� emergent per defecte');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Habilita la notificaci� amb finestres emergents per defecte (per a usuaris/es que no han canviat les seves prefer�ncies).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Manteniment');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Manteniment de la base de dades');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'COMPROVA');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'REPARA');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "Quan es purga un usuari/a de la base de dades els seus missatges s'hi solen mantenir. Aquesta funci� comprova si �s necessari eliminar missatges orfes.<br>Tamb� comprova si hi ha alguns altres tipus d`errors.");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "Comprovant...<br>");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (Nom d'usuari): [entrada|eliminats entrada|sortida|eliminats sortida]</i><br>");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>entrada: missatges emmagatzemats a la b�stia d`entrada de l`usuari</i><br>");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>eliminats entrada: missatges eliminats de la b�stia d`entrada de l`usuari, per� encara a la b�stia de sortida d'alg� altre</i><br>");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>sortida: missatges emmagatzemats a la b�stia de sortida de l`usuari</i><br>");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>eliminats sortida: missatges eliminats de la b�stia de sortida de l`usuari, per� encara a la b�stia d`entrada d'alg� altre</i><br>");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "Eliminant...<br>");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "no trobat (des de/a/opcions/bloquejador/bloquejat):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "elimina totes les prefer�ncies de l`usuari");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "elimina el bloqueig de l`usuari");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "llen�a tots els missatges enviats a l`usuari/a , eliminats de la b�stia de sortida del remitent i de la b�stia d`entrada del destinatari");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "llen�a tots els missatges enviats des de l`usuari/a sel�leccionat a la seva b�stica de sortida i a la b�stia d`entrada del destinatari");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Cap feina pendent</b><br>');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Manteniment requerit</b><br>');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Mostra noms reals');
DEFINE ('_UDDEADM_NAMESDESC', 'Mostra noms reals o noms d`usuari?');
DEFINE ('_UDDEADM_REALNAMES', 'Noms reals');
DEFINE ('_UDDEADM_USERNAMES', 'Noms d`usuari/a');
DEFINE ('_UDDEADM_CONLISTBOX', 'Connections listbox');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Mostrar les meves connexions en una capa amb una llista o en una taula?');
DEFINE ('_UDDEADM_LISTBOX', 'Capsa amb llista');
DEFINE ('_UDDEADM_TABLE', 'Taula');

DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Els missatges estaran a la paperera durant 24 hores abans de ser esborrats. Nom�s podeu veure les primeres paraules del missatge. Per a llegir el missatge sencer primer heu de restaurar-lo.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Els missatges estaran a la paperera durant ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' hores abans de ser esborrats. Nom�s podeu veure les primeres paraules del missatge. Per a llegir el missatge sencer primer heu de restaurar-lo.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Aquest missatge ha estat memoritzat. Ara podeu editar-lo i tornar-lo a enviar.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'No s`ha pogut memoritzar el missatge (probablement perqu� ha estat llegit o esborrat.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Restauraci� del missatge fallida. (Segurament ha estat a la paperera massa temps i ha estat esborrat.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Restauraci� del missatge fallida.');
DEFINE ('_UDDEIM_DONTSEND', 'No envi�s');
DEFINE ('_UDDEIM_SENDAGAIN', 'Reenvia');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'No esteu identificat.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', '<strong>No teniu missatges en la safata d`entrada.</strong>');
	// changed in 0.4 (one dot that was too much after </strong> deleted)
	
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', '<strong>No teniu missatges en la safata de sortida.</strong>');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', '<strong>No teniu missatges a la paperera.</strong>');
DEFINE ('_UDDEIM_INBOX', 'Safata d`entrada');
DEFINE ('_UDDEIM_OUTBOX', 'Safata de sortida');
DEFINE ('_UDDEIM_TRASHCAN', 'Paperera');
DEFINE ('_UDDEIM_CREATE', 'Nou missatge');
DEFINE ('_UDDEIM_UDDEIM', 'Missatges privats');
DEFINE ('_UDDEIM_READSTATUS', 'Llegit');
DEFINE ('_UDDEIM_FROM', 'de');
DEFINE ('_UDDEIM_TO', 'per a');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'La safata de sortida cont� tots els missatges que heu enviat i que encara no han estat esborrats. Pots memoritzar un missatge en la safata de sortida si no ha estat llegit, per� si ho fas ja no podr� �sser llegit pel destinatari. ');
	// changed in 0.4

DEFINE ('_UDDEIM_RECALL', 'memoritza');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Memoritza aquest missatge');
DEFINE ('_UDDEIM_RESTORE', 'restaura');
DEFINE ('_UDDEIM_MESSAGE', 'Missatge');
DEFINE ('_UDDEIM_DATE', 'Data');
DEFINE ('_UDDEIM_DELETED', 'Esborrat');
DEFINE ('_UDDEIM_DELETE', 'esborra');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'esborra');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'No es pot mostrar aquest missatge. <br>Raons possibles:<ul><li>No teniu perm�s per a llegir aquest missatge particular</li><li>Aquest missatge ha estat esborrat</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Heu mogut aquest missatge a la paperera.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Missatge de ');
DEFINE ('_UDDEIM_MESSAGETO', 'Missatge de tu mateix per a ');
DEFINE ('_UDDEIM_REPLY', 'Resp�n');
DEFINE ('_UDDEIM_SUBMIT', 'Envia');
//
	// translators info: _UDDEIM_DELETEREPLIED is obsolete in 0.4. You can delete it.
DEFINE ('_UDDEIM_NOID', 'Error: no s`ha trobat el destinatari. El missatge no s`ha enviat.');
DEFINE ('_UDDEIM_NOMESSAGE', 'Error: El missatge no cont� text! El missatge no s`ha enviat.');
DEFINE ('_UDDEIM_REFERAFTERSAVING', 'index.php?option=com_uddeim');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Resposta enviada');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Missatge enviat');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' i el missatge original s`ha mogut a la paperera');
DEFINE ('_UDDEIM_NOSUCHUSER', 'No hi ha cap usuari/a amb aquest nom d`usuari!');
// DEFINE ('_UDDEIM_TO', 'To: ');
		// important: comment out or delete _UDDEIM_TO above. 
		// Double definition (_UDDEIM_TO has already
		// been DEFINEd above, may cause error). 
		
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'No �s possible enviar-vos missatges a v�s mateix!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Acc�s denegat!</b> No teniu perm�s per a dur a terme aquesta acci�!');
DEFINE ('_UDDEIM_PRUNELINK', 'Nom�s administradors: Passa');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'Administraci� d`uddeIM');
DEFINE ('_UDDEADM_GENERAL', 'General');
DEFINE ('_UDDEADM_ABOUT', 'Quant a...');
DEFINE ('_UDDEADM_DATESETTINGS', 'Data/hora');
DEFINE ('_UDDEADM_PICSETTINGS', 'Icones');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Missatges llegits desats durant (dies)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Missatges no llegits desats durant (dies)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Missatges desats a la paperera durant (dies)');
DEFINE ('_UDDEADM_DAYS', 'die(s)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Introdueix el nombre de dies fins que els missatges <b>llegits</b> s`esborraran de forma autom�tica de la safata d`entrada. Si no voleu esborrar missatges autom�ticament, introdu�u un valor molt alt (per exemple, 36524 dies equivalen a un segle). Per� tingueu en compte que la base de dades pot omplir-se r�pidament si deseu tots els missatges.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Introdueix el nombre de dies fins que els missatges que encara <b>no han estat llegits</b> pel destinatari seran esborrats.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Introdueix el nombre de dies fins que els missatges a la paperera seran esborrats. Els valors per sota de 1 estan permesos. Exemple: per a esborrar missatges de la paperera despr�s de 3 hores, introdu�u 0.125 com a valor.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Format d`exhibici� de la data');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Escolliu el format en que la data/hora es mostra. Els mesos seran abreujats segons la vostra configuraci� local de la llengua (si existeix el corresponent arxiu de llengua).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Exhibici� llarga de la data');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Quan es mostren els missatges hi ha m�s espai per a l`exhibici� de la data. Escolliu el format de la data per a exhibir-se quan s`obri un missatge. Pels noms dels dies de la setmana i els mesos, la configuraci� local de la llengua ser� emprada (si existeix el corresponent arxiu de llengua de uddeIM).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Eliminaci� invocada nom�s per administradors');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 's�, nom�s per administradors');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'no, per qualsevol usuari');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Les eliminacions autom�tiques suposen una c�rrega considerable en els servidors i en les bases de dades. SI escolliu <i>s�,&nbsp;by&nbsp;nom�s&nbsp;administradors</i> les eliminacions autom�tiques segons la configuraci� a sobre (dels missatges de tots els usuaris) s�n invocades quan qualsevol administrador/a miri la seva safata d`entrada. Escolliu aquesta opci� si un/a administrador/a mira la seva safata d`entrada al menys un cop al dia o m�s sovint, com �s el cas en la majoria dels llocs web. (Si el teu lloc web t� m�s d`un/a administrador/a, no importa quin/a �s el/la que ho faci ja que les eliminacions s�n invocades autom�ticament per qualsevol administrador/a.) A llocs web petits o poc administrats on els/les administradors/es rarament miren les seves safates d`entrada, escolliu <i>no,&nbsp;by&nbsp;qualsevol&nbsp;usuari</i>. Si no ho enteneu o no sabeu qu� fer, escolliu <i>no, per qualsevol usuari</i>.');
DEFINE ('_UDDEADM_ABOUTTEXT', ' 
<strong>udde Instant Messages (uddeIM)</strong><br>
Instant Messages System for Mambo 4.5.X/Joomla 1.0.X /1.5<br>
Autor/a:         Benjamin Zweifel<br>
Arxiu d`idioma:  catalan.php<br>
Autor/a:         el_libre  - catmidia.cat i Pablo Querol per a Joomlacat.org<br>
Copyright:      � by Benjamin Zweifel<br>
This is free software and you may redistribute it under the GPL.
uddeIM comes with absolutely no warranty. For details, see the license at
 <a href="http://www.gnu.org/licenses/gpl.txt">www.gnu.org/licenses/gpl.txt</a>.
');
	// above string changed in 0.4 
DEFINE ('_UDDEADM_SAVESETTINGS', 'Desa configuraci�');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'S`ha desat els par�metres seg�ents a l`arxiu de configuraci�:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'S`ha desat la configuraci�.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Icona: usuari/a connectat');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Introdueix la localitzaci� de la icona que es mostrar� al costat del nom d`usuari/a quan aquest usuari/a estigui connectat.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Icona: usuari/a desconnectat');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Introdueix la localitzaci� de la icona que es mostrar� al costat del nom d`usuari/a quan aquest usuari/a estigui desconnectat.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Icona: missatge llegit');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Introdueix la localitzaci� de la icona que es mostrar� pels missatges llegits.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Icona: missatge no llegit');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Introdueix la localitzaci� de la icona que es mostrar� pels missatges no llegits.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'M�dul: icona pels nous missatges');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Aquest par�metre fa refer�ncia al m�dul mod_uddeim_new. Introdueix la localitzaci� de la icona que aquest m�dul exhibir� quan hi hagi nous missatges.');

// uddeIM Module

DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Missatges Privats');
DEFINE ('_UDDEMODULE_NONEW', 'no hi ha nous');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Nous missatges: ');

// admin import tab

DEFINE ('_UDDEADM_UDDEINSTALL', 'Instal�laci� de l`uddeIM');
DEFINE ('_UDDEADM_FINISHED', 'La instal�laci� ha acabat. Benvinguts/des a uddeIM 0.5 . ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">No teniu el component Community Builder instal�lat. No podreu fer servir uddeIM.</span><br><br>Us heu de descarregar el <a href="http://www.joomlapolis.com">Community Builder</a> ,aqu� trobareu <a href="http://www.catmidia.cat">la traducci� al catal� del CB</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'continua');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Hi ha ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' missatges en la instal�laci� del myPMS. Voleu importar-los al uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Aix� no alterar� els missatges del myPMS o la instal�talaci�. Romandran intactes. Pots importar-los a uddeIM amb seguretat, fins i tot si considereu continuar utilitzant myPMS. (Primer haur�eu de desar qualsevol canvi que hagueu fet en la configuraci� abans de comen�ar la importaci�!) Qualsevol missatge que tingueu en la base de dades de uddeIM romandr� intacte.');
	// _UDDEADM_IMPORT_EXP above changed in 0.4
	
DEFINE ('_UDDEADM_IMPORT_YES', 'Importa els missatges de myPMS a uddeIM ara');
DEFINE ('_UDDEADM_IMPORT_NO', 'No, no importis cap missatge');  
DEFINE ('_UDDEADM_IMPORTING', 'Si us plau espereu mentre els missatges s`importen.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Els missatges de myPMS s`han importat. No torneu a fer anar aquest script d`instal�laci� un altre cop perqu� fer-ho suposaria importar els missatges un altre cop i es mostraran per partida doble.'); 
DEFINE ('_UDDEADM_IMPORT', 'Importa');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Importa missatges des de myPMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'No s`ha trobat cap instal�laci� de myPMS. No �s possible importar.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Ja heu importat els missatges des de myPMS a uddeIM.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Bloquejat');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'No s`ha enviat (l`usuari/a t`ha bloquejat)');
DEFINE ('_UDDEIM_BLOCKNOW', 'bloquejar&nbsp;usuari/a');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Aquesta �s una llista d`usuaris/es que heu bloquejat. Aquests usuaris/es no poden enviar-vos missatges privats.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Actualment no heu bloquejat a cap usuari/a');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Actualment heu bloquejat ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' usuari(s).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[desbloquejar]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Si un usuari/a bloquejat intenta enviar-vos un missatge, ell o ella ser� informat/da que est� bloquejat/da i que el missatge no s`ha enviat.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Un usuari/a no pot veure que l`heu bloquejat.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'No podeu bloquejar administradors/es.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Permet el sistema de bloqueig');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Quan est� perm�s, els usuaris/es poden bloquejar altres usuaris. Un usuari/a bloquejat no pot enviar missatge a l`usuari/a que l`ha bloquejat/da. Els/les administradors/res no poden ser bloquejats/des.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 's�');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'no');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Els usuaris/es bloquejats reben un missatge');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Si est� marcat com a <i>s�</i>, s`informar� a un usuari/a bloquejat que el seu missatge no s`ha enviat perqu� el destinatari l`ha bloquejat. Si est� marcat com a <i>no</i>, l`usuari/a bloquejat no rep cap notificaci� sobre el fet que el seu missatge no s`ha enviat.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 's�');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'no');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Sistema de bloqueig no perm�s');
// DEFINE ('_UDDEADM_DELETIONS', 'Messages'); 
	// translators info: comment out or delete line above to avoid double definition.
	// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Eliminacions'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Bloqueig');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Integraci�');
DEFINE ('_UDDEADM_EMAIL', 'Correu');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Mostra l`estat de connectat');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Quan est� marcat com a <i>s�</i>, uddeIM mostra cada nom d`usuari/a amb una icona petita que informa si l`usuari/a est� connectat o desconnectat. Pots escollir les icones en  l`apartat d`administraci� d`icones.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Permet la notificaci� per correu');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Quan est� marcat com a <i>s�</i>, cada usuari/a pot escollir si vol rebre un correu electr�nic cada cop que un nou missatge arriba a la seva safata d`entrada.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'El correu cont� contingut');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Quan est� marcat com a <i>no</i>, el correu nom�s contindr� informaci� sobre sobre quan s`ha enviat el missatge i qui ho ha fet, per� no el missatge enviat.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Correu "us heu oblidat"');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Aquesta caracter�stica permet enviar - independentment de la configuraci� de l`usuari/a - un correu a un usuari/a que t� un missatge no llegit durant molt de temps a la safata d`entrada (la durada es determina a sota). Aquest par�metre �s independent del de notificaci� per correu de a dalt. Si mai no voleu enviar cap missatge per correus, heu de desactivar ambd�s par�metres.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Correu "us heu oblidat" enviat despr�s de dia(es)');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Si la caracter�stica "us heu oblidat" (amunt) est� marcada com a <i>s�</i>, introdu�u aqu� el nombre de dies que han de pasar sense que un missatge no es llegeixi per a que els correus "us heu oblidat" s`envi�n.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Primers car�cters');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Pots inserir el nombre de car�cters d`un missatge que es mostraran a la safata d`entrada, la de missatges enviats i la paperera.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Longitud m�xim d`un missatge');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Inseriu aqu� la longitud m�xima d`un missatge. Si un missatge supera aquest l�mit, ser� tallat autom�ticament. Fixeu a `0` per a permetre missatges de qualsevol llargada (no recomenat).');
DEFINE ('_UDDEADM_YES', 's�');
DEFINE ('_UDDEADM_NO', 'no');
DEFINE ('_UDDEADM_ADMINSONLY', 'nom�s administradors');
DEFINE ('_UDDEADM_SYSTEM', 'Sistema');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Nom d`usuari/a del sistema');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'Amb uddeIM es permeten missatges del sistema. Els missatges del sistema no tenen un remitent visible i els usuaris/es no els poden respondre. Introdueix aqu� el nom d`usuari/a per defecte pels missatges del sistema (per exemple <i>Suport</i> o <i>Ajuda t�cnica</i> o <i>Administrador de la Comunitat</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Permet als administradors enviar missatges generals');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'Amb uddeIM es permeten missatges generals. S`envien a cada usuari/a del teu sistema. Feu un �s raonable.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Nom del remitent per correu');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Introdueix el nom del remitent de les notificacions per correu (per exemple <i>NOMDELATEVAWEB</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Adre�a de correu del remitent');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Introdueix l`adre�a de correu del remitent de les notificacions per correu (hauria de ser l`adre�a principal de la teva p�gina).');
DEFINE ('_UDDEADM_VERSION', 'Versi� del uddeIM');
DEFINE ('_UDDEADM_ARCHIVE', 'Arxiu'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Permet l`arxiu');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Escolliu si voleu permetre o no que els usuaris/es puguin emmagatzemar missatges en un arxiu. No es podran esborrar els missatges en un arxiu.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'M�xim de missatges a l`arxiu d`un usuari');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Decidiu quin �s el nombre m�xim de missatges que cada usuari/a pot emmagatzemar al seu arxiu (no hi ha l�mit pels administradors).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Permet c�pies per a un mateix');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Aix� permetria als usuaris/es rebre c�pies dels missatges que envien. Aquestes c�pies apareixeran a la safata d`entrada.');
DEFINE ('_UDDEADM_MESSAGES', 'Missatges');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Suggereix enviar a la paperera l`original');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Quan est� actiu, aquest par�metre posar� una casella al costat del bot� de `Envia` en la resposta a un missatge, anomenada `elimina l`original` i que estaria sel�leccionat per defecte. En aquest cas, el missatge es mour� immediatament de la safata d`entrada a la paperera quan la resposta s`hagi enviat. Gr�cies a aquesta funci�, el nombre de missatges a la base de dades ser� (m�s) petit. Els usuaris/es sempre podran desmarcar la casella si volen conservar l`original a la safata d`entrada.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
	
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Missatges per p�gina');	
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Definiu aqu� el nombre de missatges exhibits per p�gina a la safata d`entrada, la de missatges enviats, la paperera i l`arxiu.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Joc de car�cters utilitzat');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Si estiu experimentant problemes amb l`exhibici� de car�cters no-llatins, podeu introduir el charset que uddeIM empra per a convertir el output de la base de dades en codi HTML aqu�. <b>Si no enteneu el que aix� vol dir, no canvieu el valor per defecte!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Charset utilitzat per correu');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Si estiu experimentant problemes amb l`exhibici� de car�cters no-llatins, podeu introduir el charset que uddeIM empra per a enviar correus. <b>Si no enteneu el que aix� vol dir, no canvieu el valor per defecte!</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
		
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Aquest �s el contingut del correu que els usuaris/es rebran si la opci� corresponent est� sel�leccionada amunt. El contingut del missatge no estar� en el correu. Manteniu les variables %you%, %user% i %site% intactes. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Aquest �s el contingut del correu que els usuaris/es rebran si la opci� corresponent est� sel�leccionada amunt. Aquest correu inclour� el contingut del missatge. Manteniu les variables %you%, %user%, %pmessage% i %site% intactes. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Aquest �s el contingut del correu  "us heu oblidat" que els usuaris/es rebran si la opci� corresponent est� sel�leccionada amunt. Manteniu les variables %you% i %site% intactes. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Permet als usuaris/es descarregar-se missatges des del seu arxiu enviant-se a ells mateixos un correu.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Permet la desc�rrega');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Aquest �s el format del correu que els usuaris/es rebran quan es descarreguin els seus propis missatges des de l`arxiu. Manteniu les variables %user%, %msgdate% i %msgbody% intactes. ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Establiu el l�mit de la safata d`entrada');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Pots incloure el nombre de missatges a la safata d`entrada en el nombre m�xim d`arxius arxivats. En aquest cas, el nombre de missatges a la safata d`entrada i a l`arxiu no han d`excedir, en total, el nombre introdu�t amunt. Com a alternativa, podeu especificar el l�mit de la safata d`entrada sense un arxiu. En aquest cas, els usuaris/es no tindran m�s missatges que el nombre establert amunt en la seva safata d`entrada. Si s`arriba a aquesta xifra, no podran respondre m�s missatges o redactar-ne de nous fins que no esborrin missatges antics des de la safata d`entrada o des de l`arxiu respectivament. (Encara podran rebre missatges i llegir-los.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Mostra el l�mit d`�s a la safata d`entrada');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Aix� mostra quans missatges els usuaris/es han emmagatzemat (i quants poden desar) en una l�nia a sota la safata d`entrada.');
		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Heu desactivat l`arxiu. Com voleu gestionar els missatges que estan desats a l`arxiu?');		

DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Deixa`ls');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Deixa`ls a l`arxiu (l`usuari/a no podr� accedir-hi i els missatges encara es tindran en compte en els l�mits de missatges).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Mou-los a la safata d`entrada');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Missatges arxivats moguts a les safates d`entrada');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Els missatges es mouran a la safata d`entrada de l`usuari/a respectiu (o a la paperera si s�n m�s antics del que es permet tenir a la safata d`entrada).');		

		
// 0.4 frontend, admins only (no translation necessary)		
DEFINE ('_UDDEIM_VALIDFOR_1', 'v�lid per a ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' hores. 0=sempre (eliminacions autom�tiques es tenen en compte)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Crea un missatge del sistema o general]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Crea un missatge normal (est�ndard)]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Missatges del sistema o generals no permesos.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Tipus de missatge');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Ajuda sobre missatges del sistema');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(s`obre en una nova finestra)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Esteu a punt d`enviar el missatge mostrat a sota. Si us plau reviseu-lo i confirmeu o cancel�leu!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Missatge per a <strong>tots els usuaris/es</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Missatge per a <strong>tots els administradors</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Missatge per a <strong>tots els usuaris/es actualment connectats</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Els destinataris no podran respondre a aquest missatge.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'El missatge s`enviar� amb <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> com a nom d`usuari');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'El missatge caducar� ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'El missatge no caducar� ');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Feu clic en aquest enlla� abans de procedir!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', '�s <strong>en missatges del sistema nom�s</strong>:<br> [b]<strong>negreta</strong>[/b] [i]<em>cursiva</em>[/i]<br>
[url=http://www.algunaurl.com]alguna direcci�[/url] o [url]http://www.algunaurl.com[/url] s�n enlla�os');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Error: no s`han trobat destinataris. El missatge no s`ha enviat.');		
		
		
// 0.4 frontend (all users, translation needed)
DEFINE ('_UDDEIM_CANTREPLY', 'No podeu respondre aquest missatge.');
DEFINE ('_UDDEIM_EMNOFF', 'La notificaci� per correu est� desactivada. ');
DEFINE ('_UDDEIM_EMNON', 'La notificaci� per correu est� activada. ');
DEFINE ('_UDDEIM_SETEMNON', '[activar-la]');
DEFINE ('_UDDEIM_SETEMNOFF', '[desactivar-la]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE', 'Hola %you%, 

%user% us ha enviat un missatge privat a la vostra web .
Si us plau entreu-hi per a llegir-lo!');
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', 'Hola %you%, 

%user% us ha enviat el seg�ent missatge privat a la vostra web .
Si us plau entreu-hi per a respondre!
__________________
%pmessage%
');
DEFINE ('_UDDEIM_EMN_FORGETMENOT', 'Hola %you%,

Teniu missatges sense llegir a la vostra web .
Si us plau entreu-hi per a llegir-los! 
');
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Teniu missatges a la vostra web');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'envia com a missatge del sistema (els destinataris no el podran respondre)');
DEFINE ('_UDDEIM_SEND_TOALL', 'envia a tots els usuaris');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'envia a tots els administradors');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'envia a tots els usuaris/es connectats');



DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Error inesperat: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Arxiu no perm�s.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'El emmagatzematge del missatge a l`arxiu ha fallat.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Teniu guardats ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>Encara no heu emmagatzemat cap missatge a l`arxiu.</strong>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' missatges');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Teniu emmagatzemat un missatge');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Per a emmagatzemar missatges, primer heu d`esborrar altres missatges.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Pots emmagatzemar un m�xim de ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' missatges.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Teniu ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' missatges a');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'l`arxiu');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'la safata d`entrada');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'l`arxiu i a la safata d`entrada');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'El m�xim perm�s �s ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Encara podeu rebre i llegir missatges per� no podreu respondre`ls o redactar-ne de nous fins que esborreu missatges.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Missatges emmagatzemats: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(de m�x. ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Missatge emmagatzemat a l`arxiu.');
DEFINE ('_UDDEIM_STORE', 'arxiu');
		// translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', 'torna');

DEFINE ('_UDDEIM_TRASHCHECKED', 'esborra sel�leccionats');
	// translators info: plural!
	
DEFINE ('_UDDEIM_SHOWALL', 'mostra-los tots');
	// translators example "SHOW ALL messages"
	
DEFINE ('_UDDEIM_ARCHIVE', 'Arxiu');
	// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'Arxiu ple. No s`ha emmagatzemat.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'No hi ha missatges sel�leccionats.');
DEFINE ('_UDDEIM_THISISACOPY', 'C�pia del missatge que vau enviar a ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'c�pia per a mi');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'c�pia per a l`arxiu');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'llen�a l`original');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Descarrega missatge');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Email enviat amb els missatges exportats');
DEFINE ('_UDDEIM_EXPORT_NOW', 'Correu electr�nic enviat a mi');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Aquest correu inclou els vostres missatges privats.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'No s`ha pogut enviar el correu contenint els missatges.');

DEFINE ('_UDDEIM_LIMITREACHED', 'L�mit del missatge! No restaurat.');

DEFINE ('_UDDEIM_WRITEMSGTO', 'Escriu un missatge a ');

$udde_smon[1]="Gen";
$udde_smon[2]="Feb";
$udde_smon[3]="Mar�";
$udde_smon[4]="Abr";
$udde_smon[5]="Maig";
$udde_smon[6]="Juny";
$udde_smon[7]="Jul";
$udde_smon[8]="Ago";
$udde_smon[9]="Set";
$udde_smon[10]="Oct";
$udde_smon[11]="Nov";
$udde_smon[12]="Des";

$udde_lmon[1]="Gener";
$udde_lmon[2]="Febrer";
$udde_lmon[3]="Mar�";
$udde_lmon[4]="Abril";
$udde_lmon[5]="Maig";
$udde_lmon[6]="Juny";
$udde_lmon[7]="Juliol";
$udde_lmon[8]="Agost";
$udde_lmon[9]="Setembre";
$udde_lmon[10]="Octubre";
$udde_lmon[11]="Novembre";
$udde_lmon[12]="Desembre";

$udde_lweekday[0]="Diumenge";
$udde_lweekday[1]="Dilluns";
$udde_lweekday[2]="Dimarts";
$udde_lweekday[3]="Dimecres";
$udde_lweekday[4]="Dijous";
$udde_lweekday[5]="Divendres";
$udde_lweekday[6]="Dissabte";

$udde_sweekday[0]="Dg";
$udde_sweekday[1]="Dl";
$udde_sweekday[2]="Dt";
$udde_sweekday[3]="Dc";
$udde_sweekday[4]="Dj";
$udde_sweekday[5]="Dv";
$udde_sweekday[6]="Ds";

// new in 0.5 ADMIN

// Translators observe: Search for _UDDEIM_SYSGM_SHORTHELP (above)
// and change this text so that it no longer contains 
// information abouth the [newurl] code. [newurl] is no 
// longer supported by this version of uddeIM.

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'Plantilla uddeIM');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Escolliu la plantilla que voleu que uddeIM empri');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Mostra les Connexions');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Escolliu <i>S�</i> si teniu instal�lat CB/CBE/JS i voleu presentar a l`usuari/a el nom de la seva o les seves connexions en la p�gina de la redacci� d`un nou missatge.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Mostra`m la configuraci�');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'L`enlla� a la Configuraci� apareix a uddeIM si teniu activat la notificaci� per correu o el sistema de bloqueig. Si no voleu aix�, podeu desactivar-lo aqu�. ');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 's�, a la part inferior');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Permet el codi BB');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'nom�s formats de font');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Escolliu <i>nom�s formats de font</i> per a permetre als usuaris/es utilitzar el codi BB per a negreta, subratllat i tamany i color de les lletres. Quan marqueu aquesta opci� com a <i>s�</i>, els usuaris/es poden emprar <strong>tots</strong> els codis BB en els seus missatges (fins i tot enlla�os i imatges).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Permetre emoticones');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Quan est� marcat com a <i>s�</i>, els codis d`emoticones com ara :-) s�n reempla�ats per gr�fics amb emoticones en la visualitzaci� del missatge. Llegiu l`arxiu readme per a una llista de les emoticones possibles.');
DEFINE ('_UDDEADM_DISPLAY', 'Visualitzaci�');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Mostra les icones del men�');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Quan est� marcat com a <i>s�</i>, els enlla�os del men� i de l`acci� es mostraran amb una icona.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'T�tol del component');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Introdueix el t�tol del component de missatgeria privada, per exemple `Missatges privats`. Deixeu-ho en blanc si no voleu mostrar cap t�tol.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Mostra l`enlla� Sobre');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Marqueu-ho com a <i>s�</i> per a mostrar un enlla� als cr�dits del software uddeIM i la llic�ncia. Aquest enlla� es situar� a la part de sota de l`output del HTML de uddeIM.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Atura ara el correu');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Marqueu aquesta casella per a prevenir uddeIM d`enviar correus (notificacions per correu i correus "no oblidis") sense tenir en compte la configuraci� dels usuaris, per exemple mentre s`est� provant el lloc web. Si no voleu mai aquestes opcions, marqueu totes les opcions de a dalt com a <i>no</i>.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manualment');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'Thumbnails de CB en les llistes');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Marqueu-ho com a <i>s�</i> si voleu mostrar els thumbnails de CB dels usuaris/es en les llistes de missatges (safata d`entrada, missatges enviats, etc.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Mostra usuaris');
DEFINE ('_UDDEIM_CONNECTIONS', 'Connexions');
DEFINE ('_UDDEIM_SETTINGS', 'Configuraci�');
DEFINE ('_UDDEIM_NOSETTINGS', 'No hi ha res per a configurar.');
DEFINE ('_UDDEIM_ABOUT', 'Sobre'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Redacta'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'Notificaci� per correu electr�nic');
DEFINE ('_UDDEIM_EMN_EXP', 'Pots rebre un correu electr�nic quan rebis un nou missatge privat.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Notificaci� per correu electr�nic de nous missatges');
DEFINE ('_UDDEIM_EMN_NONE', 'No notificaci� per correu electr�nic');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Notificaci� per correu electr�nic quan est�s desconnectat/da');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'No envi�s notificaci� de respostes');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Bloqueig d`usuari'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Pots prevenir que usuaris/es us envi�n missatges bloquejant-los. Escolliu <i>bloquejar usuari</i> quan veieu un missatge del respectiu usuari/a'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Desa canvis');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'Etiqueta BB Code per a produir text en negreta. �s: [b]negreta[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'Etiqueta BB Code per a produir text en cursiva. �s: [i]cursiva[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'Etiqueta BB Code per a produir text subratllat. �s: [u]subratllat[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'Etiqueta BB Code per a produir lletres amb color. �s: [color=#XXXXXX]amb color[/color] on XXXXXX �s el codi hex del color que voleu, per exemple FF0000 pel vermell.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'Etiqueta BB Code per a produir lletres amb color. �s: [color=#XXXXXX]amb color[/color] on XXXXXX �s el codi hex del color que voleu, per exemple 00FF00 pel verd.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'Etiqueta BB Code per a produir lletres amb color. �s: [color=#XXXXXX]amb color[/color] on XXXXXX �s el codi hex del color que voleu, per exemple 0000FF pel blau.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'Etiqueta BB Code per a produir lletres molt petites. �s: [size=1]text molt petit.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'Etiqueta BB Code per a produir lletres petites. �s: [size=2] text petit.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'Etiqueta BB Code per a produir lletres grans. �s: [size=4]text gran.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'Etiqueta BB Code per a produir lletres molt grans. �s: [size=5]text molt gran.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'Etiqueta BB Code per a inserir un enlla� a una imatge. �s: [img]Imatge-URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'Etiqueta BB Code per a inserir un enlla�. �s: [url]adre�a web[/url]. No oblideu el http:// al principi de cada adre�a web.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Tanca totes les etiquetes BB obertes.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' missatge en'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>No teniu missatges a l`arxiu.</strong>'); 
