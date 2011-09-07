<?php
/**
* @version $Id: kunena.italian.php 770 2010-08-08 by Travelling.it $
* Based on the initial @version $Id: kunena.italian.php 764 2009-05-18 14:45:45Z Gioacchino $
* Kunena Component
* @package Kunena
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
//  u= &ugrave;   e= &egrave;   i= &igrave; a= &agrave;  o= &ograve;  '= \'

// Dont allow direct linking
defined( '_JEXEC' ) or defined ('_VALID_MOS') or die('Restricted access');

// 1.5.12
define('_COM_A_URLLENGHT','Max lunghezza per links url e immagini');
define('_COM_A_URLLENGHT_DESC','Max lunghezza per links url e immagini nel campo imput nella boardcode editor');
define('COM_KUNENA_BBCODE_CONFIDENTIAL_TEXT','Informazioni confidenziali:');
define('_KUNENA_CATEGORY_ORPHAN','ORPFANO');
define('_KUNENA_CATEGORY_ORPHAN_DESC','Le tue categorie sono vuote oppure orfane! Cambia le relative categorie per validarle.');
define('_KUNENA_SECTION','Sezione');
define('_KUNENA_NOBODY','Nobody');
// Disable userlist
define('_USERLIST_DISABLED','La lista utenti &egrave; stata disabilitata, non puoi accedere');
define('_KUNENA_ADMIN_CONFIG_USERLIST_ENABLE','Abilita la lista utenti');
define('_KUNENA_ADMIN_CONFIG_USERLIST_ENABLE_DESC','Imposta la lista utenti attiva o disattiva se non vuoi utilizzarla');
// Anonymous posting
define('_KUNENA_CATEGORY_ANONYMOUS',"Anonimo");
define('_KUNENA_CATEGORY_ANONYMOUS_ALLOW',"Abilita messaggi anonimi");
define('_KUNENA_CATEGORY_ANONYMOUS_ALLOW_DESC',"Messaggi anonimi possono essere utilizzati da utenti registrati per postare informazioni sensibili inquesta categoria: <b>Nessuna informazione relativa all\'utente</b> verr&agrave; salvata nei messaggi anonimi (indirizzo IP incluso).");
define('_KUNENA_CATEGORY_ANONYMOUS_DEFAULT',"Per default posta risposte come");
define('_KUNENA_CATEGORY_ANONYMOUS_DEFAULT_DESC',"Se i messagi anonimi sono stati abilitati, questa opzione selezione la scelta di default per l\'utente. Gli utenti registrati possono editare successivamente i loro messagi in anonimi, ma solo i moderatori hanno la facolt&agrave; di editare post anonimi.");
define('_KUNENA_CATEGORY_ANONYMOUS_X_REG',"Utenti registrati");
define('_KUNENA_CATEGORY_ANONYMOUS_X_ANO',"Utenti anonimi");
define('_KUNENA_POST_AS_ANONYMOUS',"Post anonimo");
define('_KUNENA_POST_AS_ANONYMOUS_DESC',"Questo post contiene informazioni sensibili. Rimuovi tutte le informazioni utente da questo post.");
define('_KUNENA_POST_ERROR_NO_CATEGORY',"Nessuna categoria selezionata.");
define('_KUNENA_POST_ERROR_IS_SECTION',"Non sei autorizzato a postare messaggi in questa sezione.");
define('_KUNENA_POST_ERROR_ANONYMOUS_FORBITTEN',"Questa categoria non permette di scrivere post anonimi. Per garantire la tua privacy, il messaggio non &egrave; stato inviato.");
define('_KUNENA_USERNAME_ANONYMOUS',"Anonimo");
DEFINE('_POST_ABOUT_DELETE', '<strong>NOTE:</strong><br/>
-se cancelli un Forum Principale (il primo post all\'interno di un thread) tutti i relativi post saranno cancellati!');
// Hide image/attachments for unregistred users
define('_COM_A_SHOWIMGFORGUEST', 'Visibilit&agrave; delle immagini per gli utenti non registrati');
define('_COM_A_SHOWIMGFORGUEST_DESC', 'Seleziona se vuoi mostrare o nascondere le immagini allegate agli utenti non registrati.');
define('_KUNENA_BBCODE_HIDEIMG', 'Questa immagine &egrave; nascosta agli utenti non registrati. Si prega di fare il login o la registrazione per vederla.');
define('_COM_A_SHOWFILEFORGUEST', 'Visibilit&agrave; degli allegati agli utenti non registrati');
define('_COM_A_SHOWFILEFORGUEST_DESC', 'Seleziona se vuoi mostrare o nascondere gli allegati agli utenti non registrati.');
define('_KUNENA_BBCODE_HIDEFILE', 'Questo allegato &egrave; nascosto agli utenti non registrati. Si prega di fare il login o la registrazione per vederlo.');
DEFINE('_COM_A_HIDE', 'Nascondi');
DEFINE('_COM_A_SHOW', 'Mostra');
DEFINE('_KUNENA_LANGUAGE_DIRECTORY_NOT_PRESENT', 'Controlla se hai nel tuo template una directory con lo stesso nome della lingua di default del tuo sistema');

// 1.5.10
DEFINE('_KUNENA_PARENTDESC', 'Nota: Per creare una categoria, scegli<em>Massimo Livello Categoria</em> come prossimo livello. Una categoria serve come raccoglitore per forum.<br />Un forum pu&ograve; solo essere creato all\'interno di una categoria selezionando una categoria esistente dal forum.<br /> I messaggi possono essere postati solo nei forum e non nelle categorie.');
DEFINE('_KUNENA_ADMIN', 'Amministrazione Forum');
DEFINE('_KUNENA_NOTEUS', 'Nota: Qui sono elencati solo i moderatori. Per aggiungere un moderatore, vai su <a href="index.php?option=com_kunena&task=profiles">Amministrazione Utenti</a>. Cerca l\'utente che desideri modificare in moderatore, e aggiorna il suo profilo aggiungendo il flag moderatore. Solo l\'amministratore pu&ograve; nominare moderatori.');
DEFINE('_KUNENA_SHOW_AVATAR_ON_CAT_DESC', 'Imposta a <em>SI</em> se vuoi mostrare gli avatars nella vista categoria, discussioni recenti e le mie discussioni.');
DEFINE('_KUNENA_SHOW_AVATAR_ON_CAT', 'Mostra avatars nella vista categoria, discussioni recenti e le mie discussioni?');
DEFINE('_KUNENA_SORTID', 'Ordina per UserID');
DEFINE('_KUNENA_SORTMOD', 'Ordina per Moderatore');
DEFINE('_KUNENA_SORTNAME', 'Ordina per Nome');
DEFINE('_KUNENA_SORTREALNAME', 'Ordina per Nome Reale');
define('_KUNENA_PDF_NOT_GENERATED_MESSAGE_DELETED', 'Il file PDF non pu&ograve; essere generato.');
//Hide IP
define('_KUNENA_COM_A_HIDE_IP', 'Nascondi gli indirizzi IP dei moderatori.');
define('_KUNENA_COM_A_HIDE_IP_DESC', 'Nascondi l\'indirizzo IP nei messaggi dei moderatori e mostra gli IP solo ad amministratori.');
//JomSocial Activity Stream Integration disable/enable
define('_COM_A_JS_ACTIVITYSTREAM_INTEGRATION', 'Abilita l\'integrazione con JomSocial Activity Stream');
define('_COM_A_JS_ACTIVITYSTREAM_INTEGRATION_DESC', 'The activity stream sul JomSocial mostra l\'ultimo messaggio o topic che &egrave; stato postato in Kunena.');
// Email
define('_KUNENA_EMAIL_INVALID', 'Il forum ha provato ad inviare una email ad un indirizzo email non valido. Contattare un amministratore!');
define('_KUNENA_MY_EMAIL_INVALID', 'Il tuo indirizzo email non &egrave; valido. Un indirizzo email valido &egrave; richiesto per aggiungere post in questo forum!');


// 1.5.8

define('_KUNENA_USRL_REALNAME', 'Nome Reale');
define('_KUNENA_USRL_NAME', 'Nome Utente');
define('_KUNENA_SEO_SETTINGS', 'Impostazioni SEO');
define('_KUNENA_SEF', 'Search Engine Friendly URLs');
define('_KUNENA_SEF_DESC', 'Seleziona se le URLs sono ottimizzate per i motori di ricerca. NOTA: Kunena accetta SEF URLs anche se questa funzione e stata disabilitata.');
define('_KUNENA_SEF_CATS', 'Non utilizzare Category IDs');
// Please use words from your own (or nearby) language in the next URL, but only using a-z:
define('_KUNENA_SEF_CATS_DESC', 'Leggermente meglio URLs: http://www.domain.com/forum/category/123-message . ATTENZIONE: Se impostato su "No", Kunena non accetter&agrave; pi&ugrave; queste URLs!');
define('_KUNENA_SEF_UTF8', 'Abilita il supporto per UTF8');
// Please use words from your own (or nearby) language in the next URL, but make sure that they contain UTF8 letters:
define('_KUNENA_SEF_UTF8_DESC', 'Usa questa opzione se le tue SEF URLs non sono leggibili. Risultato: http://www.domain.com/forum/2-CatÃ©gorie/123-MeÃŸage . NOTA: Kunena accetta UTF8 URLs anche se questa funziona &egrave; stata disabilitata.');
define('_KUNENA_SYNC_USERS_OPTIONS', 'Opzioni');
define('_KUNENA_SYNC_USERS_CACHE', 'Cancella la cache');
define('_KUNENA_SYNC_USERS_CACHE_DESC', 'Questa funzione permette di vedere i forum nascosti, se si cambia gruppo in Joomla (Registered, Author etc).');
define('_KUNENA_SYNC_USERS_ADD', 'Aggiungi profilo a tutti');
define('_KUNENA_SYNC_USERS_ADD_DESC', 'Kunena aggiunge nuovi profili utente solo se gli utenti entrano nel forum. Questa funzione e di default per tutti i profili esistenti.');
define('_KUNENA_SYNC_USERS_DEL', 'Cancella profili da utenti rimossi');
define('_KUNENA_SYNC_USERS_DEL_DESC', 'Kunena non cancella profili da utenti rimossi, semplicemente li nasconde. Questa opzione ti permette di cancellare tutti i profili rimossi.');
define('_KUNENA_SYNC_USERS_RENAME', 'Aggiorna i nomi nei messaggi');
define('_KUNENA_SYNC_USERS_RENAME_DESC', 'Questa opzione cancellera tutti i nomi degli autori, dipendentemente dalla tua configurazione di Kunena.');
define('_KUNENA_SYNC_USERS_DO_CACHE', 'Cache utente cancellata');
define('_KUNENA_SYNC_USERS_DO_ADD', 'Profilo utente aggiunto:');
define('_KUNENA_SYNC_USERS_DO_DEL', 'Profilo utente rimosso:');
define('_KUNENA_SYNC_USERS_DO_RENAME', 'Messaggio aggiornato:');


// 1.5.7

define('_KUNENA_JS_ACTIVITYSTREAM_CREATE_MSG1', 'crea nuovo topic');
define('_KUNENA_JS_ACTIVITYSTREAM_CREATE_MSG2', 'nei forums.');
define('_KUNENA_JS_ACTIVITYSTREAM_REPLY_MSG1', 'rispondi al topic');
define('_KUNENA_JS_ACTIVITYSTREAM_REPLY_MSG2', 'nei forums.');

define('_KUNENA_AUP_ALPHAUSERPOINTS', 'AlphaUserPoints');
define('_KUNENA_AUP_ENABLED_POINTS_IN_PROFILE', 'Abilita Points nel profilo');
define('_KUNENA_AUP_ENABLED_POINTS_IN_PROFILE_DESC', 'Se hai AlphaUserPoints installato, puoi configurare Kunena per mostrare un i punti correnti nei loro profili.');
define('_KUNENA_AUP_ENABLED_RULES', 'Abilita regole per Points');
define('_KUNENA_AUP_ENABLED_RULES_DESC', 'Puoi utilizzare le regole preinstallate in AlphaUserPoints per assegnare punti ai nuovi topics e risposte. Devi avere AlphaUserPoints 1.5.3 o successivo installato. Se hai una vecchia versione, hai bisogno di installare manualmente le regole.');
define('_KUNENA_AUP_MINIMUM_POINTS_ON_REPLY', 'Minimo caratteri nelle risposte');
define('_KUNENA_AUP_MINIMUM_POINTS_ON_REPLY_DESC', 'Minimo caratteri nelle risposte per guadagnare punti.');
define('_KUNENA_AUP_MESSAGE_TOO_SHORT', 'La tua risposta era troppo corta per ricevere punti.');
define('_KUNENA_AUP_POINTS', 'Points:');

// 1.0.11 and 1.5.4
DEFINE('_KUNENA_MOVED', 'Spostato');

// 1.0.11 and 1.5.3

DEFINE('_KUNENA_VERSION_SVN', 'Revisione SVN ');
DEFINE('_KUNENA_VERSION_DEV', 'Development Snapshot');
DEFINE('_KUNENA_VERSION_ALPHA', 'Alpha Release');
DEFINE('_KUNENA_VERSION_BETA', 'Beta Release');
DEFINE('_KUNENA_VERSION_RC', 'Release Candidate');
DEFINE('_KUNENA_VERSION_INSTALLED', 'La versione installata di Kunena %s (%s).');
DEFINE('_KUNENA_VERSION_SVN_WARNING', 'Non usare mai una versione SVN se non per lo sviluppo');
DEFINE('_KUNENA_VERSION_DEV_WARNING', 'Questa release interna dovrebbe essere utilizzata soltanto da sviluppatori e testers');
DEFINE('_KUNENA_VERSION_ALPHA_WARNING', 'Questa versione non dovrebbe essere utilizzata su siti in produzione.');
DEFINE('_KUNENA_VERSION_BETA_WARNING', 'Questa release &egrave; sconsigliata per siti in produzione.');	
DEFINE('_KUNENA_VERSION_RC_WARNING', 'Questa release potrebbe contenere bugs ed errori, che saranno corretti nella versione finale.');	
DEFINE('_KUNENA_ERROR_UPGRADE', 'L\' Upgrade di Kunena alla versione %s non e stato completato');
DEFINE('_KUNENA_ERROR_UPGRADE_WARN', 'Il tuo forum potrebbe non avere importanti aggiornamenti.');
DEFINE('_KUNENA_ERROR_UPGRADE_AGAIN', 'Prova di nuovo a fare l\' upgade. Se non riesci a fare l\' upgrade alla versione Kunena %s, puoi facilmente fare un  downgrade all\' ultima versione funzionante.');
DEFINE('_KUNENA_PAGE', 'Pagina');
DEFINE('_KUNENA_RANK_NO_ASSIGNED', 'Rank non assegnato');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_GENERAL', 'Problems rilevati con il Community Builder integration:');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_INSTALL', 'Il Community Builder integration funziona solo se hai Community Builder versione %s o superiore intallata.');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_PUBLISH', 'Community Builder Profile integration funziona solo se Community Builder User profile &egrave; stato pubblicato.');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_UPDATE', 'Community Builder Profile integration funziona solo se hai Community Builder version %s o superiore.');

DEFINE('_KUNENA_INTEGRATION_CB_WARN_XHTML', 'Community Builder Profile integration funziona solo se &egrave; in W3C XHTML 1.0 Trans. compliance mode.');

DEFINE('_KUNENA_INTEGRATION_CB_WARN_INTEGRATION', 'Community Builder Profile integration funziona solo se il plugin forum integration &egrave; stato attivato in Community Builder.');

DEFINE('_KUNENA_INTEGRATION_CB_WARN_HIDE', 'Salvando la configurazione di Kunena sar&agrave; disabilitata l\' integrazione e questo avviso sara nascosto.');

			
// 1.0.10
DEFINE('_KUNENA_BACK', 'Indietro');
DEFINE('_KUNENA_SYNC', 'Sincronizza');
DEFINE('_KUNENA_NEW_SMILIE', 'Nuovo Smile');
DEFINE('_KUNENA_PRUNE', 'Snellisci');
// Editor
DEFINE('_KUNENA_EDITOR_HELPLINE_BOLD', 'Testo Grassetto: [b]Testo[/b]');
DEFINE('_KUNENA_EDITOR_HELPLINE_ITALIC', 'Testo Corsivo: [i]Testo[/i]');
DEFINE('_KUNENA_EDITOR_HELPLINE_UNDERL', 'Testo Sottolineato: [u]Testo[/u]');
DEFINE('_KUNENA_EDITOR_HELPLINE_STRIKE', 'Testo Barrato: [strike]Testo[/strike]');
DEFINE('_KUNENA_EDITOR_HELPLINE_SUB', 'Testo Pendice: [sub]Testo[/sub]');
DEFINE('_KUNENA_EDITOR_HELPLINE_SUP', 'Testo Apice: [sup]Testo[/sup]');
DEFINE('_KUNENA_EDITOR_HELPLINE_QUOTE', 'Testo citato: [quote]Testo[/quote]');
DEFINE('_KUNENA_EDITOR_HELPLINE_CODE', 'Visualizza codice: [code]Codice[/code]');
DEFINE('_KUNENA_EDITOR_HELPLINE_UL', 'Elenco puntato: [ul] [li]Testo[/li] [/ul] - Hint: a list must contain List Items');
DEFINE('_KUNENA_EDITOR_HELPLINE_OL', 'Elenco numerato: [ol] [li]Testo[/li] [/ol] - Hint: a list must contain List Items');
DEFINE('_KUNENA_EDITOR_HELPLINE_LI', 'Voce elenco: [li] list item [/li]');
DEFINE('_KUNENA_EDITOR_HELPLINE_ALIGN_LEFT', 'Allinea a sinistra: [left]Testo[/left]');
DEFINE('_KUNENA_EDITOR_HELPLINE_ALIGN_CENTER', 'Allinea al centro: [center]Testo[/center]');
DEFINE('_KUNENA_EDITOR_HELPLINE_ALIGN_RIGHT', 'Allinea a destra: [right]Testo[/right]');
DEFINE('_KUNENA_EDITOR_HELPLINE_IMAGELINK', 'Link immagine: [img size=400]http://www.google.com/images/web_logo_left.gif[/img]');
DEFINE('_KUNENA_EDITOR_HELPLINE_IMAGELINKSIZE', 'Link immagine: Dimensione');
DEFINE('_KUNENA_EDITOR_HELPLINE_IMAGELINKURL', 'Link immagine: URL del Link immagine');
DEFINE('_KUNENA_EDITOR_HELPLINE_IMAGELINKAPPLY', 'Link immagine: Applica Link immagine');
DEFINE('_KUNENA_EDITOR_HELPLINE_LINK', 'Link: [url=http://www.zzz.com/]Questo è un collegamento[/url]');
DEFINE('_KUNENA_EDITOR_HELPLINE_LINKURL', 'Link: URL del collegamento');
DEFINE('_KUNENA_EDITOR_HELPLINE_LINKTEXT', 'Link: Testo / Descrizione del link');
DEFINE('_KUNENA_EDITOR_HELPLINE_LINKAPPLY', 'Link: Applica link');
DEFINE('_KUNENA_EDITOR_HELPLINE_HIDE','Testo nascosto: [hide]un testo nascosto[/hide] - nasconde parte del messaggio agli Ospiti del Forum');
DEFINE('_KUNENA_EDITOR_HELPLINE_SPOILER', 'Spoiler: Il testo viene visualizzato solo dopo aver fatto clic su spoiler');
DEFINE('_KUNENA_EDITOR_HELPLINE_COLOR', 'Colore: [color=#FF6600]Testo[/color]');
DEFINE('_KUNENA_EDITOR_HELPLINE_FONTSIZE', 'Dimensione Font: [size=1]text size[/size] - Suggerimento: le dimensioni vanno da 1 a 5');
DEFINE('_KUNENA_EDITOR_HELPLINE_FONTSIZESELECTION', 'Dimensione Font: Selezionare Dimensione Font, selezionare il testo e premere il pulsante qui a sinistra');
DEFINE('_KUNENA_EDITOR_HELPLINE_EBAY', 'eBay: [ebay]ItemId[/ebay]');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEO', 'Video: Seleziona modalit&agrave; provider o un URL');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOSIZE', 'Video: Dimensioni del video');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOWIDTH', 'Video: Larghezza del video');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOHEIGHT', 'Video: Altezza del video');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOPROVIDER', 'Video: Selezionare il provider video');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOID', 'Video: ID del Video - lo potete vedere nell\'url del video');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOAPPLY1', 'Video: [video size=100 width=480 height=360 provider=clipfish]3423432[/video]');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOURL', 'Video: URL del Video');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOAPPLY2', 'Video: [video size=100 width=480 height=360]http://myvideodomain.com/myvideo[/video]');
DEFINE('_KUNENA_EDITOR_HELPLINE_IMGPH', 'Inserisci [img] segnaposto nel messaggio per immagini allegate');
DEFINE('_KUNENA_EDITOR_HELPLINE_FILEPH', 'Inserisci [file] segnaposto nel messaggio per file allegati');
DEFINE('_KUNENA_EDITOR_HELPLINE_SUBMIT', 'Clicca qui per inviare il messaggio');
DEFINE('_KUNENA_EDITOR_HELPLINE_PREVIEW', 'Clicca qui per vedere come apparir&agrave; il tuo messaggio quando sar&agrave; inviato');
DEFINE('_KUNENA_EDITOR_HELPLINE_CANCEL', 'Clicca qui per cancellare il messaggio');
DEFINE('_KUNENA_EDITOR_HELPLINE_HINT', 'Aiuto bbCode - Suggerimento: bbCode pu&ograve; essere utilizzato su un testo selezionato!');
DEFINE('_KUNENA_EDITOR_LINK_URL', ' URL: ');
DEFINE('_KUNENA_EDITOR_LINK_TEXT', ' Testo: ');
DEFINE('_KUNENA_EDITOR_LINK_INSERT', 'Inserisci');
DEFINE('_KUNENA_EDITOR_IMAGE_SIZE', ' Dimensione: ');
DEFINE('_KUNENA_EDITOR_IMAGE_URL', ' URL: ');
DEFINE('_KUNENA_EDITOR_IMAGE_INSERT', 'Inserisci');
DEFINE('_KUNENA_EDITOR_VIDEO_SIZE', 'Dimensione: ');
DEFINE('_KUNENA_EDITOR_VIDEO_WIDTH', 'Larghezza: ');
DEFINE('_KUNENA_EDITOR_VIDEO_HEIGHT', 'Altezza:');
DEFINE('_KUNENA_EDITOR_VIDEO_URL', 'URL: ');
DEFINE('_KUNENA_EDITOR_VIDEO_ID', 'ID: ');
DEFINE('_KUNENA_EDITOR_VIDEO_PROVIDER', 'Provider: ');
DEFINE('_KUNENA_BBCODE_HIDDENTEXT', '<span class="fb_quote">Qualcosa &egrave; nascosto agli ospiti. Effettua il login o registrati per vederlo.</span>');

DEFINE('_KUNENA_PROFILE_BIRTHDAY', 'Compleanno');
DEFINE('_KUNENA_DT_MONTHDAY_FMT','%m/%d');
DEFINE('_KUNENA_CFC_FILENAME','Il File CSS sta per essere modificato');
DEFINE('_KUNENA_CFC_SAVED','File CSS salvato.');
DEFINE('_KUNENA_CFC_NOTSAVED','File CSS non salvato.');
DEFINE('_KUNENA_JS_WARN_NAME_MISSING','Il tuo nome &egrave; mancante');
DEFINE('_KUNENA_JS_WARN_UNAME_MISSING','Il tuo nome utente &egrave; mancante');
DEFINE('_KUNENA_JS_WARN_VALID_AZ09','Il campo contiene lettere non ammesse');
DEFINE('_KUNENA_JS_WARN_MAIL_MISSING','L\'indirizzo Email &egrave; mancante');
DEFINE('_KUNENA_JS_WARN_PASSWORD2','Per favore inserire una password valida');
DEFINE('_KUNENA_JS_PROMPT_UNAME','Per favore riscrivi il tuo nuovo nome utente');
DEFINE('_KUNENA_JS_PROMPT_PASS','Per favore riscrivi la tua nuova password');
DEFINE('_KUNENA_DT_LMON_DEC', 'Dicembre');
DEFINE('_KUNENA_DT_MON_DEC', 'Dic');
DEFINE('_KUNENA_NOGENDER', 'Sconosciuto');
DEFINE('_KUNENA_ERROR_INCOMPLETE_ERROR', 'La tua installazione di Kunena non &egrave; completa!');
DEFINE('_KUNENA_ERROR_INCOMPLETE_OFFLINE', 'A causa di errori di cui sopra il tuo Forum &egrave; ora offline e l\'Amministrazione del Forum &egrave; stata disattivata.');
DEFINE('_KUNENA_ERROR_INCOMPLETE_REASONS', 'Possibili cause per questo errore:');
DEFINE('_KUNENA_ERROR_INCOMPLETE_1', '1) Il processo di installazione di Kunena &egrave; fallito o scaduto (prova a installarlo nuovamente)');
DEFINE('_KUNENA_ERROR_INCOMPLETE_2', '2) Avete rimosso qualche tabella di Kunena dal vostro database');
DEFINE('_KUNENA_ERROR_INCOMPLETE_3', '3) Il tuo database &egrave; danneggiato');
DEFINE('_KUNENA_ERROR_INCOMPLETE_SUPPORT', 'Il nostro Forum di supporto pu&ograve; essere trovato a:');

// 1.0.9
DEFINE('_KUNENA_INSTALLED_VERSION', 'Versione installata');
DEFINE('_KUNENA_COPYRIGHT', 'Copyright');
DEFINE('_KUNENA_LICENSE', 'Licenza');
DEFINE('_KUNENA_PROFILE_NO_USER', 'L\'utente non esiste.');
DEFINE('_KUNENA_PROFILE_NOT_FOUND', 'L\'utente non ha ancora visitato il forum e non ha alcun profilo.');

// Search
DEFINE('_KUNENA_SEARCH_RESULTS', 'Risultati ricerca');
DEFINE('_KUNENA_SEARCH_ADVSEARCH', 'Ricerca avanzata');
DEFINE('_KUNENA_SEARCH_SEARCHBY_KEYWORD', 'Cerca per parola chiave');
DEFINE('_KUNENA_SEARCH_KEYWORDS', 'Parole chiave');
DEFINE('_KUNENA_SEARCH_SEARCH_POSTS', 'Cerca nei messaggi');
DEFINE('_KUNENA_SEARCH_SEARCH_TITLES', 'Cerca solo nei titoli');
DEFINE('_KUNENA_SEARCH_SEARCHBY_USER', 'Cerca per nome utente');
DEFINE('_KUNENA_SEARCH_UNAME', 'Nome Utente');
DEFINE('_KUNENA_SEARCH_EXACT', 'Nome Esatto');
DEFINE('_KUNENA_SEARCH_USER_POSTED', 'Messaggi inviati da');
DEFINE('_KUNENA_SEARCH_USER_STARTED', 'Argomento avviato da');
DEFINE('_KUNENA_SEARCH_USER_ACTIVE', 'Attivit&agrave; nell\'argomento');
DEFINE('_KUNENA_SEARCH_OPTIONS', 'Opzioni di ricerca');
DEFINE('_KUNENA_SEARCH_FIND_WITH', 'Trova Argomento con');
DEFINE('_KUNENA_SEARCH_LEAST', 'Almeno');
DEFINE('_KUNENA_SEARCH_MOST', 'Al massimo');
DEFINE('_KUNENA_SEARCH_ANSWERS', 'Risposte');
DEFINE('_KUNENA_SEARCH_FIND_POSTS', 'Trova messaggi da');
DEFINE('_KUNENA_SEARCH_DATE_ANY', 'Qualsiasi data');
DEFINE('_KUNENA_SEARCH_DATE_LASTVISIT', 'Ultima visita');
DEFINE('_KUNENA_SEARCH_DATE_YESTERDAY', 'Ieri');
DEFINE('_KUNENA_SEARCH_DATE_WEEK', 'Una settimana fa');
DEFINE('_KUNENA_SEARCH_DATE_2WEEKS', '2 settimane fa');
DEFINE('_KUNENA_SEARCH_DATE_MONTH', 'Un mese fa');
DEFINE('_KUNENA_SEARCH_DATE_3MONTHS', '3 mesi fa');
DEFINE('_KUNENA_SEARCH_DATE_6MONTHS', '6 mesi fa');
DEFINE('_KUNENA_SEARCH_DATE_YEAR', 'Un anno fa');
DEFINE('_KUNENA_SEARCH_DATE_NEWER', 'e successive');
DEFINE('_KUNENA_SEARCH_DATE_OLDER', 'e precedenti');
DEFINE('_KUNENA_SEARCH_SORTBY', 'Ordina risultati per');
DEFINE('_KUNENA_SEARCH_SORTBY_TITLE', 'Titolo');
DEFINE('_KUNENA_SEARCH_SORTBY_POSTS', 'Numero di messaggi');
DEFINE('_KUNENA_SEARCH_SORTBY_VIEWS', 'Numero di visualizzazioni');
DEFINE('_KUNENA_SEARCH_SORTBY_START', 'Data di inizio argomento');
DEFINE('_KUNENA_SEARCH_SORTBY_POST', 'Data di invio');
DEFINE('_KUNENA_SEARCH_SORTBY_USER', 'Mome utente');
DEFINE('_KUNENA_SEARCH_SORTBY_FORUM', 'Forum');
DEFINE('_KUNENA_SEARCH_SORTBY_INC', 'Ordine crescente');
DEFINE('_KUNENA_SEARCH_SORTBY_DEC', 'Ordine decrescente');
DEFINE('_KUNENA_SEARCH_START', 'Vai al risultato numero');
DEFINE('_KUNENA_SEARCH_LIMIT5', 'Mostra 5 Risultati');
DEFINE('_KUNENA_SEARCH_LIMIT10', 'Mostra 10 Risultati');
DEFINE('_KUNENA_SEARCH_LIMIT15', 'Mostra 15 Risultati');
DEFINE('_KUNENA_SEARCH_LIMIT20', 'Mostra 20 Risultati');
DEFINE('_KUNENA_SEARCH_SEARCHIN', 'Cerca nelle categorie');
DEFINE('_KUNENA_SEARCH_SEARCHIN_ALLCATS', 'Tutte le categorie');
DEFINE('_KUNENA_SEARCH_SEARCHIN_CHILDREN', 'Cerca anche nelle sottocategorie');
DEFINE('_KUNENA_SEARCH_SEND', 'Cerca');
DEFINE('_KUNENA_SEARCH_CANCEL', 'Cancella');
DEFINE('_KUNENA_SEARCH_ERR_NOPOSTS', 'Non ci sono messaggi contenenti i termini di ricerca.');
DEFINE('_KUNENA_SEARCH_ERR_SHORTKEYWORD', 'Almeno una parola chiave deve essere superiore a 3 caratteri!');

// 1.0.8
DEFINE('_KUNENA_CATID', 'ID');
DEFINE('_POST_NOT_MODERATOR', 'Non hai i permessi moderatore!');
DEFINE('_POST_NO_FAVORITED_TOPIC', 'Questo argomento <b>NON</b> pu&ograve; essere aggiunto ai tuoi preferiti');
DEFINE('_COM_C_SYNCEUSERSDESC', 'Sincronizza la tabella utenti Kunena con la tabella utenti Joomla');
DEFINE('_POST_FORGOT_EMAIL', 'Hai dimenticato di inserire il tuo indirizzo e-mail.  Clicca sul pulsante indetro del tuo browser per tornare indietro e riprovare.');
DEFINE('_KUNENA_POST_DEL_ERR_FILE', 'Tutto cancellato. Alcuni file allegati sono mancanti!');
// New strings for initial forum setup. Replacement for legacy sample data
DEFINE('_KUNENA_SAMPLE_FORUM_MENU_TITLE', 'Forum');
DEFINE('_KUNENA_SAMPLE_MAIN_CATEGORY_TITLE', 'Principale Forum');
DEFINE('_KUNENA_SAMPLE_MAIN_CATEGORY_DESC', 'Questo &egrave; la categoria principale del forum. Come un livello, una categoria che funge da contenitore per le singole schede o forum. E\'indicato anche come un livello di categoria 1 ed deve essere impostato per ogni Forum Kunena.');
DEFINE('_KUNENA_SAMPLE_MAIN_CATEGORY_HEADER', 'Al fine di fornire ulteriori informazioni per gli ospiti ed gli utenti, la testata del forum pu&ograve; essere sfruttata per visualizzare il testo pi&ugrave; visualizzato di una particolare categoria.');
DEFINE('_KUNENA_SAMPLE_FORUM1_TITLE', 'Benvenuti');
DEFINE('_KUNENA_SAMPLE_FORUM1_DESC', 'Noi incoraggiamo i nuovi utenti a inviare una breve presentazione di se stessi in questa categoria forum. Per conoscersi e condividere con altri interessi comuni.
');
DEFINE('_KUNENA_SAMPLE_FORUM1_HEADER', '[b]Benvenuti al Forum Kunena![/b]

Dillo a noi ed ai nostri utenti chi sei, che cosa ti piace e perch&egrave; sei diventato un utente di questo sito. 
Ci rallegriamo per tutti i nuovi iscritti e speriamo di vederti spesso!
');
DEFINE('_KUNENA_SAMPLE_FORUM2_TITLE', 'Casella suggerimento');
DEFINE('_KUNENA_SAMPLE_FORUM2_DESC', 'Hai alcuni commenti e contributi da condividere?
Non essere timido e mandaci una nota. Vogliamo sentire da te e ci impegniamo a rendere il nostro sito migliore e pi&ugrave; facile da usare per i nostri ospiti e utenti come te.');
DEFINE('_KUNENA_SAMPLE_FORUM2_HEADER', 'Questa &egrave; l\'intestazione opzionale del Forum per la casella Suggerimenti.
');
DEFINE('_KUNENA_SAMPLE_POST1_SUBJECT', 'Benvenuti su Kunena!');
DEFINE('_KUNENA_SAMPLE_POST1_TEXT', '[size=4][b]Benvenuti su Kunena![/b][/size]

Grazie per aver scelto per la vostra comunit&agrave; Forum Kunena necessario in Joomla.

Kunena, tradotto dallo Swahili che significa "parlare", &egrave; stato realizzato da un team di professionisti Open Source con l\'obiettivo di fornire una qualit&agrave; superiore, per un forum con soluzione unificata per Joomla. Kunena supporta anche i componenti di social networking come Comunit&agrave; Builder e JomSocial.


[size=4][b]Risorse Aggiuntive Kunena[/b][/size]

[b]Documentazione Kunena:[/b] [url]http://www.kunena.com/docs[/url]

[b]Forum di Supporto Kunena[/b]: [url]http://www.kunena.com/forum[/url]

[b]Download Kunena:[/b] [url]http://www.kunena.com/downloads[/url]

[b]Blog Kunena:[/b] [url]http://www.kunena.com/blog[/url]

[b]Invia le tue idee:[/b] [url]http://www.kunena.com/uservoice[/url]

[b]Segui Kunena su Twitter:[/b] [url]http://www.kunena.com/twitter[/url]
');

// 1.0.6
DEFINE('_KUNENA_JOMSOCIAL', 'JomSocial');

// 1.0.5
DEFINE('_COM_A_HIGHLIGHTCODE', 'Attiva codice di evidenziazione');
DEFINE('_COM_A_HIGHLIGHTCODE_DESC', 'Abilita il codice Kunena tag evidenziando Javascript. Se i tuoi utenti inviano PHP o altri frammenti di codice all\'interno di tag del codice, abilitandolo, quindi, questo colora il codice. Se il tuo forum non fa uso di tale linguaggio di programmazione messaggi, si potrebbe desiderare di disattivarlo per evitare di ottenere codice tag errato.');
DEFINE('_COM_A_RSS_TYPE', 'Tipo RSS predefinito');
DEFINE('_COM_A_RSS_TYPE_DESC', 'Scegli tra i feed RSS &quot;By Thread &quot; o &quot;By Post.&quot; &quot;By Thread &quot; significa che una sola voce per argomento sar&agrave; elencata nel feed RSS indipendente da quanti messaggi sono stati effettuati nell\'argomento. &quot;By Thread&quot; crea uno pi&ugrave; breve, pi&ugrave; compatto feed RSS ma non elenca tutte le risposte.');
DEFINE('_COM_A_RSS_BY_THREAD', 'By Thread');
DEFINE('_COM_A_RSS_BY_POST', 'By Post');
DEFINE('_COM_A_RSS_HISTORY', 'Storia RSS');
DEFINE('_COM_A_RSS_HISTORY_DESC', 'Selezionare la quantit&agrave; di storia che devono essere inclusi nel feed RSS. Il predefinito &egrave; di un mese, ma si raccomanda di limitare a una settimana su siti ad alto volume.');
DEFINE('_COM_A_RSS_HISTORY_WEEK', '1 Settimana');
DEFINE('_COM_A_RSS_HISTORY_MONTH', '1 Mese');
DEFINE('_COM_A_RSS_HISTORY_YEAR', '1 Anno');
DEFINE('_COM_A_FBDEFAULT_PAGE', 'Pagina Predefinita Kunena');
DEFINE('_COM_A_FBDEFAULT_PAGE_DESC', 'Selezionare la pagina predefinita di Kunena che viene visualizzata quando un link viene cliccato o il forum &egrave; inizialmente avviato. Il valore predefinito &egrave; Discussioni Recenti. Dovrebbe essere fissato per le categorie di modelli diversi da quelli default_ex. Se Le mie discussioni &egrave; selezionata, gli ospiti saranno reindirizzati a Discussioni Recenti.');
DEFINE('_COM_A_FBDEFAULT_PAGE_RECENT', 'Discussioni recenti');
DEFINE('_COM_A_FBDEFAULT_PAGE_MY', 'Le mie discussioni');
DEFINE('_COM_A_FBDEFAULT_PAGE_CATEGORIES', 'Categorie');
DEFINE('_KUNENA_BBCODE_HIDE', 'Il testo seguente &egrave; nascosto agli utenti non registrati:');
DEFINE('_KUNENA_BBCODE_SPOILER', 'Attenzione: Spoiler!');
DEFINE('_KUNENA_FORUM_SAME_ERR', 'La categoria madre non pu&ograve; essere la stessa.');
DEFINE('_KUNENA_FORUM_OWNCHILD_ERR', 'La categoria madre &egrave; una dei propri figli.');
DEFINE('_KUNENA_FORUM_UNKNOWN_ERR', 'L\'ID Forum ID non esiste.');
DEFINE('_KUNENA_RECURSION', 'Rilevata ricorsione.');
DEFINE('_POST_FORGOT_NAME_ALERT', 'Non dimenticare di inserire il tuo nome.');
DEFINE('_POST_FORGOT_EMAIL_ALERT', 'Non dimenticare di inserire la tua e-mail.');
DEFINE('_POST_FORGOT_SUBJECT_ALERT', 'Non dimenticare di inserire un oggetto.');
DEFINE('_KUNENA_EDIT_TITLE', 'Modifica i tuoi dettagli');
DEFINE('_KUNENA_YOUR_NAME', 'Il tuo Nome:');
DEFINE('_KUNENA_EMAIL', 'E-mail:');
DEFINE('_KUNENA_UNAME', 'Nome Utente:');
DEFINE('_KUNENA_PASS', 'Password:');
DEFINE('_KUNENA_VPASS', 'Verifica Password:');
DEFINE('_KUNENA_USER_DETAILS_SAVE', 'I dettagli Utente sono stati salvati.');
DEFINE('_KUNENA_TEAM_CREDITS', 'Crediti');
DEFINE('_COM_A_BBCODE', 'BBCode');
DEFINE('_COM_A_BBCODE_SETTINGS', 'Impostazioni BBCode');
DEFINE('_COM_A_SHOWSPOILERTAG', 'Mostra spoiler tag nella barra degli strumenti Editor');
DEFINE('_COM_A_SHOWSPOILERTAG_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera che il tag [spoiler] venga elencato nella barra degli strumenti dell\'editor messaggi.');
DEFINE('_COM_A_SHOWVIDEOTAG', 'Visualizza il tag video nella barra degli strumenti dell\'editor');
DEFINE('_COM_A_SHOWVIDEOTAG_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera che il tag [video] venga elencato nella barra degli strumenti dell\'editor.');
DEFINE('_COM_A_SHOWEBAYTAG', 'Mostra il tag eBay tag nella barra degli strumenti dell\'editor');
DEFINE('_COM_A_SHOWEBAYTAG_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera che il tag [eBay] venga elencato nella barra degli strumenti dell\'editor.');
DEFINE('_COM_A_TRIMLONGURLS', 'Taglia URL lunghi');
DEFINE('_COM_A_TRIMLONGURLS_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera tagliare gli URL lunghi. Vedere le impostazioni per il taglio iniziale e finale.');
DEFINE('_COM_A_TRIMLONGURLSFRONT', 'Porzione del taglio iniziale degli URL');
DEFINE('_COM_A_TRIMLONGURLSFRONT_DESC', 'Numero di caratteri per il taglio porzione iniziale degli URL. Tagli URL lunghi deve essere impostato su &quot;S&igrave;&quot;.');
DEFINE('_COM_A_TRIMLONGURLSBACK', 'Porzione del taglio finale degli URL');
DEFINE('_COM_A_TRIMLONGURLSBACK_DESC', 'Numero di caratteri per il taglio porzione finale degli URL. Tagli URL lunghi deve essere impostato su &quot;S&igrave;&quot;.');
DEFINE('_COM_A_AUTOEMBEDYOUTUBE', 'Autoincorpora i video di YouTube');
DEFINE('_COM_A_AUTOEMBEDYOUTUBE_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera che gli URL video di YouTube vengano automaticamente incorporati.');
DEFINE('_COM_A_AUTOEMBEDEBAY', 'Autoincorpora voci di eBay');
DEFINE('_COM_A_AUTOEMBEDEBAY_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera che le voci e le ricerche eBay e le ricerche  vengano automaticamente incorporate.');
DEFINE('_COM_A_EBAYLANGUAGECODE', 'Codice lingua widget eBay');
DEFINE('_COM_A_EBAYLANGUAGECODE_DESC', 'E\' importante impostare la lingua corretta per il widget eBay in quanto da esso vengono recupertae la lingua e valuta. Il valore di default &egrave; en-us per ebay.com. Esempio: ebay.de: de-de, ebay.at: de-at, ebay.co.uk: en-gb, ebay.it: it-it');
DEFINE('_COM_A_KUNENA_SESSION_TIMEOUT', 'Durata Sessione');
DEFINE('_COM_A_KUNENA_SESSION_TIMEOUT_DESC', 'Predefinita &egrave; 1800 [secondi]. La durata Sessione (timeout), in secondi &egrave; simile alla durata Sessione di Joomla. La durata Sessione &egrave; importante per ricalcolare i diritti di accesso, la visualizzazione di Chi c\'&egrave; online e l\'indicatore NUOVO. Una volta che la sessione scade al di l&agrave; di questo tempo, i diritti di accesso e l\'indicatore NUOVO vengono ripristinati.');

// Advanced administrator merge-split functions
DEFINE('_GEN_MERGE', 'Unisci');
DEFINE('_VIEW_MERGE', '');
DEFINE('_POST_MERGE_TOPIC', 'Unisci questo argomento con');
DEFINE('_POST_MERGE_GHOST', 'Lascia una copia nascosta dell\'argomento');
DEFINE('_POST_SUCCESS_MERGE', 'Argomento unito con successo.');
DEFINE('_POST_TOPIC_NOT_MERGED', 'Unione fallita.');
DEFINE('_GEN_SPLIT', 'Dividi');
DEFINE('_GEN_DOSPLIT', 'Vai');
DEFINE('_VIEW_SPLIT', '');
DEFINE('_POST_SUCCESS_SPLIT', 'Argomento diviso con successo.');
DEFINE('_POST_SUCCESS_SPLIT_TOPIC_CHANGED', 'Argomento cambiato con successo.');
DEFINE('_POST_SPLIT_TOPIC_NOT_CHANGED', 'Cambio Argomento fallito.');
DEFINE('_POST_TOPIC_NOT_SPLIT', 'Divisione fallita.');
DEFINE('_POST_DUPLICATE_IGNORED', 'Duplicazione. Messaggio identico &egrave; stato ignorato.');
DEFINE('_POST_SPLIT_HINT', '<br />Suggerimento: &Egrave; possibile promuovere un messaggio posizione di argomento, se lo si seleziona nella seconda colonna e si spunta non suddividere.<br />');
DEFINE('_POST_LINK_ORPHANS_TOPIC', 'link mancante all\'argomento');
DEFINE('_POST_LINK_ORPHANS_TOPIC_TITLE', 'Link mancante al nuovo argomento.');
DEFINE('_POST_LINK_ORPHANS_PREVPOST', 'link mancante al precedente messaggio');
DEFINE('_POST_LINK_ORPHANS_PREVPOST_TITLE', 'Link mancante al precedente messaggio.');
DEFINE('_POST_MERGE', 'unisci');
DEFINE('_POST_MERGE_TITLE', 'Fissa questo argomento ai primi messaggi.');
DEFINE('_POST_INVERSE_MERGE', 'unione inversa');
DEFINE('_POST_INVERSE_MERGE_TITLE', 'Fissa obiettivi primo messaggio di questo argomento.');

// Additional
DEFINE('_POST_UNFAVORITED_TOPIC', 'Questo argomento &egrave; stato rimosso dai tuoi preferiti.');
DEFINE('_POST_NO_UNFAVORITED_TOPIC', 'Questo argomento <b>NON</b> pu&ograve; essere rimosso dai tuoi preferiti.');
DEFINE('_POST_SUCCESS_UNFAVORITE', 'La tua richiesta di rimuovere dai preferiti &egrave; stata processata.');
DEFINE('_POST_UNSUBSCRIBED_TOPIC', 'Questo argomento &egrave; stato rimosso dalle tue sottoscrizioni.');
DEFINE('_POST_NO_UNSUBSCRIBED_TOPIC', 'Questo argomento <b>NON</b> pu&ograve; essere rimosso dalle tue sottoscrizioni.');
DEFINE('_POST_SUCCESS_UNSUBSCRIBE', 'La tua richiesta di rimuovere dalle sottoscrizioni &egrave; stata processata.');
DEFINE('_POST_NO_DEST_CATEGORY', 'Non &egrave; stata selezionata la categoria di destinazione. Nulla &egrave; stato spostato.');
// Default_EX template
DEFINE('_KUNENA_ALL_DISCUSSIONS', 'Discussioni recenti');
DEFINE('_KUNENA_MY_DISCUSSIONS', 'Le mie discussioni');
DEFINE('_KUNENA_MY_DISCUSSIONS_DETAIL', 'Discussioni che ho iniziato o hanno risposto al');
DEFINE('_KUNENA_CATEGORY', 'Categoria:');
DEFINE('_KUNENA_CATEGORIES', 'Categorie');
DEFINE('_KUNENA_POSTED_AT', 'Inviato');
DEFINE('_KUNENA_AGO', 'fa');
DEFINE('_KUNENA_DISCUSSIONS', 'Discussioni');
DEFINE('_KUNENA_TOTAL_THREADS', 'Totale Argomenti:');
DEFINE('_SHOW_DEFAULT', 'Predefinito');
DEFINE('_SHOW_MONTH', 'Mese');
DEFINE('_SHOW_YEAR', 'Anno');
// 1.0.4
DEFINE('_KUNENA_COPY_FILE', 'Copio da "%src%" a "%dst%"...');
DEFINE('_KUNENA_COPY_OK', 'OK');
DEFINE('_KUNENA_CSS_SAVE', 'Il Salvataggio del file CSS dovrebbe essere qui...file="%file%"');
DEFINE('_KUNENA_UP_ATT_10', 'Struttura tabella aggiornato correttamente alle ultime serie 1.0.x !');
DEFINE('_KUNENA_UP_ATT_10_MSG', 'Struttura della tabella dei messaggi aggiornata correttamente alle ultime serie 1.0.x!');
DEFINE('_KUNENA_TOPIC_MOVED', '---');
DEFINE('_KUNENA_TOPIC_MOVED_LONG', '------------');
DEFINE('_KUNENA_POST_DEL_ERR_CHILD', 'Impossibile promuovere i <b>Figli</b> nella gerarchia dei post. Nessun cambiamento.');
DEFINE('_KUNENA_POST_DEL_ERR_MSG', 'Impossibile eliminare il post(s) - nessun cambiamento');
DEFINE('_KUNENA_POST_DEL_ERR_TXT', 'Impossibile eliminare il testo del post(s). Aggiorna il database manualmente (mesid=%id%).');
DEFINE('_KUNENA_POST_DEL_ERR_USR', 'Tutto Cancellato, ma è fallita la rischiesta di aggiornamento delle statistiche utenti.!');
DEFINE('_KUNENA_POST_MOV_ERR_DB', "Grave errore nel database. Aggiorna manualmente il database, in questo modo le replice ai topic saranno contenuti nel nuovo forum.");
DEFINE('_KUNENA_UNIST_SUCCESS', "Kunena component è stato disinstallato con successo!");
DEFINE('_KUNENA_PDF_VERSION', 'Kunena Forum version: %version%');
DEFINE('_KUNENA_PDF_DATE', 'Generato il: %date%');
DEFINE('_KUNENA_SEARCH_NOFORUM', 'Non ci sono Forum in cui effettura la ricerca.');

DEFINE('_KUNENA_ERRORADDUSERS', 'Errore durante l\'aggiunta di utenti:');
DEFINE('_KUNENA_USERSSYNCDELETED', 'Utenti sincronizzati; Cancellati:');
DEFINE('_KUNENA_USERSSYNCADD', ', Aggiunti:');
DEFINE('_KUNENA_SYNCUSERPROFILES', 'Profili Utenti.');
DEFINE('_KUNENA_NOPROFILESFORSYNC', 'Nessun profilo leggibile trovato per la sincornizzazione.');
DEFINE('_KUNENA_SYNC_USERS', 'Sincronizza Utenti');
DEFINE('_KUNENA_SYNC_USERS_DESC', 'Sincronizza la tabella utenti di Kunena con quella di Joomla!');
DEFINE('_KUNENA_A_MAIL_ADMIN', 'Email Amministratori');
DEFINE('_KUNENA_A_MAIL_ADMIN_DESC',
    'Impostare su &quot;S&igrave;&quot; se si desidera inviare una notifica per ogni messaggio che viene inserito e deve essere abilitato dall\'Amministratore di sistema.');
DEFINE('_KUNENA_RANKS_EDIT', 'Modifica Rank');
DEFINE('_KUNENA_USER_HIDEEMAIL', 'Nascondi Email');
DEFINE('_KUNENA_DT_DATE_FMT','%m/%d/%Y');
DEFINE('_KUNENA_DT_TIME_FMT','%H:%M');
DEFINE('_KUNENA_DT_DATETIME_FMT','%m/%d/%Y %H:%M');
DEFINE('_KUNENA_DT_LDAY_SUN', 'Domenica');
DEFINE('_KUNENA_DT_LDAY_MON', 'Lunedì');
DEFINE('_KUNENA_DT_LDAY_TUE', 'Martedì');
DEFINE('_KUNENA_DT_LDAY_WED', 'Mercoledì');
DEFINE('_KUNENA_DT_LDAY_THU', 'Giovedì');
DEFINE('_KUNENA_DT_LDAY_FRI', 'Venerdì');
DEFINE('_KUNENA_DT_LDAY_SAT', 'Sabato');
DEFINE('_KUNENA_DT_DAY_SUN', 'Dom');
DEFINE('_KUNENA_DT_DAY_MON', 'Lun');
DEFINE('_KUNENA_DT_DAY_TUE', 'Mar');
DEFINE('_KUNENA_DT_DAY_WED', 'Mer');
DEFINE('_KUNENA_DT_DAY_THU', 'Gio');
DEFINE('_KUNENA_DT_DAY_FRI', 'Ven');
DEFINE('_KUNENA_DT_DAY_SAT', 'Sab');
DEFINE('_KUNENA_DT_LMON_JAN', 'Gennaio');
DEFINE('_KUNENA_DT_LMON_FEB', 'Febbraio');
DEFINE('_KUNENA_DT_LMON_MAR', 'Marzo');
DEFINE('_KUNENA_DT_LMON_APR', 'Aprile');
DEFINE('_KUNENA_DT_LMON_MAY', 'Maggio');
DEFINE('_KUNENA_DT_LMON_JUN', 'Giugno');
DEFINE('_KUNENA_DT_LMON_JUL', 'Luglio');
DEFINE('_KUNENA_DT_LMON_AUG', 'Agosto');
DEFINE('_KUNENA_DT_LMON_SEP', 'Settembre');
DEFINE('_KUNENA_DT_LMON_OCT', 'Ottobre');
DEFINE('_KUNENA_DT_LMON_NOV', 'Novembre');
DEFINE('_KUNENA_DT_LMON_DEV', 'Dicembre');
DEFINE('_KUNENA_DT_MON_JAN', 'Gen');
DEFINE('_KUNENA_DT_MON_FEB', 'Feb');
DEFINE('_KUNENA_DT_MON_MAR', 'Mar');
DEFINE('_KUNENA_DT_MON_APR', 'Apr');
DEFINE('_KUNENA_DT_MON_MAY', 'Mag');
DEFINE('_KUNENA_DT_MON_JUN', 'Giu');
DEFINE('_KUNENA_DT_MON_JUL', 'Lug');
DEFINE('_KUNENA_DT_MON_AUG', 'Ago');
DEFINE('_KUNENA_DT_MON_SEP', 'Set');
DEFINE('_KUNENA_DT_MON_OCT', 'Ott');
DEFINE('_KUNENA_DT_MON_NOV', 'Nov');
DEFINE('_KUNENA_DT_MON_DEV', 'Dic');
DEFINE('_KUNENA_CHILD_BOARD', 'Sottocategoria Forum');
DEFINE('_WHO_ONLINE_GUEST', 'Ospite');
DEFINE('_WHO_ONLINE_MEMBER', 'Utenti');
DEFINE('_KUNENA_IMAGE_PROCESSOR_NONE', 'nessuno');
DEFINE('_KUNENA_IMAGE_PROCESSOR', 'Processore immagini:');
DEFINE('_KUNENA_INSTALL_CLICK_TO_CONTINUE', 'Clicca qui per continuare...');
DEFINE('_KUNENA_INSTALL_APPLY', 'Applica!');
DEFINE('_KUNENA_NO_ACCESS', 'Accesso negato al Forum!');
DEFINE('_KUNENA_TIME_SINCE', '%time% fa');
DEFINE('_KUNENA_DATE_YEARS', 'Anni');
DEFINE('_KUNENA_DATE_MONTHS', 'Mesi');
DEFINE('_KUNENA_DATE_WEEKS','Settimane');
DEFINE('_KUNENA_DATE_DAYS', 'Giorni');
DEFINE('_KUNENA_DATE_HOURS', 'Ore');
DEFINE('_KUNENA_DATE_MINUTES', 'Minuti');
//1.0.4 
DEFINE('_EDIT_TITLE', 'Modifica dati di accesso');
DEFINE('_YOUR_NAME', 'Il tuo Nome');
DEFINE('_EMAIL', 'Indirizzo Email');
DEFINE('_PASS', 'Password');
DEFINE('_VPASS', 'Verifica Password');
DEFINE('_COM_C_SYNCEUSERSDESC','Sincronizza Utenti');
//END 
// 1.0.3
DEFINE('_KUNENA_CONFIRM_REMOVESAMPLEDATA', 'Sei sicuro di volere rimuovere i dati di esempio? Questa azione &egrave; irreversibile.');
// 1.0.2
DEFINE('_KUNENA_HEADERADD', 'Testata Forum:');
DEFINE('_KUNENA_ADVANCEDDISPINFO', "Visualizza Forum");
DEFINE('_KUNENA_CLASS_SFX', "Suffisso classe CSS Forum");
DEFINE('_KUNENA_CLASS_SFXDESC', "Suffisso CSS applicato a index, showcat, view e altri modelli del forum.");
DEFINE('_COM_A_USER_EDIT_TIME', 'Tempo di modifica per l\'Utente');
DEFINE('_COM_A_USER_EDIT_TIME_DESC', 'Impostare a 0 per il tempo illimitato, oppure il numero di secondi tra la creazione di un messaggio o l\'ultima modifica permessa.');
DEFINE('_COM_A_USER_EDIT_TIMEGRACE', 'Tempo concesso per la modifica Utente');
DEFINE('_COM_A_USER_EDIT_TIMEGRACE_DESC', 'Permetti la memorizzazione di una modifica per il tempo stabilito. Dopodich&egrave; il link scompare [Default 600 secondi].');
DEFINE('_KUNENA_HELPPAGE','Abilita pagina di Aiuto');
DEFINE('_KUNENA_HELPPAGE_DESC','Se impostato su &quot;S&igrave;&quot; verr&agrave; mostrato un link nel menu della testata collegato alla pagina di Aiuto.');
DEFINE('_KUNENA_HELPPAGE_IN_FB','Mostra Aiuto in Kunena');
DEFINE('_KUNENA_HELPPAGE_IN_KUNENA_DESC','Se impostato su &quot;S&igrave;&quot; il testo di aiuto sar&agrave; mostrato in Kunena e il link esterno alla pagina non sar&agrave; attivo. <b>Nota:</b> Dovrai aggiungere "ID Contenuto Aiuto" .');
DEFINE('_KUNENA_HELPPAGE_CID','ID Contenuto Aiuto');
DEFINE('_KUNENA_HELPPAGE_CID_DESC','Occorre che l\'opzione "Mostra Aiuto in Kunena" sia impostata su <b>"S&igrave;"</b>.');
DEFINE('_KUNENA_HELPPAGE_LINK',' Link alla pagina esterna d\'aiuto');
DEFINE('_KUNENA_HELPPAGE_LINK_DESC','Se vuoi mostrare il link esterno alla pagina d\'Aiuto, occorre che l\'opzione "Mostra Aiuto in Kunena" sia impostata su <b>"NO"</b>.');
DEFINE('_KUNENA_RULESPAGE','Abilita la pagina del Regolamento');
DEFINE('_KUNENA_RULESPAGE_DESC','Se impostato su &quot;S&igrave;&quot; verr&agrave; mostrato un link nel menu della testata collegato alla pagina del Regolamento.');
DEFINE('_KUNENA_RULESPAGE_IN_FB','Mostra Regolamento in Kunena');
DEFINE('_KUNENA_RULESPAGE_IN_KUNENA_DESC','Se impostato su &quot;S&igrave;&quot; Regolamento sar&agrave; mostrato in Kunena e il link esterno alla pagina non sar&agrave; attivo. <b>Nota:</b> Dovrai aggiungere "ID Contenuto Regolamento" .');
DEFINE('_KUNENA_RULESPAGE_CID','ID Contenuto Regolamento');
DEFINE('_KUNENA_RULESPAGE_CID_DESC','Occorre che l\'opzione "Mostra Regolamento in Kunena" sia impostata su <b>"S&igrave;"</b>.');
DEFINE('_KUNENA_RULESPAGE_LINK',' Link alla pagina esterna del Regolamento');
DEFINE('_KUNENA_RULESPAGE_LINK_DESC','Se vuoi mostrare il link esterno al Regolamento, occorre che l\'opzione "Mostra Regolamento in Kunena" sia impostata su <b>"NO"</b>.');
DEFINE('_KUNENA_AVATAR_GDIMAGE_NOT','La Libreria GD non &egrave; stata trovata');
DEFINE('_KUNENA_AVATAR_GD2IMAGE_NOT','La Libreria GD2 non &egrave; stata trovata');
DEFINE('_KUNENA_GD_INSTALLED','Versione GD installata ');
DEFINE('_KUNENA_GD_NO_VERSION','Non &egrave; stata individuata la versione GD installata');
DEFINE('_KUNENA_GD_NOT_INSTALLED','La Libreria GD non &egrave; installata, per maggiori informazioni ');
DEFINE('_KUNENA_AVATAR_SMALL_HEIGHT','Altezza della Miniatura Immagine :');
DEFINE('_KUNENA_AVATAR_SMALL_WIDTH','Larghezza della Miniatura Immagine :');
DEFINE('_KUNENA_AVATAR_MEDIUM_HEIGHT','Altezza dell\'Immagine Media :');
DEFINE('_KUNENA_AVATAR_MEDIUM_WIDTH','Larghezza dell\'Immagine Media :');
DEFINE('_KUNENA_AVATAR_LARGE_HEIGHT','Altezza dell\'Immagine Grande :');
DEFINE('_KUNENA_AVATAR_LARGE_WIDTH','Larghezza dell\'Immagine Grande :');
DEFINE('_KUNENA_AVATAR_QUALITY','Qualit&agrave; Avatar');
DEFINE('_KUNENA_WELCOME','Benvenuto in Kunena');
DEFINE('_KUNENA_WELCOME_DESC','Grazie per aver scelto Kunena come soluzione per il Vostro Forum. Questa videata Vi fornisce una rapida anteprima e diverse statistiche del Vostro Forum. I link a sinistra di questa pagina Vi permettono di controllare ogni aspetto del Vostro Forum. Ogni pagina contiene le istruzioni sull\'utilizzo degli strumenti.');
DEFINE('_KUNENA_STATISTIC','Statistica');
DEFINE('_KUNENA_VALUE','Valore');
DEFINE('_GEN_CATEGORY','Categoria');
DEFINE('_GEN_STARTEDBY','Avviata da: ');
DEFINE('_GEN_STATS','statistiche');
DEFINE('_STATS_TITLE',' forum - statistiche');
DEFINE('_STATS_GEN_STATS','Statistiche generali');
DEFINE('_STATS_TOTAL_MEMBERS','Utenti:');
DEFINE('_STATS_TOTAL_REPLIES','Risposte:');
DEFINE('_STATS_TOTAL_TOPICS','Argomenti:');
DEFINE('_STATS_TODAY_TOPICS','Argomenti odierni:');
DEFINE('_STATS_TODAY_REPLIES','Risposte odierne:');
DEFINE('_STATS_TOTAL_CATEGORIES','Categorie:');
DEFINE('_STATS_TOTAL_SECTIONS','Sezioni:');
DEFINE('_STATS_LATEST_MEMBER','Ultimo Utente:');
DEFINE('_STATS_YESTERDAY_TOPICS','Argomenti di ieri:');
DEFINE('_STATS_YESTERDAY_REPLIES','Risposte di ieri:');
DEFINE('_STATS_POPULAR_PROFILE','Gli Utenti pi&ugrave; popolari (I pi&ugrave; cliccati sul link Profilo)');
DEFINE('_STATS_TOP_POSTERS','Gli Utenti che scrivono di pi&ugrave;');
DEFINE('_STATS_POPULAR_TOPICS','Gli argomenti pi&ugrave; popolari');
DEFINE('_COM_A_STATSPAGE','Abilita statistiche');
DEFINE('_COM_A_STATSPAGE_DESC','Se impostato su &quot;S&igrave;&quot; verr&agrave; mostrato agli utenti un link nel menu di testata per accedere alla pagina delle statistiche del Forum. Verrano visualizzate diverse statistiche sul Forum. <em>Gli Amministratori hanno sempre accesso alla pagina delle statistiche!</em>');
DEFINE('_COM_C_JBSTATS','Statistiche Forum');
DEFINE('_COM_C_JBSTATS_DESC','Statistiche Forum');
define('_GEN_GENERAL','Generale');
define('_PERM_NO_READ','Non hai i permessi necessari per accedere al Forum.');
DEFINE ('_KUNENA_SMILEY_SAVED','Smile salvata');
DEFINE ('_KUNENA_SMILEY_DELETED','Smile eliminata');
DEFINE ('_KUNENA_CODE_ALLREADY_EXITS','Il Codice esiste gi&agrave;');
DEFINE ('_KUNENA_MISSING_PARAMETER','Parametro mancante');
DEFINE ('_KUNENA_RANK_ALLREADY_EXITS','Rank gi&agrave; esistente');
DEFINE ('_KUNENA_RANK_DELETED','Rank eliminato');
DEFINE ('_KUNENA_RANK_SAVED','Rank salvato');
DEFINE ('_KUNENA_DELETE_SELECTED','Elimina elemento selezionato');
DEFINE ('_KUNENA_MOVE_SELECTED','Sopsta elemento selezionato');
DEFINE ('_KUNENA_REPORT_LOGGED','Autenticato');
DEFINE ('_KUNENA_GO','Vai');
DEFINE('_KUNENA_MAILFULL','Inserisci il testo completo del messaggio nell\'email inviata agli utenti registrati');
DEFINE('_KUNENA_MAILFULL_DESC','Se si sceglie No - gli utenti registrati riceveranno solo il titolo del nuovo messaggio');
DEFINE('_KUNENA_HIDETEXT','Per favore procedi con l\'autenticazione per visualizzare questo contenuto!');
DEFINE('_BBCODE_HIDE','Testo nascosto: [hide]inserire qui il testo da nascondere[/hide] - questa sar&agrave; la parte nascosta ai Visitatori');
DEFINE('_KUNENA_FILEATTACH','File allegato: ');
DEFINE('_KUNENA_FILENAME','Nome del File: ');
DEFINE('_KUNENA_FILESIZE','Dimensione del File: ');
DEFINE('_KUNENA_MSG_CODE','Codice: ');
DEFINE('_KUNENA_CAPTCHA_ON','Sistema Antispam');
DEFINE('_KUNENA_CAPTCHA_DESC','On/Off del Sistema Antispam & antibot CAPTCHA');
DEFINE('_KUNENA_CAPDESC','Inserire il codice qui');
DEFINE('_KUNENA_CAPERR','Codice errato!');
DEFINE('_KUNENA_COM_A_REPORT', 'Segnalazione del Messaggio');
DEFINE('_KUNENA_COM_A_REPORT_DESC', 'Se si desidera abilitare gli utenti alla Segnalazione dei Messaggi, scegliere s&igrave;.');
DEFINE('_KUNENA_REPORT_MSG', 'Messaggio segnalato');
DEFINE('_KUNENA_REPORT_REASON', 'Motivo');
DEFINE('_KUNENA_REPORT_MESSAGE', 'Il tuo messaggio');
DEFINE('_KUNENA_REPORT_SEND', 'Invia segnalazione');
DEFINE('_KUNENA_REPORT', 'Segnala a un moderatore');
DEFINE('_KUNENA_REPORT_RSENDER', 'Segnalazione inviata da: ');
DEFINE('_KUNENA_REPORT_RREASON', 'Motivo Segnalazione: ');
DEFINE('_KUNENA_REPORT_RMESSAGE', 'Segnalazione Messaggio: ');
DEFINE('_KUNENA_REPORT_POST_POSTER', 'Mittente Messaggio: ');
DEFINE('_KUNENA_REPORT_POST_SUBJECT', 'Oggetto Messaggio: ');
DEFINE('_KUNENA_REPORT_POST_MESSAGE', 'Messaggio: ');
DEFINE('_KUNENA_REPORT_POST_LINK', 'Link Messaggio: ');
DEFINE('_KUNENA_REPORT_INTRO', '&egrave; stato inviato un messaggio a causa di');
DEFINE('_KUNENA_REPORT_SUCCESS', 'Segnalazione inviata con successo!');
DEFINE('_KUNENA_EMOTICONS', 'Emoticons');
DEFINE('_KUNENA_EMOTICONS_SMILEY', 'Smile');
DEFINE('_KUNENA_EMOTICONS_CODE', 'Codice');
DEFINE('_KUNENA_EMOTICONS_URL', 'URL');
DEFINE('_KUNENA_EMOTICONS_EDIT_SMILEY', 'Modifica Smile');
DEFINE('_KUNENA_EMOTICONS_EDIT_SMILIES', 'Modifica Smile');
DEFINE('_KUNENA_EMOTICONS_EMOTICONBAR', 'Barra degli Emoticon');
DEFINE('_KUNENA_EMOTICONS_NEW_SMILEY', 'Nuovo Smile');
DEFINE('_KUNENA_EMOTICONS_MORE_SMILIES', 'Altri Smile');
DEFINE('_KUNENA_EMOTICONS_CLOSE_WINDOW', 'Chiudi finestra');
DEFINE('_KUNENA_EMOTICONS_ADDITIONAL_EMOTICONS', 'Altre Emoticon');
DEFINE('_KUNENA_EMOTICONS_PICK_A_SMILEY', 'Scegli uno smile');
DEFINE('_KUNENA_MAMBOT_SUPPORT', 'Supporto per Joomla Mambot');
DEFINE('_KUNENA_MAMBOT_SUPPORT_DESC', 'Abilita Supporto Joomla Mambot');
DEFINE('_KUNENA_MYPROFILE_PLUGIN_SETTINGS', 'Impostazioni plugin Mio Profilo');
DEFINE('_KUNENA_USERNAMECANCHANGE', 'Permetti modifica username');
DEFINE('_KUNENA_USERNAMECANCHANGE_DESC', 'Permetti di cambiare l\'username nella pagina Mio Profilo');
DEFINE ('_KUNENA_RECOUNTFORUMS','Riconta le Statistiche per Categoria');
DEFINE ('_KUNENA_RECOUNTFORUMS_DONE','Tutte le statistiche delle categorie sono state riconteggiate.');
DEFINE ('_KUNENA_EDITING_REASON','Motivo della modifica');
DEFINE ('_KUNENA_EDITING_LASTEDIT','Ultima modifica');
DEFINE ('_KUNENA_BY','Da');
DEFINE ('_KUNENA_REASON','Motivo');
DEFINE('_GEN_GOTOBOTTOM', 'Vai a fine pagina');
DEFINE('_GEN_GOTOTOP', 'Vai a inizio pagina');
DEFINE('_STAT_USER_INFO', 'Informazioni Utente');
DEFINE('_USER_SHOWEMAIL', 'Mostra Email'); // <=FB 1.0.3
DEFINE('_USER_SHOWONLINE', 'Mostra Online');
DEFINE('_KUNENA_HIDDEN_USERS', 'Utenti Nascosti');
DEFINE('_KUNENA_SAVE', 'Salva');
DEFINE('_KUNENA_RESET', 'Reimposta');
DEFINE('_KUNENA_DEFAULT_GALLERY', 'Galleria di Default');
DEFINE('_KUNENA_MYPROFILE_PERSONAL_INFO', 'Informazioni Personali');
DEFINE('_KUNENA_MYPROFILE_SUMMARY', 'Sommario');
DEFINE('_KUNENA_MYPROFILE_MYAVATAR', 'Il mio avatar');
DEFINE('_KUNENA_MYPROFILE_FORUM_SETTINGS', 'Impostazioni Forum');
DEFINE('_KUNENA_MYPROFILE_LOOK_AND_LAYOUT', 'Look e Layout');
DEFINE('_KUNENA_MYPROFILE_MY_PROFILE_INFO', 'Informazioni Mio Profilo');
DEFINE('_KUNENA_MYPROFILE_MY_POSTS', 'I miei messaggi');
DEFINE('_KUNENA_MYPROFILE_MY_SUBSCRIBES', 'Le mie sottoscrizioni');
DEFINE('_KUNENA_MYPROFILE_MY_FAVORITES', 'I miei favoriti');
DEFINE('_KUNENA_MYPROFILE_PRIVATE_MESSAGING', 'Pessaggi Privati');
DEFINE('_KUNENA_MYPROFILE_INBOX', 'Posta in arrivo');
DEFINE('_KUNENA_MYPROFILE_NEW_MESSAGE', 'Nuovo Messaggio');
DEFINE('_KUNENA_MYPROFILE_OUTBOX', 'Posta inviata');
DEFINE('_KUNENA_MYPROFILE_TRASH', 'Cestino');
DEFINE('_KUNENA_MYPROFILE_SETTINGS', 'Impostazioni');
DEFINE('_KUNENA_MYPROFILE_CONTACTS', 'Contatti');
DEFINE('_KUNENA_MYPROFILE_BLOCKEDLIST', 'Lista Bloccati');
DEFINE('_KUNENA_MYPROFILE_ADDITIONAL_INFO', 'Informazioni Aggiuntive');
DEFINE('_KUNENA_MYPROFILE_NAME', 'Nome');
DEFINE('_KUNENA_MYPROFILE_USERNAME', 'Nome Utente');
DEFINE('_KUNENA_MYPROFILE_EMAIL', 'Email');
DEFINE('_KUNENA_MYPROFILE_USERTYPE', 'Tipo Utente');
DEFINE('_KUNENA_MYPROFILE_REGISTERDATE', 'Data di Registrazione');
DEFINE('_KUNENA_MYPROFILE_LASTVISITDATE', 'Data ultima visita');
DEFINE('_KUNENA_MYPROFILE_POSTS', 'Messaggi');
DEFINE('_KUNENA_MYPROFILE_PROFILEVIEW', 'Vista profilo');
DEFINE('_KUNENA_MYPROFILE_PERSONALTEXT', 'Testo Personale');
DEFINE('_KUNENA_MYPROFILE_GENDER', 'Sesso');
DEFINE('_KUNENA_MYPROFILE_BIRTHDATE', 'Data di nascita');
DEFINE('_KUNENA_MYPROFILE_BIRTHDATE_DESC', 'Anno (YYYY) - Mese (MM) - Giorno (DD)');
DEFINE('_KUNENA_MYPROFILE_LOCATION', 'Localit&agrave;');
DEFINE('_KUNENA_MYPROFILE_ICQ', 'ICQ');
DEFINE('_KUNENA_MYPROFILE_ICQ_DESC', 'Questo &egrave; il tuo numero ICQ.');
DEFINE('_KUNENA_MYPROFILE_AIM', 'AIM');
DEFINE('_KUNENA_MYPROFILE_AIM_DESC', 'Questo &egrave; il tuo nickname AOL Instant Messenger.');
DEFINE('_KUNENA_MYPROFILE_YIM', 'YIM');
DEFINE('_KUNENA_MYPROFILE_YIM_DESC', 'Questo &egrave; il tuo nickname Yahoo! Instant Messenger.');
DEFINE('_KUNENA_MYPROFILE_SKYPE', 'SKYPE');
DEFINE('_KUNENA_MYPROFILE_SKYPE_DESC', 'Questo &egrave; il tuo nickname Skype.');
DEFINE('_KUNENA_MYPROFILE_GTALK', 'GTALK');
DEFINE('_KUNENA_MYPROFILE_GTALK_DESC', 'Questo &egrave; il tuo nickname Gtalk.');
DEFINE('_KUNENA_MYPROFILE_WEBSITE', 'Sito Web');
DEFINE('_KUNENA_MYPROFILE_WEBSITE_NAME', 'Nome Sito Web');
DEFINE('_KUNENA_MYPROFILE_WEBSITE_NAME_DESC', 'Esempio: Areseonline.it!');
DEFINE('_KUNENA_MYPROFILE_WEBSITE_URL', 'URL Sito Web');
DEFINE('_KUNENA_MYPROFILE_WEBSITE_URL_DESC', 'Esempio: www.areseonline.it');
DEFINE('_KUNENA_MYPROFILE_MSN', 'MSN');
DEFINE('_KUNENA_MYPROFILE_MSN_DESC', 'Indirizzo email di MSN messenger.');
DEFINE('_KUNENA_MYPROFILE_SIGNATURE', 'Firma');
DEFINE('_KUNENA_MYPROFILE_MALE', 'Maschio');
DEFINE('_KUNENA_MYPROFILE_FEMALE', 'Femmina');
DEFINE('_KUNENA_BULKMSG_DELETED', 'I messaggi sono stati eliminati con successo.');
DEFINE('_KUNENA_DATE_YEAR', 'Anno');
DEFINE('_KUNENA_DATE_MONTH', 'Mese');
DEFINE('_KUNENA_DATE_WEEK','Settimana');
DEFINE('_KUNENA_DATE_DAY', 'Giorno');
DEFINE('_KUNENA_DATE_HOUR', 'Ora');
DEFINE('_KUNENA_DATE_MINUTE', 'Minuti');
DEFINE('_KUNENA_IN_FORUM', ' nel Forum: ');
DEFINE('_KUNENA_FORUM_AT', ' Forum a: ');
DEFINE('_KUNENA_QMESSAGE_NOTE', 'Si prega di notare, anche se non sono indicati i pulsanti codice di discussione e smile, sono ancora utilizzabili');

// 1.0.1
DEFINE ('_KUNENA_FORUMTOOLS','Strumenti Forum');

//userlist
DEFINE ('_KUNENA_USRL_USERLIST','Lista Utenti');
DEFINE ('_KUNENA_USRL_REGISTERED_USERS','%s ha <b>%d</b> utenti registrati');
DEFINE ('_KUNENA_USRL_SEARCH_ALERT','Per favore inserire una valore di ricerca!');
DEFINE ('_KUNENA_USRL_SEARCH','Cerca Utente');
DEFINE ('_KUNENA_USRL_SEARCH_BUTTON','Cerca');
DEFINE ('_KUNENA_USRL_LIST_ALL','Visualizza tutti');
DEFINE ('_KUNENA_USRL_NAME','Nome');
DEFINE ('_KUNENA_USRL_USERNAME','Nome utente');
DEFINE ('_KUNENA_USRL_GROUP','Gruppo');
DEFINE ('_KUNENA_USRL_POSTS','Messaggi');
DEFINE ('_KUNENA_USRL_KARMA','Karma');
DEFINE ('_KUNENA_USRL_HITS','Hits');
DEFINE ('_KUNENA_USRL_EMAIL','E-mail');
DEFINE ('_KUNENA_USRL_USERTYPE','Tipo Utente');
DEFINE ('_KUNENA_USRL_JOIN_DATE','Data inizio');
DEFINE ('_KUNENA_USRL_LAST_LOGIN','Ultimo accesso');
DEFINE ('_KUNENA_USRL_NEVER','Mai');
DEFINE ('_KUNENA_USRL_ONLINE','Stato');
DEFINE ('_KUNENA_USRL_AVATAR','Foto');
DEFINE ('_KUNENA_USRL_ASC','Ascendente');
DEFINE ('_KUNENA_USRL_DESC','Discendente');
DEFINE ('_KUNENA_USRL_DISPLAY_NR','Visualizza');
DEFINE ('_KUNENA_USRL_DATE_FORMAT','%d.%m.%Y');

DEFINE('_KUNENA_ADMIN_CONFIG_PLUGINS','Plugins');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST','Lista Utenti');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_ROWS_DESC','Numero di righe per Lista Utenti.');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_ROWS','Numero di righe per Lista Utenti');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERONLINE','Stato Online');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERONLINE_DESC','Visualizza stato utente online.');

DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_AVATAR','Visualizza Avatar');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERLIST_AVATAR_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_NAME','Visualizza Nome Reale');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_name_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERNAME','Visualizza Nome Utente');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERNAME_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_GROUP','Visualizza Gruppo Utente');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_GROUP_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_POSTS','Visualizza numero dei messaggi');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_POSTS_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_KARMA','Visualizza Karma');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_KARMA_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_EMAIL','Visualizza Email');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_EMAIL_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERTYPE','Visualizza Tipo Utente');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERTYPE_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_JOINDATE','Visualizza data inizio');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_JOINDATE_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_LASTVISITDATE','Visualizza data ultima Visita');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_LASTVISITDATE_DESC','');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_HITS','Visualizza Hits al Profilo');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_HITS_DESC','');
DEFINE('_KUNENA_DBWIZ', 'Wizard Database ');
DEFINE('_KUNENA_DBMETHOD', 'Per favore selezionare quale metodo si vuole usare per completare l\'installazione:');
DEFINE('_KUNENA_DBCLEAN', 'Pulizia e nuova installazione');

DEFINE('_KUNENA_DBUPGRADE', 'Upgrade da Joomlaboard');
DEFINE('_KUNENA_TOPLEVEL', 'Categoria Principale');
DEFINE('_KUNENA_REGISTERED', 'Registrato');
DEFINE('_KUNENA_PUBLICBACKEND', 'Back-end pubblico');
DEFINE('_KUNENA_SELECTANITEMTO', 'Selezionare un elemento per');
DEFINE('_KUNENA_ERRORSUBS', 'Si &egrave; verificato un errore durante la fase di cancellazione dei messaggi e delle sottoscrizioni');
DEFINE('_KUNENA_WARNING', 'Attenzione...');
DEFINE('_KUNENA_CHMOD1', 'E\' necessario impostare chmod a 766 per permettere che il file venga aggiornato.');
DEFINE('_KUNENA_YOURCONFIGFILEIS', 'Il tuo file di configurazione &egrave;');
DEFINE('_KUNENA_KUNENA', 'Kunena');
DEFINE('_KUNENA_CLEXUS', 'Clexus PM');
DEFINE('_KUNENA_CB', 'Community Builder');
DEFINE('_KUNENA_MYPMS', 'myPMS II Open Source');
DEFINE('_KUNENA_UDDEIM', 'Uddeim');
DEFINE('_KUNENA_JIM', 'JIM');
DEFINE('_KUNENA_MISSUS', 'Missus');
DEFINE('_KUNENA_SELECTTEMPLATE', 'Scegli modello');
DEFINE('_KUNENA_CONFIGNOTSAVED', 'ERRORE FATALE: La configurazione nonpu&ograve; ezssere salvata');
DEFINE('_KUNENA_CONFIGSAVED', 'Configurazione salvata.');
DEFINE('_KUNENA_CFNW', 'ERRORE FATALE: Il file di configurazione non &egrave; scrivibile');
DEFINE('_KUNENA_TFINW', 'Il file non &egrave; scrivibile.');
DEFINE('_KUNENA_FBCFS', 'Il file CSS di Kunena &egrave; stato salvato.');
DEFINE('_KUNENA_SELECTMODTO', 'Selezionare un moderatore per');
DEFINE('_KUNENA_CHOOSEFORUMTOPRUNE', 'Occorre scegliere un forum da snellire!');
DEFINE('_KUNENA_DELMSGERROR', 'Eliminazione messagggi fallita:');
DEFINE('_KUNENA_DELMSGERROR1', 'Eliminazione dei testi dei messaggi fallita:');
DEFINE('_KUNENA_CLEARSUBSFAIL', 'Eliminazione delle sottoscrizioni fallita:');
DEFINE('_KUNENA_FORUMPRUNEDFOR', 'Forum snellito per');
DEFINE('_KUNENA_PRUNEDAYS', 'giorni');
DEFINE('_KUNENA_PRUNEDELETED', 'Eliminati: ');
DEFINE('_KUNENA_PRUNETHREADS', 'discussioni');
DEFINE('_KUNENA_ERRORPRUNEUSERS', 'Errore nello snellimento utenti:');
DEFINE('_KUNENA_USERSPRUNEDDELETED', 'Utenti snelliti; Eliminati: '); // <=FB 1.0.3
DEFINE('_KUNENA_PRUNEUSERPROFILES', 'profili utenti'); // <=FB 1.0.3
DEFINE('_KUNENA_NOPROFILESFORPRUNNING', 'Non sono stati trovati profili da snellire.'); // <=FB 1.0.3
DEFINE('_KUNENA_TABLESUPGRADED', 'Le Tabelle di Kunena sono state aggiornate alla versione');
DEFINE('_KUNENA_FORUMCATEGORY', 'Categoria Forum');
DEFINE('_KUNENA_SAMPLWARN1', '-- Accertarsi che le tabelle di Kunena, nelle quali intendi caricare i dati di esempio, non contengano dati. In caso contrario l\'operazione non andr&agrave a buon fine!');
DEFINE('_KUNENA_FORUM1', 'Forum 1');
DEFINE('_KUNENA_SAMPLEPOST1', 'Esempio Messaggio 1');
DEFINE('_KUNENA_SAMPLEFORUM11', 'Esempio Forum 1\r\n');
DEFINE('_KUNENA_SAMPLEPOST11', '[b][size=4][color=#FF6600]Esempio Messaggio[/color][/size][/b]\nCongratulazioni con il tuo nuovo Forum!\n\n[url=http://www.areseonline.it]- Il meglio di Arese[/url]');
DEFINE('_KUNENA_SAMPLESUCCESS', 'Dati di esempio caricati');
DEFINE('_KUNENA_SAMPLEREMOVED', 'Dati di esempio rimossi');
DEFINE('_KUNENA_CBADDED', 'Creazione Profilo Community Builder aggiunto');
DEFINE('_KUNENA_IMGDELETED', 'Immagine eliminata');
DEFINE('_KUNENA_FILEDELETED', 'File eliminato');
DEFINE('_KUNENA_NOPARENT', 'Non ci sono capogruppi');
DEFINE('_KUNENA_DIRCOPERR', 'Errore: Il File');
DEFINE('_KUNENA_DIRCOPERR1', 'non pu&ograve; essere copiato!\n');
DEFINE('_KUNENA_INSTALL1', 'Componente <strong>Forum Kunena</strong><em>per Joomla! CMS</em> <br />&copy; 2006 - 2008 by Best Of Joomla<br />All rights reserved.');
DEFINE('_KUNENA_INSTALL2', 'Trasferimento/Installazione :</code></strong><br /><br /><font color="red"><b>avvenuto con successo');
// added by aliyar 
DEFINE('_KUNENA_FORUMPRF_TITLE', 'Impostazioni Profilo');
DEFINE('_KUNENA_FORUMPRF', 'Profilo');
DEFINE('_KUNENA_FORUMPRRDESC', 'Se hai installato il componente Clexus PM o il componente Community Builder, puoi configurare Kunena per usare la pagina profilo utente.');
DEFINE('_KUNENA_USERPROFILE_PROFILE', 'Profilo');
DEFINE('_KUNENA_USERPROFILE_PROFILEHITS', '<b>Visite al Profilo</b>');
DEFINE('_KUNENA_USERPROFILE_MESSAGES', 'Tutti i Messaggi del Forum');
DEFINE('_KUNENA_USERPROFILE_TOPICS', 'Argomento');
DEFINE('_KUNENA_USERPROFILE_STARTBY', 'Avviato da');
DEFINE('_KUNENA_USERPROFILE_CATEGORIES', 'Categorie');
DEFINE('_KUNENA_USERPROFILE_DATE', 'Data');
DEFINE('_KUNENA_USERPROFILE_HITS', 'Hits');
DEFINE('_KUNENA_USERPROFILE_NOFORUMPOSTS', 'Nessun messaggio nel Forum');
DEFINE('_KUNENA_TOTALFAVORITE', 'Favoriti:  ');
DEFINE('_KUNENA_SHOW_CHILD_CATEGORY_COLON', 'Numero delle colonne per le discusioni derivate  ');
DEFINE('_KUNENA_SHOW_CHILD_CATEGORY_COLONDESC', 'Numero delle colonne per le discussioni derivate per la formattazione sotto la Categoria Principale ');
DEFINE('_KUNENA_SUBSCRIPTIONSCHECKED', 'Sottoscrizione attivata per default?');
DEFINE('_KUNENA_SUBSCRIPTIONSCHECKED_DESC', 'Impostare su "S&igrave;" se si desidera che la casella per la sottoscrizione sia sempre selezionata');
// Errors (Re-integration from Joomlaboard 1.2)
DEFINE('_KUNENA_ERROR1', 'La Categoria / Il Forum deve avere un nome');
// Forum Configuration (Novità in Kunena)
DEFINE('_KUNENA_SHOWSTATS', 'Mostra statistiche');
DEFINE('_KUNENA_SHOWSTATSDESC', 'Se si desidera mostrare le statistiche, selezionare S&igrave;');
DEFINE('_KUNENA_SHOWWHOIS', 'Mostra chi c\'&egrave; Online');
DEFINE('_KUNENA_SHOWWHOISDESC', 'Se si desidera mostrare chi c\'&egrave; Online, selezionare S&igrave;');
DEFINE('_KUNENA_STATSGENERAL', 'Mostra statistiche generali');
DEFINE('_KUNENA_STATSGENERALDESC', 'Se si desidera mostrare le Statistiche Generali,selezionare S&igrave;');
DEFINE('_KUNENA_USERSTATS', 'Mostra statistiche sugli utenti pi&ugrave; Popolari');
DEFINE('_KUNENA_USERSTATSDESC', 'Se si desidera mostrare le Statistiche degli Utenti pi&ugrave; Popolari, selezionare S&igrave;');
DEFINE('_KUNENA_USERNUM', 'Numero degli Utenti pi&ugrave; Popolari');
DEFINE('_KUNENA_USERPOPULAR', 'Mostra statistiche sugli Argomenti pi&ugrave; Popolari');
DEFINE('_KUNENA_USERPOPULARDESC', 'Se si desidera mostrare le Statistiche sugli Argomenti pi&ugrave; Popolari, selezionare S&igrave;');
DEFINE('_KUNENA_NUMPOP', 'Numero degli Argomenti pi&ugrave; popolari');
DEFINE('_KUNENA_INFORMATION',
    'Best of Joomla team is proud to announce the release of Kunena 1.0.0. It is a powerful and stylish forum component for a well deserved content management system, Joomla!. It is initially based on the hard work of Joomlaboard team and most of our praises goes to their team.Some of the main features of Kunena can be listed as below (in addition to JB&#39;s current features):<br /><br /><ul><li>A much more designer friendly forum system. It is close to SMF templating system having a simpler structue. With very few steps you can modify the total look of the forum. Thanks goes to the great designers in our team.</li><li>Unlimited subcategory system with better administration backend.</li><li>Faster system and better coding experience for 3rd parties.</li><li>The same<br /></li><li>Profilebox at the top of the forum</li><li>Support for popular PM systems, such as ClexusPM and Uddeim</li><li>Basic plugin system (practical rather than perfec)</li><li>Language-defined icon system.<br /></li><li>Sharing image system of other templates. So, choice between templates and image series is possible</li><li>You can add joomla modules inside the forum template itself. Wanted to have banner inside your forum?</li><li>Favourite threads selection and management</li><li>Forum spotlights and highlights</li><li>Forum announcements and its panel</li><li>Latest messages (Tabbed)</li><li>Statistics at bottom</li><li>Who&#39;s online, on what page?</li><li>Category specific image system</li><li>Enhanced pathway</li><li><strong>Joomlaboard import, SMF in plan to be releaed pretty soon</strong></li><li>RSS, PDF output</li><li>Advanced search (under developement)</li><li>Community Builder and Clexus PM profile options</li><li>Avatar management : CB and Clexus PM options<br /></li></ul><br />Please keep in mind that this release is not meant to be used on production sites, even though we have tested it through. We are planning to continue to work on this project, as it is used on our several projects, and we would be pleased if you could join us to bring a bridge-free solution to Joomla! forums.<br /><br />This is a collaborative work of several developers and designers that have kindly participated and made this release come true. Here we thank all of them and wish that you enjoy this release!<br /><br />Best of Joomla! team<br /></td></tr></table>');
DEFINE('_KUNENA_INSTRUCTIONS', 'Istruzioni');
DEFINE('_KUNENA_FINFO', 'Informazioni su Kunena Forum');
DEFINE('_KUNENA_CSSEDITOR', 'Editor Modello CSS di Kunena');
DEFINE('_KUNENA_PATH', 'Percorso:');
DEFINE('_KUNENA_CSSERROR', 'Nota: Il file del Modello CSS deve essere scrivibile per permettere le modifiche.');
// User Management
DEFINE('_KUNENA_FUM', 'Gestore dei Profili Utenti di Kunena');
DEFINE('_KUNENA_SORTID', 'ordina per id Utente');
DEFINE('_KUNENA_SORTMOD', 'ordina per moderatore');
DEFINE('_KUNENA_SORTNAME', 'ordina per nome');
DEFINE('_KUNENA_VIEW', 'Vista');
DEFINE('_KUNENA_NOUSERSFOUND', 'Non &egrave; stato trovato alcun profilo utente.');
DEFINE('_KUNENA_ADDMOD', 'Aggiungi Moderatore a');
DEFINE('_KUNENA_NOMODSAV', 'Non &egrave; stato possibile trovare moderatori. Leggere la \'nota\' che segue.');
DEFINE('_KUNENA_NOTEUS',
    'NOTA: Solo gli utenti che hanno la spunta moderatore impostata nel Profilo di Kunena sono mostrati qui. Per abilitare un utente a moderatore spuntare la relativa casella, vai a  <a href="index2.php?option=com_Kunena&task=profiles">Amministrazione Utenti</a> e cercare l\'utente che si desidera abilitare a moderatore. Quindi selezionarlo e aggiornare le modifiche. I moderatori possono essere abilitati solo da un amministratore. ');
DEFINE('_KUNENA_PROFFOR', 'Profilo di');
DEFINE('_KUNENA_GENPROF', 'Opzioni Generali Profilo');
DEFINE('_KUNENA_PREFVIEW', 'Visualizzazione preferita:');
DEFINE('_KUNENA_PREFOR', 'Ordinamento preferito messaggi:');
DEFINE('_KUNENA_ISMOD', 'E\' un Moderatore:');
DEFINE('_KUNENA_ISADM', '<strong>S&igrave;</strong> (non modificabile, questo utente &egrave; un super-administrator.)');
DEFINE('_KUNENA_COLOR', 'Colore');
DEFINE('_KUNENA_UAVATAR', 'Avatar Utente:');
DEFINE('_KUNENA_NS', 'Nessuno selezionato');
DEFINE('_KUNENA_DELSIG', ' spuntare questa casella per eliminare la firma');
DEFINE('_KUNENA_DELAV', ' spuntare questa casella per eliminare questo Avatar');
DEFINE('_KUNENA_SUBFOR', 'Sottoscrizioni di');
DEFINE('_KUNENA_NOSUBS', 'Non sono state trovate sottoscrizioni per questo utente');
// Forum Administration (Re-integration from Joomlaboard 1.2)
DEFINE('_KUNENA_BASICS', 'Generali');
DEFINE('_KUNENA_BASICSFORUM', 'Informazione di Base del Forum');
DEFINE('_KUNENA_PARENT', 'Superiore:');
DEFINE('_KUNENA_PARENTDESC',
    'Nota: Per creare una Categoria, scegliere \'Categoria Principale\' come categoria superiore. Una Categoria rappresenta un contenitore nei Forum.<br />Un Forum pu&ograve; essere creato <strong>solo</strong> all\'interno di una Categoria selezionata in una Categoria precedentemente creata per il Forum.<br /> I messaggi <strong>non possono</strong> essere inviati a una Categoria, ma solo in un Forum.');
DEFINE('_KUNENA_BASICSFORUMINFO', 'Nome e descrizione del Forum');
DEFINE('_KUNENA_NAMEADD', 'Nome:');
DEFINE('_KUNENA_DESCRIPTIONADD', 'Descrizione:');
DEFINE('_KUNENA_ADVANCEDDESC', 'Configurazione Avanzata del Forum');
DEFINE('_KUNENA_ADVANCEDDESCINFO', 'Sicurezza e Accesso al Forum');
DEFINE('_KUNENA_LOCKEDDESC', 'Impostare su &quot;S&igrave;&quot; se si desidera bloccare questo Forum: Nessuno, eccetto i Moderatori e gli Amministratori pu&ograve; creare nuovi argomenti o rispondere in un Forum bloccato (o spostare messaggi in esso).');
DEFINE('_KUNENA_LOCKED1', 'Bloccato:');
DEFINE('_KUNENA_PUBACC', 'Livello di Accesso Pubblico:');
DEFINE('_KUNENA_PUBACCDESC',
    'Per creare un Forum Privato si pu&ograve; specificare il livello minimo del livello utente che pu&ograve; visualizzare e utilizzare il Forum. L\'impostazione di default per il livello minimo utente &egrave; &quot;Tutti&quot;.<br /><b>Nota:</b> se si applica la restrizione a un\'intera Categoria a uno o pi&ugrave; gruppi, tutti i Forum in esso contenuti saranno nascosti a chi non possiede i privilegi necessari <b>anche</b> se uno o pi&ugrave; Forum hanno un basso livello di accesso! Questo vale anche per i Moderatori; si dovr&agrave; aggiungere un Moderatore alla lista dei moderatori di una Categoria, se non ha il livello di gruppo appropriato per vedere la Categoria.<br /> Questo &egrave; indipendente dal fatto che le Categorie non possono essere moderate; i Moderatori possono essere aggiunti in ogni momento alla lista dei moderatori.');
DEFINE('_KUNENA_CGROUPS', 'Includi i sottogruppi:');
DEFINE('_KUNENA_CGROUPSDESC', 'Deve essere consentito l\'accesso ai sottogruppi?  Se impostato a  &quot;No&quot; l\'accesso a questo Forum sar&agrave; ristretto ai <b>soli</b> gruppi selezionati');
DEFINE('_KUNENA_ADMINLEVEL', 'Livello di Accesso Amministratori:');
DEFINE('_KUNENA_ADMINLEVELDESC',
    'Se si crea un Forum con restrizioni di Accesso Pubblico, si pu&ograve; specificare qui un livello di Accesso addizionale per l\'Amministrazione.<br /> Se si restringe l\'accesso al Forum a un gruppo speciale di Utenti e non si specifica un Gruppo di Utenti Pubblico qui, gli Amministratori non saranno in grado di vedere ed utilizzare il Forum.');
DEFINE('_KUNENA_ADVANCED', 'Avanzate');
DEFINE('_KUNENA_CGROUPS1', 'Includi i sottogruppi:');
DEFINE('_KUNENA_CGROUPS1DESC', 'Deve essere consentito l\'accesso ai sottogruppi?  Se impostato a  &quot;No&quot; l\'accesso a questo Forum sar&agrave; ristretto ai <b>soli</b> gruppi selezionati');
DEFINE('_KUNENA_REV', 'Moderazione messaggi:');
DEFINE('_KUNENA_REVDESC',
    'Impostare su &quot;S&igrave;&quot; se si desidera che i messaggi siano verificati da un Moderatore prima che questi siano pubblicati in questo Forum. Utile solo se il Forum &egrave; moderato!<br />Se si imposta questo senza un Moderatore specifico, l\'Amministratore del Sito sar&agrave; l\'unico responsabile per l\'approvazione o l\'eliminazione dei messaggi inviati e che saranno tenuti in \'sospeso\' fino all\'approvazione!');
DEFINE('_KUNENA_MOD_NEW', 'Moderazione');
DEFINE('_KUNENA_MODNEWDESC', 'Moderazione e Moderatori del Forum');
DEFINE('_KUNENA_MOD', 'Moderato:');
DEFINE('_KUNENA_MODDESC',
    'Impostare su &quot;S&igrave;&quot; se si desidera abilitare l\'assegnazione di Moderatore su questo Forum.<br /><strong>Nota:</strong> Questo non significa che i nuovi messaggi devono essere riesaminati prima della pubblicazione sul Forum!<br /> Per questo sar&agrave; necessario impostare l\'opzione &quot;Revisione&quot; nella scheda avanzate.<br /><br /> <strong>Prendere buona nota:</strong> Dopo avere impostato la Moderazione a &quot;S&igrave;&quot; occorre salvare, prima di tutto, la configurazione del Forum prima di poter essere abilitati ad aggiungere nuovi Moderatori utilizzando il pulsante nuovo.');
DEFINE('_KUNENA_MODHEADER', 'Impostazioni moderarazione per il forum');
DEFINE('_KUNENA_MODSASSIGNED', 'Moderatori assegnati a questo Forum:');
DEFINE('_KUNENA_NOMODS', 'Non ci sono Moderatori assegnati a questo Forum');
// Some General Strings (Improvement in Kunena)
DEFINE('_KUNENA_EDIT', 'Modifica');
DEFINE('_KUNENA_ADD', 'Aggiungi');
// Reorder (Re-integration from Joomlaboard 1.2)
DEFINE('_KUNENA_MOVEUP', 'Sposta su');
DEFINE('_KUNENA_MOVEDOWN', 'Sposta gi&ugrave;');
// Groups - Integration in Kunena
DEFINE('_KUNENA_ALLREGISTERED', 'Utenti Registrati');
DEFINE('_KUNENA_EVERYBODY', 'Tutti');
// Removal of hardcoded strings in admin panel (Re-integration from Joomlaboard 1.2)
DEFINE('_KUNENA_REORDER', 'Riordina');
DEFINE('_KUNENA_CHECKEDOUT', 'Check Out');
DEFINE('_KUNENA_ADMINACCESS', 'Accesso Amministratore');
DEFINE('_KUNENA_PUBLICACCESS', 'Accesso Pubblico');
DEFINE('_KUNENA_PUBLISHED', 'Pubblicato');
DEFINE('_KUNENA_REVIEW', 'Revisione');
DEFINE('_KUNENA_MODERATED', 'Moderato');
DEFINE('_KUNENA_LOCKED', 'Bloccato');
DEFINE('_KUNENA_CATFOR', 'Categoria / Forum');
DEFINE('_KUNENA_ADMIN', 'Amministrazione Kunena');
DEFINE('_KUNENA_CP', 'Pannello di Controllo Kunena');
// Configuration page - Headings (Re-integrated from Joomlaboard 1.2)
DEFINE('_COM_A_AVATAR_INTEGRATION', 'Integrazione Avatar');
DEFINE('_COM_A_RANKS_SETTINGS', 'Ranks');
DEFINE('_COM_A_RANKING_SETTINGS', 'Impostazioni Ranks');
DEFINE('_COM_A_AVATAR_SETTINGS', 'Impostazioni Avatar');
DEFINE('_COM_A_SECURITY_SETTINGS', 'Impostazioni di Sicurezza');
DEFINE('_COM_A_BASIC_SETTINGS', 'Impostazioni di Base');
// Kunena 1.0.0
//
DEFINE('_COM_A_FAVORITES', 'Permetti Preferiti');
DEFINE('_COM_A_FAVORITES_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera permettere agli utenti registrati di segnare i loro Argomenti preferiti ');
DEFINE('_USER_UNFAVORITE_ALL', 'Spuntare questa casella per rimuovere i <b><u>preferiti</u></b> da tutti gli Argomenti (inclusi quelli invisibili per riparazione)');
DEFINE('_VIEW_FAVORITETXT', 'Aggiungi agli Argomenti preferiti');
DEFINE('_USER_UNFAVORITE_YES', 'Hai rimosso questo Argomento dai preferiti');
DEFINE('_POST_FAVORITED_TOPIC', 'L\'Argomento &egrave; stato aggiunto ai preferiti.');
DEFINE('_VIEW_UNFAVORITETXT', 'Rimuovi dai Preferiti');
DEFINE('_VIEW_UNSUBSCRIBETXT', 'Cancella la sottoscrizione');
DEFINE('_USER_NOFAVORITES', 'Nessun Preferito');
DEFINE('_POST_SUCCESS_FAVORITE', 'Il messaggio &egrave; stato aggiutno ai Preferiti.');
DEFINE('_COM_A_MESSAGES_SEARCH', 'Risultati Ricerca');
DEFINE('_COM_A_MESSAGES_DESC_SEARCH', 'Messaggi per pagina nei risultati della Ricerca');
DEFINE('_KUNENA_USE_JOOMLA_STYLE', 'Usare lo stile Joomla?');
DEFINE('_KUNENA_USE_JOOMLA_STYLE_DESC', 'Se si desidera usare lo stile Joomla impostare a S&igrave;. (class: like sectionheader, sectionentry1 ...) ');
DEFINE('_KUNENA_SHOW_CHILD_CATEGORY_ON_LIST', 'Mostra immagine delle sottocategorie');
DEFINE('_KUNENA_SHOW_CHILD_CATEGORY_ON_LIST_DESC', 'Se si desidera visualizzare un\'icona delle sottocategorie nella lista del tuo Forum, impostare a S&igrave;. ');
DEFINE('_KUNENA_SHOW_ANNOUNCEMENT', 'Visualizza Annunci');
DEFINE('_KUNENA_SHOW_ANNOUNCEMENT_DESC', 'Impostare a "S&igrave;" , se si desidera visualizzare il riquadro degli Annunci nella Home Page del Forum.');
DEFINE('_KUNENA_SHOW_AVATAR_ON_CAT', 'Visualizzare l\'Avatar nella lista delle Categorie?');
DEFINE('_KUNENA_SHOW_AVATAR_ON_CAT_DESC', 'Impostare a  "S&igrave;" , se si desidera visualizzare l\'Avatar utente nella lista delle categorie del Forum.');
DEFINE('_KUNENA_RECENT_POSTS', 'Impostazione Messaggi Recenti');
DEFINE('_KUNENA_SHOW_LATEST_MESSAGES', 'Mostra Messaggi Recenti');
DEFINE('_KUNENA_SHOW_LATEST_MESSAGES_DESC', 'Impostare a "S&igrave;" se si desidera visualizzare i messaggi recenti inviati al Forum');
DEFINE('_KUNENA_NUMBER_OF_LATEST_MESSAGES', 'Numero di Messaggi Recenti');
DEFINE('_KUNENA_NUMBER_OF_LATEST_MESSAGES_DESC', 'Numero di Messaggi Recenti');
DEFINE('_KUNENA_COUNT_PER_PAGE_LATEST_MESSAGES', 'Conteggio per scheda ');
DEFINE('_KUNENA_COUNT_PER_PAGE_LATEST_MESSAGES_DESC', 'Numero dei messaggi per ogni scheda');
DEFINE('_KUNENA_LATEST_CATEGORY', 'Mostra Categoria');
DEFINE('_KUNENA_LATEST_CATEGORY_DESC', 'Specifica le categorie che si possono visualizzare nei messaggi recenti. Per esempio: 2,3,7 ');
DEFINE('_KUNENA_SHOW_LATEST_SINGLE_SUBJECT', 'Mostra singolo oggetto');
DEFINE('_KUNENA_SHOW_LATEST_SINGLE_SUBJECT_DESC', 'Mostra singolo oggetto');
DEFINE('_KUNENA_SHOW_LATEST_REPLY_SUBJECT', 'Mostra risposta oggetto');
DEFINE('_KUNENA_SHOW_LATEST_REPLY_SUBJECT_DESC', 'Mostra risposta oggetto (Re:)');
DEFINE('_KUNENA_LATEST_SUBJECT_LENGTH', 'Lunghezza Oggetto');
DEFINE('_KUNENA_LATEST_SUBJECT_LENGTH_DESC', 'Lunghezza Oggetto');
DEFINE('_KUNENA_SHOW_LATEST_DATE', 'Mostra la Data');
DEFINE('_KUNENA_SHOW_LATEST_DATE_DESC', 'Mostra la Data');
DEFINE('_KUNENA_SHOW_LATEST_HITS', 'Mostra Hits');
DEFINE('_KUNENA_SHOW_LATEST_HITS_DESC', 'Mostra Hits');
DEFINE('_KUNENA_SHOW_AUTHOR', 'Mostra Autore');
DEFINE('_KUNENA_SHOW_AUTHOR_DESC', '1=Nome Utente, 2=Nome Reale, 0=Nessuno');
DEFINE('_KUNENA_STATS', 'Impostazioni Plugin Statistiche ');
DEFINE('_KUNENA_CATIMAGEPATH', 'Percorso delle Immagini Categoria ');
DEFINE('_KUNENA_CATIMAGEPATH_DESC', 'Percorso delle Immagini Categoria. Se si imposta "category_images/" il percorso sar&agrave; "your_html_rootfolder/images/fbfiles/category_images/');
DEFINE('_KUNENA_ANN_MODID', 'IDs Annunci Moderatori');
DEFINE('_KUNENA_ANN_MODID_DESC', 'Aggiungere id utenti per moderazione annunci. Es. 62,63,73 . I Moderatori degli Annunci possono aggiungere, modificare e eliminare gli annunci.');
//
DEFINE('_KUNENA_FORUM_TOP', 'Categorie Forum ');
DEFINE('_KUNENA_CHILD_BOARDS', 'Sottocategorie Forum ');
DEFINE('_KUNENA_QUICKMSG', 'Risposta Rapida ');
DEFINE('_KUNENA_THREADS_IN_FORUM', 'Discussioni nel Forum ');
DEFINE('_KUNENA_FORUM', 'Forum ');
DEFINE('_KUNENA_SPOTS', 'In Evidenza');
DEFINE('_KUNENA_CANCEL', 'cancella');
DEFINE('_KUNENA_TOPIC', 'ARGOMENTO: ');
DEFINE('_KUNENA_POWEREDBY', 'Traduzione Italiana by <a href="http://www.travelling.it">www.travelling.it</a>   Powered by ');
// Time Format
DEFINE('_TIME_TODAY', '<b>Oggi</b> ');
DEFINE('_TIME_YESTERDAY', '<b>Ieri</b> ');
//  STARTS HERE!
DEFINE('_KUNENA_WHO_LATEST_POSTS', 'Ultimi Messaggi');
DEFINE('_KUNENA_WHO_WHOISONLINE', 'Chi c\'&egrave; Online');
DEFINE('_KUNENA_WHO_MAINPAGE', 'Principale Forum');
DEFINE('_KUNENA_GUEST', 'Ospite');
DEFINE('_KUNENA_PATHWAY_VIEWING', 'Online');
DEFINE('_KUNENA_ATTACH', 'Allegato');
// Favorite
DEFINE('_KUNENA_FAVORITE', 'Preferito');
DEFINE('_USER_FAVORITES', 'I tuoi Preferiti');
DEFINE('_THREAD_UNFAVORITE', 'Rimuovi dai Preferiti');
// profilebox
DEFINE('_PROFILEBOX_WELCOME', 'Benvenuto');
DEFINE('_PROFILEBOX_SHOW_LATEST_POSTS', 'Mostra ultimi messaggi');
DEFINE('_PROFILEBOX_SET_MYAVATAR', 'Imposta il mio Avatar');
DEFINE('_PROFILEBOX_MYPROFILE', 'Il mio Profilo');
DEFINE('_PROFILEBOX_SHOW_MYPOSTS', 'Mostra i miei messaggi');
DEFINE('_PROFILEBOX_GUEST', 'Ospite');
DEFINE('_PROFILEBOX_LOGIN', 'Accedi');
DEFINE('_PROFILEBOX_REGISTER', 'Registrati');
DEFINE('_PROFILEBOX_LOGOUT', 'Logout');
DEFINE('_PROFILEBOX_LOST_PASSWORD', 'Password dimenticata?');
DEFINE('_PROFILEBOX_PLEASE', 'Per favore');
DEFINE('_PROFILEBOX_OR', 'o');
// recentposts
DEFINE('_RECENT_RECENT_POSTS', 'Messaggi recenti');
DEFINE('_RECENT_TOPICS', 'Argomento');
DEFINE('_RECENT_AUTHOR', 'Autore');
DEFINE('_RECENT_CATEGORIES', 'Categorie');
DEFINE('_RECENT_DATE', 'Data');
DEFINE('_RECENT_HITS', 'Hits');
// announcement

DEFINE('_ANN_ANNOUNCEMENTS', 'Annunci');
DEFINE('_ANN_ID', 'ID');
DEFINE('_ANN_DATE', 'Data');
DEFINE('_ANN_TITLE', 'Titolo');
DEFINE('_ANN_SORTTEXT', 'Testo breve');
DEFINE('_ANN_LONGTEXT', 'Testo completo');
DEFINE('_ANN_ORDER', 'Ordina');
DEFINE('_ANN_PUBLISH', 'Pubblica');
DEFINE('_ANN_PUBLISHED', 'Pubblicato');
DEFINE('_ANN_UNPUBLISHED', 'Non pubblicato');
DEFINE('_ANN_EDIT', 'Modifica');
DEFINE('_ANN_DELETE', 'Elimina');
DEFINE('_ANN_SUCCESS', 'Successo');
DEFINE('_ANN_SAVE', 'Salva');
DEFINE('_ANN_YES', 'S&igrave;');
DEFINE('_ANN_NO', 'No');
DEFINE('_ANN_ADD', 'Aggiungi nuovo');
DEFINE('_ANN_SUCCESS_EDIT', 'Modifica completata');
DEFINE('_ANN_SUCCESS_ADD', 'Aggiunta completata');
DEFINE('_ANN_DELETED', 'Eliminazione completata');
DEFINE('_ANN_ERROR', 'ERRORE');
DEFINE('_ANN_READMORE', 'Leggi tutto...');
DEFINE('_ANN_CPANEL', 'Pannello di Controllo Annunci');
DEFINE('_ANN_SHOWDATE', 'Mostra Data');
// Stats
DEFINE('_STAT_FORUMSTATS', 'Statistiche Forum');
DEFINE('_STAT_GENERAL_STATS', 'Statistiche Generali');
DEFINE('_STAT_TOTAL_USERS', 'Totale Utenti');
DEFINE('_STAT_LATEST_MEMBERS', 'Ultimo Utente');
DEFINE('_STAT_PROFILE_INFO', 'Vedi Profilo Info');
DEFINE('_STAT_TOTAL_MESSAGES', 'Totale Messaggi');
DEFINE('_STAT_TOTAL_SUBJECTS', 'Totale Oggetti');
DEFINE('_STAT_TOTAL_CATEGORIES', 'Totale Categorie');
DEFINE('_STAT_TOTAL_SECTIONS', 'Totale Sezioni');
DEFINE('_STAT_TODAY_OPEN_THREAD', 'Aperti Oggi');
DEFINE('_STAT_YESTERDAY_OPEN_THREAD', 'Aperti Ieri');
DEFINE('_STAT_TODAY_TOTAL_ANSWER', 'Totale risposte di oggi');
DEFINE('_STAT_YESTERDAY_TOTAL_ANSWER', 'Totale risposte di ieri');
DEFINE('_STAT_VIEW_RECENT_POSTS_ON_FORUM', 'Visualizza messaggi recenti');
DEFINE('_STAT_MORE_ABOUT_STATS', 'Altre statistiche');
DEFINE('_STAT_USERLIST', 'Lista Utenti');
DEFINE('_STAT_TEAMLIST', 'Team Forum');
DEFINE('_STATS_FORUM_STATS', 'Statistiche Forum');
DEFINE('_STAT_POPULAR', 'I');
DEFINE('_STAT_POPULAR_USER_TMSG', 'Utenti pi&ugrave; popolari (Totale Messaggi) ');
DEFINE('_STAT_POPULAR_USER_KGSG', 'Argomenti pi&ugrave; popolari ');
DEFINE('_STAT_POPULAR_USER_GSG', 'Utenti pi&ugrave; popolari (Totale visite al Profilo) ');
//Team List
DEFINE('_MODLIST_ONLINE', 'Utente Online');
DEFINE('_MODLIST_OFFLINE', 'Utente Offline');
// Whoisonline
DEFINE('_WHO_WHOIS_ONLINE', 'Chi c\'&egrave; online');
DEFINE('_WHO_ONLINE_NOW', 'Online');
DEFINE('_WHO_ONLINE_MEMBERS', 'Utenti');
DEFINE('_WHO_AND', 'e');
DEFINE('_WHO_ONLINE_GUESTS', 'Ospiti');
DEFINE('_WHO_ONLINE_USER', 'Utente');
DEFINE('_WHO_ONLINE_TIME', 'Ora');
DEFINE('_WHO_ONLINE_FUNC', 'Azione');
// Userlist
DEFINE('_USRL_USERLIST', 'Lista Utenti');
DEFINE('_USRL_REGISTERED_USERS', '%s ha <b>%d</b> utenti registrati');
DEFINE('_USRL_SEARCH_ALERT', 'Per favore inserire una parola di ricerca!');
DEFINE('_USRL_SEARCH', 'Trova Utente');
DEFINE('_USRL_SEARCH_BUTTON', 'Cerca');
DEFINE('_USRL_LIST_ALL', 'Visualizza tutti');
DEFINE('_USRL_NAME', 'Nome');
DEFINE('_USRL_USERNAME', 'Nome Utente');
DEFINE('_USRL_EMAIL', 'E-mail');
DEFINE('_USRL_USERTYPE', 'Tipo Utente');
DEFINE('_USRL_JOIN_DATE', 'Date d\'inizio');
DEFINE('_USRL_LAST_LOGIN', 'Ultimo accesso');
DEFINE('_USRL_NEVER', 'Mai');
DEFINE('_USRL_BLOCK', 'Stato');
DEFINE('_USRL_MYPMS2', 'MyPMS');
DEFINE('_USRL_ASC', 'Crescente');
DEFINE('_USRL_DESC', 'Decrescente');
DEFINE('_USRL_DATE_FORMAT', '%d.%m.%Y');
DEFINE('_USRL_TIME_FORMAT', '%H:%M');
DEFINE('_USRL_USEREXTENDED', 'Dettagli');
DEFINE('_USRL_COMPROFILER', 'Profilo');
DEFINE('_USRL_THUMBNAIL', 'Miniatura');
DEFINE('_USRL_READON', 'mostra');
DEFINE('_USRL_MYPMSPRO', 'Clexus PM');
DEFINE('_USRL_MYPMSPRO_SENDPM', 'Invia MP');
DEFINE('_USRL_JIM', 'MP');
DEFINE('_USRL_UDDEIM', 'MP');
DEFINE('_USRL_SEARCHRESULT', 'Risultati della ricerca');
DEFINE('_USRL_STATUS', 'Stato');
DEFINE('_USRL_LISTSETTINGS', 'Impostazioni Lista Utenti');
DEFINE('_USRL_ERROR', 'Errore');

//changed in 1.1.4 stable
DEFINE('_COM_A_PMS_TITLE', 'Componente per i messaggi privati');
DEFINE('_COM_A_COMBUILDER_TITLE', 'Community Builder');
DEFINE('_FORUM_SEARCH', 'Cerca: %s');
DEFINE('_MODERATION_DELETE_MESSAGE', 'Sei sicuro di voler eliminare questo messaggio? \n\n NOTA: Non sar&agrave; pi&ugrave; possibile recuperare i messaggi eliminati!');
DEFINE('_MODERATION_DELETE_SUCCESS', 'Il messaggio &egrave; stato eliminato');
DEFINE('_COM_A_RANKING', 'Ranking');
DEFINE('_COM_A_BOT_REFERENCE', 'Visualizza riferimento grafico del Bot');
DEFINE('_COM_A_MOSBOT', 'Abilita la Discuss Bot');
DEFINE('_PREVIEW', 'Anteprima');
DEFINE('_COM_A_MOSBOT_TITLE', 'Discuss Bot');
DEFINE('_COM_A_MOSBOT_DESC', 
'Il Discuss Bot permette agli utenti di discutere nel forum del contenuto degli articoli. Il titolo dell\'articolo viene usato come titolo dell\'Argomento relativo.'
.'<br />Se non esiste ancora un\'Argomento per un determinato, se ne creer&agrave; uno. Se esiste gi&agrave; un\'Argomento, l\'utente pu&ograve; visitarlo e rispondere.'
.'<br /><strong>Il Bot va scaricato, installato e attivato separatamente.</strong>'
.'<br />per maggiori informazioni visitare il sito <a href="http://www.bestofjoomla.com">Best of Joomla Site</a>.'
.'<br />Una volta installato il bot sar&agrave; necessario aggiungere la seguente linea al vostro contenuto:'
.'<br />{mos_KUNENA_discuss:<em>catid</em>}'
.'<br />La <em>catid</em> &egrave; la categoria dove l\'articolo pu&ograve; discusso. Per individuare la categoria giusta, &egrave; sufficiente guardare nel forum '
.'e potrai verificare che l\'id della categoria &egrave; incluso nella URL che appare nella barra di stato del tuo browser.'
.'<br />Esempio: se vuoi che un articolo sia discusso nel forum con catid 26, la linea da aggiungere all\'articolo dovr&agrave; essere: {mos_KUNENA_discuss:26}'
.'<br />Tutto questo pu&ograve; sembrare difficoltoso, ma non lo &egrave;.');
//new in 1.1.4 stable
// search.class.php
DEFINE('_FORUM_SEARCHTITLE', 'Cerca');
DEFINE('_FORUM_SEARCHRESULTS', 'visualizzati %s su %s risultati.');
// Help, FAQ
DEFINE('_COM_FORUM_HELP', 'FAQ');
// rules.php
DEFINE('_COM_FORUM_RULES', 'Regolamento');
DEFINE('_COM_FORUM_RULES_DESC', '<ul><li>Modificare questo file per inserire il regolamento del Forum: joomlaroot/administrator/components/com_Kunena/language/italian.php</li><li>Regolamento 2</li><li>Regolamento 3</li><li>Regolamento 4</li><li>...</li></ul>');
//smile.class.php
DEFINE('_COM_BOARDCODE', 'Codice Forum');
// moderate_messages.php
DEFINE('_MODERATION_APPROVE_SUCCESS', 'Il messaggio &egrave; stato approvato');
DEFINE('_MODERATION_DELETE_ERROR', 'ERRORE: Il messaggio non pu&ograve; essere eliminato');
DEFINE('_MODERATION_APPROVE_ERROR', 'ERRORE: Il messaggio non pu&ograve; essere approvato');
// listcat.php
DEFINE('_GEN_NOFORUMS', 'Non ci sono Forum in questa Categoria!');
//new in 1.1.3 stable
DEFINE('_POST_GHOST_FAILED', 'Non &egrave; stato possibile creare un Argomento nascosto nel vecchio Forum!');
DEFINE('_POST_MOVE_GHOST', 'Lascia un messaggio nascosto nel vecchio Forum');
//new in 1.1 Stable
DEFINE('_GEN_FORUM_JUMP', 'Vai sul Forum');
DEFINE('_COM_A_FORUM_JUMP', 'Abilita Vai sul Forum');
DEFINE('_COM_A_FORUM_JUMP_DESC', 'Se impostato su &quot;S&igrave;&quot; un menu di selezione sar&agrave; visualizzato sulle pagine del Forum per consentire un rapido spostamento tra i vari Forum o Categorie.');
//new in 1.1 RC1
DEFINE('_GEN_RULES', 'Regolamento');
DEFINE('_COM_A_RULESPAGE', 'Abilita pagina del Regolamento');
DEFINE('_COM_A_RULESPAGE_DESC',
    'Se impostato su &quot;S&igrave;&quot; nel menu di testata verr&agrave; visualizzato un link al regolamento. La pagina pu&ograve; essere usata per informare sulle regole del Forum, eccetera. Si pu&ograve; modificare il contenuto aprendo il file rules.php in /joomla_root/components/com_Kunena. <em>Assicurarsi sempre di creare una copia di questo file, perch&egrave; viene sovrascritto quandi si effettua un aggiornamento!</em>');
DEFINE('_MOVED_TOPIC', 'Spostato in:');
DEFINE('_COM_A_PDF', 'Abilita la generazione di PDF');
DEFINE('_COM_A_PDF_DESC',
    'Impostare su &quot;S&igrave;&quot; se si desidera permettere agli Utenti di scaricare un semplice File PDF con il contenuto della discussione.<br />Il file sar&agrave; <u>un semplice</u> documento in PDF, senza grafica e marcature varie, ma che contiene tutto il testo dell\'Argomento discusso.');
DEFINE('_GEN_PDFA', 'Premere questo pulsante per generare il PDF della discussione (verr&agrave; aperto in una nuova finestra).');
DEFINE('_GEN_PDF', 'Pdf');
//new in 1.0.4 stable
DEFINE('_VIEW_PROFILE', 'Premere per visualizzare il Profilo di questo Utente');
DEFINE('_VIEW_ADDBUDDY', 'Premere per aggiungere questo Utente nella tua lista di amici');
DEFINE('_POST_SUCCESS_POSTED', 'Il tuo messaggio &egrave; stato inviato con successo');
DEFINE('_POST_SUCCESS_VIEW', '[ Torna all\'Argomento ]');
DEFINE('_POST_SUCCESS_FORUM', '[ Torna al Forum ]');
DEFINE('_RANK_ADMINISTRATOR', 'Amministratore');
DEFINE('_RANK_MODERATOR', 'Moderatore');
DEFINE('_SHOW_LASTVISIT', 'Dall\'ultima visita');
DEFINE('_COM_A_BADWORDS_TITLE', 'Filtro parolacce');
DEFINE('_COM_A_BADWORDS', 'Usa il Filtro parolacce');
DEFINE('_COM_A_BADWORDS_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera filtrare i messaggi che contengono le parole che sono state contrassegnate come parolacce. Per usare questa funzione occorre che sia stato installato il componente Badword!');
DEFINE('_COM_A_BADWORDS_NOTICE', '* Questo messaggio &egrave; stato censurato perch&egrave; contiene una o pi&ugrave; parole impostate dagli amministratori come parole di cattivo gusto. *');
DEFINE('_COM_A_COMBUILDER_PROFILE', 'Crea un Profilo Community Builder');
DEFINE('_COM_A_COMBUILDER_PROFILE_DESC',
    'Premere sul link per creare i campi necessari per il Forum nel profilo Utente di Community Builder. Copo che essi sono stati creati, si ha la possibilità di spostarli dove si desidera usando l\'Amministrazione di Community Builder, non &egrave; possibile rinominare i loro nomi o opzioni. Se si eliminano dall\'Amministrazione di Community Builder, si possono ricrearli usando questo link, ad ogni modo non premere sul link più volte!');
DEFINE('_COM_A_COMBUILDER_PROFILE_CLICK', '> Clicca qui <');
DEFINE('_COM_A_COMBUILDER', 'Profili Utenti Community Builder');
DEFINE('_COM_A_COMBUILDER_DESC',
    'Impostando su &quot;S&igrave;&quot; si attiva l\'integrazione con il componente Community Builder (www.joomlapolis.com). Tutte le funzioni dei Profili Utenti di Kunena potranno essere gestite da Community Builder e il link Profilo nel Forum vi porter&agrave; al Profilo Utente di Community Builder. Questa impostazione prender&agrave; l\'impostazione del Profilo Clexus PM, se entrambi sono impostati su &quot;S&igrave;&quot;. Inoltre, assicurarsi di applicare le necessarie modifiche al database di Community Builder utilizzando l\'opzione di seguito.');
DEFINE('_COM_A_AVATAR_SRC', 'Usa Avatar da');
DEFINE('_COM_A_AVATAR_SRC_DESC',
    'Se avete Clexus PM o il componente Community Builder installato, potete configurare Kunena per usare l\'Avatar del Profilo utente di Clexus PM o Community Builder. NOTA: Per Community Builder &egrave; necessario avere impostato su on l\'opzione miniatura, perch&egrave; il Forum usa le miniature utente, non le originali.');
DEFINE('_COM_A_KARMA', 'Mostra l\'indicatore Karma');
DEFINE('_COM_A_KARMA_DESC', 'Impostare su &quot;S&igrave;&quot; per visualizzare il Karma utente e i relativi pulsanti (aumentare / diminuire) se sono attive le statistiche Utente.');
DEFINE('_COM_A_DISEMOTICONS', 'Disabilita emoticons');
DEFINE('_COM_A_DISEMOTICONS_DESC', 'Impostare su &quot;S&igrave;&quot; per disabilitare completamente le emoticons (smileys).');
DEFINE('_COM_C_FBCONFIG', 'Configurazione Kunena');
DEFINE('_COM_C_FBCONFIGDESC', 'Configura tutte le funzionalit&agrave; di Kunena');
DEFINE('_COM_C_FORUM', 'Amministrazione Forum');
DEFINE('_COM_C_FORUMDESC', 'Aggiungi e configura le categorie/forum');
DEFINE('_COM_C_USER', 'Amministrazione Utente');
DEFINE('_COM_C_USERDESC', 'Amministrazione Utente Base e Profilo Utente');
DEFINE('_COM_C_FILES', 'Sfoglia File caricati');
DEFINE('_COM_C_FILESDESC', 'Sfoglia e amministra file caricati');
DEFINE('_COM_C_IMAGES', 'Sfoglia Immagini caricate');
DEFINE('_COM_C_IMAGESDESC', 'Sfoglia e amministra immagini caricate');
DEFINE('_COM_C_CSS', 'Modifica File CSS');
DEFINE('_COM_C_CSSDESC', 'Modifica l\'aspetto e la percezione di Kunena');
DEFINE('_COM_C_SUPPORT', 'Sito di Supporto');
DEFINE('_COM_C_SUPPORTDESC', 'Connettiti al sito Best of Joomla (nuova finestra)');
DEFINE('_COM_C_PRUNETAB', 'Snellisci Forum');
DEFINE('_COM_C_PRUNETABDESC', 'Rimuovi vecchi Argomenti (configurabile)');
DEFINE('_COM_C_PRUNEUSERS', 'Snellisci Utenti'); // <=FB 1.0.3
DEFINE('_COM_C_PRUNEUSERSDESC', 'Sincronizza tabella Utenti Kunena con la tabella utenti di Joomla!'); // <=FB 1.0.3
DEFINE('_COM_C_LOADSAMPLE', 'Carica dati di esempio');
DEFINE('_COM_C_LOADSAMPLEDESC', 'Per un facile avvio: carica i Dati di Esempio su un database vuoto di Kunena');
DEFINE('_COM_C_REMOVESAMPLE', 'Rimuovi i Dati di Esempio');
DEFINE('_COM_C_REMOVESAMPLEDESC', 'Rimuovi i Dati di Esempio dal tuo database');
DEFINE('_COM_C_LOADMODPOS', 'Carica il Modulo Posizioni');
DEFINE('_COM_C_LOADMODPOSDESC', 'Carica il Modulo Posizioni per i Modelli di Kunena');
DEFINE('_COM_C_UPGRADEDESC', 'Aggiorna il database alla versione più recente dopo un aggiornamento');
DEFINE('_COM_C_BACK', 'Torna al Pannello di Controllo di Kunena');
DEFINE('_SHOW_LAST_SINCE', 'Argomenti attivi dall\'ultima visita su:');
DEFINE('_POST_SUCCESS_REQUEST2', 'La tua richiesta &egrave; stata processata');
DEFINE('_POST_NO_PUBACCESS3', 'Clicca qui per Registrarti.');
//==================================================================================================
//Changed in 1.0.4
//please update your local language file with these changes as well
DEFINE('_POST_SUCCESS_DELETE', 'Il messaggio &egrave; stato eliminato con successo.');
DEFINE('_POST_SUCCESS_EDIT', 'Il messaggio &egrave; stato modificato con successo.');
DEFINE('_POST_SUCCESS_MOVE', 'L\'Argomento &egrave; stato spostato con successo.');
DEFINE('_POST_SUCCESS_POST', 'Il tuo messaggio &egrave; inviato con successo.');
DEFINE('_POST_SUCCESS_SUBSCRIBE', 'La tua sottoscrizione &egrave; processata.');
//==================================================================================================
//new in 1.0.3 stable
//Karma
DEFINE('_KARMA', 'Karma');
DEFINE('_KARMA_SMITE', 'Frustrato');
DEFINE('_KARMA_APPLAUD', 'Saltellante');
DEFINE('_KARMA_BACK', 'Per tornare all\'Argomento,');
DEFINE('_KARMA_WAIT', 'Si pu&ograve; modificare il Karma di qualche Utente ogni 6 ore. <br/>Per favore attendi che sia passato questo tempo prima di modificare ancora il Karma di altri Utenti.');
DEFINE('_KARMA_SELF_DECREASE', 'Si prega di non tentare di diminuire il proprio Karma!');
DEFINE('_KARMA_SELF_INCREASE', 'Il tuo Karma &egrave; stato diminuito perch&grave; hai tentao di aumentartelo da solo!');
DEFINE('_KARMA_DECREASED', 'Il Karma Utente &egrave; diminuito. Se non si &egrave; ripreso l\'argomento in pochi istanti,');
DEFINE('_KARMA_INCREASED', 'Il Karma Utente &egrave; aumentato. Se non si &egrave; ripreso l\'argomento in pochi istanti,');
DEFINE('_COM_A_TEMPLATE', 'Modello');
DEFINE('_COM_A_TEMPLATE_DESC', 'Scegli un Modello da usare.');
DEFINE('_COM_A_TEMPLATE_IMAGE_PATH', 'Set di immagini');
DEFINE('_COM_A_TEMPLATE_IMAGE_PATH_DESC', 'Scegliere il modello del set di immagini da usare.');
DEFINE('_PREVIEW_CLOSE', 'Chiudi questa finestra');
//==========================================
//new in 1.0 Stable
DEFINE('_COM_A_POSTSTATSBAR', 'Usa la Barra delle statische dei messaggi');
DEFINE('_COM_A_POSTSTATSBAR_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera rappresentare graficamente il numero dei messaggi inviati da un Utente.');
DEFINE('_COM_A_POSTSTATSCOLOR', 'Numero colore per la barra delle statistiche');
DEFINE('_COM_A_POSTSTATSCOLOR_DESC', 'Indicare il numero del colore che si desidera utilizzare per la barra delle statistiche');
DEFINE('_LATEST_REDIRECT',
    'Kunena ha bisogno di (ri) creare i tuoi privilegi di accesso prima di poter creare un elenco degli ultimi messaggi per voi.\nNon preoccupatevi, questo &egrave; abbastanza normale dopo pi&ugrave; di 30 minuti di inattivit&agrave; o dopo aver effettuato un nuovo accesso.\nSi prega di inviare di nuovo la tua richiesta di ricerca.');
DEFINE('_SMILE_COLOUR', 'Colore');
DEFINE('_SMILE_SIZE', 'Dimensione');
DEFINE('_COLOUR_DEFAULT', 'Standard');
DEFINE('_COLOUR_RED', 'Rosso');
DEFINE('_COLOUR_PURPLE', 'Viola');
DEFINE('_COLOUR_BLUE', 'Blu');
DEFINE('_COLOUR_GREEN', 'Verde');
DEFINE('_COLOUR_YELLOW', 'Giallo');
DEFINE('_COLOUR_ORANGE', 'Arancione');
DEFINE('_COLOUR_DARKBLUE', 'Blu scuro');
DEFINE('_COLOUR_BROWN', 'Marrone');
DEFINE('_COLOUR_GOLD', 'Oro');
DEFINE('_COLOUR_SILVER', 'Argento');
DEFINE('_SIZE_NORMAL', 'Normale');
DEFINE('_SIZE_SMALL', 'Piccola');
DEFINE('_SIZE_VSMALL', 'Molto Piccola');
DEFINE('_SIZE_BIG', 'Grande');
DEFINE('_SIZE_VBIG', 'Molto Grande');
DEFINE('_IMAGE_SELECT_FILE', 'Selezionare il file immagine da allegare');
DEFINE('_FILE_SELECT_FILE', 'Selezionare il file da allegare');
DEFINE('_FILE_NOT_UPLOADED', 'Il tuo file non &egrave; stato caricato. Prova di nuovo a inviare o modificare il messaggio.');
DEFINE('_IMAGE_NOT_UPLOADED', 'L\'immagine non &egrave; stata caricata. Prova di nuovo a inviare o modificare il messaggio.');
DEFINE('_BBCODE_IMGPH', 'Inserisci il segnaposto [img] nel messaggio per l\'immagine allegata');
DEFINE('_BBCODE_FILEPH', 'Inserisci il segnaposto [file] nel messaggio per il file allegato');
DEFINE('_POST_ATTACH_IMAGE', '[img]');
DEFINE('_POST_ATTACH_FILE', '[file]');
DEFINE('_USER_UNSUBSCRIBE_ALL', 'Spunta questa casella per <b><u>rimuove la tua iscrizione</u></b> da tutti gli Argomenti (incluse quelle invisibili per la risoluzione dei problemi)');
DEFINE('_LINK_JS_REMOVED', '<em>Collegamento attivo contenente JavaScript &egrave; stato rimosso automaticamente</em>');
//==========================================
//new in 1.0 RC4
DEFINE('_COM_A_LOOKS', 'Aspetto e percezione');
DEFINE('_COM_A_USERS', 'Riferimenti Utente');
DEFINE('_COM_A_LENGTHS', 'Impostazioni varie di lunghezza');
DEFINE('_COM_A_SUBJECTLENGTH', 'Lunghezza massima Oggetto');
DEFINE('_COM_A_SUBJECTLENGTH_DESC',
    'Lunghezza massima Oggetto. Il numero massimo supportato dal database &egrave; di 255 caratteri. Se il tuo sito &egrave; configurato per l\'utilizzo multi-byte come il set di caratteri Unicode, UTF-8 o non-ISO-8599-x impostare la lunghezza massima utilizzando questa formula:<br/><tt>round_down(255/(massima dimensione set di caratteri in byte per carattere))</tt><br/> Eesmpio: per UTF-8, per il quale la dimensione massima in byte per carattere &egrave; di 4 byte: 255/4=63.');
DEFINE('_LATEST_THREADFORUM', 'Argomento/Forum');
DEFINE('_LATEST_NUMBER', 'Nuovi Messaggi');
DEFINE('_COM_A_SHOWNEW', 'Visualizza i nuovi Messaggi');
DEFINE('_COM_A_SHOWNEW_DESC', 'Se impostato a &quot;S&igrave;&quot; Kunena mostrer&agrave; all\'Utente un indicatore per i Forum che contengono nuovi messaggi e i nuovi messaggi dalla sua ultima visita.');
DEFINE('_COM_A_NEWCHAR', 'Indicatore &quot;Novit&agrave;&quot;');
DEFINE('_COM_A_NEWCHAR_DESC', 'Definire qui quello che dovrebbe essere usato per indicare nuovi messaggi (come un &quot;!&quot; o &quot;Nuovo!&quot;)');
DEFINE('_LATEST_AUTHOR', 'Autore ultimo messaggio');
DEFINE('_GEN_FORUM_NEWPOST', 'Nuovi Messaggi');
DEFINE('_GEN_FORUM_NOTNEW', 'Non ci sono nuovi Messaggi');
DEFINE('_GEN_UNREAD', 'Argomento non letto');
DEFINE('_GEN_NOUNREAD', 'Argomento letto');
DEFINE('_GEN_MARK_ALL_FORUMS_READ', 'Segna tutti i Forum come letti');
DEFINE('_GEN_MARK_THIS_FORUM_READ', 'Segna questo Forum come letto');
DEFINE('_GEN_FORUM_MARKED', 'Tutti i messaggi di questo Forum sono stati segnati come letti');
DEFINE('_GEN_ALL_MARKED', 'Tutti i messaggi sono stati segnati come letti');
DEFINE('_IMAGE_UPLOAD', 'Carica immagine');
DEFINE('_IMAGE_DIMENSIONS', 'Il file dell\'immagine deve essere al massimo (width x height - size)');
DEFINE('_IMAGE_ERROR_TYPE', 'Per favore usare solo immagini tipo jpeg, gif o png');
DEFINE('_IMAGE_ERROR_EMPTY', 'Per favore selezionare un file da caricare');
DEFINE('_IMAGE_ERROR_SIZE', 'La dimensione del file immagine supera quella impostata dall\'Amministratore.');
DEFINE('_IMAGE_ERROR_WIDTH', 'La larghezza dell\'immagine supera quella impostata dall\'Amministratore.');
DEFINE('_IMAGE_ERROR_HEIGHT', 'L\'altezza dell\'immagine supera quella impostata dall\'Amministratore.');
DEFINE('_IMAGE_UPLOADED', 'L\'immagine &egrave; stata caricata.');
DEFINE('_COM_A_IMAGE', 'Immagini');
DEFINE('_COM_A_IMGHEIGHT', 'Altezza massima dell\'immagine');
DEFINE('_COM_A_IMGWIDTH', 'Larghezza massima dell\'immagine');
DEFINE('_COM_A_IMGSIZE', 'Dimensione massima dell\'immagine<br/><em>in Kilobyte</em>');
DEFINE('_COM_A_IMAGEUPLOAD', 'Consenti al pubblico di caricare immagini');
DEFINE('_COM_A_IMAGEUPLOAD_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera che chiunque possa caricare immagini.');
DEFINE('_COM_A_IMAGEREGUPLOAD', 'Consenti agli Utenti registrati di caricare immagini');
DEFINE('_COM_A_IMAGEREGUPLOAD_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera che gli utenti registrati e autenticati possano caricare immagini.<br/> Nota: I Super Amministratori e i moderatori sono sempre abilitati a caricare immagini.');
//New since preRC4-II:
DEFINE('_COM_A_UPLOADS', 'Upload');
DEFINE('_FILE_TYPES', 'Il file deve essere di tipo e dimensione massima');
DEFINE('_FILE_ERROR_TYPE', 'E\' permesso caricare solo file di tipo:\n');
DEFINE('_FILE_ERROR_EMPTY', 'Per favore selezionare un file prima di caricarlo');
DEFINE('_FILE_ERROR_SIZE', 'La dimensione del file supera quella impostata dall\'Amministratore.');
DEFINE('_COM_A_FILE', 'File');
DEFINE('_COM_A_FILEALLOWEDTYPES', 'Tipi di File permessi');
DEFINE('_COM_A_FILEALLOWEDTYPES_DESC', 'Specificare quali tipi di file sono permessi per il caricamento. Usare come separatore una virgola e scritti in <strong>minuscolo</strong> senza spazi.<br />Esempio: zip,txt,exe,htm,html');
DEFINE('_COM_A_FILESIZE', 'Dimensione massima del File<br/><em>in Kilobyte</em>');
DEFINE('_COM_A_FILEUPLOAD', 'Consenti al pubblico di caricare file');
DEFINE('_COM_A_FILEUPLOAD_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera che chiunque possa caricare file.');
DEFINE('_COM_A_FILEREGUPLOAD', 'Consenti agli Utenti registrati di caricare File');
DEFINE('_COM_A_FILEREGUPLOAD_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera che gli utenti registrati e autenticati possano caricare file.<br/> Nota: I Super Amministratori e i moderatori sono sempre abilitati a caricare file.');
DEFINE('_SUBMIT_CANCEL', 'L\'invio del tuo messaggio &egrave stato annullato');
DEFINE('_HELP_SUBMIT', 'Clicca qui per inviare il messaggio');
DEFINE('_HELP_PREVIEW', 'Clicca qui per vedere in anteprima il tuo messaggio');
DEFINE('_HELP_CANCEL', 'Clicca qui per annullare il messaggio');
DEFINE('_POST_DELETE_ATT', 'Se questa casella &egrave; spuntata, tutte le immagini e i file allegati al messaggio che si sta eliminando, saranno anch\'essi eliminati (raccomandato).');
//new since preRC4-III
DEFINE('_COM_A_USER_MARKUP', 'Mostra segno di messaggio modificato');
DEFINE('_COM_A_USER_MARKUP_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera che nel messaggio modificato venga visualizzato un segno che indichi che esso &egrave; stato modificato da un utente e quando.');
DEFINE('_EDIT_BY', 'Messaggio modificato da:');
DEFINE('_EDIT_AT', 'alle:');
DEFINE('_UPLOAD_ERROR_GENERAL', 'Si &egrave; verificato un errore mentre caricavi il tuo Avatar. Per favore prova di nuovo oppure segnalalo all\'Amministratore del Forum');
DEFINE('_COM_A_IMGB_IMG_BROWSE', 'Sfoglia le immagini caricate');
DEFINE('_COM_A_IMGB_FILE_BROWSE', 'Sfoglia i File caricati');
DEFINE('_COM_A_IMGB_TOTAL_IMG', 'Numero delle immagini caricate');
DEFINE('_COM_A_IMGB_TOTAL_FILES', 'Numero dei file caricati');
DEFINE('_COM_A_IMGB_ENLARGE', 'Cliccare sull\'immagine per visualizzarla alle dimensioni originali');
DEFINE('_COM_A_IMGB_DOWNLOAD', 'Cliccare sull\'immagine file per scaricarlo');
DEFINE('_COM_A_IMGB_DUMMY_DESC',
    'L\'opzione Sostituisci con &quot;Jolly&quot; sostituir&agrave; l\'immagine selezionata con l\'immagine Jolly.<br /> Questo permette di rimuovere il file senza interrompere il messaggio.<br /><small><em>Si prega di notare che a volte un esplicito refresh del browser &egrave; necessario per visualizzare il Jolly di sostituzione.</em></small>');
DEFINE('_COM_A_IMGB_DUMMY', 'Attuale immagine Jolly');
DEFINE('_COM_A_IMGB_REPLACE', 'Sostituisci con Jolly');
DEFINE('_COM_A_IMGB_REMOVE', 'Rimuovi completamente');
DEFINE('_COM_A_IMGB_NAME', 'Nome');
DEFINE('_COM_A_IMGB_SIZE', 'Dimensione');
DEFINE('_COM_A_IMGB_DIMS', 'Dimensioni');
DEFINE('_COM_A_IMGB_CONFIRM', 'Sei sicurissimo di voler eliminare questo file? \n Eliminando un file, il collegamento che si riferisce a questo file sar&agrave; interrotto.');
DEFINE('_COM_A_IMGB_VIEW', 'Apri il messaggio per modificarlo');
DEFINE('_COM_A_IMGB_NO_POST', 'Nessun riferimento nel messaggio!');
DEFINE('_USER_CHANGE_VIEW', 'I cambiamenti in queste impostazioni saranno efficaci la prossima volta che si visita il forum.<br /> Se si desidera modificare il tipo di vista &quot;al volo&quot; &egrave possibile utilizzare le opzioni dalla barra del menu del forum.');
DEFINE('_MOSBOT_DISCUSS_A', 'Discuti questo articolo sul Forum. (');
DEFINE('_MOSBOT_DISCUSS_B', ' messaggi)');
DEFINE('_POST_DISCUSS', 'In questo Argomento viene discussoe l\'articolo contenuto');
DEFINE('_COM_A_RSS', 'Abilita Feed RSS');
DEFINE('_COM_A_RSS_DESC', 'Il Feed RSS consente agli utenti di scaricare gli ultimi messaggi sul loro Desktop / o sul loro RSS Reader (vedere <a href="http://www.rssreader.com" target="_blank">rssreader.com</a> per un esempio.');
DEFINE('_LISTCAT_RSS', 'Ricevi gli ultimi messaggi direttamente sul tuo desktop');
DEFINE('_SEARCH_REDIRECT', 'Kunena ha bisogno di (ri) creare i tuoi privilegi di accesso prima di poter effettuare la tua richiesta di ricerca.\nNon preoccupatevi, questo &egrave; abbastanza normale dopo pi&ugrave; di 30 minuti di inattivit&agrave.\nSi prega di inviare nuovamente la tua richiesta di ricerca.');
//====================
//admin.forum.html.php
DEFINE('_COM_A_CONFIG', 'Configurazione Kunena');
DEFINE('_COM_A_DISPLAY', 'Visualizza N&deg;');
DEFINE('_COM_A_CURRENT_SETTINGS', 'Impostazioni Correnti');
DEFINE('_COM_A_EXPLANATION', 'Spiegazione');
DEFINE('_COM_A_BOARD_TITLE', 'Titolo Forum');
DEFINE('_COM_A_BOARD_TITLE_DESC', 'Il nome del tuo Forum');
DEFINE('_COM_A_VIEW_TYPE', 'Tipo visualizzzione di Default');
DEFINE('_COM_A_VIEW_TYPE_DESC', 'Scegliere tra una visualizzazione ad albero o piatta come default');
DEFINE('_COM_A_THREADS', 'Argomenti per pagina');
DEFINE('_COM_A_THREADS_DESC', 'Numero di Argomenti per pagina da mostrare');
DEFINE('_COM_A_REGISTERED_ONLY', 'Solo Utenti Registrati');
DEFINE('_COM_A_REG_ONLY_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera permettere l\'uso del Forum solo agli Utenti registrati (vista & messaggi), Impostare su &quot;No&quot; per permettere a tutti i visitatori di usare il Forum');
DEFINE('_COM_A_PUBWRITE', 'Accesso al pubblico in lettura e scrittura');
DEFINE('_COM_A_PUBWRITE_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera permettere al pubblico la scrittura. Impostare su &quot;No&quot; per permettere ai visitatori di leggere i messaggi, ma solo gli Utenti registrati possono scrivere messaggi');
DEFINE('_COM_A_USER_EDIT', 'Modifiche Utente');
DEFINE('_COM_A_USER_EDIT_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera permettere agli Utenti registrati di modificare i propri messaggi.');
DEFINE('_COM_A_MESSAGE', 'Al fine di salvare le modifiche dei valori di cui sopra, premere il pulsante &quot;Salva&quot; nella parte superiore.');
DEFINE('_COM_A_HISTORY', 'Mostra storico');
DEFINE('_COM_A_HISTORY_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera mostrare lo storico dell\'Argomento quando viene inviata una risposta o citazione');
DEFINE('_COM_A_SUBSCRIPTIONS', 'Consenti Sottoscrizioni');
DEFINE('_COM_A_SUBSCRIPTIONS_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera permettere agli Utenti registrati la sottoscrizione a una discussione e ricevere un notifica via email dei nuovi messaggi');
DEFINE('_COM_A_HISTLIM', 'Limite Storico');
DEFINE('_COM_A_HISTLIM_DESC', 'Numero dei messaggi da visualizzare nello storico');
DEFINE('_COM_A_FLOOD', 'Protezione Flood (per non essere sommersi da messaggi)');
DEFINE('_COM_A_FLOOD_DESC', 'Il numero di secondi che un Utente deve attendere tra due messaggi consecutivi. Imposatre a 0 (zero) per disabilitare la protezione. NOTA: La Protezione Flood <em>pu&ograve;</em> essere causa di un degrado nelle prestazioni.');
DEFINE('_COM_A_MODERATION', 'Email Moderatori');
DEFINE('_COM_A_MODERATION_DESC',
    'Impostare su &quot;S&igrave;&quot; se si desidera che le email di notifica sui nuovi messaggi siano inviati ai moderatori del Forum. Nota: anche se ogni (super) Amministratore ha automaticamente tutti i privilegi di Moderatore, assegnargli esplicitamente la funzione di moderatore per ricevere notifiche!');
DEFINE('_COM_A_SHOWMAIL', 'Mostra Email');
DEFINE('_COM_A_SHOWMAIL_DESC', 'Impostare su &quot;No&quot; se si desidera che l\'indirizzo e-mail degli utenti non venga mai visualizzato; escluso agli utenti registrati.');
DEFINE('_COM_A_AVATAR', 'Consenti Avatar');
DEFINE('_COM_A_AVATAR_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera che gli utenti registrati dispongano di un avatar (gestibile attraverso il loro profilo)');
DEFINE('_COM_A_AVHEIGHT', 'Altezza massima Avatar');
DEFINE('_COM_A_AVWIDTH', 'Larghezza massima Avatar');
DEFINE('_COM_A_AVSIZE', 'Dimensione massima del file Avatar<br/><em>in Kilobyte</em>');
DEFINE('_COM_A_USERSTATS', 'Visualizza le statistiche Utente');
DEFINE('_COM_A_USERSTATS_DESC', 'Impostare su &quot;S&igrave;&quot; per mostrare nelle Statistiche utente il numero dei messaggi inviati dall\'utente, tipo Utente (Amministratore, Moderatore, Utente, etc.).');
DEFINE('_COM_A_AVATARUPLOAD', 'Consenti di caricare Avatar');
DEFINE('_COM_A_AVATARUPLOAD_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera che gli Utenti registrati siano abilitati a caricare un Avatar.');
DEFINE('_COM_A_AVATARGALLERY', 'Usa Galleria Avatar');
DEFINE('_COM_A_AVATARGALLERY_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera che gli Utenti registrati siano abilitati a scegliere un Avatar da una Galleria da te predisposta (components/com_Kunena/avatars/gallery).');
DEFINE('_COM_A_RANKING_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera mostrare il Rank degli utenti registrati basato sul numero dei messaggi che hanno inviato.<br/><strong>Si noti che &egrave; necessario attivare Statistiche Utenti, nella scheda Avanzate, per poterle mostrare.</strong>');
DEFINE('_COM_A_RANKINGIMAGES', 'Usa Immagini Rank');
DEFINE('_COM_A_RANKINGIMAGES_DESC',
    'Impostare su &quot;S&igrave;&quot; se si desidera mostrare il Rank degli Utenti Registrati con un\'immagine (da components/com_Kunena/ranks). Se non si imposta questo, verr&agrave; visualizzato il testo per tale Rank. Controllare la documentazione sul sito www.bestofjoomla.com per ulteriori informazioni sulle immagini di Ranking');

//email and stuff
$_COM_A_NOTIFICATION = "Notifica nuovo messaggio su ";
$_COM_A_NOTIFICATION1 = "Un nuovo messaggio è stato inviato su un Argomento alla quale ci si è iscritti su ";
$_COM_A_NOTIFICATION2 = "E' possibile gestire le proprie sottoscrizioni cliccando sul link 'Il mio Profilo' nella home page del Forum dopo essersi autenticati sul sito. Dal tuo Profilo puoi anche elimare la sottoscrizione all'Argomento.";
$_COM_A_NOTIFICATION3 = "Non rispondere a questa email di notifica, in quanto &egrave; stata generata automaticamente.";
$_COM_A_NOT_MOD1 = "Un nuovo messaggio &egrave; stato inviato su un forum a cui sei stato assegnato in qualit&agrave; di moderatore su ";
$_COM_A_NOT_MOD2 = "Si prega di dare un'occhiata a questo dopo aver effettuato l'accesso al sito.";
DEFINE('_COM_A_NO', 'No');
DEFINE('_COM_A_YES', 'S&igrave;');
DEFINE('_COM_A_FLAT', 'Piatta');
DEFINE('_COM_A_THREADED', 'Ad albero');
DEFINE('_COM_A_MESSAGES', 'Messaggi per pagina');
DEFINE('_COM_A_MESSAGES_DESC', 'Numero dei messaggi per pagina da mostrare');
//admin; changes from 0.9 to 0.9.1
DEFINE('_COM_A_USERNAME', 'Nome Utente');
DEFINE('_COM_A_USERNAME_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera che il nome utente (come nel login) possa essere usato al posto del nome reale degli utenti');
DEFINE('_COM_A_CHANGENAME', 'Consenti di modificare il Nome');
DEFINE('_COM_A_CHANGENAME_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera che gli utenti registrati siano in grado di cambiare il loro nome durante la pubblicazione. Se si imposta su &quot;No&quot; gli utenti registrati non saranno in grado di modificare il proprio nome');
//admin; changes 0.9.1 to 0.9.2
DEFINE('_COM_A_BOARD_OFFLINE', 'Forum Offline');
DEFINE('_COM_A_BOARD_OFFLINE_DESC', 'Impostare su &quot;S&igrave;&quot; se si desidera mettere il Forum offline. Il forum rimarr&agrave; consultabile ai (super) amministratori del sito.');
DEFINE('_COM_A_BOARD_OFFLINE_MES', 'Messaggio Forum Offline');
DEFINE('_COM_A_PRUNE', 'Snellisci Forum');
DEFINE('_COM_A_PRUNE_NAME', 'Forum da snellire:');
DEFINE('_COM_A_PRUNE_DESC',
    'La funzione Snellisci Forum vi permette di snellire gli Argomenti su cui non ci sono stati nuovi messaggi per il numero specificato di giorni. Ci&ograve; non rimuove gli argomenti con lo sticky bit impostato o che sono esplicitamente bloccati; questi devono essere eliminati manualmente. Gli Argomenti inseriti in un forum bloccato non possono essere snelliti.');
DEFINE('_COM_A_PRUNE_NOPOSTS', 'Snellisci gli Argomenti che non hanno avuto messaggi negli ultimi ');
DEFINE('_COM_A_PRUNE_DAYS', 'giorni');
DEFINE('_COM_A_PRUNE_USERS', 'Snellisci Utenti'); // <=FB 1.0.3
DEFINE('_COM_A_PRUNE_USERS_DESC',
    'Questa funzione consente di snellire tua lista degli utenti di Kunena con la lista Utenti di Joomla! Essa eliminer&agrave; tutti i profili utenti di Kunena che sono stati eliminati dal tuo Framework di Joomla!<br/>Quando sei sicuro di voler continuare, fare clic su &quot;Snellisci&quot; nella barra dei menu sopra.'); // <=FB 1.0.3
//general
DEFINE('_GEN_ACTION', 'Azione');
DEFINE('_GEN_AUTHOR', 'Autore');
DEFINE('_GEN_BY', 'da');
DEFINE('_GEN_CANCEL', 'Cancella');
DEFINE('_GEN_CONTINUE', 'Invia');
DEFINE('_GEN_DATE', 'Data');
DEFINE('_GEN_DELETE', 'Elimina');
DEFINE('_GEN_EDIT', 'Modifica');
DEFINE('_GEN_EMAIL', 'Email');
DEFINE('_GEN_EMOTICONS', 'Emoticon');
DEFINE('_GEN_FLAT', 'Piatta');
DEFINE('_GEN_FLAT_VIEW', 'Visualizzazione Piatta');
DEFINE('_GEN_FORUMLIST', 'Lista Forum');
DEFINE('_GEN_FORUM', 'Forum');
DEFINE('_GEN_HELP', 'Aiuto');
DEFINE('_GEN_HITS', 'Letto');
DEFINE('_GEN_LAST_POST', 'Ultimo messaggio');
DEFINE('_GEN_LATEST_POSTS', 'Mostra gli ultimi messaggi');
DEFINE('_GEN_LOCK', 'Blocca');
DEFINE('_GEN_UNLOCK', 'Sblocca');
DEFINE('_GEN_LOCKED_FORUM', 'Il Forum &egrave; bloccato');
DEFINE('_GEN_LOCKED_TOPIC', 'L\'Argomento &egrave; bloccato');
DEFINE('_GEN_MESSAGE', 'Messaggio');
DEFINE('_GEN_MODERATED', 'Il Forum &egrave; moderato; Recensione prima della pubblicazione.');
DEFINE('_GEN_MODERATORS', 'Moderatori');
DEFINE('_GEN_MOVE', 'Sposta');
DEFINE('_GEN_NAME', 'Nome');
DEFINE('_GEN_POST_NEW_TOPIC', 'Invia nuovo Argomento');
DEFINE('_GEN_POST_REPLY', 'Rispondi al messaggio');
DEFINE('_GEN_MYPROFILE', 'Il mio Profilo');
DEFINE('_GEN_QUOTE', 'Cita');
DEFINE('_GEN_REPLY', 'Risposta');
DEFINE('_GEN_REPLIES', 'Risposte');
DEFINE('_GEN_THREADED', 'Ad albero');
DEFINE('_GEN_THREADED_VIEW', 'Visualizzazione ad albero');
DEFINE('_GEN_SIGNATURE', 'Firma');
DEFINE('_GEN_ISSTICKY', 'Questo Argomento &egrave; sticky.');
DEFINE('_GEN_STICKY', 'Sticky');
DEFINE('_GEN_UNSTICKY', 'Considera l\'Argomento non Sticky');
DEFINE('_GEN_SUBJECT', 'Oggetto');
DEFINE('_GEN_SUBMIT', 'Invia');
DEFINE('_GEN_TOPIC', 'Argomento');
DEFINE('_GEN_TOPICS', 'Argomenti');
DEFINE('_GEN_TOPIC_ICON', 'Icona Argomento');
DEFINE('_GEN_SEARCH_BOX', 'Cerca nel Forum');
$_GEN_THREADED_VIEW = "Visualizzazione ad albero";
$_GEN_FLAT_VIEW = "Visualizzazione Piatta";
//avatar_upload.php
DEFINE('_UPLOAD_UPLOAD', 'Carica');
DEFINE('_UPLOAD_DIMENSIONS', 'Il tuo file dell\'immagine pu&ograve; essere al massimo di (width x height - size)');
DEFINE('_UPLOAD_SUBMIT', 'Carica un Avatar');
DEFINE('_UPLOAD_SELECT_FILE', 'Selezionare un file');
DEFINE('_UPLOAD_ERROR_TYPE', 'Si prega di utilizzare solo i formati jpeg, gif o png');
DEFINE('_UPLOAD_ERROR_EMPTY', 'Si prega di selezionare un file prima di caricarlo');
DEFINE('_UPLOAD_ERROR_NAME', 'Il nome del file immagine deve contenere solo caratteri alfanumerici e senza spazi.');
DEFINE('_UPLOAD_ERROR_SIZE', 'La dimensione del file di immagine supera quello massimo fissato dall\'Amministratore.');
DEFINE('_UPLOAD_ERROR_WIDTH', 'La larghezza del file immagine supera quella massima fissata dall\'Amministratore.');
DEFINE('_UPLOAD_ERROR_HEIGHT', 'L\'altezza del file immagine supera quella massima fissata dall\'Amministratore.');
DEFINE('_UPLOAD_ERROR_CHOOSE', "Non avete scelto un Avatar dalla galleria...");
DEFINE('_UPLOAD_UPLOADED', 'Il tuo Avatar &egrave; stato caricato.');
DEFINE('_UPLOAD_GALLERY', 'Scegli un Avatar dalla Galleria:');
DEFINE('_UPLOAD_CHOOSE', 'Conferma Scelta.');
// listcat.php
DEFINE('_LISTCAT_ADMIN', 'Un Amministratore deve prima crearle dal ');
DEFINE('_LISTCAT_DO', 'Essi sanno che cosa fare ');
DEFINE('_LISTCAT_INFORM', 'Informali e d&igrave; loro di affrettarsi!');
DEFINE('_LISTCAT_NO_CATS', 'Non ci sono categorie nel Forum ancora definite.');
DEFINE('_LISTCAT_PANEL', 'Pannello di Amministrazione di Joomla! OS CMS.');
DEFINE('_LISTCAT_PENDING', 'messaggi in attesa');
// moderation.php
DEFINE('_MODERATION_MESSAGES', 'Non ci sono messaggi in attesa in questo Forum.');
// post.php
DEFINE('_POST_ABOUT_TO_DELETE', 'Stai per eliminare il messaggio');
DEFINE('_POST_ABOUT_DELETE', '<strong>NOTE:</strong><br/>
- se si elimina un Argomento dal Forum (il primo messaggio in una discussione) verranno eliminate anche tutte le discussioni generate!
..Si consideri di eliminare un Argomento solo se tutto il contenuto deve essere rimosso..
<br/>
- Tutte le discussioni di un normale messaggio eliminata vengono spostate di 1 livello nella gerarchia delle discussioni.');
DEFINE('_POST_CLICK', 'clicca qui');
DEFINE('_POST_ERROR', 'Impossibile trovare il nome utente / e-mail. Grave errore di database non elencato');
DEFINE('_POST_ERROR_MESSAGE', 'Si &egrave; verificato un errore SQL sconosciuto e il messaggio non &egrave; stato inviato. Se il problema persiste, si prega di contattare l\'Amministratore.');
DEFINE('_POST_ERROR_MESSAGE_OCCURED', 'Si &egrave; verificato un errore e il messaggio non &egrave; stato aggiornato. Riprova. Se il problema persiste, si prega di contattare l\'Amministratore.');
DEFINE('_POST_ERROR_TOPIC', 'Si &egrave; verificato un errore durante l\'eliminazione. Si prega di verificare l\'errore di seguito:');
DEFINE('_POST_FORGOT_NAME', 'Hai dimenticato di inserire il tuo nome. Fai clic sul pulsante Indietro del tuo browser per tornare indietro e riprovare.');
DEFINE('_POST_FORGOT_SUBJECT', 'Hai dimenticato di inserire l\'oggetto del messaggio. Fai clic sul pulsante Indietro del tuo browser per tornare indietro e riprovare.');
DEFINE('_POST_FORGOT_MESSAGE', 'Hai dimenticato di inserire un messaggio. Fai clic sul pulsante Indietro del tuo browser per tornare indietro e riprovare.');
DEFINE('_POST_INVALID', 'E\' stato richiesto un ID messaggio non valido.');
DEFINE('_POST_LOCK_SET', 'L\'Argomento &egrave; stato bloccato.');
DEFINE('_POST_LOCK_NOT_SET', 'L\'Argomento non pu&ograve; essere bloccato.');
DEFINE('_POST_LOCK_UNSET', 'L\'Argomento &egrave; stato sbloccato.');
DEFINE('_POST_LOCK_NOT_UNSET', 'L\'Argomento non pu&ograve; essere sbloccato.');
DEFINE('_POST_MESSAGE', 'Invia un nuovo messaggio in ');
DEFINE('_POST_MOVE_TOPIC', 'Sposta questo Argomento sul Forum ');
DEFINE('_POST_NEW', 'Invia un nuovo messaggio in: ');
DEFINE('_POST_NO_SUBSCRIBED_TOPIC', 'L\'iscrizione a questo argomento non pu&ograve; essere processata.');
DEFINE('_POST_NOTIFIED', 'Seleziona questa casella per ricevere la notifica sulle risposte a questo argomento.');
DEFINE('_POST_STICKY_SET', 'L\'Argomento &egrave; stato messo in evidenza.');
DEFINE('_POST_STICKY_NOT_SET', 'L\'Argomento non &egrave; essere messo in evidenza.');
DEFINE('_POST_STICKY_UNSET', 'L\'Argomento non &egrave; pi&ugrave; in evidenza.');
DEFINE('_POST_STICKY_NOT_UNSET', 'L\'Argomento non pu&ograve; essere rimosso dallo stato di Evidenza.');
DEFINE('_POST_SUBSCRIBE', 'Sottoscrivi');
DEFINE('_POST_SUBSCRIBED_TOPIC', 'Sei stato iscritto a questo argomento.');
DEFINE('_POST_SUCCESS', 'Il tuo messaggio &egrave; stato inviato correttamente');
DEFINE('_POST_SUCCES_REVIEW', 'Il tuo messaggio &egrave; stato inviato correttamente. Prima di essere pubblicato sul Forum esso sar&agrave; riesaminato da un moderatore.');
DEFINE('_POST_SUCCESS_REQUEST', 'La tua richiesta &egrave; stata processata. Se non si ritorna all\'Argomento in pochi momenti,');
DEFINE('_POST_TOPIC_HISTORY', 'Storico Argomento su');
DEFINE('_POST_TOPIC_HISTORY_MAX', 'Massimo, mostrando dall\'ultimo');
DEFINE('_POST_TOPIC_HISTORY_LAST', 'messaggi  -  <i>(Ultimo messaggio per primo)</i>');
DEFINE('_POST_TOPIC_NOT_MOVED', 'L\'Argomento non pu&ograve; essere spostato. Torna all\'Argomento:');
DEFINE('_POST_TOPIC_FLOOD1', 'L\'Amministratore del Forum ha abilitato la protezione Flood contro i messaggi Spam e ha deciso che dovrai attendere ');
DEFINE('_POST_TOPIC_FLOOD2', ' secondi prima che tu possa inviare un altro messaggio.');
DEFINE('_POST_TOPIC_FLOOD3', 'Si prega di fare clic sul pulsante Indietro del tuo browser per tornare al Forum.');
DEFINE('_POST_EMAIL_NEVER', 'il tuo indirizzo email non sar&agrave; mai visualizzato sul sito.');
DEFINE('_POST_EMAIL_REGISTERED', 'il tuo indirizzo email sar&agrave; disponibile solo agli utenti registrati.');
DEFINE('_POST_LOCKED', 'bloccato dall\'Amministratore.');
DEFINE('_POST_NO_NEW', 'Nuove risposte non sono ammesse.');
DEFINE('_POST_NO_PUBACCESS1', 'Per inserire nuovi messaggi &egrave; necessario effettuare il login.');
DEFINE('_POST_NO_PUBACCESS2', 'Solo gli Utenti registrati<br /> sono abilitati a scrivere e contribuire al Forum.');
// showcat.php
DEFINE('_SHOWCAT_NO_TOPICS', '>> In questo Forum non ci sono ancora Argomenti  <<');
DEFINE('_SHOWCAT_PENDING', 'messaggi in attesa');
// userprofile.php
DEFINE('_USER_DELETE', ' seleziona questa casella per eliminare la tua firma');
DEFINE('_USER_ERROR_A', ' Siete arrivati a questa pagina per errore. Si prega di informare l\'Amministratore sul collegamento errato  ');
DEFINE('_USER_ERROR_B', 'che &egrave; stato cliccato per arrivare qui. Potete quindi inviare un bug report all\'Amministratore.');
DEFINE('_USER_ERROR_C', 'Grazie!');
DEFINE('_USER_ERROR_D', 'Numero di Errore da includere nel report: ');
DEFINE('_USER_GENERAL', 'Opzioni Profilo Generale');
DEFINE('_USER_MODERATOR', 'Sei stato assegnato come Moderatore ai Forum');
DEFINE('_USER_MODERATOR_NONE', 'Non ti sono stati assegnati Forum da moderare');
DEFINE('_USER_MODERATOR_ADMIN', 'Gli Amministratori sono moderatori su tutti i Forum.');
DEFINE('_USER_NOSUBSCRIPTIONS', 'Non hai nessuna sottoscrizione');
DEFINE('_USER_PREFERED', 'Visualizzazione preferita');
DEFINE('_USER_PROFILE', 'Profilo di ');
DEFINE('_USER_PROFILE_NOT_A', 'Il tuo Profilo ');
DEFINE('_USER_PROFILE_NOT_B', 'non');
DEFINE('_USER_PROFILE_NOT_C', ' pu&ograve; essere aggiornato.');
DEFINE('_USER_PROFILE_UPDATED', 'Il tuo Profilo &egrave; stato aggiornato.');
DEFINE('_USER_RETURN_A', 'Se non ritorni al tuo profilo in pochi istanti ');
DEFINE('_USER_RETURN_B', 'clicca qui');
DEFINE('_USER_SUBSCRIPTIONS', 'Le tue sottoscrizioni');
DEFINE('_USER_UNSUBSCRIBE', 'Rimuovi sotoscrizione');
DEFINE('_USER_UNSUBSCRIBE_A', 'Tu ');
DEFINE('_USER_UNSUBSCRIBE_B', 'non');
DEFINE('_USER_UNSUBSCRIBE_C', ' puoi rimuovere la sottoscrizione all\'Argomento.');
DEFINE('_USER_UNSUBSCRIBE_YES', 'Hai rimosso la sottoscrizione all\'Argomento.');
DEFINE('_USER_DELETEAV', ' seleziona questa casella per eliminare il tuo Avatar');
//New 0.9 to 1.0
DEFINE('_USER_ORDER', 'Ordinamento preferito dei messaggi');
DEFINE('_USER_ORDER_DESC', 'Ultimo messaggio per primo');
DEFINE('_USER_ORDER_ASC', 'Primo messaggio per primo');
// view.php
DEFINE('_VIEW_DISABLED', 'Fare il login per rispondere ai messaggi.');
DEFINE('_VIEW_POSTED', 'Inviato da');
DEFINE('_VIEW_SUBSCRIBE', ':: Sottoscrivi questo Argomento ::');
DEFINE('_MODERATION_INVALID_ID', 'E\' stato richiesto un ID messaggio non valido.');
DEFINE('_VIEW_NO_POSTS', 'Non ci sono messaggi in questo Forum.');
DEFINE('_VIEW_VISITOR', 'Visitatore');
DEFINE('_VIEW_ADMIN', 'Amministratore');
DEFINE('_VIEW_USER', 'Utente');
DEFINE('_VIEW_MODERATOR', 'Moderatore');
DEFINE('_VIEW_REPLY', 'Rispondi a questo messaggio');
DEFINE('_VIEW_EDIT', 'Modifica questo messaggio');
DEFINE('_VIEW_QUOTE', 'Cita questo messaggio in un nuovo messaggio');
DEFINE('_VIEW_DELETE', 'Elimina questo messaggio');
DEFINE('_VIEW_STICKY', 'Imposta questo Argomento come in Evidenza');
DEFINE('_VIEW_UNSTICKY', 'Rimuovi questo Argomento dall\'Evidenza');
DEFINE('_VIEW_LOCK', 'Blocca questo Argomento');
DEFINE('_VIEW_UNLOCK', 'Sblocca questo Argomento');
DEFINE('_VIEW_MOVE', 'Sposta questo Argomento in un altro Forum');
DEFINE('_VIEW_SUBSCRIBETXT', 'Sottoscrivi questo Argomento per ricevre la notifica via email della presenza di nuovi messaggi');
//NEW-STRINGS-FOR-TRANSLATING-READY-FOR-SIMPLEBOARD 9.2
DEFINE('_HOME', 'Forum');
DEFINE('_POSTS', 'Messaggi:');
DEFINE('_TOPIC_NOT_ALLOWED', 'Messaggio');
DEFINE('_FORUM_NOT_ALLOWED', 'Forum');
DEFINE('_FORUM_IS_OFFLINE', 'Il Forum &egrave; OFFLINE!');
DEFINE('_PAGE', 'Pagina: ');
DEFINE('_NO_POSTS', 'Non ci sono messaggi');
DEFINE('_CHARS', 'numero massimo di caratteri');
DEFINE('_HTML_YES', 'HTML &egrave; disabilitato');
DEFINE('_YOUR_AVATAR', '<b>Il tuo Avatar</b>');
DEFINE('_NON_SELECTED', 'Non ancora selezionato <br />');
DEFINE('_SET_NEW_AVATAR', 'Scegli un nuovo Avatar');
DEFINE('_THREAD_UNSUBSCRIBE', 'Rimuovi la sottoscrizione');
DEFINE('_SHOW_LAST_POSTS', 'Argomenti attivi nelle ultime');
DEFINE('_SHOW_HOURS', 'ore');
DEFINE('_SHOW_POSTS', 'Totale: ');
DEFINE('_DESCRIPTION_POSTS', 'Sono indicati i messaggi pi&ugrave; recenti per gli argomenti attivi');
DEFINE('_SHOW_4_HOURS', '4 ore');
DEFINE('_SHOW_8_HOURS', '8 ore');
DEFINE('_SHOW_12_HOURS', '12 ore');
DEFINE('_SHOW_24_HOURS', '24 ore');
DEFINE('_SHOW_48_HOURS', '48 ore');
DEFINE('_SHOW_WEEK', 'Settimana');
DEFINE('_POSTED_AT', 'Inviato alle');
DEFINE('_DATETIME', 'd/m/Y H:i');
DEFINE('_NO_TIMEFRAME_POSTS', 'Non ci sono nuovi messaggi nella frazione di tempo che hai selezionato');
DEFINE('_MESSAGE', 'Messaggio');
DEFINE('_NO_SMILIE', 'no');
DEFINE('_FORUM_UNAUTHORIZIED', 'Questo forum &egrave; aperto solo agli Utenti registrati e autenticati.');
DEFINE('_FORUM_UNAUTHORIZIED2', 'Se sei gi&agrave; registrato, procedi prima con l\'autenticazione.');
DEFINE('_MESSAGE_ADMINISTRATION', 'Moderazione');
DEFINE('_MOD_APPROVE', 'Approva');
DEFINE('_MOD_DELETE', 'Elimina');
//NEW in RC1
DEFINE('_SHOW_LAST', 'Mostra ultimo messaggio');
DEFINE('_POST_WROTE', 'ha scritto');
DEFINE('_COM_A_EMAIL', 'Indirizzo Email del Forum');
DEFINE('_COM_A_EMAIL_DESC', 'Questo &egrave; l\'indirizzo Email del Forum. Assicurarsi di inserire un indirizzo Email valido');
DEFINE('_COM_A_WRAP', '(Word Wrap) Vai a capo con le parole pi&ugrave; lunghe di');
DEFINE('_COM_A_WRAP_DESC',
    'Immettere il numero massimo di caratteri che una sola parola pu&ograve; avere. Questa funzione consente di regolare i messaggi inviati a Kunena adeguandoli al tuo modello (template).<br/>70 caratteri &egrave; probabilmente il numero massimo di caratteri per i modelli a larghezza fissa, ma occorre fare delle prove.<br/>Gli URL, non importa quanto siano lunghi, non sono interessati dalla wordwrap');
DEFINE('_COM_A_SIGNATURE', 'Lunghezza massima della Firma');
DEFINE('_COM_A_SIGNATURE_DESC', 'Numero massimo dei caratteri permessi per la firma dell\'Utente.');
DEFINE('_SHOWCAT_NOPENDING', 'Non ci sono messaggi in attesa');
DEFINE('_COM_A_BOARD_OFSET', 'Fuso Orario del Forum');
DEFINE('_COM_A_BOARD_OFSET_DESC', 'Alcuni Forum sono situati su server con un fuso orario diverso da quello degli Utenti. Impostare l\'UTC (Universal Coordinated Time - Tempo Universale Coordinato) che Kunena dovr&agrave; utilizzare nella visualizzazione dei messaggi. Possono essere utilizzati sia numeri positivi che negativi.');
//New in RC2
DEFINE('_COM_A_BASICS', 'Impostazioni di Base');
DEFINE('_COM_A_FRONTEND', 'Frontend');
DEFINE('_COM_A_SECURITY', 'Sicurezza');
DEFINE('_COM_A_AVATARS', 'Avatar');
DEFINE('_COM_A_INTEGRATION', 'Integrazione');
DEFINE('_COM_A_PMS', 'Abilita Messaggistica Privata');
DEFINE('_COM_A_PMS_DESC',
    'Selezionare il componente di Messaggistica Privata che se ne &egrave; stato installato uno. Selezionando Clexus PM si avranno a disposizone anche il profilo Utente ClexusPM con le relative opzioni (come ICQ, AIM, Yahoo, MSN e i collegamenti al profilo se &egrave; supportato dal modello di Kunena utilizzato)');
DEFINE('_VIEW_PMS', 'Clicca qui per inviare un Messaggio Privato a questo Utente.');
//new in RC3
DEFINE('_POST_RE', 'Re:');
DEFINE('_BBCODE_BOLD', 'Grassetto: [b]testo[/b] ');
DEFINE('_BBCODE_ITALIC', 'Corsivo: [i]testo[/i]');
DEFINE('_BBCODE_UNDERL', 'Sottolineato: [u]testo[/u]');
DEFINE('_BBCODE_QUOTE', 'Citazione: [quote]testo[/quote]');
DEFINE('_BBCODE_CODE', 'Visualizza Codice: [code]codice[/code]');
DEFINE('_BBCODE_ULIST', 'Elenco puntato: [ul] [li]testo[/li] [/ul] - Suggerimento: una lista deve contenere una Lista di oggetti');
DEFINE('_BBCODE_OLIST', 'Elenco numerato: [ol] [li]testo[/li] [/ol] - Suggerimento: una lista deve contenere Lista di oggetti');
DEFINE('_BBCODE_IMAGE', 'Immagine: [img size=(01-499)]http://www.google.com/images/web_logo_left.gif[/img]');
DEFINE('_BBCODE_LINK', 'Link: [url=http://www.viviarese.it/]Questo &egrave; un link[/url]');
DEFINE('_BBCODE_CLOSA', 'Chiudi tutti i tag');
DEFINE('_BBCODE_CLOSE', 'Chiudi tutti i tag bbCode aperti');
DEFINE('_BBCODE_COLOR', 'Colore: [color=#FF6600]testo[/color]');
DEFINE('_BBCODE_SIZE', 'Dimensione: [size=1]dimensione testo[/size] - Suggerimento: le dimensioni vanno da 1 a 5');
DEFINE('_BBCODE_LITEM', 'Lista Oggetti: [li] lista oggetto [/li]');
DEFINE('_BBCODE_HINT', 'Aiuto bbCode - Suggerimento: BBCode pu&ograve; essere utilizzato sul testo selezionato!');
DEFINE('_COM_A_TAWIDTH', 'Larghezza Area di Testo');
DEFINE('_COM_A_TAWIDTH_DESC', 'Regolare la larghezza dell\'area di risposta o del testo del messaggio per abbinarlo al vostro modello. <br/>La Toolbar Emoticon dell\'Argomento sar&agrave; disposto su due righe se la larghezza &egrave; <= 420 pixel');
DEFINE('_COM_A_TAHEIGHT', 'Altezza dell\'Area di Testo');
DEFINE('_COM_A_TAHEIGHT_DESC', 'Regolare l\'altezza dell\'area di risposta o del testo del messaggio per abbinarlo al vostro modello.');
DEFINE('_COM_A_ASK_EMAIL', 'Richiedi Email');
DEFINE('_COM_A_ASK_EMAIL_DESC', 'Richiedi un indirizzo Email quando gli Utenti o i visitatori inviano un messaggio. Impostare su &quot;No&quot; se si desidera che questa caratteristica non venga applicata sul frontend. Agli utenti non sar&agrave; chiesto il loro indirizzo Email.');

//Rank Administration - Dan Syme/IGD
define('_KUNENA_RANKS_MANAGE', 'Gestione Rank');
define('_KUNENA_SORTRANKS', 'Ordina per Rank');

define('_KUNENA_RANKSIMAGE', 'Immagine Rank');
define('_KUNENA_RANKS', 'Titolo Rank');
define('_KUNENA_RANKS_SPECIAL', 'Speciale');
define('_KUNENA_RANKSMIN', 'Numero minimo di messaggi');
define('_KUNENA_RANKS_ACTION', 'Azioni');
define('_KUNENA_NEW_RANK', 'Nuovo Rank');
?>
