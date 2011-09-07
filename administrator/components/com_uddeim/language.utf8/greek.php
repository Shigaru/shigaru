<?php
// ********************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         © 2007-2010 Stephan Slabihoud, © 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
// ********************************************************************
// Language file: Greek (source file is UTF-8)
// by Chris grVulture Michaelides Updated by Apostolos apkat Katsinikas
// ********************************************************************
	
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
DEFINE ('_UDDEIM_FILEUPLOAD_FAILED', 'Η αποστολή του αρχείου απέτυχε');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_5', '...αρχικές ρυθμίσες για επισυνάψεις αρχείων');
DEFINE ('_UDDEADM_ENABLEATTACHMENT_HEAD', 'Ενεργοποίηση επισυνάψεων αρχείων');
DEFINE ('_UDDEADM_ENABLEATTACHMENT_EXP', 'Ενεργοποίηση αποστολής επισυνάψεων μόνο για τους ...registered... ή τους διαχειριστές.');
DEFINE ('_UDDEADM_MAXSIZEATTACHMENT_HEAD', 'Μέγιστο μέγεθος αρχείου');
DEFINE ('_UDDEADM_MAXSIZEATTACHMENT_EXP', 'Επιτρεπόμενο μέγιστο μέγεθος για επισυνάψεις αρχείων.');
DEFINE ('_UDDEIM_FILESIZE_EXCEEDED', 'Υπερβήκατε το μέγιστο μέγεθος αρχείου');
DEFINE ('_UDDEADM_BYTES', 'Bytes');
DEFINE ('_UDDEADM_MAXATTACHMENTS_HEAD', 'Μεγ. αριθμός επισυνάψεων');
DEFINE ('_UDDEADM_MAXATTACHMENTS_EXP', 'Μέγιστος αριθμός επισυνάψεων ανά μήνυμα.');
DEFINE ('_UDDEIM_DOWNLOAD', 'Κατέβασμα');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_HEAD', 'Διαγραφή αρχείων ...invoked');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_YES', 'μόνο από διαχειριστές');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_NO', 'από κάθε χρήστη');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_MANUALLY', '...manually');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_EXP', 'Οι αυτόματες διαγραφές δημιουργούν μέγαλο φόρτο στον server. Αν επιλέξετε <b>μόνο από διαχειριστές</b> οι αυτόματες διαγραφές εκτελούνται όταν κάποιος διαχειριστής ελέγξει τα εισερχόμενά του. Επιλέξτε, αν ο διαχειριστής ελέγχει τακτικά τα μηνύματά του. Για μικρούς ή μη τακτικά διαχειρίσιμους δικτυακούς τόπους μπορεί να επιλεγεί <b>από κάθε χρήστη</b>.');
DEFINE ('_UDDEADM_FILEMAINTENANCE_PRUNE', 'Prune files now');
DEFINE ('_UDDEADM_FILEMAINTENANCEDEL_HEAD', 'Εκτέλεση διαγραφής αρχείου');
DEFINE ('_UDDEADM_FILEMAINTENANCEDEL_EXP', 'Σβήσιμο τα προς διαγραφή αρχεία από την βάση. Είναι το ίδιο με την \'Prune files now\' on the system tab.');
DEFINE ('_UDDEADM_FILEMAINTENANCEDEL_ERASE', 'ERASE');
DEFINE ('_UDDEIM_ATTACHMENTS', 'Επισυνάψεις (μέγ. %u bytes ανά αρχείο):');
DEFINE ('_UDDEADM_MAINTENANCE_F1', 'Orphaned attachments stored in filesystem: ');
DEFINE ('_UDDEADM_MAINTENANCE_F2', 'Deleting orphaned files');
DEFINE ('_UDDEADM_BACKUP_DONE', 'Backup configuration done.');
DEFINE ('_UDDEADM_RESTORE_DONE', 'Restore configuration done.');
DEFINE ('_UDDEADM_PRUNE_DONE', 'Έγινε μόνιμη διαγραφή μυνήματος.');
DEFINE ('_UDDEADM_FILEPRUNE_DONE', 'Έγινε μόνιμη διαγραφή επισύναψης αρχείου.');
DEFINE ('_UDDEADM_FOLDERCREATE_ERROR', 'Error creating folder: ');
DEFINE ('_UDDEADM_ATTINSTALL_WRITEFAILED', 'Error creating file: ');
DEFINE ('_UDDEADM_ATTINSTALL_IGNORE', 'You can ignore this error when you do not own the File attachments premium plugin (see FAQ).');
DEFINE ('_UDDEADM_ATTACHMENTGROUPS_HEAD', 'Επιτρεπόμενες ομάδες');
DEFINE ('_UDDEADM_ATTACHMENTGROUPS_EXP', 'Ομάδες που επιτρέπονται να στέλνουν επισυναπτόμενα αρχεία.');
DEFINE ('_UDDEIM_SELECT', 'Επιλέξτε');
DEFINE ('_UDDEIM_ATTACHMENT', 'Επισύναψη');
DEFINE ('_UDDEADM_SHOWLISTATTACHMENT_HEAD', 'Εμφάνιση εικονιδίων επισύναψης');
DEFINE ('_UDDEADM_SHOWLISTATTACHMENT_EXP', 'Εμφάνιση εικονιδίων επισύναψης στις λίστε μηνυμάτων (εισερχόμενα, εξερχόμενα, αρχείο).');
DEFINE ('_UDDEIM_HELP_ATTACHMENT', 'Το μήνυμα περιέχει επισύναψη αρχείου.');
DEFINE ('_UDDEADM_MAINTENANCE_COUNTFILES', 'File references in database:');
DEFINE ('_UDDEADM_MAINTENANCE_COUNTFILESDISTINCT', 'File attachments stored:');
DEFINE ('_UDDEADM_SHOWMENUCOUNT_HEAD', 'Show counters');
DEFINE ('_UDDEADM_SHOWMENUCOUNT_EXP', 'When set to <b>yes</b>, the menu bar contains message counters. Note: This will require several additional database queries so do not use on weak systems.');
DEFINE ('_UDDEADM_CONFIG_FTPLAYER', 'Configuration (access with FTP layer):');
DEFINE ('_UDDEADM_ENCODEHEADER_HEAD', 'Encode mail headers');
DEFINE ('_UDDEADM_ENCODEHEADER_EXP', 'Set to <b>yes</b>, when mail headers (like the subject) should be rfc 2047 encoded. Useful when you have problems with special characters.');
DEFINE ('_UDDEIM_UP', 'αύξουσα ταξινόμηση');
DEFINE ('_UDDEIM_DOWN', 'φθίνουσα ταξινόμηση');
DEFINE ('_UDDEIM_UPDOWN', 'ταξινόμηση');
DEFINE ('_UDDEADM_ENABLESORT_HEAD', 'Ενεργοποίηση ταξινόμησης');
DEFINE ('_UDDEADM_ENABLESORT_EXP', 'Επιλέξτε <b>ναι</b>, όταν ο χρήστης μπορεί να κάνει ταξινόμηση στους φακέλους εισερχόμενα, εξερχόμενα, αρχείο (δημιουργεί πρόσθετο φόρτο στον server).');

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
DEFINE ('_UDDEIM_ACCOUNTLOCKED', 'Η πρόσβαση στα μηνύματά σας δεν είναι εφικτή. Παρακαλώ επικοινωνήστε με το διαχειριστή.');
DEFINE ('_UDDEADM_USERSET_LOCKED', 'Locked');
DEFINE ('_UDDEADM_USERSET_SELLOCKED', '- Locked -');
DEFINE ('_UDDEADM_CBBANNED_HEAD', 'Check for CB banned users');
DEFINE ('_UDDEADM_CBBANNED_EXP', 'When activated uddeIM checks if a user has been banned in CB and does not allow access to uddeIM. Additionally other users are not able to send messages to a banned user.');
DEFINE ('_UDDEIM_YOUAREBANNED', 'Έχετε μπλοκαριστεί. Παρακαλώ επικοινωνήστε με τον διαχειριστή.');
DEFINE ('_UDDEIM_USERBANNED', 'Ο χρήστης έχει μπλοκαριστεί');
DEFINE ('_UDDEADM_JOOBB', 'Joo!BB');
DEFINE ('_UDDEPLUGIN_SEARCHSECTION', 'Private Messaging');
DEFINE ('_UDDEPLUGIN_MESSAGES', 'Προσπωπικά Μηνύματα');
DEFINE ('_UDDEADM_MAINTENANCEDEL_HEAD', 'Invoke message erasing');
// note "This  is the same as _UDDEADM_MAINTENANCE_PRUNE on the system tab."
DEFINE ('_UDDEADM_MAINTENANCEDEL_EXP', 'Removes deleted messages from the database. This is the same as \'Prune messages now\' on the system tab.');
DEFINE ('_UDDEADM_MAINTENANCEDEL_ERASE', 'ERASE');
DEFINE ('_UDDEADM_REPORTSPAM_HEAD', 'Report message link');
DEFINE ('_UDDEADM_REPORTSPAM_EXP', 'When activated this show a \'Report message\' link that allows users to report SPAM to the admin.');
DEFINE ('_UDDEIM_TOOLBAR_REMOVESPAM', 'Διαγραφή μηνύματος');
DEFINE ('_UDDEIM_TOOLBAR_REMOVEREPORT', 'Διαγραφή αναφοράς');
DEFINE ('_UDDEIM_TOOLBAR_SPAMCONTROL', 'Report Control');
DEFINE ('_UDDEADM_INFORMATION', 'Πληροφορίες');
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
DEFINE ('_UDDEIM_TRASHORIGINALSENT', 'διαγραφή μηνύματος');
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
DEFINE ('_UDDEIM_MENUICONS_P1', 'Εικονίδια και κείμενο');
DEFINE ('_UDDEIM_MENUICONS_P2', 'Μόνο εικονίδια');
DEFINE ('_UDDEIM_MENUICONS_P0', 'Μόνο κείμενο');
DEFINE ('_UDDEIM_LISTSLIMIT_2', 'Μέγιστος αριθμός αποδεκτών στη λίστα:');
DEFINE ('_UDDEADM_ADDEMAIL_ADMIN', 'Admins can select');
DEFINE ('_UDDEAIM_ADDEMAIL_SELECT', 'Ειδοποίηση με το μήνυμα');
DEFINE ('_UDDEAIM_ADDEMAIL_TITLE', 'Ολόκληρο το μήνυμα να περιέχεται στην ειδοποίηση.');

// New: 1.6
DEFINE ('_UDDEIM_NOLISTSELECTED', 'Δεν έχει επιλεγεί λίστα μελών!');
DEFINE ('_UDDEADM_NOPREMIUM', 'Δεν έχει εγκατασταθεί Premium plugin');
DEFINE ('_UDDEIM_LISTGLOBAL_CREATOR', 'Δημιουργός:');
DEFINE ('_UDDEIM_LISTGLOBAL_ENTRIES', 'Εγγραφές');
DEFINE ('_UDDEIM_LISTGLOBAL_TYPE', 'Τύπος');
DEFINE ('_UDDEIM_LISTGLOBAL_NORMAL', 'Κανονικό');
DEFINE ('_UDDEIM_LISTGLOBAL_GLOBAL', 'Σύνολο');
DEFINE ('_UDDEIM_LISTGLOBAL_RESTRICTED', 'Restricted');
DEFINE ('_UDDEIM_LISTGLOBAL_P0', 'Κανονική λίστα επαφών');
DEFINE ('_UDDEIM_LISTGLOBAL_P1', 'Συνολική λίστα επαφών');
DEFINE ('_UDDEIM_LISTGLOBAL_P2', 'Περιορισμένη λίστα επαφών (μόνο μέλη της λίστας μπορούν να έχουν πρόσβαση)');
DEFINE ('_UDDEIM_TOOLBAR_USERSETTINGS', 'Ρυθμίσεις χρήστη');
DEFINE ('_UDDEIM_TOOLBAR_REMOVESETTINGS', 'Καθαρισμός ρυθμίσεων');
DEFINE ('_UDDEIM_TOOLBAR_CREATESETTINGS', 'Δημιουργία ρυθμίσεων');
DEFINE ('_UDDEIM_TOOLBAR_SAVE', 'Αποθήκευση');
DEFINE ('_UDDEIM_TOOLBAR_BACK', 'Επιστροφή');
DEFINE ('_UDDEIM_TOOLBAR_TRASHMSGS', 'Διεγραμμένα μηνύματα');
DEFINE ('_UDDEIM_CBPLUG_CONT', '[συνέχεια]');
DEFINE ('_UDDEIM_CBPLUG_UNBLOCKNOW', '[unblock]');
DEFINE ('_UDDEIM_CBPLUG_DOBLOCK', 'Block user');
DEFINE ('_UDDEIM_CBPLUG_DOUNBLOCK', 'Unblock user');
DEFINE ('_UDDEIM_CBPLUG_BLOCKINGCFG', 'Blocking');
DEFINE ('_UDDEIM_CBPLUG_BLOCKED', 'You have blocked this user.');
DEFINE ('_UDDEIM_CBPLUG_UNBLOCKED', 'Αυτός ο χρήστης μπορεί να επικοινωνήσει μαζί σου.');
DEFINE ('_UDDEIM_CBPLUG_NOWBLOCKED', 'The user is blocked now.');
DEFINE ('_UDDEIM_CBPLUG_NOWUNBLOCKED', 'The user is not longer blocked.');
DEFINE ('_UDDEADM_PARTIALIMPORTDONE', 'Έγινε μερική εισαγωγή μηνυμάτων από παλιό PMS. Μην εισάγετε ξανά αυτό το τμήμα γιατί έτσι θα εισαχθούν τα ίδια μυνήματα και θα φαίνονται διπλά.');
DEFINE ('_UDDEADM_IMPORT_HELP', 'Σημείωση: Τα μηνύματα μπορούν να εισαχθούν στο σύνολό τους ή τμηματικά. Η τμηματική εισαγωγή είναι προτιμητέα σε περίπτωση πολλών μηνυμάτων ώστε η διαδικασία εισαγωγής να ολοκληρωθεί με επιτυχία.');
DEFINE ('_UDDEADM_IMPORT_PARTIAL', 'Τμηματική εισαγωγή:');
DEFINE ('_UDDEADM_UPDATEYOURDB', 'Σημαντικό: Δεν έχει ενημερωθεί η βάση δεδομένων! Κοιτάξτε στο αρχείο README ώστε να ενημερώσετε το uddeIM σωστά!');
DEFINE ('_UDDEADM_RESTRALLUSERS_HEAD', 'Περιορισμός πρόσβασης σε "Όλα τα μέλη" ');
DEFINE ('_UDDEADM_RESTRALLUSERS_EXP', 'Μπορείτε να απαγορεύσετε την πρόσβαση στη λίστα "Όλα τα μέλη". Συνήθως η λίστα "Όλα τα μέλη" είναι διαθέσιμη σε όλους (<i>χωρίς περιορισμό</i>).');
DEFINE ('_UDDEADM_RESTRALLUSERS_0', 'χωρίς περιορισμό');
DEFINE ('_UDDEADM_RESTRALLUSERS_1', 'ειδικοί χρήστες');
DEFINE ('_UDDEADM_RESTRALLUSERS_2', 'μόνο διαχειριστές');
DEFINE ('_UDDEIM_MESSAGE_UNARCHIVED', 'Message unarchived.');
DEFINE ('_UDDEADM_AUTOFORWARD_SPECIAL', 'ειδικοί χρήστες');
DEFINE ('_UDDEIM_HELP', 'Βοήθεια');
DEFINE ('_UDDEIM_HELP_HEADLINE1', 'uddeIM Βοήθεια');
DEFINE ('_UDDEIM_HELP_HEADLINE2', 'Σύντομη περιγραφή για όλες τις διαδικασίες');
DEFINE ('_UDDEIM_HELP_INBOX', '<b>Εισερχόμενα</b> Εδώ βρίσκονται όλα τα μηνύματα που λαμβάνετε.');
DEFINE ('_UDDEIM_HELP_OUTBOX', '<b>Απεσταλμένα</b> Εδώ βρίσκονται τα μηνύματα που έχετε στείλει.');
DEFINE ('_UDDEIM_HELP_TRASHCAN', '<b>Κάδος</b> Εδώ βρίσκονται τα διεγραμμένα μηνύματα. Τα μηνύματα δεν διαγράφονται αμέσως αλλά κρατούνται για ένα ορισμένο χρονικό διάστημα. Όσα μηνύματα βρίσκονται εδώ, μπορείτε να τα επαναφέρετε.');
DEFINE ('_UDDEIM_HELP_ARCHIVE', '<b>Αρχείο</b> Εδώ βρίσκονται όλα τα μηνύματα τα οποία έχετε αρχειοθετήσει από τα Εισερχόμενα. Μπορείτε να αρχειοθετήσετε μόνο τα εισερχόμενα μηνύματα. Αν θέλετε να αρχειοθετήσετε μήνυμα που γράψατε εσείς, βεβαιωθείτε πως έχετε επιλέξει <i>Αντίγραφο σε μένα</i> όταν κάνετε αποστολή.');
DEFINE ('_UDDEIM_HELP_USERLISTS', '<b>Επαφές</b> Εδώ μπορείτε να διαχειριστείτε λίστες με διευθύνσεις ηλεκτρονικού ταχυδρομείου. Αυτές οι λίστες σας βοηθούν να στείλετε Προσωπικά Μηνύματα σε πολλούς αποδέκτες άμεσα. Αντί να προσθέτετε τις ηλεκτρονικές διευθύνσεις τους, μπορείτε να εισάγετε απλά το <i># όνομα της λίστας</i>.');
DEFINE ('_UDDEIM_HELP_SETTINGS', '<b>Ρυθμίσεις</b> Εδώ υπάρχουν όλες οι επιλογές που μπορείτε να αλλάξετε...');
DEFINE ('_UDDEIM_HELP_COMPOSE', '<b>Σύνθεση</b> Μπορείτε να δημιουργήσετε ένα νέο προσωπικό μήνυμα.');
DEFINE ('_UDDEIM_HELP_IREAD', 'Το μήνυμα έχει αναγωστεί (μπορείτε να αλλάξετε την κατάσταση).');
DEFINE ('_UDDEIM_HELP_IUNREAD', 'Το μήνυμα δεν έχει ακόμα αναγνωστεί (μπορείτε να αλλάξετε την κατάσταση).');
DEFINE ('_UDDEIM_HELP_OREAD', 'Το μήνυμα έχει αναγνωστεί.');
DEFINE ('_UDDEIM_HELP_OUNREAD', 'Το μήνυμα δεν έχει αναγωστεί ακόμα. Μη αναγνωσμένα μηνύματα μπορούν να ανακληθούν.');
DEFINE ('_UDDEIM_HELP_TREAD', 'Το μήνυμα έχει αναγνωστεί.');
DEFINE ('_UDDEIM_HELP_TUNREAD', 'Το μήνυμα δεν έχει αναγνωστεί ακόμα.');
DEFINE ('_UDDEIM_HELP_FLAGGED', 'Το μήνυμα έχει σημανθεί, πχ. όταν είναι ένα σημαντικό μήνυμα (μπορείτε να αλλάξετε την κατάσταση).');
DEFINE ('_UDDEIM_HELP_UNFLAGGED', '<i>Κανονικό</i> μήνυμα (μπορείτε να αλλάξετε την κατάσταση).');
DEFINE ('_UDDEIM_HELP_ONLINE', 'Ο χρήστης είναι συνδεδεμένος.');
DEFINE ('_UDDEIM_HELP_OFFLINE', 'Ο χρήστης είναι αποσυνδεδεμένος.');
DEFINE ('_UDDEIM_HELP_DELETE', 'Διαγραφή μηνύματος (μετακίνησή του στον κάδο απορριμάτων).');
DEFINE ('_UDDEIM_HELP_FORWARD', 'Προώθηση μηνύματος σε άλλον παραλήπτη.');
DEFINE ('_UDDEIM_HELP_ARCHIVEMSG', 'Αρχειοθέτηση μηνύματος. Τα αρχειοθετημένα μηνύματα δεν διαγράφονται αυτόματα όσο ο διαχειριστής έχει ορίσει χρονικό διάστημα παραμονής μηνύματος στα Εισερχόμενα.');
DEFINE ('_UDDEIM_HELP_UNARCHIVEMSG', 'Αποαρχειοθέτηση μηνύματος. Το μήνυμα θα μετακινηθεί πίσω στα Εισερχόμενα.');
DEFINE ('_UDDEIM_HELP_RECALL', 'Ανάκληση μηνύματος. Απεσταλμένα μηνύματα μπορούν να ανακληθούν όσο δεν έχουν ακόμα αναγνωστεί από τον παραλήπτη τους.');
DEFINE ('_UDDEIM_HELP_RECYCLE', 'Ανακύκλωση μηνύματος (μετακίνησή του από τον Κάδο Απορριμάτων πίσω στα Εισερχόμενα ή Απεσταλμένα).');
DEFINE ('_UDDEIM_HELP_NOTIFY', 'Ρύθμιση της ειδοποίησης εισερχόμενου μηνύματος.');
DEFINE ('_UDDEIM_HELP_AUTORESPONDER', 'Όταν η Αυτόματη Απάντηση είναι ενεργοποιημένη κάθε εισερχόμενο μήνυμα απαντείται άμεσα.');
DEFINE ('_UDDEIM_HELP_AUTOFORWARD', 'Νέα μηνύματα μπορούν να προωθούνται σε άλλο χρήστη αυτόματα.');
DEFINE ('_UDDEIM_HELP_BLOCKING', 'Μπορείτε να απαγορεύσετε σε μέλη να σας στέλνουν προσωπικά μηνύματα.');
DEFINE ('_UDDEIM_HELP_MISC', 'Εδώ θα βρείτε περισσότερες ρυθμίσεις.');
DEFINE ('_UDDEIM_HELP_FEED', 'Μπορείτε να έχετε πρόσβαση στα Εισερχόμενα μέσω RSS feed.');
DEFINE ('_UDDEADM_SEPARATOR_HEAD', 'Διαχωριστικό');
DEFINE ('_UDDEADM_SEPARATOR_EXP', 'Επιλέξτε το διαχωριστικό χαρακτήρα που θα χρησιμοποιηθεί για πολλαπλούς παραλήπτες (ο καθορισμένος is ",").');
DEFINE ('_UDDEADM_SEPARATOR_P0', 'κόμμα (καθορισμένο)');
DEFINE ('_UDDEADM_SEPARATOR_P1', 'ερωτηματικό');
DEFINE ('_UDDEADM_RSSLIMIT_HEAD', 'RSS items');
DEFINE ('_UDDEADM_RSSLIMIT_EXP', 'Περιορισμός του αριθμού των επιστρεφόμενων στοιχείων RSS (0 για κανέναν περιορισμό).');
DEFINE ('_UDDEADM_SHOWHELP_HEAD', 'Εμφάνιση κουμπί Βοήθειας');
DEFINE ('_UDDEADM_SHOWHELP_EXP', 'Όταν ενεργοποιηθεί το κουμπί Βοήθειας εμφανίζεται.');
DEFINE ('_UDDEADM_SHOWIGOOGLE_HEAD', 'Εμφάνιση iGoogle gadget button');
DEFINE ('_UDDEADM_SHOWIGOOGLE_EXP', 'When enabled an <i>Add to iGoogle</i> button for the uddeIM iGoogle gadget is displayed in the user preferences.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE11', 'do not load MooTools (1.1 is used)');
DEFINE ('_UDDEADM_MOOTOOLS_NONE12', 'do not load MooTools (1.2 is used)');
DEFINE ('_UDDEIM_RSS_INTRO1', 'Μπορείτε να έχετε πρόσβαση στα Εισερχόμενα χρησιμοποιώντας RSS feed (0.91).');
DEFINE ('_UDDEIM_RSS_INTRO1B', 'Η διεύθυνση πρόσβασης URL είναι:');
DEFINE ('_UDDEIM_RSS_INTRO2', 'Μη δίνεται αυτή τη διεύθυνση σε άλλους χρήστες γιατί έτσι αποκτούν πρόσβαση στον φάκελο με τα δικά σας Εισερχόμενα μηνύματα.');
DEFINE ('_UDDEIM_RSS_FEED', 'RSS Message Feed');
DEFINE ('_UDDEIM_RSS_NOOBJECT', 'No object error...');
DEFINE ('_UDDEIM_RSS_USERBLOCKED', 'User blocked...');
DEFINE ('_UDDEIM_RSS_NOTALLOWED', 'Η πρόσβαση δε επιτρέπεται...');
DEFINE ('_UDDEIM_RSS_WRONGPASSWORD', 'Λάθος όνομα χρήστη ή συνθηματικού...');
DEFINE ('_UDDEIM_RSS_NOMESSAGES', 'Κανένα μήνυμα');
DEFINE ('_UDDEIM_RSS_NONEWMESSAGES', 'Κανένα Νεό μήνυμα');
DEFINE ('_UDDEADM_ENABLERSS_HEAD', 'Ενεργοποίηση RSS');
DEFINE ('_UDDEADM_ENABLERSS_EXP', 'Όταν η επιλογή είναι ενεργοποιημένη, τα μηνύματα μπορούν να αποσταλούν μέσω RSS feed. Οι χρήστες μπορούν να βρούν την απαιτούμενη διεύθυνση URL στο προφίλ τους.');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_3', '...set default for RSS, iGoogle, help, separator');
DEFINE ('_UDDEADM_DELETEM_DELETING', 'Διαγραφή μηνυμάτων:');
DEFINE ('_UDDEADM_DELETEM_FROMUSER', 'Διαγραφή μηνυμάτων από χρήστη ');
DEFINE ('_UDDEADM_DELETEM_MSGSSENT', '- απεσταλμένα μηνύματα: ');
DEFINE ('_UDDEADM_DELETEM_MSGSRECV', '- εισερχόμενα μηνύματα: ');
DEFINE ('_UDDEIM_PMNAV_THISISARESPONSE', 'Αυτή είναι απάντηση στο:');
DEFINE ('_UDDEIM_PMNAV_THEREARERESPONSES', 'Απαντήσεις σε αυτό:');
DEFINE ('_UDDEIM_PMNAV_DELETED', 'Το μήνυμα δεν είναι διαθέσιμο');
DEFINE ('_UDDEIM_PMNAV_EXISTS', 'μετακίνηση στο μήνυμα');
DEFINE ('_UDDEIM_PMNAV_COPY2ME', '(Αντιγραφή)');
DEFINE ('_UDDEADM_PMNAV_HEAD', 'Επιτρέπεται η πλοήγηση');
DEFINE ('_UDDEADM_PMNAV_EXP', 'Shows a navigation bar which allows navigating through a thread.');
DEFINE ('_UDDEADM_MAINTENANCE_ALLDAYS', 'Μηνύματα:');
DEFINE ('_UDDEADM_MAINTENANCE_7DAYS', 'Μηνύματα σε 7 ημέρες:');
DEFINE ('_UDDEADM_MAINTENANCE_30DAYS', 'Mηνύματα σε 30 ημέρες:');
DEFINE ('_UDDEADM_MAINTENANCE_365DAYS', 'Μηνύματα σε 365 ημέρες:');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD1', 'Αποστολή υπενθύμισης το (Forgetmenot: %s ημέρες):');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD2', 'Σε %s ημέρες αποστολή υπενθύμισης στον:');
DEFINE ('_UDDEADM_MAINTENANCE_NO', 'Αρ:');
DEFINE ('_UDDEADM_MAINTENANCE_USERID', 'User ID:');
DEFINE ('_UDDEADM_MAINTENANCE_TONAME', 'Όνομα:');
DEFINE ('_UDDEADM_MAINTENANCE_MID', 'Message ID:');
DEFINE ('_UDDEADM_MAINTENANCE_WRITTEN', 'Written:');
DEFINE ('_UDDEADM_MAINTENANCE_TIMER', 'Timer:');

// New: 1.5
DEFINE ('_UDDEMODULE_ALLDAYS', ' μηνύματα');
DEFINE ('_UDDEMODULE_7DAYS', ' μηνύματα σε 7 ημέρες');
DEFINE ('_UDDEMODULE_30DAYS', ' μηνύματα σε 30 ημέρες');
DEFINE ('_UDDEMODULE_365DAYS', ' μηνύματα σε 365 ημέρες');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_WARNING', '<br /><b>Σημείωση:<br />Όταν χρησιμοποιείτε το mosMail, πρέπει να ρυθμίσετε μια έγκυρη διεύθυνση ηλεκτρονικού ταχυδρομείου!</b>');
DEFINE ('_UDDEIM_FILTEREDMESSAGE', 'message filtered');
DEFINE ('_UDDEIM_FILTEREDMESSAGES', 'messages filtered');
DEFINE ('_UDDEIM_FILTER', 'Φϊλτρο:');
DEFINE ('_UDDEIM_FILTER_TITLE_INBOX', 'Εμφάνισε μόνο από αυτόν τον χρήστη μόνο');
DEFINE ('_UDDEIM_FILTER_TITLE_OUTBOX', 'Εμφάνισε μόνο προς αυτόν τον χρήστη');
DEFINE ('_UDDEIM_FILTER_UNREAD_ONLY', 'μη αναγνωσμένα μόνο');
DEFINE ('_UDDEIM_FILTER_SUBMIT', 'Φίλτρο');
DEFINE ('_UDDEIM_FILTER_ALL', '- Όλα -');
DEFINE ('_UDDEIM_FILTER_PUBLIC', '- public users -');
DEFINE ('_UDDEADM_FILTER_HEAD', 'Ενεργοποίηση φίλτρου');
DEFINE ('_UDDEADM_FILTER_EXP', 'Αν ενεργοποιηθεί, οι χρήστες μπορούν να φιλτράρουν τα Εισερχόμενα/Απεσταλμένα μηνύματα ώστε να εμφανίζεται μόνο ένας αποστολέας ή παραλήπτης.');
DEFINE ('_UDDEADM_FILTER_P0', 'απενεργοποιήθηκε');
DEFINE ('_UDDEADM_FILTER_P1', 'πάνω από τη λίστα μηνυμάτων');
DEFINE ('_UDDEADM_FILTER_P2', 'κάτω από τη λίστα μηνυμάτων');
DEFINE ('_UDDEADM_FILTER_P3', 'πάνω και κάτω από τη λίστα');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED', '<b>Δεν έχετε %s μηνύματα %s στο φάκελλο %s.</b>');	// see next  six lines
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_UNREAD', ' μη αναγνωσμένα');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_FROM', ' από αυτόν τον χρήστη');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_TO', ' προς αυτόν τον χρήστη');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_INBOX', ' Εισερχόμενα');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_OUTBOX', ' Απεσταλμένα');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_ARCHIVE', ' Αρχείο');
DEFINE ('_UDDEIM_TODP_TITLE', 'Παραλήπτης');
DEFINE ('_UDDEIM_TODP_TITLE_CC', 'Ένας ή περισσότεροι παραλήπτες (κόμμα ως διαχωριστικό)');
DEFINE ('_UDDEIM_ADDCCINFO_TITLE', 'Όταν επιλεγεί, μια αναφορά που περιλαμβάνει όλους τους παραλήπτες θα προστεθεί στο μήνυμα.');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_2', '...ρύμιση καθορισμένων για αυτόματη απάντηση, αυτόματη προώθηση, Εισερχόμενα, Φίλτρο');
DEFINE ('_UDDEADM_AUTORESPONDER_HEAD', 'Ενεργοποίηση Αυτόματης Απάντησης');
DEFINE ('_UDDEADM_AUTORESPONDER_EXP', 'Όταν η Αυτόματη Απάντηση είναι ενεργοποιημένη, ο χρήστης μπορεί να ενεργοποιήσει μια ειδοποίηση αυτόματης απάντησης στις προσωπικές του ρυθμίσεις.');
DEFINE ('_UDDEIM_EMN_AUTORESPONDER', 'Ενεργοποίηση Αυτόματης Απάντησης');
DEFINE ('_UDDEIM_AUTORESPONDER', 'Αυτόματη Απάντηση');
DEFINE ('_UDDEIM_AUTORESPONDER_EXP', 'Όταν η Αυτόματη Απάντηση είναι ενεργοποιημένη κάθε εισερχόμενο μήνυμα θα απαντείται αμέσως.');
DEFINE ('_UDDEIM_AUTORESPONDER_DEFAULT', "Λυπάμαι, δεν είμαι αυτή την στιγμή διαθέσιμος.\nΘα σας απαντήσω το συντομότερο δυνατό.");
DEFINE ('_UDDEADM_USERSET_AUTOR', 'AutoR');
DEFINE ('_UDDEADM_USERSET_SELAUTOR', '- AutoR -');
DEFINE ('_UDDEIM_USERBLOCKED', 'User is blocked.');
DEFINE ('_UDDEADM_AUTOFORWARD_HEAD', 'Ενεργοποίηση Αυτόματης Προώθησης');
DEFINE ('_UDDEADM_AUTOFORWARD_EXP', 'Όταν η Αυτόματη Προώθηση είναι ενεργοποιημένη, ο χρήστης μπορεί να προωθεί τα νέα μηνύματα σε άλλον αυτόματα.');
DEFINE ('_UDDEIM_EMN_AUTOFORWARD', 'Ενεργοποίηση Αυτόματης Προώθησης');
DEFINE ('_UDDEADM_USERSET_AUTOF', 'AutoF');
DEFINE ('_UDDEADM_USERSET_SELAUTOF', '- AutoF -');
DEFINE ('_UDDEIM_AUTOFORWARD', 'Αυτόματη Προώθηση');
DEFINE ('_UDDEIM_AUTOFORWARD_EXP', 'Νέα μηνύματα μπορούν να προωθούνται σε άλλον χρήστη αυτόματα.');
DEFINE ('_UDDEIM_THISISAFORWARD', 'Αυτόματη Προώθηση μηνύματος, αρχικά απεσταλμένο στον ');
DEFINE ('_UDDEADM_COLSROWS_HEAD', 'Περιοχή μηνύματος (στήλες/γραμμές)');
DEFINE ('_UDDEADM_COLSROWS_EXP', 'Εδώ ορίζονται οι στήλες και γραμμές της περιοχής μηνύματος (καθορισμένες τιμές 60/10).');
DEFINE ('_UDDEADM_WIDTH_HEAD', 'Περιοχή μηνύματος (πλάτος)');
DEFINE ('_UDDEADM_WIDTH_EXP', 'Εδώ ορίζεται το πλάτος της περιοχής μηνύματος σε px (καθορισμένη τιμή 0). Αν η τιμή αυτή είναι 0, τότε χρησιμοποείται το πλάτος που έχει οριστεί στο αρχείο CSS.');
DEFINE ('_UDDEADM_CBE', 'CB Enhanced');

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'IMPORT');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'Load MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'This specifies how uddeIM loads MooTools (MooTools is required for Autocompleter): <i>None</i> is useful when your template loads MooTools, <i>Auto</i> is the recommended default (same behavior as in uddeIM 1.2), when using J1.0 you can also force loading MooTools 1.1 or 1.2.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'do not load MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'auto');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'force loading MooTools 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'force loading MooTools 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...setting default for MooTools');
DEFINE ('_UDDEADM_AGORA', 'Agora');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Base64 encoded');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Adjust timezone');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'When uddeIM shows the wrong time you can adjust the timezone setting here. Usually, when everything is configured correctly, this should be zero. Nevertheless there might be cases you need to change this value.');
DEFINE ('_UDDEADM_HOURS', 'hours');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Version information:');
DEFINE ('_UDDEADM_STATISTICS', 'Statistics:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Show statistics');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'This displays some statistics like number of stored messages etc.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'SHOW STATISTICS');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Messages stored in database: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Messages trashed by recipient: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Messages trashed by sender: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Messages on hold for purging: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Overwrite Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'Usually uddeIM tries to detect the correct Itemid when it is not set. In some cases it might be necessary to overwrite this value, e.g. when you use several menu links to uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'Detected Itemid is: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Use Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Use this Itemid instead of the detected one.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Use profile links');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'When set to <i>yes</i>, all usernames showing up in uddeIM will be displayed as links to the user profile.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Show thumbnails');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'When set to <i>yes</i>, the thumbnail of the respective user will be displayed when reading a message.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Show thumbnails in lists');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Set to <i>yes</i> if you want to display thumbnails of users in the message lists overview (inbox, outbox, etc.)');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Disabled');
DEFINE ('_UDDEADM_ENABLED', 'Enabled');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Important');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Allow message tagging');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Allows message tagging (uddeIM shows a star in lists which can be highlighted to mark important messages).');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Important: When you have upgraded uddeIM from an earlier version please check the README. Sometimes you have to add or change database tables or fields!');
DEFINE ('_UDDEIM_ADDCCINFO', 'Add CC: line');
DEFINE ('_UDDEIM_CC', 'CC:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Truncate quoted text');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Truncate quoted text to 2/3 of the maximum text length if it exceeds this limit.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Inbox entries ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Last ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' entries');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Status');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Sender');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Message');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Empty Inbox');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Access to trashcan not allowed.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Restrict trashcan access');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'You can restrict the access to the trashcan. Usually the trashcan is available for all (<i>no restriction</i>). You can restrict the access to special users or to admins only, so groups with lower access rights cannot recycle a message.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'no restriction');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'special users');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'admins only');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Hide users from userlist');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Enter user IDs which should be hidden from public userlist (e.g. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Hide users from userlist');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Enter user IDs which should be hidden from userlist (e.g. 65,66,67).');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF attack recognized');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF protection');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'This protects all forms against Cross-Site Request Forgery attacks. Usually this should be enabled. Only when you have strange problems switch it off.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Δεν μπορείτε να απαντήσετε σε αρχειοθετημένα μηνύματα');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Replies to unregistered users can not be recalled.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Allow replies');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Allow direct replies to messages from public users.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Hi %you%,\n\n%user% σας έστειλε ένα νέο προσωπικό μήνυμα στο %site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Show realnames');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Show realnames or usernames in public frontend?');
DEFINE ('_UDDEIM_USERLIST', 'Λίστα Χρηστών');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Προς αποφυγή spam, θα πρέπει να περιμένεται πριν στείλετε νέο μήνυμα');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Τελ. αποστολή');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Timedelay');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Time in seconds a user must wait before he can post the next message (0 for no time delay).');
DEFINE ('_UDDEADM_SECONDS', 'δευτερόλεπτα');
DEFINE ('_UDDEIM_PUBLICSENT', 'Το μήνυμά σας στάλθηκε επιτυχώς.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Λάθος στο όνομα αποστολέα');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Λάθος στην διεύθυνση email');
DEFINE ('_UDDEIM_YOURNAME', 'Το όνομά σας:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Το email σας:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'You are using uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'You are already using the latest version of uddeIM.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'The current version is ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Update information:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Check for updates');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'This contacts uddeIM developer website to receive information about the current uddeIM version. Except the uddeIM version you use, no other personal information is transmitted.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'CHECK NOW');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Unable to receive version information.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Δεν βρέθηκε λίστα επαφών!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Ξεπεράσατε το μέγιστο επιτρεπτό αριθμό παραληπτών (max. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Μέγιστος αριθμός εισαγωγών');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Μέγιστος αριθμός εισαγωγών για λίστα επαφής.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Δεν επιτρέπονται λίστες επαφών');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Enable contact lists');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM allows users to create contact lists. These lists can be used to send messages to multiple users. Do not forget to enable multiple recipients when you want to use contact lists.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'disabled');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'registered users');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'special users');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'admins only');
DEFINE ('_UDDEIM_LISTSNEW', 'Δημιουργία νέας λίστας επαφής');
DEFINE ('_UDDEIM_LISTSSAVED', 'Η λίστα επαφής αποθηκέυτηκε επιτυχώς');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Η λίστα επαφής ανανεώθηκε');
DEFINE ('_UDDEIM_LISTSDESC', 'Περιγραφή');
DEFINE ('_UDDEIM_LISTSNAME', 'Όνομα');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Όνομα (χωρίς κενά)');
DEFINE ('_UDDEIM_EDITLINK', 'επεξεργασία');
DEFINE ('_UDDEIM_LISTS', 'Επαφές');
DEFINE ('_UDDEIM_STATUS_READ', 'διαβασμένο');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'μη διαβασμένο');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'online');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'offline');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'Show CB gallery pictures');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'By default uddeIM does only show avatars users have uploaded. When you enable this setting uddeIM does also display pictures from the CB avatars gallery.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'Unblock CB connections');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'You can allow messages to recipients when the registered user is on the recipients CB connection list (even when the recipient is in a group which is blocked). This setting is independent from the individual blocking each user can configure when enabled (see settings above).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'Δεν σας επιτρέπεται η αποστολή μηνυμάτων σε αυτό το γκρουπ.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'Ο παραλήπτης σας αποκλείει.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Blocked groups (registered users)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Groups to which registered users are not allowed to send messages to. This is for registered users only. Special users and admins are not affected by this setting. This setting is independent from the individual blocking each user can configure when enabled (see settings above).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Blocked groups (public users)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Groups to which public users are not allowed to send messages to. This setting is independent from the individual blocking each user can configure when enabled (see settings above). When you block a group, users in this group cannot see the the option to enable the public frontend in their profile settings.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Public user');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'CB connection');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Registered user');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Author');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Editor');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Publisher');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Manager');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Admin');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'SuperAdmin');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'User accepts messages from registered users only.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Hide from public "All users" list');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'You can hide certain groups to be listed in the public "All users" list. Note: this hides the names only, the users can still receive messages. Users who have not enabled Public Frontend will never be listed in this list.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Hide from "All users" list');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'You can hide certain groups to be listed in the "All users" list. Note: this hides the names only, the users can still receive messages.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'none');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'superadmins only');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'admins only');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'special users');
DEFINE ('_UDDEADM_PUBLIC', 'Public');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Behavior of "All users" link');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Choose if the "All users" link should be suppressed in Public Frontend, displayed or if always all users should be shown.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Public Frontend');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- select public -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Allow public users to send a message');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Επιτρεπτό όριο μηνυμάτων επιτεύχθει!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Public user');
DEFINE ('_UDDEIM_DELETEDUSER', 'User deleted');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Captcha length');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Specifies how many characters a user must enter.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Captcha spam protection');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Specify who has to enter a captcha when sending a message');
DEFINE ('_UDDEADM_CAPTCHAF0', 'disabled');
DEFINE ('_UDDEADM_CAPTCHAF1', 'public users only');
DEFINE ('_UDDEADM_CAPTCHAF2', 'public and registered users');
DEFINE ('_UDDEADM_CAPTCHAF3', 'public, registered, special users');
DEFINE ('_UDDEADM_CAPTCHAF4', 'all users (incl. admins)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Enable public frontend');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'When enabled public users can send messages to your registered users (those can specify in their personal settings of they want to use this feature).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Public frontend default');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'This is the default value if a public user is allowed to send a message to a registered user.');
DEFINE ('_UDDEADM_PUBDEF0', 'disabled');
DEFINE ('_UDDEADM_PUBDEF1', 'enabled');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Wrong security code');
	
// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'μηδενικό ή άγνωστο');
DEFINE ('_UDDEADM_DONATE', 'If you like uddeIM and want to support the development please make a small donation.');
	
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Configuration found in database: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Backup and restore configuration');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'You can backup your configuration to the database and restore it when necessary. This is useful when you update uddeIM or when you want to save a certain configuration because of testing.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'BACKUP');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'RESTORE');
DEFINE ('_UDDEADM_CANCEL', 'Cancel');
	
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Language file character set');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Usually <b>default</b> (ISO-8859-1) is the correct setting for Joomla 1.0 and <b>UTF-8</b> for Joomla 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'default');
DEFINE ('_UDDEIM_READ_INFO_1', 'Τα διαβασμένα σας μηνύματα θα παραμείνουν στα εισερχόμενα για ');
DEFINE ('_UDDEIM_READ_INFO_2', ' μέρες πριν διαγραφούν αυτόματα από το σύστημα.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Τα μη διαβασμένα σας μηνύματα θα παραμείνουν στα εισερχόμενα για ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' μέρες πριν διαγραφούν αυτόματα από το σύστημα.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Τα σταλμένα σας μηνύματα θα παραμείνουν στα εξερχόμενα για ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' μέρες πριν διαγραφούν αυτόματα από το σύστημα.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Show inbox note for read messages');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Show inbox note <i>"Read messages will be deleted after n days"</i>');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Show inbox note for unread messages');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Show inbox note <i>"Unread messages will be deleted after n days"</i>');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Show outbox note for sent messages');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Show outbox note <i>"Sent messages will be deleted after n days"</i>');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Show trashcan note for trashed messages');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Show trashcan note <i>"Trashed messages will be purged after n days"</i>');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Sent messages kept for (days)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Enter the number of days until <b>sent</b> messages will automatically be erased from the outbox.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'send to all special users');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Message to <b>all special users</b>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- select username -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- επιλέξτε όνομα -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Edit user settings');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'υπάρχει');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'δεν υπάρχει');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- επιλέξτε εισαγωγή -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- επιλέξτε ειδοποίηση -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- επιλέξτε popup -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Username');
DEFINE ('_UDDEADM_USERSET_NAME', 'Όνομα');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Ειδοποίηση');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Popup');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Τελ. πρόσβαση');
DEFINE ('_UDDEADM_USERSET_NO', 'Όχι');
DEFINE ('_UDDEADM_USERSET_YES', 'Ναι');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'άγνωστο');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Όταν offline (εκτός απαντήσεων)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Πάντα (εκτός απαντήσεων)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Όταν offline');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Πάντα');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Χωρίς ειδοποίηση');
DEFINE ('_UDDEADM_WELCOMEMSG', "Welcome to uddeIM!\n\nYou have succesfully installed uddeIM.\n\nTry viewing this message with different templates. You can set them in the administration backend of uddeIM.\n\nuddeIM is a project in development. If you find bugs or weaknesses, please write them to me so that we can make uddeIM better together.\n\nGood luck and have fun!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'uddeIM installation complete.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Please continue to the administration backend and review the settings.');
DEFINE ('_UDDEADM_REVIEWLANG', 'If you are running the CMS in a character set other than ISO 8859-1 make sure to adjust the settings accordingly.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'After installation, all uddeIM e-mail traffic (e-mail notifications, fotgetmenot e-mails) is disabled so that no e-mails are sent as long as you are testing. Do not forget to disable "stop e-mail" in the backend when you are finished.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Max. παραλήπτες');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Μέγιστος αριθμός παραληπτών που επιτρέπεται ανά μήνυμα (0=χωρίς όριο)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'υπερβολικός αριθμός παραληπτών');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Αποστολή email απενεργοποιημένη.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Inside text searching');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Autocompleter searches inside the text (otherwise it searches from the beginning only)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'Behavior of "All users" link');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Choose if the "All users" link should be suppressed, displayed or if always all users should be shown.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Suppress "All Users" link');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Show "All Users" link');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Always show all users');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'Configuration is not writeable:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'Configuration is writeable:');
DEFINE ('_UDDEIM_FORWARDLINK', 'προώθηση');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'παραλήπτης βρέθηκε');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'παραλήπτες βρέθηκαν');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (default)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Mailsystem');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'Select mailsystem uddeIM should use to send notifications.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Show Joomla groups');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Show Joomla groups in general message list.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Forwarding of messages');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Allow forwarding of messages.');
DEFINE ('_UDDEIM_FWDFROM', 'Αρχικό μήνυμα από');
DEFINE ('_UDDEIM_FWDTO', 'προς');
	
// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Ακύρωση αρχειοθέτησης');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Μη δυνατή ακύρωση αρχειοθέτησης');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Allow multiple recipients');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Allow multiple recipients (comma separated).');
DEFINE ('_UDDEIM_CHARSLEFT', 'επιτρεπτοί χαρακτήρες');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Show text counter');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Shows a text counter which displays how many characters are left.');
DEFINE ('_UDDEIM_CLEAR', 'Καθάρισμα');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Εισαγωγή επιλεγμένων χρηστών στους παραλήπτες');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'This allows selection of multiple recipients from "All users" list.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Εισαγωγή επιλεγμένων επαφών στους παραλήπτες');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'This allows selection of multiple recipients from "CB connections" list.');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS found: ');
DEFINE ('_UDDEIM_ENTERNAME', 'εισάγετε όνομα');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Use autocomplete');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Use autocomplete for receiver names.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Key used for obfuscating');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Enter key which is used for message obfuscating. Do not change this value after message obfuscating has been enabled.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Wrong confguration file found!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Version found:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'Version expected:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Converting configuration...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Done!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Critical Error: Failed to write to configuration file:');
	
// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', 'Encrypted message! - Download not possible!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Wrong password! - Download not possible!');
DEFINE ('_UDDEIM_WRONGPW', 'Wrong password! - Please contact database administrator!');
DEFINE ('_UDDEIM_WRONGPASS', 'Wrong password!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Wrong trash dates (inbox/outbox): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Correcting wrong trash dates');
DEFINE ('_UDDEIM_TODP', 'Προς: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Prune messages now');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Show action icons');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'When set to <b>yes</b>, action links will be displayed with an icon.');
DEFINE ('_UDDEIM_UNCHECKALL', 'απεπιλογή όλων');
DEFINE ('_UDDEIM_CHECKALL', 'επιλογή όλων');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Show bottom icons');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'When set to <b>yes</b>, bottom links will be displayed with an icon.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Use animated smileys');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Use animated smileys instead of the static ones.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'More animated smileys');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Show more animated smileys.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Encrypted message - Password required');
DEFINE ('_UDDEIM_PASSWORD', 'Password required');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Password');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (encryption text)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (decryption text)');
DEFINE ('_UDDEIM_MORE', 'περισσότερα');
	
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Προσωπικά Μηνύματα');
DEFINE ('_UDDEMODULE_NONEW', 'δεν έχετε μήνυμα');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Νέα μηνύματα: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'μήνυμα');
DEFINE ('_UDDEMODULE_MESSAGES', 'μηνύματα');
DEFINE ('_UDDEMODULE_YOUHAVE', 'Έχετε');
DEFINE ('_UDDEMODULE_HELLO', 'Καλώς όρισες');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Άμεσο μήνυμα');
	
// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Use encryption');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Encrypt stored messages');
DEFINE ('_UDDEADM_CRYPT0', 'None');
DEFINE ('_UDDEADM_CRYPT1', 'Obfuscate messages');
DEFINE ('_UDDEADM_CRYPT2', 'Encrypt messages');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Default for e-mail notification');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Default value for e-mail notification (for users who have not changed their preferences yet).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'No notification');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Always');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Notification when offline');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Supress "All users" link');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Supress "All users" link in write new message box (useful when lots of users are registered).');
DEFINE ('_UDDEADM_POPUP_HEAD','Popup notification');
DEFINE ('_UDDEADM_POPUP_EXP','Show a popup when a new message arrives (mod_uddeim is needed)');
DEFINE ('_UDDEIM_OPTIONS', 'More settings');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Here you can configure some more settings.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Show a popup when a new message arrives');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Popup notification by default');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Enable popup notification by default (for users who have not changed their preferences yet).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Maintenance');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Database maintenance');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'CHECK');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'REPAIR');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', "When a user is purged from the database his messages are usually kept in the database. This function checks if it is necessary to trash orphaned messages and you can trash them if it is required.<br />This also checks the database for a few errors which will be corrected.");
DEFINE ('_UDDEADM_MAINTENANCE_MC1', "Checking...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC2', "<i>#nnn (Username): [inbox|inbox trashed|outbox|outbox trashed]</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC3', "<i>inbox: messages stored in users inbox</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC4', "<i>inbox trashed: messages trashed from users inbox, but still in someones outbox</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC5', "<i>outbox: messages stored in users outbox</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MC6', "<i>outbox trashed: messages trashed from users outbox, but still in someones inbox</i><br />");
DEFINE ('_UDDEADM_MAINTENANCE_MT1', "Trashing...<br />");
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "not found (from/to/settings/blocker/blocked):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', "delete all preferences from user");
DEFINE ('_UDDEADM_MAINTENANCE_MT3', "delete blocking of user");
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "trash all messages sent to deleted user in sender\'s outbox and deleted user\'s inbox");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "trash all messages sent from deleted user in his outbox and receiver\'s inbox");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Nothing to do</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Maintenance required</b><br />');
	
// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Show realnames');
DEFINE ('_UDDEADM_NAMESDESC', 'Show realnames or usernames?');
DEFINE ('_UDDEADM_REALNAMES', 'Realnames');
DEFINE ('_UDDEADM_USERNAMES', 'Usernames');
DEFINE ('_UDDEADM_CONLISTBOX', 'CB Connections listbox');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Show my connections in a listbox or in a table?');
DEFINE ('_UDDEADM_LISTBOX', 'Listbox');
DEFINE ('_UDDEADM_TABLE', 'Table');
DEFINE ('_UDDEIM_TRASHCAN_INFO', 'Μηνύματα στον κάδο αχρήστων θα παραμείνουν για 24 ώρες πριν διαγραφούν. Μπορείτε να δείτε μόνο τις αρχικές λέξεις ενός μηνύματος. Για να δείτε ολόκληρο το μήνυμα, θα πρέπει να το επαναφέρετε.');
DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Μηνύματα στον κάδο αχρήστων θα παραμείνουν για ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' ώρες πριν διαγραφούν. Μπορείτε να δείτε μόνο τις αρχικές λέξεις ενός μηνύματος. Για να δείτε ολόκληρο το μήνυμα, θα πρέπει να το επαναφέρετε.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Ανακαλέσατε το μήνυμα. Μπορείτε τώρα να το επεξεργαστείτε ή να το ξαναστείλετε.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Δεν ήταν δυνατό να ανακληθεί αυτό το μήνυμα (πιθανόν λόγω ταυτόχρονης ανάγνωσης ή διαγραφής από τον παραλήπτη).');
DEFINE ('_UDDEIM_CANTRESTORE', 'Το μήνυμα δεν επαναφέρεται (πιθανόν λόγω διαγραφής από το σύστημα).');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Το μήνυμα δεν επαναφέρθηκε (πιθανόν λόγω ταυτόχρονης διαγραφής από το σύστημα)..');
DEFINE ('_UDDEIM_DONTSEND', 'Ακύρωση αποστολής');
DEFINE ('_UDDEIM_SENDAGAIN', 'Επανάληψη αποστολής');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Δεν είσαστε συνδεδεμένος.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', 'Δεν έχετε εισερχόμενα μηνύματα.');
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', 'Δεν έχετε εξερχόμενα μηνύματα.');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', 'Δεν έχετε μηνύματα στον κάδο αχρήστων.');
DEFINE ('_UDDEIM_INBOX', 'Εισερχόμενα');
DEFINE ('_UDDEIM_OUTBOX', 'Εξερχόμενα');
DEFINE ('_UDDEIM_TRASHCAN', 'Κάδος Αχρήστων');
DEFINE ('_UDDEIM_CREATE', 'Νέο Μήνυμα');
DEFINE ('_UDDEIM_UDDEIM', 'Προσωπικά Μηνύματα');
DEFINE ('_UDDEIM_READSTATUS', 'Διαβασμένο');
DEFINE ('_UDDEIM_FROM', 'από');
DEFINE ('_UDDEIM_FROM_SMALL', 'από');
DEFINE ('_UDDEIM_TO', 'προς');
DEFINE ('_UDDEIM_TO_SMALL', 'προς');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Στα εξερχόμενα βρίσκονται όλα τα μηνύματα που έχετε στείλει. Μπορείτε να ανακαλέσετε ένα μήνυμα, εάν αυτό δεν έχει διαβαστεί ή διαγραφεί από τον παραλήπτη. Εάν το ανακαλέσετε, ο παραλήπτης δεν θα μπορεί να το διαβάσει. ');
	
// changed in 0.4
DEFINE ('_UDDEIM_RECALL', 'ανάκληση');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Ανάκληση μηνύματος');
DEFINE ('_UDDEIM_RESTORE', 'επαναφορά');
DEFINE ('_UDDEIM_MESSAGE', 'Μήνυμα');
DEFINE ('_UDDEIM_DATE', 'Ημερ/νία');
DEFINE ('_UDDEIM_DELETED', 'Διεγραμμένο');
DEFINE ('_UDDEIM_DELETE', 'διαγραφή');
DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');
DEFINE ('_UDDEIM_DELETELINK', 'διαγραφή');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Δεν είναι δυνατή η εμφάνιση του μηνύματος. <br />Πιθανές αιτίες:<ul><li>Δεν έχετε δικαιώματα ανάγνωσης αυτού του μηνύματος.</li><li>Το μήνυμα διεγράφη.</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Μεταφέρατε αυτό το μήνυμα στον κάδο των αχρήστων.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Μήνυμα από ');
DEFINE ('_UDDEIM_MESSAGETO', 'Μήνυμα από εσάς προς ');
DEFINE ('_UDDEIM_REPLY', 'Απάντηση');
DEFINE ('_UDDEIM_SUBMIT', 'Αποστολή');
DEFINE ('_UDDEIM_DELETEREPLIED', 'Μεταφορά αρχικού μηνύματος στον κάδο των αχρήστων');
DEFINE ('_UDDEIM_NOID', 'ΛΑΘΟΣ: Δεν βρέθηκε παραλήπτης. Το μήνυμα δεν απεστάλλει.');
DEFINE ('_UDDEIM_NOMESSAGE', 'ΛΑΘΟΣ: Το μήνυμα είναι κένο. Δεν απεστάλλει.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Η απάντηση απεστάλλει');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Το μήνυμα απεστάλλει');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' και το γνήσιο μήνυμα μεταφέρθηκε στον κάδο των αχρήστων.');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Δεν υπάρχει χρήστης με αυτό το όνομα!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Δεν είναι δυνατή η αποστολή μηνυμάτων στον εαυτό σας!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Παράβαση πρόσβασης!</b> Δεν έχετε δικαίωμα να εκτελέσετε αύτη την ενέργεια!');
DEFINE ('_UDDEIM_PRUNELINK', 'Admins only: Prune');
	
// Admin
DEFINE ('_UDDEADM_SETTINGS', 'uddeIM Administration');
DEFINE ('_UDDEADM_GENERAL', 'General');
DEFINE ('_UDDEADM_ABOUT', 'About');
DEFINE ('_UDDEADM_DATESETTINGS', 'Date/time');
DEFINE ('_UDDEADM_PICSETTINGS', 'Icons');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Read messages kept for (days)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Unread messages kept for (days)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Messages kept in trash for (days)');
DEFINE ('_UDDEADM_DAYS', 'day(s)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Enter the number of days until <b>read</b> messages will be erased automatically from the inbox. If you do not want to erase messages automatically, enter a very high value (e.g. 36524 days are equivalent to one century). But keep in mind that the database can fill up quickly if you keep all messages.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Enter the number of days until messages will be erased that have <b>not been read</b> by their intended recipient yet.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Enter the number of days until messages are erased from the trashcan. Decimal values are possible, e.g. to erase messages from the trashcan after 3 hours enter 0.125 as value.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Date display format');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Choose the format used when a date/time is being displayed. Months will be abbreviated according to your local language settings of Joomla (if a matching uddeIM language file is present).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Longer date display');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'When displaying messages there is more space for the date/time string. Choose the date format to display when opening a message. For weekday names and months the local language settings of Joomla will be used (if a matching uddeIM language file is present).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Deletions invoked');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'by admins only');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'by any user');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'manually');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Automatic deletions create heavy server load. If you choose <b>by admins only</b> automatic deletions are invoked when an admin checks his inbox. Choose this option if an admin is checking the inbox regulary. Small or rarely administered sites may choose <b>by any user</b>.');
	// above string changed in 0.4 
DEFINE ('_UDDEADM_SAVESETTINGS', 'Save settings');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'The following settings have been saved to config file:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Settings have been saved.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Icon: User is online');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Enter the location of the icon to be displayed next to the username when this user is online.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Icon: User is offline');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Enter the location of the icon to be displayed next to the username when this user is offline.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Icon: Read message');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Enter the location of the icon to be displayed for read messages.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Icon: Unread message');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Enter the location of the icon to be displayed for unread messages.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Module: New Messages Icon');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'This setting refers to the mod_uddeim module. Enter the location of the icon that this module shall display when there are new messages.');
	
// admin import tab
DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM Installation');
DEFINE ('_UDDEADM_FINISHED', 'Installation is finished. Welcome to uddeIM. ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">You do not have Mambo Community Builder installed. You will not be able to use uddeIM.</span><br /><br />You might want to download <a href="http://www.mambojoe.com">Mambo Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'continue');
DEFINE ('_UDDEADM_PMSFOUND_1', 'There are ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' messages in the old PMS installation. Do you want to import these messages into uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'This will not alter the old PMS messages or your installation. They will be kept intact and you can safely import them into uddeIM, even if you consider to continue using the old PMS. You should save any changes you made to the settings first before running the import! All messages that are already in your uddeIM database will remain intact.');
	
// _UDDEADM_IMPORT_EXP above changed in 0.4
	
DEFINE ('_UDDEADM_IMPORT_YES', 'Import old PMS messages into uddeIM now');
DEFINE ('_UDDEADM_IMPORT_NO', 'No, do not import any messages');  
DEFINE ('_UDDEADM_IMPORTING', 'Please wait while messages are being imported.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Done importing messages from old PMS. Do not run this installation script again because doing so will import the messages again and they will show up twice.'); 
DEFINE ('_UDDEADM_IMPORT', 'Import');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Import messages from old PMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'No other PMS installation found. Import not possible.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">You have already imported the messages from the old PMS into uddeIM.</span>');
	
// new in 0.3 Frontend
DEFINE ('_UDDEIM_BLOCKS', 'Αποκλεισμένος');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Δεν στάλθηκε (ο χρήστης σας έχει αποκλείσει)');
DEFINE ('_UDDEIM_BLOCKNOW', 'αποκλεισμός&nbsp;χρήστη');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Αυτή είναι η λίστα των χρηστών που έχετε αποκλείσει. Αυτοί οι χρήστες δεν μπορούν να σας στείλουν μήνυμα.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Δεν έχετε αποκλείσει κανέναν χρήστη.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Έχετε αποκλείσει ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' χρήστη(ες).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[αναίρεση]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Όταν ένας αποκλεισμένος χρήστης προσπαθήσει να σας στείλει μήνυμα, θα ενημερωθεί ότι είναι αποκλεισμένος και ότι δεν μπορεί να σας στείλει μήνυμα.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Οι αποκλεισμένοι χρήστες δεν θα γνωρίζουν ότι τους έχετε αποκλείσει.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Δεν μπορείτε να αποκλέισετε τους διαχειριστές του site.');
	
// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Enable blocking system');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'When enabled, users can block other users. A blocked user can not send messages to the user who has blocked him. Admins can\'t be blocked.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'yes');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'no');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Blocked user information');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'If set to <b>yes</b>, a blocked user will be informed that the message has not been sent because the recipient has blocked him. If set to <b>no</b>, the blocked user does not get any notification that the message has not been sent.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'yes');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'no');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Blocking system not enabled');

// DEFINE ('_UDDEADM_DELETIONS', 'Messages'); 
// translators info: comment out or delete line above to avoid double definition.
// new definition right below.
DEFINE ('_UDDEADM_DELETIONS', 'Deletion'); // changed in 0.4
DEFINE ('_UDDEADM_BLOCK', 'Blocking');
	
// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Integration');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Show online status');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'When set to <b>yes</b>, uddeIM displays every username with a small icon that informs if this user is online or offline.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Allow e-mail notification');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'When set to <b>yes</b>, users can choose if they want to get an e-mail every time a new message arrives in the inbox.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-mail contains message');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'When set to <b>no</b>, this e-mail will only contain information about when and by whom the message was sent, but not the message itself.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Forgetmenot e-mail');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'This feature sends an e-mail to users who have unread messages in their inbox for a very long time (set below). This setting is independent from the \'allow e-mail notification\'. If you do not want to send out any e-mail messages you have to turn off both.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Forgetmenot sent after day(s)');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'If the forgetmenot feature (above) is set to <b>yes</b>, set here after how many days e-mail notifications about unread messages shall be dispatched.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'First characters list');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'You can set here how many characters of a message will be displayed in the inbox, outbox and trashcan.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Message maximum length');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Set the maximum length of a message (a message will be truncated automatically when its length exceeds this value). Set to \'0\' to allow for messages of any length (not recommended).');
DEFINE ('_UDDEADM_YES', 'yes');
DEFINE ('_UDDEADM_NO', 'no');
DEFINE ('_UDDEADM_ADMINSONLY', 'admins only');
DEFINE ('_UDDEADM_SYSTEM', 'System');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'System messages username');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM supports system messages. They do not have a sender and users can\'t reply to them. Enter here the default username alias for system messages (for example <b>Support</b> or <b>Help desk</b> or <b>Community Master</b>).');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Allow admins to send general messages');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM supports general messages. They are sent to every user on your system. Use them sparingly.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'E-mail sender name');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Enter the name from which e-mail notifications come from (for example <b>Your Site</b> or <b>Messaging Service</b>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'E-mail sender address');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Enter the e-mail address from which e-mail notifications are sent from (this should be the main contact e-mail address of your site.');
DEFINE ('_UDDEADM_VERSION', 'uddeIM version');
DEFINE ('_UDDEADM_ARCHIVE', 'Αρχείο'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Enable archive');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Choose if users shall be allowed to store messages in an archive. Messages in the archive will not be deleted automatically.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Max messages in archive');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Set how many messages every user may store in the archive (no limit for admins).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Allow self copies');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Allows users to receive copies of messages they are sending. These copies will appear in the inbox.');
DEFINE ('_UDDEADM_MESSAGES', 'Μηνύματα');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Suggest to trash original');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'When activated this will put a checkbox next to the \'Send\' reply button called \'trash original\' that is checked by default. In this case a message will immediately be moved from the inbox to trashcan when a reply has been sent. This function reduces the number of messages kept in the database. Users can uncheck the box if they want to keep a message in the inbox.');
	
// translators info: 'Send' is the same as _UDDEIM_SUBMIT, 
// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
	
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Messages per page');	
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Define here the number of messages displayed per page in inbox, outbox, trashcan and archive.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Used charset');
DEFINE ('_UDDEADM_CHARSET_EXP', 'If you\'re experiencing problems with non-latin character sets displayed, you can enter the charset uddeIM uses to convert database output to HTML code here. The default value is correct for most European languages.');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Used mail charset');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'If you\'re experiencing problems with non-latin character sets displayed, you can enter the charset uddeIM uses to send outgoing e-mails with. The default value is correct for most European languages.');
	
// translators info: if you're translating into a language that uses a latin charset
// (like English, Dutch, German, Swedish, Spanish, ... ) you might want to add a line
// saying 'For usage in [mylanguage] the default value is correct.'
		
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'This is the content of the e-mail users will receive when the option is set above. The content of the message will not be in the e-mail. Keep the variables %you%, %user% and %site% intact. ');		
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'This is the content of the e-mail users will receive when the option is set above. This e-mail will include the content of the message. Keep the variables %you%, %user%, %pmessage% and %site% intact. ');		
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'This is the content of the forgetmenot e-mail users will receive when the option is set above. Keep the variables %you% and %site% intact. ');		
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Allow users to download messages from their archive by sending them as e-mail to themselves.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Allow download');	
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'This is the format of the e-mail users will receive when they download their own messages from the archive. Keep the variables %user%, %msgdate% and %msgbody% intact. ');	
	
// translators info: Don't translate %you%, %user%, etc. in the strings above. 
DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Set inbox limit');		
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'You can include the number of messages in the inbox into the maximum number of archived messages. In this case, the number of messages in inbox and archive in total must not exceed the number set above. Alternatively, you can set the inbox limit without an archive. In this case, users may have no more than the number of messages set above in their inboxes. If the number is reached, they will no longer be able to reply to messages or to compose new ones until they delete old messages from the inbox or archive respectively (users will still be able to receive and read messages).');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Show limit usage at inbox');		
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Display how many messages users have stored (and how many they are allowed to store) in a line below the inbox.');
		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'You have turned off the archive. How do you want to handle messages that are saved in the archive?');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Leave them');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Leave them in the archive (user will not be able to access the messages and they will still count against message limits).');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Move to inbox');		
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Archived messages moved to inboxes');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Messages will be moved to the inbox of the respective user (or to trash if they are older than allowed in the inbox).');		
		
// 0.4 frontend, admins only (no translation necessary)		
DEFINE ('_UDDEIM_VALIDFOR_1', 'valid for ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' hours. 0=forever (automatic deletions apply)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Create system or general message]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Create a normal (standard) message]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'System and general messages not allowed.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Type of message');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Help on system messages');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(opens in new window)');
DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'You are about to send the message displayed below. Please review and confirm or cancel!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Message to <b>all users</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Message to <b>all admins</b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Message to <b>all currently logged in users</b>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Recipients will not be able to reply to this message.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Message will be sent with <b>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</b> as username');
DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Message will expire ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Message will not expire');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Check the link (by clicking on it) before proceeding!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Usage <b>in system messages only</b>:<br /> [b]<b>bold</b>[/b] [i]<em>italic</em>[/i]<br />
[url=http://www.someurl.com]some url[/url] or [url]http://www.someurl.com[/url] are links');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Error: No recipients found. Message not sent.');		
DEFINE ('_UDDEIM_CANTREPLY', 'Δεν μπορείτε να απαντήσετε σε αυτό το μήνυμα.');
DEFINE ('_UDDEIM_EMNOFF', 'Η ειδοποίηση μέσω email είναι απενεργοποιημένη. ');
DEFINE ('_UDDEIM_EMNON', 'Η ειδοποίηση μέσω email είναι ενεργοποιημένη. ');
DEFINE ('_UDDEIM_SETEMNON', '[ενεργοποίησέ το]');
DEFINE ('_UDDEIM_SETEMNOFF', '[απενεργοποίησέ το]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"Hi %you%,\n\n%user% σας έστειλε ένα νέο προσωπικό μήνυμα στο %site%. Συνδεθείτε για να το διαβάσετε!");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE',
"Hi %you%,\n\n%user% σας έστειλε το ακόλουθο προσωπικό μήνυμα στο %site%. Συνδεθείτε για να απαντήσετε!\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT',
"Hi %you%,\n\nέχετε μή διαβασμένα μηνύματα στο %site%. Συνδεθείτε για να τα διαβάσετε!");
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Έχετε μηνύματα στο %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'send as system message (=recipients cannot reply)');
DEFINE ('_UDDEIM_SEND_TOALL', 'send to all users');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'send to all admins');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'send to all online users');
DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Μη αναμενόμενο λάθος: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Η αρχειοθέτηση είναι απενεργοποιημένη.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Η αποθήκευση μηνυμάτων στο αρχείο απέτυχε.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Αποθηκεύσατε ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<b>Δεν έχετε αποθηκεύσει κανένα μήνυμα στο αρχειό ακόμα.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<b>Δεν έχετε μηνύματα στο αρχείο σας.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' μηνύματα');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Αποθηκεύσατε ένα μήνυμα');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Για να αποθηκεύσετε νέα μηνύματα, θα πρέπει να διαγράψετε πρώτα μερικά ήδη αποθηκευμένα.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Μπορείτε να αποθηκεύσετε μέχρι ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' μηνύματα.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Έχετε ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' μηνύματα σ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' μήνυμα σ'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in one "message in your")
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'το αρχείο σας');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'τα εισερχόμενά σας');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'τα εισερχόμενα και το αρχείο σας');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Το μέγιστο επιτρεπτό όριο είναι ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Μπορείτε ακόμα να λάβετε και να διαβάσετε μηνύματα, αλλά δεν θα μπορείτε να απαντήσετε η να στείλετε νέα, μέχρι να διαγράψετε μερικά από τα υπάρχοντα.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Αποθηκευμένα μηνύματα: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(από μέγιστο όριο ');
DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Το μήνυμα αποθηκεύτηκε στο αρχείο.');
DEFINE ('_UDDEIM_STORE', 'αρχειοθέτηση');				// translators info: as in: 'store this message in archive now'
DEFINE ('_UDDEIM_BACK', 'επιστροφή');
DEFINE ('_UDDEIM_TRASHCHECKED', 'διαγραφή επιλεγμένων');	// translators info: plural!
DEFINE ('_UDDEIM_SHOWALL', 'εμφάνιση όλων');				// translators example "SHOW ALL messages"
DEFINE ('_UDDEIM_ARCHIVE', 'Αρχείο');				// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'Το αρχείο είναι γεμάτο. Το μήνυμα δεν αποθηκεύτηκε.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'Δεν επιλέξατε μήνυμα.');
DEFINE ('_UDDEIM_THISISACOPY', 'Αντίγραφο μηνύματος που στείλατε σε ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'αντίγραφο σε μένα');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'αντίγραφο στο αρχείο');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'διαγραφή αρχικού');
DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Κατέβασμα μηνύματος');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'Email με μηνύματα εστάλλει');
DEFINE ('_UDDEIM_EXPORT_NOW', 'αποστολή με email των επιλεγμένων σε μένα');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Αυτό το email περιέχει τα προσωπικά σας μηνύματα.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Αδυναμία αποστολής email.');
DEFINE ('_UDDEIM_LIMITREACHED', 'Είσαστε στο όριο μέγιστων μηνυμάτων! Αδύνατη η επαναφορά.');
DEFINE ('_UDDEIM_WRITEMSGTO', 'Δημιουργία μηνύματος προς ');

$udde_smon[1]="Ιαν";
$udde_smon[2]="Φεβ";
$udde_smon[3]="Μαρ";
$udde_smon[4]="Απρ";
$udde_smon[5]="Μάι";
$udde_smon[6]="Ιούν";
$udde_smon[7]="Ιούλ";
$udde_smon[8]="Αύγ";
$udde_smon[9]="Σεπ";
$udde_smon[10]="Οκτ";
$udde_smon[11]="Νοε";
$udde_smon[12]="Δεκ";

$udde_lmon[1]="Ιανουαρίου";
$udde_lmon[2]="Φεβρουαρίου";
$udde_lmon[3]="Μαρτίου";
$udde_lmon[4]="Απριλίου";
$udde_lmon[5]="Μαϊου";
$udde_lmon[6]="Ιουνίου";
$udde_lmon[7]="Ιουλίου";
$udde_lmon[8]="Αυγούστου";
$udde_lmon[9]="Σεπτεμβρίου";
$udde_lmon[10]="Οκτωβρίου";
$udde_lmon[11]="Νοεμβρίου";
$udde_lmon[12]="Δεκεμβρίου";

$udde_lweekday[0]="Κυριακή";
$udde_lweekday[1]="Δευτέρα";
$udde_lweekday[2]="Τρίτη";
$udde_lweekday[3]="Τετάρτη";
$udde_lweekday[4]="Πέμπτη";
$udde_lweekday[5]="Παρασκευή";
$udde_lweekday[6]="Σάββατο";
$udde_sweekday[0]="Κυρ";
$udde_sweekday[1]="Δευ";
$udde_sweekday[2]="Τρι";
$udde_sweekday[3]="Τετ";
$udde_sweekday[4]="Πεμ";
$udde_sweekday[5]="Παρ";
$udde_sweekday[6]="Σαβ";

// new in 0.5 ADMIN
DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM Template');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Choose the template you want uddeIM to use');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Show CB Connections');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Use <b>yes</b> if you have Community Builder installed and want to display the user\'s connections on the compose new message page.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Show settings');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'The settings link appears automatically in uddeIM if you have e-mail notification or the blocking system activated. You can specify its position and you can turn it off completely.');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'yes, at bottom');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Allow BB code tags');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'font formats only');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Use <b>font formats only</b> to allow users to use the BB code tags for bold, italic, underline, font color and font size. When you set this option to <b>yes</b>, users are allowed to use <b>all</b> supported BB code tags (e.g. links and images).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Allow Emoticons');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'When set to <b>yes</b>, emoticon codes like :-) are replaced with emoticon graphics in message display.');
DEFINE ('_UDDEADM_DISPLAY', 'Display');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Show Menu Icons');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'When set to <b>yes</b>, menu links will be displayed using an icon.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Component Title');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Enter the headline of the private messaging component, for example \'Private Messages\'. Leave empty if you do not want to display a headline.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Show About link');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Set to <b>yes</b> to show a link to the uddeIM software credits and license. This link will be placed at the bottom of the uddeIM output.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Stop e-mail');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Check this box to prevent uddeIM from sending out e-mails (e-mail notifications and forgetmenot e-mails) irrespective of the users\' settings, for example when testing the site.');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB thumbnails in lists');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Set to <b>yes</b> if you want to display Community Builder thumbnails in the message lists overview (inbox, outbox, etc.)');

// new in 0.5 FRONTEND
DEFINE ('_UDDEIM_SHOWUSERS', 'Εμφάνιση Χρηστών');
DEFINE ('_UDDEIM_CONNECTIONS', 'Επαφές');
DEFINE ('_UDDEIM_SETTINGS', 'Ρυθμίσεις');
DEFINE ('_UDDEIM_NOSETTINGS', 'Δεν υπάρχουν ρυθμίσεις προς επεξεργασία.');
DEFINE ('_UDDEIM_ABOUT', 'About'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Δημιουργία'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'Ειδοποίηση μέσω email');
DEFINE ('_UDDEIM_EMN_EXP', 'Λήψη ειδοποιήσεων νέων προσωπικών μηνυμάτων μέσω email.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'Ειδοποίηση μέσω email για νέα μηνύματα');
DEFINE ('_UDDEIM_EMN_NONE', 'Χωρίς ειδοποίηση μέσω email');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'Ειδοποίηση μέσω email μόνο όταν είμαι εκτός δικτύου');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Χωρίς ειδοποίηση απαντήσεων');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Αποκλεισμός Χρήστη'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Μπορείται να αποτρέψετε σε χρήστες να σας στέλνουν μηνύματα αν τους κάνετε block. Επιλέξτε <b>αποκλεισμός χρήστη</b> όταν λάβετε μήνυμα από τον χρήστη που θέλετε να αποκλείσετε.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Αποθήκευση αλλαγών');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB κωδικός για εμφάνιση έντονου κειμένου. Χρήση: [b]bold[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB κωδικός για εμφάνιση πλαγίου κειμένου. Χρήση: [i]italic[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB κωδικός για εμφάνιση υπογεγραμμένου κειμένου. Χρήση: [u]underline[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB κωδικός για εμφάνιση χρωματιστού κειμένου. Χρήση [color=#XXXXXX]colored[/color] όπου XXXXXX είναι ο hex κωδικός του χρώματος που θέλετε, πχ. FF0000 για κόκκινο.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB κωδικός για εμφάνιση χρωματιστού κειμένου. Χρήση [color=#XXXXXX]colored[/color] όπου XXXXXX είναι ο hex κωδικός του χρώματος που θέλετε, πχ. FF0000 για πράσινο.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB κωδικός για εμφάνιση χρωματιστού κειμένου. Χρήση [color=#XXXXXX]colored[/color] όπου XXXXXX είναι ο hex κωδικός του χρώματος που θέλετε, πχ. FF0000 για μπλε.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB κωδικός για εμφάνιση πολύ μικρού μεγέθους κείμενο. Χρήση: [size=1]very small text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB κωδικός για εμφάνιση μικρού μεγέθους κείμενο. Χρήση: [size=2] small text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB κωδικός για εμφάνιση μεγάλου μεγέθους κείμενο. Χρήση: [size=4]big text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB κωδικός για εμφάνιση πολύ μεγάλου μεγέθους κείμενο. Χρήση: [size=5]very big text.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB κωδικός για εισαγωγή συνδέσμου (link) εικόνας. Χρήση: [img]Image-URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB κωδικός για εισαγωγή υπέρ-συνδέσμου (hyperlink). Χρήση: [url]web address[/url]. Μην ξεχάσετε το http:// στην αρχή της διεύθυνσης του συνδέσμου.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Κλείσιμο όλων των ανοιχτών ΒΒ.');
