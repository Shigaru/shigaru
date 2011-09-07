<?php
// *******************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         © 2007-2009 Stephan Slabihoud, © 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
// *******************************************************************
// Language file: Norwegian (source file is Latin-1)
// Translator:	Bjørn Are Solstad - http://thenewad.no
// *******************************************************************

// New: 1.9
DEFINE ('_UDDEIM_FILEUPLOAD_FAILED', 'Opplastingen sviktet');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_5', '...set default for filvedlegg');
DEFINE ('_UDDEADM_ENABLEATTACHMENT_HEAD', 'Aktiviser filvedlegg');
DEFINE ('_UDDEADM_ENABLEATTACHMENT_EXP', 'Dette aktiviserer filvedlegg for alle registrerte brukere og admins.');
DEFINE ('_UDDEADM_MAXSIZEATTACHMENT_HEAD', 'Maks. fil størrelse');
DEFINE ('_UDDEADM_MAXSIZEATTACHMENT_EXP', 'Maksimum filstørrelse tillatt.');
DEFINE ('_UDDEIM_FILESIZE_EXCEEDED', 'Maksimum filstørrelse overskridet');
DEFINE ('_UDDEADM_BYTES', 'Bytes');
DEFINE ('_UDDEADM_MAXATTACHMENTS_HEAD', 'Maks. vedlegg');
DEFINE ('_UDDEADM_MAXATTACHMENTS_EXP', 'Maksimum antall vedlegg pr beskjed.');
DEFINE ('_UDDEIM_DOWNLOAD', 'Last ned');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_HEAD', 'Sletting aktiviseres');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_YES', 'kun av admins');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_NO', 'av brukere');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_MANUALLY', 'manuelt');
DEFINE ('_UDDEADM_FILEADMINIGNITIONONLY_EXP', 'Automatisk slettinger er krevende for serveren. Velger du <b>kun av admins</b> automatisk slettinger blir iverksatt kun når en admin sjekker innkurven sin. Velg denne metoden dersom en admin sjekker innkurven regelmessig. Små eller sjelden administrerte nettsteder kan benytte seg av <b>av brukere</b>.');
DEFINE ('_UDDEADM_FILEMAINTENANCE_PRUNE', 'Prune filer nå');
DEFINE ('_UDDEADM_FILEMAINTENANCEDEL_HEAD', 'Aktivser fil sletting');
DEFINE ('_UDDEADM_FILEMAINTENANCEDEL_EXP', 'Fjerner slettet filer fra databasen. Dette er det samme som \'Prune filer nå\' hos system tabben.');
DEFINE ('_UDDEADM_FILEMAINTENANCEDEL_ERASE', 'SLETT');
DEFINE ('_UDDEIM_ATTACHMENTS', 'Vedlegg (maks. %u bytes pr fil):');
DEFINE ('_UDDEADM_MAINTENANCE_F1', 'Orphaned vedlegg lagret i filsystem: ');
DEFINE ('_UDDEADM_MAINTENANCE_F2', 'Sletting orphaned filer');
DEFINE ('_UDDEADM_BACKUP_DONE', 'Backup configurasjon ferdig.');
DEFINE ('_UDDEADM_RESTORE_DONE', 'Gjennopprettelse av configurasjon ferdig.');
DEFINE ('_UDDEADM_PRUNE_DONE', 'Beskjed pruning ferdig.');
DEFINE ('_UDDEADM_FILEPRUNE_DONE', 'Fil vedlegg pruning ferdig.');
DEFINE ('_UDDEADM_FOLDERCREATE_ERROR', 'Feil under mappe opprettelse: ');
DEFINE ('_UDDEADM_ATTINSTALL_WRITEFAILED', 'Feil under fil opprettelse: ');
DEFINE ('_UDDEADM_ATTINSTALL_IGNORE', 'Se bort fra denne feilen dersom du ikke bruker Fil vedlegg premium plugin (se FAQ).');
DEFINE ('_UDDEADM_ATTACHMENTGROUPS_HEAD', 'Tillatte grupper');
DEFINE ('_UDDEADM_ATTACHMENTGROUPS_EXP', 'Grupper som har vedlegg tillattelse.');
DEFINE ('_UDDEIM_SELECT', 'Velg');
DEFINE ('_UDDEIM_ATTACHMENT', 'Vedlegg');
DEFINE ('_UDDEADM_SHOWLISTATTACHMENT_HEAD', 'Vis vedlegg ikoner');
DEFINE ('_UDDEADM_SHOWLISTATTACHMENT_EXP', 'Vis vedlegg ikoner i beskjed lister (innkurv, utkurv, arkiv).');
DEFINE ('_UDDEIM_HELP_ATTACHMENT', 'Beskjeden inneholder vedlegg.');
DEFINE ('_UDDEADM_MAINTENANCE_COUNTFILES', 'Fil henviser til database:');
DEFINE ('_UDDEADM_MAINTENANCE_COUNTFILESDISTINCT', 'Filvedlegg lagret:');
DEFINE ('_UDDEADM_SHOWMENUCOUNT_HEAD', 'Vis teller');
DEFINE ('_UDDEADM_SHOWMENUCOUNT_EXP', 'Når sendt til <b>JA</b>, menyen inneholder beskjed teller. OBS: Dette krever flere tilleggs database spørringer og dermed bør ikke brukes på svake systemer.');
DEFINE ('_UDDEADM_CONFIG_FTPLAYER', 'Configurasjon (tilgang med FTP lag):');
DEFINE ('_UDDEADM_ENCODEHEADER_HEAD', 'Kodet post headers');
DEFINE ('_UDDEADM_ENCODEHEADER_EXP', 'Sett til <b>JA</b>, når post headers (som emne) bør være rfc 2047 kodet. Kjekt dersom du har problemer med spesielle karakterer.');
DEFINE ('_UDDEIM_UP', 'sorter stigende');
DEFINE ('_UDDEIM_DOWN', 'sorter nedstigende');
DEFINE ('_UDDEIM_UPDOWN', 'sorter');
DEFINE ('_UDDEADM_ENABLESORT_HEAD', 'Aktiver sortering');
DEFINE ('_UDDEADM_ENABLESORT_EXP', 'Sett til <b>JA</b>, når Brukeren skal ha mulighet til innkurv sortering, utkurv og arkiv (obs. system krevende).');

// New: 1.8
// %s will be replaced by _UDDEIM_NOMESSAGES_FILTERED_INBOX, _UDDEIM_NOMESSAGES_FILTERED_OUTBOX, _UDDEIM_NOMESSAGES_FILTERED_ARCHIVE
// Translators help: When having problems with the grammar, you can also move some text (e.g. "in your") to _UDDEIM_NOMESSAGES_FILTERED_* variables, e.g.
// instead of "_UDDEIM_NOMESSAGES_FILTERED_INBOX=inbox" you can also use "_UDDEIM_NOMESSAGES_FILTERED_INBOX=in your inbox"
DEFINE ('_UDDEIM_NOMESSAGES2_FR_FILTERED', '<b>Du har ingen beskjeder fra denne bruker i din%s.</b>');
DEFINE ('_UDDEIM_NOMESSAGES2_TO_FILTERED', '<b>Du har ingen beskjeder til denne bruker i din%s.</b>');
DEFINE ('_UDDEIM_NOMESSAGES2_UNFR_FILTERED', '<b>Du har ingen uleste beskjeder fra denne bruker i din%s.</b>');
DEFINE ('_UDDEIM_NOMESSAGES2_UNTO_FILTERED', '<b>Du har ingen uleste beskjeder til denne bruker i din%s.</b>');

// New: 1.7
DEFINE ('_UDDEADM_EMAILSTOPPED', '\'Epost stopp\' aktivert.');
DEFINE ('_UDDEIM_ACCOUNTLOCKED', 'Tilgang til din innkurv er låst. Kontakt site admin.');
DEFINE ('_UDDEADM_USERSET_LOCKED', 'Låst');
DEFINE ('_UDDEADM_USERSET_SELLOCKED', '- Låst -');
DEFINE ('_UDDEADM_CBBANNED_HEAD', 'Se etter CB blokkerte brukere');
DEFINE ('_UDDEADM_CBBANNED_EXP', 'Når aktivisert uddeIM ser om en bruker er blokkert i CB og gir ingen adgang til uddeIM. Brukere har heller ikke mulighet å sende beskjeder til en blokkert bruker.');
DEFINE ('_UDDEIM_YOUAREBANNED', 'Du er blokkert. Kontakt site admin.');
DEFINE ('_UDDEIM_USERBANNED', 'Bruker er blitt blokkert');
DEFINE ('_UDDEADM_JOOBB', 'Joo!BB');
DEFINE ('_UDDEPLUGIN_SEARCHSECTION', 'Privat Beskjed');
DEFINE ('_UDDEPLUGIN_MESSAGES', 'Privat Beskjeder');
DEFINE ('_UDDEADM_MAINTENANCEDEL_HEAD', 'Aktiviser beskjed sletting');
// note "This  is the same as _UDDEADM_MAINTENANCE_PRUNE on the system tab."
DEFINE ('_UDDEADM_MAINTENANCEDEL_EXP', 'Fjerner slettet beskjeder fra databasen. Dette er det samme som \'Prune beskjeder nå\' ved system tabben.');
DEFINE ('_UDDEADM_MAINTENANCEDEL_ERASE', 'SLETT');
DEFINE ('_UDDEADM_REPORTSPAM_HEAD', 'Rapporter beskjed lenk');
DEFINE ('_UDDEADM_REPORTSPAM_EXP', 'Aktiveringen viser en \'Rapporter beskjed\' lenk som tillatter brukere å rapportere SPAM til admin.');
DEFINE ('_UDDEIM_TOOLBAR_REMOVESPAM', 'Slett beskjed');
DEFINE ('_UDDEIM_TOOLBAR_REMOVEREPORT', 'Slett rapport');
DEFINE ('_UDDEIM_TOOLBAR_SPAMCONTROL', 'Rapport Kontroll');
DEFINE ('_UDDEADM_INFORMATION', 'Informasjon');
DEFINE ('_UDDEADM_SPAMCONTROL_STAT', 'Rapportert beskjeder:');
DEFINE ('_UDDEADM_SPAMCONTROL_TRASHED', 'Slettet');
DEFINE ('_UDDEADM_SPAMCONTROL_NOTEDEL', 'Slett beskjeden fra databasen?');
DEFINE ('_UDDEADM_SPAMCONTROL_NOTEREMOVE', 'Slett denne rapport?');
DEFINE ('_UDDEADM_SPAMCONTROL_SHOWHIDE', 'Vis/Skjul');
DEFINE ('_UDDEADM_SPAMCONTROL_EDIT', 'Rapport Kontroll Senter');
DEFINE ('_UDDEADM_SPAMCONTROL_FROM', 'Fra');
DEFINE ('_UDDEADM_SPAMCONTROL_TO', 'Til');
DEFINE ('_UDDEADM_SPAMCONTROL_TEXT', 'Beskjed');
DEFINE ('_UDDEADM_SPAMCONTROL_DELETE', 'Slett');
DEFINE ('_UDDEADM_SPAMCONTROL_REMOVE', 'Fjern');
DEFINE ('_UDDEADM_SPAMCONTROL_DATE', 'Dato');
DEFINE ('_UDDEADM_SPAMCONTROL_REPORTED', 'Rapportert');
DEFINE ('_UDDEIM_SPAMCONTROL_REPORT', 'Rapport beskjed');
DEFINE ('_UDDEIM_SPAMCONTROL_MARKED', 'Beskjeden er blitt rapportert');
DEFINE ('_UDDEIM_SPAMCONTROL_UNREPORT', 'Tilbaketrekk rapport');
DEFINE ('_UDDEADM_JOMSOCIAL', 'JomSocial');
DEFINE ('_UDDEADM_KUNENA', 'Kunena');
DEFINE ('_UDDEADM_ADMIN_FILTER', 'Filtrer');
DEFINE ('_UDDEADM_ADMIN_DISPLAY', 'Vis #');
DEFINE ('_UDDEADM_TRASHORIGINALSENT_HEAD', 'Slett sendt beskjed');
DEFINE ('_UDDEADM_TRASHORIGINALSENT_EXP', 'Når aktivisert så settes valgmuligheten ved siden av \'Send\' knappen som heter \'slett beskjed\' som ikke er forhåndsvalgt. Brukere kan velge dette dersom de ønsker beskjeden slettet etter forsendelsen.');
DEFINE ('_UDDEIM_TRASHORIGINALSENT', 'Slett beskjed');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_4', '...sett automatisk for å slette beskjed, rapport spam, CB blokkerte brukere');
DEFINE ('_UDDEADM_VERSIONCHECK_IMPORTANT', 'Viktige lenker:');
DEFINE ('_UDDEADM_VERSIONCHECK_HOTFIX', 'Hotfix');
DEFINE ('_UDDEADM_VERSIONCHECK_NONE', 'Ingen');
DEFINE ('_UDDEADM_MAINTENANCEFIX_HEAD', "Kompatibilitets vedlikehold");
DEFINE ('_UDDEADM_MAINTENANCEFIX_EXP', "uddeIM bruker to XML filer for å forsikre at pakker kan installeres til Joomla 1.0 og 1.5. Hos Joomla 1.5 en XML fil er ikke nødvendig som i sin tur forårsaker en ukompatibel Advarsel beskjed (som er feil). Dette fjerner de unødvendige filene, slik at Advarselen blir ikke vist.");
DEFINE ('_UDDEADM_MAINTENANCE_FIX', "FIKS");
DEFINE ('_UDDEADM_MAINTENANCE_XML1', "Joomla 1.0 og Joomla 1.5 XML installeres for uddeIM pakker eksisterer.<br />");
DEFINE ('_UDDEADM_MAINTENANCE_XML2', "Dette er krevd grunnet installasjonspakker for Joomla 1.0 og Joomla 1.5.<br />");
DEFINE ('_UDDEADM_MAINTENANCE_XML3', "Siden dette er ikke påkrevd etter installasjonen er ferdig, Joomla 1.0 installasjon kan fjernes hos Joomla 1.5 systemer.<br />");
DEFINE ('_UDDEADM_MAINTENANCE_XML4', "Dette blir gjort for følgende pakker:<br />");
DEFINE ('_UDDEADM_MAINTENANCE_FXML1', "Ubrukte XML installasjoner for følgende uddeIM paker blir fjernet:<br />");
DEFINE ('_UDDEADM_MAINTENANCE_FXML2', "Ingen Ubrukte XML installasjoner for uddeIM pakker funnet!<br />");
DEFINE ('_UDDEADM_SHOWMENUICONS1_HEAD', 'Hvordan Menybar viser seg');
DEFINE ('_UDDEADM_SHOWMENUICONS1_EXP', 'Du kan endre om menyen vises med ikoner eller tekst.');
DEFINE ('_UDDEIM_MENUICONS_P1', 'Ikoner og tekst');
DEFINE ('_UDDEIM_MENUICONS_P2', 'Kun ikoner');
DEFINE ('_UDDEIM_MENUICONS_P0', 'Kun tekst');
DEFINE ('_UDDEIM_LISTSLIMIT_2', 'Maks nummer av mottagere pr liste:');
DEFINE ('_UDDEADM_ADDEMAIL_ADMIN', 'Admins kan velge');
DEFINE ('_UDDEAIM_ADDEMAIL_SELECT', 'Varsler med beskjed');
DEFINE ('_UDDEAIM_ADDEMAIL_TITLE', 'Inkluder beskjeden i email varsling.');

// New: 1.6
DEFINE ('_UDDEIM_NOLISTSELECTED', 'Ingen Brukerlister valgt!');
DEFINE ('_UDDEADM_NOPREMIUM', 'Premium plugin not installed');
DEFINE ('_UDDEIM_LISTGLOBAL_CREATOR', 'Skaper:');
DEFINE ('_UDDEIM_LISTGLOBAL_ENTRIES', 'Antall');
DEFINE ('_UDDEIM_LISTGLOBAL_TYPE', 'Type');
DEFINE ('_UDDEIM_LISTGLOBAL_NORMAL', 'Normal');
DEFINE ('_UDDEIM_LISTGLOBAL_GLOBAL', 'Global');
DEFINE ('_UDDEIM_LISTGLOBAL_RESTRICTED', 'Kun Autorisert');
DEFINE ('_UDDEIM_LISTGLOBAL_P0', 'Normal kontakt liste');
DEFINE ('_UDDEIM_LISTGLOBAL_P1', 'Global kontakt liste');
DEFINE ('_UDDEIM_LISTGLOBAL_P2', 'Kun autorisert kontakt liste (kin Medlemmer har tilgang til listen)');
DEFINE ('_UDDEIM_TOOLBAR_USERSETTINGS', 'Bruker innstillinger');
DEFINE ('_UDDEIM_TOOLBAR_REMOVESETTINGS', 'Fjern innstillinger');
DEFINE ('_UDDEIM_TOOLBAR_CREATESETTINGS', 'Skap innstillinger');
DEFINE ('_UDDEIM_TOOLBAR_SAVE', 'Lagre');
DEFINE ('_UDDEIM_TOOLBAR_BACK', 'Tilbake');
DEFINE ('_UDDEIM_TOOLBAR_TRASHMSGS', 'Slett beskjeder');
DEFINE ('_UDDEIM_CBPLUG_CONT', '[forsett]');
DEFINE ('_UDDEIM_CBPLUG_UNBLOCKNOW', '[Lås opp]');
DEFINE ('_UDDEIM_CBPLUG_DOBLOCK', 'Blokker Brukeren');
DEFINE ('_UDDEIM_CBPLUG_DOUNBLOCK', 'Lås opp Brukeren');
DEFINE ('_UDDEIM_CBPLUG_BLOCKINGCFG', 'Blokking');
DEFINE ('_UDDEIM_CBPLUG_BLOCKED', 'Du har Blokkert denne Brukeren.');
DEFINE ('_UDDEIM_CBPLUG_UNBLOCKED', 'Denne Brukeren kan kontakte deg.');
DEFINE ('_UDDEIM_CBPLUG_NOWBLOCKED', 'Denne Brukeren er nå Blokkert.');
DEFINE ('_UDDEIM_CBPLUG_NOWUNBLOCKED', 'Denne Brukeren er ikke lenger Blokkert.');
DEFINE ('_UDDEADM_PARTIALIMPORTDONE', 'Partial import of messages from old PMS done. Do not import this part again because doing so will import the messages again and they will show up twice.');
DEFINE ('_UDDEADM_IMPORT_HELP', 'Note: The messages can be imported all at once or in parts. Importing in parts can be necessary when the import dies because of too many messages to import.');
DEFINE ('_UDDEADM_IMPORT_PARTIAL', 'Partial import:');
DEFINE ('_UDDEADM_UPDATEYOURDB', 'Important: You have not updated your database! Please refer to the README how to update uddeIM correctly!');
DEFINE ('_UDDEADM_RESTRALLUSERS_HEAD', 'Restrict "All users" access');
DEFINE ('_UDDEADM_RESTRALLUSERS_EXP', 'You can restrict the access to the "All users" list. Usually the "All users" list is available for all (<i>no restriction</i>).');
DEFINE ('_UDDEADM_RESTRALLUSERS_0', 'no restriction');
DEFINE ('_UDDEADM_RESTRALLUSERS_1', 'special users');
DEFINE ('_UDDEADM_RESTRALLUSERS_2', 'admins only');
DEFINE ('_UDDEIM_MESSAGE_UNARCHIVED', 'Message unarchived.');
DEFINE ('_UDDEADM_AUTOFORWARD_SPECIAL', 'special users');
DEFINE ('_UDDEIM_HELP', 'Help');
DEFINE ('_UDDEIM_HELP_HEADLINE1', 'uddeIM Help');
DEFINE ('_UDDEIM_HELP_HEADLINE2', 'Kort overblikk over funksjoner');
DEFINE ('_UDDEIM_HELP_INBOX', '<b>Innkurven</b> holder alle dine innkommende Beskjeder.');
DEFINE ('_UDDEIM_HELP_OUTBOX', '<b>Utkurven</b> beholder kopier av det du har sendt.');
DEFINE ('_UDDEIM_HELP_TRASHCAN', '<b>Papirkurven</b> holder alle slettet Beskjeder. Beskjedene blir ikke slettet herfra med det aller første, men blir slettet over tid. Det er mulig å resirkulere beskjeder herfra til normalt igjen.');
DEFINE ('_UDDEIM_HELP_ARCHIVE', '<b>Arkivet</b> holder på beskjeder utenom Innkurven. Du kan kun Arkivere Beskjeder fra Innkurven din. For å akrivere Beskjeder du har sendt, husk å velge <i>kopi til meg selv</i> når du sender.');
DEFINE ('_UDDEIM_HELP_USERLISTS', '<b>Kontakter</b> tillatter deg å lagre kontakter i listeform, eller såkalte distribusjonslister. Det er ofte lettere å sende beskjeder til samtlige i en Gruppe slik enn å velge hvert enkelt <i>#listname</i>.');
DEFINE ('_UDDEIM_HELP_SETTINGS', '<b>Innstillinger</b> viser alle valg muligheter..');
DEFINE ('_UDDEIM_HELP_COMPOSE', '<b>Ny Beskjed</b> lar deg skrive Ny Beskjed.');
DEFINE ('_UDDEIM_HELP_IREAD', 'Beskjeden er lest (du kan toggle status).');
DEFINE ('_UDDEIM_HELP_IUNREAD', 'Beskjeden er ulest (du kan toggle status).');
DEFINE ('_UDDEIM_HELP_OREAD', 'Beskjeden er lest.');
DEFINE ('_UDDEIM_HELP_OUNREAD', 'Beskjeden er ulest. Uleste beskjeder kan tilbaketrekkes.');
DEFINE ('_UDDEIM_HELP_TREAD', 'Beskjeden er lest.');
DEFINE ('_UDDEIM_HELP_TUNREAD', 'Beskjeden er enda ulest.');
DEFINE ('_UDDEIM_HELP_FLAGGED', 'Beskjeden er flagget, f.eks. beskjeden er viktig (du kan toggle status).');
DEFINE ('_UDDEIM_HELP_UNFLAGGED', '<i>Normal</i> beskjed (du kan toggle status).');
DEFINE ('_UDDEIM_HELP_ONLINE', 'Bruker er Online.');
DEFINE ('_UDDEIM_HELP_OFFLINE', 'Bruker er Offline.');
DEFINE ('_UDDEIM_HELP_DELETE', 'Slett en Beskjed (flytt til Papirkurven).');
DEFINE ('_UDDEIM_HELP_FORWARD', 'Videresend en Beskjed til ny mottaker.');
DEFINE ('_UDDEIM_HELP_ARCHIVEMSG', 'Arkiver en Beskjed. Arkiverte beskjeder blir ikke slettet automatiske. Admin kan innstille tidsgrense på dette.');
DEFINE ('_UDDEIM_HELP_UNARCHIVEMSG', 'Uarkiver en Beskjed. Beskjeden blir flyttet tilbake til Innkurven.');
DEFINE ('_UDDEIM_HELP_RECALL', 'Trekk tilbake beskjeden. Sendte Beskjeder kan trekkes tilbake så lenge de ikke er blitt lest av mottaker.');
DEFINE ('_UDDEIM_HELP_RECYCLE', 'Resirkuler en Beskjed (flytt fra Papirkurven til Innkurv).');
DEFINE ('_UDDEIM_HELP_NOTIFY', 'Konfigurasjon av email varsling når nye beskjeder ankommer.');
DEFINE ('_UDDEIM_HELP_AUTORESPONDER', 'Når autosvar er aktivisert, mottatte Beskjeder blir besvart umiddelbart.');
DEFINE ('_UDDEIM_HELP_AUTOFORWARD', 'Nye Beskjeder kan videresendes til annen Bruker automatisk.');
DEFINE ('_UDDEIM_HELP_BLOCKING', 'Du kan Blokker andre Brukere. Disse Brukere kan ikke sende deg Private Beskjeder.');
DEFINE ('_UDDEIM_HELP_MISC', 'Her er flere valg muligheter');
DEFINE ('_UDDEIM_HELP_FEED', 'Du har tilgang på Innkurven via en RSS feed.');
DEFINE ('_UDDEADM_SEPARATOR_HEAD', 'Deler');
DEFINE ('_UDDEADM_SEPARATOR_EXP', 'Velg en Deler som brukes for flere mottakere (default er ",").');
DEFINE ('_UDDEADM_SEPARATOR_P0', 'komma (default)');
DEFINE ('_UDDEADM_SEPARATOR_P1', 'semicolon');
DEFINE ('_UDDEADM_RSSLIMIT_HEAD', 'RSS artikler');
DEFINE ('_UDDEADM_RSSLIMIT_EXP', 'Begrense antall RSS artikler (0 for ingen begrensning).');
DEFINE ('_UDDEADM_SHOWHELP_HEAD', 'Vis hjelp knappen');
DEFINE ('_UDDEADM_SHOWHELP_EXP', 'Når aktivisert en Hjelpe Knapp er synlig.');
DEFINE ('_UDDEADM_SHOWIGOOGLE_HEAD', 'Vis iGoogle gadget knapp');
DEFINE ('_UDDEADM_SHOWIGOOGLE_EXP', 'Når aktivert en <i>Legg til iGoogle</i> knapp for uddeIM iGoogle gadget blir vist i Brukervalg.');
DEFINE ('_UDDEADM_MOOTOOLS_NONE11', 'Ikke last inn MooTools (1.1 blir brukt)');
DEFINE ('_UDDEADM_MOOTOOLS_NONE12', 'Ikke last inn MooTools (1.2 blir brukt)');
DEFINE ('_UDDEIM_RSS_INTRO1', 'Du har tilgang til Innkurv ved å bruke RSS feed (0.91).');
DEFINE ('_UDDEIM_RSS_INTRO1B', 'Tilgangs URL er:');
DEFINE ('_UDDEIM_RSS_INTRO2', 'OBS! Denne URL er strengt konfidensielt, da den går direkte til din Innkurv.');
DEFINE ('_UDDEIM_RSS_FEED', 'RSS Beskjed Feed');
DEFINE ('_UDDEIM_RSS_NOOBJECT', 'Ingen objekt feil...');
DEFINE ('_UDDEIM_RSS_USERBLOCKED', 'Bruker blokkert...');
DEFINE ('_UDDEIM_RSS_NOTALLOWED', 'Tilgang er ikke tillatt...');
DEFINE ('_UDDEIM_RSS_WRONGPASSWORD', 'Feil Brukernavn eller Passord...');
DEFINE ('_UDDEIM_RSS_NOMESSAGES', 'Ingen Beskjeder');
DEFINE ('_UDDEIM_RSS_NONEWMESSAGES', 'Ingen nye beskjeder');
DEFINE ('_UDDEADM_ENABLERSS_HEAD', 'Aktiviser RSS');
DEFINE ('_UDDEADM_ENABLERSS_EXP', 'Når dette er aktivisert, beskjeder kan vises ved bruk av RSS feed. Brukere finner korrekt URL i Profilen.');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_3', '...sett default for RSS, iGoogle, hjelp, deler');
DEFINE ('_UDDEADM_DELETEM_DELETING', 'Beskjeder Slettes:');
DEFINE ('_UDDEADM_DELETEM_FROMUSER', 'Beskjeder Slettes fra Brukeren ');
DEFINE ('_UDDEADM_DELETEM_MSGSSENT', '- beskjeder sendt: ');
DEFINE ('_UDDEADM_DELETEM_MSGSRECV', '- beskjeder mottatt: ');
DEFINE ('_UDDEIM_PMNAV_THISISARESPONSE', 'Dette er i respons til:');
DEFINE ('_UDDEIM_PMNAV_THEREARERESPONSES', 'Responser til denne:');
DEFINE ('_UDDEIM_PMNAV_DELETED', 'Beskjeder ikke tilgjengelig');
DEFINE ('_UDDEIM_PMNAV_EXISTS', 'gå til beskjed');
DEFINE ('_UDDEIM_PMNAV_COPY2ME', '(Kopi)');
DEFINE ('_UDDEADM_PMNAV_HEAD', 'Tillatt navigering');
DEFINE ('_UDDEADM_PMNAV_EXP', 'Viser en navigerings bar som tillater navigering gjennom tråder.');
DEFINE ('_UDDEADM_MAINTENANCE_ALLDAYS', 'Beskjeder:');
DEFINE ('_UDDEADM_MAINTENANCE_7DAYS', 'Beskjeder i 7 dager:');
DEFINE ('_UDDEADM_MAINTENANCE_30DAYS', 'Beskjeder i 30 dager:');
DEFINE ('_UDDEADM_MAINTENANCE_365DAYS', 'Beskjeder i 365 dager:');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD1', 'Sending minner til (Husk-meg: %s dager):');
DEFINE ('_UDDEADM_MAINTENANCE_HEAD2', 'I %s dager sending minner til:');
DEFINE ('_UDDEADM_MAINTENANCE_NO', 'Nei:');
DEFINE ('_UDDEADM_MAINTENANCE_USERID', 'User ID:');
DEFINE ('_UDDEADM_MAINTENANCE_TONAME', 'Navn:');
DEFINE ('_UDDEADM_MAINTENANCE_MID', 'Beskjed ID:');
DEFINE ('_UDDEADM_MAINTENANCE_WRITTEN', 'Skrevet:');
DEFINE ('_UDDEADM_MAINTENANCE_TIMER', 'Timer:');

// New: 1.5
DEFINE ('_UDDEMODULE_ALLDAYS', ' Beskjeder');
DEFINE ('_UDDEMODULE_7DAYS', ' beskjeder siste 7 dager');
DEFINE ('_UDDEMODULE_30DAYS', ' beskjeder siste 30 dager');
DEFINE ('_UDDEMODULE_365DAYS', ' beskjeder siste 365 dager');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_WARNING', '<br /><b>Merk:<br />When using mosMail, you have to configure a valid email address!</b>');
DEFINE ('_UDDEIM_FILTEREDMESSAGE', 'beskjed filtrert');
DEFINE ('_UDDEIM_FILTEREDMESSAGES', 'beskjeder filtrert');
DEFINE ('_UDDEIM_FILTER', 'Filter:');
DEFINE ('_UDDEIM_FILTER_TITLE_INBOX', 'Vis fra kun denne Bruker');
DEFINE ('_UDDEIM_FILTER_TITLE_OUTBOX', 'Vis til kun denne Bruker');
DEFINE ('_UDDEIM_FILTER_UNREAD_ONLY', 'kun ulest');
DEFINE ('_UDDEIM_FILTER_SUBMIT', 'Filter');
DEFINE ('_UDDEIM_FILTER_ALL', '- alt -');
DEFINE ('_UDDEIM_FILTER_PUBLIC', '- Åpen brukere -');
DEFINE ('_UDDEADM_FILTER_HEAD', 'Aktiviser Filter');
DEFINE ('_UDDEADM_FILTER_EXP', 'Dersom aktivisert Brukere kan filtrere Inn/Utkurv for å vise kun en bestemt mottager eller sender.');
DEFINE ('_UDDEADM_FILTER_P0', 'Ikke aktivisert');
DEFINE ('_UDDEADM_FILTER_P1', 'over beskjed liste');
DEFINE ('_UDDEADM_FILTER_P2', 'under beskjed liste');
DEFINE ('_UDDEADM_FILTER_P3', 'over og under beskjed liste');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED', '<b>Du har no%s beskjed%s i din%s.</b>');	// see next  six lines
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_FROM', ' fra denne Bruker');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_TO', ' til denne Bruker');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_INBOX', ' innkurv');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_OUTBOX', ' utkurv');
DEFINE ('_UDDEIM_NOMESSAGES_FILTERED_ARCHIVE', ' arkiv');
DEFINE ('_UDDEIM_TODP_TITLE', 'Mottager');
DEFINE ('_UDDEIM_TODP_TITLE_CC', 'En eller flere mottagere (comma deler)');
DEFINE ('_UDDEIM_ADDCCINFO_TITLE', 'Når dette er krysset en linje som inneholder alle mottakere blir lagt til beskjeden.');
DEFINE ('_UDDEADM_CFGFILE_CONVERTING_2', '...sett default for autosvarer, autovideresend, inputboks, filter');
DEFINE ('_UDDEADM_AUTORESPONDER_HEAD', 'Aktiviser Autoresponder');
DEFINE ('_UDDEADM_AUTORESPONDER_EXP', 'Når autoresponder er aktivisert Brukeren kan aktivisere en varsling i personlig Bruker innstillinger.');
DEFINE ('_UDDEIM_EMN_AUTORESPONDER', 'Aktiviser Autoresponder');
DEFINE ('_UDDEIM_AUTORESPONDER', 'Autoresponder');
DEFINE ('_UDDEIM_AUTORESPONDER_EXP', 'Når autoresponder er aktivisert hver mottatte beskjeder blir besvart momentant.');
DEFINE ('_UDDEIM_AUTORESPONDER_DEFAULT', "Beklager, jeg er ikke tilgjengelig.\nJeg vi llese beskjeden ved første anledning.");
DEFINE ('_UDDEADM_USERSET_AUTOR', 'AutoR');
DEFINE ('_UDDEADM_USERSET_SELAUTOR', '- AutoR -');
DEFINE ('_UDDEIM_USERBLOCKED', 'Bruker er blokkert.');
DEFINE ('_UDDEADM_AUTOFORWARD_HEAD', 'Aktiviser Autovideresend');
DEFINE ('_UDDEADM_AUTOFORWARD_EXP', 'Når Autovideresend er aktivisert kan brukere videresende beskjeder til andre brukere automatisk.');
DEFINE ('_UDDEIM_EMN_AUTOFORWARD', 'Aktiviser Autovideresend');
DEFINE ('_UDDEADM_USERSET_AUTOF', 'AutoF');
DEFINE ('_UDDEADM_USERSET_SELAUTOF', '- AutoF -');
DEFINE ('_UDDEIM_AUTOFORWARD', 'Autovideresending');
DEFINE ('_UDDEIM_AUTOFORWARD_EXP', 'Nye beskjeder kan videresendes ti landre brukere automatisk.');
DEFINE ('_UDDEIM_THISISAFORWARD', 'Autovideresend av beskjed opprinnelig sendt til ');
DEFINE ('_UDDEADM_COLSROWS_HEAD', 'Beskjed boks (cols/rows)');
DEFINE ('_UDDEADM_COLSROWS_EXP', 'Dette spesifiserer columns og rows av beskjed boksen (default verdier er 60/10).');
DEFINE ('_UDDEADM_WIDTH_HEAD', 'Beskjed boks (bredde)');
DEFINE ('_UDDEADM_WIDTH_EXP', 'This specifies the width of the message box in px (default is 0). If this value is 0, the width specified in the CSS style is used.');
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
DEFINE ('_UDDEADM_VERSIONCHECK', 'Versjon info:');
DEFINE ('_UDDEADM_STATISTICS', 'Statistikker:');
DEFINE ('_UDDEADM_STATISTICS_HEAD', 'Vis statistikker');
DEFINE ('_UDDEADM_STATISTICS_EXP', 'This displays some statistics like number of stored messages etc.');
DEFINE ('_UDDEADM_STATISTICS_CHECK', 'Vis statistikker');
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
DEFINE ('_UDDEADM_HIDEUSERS_EXP', 'Enter user IDs which should be hidden from userlist (e.g. 65,66,67). Admins will always see the complete list.');
DEFINE ('_UDDEIM_ERRORCSRF', 'CSRF attack recognized');
DEFINE ('_UDDEADM_CSRFPROTECTION_HEAD', 'CSRF protection');
DEFINE ('_UDDEADM_CSRFPROTECTION_EXP', 'This protects all forms against Cross-Site Request Forgery attacks. Usually this should be enabled. Only when you have strange problems switch it off.');
DEFINE ('_UDDEIM_CANTREPLYARCHIVE', 'You can not reply to archived messages.');
DEFINE ('_UDDEIM_COULDNOTRECALLPUBLIC', 'Replies to unregistered users can not be recalled.');
DEFINE ('_UDDEADM_PUBREPLYS_HEAD', 'Allow replies');
DEFINE ('_UDDEADM_PUBREPLYS_EXP', 'Allow direct replies to messages from public users.');
DEFINE ('_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE',
"Hi %you%,\n\n%user% has sent you the following private message at %site%.\n__________________\n%pmessage%");
DEFINE ('_UDDEADM_PUBNAMESTEXT', 'Show realnames');
DEFINE ('_UDDEADM_PUBNAMESDESC', 'Show realnames or usernames in public frontend?');
DEFINE ('_UDDEIM_USERLIST', 'Userlist');
DEFINE ('_UDDEIM_YOUHAVETOWAIT', 'Beklager, du må vente før du kan poste en ny beskjed');
DEFINE ('_UDDEADM_USERSET_LASTSENT', 'Sist sendt');
DEFINE ('_UDDEADM_TIMEDELAY_HEAD', 'Tidsdelay');
DEFINE ('_UDDEADM_TIMEDELAY_EXP', 'Time in seconds a user must wait before he can post the next message (0 for no time delay).');
DEFINE ('_UDDEADM_SECONDS', 'sekunder');
DEFINE ('_UDDEIM_PUBLICSENT', 'Beskjed sendt.');
DEFINE ('_UDDEIM_ERRORINFROMNAME', 'Feil i sender navn');
DEFINE ('_UDDEIM_ERRORINEMAIL', 'Feil i email adresse');
DEFINE ('_UDDEIM_YOURNAME', 'Navnet ditt:');
DEFINE ('_UDDEIM_YOUREMAIL', 'Din email:');
DEFINE ('_UDDEADM_VERSIONCHECK_USING', 'You are using uddeIM ');
DEFINE ('_UDDEADM_VERSIONCHECK_LATEST', 'You are already using the latest version of uddeIM.');
DEFINE ('_UDDEADM_VERSIONCHECK_CURRENT', 'The current version is ');
DEFINE ('_UDDEADM_VERSIONCHECK_INFO', 'Update information:');
DEFINE ('_UDDEADM_VERSIONCHECK_HEAD', 'Check for updates');
DEFINE ('_UDDEADM_VERSIONCHECK_EXP', 'This contacts uddeIM developer website to receive information about the current uddeIM version. Except the uddeIM version you use, no other personal information is transmitted.');
DEFINE ('_UDDEADM_VERSIONCHECK_CHECK', 'CHECK NOW');
DEFINE ('_UDDEADM_VERSIONCHECK_ERROR', 'Unable to receive version information.');
DEFINE ('_UDDEIM_NOSUCHLIST', 'Kontaktliste ikke funnet!');
DEFINE ('_UDDEIM_LISTSLIMIT_1', 'Maks antall mottakere overskredet (maks. ');
DEFINE ('_UDDEADM_MAXONLISTS_HEAD', 'Maks. antall mottakere');
DEFINE ('_UDDEADM_MAXONLISTS_EXP', 'Maks. antall mottakere tillatt pr kontaktliste.');
DEFINE ('_UDDEIM_LISTSNOTENABLED', 'Kontaktliste er ikke aktivisert');
DEFINE ('_UDDEADM_ENABLELISTS_HEAD', 'Aktiviser Kontaktlister');
DEFINE ('_UDDEADM_ENABLELISTS_EXP', 'uddeIM allows users to create contact lists. These lists can be used to send messages to multiple users. Do not forget to enable multiple recipients when you want to use contact lists.');
DEFINE ('_UDDEADM_ENABLELISTS_0', 'disabled');
DEFINE ('_UDDEADM_ENABLELISTS_1', 'registrert brukere');
DEFINE ('_UDDEADM_ENABLELISTS_2', 'special users');
DEFINE ('_UDDEADM_ENABLELISTS_3', 'admins only');
DEFINE ('_UDDEIM_LISTSNEW', 'Skap ny kontaktliste');
DEFINE ('_UDDEIM_LISTSSAVED', 'Kontaktliste lagret');
DEFINE ('_UDDEIM_LISTSUPDATED', 'Kontaktliste oppdatert');
DEFINE ('_UDDEIM_LISTSDESC', 'Beskrivelse');
DEFINE ('_UDDEIM_LISTSNAME', 'Navn');
DEFINE ('_UDDEIM_LISTSNAMEWO', 'Navn (uten mellomrom)');
DEFINE ('_UDDEIM_EDITLINK', 'rediger');
DEFINE ('_UDDEIM_LISTS', 'Kontakter');
DEFINE ('_UDDEIM_STATUS_READ', 'lest');
DEFINE ('_UDDEIM_STATUS_UNREAD', 'ulest');
DEFINE ('_UDDEIM_STATUS_ONLINE', 'online');
DEFINE ('_UDDEIM_STATUS_OFFLINE', 'offline');
DEFINE ('_UDDEADM_CBGALLERY_HEAD', 'Vis CB galleri bilder');
DEFINE ('_UDDEADM_CBGALLERY_EXP', 'By default uddeIM does only show avatars users have uploaded. When you enable this setting uddeIM does also display pictures from the CB avatars gallery.');
DEFINE ('_UDDEADM_UNBLOCKCB_HEAD', 'Lås opp CB forbindelser');
DEFINE ('_UDDEADM_UNBLOCKCB_EXP', 'You can allow messages to recipients when the registered user is on the recipients CB connection list (even when the recipient is in a group which is blocked). This setting is independent from the individual blocking each user can configure when enabled (see settings above).');
DEFINE ('_UDDEIM_GROUPBLOCKED', 'Du er ikke autorisert til å sende til denne Gruppe.');
DEFINE ('_UDDEIM_ONEUSERBLOCKS', 'Mottakeren har blokkert deg.');
DEFINE ('_UDDEADM_BLOCKGROUPS_HEAD', 'Blokkert grupper (registrert brukere)');
DEFINE ('_UDDEADM_BLOCKGROUPS_EXP', 'Groups to which registered users are not allowed to send messages to. This is for registered users only. Special users and admins are not affected by this setting. This setting is independent from the individual blocking each user can configure when enabled (see settings above).');
DEFINE ('_UDDEADM_PUBBLOCKGROUPS_HEAD', 'Blokkert grupper (public brukere)');
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
DEFINE ('_UDDEIM_NOPUBLICMSG', 'Bruker tar kun imot beskjeder fra Registrerte Brukere.');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_HEAD', 'Skjul fra åpen visning "Alle brukere" liste');
DEFINE ('_UDDEADM_PUBHIDEALLUSERS_EXP', 'You can hide certain groups to be listed in the public "All users" list. Note: this hides the names only, the users can still receive messages. Users who have not enabled Public Frontend will never be listed in this list.');
DEFINE ('_UDDEADM_HIDEALLUSERS_HEAD', 'Hide from "All users" list');
DEFINE ('_UDDEADM_HIDEALLUSERS_EXP', 'You can hide certain groups to be listed in the "All users" list. Note: this hides the names only, the users can still receive messages.');
DEFINE ('_UDDEADM_HIDEALLUSERS_0', 'ingen');
DEFINE ('_UDDEADM_HIDEALLUSERS_1', 'superadmins only');
DEFINE ('_UDDEADM_HIDEALLUSERS_2', 'admins only');
DEFINE ('_UDDEADM_HIDEALLUSERS_3', 'special users');
DEFINE ('_UDDEADM_PUBLIC', 'Public');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_HEAD', 'Behavior of "All users" link');
DEFINE ('_UDDEADM_PUBMODESHOWALLUSERS_EXP', 'Choose if the "All users" link should be suppressed in Public Frontend, displayed or if always all users should be shown.');
DEFINE ('_UDDEADM_USERSET_PUBLIC', 'Public Frontend');
DEFINE ('_UDDEADM_USERSET_SELPUBLIC', '- select public -');
DEFINE ('_UDDEIM_OPTIONS_F', 'Allow public users to send a message');
DEFINE ('_UDDEIM_MSGLIMITREACHED', 'Message limit reached!');
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
DEFINE ('_UDDEADM_PUBDEF1', 'aktivisert');
DEFINE ('_UDDEIM_WRONGCAPTCHA', 'Feil sikkerhets kode');

// New: 1.0
DEFINE ('_UDDEADM_NONEORUNKNOWN', 'ingen eller ukjent');
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
DEFINE ('_UDDEADM_LANGUAGECHARSET_EXP', 'Usually <strong>default</strong> (ISO-8859-1) is the correct setting for Joomla 1.0 and <strong>UTF-8</strong> for Joomla 1.5.');
DEFINE ('_UDDEADM_LANGUAGECHARSET_UTF8', 'UTF-8');
DEFINE ('_UDDEADM_LANGUAGECHARSET_DEFAULT', 'default');
DEFINE ('_UDDEIM_READ_INFO_1', 'Leste beskjeder vil være i Innboksen i ');
DEFINE ('_UDDEIM_READ_INFO_2', ' dager maksimum før de slettes automatisk.');
DEFINE ('_UDDEIM_UNREAD_INFO_1', 'Uleste beskjeder blir slettet etter ');
DEFINE ('_UDDEIM_UNREAD_INFO_2', ' dager maksimum..');
DEFINE ('_UDDEIM_SENT_INFO_1', 'Sendte beskjeder blir i Utkurven i ');
DEFINE ('_UDDEIM_SENT_INFO_2', ' dager maksimum før de slettes automatisk.');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_HEAD', 'Vis Innkurv notat for leste beskjeder');
DEFINE ('_UDDEADM_DELETEREADAFTERNOTE_EXP', 'Vis Innkurv notat "Leste beskjeder blir slettet etter n dager"');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_HEAD', 'Vis Innkurv notat for uleste beskjeder');
DEFINE ('_UDDEADM_DELETEUNREADAFTERNOTE_EXP', 'Vis Innkurv notat "Uleste beskjeder blir slettet etter n dager"');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_HEAD', 'Vis Utkurv notat for sendte beskjeder');
DEFINE ('_UDDEADM_DELETESENTAFTERNOTE_EXP', 'Vis Utkurv notat "Uleste beskjeder blir slettet etter n dager"');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_HEAD', 'Vis Papirkurv notat for papirkurv beskjeder');
DEFINE ('_UDDEADM_DELETETRASHAFTERNOTE_EXP', 'Vis Papirkurv notat "Beskjeder i papirkurven blir slettet etter n dager"');
DEFINE ('_UDDEADM_DELETESENTAFTER_HEAD', 'Sendte beskjeder beholdt for (dager)');
DEFINE ('_UDDEADM_DELETESENTAFTER_EXP', 'Enter the number of days until <b>sent</b> messages will automatically be erased from the outbox.');
DEFINE ('_UDDEIM_SEND_TOALLSPECIAL', 'send to all special users');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL', 'Message to <strong>all special users</strong>');
DEFINE ('_UDDEADM_USERSET_SELUSERNAME', '- select username -');
DEFINE ('_UDDEADM_USERSET_SELNAME', '- select name -');
DEFINE ('_UDDEADM_USERSET_EDITSETTINGS', 'Edit user settings');
DEFINE ('_UDDEADM_USERSET_EXISTING', 'existing');
DEFINE ('_UDDEADM_USERSET_NONEXISTING', 'non existing');
DEFINE ('_UDDEADM_USERSET_SELENTRY', '- select entry -');
DEFINE ('_UDDEADM_USERSET_SELNOTIFICATION', '- select notification -');
DEFINE ('_UDDEADM_USERSET_SELPOPUP', '- select popup -');
DEFINE ('_UDDEADM_USERSET_USERNAME', 'Username');
DEFINE ('_UDDEADM_USERSET_NAME', 'Name');
DEFINE ('_UDDEADM_USERSET_NOTIFICATION', 'Notification');
DEFINE ('_UDDEADM_USERSET_POPUP', 'Popup');
DEFINE ('_UDDEADM_USERSET_LASTACCESS', 'Last access');
DEFINE ('_UDDEADM_USERSET_NO', 'No');
DEFINE ('_UDDEADM_USERSET_YES', 'Yes');
DEFINE ('_UDDEADM_USERSET_UNKNOWN', 'unknown');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINEEXCEPT', 'When offline (except replies)');
DEFINE ('_UDDEADM_USERSET_ALWAYSEXCEPT', 'Always (except replies)');
DEFINE ('_UDDEADM_USERSET_WHENOFFLINE', 'When offline');
DEFINE ('_UDDEADM_USERSET_ALWAYS', 'Always');
DEFINE ('_UDDEADM_USERSET_NONOTIFICATION', 'No notification');
DEFINE ('_UDDEADM_WELCOMEMSG', "Welcome to uddeIM!\n\nYou have succesfully installed uddeIM.\n\nTry viewing this message with different templates. You can set them in the administration backend of uddeIM.\n\nuddeIM is a project in development. If you find bugs or weaknesses, please write them to me so that we can make uddeIM better together.\n\nGood luck and have fun!");
DEFINE ('_UDDEADM_UDDEINSTCOMPLETE', 'uddeIM installation complete.');
DEFINE ('_UDDEADM_REVIEWSETTINGS', 'Please continue to the administration backend and review the settings.');
DEFINE ('_UDDEADM_REVIEWLANG', 'If you are running the CMS in a character set other than ISO 8859-1 make sure to adjust the settings accordingly.');
DEFINE ('_UDDEADM_REVIEWEMAILSTOP', 'After installation, all uddeIM email traffic (email notifications, fotgetmenot emails) is disabled so that no emails are sent as long as you are testing. Do not forget to disable "stop email" in the backend when you are finished.');
DEFINE ('_UDDEADM_MAXRECIPIENTS_HEAD', 'Max. recipients');
DEFINE ('_UDDEADM_MAXRECIPIENTS_EXP', 'Max. number of recipients which are allowed per message (0=no limitation)');
DEFINE ('_UDDEIM_TOOMANYRECIPIENTS', 'too many recipients');
DEFINE ('_UDDEIM_STOPPEDEMAIL', 'Sending of emails disabled.');
DEFINE ('_UDDEADM_SEARCHINSTRING_HEAD', 'Inside text searching');
DEFINE ('_UDDEADM_SEARCHINSTRING_EXP', 'Autocompleter searches inside the text (otherwise it searches from the beginning only)');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_HEAD', 'Behavior of "All users" link');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_EXP', 'Choose if the "All users" link should be suppressed, displayed or if always all users should be shown.');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_0', 'Suppress "All Users" link');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_1', 'Show "All Users" link');
DEFINE ('_UDDEADM_MODESHOWALLUSERS_2', 'Always show all users');
DEFINE ('_UDDEADM_CONFIGNOTWRITEABLE', 'Configuration is not writeable:');
DEFINE ('_UDDEADM_CONFIGWRITEABLE', 'Configuration is writeable:');
DEFINE ('_UDDEIM_FORWARDLINK', 'forward');
DEFINE ('_UDDEIM_RECIPIENTFOUND', 'recipient found');
DEFINE ('_UDDEIM_RECIPIENTSFOUND', 'recipients found');
DEFINE ('_UDDEADM_MAILSYSTEM_MOSMAIL', 'mosMail');
DEFINE ('_UDDEADM_MAILSYSTEM_PHPMAIL', 'php mail (default)');
DEFINE ('_UDDEADM_MAILSYSTEM_HEAD', 'Mailsystem');
DEFINE ('_UDDEADM_MAILSYSTEM_EXP', 'Select mailsystem uddeIM should use to send notifications.');
DEFINE ('_UDDEADM_SHOWGROUPS_HEAD', 'Show Joomla groups');
DEFINE ('_UDDEADM_SHOWGROUPS_EXP', 'Show Joomla groups in general message list.');
DEFINE ('_UDDEADM_ALLOWFORWARDS_HEAD', 'Forwarding of messages');
DEFINE ('_UDDEADM_ALLOWFORWARDS_EXP', 'Allow forwarding of messages.');
DEFINE ('_UDDEIM_FWDFROM', 'Original message from');
DEFINE ('_UDDEIM_FWDTO', 'to');

// New: 0.9+
DEFINE ('_UDDEIM_UNARCHIVE', 'Unarchive message');
DEFINE ('_UDDEIM_CANTUNARCHIVE', 'Cannot unarchive message');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD', 'Allow multiple recipients');
DEFINE ('_UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP', 'Allow multiple recipients (comma separated).');
DEFINE ('_UDDEIM_CHARSLEFT', 'characters left');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_HEAD', 'Show text counter');
DEFINE ('_UDDEADM_SHOWTEXTCOUNTER_EXP', 'Shows a text counter which displays how many characters are left.');
DEFINE ('_UDDEIM_CLEAR', 'Clear');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_HEAD', 'Append selected users to recipients');
DEFINE ('_UDDEADM_ALLOWMULTIPLEUSER_EXP', 'This allows selection of multiple recipients from "All users" list.');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_HEAD', 'Append selected connections to recipients');
DEFINE ('_UDDEADM_CBALLOWMULTIPLEUSER_EXP', 'This allows selection of multiple recipients from "CB connections" list.');
DEFINE ('_UDDEADM_PMSFOUND', 'PMS found: ');
DEFINE ('_UDDEIM_ENTERNAME', 'enter a name');
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
DEFINE ('_UDDEIM_TODP', 'To: ');
DEFINE ('_UDDEADM_MAINTENANCE_PRUNE', 'Prune messages now');
DEFINE ('_UDDEADM_SHOWACTIONICONS_HEAD', 'Show action icons');
DEFINE ('_UDDEADM_SHOWACTIONICONS_EXP', 'When set to <i>yes</i>, action links will be displayed with an icon.');
DEFINE ('_UDDEIM_UNCHECKALL', 'uncheck all');
DEFINE ('_UDDEIM_CHECKALL', 'check all');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_HEAD', 'Show bottom icons');
DEFINE ('_UDDEADM_SHOWBOTTOMICONS_EXP', 'When set to <i>yes</i>, bottom links will be displayed with an icon.');
DEFINE ('_UDDEADM_ANIMATED_HEAD', 'Use animated smileys');
DEFINE ('_UDDEADM_ANIMATED_EXP', 'Use animated smileys instead of the static ones.');
DEFINE ('_UDDEADM_ANIMATEDEX_HEAD', 'More animated smileys');
DEFINE ('_UDDEADM_ANIMATEDEX_EXP', 'Show more animated smileys.');
DEFINE ('_UDDEIM_PASSWORDREQ', 'Encrypted message - Password required');
DEFINE ('_UDDEIM_PASSWORD', 'Password required');
DEFINE ('_UDDEIM_PASSWORDBOX', 'Password');
DEFINE ('_UDDEIM_ENCRYPTIONTEXT', ' (encryption text)');
DEFINE ('_UDDEIM_DECRYPTIONTEXT', ' (decryption text)');
DEFINE ('_UDDEIM_MORE', 'MORE');
// uddeIM Module
DEFINE ('_UDDEMODULE_PRIVATEMESSAGES', 'Private Beskjeder');
DEFINE ('_UDDEMODULE_NONEW', 'ingen nye');
DEFINE ('_UDDEMODULE_NEWMESSAGES', 'Nye beskjeder: ');
DEFINE ('_UDDEMODULE_MESSAGE', 'beskjed');
DEFINE ('_UDDEMODULE_MESSAGES', 'beskjeder');
DEFINE ('_UDDEMODULE_YOUHAVE', 'Du har');
DEFINE ('_UDDEMODULE_HELLO', 'Hei');
DEFINE ('_UDDEMODULE_EXPRESSMESSAGE', 'Hurtig beskjed');

// New: 0.7+
DEFINE ('_UDDEADM_USEENCRYPTION', 'Use encryption');
DEFINE ('_UDDEADM_USEENCRYPTIONDESC', 'Encrypt stored messages');
DEFINE ('_UDDEADM_CRYPT0', 'None');
DEFINE ('_UDDEADM_CRYPT1', 'Obfuscate messages');
DEFINE ('_UDDEADM_CRYPT2', 'Encrypt messages');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_HEAD', 'Default for email notification');
DEFINE ('_UDDEADM_NOTIFYDEFAULT_EXP', 'Default value for email notification (for users who have not changed their preferences yet).');
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
DEFINE ('_UDDEADM_CONLISTBOX', 'Connections listbox');
DEFINE ('_UDDEADM_CONLISTBOXDESC', 'Show my connections in a listbox or in a table?');
DEFINE ('_UDDEADM_LISTBOX', 'Listbox');
DEFINE ('_UDDEADM_TABLE', 'Table');

DEFINE ('_UDDEIM_TRASHCAN_INFO_1', 'Meldinger blir i papirkurven i ');
DEFINE ('_UDDEIM_TRASHCAN_INFO_2', ' timer før de slettes. Du kan kun se de første ordene av meldingen. For å lese hele meldingen må den først gjenopprettes.');
DEFINE ('_UDDEIM_RECALLEDMESSAGE_INFO', 'Denne meldingen har blitt trukket tilbake. Den kan nå redigeres og sendes på nytt.');
DEFINE ('_UDDEIM_COULDNOTRECALL', 'Meldingen kunne ikke trekkes tilbake (den er allerede lest eller slettet av mottaker.)');
DEFINE ('_UDDEIM_CANTRESTORE', 'Gjenopprettelse av melding feilet. (Meldingen kan automatisk ha blitt slettet fra papirkurven.)');
DEFINE ('_UDDEIM_COULDNOTRESTORE', 'Gjenopprettelse av melding feilet.');
DEFINE ('_UDDEIM_DONTSEND', 'Ikke send');
DEFINE ('_UDDEIM_SENDAGAIN', 'Send igjen');
DEFINE ('_UDDEIM_NOTLOGGEDIN', 'Du er ikke logget inn.');
DEFINE ('_UDDEIM_NOMESSAGES_INBOX', 'Du har ingen meldinger i innkurven.');
DEFINE ('_UDDEIM_NOMESSAGES_OUTBOX', 'Du har ingen meldinger i utkurven.');
DEFINE ('_UDDEIM_NOMESSAGES_TRASHCAN', 'Du har ingen meldinger i papirkurven.');
DEFINE ('_UDDEIM_INBOX', 'Innkurv');
DEFINE ('_UDDEIM_OUTBOX', 'Utkurv');
DEFINE ('_UDDEIM_TRASHCAN', 'Papirkurv');
DEFINE ('_UDDEIM_CREATE', 'Ny melding');
DEFINE ('_UDDEIM_UDDEIM', 'Private meldinger');
	// this is the headline/name of the component as it appears in Mambo

DEFINE ('_UDDEIM_READSTATUS', 'Lest');
	// as in 'this message has been "read"'

DEFINE ('_UDDEIM_FROM', 'Fra');
DEFINE ('_UDDEIM_FROM_SMALL', 'fra');
DEFINE ('_UDDEIM_TO', 'Til');
DEFINE ('_UDDEIM_TO_SMALL', 'til');
DEFINE ('_UDDEIM_OUTBOX_WARNING', 'Din utkurv inneholder alle meldinger du har sendt, som enda ikke er slettet. Du kan trekke tilbake en melding hvis den ikke er lest av mottakeren. En tilbaketrukket melding kan ikke leses av mottakeren.');
DEFINE ('_UDDEIM_RECALL', 'trekk tilbake');
DEFINE ('_UDDEIM_RECALLTHISMESSAGE', 'Trekk tilbake denne meldingen');
DEFINE ('_UDDEIM_RESTORE', 'gjenopprett');
DEFINE ('_UDDEIM_MESSAGE', 'Melding');
DEFINE ('_UDDEIM_DATE', 'Dato');
DEFINE ('_UDDEIM_DELETED', 'Slettet');
DEFINE ('_UDDEIM_DELETE', 'slett');
DEFINE ('_UDDEIM_DELETELINK', 'slett');
DEFINE ('_UDDEIM_MESSAGENOACCESS', 'Denne meldingen kan ikke vises. <br />Mulige &årsaker:<ul><li>Du har ikke rettigheder til &aring; lese denne meldingen</li><li>Meldingen har blitt slettet</li></ul>');
DEFINE ('_UDDEIM_YOUMOVEDTOTRASH', '<b>Du har flyttet denne meldingen til papirkurven.</b>');
DEFINE ('_UDDEIM_MESSAGEFROM', 'Melding fra ');
DEFINE ('_UDDEIM_MESSAGETO', 'Melding fra deg til ');
DEFINE ('_UDDEIM_REPLY', 'Svar');
DEFINE ('_UDDEIM_SUBMIT', 'Send');
DEFINE ('_UDDEIM_NOMESSAGE', 'Feil: Meldingen er tom! Ingen melding er sendt.');
DEFINE ('_UDDEIM_MESSAGE_REPLIEDTO', 'Svar sendt');
DEFINE ('_UDDEIM_MESSAGE_SENT', 'Melding sendt');
DEFINE ('_UDDEIM_MOVEDTOTRASH', ' og opprinnelig melding er flyttet til papirkurven');
DEFINE ('_UDDEIM_NOSUCHUSER', 'Det finnes ingen bruker med dette brukernavnet!');
DEFINE ('_UDDEIM_NOTTOYOURSELF', 'Det er ikke mulig å sende meldinger til seg selv!');
DEFINE ('_UDDEIM_PRUNELINK', 'Kun administrator: Slett');
DEFINE ('_UDDEIM_BLOCKS', 'Blokkert');
DEFINE ('_UDDEIM_YOUAREBLOCKED', 'Ikke sendt (mottaker har blokkert deg)');
DEFINE ('_UDDEIM_BLOCKNOW', 'blokker&nbsp;bruker');
DEFINE ('_UDDEIM_BLOCKS_EXP', 'Dette er en liste over brukere som du har blokkert. Disse brukerne kan ikke sende private meldinger til deg.');
DEFINE ('_UDDEIM_NOBODYBLOCKED', 'Du har ikke blokkert noen brukere.');
DEFINE ('_UDDEIM_YOUBLOCKED_PRE', 'Du har blokkert for ');
DEFINE ('_UDDEIM_YOUBLOCKED_POST', ' bruker(e).');
DEFINE ('_UDDEIM_UNBLOCKNOW', '[opphev]');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_ON', 'Hvis en blokkert bruker prøver å sende en besked til deg, vil avsender bli informert om at han eller hun er blokkert og at meldingen ikke kan sendes.');
DEFINE ('_UDDEIM_BLOCKALERT_EXP_OFF', 'En bruker kan ikke se hvis han eller hun er blokkert.');
DEFINE ('_UDDEIM_CANTBLOCKADMINS', 'Du kan ikke blokkere administratorer.');
DEFINE ('_UDDEIM_BLOCKSDISABLED', 'Blokkeringssystem er ikke aktiveret');
DEFINE ('_UDDEIM_CANTREPLY', 'Du kan ikke svare på denne meldingen.');
DEFINE ('_UDDEIM_EMNOFF', 'Beskjed via e-post er ikke aktivisert. ');
DEFINE ('_UDDEIM_EMNON', 'Beskjed via e-post er aktivert. ');
DEFINE ('_UDDEIM_SETEMNON', '[aktiver]');
DEFINE ('_UDDEIM_SETEMNOFF', '[slå av]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE', 'Hei %you%,

%user% har sendt en privat melding på %site%.
Logg inn på nettstedet for å lese meldingen!');
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE', 'Hei %you%,

%user% har sendt denne private meldingen på %site%.
Logg inn for å svare!
__________________
%pmessage%
');
DEFINE ('_UDDEIM_EMN_FORGETMENOT', 'Hei %you%,

du har uleste meldinger på %site%.
Logg inn for å lese de!
');
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
===============================================================================%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Det er meldinger til deg på %site%');





DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Lagre feilsendte.');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<strong>Du har ikke lagret noen meldinger enda.</strong>');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Du har lagret ');
DEFINE ('_UDDEIM_ARC_SAVED_2', ' meldinger');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Du har lagret en melding');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'For å lagre meldinger må du først slette noen andre.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Du kan høyst lagre ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' meldinger.');

DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Du har ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' meldinger i');
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'arkivet');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'innkurv');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'innkurv og arkiv');
	// The lines above are to make up a sentence like
	// "You have | 126 | messages in your | inbox and archive"

DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Det maksimalt tillatte antall er ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Du kan fremdeles motta og lese meldinger, men det er ikke mulig å svare på meldinger eller skrive nye meldinger før du sletter noen meldinger.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Lagrede meldinger: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(av maks. ');
	// don't add closing bracket

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Melding lagret');
DEFINE ('_UDDEIM_STORE', 'lagre');
	// translators info: as in: 'store this message in archive now'

DEFINE ('_UDDEIM_BACK', 'tilbake');

DEFINE ('_UDDEIM_TRASHCHECKED', 'slett markerte');
	// translators info: plural! (as in "delete checked" messages)

DEFINE ('_UDDEIM_SHOWALL', 'vis alle');
	// translators example "SHOW ALL messages"

DEFINE ('_UDDEIM_ARCHIVE', 'Arkiv');
	// should be same as _UDDEADM_ARCHIVE

DEFINE ('_UDDEIM_ARCHIVEFULL', 'Arkivet er fullt. Meldingen ble ikke lagret.');

DEFINE ('_UDDEIM_NOMSGSELECTED', 'Ingen melding er valgt.');
DEFINE ('_UDDEIM_THISISACOPY', 'Kopi av melding sendt til ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'kopi til deg selv');
	// as in 'send a "copy to me"' or cc: me

DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'kopi til arkiv');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'slett original');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Hente meldinger');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'E-post med melding er sendt');
DEFINE ('_UDDEIM_EXPORT_NOW', 'send markert melding til deg selv via e-post');
	// as in "send the messages checked above by E-Mail to me"

DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Denne e-posten inkluderer dine private meldinger.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Kunne ikke sende en e-post med meldinger.');

DEFINE ('_UDDEIM_LIMITREACHED', 'Meldingsgrense! Ikke gjenopprettet.');

DEFINE ('_UDDEIM_WRITEMSGTO', 'Skriv melding til ');
	// as in "write a message to" (a person)

// months and weeknames (please translate according
// to your language)
$udde_smon[1]="jan.";
$udde_smon[2]="feb.";
$udde_smon[3]="mar.";
$udde_smon[4]="apr.";
$udde_smon[5]="mai";
$udde_smon[6]="jun.";
$udde_smon[7]="jul.";
$udde_smon[8]="aug.";
$udde_smon[9]="sept.";
$udde_smon[10]="okt.";
$udde_smon[11]="nov.";
$udde_smon[12]="des.";

$udde_lmon[1]="januar";
$udde_lmon[2]="februar";
$udde_lmon[3]="mars";
$udde_lmon[4]="april";
$udde_lmon[5]="mai";
$udde_lmon[6]="juni";
$udde_lmon[7]="juli";
$udde_lmon[8]="august";
$udde_lmon[9]="september";
$udde_lmon[10]="oktober";
$udde_lmon[11]="november";
$udde_lmon[12]="desember";

$udde_lweekday[0]="Søndag";
$udde_lweekday[1]="Mandag";
$udde_lweekday[2]="Tirsdag";
$udde_lweekday[3]="Onsdag";
$udde_lweekday[4]="Torsdag";
$udde_lweekday[5]="Fredag";
$udde_lweekday[6]="Lørdag";

$udde_sweekday[0]="Søn.";
$udde_sweekday[1]="Man.";
$udde_sweekday[2]="Tir.";
$udde_sweekday[3]="Ons.";
$udde_sweekday[4]="Tor.";
$udde_sweekday[5]="Fre.";
$udde_sweekday[6]="Lør.";

// *********************************************************
// the following can remain English
// *********************************************************

DEFINE ('_UDDEIM_NOID', 'Feil: Ingen mottaker-id funnet. Ingen melding sendt.');
DEFINE ('_UDDEIM_REFERAFTERSAVING', 'index.php?option=com_uddeim');
DEFINE ('_UDDEIM_VIOLATION', '<b>Ingen rettigheter!</b> Du har ikke rettigheter til å utføre denne handlingen!');
DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Uventet feil: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Arkiv er ikke aktivisert.');


// *********************************************************
// No translation necessary below this line
// *********************************************************

DEFINE ('_UDDEIM_ONLINEPIC', 'images/icon_online.gif');
DEFINE ('_UDDEIM_OFFLINEPIC', 'images/icon_offline.gif');

// Admin

DEFINE ('_UDDEADM_SETTINGS', 'uddeIM-administrasjon');
DEFINE ('_UDDEADM_GENERAL', 'Generelt');
DEFINE ('_UDDEADM_ABOUT', 'Om');
DEFINE ('_UDDEADM_DATESETTINGS', 'Dato/tid');
DEFINE ('_UDDEADM_PICSETTINGS', 'Ikoner');
DEFINE ('_UDDEADM_DELETEREADAFTER_HEAD', 'Leste meldinger lagres i (dager)');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_HEAD', 'Uleste meldinger lagres i (dager)');
DEFINE ('_UDDEADM_DELETETRASHAFTER_HEAD', 'Meldinger i papirkurven lagres i (dager)');
DEFINE ('_UDDEADM_DAYS', 'dag(er)');
DEFINE ('_UDDEADM_DELETEREADAFTER_EXP', 'Angi antall dager før <b>leste</b> meldinger automatisk slettes fra innkurven. Skal beskeder ikke slettes automatisk, inntastes et høyt tall (f.eks, 36524 dager tilsvarende til et århundrede). Men vurder dette da mange beskeder fyller opp databasen.');
DEFINE ('_UDDEADM_DELETEUNREADAFTER_EXP', 'Angi antall dager før automatisk sletning av beskjeder som mottagere enda <b>ikke har lest</b>.');
DEFINE ('_UDDEADM_DELETETRASHAFTER_EXP', 'Angi antall dager før beskjeder slettes fra papirkurven. Verdier mindre enn 1 kan angis. F.eks: for å slette beskeder fra papirkurven etter tre timer, angis 0.125.');
DEFINE ('_UDDEADM_DATEFORMAT_HEAD', 'Datovisningsformat');
DEFINE ('_UDDEADM_DATEFORMAT_EXP', 'Velg formatet om beskjedens dato og tid  
skal vises med. Måneder forkortes i henhold til dine  
språkinnstillinger i Mambo/CMS (såfremt en matchende uddelM- 
språkfil er tilstede)');
DEFINE ('_UDDEADM_LDATEFORMAT_HEAD', 'Lang datovisning');
DEFINE ('_UDDEADM_LDATEFORMAT_EXP', 'Når beskjeder vises avsettes det mere plass til datoer. Velg dato formatet som skal brukes når en besked åpnes. For ukedag og måneder, brukes standardvisning i henhold til oppsetning av CMS-systemet og tilhørende landespesifikk språkfil til uddeIM.');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_HEAD', 'Sletting avvikles kun av admin');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_YES', 'Ja, kun av administratorer');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_NO', 'Nei, av alm. bruger');
DEFINE ('_UDDEADM_ADMINIGNITIONONLY_EXP', 'Automatiske slettelser belaster servere og databaser. Såfremt du velger <i>Ja,&nbsp;men&nbsp;kun&nbsp;af&nbsp;administratorer</i> 
utføres den automatiske slettelse av alle brukeres beskjeder i henhold til innstillingene herover når en administrator sjekker sine databaser. Velg denne instilling såfremt en administrator tjekker sin indbakke en eller flere gange dagligt - hvilket som regel er tilfellet. (Hvis ditt site har mer enn en administrator, vil det ikke påvirke dette mht hvem, som logger inn idet slettelsen skjer automatisk uansett hvilken av administratorerne, som logger inn.) Velg <i>Nei, av enhver bruker</i> på så eller minimalt administrerede websites hvor administratorerne kun sjeldent sjekker deres databaser. Velg sidstnevnte, hvis du ikke forstår dette punkt eller er i tvil om hva du skal velge.');
DEFINE ('_UDDEADM_ABOUTTEXT', '
<strong>uddeIM Instant Messages (uddeIM)</strong><br />
Instant Messages System for Mambo 4.5.X<br />
Author:         Benjamin Zweifel<br />
Language File:  danish.php<br /> by Michael Jerndorff and Henrik Gregersen
Copyright:      © by Benjamin Zweifel<br />
This is free software and you may redistribute it under the GPL.
uddeIM comes with absolutely no warranty. For details, see the license at
 <a href="http://www.gnu.org/licenses/gpl.txt">www.gnu.org/licenses/gpl.txt</a>.
');
	// replace the translation.php with your language, of course
DEFINE ('_UDDEADM_SAVESETTINGS', 'Lagre innstillinger');
DEFINE ('_UDDEADM_THISHASBEENSAVED', 'Følgende innstillinger er Lagret i konfigurasjonsfilen:');
DEFINE ('_UDDEADM_SETTINGSSAVED', 'Innstillinger er lagret.');
DEFINE ('_UDDEADM_ICONONLINEPIC_HEAD', 'Ikon: Bruker er Pålogget');
DEFINE ('_UDDEADM_ICONONLINEPIC_EXP', 'Angi plassering av ikon, som skal vises ved siden av brukernavnet når brukeren er pålogget.');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_HEAD', 'Ikon: Bruker er offline');
DEFINE ('_UDDEADM_ICONOFFLINEPIC_EXP', 'Angi plassering av ikon, som skal vises ved siden av brukernavnet når brukeren er offline.');
DEFINE ('_UDDEADM_ICONREADPIC_HEAD', 'Ikon: Les besked');
DEFINE ('_UDDEADM_ICONREADPIC_EXP', 'Angi plassering av ikon, som skal vises for funksjonen til lesning av beskjeder.');
DEFINE ('_UDDEADM_ICONUNREADPIC_HEAD', 'Ikon: Ulest beskjed');
DEFINE ('_UDDEADM_ICONUNREADPIC_EXP', 'Angi plassering av ikon, som skal vises for uleste beskjeder.');
DEFINE ('_UDDEADM_MODULENEWMESS_HEAD', 'Modul: Ny Besked-ikon');
DEFINE ('_UDDEADM_MODULENEWMESS_EXP', 'Dette refererer til modulet mod_uddeim_new module. Angi plassering av ikon som dette modul skal vise når det er nye beskjeder.');
DEFINE ('_UDDEADM_UDDEINSTALL', 'uddeIM-installation');
DEFINE ('_UDDEADM_FINISHED', 'Installasjion er avsluttet. Velkommen til uddeIM 0.4 (beta). ');
DEFINE ('_UDDEADM_NOCB', '<span style="color: red;">Mambo Community Builder er ikke installeret. Dette er kravet for å kunne bruke uddeIM.</span><br /><br />Comunity builder kan nedlastes fra <a href="http://www.mambojoe.com">Mambo Community Builder</a>.');
DEFINE ('_UDDEADM_CONTINUE', 'fortsett');
DEFINE ('_UDDEADM_PMSFOUND_1', 'Der er ');
DEFINE ('_UDDEADM_PMSFOUND_2', ' beskeder i din myPMS-installasjon. Skal disse importeres til uddeIM?');
DEFINE ('_UDDEADM_IMPORT_EXP', 'Dette endrer ikke på myPMS-beskjedene eller på din installasjon. Beskjedene forblir i myPMS. Du kan importere beskjedene til uddeIM, selv om du fortsatt vil bruke myPMS. (Lagre innstillingene før du importerer beskjedene!) Eksisterende beskjeder i uddeIM blir beholdt inntakt.');
DEFINE ('_UDDEADM_IMPORT_YES', 'Importer myPMS-beskjeder til uddeIM nå');
DEFINE ('_UDDEADM_IMPORT_NO', 'Nei, ikke importer');
DEFINE ('_UDDEADM_IMPORTING', 'Vent mens beskjedene importeres.');
DEFINE ('_UDDEADM_IMPORTDONE', 'Import av beskjeder fra myPMS avsluttet. Avvikling av installasjonsskriptet igjen, vil dublisere beskjedene.');
DEFINE ('_UDDEADM_IMPORT', 'Importer');
DEFINE ('_UDDEADM_IMPORT_HEADER', 'Importer beskjeder fra myPMS');
DEFINE ('_UDDEADM_PMSNOTFOUND', 'Ingen installasjon av myPMS funnet. Import er ikke mulig.');
DEFINE ('_UDDEADM_ALREADYIMPORTED', '<span style="color: red;">Du har allerede importeret beskjeder fra myPMS i uddeIM.</span>');
DEFINE ('_UDDEADM_BLOCKSYSTEM_HEAD', 'Aktiver blokkeringssystem');
DEFINE ('_UDDEADM_BLOCKSYSTEM_EXP', 'Brukere kan blokkere beskjeder fra andre brukere når systemet er aktivert. Administratorer kan ikke blokkeres.');
DEFINE ('_UDDEADM_BLOCKSYSTEM_YES', 'Ja');
DEFINE ('_UDDEADM_BLOCKSYSTEM_NO', 'Nei');
DEFINE ('_UDDEADM_BLOCKALERT_HEAD', 'Informer avsender om blokkering');
DEFINE ('_UDDEADM_BLOCKALERT_EXP', 'Hvis dette er satt til <i>Ja</i> vil en blokkert bruker få beskjed at han/hun er blokkert når det forsøkes å bli sendt beskjeder. Hvis dette er satt til <i>Nei</i>, blir ikke Brukeren informert om blokkeringen.');
DEFINE ('_UDDEADM_BLOCKALERT_YES', 'Ja');
DEFINE ('_UDDEADM_BLOCKALERT_NO', 'Nei');
DEFINE ('_UDDEADM_DELETIONS', 'Slettinger');
DEFINE ('_UDDEADM_BLOCK', 'Blokkering');
DEFINE ('_UDDEADM_INTEGRATION', 'Integrering');
DEFINE ('_UDDEADM_EMAIL', 'E-mail');
DEFINE ('_UDDEADM_SHOWCBLINK_HEAD', 'Vis CB-links');
DEFINE ('_UDDEADM_SHOWCBLINK_EXP', 'Hvis satt til <i>Ja</i>, vil alle brukernavnene, som bruker uddeIM bli vist som link til deres Community Builder-profil.');
DEFINE ('_UDDEADM_SHOWCBPIC_HEAD', 'Vis CB-profilbilde');
DEFINE ('_UDDEADM_SHOWCBPIC_EXP', 'Hvis satt til <i>Ja</i>, vises profilbildet fra avsenderens Comumunity Builder-profil i beskeden, såfremt et sådant eksisterer.');
DEFINE ('_UDDEADM_SHOWONLINE_HEAD', 'Vis online-status');
DEFINE ('_UDDEADM_SHOWONLINE_EXP', 'Hvis satt til <i>Ja</i>, vises hvert brukernavn med et lite ikon, som viser om brukeren er online. Valg av ikon kan oppsettes under fanebladet Ikoner.');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_HEAD', 'Tillatt e-mail v. ny besked');
DEFINE ('_UDDEADM_ALLOWEMAILNOTIFY_EXP', 'Hvis satt til <i>Ja</i> kan hver bruker velge om man vil ha en e-mail ved ny beskjed i innkurven.');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_HEAD', 'E-mail inneholder beskjeden');
DEFINE ('_UDDEADM_EMAILWITHMESSAGE_EXP', 'Hvis satt til <i>Nei</i>, vil en e-mail ikke inneholde selve beskjeden, men kun informasjon om hvem som har sendt en beskjed, og når.');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_HEAD', 'Glem meg ikke e-mail');
DEFINE ('_UDDEADM_LONGWAITINGEMAIL_EXP', 'Hvis satt til <i>Ja</i> vil en e-mail bli sendt til en bruker, som har hatt en ulest beskjed liggende i innkurven i lengere tid. Denne funksjon er uavhengig av den øvrige e-mailoppsetning.');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_HEAD', 'Send Glem-meg-ikke etter dag(e)');
DEFINE ('_UDDEADM_LONGWAITINGDAYS_EXP', 'Angi hvor mange dager en beskjed må forbli ulest, før det skal sendes en  e-mail til mottageren.');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_HEAD', 'Antall tegn i tittel');
DEFINE ('_UDDEADM_FIRSTWORDSINBOX_EXP', 'Angi hvor mange tegn av beskjeden, som skal vises i innkurven-, utkurven- og papirkurv-oversigterne.');
DEFINE ('_UDDEADM_MAXLENGTH_HEAD', 'Maks. beskedlengde');
DEFINE ('_UDDEADM_MAXLENGTH_EXP', 'Angi hvor mange tegn en beskjed må være. Beskjeden forkortes til dette antall hvis den er lengre. Ønskes intet maksimum settes \'0\'.');
DEFINE ('_UDDEADM_YES', 'Ja');
DEFINE ('_UDDEADM_NO', 'Nei');
DEFINE ('_UDDEADM_ADMINSONLY', 'Kun for administrator');
DEFINE ('_UDDEADM_SYSTEM', 'System');
DEFINE ('_UDDEADM_SYSM_USERNAME_HEAD', 'Brukernavn for systembeskjeder');
DEFINE ('_UDDEADM_SYSM_USERNAME_EXP', 'Det kan avsendes systembeskjeder fra uddeIM. Det er beskjeder uten synlig avsender og de kan ikke besvares. Angi her hvilket brukernavn, som skal anvendes til systembeskjeder (feks. <i>Support</i> eller <i>Webmaster</i>)');
DEFINE ('_UDDEADM_ALLOWTOALL_HEAD', 'Tillatt generelle beskjeder for administratorer');
DEFINE ('_UDDEADM_ALLOWTOALL_EXP', 'Generelle beskjeder sendes til samtlige brukere.');
DEFINE ('_UDDEADM_EMN_SENDERNAME_HEAD', 'E-mail-avsendernavn');
DEFINE ('_UDDEADM_EMN_SENDERNAME_EXP', 'Angi avsendernavn på e-mails. Angi f.eks. hjemmesidens navn');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_HEAD', 'E-mail-avsenderadresse');
DEFINE ('_UDDEADM_EMN_SENDERMAIL_EXP', 'Angi e-mail-adresse hvorfra e-mail sendes.');
DEFINE ('_UDDEADM_VERSION', 'uddeIM-version');
DEFINE ('_UDDEADM_ARCHIVE', 'Arkiv'); // translators info: headline for Archive system
DEFINE ('_UDDEADM_ALLOWARCHIVE_HEAD', 'Aktiver arkiv');
DEFINE ('_UDDEADM_ALLOWARCHIVE_EXP', 'Angi om brukere må lagre beskjeder i et arkiv. Beskjeder i arkivet blir ikke slettet.');
DEFINE ('_UDDEADM_MAXARCHIVE_HEAD', 'Maks. beskjeder i brukers arkiv');
DEFINE ('_UDDEADM_MAXARCHIVE_EXP', 'Angi hvor mange beskjeder en bruker kan ha i sitt arkiv. (Bemerk administratorer har ingen grense).');
DEFINE ('_UDDEADM_COPYTOME_HEAD', 'Tillatt kopier til avsender');
DEFINE ('_UDDEADM_COPYTOME_EXP', 'Tillatter brukere å sende en kopi av beskjeden til seg selv.');
DEFINE ('_UDDEADM_MESSAGES', 'Beskjeder');
DEFINE ('_UDDEADM_TRASHORIGINAL_HEAD', 'Slett original som standard');
DEFINE ('_UDDEADM_TRASHORIGINAL_EXP', 'Hvis aktiveret, vil et avkryssningsfelt \'Slett original\' være plasseret etter \'Send\'-svarknappen. Det vil være markert som standard. Hvis markert vil en beskjed automatisk bli flyttet fra innkurven til papirkurven, såfremt beskjeden besvares. Dette kan spare plass i databasen. Brukerne kan alltid overskrive standardverdien.');
	// translators info: 'Send' is the same as _UDDEIM_SUBMIT,
	// and 'trash original' the same as _UDDEIM_TRASHORIGINAL
DEFINE ('_UDDEADM_PERPAGE_HEAD', 'Beskjeder pr. side');
DEFINE ('_UDDEADM_PERPAGE_EXP', 'Angi hvor mange meldinger, som skal vises i innkurven, utkurven, papirkurven og arkivet pr. side.');
DEFINE ('_UDDEADM_CHARSET_HEAD', 'Brukt tekstkodning');
DEFINE ('_UDDEADM_CHARSET_EXP', 'Såfremt du opplever problemer  
med ikke-latinske tekstkodninger, kan du taste inn den tekstkoding  
som uddelM skal bruke ved konvertering av databaseinnholdet til  
htmlkode her. <b>Unnlat å foreta endringer såfremt du  
ikke vet hva dette betyr!</b>');
DEFINE ('_UDDEADM_MAILCHARSET_HEAD', 'Benyttet e-mail-tekstkoding');
DEFINE ('_UDDEADM_MAILCHARSET_EXP', 'Såfremt du opplever  
problemer med ikke-latinske tekstkodinger, kan du taste inn den  
tekstkoding som uddelM skal bruke ved koding av utgående e- 
mails her. <b>Unnlat å foreta endringer såfremt du  
ikke vet hva dette betyr!</b>');
DEFINE ('_UDDEADM_EMN_BODY_NOMESSAGE_EXP', 'Dette er innholdet av den e-mail, som sendes til brukeren ved ny beskjed, såfremt e-mail er aktiveret. Selve beskjedens innhold taes ikke med i e-mailen. Variablene %you%, %user% og %site% inneholder informasjon omkring avsender, bruker og bør beholdes i e-mailen. ');
DEFINE ('_UDDEADM_EMN_BODY_WITHMESSAGE_EXP', 'Dette er indholdet af den e-mail, der sendes til brugeren ved ny besked, hvis e-mail er aktiveret. E-mailen vil også kunne innholde selve beskjeden. Variablerne %you%, %user% og %site% inneholder informasjon omkring avsender og bruker og variablen %pmessage% selve beskjeden.');
DEFINE ('_UDDEADM_EMN_FORGETMENOT_EXP', 'Dette er innholdet av Ikke-Glem-Meg-e-mailen, som sendes hvis det er aktivert og en bruker ikke har reageret på en beskjed. Variablerne %you% and %site% inneholder mottaker- og avsenderinformasjon. ');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_EXP', 'Tillat brukere å hente meldinger fra deres arkiv, ved å sende dem som e-mail til seg selv.');
DEFINE ('_UDDEADM_ENABLEDOWNLOAD_HEAD', 'Tillat besked-download');
DEFINE ('_UDDEADM_EXPORT_FORMAT_EXP', 'Dette er formatet av den e-mail en bruker vil mottar ved download av meldinger fra brukers arkiv. Variablerne %user%, %msgdate% og %msgbody% bør beholdes i formatet.');
		// translators info: Don't translate %you%, %user%, etc. in the strings above.
DEFINE ('_UDDEADM_INBOXLIMIT_HEAD', 'Medtag database i arkivstørrelse');
DEFINE ('_UDDEADM_INBOXLIMIT_EXP', 'Du kan inkludere arkivstørrelsen til også å gjelde databasen. Overskrides antallet vil brukere forsatt kunne motta, men vil ikke kunne skrive nye meldinger før, det slettes eksisterende meldinger.');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_HEAD', 'Vis beskedstørrelse');
DEFINE ('_UDDEADM_SHOWINBOXLIMIT_EXP', 'Viser hvor mange meldinger en bruker har lagret samt hvor mange det er plass til i en linje under databasen.');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INTRO', 'Du har deaktiveret arkivet. Hva skal skje med de meldinger, som befinner seg i arkivet?');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_LINK', 'Behold dem');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_LEAVE_EXP', 'Behold dem i arkivet (brukeren vil ikke kunne bruke meldingene, og de taes stadig i beskjed postkassens størrelse).');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_LINK', 'Flytt til databasen');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_DONE', 'Arkiverede meldinger er flyttet til databasen');
DEFINE ('_UDDEADM_ARCHIVETOTRASH_INBOX_EXP', 'meldinger vil bli flyttet til brukernes database (eller til papirkurven hvis de er eldre enn det tillate for databasen).');


// 0.4 frontend, but visible admins only (no translation necessary)

DEFINE ('_UDDEIM_SEND_ASSYSM', 'send som system beskjed (mottagere kan ikke svare på beskjeden)');
DEFINE ('_UDDEIM_SEND_TOALL', 'send til alle brukere');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'send til alle administratorer');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'send til alle online brukere');
DEFINE ('_UDDEIM_VALIDFOR_1', 'gyldig i ');
DEFINE ('_UDDEIM_VALIDFOR_2', ' timer. 0 = for evigt (automatiske sletninger gjelder)');
DEFINE ('_UDDEIM_WRITE_SYSM_GM', '[Opprett system eller generel beskjed]');
DEFINE ('_UDDEIM_WRITE_NORMAL', '[Opprett en normal (standard) beskjed]');
DEFINE ('_UDDEIM_NOTALLOWED_SYSM_GM', 'System- og generelle meldinger er ikke tillatt.');
DEFINE ('_UDDEIM_SYSGM_TYPE', 'Meldingstype');
DEFINE ('_UDDEIM_HELPON_SYSGM', 'Hjelp vedr. systemmeldinger');
DEFINE ('_UDDEIM_HELPON_SYSGM_2', '(vises i et nytt vindu)');

DEFINE ('_UDDEIM_SYSGM_PLEASECONFIRM', 'Du er ved å sende den viste melding. Er du sikker, ellers avbryt!');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALL', 'melding til <strong>alle brukere</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLADMINS', 'melding til <strong>alle administratorer</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDTOALLLOGGED', 'melding til <strong>alle online-brukere</strong>');
DEFINE ('_UDDEIM_SYSGM_WILLDISABLEREPLY', 'Mottager vil ikke kunne besvare denne melding.');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_1', 'melding blir sendt med brukernavnet <strong>');
DEFINE ('_UDDEIM_SYSGM_WILLSENDAS_2', '</strong> som avsender');

DEFINE ('_UDDEIM_SYSGM_WILLEXPIRE', 'melding utløper ');
DEFINE ('_UDDEIM_SYSGM_WILLNOTEXPIRE', 'melding utløper ikke');
DEFINE ('_UDDEIM_SYSGM_CHECKLINK', '<b>Kontroller link (ved at klikke på det) før du fortsetter!</b>');
DEFINE ('_UDDEIM_SYSGM_SHORTHELP', 'Bruk <strong>kun for systemmeldinger</strong>:<br /> [b]<strong>fett</strong>[/b] [i]<em>kursiv</em>[/i]<br />
[url=http://www.sexhibition.no]Et eller annet[/url] eller [url]http://www.sexhibition.no[/url] som link<br />
Bruk [newurl] [/newurl] vis innhold ved klikk skal åpnes i et nytt vindu.');
DEFINE ('_UDDEIM_SYSGM_ERRORNORECIPS', 'Feil: Ingen mottaker funnet. meldingen er ikke sendt.');

DEFINE ('_UDDEIM_CANTREPLY', 'Du kan ikke svare på denne beskjeden.');
DEFINE ('_UDDEIM_EMNOFF', 'E-mail varsling er av. ');
DEFINE ('_UDDEIM_EMNON', 'E-mail varsling er på. ');
DEFINE ('_UDDEIM_SETEMNON', '[turn it on]');
DEFINE ('_UDDEIM_SETEMNOFF', '[turn it off]');
DEFINE ('_UDDEIM_EMN_BODY_NOMESSAGE',
"Hei %you%,\n\n%user% har sendt deg en Privat Beskjed hos %site%. Vennligst login for å lese den\n\n%livesite%");
DEFINE ('_UDDEIM_EMN_BODY_WITHMESSAGE',
"Hei %you%,\n\n%user% har sendt deg en Privat Beskjed hos %site%. Vennligst login for å svare!\n\n%livesite%\n__________________\n%pmessage%");
DEFINE ('_UDDEIM_EMN_FORGETMENOT',
"Hei %you%,\n\ndu har uleste Private Beskjeder hos %site%. Vennligst login for å lese de!\n\n%livesite%");
DEFINE ('_UDDEIM_EXPORT_FORMAT', '
================================================================================
%user% (%msgdate%)
----------------------------------------
%msgbody%
================================================================================');
DEFINE ('_UDDEIM_EMN_SUBJECT', 'Du har beskjeder hos %site%');
DEFINE ('_UDDEIM_SEND_ASSYSM', 'sendt som systembeskjed (=recipients cannot reply)');
DEFINE ('_UDDEIM_SEND_TOALL', 'send til alle brukere');
DEFINE ('_UDDEIM_SEND_TOALLADMINS', 'send til alle admins');
DEFINE ('_UDDEIM_SEND_TOALLLOGGED', 'send til alle online brukere');

DEFINE ('_UDDEIM_UNEXPECTEDERROR_QUIT', 'Uventet feil: ');
DEFINE ('_UDDEIM_ARCHIVENOTENABLED', 'Arkiv er ikke aktivisert.');
DEFINE ('_UDDEIM_ARCHIVE_ERROR', 'Lagring til arkiv feilet.');
DEFINE ('_UDDEIM_ARC_SAVED_1', 'Du har lagret ');
DEFINE ('_UDDEIM_ARC_SAVED_NONE', '<b>Du har ikke lagret beskjeder til arkivet enda.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_NONE_2', '<b>Du har ingen beskjeder i arkivet.</b>'); 
DEFINE ('_UDDEIM_ARC_SAVED_2', ' beskjeder');
DEFINE ('_UDDEIM_ARC_SAVED_ONE', 'Du har lagret en beskjed');
DEFINE ('_UDDEIM_ARC_SAVED_3', 'For å lagre nye beskjeder må du først slette noen beskjeder.');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_1', 'Du kan lagre en maksimum av ');
DEFINE ('_UDDEIM_ARC_CANSAVEMAX_2', ' beskjeder.');
DEFINE ('_UDDEIM_INBOX_LIMIT_1', 'Du har ');
DEFINE ('_UDDEIM_INBOX_LIMIT_2', ' beskjeder i din');
DEFINE ('_UDDEIM_INBOX_LIMIT_2_SINGULAR', ' beskjed i din'); // same as _UDDEIM_INBOX_LIMIT_2, but singular (as in one "message in your")
DEFINE ('_UDDEIM_ARC_UNIVERSE_ARC', 'arkiv');
DEFINE ('_UDDEIM_ARC_UNIVERSE_INBOX', 'innkurv');
DEFINE ('_UDDEIM_ARC_UNIVERSE_BOTH', 'innkurv og arkiv');
DEFINE ('_UDDEIM_INBOX_LIMIT_3', 'Maksimum tillatt er ');
DEFINE ('_UDDEIM_INBOX_LIMIT_4', 'Du kan forsatt motta og lese beskjeder, men du vil ikke kunne besvare eller skrive nye beskjeder før du har slettet noen beskjeder først.');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_1', 'Beskjeder lagret: ');
DEFINE ('_UDDEIM_SHOWINBOXLIMIT_2', '(av maks. ');

DEFINE ('_UDDEIM_MESSAGE_ARCHIVED', 'Beskjed lagret til arkiv.');
DEFINE ('_UDDEIM_STORE', 'arkiv');				// translators info: as in: 'store this message in archive now'
DEFINE ('_UDDEIM_BACK', 'bak');
DEFINE ('_UDDEIM_TRASHCHECKED', 'Sletting bekreftet');	// translators info: plural!
DEFINE ('_UDDEIM_SHOWALL', 'vis alle');				// translators example "SHOW ALL messages"
DEFINE ('_UDDEIM_ARCHIVE', 'Arkiv');				// should be same as _UDDEADM_ARCHIVE
	
DEFINE ('_UDDEIM_ARCHIVEFULL', 'Arkiv full. Lagringsfeil.');	
	
DEFINE ('_UDDEIM_NOMSGSELECTED', 'Ingen beskjeder valgt.');
DEFINE ('_UDDEIM_THISISACOPY', 'Kopi av beskjed du har sendt til ');
DEFINE ('_UDDEIM_SENDCOPYTOME', 'kopi til meg');
DEFINE ('_UDDEIM_SENDCOPYTOARCHIVE', 'kopi til arkiv');
DEFINE ('_UDDEIM_TRASHORIGINAL', 'slett orginalen');

DEFINE ('_UDDEIM_MESSAGEDOWNLOAD', 'Nedlast Beskjed');
DEFINE ('_UDDEIM_EXPORT_MAILED', 'E-mail med eksportert beskjed sendt');
DEFINE ('_UDDEIM_EXPORT_NOW', 'e-mail beskreftet til meg');
DEFINE ('_UDDEIM_EXPORT_MAIL_INTRO', 'Mailen inkluderer Privat Beskjeden din.');
DEFINE ('_UDDEIM_EXPORT_COULDNOTSEND', 'Kunne ikke sende e-mail med Beskjeder.');
DEFINE ('_UDDEIM_LIMITREACHED', 'Beskjed grense nådd! Resirkuler ikke mulig.');
DEFINE ('_UDDEIM_WRITEMSGTO', 'Skriv Beskjed til ');

$udde_smon[1]="Jan";
$udde_smon[2]="Feb";
$udde_smon[3]="Mar";
$udde_smon[4]="Apr";
$udde_smon[5]="Mai";
$udde_smon[6]="Jun";
$udde_smon[7]="Jul";
$udde_smon[8]="Aug";
$udde_smon[9]="Sep";
$udde_smon[10]="Okt";
$udde_smon[11]="Nov";
$udde_smon[12]="Des";

$udde_lmon[1]="Januar";
$udde_lmon[2]="Februar";
$udde_lmon[3]="Mars";
$udde_lmon[4]="April";
$udde_lmon[5]="Mai";
$udde_lmon[6]="Juni";
$udde_lmon[7]="Juli";
$udde_lmon[8]="August";
$udde_lmon[9]="September";
$udde_lmon[10]="Oktober";
$udde_lmon[11]="November";
$udde_lmon[12]="Desember";

$udde_lweekday[0]="Søndag";
$udde_lweekday[1]="Mandag";
$udde_lweekday[2]="Tirsdag";
$udde_lweekday[3]="Onsdag";
$udde_lweekday[4]="Torsdag";
$udde_lweekday[5]="Fredag";
$udde_lweekday[6]="Lørdag";

$udde_sweekday[0]="Søn";
$udde_sweekday[1]="Mon";
$udde_sweekday[2]="Tir";
$udde_sweekday[3]="Ons";
$udde_sweekday[4]="Tor";
$udde_sweekday[5]="Fre";
$udde_sweekday[6]="Lør";

// new in 0.5 ADMIN

DEFINE ('_UDDEADM_TEMPLATEDIR_HEAD', 'uddeIM Template');
DEFINE ('_UDDEADM_TEMPLATEDIR_EXP', 'Choose the template you want uddeIM to use');
DEFINE ('_UDDEADM_SHOWCONNEX_HEAD', 'Show connections');
DEFINE ('_UDDEADM_SHOWCONNEX_EXP', 'Use <b>yes</b> if you have CB/CBE/JS installed and want to display the user\'s connections on the compose new message page.');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_HEAD', 'Show settings');
DEFINE ('_UDDEADM_SHOWSETTINGSLINK_EXP', 'The settings link appears automatically in uddeIM if you have e-mail notification or the blocking system activated. You can specify its position and you can turn it off completely.');
DEFINE ('_UDDEADM_SHOWSETTINGS_ATBOTTOM', 'yes, at bottom');
DEFINE ('_UDDEADM_ALLOWBB_HEAD', 'Allow BB code tags');
DEFINE ('_UDDEADM_FONTFORMATONLY', 'font formats only');
DEFINE ('_UDDEADM_ALLOWBB_EXP', 'Use <b>font formats only</b> to allow users to use the BB code tags for bold, italic, underline, font color and font size. When you set this option to <b>yes</b>, users are allowed to use <b>all</b> supported BB code tags (e.g. links and images).');
DEFINE ('_UDDEADM_ALLOWSMILE_HEAD', 'Allow Emoticons');
DEFINE ('_UDDEADM_ALLOWSMILE_EXP', 'When set to <b>yes</b>, emoticon codes like :-) are replaced with emoticon graphics in message display.');
DEFINE ('_UDDEADM_DISPLAY', 'Display');
DEFINE ('_UDDEADM_SHOWMENUICONS_HEAD', 'Show menu icons');
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

DEFINE ('_UDDEIM_SHOWUSERS', 'Vis Brukere');
DEFINE ('_UDDEIM_CONNECTIONS', 'Venner');
DEFINE ('_UDDEIM_SETTINGS', 'Innstillinger');
DEFINE ('_UDDEIM_NOSETTINGS', 'Det er ingen innstillinger.');
DEFINE ('_UDDEIM_ABOUT', 'Om'); // as in "About uddeIM"
DEFINE ('_UDDEIM_COMPOSE', 'Ny Beskjed'); // as in "write new message", but only one word
DEFINE ('_UDDEIM_EMN', 'E-mail varsling');
DEFINE ('_UDDEIM_EMN_EXP', 'Motta e-mail varsling om nye Beskjeder.');
DEFINE ('_UDDEIM_EMN_ALWAYS', 'E-mail varsling om nye Beskjeder');
DEFINE ('_UDDEIM_EMN_NONE', 'Ingen e-mail varsling');
DEFINE ('_UDDEIM_EMN_WHENOFFLINE', 'E-mail varsling når du er Offline');
DEFINE ('_UDDEIM_EMN_NOTONREPLY', 'Ikke send varsling om svar');
DEFINE ('_UDDEIM_BLOCKSYSTEM', 'Bruker blokkering'); // Headline for blocking system in settings
DEFINE ('_UDDEIM_BLOCKSYSTEM_EXP', 'Du kan hindre andre Brukere fra å sende Beskjeder til deg. Velg <b>blokker Bruker</b> når du leser en Beskjed fra den bestemte Brukeren.'); // block user is the same as _UDDEIM_BLOCKNOW
DEFINE ('_UDDEIM_SAVECHANGE', 'Lagre endring');
DEFINE ('_UDDEIM_TOOLTIP_BOLD', 'BB koder som ordner FETT skrift. Bruk: [b]fett[/b]');
DEFINE ('_UDDEIM_TOOLTIP_ITALIC', 'BB koder som ordner KURSIV skrift. Bruk: [i]kursiv[/i]');
DEFINE ('_UDDEIM_TOOLTIP_UNDERLINE', 'BB koder som ordner UNDERSTREKET skrift. Bruk: [u]understrek[/u]');
DEFINE ('_UDDEIM_TOOLTIP_COLORRED', 'BB koder som ordner FARGET skrift. Bruk: [color=#XXXXXX]farget[/color] hvor XXXXXX er hex koden for den bestemte fargen du ønsker, eks FF0000 for rød.');
DEFINE ('_UDDEIM_TOOLTIP_COLORGREEN', 'BB koder som ordner FARGET skrift. Bruk: [color=#XXXXXX]farget[/color] hvor XXXXXX er hex koden for den bestemte fargen du ønsker, eks 00FF00 for grønn.');
DEFINE ('_UDDEIM_TOOLTIP_COLORBLUE', 'BB koder som ordner FARGET skrift. Bruk: [color=#XXXXXX]farget[/color] hvor XXXXXX er hex koden for den bestemte fargen du ønsker, eks 0000FF for blå.');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE1', 'BB koder som ordner meget liten skrift. Bruk: [size=1]Meget liten skrift.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE2', 'BB koder som ordner liten skrift. Bruk: [size=2]Liten skrift.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE4', 'BB koder som ordner stor skrift. Bruk: [size=4]Stor skrift.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_FONTSIZE5', 'BB koder som ordner meget stor skrift. Bruk: [size=5]Meget stor skrift.[/size]');
DEFINE ('_UDDEIM_TOOLTIP_IMAGE', 'BB koder som ordner lenker til bilder. Bruk: [img]Bilde-URL[/img]');
DEFINE ('_UDDEIM_TOOLTIP_URL', 'BB koder som ordner hyperlink. Bruk: [url]web adresse[/url]. Husk http:// i starten.');
DEFINE ('_UDDEIM_TOOLTIP_CLOSEALLTAGS', 'Lukk alle åpne BB koder.');
