<?php
// WARNING: No blank line or spaces before the "< ? p h p" above this.
/**
* Joomla/Mambo Community Builder
* @version $Id: italian.php 97 2008-05-03 11:09:15Z viames $
* @package Community Builder
* @subpackage Italian Language plugin
* @author Viames Marino
* @copyright (C) JoomlaJoe and Beat, www.joomlapolis.com
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
*/


if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

//Field Labels
DEFINE('_UE_HITS','Visite');
DEFINE('_UE_USERNAME','Nome utente');
DEFINE('_UE_Address','Indirizzo');
DEFINE('_UE_City','Citt&agrave;');
DEFINE('_UE_State','Provincia');
DEFINE('_UE_PHONE','Telefono #');
DEFINE('_UE_FAX','Fax #');
DEFINE('_UE_ZipCode','CAP');
DEFINE('_UE_Country','Nazione');
DEFINE('_UE_Occupation','Occupazione');
DEFINE('_UE_Company','Azienda');
DEFINE('_UE_Interests','Interessi');
DEFINE('_UE_Birthday','Compleanno');
DEFINE('_UE_AVATAR','Fotografia');
DEFINE('_UE_Website','Sito web');
DEFINE('_UE_Location','Localit&agrave;');
DEFINE('_UE_EDIT_TITLE','Modifica i tuoi dettagli');
DEFINE('_UE_YOUR_NAME','Nome');
DEFINE('_UE_EMAIL','Email');
DEFINE('_UE_UNAME','Pseudonimo');
DEFINE('_UE_PASS','Password');
DEFINE('_UE_VPASS','Verifica Password');
DEFINE('_UE_SUBMIT_SUCCESS','Invio eseguito!');
DEFINE('_UE_SUBMIT_SUCCESS_DESC','I tuoi articoli sono stati inviati correttamente agli amministratori. Saranno controllati prima della pubblicazione su questo sito.');
DEFINE('_UE_WELCOME','Benvenuto!');
DEFINE('_UE_WELCOME_DESC','Benvenuto nella sezione utente del nostro sito');
DEFINE('_UE_CONF_CHECKED_IN','Gli elementi da controllare sono stati tutti controllati');
DEFINE('_UE_CHECK_TABLE','Controllo delle tabelle');
DEFINE('_UE_CHECKED_IN','Controllati ');
DEFINE('_UE_CHECKED_IN_ITEMS',' elementi');
DEFINE('_UE_PASS_MATCH','Le password non corrispondono');
DEFINE('_UE_USERNAME_DESC','Imposta &quot;S&igrave;&quot; per permettere che l&acute;username venga cambiato. Se impostato su &quot;No&quot; l&acute;username non sar&agrave; modificabile dopo la registrazione.');
DEFINE('_UE_ALLOW_EMAIL_USERCONTR','Utente pu&ograve; nascondere l\'Email');
DEFINE('_UE_ALLOW_EMAIL_USERCONTR_DESC','S&igrave; permetter&agrave; all\'utente di nascondere il suo indirizzo Email al pubblico. NOTA: Questo parametro controller&agrave; la visualizzazione della Email solo in questo componente!');
DEFINE('_UE_USERAPPROVAL_SUCCESSFUL','Utente(i) approvato(i)!');

//Front End Profile Lables
DEFINE('_UE_MEMBERSINCE','Registrato dal');
DEFINE('_UE_LASTONLINE','Ultima presenza');
DEFINE('_UE_ONLINESTATUS','Stato');
DEFINE('_UE_ISONLINE','PRESENTE');
DEFINE('_UE_ISOFFLINE','ASSENTE');
DEFINE('_UE_PROFILE_TITLE',' Pagina Profilo');
DEFINE('_UE_UPDATEPROFILE','Aggiorna il tuo Profilo');
DEFINE('_UE_UPDATEAVATAR','Aggiorna la tua Fotografia');
DEFINE('_UE_CONTACT_INFO_HEADER','Contatti');
DEFINE('_UE_ADDITIONAL_INFO_HEADER','Altre informazioni');
DEFINE('_UE_REQUIRED_ERROR','Questo campo &egrave; richiesto!');
DEFINE('_UE_FIELD_REQUIRED',' Richiesto!');
DEFINE('_UE_DELETE_AVATAR','Elimina Fotografia');

//Administrator Tab Names
DEFINE('_UE_USERPROFILE','Profilo utente');
DEFINE('_UE_USERLIST','Lista utenti');
DEFINE('_UE_AVATARS','Immagini');
DEFINE('_UE_REGISTRATION','Registrazione');
DEFINE('_UE_SUBSCRIPTION','Iscrizioni');
DEFINE('_UE_INTEGRATION','Integrazione');

//Administrator Labels
DEFINE('_UE_FIELD_NAME','Nome campo');
DEFINE('_UE_EXPLANATION','Spiegazione');
DEFINE('_UE_FIELD_EXPLAINATION','Stabilisce se vuoi che questo campo venga richiesto e mostrato agli utenti.');
DEFINE('_UE_CONFIG','Configurazione');
DEFINE('_UE_CONFIG_DESC','Modifica la configurazione');
DEFINE('_UE_VERSION','La tua versione &egrave; ');
DEFINE('_UE_BY','Un componente per Joomla 1.0 e 1.5, Mambo 4.5 e 4.6 e sistemi compatibili, da');
DEFINE('_UE_CURRENT_SETTINGS','Impostazioni attuali');
DEFINE('_UE_A_EXPLANATION','Spiegazione');
DEFINE('_UE_DISPLAY','Visualizzato?');
DEFINE('_UE_REQUIRED','Obbligatorio?');
DEFINE('_UE_YES','S&igrave;');
DEFINE('_UE_NO','No');

//Admin Avatar Tab Labels
DEFINE('_UE_AVATAR_DESC','Imposta &quot;S&igrave;&quot; se vuoi che gli utenti registrati abbiano un&acute;immagine (gestibile dal loro profilo)');
DEFINE('_UE_AVHEIGHT','Max. Altezza Immagine');
DEFINE('_UE_AVWIDTH','Max. Larghezza Immagine');
DEFINE('_UE_AVSIZE','Max. Dimensione del File Immagine<br/><em>in Kilobyte</em>');
DEFINE('_UE_AVATARUPLOAD','Permetti caricamento immagini');
DEFINE('_UE_AVATARUPLOAD_DESC','Imposta &quot;S&igrave;&quot; se vuoi che gli utenti registrati possano caricare un&acute;immagine.');
DEFINE('_UE_AVATARGALLERY','Usa Galleria Immagini');
DEFINE('_UE_AVATARGALLERY_DESC','Imposta &quot;S&igrave;&quot; se vuoi che gli utenti registrati possano scegliere un&acute;immagine da una Galleria.');
DEFINE('_UE_TNWIDTH','Max. Larghezza Miniature');
DEFINE('_UE_TNHEIGHT','Max. Altezza Minature');

//Admin User List Tab Labels
DEFINE('_UE_USERLIST_TITLE','Titolo Lista Utenti');
DEFINE('_UE_USERLIST_TITLE_DESC','Titolo Lista Utenti');
DEFINE('_UE_LISTVIEW','Lista');
DEFINE('_UE_PICTLIST','Lista Immagini');
DEFINE('_UE_PICTDETAIL','Dettaglio Immagine');
DEFINE('_UE_NUM_PER_PAGE','Utenti per Pagina');
DEFINE('_UE_NUM_PER_PAGE_DESC','Numero di Utenti per Pagina');
DEFINE('_UE_VIEW_TYPE','Mostra Tipo');
DEFINE('_UE_VIEW_TYPE_DESC','Mostra Tipo');
DEFINE('_UE_ALLOW_EMAIL','Collegamento Email');
DEFINE('_UE_ALLOW_EMAIL_DESC','Permette il Collegamento Email. NOTA: questa impostazione si applica solo ai campi personalizzati di tipo Email');
DEFINE('_UE_ALLOW_WEBSITE','Collegamento a Siti Web');
DEFINE('_UE_ALLOW_WEBSITE_DESC','Permetti Collegamenti a Siti Web');
DEFINE('_UE_ALLOW_IM','Collegamenti Messaggeria Istantanea');
DEFINE('_UE_ALLOW_IM_DESC','Permetti Collegamenti a Messaggeria Istantanea');
DEFINE('_UE_ALLOW_ONLINESTATUS','Stato Personale');
DEFINE('_UE_ALLOW_ONLINESTATUS_DESC','Mostra lo Stato Personale');
DEFINE('_UE_ALLOW_EMAIL_DISPLAY_DESC','NOTA: Questa impostazione si applica solo all\'indirizzo email principale degli utenti.');
DEFINE('_UE_ALLOW_EMAIL_REPLYTO','Email inviate "From:"');
DEFINE('_UE_ALLOW_EMAIL_REPLYTO_DESC','Impostazioni per il modulo Spedisci-all-Utente: Formato mittente: Scegli tra:<ol>'
		.'<li>"Da:" Indirizzo Email Utente (nessun campo "Reply-To:"):<br/>Gli utenti ricevono tutte le risposte e i messaggi di errore, per maggiore riservatezza</li>'
		.'<li>"Da:" Indirizzo Email Amministratore, con "Reply-To": Indirizzo Email Utente:<br/>Questo &egrave; compatibile con i filtri-spam SPF, ma gli amministratori potrebbero ricevere errori/risposte errate</li></ol>');
DEFINE('_UE_A_FROM_USER', 'Indirizzo Utente');
DEFINE('_UE_A_FROM_ADMIN', 'Amministratore, "Reply-To": Utente');

//Admin Moderate Tab labels
DEFINE('_UE_MODERATE','Moderazione');
DEFINE('_UE_AVATARUPLOADAPPROVALGROUP','Gruppo Moderatori');
DEFINE('_UE_AVATARUPLOADAPPROVALGROUP_DESC','Tutti gli utenti nel gruppo selezionato e quelli superiori saranno moderatori.');
DEFINE('_UE_ALLOWUSERREPORTS','Permetti il Rapporto Utente');
DEFINE ('_UE_ALLOWUSERREPORTS_DESC','Permette agli utenti di comunicare il comportamento inappropriato di altri utenti ai moderatori.');
DEFINE ('_UE_AVATARUPLOADAPPROVAL','Richiedi approvazione per il Caricamento Immagini');
DEFINE ('_UE_AVATARUPLOADAPPROVAL_DESC','Richiede che tutte le immagini caricate dagli utenti vengano approvate prima della loro pubblicazione.');
DEFINE ('_UE_ALLOWUSERPROFILEBANNING_DESC','Permette ai moderatori di verificare un profilo utente prima della sua pubblicazione.');
DEFINE ('_UE_ALLOWUSERPROFILEBANNING','Permetti Blocco Profilo');

//Admin Registration tab labels
DEFINE('_UE_NAME_FORMAT','Formato Nome');
DEFINE('_UE_DATE_FORMAT','Formato Data');
DEFINE('_UE_NAME_FORMAT_DESC','Scegli il formato da visualizzare per i campi Nome/Pseudonimo.');
DEFINE('_UE_DATE_FORMAT_DESC','Scegli il formato da visualizzare per il campo Data.');
DEFINE ('_UE_REG_CONFIRMATION_DESC','Imposta S&igrave; per inviare una email agli utenti dopo la registrazione con un collegamento di conferma.');
DEFINE ('_UE_REG_CONFIRMATION','Richiedi conferma via email');
DEFINE ('_UE_REG_ADMIN_APPROVAL','Richiedi approvazione amministratore');
DEFINE ('_UE_REG_ADMIN_APPROVAL_DESC','Richiedi che tutte le registrazioni degli utenti siano approvate da un amministratore');
DEFINE ('_UE_REG_EMAIL_NAME','Nome email di registrazione');
DEFINE ('_UE_REG_EMAIL_NAME_DESC','Inserisci il nome che vuoi utilizzare quando invii email');
DEFINE ('_UE_REG_EMAIL_FROM','Indirizzo email di registrazione');
DEFINE ('_UE_REG_EMAIL_FROM_DESC','Indirizzo email per l\'invio');
DEFINE ('_UE_REG_EMAIL_REPLYTO','Indirizzo email registrazione Reply To');
DEFINE ('_UE_REG_EMAIL_REPLYTO_DESC','Indirizzo email reply-to che vuoi usare per le risposte');
DEFINE ('_UE_REG_PEND_APPR_MSG','Email di Approvazione Pendente');
DEFINE ('_UE_REG_WELCOME_MSG','Email di Benvenuto');
DEFINE ('_UE_REG_REJECT_MSG','Email di Rifiuto');
DEFINE ('_UE_REG_PEND_APPR_SUB','Soggetto per Stato Approvazione');
DEFINE ('_UE_REG_WELCOME_SUB','Soggetto di Benvenuto');
DEFINE ('_UE_REG_PEND_APPR_SUB_DESC','Intestazione Pendenza');
DEFINE ('_UE_REG_WELCOME_SUB_DESC','Intestazione Benvenuto');
DEFINE ('_UE_REG_REJECT_SUB_DESC','Intestazione Rifiuto');
DEFINE ('_UE_REG_SIGNATURE','Firma Email');
DEFINE ('_UE_REG_ADMIN_PA_SUB','RICHIESTO INTERVENTO! Nuova registrazione utente attende approvazione');
DEFINE ('_UE_REG_ADMIN_PA_MSG',"Un nuovo utente si &egrave; registrato a [SITEURL] e richiede l\'approvazione.\n"
."Questa email contiene i suoi dettagli\n\n"
."Nome - [NAME]\n"
."E-mail - [EMAILADDRESS]\n"
."Pseudonimo - [USERNAME]\n\n\n"
."Non rispondere a questo messaggio, &egrave; generato automaticamente a scopo informativo.\n");
DEFINE ('_UE_REG_ADMIN_SUB','Nuova registrazione utente');
DEFINE ('_UE_REG_ADMIN_MSG',"Un nuovo utente si &egrave; registrato su [SITEURL].\n"
."Questa email contiene i suoi dettagli\n\n"
."Nome - [NAME]\n"
."E-mail - [EMAILADDRESS]\n"
."Pseudonimo - [USERNAME]\n\n\n"
."Non rispondere a questo messaggio, &egrave; generato auomaticamente a scopo informativo\n");
DEFINE('_UE_REG_EMAIL_TAGS','[NAME] - Nome dell\'utente<br />'
.'[USERNAME] - Pseudonimo dell\'utente<br />'
.'[DETAILS] - Dettagli dell\'account utente come Indirizzo Email e Pseudonimo<br />'
.'[PASSWORD] - Password scelta dall\'utente (solo alla prima email inviata premendo "Register")<br />'
.'[CONFIRM] - Inserisci il collegamento di conferma se la funzionalit&agrave;&agrave; &egrave; attivata<br />'
.'[FIELDNAME] - Questo inserir&agrave; il valore relativo all\'utente a cui &egrave; indirizzata l\'email. Includi solo il nome del campo della base di dati che vuoi includere fra [].<br />'
);

//Registration form
DEFINE('_UE_REG_COMPLETE_NOPASS','<div class="componentheading">Registrazione Completata!</div>'
.'<p>La tua password &egrave; stata spedita all\'indirizzo email che hai specificato.</p>'
.'<p>Cortesemente, controlla la tua email (compresa casella di posta indesiderata). Quando riceverai la password sarai in grado di identificarti.</p>');
DEFINE('_UE_REG_COMPLETE','<div class="componentheading">Registrazione Completata!</div>'
.'<p>Adesso puoi identificarti.</p>');
DEFINE('_UE_REG_COMPLETE_NOPASS_NOAPPR','<div class="componentheading">Registrazione Completata!</div>'
.'<p>La tua registrazione necessita di approvazione. Una volta approvata la tua password sar&agrave; spedita all\'indirizzo email che hai specificato.</p>'
.'<p>Quando riceverai l\'approvazione ed una password sarai in grado di identificarti.</p>');
DEFINE('_UE_REG_COMPLETE_NOAPPR','<div class="componentheading">Registrazione Completata!</div>'
.'<p>La tua registrazione necessita di approvazione. Una volta approvata ti sar&agrave; spedita una nota di accettazione all\'indirizzo email che hai specificato.</p>'
.'<p>Quando riceverai l\'approvazione sarai in grado di identificarti.</p>');
DEFINE('_UE_REG_COMPLETE_CONF','<div class="componentheading">Registrazione Completata!</div>'
.'<p>Una email con ulteriori istruzioni su come completare la tua registrazione &egrave; stata spedita all\'indirizzo email che hai indicato.</p>'
.'<p>Cortesemente, controlla la tua email (compresa casella di posta indesiderata) per completare la registrazione.</p>'
.'<p>Per farti rispedire l\'email nuovamente, prova ad identificarti sul sito web con il nome utente e la password indicati durante la registrazione.</p>');
DEFINE('_UE_REG_COMPLETE_NOPASS_CONF','<div class="componentheading">Registrazione Completata!</div>'
.'<p>La tua password &egrave; stata spedita all\'indirizzo email che hai specificato.</p>;'
.'<p>Cortesemente, controlla la tua email (compresa casella di posta indesiderata). Quando riceverai la tua password e seguirai le istruzioni di conferma sarai in grado di accedere.</p>');

// User List Labels
DEFINE ('_UE_HAS','ha');
DEFINE ('_UE_USERS','utenti registrati');
DEFINE ('_UE_SEARCH_ALERT','Cortesemente, digita qualcosa da cercare!');
DEFINE ('_UE_SEARCH','Cerca utente');
DEFINE ('_UE_ENTER_EMAIL','Inserisci Email, Nome o Pseudonimo dell\'utente');
DEFINE ('_UE_SEARCH_BUTTON','Cerca');
DEFINE ('_UE_SHOW_ALL','Mostra tutti gli utenti');
DEFINE ('_UE_NAME','Nome');
DEFINE ('_UE_UL_USERNAME','Pseudonimo');
DEFINE ('_UE_USERTYPE','Tipo utente');
DEFINE ('_UE_VIEWPROFILE','Mostra profilo');
DEFINE ('_UE_LIST_ALL','Elenca tutti');
DEFINE ('_UE_PAGE','Pagina');
DEFINE ('_UE_RESULTS','Risultati');
DEFINE ('_UE_OF_TOTAL','in totale');
DEFINE ('_UE_NO_RESULTS','Nessun risultato');
DEFINE ('_UE_FIRST_PAGE','Inizio');
DEFINE ('_UE_PREV_PAGE','Precedente');
DEFINE ('_UE_NEXT_PAGE','Successivo');
DEFINE ('_UE_END_PAGE','Fine');
DEFINE('_UE_CONTACT','Contatto');
DEFINE('_UE_INSTANT_MESSAGE','Messaggio Istantaneo');
DEFINE('_UE_IMAGEAVAILABLE','Fotografia');
DEFINE('_UE_INFO','Info');
DEFINE('_UE_PROFILE','Profilo');
DEFINE('_UE_PRIVATE_MESSAGE','PM');
DEFINE('_UE_ADDITIONAL','Ulteriori informazioni');
DEFINE('_UE_NO_DATA','Non fornito');
DEFINE('_UE_CLICKTOVIEW','Clicca per');
DEFINE('_UE_CLICKTOSORTBY','Clicca per ordinare per %s');		// %s replaced by sorting name
DEFINE('_UE_UL_USERNAME_NAME','Pseudonimo(Nome)');

//mod_userextraslogin
DEFINE('_UE_NO_ACCOUNT','Nessun account ancora?');
DEFINE('_UE_CREATE_ACCOUNT','Creane uno');
DEFINE('_UE_REGISTER','Registrati');
DEFINE('_UE_FORGOT_PASSWORD','Password dimenticata?');
DEFINE('_LOGIN_NOT_CONFIRMED','Il tuo processo di registrazione non &egrave; stato ancora completato! Per favore controlla di nuovo la tua email per ulteriori istruzioni che sono appena state rispedite. Se non trovi l\'email, controlla nella posta indesiderata. Assicurati che non sia impostata l\'opzione per eliminare immediatamente la posta indesiderata. Se &egrave; cosi, prova ad identificarti per ricevere una nuova email esplicativa.');
DEFINE('_LOGIN_NOT_APPROVED','Il tuo account non &egrave; stato ancora approvato!');
DEFINE('_UE_USER_CONFIRMED','Il tuo account &egrave; attivo. Adesso puoi identificarti!');
DEFINE('_UE_USER_NOTCONFIRMED','Il tuo account non &egrave; ancora attivo. Cortesemente, controlla la tua email e segui le istruzioni per completare la procedura di registrazione. Se non trovi l\'email, controlla nella cartella della posta indesiderata. Assicurati che non sia impostata l\'opzione per eliminare immediatamente la posta indesiderata. Se &egrave; cosi, prova ad identificarti per ricevere una nuova email esplicativa.');


//Avatar
DEFINE('_UE_UPLOAD_UPLOAD','Carica');
DEFINE('_UE_UPLOAD_SUBMIT','Seleziona una nuova Immagine da caricare');
DEFINE('_UE_UPLOAD_SELECT_FILE','Seleziona file');
DEFINE('_UE_UPLOAD_ERROR_TYPE','Cortesemente, utilizza solo immagini jpeg, jpg o png');
DEFINE('_UE_UPLOAD_ERROR_EMPTY','Cortesemente, Seleziona un file da caricare');
DEFINE('_UE_UPLOAD_ERROR_NAME','Il file immagine deve contenere solo caratteri alfanumerici e nessuno spazio.');
DEFINE('_UE_UPLOAD_ERROR_SIZE','La dimensione del file immagine &egrave; superiore al massimo impostato dall\'amministratore.');
DEFINE('_UE_UPLOAD_ERROR_WIDTHHEIGHT','La larghezza o l\'altezza dell\'immagine &egrave; superiore al massimo impostato dall\'amministratore.');
DEFINE('_UE_UPLOAD_ERROR_WIDTH','La larghezza dell\'immagine eccede il limite imposto dall\'amministratore.');
DEFINE('_UE_UPLOAD_ERROR_HEIGHT','L\'altezza dell\'immagine eccede il limite imposto dall\'amministratore.');
DEFINE('_UE_UPLOAD_ERROR_CHOOSE','Non puoi scegliere un\'immagine dalla galleria...');
DEFINE('_UE_UPLOAD_UPLOADED','La tua immagine &egrave; stata caricata.');
DEFINE('_UE_UPLOAD_GALLERY','Scegline una dalla Galleria Immagini');
DEFINE('_UE_UPLOAD_CHOOSE','Conferma Scelta.');
DEFINE('_UE_UPLOAD_UPDATED','La tua immagine &egrave; stata impostata.');
DEFINE('_UE_USER_PROFILE_NOT','Il tuo profilo non pu&ograve; essere aggiornato.');
DEFINE('_UE_USER_PROFILE_UPDATED','Il tuo profilo &egrave; stato aggiornato.');
DEFINE('_UE_USER_RETURN_A','Se non vieni riportato al tuo profilo in pochi istanti ');
DEFINE('_UE_USER_RETURN_B','clicca qui');
//DEFINE('_UPDATE','AGGIORNA');

//Moderator
DEFINE('_UE_USERPROFILEBANNED','Questo profilo &egrave; stato bloccato da un moderatore.');
DEFINE('_UE_REQUESTUNBANPROFILE','Inoltra richiesta di Sblocco');
DEFINE('_UE_REPORTUSER','Segnala Utente');
DEFINE('_UE_BANPROFILE','Blocca Profilo');
DEFINE('_UE_UNBANPROFILE','Sblocca Profilo');
DEFINE('_UE_REPORTUSER_TITLE','Segnalazione Utente');
DEFINE('_UE_USERREASON','Motivo della segnalazione');
DEFINE('_UE_BANREASON','Motivo del blocco');
DEFINE('_UE_SUBMITFORM','Inoltra');
DEFINE('_UE_NOUNBANREQUESTS','Nessuna richiesta di sblocco da eseguire');
DEFINE('_UE_IMAGE_MODERATE','Modera immagini');
DEFINE('_UE_APPROVE_IMAGE','Approva immagine');
DEFINE('_UE_REJECT_IMAGE','Rifiuta immagine');
DEFINE('_UE_MODERATE_TITLE','Moderatore');
DEFINE('_UE_NOIMAGESTOAPPROVE','Nessuna immagine da verificare');
DEFINE('_UE_USERREPORT_MODERATE','Modera le segnalazioni utente');
DEFINE('_UE_REPORT','Segnalazione');
DEFINE('_UE_REPORTEDONDATE','Data della segnalazione');
DEFINE('_UE_REPORTEDUSER','Utente segnalato');
DEFINE('_UE_REPORTEDBY','Segnalato da');
DEFINE('_UE_PROCESSUSERREPORT','Esegui');
DEFINE('_UE_NONEWUSERREPORTS','Nessuna nuova segnalazione');
DEFINE('_UE_USERUNBAN_SUCCESSFUL','Profilo utente sbloccato.');
DEFINE('_UE_REPORTUSERSACTIVITY','Descrivi l\'attivit&agrave; dell\'utente');
DEFINE('_UE_USERREPORT_SUCCESSFUL','La segnalazione &egrave; stata inoltrata.');
DEFINE('_UE_USERBAN_SUCCESSFUL','Il profilo utente &egrave; stato bloccato.');
DEFINE('_UE_FUNCTIONALITY_DISABLED','Questa funzione &egrave; attualmente disabilitata.');
DEFINE('_UE_UPLOAD_PEND_APPROVAL','La tua immagine &egrave; attualmente sottoposta all\'approvazione di un moderatore.');
DEFINE('_UE_UPLOAD_SUCCESSFUL','La tua immagine &egrave; stata caricata.');
DEFINE('_UE_UNBANREQUEST','Richiesta di Sblocco Profilo');
DEFINE('_UE_USERUNBANREQUEST_SUCCESSFUL','La tua richiesta di sblocco &egrave; stata inoltrata.');
DEFINE('_UE_USERREPORT','Rapporto utente');
DEFINE('_UE_VIEWUSERREPORTS','Vedi Segnalazioni Utente');
DEFINE('_UE_USERREQUESTRESPONSE','Vedi Segnalazioni Utente');
DEFINE('_UE_MODERATORREQUESTRESPONSE','Vedi Segnalazioni Utente');
DEFINE('_UE_REPORTBAN_TITLE','Rapporto Blocco');
DEFINE('_UE_REPORTUNBAN_TITLE','Rapporto Sblocco');

DEFINE('_UE_UNBANREQUIREACTION',' Richieste di sblocco');
DEFINE('_UE_USERREPORTSREQUIREACTION','Segnalazione utenti');
DEFINE('_UE_IMAGESREQUIREACTION','Immagine(i)');
DEFINE('_UE_NOACTIONREQUIRED','Nessuna azione pendente');

DEFINE('_UE_UNBAN_MODERATE','Richieste Sblocco Profili');
DEFINE('_UE_BANNEDUSER','Utenti Bloccati');
DEFINE('_UE_BANNEDREASON','Motivo Blocco');
DEFINE('_UE_BANNEDON','Data Blocco');
DEFINE('_UE_BANNEDBY','Bloccato da');

DEFINE('_UE_MODERATORBANRESPONSE','Responso moderatore');
DEFINE('_UE_USERBANRESPONSE','Responso utente');

DEFINE('_UE_IMAGE_ADMIN_SUB','Immagine in attesa di approvazione');
DEFINE('_UE_IMAGE_ADMIN_MSG','Un utente ha inoltrato un\'immagine per l\'approvazione. Identificati ed assumi le misure opportune.');
DEFINE('_UE_USERREPORT_SUB','Segnalazione Utente in Attesa');
DEFINE('_UE_USERREPORT_MSG','Un utente ha inoltrato una segnalazione che richiede il tuo intervento. Identificati ed assumi le misure opportune.');
DEFINE('_UE_IMAGEAPPROVED_SUB','Immagine approvata');
DEFINE('_UE_IMAGEAPPROVED_MSG','La tua immagine &egrave; stata approvata da un moderatore.');
DEFINE('_UE_IMAGEREJECTED_SUB','Immagine rifiutata');
DEFINE('_UE_IMAGEREJECTED_MSG','La tua immagine &egrave; stata rifiutata da un moderatore. Identificati ed inoltra una nuova immagine.');
DEFINE('_UE_BANUSER_SUB','Profilo utente bloccato.');
DEFINE('_UE_BANUSER_MSG','Il tuo profilo utente &egrave; stato bloccato da un amministratore. Identificati e verifica per quale motivo &egrave; stato bloccato.');
DEFINE('_UE_UNBANUSER_SUB','Profilo utente sbloccato');
DEFINE('_UE_UNBANUSER_MSG','Il tuo profilo utente &egrave; stato sbloccato da un amministratore. Il tuo profilo &egrave; nuovamente visibile da tutti gli utenti.');
DEFINE('_UE_UNBANUSERREQUEST_SUB','Sblocco Utente in Attesa');
DEFINE('_UE_UNBANUSERREQUEST_MSG','Un utente ha inoltrato una richiesta per sbloccare il suo profilo. Identificati ed assumi le misure opportune.');


//Alpha 3 Build
DEFINE('_UE_IMAGE','Miniatura');
DEFINE('_UE_FORMATNAME','Nome Completo');

//Alpha 4 Build
DEFINE('_UE_ADMINREQUIREDFIELDS','Campi richiesti in Admin');
DEFINE('_UE_ADMINREQUIREDFIELDS_DESC','Imposta su Si per attivare la verifica dei campi immessi nella sezione Gestione Utenti dell\'area amministrativa o imposta su No per ignorare lo stato richiesto nella gestione utenti dell\'area amministrativa.');
DEFINE('_UE_CANCEL','Annulla');
DEFINE('_UE_NA','N/D');
DEFINE('_UE_MODERATOREMAIL','Invia Email ai Moderatori');
DEFINE('_UE_MODERATOREMAIL_DESC','Se S&igrave;, i moderatori riceveranno una email quando le azioni che si verificano richiedono la loro attenzione.');

//Beta 1 Build
DEFINE('_UE_UPDATE','Aggiorna');

//Beta 2 Build
DEFINE('_UE_FIELDONPROFILE','Questo campo &egrave; visibile sul profilo');
DEFINE('_UE_FIELDNOPROFILE','Questo campo non &egrave; visibile sul profilo');
DEFINE('_UE_FIELDREQUIRED','Questo campo &egrave; richiesto');
DEFINE('_UE_NOT_AUTHORIZED','Non sei autorizzato a visualizzare questa pagina!');
DEFINE('_UE_ALLOW_LISTVIEWBY','Permetti Accesso a:');
DEFINE('_UE_ALLOW_LISTVIEWBY_DESC','Seleziona il gruppo che vuoi abilitare alla visualizzazione della lista.  Tutti gli utenti di quel livello e superiori avranno accesso.');
DEFINE('_UE_ALLOW_PROFILEVIEWBY','Permetti Accesso a:');
DEFINE('_UE_ALLOW_PROFILEVIEWBY_DESC','Seleziona il gruppo che vuoi abilitare alla visualizzazione della lista.  Tutti gli utenti di quel livello e superiori avranno accesso.');

//Beta 3 Build
DEFINE('_UE_NOLISTFOUND','Non ci sono liste di utenti pubblicate!');
DEFINE('_UE_ALLOW_PROFILELINK','Permetti Collegamento al Profilo');
DEFINE('_UE_ALLOW_PROFILELINK_DESC','Seleziona Si per permettere ad ogni riga di puntare al relativo profilo utente e No per evitare i collegamenti nelle liste.');
DEFINE('_UE_REGISTERFORPROFILE','Identificati o registrati per visualizzare o modificare il tuo profilo.');
DEFINE('_UE_UPLOAD_ERROR_GDNOTINSTALLED','La libreria immagini GD2 non &egrave; installata o compilata con PHP!  Cortesemente, avvisa il tuo amministratore di sistema per disabilitare il ridimensionamento automatico dell\'immagine.');
DEFINE('_UE_UPLOAD_ERROR_UPLOADFAILED','Si &egrave; verificato un errore inoltrando/elaborando l\'immagine!');
DEFINE('_UE_TOC','Accetto Termini e Condizioni');
DEFINE('_UE_TOC_REQUIRED','Devi accettare i Termini e le Condizioni prima di registrarti!');
DEFINE('_UE_REG_TOC_MSG','Abilita Termini e Condizioni');
DEFINE('_UE_REG_TOC_DESC','Premi Si per richiedere agli utenti di accettare i termini e le condizioni prima di registrarsi!');
DEFINE('_UE_REG_TOC_URL_MSG','URL per Termini e Condizioni');
DEFINE('_UE_REG_TOC_URL_DESC','Inserisci l\'indirizzo URL della tua pagina Termini e Condizioni.');
DEFINE('_UE_LASTUPDATEDON','Ultimo aggiornamento');

//Beta 4 Build
DEFINE('_UE_EMAILFORMWARNING','IMPORTANTE:<ol>'
		.'<li>L\'indirizzo email nel tuo profilo &egrave;: <strong>%s</strong>.</li>'
		.'<li>Assicurati che sia corretto e controlla il tuo filtro per la posta indesiderata prima di spedire, poich&eacute;; il destinatario lo user&agrave; per risponderti.</li>'
		.'<li>Cortesemente, nota che le email potrebbero non essere ricevute dall\'utente indicato a causa delle sue impostazioni del filtro per la posta indesiderata.</li>'
		.'</ol>');
DEFINE('_UE_EMAILFORMSUBJECT','Soggetto:');
DEFINE('_UE_EMAILFORMMESSAGE','Messaggio:');
DEFINE('_UE_EMAILFORMTITLE','Spedisci un messaggio per email a %s');
DEFINE('_UE_GENERAL','Generale');
DEFINE('_UE_SENDEMAILNOTICE',"------NOTA: ------\r\n\r\nQuesto &egrave; un messaggio di %s da %s ( %s ).\r\n\r\nQuesto utente non conosce il tuo indirizzo email. Se rispondi, il destinatario conoscer&agrave; il tuo indirizzo email.");
DEFINE('_UE_SENDEMAILNOTICE_REPLYTO',"\r\n\r\nQuando rispondi, per favore presta attenzione che l'indirizzo email di %s sia %s.");
DEFINE('_UE_SENDEMAILNOTICE_DISCLAIMER',"\r\n\r\nI proprietari di %s declinano ogni responsabilit&agrave; per i contenuti della email e degli indirizzi email utente.");
DEFINE('_UE_SENDEMAILNOTICE_MESSAGEHEADER',"\r\n\r\n\r\n------ Messaggio da %s a te: ------\r\n\r\n");
DEFINE('_UE_SENDPMSNOTICE','NOTA: Questo &egrave; un messaggio generato automaticamente dal sistema delle Connessioni. Esso dispone dell\'indirizzo dell\'utente connesso, coSi che tu possa rispondere facilmente se lo desideri.');
DEFINE('_UE_SENDEMAIL','Invia Email');
DEFINE('_UE_SENTEMAILSUCCESS','La tua email &egrave; stata spedita!');
DEFINE('_UE_SENTEMAILFAILED','La spedizione della tua email non &egrave; riuscito! Cortesemente, riprova.');
DEFINE('_UE_ALLOW_EMAIL_DISPLAY','Gestione Email');
DEFINE('_UE_REGISTERDATE','Data Registrazione');
DEFINE('_UE_ACTION','Azione');
DEFINE('_UE_USER','Utente');
DEFINE('_UE_USERAPPROVAL_MODERATE','Approvazione/Rifiuto Utente');
DEFINE('_UE_USERPENDAPPRACTION',' Utente(i)');
DEFINE('_UE_APPROVEUSER','Approva Utente(i)');
DEFINE('_UE_REG_REJECT_SUB','La tua registrazione &egrave; stata rifiutata!');
DEFINE('_UE_USERREJECT_MSG',"La tua registrazione su %s &egrave; stata rifiutata per il motivo seguente: \n %s");
DEFINE('_UE_COMMENT','Commento Rifiuto');
DEFINE('_UE_APPROVE','Approva');
DEFINE('_UE_REJECT','Rifiuta');
DEFINE('_UE_USERREJECT_SUCCESSFUL','utente/i rifiutato/i!');
DEFINE('_UE_USERAPPROVE_SUCCESSFUL','utente/i approvato/i!');
DEFINE('_LOGIN_REJECTED','La tua richiesta di registrazione &egrave; stata rifiutata!');
DEFINE('_UE_EMAILFOOTER','NOTA: Questa email &egrave; stata generata automaticamente da %s (%s).');
DEFINE('_UE_MODERATORUSERAPPOVAL','Moderatori Approvano gli Utenti');
DEFINE('_UE_MODERATORUSERAPPOVAL_DESC','Questa configurazione permette ai Moderatori di approvare le richieste di approvazione pendenti direttamente dall\'area utente del sito web.');
DEFINE('_UE_REG_COMPLETE_NOAPPR_CONF','<div class="componentheading">Registratione Completata!</div>'
.'<p>La tua registrazione richiede la conferma per email e l\'approvazione. Segui i passaggi della conferma a te spediti per email. Una volta approvata ti sar&agrave; spedita una nota di accettazione all\'indirizzo email che hai indicato.</p>'
.'<p>Quando riceverai l\'approvazione sarai in grado di identificarti.</p>');
DEFINE('_UE_REG_COMPLETE_NOPASS_NOAPPR_CONF','<div class="componentheading">Registrazione completa!</div>'
.'<p>La tua registrazione richiede la conferma email e l\'approvazione. Segui i passaggi di conferma che ti sono stati spediti via email.</p>'
.'<p>Quando riceverai l\'approvazione, ti sar&agrave; spedita una password e sarai quindi in grado di identificarti.</p>');
DEFINE('_UE_NAME_STYLE','Stile Nome');
DEFINE('_UE_NAME_STYLE_DESC','Lo Stile Nome specifica come vuoi memorizzare il campo del nome in Joomla/Mambo.');
DEFINE('_UE_USER_CONFIRMED_NEEDAPPR','Grazie per averci confermato il tuo indirizzo email. Il tuo account richiede l\'approvazione di un moderatore. Riceverai una email con l\'esito della valutazione.');
DEFINE('_UE_YOUR_FNAME','Nome');
DEFINE('_UE_YOUR_MNAME','Pseudonimo');
DEFINE('_UE_YOUR_LNAME','Cognome');

//RC 1 Build
DEFINE('_UE_NOSELFEMAIL','Non &egrave; permesso inviare mail a se stessi!');
DEFINE('_UE_PROFILETAB','Profilo');
DEFINE('_UE_AUTHORTAB','Articoli');
DEFINE('_UE_FORUMTAB','Forum');
DEFINE('_UE_BLOGTAB','Blog');
DEFINE('_UE_ARTICLEDATE','Data');
DEFINE('_UE_ARTICLETITLE','Titolo');
DEFINE('_UE_ARTICLERATING','Punteggio');
DEFINE('_UE_ARTICLEHITS','Click');
DEFINE('_UE_NESTTABS','Schede innestate');
DEFINE('_UE_NESTTABS_DESC','Raggruppa tutte le schede dentro un unico pannello del profilo. Questo &egrave; molto d\'aiuto quando ci sono molte schede.');
DEFINE('_UE_MENUFORMATBAR','Barra Menu');
DEFINE('_UE_MENUFORMATLIST','Lista Menu');
DEFINE('_UE_MENUFORMAT','Presentazione Menu');
DEFINE('_UE_MENUFORMAT_DESC','Determina il modo di visualizzazione dei menu usati da Community Builder.');
DEFINE('_UE_TEMPLATEDIR','Template di Community Builder');
DEFINE('_UE_TEMPLATEDIR_DESC','Scegli un template da applicare alle tabelle, ai suggerimenti, ai pannelli e ai menu usati nel community builder.'
.' Puoi anche aggiungerne uno tuo o altri usando la gestione Plug-in del Community Builder.');
DEFINE('_UE_MINHITSINTV','Intervallo minimo visite (minuti)');
DEFINE('_UE_MINHITSINTV_DESC','Stabilisci un intervallo minimo tra le visite e il conteggio visite di un certo profilo utente da parte di un altro utente. Il valore predefinito &egrave; 60 minuti (un\'ora).');
DEFINE('_UE_XHTMLCOMPLY','W3C XHTML 1.0 Trans. compatibile');
DEFINE('_UE_XHTMLCOMPLY_DESC','Alcuni schemi grafici Joomla/Mambo non includono la specifica necessaria ( &lt;?php mosShowHead(); ?&gt; ),'
.' Questo parametro &egrave; opzionale. Puoi controllare il file index.php del tuo template o semplicemente attivarla e vedere se le schede dei profili utente vengono visualizzate.'
.' Nel rilascio attuale, abbiamo migliorato la compatibilit&agrave; con W3C XHTML, tuttavia solo alcune pagine sono completamente compatibili al momento.'
.' Naturalmente devi usare un template Joomla/Mambo compatibile per essere compatibile.');
DEFINE('_UE_MAMBLOGNOTINSTALLED','Il componente Mamblog non &egrave; installato. Cortesemente, contatta l\'amministratore del sito.');
DEFINE('_UE_BLOGDATE','Data');
DEFINE('_UE_BLOGTITLE','Titolo');
DEFINE('_UE_BLOGHITS','Visite');
DEFINE('_UE_NOBLOGS','Questo utente non ha pubblicazioni nel blog.');
DEFINE('_UE_NOARTICLES','Questo utente non ha articoli pubblicati.');
DEFINE('_UE_IMPATH','Percorso di ImageMagick');
DEFINE('_UE_IMPATH_DESC','Percorso di ImageMagick');
DEFINE('_UE_NETPBMPATH','Percorso di NetPBM');
DEFINE('_UE_NETPBMPATH_DESC','Percorso di NetPBM');
DEFINE('_UE_AUTODET','Auto rilevato');
DEFINE('_UE_ERROR_NOTINSTALLED','Non installato');
DEFINE('_UE_CONVERSIONTYPE','Software Immagini');
DEFINE('_UE_NEWPASS_FAILED','Azzeramento password non riuscito!');
DEFINE('_UE_USER_SUBSCRIPTIONS','Le tue iscrizioni');
DEFINE('_UE_THREAD_UNSUBSCRIBE',':: Rimuovi iscrizione ::');
DEFINE('_UE_USER_NOSUBSCRIPTIONS','Nessuna iscrizione');
DEFINE('_UE_GEN_BY','da');
DEFINE('_UE_USER_UNSUBSCRIBE_ALL','Rimuovi tutte le iscrizioni');
DEFINE('_UE_USERREPORTMODERATED_SUCCESSFUL','Segnalazione utente moderata!');
DEFINE('_UE_USERIMAGEMODERATED_SUCCESSFUL','Immagine utente moderata!');
DEFINE('_UE_NOREPORTSTOPROCESS','Nessun rapporto utente da gestire');
DEFINE('_UE_NOUSERSPENDING','Nessuna approvazione utente in corso');
DEFINE('_UE_BLANK','');
DEFINE('_UE_REG_FIRST_VISIT_URL_MSG','URL da visualizzare al primo accesso');
DEFINE('_UE_REG_FIRST_VISIT_URL_DESC','Scrivi l\'URL da visualizzare al primo
accesso dopo la registrazione. Questa pagina pu&ograve; contenere il messaggio di benvenuto ai nuovi membri
e/o istruzioni speciali, o rimandare l\'utente al completamento del suo profilo. Lascia
vuoto per un normale accesso anche la prima volta. L\'URL per mostrare il profilo utente &egrave;
index.php?option=com_comprofiler&Itemid=1 (sostituisci Itemid=1 con lo stesso Itemid del tuo menu).');
DEFINE('_UE_NOSUCHPROFILE','Questo profilo non esiste o non &egrave; più disponibile');

//RC 2
DEFINE('_UE_REG_INTRO_MSG','Testo introduttivo per la registrazione');
DEFINE('_UE_REG_INTRO_DESC','Inserisci il testo/html da visualizzare in cima alla '
.'pagina di registrazione o una costante dipendente dalla lingua, come _UE_WELCOME_DESC. '
.'Questo campo pu&ograve; contenere un messaggio di invito per convincere i nuovi membri '
.'a registrarsi e/o istruzioni speciali. Lascialo vuoto per non visualizzare alcun messaggio.');
DEFINE('_UE_REG_CONCLUSION_MSG','Testo conclusivo per la registrazione');
DEFINE('_UE_REG_CONCLUSION_DESC','Inserisci il testo/html da visualizzare in fondo alla '
.'pagina di registrazione o una costante dipendente dalla lingua, come _UE_WELCOME_DESC. '
.'Questo campo pu&ograve; contenere un messaggio di ringraziamento e/o speciali istruzioni. '
.'Lascialo vuoto per non visualizzare alcun messaggio.');
DEFINE('_UE_USER_NOT_APPROVED','Questo utente non &egrave; stato ancora approvato da un moderatore!');
DEFINE('_UE_USER_NOT_CONFIRMED','Questo utente non ha ancora confermato la sua email e il suo account!');
//Connections
DEFINE('_UE_ADDCONNECTION','Aggiungi Connessione');
DEFINE('_UE_REMOVECONNECTION','Rimuovi Connessione');
DEFINE('_UE_CONNECTION','Connessioni');
DEFINE('_UE_CONNECTIONACCEPTSUCCESSFULL','Connessione Accettata!');
DEFINE('_UE_CONNECTIONREMOVESUCCESSFULL','Connessione Rimossa!');
DEFINE('_UE_CONNECTIONADDSUCCESSFULL','Connessione Aggiunta!');
DEFINE('_UE_CONNECTIONPENDINGACCEPTANCE','Connessione in attesa di approvazione!');
DEFINE('_UE_DIRECTCONNECTIONPENDINGACCEPTANCE','La connessione diretta con %s &egrave; in attesa approvazione!');
DEFINE('_UE_NOCONNECTIONS','Questo utente non ha connessioni al momento.');
DEFINE('_UE_NODIRECTCONNECTION','Non ci sono connessioni dirette.');
DEFINE('_UE_ACCEPTCONNECTION','Accetta Connessione');
DEFINE('_UE_CONNECTIONPENDING','Connessione in approvazione');
DEFINE('_UE_CONNECTEDSINCE','Connesso dal');
DEFINE('_UE_CONNECTEDCOMMENT','Commento');
DEFINE('_UE_CONNECTEDDETAIL','Dettagli Connessione');
DEFINE('_UE_CONNECTIONREQUESTDETAIL','Dettagli della richiesta di Connessione');
DEFINE('_UE_CONNECTIONREQUIREDON','Connessione richiesta su');
DEFINE('_UE_DECLINECONNECTION','Declina Connessione');
DEFINE('_UE_FIELDDESCRIPTION','Descrizione del campo: Muovi il mouse sull\'icona');
DEFINE('_UE_WEBURL','Indirizzo del Sito');
DEFINE('_UE_WEBTEXT','Nome del Sito');
DEFINE('_UE_CONNECTIONTYPE','Tipo');
DEFINE('_UE_CONNECTIONCOMMENT','Commento');
DEFINE('_UE_CONNECTIONSUPDATEDSUCCESSFULL','La tua connessione &egrave; stata aggiornata!');
DEFINE('_UE_MANAGECONNECTIONS','Gestisci connessioni');
DEFINE('_UE_MANAGEACTIONS','Gestisci azione');
DEFINE('_UE_CONNECTIONACTIONSSUCCESSFULL','Azione di connessione eseguita!');
DEFINE('_UE_ALLOWCONNECTIONS','Abilita connessioni');
DEFINE('_UE_ALLOWCONNECTIONS_DESC','Abilitando questa funzione gli utenti potranno collegarsi tra loro. Questo &egrave; indicato spesso come lista contatti personali.');
DEFINE('_UE_USEMUTUALCONNECTIONACCEPTANCE','Consenso Reciproco');
DEFINE('_UE_USEMUTUALCONNECTIONACCEPTANCE_DESC','Abilitando questa funzionalit&agrave; si render&agrave; necessario il consenso di entrambi gli utenti prima che venga stabilita una connessione reale tra i due.');
DEFINE('_UE_CONNECTOINNOTIFYTYPE','Notifiche e opzioni di notifica');
DEFINE('_UE_CONNECTOINNOTIFYTYPE_DESC','Scegli se vuoi essere notificato delle connessioni e in quale modo vuoi vuoi ricevere le notifiche di connessione fra gli utenti');
DEFINE('_UE_AUTOADDCONNECTIONS','Connessioni incrociate');
DEFINE('_UE_AUTOADDCONNECTIONS_DESC','Abilitando questa opzione potrai creare una connessione per entrambi gli utenti o solo per la parte richiedente.');
DEFINE('_UE_CONNECTIONCATEGORIES','Tipi di connessione');
DEFINE('_UE_CONNECTIONCATEGORIES_DESC','Scrivi una lista di tipi per permettere agli utenti di classificare ulteriormente le loro connessioni. Premi Invio dopo ogni tipo.');
DEFINE('_UE_CONNECTIONMADESUB','%s si &egrave; connesso a te!');
DEFINE('_UE_CONNECTIONMADEMSG','%s ha stabilito una connessione con te.');
DEFINE('_UE_CONNECTIONMSGPREFIX',"  %s include il seguente messaggio personale:\n\n%s");
DEFINE('_UE_CONNECTIONMESSAGE',"Messaggio personale incluso");
DEFINE('_UE_CONNECTIONPENDSUB','Hai una richiesta di connessione in sospeso da %s!');
DEFINE('_UE_CONNECTIONPENDMSG','%s ha chiesto di connettersi a te e necessita della tua approvazione. Accetta o rifiuta la sua richiesta di connessione.');
DEFINE('_UE_CONNECTTO','Connettiti a %s');
DEFINE('_UE_CONNECTEDWITH','Gestisci connessioni verso di me');
DEFINE('_UE_NOCONNECTEDWITH','Al momento non ci sono utenti connessi con te.');
DEFINE('_UE_CONNECTIONDENIED_SUB','Richiesta di connessione rifiutata!');
DEFINE('_UE_CONNECTIONDENIED_MSG','La tua richiesta di connessione con %s &egrave; stata rifiutata!');
DEFINE('_UE_CONNECTIONREMOVED_SUB','Connessione rimossa!');
DEFINE('_UE_CONNECTIONREMOVED_MSG','%s ha rimosso la tua connessione!');
DEFINE('_UE_CONNECTIONACCEPTED_SUB','Richiesta di connessione accettata!');
DEFINE('_UE_CONNECTIONACCEPTED_MSG','La tua richiesta di connessione con %s &egrave; stata accettata!');
DEFINE('_UE_CONNECTIONDENYSUCCESSFULL','Connessione rifiutata!');
DEFINE('_UE_TOC_LINK','Accetta %sTermini e Condizioni%s');	// to link only the "Terms and Conditions", first %s will be replaced by <a.. and second %s by </a>.
// RC2 Newsletters Support
DEFINE('_UE_NEWSLETTER_HEADER','Newsletter');
DEFINE('_UE_NEWSLETTER','Iscrizioni alle Newsletter');
DEFINE('_UE_NEWSLETTER_USER_EDIT_TITLE','Modifica le tue iscrizioni alle newsletter');
DEFINE('_UE_NEWSLETTER_USER_EDIT_DESC','In basso puoi vedere le newsletter disponibili per te. '
.'Spunta le caselle corrispondenti alle newsletter a cui vuoi iscriverti. '
.'Puoi modificarla e premere aggiorna per cambiare le iscrizioni alle newsletter.');
DEFINE('_UE_NEWSLETTER_USER_EDIT_DESC_EMAIL','Se hai aggiunto iscrizioni, devi darne conferma per essere sicuro '
.'di ricevere le newsletter. Controlla la tua email per ulteriori dettagli.');
DEFINE('_UE_NEWSLETTER_INTRODCUTION',"<div class='delimiterCell'>"._UE_NEWSLETTER_USER_EDIT_TITLE."</div>\n"
."<div class='fieldCell'>"._UE_NEWSLETTER_USER_EDIT_DESC." "._UE_NEWSLETTER_USER_EDIT_DESC_EMAIL."</div>\n");	// nothing to translate here!
DEFINE('_UE_NEWSLETTER_NAME','Newsletter');
DEFINE('_UE_NEWSLETTER_DESCRIPTION','Descrizione');
DEFINE('_UE_NEWSLETTER_NAME_REG','Newsletter');
DEFINE('_UE_NEWSLETTER_DESCRIPTION_REG','Descrizione');
DEFINE('_UE_NEWSLETTER_FORMAT_TITLE','Scegli formato della Newsletter');
DEFINE('_UE_NEWSLETTER_FORMAT_FIELD','Ricevi Newsletter:');
DEFINE('_UE_NEWSLETTER_HTML','come email in formato in HTML');
DEFINE('_UE_NEWSLETTER_TEXT','come email in formato testo');
DEFINE('_UE_NEWSLETTER_DESC','Seleziona “No” se non hai installati i componenti di una Newsletter. Altrimenti scegli la versione con cui vuoi integrarla.');
DEFINE('_UE_NEWSLETTER_DESC2','Al momento solo YaNC 1.4 &egrave; supportato e richiede l\'iscrizione a una newsletter pubblica alla fine della pagina di registrazione.');
DEFINE('_UE_NEWSLETTERSREGLIST','Selezione di proposte per le Newsletter');
DEFINE('_UE_NEWSLETTERSREGLIST_DESC','Elenchi per essere dichiarati sulla pagina di registrazione (se &egrave; abilitata l\'integrazione della newsletter). Se &egrave; selezionata l\'integrazione delle newsletter ma non &egrave; selezionata nessuna newsletter, saranno proposte tutte le newsletter disponibili.');
DEFINE('_UE_NEWSLETTERSREGLIST_DESC2','Multi-selezione con ctrl(PC) o command(Mac) per aggiungere/rimuovere una Newsletter.');
DEFINE('_UE_NEWSLETTER_SUBSCRIBE','Iscriviti a:');
DEFINE('_UE_NEWSLETTERNOTINSTALLED','Componente Newsletter non installato. Contatta l\'amministratore del sito.');
DEFINE('_UE_NONEWSLETTERS','Nessuna newsletter a cui iscriversi.');
DEFINE('_UE_PUBLIC','Pubblico');
DEFINE('_UE_PRIVATE','Privato');
DEFINE('_UE_CONNECTIONDISPLAY','Tipo di visualizzazione');
DEFINE('_UE_CONNECTIONDISPLAY_DESC','Scegli se visualizzare ogni connessione utente pubblica o privata');
DEFINE('_UE_CONNECTIONPATH','Visualizza percorso connessioni');
DEFINE('_UE_CONNECTIONPATH_DESC','Scegli se mostrare il percorso della connessione attraverso un utente e i profili che lui/lei visita');
DEFINE('_UE_DIRECTCONNECTION','Sei in connessione con ');
DEFINE('_UE_NOESTABLISHEDCONNECTION','Non ci sono connessioni fra te e ');
DEFINE('_UE_CONNECTIONPATH1','Percorso connessione a ');
DEFINE('_UE_CONNECTIONPATH2',' gradi ):<br />');
DEFINE('_UE_DETAILSABOUT',' Dettagli su ');
DEFINE('_UE_CONNECTIONINVITATIONMSG','Personalizza il tuo invito alla connessione aggiungendo un messaggio che sar&agrave; incluso nella richiesta.');
DEFINE('_UE_MESSAGE','Messaggio:');
DEFINE('_UE_SENDCONNECTIONREQUEST','Invia');
DEFINE('_UE_CANCELCONNECTIONREQUEST','Annulla');
DEFINE('_UE_CONFIRMREMOVECONNECTION','Sei sicuro di voler eliminare questa connessione?');
DEFINE('_UE_CONNECTIONREQUIREACTION','richiesta(e) di connessione');
DEFINE('_UE_NOZOOMIMGS','Questo utente non ha foto!');
DEFINE('_UE_ZOOMNOTINSTALLED','Il componente Zoom per le immagini non &egrave; installato. Cortesemente, contatta l\'amministratore del sito.');
DEFINE('_UE_ZOOMGALLERY','Vedi gallerie');
DEFINE('_UE_ZOOMTABTITLE','Galleria');
DEFINE('_UE_FORUM_FORUMRANKING','Livello forum');
DEFINE('_UE_FORUM_TOTALPOSTS','Messaggi totali');
DEFINE('_UE_FORUM_KARMA','Karma');
DEFINE('_UE_NEWSLETTER_NOT_CONFIRMED','Non confermato');
DEFINE('_UE_NOTIFICATIONSAT','Notifiche a');
DEFINE('_UE_YOUR_VERSION','Tua versione');
DEFINE('_UE_LATEST_VERSION','Ultima versione');
DEFINE('_UE_ACTIONSMENU','Menu Azioni');
DEFINE('_UE_CONNECT_ACTIONREQUIRED','In basso vedi gli utenti che chiedono di connettersi a te. Puoi scegliere di accettare o rifiutare la loro proposta. '
.'Scegli il simbolo verde per accettare o la croce rossa per rifiutare la richiesta. Quindi clicca sul pulsante AGGIORNA. '
.'Sposta e tieni il mouse sulle immagini e sulle icone per vedere una breve spiegazione dei dettagli e del loro significato.');
DEFINE('_UE_CONNECT_MANAGECONNECTIONS','In basso vedi gli utenti con cui sei connesso direttamente. '
.'Puoi aggiungere un Commento personale e selezionare più Tipi di connessione dalla lista con CTRL (PC) o CMD (Mac) cliccando sulle voci. '
.'Ora clicca sul pulsante AGGIORNA. '
.'Sposta il mouse e tienilo sulle icone per vedere una breve spiegazione del loro significato e delle loro azioni e sulle immagini per vedere i dettagli della connessione.');

// PMS:
//Administrator Integration Tab
DEFINE('_UE_PMSTAB','Messaggio veloce');
DEFINE('_UE_PMS_NOTINSTALLED','Il sistama PMS selezionato non &egrave; installato.');
// PMS integration definitions
DEFINE('_UE_PM_SENTSUCCESS','Il tuo messaggio privato &egrave; stato spedito correttamente!');
DEFINE('_UE_PM_NOTSENT','Il tuo messaggio privato non pu&ograve; essere spedito!');
DEFINE('_UE_PMS_TYPE_UNSUPPORTED','Questo tipo di messaggio non &egrave; supportato dal sistema PMS!');
DEFINE('_UE_PM_EMPTYMESSAGE','Messaggio vuoto.');
DEFINE('_UE_SESSIONTIMEOUT','Sessione scaduta.');
DEFINE('_UE_TRYAGAIN','Cortesemente, riprova.');
DEFINE('_UE_PM_SENDMESSAGE','Spedisci messaggio');
DEFINE('_UE_PM_PROFILEMSG','Messaggio dal tuo profilo');
DEFINE('_UE_PM_MESSAGES_HAVE'	, 'Hai');
DEFINE('_UE_PM_NEW_MESSAGE'		, 'nuovo messaggio privato');
DEFINE('_UE_PM_NEW_MESSAGES'	, 'nuovi messaggi privati');
DEFINE('_UE_PM_NO_MESSAGES'		, 'Nessun messaggio nuovo');
// PMS Menus:
DEFINE('_UE_PM','PM');
DEFINE('_UE_PM_USER','Spedisci Messaggio Privato');
DEFINE('_UE_MENU_PM_USER_DESC','Spedisci un Messaggio Privato a questo utente');
DEFINE('_UE_PM_INBOX','Mostra Messaggi Ricevuti');
DEFINE('_UE_MENU_PM_INBOX_DESC','Mostra Messaggi Privati Ricevuti');
DEFINE('_UE_PM_OUTBOX','Mostra Messaggi Privati Spediti');
DEFINE('_UE_MENU_PM_OUTBOX_DESC','Mostra Messaggi Privati Spediti');
DEFINE('_UE_PM_TRASHBOX','Mostra Cestino Privato');
DEFINE('_UE_MENU_PM_TRASHBOX_DESC','Mostra Messaggi Privati Eliminati');
DEFINE('_UE_PM_OPTIONS','Modifica Opzioni PMS');
DEFINE('_UE_MENU_PM_OPTIONS_DESC','Modifica Opzioni per il Sistema Messaggi Privati');

// Menus
DEFINE('_UE_MENU', 'Menu');
DEFINE('_UE_USER_STATUS', 'Stato utente');
DEFINE('_UE_MENU_CB', 'Community');
DEFINE('_UE_MENU_ABOUT_CB', 'Informazioni su Community Builder...');
DEFINE('_UE_SITE_POWEREDBY', 'Le funzioni community di questo sito sono realizzate da Joomla Community Builder');
DEFINE('_UE_MENU_EDIT', 'Modifica');
DEFINE('_UE_MENU_VIEW', 'Vedi');
DEFINE('_UE_MENU_MESSAGES', 'Messaggi');
DEFINE('_UE_MENU_CONNECTIONS', 'Connessioni');
//DEFINE('_UE_MENU_UPDATEPROFILE', 'Aggiorna il tuo profilo');
DEFINE('_UE_MENU_UPDATEPROFILE_DESC', 'Cambia la configurazione del tuo profilo');
//DEFINE('_UE_MENU_UPDATEAVATAR', 'Aggiorna la tua Foto');
DEFINE('_UE_MENU_UPDATEAVATAR_DESC', 'Scegli la foto del tuo profilo');
//DEFINE('_UE_MENU_DELETE_AVATAR', 'Rimuovi Foto');
DEFINE('_UE_MENU_DELETE_AVATAR_DESC', 'Rimuovi la foto dal tuo profilo');
DEFINE('_UE_MENU_VIEWMYPROFILE', 'Vedi il tuo Profilo');
DEFINE('_UE_MENU_VIEWMYPROFILE_DESC', 'Vedi il tuo profilo personale');

DEFINE('_UE_MENU_SENDUSEREMAIL','Invia Email all\'utente');
DEFINE('_UE_MENU_SENDUSEREMAIL_DESC','Invia Email a quest\'utente');
DEFINE('_UE_MENU_USEREMAIL_DESC','Indirizzo Email dell\'utente');
DEFINE('_UE_ADDCONNECTION_DESC','Aggiungi una Connessione con quest\'utente');
DEFINE('_UE_ADDCONNECTIONREQUEST','Richiedi Connessione');
DEFINE('_UE_ADDCONNECTIONREQUEST_DESC','Richiedi una Connessione con quest\'utente');
DEFINE('_UE_REMOVECONNECTION_DESC','Rimuovi connessione con quest\'utente');
DEFINE('_UE_REVOKECONNECTIONREQUEST','Revoca la richiesta di connessione');
DEFINE('_UE_REVOKECONNECTIONREQUEST_DESC','Elimina la richiesta di connessione con questo utente');
DEFINE('_UE_MENU_MANAGEMYCONNECTIONS','Gestisci le tue Connessioni');
DEFINE('_UE_MENU_MANAGEMYCONNECTIONS_DESC','Gestisci le Connessioni esistenti e quelle in attesa di approvazione');

DEFINE('_UE_MENU_MODERATE', 'Moderazione');
//DEFINE('_UE_MENU_REQUESTUNBANPROFILE','Richiedi Sblocco');
DEFINE('_UE_MENU_REQUESTUNBANPROFILE_DESC', 'Richiedi al moderatore di questo sito di sbloccare il tuo profilo');
//DEFINE('_UE_MENU_BANPROFILE','Blocca profilo');
DEFINE('_UE_MENU_BANPROFILE_DESC', 'Come moderatore: Blocca questo profilo e rendilo invisibile agli altri utenti');
//DEFINE('_UE_MENU_UNBANPROFILE','Sblocca profilo');
DEFINE('_UE_MENU_UNBANPROFILE_DESC', 'Come moderatore: Sblocca questo profilo e rendilo visibile agli altri utenti');
//DEFINE('_UE_MENU_REPORTUSER','Segnala Utente');
DEFINE('_UE_MENU_REPORTUSER_DESC', 'Segnala questo utente ai moderatori che prenderanno i dovuti provvedimenti');
//DEFINE('_UE_MENU_VIEWUSERREPORTS','Vedi Segnalazioni Utenti');
DEFINE('_UE_MENU_VIEWUSERREPORTS_DESC','Come moderatore: vedi Segnalazioni per questo utente');
DEFINE('_UE_UNBAN_MODERATE_DESC','Clicca sul nome dell\'utente bloccato per vedere il suo profilo. '
.'Quindi scegli Modera/Sblocca utente dalla lista dei profili se vuoi sbloccare questo utente.');
DEFINE('_UE_MENU_APPROVE_IMAGE_DESC', 'Come moderatore: Approva l\'immagine inviata da questo utente per questo profilo, rendendola visibile agli altri utenti');
DEFINE('_UE_MENU_REJECT_IMAGE_DESC', 'Come moderatore: Rifiuta l\'immagine utente per questo profilo');
DEFINE('_UE_HITS_DESC','Numero di Visite al profilo di questo utente');
DEFINE('_UE_ONLINESTATUS_DESC','Questo utente &egrave; attualmente collegato');
DEFINE('_UE_MEMBERSINCE_DESC','Questo utente &egrave; Membro dal');
DEFINE('_UE_LASTONLINE_DESC','Questo utente si &egrave; collegato l\'ultima volta il');
DEFINE('_UE_LASTUPDATEDON_DESC','Questo utente ha aggiornato il suo profilo l\'ultima volta il');

DEFINE('_UE_LENGTH_ERROR','La lunghezza massima consentita per questo campo eccede di');
DEFINE('_UE_CHARACTERS','caratteri');
DEFINE('_UE_NEVER','Mai');
DEFINE('_UE_NOFORUMPOSTSFOUND','Nessun messaggio soddisfa i criteri di ricerca.');

DEFINE('_UE_PORTRAIT','Ritratto');
DEFINE('_UE_CONNECTIONPATHS','Percorsi Connessione');

DEFINE('_UE_PROFILE_PAGE_TITLE','Titolo Pagina del Profilo Utente');
DEFINE('_UE_PROFILE_TITLE_TEXT','Pagina Profilo di %s');

DEFINE('_UE_SEARCH_INPUT','Cerca&hellip;');	// &hellip; = "..."
DEFINE('_UE_POS_CB_MAIN','Area principale (in basso sinistra/centro/destra)');
DEFINE('_UE_POS_CB_HEAD','Intestazione (in alto sinistra/centro/destra)');
DEFINE('_UE_POS_CB_MIDDLE','Area centrale');
DEFINE('_UE_POS_CB_LEFT','Parte sinistra (dell\'area centrale)');
DEFINE('_UE_POS_CB_RIGHT','Parte destra (dell\'area centrale)');
DEFINE('_UE_POS_CB_BOTTOM','Area bassa (sotto l\'area principale)');

DEFINE('_UE_DISPLAY_TAB','Usa schede');
DEFINE('_UE_DISPLAY_DIV','Div con titolo');
DEFINE('_UE_DISPLAY_HTML','Visualizzazione senza titolo');
DEFINE('_UE_DISPLAY_OVERLIB','Suggerimenti si muovono con il mouse');
DEFINE('_UE_DISPLAY_OVERLIBFIX','Suggerimenti fissi');
DEFINE('_UE_DISPLAY_OVERLIBSTICKY','Pulsanti con suggerimenti importanti');
DEFINE('_UE_CLOSE_OVERLIB','CHIUDI');

//SB Integration Support
DEFINE('_UE_SB_TABTITLE','Impostazioni Forum');
DEFINE('_UE_SB_TABDESC','Queste sono le tue impostazioni per il forum');
DEFINE('_UE_SB_VIEWTYPE_TITLE','Visualizzazione preferita');
DEFINE('_UE_SB_VIEWTYPE_FLAT','Lineare');
DEFINE('_UE_SB_VIEWTYPE_THREADED','Ad albero');
DEFINE('_UE_SB_ORDERING_TITLE','Ordine preferito dei messaggi');
DEFINE('_UE_SB_ORDERING_OLDEST','Prima i messaggi più vecchi');
DEFINE('_UE_SB_ORDERING_LATEST','Prima i messaggi più recenti');
DEFINE('_UE_SB_SIGNATURE','Firma');
//added for SB 1.5 during 1.0 RC 1
DEFINE('_UE_SB_POSTSPERPAGE','Messaggi per pagina');
DEFINE('_UE_SB_USERTIMEOFFSET','Differenza fra ora locale e ora del server');
DEFINE('_UE_SB_CONFIRMUNSUBSCRIBEALL','Sei sicuro di voler eliminare tutte le tue sottoscrizioni?');
DEFINE('_UE_FORUMDATE','Data');
DEFINE('_UE_FORUMCATEGORY','Categoria');
DEFINE('_UE_FORUMSUBJECT','Soggetto');
DEFINE('_UE_FORUMHITS','Visite');
DEFINE('_UE_FORUM_POSTS','Messaggi del Forum');
DEFINE('_UE_FORUM_LASTPOSTS','Ultimi %s messaggi del Forum');
DEFINE('_UE_FORUM_FOUNDPOSTS','Trovati %s messaggi nel Forum');
DEFINE('_UE_FORUM_STATS','Statistiche Forum');
if (!defined('_RANK_MODERATOR')) DEFINE('_RANK_MODERATOR','Moderatore');
if (!defined('_RANK_ADMINISTRATOR')) DEFINE('_RANK_ADMINISTRATOR','Amministratore');
DEFINE('_UE_SBNOTINSTALLED','Componente Simpleboard forum non installato. Contatta l\'amministratore del sito.');
DEFINE('_UE_NOFORUMPOSTS','Questo utente non ha messaggi nel forum.');
DEFINE("_UE_USERPARAMS","Opzioni Utente");
//Mamblog search:
DEFINE('_UE_BLOG_LASTENTRIES','Ultimi %d Inserimenti Blog');
DEFINE('_UE_BLOG_FOUNDENTRIES','Trovati %d Inserimenti Blog');
DEFINE('_UE_BLOG_ENTRIES','Inserimenti Blog');

// 1.0 stable:
DEFINE('_UE_NO_USERS_IN_LIST','Nessun utente in questa lista');
DEFINE('_UE_LIST_DOES_NOT_EXIST','Questa lista non esiste');
DEFINE('_UE_VISIBLE_ONLY_MODERATOR','Questo &egrave; visibile solo ai moderatori');
DEFINE('_UE_AUTOMATIC','Automatico');
DEFINE('_UE_MANUAL','Manuale');
DEFINE('_UE_NOVERSIONCHECK','Controllo versione nella Configurazione');
DEFINE('_UE_NOVERSIONCHECK_DESC','Scegli se vuoi che la versione sia verificata automaticamente ogni volta che vai alla configurazione generale di Community Builder (altamente raccomandato, coSi da vedere immediatamente un messaggio in caso di rilascio critico per ragioni di sicurezza) o manualmente, quando clicchi sul collegamento (non raccomandato). Il tuo Community Builder non divulgher&agrave; alcuna informazione durante il controllo di versione (ad eccezione del numero di versione e dei comuni parametri http). Non c\'&egrave; servizio di aggiornamento automatico.');
// 1.0 stable cblogin module:
DEFINE('_UE_SHOW_POFILE_OF','Mostra profilo di ');

//Not yet used within application but are needed to translate default images for profile.
DEFINE('_UE_IMG_NOIMG','Nessuna Immagine');
DEFINE('_UE_IMG_PENDIMG','Approvazione in corso');

// CB 1.0.2 optional string:
DEFINE('_UE_MAXEMAILSLIMIT','Hai superato il numero massimo di %d email per %d ore. Cortesemente, riprova più tardi.');
DEFINE('_UE_INPUT_VALUE_NOT_ALLOWED','Il valore immesso non &egrave; consentito.');

//Needed for Joomla 1.5 and Mambo 4.6 language independance: Translators: please take strings from joomla 1.0.11's language file
/** registration.php */
if (!defined('_ERROR_PASS'))		DEFINE('_ERROR_PASS','Spiacente, non &egrave; stato trovato alcun utente corrispondente');
if (!defined('_NEWPASS_SENT'))		DEFINE('_NEWPASS_SENT','Nuova Password utente creata e spedita!');
if (!defined('_REGWARN_NAME'))		DEFINE('_REGWARN_NAME','Cortesemente, inserisci il tuo nome.');
if (!defined('_REGWARN_UNAME'))		DEFINE('_REGWARN_UNAME','Cortesemente, inserisci il nome utente.');
if (!defined('_REGWARN_MAIL'))		DEFINE('_REGWARN_MAIL','Cortesemente, inserisci un indirizzo e-mail valido.');
if (!defined('_REGWARN_VPASS2'))	DEFINE('_REGWARN_VPASS2','La password e la verifica non corrispondono, per favore riprova.');
if (!defined('_REGWARN_INUSE'))		DEFINE('_REGWARN_INUSE','Questi pseudonimo e password sono gi&agrave; in uso. Cortesemente, riprova con altri.');
if (!defined('_REGWARN_EMAIL_INUSE')) DEFINE('_REGWARN_EMAIL_INUSE', 'Questa e-mail &egrave; gi&agrave; registrata. Se hai smarrito la password clicca su "Password Smarrita" e ti sar&agrave; spedita una nuova password.');
if (!defined('_VALID_AZ09'))		DEFINE('_VALID_AZ09',"Cortesemente, inserisci un valido %s.  Niente spazi, più di %d caratteri e contenente 0-9,a-z,A-Z");
/** classes/html/registration.php */
if (!defined('_PROMPT_PASSWORD'))	DEFINE('_PROMPT_PASSWORD','Password smarrita?');
if (!defined('_NEW_PASS_DESC'))		DEFINE('_NEW_PASS_DESC','Cortesemente, inserisci il tuo Pseudonimo ed il tuo indirizzo e-mail, quindi clicca sul pulsante Spedisci Password.<br />'
.'Riceverai una nuova password in breve.  Usa questa nuova password per accedere al sito web.');
if (!defined('_PROMPT_UNAME'))		DEFINE('_PROMPT_UNAME','Pseudonimo:');
if (!defined('_PROMPT_EMAIL'))		DEFINE('_PROMPT_EMAIL','Indirizzo E-mail:');
if (!defined('_BUTTON_SEND_PASS'))	DEFINE('_BUTTON_SEND_PASS','Spedisci Password');
if (!defined('_REGISTER_TITLE'))	DEFINE('_REGISTER_TITLE','Registrazione');
if (!defined('_REGISTER_NAME'))		DEFINE('_REGISTER_NAME','Nome:');
if (!defined('_REGISTER_UNAME'))	DEFINE('_REGISTER_UNAME','Pseudonimo:');
if (!defined('_REGISTER_EMAIL'))	DEFINE('_REGISTER_EMAIL','E-mail:');
if (!defined('_REGISTER_PASS'))		DEFINE('_REGISTER_PASS','Password:');
if (!defined('_REGISTER_VPASS'))	DEFINE('_REGISTER_VPASS','Verifica Password:');
if (!defined('_BUTTON_SEND_REG'))	DEFINE('_BUTTON_SEND_REG','Invia Registrazione');
if (!defined('_SENDING_PASSWORD'))	DEFINE('_SENDING_PASSWORD','La tua password sar&agrave; spedita all\'indirizzo e-mail sopra citato.<br />una volta ricevuta'
.' la nuova password, potrai accedere al sito e modificarla.');
if (!defined('_LOGIN_SUCCESS'))		DEFINE('_LOGIN_SUCCESS','Ti sei collegato correttamente');
if (!defined('_LOGOUT_SUCCESS'))	DEFINE('_LOGOUT_SUCCESS','Ti sei scollegato correttamente');
if (!defined('_LOGIN_BLOCKED'))		DEFINE('_LOGIN_BLOCKED','La tua utenza &egrave; bloccata.');
if (!defined('_CMN_YES'))			DEFINE('_CMN_YES','Si');
if (!defined('_CMN_NO'))			DEFINE('_CMN_NO','No');
if (!defined('_CMN_SHOW'))			DEFINE('_CMN_SHOW','Mostra');
if (!defined('_CMN_HIDE'))			DEFINE('_CMN_HIDE','Nascondi');
if (!defined('_LOGIN_INCOMPLETE'))	DEFINE('_LOGIN_INCOMPLETE','Cortesemente, completa i campi pseudonimo e password.');
if (!defined('_LOGIN_INCORRECT'))	DEFINE('_LOGIN_INCORRECT','Pseudonimo o password non corretti. Cortesemente, prova nuovamente.');
if (!defined('_USER_DETAILS_SAVE'))	DEFINE('_USER_DETAILS_SAVE','Le tue impostazioni sono state memorizzate.');

// 1.1:
DEFINE('_UE_MENU_STATUS', 'Stato');
DEFINE('_UE_YOURCONNECTIONS','Tue Connessioni');
DEFINE('_UE_USERSNCONNECTIONS','Connessioni di %s');
DEFINE('_UE_SEEALLNCONNECTIONS','Vedi tutte le %s connessioni');
DEFINE('_UE_SEEALLOFUSERSNCONNECTIONS','Vedi tutte le connessioni di %s (%s)');
DEFINE('_UE_YOU_ARE_ALREADY_REGISTERED','Sei gi&agrave; registato con questo pseudonimo e questa password.');
DEFINE('_UE_SESSION_EXPIRED','Sessione scaduta e/o cookie non abilitati nel tuo browser.');
DEFINE('_UE_PLEASE_REFRESH','Cortesemente, aggiorna/ricarica la pagina prima di scriverci su.');
DEFINE('_UE_REGISTERFORPROFILEVIEW','Cortesemente, Identificati o Registrati per vedere i profili utente.');
DEFINE('_UE_INFORMATION_FOR_FIELD','Informazioni per: %s : %s');
DEFINE('_UE_ALLOWMODERATORSUSEREDIT_DESC','Permette ai moderatori di modificare i profili utente ed aggiungere , modificare o eliminare gli avatar utente. I Moderatori non possono modificare i profili di altri moderatori dello stesso livello o superiore');
DEFINE('_UE_ALLOWMODERATORSUSEREDIT','Consenti ai Moderatori la modifica dei Profili Utente');
DEFINE('_UE_USERPROFILEBLOCKED','Questo profilo non &egrave; più disponibile.');
DEFINE('_UE_EDIT_OTHER_USER_TITLE','Modifica Dettagli di %s');
DEFINE('_UE_MOD_MENU_UPDATEPROFILE', 'Aggiorna profilo utente');
DEFINE('_UE_MOD_MENU_UPDATEPROFILE_DESC', 'Modifica le impostazioni di questo profilo utente');
DEFINE('_UE_MOD_MENU_UPDATEAVATAR', 'Aggiorna immagine utente');
DEFINE('_UE_MOD_MENU_UPDATEAVATAR_DESC', 'Scegli l\'immagine di questo profilo utente');
DEFINE('_UE_MOD_MENU_DELETE_AVATAR', 'Elimina immagine utente');
DEFINE('_UE_MOD_MENU_DELETE_AVATAR_DESC', 'Elimina l\'immagine di questo profilo utente');
DEFINE('_UE_MOD_MENU_VIEWOLDUSERREPORTS','Vedi le segnalazioni utente elaborate');
DEFINE('_UE_MOD_MENU_VIEWOLDUSERREPORTS_DESC','Come moderatore del sito: Vedi le segnalazioni elaborate per questo utente');
DEFINE('_UE_REPORTSTATUS','Stato della segnalazione');
DEFINE('_UE_REPORTSTATUS_OPEN','Aperta');
DEFINE('_UE_REPORTSTATUS_PROCESSED','Elaborata');
DEFINE('_UE_UNBANUSER','Profilo utente sbloccato');
DEFINE('_UE_UNBANNEDON','Data Sblocco');
DEFINE('_UE_UNBANNEDBY','Sbloccato Da');
DEFINE('_UE_MENU_BANPROFILE_HISTORY','Cronologia Blocchi');
DEFINE('_UE_MENU_BANPROFILE_HISTORY_DESC', 'Come moderatore del sito: Vedi la cronologia dei blocchi di questo profilo');
DEFINE('_UE_BANSTATUS','Stato Blocco');
DEFINE('_UE_BANSTATUS_BANNED','Bloccato');
DEFINE('_UE_BANSTATUS_UNBAN_REQUEST_PENDING','Richiesta Sblocco in attesa');
DEFINE('_UE_BANSTATUS_PROCESSED','Elaborato');
DEFINE('_UE_UNNAMED_USER','Utente senza nome');
DEFINE('_UE_REG_CB_ALLOW','Permetti Registrazione Utente');
DEFINE('_UE_REG_CB_ALLOW_DESC','Attiva la registrazione utente come impostato nella configurazione globale del sito, o altrimenti solo tramite CB.<br />Impostazione consigliata: solo tramite CB : impostazione : S&igrave; qui e "No" nella configurazione globale del sito.');
DEFINE('_UE_REG_PROFILE_2COLS','Impaginazione a 2 colonne: larghezza:');
DEFINE('_UE_REG_PROFILE_2COLS_RIGHT_REST','Destra: il rimanente!');
DEFINE('_UE_REG_PROFILE_2COLS_DESC','Larghezza impaginazione in % per profili a 2 colonne');
DEFINE('_UE_REG_PROFILE_3COLS','Impaginazione a 3 colonne: larghezza:');
DEFINE('_UE_REG_PROFILE_3COLS_RIGHT_REST','Destra: il rimanente!');
DEFINE('_UE_REG_PROFILE_3COLS_DESC','Larghezza impaginazione in % per profili a 3 colonne. Colonna centrale: il rimanente!');
DEFINE('_UE_REG_FILTER_ALLOWED_TAGS','Non filtrare i seguenti marcatori nelle caselle di testo:');
DEFINE('_UE_REG_FILTER_ALLOWED_TAGS_DESC','Inserisci i marcatori (tag) che non devono essere filtrati, separandoli con singoli spazi, per esempio: `applet body bgsound embed`.<br />ATTENZIONE: ti assumi il rischio di questa scelta, poich&eacute; gli utenti potrebbero inserire codice malware. Il filtro predefinito non lo permette: i seguenti marcatori sono filtrati automaticamente e possono essere esclusi aggiungendoli:');
DEFINE('_UE_REG_FURTHER_SETTINGS','Ulteriori impostazioni:');
DEFINE('_UE_REG_FURTHER_SETTINGS_MORE','vedi parametri plugin e pannelli.');
DEFINE('_UE_REG_FURTHER_SETTINGS_DESC','Maggiori impostazioni sono disponibili nel menu: Componenti / Community Builder / Plugin Management e / Tab Management. Ogni plugin e ogni pannello pu&ograve; essere modificati e hanno i loro parametri specifici. Plugin e pannelli devono essere pubblicati per divenire attivi.');
// 1.1: backend global config:
DEFINE('_UE_REG_CONFIGURATION_MANAGER','Gestore Configurazione');
DEFINE('_UE_REG_ALLOWREG_SAME_AS_GLOBAL','come il parametro `allow registration` della configurazione globale');
DEFINE('_UE_REG_ALLOWREG_YES','si, independentemente dalla configurazione globale del sito');
DEFINE('_UE_NONE','No');
DEFINE('_UE_REG_NAMEFORMAT_NAME_ONLY','Solo Nome');
DEFINE('_UE_REG_NAMEFORMAT_NAME_USERNAME','Nome (Pseudonimo)');
DEFINE('_UE_REG_NAMEFORMAT_USERNAME_ONLY','Solo Pseudonimo');
DEFINE('_UE_REG_NAMEFORMAT_USERNAME_NAME','Pseudonimo (Nome)');
DEFINE('_UE_REG_NAMEFORMAT_SINGLE_FIELD','Campo Nome Singolo');
DEFINE('_UE_REG_NAMEFORMAT_TWO_FIELDS','Campi Nome e Cognome');
DEFINE('_UE_REG_NAMEFORMAT_THREE_FIELDS','Campi Nome, Secondo Nome e Cognome');
DEFINE('_UE_REG_EMAILDISPLAY_EMAIL_ONLY','Mostra solo Email');
DEFINE('_UE_REG_EMAILDISPLAY_EMAIL_W_MAILTO','Mostra Email con collegamento MailTo');
DEFINE('_UE_REG_EMAILDISPLAY_EMAIL_W_FORM','Mostra collegamento al modulo Email Form');
DEFINE('_UE_REG_EMAILDISPLAY_EMAIL_NO','Non Mostrare Email');
DEFINE('_UE_GROUPS_EVERYBODY','Tutti');
DEFINE('_UE_GROUPS_ALL_REG_USERS','Utenti Registrati');
DEFINE('_UE_WARNING','Attenzione');
DEFINE('_UE_YOUR_CONFIG_FILE','Il tuo file di configurazione');
DEFINE('_UE_IS_NOT_WRITABLE','non &egrave; modificabile');
DEFINE('_UE_NEED_TO_CHMOD_CONFIG','Devi usare chmod con valore 766 su questo file per poter aggiornare la configurazione');
DEFINE('_UE_FILE_UNWRITABLE','');
DEFINE('_UE_LEFT','Sinistra');
DEFINE('_UE_RIGHT','Destra');
DEFINE('_UE_CENTER','Centro');
DEFINE('_UE_UP','Su');
DEFINE('_UE_DOWN','Giu');
DEFINE('_UE_TOP','In Cima');
DEFINE('_UE_BOTTOM','In Fondo');
DEFINE('_UE_MODERATORS_AND_ABOVE','Moderatori CB e livelli superiori');
DEFINE('_UE_SUPERADMINS_ONLY','Solo Super-Administrators');
DEFINE('_UE_ADMINS_AND_SUPERADMINS_ONLY','Solo Administrators e Super-administrators');
DEFINE('_UE_NO_PARAMS','Non ci sono parametri per quest\'oggetto');
DEFINE('_UE_CALENDAR_TYPE','Tipo di Calendario');
DEFINE('_UE_CALENDAR_TYPE_DESC','Scegli quale calendario utilizzare per la selezione delle date.');
DEFINE('_UE_CALENDAR_TYPE_POPUP','Calendario Popup');
DEFINE('_UE_CALENDAR_TYPE_DROPDOWN_POPUP','Casella a discesa + calendario popup');
DEFINE('_UE_REG_USERNAMECHECKER','Verifica Ajax del nome utente');
DEFINE('_UE_REG_USERNAMECHECKER_DESC','Permette di verificare se il nome utente &egrave; disponibile durante la registrazione. &Egrave; una funzionalit&agrave; sperimentale, non ancora ottimizzata per grandi siti: &egrave; consigliata una prova di funzionamento!');
// 1.1: frontend:
DEFINE('_UE_BUTTON_LOGIN','Accesso');
DEFINE('_UE_BUTTON_LOGOUT','Uscita');
DEFINE('_UE_DO_LOGIN','&Egrave; necessario accedere.');
DEFINE('_UE_DO_LOGOUT','&Egrave; necessario uscire.');
DEFINE('_UE_CHECK_USERNAME_AVAILABILITY',"Verifica la disponibilit&agrave; del nome utente");
DEFINE('_UE_USERNAME_ALREADY_EXISTS',"Il nome utente '%s' &egrave; gi&agrave; registrato: scegline un altro.");
DEFINE('_UE_USERNAME_DOESNT_EXISTS',"Il nome utente '%s' &egrave; libero: puoi registrarlo.");
DEFINE('_UE_CHECKING',"Verifica...");
DEFINE('_UE_SORRY_CANT_CHECK',"Spiacente, non &egrave; possibile verificare.");
DEFINE('_UE_PLEAE_CHECK_PROFILE','Controlla il tuo profilo');
DEFINE('_UE_BANNED_CHANGE_PROFILE','Il tuo profilo &egrave; stato bloccato. &Egrave; visibile solo da te e dai moderatori.<br />Segui le richieste dei moderatori e poi clicca su moderazione / sblocco per inviare la richiesta di sblocco del tuo profilo.');
DEFINE('_UE_WARNING_EDIT_OTHER_USER_PROFILE','ATTENZIONE: Questo non &egrave; il tuo profilo. Come moderatore, stai modificando il profilo dell\'utente: %s.');
DEFINE('_UE_BACK_TO_YOUR_PROFILE','Torna al tuo profilo');
// CB captcha plugin strings in core cb 1.1:
DEFINE('_UE_CAPTCHA_Label','Codice di Sicurezza');
DEFINE('_UE_CAPTCHA_Enter_Label','Inserisci Codice di Sicurezza');
DEFINE('_UE_CAPTCHA_Desc','Enter Inserisci Codice di Sicurezza da una immagine');
DEFINE('_UE_CAPTCHA_NOT_VALID','Codice di Sicurezza non valido');
DEFINE('_UE_CAPTCHA_ALT_IMAGE','Immagine con Codice di Sicurezza incorporato');
DEFINE('_UE_CAPTCHA_AUDIO','clicca qui per ascoltare le lettere');
DEFINE('_UE_CAPTCHA_AUDIO_POPUP_TITLE','Riproduzione Audio CB Captcha');
DEFINE('_UE_CAPTCHA_AUDIO_POPUP_DESCRIPTION','Ascolta la riproduzione audio dell\'immagine captcha');
DEFINE('_UE_CAPTCHA_AUDIO_DOWNLOAD','Clicca per riprodurre esternamente o per scaricare il file audio');
DEFINE('_UE_CAPTCHA_AUDIO_CLICK2DOWNLOAD','(click-destro o control-click)');
DEFINE('_UE_CAPTCHA_AUDIO_POPUP_CLOSEWINDOW','Clicca per chiudere la finestra');

// 1.2 Frontend:
DEFINE('_UE_ERROR_USER_NOT_SYNCHRONIZED','Utente non esistente o non sincronizzato con CB');
DEFINE('_LOGIN_TITLE','Accesso');
DEFINE('_LOGIN_REGISTER_TITLE','Benvenuto, per favore identificati o registrati:');
DEFINE('_UE_UPLOAD_DIMENSIONS_AVATAR','La tua immagine sar&agrave; ridotta se necessario fino alle dimensioni di %s pixel di larghezza x %s di altezza automaticamente, ma il tuo file immagine non dovrebbe eccedere i %s KB.');
DEFINE('_UE_LOGIN_BLOCKED','La tua utenza &egrave; bloccata.');
DEFINE('_UE_REMEMBER_ME', 'Ricordami');
DEFINE('_UE_PASSWORD_REMINDER','Recupera password');
DEFINE('_UE_USERNAME_PASSWORD_REMINDER','Recupera Nome utente/Password');
DEFINE('_UE_REMINDER_NEEDED_FOR','Recupero necessario per');
DEFINE('_UE_LOST__USERNAME','Nome utente dimenticato');
DEFINE('_UE_LOST__PASSWORD','Password dimenticata');
DEFINE('_UE_LOST_PASSWORD','Password dimenticata?');
DEFINE('_UE_USERNAMEREMINDER_SUB','Recupero nome utente per %s');
DEFINE('_UE_USERNAMEREMINDER_MSG','Salve,\n'
.'&Egrave; stato chiesto un recupero del nome utente per la tua utenza %s .\n\n'
.'Il tuo pseudonimo &egrave;: %s\n\n'
.'Per collegarti alla tua utenza, clicca su questo collegamento:\n'
.'%s\n\n'
.'Grazie.\n');
DEFINE('_UE_NEWPASS_SUB','Nuova password per: %s');
DEFINE('_UE_NEWPASS_MSG','L\'utenza %s ha questa email associata ad esso.\n'
.'Un utente dal sito web %s ha appena richiesto l\'assegnazione di una nuova password.\n\n'
.'La tua Nuova Password &egrave;: %s\n\n'
.'Se non hai richiesto l\'assegnazione di una nuova password, non preoccuparti.'
.' Solo tu puoi leggere questo messaggio, nessun altro. Se &egrave; stata una richiesta errata, collegati al sito con questa'
.' nuova password e quindi cambiala con quella che preferisci.');
DEFINE('_UE_ALREADY_LOGGED_IN','Sei gi&agrave; identificato nel sito');
DEFINE('_UE_EMAIL_COULD_NOT_CHECK','Impossibile verificare questa email: Cortesemente ricontrolla: Occorre la conferma.');
DEFINE('_UE_EMAIL_COULD_NOT_CHECK_NEEDED','Impossibile verificare questa email: Cortesemente ricontrolla.');
DEFINE('_UE_EMAIL_INCORRECT_CHECK','Questa email non accetta posta: Cortesemente controlla.');
DEFINE('_UE_EMAIL_INCORRECT_CHECK_NEEDED','Questa email non accetta posta: Occorre la conferma.');
DEFINE('_UE_EMAIL_VERIFIED','Questo indirizzo sembra corretto.');
DEFINE('_UE_EMAIL_NOVALID','Questo indirizzo non &egrave; valido.');
DEFINE('_UE_EMAIL_ALREADY_REGISTERED','Questo indirizzo &egrave; gi&agrave; registrato, forse da te stesso.');
DEFINE('_UE_FIELDONPROFILE_SHORT','Campi visibili nel tuo profilo');
DEFINE('_UE_FIELDNOPROFILE_SHORT','Campi <strong>non</strong> visibili nel profilo');
DEFINE('_UE_FIELDREQUIRED_SHORT','Campi obbligatori');
DEFINE('_UE_FIELDDESCRIPTION_SHORT','Informazioni: Punta il mouse sulle icone');
DEFINE('_UE_AVATAR_UPLOAD_DISCLAIMER','Cliccando "Carica", ti assumi la responsabilit&agrave; della pubblicazione di questa immagine.');
DEFINE('_UE_AVATAR_UPLOAD_DISCLAIMER_TERMS','Cliccando "Carica", ti assumi la responsabilit&agrave; della pubblicazione di questa immagine e garantisci che non v&igrave;oli %s.');
DEFINE('_UE_AVATAR_TOC_LINK','Termini e Condizioni');
DEFINE('_UE_USER_EMAIL_CONFIRMED','Indirizzo Email gi&agrave; confermato');
DEFINE('_UE_LOST_USERNAME_PASSWORD','Dimenticate le credenziali?');
DEFINE('_UE_LOST_USERNAME_OR_PASSWORD','Dimenticato il tuo Nome utente o la tua Password?');
DEFINE('_UE_LOST_USERNAME_DESC','Se hai <strong>dimenticato il tuo nome utente</strong>, per favore inserisci il tuo indirizzo e-mail, lasciando vuoto il campo nome utente, quindi clicca il bottone Spedisci Nome utente, e il tuo nome utente sar&agrave; spedito al tuo indirizzo email.');
DEFINE('_UE_LOST_PASSWORD_DESC','Se hai <strong>dimenticato la tua password</strong> ma ricordi il tuo nome utente, per favore inserisci il tuo nome utente e il tuo indirizzo e-mail, premi il bottone Spedisci password, e riceverai una nuova password a breve. Usa questa nuova password per accedere al sito.');
DEFINE('_UE_LOST_USERNAME_PASSWORD_DESC','Se hai <strong>dimenticato il tuo nome utente e la tua password</strong>, per favore recupera prima il nome utente, quindi la password. Per recuperare il nome utente, per favore inserisci il tuo indirizzo e-mail, lasciando vuoto il campo nome utente, quindi clicca il bottone Spedisci nome utente, e il tuo nome utente sar&agrave; spedito al tuo indirizzo email. A questo punto, puoi usare lo stesso metodo per recuperare la password.');
DEFINE('_UE_BUTTON_SEND','Spedisci');
DEFINE('_UE_BUTTON_SEND_USERNAME','Spedisci Nome utente');
DEFINE('_UE_BUTTON_SEND_PASS','Spedisci Password');
DEFINE('_UE_BUTTON_SEND_USERNAME_PASS','Spedisci Nome utente/Password');
DEFINE('_UE_USERNAME_EXISTS_ON_SITE',"Il nome utente '%s' esiste in questo sito.");
DEFINE('_UE_USERNAME_DOES_NOT_EXISTS_ON_SITE',"Il nome utente '%s' non esiste in questo sito.");
DEFINE('_UE_USERNAME_FREE_OK_TO_PROCEED',"Il nome utente '%s' &egrave; libero: puoi proseguire.");
DEFINE('_UE_THIS_IS_YOUR_USERNAME',"Questo &egrave; il tuo nome utente attuale in questo sito.");
DEFINE('_UE_THIS_IS_USERS_USERNAME',"Questo &egrave; l'attuale nome utente dell'utente nel sito.");
DEFINE('_UE_EMAIL_EXISTS_ON_SITE',"L\'email '%s' esiste in questo sito.");
DEFINE('_UE_EMAIL_DOES_NOT_EXISTS_ON_SITE',"L\'email '%s' non esiste in questo sito.");
DEFINE('_UE_SEARCH_ERROR','Errore Ricerca');
DEFINE('_UE_EMAIL_SENDING_ERROR','Errore durante la spedizione email');
DEFINE('_UE_USERNAME_REMINDER_SENT','Un promemoria del tuo nome utente &egrave; stato spedito all\'indirizzo email %s. Cortesemente controlla la tua email (e se necessario, anche la cartella di posta indesiderata)!');
DEFINE('_UE_NEWPASS_SENT','Nuova password creata e spedita al tuo indirizzo email %s. Cortesemente, controlla la tua email (e se necessario, anche la cartella di posta indesiderata)!');
DEFINE('_UE_VALID_UNAME','Cortesemente, inserisci un nome utente corretto.  Niente spazi, almeno 3 lettere contenenti 0-9,a-z,A-Z');
DEFINE('_UE_VALID_UNAME_CHARS','Cortesemente, inserisci un %s corretto. Niente spazi, almeno %s caratteri contenenti 0-9,a-z,A-Z');
DEFINE('_UE_VALID_PASS','Cortesemente, inserisci una password corretta. Niente spazi, almeno 6 caratteri e contenente lettere maiuscole e minuscole, numeri e segni di punteggiatura');
DEFINE('_UE_VALID_PASS_CHARS','Cortesemente, inserisci un %s corretto.  Niente spazi, almeno %s caratteri e contenente lettere maiuscole e minuscole, numeri e segni di punteggiatura');
DEFINE('_UE_VALID_MIN_LENGTH','Cortesemente, inserisci un %s corretto: almeno %s caratteri: hai inserito %s caratteri.');
DEFINE('_UE_VALID_MAX_LENGTH','Cortesemente, inserisci un %s corretto: al massimo %s caratteri: hai inserito %s caratteri.');
DEFINE('_UE_REGWARN_NAME','Cortesemente, inserisci il tuo nome completo.');
DEFINE('_UE_REGWARN_FNAME','Cortesemente, inserisci il tuo vero nome.');
DEFINE('_UE_REGWARN_MNAME','Cortesemente, inserisci il tuo secondo nome.');
DEFINE('_UE_REGWARN_LNAME','Cortesemente, inserisci il tuo vero cognome.');
DEFINE('_UE_REGWARN_MAIL','Cortesemente, inserisci un indirizzo e-mail valido. Una email di conferma sar&agrave; spedita a questo indirizzo alla fine della registrazione.');
DEFINE('_UE_REGWARN_VPASS2','La password e la verifica non coincidono, cortesemente riprova.');
DEFINE('_UE_VERIFY_SOMETHING','Verifica %s');
DEFINE('_UE_NO_PREFERENCE','Nessuna preferenza');
DEFINE('_UE_NO_INDICATION','Nessuna indicazione');
DEFINE('_UE_SEARCH_CRITERIA','Criteri di ricerca');
DEFINE('_UE_SEARCH_RESULTS','Risultati ricerca');
DEFINE ('_UE_SEARCH_USERS','Ricerca Utenti');
DEFINE ('_UE_FIND_USERS','Trova Utenti');
DEFINE ('_UE_SEARCH_FROM','Tra');
DEFINE ('_UE_SEARCH_TO','e');
DEFINE ('_UE_MATCH_IS','&egrave;');
DEFINE ('_UE_MATCH_IS_NOT','non &egrave;');
DEFINE ('_UE_MATCH_IS_EXACTLY','&egrave; esattamente');
DEFINE ('_UE_MATCH_IS_EXACTLY_NOT','&egrave; esattamente diverso da');
DEFINE ('_UE_MATCH_ARE_EXACTLY','sono esattamente');
DEFINE ('_UE_MATCH_ARE_EXACTLY_NOT','sono esattamente diversi da');
DEFINE ('_UE_MATCH_IS_ONE_OF','&egrave; uno di');
DEFINE ('_UE_MATCH_IS_NOT_ONE_OF','non &egrave; uno di');
DEFINE ('_UE_MATCH_PHRASE','contiene la frase');
DEFINE ('_UE_MATCH_PHRASE_NOT','non contiene la frase');
DEFINE ('_UE_MATCH_ALL','contiene tutti di');
DEFINE ('_UE_MATCH_ALL_NOT','non contiene tutti di');
DEFINE ('_UE_MATCH_ANY','contiene uno di');
DEFINE ('_UE_MATCH_ANY_NOT','non contiene uno di');
DEFINE ('_UE_MATCH_INCLUDE_ALL_OF','comprende tutti i');
DEFINE ('_UE_MATCH_INCLUDE_ALL_OF_NOT','non comprende tutti i');
DEFINE ('_UE_MATCH_INCLUDE_ANY_OF','comprende uno di');
DEFINE ('_UE_MATCH_INCLUDE_ANY_OF_NOT','non comprende uno di');
DEFINE ('_UE_MATCH_EXCLUSIONS','Esclusioni');
DEFINE ('_UE_AVATAR_NONE','Nessuna immagine');
DEFINE ('_UE_AVATAR_NO_CHANGE','Nessuna modifica immagine');
DEFINE ('_UE_AVATAR_UPLOAD','Carica immagine');
DEFINE ('_UE_AVATAR_UPLOAD_NEW','Carica nuova immagine');
DEFINE ('_UE_AVATAR_SELECT','Scegli immagine dalla galleria');
DEFINE ('_UE_HAS_PROFILE_IMAGE','Ha un\'immagine nel profilo');
DEFINE ('_UE_HAS_NO_PROFILE_IMAGE','Non ha un\'immagine nel profilo');
DEFINE ('_UE_AGE_YEARS','%s anni');
DEFINE ('_UE_YEARS','anni');
DEFINE ('_UE_HI_NAME','Ciao, %s');

// 1.2 Backend:
DEFINE('_UE_TOP_AND_BOTTOM','In Cima e in Fondo');
DEFINE('_UE_REG_SHOW_ICONS_EXPLAIN','Mostra spiegazioni icone');
DEFINE('_UE_REG_SHOW_ICONS_EXPLAIN_DESC','Indica se le icone con le spiegazioni devono comparire in cima e/o in fondo alla pagina di registrazione (predefinito &egrave; cima e fondo)');
DEFINE('_UE_ICONS_DISPLAY','Mostra icone dei campi');
DEFINE('_UE_ICONS_DISPLAY_DESC','Indica se icone e spiegazioni devono essere mostrate nelle pagine di registrazione e modifica profilo. Le icone informative vengono mostrate comunque se i campi di descrizione sono presenti.');
DEFINE('_UE_REG_SHOW_LOGIN_ON_PAGE','Mostra login nella pagina di registrazione');
DEFINE('_UE_REG_SHOW_LOGIN_ON_PAGE_DESC','Indica se il contenuto del modulo login deve comparire fianco a fianco nella pagina di registrazione. IMPORTANTE: per funzionare, il CB login module login deve essere installato.');
DEFINE('_UE_REQUIRED_ONLY','Solo l\'icona necessaria');
DEFINE('_UE_PROFILE_ONLY','Solo il Profilo / Nessuna icona Profilo');
DEFINE('_UE_REQUIRED_AND_PROFILE_ONLY','Solo icone Necessarie e del Profilo');
DEFINE('_UE_INFO_ONLY','Solo icone Informative');
DEFINE('_UE_REQUIRED_AND_INFO_ONLY','Solo icone Necessarie e Informative');
DEFINE('_UE_PROFILE_AND_INFO_ONLY','Solo icone Profilo e Informative');
DEFINE('_UE_REQUIRED_PROFILE_AND_INFO','Tutte le icone: Necessarie, Profilo e Informative');
DEFINE('_UE_ALWAYSRESAMPLEUPLOADS','Ricampiona sempre avatar caricati');
DEFINE('_UE_ALWAYSRESAMPLEUPLOADS_DESC','Ricampionare le immagini caricate aumenta la sicurezza per gli utenti che navigano il sito, ma solo ImageMagick non altera le animazioni delle immagini GIF.');
DEFINE('_UE_FRONTENDUSERPARAMS','Abilita la modifica dei parametri utente nell\'area pubblica');
DEFINE('_UE_FRONTENDUSERPARAMS_DESC','Mostra i parametri utente e permette agli utenti di modificarli nella propria pagina del profilo.');
DEFINE('_UE_REG_CB_EMAILPASS','Genera automaticamente una password casuale per la registrazione');
DEFINE('_UE_REG_CB_EMAILPASS_DESC','Stabilisce se la password &egrave; generata e spedita all\'utente (valore S&igrave;) o se dev\'essere richiesta all\'utente nella pagina di iscrizione (valore "No", predefinito, consigliato).');
DEFINE('_UE_REG_EMAILCHECKER','Verifica Ajax Email');
DEFINE('_UE_REG_EMAILCHECKER_WARNING','ATTENZIONE: il tuo sistema PHP non ha la funzione "getmxrr()" istallata e attivata. Poich&eacute; &egrave; una funzionalit&agrave; solo per Linux, questo &egrave; normale sui server Windows, quindi email DNS e SMTP checking non saranno disponibili, a meno che questa sia attivata.');
DEFINE('_UE_REG_EMAILCHECKER_DESC','Verifica se una email &egrave; valida durante l\'iscrizione, controllando il formato e-mail esatto, l\'esistenza degli MX DNS records, e la disponibilit&agrave; ad accettare le email in arrivo da questo indirizzo da parte del SMTP. Puoi anche verificare che l\'email non sia gi&agrave; stata registrata. ATTENZIONE: questo controllo-email-gi&agrave;-registrata potrebbe sollevare PROBLEMI DI PRIVATEZZA sul tuo sito web e/o nel tuo paese, poich&eacute; dalla pagina di iscrizione, chiunque potrebbe controllare se un indirizzo &egrave; iscritto! Per favore utilizzalo solo dopo esserti assicurato che non v&igrave;oli la normativa di legge. Per il controllo SMTP, il tuo server deve avere un indirizzo IP fisso, l\'indirizzo email del sito deve essere valido e questo server deve essere elencato fra i mittenti autorizzati (SPF record) per funzionare correttamente con molti indirizzi email. Sei avvisato che sebbene questa funzionalit&agrave; sia protetta, in alcune circostanze, essa potrebbe essere abusata. Questa &egrave; sperimentale, non ancora ottimizzata per grandi siti: prova prima!');
DEFINE('_UE_REG_EMAILCHECKER_VALID_EMAIL_ONLY','Si, Controlla solo che l\'email server accetti email');
DEFINE('_UE_REG_EMAILCHECKER_NOT_REGISTERED_AND_VALID_EMAIL','Si, Controlla per le email non registrate e per il server (!!! privacy ! leggi la nota)');
DEFINE('_UE_REG_UNIQUEEMAIL','Richiedi E-mail univoca');
DEFINE('_UE_REG_UNIQUEEMAIL_DESC','Se S&igrave;, gli utenti non possono condividere lo stesso indirizzo email. Questa &egrave; una impostazione globale del CMS per questo sito, oppure una caratteristica del CMS. CB si adatta automaticamente a questa impostazione/caratteristica.');

// 1.2 FIREBOARD support - these strings are actually used in a CB tab and fields that are added by FB backend
DEFINE('_UE_FB_TABTITLE', 'Forum' );
DEFINE('_UE_FB_ORDERING_OLDEST', 'Prima i piu vecchi' );
DEFINE('_UE_FB_ORDERING_LATEST', 'Prima i piu nuovi' );
DEFINE('_UE_FB_ORDERING_TITLE', 'Ordinamento' );
DEFINE('_UE_FB_SIGNATURE', 'Firma nel forum' );
DEFINE('_UE_FB_VIEWTYPE_FLAT', 'Piatta' );
DEFINE('_UE_FB_VIEWTYPE_THREADED', 'Ad albero' );
DEFINE('_UE_FB_VIEWTYPE_TITLE', 'Visualizzazione' );
DEFINE('_UE_FB_TABDESC', 'Impostazioni personali forum' );
// 1.2 Extended forum strings for FIREBOARD favorites support in CB plugin (this is why they have _FB_ instead of _FORUM)
DEFINE('_UE_FB_FAVORITES','Discussioni preferite');
DEFINE('_UE_FB_REMOVE_FAVORITE_THREAD',':: Rimuovi preferito ::');
DEFINE('_UE_FB_NO_FAVORITES_FOUND','Nessuna voce nei preferiti');
DEFINE('_UE_FB_REMOVE_FAVORITES_ALL','Rimuovi tutti i preferiti');
DEFINE('_UE_FB_CONFIRMUNFAVORITEALL','Sei sicuro di voler rimuovere tutte le discussioni preferite?');

// 1.2 CB Team extensions
DEFINE('_UE_PROFILE_GALLERY','Galleria Profilo');
DEFINE('_UE_PROFILE_GALLERY_DESC','Questo pannello contiene una galleria elementare e senza fronzoli per i profili CB');
DEFINE('_UE_PROFILE_GALLERY_MODERATION','Moderazione Galleria');
DEFINE('_UE_PROFILE_GALLERY_MODERATION_DESC','Questo pannello contiene tutte gli oggetti della galleria in attesa di approvazione');
DEFINE('_UE_PROFILE_BOOK','Libro Profilo');
DEFINE('_UE_PROFILE_BOOK_DESC','Descrizione Libro Profilo');

// 1.2 CB beta 8+9+10:
DEFINE('_UE_AVATAR_DISCLAIMER','Cliccando "%s", garantisci di avere i diritti per diffondere questa immagine.');
DEFINE('_UE_AVATAR_DISCLAIMER_TERMS','Cliccando "%s", garantisci di avere i diritti per diffondere questa immagine e che essa non v&igrave;ola %s.');
DEFINE('_UE_AGE','Et&agrave;');
DEFINE('_UE_CLOAKED','Questo indirizzo e-mail &egrave; protetto da spam bot, devi attivare JavaScript nel tuo web browser per vederlo');
DEFINE ('_UE_YEAR','anno');
DEFINE ('_UE_MONTHS','mesi');
DEFINE ('_UE_MONTH','mese');
DEFINE ('_UE_DAYS','giorni');
DEFINE ('_UE_DAY','giorno');
DEFINE ('_UE_HOURS','ore');
DEFINE ('_UE_HOUR','ora');
DEFINE ('_UE_MINUTES','minuti');
DEFINE ('_UE_MINUTE','minuto');
DEFINE ('_UE_SECONDS','secondi');
DEFINE ('_UE_SECOND','secondo');
DEFINE ('_UE_ANYTHING_AGO','%s fa');
DEFINE ('_UE_NOW','Ora');
DEFINE ('_UE_YEAR_NOT_IN_RANGE','Anni %s non sono compresi fra %s e %s');
DEFINE ('_UE_ADD_IMAGE','Aggiungi immagine');
DEFINE ('_UE_LINE','Linea');
DEFINE ('_UE_COLUMN','Colonna');
DEFINE ('_UE_MONTHS_1','Gennaio');
DEFINE ('_UE_MONTHS_2','Febbraio');
DEFINE ('_UE_MONTHS_3','Marzo');
DEFINE ('_UE_MONTHS_4','Aprile');
DEFINE ('_UE_MONTHS_5','Maggio');
DEFINE ('_UE_MONTHS_6','Giugno');
DEFINE ('_UE_MONTHS_7','Luglio');
DEFINE ('_UE_MONTHS_8','Agosto');
DEFINE ('_UE_MONTHS_9','Settembre');
DEFINE ('_UE_MONTHS_10','Ottobre');
DEFINE ('_UE_MONTHS_11','Novembre');
DEFINE ('_UE_MONTHS_12','Dicembre');
DEFINE ('_UE_NO_ANSWER','Nessuna risposta');
DEFINE ('_UE_ANY','Qualunque');
DEFINE ('_UE_TODAY','oggi');
// 1.2 CB beta 8+9+10 backend:
DEFINE ('_UE_SHOWEMPTYTABS','Mostra i pannelli vuoti');
DEFINE ('_UE_SHOWEMPTYTABS_DESC','Mostra tutti i pannelli, anche se il pannello non ha contenuto, oppure mostra i pannelli solo se hanno contenuto');
DEFINE ('_UE_SHOWEMPTYFIELDS','Mostra campi vuoti');
DEFINE ('_UE_SHOWEMPTYFIELDS_DESC','Mostra tutti i campi, anche se un campo non ha contenuto, o mostra solamente i campi che hanno contenuto');
DEFINE ('_UE_EMPTYFIELDSTEXT','Testo da mostrare per i campi vuoti');
DEFINE ('_UE_EMPTYFIELDSTEXT_DESC','Il testo che viene mostrato per i campi vuoti. Parti di testo e campi per sostituzione funzionano qu&igrave;. Inserendo il testo _UE_NO_ANSWER verr&agrave; mostrata "Nessuna risposta".');
// 1.2 CB RC 2 beta 2:
DEFINE('_UE_USERNAME_OR_EMAIL','Nome utente o email');
// 1.2 CB RC 2 beta 2 backend:
DEFINE('_UE_SAVE','Memorizza');
DEFINE('_UE_LOGIN_TYPE','Campi di identificazione');
DEFINE('_UE_LOGIN_TYPE_DESC','L\'identificazione pu&ograve; avvenire con nome utente + password, nome utente o email + password, oppure email + password. Il modulo CB login si adatter&agrave; a questa impostazione.');
DEFINE('_UE_INCORRECT_EMAIL_OR_PASSWORD','Email o password errate. Cortesemente, riprova.');

// ATTENTION: The closing tag, "?" and ">" has been intentionally omitted - CB works fine without it.
// This was done to avoid errors caused by custom strings being added after the closing tag. ]
// With such tags, always watchout to NOT add any line or space or anything after the "?" and the ">".
