<?php
// *******************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         ? 2007-2010 Stephan Slabihoud, ? 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
// *******************************************************************
// Language file: French (source file is Latin-1)
// Translator:    Florent Nouvellon <noemail>
// Translator:    Jyhelle <noemail> (1.1)
// Translator:    Baboon (1.5, 1.6 et divers corrections et traductions manquantes)
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
DEFINE ('_UDDEADM_EMAILSTOPPED', '\'Email stop\' enabled.');
DEFINE ('_UDDEIM_ACCOUNTLOCKED', 'Access to your mailbox has been locked. Please contact the site admin.');
DEFINE ('_UDDEADM_USERSET_LOCKED', 'Locked');
DEFINE ('_UDDEADM_USERSET_SELLOCKED', '- Locked -');
DEFINE ('_UDDEADM_CBBANNED_HEAD', 'Check for CB banned users');
DEFINE ('_UDDEADM_CBBANNED_EXP', 'When activated uddeIM checks if a user has been banned in CB and does not allow access to uddeIM. Additionally other users are not able to send messages to a banned user.');
DEFINE ('_UDDEIM_YOUAREBANNED', 'You have been banned. Please contact the administrator or moderator.');
DEFINE ('_UDDEIM_USERBANNED', 'User has been banned');
DEFINE ('_UDDEADM_JOOBB', 'Joo!BB');
DEFINE ('_UDDEPLUGIN_SEARCHSECTION', 'Private Messaging');
DEFINE ('_UDDEPLUGIN_MESSAGES', 'Private Messages');
DEFINE ('_UDDEADM_MAINTENANCEDEL_HEAD', 'Invoke message erasing');
// note "This  is the same as _UDDEADM_MAINTENANCE_PRUNE on the system tab."
DEFINE ('_UDDEADM_MAINTENANCEDEL_EXP', 'Removes deleted messages from the database. This is the same as \'Prune messages now\' on the system tab.');
DEFINE ('_UDDEADM_MAINTENANCEDEL_ERASE', 'ERASE');
DEFINE ('_UDDEADM_REPORTSPAM_HEAD', 'Report message link');
DEFINE ('_UDDEADM_REPORTSPAM_EXP', 'When activated this show a \'Report message\' link that allows users to report SPAM to the admin.');
DEFINE ('_UDDEIM_TOOLBAR_REMOVESPAM', 'Delete message');
DEFINE ('_UDDEIM_TOOLBAR_REMOVEREPORT', 'Remove report');
DEFINE ('_UDDEIM_TOOLBAR_SPAMCONTROL', 'Report Control');
DEFINE ('_UDDEADM_INFORMATION', 'Information');
DEFINE ('_UDDEADM_SPAMCONTROL_STAT', 'Reported messages:');
DEFINE ('_UDDEADM_SPAMCONTROL_TRASHED', 'Trashed');
DEFINE ('_UDDEADM_SPAMCONTROL_NOTEDEL', 'Delete this message from database?');
DEFINE ('_UDDEADM_SPAMCONTROL_NOTEREMOVE', 'Remove this report?');
DEFINE ('_UDDEADM_SPAMCONTROL_SHOWHIDE', 'Show/Hide');
DEFINE ('_UDDEADM_SPAMCONTROL_EDIT', 'Report Control Center');
DEFINE ('_UDDEADM_SPAMCONTROL_FROM', 'From');
DEFINE ('_UDDEADM_SPAMCONTROL_TO', 'To');
DEFINE ('_UDDEADM_SPAMCONTROL_TEXT', 'Message');
DEFINE ('_UDDEADM_SPAMCONTROL_DELETE', 'Delete');
DEFINE ('_UDDEADM_SPAMCONTROL_REMOVE', 'Remove');
DEFINE ('_UDDEADM_SPAMCONTROL_DATE', 'Date');
DEFINE ('_UDDEADM_SPAMCONTROL_REPORTED', 'Reported');
DEFINE ('_UDDEIM_SPAMCONTROL_REPORT', 'Report message');
DEFINE ('_UDDEIM_SPAMCONTROL_MARKED', 'Message has been reported');
DEFINE ('_UDDEIM_SPAMCONTROL_UNREPORT', 'Recall this report');
DEFINE ('_UDDEADM_JOMSOCIAL', 'JomSocial');
DEFINE ('_UDDEADM_KUNENA', 'Kunena');
DEFINE ('_UDDEADM_ADMIN_FILTER', 'Filter');
DEFINE ('_UDDEADM_ADMIN_DISPLAY', 'Display #');
DEFINE ('_UDDEADM_TRASHORIGINALSENT_HEAD', 'Trash sent message');
DEFINE ('_UDDEADM_TRASHORIGINALSENT_EXP', 'When activated this will put a checkbox next to the \'Send\' button called \'trash message\' that is not checked by default. Users can check the box if they want to trash a message immediatly after sending it.');
DEFINE ('_UDDEIM_TRASHORIGINALSENT', 'trash message');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_4', '...set default for delete sent message, report spam, CB banned users');
DEFINE ('_UDDEADM_VERSIONCHECK_IMPORTANT', 'Important links:');
DEFINE ('_UDDEADM_VERSIONCHECK_HOTFIX', 'Hotfix');
DEFINE ('_UDDEADM_VERSIONCHECK_NONE', 'None');
DEFINE ('_UDDEADM_MAINTENANCEFIX_HEAD', "Compatibility maintenance");
DEFINE ('_UDDEADM_MAINTENANCEFIX_EXP', "uddeIM uses two XML files to ensure that packages can be installed on Joomla 1.0 and 1.5. On Joomla 1.5 one XML file is not required and this makes the extension manager to show an incompatibilty warning (which is wrong). This removes the unnecessary files, so the warning is not longer displayed.");
DEFINE ('_UDDEADM_MAINTENANCE_FIX', "FIX");
DEFINE ('_UDDEADM_MAINTENANCE_XML1', "Joomla 1.0 and Joomla 1.5 XML installers for uddeIM packages exists.<br />");
DEFINE ('_UDDEADM_MAINTENANCE_XML2', "This is required due to install packages on Joomla 1.0 and Joomla 1.5.<br />");
DEFINE ('_UDDEADM_MAINTENANCE_XML3', "Since it is not required after the installation has been finished, Joomla 1.0 installer can be removed on Joomla 1.5 systems.<br />");
DEFINE ('_UDDEADM_MAINTENANCE_XML4', "This will be done for following packages:<br />");
DEFINE ('_UDDEADM_MAINTENANCE_FXML1', "Unnecessary XML installers for following uddeIM packages will be removed:<br />");
DEFINE ('_UDDEADM_MAINTENANCE_FXML2', "No unnecessary XML installers for uddeIM packages found!<br />");
DEFINE ('_UDDEADM_SHOWMENUICONS1_HEAD', 'Appearance of menu bar');
DEFINE ('_UDDEADM_SHOWMENUICONS1_EXP', 'Here you can configure if the menu bar should be displayed with icons and/or text.');
DEFINE ('_UDDEIM_MENUICONS_P1', 'Icons and text');
DEFINE ('_UDDEIM_MENUICONS_P2', 'Icons only');
DEFINE ('_UDDEIM_MENUICONS_P0', 'Text only');
DEFINE ('_UDDEIM_LISTSLIMIT_2', 'Maximum number of recipients on list:');
DEFINE ('_UDDEADM_ADDEMAIL_ADMIN', 'Admins can select');
DEFINE ('_UDDEAIM_ADDEMAIL_SELECT', 'Notify with message');
DEFINE ('_UDDEAIM_ADDEMAIL_TITLE', 'Include complete message in email notification.');

// New: 1.6
DEFINE ('_UDDEIM_NOLISTSELECTED', 'Aucune liste d\'utilisateurs sélectionnées!');
DEFINE ('_UDDEADM_NOPREMIUM', 'Premium plugin n\'est pas installé');
DEFINE ('_UDDEIM_LISTGLOBAL_CREATOR', 'Créateur :');
DEFINE ('_UDDEIM_LISTGLOBAL_ENTRIES', 'Entrées');
DEFINE ('_UDDEIM_LISTGLOBAL_TYPE', 'Type');
DEFINE ('_UDDEIM_LISTGLOBAL_NORMAL', 'Normal');
DEFINE ('_UDDEIM_LISTGLOBAL_GLOBAL', 'Global');
DEFINE ('_UDDEIM_LISTGLOBAL_RESTRICTED', 'Restreint');
DEFINE ('_UDDEIM_LISTGLOBAL_P0', 'Liste de contact normale');
DEFINE ('_UDDEIM_LISTGLOBAL_P1', 'Liste de contact globale');
DEFINE ('_UDDEIM_LISTGLOBAL_P2', 'Liste de contact restreint (seulement les membres autorisés ont accès a cette liste)');
DEFINE ('_UDDEIM_TOOLBAR_USERSETTINGS', 'Configuration utilisateurs');
DEFINE ('_UDDEIM_TOOLBAR_REMOVESETTINGS', 'Enlever la configuration');
DEFINE ('_UDDEIM_TOOLBAR_CREATESETTINGS', 'Créer une configuration');
DEFINE ('_UDDEIM_TOOLBAR_SAVE', 'Sauver');
DEFINE ('_UDDEIM_TOOLBAR_BACK', 'Retour');
DEFINE ('_UDDEIM_TOOLBAR_TRASHMSGS', 'Poubelle');
DEFINE ('_UDDEIM_CBPLUG_CONT', '[continuer]');
DEFINE ('_UDDEIM_CBPLUG_UNBLOCKNOW', '[débloquer]');
DEFINE ('_UDDEIM_CBPLUG_DOBLOCK', 'Bloquer l\'utilisateur');
DEFINE ('_UDDEIM_CBPLUG_DOUNBLOCK', 'Débloquer l\'utilisateur');
DEFINE ('_UDDEIM_CBPLUG_BLOCKINGCFG', 'Bloqué');
DEFINE ('_UDDEIM_CBPLUG_BLOCKED', 'Vous avez bloqué cet utilisateur.');
DEFINE ('_UDDEIM_CBPLUG_UNBLOCKED', 'Cet utilisateur peut vous contacter.');
DEFINE ('_UDDEIM_CBPLUG_NOWBLOCKED', 'Cet utilisateur vous a bloqué.');
DEFINE ('_UDDEIM_CBPLUG_NOWUNBLOCKED', 'Cet utilisateur n\'est plus bloqué.');
DEFINE ('_UDDEADM_PARTIALIMPORTDONE', 'L\import partiel des messages de l\'ancien pms est effectué. Ne l\'importez pas à nouveau car cela importera les messages à nouveau et vous les aurez donc deux fois.');
DEFINE ('_UDDEADM_IMPORT_HELP', 'Note: Les messages peuvent tous être importés en une seul fois ou un par un. Un import un par un peut être nécessaire si l\'import total c\'est arrêté du a de trop nombreux messages.');
DEFINE ('_UDDEADM_IMPORT_PARTIAL', 'Import partiel:');
DEFINE ('_UDDEADM_UPDATEYOURDB', 'Important: Vous \avez pas mis a jour votre base de données! svp consultez le README pour comprendre comment mettre a jour uddeIM correctement!');
DEFINE ('_UDDEADM_RESTRALLUSERS_HEAD', 'Restreindre l\'accès à  "Tout les utilisateurs"');
DEFINE ('_UDDEADM_RESTRALLUSERS_EXP', 'Vous pouvez restreindre l\'accès a la liste "Tout les utilisateurs". Généralement la liste "Tout les utilisateurs" est disponible pour tous (<i>pas de restriction</i>).');
DEFINE ('_UDDEADM_RESTRALLUSERS_0', 'pas de restriction');
DEFINE ('_UDDEADM_RESTRALLUSERS_1', 'utilisateurs spécifiques');
DEFINE ('_UDDEADM_RESTRALLUSERS_2', 'seulement les administrateurs');
DEFINE ('_UDDEIM_MESSAGE_UNARCHIVED', 'Message non archivés.');
DEFINE ('_UDDEADM_AUTOFORWARD_SPECIAL', 'utilisateurs spécifiques');
DEFINE ('_UDDEIM_HELP', 'Aide');
DEFINE ('_UDDEIM_HELP_HEADLINE1', 'uddeIM Aide');
DEFINE ('_UDDEIM_HELP_HEADLINE2', 'Montrez une vue globale des fonctions');
DEFINE ('_UDDEIM_HELP_INBOX', '<b>Réception</b> contient tout vos messages entrant, chaque email que vous recevez arrive ici.');
DEFINE ('_UDDEIM_HELP_OUTBOX', '<b>Envoyés</b> garde une copie de tout vos messages envoyés, vous pouvez les consultez quant vous voulez et voir ainsi ce que vous avez envoyé.');
DEFINE ('_UDDEIM_HELP_TRASHCAN', '<b>Corbeille</b> contient tout les messages effacés. Les messages ne sont pas effacés immédiatement mais conservé quelques temps. Aussi longtemps que les messages sont stocké ici vous pouvez les restaurer.');
DEFINE ('_UDDEIM_HELP_ARCHIVE', '<b>Archive</b> contient tout vos messages archivés reçut. Vous pouvez seulement archivés les messages provenant de la boite de réception. Lorsque que vous voulez archivé un message que vous avez écrit, assurez vous que vous avez coché <i>copie pour moi</i> lorsque vous l\'avez envoyé.');
DEFINE ('_UDDEIM_HELP_USERLISTS', '<b>Contacts</b> permet de géré vos listes de contacts (aussi connu sous le nom de listes de distribution). Ces listes permettent d\'envoyer des MPs a plusieurs destinataire en même temps. Plutôt que de saisis plusieurs destinataire lors de l\'envoie, vous n\’avez plus qu\’a sélectionner la liste correspondante <i>#Nom de la Liste</i>.');
DEFINE ('_UDDEIM_HELP_SETTINGS', '<b>Paramètres</b> regroupe tout les options configurable de l\'utilisateur..');
DEFINE ('_UDDEIM_HELP_COMPOSE', '<b>Ecrire</b> permet de créer un nouveau message privé.');
DEFINE ('_UDDEIM_HELP_IREAD', 'Le message a était lu (vous pouvez basculer le statut).');
DEFINE ('_UDDEIM_HELP_IUNREAD', 'Le message n\'est toujours pas lu (vous pouvez basculer le statut).');
DEFINE ('_UDDEIM_HELP_OREAD', 'Le message a était lu.');
DEFINE ('_UDDEIM_HELP_OUNREAD', 'Le message n\'est toujours pas lu. Les messages non lu peuvent rappelés.');
DEFINE ('_UDDEIM_HELP_TREAD', 'Le message a était lu.');
DEFINE ('_UDDEIM_HELP_TUNREAD', 'Le message n\'est toujours pas lu.');
DEFINE ('_UDDEIM_HELP_FLAGGED', 'Le message a était marqué, par exemple si c\'est message important (vous pouvez basculer le statut).');
DEFINE ('_UDDEIM_HELP_UNFLAGGED', 'Message <i>Normal</i> (vous pouvez basculer le statut).');
DEFINE ('_UDDEIM_HELP_ONLINE', 'Le destinataire est en ligne.');
DEFINE ('_UDDEIM_HELP_OFFLINE', 'Le destinataire n\'est pas en ligne.');
DEFINE ('_UDDEIM_HELP_DELETE', 'Effacer un message (déplacer le message dans la corbeille).');
DEFINE ('_UDDEIM_HELP_FORWARD', 'Faire suivre le message a un autre destinataire.');
DEFINE ('_UDDEIM_HELP_ARCHIVEMSG', 'Archiver un message. Les messages archivés ne seront pas effacer automatiquement si l\'administrateur a défini une limite de temps pour conserver les messages.');
DEFINE ('_UDDEIM_HELP_UNARCHIVEMSG', 'De-archiver un message. Le message retournera dans la boite de réception.');
DEFINE ('_UDDEIM_HELP_RECALL', 'Rappeler un message. Les messages envoyés peuvent être rappeler s\’ils n\'ont pas encore étaient lus par leur destinataire.');
DEFINE ('_UDDEIM_HELP_RECYCLE', 'Recycler un message (déplacer un message de la corbeille ver la boite de réception ou d\'envoie).');
DEFINE ('_UDDEIM_HELP_NOTIFY', 'Paramètres de la notification par email lorsqu\'un message est reçut.');
DEFINE ('_UDDEIM_HELP_AUTORESPONDER', 'Quant le répondeur est validé chaque message reçut aura automatiquement une réponse.');
DEFINE ('_UDDEIM_HELP_AUTOFORWARD', 'Les nouveaux messages seront re diriger vers un autre destinataire.');
DEFINE ('_UDDEIM_HELP_BLOCKING', 'Vous pouvez bloquer des utilisateurs. Ces utilisateurs ne pourront pas vous envoyer de message.');
DEFINE ('_UDDEIM_HELP_MISC', 'Ici vous trouverez d\'autre paramètres');
DEFINE ('_UDDEIM_HELP_FEED', 'Vous pouvez accéder a votre boite par un flux RSS.');
DEFINE ('_UDDEADM_SEPARATOR_HEAD', 'Séparateur');
DEFINE ('_UDDEADM_SEPARATOR_EXP', 'Sélectionner le séparateur pour plusieurs destinataires (par default ",").');
DEFINE ('_UDDEADM_SEPARATOR_P0', 'virgule (default)');
DEFINE ('_UDDEADM_SEPARATOR_P1', ' demi colonne');
DEFINE ('_UDDEADM_RSSLIMIT_HEAD', 'RSS Objet');
DEFINE ('_UDDEADM_RSSLIMIT_EXP', 'Limiter le nombre d\'objets renvoyer par le flux RSS (0 pour aucune limite).');
DEFINE ('_UDDEADM_SHOWHELP_HEAD', 'Montre le bouton d\'aide');
DEFINE ('_UDDEADM_SHOWHELP_EXP', 'Lorsque validé le bouton d\'aide est affiché.');
DEFINE ('_UDDEADM_SHOWIGOOGLE_HEAD', 'Monter le bouton iGoogle gadget');
DEFINE ('_UDDEADM_SHOWIGOOGLE_EXP', 'Lorsque le bouton <i>Ajouter à iGoogle</i> est validé, le bouton  uddeIM iGoogle gadget est affiché dans les préférences de l\'utilisateur.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE11', 'ne pas charger MooTools (1.1 est utilisé)');
DEFINE ('_UDDEADM_MOOTOOLS_NONE12', 'ne pas charger MooTools (1.2 est utilisé)');
DEFINE ('_UDDEIM_RSS_INTRO1', 'Vous pouvez accéder a votre boite de réception en utilisant un flux RSS (0.91).');
DEFINE ('_UDDEIM_RSS_INTRO1B', 'L\'adresse est:');
DEFINE ('_UDDEIM_RSS_INTRO2', 'Ne donner pas cette adresse a d\’autres utilisateurs car ils pourraient accéder à vos messages.');
DEFINE ('_UDDEIM_RSS_FEED', 'Flux de message RSS');
DEFINE ('_UDDEIM_RSS_NOOBJECT', 'Pas d\'erreur objet...');
DEFINE ('_UDDEIM_RSS_USERBLOCKED', 'Utilisateur bloqué...');
DEFINE ('_UDDEIM_RSS_NOTALLOWED', 'L\'accès n\'est pas autorisé...');
DEFINE ('_UDDEIM_RSS_WRONGPASSWORD', 'Mauvais nom ou mot de passe...');
DEFINE ('_UDDEIM_RSS_NOMESSAGES', 'Pas de messages');
DEFINE ('_UDDEIM_RSS_NONEWMESSAGES', 'Aucun nouveaux messages');
DEFINE ('_UDDEADM_ENABLERSS_HEAD', 'Valider RSS');
DEFINE ('_UDDEADM_ENABLERSS_EXP', 'Lorsque cette option est validé, les messages peuvent être reçut par un flux RSS. Les utilisateurs peuvent trouver cette adresse sur leur profile.');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_3', '... est mis par défaut pour le flux RSS, iGoogle, aide, séparateur');
DEFINE ('_UDDEADM_DELETEM_DELETING', 'Effacer les messages:');
DEFINE ('_UDDEADM_DELETEM_FROMUSER', 'Effacer les messages de cet utilisateur ');
DEFINE ('_UDDEADM_DELETEM_MSGSSENT', '- messages envoyés: ');
DEFINE ('_UDDEADM_DELETEM_MSGSRECV', '- messages reçut: ');
DEFINE ('_UDDEIM_PMNAV_THISISARESPONSE', 'C\'est une réponse a:');
DEFINE ('_UDDEIM_PMNAV_THEREARERESPONSES', 'Réponses a:');
DEFINE ('_UDDEIM_PMNAV_DELETED', 'Message non disponible');
DEFINE ('_UDDEIM_PMNAV_EXISTS', 'Allez au message');
DEFINE ('_UDDEIM_PMNAV_COPY2ME', '(Copier)');
DEFINE ('_UDDEADM_PMNAV_HEAD', 'Autoriser la navigation');
DEFINE ('_UDDEADM_PMNAV_EXP', 'Montre une barre de navigation qui permet de naviguer a travers un message.');
DEFINE ('_UDDEADM_MAINTENANCE_ALLDAYS', 'Messages:');
DEFINE ('_UDDEADM_MAINTENANCE_7DAYS', 'Messages depuis 7 jours:');
DEFINE ('_UDDEADM_MAINTENANCE_30DAYS', 'Messages depuis 30 jours:');
DEFINE ('_UDDEADM_MAINTENANCE_365DAYS', 'Messages depuis 365 jours:');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD1', 'Envoyer un rappel a (Ne pas oublier: %s days):');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD2', 'dans %s jours envoyer un rappel a:');
DEFINE ('_UDDEADM_MAINTENANCE_NO', 'Non:');
DEFINE ('_UDDEADM_MAINTENANCE_USERID', 'Utilisateur ID:');
DEFINE ('_UDDEADM_MAINTENANCE_TONAME', 'Nom:');
DEFINE ('_UDDEADM_MAINTENANCE_MID', 'Message ID:');
DEFINE ('_UDDEADM_MAINTENANCE_WRITTEN', 'Ecrit:');
DEFINE ('_UDDEADM_MAINTENANCE_TIMER', 'Retardateur:');

// New: 1.5
DEFINE ('_UDDEMODULE_ALLDAYS', ' messages');
DEFINE ('_UDDEMODULE_7DAYS', ' messages depuis 7 jours');
DEFINE ('_UDDEMODULE_30DAYS', ' messages depuis 30 jours');
DEFINE ('_UDDEMODULE_365DAYS', ' messages depuis 365 jours');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_WARNING', '<br /><b>Note:<br />Si mosMail est utilisé, vous avez a saisir un email valide!</b>');
DEFINE ('_UDDEIM_FILTEREDMESSAGE', 'message filtré');
DEFINE ('_UDDEIM_FILTEREDMESSAGES', 'messages filtrés');
DEFINE ('_UDDEIM_FILTER', 'Filtre:');
DEFINE ('_UDDEIM_FILTER_TITLE_INBOX', 'Montrer seulement de cet utilisateur');
DEFINE ('_UDDEIM_FILTER_TITLE_OUTBOX', 'Montrer seulement a cet utilisateur');
DEFINE ('_UDDEIM_FILTER_UNREAD_ONLY', 'non lus seulement');
DEFINE ('_UDDEIM_FILTER_SUBMIT', 'Filtre');
DEFINE ('_UDDEIM_FILTER_ALL', '- tous -');
DEFINE ('_UDDEIM_FILTER_PUBLIC', '- utilisateurs public -');
DEFINE ('_UDDEADM_FILTER_HEAD', 'Valider le filtre');
DEFINE ('_UDDEADM_FILTER_EXP', 'Si  cela est validé les utilisateurs peuvent filtrés leurs messages entrant et sortant pour ne montre que ceux reçut ou envoyés.');
DEFINE ('_UDDEADM_FILTER_P0', 'désactivé');
DEFINE ('_UDDEADM_FILTER_P1', 'en-dessous de la liste des messages');
DEFINE ('_UDDEADM_FILTER_P2', 'au dessus de la liste des messages');
DEFINE ('_UDDEADM_FILTER_P3', 'en-dessous et au dessus de la liste');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED', '<b>Vous avez no%s messages%s dans votre%s.</b>');	// see next also six lines
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_UNREAD', ' non lus');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_FROM', ' de cet utilisateur');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_TO', ' a cet utilisateur');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_INBOX', ' réception');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_OUTBOX', ' envoie');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_ARCHIVE', ' archive');
DEFINE ('_UDDEIM_TODP_TITLE', 'Destinataires');
DEFINE ('_UDDEIM_TODP_TITLE_CC', 'Un ou plus de destinataires (virgule pour séparer)');
DEFINE ('_UDDEIM_ADDCCINFO_TITLE', 'Lorsque valider tout les destinataires seront ajouter aux messages.');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_2', '...mettre par défaut le répondeur, la redirection, l\'inputbox, le filtrage');
DEFINE ('_UDDEADM_AUTORESPONDER_HEAD', 'Valider le répondeur');
DEFINE ('_UDDEADM_AUTORESPONDER_EXP', 'Lorsque le répondeur est validé l\'utilisateur peut envoyer un message automatique a configuré dans les réglages personnels.');
DEFINE ('_UDDEIM_EMN_AUTORESPONDER', 'Valider le répondeur');
DEFINE ('_UDDEIM_AUTORESPONDER', 'Répondeur');
DEFINE ('_UDDEIM_AUTORESPONDER_EXP', 'Lorsque le répondeur est validé tout les messages reçut auront immédiatement une réponse.');
DEFINE ('_UDDEIM_AUTORESPONDER_DEFAULT', "Je ne suis pas la pour le moment.\nJe vérifierai mes messages des que possible.");
DEFINE ('_UDDEADM_USERSET_AUTOR', 'Auteur');
DEFINE ('_UDDEADM_USERSET_SELAUTOR', '- Auteur -');
DEFINE ('_UDDEIM_USERBLOCKED', 'Utilisateurs bloqués.');
DEFINE ('_UDDEADM_AUTOFORWARD_HEAD', 'Valider la redirection');
DEFINE ('_UDDEADM_AUTOFORWARD_EXP', 'Lorsque la redirection est validé l\'utilisateur peut rédiger ses messages a un autre utilisateur automatiquement.');
DEFINE ('_UDDEIM_EMN_AUTOFORWARD', 'Valider la redirection');
DEFINE ('_UDDEADM_USERSET_AUTOF', 'AutoF');
DEFINE ('_UDDEADM_USERSET_SELAUTOF', '- AutoF -');
DEFINE ('_UDDEIM_AUTOFORWARD', 'Redirection');
DEFINE ('_UDDEIM_AUTOFORWARD_EXP', 'Les nouveaux messages peuvent être redirigé automatiquement a un autre utilisateur.');
DEFINE ('_UDDEIM_THISISAFORWARD', 'La redirection du message envoyé a ');
DEFINE ('_UDDEADM_COLSROWS_HEAD', 'Boite de messagerie (colonne/ligne)');
DEFINE ('_UDDEADM_COLSROWS_EXP', 'Cela déterminera les colonnes et lignes de la boite de messagerie (les valeurs par défait sont 60/10).');
DEFINE ('_UDDEADM_WIDTH_HEAD', 'Boite de messagerie (largeur)');
DEFINE ('_UDDEADM_WIDTH_EXP', 'Cela déterminera la largeur de la boite de messagerie en px (par défaut 0). Si la valeur est a 0, la largeur sera déterminé par le style CSS qui est utilisé.');
DEFINE ('_UDDEADM_CBE', 'CB Valide');

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'IMPORTER');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'Charger MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'Cela va configurer comment uddeIM chargera MooTools (MooTools est nécessaire pour Auto compléter): <i>Aucun</i> cela est utilisé si votre template charge MooTools, <i>Auto</i> est recommandé par défaut (comme auparavant dans uddeIM 1.2), si vous utilisez  J1.0 vous pouvez aussi forcez  MooTools 1.1 ou 1.2.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'Ne pas charger MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'auto');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'Forcer le chargement de MooTools 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'Forcer le chargement de MooTools 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...réglage par défaut pour MooTools');
DEFINE ('_UDDEADM_AGORA', 'Agora');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Base64 encoded');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Régler le fuseau horaire');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'Lorsque uddeIM affiche la mauvaise heure, vous pouvez régler le fuseau horaire ici. Généralement, si tout est configuré correctement, ceci devrait être zéro. Néanmoins, dans certains cas vous devrez changer cette valeur.');
DEFINE ('_UDDEADM_HOURS', 'heures');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Version :');
DEFINE ('_UDDEADM_STATISTICS', 'Statistiques :');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Afficher les statistiques');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Ceci affiche quelques statistiques comme le nombre de messages archivés, etc.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'VOIR LES STATS');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Messages enregistrés dans la base de données : ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Messages supprimés par le destinataire : ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Messages supprimés par l\'expéditeur: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Messages en attente de purge : ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Contourner Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'Généralement, uddeIM essaie de détecter le bon Itemid lorsqu\'il n\'est pas réglé. Dans certains cas, il se peut qu\'il soit nécessaire de forcer cette valeur, par exemple lorsque vous avez plusieurs liens de menu vers uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'L\'Itemid détecté est : ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Utiliser l\'Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Utiliser cet Itemid au lieu de celui détecté.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Utiliser les liens vers les profils');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Lorsque <i>oui</i> est sélectionné, tous les pseudos affichés dans uddeIM seront affichés comme liens vers le profil de l\'utilisateur.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Voir les portraits');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'Lorsque <i>oui</i> est sélectionné, le portrait de l\'utilisateur sera affiché pendant la lecture des messages.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Voir les portraits dans les listes');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Cochez <i>oui</i> si vous souhaitez afficher les portrais des utilisateurs dans les listes de messages (Boîte de réception, Boîte d\'envoi, etc.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Désactivé');
DEFINE ('_UDDEADM_ENABLED', 'Activé');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Important');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Permettre les tags de messages');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Permet la classification des messages (uddeIM affiche une étoile dans les listes qui peut être mise en surbrillance pour indiquer les messages importants).');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Important : Lorsque vous avez mis à jour uddeIM depuis une version précédente, merci de lire le fichier README. Parfois vous devrez ajouter ou changer des tables ou des champs de la base de données !');
DEFINE ('_UDDEIM_ADDCCINFO', 'Ajouter une ligne de CC:');
DEFINE ('_UDDEIM_CC', 'CC :');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Raccourcir le texte cité');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Raccourcir le texte cité à 2/3 de la longueur maximum si elle dépasse la limite.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Messages reçus ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Dernier(s) ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' message(s)');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Statut');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Expéditeur');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Message');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Aucun message reçu');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Accès à la corbeille interdit.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Limiter l\'emploi de la corbeille');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'Vous pouvez limiter l\'accès à la corbeille. Celle-ci est normalement disponible pour tous (<i>pas de restriction</i>). Vous pouvez limiter cette fonction aux utilisateurs spéciaux ou aux seuls admins, les groupes de rang inférieur ne pourront pas récupérer un message.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'pas de restriction');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'utilisateurs spéciaux');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'admins seuls');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Masquer des utilisateurs dans la liste');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Indiquez les ID des utilisateurs à masquer dans la liste sur l\'accès public (p.ex. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Masquer des utilisateurs dans la liste');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Indiquez les ID des utilisateurs à masquer dans la liste (p.ex. 65,66,67). Les administrateurs verront toujours la liste.');
DEFINE ('_UDDEIM_ERRORCSRF', 'Attaque CSRF détectée');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'Protection CSRF');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'Protection contre les attaques Cross-Site Request Forgery. Ceci devrait être validé, ne le retirez que pour diagnostiquer des problèmes étranges.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Vous ne pouvez pas répondre à un message archivé.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Les réponses aux utilisateurs externes ne peuvent pas être rappelées.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Autoriser les réponses');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Autoriser les réponses directes aux messages des utilisateurs externes.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Bonjour %you%,\n\n%user% vous a envoyé le message suivant sur site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Montrer les noms réels');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Montrer les noms réels ou les pseudos dans l\'accès public ?');
DEFINE ('_UDDEIM_USERLIST', 'Liste d\'utilisateurs');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Désolé, vous devez attendre avant de pouvoir envoyer un nouveau message');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Dernier envoi');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Délai');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Délai d\'attente en secondes avant qu\'un utilisateur puisse envoyer à nouveau un message (0 pour aucun délai).');
DEFINE ('_UDDEADM_SECONDS', 'secondes');
DEFINE ('_UDDEIM_PUBLICSENT', 'Message envoyé.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Erreur dans le nom d\'expéditeur');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Erreur dans l\'adresse email');
DEFINE ('_UDDEIM_YOURNAME', 'Votre nom:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Votre email:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Vous utilisez uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'Vous utilisez déjà la dernière version de uddeIM.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'La version actuelle est ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Informations de mise à jour:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Vérifier les mises à jour');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'Cette option contacte le site de développement uddeIM uniquement pour connaître la version courante. Aucune autre information que le numéro de version que vous utilisez n\'est transmise.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'VERIFIER');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Impossible de recevoir le numéro de la version actuelle.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Pas de liste de contact trouvée!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Vous avez dépassé le nombre maximum de destinataires (max. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Nombre max. de destinataires');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Nombre max. de destinataires dans une liste de contacts.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Listes de contacts désactivées');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Listes de contacts activées');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM permet la création de listes de contacts. Ces listes permettent l\'envoi de messages à plusieurs destinataires, mais n\'oubliez pas dans ce cas d\'autoriser les destinataires multiples.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'désactivé');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'utilisateurs enregistrés');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'utilisateurs spéciaux');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'admins uniquement');
DEFINE ('_UDDEIM_LISTSNEW', 'Créer une nouvelle liste de contacts');
DEFINE ('_UDDEIM_LISTSSAVED', 'Liste de contacts archivée');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Liste de contacts mise à jour');
DEFINE ('_UDDEIM_LISTSDESC', 'Description');
DEFINE ('_UDDEIM_LISTSNAME', 'Nom');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Nom (sans espaces)');
DEFINE ('_UDDEIM_EDITLINK', 'modifier');
DEFINE ('_UDDEIM_LISTS', 'Contacts');
DEFINE ('_UDDEIM_STATUS_READ', 'lu');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'non lu');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'connecté');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'déconnecté');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'Montrer les images de la galerie CB');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'Par défaut uddeIM ne montre que les avatars uploadés par les utilisateurs. Ici vous autorisez à afficher aussi les images de la galerie d\'avatars de CB.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'Débloquer les connexions CB');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'Vous pouvez autoriser les messages aux destinataires qui ont l\'expéditeur dans leur liste de connexions CB (même si le destinataire appartient à un groupe normalement bloqué pour cet expéditeur).  Ce réglage est indépendant des blocages définis individuellement par chaque utilisateur (si autorisé, voir plus haut).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'Vous ne pouvez pas envoyer de message à ce groupe.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'Le destinataire a bloqué la réception de vos messages.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Groupes bloqués (utilisateurs enregistrés)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Groupes auxquels les utilisateurs enregistrés ne peuvent pas envoyer de messages. Ceci ne concerne que les utilisateurs enregistrés. Les utilisateurs spéciaux et les admins ne sont pas concernés. Ce réglage est indépendant des blocages définis individuellement par chaque utilisateur (si autorisé, voir plus haut).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Groupes bloqués (externes)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Groupes auxquels les utilisateurs externes ne peuvent pas envoyer de messages. Ce réglage est indépendant des blocages définis individuellement par chaque utilisateur (si autorisé, voir plus haut). Quand un groupe est bloqué, ces utilisateurs n\'ont pas l\'option d\'autoriser l\'accès public dans leurs paramètres.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Utilisateur externe');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'Connexion CB');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Utilisateur enregistré');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Auteur');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Editeur');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Publisher');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Manager');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Admin');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'SuperAdmin');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'Cet utilisateur n\'accepte pas de messages des utilisateurs non enregistrés.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Cacher dans la liste "Montrer les utilisateurs" publique');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'Vous pouvez masquer certains groupes dans la liste "Montrer les utilisateurs" publique. Note: les noms sont cachés mais ces utilisateurs peuvent recevoir des messages. Les utilisateurs qui n\'ont pas autorisé l\'accès public n\'apparaîtront jamais dans cette liste.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Masquer dans la liste "Montrer les utilisateurs"');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'Vous pouvez masquer certains groupes dans la liste "Montrer les utilisateurs" publique. Note: les noms sont cachés mais ces utilisateurs peuvent recevoir des messages.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'aucun');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'superadmins seuls');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'admins seuls');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'utilisateurs spéciaux');
DEFINE ('_UDDEADM_PUBLIC', 'externes');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Comportement du lien "Montrer les utilisateurs"');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Définir si le lien "Montrer les utilisateurs" doit apparaître ou être masqué dans l\'accès public.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Accès public');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- sélectionner public -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Permet aux utilisateurs externes d\'envoyer un message');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Limite atteinte!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Utilisateur externe');
DEFINE ('_UDDEIM_DELETEDUSER', 'Utilisateur effacé');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Longueur anti-spam');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Spécifie combien de caractères sont demandés.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Protection anti-spam');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Indiquez qui doit entrer un code de sécurité avant d\'envoyer un message');
DEFINE ('_UDDEADM_CAPTCHAF0', 'personne');
DEFINE ('_UDDEADM_CAPTCHAF1', 'externes uniquement');
DEFINE ('_UDDEADM_CAPTCHAF2', 'externes et enregistrés');
DEFINE ('_UDDEADM_CAPTCHAF3', 'externes, enregistrés, spéciaux');
DEFINE ('_UDDEADM_CAPTCHAF4', 'tous (admins aussi)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Activer l\'accès public');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'Si activé, les utilisateurs externes peuvent envoyer des messages aux utilisateurs enregistrés (ceux-ci peuvent préciser dans leurs paramètres s\'ils le permettent).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Accès public par défaut');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'Valeur par défaut lorsqu\'un utilisateur externe peut envoyer un message  un utilisateur enregistré.');
DEFINE ('_UDDEADM_PUBDEF0', 'désactivé');
DEFINE ('_UDDEADM_PUBDEF1', 'activé');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Code de sécurité erroné');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'aucun ou inconnu');
DEFINE ('_UDDEADM_DONATE', 'Si vous appréciez uddeIM et voulez supporter son développement veuillez faire une petite donation.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Configuration trouvée dans la base de données: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Sauvegarde et restauration de la configuration');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Vous pouvez sauvegarder votre configuration dans la base de donnée et la restaurer quand c\'est nécessaire. Ceci est utile quand vous mettez à jour uddeIM ou quand vous voulez sauvegarder une certaine configuration pour faire des tests.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'SAUVEGARDER');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'RESTAURER');
DEFINE ('_UDDEADM_CANCEL', 'Annuler');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Jeu de caractère du fichier de langue');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Habituellement le paramètre par <strong>defaut</strong> (ISO-8859-1) est bon pour Joomla 1.0 et <strong>UTF-8</strong> pour Joomla 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'par défaut');
DEFINE ('_UDDEIM_READ_INFO_1', 'Les messages lus resteront dans la boite de réception pendant ');
DEFINE ('_UDDEIM_READ_INFO_2', ' jours max. avant d\'être supprimé automatiquement.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Les messages non lus resteront dans la boite de réception pendant ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' jours max. avant d\'être supprimé automatiquement.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Les messages envoyés resteront dans la boite d\'envoi pendant ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' jours max. avant d\'être supprimé automatiquement.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Montrer la note sur les messages lus');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Montrer la note "Les messages lus seront effacés après n jours"');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Montrer la note sur les messages non-lus');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Montrer la note "Les messages non-lus seront effacés après n jours"');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Montrer la note sur les messages envoyés');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Montrer la note "Les messages envoyés seront effacés après n jours"');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Montrer la note sur les messages supprimés');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Montrer la note "Les messages supprimés seront effacés après n jours"');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Les messages envoyés sont gardés pendant (jours)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Entrer le nombre de jours avant que les messages <b>envoyés</b> seront automatiquement supprimés de la boite d\'envoi.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'envois à tous les utilisateurs spéciaux');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Message pour <strong>tous les utilisateurs spèciaux</strong>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- sélectionner le nom d\utilisateur -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- sélectionner le nom -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Editer les paramètres de l\utilisateur');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'existant');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'non existant');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- sélectionner une entrée -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- selectionner une notification -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- sélectionner un popup -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Nom d\'utilisateur');
DEFINE ('_UDDEADM_USERSET_NAME', 'Nom');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Notification');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Popup');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Dernier accès');
DEFINE ('_UDDEADM_USERSET_NO', 'Non');
DEFINE ('_UDDEADM_USERSET_YES', 'Oui');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'Inconnu');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Lorsque hors-ligne (excepter les réponses)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Toujours (excepter les réponses)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Lorsque hors-ligne');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Toujours');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Pas de notification');
DEFINE ('_UDDEADM_WELCOMEMSG', "Bienvenue dans uddeIM!\n\nVous avez avec succès installé uddeIM.\n\nEssayer de voir ce message avec différents templates. Vous pouvez paramétrer ceci dans la partie administration de uddeIM.\n\nuddeIM est un projet en développement. Si vous trouvez des bugs ou une faille, veuillez m\'écrire pour que je rende uddeIM meilleur.\n\nBonne chance et passer un bon moment!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'L\'installation de uddeIM est complète.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Veuillez continuer sur la partie administration et vérifiez les paramètres.');
DEFINE ('_UDDEADM_REVIEWLANG', 'Si vous faites fonctionner le CMS dans un jeu de caractère autre que ISO 8859-1 assurez-vous d\'ajuster les paramètres avec attention.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'Après l\'installation, tout le trafic email d\'uddeIM (notifications d\’email, fotgetmenot emails) est désactivé donc aucun emails n\est envoyé tant que vous faites des tests. N\'oubliez pas de désactiver "stop email" dans la partie administration lorsque vous avez fini.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Destinataires max.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Nombre max. de destinataires autorisé par message (0=pas de limitation)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'Trop de destinataires');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Envoi d\'emails désactivé.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Chercher tout le texte');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'L\'autocompleteur cherche dans tout le texte (sinon depuis le début seulement)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'Autoriser le lien "Montrer les utilisateurs"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Choisissez si le lien "Montrer les utilisateurs" doit être supprimé, affiché ou si tous les utilisateurs doivent être toujours visibles.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Supprimer le lien "Montrer les utilisateurs');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Montrer le lien "Montrer les utilisateurs');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'toujours afficher tous les utilisateurs');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'La configuration n\'est pas "modifiable":');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'La configuration est "modifiable":');
DEFINE ('_UDDEIM_FORWARDLINK', 'Transférer');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'Destinataire trouvé');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'Destinataires trouvés');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (par defaut)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Système de courrier');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'Sélectionnez le système de courrier pour qu\'uddeIM puisse envoyer des notifications.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Montrer les groupes sous Joomla');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Montrer les groupes sous Joomla dans une liste.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Transfert des messages');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Autoriser les transferts de messages.');
DEFINE ('_UDDEIM_FWDFROM', 'Message original de');
DEFINE ('_UDDEIM_FWDTO', 'pour');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Message non archivé');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Impossible d\'enlever le message en tant qu\'archive');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Autoriser plusieurs destinataires');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Autoriser plusieurs destinataires (séparés par des virgules).');
DEFINE ('_UDDEIM_CHARSLEFT', 'Caractères restant');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Montrer un compteur');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Montrer un compteur qui affiche le nombre de caractères restant.');
DEFINE ('_UDDEIM_CLEAR', 'Effacer les destinataires');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Ajouter à la liste des destinataires sélectionnés');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Permettre la sélection de destinataires multiples.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Ajouter les connexions sélectionnées à la liste');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Permettre la sélection de destinataires multiples.');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS trouvé: ');
DEFINE ('_UDDEIM_ENTERNAME', 'entrer un nom');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Utiliser la saisie semi-automatique');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Utiliser la saisie semi-automatique pour les noms des destinataires.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Clés utilisés pour occulter');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Entrez la clé qui est utilisée pour brouiller le message. Ne pas changer cette valeur après que le brouillage du message a été activée.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Mauvais fichier de configuration trouvé!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Version trouvée:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Version attendue:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Conversion de la configuration...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Fait!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Erreur critique: Echec d\'écriture dans le fichier de configuration:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Message cryptè! - Téléchargement impossible!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Mauvais mot de passe! - Téléchargement impossible!');
DEFINE ('_UDDEIM_WRONGPW', 'Mauvais mot de passe! - Veuillez contacter l\'administrateur de la base de donnée!');
DEFINE ('_UDDEIM_WRONGPASS', 'Mauvais mot de passe!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Mauvaises dates de suppression (boite de réception/boite de réception): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Correction des mauvaises dates de suppression');
DEFINE ('_UDDEIM_TODP', 'A: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Purger les messages maintenant');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Montrer les icônes d\'action');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'Si vous sélectionnez <i>oui</i>, le lien actif sera afficher par un icone.');
DEFINE ('_UDDEIM_UNCHECKALL', 'De sélectionner');
DEFINE ('_UDDEIM_CHECKALL', 'check all');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Montrer les icones en dessous');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'Si vous sélectionnez <i>oui</i>, le lien en dessous sera afficher par un icone.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Utiliser smileys animés');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Utiliser smileys animés au lieu des statiques.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'Plus de smileys animés');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Montrer plus de smileys animés.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Message crypté  - Mot de passe requis');
DEFINE ('_UDDEIM_PASSWORD', 'Mot de passe requis');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Mot de passe');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (texte crypté)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (texte décrypté)');
DEFINE ('_UDDEIM_MORE', 'PLUS');
// uddeIM Module
define ('_UDDEMODULE_PRIVATEMESSAGES', 'Messagerie privée');
define ('_UDDEMODULE_NONEW', 'Aucun nouveau message');
define ('_UDDEMODULE_NEWMESSAGES', 'Nouveaux messages: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'message');
DEFINE ('_UDDEMODULE_MESSAGES', 'messages');
DEFINE ('_UDDEMODULE_YOUHAVE', 'Vous avez');
DEFINE ('_UDDEMODULE_HELLO', 'Salut');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Message Express');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Type de cryptage');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Permet de crypter les messages stockés. Le brouillage des messages permet d\'empêcher un administrateur de lire accidentellement les messages mais n\'assure pas réellement la sécurité des données sauvegardées.');
DEFINE ('_UDDEADM_CRYPT0', 'Aucun');
DEFINE ('_UDDEADM_CRYPT1', 'Brouiller les messages');
DEFINE ('_UDDEADM_CRYPT2', 'Crypter les messages');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Notification email par défaut');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Valeur par défaut pour la notification email (valable uniquement pour les utilisateurs qui n\'ont pas encore utilisé UDDEIM).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Pas de notification');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Toujours');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Notification quand déconnecté');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Supprimer le lien "Tous les utilisateurs"');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Supprime le lien "Tous les utilisateurs" pour un nouveau message (utile quand beaucoup d\'utilisateurs sont enregistrés).');
DEFINE ('_UDDEADM_POPUP_HEAD','Popup de notification');
DEFINE ('_UDDEADM_POPUP_EXP','Affiche une popup lors de l\'arrivée de nouveaux messages');
DEFINE ('_UDDEIM_OPTIONS', 'Options avancées');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Paramètres avancés de votre messagerie privée :');
DEFINE ('_UDDEIM_OPTIONS_P', 'Afficher une popup lors de l\'arrivée de nouveaux messages');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Notification par pop-up par default');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Valider la notification par pop-up par défaut (pour les utilisateurs qui n\'ont pas encore modifié leur paramètres).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Maintenance');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Maintenance de la base de données');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'VERIFIER');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'REPARER');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "Quand un utilisateur est purgé de la base de donnée ses messages sont habituellement gardés dans la base de donnée. Cette fonction vérifié si c\'est nécessaire de supprimer les messages orphelins et vous pouvez supprimer ceux-ci si vous le désirez.<br />Ceci vérifie aussi la base de donnée pour que les erreurs seront bien corrigées.");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "Vérification...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (Nom d\'utilisateur): [inbox|inbox trashed|outbox|outbox trashed]</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>boite de réception: les messages sont stockés dans la boite de reception des utilisateurs</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>boite de réception supprimée: les messages sont supprimés de la boite de réception des utilisateurs, mais toujours présents dans la boite d\'envois</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>boite d'envois: les messages sont stockés dans la boite d\'envois des utilisateurs</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>boite d'envois supprimée: les messages sont supprimés de la boite de réception des utilisateurs, mais toujours présents dans la boite de réception</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "Suppression...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "pas trouvé (from/to/settings/blocker/blocked):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "supprimer toutes les préférences d\'un utilisateur");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "supprimer le blocage d\'un utilisateur");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "supprime tous les messages envoyés par un utilisateur supprimé dans sa boite d\'envois et réception et supprimé la boite de l\'utilisateur");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "supprime tous les messages envoyés par un utilisateur supprimé dans sa boite d\'envois et de réception");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Rien à faire</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Nettoyage requis</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Noms réels');
DEFINE ('_UDDEADM_NAMESDESC', 'Montrer les noms d\'utilisateur ou les noms réels ?');
DEFINE ('_UDDEADM_REALNAMES', 'Noms réels');
DEFINE ('_UDDEADM_USERNAMES', 'Noms d\'utilisateur');
DEFINE ('_UDDEADM_CONLISTBOX', 'Liste de connexions');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Montrer mes connexions sous forme de listbox ou de tableau ?');
DEFINE ('_UDDEADM_LISTBOX', 'Listbox');
DEFINE ('_UDDEADM_TABLE', 'Tableau');
DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Les messages resteront dans la corbeille 24 heures avant d\'être supprimées. Vous pouvez seulement voir les premiers mots des messages. Pour lire la totalité du message vous devrez d\'abord le restaurer.');
define ('_UDDEIM_TRASHCAN_INFO_1', 'Les messages resteront dans la corbeille pendant ');
define ('_UDDEIM_TRASHCAN_INFO_2', ' heures avant d\'être supprimés. Seule la première partie du message est visible. Pour le voir en entier, vous devez d\'abord le restaurer.');
define ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Ce message a été restauré. Vous pouvez l\'éditer et le renvoyer.');
define ('_UDDEIM_COULDNOTRECALL', 'Ce message ne peut être restauré (il a probablement été déjà lu ou effacé.)');
define ('_UDDEIM_CANTRESTORE', 'La récupération du message a échoué. ( Il peut s\'agir d\'un message longtemps resté dans le corbeille et effacé entretemps .)');
define ('_UDDEIM_COULDNOTRESTORE', 'La récupération du message a échoué.');
define ('_UDDEIM_DONTSEND', 'Annuler l\'envoi');
define ('_UDDEIM_SENDAGAIN', 'Envoyer');
define ('_UDDEIM_NOTLOGGEDIN', ' Vous n\'êtes pas identifié(e).');
define ('_UDDEIM_NOMESSAGES_INBOX', 'Boîte de réception vide.');
define ('_UDDEIM_NOMESSAGES_OUTBOX', 'Boîte d\'envoi vide.');
define ('_UDDEIM_NOMESSAGES_TRASHCAN', 'Corbeille vide.');
define ('_UDDEIM_INBOX', 'Reçus');
define ('_UDDEIM_OUTBOX', 'Envoyés');
define ('_UDDEIM_TRASHCAN', 'Corbeille');
define ('_UDDEIM_CREATE', 'Nouveau');
define ('_UDDEIM_UDDEIM', 'Messagerie privée');
	// this is the headline/name of the component as it appears in Mambo

define ('_UDDEIM_READSTATUS', 'lu');
	// as in 'this message has been "read"'

define ('_UDDEIM_FROM', 'De');
define ('_UDDEIM_FROM_SMALL', 'de');
define ('_UDDEIM_TO', 'À');
define ('_UDDEIM_TO_SMALL', 'à');
define ('_UDDEIM_OUTBOX_WARNING', ' La boîte d\'envoi contient tous les messages envoyés qui ne sont pas encore supprimés. Vous pouvez les modifier tant qu\’ils ne sont pas encore lus. Ils ne peuvent pas être lus par leurs destinataires pendant l\'édition. ');
define ('_UDDEIM_RECALL', 'Editer');
define ('_UDDEIM_RECALLTHISMESSAGE', 'Editer ce message');
define ('_UDDEIM_RESTORE', 'Restaurer');
define ('_UDDEIM_MESSAGE', 'Message');
define ('_UDDEIM_DATE', 'Date');
define ('_UDDEIM_DELETED', 'Effacé');
define ('_UDDEIM_DELETE', 'effacer');
define ('_UDDEIM_DELETELINK', 'Effacer');
define ('_UDDEIM_MESSAGENOACCESS', 'Ce message ne peut être supprimé. <br />Raisons possibles:<ul><li> Vous n\'avez pas le droit de lire ce message particulier</li><li> Ce message a été supprimé</li></ul>');
define ('_UDDEIM_YOUMOVEDTOTRASH', '<b> Vous avez déplacé ce message dans le corbeille.</b>');
define ('_UDDEIM_MESSAGEFROM', 'Message de ');
define ('_UDDEIM_MESSAGETO', 'Mon message à ');
define ('_UDDEIM_REPLY', 'Répondre');
define ('_UDDEIM_SUBMIT', 'Envoyer');
DEFINE ('_UDDEIM_DELETEREPLIED', 'Après une réponse, déplacer le message original dans la corbeille');
define ('_UDDEIM_NOMESSAGE', 'Erreur: Le message ne contient aucun texte ! Le message n\'a pas été envoyé.');
define ('_UDDEIM_MESSAGE_REPLIEDTO', 'Réponse envoyée');
define ('_UDDEIM_MESSAGE_SENT', 'Message envoyé');
define ('_UDDEIM_MOVEDTOTRASH', ' et l\'original déplacé dans le corbeille');
define ('_UDDEIM_NOSUCHUSER', ' Identifiant inconnu !');
define ('_UDDEIM_NOTTOYOURSELF', ' L\'envoi de message à soi-même n\'est pas permis!');
define ('_UDDEIM_PRUNELINK', 'Administrateur seulement : Nettoyer');
define ('_UDDEIM_BLOCKS', 'Bloqué');
define ('_UDDEIM_YOUAREBLOCKED', 'Non envoyé (Vous êtes bloqué par le destinataire)');
define ('_UDDEIM_BLOCKNOW', 'bloquer l\'utilisateur');
define ('_UDDEIM_BLOCKS_EXP', 'Liste des utilisateurs que vous avez bloqués. Ils ne peuvent pas vous envoyer de message personnel.');
define ('_UDDEIM_NOBODYBLOCKED', 'Vous n\'avez bloqué aucun utilisateur.');
define ('_UDDEIM_YOUBLOCKED_PRE', 'Vous avez bloqué ');
define ('_UDDEIM_YOUBLOCKED_POST', ' utilisateur(s).');
define ('_UDDEIM_UNBLOCKNOW', '[débloquer]');
define ('_UDDEIM_BLOCKALERT_EXP_ON', 'Si un utilisateur bloqué tente de vous envoyer un message, il sera avisé de son statut "bloqué" et son message ne sera pas envoyé.');
define ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Un utilisateur bloqué ne peut pas identifier qui l\'a bloqué.');
define ('_UDDEIM_CANTBLOCKADMINS', 'Les administrateurs ne peuvent pas être bloqués.');
define ('_UDDEIM_BLOCKSDISABLED', 'Blocage non activé');
define ('_UDDEIM_CANTREPLY', 'Vous ne pouvez pas répondre à ce message.');
define ('_UDDEIM_EMNOFF', 'Notification par e-mail désactivée. ');
define ('_UDDEIM_EMNON', 'Notification par e-mail activée. ');
define ('_UDDEIM_SETEMNON', '[activer]');
define ('_UDDEIM_SETEMNOFF', '[désactiver]');
define ('_UDDEIM_EMN_BODY_NOMESSAGE', 'Bonjour %you%, 

%user% vous a envoyé un message personnel sur %site%.
Identifiez-vous pour y répondre!');
define ('_UDDEIM_EMN_BODY_WITHMESSAGE', 'Bonjour %you%, 

%user% vous a envoyé le message suivant sur %site%.
Identifiez-vous pour y répondre!
__________________
%pmessage%
');
define ('_UDDEIM_EMN_FORGETMENOT', 'Bonjour %you%,

vous avez des messages personnels non lus sur %site%.
Identifiez-vous pour y répondre!
');

define ('_UDDEIM_EMN_SUBJECT', 'Vous avez un message sur %site%. Identifiez-vous  pour le lire! ');





define ('_UDDEIM_ARCHIVE_ERROR', 'L\'archivage a échoué.');
define ('_UDDEIM_ARC_SAVED_NONE', '<strong>Vous n\'avez pas encore archivé de message.</strong>'); 
define ('_UDDEIM_ARC_SAVED_1', 'Vous avez archivé ');
define ('_UDDEIM_ARC_SAVED_2', ' messages');
define ('_UDDEIM_ARC_SAVED_ONE', ' Vous avez archivé un message');
define ('_UDDEIM_ARC_SAVED_3', 'Avant d\'archiver ces messages, vous devez d\'abord supprimer d\'autres.');
define ('_UDDEIM_ARC_CANSAVEMAX_1', 'Vous pouvez archiver au maximum ');
define ('_UDDEIM_ARC_CANSAVEMAX_2', ' messages.');

define ('_UDDEIM_INBOX_LIMIT_1', 'Vous avez ');
define ('_UDDEIM_INBOX_LIMIT_2', ' messages dans votre');
define ('_UDDEIM_ARC_UNIVERSE_ARC', 'archive');
define ('_UDDEIM_ARC_UNIVERSE_INBOX', 'boîte de réception');
define ('_UDDEIM_ARC_UNIVERSE_BOTH', 'boîte de réception et archive');
	// The lines above are to make up a sentence like
	// "You have | 126 | messages in your | inbox and archive"

define ('_UDDEIM_INBOX_LIMIT_3', ' La limite autorisée est ');
define ('_UDDEIM_INBOX_LIMIT_4', 'Vous pouvez toujours recevoir et lire des messages mais vous ne pouvez pas répondre ou rédiger de nouveau jusqu\'à ce que vous en supprimiez d\'autres.');
define ('_UDDEIM_SHOWINBOXLIMIT_1', 'Messages stockés: ');
define ('_UDDEIM_SHOWINBOXLIMIT_2', '(au max. ');
	// don't add closing bracket

define ('_UDDEIM_MESSAGE_ARCHIVED', 'Message archivé.');
define ('_UDDEIM_STORE', 'archiver');
	// translators info: as in: 'store this message in archive now'

define ('_UDDEIM_BACK', 'retour');

define ('_UDDEIM_TRASHCHECKED', 'effacer la sélection');
	// translators info: plural! (as in "delete checked" messages)
	
define ('_UDDEIM_SHOWALL', 'Afficher tous');
	// translators example "SHOW ALL messages"
	
define ('_UDDEIM_ARCHIVE', 'Archivés');
	// should be same as _UDDEADM_ARCHIVE
	
define ('_UDDEIM_ARCHIVEFULL', 'Boîte d\'archive pleine. Archivage échoué.');	
	
define ('_UDDEIM_NOMSGSELECTED', 'Aucun message sélectionné.');
define ('_UDDEIM_THISISACOPY', 'Copie du message que vous avez envoyé à ');
define ('_UDDEIM_SENDCOPYTOME', 'm\'envoyer une copie');
	// as in 'send a "copy to me"' or cc: me

define ('_UDDEIM_SENDCOPYTOARCHIVE', 'envoyer une copie à l\'archive');
define ('_UDDEIM_TRASHORIGINAL', 'supprimer l\'original');

define ('_UDDEIM_MESSAGEDOWNLOAD', 'Télécharger le message');
define ('_UDDEIM_EXPORT_MAILED', 'E-mail avec les messages envoyés');
define ('_UDDEIM_EXPORT_NOW', 'M\'envoyer par e-mail les messages cochés');
	// as in "send the messages checked above by E-Mail to me"

define ('_UDDEIM_EXPORT_MAIL_INTRO', ' Ce message contient votre messagerie personnelle.');
define ('_UDDEIM_EXPORT_COULDNOTSEND', 'Ne peut pas envoyer d\'e-mail contenant les messages.');

define ('_UDDEIM_LIMITREACHED', 'Nombre de messages limité ! Non restauré.');

define ('_UDDEIM_WRITEMSGTO', 'Envoyer un message à ');
	// as in "write a message to" (a person)

// months and weeknames (please translate according 
// to your language)

$udde_smon[1]="Jan";
$udde_smon[2]="Fév";
$udde_smon[3]="Mar";
$udde_smon[4]="Avr";
$udde_smon[5]="Mai";
$udde_smon[6]="Jun";
$udde_smon[7]="Jul";
$udde_smon[8]="Aût";
$udde_smon[9]="Sep";
$udde_smon[10]="Oct";
$udde_smon[11]="Nov";
$udde_smon[12]="Déc";

$udde_lmon[1]="Janvier";
$udde_lmon[2]="Février";
$udde_lmon[3]="Mars";
$udde_lmon[4]="Avril";
$udde_lmon[5]="Mai";
$udde_lmon[6]="Juin";
$udde_lmon[7]="Juillet";
$udde_lmon[8]="Août";
$udde_lmon[9]="Septembre";
$udde_lmon[10]="Octobre";
$udde_lmon[11]="Novembre";
$udde_lmon[12]="Décembre";

$udde_lweekday[0]="Dimanche";
$udde_lweekday[1]="Lundi";
$udde_lweekday[2]="Mardi";
$udde_lweekday[3]="Mercredi";
$udde_lweekday[4]="Jeudi";
$udde_lweekday[5]="Vendredi";
$udde_lweekday[6]="Samedi";

$udde_sweekday[0]="Dim";
$udde_sweekday[1]="Lun";
$udde_sweekday[2]="Mar";
$udde_sweekday[3]="Mer";
$udde_sweekday[4]="Jeu";
$udde_sweekday[5]="Ven";
$udde_sweekday[6]="Sam";



define ('_UDDEIM_NOID', 'Erreur: Destinataire non trouvé. Message non envoyé.');
define ('_UDDEIM_VIOLATION', '<b>Intrusion!</b> Vous n\'avez pas le droit d\'effectuer cette tâche !');
define ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'erreur non identifiée : ');
define ('_UDDEIM_ARCHIVENOTENABLED', 'Archive non activée.');


// *********************************************************
// No translation necessary below this line
// *********************************************************

define ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
define ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');

define ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');

// Admin

define ('_UDDEADM_SETTINGS', 'Administration d\'uddeIM');
define ('_UDDEADM_GENERAL', 'Généralités');
define ('_UDDEADM_ABOUT', 'A propos');
define ('_UDDEADM_DATESETTINGS', 'Date/heure');
define ('_UDDEADM_PICSETTINGS', 'Icônes');
define ('_UDDEADM_DELETEREADAFTER_HEAD', 'Messages lus à conserver pendant (jours)');
define ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Messages non lus à conserver pendant (jours)');
define ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Messages effacés à garder dans le corbeille pendant (jours)');
define ('_UDDEADM_DAYS', 'jour(s)');
define ('_UDDEADM_DELETEREADAFTER_EXP', 'Au bout de combien de jours les messages <b>lus</b> seront-ils systématiquement supprimés de la boîte de réception ? Si vous ne voulez pas de suppression automatique, entrez un nombre assez élevé (ex. 36524 jours équivaut à 1 siècle). Notez toutefois que si vous voulez tout garder, votre base de donnée risque de charger rapidement.');
define ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Au bout de combien de jours les messages <b>non lus</b> par leurs destinataires seront-ils supprimés ?');
define ('_UDDEADM_DELETETRASHAFTER_EXP', 'Au bout de combien de jours les messages dans le corbeille seront-ils supprimés ? Les valeurs inférieures à 1 sont autorisées. Ex : Pour supprimer du corbeille les messages effacés après 3h, entrez la valeur 0,125.');
define ('_UDDEADM_DATEFORMAT_HEAD', 'Format d\'affichage de la date');
define ('_UDDEADM_DATEFORMAT_EXP', 'Sélectionnez le format d\'affichage Date/Heure. Les mois seront affichés sous la forme abrégée de votre langue.');
define ('_UDDEADM_LDATEFORMAT_HEAD', 'Affichage date longue');
define ('_UDDEADM_LDATEFORMAT_EXP', 'Seulement s\'il y a suffisamment d\'espace pour l\'affichage. Sélectionnez le format d\'affichage de la date à l\'ouverture d\'un message. Les noms de jours et des mois seront affichés en fonction de la configuration de la langue de Mambo/Joomla (si un fichier de langue uddeIM est disponible).');
define ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Suppression uniquement par l\'administrateur');
define ('_UDDEADM_ADMINIGNITIONONLY_YES', 'oui, uniquement par l\'administrateur');
define ('_UDDEADM_ADMINIGNITIONONLY_NO', 'non, par tout utilisateur');
define ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'La suppression automatique alourdit le serveur et la base de données. Si vous choisissez <i>oui, uniquement par l\'administrateur</i>, la suppression automatique (de tous les messages) peut être lancée par un administrateur qui vérifie sa boite de réception. A ne sélectionner que si un  administrateur lit au moins 1 fois par jour sa boîte de réception. C\'est la majorité des cas (si votre site a plusieurs administrateurs, elle peut être lancée par n\'importe quel administrateur). Pour un site de faible fréquentation ou ou pour un site où l\'administrateur vérifie ses messages rarement, choisissez <i>non, par tout utilisateur</i>. Si vous ne comprenez pas ou si vous ne savez pas quoi faire, choisissez <i>non, par tout utilisateur</i>.');
define ('_UDDEADM_SAVESETTINGS', 'Enregistrer les paramètres');
define ('_UDDEADM_THISHASBEENSAVED', 'Les paramètres suivants sont enregistrés dans le fichier de configuration :');
define ('_UDDEADM_SETTINGSSAVED', 'Paramètres enregistrés.');
define ('_UDDEADM_ICONONLINEPIC_HEAD', 'Icône : utilisateur connecté');
define ('_UDDEADM_ICONONLINEPIC_EXP', 'Définir l\'emplacement de l\'icône à afficher après l\'identifiant lorsque l\'utilisateur est connecté.');
define ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Icône : utilisateur déconnecté');
define ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Définir l\'emplacement de l\'icône à afficher après l\'identifiant lorsque l\'utilisateur est déconnecté.');
define ('_UDDEADM_ICONREADPIC_HEAD', 'Icône : messages lus');
define ('_UDDEADM_ICONREADPIC_EXP', 'Définir l\'emplacement de l\'icône à afficher pour les messages lus.');
define ('_UDDEADM_ICONUNREADPIC_HEAD', 'Icône : messages non lus');
define ('_UDDEADM_ICONUNREADPIC_EXP', 'Définir l\'emplacement de l\'icône à afficher pour les messages non lus.');
define ('_UDDEADM_MODULENEWMESS_HEAD', 'Module : icône nouveau(x) messages');
define ('_UDDEADM_MODULENEWMESS_EXP', 'Ce paramètre est utilisé par le module mod_uddeim_new. Définir l\'emplacement de l\'icône que le module affiche quand il y a de nouveaux messages.');
define ('_UDDEADM_UDDEINSTALL', 'Installation d\'uddeIM');
define ('_UDDEADM_FINISHED', 'Installation terminée. Bienvenue à uddeIM. ');
define ('_UDDEADM_NOCB', '<span style="color: red;">Vous n\'avez pas installé Community Builder. Vous ne pourrez pas utiliser uddeIM.</span><br /><br />Téléchargez <a href="http://www.joomlapolis.com">Community Builder</a>.');
define ('_UDDEADM_CONTINUE', 'suivant');
define ('_UDDEADM_PMSFOUND_1', 'Il existe ');
define ('_UDDEADM_PMSFOUND_2', ' messages dans votre configuration PMS. Voulez-vous les importer ?');
define ('_UDDEADM_IMPORT_EXP', 'Cela n\'affecte ni vos message PMS ni le programme. Ils resteront intacts. Vous pouvez les importer en toute confiance, même si vous pensez continuer à utiliser PMS. (Vous devez enregistrer les modifications aux paramètres avant de lancer la procédure d\'importation !) Tous les messages qui sont déjà dans la base d\'uddeIM resteront intacts.');
define ('_UDDEADM_IMPORT_YES', 'Importez maintenant les messages PMS.');
define ('_UDDEADM_IMPORT_NO', 'Non, ne rien importer');  
define ('_UDDEADM_IMPORTING', 'Patientez pendant le processus d\'importation.');
define ('_UDDEADM_IMPORTDONE', 'Importation des messages PMS effectuée. Veuillez ne pas exécuter ce script d\'importation une seconde fois pour éviter les doublons.'); 
define ('_UDDEADM_IMPORT', 'Importer');
define ('_UDDEADM_IMPORT_HEADER', 'Importer les messages de PMS');
define ('_UDDEADM_PMSNOTFOUND', 'Aucun programme PMS trouvé. Impossible de procéder à l\'importation.');
define ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Vous avez déjà importé les messages de PMS.</span>');
define ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Activer le blocage');
define ('_UDDEADM_BLOCKSYSTEM_EXP', 'Blocage activé : les utilisateurs peuvent en bloquer d\'autres. Un utilisateur bloqué ne peut envoyer de message à celui qui l\'a bloqué. Les Administrateurs ne peuvent pas être bloqués.');
define ('_UDDEADM_BLOCKSYSTEM_YES', 'oui');
define ('_UDDEADM_BLOCKSYSTEM_NO', 'non');
define ('_UDDEADM_BLOCKALERT_HEAD', 'L\'utilisateur bloqué recevra une notification');
define ('_UDDEADM_BLOCKALERT_EXP', 'Si vous sélectionnez <i>oui</i>, un utilisateur bloqué recevra un avis lui informant que son message n\'a pas pu être envoyé car le destinataire l\'a bloqué. Si vous sélectionnez <i>non</i>, l\'utilisateur bloqué ne sera pas informé.');
define ('_UDDEADM_BLOCKALERT_YES', 'oui');
define ('_UDDEADM_BLOCKALERT_NO', 'non');
define ('_UDDEADM_DELETIONS', 'Suppression');
define ('_UDDEADM_BLOCK', 'Blocage');
define ('_UDDEADM_INTEGRATION', 'Intégration');
define ('_UDDEADM_EMAIL', 'e-mail');
define ('_UDDEADM_SHOWONLINE_HEAD', 'Afficher le statut de connexion');
define ('_UDDEADM_SHOWONLINE_EXP', 'Si <i>oui</i>, uddeIM affiche tous les identifiants avec respectivement un petit icône connecté ou déconnecté. Vous pouvez paramétrer les icônes dans l\'onglet <i>Icônes</i> de la zone d\'administration.');
define ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Autoriser notification e-mail.');
define ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Si <i>oui</i> est sélectionné, chaque utilisateur pourra choisir s\'il veut recevoir un e-mail à l\'arrivée d\'un nouveau message.');
define ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-mail avec le message');
define ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Si <i>non</i> est sélectionné, l\'email informera uniquement de la date d\'arrivée du nouveau message et son expéditeur et non pas du contenu du message.');
define ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Rappel e-mail');
define ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Cette possibilité permet (indépendamment des ses propres paramètres) d\'informer par e-mail l\'utilisateur qui a un message non lu depuis une certaine période (paramètres ci-après). Elle est indépendante du paramètre de l\'option \'Autoriser la notification par email\' définie plus haut. Si vous ne voulez aucune alerte par e-mail, désactivez ces deux options en même temps.');
define ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Envoi du rappel e-mail après jour(s)');
define ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Si le rappel e-mail est activé, définir ici le nombre de jours avant l\'envoi du rappel sur la non lecture d\'un message.');
define ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Premiers caractères');
define ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Vous pouvez définir ici la longueur d\'affichage des messages dans les boite de réception, d\'envoi et corbeille.');
define ('_UDDEADM_MAXLENGTH_HEAD', 'Longueur maximum');
define ('_UDDEADM_MAXLENGTH_EXP', 'Longueur maximum d\'un message. Au delà de cette valeur, le message est tronqué. Mettez \'0\' pour permettre n\'importe quelle longueur (non recommandé).');
define ('_UDDEADM_YES', 'oui');
define ('_UDDEADM_NO', 'non');
define ('_UDDEADM_ADMINSONLY', 'Uniquement par les administrateurs');
define ('_UDDEADM_SYSTEM', 'Système');
define ('_UDDEADM_SYSM_USERNAME_HEAD', 'Identifiant message système');
define ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM prend en charge les messages systèmes. Leur auteur ne sont pas visibles et les utilisateurs ne peuvent pas répondre à ce type de messages. Entrez ici l\'alias de l\'identifiant par défaut pour les messages systèmes (par exemple <i>Support</i>, <i>Aide</i> ou <i>Modérateur</i>).');
define ('_UDDEADM_ALLOWTOALL_HEAD', 'Permettre les administrateurs à envoyer des messages en masse.');
define ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM permet l\'envoi de messages en masse. Les messages seront envoyés à tous les utilisateurs. A utiliser avec modération.');
define ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Nom de l\'auteur de l\'Email');
define ('_UDDEADM_EMN_SENDERNAME_EXP', 'Définissez ici le nom de l\'expéditeur qui doit être affiché dans l\'e-mail du rappel (par exemple <i>Le_nom_de_votre_site</i>)');
define ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Adresse email de l\'auteur');
define ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Entrez l\'adresse e-mail depuis laquelle les notifications sont envoyées. Elle pourrait être l\'adresse de contact principal de votre site.');
define ('_UDDEADM_VERSION', 'Version ');
define ('_UDDEADM_ARCHIVE', 'Archives'); // translators info: headline for Archive system
define ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Autoriser l\'archivage');
define ('_UDDEADM_ALLOWARCHIVE_EXP', 'Définir si les utilisateurs pourront archiver leurs messages. Les messages archivés ne peuvent pas être supprimés.');
define ('_UDDEADM_MAXARCHIVE_HEAD', 'Nombre max de messages archivables');
define ('_UDDEADM_MAXARCHIVE_EXP', 'Définir combien de messages un utilisateur peut stocker dans l\'archive. (non limité pour les administrateurs).');
define ('_UDDEADM_COPYTOME_HEAD', 'Autoriser les copies');
define ('_UDDEADM_COPYTOME_EXP', 'Permet aux utilisateurs de recevoir une copie du message qu\'il envoie. Ces copies seront visibles dans la bôite de réception.');
define ('_UDDEADM_MESSAGES', 'Messages');
define ('_UDDEADM_TRASHORIGINAL_HEAD', 'Permettre la suppression de l\'original');
define ('_UDDEADM_TRASHORIGINAL_EXP', 'L\'activation de cette option ajoute une case à cocher intitulée \'Supprimer l\'original\' à côté du bouton \'Envoyer\'. Sélectionnée par défaut, le message sera immédiatement déplacé dans le corbeille quand une réponse est envoyée. Cela permet de réduire le nombre de message dans la base. Evidemment, vous pouvez décocher cette option si vous voulez garder vos messages dans la Boîte de réception.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
define ('_UDDEADM_PERPAGE_HEAD', 'Messages par page');	
define ('_UDDEADM_PERPAGE_EXP', 'Définir le nombre de messages affichés par page dans les Boîtes de réception, d\'envoi, corbeille et archive.');
define ('_UDDEADM_CHARSET_HEAD', 'Jeu de caractères utilisé');
define ('_UDDEADM_CHARSET_EXP', 'Si vous rencontrez des problèmes d\'affichage avec un jeu de caractères non latin, vous pouvez entrer ici le jeu de caractères que uddeIM va utiliser pour convertir les données de la base en codes HTML. <b> Si vous ne savez pas quelle valeur utiliser, laissez la valeur par défaut !</b>');
define ('_UDDEADM_MAILCHARSET_HEAD', 'Jeu de caractères utilisé pour les e-mails');
define ('_UDDEADM_MAILCHARSET_EXP', 'Si vous rencontrez des problèmes d\'affichage avec un jeu de caractères non latin, vous pouvez entrer ici le jeu de caractères que uddeIM va utiliser pour convertir les données de la base en codes HTML. <b> Si vous ne savez pas quelle valeur utiliser, laissez la valeur par défaut !</b>');
		// translators info: if you're translating into a language that uses a latin charset
		// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
		// saying 'For usage in [mylanguage] the default value is correct.'
define ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Voici le contenu de l\'email que les utilisateurs vont recevoir quand cette option est activée. Le contenu du message privé n\'est pas inclu. Gardez intactes les variables %you%, %user%, %pmessage% et %site%. ');		
define ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', ' Voici le contenu de l\'e-mail que les utilisateurs vont recevoir quand cette option est activée. Cet e-mail va inclure le contenu du message. Gardez intactes les variables %you%, %user%, %pmessage% et %site%. ');	
define ('_UDDEADM_EMN_FORGETMENOT_EXP', ' Voici le contenu de l\'e-mail "forgetmenot" que l\'utilisateur recevra quand cette option est activée. Gardez intactes les variables %you% et %site%. ');		
define ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Permet à l\'utilisateur de récupérer les messages archivés en les envoyant à son adresse e-mail.');
define ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Autoriser le téléchargement');	
define ('_UDDEADM_EXPORT_FORMAT_EXP', 'Voici le format de l\'e-mail que l\'utilisaeur recevra après téléchargement des messages depuis l\'archive. Gardez intactes les variables %user%, %msgdate% et %msgbody% . ');	
		// translators info: Don't translate %you%, %user%, etc. in the strings above. 
define ('_UDDEADM_INBOXLIMIT_HEAD', 'Limite de la boîte de réception');		
define ('_UDDEADM_INBOXLIMIT_EXP', 'Vous pouvez mettre une limite de messages dans la boîte de réception comprenant tous les messages, dont les messages archivés. Dans ce cas, le nombre de messages dans la boîte de réception et les messages archivés ne doit pas dépasser le nombre déterminé ci-dessus.
Autrement, vous pouvez limiter le nombre de message dans la boîte de réception sans compter ceux dans la boîte d\'archive. Dans ce cas, les utilisateurs ne pourront pas avoir plus de messages dans leur boîte de réception que le nombre déterminé ci-dessus. Si le maximum est atteint, ils ne pourront plus répondre ou composer de nouveaux messages tant qu\'ils n\'en effacent pas dans leur boîte de réception ou dans leurs archives (ils pourront tout de même recevoir des messages et le lire).');
define ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Afficher la limite autorisée dans la boîte de réception');		
define ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Affiche le nombre de messages et de messages archivés (et la limite autorisée) en dessous de la boîte de réception.');
define ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Vous avez désactivé l\'archivage. Quel traitement voulez-vous appliquer aux messages déjà archivés ?');		
define ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Les oublier');		
define ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Les laisser dans l\'archive (l\'utilisateur ne pourra plus y accéder mais ils restent comptés pour le calcul de la limite autorisée.).');		
define ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Les déplacer dans la boîte de réception');		
define ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Archive déplacée dans la boîte de réception');
define ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Les messages seront déplacés dans la boîte de réception de chaque utilisateur (ou dans le corbeille s\'ils ne sont plus conformes à la durée de conservation définie).');		

		
// 0.4 frontend, but visible admins only (no translation necessary)		

define ('_UDDEIM_SEND_ASSYSM', 'envoyer en tant que message système (= le destinataire ne peut pas répondre)');
define ('_UDDEIM_SEND_TOALL', 'envoyer à tous les utilisateurs');
define ('_UDDEIM_SEND_TOALLADMINS', 'envoyer à tous les administrateurs');
define ('_UDDEIM_SEND_TOALLLOGGED', 'envoyer à tous les utilisateurs connectés');
define ('_UDDEIM_VALIDFOR_1', 'valable pour ');
define ('_UDDEIM_VALIDFOR_2', ' heures. 0=jamais (application de la suppression automatique)');
define ('_UDDEIM_WRITE_SYSM_GM', '[Créer un message général ou système]');
define ('_UDDEIM_WRITE_NORMAL', '[Créer un message normal]');
define ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Message général ou système non permis.');
define ('_UDDEIM_SYSGM_TYPE', 'Type du message');
define ('_UDDEIM_HELPON_SYSGM', 'Aide sur les messages système');
define ('_UDDEIM_HELPON_SYSGM_2', '(ouvrir dans une nouvelle fenêtre)');

define ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Vous êtes en train d\'envoyer le message suivant. Confirmer ou annuler!');
define ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Message à <strong>tous les utilisateurs</strong>');
define ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Message à <strong>tous les administrateurs</strong>');
define ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Message à <strong>tous les utilisateurs connectés</strong>');
define ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Le destinataire ne peut pas répondre à ce message.');
define ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Le message sera envoyé avec <strong>');
define ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> comme identifiant');

define ('_UDDEIM_SYSGM_WILLEXPIRE', 'Le message expirera ');
define ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Le message n\'expirera pas');
define ('_UDDEIM_SYSGM_CHECKLINK', '<b>Vérifier le lien (en cliquant sur) avant toute action !</b>');
define ('_UDDEIM_SYSGM_SHORTHELP', 'Utilisation <strong>uniquement pour les messages système</strong>:<br /> [b]<strong>gras</strong>[/b] [i]<em>italique</em>[/i]<br />
[url=http://www.unlien.com]un lien[/url] or [url]http://www.unlien.com[/url] sont des liens.');
define ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Erreur: Destinataire non trouvé. Message non envoyé.');			

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'Style de uddeIM');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Choisissez le style de uddeIM');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Montrer les connexions');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Choisissez <i>oui</i> si vous avez installé CB/CBE/JS et voulez montrer à l\'utilisateur le nom des utilisateurs connectés lorsqu\'il compose un nouveau message.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Montrer le lien Paramètres');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'Le lien Paramètres apparaît dans uddeIM si vous avez activé la notification email ou le système de blocage. Si vous n\'en voulez pas, vous pouvez le désactiver ici.');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'oui, en bas');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Autoriser le BBcode');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'format des caractères seulement');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Choisissez <i>format des caractères seulement</i> pour autoriser aux utilisateurs le BBcode à mettre des caractères en gras, italique, souligné, en couleur et changer la taille. Si vous choisissez <i>oui</i>, les utilisateurs pourront utiliser <strong>la totalité</strong> des fonctionnalités du BBcode dans leurs messages (même les liens et les images).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Autoriser émoticônes');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Choisissez <i>oui</i> pour que les émoticônes (smileys) comme :-) soient remplacés par un icône graphique lors de la lecture du message. Voyez le fichier readme pour avoir la liste des émoticônes supportés.');
DEFINE ('_UDDEADM_DISPLAY', 'Affichage');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Montrer les icônes de menu');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Choisissez <i>oui</i> pour que les liens de menu et d\'action soient affichés avec un icône.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Titre du composant');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Vous pouvez changer le titre de la messagerie privée, par exemple \'Messagerie privée\'. Laissez vide si vous ne voulez pas afficher de titre.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Montrer le lien a propos');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Choisissez <i>oui</i> pour que s\'affiche un lien vers les crédits et la licence du logiciel uddeIM. Ce lien sera placé en bas lorsque s\'affiche uddeIM.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Arrêter les emails maintenant');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Cochez cette case pour interdire uddeIM d\'envoyer des mails (emails de notification et de rappel) sans tenir compte du choix des utilisateurs, par exemple pour tester le site. Si vous ne voulez pas utilisez cette fonction, mettez toutes les fonctions ci-dessus sur <i>non</i>');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manuellement');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'Miniatures CB dans la liste');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Choisissez <i>oui</i> si vous voulez afficher des miniature des avatars Community Builder des utilisateurs dans les listes de messages (boîte de réception, boîte d\'envoi, etc.)');


// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Montrer les utilisateurs');
DEFINE ('_UDDEIM_CONNECTIONS', 'Connexions');
DEFINE ('_UDDEIM_SETTINGS', 'Paramètres');
DEFINE ('_UDDEIM_NOSETTINGS', 'Il n\'y a pas de paramètre à changer.');
DEFINE ('_UDDEIM_ABOUT', 'A propos'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Nouveau'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'Notification e-mail');
DEFINE ('_UDDEIM_EMN_EXP', 'Vous pouvez recevoir un e-mail lors de la réception de nouveaux messages privés.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Notification e-mail de nouveaux messages');
DEFINE ('_UDDEIM_EMN_NONE', 'Pas de notification e-mail');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Notification e-mail seulement si déconnecté');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Ne pas envoyer d\'e-mail de notification');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Bloquer des utilisateurs'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Vous pouvez empêcher des utilisateurs de vous envoyer des messages en les bloquant. Choisissez <i>bloquer l\'utilisateur</i> quand vous lisez un message de la personne que vous voulez bloquer.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Enregistrer les changements');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'Tags BB Code pour définir du texte en gras. Utilisation : [b]bold[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'Tags BB Code pour définir du texte en italique. Utilisation : [i]italic[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'Tags BB Code pour définir du texte souligné. Utilisation : [u]underline[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'Tags BB Code pour définir la couleur du texte. Utilisation : [color=#XXXXXX]en couleurs[/color] où XXXXXX est le code hexadécimal de la couleur que vous voulez, par exemple FF0000 pour du rouge.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'Tags BB Code pour définir la couleur du texte. Utilisation : [color=#XXXXXX]en couleurs[/color] où XXXXXX est le code hexadécimal de la couleur que vous voulez, par exemple 00FF00 pour du vert.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'Tags BB Code pour définir la couleur du texte. Utilisation : [color=#XXXXXX]en couleurs[/color] où XXXXXX est le code hexadécimal de la couleur que vous voulez, par exemple 0000FF pour du bleu.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'Tags BB Code pour définir du texte de très petite taille. Utilisation : [size=1]texte de très petite taille.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'Tags BB Code pour définir du texte de petite taille. Utilisation : [size=2]texte de petite taille.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'Tags BB Code pour définir du texte de grande taille. Utilisation : [size=4]texte de grande taille.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'Tags BB Code pour définir du texte de très grande taille. Utilisation : [size=5]texte de très grande taille.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'Tags BB Code pour insérer un lien d\'image. Utilisation : [img]URL-Image[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'Tags BB Code pour insérer un hyperlien. Utilisation : [url]adresse web[/url]. N\'oubliez pas le http:// au début des adresses.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Fermer tous les tags BBcode.');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' message dans votre'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in 1 "message in your")
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<strong>Vous n\'avez pas de message archivé.</strong>');
