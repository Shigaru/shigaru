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
// Language file: Hrvatski  (source file is win1250)
// Translator:     Tanja Dragisic <noemail>, www.05vizija.net
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
DEFINE ('_UDDEIM_FILEUPLOAD_FAILED', 'Upload datoteke nije uspio');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_5', '...odredi standardnu postavku za datoteke u privitku');
DEFINE ('_UDDEADM_ENABLEATTACHMENT_HEAD', 'Uklju�i datoteke privitka');
DEFINE ('_UDDEADM_ENABLEATTACHMENT_EXP', 'Ovo omogu�ava svim registriranim korisnicima ili samo administratorima da �alju datoteke u privitku poruka.');
DEFINE ('_UDDEADM_MAXSIZEATTACHMENT_HEAD', 'Max. veli�ina datoteke');
DEFINE ('_UDDEADM_MAXSIZEATTACHMENT_EXP', 'Max. dozvoljena veli�ina datoteke u privitku.');
DEFINE ('_UDDEIM_FILESIZE_EXCEEDED', 'Prema�ena je max. dozvoljena veli�ina datoteke');
DEFINE ('_UDDEADM_BYTES', 'Bytova');
DEFINE ('_UDDEADM_MAXATTACHMENTS_HEAD', 'Max. privitaka');
DEFINE ('_UDDEADM_MAXATTACHMENTS_EXP', 'Max. dozvoljeni broj privitaka po poruci.');
DEFINE ('_UDDEIM_DOWNLOAD', 'Download');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_HEAD', 'Brisanje datoteke vr�i');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_YES', 'samo administratori');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_NO', 'bilo koji korisnik');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_MANUALLY', 'ru�no');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_EXP', 'Automatsko brisanje mo�e uzrokovati veliko optere�enje servera. Ako odaberete <b>samo administratori</b>, automatsko brisanje pokre�e se kad administrator provjerava svoju ulaznu po�tu. Odaberite ovu opciju ako administrator redovno provjerava ulaznu po�tu. Mali ili rijetko administrirani sajtovi mogu odabrati opciju <b>bilo koji korisnik</b>.');
DEFINE ('_UDDEADM_FILEMAINTENANCE_PRUNE', 'O�isti datoteke');
DEFINE ('_UDDEADM_FILEMAINTENANCEDEL_HEAD', 'Dozovi brisanje datoteke');
DEFINE ('_UDDEADM_FILEMAINTENANCEDEL_EXP', 'Uklanja izbrisane datoteke iz baze podataka. Ovo je isto kao i na kartici \'O�isti datoteke\'.');
DEFINE ('_UDDEADM_FILEMAINTENANCEDEL_ERASE', 'IZBRI�I');
DEFINE ('_UDDEIM_ATTACHMENTS', 'Privitci (max. %u bytova po datoteci):');
DEFINE ('_UDDEADM_MAINTENANCE_F1', 'Privitci bez pripadnosti koji su pohranjeni u sustavu datoteka: ');
DEFINE ('_UDDEADM_MAINTENANCE_F2', 'Brisanje datoteka bez pripadnosti');
DEFINE ('_UDDEADM_BACKUP_DONE', 'Zavr�en je backup konfiguracije.');
DEFINE ('_UDDEADM_RESTORE_DONE', 'Zavr�eno je vra�anje konfiguracije.');
DEFINE ('_UDDEADM_PRUNE_DONE', 'Zavr�eno je �i��enje poruka.');
DEFINE ('_UDDEADM_FILEPRUNE_DONE', 'Zavr�eno je �i��enje datoteka iz privitka.');
DEFINE ('_UDDEADM_FOLDERCREATE_ERROR', 'Gre�ka u kreiranju mape: ');
DEFINE ('_UDDEADM_ATTINSTALL_WRITEFAILED', 'Gre�ka u kreiranju datoteke: ');
DEFINE ('_UDDEADM_ATTINSTALL_IGNORE', 'Ovu gre�ku mo�ete ignorirati ako nemate File attachments premium plugin (vidi FAQ).');
DEFINE ('_UDDEADM_ATTACHMENTGROUPS_HEAD', 'Dozvoljene grupe');
DEFINE ('_UDDEADM_ATTACHMENTGROUPS_EXP', 'Grupe koje smiju slati datoteke u privitku.');
DEFINE ('_UDDEIM_SELECT', 'Odabir');
DEFINE ('_UDDEIM_ATTACHMENT', 'Privitak');
DEFINE ('_UDDEADM_SHOWLISTATTACHMENT_HEAD', 'Prika�i ikone za privitak');
DEFINE ('_UDDEADM_SHOWLISTATTACHMENT_EXP', 'U popisu poruka prikazati ikone za privitke (ulazna po�ta, izlazna po�ta, arhiva).');
DEFINE ('_UDDEIM_HELP_ATTACHMENT', 'Ova poruka sadr�i datoteku u privitku.');
DEFINE ('_UDDEADM_MAINTENANCE_COUNTFILES', 'Reference datoteke u bazi podataka:');
DEFINE ('_UDDEADM_MAINTENANCE_COUNTFILESDISTINCT', 'Datoteke privitaka su spremljene:');
DEFINE ('_UDDEADM_SHOWMENUCOUNT_HEAD', 'Prika�i broja�e');
DEFINE ('_UDDEADM_SHOWMENUCOUNT_EXP', 'Kad je odabrano <b>da</b>, izborni�ka traka sadr�i broja� poruka. Napomena: Ovo zahtijeva vi�e dodatnih upita u bazi podataka pa stoga ne koristite na slabijim sustavima.');
DEFINE ('_UDDEADM_CONFIG_FTPLAYER', 'Konfiguracija (pristup s FTP):');

// New: 1.8
// %s will be replaced by _UDDEIM_NOMESSAGES_FILTERED_INBOX, _UDDEIM_NOMESSAGES_FILTERED_OUTBOX, _UDDEIM_NOMESSAGES_FILTERED_ARCHIVE
// Translators help: When having problems with the grammar, you can also move some text (e.g. "in your") to _UDDEIM_NOMESSAGES_FILTERED_* variables, e.g.
// instead of "_UDDEIM_NOMESSAGES_FILTERED_INBOX=inbox" you can also use "_UDDEIM_NOMESSAGES_FILTERED_INBOX=in your inbox"
DEFINE ('_UDDEIM_NOMESSAGES2_FR_FILTERED', '<b>Nemate poruka od ovog korisnika u%s.</b>');
DEFINE ('_UDDEIM_NOMESSAGES2_TO_FILTERED', '<b>Nemate poruka od ovog korisnika u%s.</b>');
DEFINE ('_UDDEIM_NOMESSAGES2_UNFR_FILTERED', '<b>Nemate nepro�itanih poruka od ovog korisnika u%s.</b>');
DEFINE ('_UDDEIM_NOMESSAGES2_UNTO_FILTERED', '<b>Nemate nepro�itanih poruka od ovog korisnika u%s.</b>');

// New: 1.7
DEFINE ('_UDDEADM_EMAILSTOPPED', '\'Email stop\' uklju�eno.');
DEFINE ('_UDDEIM_ACCOUNTLOCKED', 'Pristup va�oj ulaznoj po�ti je zaklju�an. Kontaktirajte administratora stranica.');
DEFINE ('_UDDEADM_USERSET_LOCKED', 'Zaklju�ano');
DEFINE ('_UDDEADM_USERSET_SELLOCKED', '- Zaklju�ano -');
DEFINE ('_UDDEADM_CBBANNED_HEAD', 'Provjera zabranjenih CB korisnika');
DEFINE ('_UDDEADM_CBBANNED_EXP', 'Kad je uklju�eno, aktivira se uddeIM provjera da li je korisnik zabranjen u CB, te mu se zabranjuje pristup u uddeIM. Osim toga, drugi korisnici ne mogu slati poruke zabranjenom korisniku.');
DEFINE ('_UDDEIM_YOUAREBANNED', 'Vi ste pod zabranom. Kontaktirajte administratora ili moderatora.');
DEFINE ('_UDDEIM_USERBANNED', 'Korisnik je pod zabranom');
DEFINE ('_UDDEADM_JOOBB', 'Joo!BB');
DEFINE ('_UDDEPLUGIN_SEARCHSECTION', 'Privatne poruke');
DEFINE ('_UDDEPLUGIN_MESSAGES', 'Privatne poruke');
DEFINE ('_UDDEADM_MAINTENANCEDEL_HEAD', 'Smanji broj poruka');
// note "This  is the same as _UDDEADM_MAINTENANCE_PRUNE on the system tab."
DEFINE ('_UDDEADM_MAINTENANCEDEL_EXP', 'Uklanja izbrisane poruke iz baze podataka. Ovo je isto kao i \'Smanji broj poruka\' na kartici sustava.');
DEFINE ('_UDDEADM_MAINTENANCEDEL_ERASE', 'IZBRI�I');
DEFINE ('_UDDEADM_REPORTSPAM_HEAD', 'Link za prijavu poruke');
DEFINE ('_UDDEADM_REPORTSPAM_EXP', 'Kad je uklju�eno prikazuje link \'Prijavi poruku\' koji omogu�ava korisnicima da administratoru prijave SPAM.');
DEFINE ('_UDDEIM_TOOLBAR_REMOVESPAM', 'Izbri�i poruku');
DEFINE ('_UDDEIM_TOOLBAR_REMOVEREPORT', 'Izbri�i izvje��e');
DEFINE ('_UDDEIM_TOOLBAR_SPAMCONTROL', 'Kontrola izvje��a');
DEFINE ('_UDDEADM_INFORMATION', 'Informacije');
DEFINE ('_UDDEADM_SPAMCONTROL_STAT', 'Prijavljene poruke:');
DEFINE ('_UDDEADM_SPAMCONTROL_TRASHED', 'Izbrisano');
DEFINE ('_UDDEADM_SPAMCONTROL_NOTEDEL', 'Izbrisati ovu poruku iz baze podataka?');
DEFINE ('_UDDEADM_SPAMCONTROL_NOTEREMOVE', 'Izbrisati ovo izvje��e?');
DEFINE ('_UDDEADM_SPAMCONTROL_SHOWHIDE', 'Prikazati/Sakriti');
DEFINE ('_UDDEADM_SPAMCONTROL_EDIT', 'Kontrolni centar izvje��a');
DEFINE ('_UDDEADM_SPAMCONTROL_FROM', 'Od');
DEFINE ('_UDDEADM_SPAMCONTROL_TO', 'Za');
DEFINE ('_UDDEADM_SPAMCONTROL_TEXT', 'Poruka');
DEFINE ('_UDDEADM_SPAMCONTROL_DELETE', 'Izbri�i');
DEFINE ('_UDDEADM_SPAMCONTROL_REMOVE', 'Ukloni');
DEFINE ('_UDDEADM_SPAMCONTROL_DATE', 'Datum');
DEFINE ('_UDDEADM_SPAMCONTROL_REPORTED', 'Prijavljeno');
DEFINE ('_UDDEIM_SPAMCONTROL_REPORT', 'Prijavi poruku');
DEFINE ('_UDDEIM_SPAMCONTROL_MARKED', 'Poruka je prijavljena');
DEFINE ('_UDDEIM_SPAMCONTROL_UNREPORT', 'Opozovi ovo izvje��e');
DEFINE ('_UDDEADM_JOMSOCIAL', 'JomSocial');
DEFINE ('_UDDEADM_KUNENA', 'Kunena');
DEFINE ('_UDDEADM_ADMIN_FILTER', 'Filter');
DEFINE ('_UDDEADM_ADMIN_DISPLAY', 'Prikazati #');
DEFINE ('_UDDEADM_TRASHORIGINALSENT_HEAD', 'Ukloni poslane poruke');
DEFINE ('_UDDEADM_TRASHORIGINALSENT_EXP', 'Kad je uklju�eno, ovo �e postaviti ku�icu za ozna�avanje pored dugmeta \'Po�alji\' koja �e se zvati \'poruka u sme�e\' , ova ku�ica nije automatski ozna�ena. Korisnici mogu ozna�iti ku�icu ako �ele izbrisati poslanu poruku odmah nakon njenog slanja.');
DEFINE ('_UDDEIM_TRASHORIGINALSENT', 'poruka u sme�e');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_4', '...odre�ivanje standardnih postavki za brisanje poslanih poruka, prijavljivanje spama, CB korisnike pod zabranom');
DEFINE ('_UDDEADM_VERSIONCHECK_IMPORTANT', 'Va�ni linkovi:');
DEFINE ('_UDDEADM_VERSIONCHECK_HOTFIX', 'Hotfix');
DEFINE ('_UDDEADM_VERSIONCHECK_NONE', 'Nijedan');
DEFINE ('_UDDEADM_MAINTENANCEFIX_HEAD', "Odr�avanje kompatibilnosti");
DEFINE ('_UDDEADM_MAINTENANCEFIX_EXP', "uddeIM korisiti dvije XML datoteke kako bi osigurao da se zip datoteke mogu instalirati na Joomla 1.0 i 1.5. U Joomla 1.5, jedna XML datoteka nije potrebna te ovo prisiljava Menad�era Ekstenzija da prika�e neto�nu obavijest o nekompatibilnosti. Ovo bri�e nepotrebne datoteke kako se upozorenje ne bi vi�e prikazivalo.");
DEFINE ('_UDDEADM_MAINTENANCE_FIX', "POPRAVLJANJE");
DEFINE ('_UDDEADM_MAINTENANCE_XML1', "Joomla 1.0 i Joomla 1.5 XML instaleri za uddeIM zapakirane datoteke postoje.<br />");
DEFINE ('_UDDEADM_MAINTENANCE_XML2', "Ovo je potrebno za instalaciju zip datoteka u Joomla 1.0 i Joomla 1.5.<br />");
DEFINE ('_UDDEADM_MAINTENANCE_XML3', "Kako Joomla 1.0. instaler nije potreban nakon instalacije, on mo�e biti izbrisan iz Joomla 1.5 sustava.<br />");
DEFINE ('_UDDEADM_MAINTENANCE_XML4', "Ovo �e biti u�injeno za slijede�e zapakirane datoteke:<br />");
DEFINE ('_UDDEADM_MAINTENANCE_FXML1', "Nepotrebni XML instaleri za slijede�e uddeIM zip datoteke bit �e izbrisani:<br />");
DEFINE ('_UDDEADM_MAINTENANCE_FXML2', "Nije prona�en nijedan nepotreban XML instaler za uddeIM zip datoteke!<br />");
DEFINE ('_UDDEADM_SHOWMENUICONS1_HEAD', 'Izgled izborni�ke trake');
DEFINE ('_UDDEADM_SHOWMENUICONS1_EXP', 'Ovdje mo�ete odrediti da li �e se izborni�ka traka prikazivati s ikonama i/ili tekstom.');
DEFINE ('_UDDEIM_MENUICONS_P1', 'Ikone i tekst');
DEFINE ('_UDDEIM_MENUICONS_P2', 'Samo ikone');
DEFINE ('_UDDEIM_MENUICONS_P0', 'Samo tekst');
DEFINE ('_UDDEIM_LISTSLIMIT_2', 'Max. broj primatelja na popisu:');
DEFINE ('_UDDEADM_ADDEMAIL_ADMIN', 'Admini mogu odabrati');
DEFINE ('_UDDEAIM_ADDEMAIL_SELECT', 'Obavijesti s porukom');
DEFINE ('_UDDEAIM_ADDEMAIL_TITLE', 'Uklju�i kompletnu poruku u email obavijest.');

// New: 1.6
DEFINE ('_UDDEIM_NOLISTSELECTED', 'Lista korisnika nije odabrana!');
DEFINE ('_UDDEADM_NOPREMIUM', 'Premium plugin nije instaliran');
DEFINE ('_UDDEIM_LISTGLOBAL_CREATOR', 'Autor:');
DEFINE ('_UDDEIM_LISTGLOBAL_ENTRIES', 'Upisi');
DEFINE ('_UDDEIM_LISTGLOBAL_TYPE', 'Vrsta');
DEFINE ('_UDDEIM_LISTGLOBAL_NORMAL', 'Normalno');
DEFINE ('_UDDEIM_LISTGLOBAL_GLOBAL', 'Globalno');
DEFINE ('_UDDEIM_LISTGLOBAL_RESTRICTED', 'Ograni�eno');
DEFINE ('_UDDEIM_LISTGLOBAL_P0', 'Normalna lista kontakata');
DEFINE ('_UDDEIM_LISTGLOBAL_P1', 'Globalna lista kontakata');
DEFINE ('_UDDEIM_LISTGLOBAL_P2', 'Ograni�ena lista kontakata (Izlistaj samo �lanove koji mogu pristupiti listi)');
DEFINE ('_UDDEIM_TOOLBAR_USERSETTINGS', 'Korisni�ke postavke');
DEFINE ('_UDDEIM_TOOLBAR_REMOVESETTINGS', 'Odstrani postavke');
DEFINE ('_UDDEIM_TOOLBAR_CREATESETTINGS', 'Podesi postavke');
DEFINE ('_UDDEIM_TOOLBAR_SAVE', 'Spremi');
DEFINE ('_UDDEIM_TOOLBAR_BACK', 'Natrag');
DEFINE ('_UDDEIM_TOOLBAR_TRASHMSGS', 'Poruka za sme�e');
DEFINE ('_UDDEIM_CBPLUG_CONT', '[nastavi]');
DEFINE ('_UDDEIM_CBPLUG_UNBLOCKNOW', '[odblokiraj]');
DEFINE ('_UDDEIM_CBPLUG_DOBLOCK', 'Blokiraj korisnika');
DEFINE ('_UDDEIM_CBPLUG_DOUNBLOCK', 'Odblokiraj korisnika');
DEFINE ('_UDDEIM_CBPLUG_BLOCKINGCFG', 'Blokiranje');
DEFINE ('_UDDEIM_CBPLUG_BLOCKED', 'Blokirali ste ovog korisnika.');
DEFINE ('_UDDEIM_CBPLUG_UNBLOCKED', 'Ovaj vas korisnik mo�e kontaktirati.');
DEFINE ('_UDDEIM_CBPLUG_NOWBLOCKED', 'Korisnik je sad blokiran.');
DEFINE ('_UDDEIM_CBPLUG_NOWUNBLOCKED', 'Korisnik nije vi�e blokiran.');
DEFINE ('_UDDEADM_PARTIALIMPORTDONE', 'Djelomi�ni uvoz poruka iz starog PMS-a gotov. Nemojte ponovno uvoziti ovaj dio jer �e te zbog toga ponovno uvesti iste poruke i imati njihove duplikate.');
DEFINE ('_UDDEADM_IMPORT_HELP', 'Napomena: Poruke mogu biti uvezene sve odjednom ili dio po dio. Uvoz u dijelovima mo�e biti neophodan kad se radi o velikom broju poruka koje treba uvesti.');
DEFINE ('_UDDEADM_IMPORT_PARTIAL', 'Djelomi�an uvoz:');
DEFINE ('_UDDEADM_UPDATEYOURDB', 'Va�no: Niste a�urirali va�u bazu podataka! Molimo vas da pro�itate README kako bi ispravno a�urirali uddeIM!');
DEFINE ('_UDDEADM_RESTRALLUSERS_HEAD', 'Ograni�i pristup svim korisnicima');
DEFINE ('_UDDEADM_RESTRALLUSERS_EXP', 'Mo�ete ograni�iti pristup popisu "Svi korisnici". Obi�no je popis "Svi korisnici" dostupan svima (<i>bez ograni�enja</i>).');
DEFINE ('_UDDEADM_RESTRALLUSERS_0', 'bez ograni�enja');
DEFINE ('_UDDEADM_RESTRALLUSERS_1', 'posebni korisnici');
DEFINE ('_UDDEADM_RESTRALLUSERS_2', 'samo administratori');
DEFINE ('_UDDEIM_MESSAGE_UNARCHIVED', 'Poruka dearhivirana.');
DEFINE ('_UDDEADM_AUTOFORWARD_SPECIAL', 'posebni korisnici');
DEFINE ('_UDDEIM_HELP', 'Pomo�');
DEFINE ('_UDDEIM_HELP_HEADLINE1', 'uddeIM Pomo�');
DEFINE ('_UDDEIM_HELP_HEADLINE2', 'Kratak pregled svih funkcija');
DEFINE ('_UDDEIM_HELP_INBOX', 'Mapa <b>Ulazna po�ta</b> sprema sve va�e dolazne poruke, sve primljene poruke nalaze se u ovoj mapi.');
DEFINE ('_UDDEIM_HELP_OUTBOX', '<b>Izlazna po�ta</b> sadr�i kopije svih poruka koje ste poslali, bilo kad mo�ete pogledati poslane poruke.');
DEFINE ('_UDDEIM_HELP_TRASHCAN', '<b>Sme�e</b> sadr�i sve izbrisane poruke. Poruke nisu odmah izbrisane ve� se �uvaju neko vrijeme. Poruku mo�ete vratiti sve dok je pohranjena u sme�u.');
DEFINE ('_UDDEIM_HELP_ARCHIVE', ' <b>Arhiva</b> sadr�i sve arhivirane poruke iz ulazne po�te. Mo�ete arhivirati samo poruke iz ulazne po�te. Kad �elite arhivirati poruku koju ste vi sami napisali, ne zaboravite prilikom njenog slanja odabrati opciju <i>kopija za mene</i>.');
DEFINE ('_UDDEIM_HELP_USERLISTS', '<b>Kontakti</b> omogu�avaju odr�avanje liste kontakata (poznate i kao distribucijske liste). Ove liste omogu�avaju slanje privatnih poruka za vi�estruke primatelje. Umjesto dodavanja vi�e primatelja, mo�ete jednostavno upisati <i>#listname</i>.');
DEFINE ('_UDDEIM_HELP_SETTINGS', '<b>Postavke</b> sadr�e sve opcije koje se mogu ure�ivati.');
DEFINE ('_UDDEIM_HELP_COMPOSE', '<b>Sastavi</b> dozvoljava kreiranje novih poruka.');
DEFINE ('_UDDEIM_HELP_IREAD', 'Poruka je pro�itana (mo�ete izmijeniti status).');
DEFINE ('_UDDEIM_HELP_IUNREAD', 'Poruka nije pro�itana (mo�ete izmijeniti status).');
DEFINE ('_UDDEIM_HELP_OREAD', 'Poruka je pro�itana.');
DEFINE ('_UDDEIM_HELP_OUNREAD', 'Poruka nije pro�itana. Nepro�itane poruke mogu se opozvati.');
DEFINE ('_UDDEIM_HELP_TREAD', 'Poruka je pro�itana.');
DEFINE ('_UDDEIM_HELP_TUNREAD', 'Poruka nije pro�itana.');
DEFINE ('_UDDEIM_HELP_FLAGGED', 'Poruka je ozna�ena npr. kad je rije� o va�noj poruci (mo�ete izmijeniti status).');
DEFINE ('_UDDEIM_HELP_UNFLAGGED', '<i>Normalna</i> poruka (mo�ete izmijeniti status).');
DEFINE ('_UDDEIM_HELP_ONLINE', 'Korisnik je trenutno online.');
DEFINE ('_UDDEIM_HELP_OFFLINE', 'Korisnik je trenutno offline.');
DEFINE ('_UDDEIM_HELP_DELETE', 'Izbri�i poruku (premjesti poruku u sme�e).');
DEFINE ('_UDDEIM_HELP_FORWARD', 'Proslijedi poruku drugom primatelju.');
DEFINE ('_UDDEIM_HELP_ARCHIVEMSG', 'Arhiviraj poruku. Ako je admin odredio vremensko ograni�enje za poruke pohranjene u ulaznoj po�ti, arhivirane se poruke ne�e automatski brisati.');
DEFINE ('_UDDEIM_HELP_UNARCHIVEMSG', 'Dearhiviraj poruku. Poruka �e se vratiti u ulaznu po�tu.');
DEFINE ('_UDDEIM_HELP_RECALL', 'Opozovi poruku. Poslane poruke mogu se opozvati ako ih primatelj jo� nije pro�itao.');
DEFINE ('_UDDEIM_HELP_RECYCLE', 'Recikliraj poruku (premjesti poruku iz sme�a u ulaznu ili izlaznu po�tu).');
DEFINE ('_UDDEIM_HELP_NOTIFY', 'Konfiguracija email obavijesti o dolasku nove poruke.');
DEFINE ('_UDDEIM_HELP_AUTORESPONDER', 'Kad je uklju�en automatski odgovor, odmah �e se odgovoriti na svaku primljenu poruku.');
DEFINE ('_UDDEIM_HELP_AUTOFORWARD', 'Nove se poruke mogu automatski proslijediti drugom korisniku.');
DEFINE ('_UDDEIM_HELP_BLOCKING', 'Mo�ete blokirati korisnika. Ovi korisnici ne mogu vam slati privatne poruke.');
DEFINE ('_UDDEIM_HELP_MISC', 'Ovdje mo�ete prona�i dodatne postavke konfiguracije');
DEFINE ('_UDDEIM_HELP_FEED', 'Va�oj ulaznoj po�ti mo�ete pristupiti kori�tenjem RSS feed.');
DEFINE ('_UDDEADM_SEPARATOR_HEAD', 'Razdvojnik');
DEFINE ('_UDDEADM_SEPARATOR_EXP', 'Odaberite razdvojnik koji se koristi za vi�e primatelja (standardni je ",").');
DEFINE ('_UDDEADM_SEPARATOR_P0', 'zarez (standardno)');
DEFINE ('_UDDEADM_SEPARATOR_P1', 'to�ka i zarez');
DEFINE ('_UDDEADM_RSSLIMIT_HEAD', 'RSS objekti');
DEFINE ('_UDDEADM_RSSLIMIT_EXP', 'Ograni�ite broj vra�enih RSS objekata (0 za neograni�eno).');
DEFINE ('_UDDEADM_SHOWHELP_HEAD', 'Prikazati dugme za pomo�');
DEFINE ('_UDDEADM_SHOWHELP_EXP', 'Kad je uklju�eno, prikazuje se dugme za pomo�.');
DEFINE ('_UDDEADM_SHOWIGOOGLE_HEAD', 'Prikazati iGoogle gadget dugme');
DEFINE ('_UDDEADM_SHOWIGOOGLE_EXP', 'Kad je uklju�eno, u korisnikovim se preferencama prikazuje <i>Dodaj u iGoogle</i> dugme za uddeIM iGoogle gadget.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE11', 'nemoj u�itati MooTools (koriste se 1.1)');
DEFINE ('_UDDEADM_MOOTOOLS_NONE12', 'nemoj u�itati MooTools (korite se 1.2)');
DEFINE ('_UDDEIM_RSS_INTRO1', 'Mapi dolazne po�te mo�ete pristupiti koriste�i RSS feed (0.91).');
DEFINE ('_UDDEIM_RSS_INTRO1B', 'Pristupni URL je:');
DEFINE ('_UDDEIM_RSS_INTRO2', 'Ne proslje�ujte ovaj URL ostalim korisnicima jer on dozvoljava pristup va�oj po�ti.');
DEFINE ('_UDDEIM_RSS_FEED', 'RSS feed poruka');
DEFINE ('_UDDEIM_RSS_NOOBJECT', 'Gre�ka - nema objekta...');
DEFINE ('_UDDEIM_RSS_USERBLOCKED', 'Korisniik blokiran...');
DEFINE ('_UDDEIM_RSS_NOTALLOWED', 'Pristup nije dozvoljen...');
DEFINE ('_UDDEIM_RSS_WRONGPASSWORD', 'Pogre�no korisni�ko ime ili �ifra...');
DEFINE ('_UDDEIM_RSS_NOMESSAGES', 'Nema poruka');
DEFINE ('_UDDEIM_RSS_NONEWMESSAGES', 'Nema novih poruka');
DEFINE ('_UDDEADM_ENABLERSS_HEAD', 'Omogu�i RSS');
DEFINE ('_UDDEADM_ENABLERSS_EXP', 'Kad je uklju�ena ova opcija, poruke se mogu primati putem RSS feed-a. Korisnici �e u svom profilu prona�i odgovaraju�i URL.');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_3', '...odredi standardno za RSS, iGoogle, pomo�, razdvojnik');
DEFINE ('_UDDEADM_DELETEM_DELETING', 'Brisanje poruka:');
DEFINE ('_UDDEADM_DELETEM_FROMUSER', 'Brisanje poruka od korisnika ');
DEFINE ('_UDDEADM_DELETEM_MSGSSENT', '- poslane poruke: ');
DEFINE ('_UDDEADM_DELETEM_MSGSRECV', '- primljene poruke: ');
DEFINE ('_UDDEIM_PMNAV_THISISARESPONSE', 'Ovo je odgovor na:');
DEFINE ('_UDDEIM_PMNAV_THEREARERESPONSES', 'Odgovori na ovo:');
DEFINE ('_UDDEIM_PMNAV_DELETED', 'Poruka nije dostupna');
DEFINE ('_UDDEIM_PMNAV_EXISTS', 'presko�i na poruku');
DEFINE ('_UDDEIM_PMNAV_COPY2ME', '(Kopiraj)');
DEFINE ('_UDDEADM_PMNAV_HEAD', 'Dozvoli navigaciju');
DEFINE ('_UDDEADM_PMNAV_EXP', 'Prikazuje navigacijsku traku koja omogu�ava navigaciju kroz niz poruka.');
DEFINE ('_UDDEADM_MAINTENANCE_ALLDAYS', 'Poruke:');
DEFINE ('_UDDEADM_MAINTENANCE_7DAYS', 'Poruke u zadnjih 7 dana:');
DEFINE ('_UDDEADM_MAINTENANCE_30DAYS', 'Poruke u zadnjih 30 dana:');
DEFINE ('_UDDEADM_MAINTENANCE_365DAYS', 'Poruke u zadnjih 365 dana:');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD1', 'Slanje podsjetnika za (Nezaboravime: %s dana):');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD2', 'Za %s dana �alju se podsjetnici za:');
DEFINE ('_UDDEADM_MAINTENANCE_NO', 'Ne:');
DEFINE ('_UDDEADM_MAINTENANCE_USERID', 'ID korisnika:');
DEFINE ('_UDDEADM_MAINTENANCE_TONAME', 'Ime:');
DEFINE ('_UDDEADM_MAINTENANCE_MID', 'ID poruke:');
DEFINE ('_UDDEADM_MAINTENANCE_WRITTEN', 'Napisano:');
DEFINE ('_UDDEADM_MAINTENANCE_TIMER', 'Broja�:');

// New: 1.5
DEFINE ('_UDDEMODULE_ALLDAYS', ' poruke');
DEFINE ('_UDDEMODULE_7DAYS', ' poruke u zadnjih 7 dana');
DEFINE ('_UDDEMODULE_30DAYS', ' poruke u zadnjih 30 dana');
DEFINE ('_UDDEMODULE_365DAYS', ' poruke u zadnjih 365 dana');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_WARNING', '<br /><b>Bilje�ka:<br />Kod kori�tenja mosMail-a, konfiguracija e-mail adrese je obvezna!</b>');
DEFINE ('_UDDEIM_FILTEREDMESSAGE', 'filtrirana poruka');
DEFINE ('_UDDEIM_FILTEREDMESSAGES', 'filtrirane poruke');
DEFINE ('_UDDEIM_FILTER', 'Filter:');
DEFINE ('_UDDEIM_FILTER_TITLE_INBOX', 'Prika�i samo od ovog korisnika');
DEFINE ('_UDDEIM_FILTER_TITLE_OUTBOX', 'Prika�i samo ovom korisniku');
DEFINE ('_UDDEIM_FILTER_UNREAD_ONLY', 'samo nepro�itane');
DEFINE ('_UDDEIM_FILTER_SUBMIT', 'Filter');
DEFINE ('_UDDEIM_FILTER_ALL', '- sve -');
DEFINE ('_UDDEIM_FILTER_PUBLIC', '- javni korisnici -');
DEFINE ('_UDDEADM_FILTER_HEAD', 'Omogu�i filter');
DEFINE ('_UDDEADM_FILTER_EXP', 'Ako je uklju�eno, korisnici mogu filtrirati svoju ulaznu i izlaznu po�tu kako bi prikazali samo jednog primatelja ili po�iljatelja.');
DEFINE ('_UDDEADM_FILTER_P0', 'isklju�eno');
DEFINE ('_UDDEADM_FILTER_P1', 'iznad liste poruka');
DEFINE ('_UDDEADM_FILTER_P2', 'ispod liste poruka');
DEFINE ('_UDDEADM_FILTER_P3', 'iznad i ispod liste');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED', '<b>Nema %s poruka%s u va�oj%s.</b>');	// see next  six lines
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_UNREAD', ' nepro�itanih');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_FROM', ' od ovog korisnika');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_TO', ' za ovog korisnika');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_INBOX', ' ulaznoj po�ti');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_OUBOX', ' izlaznoj po�ti');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_ARCHIVE', ' arhivi');
DEFINE ('_UDDEIM_TODP_TITLE', 'Primatelj');
DEFINE ('_UDDEIM_TODP_TITLE_CC', 'Jedan ili vi�e primatelja (odvojeni zarezom)');
DEFINE ('_UDDEIM_ADDCCINFO_TITLE', 'Kad je ozna�eno, poruci �e se dodati redak koji sadr�i sve primatelje.');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_2', '...odredi standardno za automatske odgovore, automatsko proslije�ivanje, filter');
DEFINE ('_UDDEADM_AUTORESPONDER_HEAD', 'Uklju�i automatske odgovore');
DEFINE ('_UDDEADM_AUTORESPONDER_EXP', 'Kad su automatski odgovori uklju�eni, korisnik mo�e u svojim osobnim postavkama uklju�iti automatsko odgovaranje.');
DEFINE ('_UDDEIM_EMN_AUTORESPONDER', 'Uklju�i automatske odgovore');
DEFINE ('_UDDEIM_AUTORESPONDER', 'Automatski odgovori');
DEFINE ('_UDDEIM_AUTORESPONDER_EXP', 'Kad su automatski odgovori uklju�eni, automatski �e se odgovoriti na svaku primljenu poruku.');
DEFINE ('_UDDEIM_AUTORESPONDER_DEFAULT', "Na�alost, trenutno nisam dostupan.\nPrvom �u prilikom pregeldati svoju po�tu.");
DEFINE ('_UDDEADM_USERSET_AUTOR', 'AutoO');
DEFINE ('_UDDEADM_USERSET_SELAUTOR', '- AutoO -');
DEFINE ('_UDDEIM_USERBLOCKED', 'Korisnik je blokiran.');
DEFINE ('_UDDEADM_AUTOFORWARD_HEAD', 'Omogu�i automatsko proslije�ivanje');
DEFINE ('_UDDEADM_AUTOFORWARD_EXP', 'Kad je uklju�eno automatsko proslije�ivanje, korisnik mo�e automatski proslijediti nove poruke drugom korisniku.');
DEFINE ('_UDDEIM_EMN_AUTOFORWARD', 'Uklju�i automatsko proslije�ivanje');
DEFINE ('_UDDEADM_USERSET_AUTOF', 'AutoP');
DEFINE ('_UDDEADM_USERSET_SELAUTOF', '- AutoP -');
DEFINE ('_UDDEIM_AUTOFORWARD', 'Automatsko proslije�ivanje');
DEFINE ('_UDDEIM_AUTOFORWARD_EXP', 'Nove se poruke mogu automatski proslijediti drugom korisniku.');
DEFINE ('_UDDEIM_THISISAFORWARD', 'Automatsko proslije�ivanje poruke poslane za ');
DEFINE ('_UDDEADM_COLSROWS_HEAD', 'Prostor poruke (stupaca/redaka)');
DEFINE ('_UDDEADM_COLSROWS_EXP', 'Ovo odre�uje broj stupaca i redaka u prostoru za poruke (standardne vrijednosti su 60/10).');
DEFINE ('_UDDEADM_WIDTH_HEAD', 'Prostor poruke (�irina)');
DEFINE ('_UDDEADM_WIDTH_EXP', 'Ovo odre�uje �irinu prostora za poruku u px (standardno je 0). Ako je ova vrijednost 0, koristi se �irina odre�ena u CSS stilu.');
DEFINE ('_UDDEADM_CBE', 'Napredni CB');

// New: 1.4
DEFINE ('_UDDEADM_IMPORT_CAPS', 'UVOZ');

// New: 1.3
DEFINE ('_UDDEADM_MOOTOOLS_HEAD', 'U�itaj MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_EXP', 'Ovo odre�uje kako uddeIM u�itava MooTools (MooTools su potrebni za Autodovr�avanje): <i>Ni�ta</i> je korisno kad va� predlo�ak u�itava MooTools, <i>Auto</i> se preporu�a kao standardna postavka (isto pona�anje kao u uddeIM 1.2), kad koristite J1.0 mo�ete tako�er tra�iti u�itavanje MooTools 1.1 ili 1.2.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE', 'ne u�itavaj MooTools');
DEFINE ('_UDDEADM_MOOTOOLS_AUTO', 'auto');
DEFINE ('_UDDEADM_MOOTOOLS_1', 'prisilno u�itavanje MooTools-a 1.1');
DEFINE ('_UDDEADM_MOOTOOLS_2', 'prisilno u�itavanje MooTools-a 1.2');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_1', '...po�etne postavke za MooTools');
DEFINE ('_UDDEADM_AGORA', 'Agora');

// New: 1.2
DEFINE ('_UDDEADM_CRYPT3', 'Base64 kodirano');
DEFINE ('_UDDEADM_TIMEZONE_HEAD', 'Podesi vremensku zonu');
DEFINE ('_UDDEADM_TIMEZONE_EXP', 'Kad uddeIM prikazuje pogre�no vrijeme, ovdje mo�ete prilagoditi postavke vremenske zone. Kad je sve konfigurirano kako treba, ova vrijednost obi�no treba biti nula. Ali, mogu postojati i slu�ajevi u kojima trebate prilagoditi ovu vrijednost.');
DEFINE ('_UDDEADM_HOURS', 'sati');
DEFINE ('_UDDEADM_VERSIONCHECK', 'Info o verziji:');
DEFINE ('_UDDEADM_STATISTICS', 'Statistika:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Prika�i statistiku');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'Prikazuje stratisti�ke podatke poput broja pohranjenih poruka, itd.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'PRIKA�I STATISTIKU');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT', 'Poruke spremljene u bazi: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_RECIPIENT', 'Poruke u primateljevom Sme�u: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_SENDER', 'Poruke u po�iljateljevom Sme�u: ');
DEFINE ('_UDDEADM_MAINTENANCE_COUNT_TRASH', 'Poruke koje �ekaju �i��enje: ');
DEFINE ('_UDDEADM_OVERWRITEITEMID_HEAD', 'Prepi�i Itemid');
DEFINE ('_UDDEADM_OVERWRITEITEMID_EXP', 'uddeIM obi�no poku�ava otkriti ispravni Itemid. U nekim slu�ajevima mo�e biti neophodno da se ova vrijednost prepi�e tj. zamijeni, npr. kad koristite nekoliko izborni�kih linkova za uddeIM.');
DEFINE ('_UDDEADM_OVERWRITEITEMID_CURRENT', 'Otkriveni Itemid je: ');
DEFINE ('_UDDEADM_USEITEMID_HEAD', 'Koristi Itemid');
DEFINE ('_UDDEADM_USEITEMID_EXP', 'Koristi ovaj Itemid umjesto otkrivenog.');
DEFINE ('_UDDEADM_SHOWLINK_HEAD', 'Koristi linkove profila');
DEFINE ('_UDDEADM_SHOWLINK_EXP', 'Kad je postavljeno na <i>Da</i>, sva �e se korisni�ka imena prikazana u uddeIM prikazati kao linkovi za profil korisnika.');
DEFINE ('_UDDEADM_SHOWPIC_HEAD', 'Prika�i miniSlike');
DEFINE ('_UDDEADM_SHOWPIC_EXP', 'Kad je postavljeno na <i>Da</i>, prilikom �itanja poruke prikazivat �e se miniSlika odgovaraju�eg korisnika.');
DEFINE ('_UDDEADM_THUMBLISTS_HEAD', 'Prika�i miniSlike u listama');
DEFINE ('_UDDEADM_THUMBLISTS_EXP', 'Postavite na <i>Da</i> ako u pregledu popisa poruka (ulazna po�ta, izlazna, itd.) �elite prikazati miniSlike korisnika');
DEFINE ('_UDDEADM_FIREBOARD', 'Fireboard');
DEFINE ('_UDDEADM_CB', 'Community Builder');
DEFINE ('_UDDEADM_DISABLED', 'Isklju�eno');
DEFINE ('_UDDEADM_ENABLED', 'Uklju�eno');
DEFINE ('_UDDEIM_STATUS_FLAGGED', 'Va�no');
DEFINE ('_UDDEIM_STATUS_UNFLAGGED', '');
DEFINE ('_UDDEADM_ALLOWFLAGGED_HEAD', 'Dozvoli obilje�avanje poruka');
DEFINE ('_UDDEADM_ALLOWFLAGGED_EXP', 'Dozvoljava obilje�avanje poruka (uddeIM prikazuje zvjezdicu u listama koje mogu biti ozna�ene za va�ne poruke).');
DEFINE ('_UDDEADM_REVIEWUPDATE', 'Va�no: Prilikom a�uriranja starije verzije uddeIM pro�itajte README datoteku. Naime, ponekad �e te morati dodati ili izmijeniti tablice ili polja u bazi podataka!');
DEFINE ('_UDDEIM_ADDCCINFO', 'Dodaj CC: redak');
DEFINE ('_UDDEIM_CC', 'CC:');
DEFINE ('_UDDEADM_TRUNCATE_HEAD', 'Sa�mi citirani tekst');
DEFINE ('_UDDEADM_TRUNCATE_EXP', 'Sa�mite citirani tekst na 2/3 maksimalne duljine teksta, ako tekst prema�uje ograni�enje.');
DEFINE ('_UDDEIM_PLUG_INBOXENTRIES', 'Upisi ulazne po�te ');
DEFINE ('_UDDEIM_PLUG_LAST', 'Posljednji ');
DEFINE ('_UDDEIM_PLUG_ENTRIES', ' Upisi');
DEFINE ('_UDDEIM_PLUG_STATUS', 'Status');
DEFINE ('_UDDEIM_PLUG_SENDER', 'Po�iljatelj');
DEFINE ('_UDDEIM_PLUG_MESSAGE', 'Poruka');
DEFINE ('_UDDEIM_PLUG_EMPTYINBOX', 'Prazna Ulazna po�ta');

// New: 1.1
DEFINE ('_UDDEADM_NOTRASHACCESS_NOT', 'Pristup Sme�e nije dozvoljen.');
DEFINE ('_UDDEADM_NOTRASHACCESS_HEAD', 'Ograni�ite pristup Sme�u');
DEFINE ('_UDDEADM_NOTRASHACCESS_EXP', 'Mo�ete ograni�iti pristup Sme�u. Obi�no je Sme�e dostupno svima (<i>bez ograni�enja</i>). Pristup mo�ete ograni�iti na specijalne korisnike ili samo na administratore tako da grupe korisnika s ni�em stupnjem pristupa ne mogu reciklirati poruke.');
DEFINE ('_UDDEADM_NOTRASHACCESS_0', 'Bez ograni�enja');
DEFINE ('_UDDEADM_NOTRASHACCESS_1', 'Specijalni korisnici');
DEFINE ('_UDDEADM_NOTRASHACCESS_2', 'Samo administratori');
DEFINE ('_UDDEADM_PUBHIDEUSERS_HEAD', 'Sakrij korisnike na listi');
DEFINE ('_UDDEADM_PUBHIDEUSERS_EXP', 'Upi�ite ID-e korisnika koji trebaju biti skriveni na javno dostupnoj listi (npr. 65,66,67).');
DEFINE ('_UDDEADM_HIDEUSERS_HEAD', 'Sakrij korisnike na listi');
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Upi�ite ID-e korisnika koji trebaju biti skriveni na javno dostupnoj listi (npr. 65,66,67). Administratori uvijek vide cijelu listu.');
DEFINE ('_UDDEIM_ERRORCSRF', 'Otkriven je CSRF upad');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF za�tita');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', '�titi sve obrasce od Cross-Site Request Forgery napada. Ova postavka obi�no treba biti uklju�ena. Isklju�ite ju samo ako vam se javljaju neki neobi�ni problemi.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'Ne mo�ete odgovoriti na arhiviranu poruku.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Odgovori neregistriranim korisnicima ne mogu biti opozvani.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Dozvoli odgovore');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Dozvolite direktne odgovore na poruke od korisnika iz javnosti.');
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Prika�i stvarna imena');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Prikazati prava ili korisni�ka imena u Frontendu?');
DEFINE ('_UDDEIM_USERLIST', 'Lista korisnika');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Na�alost, morate pri�ekati na unos nove poruke');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Posljednje poslano');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Vremenska odgoda');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Vrijeme u sekundama koje korisnik mora �ekati prije slanja slijede�e poruke (0 za nepostojanje vremenske odgode).');
DEFINE ('_UDDEADM_SECONDS', 'sekundi');
DEFINE ('_UDDEIM_PUBLICSENT', 'Poruka poslana.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Gre�ka u imenu po�iljatelja');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Gre�ka u e-mail adresi');
DEFINE ('_UDDEIM_YOURNAME', 'Va�e ime:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Va�a e-mail adresa:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'Koristite uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'Koristite posljednju verziju uddeIM.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'Trenutna verzija je ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Info o novoj verziji:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Provjera nove verzije');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'Ovo kontaktira sajt uddeIM autora kako bi se primila informacija o sada�njoj uddeIM verziji. Ne �alju se nikakve druge informacije osim informacija o uddeIM verziji koju koristite.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'PROVJERI SADA');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Neuspje�no primanje informacija o verziji.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Lista kontakata nije prona�ena!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Maksimalni broj primatelja je prema�en (maksimalno. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Maksimalan broj unosa');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Maksimalno dozvoljen broj unosa po listi kontakata.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Liste kontakata nisu uklju�ene');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Uklju�i liste kontakata');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM dozvoljava korisnicima da kreiraju liste kontakata. Ove liste mogu se koristiti za slanje poruka vi�estrukim primateljima. Ako �elite koristiti liste kontakata, nemojte zaboraviti uklju�iti opciju vi�estrukih primatelja poruka.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'isklju�eno');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'registrirani korisnici');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'specijalni korisnici');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'samo administratori');
DEFINE ('_UDDEIM_LISTSNEW', 'Napravi novu listu kontakata');
DEFINE ('_UDDEIM_LISTSSAVED', 'Lista kontakata je spremljena');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Lista kontakata je osvije�ena');
DEFINE ('_UDDEIM_LISTSDESC', 'Opis');
DEFINE ('_UDDEIM_LISTSNAME', 'Ime');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Ime (bez razmaka)');
DEFINE ('_UDDEIM_EDITLINK', 'uredi');
DEFINE ('_UDDEIM_LISTS', 'Kontakti');
DEFINE ('_UDDEIM_STATUS_READ', 'pro�itano');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'nepro�itano');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'online');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'offline');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'Prika�i slike iz CB galerije');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'uddeIM standardno prikazuje samo avatare koje su korisnici uploadirali na server. Kad uklju�ite ovi postavku uddeIM �e prikazivati i slike iz CB galerije avatara.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'Odblokiraj CB veze');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'Mo�ete dozvoliti poruke za korisnike kad se registrirani korisnik nalazi na CB listi kontakata primatelja (�ak i ako se primatelj nalazi u grupi koja je blokirana). Ova postavka je neovisna od individualnog blokiranja koje sam korisnik ure�uje kad je ta opcija uklju�ena (vidi postavke iznad).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'Nemate dozvolu za slanje ovoj grupi.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'Primatelj vas blokira.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Blokirane grupe (registrirani korisnici)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Grupe kojima registrirani korisnici ne mogu slati poruke. Ovo vrijedi samo za registrirane korisnike. Postavka se ne koristi za specijalne korisnike i administratore. Ova postavka je neovisna od individualnog blokiranja koje sam korisnik ure�uje kad je ta opcija uklju�ena (vidi postavke iznad).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Blokirane grupe (javni korisnici)');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_EXP', 'Grupe kojima korisnici iz javnosti ne mogu slati poruke. Ova postavka je neovisna od individualnog blokiranja koje sam korisnik ure�uje kad je ta opcija uklju�ena (vidi postavke iznad). Kad blokirate neku grupu, korisnici te grupe u postavkama profila ne mogu vidjeti opciju za uklju�ivanje javnog Frontenda.');
DEFINE ('_UDDEADM_BLOCKGROUPS_1', 'Korisnik iz javnosti');
DEFINE ('_UDDEADM_BLOCKGROUPS_2', 'CB veza');
DEFINE ('_UDDEADM_BLOCKGROUPS_18', 'Registrirani korisnik');
DEFINE ('_UDDEADM_BLOCKGROUPS_19', 'Autor');
DEFINE ('_UDDEADM_BLOCKGROUPS_20', 'Editor');
DEFINE ('_UDDEADM_BLOCKGROUPS_21', 'Publisher');
DEFINE ('_UDDEADM_BLOCKGROUPS_23', 'Manager');
DEFINE ('_UDDEADM_BLOCKGROUPS_24', 'Admin');
DEFINE ('_UDDEADM_BLOCKGROUPS_25', 'SuperAdmin');
DEFINE ('_UDDEIM_NOPUBLICMSG', 'Korisnik prima poruke samo od registriranih korisnika.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Sakrij iz javne liste "Svi korisnici"');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'U javnoj listi svih korisnika mo�ete sakriti odre�ene grupe korisnika. Napomena: ovo skriva samo imena, korisnici i dalje mogu primati poruke. Korisnici koji nisu uklju�ili javni Frontend nikad ne�e biti izlistani u takvim listama.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Sakrij iz liste "Svi korisnici"');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'U listi "Svi korisnici" mo�ete sakriti odre�ene grupe. Napomena: ovo skriva samo imena, korisnici i dalje mogu primati poruke.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'nijedan');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'samo superadmini');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'samo admini');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'specijalni korisnici');
DEFINE ('_UDDEADM_PUBLIC', 'Javno');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Pona�anje linka "Svi korisnici"');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Odaberite da li �e se link "Svi korisnici" sakriti ili prikazivati u javnom Frontendu, ili da li �e se uvijek prikazati svi korisnici.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Javno su�elje');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- odaberi javno -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Dozvoli slanje poruka javnim korisnicima');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Dosegnuto ograni�enje poruke!');
DEFINE ('_UDDEIM_PUBLICUSER', 'Javni korisnik');
DEFINE ('_UDDEIM_DELETEDUSER', 'Korisnik izbrisan');
DEFINE ('_UDDEADM_CAPTCHALEN_HEAD', 'Captcha duljina');
DEFINE ('_UDDEADM_CAPTCHALEN_EXP', 'Odre�uje koliko znakova korisnik mora upisati.');
DEFINE ('_UDDEADM_USECAPTCHA_HEAD', 'Captcha spam za�tita');
DEFINE ('_UDDEADM_USECAPTCHA_EXP', 'Odre�uje tko mora upisati captcha prilikom slanja poruke');
DEFINE ('_UDDEADM_CAPTCHAF0', 'isklju�eno');
DEFINE ('_UDDEADM_CAPTCHAF1', 'samo javni korisnici');
DEFINE ('_UDDEADM_CAPTCHAF2', 'javni i registrirani korisnici');
DEFINE ('_UDDEADM_CAPTCHAF3', 'javni, registrirani, specijalni korisnici');
DEFINE ('_UDDEADM_CAPTCHAF4', 'svi korisnici (uklj. admine)');
DEFINE ('_UDDEADM_PUBFRONTEND_HEAD', 'Omogu�i javno su�elje');
DEFINE ('_UDDEADM_PUBFRONTEND_EXP', 'Kad je uklju�eno, javni korisnici mogu slati poruke va�im registriranim korisnicima (ovi mogu u svojim osobnim postavkama odrediti da li �ele koristiti ovu opciju).');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_HEAD', 'Po�etno javno su�elje');
DEFINE ('_UDDEADM_PUBFRONTENDDEF_EXP', 'Ovo je standardna vrijednost ako javni korisnici mogu slati poruku registriranom korisniku.');
DEFINE ('_UDDEADM_PUBDEF0', 'isklju�eno');
DEFINE ('_UDDEADM_PUBDEF1', 'uklju�eno');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Pogre�an sigurnosni kod');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'nijedan ili nepoznat');
DEFINE ('_UDDEADM_DONATE', 'Napravite malu donaciju ako vam se svi�a uddeIM i �elite podr�ati njegov daljnji razvoj.');
// New: 1.0rc2
DEFINE ('_UDDEADM_BACKUPRESTORE_DATE', 'Konfiguracija prona�ena u bazi: ');
DEFINE ('_UDDEADM_BACKUPRESTORE_HEAD', 'Konfiguracija backup-a i vra�anja');
DEFINE ('_UDDEADM_BACKUPRESTORE_EXP', 'Mo�ete u bazi podataka napraviti backup va�e konfiguracije i vratiti ju kad je to potrebno. Ovo je korisno kad a�urirate uddeIM ili kad �elite spremiti odre�enu konfiguraciju u svrhu testiranje.');
DEFINE ('_UDDEADM_BACKUPRESTORE_BACKUP', 'BACKUP');
DEFINE ('_UDDEADM_BACKUPRESTORE_RESTORE', 'VRA�ANJE');
DEFINE ('_UDDEADM_CANCEL', 'Odustani');
// New: 1.0rc1
DEFINE ('_UDDEADM_LANGUAGECHARSET_HEAD', 'Znakovlje jezi�ne datoteke');
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', '<strong>Standardno</strong> je (ISO-8859-1) ispravna postavka za Joomla 1.0 a <strong>UTF-8</strong> za Joomla 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'po�etno');
DEFINE ('_UDDEIM_READ_INFO_1', 'Pro�itane �e poruke ostati u Ulaznoj po�ti najvi�e ');
DEFINE ('_UDDEIM_READ_INFO_2', ' dana prije automatskog brisanja.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Nepro�itane �e poruke ostati u Ulaznoj po�ti najvi�e ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' dana prije automatskog brisanja.');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Poslane �e poruke ostati u Ulaznoj po�ti najvi�e ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' dana prije automatskog brisanja.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Prika�i oznaku Ulazne po�te za pro�itane poruke');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Prikazati obavijest ulazne po�te "Pro�itane poruke izbrisat �e se nakon n dana"');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Prika�i oznaku Ulazne po�te za nepro�itane poruke');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Prikazati obavijest ulazne po�te "Nepro�itane poruke izbrisat �e se nakon n dana"');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Prika�i oznaku Izlazne po�te za poslane poruke');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Prikazati obavijest izlazne po�te "Poslane poruke izbrisat �e se nakon n dana"');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Prika�i oznaku Sme�a za obrisane poruke');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Prika�i oznaku Sme�a "Izbrisane poruke izbrisat �e se nakon n dana"');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Poslane poruke spremljene (dana)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Upi�ite broj dana nakon kojih �e se <b>poslane</b> poruke automatski izbrisati iz izlazne po�te.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'po�alji svim specijalnim korisnicima');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Poruka <strong>svim specijalnim korisnicima</strong>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- odaberi korisnika -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- odaberi ime -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Uredi korisni�ke postavke');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'postoje�i');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'nepostoje�i');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- odaberi unos -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- odaberi obavijest -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- odaberi popup -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Korisni�ko ime');
DEFINE ('_UDDEADM_USERSET_NAME', 'Ime');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Obavijest');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Popup');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Zadnji pristup');
DEFINE ('_UDDEADM_USERSET_NO', 'Ne');
DEFINE ('_UDDEADM_USERSET_YES', 'Da');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'nepoznato');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'Kada offline (osim odgovora)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Uvijek (osim odgovora)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'Kada offline');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Uvijek');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'Bez obavijesti');
DEFINE ('_UDDEADM_WELCOMEMSG', "Dobrodo�li u uddeIM!\n\nUspje�no ste instalirali uddeIM.\n\nPoku�ajte pogledati ovu poruku s razli�itim predlo�cima. Mo�ete ih odabrati u uddeIM administraciji.\n\nuddeIM je projekt u razvoju. Ako prona�ete bugove ili slabosti, molim vas da mi pi�ete o njima kako bi smo zajedno u�inili uddeIM boljim.\n\nSretno i u�ivajte!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'uddeIM instalacija je zavr�ena.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Oti�ite u administrativno su�elje i provjerite postavke.');
DEFINE ('_UDDEADM_REVIEWLANG', 'Ako koristite CMS s znakovljem koje nije ISO 8859-1, provjerite da li ste prilagodili postavke.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'Nakon instalacije sav uddeIM email promet (email obavijesti, email podsjetnici) je isklju�en kako se email poruke ne bi slale dok traje va�e testiranje. Kad zavr�ite testiranje ne zaboravite u administrativnom su�elju isklju�iti opciju "stop email".');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Maksimalno primatelja');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Max. broj dozvoljenih primatelja po poruci (0=bez ograni�enja)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'previ�e primatelja');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Slanje e-mail poruka isklju�eno.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Pretraga unutar teksta');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Autodovr�ava� pretra�uje unutar teksta (ina�e pretra�uje samo od po�etka)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'Pona�anje linka "Svi korisnici"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Odaberite da li �e se link "Svi korisnici" sakriti, prikazati ili da li �e uvijek biti prikazani svi korisnici.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Sakrij link "Svi korisnici"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Prika�i link "Svi korisnici"');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Uvijek prika�i sve korisnike');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'Konfiguracija nije spremna za ure�ivanje:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'Konfiguracija spremna za ure�ivanje:');
DEFINE ('_UDDEIM_FORWARDLINK', 'naprijed');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'primatelj prona�en');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'primatelji prona�eni');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (default)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Mailsystem');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'Odaberite mail sustav kojeg uddeIM treba koristiti za slanje obavijesti.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Prika�i Joomla grupe');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Prikazati Joomla grupe u op�em popisu poruka.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Proslije�ivanje poruka');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Dozvolite proslije�ivanje poruka.');
DEFINE ('_UDDEIM_FWDFROM', 'Originalna poruka od');
DEFINE ('_UDDEIM_FWDTO', 'za');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Dearhivirana poruka');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Poruku nije mogu�e dearhivirati');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Dozvoli vi�e primatelja');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Dozvolite vi�estruke primatelje (odvojeni zarezom).');
DEFINE ('_UDDEIM_CHARSLEFT', 'znakova za unos');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Prika�i broja� znakova');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Prikazuje broja� znakova koji prikazuje koliko je znakova jo� ostalo.');
DEFINE ('_UDDEIM_CLEAR', 'O�isti');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Pridru�i odabrane korisnike listi');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'Ovo omogu�ava odabir vi�estrukih primatelja.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Pridru�i odabrane veze listi');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'Ovo omogu�ava odabir vi�estrukih primatelja.');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS prona�en: ');
DEFINE ('_UDDEIM_ENTERNAME', 'upi�ite ime');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_HEAD', 'Koristi autodovr�avanje');
DEFINE ('_UDDEADM_USEAUTOCOMPLETE_EXP', 'Koristite autodovr�avanje za imena primatelja.');
DEFINE ('_UDDEADM_OBFUSCATING_HEAD', 'Klju� za maskiranje poruka');
DEFINE ('_UDDEADM_OBFUSCATING_EXP', 'Upi�ite klju� koji se koristi za maskiranje poruke. Nemojte mijenjati ovu vrijednost nakon �to je funkcija maskiranja poruka uklju�ena.');
DEFINE ('_UDDEADM_CFGFILE_NOTFOUND', 'Prona�ena kriva konfiguracijska datoteka!');
DEFINE ('_UDDEADM_CFGFILE_FOUND', 'Prona�ena verzija:');
DEFINE ('_UDDEADM_CFGFILE_EXPECTED', 'O�ekivana verzija:');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING', 'Konverzija konfiguracije...');
DEFINE ('_UDDEADM_CFGFILE_DONE', 'Gotovo!');
DEFINE ('_UDDEADM_CFGFILE_WRITEFAILED', 'Kriti�na gre�ka: Konfiguracijska datoteka nije otvorena za zapisivanje:');

// New: 0.8+
DEFINE ('_UDDEIM_ENCRYPTDOWN', '�ifrirana poruka! - Preuzimanje nije mogu�e!');
DEFINE ('_UDDEIM_WRONGPASSDOWN', 'Pogre�na zaporka! - Preuzimanje nije mogu�e!');
DEFINE ('_UDDEIM_WRONGPW', 'Pogre�na zaporka! - Kontaktirajte administratora baze!');
DEFINE ('_UDDEIM_WRONGPASS', 'Pogre�na zaporka!');
DEFINE ('_UDDEADM_MAINTENANCE_D1', 'Pogre�ni datumi Sme�a (ulazna/izlazna po�ta): ');
DEFINE ('_UDDEADM_MAINTENANCE_D2', 'Ispravljanje pogre�nih datuma');
DEFINE ('_UDDEIM_TODP', 'Za: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Smanji broj poruka');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Prika�i ikone radnji');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'Kad je postavljeno na <i>Da</i>, s ikonom �e se prikazivati ikone radnji.');
DEFINE ('_UDDEIM_UNCHECKALL', 'ne ozna�i ni�ta');
DEFINE ('_UDDEIM_CHECKALL', 'ozna�i sve');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Prika�i donje ikone');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'Kad je postavljeno na <i>Da</i>, s ikonom �e se prikazivati donji linkovi.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Koristiti animirane smajlije');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Koristiti animirane smajlije umjesto stati�nih smajlija.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'Vi�e animiranih smiley-ja');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Prikazati dodatne animirane smajli�e.');
DEFINE ('_UDDEIM_PASSWORDREQ', '�ifrirana poruka - Potrebna zaporka');
DEFINE ('_UDDEIM_PASSWORD', 'Potrebna zaporka');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Zaporka');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (tekst enkripcije)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (tekst dekripcije)');
DEFINE ('_UDDEIM_MORE', 'VI�E');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Privatne poruke');
DEFINE ('_UDDEMODULE_NONEW', 'nema novih');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Nove poruke: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'poruka');
DEFINE ('_UDDEMODULE_MESSAGES', 'poruke');
DEFINE ('_UDDEMODULE_YOUHAVE', 'Imate');
DEFINE ('_UDDEMODULE_HELLO', 'Pozdrav');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Brza poruka');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Koristi enkripciju');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Napravi enkripciju pohranjenih poruka');
DEFINE ('_UDDEADM_CRYPT0', 'Ni�ta');
DEFINE ('_UDDEADM_CRYPT1', 'U�ini poruke nejasnim');
DEFINE ('_UDDEADM_CRYPT2', 'Napravi enkripciju - jo� nije izvediva');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Standard za email obavijest');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Standardna vrijednost za email obavijest (za korisnike koji jo� nisu promjenili svoje preference).');
DEFINE ('_UDDEADM_NOTIFYDEF_0', 'Bez obavijesti');
DEFINE ('_UDDEADM_NOTIFYDEF_1', 'Uvijek');
DEFINE ('_UDDEADM_NOTIFYDEF_2', 'Obavijest samo kad je offline');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_HEAD', 'Sprije�i link "Svi korisnici"');
DEFINE ('_UDDEADM_SUPPRESSALLUSERS_EXP', 'Sprije�i prikazivanje linka "Svi korisnici" u prostoru za pisanje nove poruke (korisno kad imate puno registriranih korisnika).');
DEFINE ('_UDDEADM_POPUP_HEAD','Popup obavijest');
DEFINE ('_UDDEADM_POPUP_EXP','Prika�ite popup kad stigne nova poruka (potreban zakrpan mod_cblogin)');
DEFINE ('_UDDEIM_OPTIONS', 'Dodatne postavke');
DEFINE ('_UDDEIM_OPTIONS_EXP', 'Ovdje mo�ete konfigurirati neke dodatne postavke.');
DEFINE ('_UDDEIM_OPTIONS_P', 'Prika�i popup kad stigne nova poruka');
DEFINE ('_UDDEADM_POPUPDEFAULT_HEAD', 'Popup obavijest kao standardna postavka');
DEFINE ('_UDDEADM_POPUPDEFAULT_EXP', 'Aktiviraj standardnu popup obavijest (za korisnike koji jo� nisu promjenili svoje preference).');
DEFINE ('_UDDEADM_MAINTENANCE', 'Odr�avanje');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD', 'Izbri�i poruke korisnika koji vi�e ne postoje');
DEFINE ('_UDDEADM_MAINTENANCE_CHECK', 'PROVJERI');
DEFINE ('_UDDEADM_MAINTENANCE_TRASH', 'U SME�E');
DEFINE ('_UDDEADM_MAINTENANCE_EXP', 'Kad je korisnik izbrisan iz baze podataka, njegove poruke su obi�no sa�uvane u bazi podataka. Ova funkcija provjerava da li je potrebno brisati poruke koje nikome ne pripadaju, a mo�ete ih i izbrisati ako to �elite.');
DEFINE ('_UDDEADM_MAINTENANCE_MC1', 'Provjeravam...<br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC2', '<i>#nnn (Korisni�ko ime): [inbox|inbox trashed|outbox|outbox trashed]</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC3', '<i>ulazna po�ta: poruka spremljenih u ulaznoj po�ti korisnika</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC4', '<i>ulazna po�ta izbrisana: poruke izbrisane iz ulazne po�te korisnika, ali jo� uvijek ima poruka u nekim izlaznim po�tama</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC5', '<i>izlazna po�ta: poruka pohranjeno u izlaznoj po�ti korisnika</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MC6', '<i>izlazna po�ta izbrisana: poruke izbrisane iz izlazne po�te korisnika, ali jo� uvijek ima poruka u nekim ulaznim po�tama</i><br />');
DEFINE ('_UDDEADM_MAINTENANCE_MT1', 'Bri�em...<br />');
DEFINE ('_UDDEADM_MAINTENANCE_NOTFOUND', "nije prona�eno (od/za/postavke/bloker/blokirano):");
DEFINE ('_UDDEADM_MAINTENANCE_MT2', 'izbri�e sve preference od korisnika');
DEFINE ('_UDDEADM_MAINTENANCE_MT3', 'izbri�i blokiranje korisnika');
DEFINE ('_UDDEADM_MAINTENANCE_MT4', "izbri�i sve poruke poslane izbrisanom korisniku koje se nalaze u po�iljateljevoj izlaznoj po�ti i u ulaznoj po�ti izbrisanog korisnika");
DEFINE ('_UDDEADM_MAINTENANCE_MT5', "izbri�i sve poruke koje je poslao izbrisani korisnik a koje se nalaze u njegovoj izlaznoj po�ti i u ulaznoj po�ti primatelja");
DEFINE ('_UDDEADM_MAINTENANCE_NOTHINGTODO', '<b>Nema ni�ega za u�initi</b><br />');
DEFINE ('_UDDEADM_MAINTENANCE_JOBTODO', '<b>Potrebno brisanje</b><br />');

// New: 0.6+
DEFINE ('_UDDEADM_NAMESTEXT', 'Prika�i prava imena');
DEFINE ('_UDDEADM_NAMESDESC', 'Prika�i prava imena ili korisni�ka imena?');
DEFINE ('_UDDEADM_REALNAMES', 'Prava imena');
DEFINE ('_UDDEADM_USERNAMES', 'Korisni�ka imena');
DEFINE ('_UDDEADM_CONLISTBOX', 'Popis veza');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Prikazati Moje veze u popisu ili u tablici?');
DEFINE ('_UDDEADM_LISTBOX', 'Popis');
DEFINE ('_UDDEADM_TABLE', 'Tablica');

DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Poruke �e ostati u sme�u ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' sati prije nego li budu izbrisane. Mo�ete vidjeti samo prve rije�i poruke. Da bi ste pro�itali cijelu poruku, trebate ju prvo vratiti u prija�nje stanje.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Ova poruka je bila opozvana. Sada je mo�ete urediti i ponovno poslati.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Nije bilo mogu�e opozvati poruku (vjerojatno zato jer je bila pro�itana ili izbrisana.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Neuspjelo vra�anje poruke u prija�nje stanje. (Mo�da je bila predugo u sme�u ili je u me�uvremenu izbrisana.)');
DEFINE ('_UDDEIM_DONTSEND', 'Nemoj poslati');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Niste prijavljeni.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', 'Nema poruka u ulaznoj po�ti.');

DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', 'Nemate poruka u va�oj ulaznoj po�ti.');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', 'Nemate poruka u sme�u.');
DEFINE ('_UDDEIM_INBOX', 'Ulazna po�ta');
DEFINE ('_UDDEIM_OUTBOX', 'Izlazna po�ta');
DEFINE ('_UDDEIM_TRASHCAN', 'Sme�e');
DEFINE ('_UDDEIM_FROM', 'Od');
DEFINE ('_UDDEIM_FROM_SMALL', 'od');
DEFINE ('_UDDEIM_TO', 'Za');
DEFINE ('_UDDEIM_TO_SMALL', 'za');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Va�a izlazna po�ta sadr�i sve poruke koje ste poslali a koje jo� niste izbrisali. U izlaznoj po�ti mo�ete opozvati poruku koja jo� nije pro�itana. Ako to u�inite, primatelj je vi�e ne�e mo�i �itati. ');

DEFINE ('_UDDEIM_RECALL', 'opoziv');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Opozovi ovu poruku');
DEFINE ('_UDDEIM_RESTORE', 'vrati u prija�nje stanje');
DEFINE ('_UDDEIM_MESSAGE', 'Poruka');
DEFINE ('_UDDEIM_DATE', 'Datum');
DEFINE ('_UDDEIM_DELETED', 'Izbrisano');
DEFINE ('_UDDEIM_DELETE', 'izbri�i');
DEFINE ('_UDDEIM_DELETELINK', 'izbri�i');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Ova poruku nije mogu�e prikazati. <br />Mogu�i razlozi:<ul><li>Niste ovla�teni za �itanje ove poruke</li><li>Poruka je izbrisana</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Premjestili ste ovu poruku u sme�e.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Poruka od ');
DEFINE ('_UDDEIM_MESSAGETO', 'Va�a poruka za ');
DEFINE ('_UDDEIM_REPLY', 'Odgovori');
DEFINE ('_UDDEIM_SUBMIT', 'Po�alji');

DEFINE ('_UDDEIM_NOID', 'Gre�ka: ID primatelja nije prona�en. Poruka nije poslana.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Odgovor poslan');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Poruka poslana');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' i originalna poruka premje�tena u sme�e');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Ne postoji korisnik s tim korisni�kim imenom!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Nije mogu�e poslati poruku samom sebi!');
DEFINE ('_UDDEIM_VIOLATION', '<b>Nedozvoljena radnja!</b> Nemate ovla�tenja za ovu radnju!');

// Admin
DEFINE ('_UDDEADM_SETTINGS', 'uddeIM Administracija');
DEFINE ('_UDDEADM_ABOUT', 'O uddeIM');
DEFINE ('_UDDEADM_DATESETTINGS', 'Datum/vrijeme');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Pro�itane poruke �uvaju se (dana)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Nepro�itane poruke �uvaju se (dana)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Poruke u sme�u �uvaju se (dana)');
DEFINE ('_UDDEADM_DAYS', 'dan(a)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Upi�ite za koliko �e se dana <b>pro�itane</b> poruke automatski izbrisati iz ulazne po�te. Ako ne �elite automatski brisati poruke, upi�ite ve�i broj (na primjer, 36524 dana zna�i jedno stolje�e). Ali, ne zaboravite da se baza podataka mo�e vrlo brzo napuniti ako �uvate sve poruke.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Upi�ite za koliko �e se dana brisati poruke koje jo� <b>nije pro�itao</b> primatelj.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Upi�ite za koliko �e se dana brisati poruke iz sme�a. Brojevi manji od 1 su O.K. Na primjer: Da bi se poruke iz sme�a brisale nakon 3 sata, upi�ite broj 0.125.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Format prikazivanja datuma');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Izaberite format u kojem �e se prikazivati datum/vrijeme poruke. Mjeseci �e biti upisani sa skra�enicama koje odgovaraju lokalnim postavkama va�eg jezika na Joomli (ako postoji odgovaraju�a uddeIM jezi�na datoteka).');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Prikaz du�eg oblika datuma');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Kada se poruke prikazuju, ima vi�e mjesta za prikaz datuma. Izaberite format datuma koji �e se pokazati kada se poruka otvara. Za nazive dana u tjednu i mjeseca, koristiti �e se postavke lokalnog jezika Joomle (ako postoji odgovaraju�a uddeIM jezi�na datoteka).');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Brisanje radi samo administrator');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'da, samo administratori');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'ne, bilo koji korisnik');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_MANUALLY', 'ru�no');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Automatsko brisanje optere�uje server. Ako izaberete <b>Samo&nbsp;administratori</b>, automatsko brisanje poziovat �e se kad admin provjeri svoju ulaznu po�tu. Odaberite ovu opciju ako administrator redovno provjerava svoju ulaznu po�tu. Manji sajtovi mogu odabrati <b>Bilo&nbsp;koji&korisnik</b>.');

DEFINE ('_UDDEADM_SETTINGSSAVED', 'Postavke su spremljene.');

// admin import tab
DEFINE ('_UDDEADM_CONTINUE', 'nastavi');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Ovo ne�e izmijeniti va�e stare PMS poruke ili va�u instalaciju. Poruke �e biti neo�te�ene. Mo�ete ih bez problema importirati u uddeIM, �ak i ako mislite i dalje koristiti stari PMS. Prije importiranja trebali bi ste prvo sa�uvati sve izmjene postavki koje ste napravili. Sve poruke koje se ve� nalaze u va�oj uddeIM bazi podataka ostat �e neo�te�ene i neizmijenjene.');

DEFINE ('_UDDEADM_IMPORT_YES', 'Importiraj myPMS poruke u uddeIM');
DEFINE ('_UDDEADM_IMPORT_NO', 'Ne, nemoj importirati poruke');
DEFINE ('_UDDEADM_IMPORTING', 'Pri�ekajte dok traje importiranje poruka.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Importiranje poruka iz myPMS zavr�eno. Nemojte ponovno pokretati ovu instalacijsku skriptu jer ako to u�initem poruke �e ponovno biti importirane i pokazati �e se dva puta.');
DEFINE ('_UDDEADM_IMPORT', 'Importiraj');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Importiraj poruke iz myPMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'myPMS instalacija nije prona�ena. Importiranje nije mogu�e.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Ve� ste importirali myPMS poruke u uddeIM.</span>');

// new in 0.3 Frontend
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Nije poslano (korisnik vas je blokirao)');
DEFINE ('_UDDEIM_BLOCKNOW', 'blokiraj&nbsp;korisnika');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Ovo je popis korisnika koje ste blokirali. Ovi korisnici ne mogu vam poslati privatne poruke.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Nemate niti jednog blokiranog korisnika.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Blokirali ste ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' korisnik(a).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[odblokiraj]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Ako vam blokirani korisnik poku�a poslati poruku, on(a) �e biti obavje�ten(a) da je blokiran(a) i da nije mogu�e poslati poruku.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'Blokirani korisnik ne mo�e vidjeti da ste ga blokirali.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Ne mo�ete blokirati administratore.');

// new in 0.3 Admin
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Osposobi sistem blokiranja');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Kad je sistem osposobljen, korisnici mogu blokirati druge korisnike. Blokirani korisnik ne mo�e slati poruke korisniku koji ga je blokirao. Administratori ne mogu biti blokirani.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'da');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'ne');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Blokirani korisnik prima poruke');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Ako je postavljeno na <i>da</i>, blokirani korisnik bit �e obavije�ten da nije bilo mogu�e poslati njegovu poruku jer ga je primatelj poruke blokirao. Ako je postavljeno na <i>ne</i>, blokirani korisnik ne�e biti obavije�ten da njegova poruka nije poslana.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'da');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'ne');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Sistem blokiranja nije osposobljen');
DEFINE ('_UDDEADM_DELETIONS', 'Izbrisane poruke');
DEFINE ('_UDDEADM_BLOCK', 'Blokiranje');

// new in 0.4, admin
DEFINE ('_UDDEADM_INTEGRATION', 'Integracija');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Prika�i online status');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Kad je postavljeno na <i>da</i>, uddeIM prikazuje svako korisni�ko ime s malom ikonom koja obavije�tava da li je ovaj korisnik online ili offline. Mo�ete odrediti ikone u administrativnom dijalogu za ikone.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Dozvoli e-mail obavijest');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Kad je postavljeno na <i>da</i>, svaki korisnik mo�e izabrati da li on(a) �eli primiti e-mail svaki put kada u njegovu ulaznu po�tu stigne e-mail.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-mail sadr�i poruku');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Kad je postavljeno na <i>ne</i>, ovaj e-mail sadr�avati �e samo informaciju o tome kada i od koga je stigla poruka, ali ne�e sadr�avati samu poruku.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Ne-zaboravi-me e-mail');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Ova mogu�nost omogu�ava slanje - nezavisno od korisnikovih postavki - e-mail poruke korisniku koji ve� dulje vrijeme ima nepro�itanu poruku u ulaznoj po�ti (postavke ispod). Ova postavka je neovisna od gornje \'dozvoli e-mail obavijest\' postavke. Ako ne �elite slati bilo kakve poruke ikada, trebate isklju�iti obje opcije.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Ne-zaboravi-me �alje se nakon koliko dan(a)');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Ako je gornja Ne-zaboravi-me postavka postavljena na <i>da</i>, ovdje odredite nakon koliko dana �e se slati obavijesti o nepro�itanoj poruci.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Popis prvih slova');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Mo�ete postaviti koliko �e se znakova iz poruke prikazati u ulaznoj po�ti, izlaznoj po�ti ili sme�u.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Maksimalna duljina poruke');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Ovdje postavite maksimalnu duljinu poruke. Poruka �e nakon toga biti automatski skra�ena. Postavite na \'0\' kako bi dozvolili poruke bilo koje duljine (nije preporu�eno).');
DEFINE ('_UDDEADM_YES', 'da');
DEFINE ('_UDDEADM_NO', 'ne');
DEFINE ('_UDDEADM_ADMINSONLY', 'samo administratori');
DEFINE ('_UDDEADM_SYSTEM', 'Sistem');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Korisni�ko ime za sistemske poruke');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'uddeIM podr�ava sistemske poruke. One nemaju vidljivog po�iljatelja i korisnici ne mogu odgovoriti na njih. Ovdje upi�ite alias za korisni�ko ime za sistemske poruke (na primjer <i>Podr�ka</i> ili <i>Help desk</i> ili <i>Community Master</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Dozvoli administratorima da �alju op�e poruke');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'uddeIM podr�ava op�e poruke koje se �alju svakom korisniku u va�em sistemu. Nemojte ih �esto koristiti.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'Ime e-mail po�iljatelja');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Upi�ite ime koje �e se prikazati kao ime po�iljatelja e-mail obavijesti (na primjer <i>NAZIV STRANICA</i>)');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'Adresa e-mail po�iljatelja');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Upi�ite e-mail adresu s koje su poslane e-mail obavijesti (ovo bi trebala biti glavna e-mail adresa za kontakt na va�im stranicama).');
DEFINE ('_UDDEADM_VERSION', 'uddeIM verzija');
DEFINE ('_UDDEADM_ARCHIVE', 'Arhiva'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Omogu�i arhivu');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Izaberite da li �e korisnicima biti dozvoljeno da pohrane poruke u arhivi. Poruke u arhivi ne�e biti brisane.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Maksimalan broj poruka u arhivi korisnika');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Odredite koliko poruka svaki korisnik mo�e pohraniti u arhivi (bez ograni�enja za administratora).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Dozvoli kopije za korisnika');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Dozvolite korisnicima da primaju kopije poruka koje �alju. Ove �e se kopije pojaviti u ulaznoj po�ti.');
DEFINE ('_UDDEADM_MESSAGES', 'Poruke');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Predlo�i slanje originala u sme�e');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Kad je ova opcija aktivirana, pojavljuje se kvadrat pored dugmeta \'Po�alji\' koji se zove \'Original u sme�e\' koji �e uvijek biti ozna�en. U tom slu�aju, poruka �e automatski biti premje�tena iz ulazne po�te u sme�e nakon �to se po�alje odgovor na nju. Ova funkcija smanjuje broj poruka u bazi podataka. Korisnici uvijek mogu odzna�iti ovaj kvadrat ako �ele zadr�ati poruku u ulaznoj po�ti.');

DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Poruka po stranici');
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Odredite koliko �e se poruka prikazati po stranici u ulaznoj po�ti, izlaznoj po�ti, sme�u i arhivi.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Znakovi u upotrebi');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Ako imate problema s prikazivanjem slova koja nisu latin, ovdje mo�ete upisati set znakova (charset) kojeg �e uddeIM koristiti za prikazivanje informacija iz baze podataka u HTML kodu. <b>Ako ne znate �to to zna�i, nemojte mjenjati postavljenu vrijednost!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Znakovi u upotrebi za mail');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Ako imate problema s prikazivanjem slova koja nisu latin1, ovdje mo�ete upisati set znakova (charset) kojeg �e uddeIM koristiti za slanje izlazne po�te. Standardna vrijednost valjana je za ve�inu europskih jezika.');

DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Ovo je sadr�aj e-maila kojega �e korisnici primiti kada je gornja opcija postavljena. Sadr�aj poruke ne�e biti u e-mailu. Zadr�ite vrijednosti %you%, %user% i %site% nepromjenjene. ');
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Ovo je sadr�aj e-maila kojega �e korisnici primiti kada je gornja opcija postavljena. Ovaj e-mail uklju�iti �e sadr�aj poruke. Zadr�ite vrijednosti %you%, %user% i %site% nepromjenjene. ');
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Ovo je sadr�aj Ne-zaboravi-me e-maila kojega �e korisnici kada je gornja opcija postavljena. Zadr�ite vrijednosti %you%, %user% i %site% nepromjenjene. ');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Dozvoli korisnicima da preuzmu poruke iz njihove arhive tako �to �e ih poslati kao e-mail sebi.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Dozvoli preuzimanje');
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Ovo je format e-maila kojega �e korisnici primiti kada preuzmu svoje vlastite poruke iz arhive. Zadr�ite vrijednosti %user%, %msgdate% i %msgbody% nepromjenjene. ');

DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Postavi ograni�enje za ulaznu po�tu');
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Mo�ete uklju�iti broj poruka u ulaznoj po�ti u maksimalan broj arhiviranih poruka. U tom slu�aju, ukupan zbroj poruka u ulaznoj po�ti i broj poruka u arhivi ne smije biti ve�i od gore odre�enog broja. Kao druga mogu�nost, mo�ete postaviti ograni�enje za ulaznu po�tu bez arhive. U tom slu�aju, korisnici ne mogu imati vi�e poruka u ulaznoj po�ti od onoga gore postavljenog. Ako se dostigne taj broj, korisnici vi�e ne�e mo�i odgovarati na poruke ili pisati nove sve dok ne izbri�u stare poruke iz ulazne po�te ili arhive. (Korisnici �e jo� uvijek mo�i primati i �itati nove poruke.)');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Prika�i ograni�enje u ulaznoj po�ti');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Ispod ulazne po�te pokazati �e se koliko je poruka korisnik pohranio (i koliko ih mo�e pohraniti).');

DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Onemogu�ili ste arhivu. �to �elite u�initi s porukama koje su pohranjene u arhivi?');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Ostavi ih');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Ostavi ih u arhivi (korisnik im ne�e mo�i pristupiti ali �e se one i dalje ubrajati u ograni�eni broj poruka).');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Premjesti u ulaznu po�tu');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Arhivirane poruke premje�tene u ulaznu po�tu');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'Poruke �e biti premje�tene u ulaznu po�tu korisnika (ili u sme�e ako su starije od datuma koji je dozvoljen za ulaznu po�tu).');

// 0.4 frontend
DEFINE ('_UDDEIM_VALIDFOR_1', 'valjano ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' sati. 0=zauvijek (primjenuje se automatsko brisanje)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Kreiraj sistemsku ili op�u poruku]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'Sistemske i op�e poruke nisu dozvoljene.');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Poslati �e te poruke prikazane ispod. Provjerite ih i potvrdite ili otka�ite!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'Poruka za <strong>sve korisnike</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'Poruka za <strong>sve administratore</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'Poruka za <strong>sve online korisnike</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Primatelji ne�e mo�i odgovoriti na ovu poruku.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'Poruka �e biti poslana s <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> kao korisni�ko ime');
DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'Poruka �e iste�i ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'Poruka ne�e iste�i');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Provjerite link (kliknite na njega) prije nastavka!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Primjenjuje se samo u <b>porukama sustava</b>:<br /> [b]<b>bold</b>[/b] [i]<em>italic</em>[/i]<br />[url=http://www.someurl.com]neki url[/url] ili [url]http://www.someurl.com[/url] su linkovi');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Gre�ka: Primatelji nisu prona�eni. Poruka nije poslana.');

DEFINE ('_UDDEIM_EMN_SUBJECT', 'Imate poruke na %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'po�alji kao poruku sustava (=primatelji ne mogu odgovoriti)');
DEFINE ('_UDDEIM_SEND_TOALL', 'po�alji svim korisnicima');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'po�alji svim administratorima');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'po�alji svim online korisnicima');
DEFINE ('_UDDEIM_CANTREPLY', 'Ne mo�ete odgovoriti na ovu poruku.');

DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Neo�ekivana gre�ka: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Arhiva nije aktivirana.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Arhiviranje poruka nije uspijelo.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Pohranili ste ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>Nemate arhiviranih poruka.</strong>');
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<b>Nemate poruka u va�oj arhivi.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' poruka');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'Da bi ste sa�uvali poruke, morate prvo izbrisati druge poruke.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Imate ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' poruka u va�oj');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' poruka u va�oj'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in one "message in your")
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'arhivi');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'ulaznoj po�ti');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'ulaznoj po�ti i arhivi');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Najve�i dozvoljeni broj je ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Jo� uvijek mo�ete primati i �itati poruke ali ne�ete mo�i odgovarati ili pisati nove poruke sve dok ne izbri�ete neke poruke.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Pohranjene poruke: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(od najvi�e. ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Pohrani poruke u arhivu.');
DEFINE ('_UDDEIM_STORE', 'arhiva');
DEFINE ('_UDDEIM_BACK', 'natrag');
DEFINE ('_UDDEIM_TRASHCHECKED', 'izbri�i ozna�ene');
DEFINE ('_UDDEIM_SHOWALL', 'prika�i sve');
DEFINE ('_UDDEIM_ARCHIVE', 'Arhiva');

DEFINE ('_UDDEIM_ARCHIVEFULL', 'Arhiva puna. Nije sa�uvano.');

DEFINE ('_UDDEIM_NOMSGSELECTED', 'Nema izabranih poruka.');
DEFINE ('_UDDEIM_THISISACOPY', 'Kopija poruke poslana ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'kopija za mene');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'kopiraj u arhivu');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'original u sme�e');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Preuzimanje poruke');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'E-mail s eksportiranim porukama je poslan');
DEFINE ('_UDDEIM_EXPORT_NOW', 'ozna�eni e-mail za mene');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Neuspjelo slanje emaila koji sadr�i poruke.');
DEFINE ('_UDDEIM_LIMITREACHED', 'Prekora�enje broja poruka! Nije vra�eno u prija�nje stanje.');

// new in 0.5 ADMIN

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM predlo�ak');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Izaberite predlo�ak kojega �elite koristiti za uddeIM');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Prika�i veze');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Izaberite <i>da</i> ako imate instaliran CB/CBE/JS i �elite korisniku dati na uvid imena njegovih veza na stranici za pisanje nove poruke.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Prika�i postavke');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'Link za postavke pojaviti �e se u uddeIM ako imate aktivirane e-mail obavijesti ili sistem blokiranja. Mo�ete odrediti poziciju ili mo�ete isklju�iti postavku.');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'da, na dnu');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Dozvoli BB kodove');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'samo format slova');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Koristite <i>samo format slova</i> da bi dozvolili korisnicima da koriste bb kodove za podebljana, nako�ena, podcrtana slova, boju i veli�inu slova. Kada ovu opciju postavite na <i>da</i>, korisnici �e u svojim porukama mo�i koristiti <strong>sve</strong> podr�ane BB kodove (�ak i slike i linkove).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Dozvoli Emotikone');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'Kada ovu opciju postavite na <i>da</i>, emoticon kodovi kao :-) zamjenjuju se s emoticon slikama prilikom prikazivanja poruke. Pogledajte readme datoteku za popis podr�anih emoticona.');
DEFINE ('_UDDEADM_DISPLAY', 'Prikazivanje');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Prika�i ikone izbornika');
DEFINE ('_UDDEADM_SHOWMENUICONS_EXP', 'Kada ovu opciju postavite na <i>da</i>, stavke izbornika i linkovi za postupke prikazati �e se s ikonom.');
DEFINE ('_UDDEADM_SHOWTITLE_HEAD', 'Naziv komponente');
DEFINE ('_UDDEADM_SHOWTITLE_EXP', 'Upi�ite naslov komponente za slanje privatnih poruka, na primjer \'Privatne poruke\'. Ostavite prazno ako ne �elite prikazati naslov.');
DEFINE ('_UDDEADM_SHOWABOUT_HEAD', 'Prika�i O uddeIM link');
DEFINE ('_UDDEADM_SHOWABOUT_EXP', 'Postavite na <i>da</i> kako bi prikazali link za uddeIM software informacije i licencu. Ovaj link �e se pojaviti na dnu uddeIM HTML ispisa.');
DEFINE ('_UDDEADM_STOPALLEMAIL_HEAD', 'Zaustavi e-mail');
DEFINE ('_UDDEADM_STOPALLEMAIL_EXP', 'Ozna�ite ovaj kvadrat kako bi sprije�ili uddeIM da �alje e-mail poruke (e-mail obavijesti i Ne-zaboravi-me e-mail poruke) neovisno od postavki korisnika, na primjer kada testirate web stranice. Ako ne �elite ove mogu�nosti, postavite sve gornje postavke na <i>ne</i>.');
DEFINE ('_UDDEADM_GETPICLINK_HEAD', 'CB thumbnails u popisima');
DEFINE ('_UDDEADM_GETPICLINK_EXP', 'Postavite na <i>da</i> ako �elite prikazati CB thumbnails korisnika u pregledu poruka (ulazna po�ta, izlazna po�ta, outbox, itd.)');

// new in 0.5 FRONTEND

DEFINE ('_UDDEIM_SHOWUSERS', 'Prika�i korisnike');
DEFINE ('_UDDEIM_CONNECTIONS', 'Veze');
DEFINE ('_UDDEIM_SETTINGS', 'Postavke');
DEFINE ('_UDDEIM_NOSETTINGS', 'Nema postavki za uskla�ivanje.');
DEFINE ('_UDDEIM_ABOUT', 'O uddeIM'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Sastavi'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'E-Mail obavijest');
DEFINE ('_UDDEIM_EMN_EXP', 'Mo�ete primiti e-mail kad dobijete nove privatne poruke.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'E-mail obavijest za nove poruke');
DEFINE ('_UDDEIM_EMN_NONE', 'Bez e-mail obavijesti');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'E-mail obavijest kada sam offline');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Ne �alji obavijest za odgovore');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Blokiranje korisnika'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Mo�ete sprije�iti korisnika da vam �alje poruke tako �to �e te ga blokirati. Izaberite <i>blokiraj korisnika</i> kada pregledavate poruku od tog korisnika.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Spremi izmjene');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB oznaka za podebljani tekst. Primjena: [b]podebljano[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB oznaka za nako�eni tekst. Primjena: [i]nako�eno[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB oznaka za podcrtani tekst. Primjena: [u]podcrtaj[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB oznaka za slova u boji. Primjena [color=#XXXXXX]obojano[/color] gdje je XXXXXX hex kod boje koju �elite za va�a slova, na primjer FF0000 za crvenu.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB oznaka za slova u boji. Primjena [color=#XXXXXX]obojano[/color] gdje je XXXXXX hex kod boje koju �elite za va�a slova, na primjer 00FF00 za zelenu.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB oznaka za slova u boji. Primjena [color=#XXXXXX]obojano[/color] gdje je XXXXXX hex kod boje koju �elite za va�a slova, na primjer 0000FF za plavu.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB oznaka za vrlo mala slova. Primjena: [size=1]vrlo mala slova.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB oznaka za mala slova. Primjena: [size=2] mala slova.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB oznaka za velika slova. Primjena: [size=4]velika slova.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB oznaka za vrlo velika slova. Primjena: [size=5]vrlo velika slova.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB oznaka za umetanje linka za sliku. Primjena: [img]URL slike[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB oznaka za umetanje URL linka. Primjena: [url]web adresa[/url]. Ne zaboravite upisati http:// na po�etku svake web adrese.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Zatvori sve otvorene BB oznake.');

// *******************************************************************

$udde_smon[1]="Sij";
$udde_smon[2]="Velj";
$udde_smon[3]="O�u";
$udde_smon[4]="Tra";
$udde_smon[5]="Svi";
$udde_smon[6]="Lip";
$udde_smon[7]="Srp";
$udde_smon[8]="Kol";
$udde_smon[9]="Ruj";
$udde_smon[10]="Lis";
$udde_smon[11]="Stu";
$udde_smon[12]="Pro";

$udde_lmon[1]="Sije�anj";
$udde_lmon[2]="Velja�a";
$udde_lmon[3]="O�ujak";
$udde_lmon[4]="Travanj";
$udde_lmon[5]="Svibanj";
$udde_lmon[6]="Lipanj";
$udde_lmon[7]="Srpanj";
$udde_lmon[8]="Kolovoz";
$udde_lmon[9]="Rujan";
$udde_lmon[10]="Listopad";
$udde_lmon[11]="Studeni";
$udde_lmon[12]="Prosinac";

$udde_lweekday[0]="Nedjelja";
$udde_lweekday[1]="Ponedjeljak";
$udde_lweekday[2]="Utorak";
$udde_lweekday[3]="Srijeda";
$udde_lweekday[4]="�etvrtak";
$udde_lweekday[5]="Petak";
$udde_lweekday[6]="Subota";

$udde_sweekday[0]="Ned";
$udde_sweekday[1]="Pon";
$udde_sweekday[2]="Uto";
$udde_sweekday[3]="Sri";
$udde_sweekday[4]="�et";
$udde_sweekday[5]="Pet";
$udde_sweekday[6]="Sub";

DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Pozdrav %you%,\n\n%user% poslao vam je slijede�u privatnu poruku na %site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"Pozdrav %you%,\n\n%user% poslao vam je privatnu poruku na %site%. Molimo vas da se prijavite na stranice kako bi ste ju pro�itali!\n\n%livesite%");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE',
"Pozdrav %you%,\n\n%user% poslao vam je privatnu poruku na %site%. Molimo vas da se prijavite na stranice kako bi ste odgovorili na nju!\n\n%livesite%\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT',
"Pozdrav %you%,\n\nimate nepro�itane privatne poruke na %site%. Molimo vas da se prijavite na stranice kako bi ste ih pro�itali!\n\n%livesite%");
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');