<?php
/**
* @version $Id: kunena.french.php Rev 4.0 2010-06-21 18:21:56 lavsteph  @link http://www.aide-joomla.com $
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
DEFINEd( '_JEXEC' ) or DEFINEd ('_VALID_MOS') or die('Restricted access');

// 1.5.12
define('_COM_A_URLLENGHT','Longueur maximum pour les URL et les liens d\'image');
define('_COM_A_URLLENGHT_DESC','Définissez la longueur maximum pour les URL et les liens d\'image à utiliser dans le champ de saisie de l\'éditeur');
define('COM_KUNENA_BBCODE_CONFIDENTIAL_TEXT','Information confidentielle:');
define('_KUNENA_CATEGORY_ORPHAN','ORPHELIN');
define('_KUNENA_CATEGORY_ORPHAN_DESC','Vous avez des catégories perdues/orphelines! Veuillez les rattacher à des catégories valides.');
define('_KUNENA_SECTION','Section');
define('_KUNENA_NOBODY','Personne');
// Disable userlist
define('_USERLIST_DISABLED','La liste des utilisateurs a été désactivé, vous ne pouvez pas y accéder');
define('_KUNENA_ADMIN_CONFIG_USERLIST_ENABLE','Activer la  liste de utilisateurs');
define('_KUNENA_ADMIN_CONFIG_USERLIST_ENABLE_DESC','Définir si la liste des utilisateurs doit être visible, sinon vous pouvez la désactiver si vous ne souhaitez pas l\'utiliser');
// Anonymous posting
define('_KUNENA_CATEGORY_ANONYMOUS',"Anonymes");
define('_KUNENA_CATEGORY_ANONYMOUS_ALLOW',"Autoriser les messages anonymes");
define('_KUNENA_CATEGORY_ANONYMOUS_ALLOW_DESC',"Les messages anonymes peuvent être utilisés par les utilisateurs enregistrés pour publier des informations sensibles dans cette catégorie: <b>Aucune information concernant l'utilisateur</b> ne sera stockée sur les messages anonymes (y compris l'adresse IP).");
define('_KUNENA_CATEGORY_ANONYMOUS_DEFAULT',"Par défaut les réponses aux messages seront");
define('_KUNENA_CATEGORY_ANONYMOUS_DEFAULT_DESC',"Si les messages anonymes ont été activés, cette option permet de sélectionner le choix par défaut pour l'utilisateur. Les utilisateurs enregistrés peuvent ensuite modifier leurs propres messages postés anonymement, mais seuls les modérateurs ont la possibilité de modifier les messages anonymes des invités");
define('_KUNENA_CATEGORY_ANONYMOUS_X_REG',"Utilisateurs enregistrés");
define('_KUNENA_CATEGORY_ANONYMOUS_X_ANO',"Utilisateurs anonomymes");
define('_KUNENA_POST_AS_ANONYMOUS',"Messages anonyme");
define('_KUNENA_POST_AS_ANONYMOUS_DESC',"Ce message contient des informations sensibles. Supprimer toutes les informations utilisateur à partir de ce message.");
define('_KUNENA_POST_ERROR_NO_CATEGORY',"Aucune catégorie n\'a été choisi pour enregistrer votre message..");
define('_KUNENA_POST_ERROR_IS_SECTION',"Vous n\'êtes pas autorisé à poster des messages dans la section.");
define('_KUNENA_POST_ERROR_ANONYMOUS_FORBITTEN',"Cette catégorie ne vous permet pas d'écrire des messages anonymes. Pour préserver votre vie privée, le message n'a pas été envoyé.");
define('_KUNENA_USERNAME_ANONYMOUS',"Anonymes");
DEFINE('_POST_ABOUT_DELETE', '<strong>NOTES:</strong><br/>
-Si vous supprimez un fil de discussion (le premier message d\'un sujet) tous les messages enfants seront également supprimés!
..Envisager la suppression du message et le nom du posteur, si seulement le contenu doit être retiré..
<br/>
-Tous les messages enfants d\'un message supprimé seront normalement déplacé sur un niveau supérieur dans la hiérarchie des Sujets.');
// Hide image/attachments for unregistred users
DEFINE('_COM_A_SHOWIMGFORGUEST', 'Afficher les images pour les invités');
DEFINE('_COM_A_SHOWIMGFORGUEST_DESC', 'Mettre l\'option sur <font color=#339933><b>Oui</b></font> si vous souhaitez afficher les images pour les invités.');
DEFINE('_KUNENA_BBCODE_HIDEIMG', '<br /><b>Image réservée aux membres</b>.<br /><i>Veuillez vous connecter ou vous enregistrer.</i>');
DEFINE('_COM_A_SHOWFILEFORGUEST', 'Afficher les fichiers attachés pour les invités');
DEFINE('_COM_A_SHOWFILEFORGUEST_DESC', 'Mettre l\'option sur <font color=#339933><b>Oui</b></font> si vous souhaitez afficher les fichiers attachés pour les invités.');
DEFINE('_KUNENA_BBCODE_HIDEFILE', '<br /><b>Fichier réservé aux membres</b>.<br /><i>Veuillez vous connecter ou vous enregistrer.<br /></i>');
DEFINE('_COM_A_HIDE', 'Masquer');
DEFINE('_COM_A_SHOW', 'Afficher');
DEFINE('_KUNENA_LANGUAGE_DIRECTORY_NOT_PRESENT', 'Veuillez vérifiez que vous avez un répertoire de la langue par défaut dans votre système');

// 1.5.10
DEFINE('_KUNENA_PARENTDESC', 'Remarque: Pour créer une catégorie, choisissez une <em> Catégorie parente </ em>. Une catégorie sert de conteneur pour les forums. <br /> Un forum ne peut être créé au sein d\'une catégorie en sélectionnant une catégorie existante en tant que parente. <br /> Les messages peuvent être affichés dans les forums, pas dans les catégories.');
DEFINE('_KUNENA_ADMIN', 'Administration du Forum ');
DEFINE('_KUNENA_NOTEUS', 'Note: Seuls les utilisateurs qui ont le statut de modérateur dans leur profil sont présentés ici. Afin de pouvoir ajouter un modérateur, définissez l\'indicateur de modérateur, puis aller dans <a href="index.php?option=com_kunena&task=profiles"> Administration des utilisateurs </ a>. Recherchez l\'utilisateur à définir comme modérateur et mettre à jour son profil. Le statut de modérateur ne peut être défini que par un administrateur.');
DEFINE('_KUNENA_SHOW_AVATAR_ON_CAT_DESC', 'Sélectionner <font color=#339933><b>Oui</b></font> si vous souhaitez afficher les avatars sur la vue des Catégories, Discussions Récentes, et Mes Discussions.');
DEFINE('_KUNENA_SHOW_AVATAR_ON_CAT', 'Afficher les avatars sur la vue des Catégories?');
DEFINE('_KUNENA_SORTID', 'Trier par UserID');
DEFINE('_KUNENA_SORTMOD', 'Trier par Moderateur');
DEFINE('_KUNENA_SORTNAME', 'Trier par Nom');
DEFINE('_KUNENA_SORTREALNAME', 'Trier par Nom réel');
define('_KUNENA_PDF_NOT_GENERATED_MESSAGE_DELETED', 'Le PDF ne peu être généré car le sujet a été supprimé.');
//Hide IP
define('_KUNENA_COM_A_HIDE_IP', 'Masquer les adresses IP.');
define('_KUNENA_COM_A_HIDE_IP_DESC', 'Masquer les adresses IP dans les messages pour les modérateurs, L\'affichage de Ip reste disponible pour les administrateurs.');
//JomSocial Activity Stream Integration disable/enable
define('_COM_A_JS_ACTIVITYSTREAM_INTEGRATION', 'Activer l\'intégration de JomSocial Activity Stream');
define('_COM_A_JS_ACTIVITYSTREAM_INTEGRATION_DESC', 'Le mur de JomSocial Activity Stream affiche les derniers messages ou sujets posté sur le forum.');
// Email
define('_KUNENA_EMAIL_INVALID', 'Forum a essayé d\'envoyer des courriers depuis une adresse invalide. Merci de contacter l\'administrateur du site!');
define('_KUNENA_MY_EMAIL_INVALID', 'Votre adresse mail est invalide. Une adresse mail valide est requise pour poster dans ce forum!');


// 1.5.8

DEFINE('_KUNENA_USRL_REALNAME', 'Nom réel');
DEFINE('_KUNENA_SEO_SETTINGS', 'Paramètres SEO ');
DEFINE('_KUNENA_SEF', 'Search Engine Friendly URLs');
DEFINE('_KUNENA_SEF_DESC', 'Indiquez si les URLs sont optimisées pour les moteurs de recherche.<br><b>Remarque:</b> Kunena acceptera les urls SEF même si cette fonctionnalité a été désactivée.');
DEFINE('_KUNENA_SEF_CATS', 'Ne pas utilier les ID des catégories');
// Please use words from your own (or nearby) language in the next URL, but only using a-z:
DEFINE('_KUNENA_SEF_CATS_DESC', 'Présentation des URLs: <font color=#0033FF><b><em>http://www.domain.com/forum/categorie/123-message</em></b></font>.<br><br><font color=#FF0000><b>Attention</b></font> Si vous sélectionnez <font color=#FF0000><b>Non</b></font> dès la création du forum, Kunena n\'acceptera plus ces URLs! par la suite');
DEFINE('_KUNENA_SEF_UTF8', 'Activer le support UTF8.');
// Please use words from your own (or nearby) language in the next URL, but make sure that they contain UTF8 letters:
DEFINE('_KUNENA_SEF_UTF8_DESC', 'Utilisez cette option si vos URL SEF ne sont pas lisibles par les moteurs de recherches. Résultat: <font color=#0033FF><b><em>http://www.domain.com/forum/2-Categorie/123-Message</em></b></font>.<br><b>Remarque:</b> Kunena accepte les URLs UTF8, même si cette fonctionnalité a été désactivée..');
DEFINE('_KUNENA_SYNC_USERS_OPTIONS', 'Options');
DEFINE('_KUNENA_SYNC_USERS_CACHE', 'Nettoyer le cache');
DEFINE('_KUNENA_SYNC_USERS_CACHE_DESC', 'Cette fonction permet à un membre de visualiser aussitôt les forums cachés, si vous avez modifié son groupe dans Joomla (Enregistré, Auteur etc).');
DEFINE('_KUNENA_SYNC_USERS_ADD', 'Synchroniser les profils.');
DEFINE('_KUNENA_SYNC_USERS_ADD_DESC', 'Kunena ajoute automatiquement un profil à un utilisateur lors de sa première visite. Cette fonction permet l\'ajout d\'un profil par défaut à tous les utilisateurs enregistrés dans Joomla.');
DEFINE('_KUNENA_SYNC_USERS_DEL', 'Effacer les profils des utilisateurs supprimés');
DEFINE('_KUNENA_SYNC_USERS_DEL_DESC', 'Kunena ne peux pas effacer le profil des utilisateurs supprimés, ils sont seulement masqués. Cette option vous permet de les supprimer définitivement.');
DEFINE('_KUNENA_SYNC_USERS_RENAME', 'Mise à jour des noms d\'utilisateur dans les messages');
DEFINE('_KUNENA_SYNC_USERS_RENAME_DESC', 'Cette option permet de réinitialiser tous les noms des auteurs dans les messages (Pseudo ou nom réel selon la configuration de Kunena.)');
DEFINE('_KUNENA_SYNC_USERS_DO_CACHE', 'Cache utilisateur nettoyé');
DEFINE('_KUNENA_SYNC_USERS_DO_ADD', 'Profil utilisateur ajouté:');
DEFINE('_KUNENA_SYNC_USERS_DO_DEL', 'Profil utilisateur supprimé:');
DEFINE('_KUNENA_SYNC_USERS_DO_RENAME', 'Messages mis à jour:');

// 1.5.7

DEFINE('_KUNENA_JS_ACTIVITYSTREAM_CREATE_MSG1', 'créer un nouveau sujet');
DEFINE('_KUNENA_JS_ACTIVITYSTREAM_CREATE_MSG2', 'dans le forum.');
DEFINE('_KUNENA_JS_ACTIVITYSTREAM_REPLY_MSG1', 'répondre à ce sujet');
DEFINE('_KUNENA_JS_ACTIVITYSTREAM_REPLY_MSG2', 'dans le forum.');

DEFINE('_KUNENA_AUP_ALPHAUSERPOINTS', '<b>AlphaUserPoints</b>');
DEFINE('_KUNENA_AUP_ENABLED_POINTS_IN_PROFILE', 'Activer l\'affichage dans les profils');
DEFINE('_KUNENA_AUP_ENABLED_POINTS_IN_PROFILE_DESC', 'Si vous avez installé <b>AlphaUserPoints</b>, vous pouvez configuré Kunena pour que les points soient visibles dans le profil des membres.');
DEFINE('_KUNENA_AUP_ENABLED_RULES', 'Afficher les régles ');
DEFINE('_KUNENA_AUP_ENABLED_RULES_DESC', 'Vous pouvez utiliser par défaut les régles installées dans <b>AlphaUserPoints</b>. Vous devez utiliser la version 1.5.3 ou supérieure de <b>AlphaUserPoints</b>. Si vous utilisez une version plus ancienne, vous devrez installer manuellement les règles (voir la documentation de <b>AlphaUserPoints</b>');
DEFINE('_KUNENA_AUP_MINIMUM_POINTS_ON_REPLY', 'Nombre minimum de caractères.');
DEFINE('_KUNENA_AUP_MINIMUM_POINTS_ON_REPLY_DESC', 'Nombre de caractères minimum requit lors d\'une réponse à un sujet pour recevoir des points.');
DEFINE('_KUNENA_AUP_MESSAGE_TOO_SHORT', 'Votre réponse est trop courte pour prétendre recevoir de nouveaux points.');
DEFINE('_KUNENA_AUP_POINTS', 'Points:');

// 1.0.11 and 1.5.4
DEFINE('_KUNENA_MOVED', 'Déplacé');

// 1.0.11 and 1.5.3
DEFINE('_KUNENA_VERSION_SVN', 'SVN Revision');
DEFINE('_KUNENA_VERSION_DEV', 'Development Snapshot');
DEFINE('_KUNENA_VERSION_ALPHA', 'Alpha Release');
DEFINE('_KUNENA_VERSION_BETA', 'Beta Release');
DEFINE('_KUNENA_VERSION_RC', 'Release Candidate');
DEFINE('_KUNENA_VERSION_INSTALLED', 'Vous avez installé Kunena %s (%s).');
DEFINE('_KUNENA_VERSION_SVN_WARNING', 'Ne jamais utiliser une révision SVN qu\à d\'autres fins de développement!');
DEFINE('_KUNENA_VERSION_DEV_WARNING', '	Cette version ne doit être utilisé que par les développeurs et les testeurs!');
DEFINE('_KUNENA_VERSION_ALPHA_WARNING', 'Cette version Alpha ne doit pas être utilisée sur des sites en production.');
DEFINE('_KUNENA_VERSION_BETA_WARNING', 'Cette version Béta ne doit pas être utilisée sur des sites en production.');
DEFINE('_KUNENA_VERSION_RC_WARNING', 'Cette version contient surement des bugs, qui seront fixés dans la version finale.');	
DEFINE('_KUNENA_ERROR_UPGRADE', 'La mise à jour de Kunena %s a échoué!');
DEFINE('_KUNENA_ERROR_UPGRADE_WARN', 'Il manque l\'ajout de quelques correctifs pour votre forum, et quelques fonctionnalités ne fonctionneront pas bien.');
DEFINE('_KUNENA_ERROR_UPGRADE_AGAIN', 'Essayez de faire  de nouveau de mise à niveau. Si vous ne pouvez pas mettre à jour Kunena %s, vous pouvez facilement revenir à la dernière version.');
DEFINE('_KUNENA_PAGE', 'Page');
DEFINE('_KUNENA_RANK_NO_ASSIGNED', 'Pas de rang d\'attribué');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_GENERAL', 'Problème détecté avec l\intégration de <b><b>Community Builder</b></b>:');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_INSTALL', 'L\'intégration avec <b>Community Builder</b> ne fonctionne que si vous avez la version <b>Community Builder</b> %s ou supérieur installé.');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_PUBLISH', 'L\'intégration du profil <b>Community Builder</b> ne fonctionne que si le prfil utilisateur <b>Community Builder</b> User a été publié.');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_UPDATE', 'L\'intégration du profil <b>Community Builder</b> ne fonctionne que si vous avez la version <b>Community Builder</b> %s ou supérieur installé.');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_XHTML', 'L\'intégration du profil <b>Community Builder</b> ne fonctionnera que si le mode <b>W3C XHTML 1.0 Trans</b> est sélectionné dans la configuration de ce dernier.');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_INTEGRATION', 'L\'affichage du profil de <b>Community Builder</b> dans le forum ne fonctionnera que si le plugin est activé dans la gestion des plugins de <b>Community Builder</b>.');
DEFINE('_KUNENA_INTEGRATION_CB_WARN_HIDE', 'Sauvegarder la configuration de Kunena permet de désactiver l\'intégration et de masquer cet avertissement.');
			
// 1.0.10
DEFINE('_KUNENA_BACK', 'Retour');
DEFINE('_KUNENA_SYNC', 'Synchroniser');
DEFINE('_KUNENA_NEW_SMILIE', 'Nouveau');
DEFINE('_KUNENA_PRUNE', 'Nettoyer');
//Ediitor
DEFINE('_KUNENA_EDITOR_HELPLINE_BOLD', 'Texte gras: [b]texte[/b]');
DEFINE('_KUNENA_EDITOR_HELPLINE_ITALIC', 'Texte italique: [i]texte[/i]');
DEFINE('_KUNENA_EDITOR_HELPLINE_UNDERL', 'Texte souligné: [u]texte[/u]');
DEFINE('_KUNENA_EDITOR_HELPLINE_STRIKE', 'Texte barré : [strike]texte[/strike]');
DEFINE('_KUNENA_EDITOR_HELPLINE_SUB', 'Indice: [sub]texte[/sub]');
DEFINE('_KUNENA_EDITOR_HELPLINE_SUP', 'Exposant: [sup]texte[/sup]');
DEFINE('_KUNENA_EDITOR_HELPLINE_QUOTE', 'Citation: [quote]texte[/quote]');
DEFINE('_KUNENA_EDITOR_HELPLINE_CODE', 'Affichage de code: [code]code[/code]');
DEFINE('_KUNENA_EDITOR_HELPLINE_UL', 'Liste non ordonnée: [ul] [li]texte[/li] [/ul] - Remarque: la liste doit contenir au moins un élément');
DEFINE('_KUNENA_EDITOR_HELPLINE_OL', 'Liste ordonnée: [ol] [li]texte[/li] [/ol] - Remarque: la liste doit contenir au moins un élément');
DEFINE('_KUNENA_EDITOR_HELPLINE_LI', 'Elément de liste: [li] texte [/li]');
DEFINE('_KUNENA_EDITOR_HELPLINE_ALIGN_LEFT', ' Aligner un texte ou une image sur la gauche [left]texte/image[/left]');
DEFINE('_KUNENA_EDITOR_HELPLINE_ALIGN_CENTER', ' Centrer un texte ou une image [center]texte/image[/center]');
DEFINE('_KUNENA_EDITOR_HELPLINE_ALIGN_RIGHT', ' Aligner un texte ou une image sur la droite [right]texte/image[/right]');
DEFINE('_KUNENA_EDITOR_HELPLINE_IMAGELINK', 'Lien image: [img size=(01-499)]http://www.google.com/images/web_logo_left.gif[/img]');
DEFINE('_KUNENA_EDITOR_HELPLINE_IMAGELINKSIZE', 'Lien image: Taille de l\'image de 01 à 499');
DEFINE('_KUNENA_EDITOR_HELPLINE_IMAGELINKURL', 'Lien image: URL du lien de l\'image');
DEFINE('_KUNENA_EDITOR_HELPLINE_IMAGELINKAPPLY', 'Lien image: valider le lien de l\'image');
DEFINE('_KUNENA_EDITOR_HELPLINE_LINK', 'Lien: [url=http://www.zzz.com/]description du lien[/url]');
DEFINE('_KUNENA_EDITOR_HELPLINE_LINKURL', 'Lien: URL du lien');
DEFINE('_KUNENA_EDITOR_HELPLINE_LINKTEXT', 'Lien: Texte/ Description du lien');
DEFINE('_KUNENA_EDITOR_HELPLINE_LINKAPPLY', 'Lien: Valider');
DEFINE('_KUNENA_EDITOR_HELPLINE_HIDE','Texte caché: [hide]le texte a masqué[/hide] - Masquer une partie d\'un texte aux invités');
DEFINE('_KUNENA_EDITOR_HELPLINE_SPOILER', 'Spoiler: Le texte est affiché après que vous ayez cliqué sur le spoiler');
DEFINE('_KUNENA_EDITOR_HELPLINE_COLOR', 'Couleur: [color=#FF6600]texte[/color]');
DEFINE('_KUNENA_EDITOR_HELPLINE_FONTSIZE', 'Taille de la police: [size=1]texte[/size] - Remarque: les tailles disponibles vont de 1 à 5');
DEFINE('_KUNENA_EDITOR_HELPLINE_FONTSIZESELECTION', 'Taille de la police: Définir la taille de la police, sélectionner le texte et appuyez sur le bouton de gauche ');
DEFINE('_KUNENA_EDITOR_HELPLINE_EBAY', 'eBay: [ebay]ItemId[/ebay]');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEO', 'Video: Sélectionnez le fournisseur ou une URL - modus');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOSIZE', 'Video: Taille de la vidéo');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOWIDTH', 'Video: Largeur de la vidéo');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOHEIGHT', 'Video: Hauteur de la vidéo');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOPROVIDER', 'Video: Sélectionnez le fournisseur de la vidéo');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOID', 'Video: ID de la vidéo - Vous pouvez trouver l\'ID dans l\'url de la vidéo');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOAPPLY1', 'Video: [video size=100 width=480 height=360 provider=clipfish]3423432[/video]');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOURL', 'Video: URL de la vidéo');
DEFINE('_KUNENA_EDITOR_HELPLINE_VIDEOAPPLY2', 'Video: [video size=100 width=480 height=360]http://myvideodomain.com/myvideo[/video]');
DEFINE('_KUNENA_EDITOR_HELPLINE_IMGPH', 'Ajoutez une balise [img] Choisir l\'emplacement de l\'image dans le corps du message');
DEFINE('_KUNENA_EDITOR_HELPLINE_FILEPH', 'Ajoutez une balise [file] Choisir l\'emplacement du fichier joint dans le corps du message');
DEFINE('_KUNENA_EDITOR_HELPLINE_SUBMIT', 'Cliquez ici pour publier votre message');
DEFINE('_KUNENA_EDITOR_HELPLINE_PREVIEW', 'Cliquez ici pour prévisualiser votre message avant publication');
DEFINE('_KUNENA_EDITOR_HELPLINE_CANCEL', 'Cliquez ici pour annuler votre message');
DEFINE('_KUNENA_EDITOR_HELPLINE_HINT', 'Aide  bbCode- Remarque: Les bbCode peuvent être utilisé sur un texte sélectionné!');
DEFINE('_KUNENA_EDITOR_LINK_URL', ' URL: ');
DEFINE('_KUNENA_EDITOR_LINK_TEXT', ' Texte: ');
DEFINE('_KUNENA_EDITOR_LINK_INSERT', 'Ajouter');
DEFINE('_KUNENA_EDITOR_IMAGE_SIZE', 'Taille:');
DEFINE('_KUNENA_EDITOR_IMAGE_URL', ' URL: ');
DEFINE('_KUNENA_EDITOR_IMAGE_INSERT', 'Ajouter');
DEFINE('_KUNENA_EDITOR_VIDEO_SIZE', 'Taille: ');
DEFINE('_KUNENA_EDITOR_VIDEO_WIDTH', 'Largeur: ');
DEFINE('_KUNENA_EDITOR_VIDEO_HEIGHT', 'Hauteur:');
DEFINE('_KUNENA_EDITOR_VIDEO_URL', 'URL: ');
DEFINE('_KUNENA_EDITOR_VIDEO_ID', 'ID: ');
DEFINE('_KUNENA_EDITOR_VIDEO_PROVIDER', 'Fournisseur: ');
DEFINE('_KUNENA_BBCODE_HIDDENTEXT', '<span class="fb_quote">Une partie du message est caché pour les invités. Merci de vous connecter ou vous incrire pour le visualiser.</span>');

DEFINE('_KUNENA_PROFILE_BIRTHDAY', 'Date anniversaire');
DEFINE('_KUNENA_DT_MONTHDAY_FMT','%d/%m');
DEFINE('_KUNENA_CFC_FILENAME','le fichier CSS a été modifié');
DEFINE('_KUNENA_CFC_SAVED','Fichier CSS sauvegardé.');
DEFINE('_KUNENA_CFC_NOTSAVED','Le fichier CSS n\'a pu être sauvegardé.');
DEFINE('_KUNENA_JS_WARN_NAME_MISSING','Votre nom est manquant');
DEFINE('_KUNENA_JS_WARN_UNAME_MISSING','Votre nom d\'utilisateur est manquant');
DEFINE('_KUNENA_JS_WARN_VALID_AZ09','Le champ contient des caractères interdit');
DEFINE('_KUNENA_JS_WARN_MAIL_MISSING','Adresse mail manquante');
DEFINE('_KUNENA_JS_WARN_PASSWORD2','Veuillez saisir un mot de passe valide');
DEFINE('_KUNENA_JS_PROMPT_UNAME','Veuillez saisir un nouveau nom d\'utilisateur');
DEFINE('_KUNENA_JS_PROMPT_PASS','Veuillez saisir un nouveau mot de passe');
DEFINE('_KUNENA_DT_LMON_DEC', 'Décembre'); // mal placé
DEFINE('_KUNENA_DT_MON_DEC', 'Déc'); // mal placé
DEFINE('_KUNENA_NOGENDER', 'Inconnu');
DEFINE('_KUNENA_ERROR_INCOMPLETE_ERROR', 'Votre installation de Kunena est incomplète!');
DEFINE('_KUNENA_ERROR_INCOMPLETE_OFFLINE', 'En raison des erreurs ci-dessus votre forum est en mode maintenance et il est désactivé dans le panneau de configuration');
DEFINE('_KUNENA_ERROR_INCOMPLETE_REASONS', 'Les raisons possibles qui génèrent ce type d\'erreur:');
DEFINE('_KUNENA_ERROR_INCOMPLETE_1', '1) L\'installation à échouée suite à un dépassement du temps d\'exécution - Time out (essayez de relancer l\'installation)');
DEFINE('_KUNENA_ERROR_INCOMPLETE_2', '2) Vous avez supprimé certaines des tables de Kunena dans votre base de données');
DEFINE('_KUNENA_ERROR_INCOMPLETE_3', '3) Votre base de données a été corrompue');
DEFINE('_KUNENA_ERROR_INCOMPLETE_SUPPORT', 'Notre forum de support est accessible via cette adresse:');

// 1.0.9
DEFINE('_KUNENA_INSTALLED_VERSION', 'Version installée');
DEFINE('_KUNENA_COPYRIGHT', 'Copyright');
DEFINE('_KUNENA_LICENSE', 'Licence');
DEFINE('_KUNENA_PROFILE_NO_USER', 'L\'utilisateur n\'existe pas.');
DEFINE('_KUNENA_PROFILE_NOT_FOUND', 'L\'utilisateur n\'a pas encore visité forum et n\'a pas de profil.');

// Search
DEFINE('_KUNENA_SEARCH_RESULTS', 'Résultats de la recherche');
DEFINE('_KUNENA_SEARCH_ADVSEARCH', 'Recherche avancée');
DEFINE('_KUNENA_SEARCH_SEARCHBY_KEYWORD', 'Recherche par mot clé');
DEFINE('_KUNENA_SEARCH_KEYWORDS', 'Mots clés');
DEFINE('_KUNENA_SEARCH_SEARCH_POSTS', 'Rechercher toutes les réponses');
DEFINE('_KUNENA_SEARCH_SEARCH_TITLES', 'Recherche seulement par titre');
DEFINE('_KUNENA_SEARCH_SEARCHBY_USER', 'Recherche par nom d\'utilisateur');
DEFINE('_KUNENA_SEARCH_UNAME', 'Nom d\'utilisateur'); 
DEFINE('_KUNENA_SEARCH_EXACT', 'Nom d\'enregistrement'); 
DEFINE('_KUNENA_SEARCH_USER_POSTED', 'Sujet démarré par');
DEFINE('_KUNENA_SEARCH_USER_ACTIVE', 'L\'activité dans les fils');
DEFINE('_KUNENA_SEARCH_OPTIONS', 'Options de recherche');
DEFINE('_KUNENA_SEARCH_FIND_WITH', 'Trouver les sujets avec');
DEFINE('_KUNENA_SEARCH_LEAST', 'Au moins');
DEFINE('_KUNENA_SEARCH_MOST', 'Au plus');
DEFINE('_KUNENA_SEARCH_ANSWERS', 'Réponses');
DEFINE('_KUNENA_SEARCH_FIND_POSTS', 'Trouver des sujets depuis');
DEFINE('_KUNENA_SEARCH_DATE_ANY', 'Toutes les dates');
DEFINE('_KUNENA_SEARCH_DATE_LASTVISIT', 'Dernière visite');
DEFINE('_KUNENA_SEARCH_DATE_YESTERDAY', 'Hier');
DEFINE('_KUNENA_SEARCH_DATE_WEEK', '1 semaine');
DEFINE('_KUNENA_SEARCH_DATE_2WEEKS', '2 semaines');
DEFINE('_KUNENA_SEARCH_DATE_MONTH', '1 mois');
DEFINE('_KUNENA_SEARCH_DATE_3MONTHS', '3 mois');
DEFINE('_KUNENA_SEARCH_DATE_6MONTHS', '6 mois');
DEFINE('_KUNENA_SEARCH_DATE_YEAR', '1 an');
DEFINE('_KUNENA_SEARCH_DATE_NEWER', 'Et plus récentes');
DEFINE('_KUNENA_SEARCH_DATE_OLDER', 'Et plus anciennes');
DEFINE('_KUNENA_SEARCH_SORTBY', 'Trier les résultats par');
DEFINE('_KUNENA_SEARCH_SORTBY_TITLE', 'Titre');
DEFINE('_KUNENA_SEARCH_SORTBY_POSTS', 'Nombre de réponses');
DEFINE('_KUNENA_SEARCH_SORTBY_VIEWS', 'Nombre de vues');
DEFINE('_KUNENA_SEARCH_SORTBY_START', 'Date de création du sujet');
DEFINE('_KUNENA_SEARCH_SORTBY_POST', 'Date de publication');
DEFINE('_KUNENA_SEARCH_SORTBY_USER', 'Nom d\'utilisateur');
DEFINE('_KUNENA_SEARCH_SORTBY_FORUM', 'Forum');
DEFINE('_KUNENA_SEARCH_SORTBY_INC', 'Ordre croissant');
DEFINE('_KUNENA_SEARCH_SORTBY_DEC', 'Ordre décroissant');
DEFINE('_KUNENA_SEARCH_START', 'Affichage des résultats');
DEFINE('_KUNENA_SEARCH_LIMIT5', 'les 5 premiers ');
DEFINE('_KUNENA_SEARCH_LIMIT10', 'les 10 premiers');
DEFINE('_KUNENA_SEARCH_LIMIT15', 'Les 15 premiers ');
DEFINE('_KUNENA_SEARCH_LIMIT20', 'Les 20 premiers ');
DEFINE('_KUNENA_SEARCH_SEARCHIN', 'Chercher dans les catégories');
DEFINE('_KUNENA_SEARCH_SEARCHIN_ALLCATS', 'Toutes les catégories');
DEFINE('_KUNENA_SEARCH_SEARCHIN_CHILDREN', 'Chercher aussi dans les sous-forums ');
DEFINE('_KUNENA_SEARCH_SEND', 'Envoyer');
DEFINE('_KUNENA_SEARCH_CANCEL', 'Annuler');
DEFINE('_KUNENA_SEARCH_ERR_NOPOSTS', 'Aucun message contenant les termes de recherche n\'a été trouvé.');
DEFINE('_KUNENA_SEARCH_ERR_SHORTKEYWORD', 'Au moins un mot-clé doit être saisie (contenant 3 caractères au minimum)!');

// 1.0.8
DEFINE('_KUNENA_CATID', 'ID');
DEFINE('_POST_NOT_MODERATOR', 'Vous n\'avez pas les permissions  de modérateur!');
DEFINE('_POST_NO_FAVORITED_TOPIC', 'Ce sujet n\'a pas été ajoutée à vos favoris');
DEFINE('_COM_C_SYNCEUSERSDESC', 'Synchronisation des utilisateurs de Kunena avec les utilisateurs Joomla');
DEFINE('_POST_FORGOT_EMAIL', 'Vous avez oublié d\'indiquer votre adresse e-mail. Cliquez sur le bouton retour de votre navigateur pour revenir en arrière et essayez à nouveau.');
DEFINE('_KUNENA_POST_DEL_ERR_FILE', 'Tous les fichiers attachés ont été supprimés ou sont manquants!');
// New strings for initial forum setup. Replacement for legacy sample data
DEFINE('_KUNENA_SAMPLE_FORUM_MENU_TITLE', 'Forum');
DEFINE('_KUNENA_SAMPLE_MAIN_CATEGORY_TITLE', 'Forum principal');
DEFINE('_KUNENA_SAMPLE_MAIN_CATEGORY_DESC', 'Il s\'agit d\'une catégorie principale (niveau 1). Ce premier niveau permet de créer une catégorie de forum (niveau 2 - [b]Bienvenue Jean[/b] ou [b]Vos suggestions[/b]) et pourra contenir des sous-forums voir des sous-catégories. Les niveaux 1 et 2 sont indispensables pour commencer une structure de forum');
DEFINE('_KUNENA_SAMPLE_MAIN_CATEGORY_HEADER', 'Un texte peut-être ajouté en en-tête d\'une catégorie particulière, afin de fournir des informations supplémentaires à vos invités et membres,');
DEFINE('_KUNENA_SAMPLE_FORUM1_TITLE', 'Bienvenue Jean');
DEFINE('_KUNENA_SAMPLE_FORUM1_DESC', 'Nous invitons tous les nouveaux membres à se présenter en quelques lignes. Vous pourrez ainsi apprendre à mieux vous connaître et peut-être partager des centres d\'intérêts communs.
');
DEFINE('_KUNENA_SAMPLE_FORUM1_HEADER', '[b]Bienvenue sur le forum Kunena![/b]

Présentrez-vous aux membres du forum, ce que vous aimez et pourquoi êtes-vous devenu membre de ce site.
Nous vous souhaitons la bienvenue et espérons vous revoir souvent!
');
DEFINE('_KUNENA_SAMPLE_FORUM2_TITLE', 'Vos suggestions');
DEFINE('_KUNENA_SAMPLE_FORUM2_DESC', 'Vous avez des commentaires ou des propositions à nous faire ?
 N\'hésitez pas à participer, nous souhaitons avoir votre avis pour améliorer notre site et le rendre plus efficace et convivial.');
DEFINE('_KUNENA_SAMPLE_FORUM2_HEADER', 'Il s\'agit d\'un en-tête optionnel du Forum : Vos suggestions.
');
DEFINE('_KUNENA_SAMPLE_POST1_SUBJECT', 'Bienvenue sur Kunena!');
DEFINE('_KUNENA_SAMPLE_POST1_TEXT', '[size=4][b]Bienvenue sur Kunena![/b][/size]

Merci d\'avoir choisi Kunena comme solution de forum pour votre site Joomla!.

Kunena, traduit du swahili signifie "Parler", cette extension est développée par une équipe de professionnels de l\'open source dans le but d\'offrir un composant de forum fiable et avancé pour Joomla. Kunena s\'intègre sans problème dans plusieurs composants de réseaux sociaux dont [b]Community Builder[/b] ou [b]Jomsocial[/b].


[size=4][b]Autres resources disponibles [/b][/size]

[b]Documentation:[/b] [url]http://www.kunena.com/docs[/url]

[b]Forum Officiel[/b]: [url]http://www.kunena.com/forum[/url]

[b]Téléchargement:[/b] [url]http://www.kunena.com/downloads[/url]

[b]Kunena Blog:[/b] [url]http://www.kunena.com/blog[/url]

[b]Proposer de nouvelles idées:[/b] [url]http://www.kunena.com/uservoice[/url]

[b]Suivre Kunena sur Twitter:[/b] [url]http://www.kunena.com/twitter[/url]
');

// 1.0.6
DEFINE('_KUNENA_JOMSOCIAL', '<b>Jomsocial</b>');

// 1.0.5
DEFINE('_COM_A_HIGHLIGHTCODE', 'Activer le Code Highlighting');
DEFINE('_COM_A_HIGHLIGHTCODE_DESC', 'L\'activation de l\'affichage du code java script highlighting, permet à vos membres de poster des lignes de code php, css, xml . Cette option génère la mise en valeur par colorisation de certaines parties du code.<br><br><font color=#FF0000><b>Note importante</b></b></font>: Si votre forum ne fait pas usage de ce langage de programmation, vous pouvez le désactiver pour éviter les erreurs d\'affichage des balises <font color=#0000FF><em><b>[code][/code]</b></em></font>.');
DEFINE('_COM_A_RSS_TYPE', '<b>RSS</b> : Type d\'affichage par défaut');
DEFINE('_COM_A_RSS_TYPE_DESC', '<u>Choisissez  le mode d’affichage des flux RSS:</u><br><br><b>Sujet</b>: il ne sera affiché que le contenu du premier post, ce qui permet une présentation plus compacte des flux RSS. <br><b>Réponse</b> : le sujet et l\'ensemble des posts s’y référant seront affichés ( avec l’option <b><em>Re:</em></b> ).<br><br><b><font color=#FF0000>Note importante</b>:</font> cette option n’est pas conseillé sur les sites à fort trafic.');
DEFINE('_COM_A_RSS_BY_THREAD', 'Sujet');
DEFINE('_COM_A_RSS_BY_POST', 'Réponse');
DEFINE('_COM_A_RSS_HISTORY', '<b>RSS</b> : Type d\'affichage de l\'historique');
DEFINE('_COM_A_RSS_HISTORY_DESC', 'Ajuster les paramètres d\'affichage de l\'historique dans le flux RSS. Le réglage par défaut est par <b>mois</b>, mais vous pouvez le limiter à la <b>semaine</b> sur les sites à fort trafic.');
DEFINE('_COM_A_RSS_HISTORY_WEEK', 'Semaine');
DEFINE('_COM_A_RSS_HISTORY_MONTH', 'Mois');
DEFINE('_COM_A_RSS_HISTORY_YEAR', 'Année');
DEFINE('_COM_A_FBDEFAULT_PAGE', 'Page  d\'accueil par défaut pour le Forum');
DEFINE('_COM_A_FBDEFAULT_PAGE_DESC', 'Permet de définir la page d\'accueil du Forum via un lien composant <b>Kunena</b> utilisé sur les autres pages d\'un site.<br>Par défaut pour le template <b>Default EX</b> cette option est configurée sur <b>Discussions récentes</b>.<br><br><font color=#FF0000><b>Note importante :</b></font> Pour les autres templates, cette option doit être mise sur <b>Catégories</b>.');
DEFINE('_COM_A_FBDEFAULT_PAGE_RECENT', 'Discussions Récentes');
DEFINE('_COM_A_FBDEFAULT_PAGE_MY', 'Mes Discussions');
DEFINE('_COM_A_FBDEFAULT_PAGE_CATEGORIES', 'Catégories');
DEFINE('_KUNENA_BBCODE_HIDE', 'Ce qui suit est caché pour les utilisateurs non enregistrés:');
DEFINE('_KUNENA_BBCODE_SPOILER', 'Attention Spoiler!');
DEFINE('_KUNENA_FORUM_SAME_ERR', 'Le Forum Parent ne doit pas être le même.');
DEFINE('_KUNENA_FORUM_OWNCHILD_ERR', 'Le Forum Parent est une de ses propres catégories.');
DEFINE('_KUNENA_FORUM_UNKNOWN_ERR', 'L\'ID du Forum n\'existe pas.');
DEFINE('_KUNENA_RECURSION', 'Récursivité détectée.');
DEFINE('_POST_FORGOT_NAME_ALERT', 'Veuillez saisir votre nom.');
DEFINE('_POST_FORGOT_EMAIL_ALERT', 'Veuillez saisir votre email.');
DEFINE('_POST_FORGOT_SUBJECT_ALERT', 'Veuillez saisir un sujet.');
DEFINE('_KUNENA_EDIT_TITLE', 'Editer vos détails');
DEFINE('_KUNENA_YOUR_NAME', 'Votre nom:');
DEFINE('_KUNENA_EMAIL', 'e-mail:');
DEFINE('_KUNENA_UNAME', 'Login:');
DEFINE('_KUNENA_PASS', 'Mot de passe:');
DEFINE('_KUNENA_VPASS', 'Vérification du mot de passe:');
DEFINE('_KUNENA_USER_DETAILS_SAVE', 'Configuration sauvegardé.');
DEFINE('_KUNENA_TEAM_CREDITS', 'Crédits');
DEFINE('_COM_A_BBCODE', 'BBCode');
DEFINE('_COM_A_BBCODE_SETTINGS', 'Configuration');
DEFINE('_COM_A_SHOWSPOILERTAG', 'Afficher la balise Spoiler dans la barre d\'éditeur');
DEFINE('_COM_A_SHOWSPOILERTAG_DESC', 'Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez afficher la balise <font color=#0000FF><em><b>[spoiler]</b></em></font> dans la barre d\'option de l\'éditeur.');
DEFINE('_COM_A_SHOWVIDEOTAG', 'Afficher la balise Vidéo dans la barre d\'éditeur');
DEFINE('_COM_A_SHOWVIDEOTAG_DESC', 'Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez afficher la balise <font color=#0000FF><em><b>[video]</b></em></font> dans la barre d\'option de l\'éditeur.');
DEFINE('_COM_A_SHOWEBAYTAG', 'Afficher la balise Ebay dans la barre d\'éditeur');
DEFINE('_COM_A_SHOWEBAYTAG_DESC', 'Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez afficher la balise <font color=#0000FF><em><b>[ebay]</b></em></font> dans la barre d\'option de l\'éditeur.');
DEFINE('_COM_A_TRIMLONGURLS', 'Réduction de la longueur des URLs');
DEFINE('_COM_A_TRIMLONGURLS_DESC', 'Sélectionner <font color=#339933><b>Oui</b></font> si vous souhaitez utiliser le reduction automatique de URLs longues. Vérifier le résultat sut le front pour ajuster les paramètres');
DEFINE('_COM_A_TRIMLONGURLSFRONT', 'Nombre de caractères au début');
DEFINE('_COM_A_TRIMLONGURLSFRONT_DESC', 'Nombre de caractères pour la première partie du tronquage des URLs. L\'option de réduction des URLs doit être réglé sur <font color=#339933><b>Oui</b></font>.');
DEFINE('_COM_A_TRIMLONGURLSBACK', 'Nombre de caractères à la fin');
DEFINE('_COM_A_TRIMLONGURLSBACK_DESC', 'Nombre de caractères pour la seconde partie du tronquage des URLs. L\'option de réduction des URLs doit être réglé sur <font color=#339933><b>Oui</b></font>.');
DEFINE('_COM_A_AUTOEMBEDYOUTUBE', 'Insertion des vidéos YouTube');
DEFINE('_COM_A_AUTOEMBEDYOUTUBE_DESC', 'Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez l\'insertion automatique des vidéos Youtube par la saisie de l\'url directe fournie par ce service.');
DEFINE('_COM_A_AUTOEMBEDEBAY', 'Insertion des articles eBay');
DEFINE('_COM_A_AUTOEMBEDEBAY_DESC', 'Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez une mise en page automatique des articles et recherches du service ebay');
DEFINE('_COM_A_EBAYLANGUAGECODE', 'Code langue Ebay');
DEFINE('_COM_A_EBAYLANGUAGECODE_DESC', 'Il est important de renseigner ce champ avec votre code langue pour le bon fonctionnement des services widget eBay. Par défaut en-us pour ebay.com. <u>Exemples:</u> ebay.de: de-de, ebay.at: de-at, ebay.co.uk: en-gb');
DEFINE('_COM_A_KUNENA_SESSION_TIMEOUT', 'Durée de vie de la session');
DEFINE('_COM_A_KUNENA_SESSION_TIMEOUT_DESC', 'Par Défaut est de 1800 [secondes]. La durée de vie de la session en secondes est similaire à celle de Joomla. La durée de vie de la session est importante pour le calcul des droits d\'accès, affichage des personnes en ligne et de l\'indicateur <font color=#0000FF><b>Nouveau</b></font>. Une fois que la session expire, les droits d\'accès et l\'indicateur <font color=#0000FF><b>Nouveau</b></font> disparaissent.<br><br><font color=#FF0000><b>Note importante :</b></font> une valeur élevée des durées de session peut engendrer des risques sur la sécurité générale d\'un site.');

// Advanced administrator merge-split functions
DEFINE('_GEN_MERGE', 'Fusionner');
DEFINE('_VIEW_MERGE', '');
DEFINE('_POST_MERGE_TOPIC', 'Fusionner ce fil avec');
DEFINE('_POST_MERGE_GHOST', 'Laissez une copie fantôme de ce fil');
DEFINE('_POST_SUCCESS_MERGE', 'Message fusionné avec succès.');
DEFINE('_POST_TOPIC_NOT_MERGED', 'Fusion abandonnée.');
DEFINE('_GEN_SPLIT', 'Couper');
DEFINE('_GEN_DOSPLIT', 'Valider');
DEFINE('_VIEW_SPLIT', '');
DEFINE('_POST_SUCCESS_SPLIT', 'Le sujet a été séparé avec succès.');
DEFINE('_POST_SUCCESS_SPLIT_TOPIC_CHANGED', 'Le sujet a été changé avec succès.');
DEFINE('_POST_SPLIT_TOPIC_NOT_CHANGED', 'Le changement du sujet a échoué.');
DEFINE('_POST_TOPIC_NOT_SPLIT', 'Echec de la séparation.');
DEFINE('_POST_DUPLICATE_IGNORED', 'Message identique ou dupliqué a été ignoré.');
DEFINE('_POST_SPLIT_HINT', '<br>Astuce: Vous pouvez mettre en avant un post en le positionnant dans le sujet si vous le sélectionnez dans la seconde colonne et vérifiez que rien n\'est séparé.<br>');
DEFINE('_POST_LINK_ORPHANS_TOPIC', 'liens orphelins d\'un sujet');
DEFINE('_POST_LINK_ORPHANS_TOPIC_TITLE', 'Liens orphelins d\'un post d\'un nouveau sujet.');
DEFINE('_POST_LINK_ORPHANS_PREVPOST', 'liens orphelins d\'un post précédent');
DEFINE('_POST_LINK_ORPHANS_PREVPOST_TITLE', 'Liens orphelins d\'un post précédent.');
DEFINE('_POST_MERGE', 'fusion');
DEFINE('_POST_MERGE_TITLE', 'Attacher ce sujet pour cibler le premier post.');
DEFINE('_POST_INVERSE_MERGE', 'fusion inversée');
DEFINE('_POST_INVERSE_MERGE_TITLE', 'Attacher la cible au premier post de ce sujet.');

// Additional
DEFINE('_POST_UNFAVORITED_TOPIC', 'Ce sujet a été supprimé de vos favoris.');
DEFINE('_POST_NO_UNFAVORITED_TOPIC', 'Ce sujet <b>n\'</b> a pas été supprimé de vos favoris');
DEFINE('_POST_SUCCESS_UNFAVORITE', 'Votre requête pour supprimer vos favoris a été exécutée.');
DEFINE('_POST_UNSUBSCRIBED_TOPIC', 'Ce sujet est supprimé de vos souscriptions.');
DEFINE('_POST_NO_UNSUBSCRIBED_TOPIC', 'Ce sujet <b>n\'</b> a pas été supprimé de vos souscriptions');
DEFINE('_POST_SUCCESS_UNSUBSCRIBE', 'Votre requête pour supprimer des souscriptions a été exécutée.');
DEFINE('_POST_NO_DEST_CATEGORY', 'Aucune catégorie de destination n\'a été sélectionnée. Rien n\'a été déplacé.');
// Default_EX template
DEFINE('_KUNENA_ALL_DISCUSSIONS', 'Discussions récentes');
DEFINE('_KUNENA_MY_DISCUSSIONS', 'Mes Discussions');
DEFINE('_KUNENA_MY_DISCUSSIONS_DETAIL', 'Discussions que j\'ai démarré ou auxquelles j\'ai répondu');
DEFINE('_KUNENA_CATEGORY', 'Catégorie:');
DEFINE('_KUNENA_CATEGORIES', 'Catégories');
DEFINE('_KUNENA_POSTED_AT', 'Posté il y a ');
DEFINE('_KUNENA_AGO', '');
DEFINE('_KUNENA_DISCUSSIONS', 'Discussions');
DEFINE('_KUNENA_TOTAL_THREADS', 'Sujets au total:');
DEFINE('_SHOW_DEFAULT', 'Défaut');
DEFINE('_SHOW_MONTH', 'Mois');
DEFINE('_SHOW_YEAR', 'Année');

// 1.0.4
DEFINE('_KUNENA_COPY_FILE', 'Copie de "%src%" vers "%dst%"...');
DEFINE('_KUNENA_COPY_OK', 'OK');
DEFINE('_KUNENA_CSS_SAVE', 'La sauvegarde des fichiers css devrait être ici... fichier="%file%"');
DEFINE('_KUNENA_UP_ATT_10', 'La table des pièces jointes a été mise à jour avec succès vers la structure de la dernière version de la série 1.0.x !');
DEFINE('_KUNENA_UP_ATT_10_MSG', 'Dans la table des messages, les pièces jointes ont été mises à jour avec succès vers la structure de la dernière version de la série 1.0.x !');
DEFINE('_KUNENA_TOPIC_MOVED', '---');
DEFINE('_KUNENA_TOPIC_MOVED_LONG', '------------');
DEFINE('_KUNENA_POST_DEL_ERR_CHILD', 'Impossible de remonter le sujet dans la hiérarchie des messages. Rien n\'a été supprimé.');
DEFINE('_KUNENA_POST_DEL_ERR_MSG', 'Impossible de supprimer le(s) message(s) - rien d\'autre n\'a été supprimé');
DEFINE('_KUNENA_POST_DEL_ERR_TXT', 'Impossible d\'effacer les textes des messages. Mettez à jour manuellement votre base de données (mesid=%id%).');
DEFINE('_KUNENA_POST_DEL_ERR_USR', 'Tout a été supprimé mais la mise à jour des statistiques utilisateurs a échoué !');
DEFINE('_KUNENA_POST_MOV_ERR_DB', "Erreur de base de données. Mettez à jour manuellement votre base de données pour quels réponses aux sujets correspondent aux nouveaux forums.");
DEFINE('_KUNENA_UNIST_SUCCESS', "Le composant Kunena a été désinstallé avec succès !");
DEFINE('_KUNENA_PDF_VERSION', 'Version du composant Kunena Forum: %version%');
DEFINE('_KUNENA_PDF_DATE', 'Généré le : %date%');
DEFINE('_KUNENA_SEARCH_NOFORUM', 'Pas de forum pour effectuer une recherche.');

DEFINE('_KUNENA_ERRORADDUSERS', 'Erreur lors de l\'ajout des utilisateurs :');
DEFINE('_KUNENA_USERSSYNCDELETED', 'Utilisateurs synchronisés ; ont été supprimés :');
DEFINE('_KUNENA_USERSSYNCADD', ', ajoutés :');
DEFINE('_KUNENA_SYNCUSERPROFILES', 'profils utilisateurs.');
DEFINE('_KUNENA_NOPROFILESFORSYNC', 'Pas de profil à  synchroniser.');
DEFINE('_KUNENA_SYNC_USERS', 'Synchroniser les utilisateurs');
DEFINE('_KUNENA_SYNC_USERS_DESC', 'Synchronise les utilisateurs de Kunena avec ceux de Joomla!');
DEFINE('_KUNENA_A_MAIL_ADMIN', 'Email aux administrateurs');
DEFINE('_KUNENA_A_MAIL_ADMIN_DESC',
    'Sélectionner <font color=#339933><b>Oui</b></font> pour qu\'un email de notification soit envoyé à (aux) l\'administrateur(s) système à chaque nouveau message.');
DEFINE('_KUNENA_RANKS_EDIT', 'Editer le rang');
DEFINE('_KUNENA_USER_HIDEEMAIL', 'Cacher l\'adresse email');
DEFINE('_KUNENA_DT_DATE_FMT','%d/%m/%Y');
DEFINE('_KUNENA_DT_TIME_FMT','%H:%M');
DEFINE('_KUNENA_DT_DATETIME_FMT','%d/%m/%Y %H:%M');
DEFINE('_KUNENA_DT_LDAY_SUN', 'Dimanche');
DEFINE('_KUNENA_DT_LDAY_MON', 'Lundi');
DEFINE('_KUNENA_DT_LDAY_TUE', 'Mardi');
DEFINE('_KUNENA_DT_LDAY_WED', 'Mercredi');
DEFINE('_KUNENA_DT_LDAY_THU', 'Jeudi');
DEFINE('_KUNENA_DT_LDAY_FRI', 'Vendredi');
DEFINE('_KUNENA_DT_LDAY_SAT', 'Samedi');
DEFINE('_KUNENA_DT_DAY_SUN', 'Dim');
DEFINE('_KUNENA_DT_DAY_MON', 'Lun');
DEFINE('_KUNENA_DT_DAY_TUE', 'Mar');
DEFINE('_KUNENA_DT_DAY_WED', 'Mer');
DEFINE('_KUNENA_DT_DAY_THU', 'Jeu');
DEFINE('_KUNENA_DT_DAY_FRI', 'Ven');
DEFINE('_KUNENA_DT_DAY_SAT', 'Sam');
DEFINE('_KUNENA_DT_LMON_JAN', 'Janvier');
DEFINE('_KUNENA_DT_LMON_FEB', 'Février');
DEFINE('_KUNENA_DT_LMON_MAR', 'Mars');
DEFINE('_KUNENA_DT_LMON_APR', 'Avril');
DEFINE('_KUNENA_DT_LMON_MAY', 'Mai');
DEFINE('_KUNENA_DT_LMON_JUN', 'Juin');
DEFINE('_KUNENA_DT_LMON_JUL', 'Juillet');
DEFINE('_KUNENA_DT_LMON_AUG', 'Août');
DEFINE('_KUNENA_DT_LMON_SEP', 'Septembre');
DEFINE('_KUNENA_DT_LMON_OCT', 'Octobre');
DEFINE('_KUNENA_DT_LMON_NOV', 'Novembre');
DEFINE('_KUNENA_DT_MON_JAN', 'Jan');
DEFINE('_KUNENA_DT_MON_FEB', 'Fév');
DEFINE('_KUNENA_DT_MON_MAR', 'Mar');
DEFINE('_KUNENA_DT_MON_APR', 'Avr');
DEFINE('_KUNENA_DT_MON_MAY', 'Mai');
DEFINE('_KUNENA_DT_MON_JUN', 'Jun');
DEFINE('_KUNENA_DT_MON_JUL', 'Jui');
DEFINE('_KUNENA_DT_MON_AUG', 'Aou');
DEFINE('_KUNENA_DT_MON_SEP', 'Sep');
DEFINE('_KUNENA_DT_MON_OCT', 'Oct');
DEFINE('_KUNENA_DT_MON_NOV', 'Nov');
DEFINE('_KUNENA_CHILD_BOARD', 'Sous-catégories');
DEFINE('_WHO_ONLINE_GUEST', 'Invité(s)');
DEFINE('_WHO_ONLINE_MEMBER', 'Membre(s)');
DEFINE('_KUNENA_IMAGE_PROCESSOR_NONE', 'aucun');
DEFINE('_KUNENA_IMAGE_PROCESSOR', 'Gestionnaire d\'image :');
DEFINE('_KUNENA_INSTALL_CLICK_TO_CONTINUE', 'Cliquez pour continuer...');
DEFINE('_KUNENA_INSTALL_APPLY', 'Appliquer !');
DEFINE('_KUNENA_NO_ACCESS', 'Vous n\'avez pas accès à ce forum !');
DEFINE('_KUNENA_TIME_SINCE', 'Il y a %time%');
DEFINE('_KUNENA_DATE_YEARS', 'Années');
DEFINE('_KUNENA_DATE_MONTHS', 'Mois');
DEFINE('_KUNENA_DATE_WEEKS','Semaines');
DEFINE('_KUNENA_DATE_DAYS', 'Jours');
DEFINE('_KUNENA_DATE_HOURS', 'Heures');
DEFINE('_KUNENA_DATE_MINUTES', 'Minutes');
// 1.0.2
DEFINE('_KUNENA_HEADERADD', 'Sous-titre du forum');
DEFINE('_KUNENA_ADVANCEDDISPINFO', "Affichage du forum");
DEFINE('_KUNENA_CLASS_SFX', "Suffixe de classe CSS");
DEFINE('_KUNENA_CLASS_SFXDESC', "Suffixe CSS appliqué à index, showcat, view permettant plusieurs designs par forum.");
DEFINE('_COM_A_USER_EDIT_TIME', 'Durée d\'édition utilisateur');
DEFINE('_COM_A_USER_EDIT_TIME_DESC', 'Le temps en secondes autorisé pour modifier un message depuis sa création ou sa dernière modification. 
Mettre 0 pour une durée illimitée.');
DEFINE('_COM_A_USER_EDIT_TIMEGRACE', 'Temps de grâce d\'édition utilisateur');
DEFINE('_COM_A_USER_EDIT_TIMEGRACE_DESC', 'Par défaut 600 [secondes], permet la modification d\'un message jusqu\'à  600 secondes après édition sans ajouter/modifier la marque d\'édition.');

DEFINE('_KUNENA_HELPPAGE','Activer la page d\'aide');
DEFINE('_KUNENA_HELPPAGE_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour qu\'un lien vers l\'aide soit affiché dans le menu du haut.');
DEFINE('_KUNENA_HELPPAGE_IN_FB','Afficher l\'aide vers Kunena');
DEFINE('_KUNENA_HELPPAGE_IN_KUNENA_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour que l\'aide affichée soit celle contenue dans Kunena et que le lien vers l\'aide externe à  Kunena soit désactivé.<br><b>Note:</b> Si vous choisissez non, indiquer l\'ID de l\'article d\'aide" .');
DEFINE('_KUNENA_HELPPAGE_CID','ID de l\'article d\'aide');
DEFINE('_KUNENA_HELPPAGE_CID_DESC','L\'option "Activer la page d\'aide" doit être activée. Entrez dans ce champ l\'ID de l\'article que vous avez créé spécialement pour l\'aide au forum.');
DEFINE('_KUNENA_HELPPAGE_LINK',' Lien vers l\'aide externe');
DEFINE('_KUNENA_HELPPAGE_LINK_DESC','Si vous activez l\'aide externe veuillez choisir <font color=#FF0000><b>Non</b></font> pour le paramètre "Afficher l\'aide Kunena".');
DEFINE('_KUNENA_RULESPAGE','Activer la page de règles');
DEFINE('_KUNENA_RULESPAGE_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour qu\'un lien vers votre page de règles soit affiché dans le menu du haut.');
DEFINE('_KUNENA_RULESPAGE_IN_FB','Afficher les règles Kunena');
DEFINE('_KUNENA_RULESPAGE_IN_KUNENA_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour que les règles affichées soient celles contenues dans Kunena et que le lien vers les règles externes à  Kunena soit désactivé.<br><b>Note:</b> Si vous choisissez non, saisissez l\'ID de l\'article des règles".');
DEFINE('_KUNENA_RULESPAGE_CID','ID de l\'article de règles');
DEFINE('_KUNENA_RULESPAGE_CID_DESC','L\'option "Activer la page de règles" doit être activée. Entrez dans ce champ l\'ID de l\'article que vous avez créé spécialement pour les règles de votre forum.');
DEFINE('_KUNENA_RULESPAGE_LINK',' Lien vers des règles externes');
DEFINE('_KUNENA_RULESPAGE_LINK_DESC','Si vous activez les règles externes veuillez choisir <font color=#FF0000><b>Non</b></font> pour le paramètre "Afficher les règles Kunena".');
DEFINE('_KUNENA_AVATAR_GDIMAGE_NOT','<font color=#FF0000><b>Librairie GD non trouvée/b></font>');
DEFINE('_KUNENA_AVATAR_GD2IMAGE_NOT','<font color=#FF0000><b>Librairie GD2 non trouvée/b></font>');
DEFINE('_KUNENA_GD_INSTALLED','<font color=#339933><b>GD est disponible</b></font> version ');
DEFINE('_KUNENA_GD_NO_VERSION','Impossible de détecter la version de GD');
DEFINE('_KUNENA_GD_NOT_INSTALLED','GD n\'est pas installé, vous pouvez trouver plus d\'informations ');
DEFINE('_KUNENA_AVATAR_SMALL_HEIGHT','Hauteur pour petite image :');
DEFINE('_KUNENA_AVATAR_SMALL_WIDTH','Largeur pour petite image :');
DEFINE('_KUNENA_AVATAR_MEDIUM_HEIGHT','Hauteur pour image moyenne :');
DEFINE('_KUNENA_AVATAR_MEDIUM_WIDTH','Largeur pour image moyenne :');
DEFINE('_KUNENA_AVATAR_LARGE_HEIGHT','Hauteur pour grande image :');
DEFINE('_KUNENA_AVATAR_LARGE_WIDTH','Largeur pour grande image :');
DEFINE('_KUNENA_AVATAR_QUALITY','Qualité de l\'avatar');
DEFINE('_KUNENA_WELCOME','Bienvenue dans Kunena');
DEFINE('_KUNENA_WELCOME_DESC','Merci d\'avoir choisi Kunena comme solution de forum. Cet écran vous donnera un rapide aperçu des statistiques du forum. Les liens sur la gauche de cet écran vous permettront de contrôler tous les aspects de votre forum. Chaque page contient les instructions nécessaires.');
DEFINE('_KUNENA_STATISTIC','Statistiques');
DEFINE('_KUNENA_VALUE','Valeur');
DEFINE('_GEN_CATEGORY','Catégorie');
DEFINE('_GEN_STARTEDBY','Créé par : ');
DEFINE('_GEN_STATS','stats');
DEFINE('_STATS_TITLE',' forum - stats');
DEFINE('_STATS_GEN_STATS','Statistiques générales');
DEFINE('_STATS_TOTAL_MEMBERS','Membres :');
DEFINE('_STATS_TOTAL_REPLIES','Réponses :');
DEFINE('_STATS_TOTAL_TOPICS','Sujets :');
DEFINE('_STATS_TODAY_TOPICS','Sujets aujourd\'hui :');
DEFINE('_STATS_TODAY_REPLIES','Réponses aujourd\'hui :');
DEFINE('_STATS_TOTAL_CATEGORIES','Catégories :');
DEFINE('_STATS_TOTAL_SECTIONS','Sections :');
DEFINE('_STATS_LATEST_MEMBER','Dernier inscrit :');
DEFINE('_STATS_YESTERDAY_TOPICS','Sujets hier :');
DEFINE('_STATS_YESTERDAY_REPLIES','Réponses hier :');
DEFINE('_STATS_POPULAR_PROFILE','Les 10 membres les plus populaires (nombre d\'affichages de profil)');
DEFINE('_STATS_TOP_POSTERS','Meilleurs posteurs');
DEFINE('_STATS_POPULAR_TOPICS','Sujets les plus suivis');
DEFINE('_COM_A_STATSPAGE','Activer la page de stats');
DEFINE('_COM_A_STATSPAGE_DESC','Sélectionner "Oui" si vous souhaitez qu\'un lien public soit affiché pointant vers les statistiques du forum. <em>Quoi que vous choisissiez la page de stats sera toujours accessible par les administrateurs !</em>');
DEFINE('_COM_C_JBSTATS','Stats du forum');
DEFINE('_COM_C_JBSTATS_DESC',' : Statistiques ');
DEFINE('_GEN_GENERAL','Général');
DEFINE('_PERM_NO_READ','Vous n\'avez pas les permissions nécessaires pour accéder au forum.');
DEFINE('_KUNENA_SMILEY_SAVED','Emoticône sauvegardée');
DEFINE('_KUNENA_SMILEY_DELETED','Emoticône supprimée');
DEFINE('_KUNENA_CODE_ALLREADY_EXITS','Le code existe déjà ');
DEFINE('_KUNENA_MISSING_PARAMETER','Paramètre manquant');
DEFINE('_KUNENA_RANK_ALLREADY_EXITS','Le rang existe déjà ');
DEFINE('_KUNENA_RANK_DELETED','Rang supprimé');
DEFINE('_KUNENA_RANK_SAVED','Rang sauvegardé');
DEFINE('_KUNENA_DELETE_SELECTED','Supprimer la sélection');
DEFINE('_KUNENA_MOVE_SELECTED','Déplacer la sélection');
DEFINE('_KUNENA_REPORT_LOGGED','Connecté');
DEFINE('_KUNENA_GO','OK');
DEFINE('_KUNENA_MAILFULL','Joindre le message à  l\'email de notification envoyé aux abonnés');
DEFINE('_KUNENA_MAILFULL_DESC','Sinon les utilisateurs abonnés ne recevront que les titres des messages');
DEFINE('_KUNENA_HIDETEXT','Veuillez vous connecter pour voir cette page !');
DEFINE('_BBCODE_HIDE','Texte caché : [hide]n\'importe quel texte caché[/hide] - permet de cacher du texte au public ');
DEFINE('_KUNENA_FILEATTACH','Fichier attaché : ');
DEFINE('_KUNENA_FILENAME','Nom de fichier : ');
DEFINE('_KUNENA_FILESIZE','Taille de fichier : ');
DEFINE('_KUNENA_MSG_CODE','Code : ');
DEFINE('_KUNENA_CAPTCHA_ON','Système de protection antispam');
DEFINE('_KUNENA_CAPTCHA_DESC','Système <b>CAPTHCA</b> antispam et antibot marche/arrêt');
DEFINE('_KUNENA_CAPDESC','Entrez le code ici');
DEFINE('_KUNENA_CAPERR','Code incorrect !');
DEFINE('_KUNENA_COM_A_REPORT', 'Rapport sur message'); 
DEFINE('_KUNENA_COM_A_REPORT_DESC', 'Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez que les utilisateurs puissent faire des rapports sur des messages.');
DEFINE('_KUNENA_REPORT_MSG', 'Rapport de message envoyé'); 
DEFINE('_KUNENA_REPORT_REASON', 'Raison');
DEFINE('_KUNENA_REPORT_MESSAGE', 'Votre Message');
DEFINE('_KUNENA_REPORT_SEND', 'Envoyer le rapport'); 
DEFINE('_KUNENA_REPORT', 'Envoyer un rapport au modérateur'); 
DEFINE('_KUNENA_REPORT_RSENDER', 'Auteur du rapport : ');
DEFINE('_KUNENA_REPORT_RREASON', 'Raison du rapport : ');
DEFINE('_KUNENA_REPORT_RMESSAGE', 'Message du rapport : ');
DEFINE('_KUNENA_REPORT_POST_POSTER', 'Auteur du message : ');
DEFINE('_KUNENA_REPORT_POST_SUBJECT', 'Sujet du message : ');
DEFINE('_KUNENA_REPORT_POST_MESSAGE', 'Message : ');
DEFINE('_KUNENA_REPORT_POST_LINK', 'URL du message : '); 
DEFINE('_KUNENA_REPORT_INTRO', 'vous a envoyé un message pour signaler que '); 
DEFINE('_KUNENA_REPORT_SUCCESS', 'Rapport envoyé avec succès !');
DEFINE('_KUNENA_EMOTICONS', 'Emoticônes');
DEFINE('_KUNENA_EMOTICONS_SMILEY', 'Emoticône');
DEFINE('_KUNENA_EMOTICONS_CODE', 'Code');
DEFINE('_KUNENA_EMOTICONS_URL', 'URL');
DEFINE('_KUNENA_EMOTICONS_EDIT_SMILEY', 'Editer l\'émoticône');
DEFINE('_KUNENA_EMOTICONS_EDIT_SMILIES', 'Editer les émoticônes');
DEFINE('_KUNENA_EMOTICONS_EMOTICONBAR', 'Barre d\'émoticônes');
DEFINE('_KUNENA_EMOTICONS_NEW_SMILEY', 'Nouvel émoticône');
DEFINE('_KUNENA_EMOTICONS_MORE_SMILIES', 'Plus d\'emoticônes');
DEFINE('_KUNENA_EMOTICONS_CLOSE_WINDOW', 'Fermer la fenêtre');
DEFINE('_KUNENA_EMOTICONS_ADDITIONAL_EMOTICONS', 'Emoticônes supplémentaires');
DEFINE('_KUNENA_EMOTICONS_PICK_A_SMILEY', 'Choisir une émoticône');
DEFINE('_KUNENA_MAMBOT_SUPPORT', 'Plugins Joomla');
DEFINE('_KUNENA_MAMBOT_SUPPORT_DESC', 'Active les Plugins de Joomla dans les messages.');
DEFINE('_KUNENA_MYPROFILE_PLUGIN_SETTINGS', 'Paramètres du plugin de profil'); 
DEFINE('_KUNENA_USERNAMECANCHANGE', 'Autoriser le changement de nom d\'utilisateur');
DEFINE('_KUNENA_USERNAMECANCHANGE_DESC', 'Autoriser les utilisateurs à changer leur nom d\'utilisateur dans leur page de profil.');
DEFINE('_KUNENA_RECOUNTFORUMS','Recompter les stats des catégories');
DEFINE('_KUNENA_RECOUNTFORUMS_DONE','Toutes les stats de catégories ont été recomptées.');
DEFINE('_KUNENA_EDITING_REASON','Raison de l\'édition');
DEFINE('_KUNENA_EDITING_LASTEDIT','Dernière édition');
DEFINE('_KUNENA_BY','Par');
DEFINE('_KUNENA_REASON','Raison');
DEFINE('_GEN_GOTOBOTTOM', 'Aller en bas');
DEFINE('_GEN_GOTOTOP', 'Revenir en haut');
DEFINE('_STAT_USER_INFO', 'Infos utilisateur');
DEFINE('_USER_SHOWEMAIL', 'Afficher mon adresse email'); 
DEFINE('_USER_SHOWONLINE', 'Afficher ma présence en ligne en page d\'accueil'); 
DEFINE('_KUNENA_HIDDEN_USERS', 'Utilisateurs cachés'); 
DEFINE('_KUNENA_SAVE', 'Sauver');
DEFINE('_KUNENA_RESET', 'Réinitialiser');
DEFINE('_KUNENA_DEFAULT_GALLERY', 'Galerie par défaut');
DEFINE('_KUNENA_MYPROFILE_PERSONAL_INFO', 'Infos personnelles');
DEFINE('_KUNENA_MYPROFILE_TIMEZONE', 'Fuseau Horaire');//heure locale ??
DEFINE('_KUNENA_MYPROFILE_SUMMARY', 'Résumé'); 
DEFINE('_KUNENA_MYPROFILE_MYAVATAR', 'Mon avatar');
DEFINE('_KUNENA_MYPROFILE_FORUM_SETTINGS', 'Paramètres du forum');
DEFINE('_KUNENA_MYPROFILE_LOOK_AND_LAYOUT', 'Affichage et style');
DEFINE('_KUNENA_MYPROFILE_MY_PROFILE_INFO', 'Mes infos de profil');
DEFINE('_KUNENA_MYPROFILE_MY_POSTS', 'Mes messages');
DEFINE('_KUNENA_MYPROFILE_MY_SUBSCRIBES', 'Mes abonnements');
DEFINE('_KUNENA_MYPROFILE_MY_FAVORITES', 'Mes favoris');
DEFINE('_KUNENA_MYPROFILE_PRIVATE_MESSAGING', 'Messagerie privée');
DEFINE('_KUNENA_MYPROFILE_INBOX', 'Boite de réception');
DEFINE('_KUNENA_MYPROFILE_NEW_MESSAGE', 'Nouveau message');
DEFINE('_KUNENA_MYPROFILE_OUTBOX', 'Boite d\'envoi');
DEFINE('_KUNENA_MYPROFILE_TRASH', 'Corbeille');
DEFINE('_KUNENA_MYPROFILE_SETTINGS', 'Paramètres');
DEFINE('_KUNENA_MYPROFILE_CONTACTS', 'Contacts');
DEFINE('_KUNENA_MYPROFILE_BLOCKEDLIST', 'Liste rouge'); 
DEFINE('_KUNENA_MYPROFILE_ADDITIONAL_INFO', 'Infos supplémentaires');
DEFINE('_KUNENA_MYPROFILE_NAME', 'Nom');
DEFINE('_KUNENA_MYPROFILE_USERNAME', 'Nom d\'utilisateur');
DEFINE('_KUNENA_MYPROFILE_EMAIL', 'Email');
DEFINE('_KUNENA_MYPROFILE_USERTYPE', 'Type d\'utilisateur');
DEFINE('_KUNENA_MYPROFILE_REGISTERDATE', 'Date d\'enregistrement');
DEFINE('_KUNENA_MYPROFILE_LASTVISITDATE', 'Date de dernière visite');
DEFINE('_KUNENA_MYPROFILE_POSTS', 'Messages'); 
DEFINE('_KUNENA_MYPROFILE_PROFILEVIEW', 'Nombre de clics sur ce profil');
DEFINE('_KUNENA_MYPROFILE_PERSONALTEXT', 'Texte personnel');
DEFINE('_KUNENA_MYPROFILE_GENDER', 'Sexe');
DEFINE('_KUNENA_MYPROFILE_BIRTHDATE', 'Date de naissance');
DEFINE('_KUNENA_MYPROFILE_BIRTHDATE_DESC', 'Jour (DD) - Mois (MM) - Année (YYYY)');
DEFINE('_KUNENA_MYPROFILE_LOCATION', 'Lieu');
DEFINE('_KUNENA_MYPROFILE_ICQ', 'ICQ');
DEFINE('_KUNENA_MYPROFILE_ICQ_DESC', 'Votre numéro ICQ.');
DEFINE('_KUNENA_MYPROFILE_AIM', 'AIM');
DEFINE('_KUNENA_MYPROFILE_AIM_DESC', 'Votre pseudo de messagerie AOL Instant Messenger.'); 
DEFINE('_KUNENA_MYPROFILE_YIM', 'YIM');
DEFINE('_KUNENA_MYPROFILE_YIM_DESC', 'Votre pseudo Yahoo Messenger.');
DEFINE('_KUNENA_MYPROFILE_SKYPE', 'SKYPE');
DEFINE('_KUNENA_MYPROFILE_SKYPE_DESC', 'Votre identifiant Skype.');
DEFINE('_KUNENA_MYPROFILE_GTALK', 'GTALK');
DEFINE('_KUNENA_MYPROFILE_GTALK_DESC', 'Votre pseudo GTalk.');
DEFINE('_KUNENA_MYPROFILE_WEBSITE', 'Website');
DEFINE('_KUNENA_MYPROFILE_WEBSITE_NAME', 'Nom de votre site web');
DEFINE('_KUNENA_MYPROFILE_WEBSITE_NAME_DESC', 'Exemple : Kunena!');
DEFINE('_KUNENA_MYPROFILE_WEBSITE_URL', 'L\'URL de votre site');
DEFINE('_KUNENA_MYPROFILE_WEBSITE_URL_DESC', 'Exemple : www.kunena.com');
DEFINE('_KUNENA_MYPROFILE_MSN', 'MSN');
DEFINE('_KUNENA_MYPROFILE_MSN_DESC', 'Votre adresse email MSN (Windows Live Messenger).');
DEFINE('_KUNENA_MYPROFILE_SIGNATURE', 'Signature');
DEFINE('_KUNENA_MYPROFILE_MALE', 'Masculin');
DEFINE('_KUNENA_MYPROFILE_MALEC', 'masculin');
DEFINE('_KUNENA_MYPROFILE_FEMALE', 'Féminin');
DEFINE('_KUNENA_BULKMSG_DELETED', 'Les messages ont été supprimés avec succès');
DEFINE('_KUNENA_DATE_YEAR', 'Année');
DEFINE('_KUNENA_DATE_MONTH', 'Mois');
DEFINE('_KUNENA_DATE_WEEK','Semaine');
DEFINE('_KUNENA_DATE_DAY', 'Jour');
DEFINE('_KUNENA_DATE_HOUR', 'Heure');
DEFINE('_KUNENA_DATE_MINUTE', 'Minute');
DEFINE('_KUNENA_IN_FORUM', ' dans le forum: ');
DEFINE('_KUNENA_FORUM_AT', ' Forum à  : '); 
DEFINE('_KUNENA_QMESSAGE_NOTE', 'Bien qu\'aucun code ou smiley ne soient montrés, ils sont utilisables.'); 

// 1.0.1
DEFINE ('_KUNENA_FORUMTOOLS','Outils de navigation');

//userlist
DEFINE ('_KUNENA_USRL_USERLIST','Liste des utilisateurs');
DEFINE ('_KUNENA_USRL_REGISTERED_USERS','%s c\'est <b>%d</b> utilisateurs enregistrés'); 
DEFINE ('_KUNENA_USRL_SEARCH_ALERT','Veuillez entrer une valeur à  rechercher!');
DEFINE ('_KUNENA_USRL_SEARCH','Chercher un membre');
DEFINE ('_KUNENA_USRL_SEARCH_BUTTON','Recherche');
DEFINE ('_KUNENA_USRL_LIST_ALL','Lister tous');
DEFINE ('_KUNENA_USRL_NAME','Nom');
DEFINE ('_KUNENA_USRL_USERNAME','Pseudonyme');
DEFINE ('_KUNENA_USRL_GROUP','Groupe');
DEFINE ('_KUNENA_USRL_POSTS','Messages');
DEFINE ('_KUNENA_USRL_KARMA','Karma');
DEFINE ('_KUNENA_USRL_HITS','Vues');
DEFINE ('_KUNENA_USRL_EMAIL','E-mail');
DEFINE ('_KUNENA_USRL_USERTYPE','Type d\'utilisateur');
DEFINE ('_KUNENA_USRL_JOIN_DATE','Date d\'arrivée');
DEFINE ('_KUNENA_USRL_LAST_LOGIN','Dernière visite');
DEFINE ('_KUNENA_USRL_NEVER','Jamais');
DEFINE ('_KUNENA_USRL_ONLINE','Statut');
DEFINE ('_KUNENA_USRL_AVATAR','Avatar');
DEFINE ('_KUNENA_USRL_ASC','Le + récent en 1er');
DEFINE ('_KUNENA_USRL_DESC','Le + récent en dernier');
DEFINE ('_KUNENA_USRL_DISPLAY_NR','Affichage');
DEFINE ('_KUNENA_USRL_DATE_FORMAT','%d.%m.%Y');

DEFINE('_KUNENA_ADMIN_CONFIG_PLUGINS','Plugins');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST','Liste des utilisateurs');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_ROWS_DESC','Définir le nombre de lignes à  afficher dans la liste des utilisateurs');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_ROWS','Nombre de lignes');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERONLINE','Statut de connexion');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERONLINE_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher le statut de connexion des utilisateurs');

DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_AVATAR','Afficher l\'avatar');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERLIST_AVATAR_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher l\'avatar des utilisateurs');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_NAME','Afficher le vrai nom');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_name_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher le vrai nom (nom et prénom) des utilisateurs'); 
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERNAME','Afficher le pseudonyme');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERNAME_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher le pseudonyme des utilisateurs');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_GROUP','Afficher le groupe');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_GROUP_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher le groupe auquel appartient l\'utlisateur');//
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_POSTS','Afficher le nombre de messages');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_POSTS_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher le nombre de messages écrits par les utilisateurs');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_KARMA','Afficher le Karma');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_KARMA_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher le Karma des utilisateurs');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_EMAIL','Afficher l\'adresse E-mail');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_EMAIL_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher l\'adresse email des utilisateurs');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERTYPE','Afficher le type d\'utilisateur');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_USERTYPE_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher le type des utilisateurs');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_JOINDATE','Afficher la première connexion');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_JOINDATE_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher la date de la première connexion d\'un utilisateur');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_LASTVISITDATE','Afficher la dernière connexion');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_LASTVISITDATE_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher la date de la dernière connexion d\'un utilisateur');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_HITS','Afficher le nombre de consultations');
DEFINE('_KUNENA_ADMIN_CONFIG_USERLIST_HITS_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher le nombre de consultations du profil d\'un utilisateur.');
DEFINE('_KUNENA_DBWIZ', 'Assistant base de donnée');
DEFINE('_KUNENA_DBMETHOD', 'Sélectionner une méthode pour terminer l\'installation:');
DEFINE('_KUNENA_DBCLEAN', 'Installation vierge');
DEFINE('_KUNENA_DBUPGRADE', 'Mise à  jour depuis Joomlaboard');
DEFINE('_KUNENA_TOPLEVEL', 'Pas de catégorie parente');
DEFINE('_KUNENA_REGISTERED', 'Membre'); 
DEFINE('_KUNENA_PUBLICBACKEND', 'Invité'); 
DEFINE('_KUNENA_SELECTANITEMTO', 'Sélectionner un article pour');
DEFINE('_KUNENA_ERRORSUBS', 'Il y a eu un problème lors de l\effacement des messages et abonnements');
DEFINE('_KUNENA_WARNING', 'Attention...');
DEFINE('_KUNENA_CHMOD1', 'Vous devez changer les droits (chmod) ceci à 766 pour que le fichier puisse être mis à jour.');
DEFINE('_KUNENA_YOURCONFIGFILEIS', 'Votre fichier de configuration est');
DEFINE('_KUNENA_KUNENA', 'Kunena');
DEFINE('_KUNENA_CLEXUS', 'Clexus PM');
DEFINE('_KUNENA_CB', 'Community Builder');
DEFINE('_KUNENA_MYPMS', 'myPMS II Open Source');
DEFINE('_KUNENA_UDDEIM', 'Uddeim');
DEFINE('_KUNENA_JIM', 'JIM');
DEFINE('_KUNENA_MISSUS', 'Missus');
DEFINE('_KUNENA_SELECTTEMPLATE', 'Sélectionner un template');
DEFINE('_KUNENA_CONFIGSAVED', 'Configuration sauvegardée.');
DEFINE('_KUNENA_CONFIGNOTSAVED', 'ERREUR FATALE: Le fichier de configuration n\'est pas modifiable');
DEFINE('_KUNENA_TFINW', 'Ce fichier n\'est pas modifiable.');
DEFINE('_KUNENA_FBCFS', 'Le fichier CSS de Kunena est sauvegardé.');
DEFINE('_KUNENA_SELECTMODTO', 'Sélectionner un modérateur pour');
DEFINE('_KUNENA_CHOOSEFORUMTOPRUNE', 'Vous devez choisir un forum pour le nettoyer !');
DEFINE('_KUNENA_DELMSGERROR', 'L\'effacement des messages a échoué :');
DEFINE('_KUNENA_DELMSGERROR1', 'L\'effacement du texte de messages a échoué :');
DEFINE('_KUNENA_CLEARSUBSFAIL', 'La suppression des abonnements a échoué :');
DEFINE('_KUNENA_FORUMPRUNEDFOR', 'Forum nettoyé depuis'); 
DEFINE('_KUNENA_PRUNEDAYS', 'jours');
DEFINE('_KUNENA_PRUNEDELETED', 'Effacé:');
DEFINE('_KUNENA_PRUNETHREADS', 'sujets');
DEFINE('_KUNENA_ERRORPRUNEUSERS', 'Erreur pendant le nettoyage des utilisateurs :');
DEFINE('_KUNENA_USERSPRUNEDDELETED', 'Utilisateurs nettoyés ; effacés :');
DEFINE('_KUNENA_PRUNEUSERPROFILES', 'profils d\'utilisateurs');
DEFINE('_KUNENA_NOPROFILESFORPRUNNING', 'Aucun profil obsolète n\'a été trouvé.');
DEFINE('_KUNENA_TABLESUPGRADED', 'Les tables de Kunena ont été mises à jour vers la version');
DEFINE('_KUNENA_FORUMCATEGORY', 'Catégorie du forum');
DEFINE('_KUNENA_IMGDELETED', 'Image supprimée');
DEFINE('_KUNENA_FILEDELETED', 'Fichier supprimé');
DEFINE('_KUNENA_NOPARENT', 'Pas de catégorie parente'); 
DEFINE('_KUNENA_DIRCOPERR', 'Erreur: Fichier');
DEFINE('_KUNENA_DIRCOPERR1', 'ne peut être copié!\n');
DEFINE('_KUNENA_INSTALL1', '<strong>Kunena Forum</strong> Composant <em>pour le CMS Joomla! </em> <br>&copy; 2009 - 2010 by www.Kunena.com<br>Tous droits réservés.');
DEFINE('_KUNENA_INSTALL2', 'Transfert/Installation :</code></strong><br><br><font color="red"><b>réussie');
DEFINE('_KUNENA_FORUMPRF_TITLE', 'Paramètres du profil');
DEFINE('_KUNENA_FORUMPRF', 'Profil');
DEFINE('_KUNENA_FORUMPRRDESC', 'Si vous avez installé <b>Jomsocial</b>, <b>Community Builder</b> ou <b>AlphUserPoints</b> dans votre site Joomla!, vous pouvez configurer Kunena pour qu\'il utilise leur profil.');
DEFINE('_KUNENA_USERPROFILE_PROFILE', 'Profil');
DEFINE('_KUNENA_USERPROFILE_PROFILEHITS', '<b>Nombre de clics sur ce profil</b>');
DEFINE('_KUNENA_USERPROFILE_MESSAGES', 'Tous les messages du forum');
DEFINE('_KUNENA_USERPROFILE_TOPICS', 'Sujets');
DEFINE('_KUNENA_USERPROFILE_STARTBY', 'Commencés par');
DEFINE('_KUNENA_USERPROFILE_CATEGORIES', 'Catégories');
DEFINE('_KUNENA_USERPROFILE_DATE', 'Date');
DEFINE('_KUNENA_USERPROFILE_HITS', 'Vues');
DEFINE('_KUNENA_USERPROFILE_NOFORUMPOSTS', 'Pas de message dans ce forum');
DEFINE('_KUNENA_TOTALFAVORITE', 'Ajouté aux favoris :  ');
DEFINE('_KUNENA_SHOW_CHILD_CATEGORY_COLON', 'Nombre de colonnes pour les sous-forums  ');
DEFINE('_KUNENA_SHOW_CHILD_CATEGORY_COLONDESC', 'Déterminez le nombre de colonnes pour les sous-forums lors de l\'affichage de leur catégorie parente  ');
DEFINE('_KUNENA_SUBSCRIPTIONSCHECKED', 'Abonnement au sujet par défaut ?');
DEFINE('_KUNENA_SUBSCRIPTIONSCHECKED_DESC', 'Si vous voulez que la case s\'abonner au sujet soit cochée par défaut lors de l\'écriture d\'un message');
// Errors (Re-integration from Joomlaboard 1.2)
DEFINE('_KUNENA_ERROR1', 'La catégorie / le forum doit avoir un nom');
// Forum Configuration (New in Kunena)
DEFINE('_KUNENA_SHOWSTATS', 'Afficher les statistiques');
DEFINE('_KUNENA_SHOWSTATSDESC', 'Sélectionner <font color=#339933><b>Oui</b></font> pour afficher les statistiques');
DEFINE('_KUNENA_SHOWWHOIS', 'Afficher qui en ligne');
DEFINE('_KUNENA_SHOWWHOISDESC', 'Sélectionner <font color=#339933><b>Oui</b></font> pour afficher une liste des utilisateurs qui sont en ligne');
DEFINE('_KUNENA_STATSGENERAL', 'Afficher les statistiques générales');
DEFINE('_KUNENA_STATSGENERALDESC', 'Sélectionner <font color=#339933><b>Oui</b></font> pour afficher les statistiques générales');
DEFINE('_KUNENA_USERSTATS', 'Afficher les utilisateurs les plus populaires');
DEFINE('_KUNENA_USERSTATSDESC', 'Sélectionner <font color=#339933><b>Oui</b></font> pour afficher la liste des profils utilisateurs les plus consultés');
DEFINE('_KUNENA_USERNUM', 'Définir le nombre d\'utilisateurs populaires à afficher');
DEFINE('_KUNENA_USERPOPULAR', 'Afficher les sujets les plus populaires');
DEFINE('_KUNENA_USERPOPULARDESC', 'Sélectionner <font color=#339933><b>Oui</b></font> pour afficher les sujets les plus consultés par les utilisateurs');
DEFINE('_KUNENA_NUMPOP', 'Définir le nombre de sujets populaires à afficher');
DEFINE('_KUNENA_INFORMATION',
    'L\'équipe de Best of Joomla est fière de vous annoncer la sortie de Kunena 1.0.0. C\'est un composant puissant et stylé pour un excellent système de gestion de contenu : Joomla!. Le travail s\'est basé initialement sur celui de l\'équipe de Joomlaboard et la plupart de nos remerciements vous à  leur équipe. La plupart des fonctions de Kunena sont listées ci-dessous (en plus des fonctions actuelles de JB&#39;s ):<br><br><ul><li>Un système de design de forum bien plus convivial, proche du système de template de SMF mais avec une structure plus simple. With very few steps you can modify the total look of the forum. Thanks goes to the great designers in our team.</li><li>Unlimited subcategory system with better administration backend.</li><li>Faster system and better coding experience for 3rd parties.</li><li>The same<br></li><li>Profilebox at the top of the forum</li><li>Support for popular PM systems, such as ClexusPM and Uddeim</li><li>Basic plugin system (practical rather than perfec)</li><li>Language-DEFINEd icon system.<br></li><li>Sharing image system of other templates. So, choice between templates and image series is possible</li><li>You can add joomla modules inside the forum template itself. Wanted to have banner inside your forum?</li><li>Favourite threads selection and management</li><li>Forum spotlights and highlights</li><li>Forum announcements and its panel</li><li>Latest messages (Tabbed)</li><li>Statistics at bottom</li><li>Who&#39;s online, on what page?</li><li>Category specific image system</li><li>Enhanced pathway</li><li><strong>Joomlaboard import, SMF in plan to be releaed pretty soon</strong></li><li>RSS, PDF output</li><li>Advanced search (under developement)</li><li><b>Community Builder</b> and Clexus PM profile options</li><li>Avatar management : CB and Clexus PM options<br></li></ul><br>Please keep in mind that this release is not meant to be used on production sites, even though we have tested it through. We are planning to continue to work on this project, as it is used on our several projects, and we would be pleased if you could join us to bring a bridge-free solution to Joomla! forums.<br><br>This is a collaborative work of several developers and designers that have kindly participated and made this release come true. Here we thank all of them and wish that you enjoy this release!<br><br>Best of Joomla! team<br></td></tr></table>'); //??
DEFINE('_KUNENA_INSTRUCTIONS', 'Instructions');
DEFINE('_KUNENA_FINFO', 'Informations sur le forum Kunena');
DEFINE('_KUNENA_CSSEDITOR', 'Editeur du CSS du template de Kunena');
DEFINE('_KUNENA_PATH', 'Chemin :');
DEFINE('_KUNENA_CSSERROR', 'Veuillez noter : le fichier CSS du template doit être modifiable pour sauvegarder les changements.');
// User Management
DEFINE('_KUNENA_FUM', 'Gestionnaire des utilisateurs de Kunena');
DEFINE('_KUNENA_SORTID', 'Trier par l\'id des utilisateurs');
DEFINE('_KUNENA_SORTMOD', 'Trier par modérateurs');
DEFINE('_KUNENA_SORTNAME', 'Trier par noms');
DEFINE('_KUNENA_VIEW', 'Vue');
DEFINE('_KUNENA_NOUSERSFOUND', 'Aucun profil d\'utilisateur trouvé.');
DEFINE('_KUNENA_ADDMOD', 'Ajouter un modérateur à ');
DEFINE('_KUNENA_NOMODSAV', 'Aucun modérateur possible trouvé. Lisez la \'note\' ci-dessous.');
DEFINE('_KUNENA_NOTEUS',
    'NOTE: Seuls les utilisateurs ayant une marque de modérateur sélectionnée dans leur profil sont affiché ici. Pour pouvoir ajouter un modérateur il faut d\'abord assigner les droits de modération aux utilisateurs ; allez dans <a href="index2.php?option=com_Kunena&task=profiles">Le gestionnaire des utilisateurs</a> et recherchez l\'utilisateur dont vous voulez en faire un modérateur. Ensuite actualisez son profil. La marque de modérateur ne peut être assignée que par un administrateur. ');
DEFINE('_KUNENA_PROFFOR', 'Profil de');
DEFINE('_KUNENA_GENPROF', 'Options générales du profil');
DEFINE('_KUNENA_PREFVIEW', 'Type de vue préféré :');
DEFINE('_KUNENA_PREFOR', 'Ordre des messages préféré :');
DEFINE('_KUNENA_ISMOD', 'Est modérateur :');
DEFINE('_KUNENA_ISADM', '<strong>Oui</strong> (non modifiable, cet utilisateur est un (super)administrateur)');
DEFINE('_KUNENA_COLOR', 'Couleur');
DEFINE('_KUNENA_UAVATAR', 'Avatar de l\'utilisateur :');
DEFINE('_KUNENA_NS', 'Aucun sélectionné');
DEFINE('_KUNENA_DELSIG', ' cochez cette case pour effacer votre signature');
DEFINE('_KUNENA_DELAV', ' cochez cette case pour effacer votre avatar');
DEFINE('_KUNENA_SUBFOR', 'Abonnements pour');
DEFINE('_KUNENA_NOSUBS', 'Pas d\'abonnement trouvé pour cet utilisateur');
// Forum Administration (Re-integration from Joomlaboard 1.2)
DEFINE('_KUNENA_BASICS', 'Général');
DEFINE('_KUNENA_BASICSFORUM', 'Information générale du forum');
DEFINE('_KUNENA_PARENT', 'Catégorie parente:');
DEFINE('_KUNENA_PARENTDESC',
    'Note : pour créer une catégorie, Sélectionner \'Catégorie de niveau maxi\' comme parente. Une catégorie sert de conteneur pour les forums.<br>Un forum peut <strong>seulement</strong> être créé dans une catégorie en sélectionnant une catégorie créée au préalable comme parente du forum.<br> Les messages <strong>ne peuvent</strong> être postés dans une catégorie ; seulement dans les forums.');
DEFINE('_KUNENA_BASICSFORUMINFO', 'Nom du forum et description');
DEFINE('_KUNENA_NAMEADD', 'Nom :');
DEFINE('_KUNENA_DESCRIPTIONADD', 'Description :');
DEFINE('_KUNENA_ADVANCEDDESC', 'Configuration avancée du forum');
DEFINE('_KUNENA_ADVANCEDDESCINFO', 'Accès et sécurité du forum');
DEFINE('_KUNENA_LOCKEDDESC', 'Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez verrouiller l\'accès du forum. Personne ne pourra alors créer de nouveau sujet ou messages (ou les déplacer) sauf les administrateurs et les modérateurs.');
DEFINE('_KUNENA_LOCKED1', 'Verrouillé :');
DEFINE('_KUNENA_PUBACC', 'Niveau d\'accès public :');
DEFINE('_KUNENA_PUBACCDESC',
    'Pour créer un forum non-public vous pouvez ici spécifier le niveau d\'utilisateur minimal pour accéder au forum. Par défaut le niveau d\'utilisateur est sur "Tous".<br><b>Note</b>: Si vous restreignez l\'accès sur une catégorie entière pour un ou plusieurs groupes, cela cachera tous les forums contenus à  toute personne n\'ayant pas les privilèges nécessaires sur la catégorie <b>même</b> si un ou plusieurs de ses forums ont un niveau d\'accès inférieur ! Ceci bloque aussi les modérateurs ; vous devrez ajouter a modérateur à  la liste de modérateurs de la catégorie si il n\'appartient pas au groupe de niveau d\'accès suffisant pour voir la catégorie.<br> Ceci ne respecte pas le fait que es catégories ne peuvent être modérées ; les modérateurs peuvent tout de même être ajoutés à  la liste des modérateurs..');
DEFINE('_KUNENA_CGROUPS', 'Inclure les sous-groupes ?');
DEFINE('_KUNENA_CGROUPSDESC', 'Sélectionner <font color=#339933><b>Oui</b></font> pour que l\'accès au forum soit restreint au groupe sélectionné <b>seulement</b>. Les sous-groupes dans ce cas n\'auront pas l\'accès au forum');
DEFINE('_KUNENA_ADMINLEVEL', 'Niveau d\'accès administrateur:');
DEFINE('_KUNENA_ADMINLEVELDESC',
    'Si vous créez un forum avec des restrictions d\'accès au public, vous pouvez spécifier ici d\'autres niveau d\'accès de modération.<br> Si vous restreignez l\'accès au forum à  un groupe de niveau d\'accès public spécial et ne spécifiez pas un groupe de niveau d\'accès administrateur ici, les administrateurs ne pourront pas accéder au forum.');
DEFINE('_KUNENA_ADVANCED', 'Avancé');
DEFINE('_KUNENA_CGROUPS1', 'Inclure les sous-groupes ?');
DEFINE('_KUNENA_CGROUPS1DESC', 'Sélectionner <font color=#339933><b>Oui</b></font> Pour que l\'accès au forum soit restreint au groupe sélectionné <b>seulement</b>. Les sous-groupes dans ce cas n\'auront pas l\'accès au forum');
DEFINE('_KUNENA_REV', 'Valider les messages ?');
DEFINE('_KUNENA_REVDESC',
    'Si vous voulez que les messages soient vérifiés et validés par un modérateur avant d\'être publiés. Ce n\'est utile que dans le cas d\'un forum modéré!<br>Si vous activez cette option sans avoir assigné de modérateurs, l\'administrateur du site sera seul responsable de l\'approbation ou non de tous les messages qui resteront \'en attente\' !');
DEFINE('_KUNENA_MOD_NEW', 'Modération');
DEFINE('_KUNENA_MODNEWDESC', 'La modération du forum et les modérateurs de forum');
DEFINE('_KUNENA_MOD', 'Modérés :');
DEFINE('_KUNENA_MODDESC',
    'Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez pouvoir assigner des modérateurs au forum.<br><strong>Note :</strong> Ceci n\'implique pas que les messages devront être approuvés par des modérateurs pour être affichés !<br> Il faudra pour cela activer l\'option "Révision" dans l\'onglet Avancés.<br><br> <strong>Note :</strong> Après avoir activé la modération du forum vous devez d\'abord sauver la configuration du forum pour pouvoir ajouter des modérateurs en utilisant le nouveau bouton.');
DEFINE('_KUNENA_MODHEADER', 'Paramètres de modération pour ce forum');
DEFINE('_KUNENA_MODSASSIGNED', 'Modérateurs assignés dans ce forum :');
DEFINE('_KUNENA_NOMODS', 'Aucun modérateur n\'a été assigné dans ce forum');
// Some General Strings (Improvement in Kunena)
DEFINE('_KUNENA_EDIT', 'Editer');
DEFINE('_KUNENA_ADD', 'Ajouter');
// Reorder (Re-integration from Joomlaboard 1.2)
DEFINE('_KUNENA_MOVEUP', 'Monter');
DEFINE('_KUNENA_MOVEDOWN', 'Descendre');
// Groups - Integration in Kunena
DEFINE('_KUNENA_ALLREGISTERED', 'Tous les utilisateurs enregistrés');
DEFINE('_KUNENA_EVERYBODY', 'Tous');
// Removal of hardcoded strings in admin panel (Re-integration from Joomlaboard 1.2)
DEFINE('_KUNENA_REORDER', 'Réorganiser');
DEFINE('_KUNENA_CHECKEDOUT', 'Vérifier');
DEFINE('_KUNENA_ADMINACCESS', 'Accès administrateur');
DEFINE('_KUNENA_PUBLICACCESS', 'Accès public');
DEFINE('_KUNENA_PUBLISHED', 'Publié');
DEFINE('_KUNENA_REVIEW', 'Vérification');
DEFINE('_KUNENA_MODERATED', 'Modéré');
DEFINE('_KUNENA_LOCKED', 'Verrouillé');
DEFINE('_KUNENA_CATFOR', 'Catégorie / Forum');
DEFINE('_KUNENA_ADMIN', 'Administration de Kunena');
DEFINE('_KUNENA_CP', 'Panneau de contrôle de Kunena');
// Configuration page - Headings (Re-integrated from Joomlaboard 1.2)
DEFINE('_COM_A_AVATAR_INTEGRATION', 'Avatars');
DEFINE('_COM_A_RANKS_SETTINGS', 'Rangs');
DEFINE('_COM_A_RANKING_SETTINGS', 'Paramètres des rangs');
DEFINE('_COM_A_AVATAR_SETTINGS', 'Paramètres des avatars');
DEFINE('_COM_A_SECURITY_SETTINGS', 'Paramètres de sécurité');
DEFINE('_COM_A_BASIC_SETTINGS', 'Paramètres généraux');
// Kunena 1.0.0
//
DEFINE('_COM_A_FAVORITES','Activer les favoris ?');
DEFINE('_COM_A_FAVORITES_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez autoriser les utilisateurs enregistrés à  ajouter des sujets à  la rubrique favoris de leurs profils' );
DEFINE('_USER_UNFAVORITE_ALL','Cochez cette case pour supprimer tous les favoris (y compris ceux cachés pour le debugger)');
DEFINE('_VIEW_FAVORITETXT','Ajouter ce sujet aux favoris ');
DEFINE('_USER_UNFAVORITE_YES','Ce sujet a été enlevé de vos favoris');
DEFINE('_POST_FAVORITED_TOPIC','Le sujet a été ajouté à  vos favoris.');
DEFINE('_VIEW_UNFAVORITETXT','Enlever des favoris');
DEFINE('_VIEW_UNSUBSCRIBETXT','Résilier');
DEFINE('_USER_NOFAVORITES','Pas de favoris');
DEFINE('_POST_SUCCESS_FAVORITE','Le sujet a été ajouté aux favoris');
DEFINE('_COM_A_MESSAGES_SEARCH','Recherchez des résultats');
DEFINE('_COM_A_MESSAGES_DESC_SEARCH','Messages par page dans les résultats');
DEFINE('_KUNENA_USE_JOOMLA_STYLE','Utiliser le template de Joomla');
DEFINE('_KUNENA_USE_JOOMLA_STYLE_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez utiliser le template de Joomla.<br><u>Exemple :</u> avec des classes comme : <font color=#808080><em>sectionheader, sectionentry1</em></font>');
DEFINE('_KUNENA_SHOW_CHILD_CATEGORY_ON_LIST','Afficher icône pour les sous-catégories');
DEFINE('_KUNENA_SHOW_CHILD_CATEGORY_ON_LIST_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez afficher une notification de nouveaux messages pour les sous-catégories de votre forum');
DEFINE('_KUNENA_SHOW_ANNOUNCEMENT','Afficher annonces');
DEFINE('_KUNENA_SHOW_ANNOUNCEMENT_DESC','Sélectionner <font color=#339933><b>Oui</b></font>, si vous voulez afficher une annonce en page d\'accueil du forum.');
DEFINE('_KUNENA_SHOW_AVATAR_ON_CAT', 'Afficher les avatars sur la vue des Catégories, Discussions récentes et Mes sujets?');
DEFINE('_KUNENA_SHOW_AVATAR_ON_CAT_DESC', 'Sélectionner <font color=#339933><b>Oui</b></font> si vous souhaitez afficher les avatars des utilisteurs sur la vue des Catégories, Discussions récentes et Mes sujets.');DEFINE('_KUNENA_RECENT_POSTS','Paramètres des messages récents');
DEFINE('_KUNENA_RECENT_POSTS', 'Paramètres des messages récents');//
DEFINE('_KUNENA_SHOW_LATEST_MESSAGES','Afficher les messages récents');
DEFINE('_KUNENA_SHOW_LATEST_MESSAGES_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher le plugin des messages récents sur le forum');
DEFINE('_KUNENA_NUMBER_OF_LATEST_MESSAGES','Nombre de messages récents');
DEFINE('_KUNENA_NUMBER_OF_LATEST_MESSAGES_DESC','Définir le nombre de messages récents à afficher');
DEFINE('_KUNENA_COUNT_PER_PAGE_LATEST_MESSAGES','Nombre de messages par onglet');
DEFINE('_KUNENA_COUNT_PER_PAGE_LATEST_MESSAGES_DESC','Définir le nombre de messages à afficher par onglet');
DEFINE('_KUNENA_LATEST_CATEGORY','Afficher une catégorie');
DEFINE('_KUNENA_LATEST_CATEGORY_DESC','Choisir la ou les catégories spécifiques que vous souhaitez afficher les messages récents.<br><u>Exemple:</u> 2,3,7   <b>Note : </b>Laisser ce champ vide pour afficher toutes les catégories.');
DEFINE('_KUNENA_SHOW_LATEST_SINGLE_SUBJECT','Afficher seulement le sujet'); 
DEFINE('_KUNENA_SHOW_LATEST_SINGLE_SUBJECT_DESC','N\'affiche que le sujet au moment de sa création');
DEFINE('_KUNENA_SHOW_LATEST_REPLY_SUBJECT','Afficher toutes les réponses'); 
DEFINE('_KUNENA_SHOW_LATEST_REPLY_SUBJECT_DESC','Affiche toutes les réponses aux sujets (avec la marque <b><em>Re:</em></b>)'); 
DEFINE('_KUNENA_LATEST_SUBJECT_LENGTH','Longueur du titre d\'un sujet');
DEFINE('_KUNENA_LATEST_SUBJECT_LENGTH_DESC','Définir le nombre de caractères maximum autorisé pour le titre d\'un sujet');
DEFINE('_KUNENA_SHOW_LATEST_DATE','Afficher la date');
DEFINE('_KUNENA_SHOW_LATEST_DATE_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher la date d\'écriture du message');
DEFINE('_KUNENA_SHOW_LATEST_HITS','Afficher le nombre de vues');
DEFINE('_KUNENA_SHOW_LATEST_HITS_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher le nombre de vues de chaque sujet (correspondant au nombre de clics sur chaque sujet)');
DEFINE('_KUNENA_SHOW_AUTHOR','Afficher l\'auteur');
DEFINE('_KUNENA_SHOW_AUTHOR_DESC','<b>1=</b> pseudo, <b>2=</b> nom, <b>0=</b> aucun');
DEFINE('_KUNENA_STATS','Paramètres du plugin statistiques ');
DEFINE('_KUNENA_CATIMAGEPATH','Chemin des images de la catégorie ');
DEFINE('_KUNENA_CATIMAGEPATH_DESC','Chemin des images de la catégorie. Si vous spécifiez <font color=#0000FF><em><b>category_images/</b></em></font> le chemin sera à partir de la racine su site <font color=#0000FF><em><b>/images/fbfiles/category_images</b></em></font> ');
DEFINE('_KUNENA_ANN_MODID','IDs des Modérateurs d\'annonces ');
DEFINE('_KUNENA_ANN_MODID_DESC','Ajoute les <b>id</b> des modérateurs des annonces. ex : 62,63,73. Les modérateurs d\'annonces peuvent ajouter, éditer, effacer les annonces. ');
//
DEFINE('_KUNENA_FORUM_TOP','Saut vers forum :');
DEFINE('_KUNENA_CHILD_BOARDS','Sous-Forum ');
DEFINE('_KUNENA_QUICKMSG','Réponse rapide ');
DEFINE('_KUNENA_THREADS_IN_FORUM','Sujets du Forum ');
DEFINE('_KUNENA_FORUM','Forum ');
DEFINE('_KUNENA_SPOTS','Sujets prioritaires');
DEFINE('_KUNENA_CANCEL','annuler'); 
DEFINE('_KUNENA_TOPIC','SUJET: ');
DEFINE('_KUNENA_POWEREDBY','Développé par ');// Propulser ??
// Time Format
DEFINE('_TIME_TODAY','<b>Aujourd\'hui</b> ');
DEFINE('_TIME_YESTERDAY','<b>Hier</b> ');
//  STARTS HERE!
DEFINE('_KUNENA_WHO_LATEST_POSTS','Derniers messages');
DEFINE('_KUNENA_WHO_WHOISONLINE','Qui est en ligne?');
DEFINE('_KUNENA_WHO_MAINPAGE','Forum principal');
DEFINE('_KUNENA_GUEST','Invité');
DEFINE('_KUNENA_PATHWAY_VIEWING','lecteur(s)');
DEFINE('_KUNENA_ATTACH','Attaché');
// Favorite
DEFINE('_KUNENA_FAVORITE','Favori');
DEFINE('_USER_FAVORITES','Vos favoris');
DEFINE('_THREAD_UNFAVORITE','supprimer des favoris');//enlever/effacer ??
// profilebox
DEFINE('_PROFILEBOX_WELCOME','Bienvenue');
DEFINE('_PROFILEBOX_SHOW_LATEST_POSTS','Afficher les derniers messages');
DEFINE('_PROFILEBOX_SET_MYAVATAR','Choisir un avatar');
DEFINE('_PROFILEBOX_MYPROFILE','Mon profil');
DEFINE('_PROFILEBOX_SHOW_MYPOSTS','Afficher mes messages');
DEFINE('_PROFILEBOX_GUEST','Invité');
DEFINE('_PROFILEBOX_LOGIN','identifier');
DEFINE('_PROFILEBOX_REGISTER','inscrire');
DEFINE('_PROFILEBOX_LOGOUT','Déconnexion');
DEFINE('_PROFILEBOX_LOST_PASSWORD','Mot de passe perdu?');
DEFINE('_PROFILEBOX_PLEASE','Merci de vous ');
DEFINE('_PROFILEBOX_OR','ou de vous ');
// recentposts
DEFINE('_RECENT_RECENT_POSTS','Derniers messages');
DEFINE('_RECENT_TOPICS','Sujet');
DEFINE('_RECENT_AUTHOR','Auteur');
DEFINE('_RECENT_CATEGORIES','Catégories');
DEFINE('_RECENT_DATE','Date');
DEFINE('_RECENT_HITS','Affichages');
// announcement

DEFINE('_ANN_ANNOUNCEMENTS', 'Annonces');
DEFINE('_ANN_ID','ID');
DEFINE('_ANN_DATE','Date');
DEFINE('_ANN_TITLE','Titre');
DEFINE('_ANN_SORTTEXT','Texte court');
DEFINE('_ANN_LONGTEXT','Texte Long');
DEFINE('_ANN_ORDER','Ordre');
DEFINE('_ANN_PUBLISH','Publier');
DEFINE('_ANN_PUBLISHED','Publiée');
DEFINE('_ANN_UNPUBLISHED','Dépubliée');
DEFINE('_ANN_EDIT','Editer');
DEFINE('_ANN_DELETE','Effacer');
DEFINE('_ANN_SUCCESS','Réussi'); 
DEFINE('_ANN_SAVE','Sauvegarder');
DEFINE('_ANN_YES','Oui');
DEFINE('_ANN_NO','Non');
DEFINE('_ANN_ADD','Ajouter une annonce'); 
DEFINE('_ANN_SUCCESS_EDIT','Edité avec succès');
DEFINE('_ANN_SUCCESS_ADD','Ajoutée'); 
DEFINE('_ANN_DELETED','Effacement réussi');
DEFINE('_ANN_ERROR','ERREUR');
DEFINE('_ANN_READMORE','En savoir plus...');
DEFINE('_ANN_CPANEL','Panneau de contrôle des annonces');
DEFINE('_ANN_SHOWDATE','Afficher date');
// Stats
DEFINE('_STAT_FORUMSTATS',' : Statistiques');
DEFINE('_STAT_GENERAL_STATS','Statistiques générales');
DEFINE('_STAT_TOTAL_USERS','Nombre total d\'utilisateurs');
DEFINE('_STAT_LATEST_MEMBERS','Dernier inscrit');
DEFINE('_STAT_PROFILE_INFO','Voir le profil');
DEFINE('_STAT_TOTAL_MESSAGES','Nombre total de messages');
DEFINE('_STAT_TOTAL_SUBJECTS','Sujets');
DEFINE('_STAT_TOTAL_CATEGORIES','Catégories');
DEFINE('_STAT_TOTAL_SECTIONS','Sections');
DEFINE('_STAT_TODAY_OPEN_THREAD','Sujets ouverts aujourd\'hui');
DEFINE('_STAT_YESTERDAY_OPEN_THREAD','Hier');
DEFINE('_STAT_TODAY_TOTAL_ANSWER','Nombre de réponses aujourd\'hui');
DEFINE('_STAT_YESTERDAY_TOTAL_ANSWER','Hier');
DEFINE('_STAT_VIEW_RECENT_POSTS_ON_FORUM','Afficher les messages récents');
DEFINE('_STAT_MORE_ABOUT_STATS','Plus d\'infos sur les statistiques');
DEFINE('_STAT_USERLIST','Liste des utilisateurs');
DEFINE('_STAT_TEAMLIST','Equipe du forum');
DEFINE('_STATS_FORUM_STATS',' : Statistiques');
DEFINE('_STAT_POPULAR','Les + populaires :');
DEFINE('_STAT_POPULAR_USER_TMSG','utilisateurs (nombre total de messages) ');
DEFINE('_STAT_POPULAR_USER_KGSG','sujets');
DEFINE('_STAT_POPULAR_USER_GSG','utilisateurs (nombre d\'affichage de ce profil) ');
//Team List
DEFINE('_MODLIST_ONLINE','Personne n\'est connecté');
DEFINE('_MODLIST_OFFLINE','Personne n\'est hors ligne');
// Whoisonline
DEFINE('_WHO_WHOIS_ONLINE','Qui est en ligne');
DEFINE('_WHO_ONLINE_NOW','En ligne :');
DEFINE('_WHO_ONLINE_MEMBERS','Membre(s)');
DEFINE('_WHO_AND','et');
DEFINE('_WHO_ONLINE_GUESTS','Invité(s)');
DEFINE('_WHO_ONLINE_USER','Utilisateur');
DEFINE('_WHO_ONLINE_TIME','Temps');
DEFINE('_WHO_ONLINE_FUNC','Action');
// Userlist
DEFINE('_USRL_USERLIST','Liste des utilisateurs');
DEFINE('_USRL_REGISTERED_USERS','%s c\'est <b>%d</b> utilisateurs enregistrés');
DEFINE('_USRL_SEARCH_ALERT','SVP veuillez entrer une valeur pour rechercher!');
DEFINE('_USRL_SEARCH','Trouver l\'utilisateur');
DEFINE('_USRL_SEARCH_BUTTON','Recherche');
DEFINE('_USRL_LIST_ALL','Lister tous'); 
DEFINE('_USRL_NAME','Nom');
DEFINE('_USRL_USERNAME','Pseudonyme');
DEFINE('_USRL_EMAIL','E-mail');
DEFINE('_USRL_USERTYPE','Type d\'utilisateur');
DEFINE('_USRL_JOIN_DATE','Date d\'arrivée');
DEFINE('_USRL_LAST_LOGIN','Dernier arrivé');
DEFINE('_USRL_NEVER','Jamais');
DEFINE('_USRL_BLOCK','Statut');
DEFINE('_USRL_MYPMS2','MyPMS');
DEFINE('_USRL_ASC','Ordre Croissant');
DEFINE('_USRL_DESC','Ordre Décroissant');
DEFINE('_USRL_DATE_FORMAT','%d/%m/%Y');
DEFINE('_USRL_TIME_FORMAT','%H:%M');
DEFINE('_USRL_USEREXTENDED','Détails');
DEFINE('_USRL_COMPROFILER','Profil');
DEFINE('_USRL_THUMBNAIL','Image');
DEFINE('_USRL_READON','Afficher');
DEFINE('_USRL_MYPMSPRO', 'Clexus PM');
DEFINE('_USRL_MYPMSPRO_SENDPM','Envoyer PM');
DEFINE('_USRL_JIM','PM');
DEFINE('_USRL_UDDEIM','PM');
DEFINE('_USRL_SEARCHRESULT','Résultat de recherche pour');
DEFINE('_USRL_STATUS','Statut');
DEFINE('_USRL_LISTSETTINGS','Paramètres de la liste des utilisateurs');
DEFINE('_USRL_ERROR','Erreur');

//changed in 1.1.4 stable
DEFINE('_COM_A_PMS_TITLE','Composant de messagerie privée');
DEFINE('_COM_A_COMBUILDER_TITLE','<b>Community Builder</b>');
DEFINE('_FORUM_SEARCH','Chercher: %s');
DEFINE('_MODERATION_DELETE_MESSAGE','êtes-vous sûr de vouloir supprimer ce message ? NOTE: Il n\'y a aucune possibilité de récupérer des messages supprimés!');
DEFINE('_MODERATION_DELETE_SUCCESS','Le(s) message(s) a été supprimé');
DEFINE('_COM_A_RANKING','Classement');
DEFINE('_COM_A_BOT_REFERENCE','Voir les id des catégories du forum');
DEFINE('_COM_A_MOSBOT','Activer le plugin discussbot');
DEFINE('_PREVIEW','Prévisualiser'); 
DEFINE('_COM_A_MOSBOT_TITLE','Discussbot');
DEFINE('_COM_A_MOSBOT_DESC','Le plugin  (discussbot) permet aux utilisateurs de discuter des articles dans le forum. Le titre de l\'article est utilisé comme titre de sujet dans le forum.'
.'<br>Si le sujet n\'existe pas encore dans le forum, il est créé automatiquement. Si le sujet existe déjà , le sujet est affiché à  l\'utilisateur pour qu\il puisse y répondre.'
.'<br><br><font color=#0000FF><b>Vous devrez télécharger et installer le plugin séparément.</b></font>'
.'<br>Vérifiez sur le site <a href=http://extensions.joomla.org/extensions/extension-specific/kunena-forum-extensions target="_blank">Extensions.joomla.org</a> pour plus d\'informations.'
.'<br><br>Une fois installé vous devez insérer un tag dans les lignes dans vos articles du type :'
.'<font color=#808080><em>{mos_fb_discuss:catid}</em></font>'
.'<br><br>Le <em>catid</em> est l\'id de catégorie du forum dans laquelle l\'article doit être discuté. Pour trouver le bon catid, allez simplement dans le forum voulu'
.'<br>Vous trouverez le catid dans la barre d\'adresse de votre navigateur.'
.'<br><br><u>Exemple :</u> Si vous voulez que l\'article soit discuté dans le catid 26, le tag à insérer se présentera sous la forme : <font color=#808080><em>{mos_fb_discuss:26}</em></font>'
.'<br>Cela semble un peu difficile, mais cela permet de classer chaque article dans le forum approprié.');
//new in 1.1.4 stable
// search.class.php
DEFINE('_FORUM_SEARCHTITLE','Chercher');
DEFINE('_FORUM_SEARCHRESULTS','afficher %s les %s résultats.');
// Help, FAQ
DEFINE('_COM_FORUM_HELP','Aide');
// rules.php
DEFINE('_COM_FORUM_RULES','Règles');
DEFINE('_COM_FORUM_RULES_DESC','<h3 class="contentheading">Règles du forum</h3><ul><li>Editez ce fichier pour insérer vos règles joomlaroot/administrator/components/com_Kunena/language/french.php</li><li>Règle 1</li><li>Règle 2</li><li>Règle 3</li><li>...</li></ul>');
//smile.class.php
DEFINE('_COM_BOARDCODE', 'Boardcode');
// moderate_messages.php
DEFINE('_MODERATION_APPROVE_SUCCESS','Le(s) message(s) a été approuvé');
DEFINE('_MODERATION_DELETE_ERROR','ERREUR: Le(s) message(s) ne pourra pas être supprimé');
DEFINE('_MODERATION_APPROVE_ERROR','ERREUR: Le(s) message(s) ne pourra pas être approuvé');
// listcat.php
DEFINE('_GEN_NOFORUMS','Il n\' y a aucun forum dans cette catégorie!');
//new in 1.1.3 stable
DEFINE('_POST_GHOST_FAILED','La création du sujet fantôme dans l\'ancien forum a échoué!');
DEFINE('_POST_MOVE_GHOST','Laisser le message fantôme dans l\'ancien forum');
//new in 1.1 Stable
DEFINE('_GEN_FORUM_JUMP','Saut forum');
DEFINE('_COM_A_FORUM_JUMP','Activer saut forum');
DEFINE('_COM_A_FORUM_JUMP_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez afficher un sélecteur sur la page du forum permettant un saut rapide vers un autre forum ou une autre catégorie.');
//new in 1.1 RC1
DEFINE('_GEN_RULES','Règles');
DEFINE('_COM_A_RULESPAGE','Activer la page des règles');
DEFINE('_COM_A_RULESPAGE_DESC',
'Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez afficher un lien dans votre menu principal qui pointera vers la page des règles. Cette page peut être utilisée afin d\'expliquer les règles de votre forum. <em>Prenez soin d\'avoir toujours une sauvegarde de ce fichier avant toute modification</em>');
DEFINE('_MOVED_TOPIC','Déplacé :');
DEFINE('_COM_A_PDF','Activer la création de PDF');
DEFINE('_COM_A_PDF_DESC',
'Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez autoriser les utilisateurs à  télécharger sous format PDF le contenu des sujets.<br><br>C\'est un <u>simple</u> document PDF ; pas de marqueurs, pas d\'images ou autre, mais il contiendra tout le texte du message.');
DEFINE('_GEN_PDFA','Cliquez sur ce bouton pour créer un document PDF à  partir de ce sujet.');
DEFINE('_GEN_PDF','Convertir en PDF');
//new in 1.0.4 stable
DEFINE('_VIEW_PROFILE','Cliquez ici pour consulter le profil de cet utilisateur');
DEFINE('_VIEW_ADDBUDDY','Cliquez ici pour ajouter cet utilisateur à  votre liste d\'amis');
DEFINE('_POST_SUCCESS_POSTED','Votre message a été posté avec succès');
DEFINE('_POST_SUCCESS_VIEW','Cliquez ici pour retourner au message ');
DEFINE('_POST_SUCCESS_FORUM','Cliquez ici pour retourner au forum ');
DEFINE('_RANK_ADMINISTRATOR','Administrateur');
DEFINE('_RANK_MODERATOR','Modérateur');
DEFINE('_SHOW_LASTVISIT','Depuis la dernière visite');
DEFINE('_COM_A_BADWORDS_TITLE','Filtrage des mots grossiers');
DEFINE('_COM_A_BADWORDS','Utiliser le filtrage des mots grossiers');
DEFINE('_COM_A_BADWORDS_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez filtrer les messages contenant des mots définis dans la configuration du composant Badword. Pour utiliser cette fonction vous devez avoir le composant Badword installé!');
DEFINE('_COM_A_BADWORDS_NOTICE','* Ce message a été censuré car il contient un ou plusieurs mots interdits par l\'administrateur *');
DEFINE('_COM_A_AVATAR_SRC','Utiliser l\'avatar de');
DEFINE('_COM_A_AVATAR_SRC_DESC',
'Si vous avez <b>Jomsocial</b>, <b><b>MyPMS Pro</b></b>fessional ou le composant <b><b>Community Builder</b></b> installé, vous pouvez configurer le forum pour utiliser les images d\'avatar des utilisateurs <b><b>MyPMS Pro</b></b> ou <b><b>Community Builder</b></b> profil utilisateur.');
DEFINE('_COM_A_KARMA','Montrer l\'indicateur de Karma');
DEFINE('_COM_A_KARMA_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher le Karma des utilisateurs et les boutons en rapport (augmenter / diminuer) si les statistiques utilisateur sont activées.');
DEFINE('_COM_A_DISEMOTICONS','Enlever les emoticônes');
DEFINE('_COM_A_DISEMOTICONS_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour enlever complètement les émoticônes (smileys).');
DEFINE('_COM_C_FBCONFIG','Configuration du Forum');
DEFINE('_COM_C_FBCONFIGDESC','Configurer toutes les fonctionnalités du forum');
DEFINE('_COM_C_FORUM','Administration<br> du Forum');
DEFINE('_COM_C_FORUMDESC','Ajouter des catégories/forums et les configurer');
DEFINE('_COM_C_USER','Administration<br>des utilisateurs');
DEFINE('_COM_C_USERDESC','Administration des profils des utilisateurs');
DEFINE('_COM_C_FILES','Explorer<br>les fichiers');
DEFINE('_COM_C_FILESDESC','Parcourir et administrer les fichiers téléchargés');
DEFINE('_COM_C_IMAGES','Explorer<br>les images');
DEFINE('_COM_C_IMAGESDESC','Parcourir et administrer les images téléchargées');
DEFINE('_COM_C_CSS','Editer<br>le fichier CSS');
DEFINE('_COM_C_CSSDESC','Apparence du Tweak');
DEFINE('_COM_C_SUPPORT','Site web<br>de support');
DEFINE('_COM_C_SUPPORTDESC','Se connecter au site (nouvelle fenêtre)');
DEFINE('_COM_C_PRUNETAB','Nettoyer<br>des forums');
DEFINE('_COM_C_PRUNETABDESC','Supprimer des vieux sujets sans suite (configurable)');
DEFINE('_COM_C_PRUNEUSERS','Supprimer<br>des utilisateurs');
DEFINE('_COM_C_PRUNEUSERSDESC','Mettre à  jour la liste d\'utilisateurs du forum en la comparant avec la liste d\'utilisateur Joomla');
DEFINE('_COM_C_LOADMODPOS','Charger les positions de module');
DEFINE('_COM_C_LOADMODPOSDESC','Charger les positions de module pour le template Kunena');
DEFINE('_COM_C_UPGRADEDESC','Met à  jour votre base de données avec la dernière version après une mise à  jour de Kunena');
DEFINE('_COM_C_BACK','Retour au panneau de contrôle Kunena');
DEFINE('_SHOW_LAST_SINCE','Sujets actifs depuis la dernière visite sur:');
DEFINE('_POST_SUCCESS_REQUEST2','Votre demande a été prise en compte');
DEFINE('_POST_NO_PUBACCESS3','Cliquez ici pour vous enregistrer.');
//==================================================================================================
//Changed in 1.0.4
//please update your local language file with these changes as well
DEFINE('_POST_SUCCESS_DELETE','Le message a été correctement supprimé.');
DEFINE('_POST_SUCCESS_EDIT','Le message a été correctement édité.'); 
DEFINE('_POST_SUCCESS_MOVE','Le sujet a été correctement déplacé.');
DEFINE('_POST_SUCCESS_POST','Votre message a été posté avec succès.');
DEFINE('_POST_SUCCESS_SUBSCRIBE','Votre abonnement a été validé.');
//==================================================================================================
//new in 1.0.3 stable
//Karma
DEFINE('_KARMA','Karma');
DEFINE('_KARMA_SMITE','Huer');
DEFINE('_KARMA_APPLAUD','Applaudir');
DEFINE('_KARMA_BACK','Pour retourner au sujet,');
DEFINE('_KARMA_WAIT','Vous pouvez modifier le karma d\'une personne seulement une fois toutes les 6 heures. <br>Merci d\'attendre que ce délai soit écoulé avant de modifier à  nouveau un quelconque karma');
DEFINE('_KARMA_SELF_DECREASE','Ne tentez pas de diminuer votre propre karma!');
DEFINE('_KARMA_SELF_INCREASE','Votre karma a été diminué pour avoir tenté de l\'augmenter vous-même!');
DEFINE('_KARMA_DECREASED','Le Karma de l\'utilisateur a été diminué. Si vous n\'êtes pas redirigé vers le sujet dans quelques instants,');
DEFINE('_KARMA_INCREASED','Le Karma de l\'utilisateur a été augmenté. Si vous n\'êtes pas redirigé vers sujet dans quelques instants,');
DEFINE('_COM_A_TEMPLATE','Template');
DEFINE('_COM_A_TEMPLATE_DESC','Choisir le template à utiliser');
DEFINE('_COM_A_TEMPLATE_IMAGE_PATH','Boutons du template ');
DEFINE('_COM_A_TEMPLATE_IMAGE_PATH_DESC','Choisir le template dont vous voulez utiliser les boutons');
DEFINE('_PREVIEW_CLOSE', 'Close this window');//
//==========================================
//new in 1.0 Stable
DEFINE('_COM_A_POSTSTATSBAR','Utiliser la barre de statistiques des messages');
DEFINE('_COM_A_POSTSTATSBAR_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez que le nombre de messages faits par un utilisateur soit illustré graphiquement dans la barre de statistiques.');
DEFINE('_COM_A_POSTSTATSCOLOR','Correspondance des couleurs pour la barre de statistiques');
DEFINE('_COM_A_POSTSTATSCOLOR_DESC','Indiquez le numéro de la couleur que vous voulez utiliser dans la barre de statistiques des messages');
DEFINE('_LATEST_REDIRECT',
'Le forum a besoin de rétablir vos droits d\'accès avant de pouvoir vous créer une liste des derniers messages postés.\nPas d\'inquiétude, c\'est normal après plus de 30 minutes d\'inactivité ou après une déconnexion.\nS\'il vous plait soumettez à  nouveau votre demande de recherche.');
DEFINE('_SMILE_COLOUR','Couleur');
DEFINE('_SMILE_SIZE','Taille');
DEFINE('_COLOUR_DEFAULT','Standard');
DEFINE('_COLOUR_RED','Rouge');
DEFINE('_COLOUR_PURPLE','Violet');
DEFINE('_COLOUR_BLUE','Bleu');
DEFINE('_COLOUR_GREEN','Vert');
DEFINE('_COLOUR_YELLOW','Jaune');
DEFINE('_COLOUR_ORANGE','Orange');
DEFINE('_COLOUR_DARKBLUE','Bleu foncé');
DEFINE('_COLOUR_BROWN','Marron');
DEFINE('_COLOUR_GOLD','Or');
DEFINE('_COLOUR_SILVER','Argent');
DEFINE('_SIZE_NORMAL','Normal');
DEFINE('_SIZE_SMALL','Petit');
DEFINE('_SIZE_VSMALL','Très petit');
DEFINE('_SIZE_BIG','Grand');
DEFINE('_SIZE_VBIG','Très grand');
DEFINE('_IMAGE_SELECT_FILE','Joindre une image ');
DEFINE('_FILE_SELECT_FILE','Joindre un fichier');
DEFINE('_FILE_NOT_UPLOADED','Votre fichier n\'a pas été téléchargé. Essayez de poster le message à  nouveau ou de le modifier');
DEFINE('_IMAGE_NOT_UPLOADED','Votre image n\'a pas été téléchargée. Essayez de poster le message à  nouveau ou de le modifier');
DEFINE('_BBCODE_IMGPH','Insérer un paramètre [img] dans le message pour une image jointe');
DEFINE('_BBCODE_FILEPH','Insérer un paramètre [file] dans le message pour un fichier joint');
DEFINE('_POST_ATTACH_IMAGE','[img]');
DEFINE('_POST_ATTACH_FILE','[file]');
DEFINE('_USER_UNSUBSCRIBE_ALL','Cochez cette case pour résilier tous les abonnements (y compris ceux cachés pour le debugger)');
DEFINE('_LINK_JS_REMOVED','<em>Un lien actif contenant du JavaScript a été supprimé automatiquement</em>');
//==========================================
//new in 1.0 RC4
DEFINE('_COM_A_LOOKS','Apparence');
DEFINE('_COM_A_USERS','Informations sur l\'utilisateur');
DEFINE('_COM_A_LENGTHS','Paramétrage des longueurs');
DEFINE('_COM_A_SUBJECTLENGTH','Longueur maxi du sujet');
DEFINE('_COM_A_SUBJECTLENGTH_DESC',
'Longueur maximum des lignes du sujet. La valeur maximum supportée par la base de données est de 255 caractères. Si votre site est configuré pour utiliser des jeux de caractères multi-octets tels que <b>Unicode</b>, <b>UTF-8</b> ou non-<b>ISO-8599-x</b> diminuez ce maximum en utilisant la formule:<br><tt>round_down(255/(taille en octets de chaque caractère))</tt><br><br><u>Exemple</u> pour <b>UTF-8</b>, le nombre maximum de caractères doit être divisé par 4, la taille en octets de chaque caractère est donc : 255/4=63');
DEFINE('_LATEST_THREADFORUM','Sujet/Forum');
DEFINE('_LATEST_NUMBER','Nouveaux messages');
DEFINE('_COM_A_SHOWNEW','Montrer les nouveaux messages');
DEFINE('_COM_A_SHOWNEW_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez qu\'apparaisse dans le forum une marque de notification de nouveaux messages');
DEFINE('_COM_A_NEWCHAR','Indicateur de nouveaux messages');
DEFINE('_COM_A_NEWCHAR_DESC','Définir ici ce qui doit être utilisé pour indiquer les nouveaux messages (tel que <b>!</b> ou <b>Nouveau!</b>)');
DEFINE('_LATEST_AUTHOR','Auteur du dernier message');
DEFINE('_GEN_FORUM_NEWPOST','Indique qu\'il y a des nouveaux sujets dans ce forum depuis votre dernière visite');
DEFINE('_GEN_FORUM_NOTNEW','Aucun nouveau message depuis votre dernière visite');
DEFINE('_GEN_UNREAD','Indique qu\'il y a des nouveaux messages non lus sur ce sujet depuis votre dernière visite');
DEFINE('_GEN_NOUNREAD','Pas de nouveau message non lu depuis votre dernière visite');
DEFINE('_GEN_MARK_ALL_FORUMS_READ','Marquer tous les forums comme lus');
DEFINE('_GEN_MARK_THIS_FORUM_READ','Marquer ce forum comme lu');
DEFINE('_GEN_FORUM_MARKED','Tous les messages dans ce forum ont été marqués comme lus');
DEFINE('_GEN_ALL_MARKED','Tous les messages ont été marqués comme lus');
DEFINE('_IMAGE_UPLOAD','Chargement d\'image');
DEFINE('_IMAGE_DIMENSIONS','Votre fichier image doit faire au maximum (largeur x hauteur - taille)');
DEFINE('_IMAGE_ERROR_TYPE','Utilisez seulement des images au format jpeg, gif ou png');
DEFINE('_IMAGE_ERROR_EMPTY','Sélectionnez un fichier avant de le télécharger');
DEFINE('_IMAGE_ERROR_SIZE','La taille du fichier image excède le maximum défini par l\'administrateur.');
DEFINE('_IMAGE_ERROR_WIDTH','La largeur du fichier image excède le maximum défini par l\'administrateur.');
DEFINE('_IMAGE_ERROR_HEIGHT','La hauteur du fichier image excède le maximum défini par l\'administrateur.');
DEFINE('_IMAGE_UPLOADED','Votre image a été téléchargée.');
DEFINE('_COM_A_IMAGE','Images');
DEFINE('_COM_A_IMGHEIGHT','Hauteur maximum des images');
DEFINE('_COM_A_IMGWIDTH','Largeur maximum des images');
DEFINE('_COM_A_IMGSIZE','Taille maximum des fichiers image en <br><em>kilo octets</em>');
DEFINE('_COM_A_IMAGEUPLOAD','Permettre à  tous le téléchargement d\'images');
DEFINE('_COM_A_IMAGEUPLOAD_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez que tout le monde (public) puisse télécharger une image.');
DEFINE('_COM_A_IMAGEREGUPLOAD','Permettre aux <b>membres</b> le téléchargement d\'images');
DEFINE('_COM_A_IMAGEREGUPLOAD_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous souhaitez que les utilisateurs enregistrés et connectés puissent télécharger une image.<br><b>Note :</b> Les (super)administrateurs et modérateurs peuvent toujours télécharger des images.');
//New since preRC4-II:
DEFINE('_COM_A_UPLOADS','Téléchargements');
DEFINE('_FILE_TYPES','Votre fichier peut être de type - max. taille');
DEFINE('_FILE_ERROR_TYPE','Il vous est seulement permis de télécharger des fichiers de type:\n');
DEFINE('_FILE_ERROR_EMPTY','Sélectionnez un fichier avant de télécharger');
DEFINE('_FILE_ERROR_SIZE','La taille du fichier excède le maximum défini par l\'administrateur.');
DEFINE('_COM_A_FILE','Fichiers');
DEFINE('_COM_A_FILEALLOWEDTYPES','Types de fichiers permis');
DEFINE('_COM_A_FILEALLOWEDTYPES_DESC','Spécifier ici quels types de fichiers il est permis de télécharger. Faire une liste en minuscule avec des virgules de séparation et sans espace.<br><u>Exemple:</u> zip,txt,exe,htm,html');
DEFINE('_COM_A_FILESIZE','Taille maximale des fichiers en <br><em>kilo octets</em>');
DEFINE('_COM_A_FILEUPLOAD','Permettre à  tous le téléchargement de fichier');
DEFINE('_COM_A_FILEUPLOAD_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez que tout le monde (public) puisse télécharger un fichier.');
DEFINE('_COM_A_FILEREGUPLOAD','Permettre aux "membres" le téléchargement de fichiers');
DEFINE('_COM_A_FILEREGUPLOAD_DESC','Sélectionner <font color=#339933><b>Oui</b></font> Si vous voulez que les utilisateurs enregistrés et connectés puissent télécharger un fichier.<br><b>Note:</b> Les (super)administrateurs et modérateurs peuvent toujours télécharger des fichiers.');
DEFINE('_SUBMIT_CANCEL','La soumission du message a été annulée');
DEFINE('_HELP_SUBMIT','Cliquez ici pour soumettre votre message');
DEFINE('_HELP_PREVIEW','Cliquez ici pour voir l\'aperçu de votre message');
DEFINE('_HELP_CANCEL','Cliquez ici pour annuler votre message');
DEFINE('_POST_DELETE_ATT','Si cette case est cochée, les images et fichiers attachés aux messages que vous allez supprimer seront aussi supprimés (recommandé).');
//new since preRC4-III
DEFINE('_COM_A_USER_MARKUP','Inclure une marque d\'édition');
DEFINE('_COM_A_USER_MARKUP_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez que soit inséré à  chaque édition de message une marque avec un texte incluant le nom de l\'éditeur et la date/heure.');
DEFINE('_EDIT_BY','Message édité par :');
DEFINE('_EDIT_AT','à  :');
DEFINE('_UPLOAD_ERROR_GENERAL','Une erreur est survenue lors du téléchargement de votre avatar. Veuillez essayer à nouveau ou le signaler à  votre administrateur système');
DEFINE('_COM_A_IMGB_IMG_BROWSE','Explorateur d\'images téléchargées');
DEFINE('_COM_A_IMGB_FILE_BROWSE','Explorateur de fichiers téléchargés');
DEFINE('_COM_A_IMGB_TOTAL_IMG','Nombre d\'images téléchargées');
DEFINE('_COM_A_IMGB_TOTAL_FILES','Nombre de fichiers téléchargés');
DEFINE('_COM_A_IMGB_ENLARGE','Cliquez sur l\'image pour la voir en taille réelle');
DEFINE('_COM_A_IMGB_DOWNLOAD','Cliquez sur le fichier image pour le télécharger');
DEFINE('_COM_A_IMGB_DUMMY_DESC',
'L\'option <b>image de remplacement</b> remplacera l\'image sélectionnée par une image générique.<br> Cela permet de supprimer le fichier courant sans altérer le message.<br><small><em>Notez que parfois un rafraîchissement de l\'explorateur est nécessaire pour voir cette image de remplacement.</em></small>'); 
DEFINE('_COM_A_IMGB_DUMMY','Image de remplacement actuelle'); 
DEFINE('_COM_A_IMGB_REPLACE','Image de remplacement');
DEFINE('_COM_A_IMGB_REMOVE','Supprimer définitivement');
DEFINE('_COM_A_IMGB_NAME','Nom');
DEFINE('_COM_A_IMGB_SIZE','Taille');
DEFINE('_COM_A_IMGB_DIMS','Dimensions');
DEFINE('_COM_A_IMGB_CONFIRM','Etes-vous absolument sûr de vouloir supprimer ce fichier? \n supprimer un fichier donnera un référencement incorrect dans le message...');
DEFINE('_COM_A_IMGB_VIEW','Ouvrir le message (pour édition)');
DEFINE('_COM_A_IMGB_NO_POST','Pas de référencement de message!');
DEFINE('_USER_CHANGE_VIEW','Les changements de paramètres seront effectifs lors de votre prochaine visite du forum.');
DEFINE('_MOSBOT_DISCUSS_A','Discuter de cet article dans les forums. (');
DEFINE('_MOSBOT_DISCUSS_B',' Messages)');
DEFINE('_POST_DISCUSS','Ce sujet traite du contenu de l\'article');
DEFINE('_COM_A_RSS','Activer le suivi RSS');
DEFINE('_COM_A_RSS_DESC','Le suivi RSS permet aux utilisateurs d\'être notifié des derniers messages sur leur PC / Lecteur de flux RSS (voir <a href=http://www.rssreader.com target="_blank">rssreader.com</a> à  titre d\'exemple.)');
DEFINE('_LISTCAT_RSS','Obtenir les derniers messages directement sur votre PC');
DEFINE('_SEARCH_REDIRECT','Le forum a besoin de rétablir vos privilèges d\'accès avant de pouvoir exécuter votre recherche.\nPas d\'inquiétude, c\'est normal après plus de 30 minutes d\'inactivité.\nVeuillez SVP renouveler votre recherche.');
//====================
//admin.forum.html.php
DEFINE('_COM_A_CONFIG','Configuration');
DEFINE('_COM_A_VERSION','Votre version est ');
DEFINE('_COM_A_DISPLAY','Afficher #');
DEFINE('_COM_A_CURRENT_SETTINGS','Paramétrage actuel');
DEFINE('_COM_A_EXPLANATION','Explication');
DEFINE('_COM_A_BOARD_TITLE','Titre général du forum');
DEFINE('_COM_A_BOARD_TITLE_DESC','Le nom de votre forum');
DEFINE('_COM_A_VIEW_TYPE','Type d\'affichage par défaut');
DEFINE('_COM_A_VIEW_TYPE_DESC','Sélectionner entre vue à  plat ou en cascade par défaut');
DEFINE('_COM_A_THREADS','Sujets par page');
DEFINE('_COM_A_THREADS_DESC','Nombre de sujets à  afficher par page');
DEFINE('_COM_A_REGISTERED_ONLY','Membres seulement');
DEFINE('_COM_A_REG_ONLY_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour permettre seulement aux personnes enregistrées d\'utiliser le forum (lire et écrire des message), Sélectionner <font color=#FF0000><b>Non</b></font> pour permettre à  tout visiteur d\'utiliser le forum');
DEFINE('_COM_A_PUBWRITE','Lire/Ecrire pour tous');
DEFINE('_COM_A_PUBWRITE_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour accorder à  tout le monde le droit d\'écriture. Sélectionner <font color=#FF0000><b>Non</b></font> pour permettre à  tout visiteur de visualiser les messages, mais restreindre le droit d\'écriture des messages aux utilisateurs enregistrés.');
DEFINE('_COM_A_USER_EDIT','Edition membres');
DEFINE('_COM_A_USER_EDIT_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour permettre aux utilisateurs enregistrés d\'éditer leurs propres messages.');
DEFINE('_COM_A_MESSAGE','Afin d\'enregistrer les changements ci-dessus, cliquer sur le bouton "Sauver" en haut.');
DEFINE('_COM_A_HISTORY','Afficher l\'historique');
DEFINE('_COM_A_HISTORY_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez que l\'historique d\'un sujet soit affiché lorsqu\'une réponse ou une citation est faite');
DEFINE('_COM_A_SUBSCRIPTIONS','Permettre les abonnements');
DEFINE('_COM_A_SUBSCRIPTIONS_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez permettre aux utilisateurs enregistrés de s\'abonner à  une notification email ; ainsi ils recevront par email des notifications de nouveaux messages sur un sujet');
DEFINE('_COM_A_HISTLIM','Limite de l\'historique');
DEFINE('_COM_A_HISTLIM_DESC','Nombre de messages affichés dans l\'historique');
DEFINE('_COM_A_FLOOD','Protection contre le flood');
DEFINE('_COM_A_FLOOD_DESC','Le nombre de secondes que l\'utilisateur doit attendre entre deux messages consécutifs. Mettre à  0 (zéro) pour désactiver la protection.<br><br><font color=#FF0000><b>Note importante:</b></font> La protection contre le flood peut engendrer une dégradation des performances.');
DEFINE('_COM_A_MODERATION','Emails aux modérateurs');
DEFINE('_COM_A_MODERATION_DESC',
'Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez qu\'un email de notification soit envoyé pour chaque nouveau message au(x) modérateur(s) du forum.<br><br><font color=#FF0000><b>Note importante:</b></font> bien que chaque (super)administrateur ait automatiquement tous les privilèges de modérateur, assignez-les explicitement comme modérateurs sur 
le forum pour qu\'ils reçoivent aussi les emails!');
DEFINE('_COM_A_SHOWMAIL','Affichage email');
DEFINE('_COM_A_SHOWMAIL_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous souhaitez que les adresses emails des utilisateurs soient affichées ; même pour les utilisateurs enregistrés.');
DEFINE('_COM_A_AVATAR','Permettre les avatars');
DEFINE('_COM_A_AVATAR_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez que les utilisateurs enregistrés aient un avatar (gérable par leurs profils).');
DEFINE('_COM_A_AVHEIGHT','Hauteur maximum de l\'avatar');
DEFINE('_COM_A_AVWIDTH','Largeur maximum de l\'avatar');
DEFINE('_COM_A_AVSIZE','Taille maximum de l\'avatar<br><em>en KiloOctets</em>');
DEFINE('_COM_A_USERSTATS','Statistiques utilisateur');
DEFINE('_COM_A_USERSTATS_DESC','Sélectionner <font color=#339933><b>Oui</b></font> pour afficher les statistiques des utilisateurs telles que le nombre de messages postés, le type de l\'utilisateur (Administrateur, Modérateur, etc.).');
DEFINE('_COM_A_AVATARUPLOAD','Télécharger un avatar');
DEFINE('_COM_A_AVATARUPLOAD_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez qu\'un utilisateur enregistré puisse télécharger un avatar.');
DEFINE('_COM_A_AVATARGALLERY','Utiliser la galerie d\'avatars');
DEFINE('_COM_A_AVATARGALLERY_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez qu\'un utilisateur enregistré puisse choisir un avatar dans la galerie que vous mettez à  disposition.<br>(dans le dossier à partir de la racine du site <font color=#0000FF><em><b>/images/fbfiles/avatars/gallery</em></b></font>).');
DEFINE('_COM_A_RANKING_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous souhaitez montrer le rang des utilisateurs enregistrés, basé sur le nombre de messages qu\'ils ont posté.<br><strong>Notez que vous devez au préalable activer les statistiques de l\'utilisateur.</strong>');
DEFINE('_COM_A_RANKINGIMAGES','Rangs en images');
DEFINE('_COM_A_RANKINGIMAGES_DESC',
'Sélectionner <font color=#339933><b>Oui</b></font> si vous souhaitez montrer en images les rangs des utilisateurs enregistrés (dans le dossier <font color=#0000FF><em><b>/components/com_kunena/template/default_ex/images/french/ranks</b></em></font>). Si cette fonction est désactivée les rangs seront affichés en mode texte. ');DEFINE('_COM_A_RANK1','Rang 1');

//email and stuff
$_COM_A_NOTIFICATION = "Notification de nouveau message du Forum ";
$_COM_A_NOTIFICATION1 = "Un nouveau message a été posté sur un sujet auquel vous avez souscrit sur le ";
$_COM_A_NOTIFICATION2 = "Vous pouvez administrer vos abonnements en cliquant sur l\'onglet Mon profil après vous être identifié sur le site. A partir de votre profil, vous pouvez également vous désabonner.";
$_COM_A_NOTIFICATION3 = "Cet email de notification a été généré automatiquement. Merci de ne pas y répondre.";
$_COM_A_NOT_MOD1 = "Un nouveau message a été posté dans un forum où vous avez le statut de modérateur sur le ";
$_COM_A_NOT_MOD2 = "Merci de le consulter après votre connexion sur le site.";
DEFINE('_COM_A_NO','Non');
DEFINE('_COM_A_YES','Oui');
DEFINE('_COM_A_FLAT','Plat');
DEFINE('_COM_A_THREADED','En cascade');
DEFINE('_COM_A_MESSAGES','Messages par page');
DEFINE('_COM_A_MESSAGES_DESC','Nombre de messages à  afficher par page');
//admin; changes from 0.9 to 0.9.1
DEFINE('_COM_A_USERNAME','Nom d\'utilisateur');
DEFINE('_COM_A_USERNAME_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez que le nom d\'utilisateur (login) soit utilisé à  la place du nom réel des utilisateurs.');
DEFINE('_COM_A_CHANGENAME','Autoriser le changement de nom');
DEFINE('_COM_A_CHANGENAME_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez que les utilisateurs enregistrés puissent changer leur nom quand ils écrivent un message. Si vous mettez <font color=#FF0000><b>Non</b></font> alors les utilisateurs enregistrés ne pourront pas éditer leurs noms.');
//admin; changes 0.9.1 to 0.9.2
DEFINE('_COM_A_BOARD_OFFLINE','Forum hors ligne');
DEFINE('_COM_A_BOARD_OFFLINE_DESC','Sélectionner <font color=#339933><b>Oui</b></font> si vous voulez mettre le forum hors ligne. Le forum restera consultable par les (super) administrateurs.');
DEFINE('_COM_A_BOARD_OFFLINE_MES','Message forum hors ligne'); 
DEFINE('_COM_A_PRUNE','Nettoyer des forums');
DEFINE('_COM_A_PRUNE_NAME','Forum à  nettoyer:');
DEFINE('_COM_A_PRUNE_DESC',
'La fonction de nettoyage des forums permet de supprimer les sujets sans nouveau message pendant un nombre de jours spécifié. Ceci ne supprime pas les sujets agrafés ou explicitement verrouillés ; Ceux-ci doivent être supprimés manuellement. Les sujets des forums verrouillés ne peuvent pas être nettoyés.');
DEFINE('_COM_A_PRUNE_NOPOSTS','Supprimer les sujets sans messages pour la période écoulée de ');
DEFINE('_COM_A_PRUNE_DAYS','jours');
DEFINE('_COM_A_PRUNE_USERS','Utilisateurs à supprimer');
DEFINE('_COM_A_PRUNE_USERS_DESC',
'Cette fonction vous permet de mettre à  jour votre liste d\'utilisateurs en la comparant à  la liste d\'utilisateurs du site. Ceci supprimera tous les profils des utilisateurs du forum qui ont été supprimés dans Joomla!.<br>Quand vous êtes sûr de vouloir continuer, cliquez <b>Commencer le nettoyage</b> dans la barre de menu ci-dessus.');
//general
DEFINE('_GEN_ACTION','Action');
DEFINE('_GEN_AUTHOR','Auteur');
DEFINE('_GEN_BY','par');
DEFINE('_GEN_POSTEDBY', 'Posté par');
DEFINE('_GEN_CANCEL','Annuler'); 
DEFINE('_GEN_CONTINUE','Confirmer'); 
DEFINE('_GEN_DATE','Date');
DEFINE('_GEN_DELETE','supprimer');
DEFINE('_GEN_EDIT','éditer');
DEFINE('_GEN_EMAIL','email');
DEFINE('_GEN_EMOTICONS','Emoticônes'); 
DEFINE('_GEN_FLAT','Plat');
DEFINE('_GEN_FLAT_VIEW','vue à  plat');
DEFINE('_GEN_FORUMLIST','Accueil');
DEFINE('_GEN_FORUM','Forum');
DEFINE('_GEN_HELP','Aide');
DEFINE('_GEN_HITS','Vues');
DEFINE('_GEN_LAST_POST','Dernier message');
DEFINE('_GEN_LATEST_POSTS', 'Afficher les derniers messages');
DEFINE('_GEN_LOCK','verrouiller');
DEFINE('_GEN_UNLOCK','déverrouiller');
DEFINE('_GEN_LOCKED_FORUM','signifie que ce forum est verrouillé; pas de nouveaux messages possibles.');
DEFINE('_GEN_LOCKED_TOPIC','signifie que ce sujet est verrouillé; pas de nouveaux messages possibles.');
DEFINE('_GEN_MESSAGE','Message');
DEFINE('_GEN_MODERATED','Signifie que ce forum est modéré, les nouveaux messages sont examinés avant la publication.');
DEFINE('_GEN_MODERATORS','Modérateur');
DEFINE('_GEN_MOVE','Déplacer'); 
DEFINE('_GEN_NAME','Nom');
DEFINE('_GEN_POST_NEW_TOPIC','Nouveau sujet');
DEFINE('_GEN_POST_REPLY','Répondre');
DEFINE('_GEN_MYPROFILE','Mon profil');
DEFINE('_GEN_QUOTE','Citer');
DEFINE('_GEN_REPLY','Répondre');
DEFINE('_GEN_REPLIES','Réponses');
DEFINE('_GEN_THREADED','En cascade');
DEFINE('_GEN_THREADED_VIEW','vue en cascade');
DEFINE('_GEN_SIGNATURE','Signature');
DEFINE('_GEN_ISSTICKY','Signifie que ce sujet est épinglé.');
DEFINE('_GEN_STICKY','Epingler');
DEFINE('_GEN_UNSTICKY','Enlever l\'Epingle');
DEFINE('_GEN_SUBJECT','Sujet');
DEFINE('_GEN_SUBMIT','Soumettre');
DEFINE('_GEN_TOPIC','Sujets');
DEFINE('_GEN_TOPICS','Sujets');
DEFINE('_GEN_TOPIC_ICON','Icône');
DEFINE('_GEN_SEARCH_BOX','Recherche');
$_GEN_THREADED_VIEW="vue en cascade";
$_GEN_FLAT_VIEW    ="vue à  plat";
//avatar_upload.php
DEFINE('_UPLOAD_UPLOAD','Télécharger');
DEFINE('_UPLOAD_DIMENSIONS','Votre fichier image doit faire au maximum (largeur x hauteur - taille)');
DEFINE('_UPLOAD_SUBMIT','Soumette un nouvel avatar à télécharger');
DEFINE('_UPLOAD_SELECT_FILE','Choisir un fichier');
DEFINE('_UPLOAD_ERROR_TYPE','Utilisez seulement des images jpeg, gif ou png');
DEFINE('_UPLOAD_ERROR_EMPTY','Sélectionnez un fichier avant de télécharger');
DEFINE('_UPLOAD_ERROR_NAME','Le nom du fichier ne doit contenir que des caractères alphanumériques et pas d\'espace.');
DEFINE('_UPLOAD_ERROR_SIZE','Le poids de l\'image excède le maximum défini par l\'administrateur.');
DEFINE('_UPLOAD_ERROR_WIDTH','La largeur de l\'image excède le maximum défini par l\'administrateur.');
DEFINE('_UPLOAD_ERROR_HEIGHT','La hauteur de l\'image excède le maximum défini par l\'administrateur.');
DEFINE('_UPLOAD_ERROR_CHOOSE','Vous n\'avez pas choisi un avatar de la galerie...');
DEFINE('_UPLOAD_UPLOADED','Votre avatar a été téléchargé.');
DEFINE('_UPLOAD_GALLERY','Choisir un avatar de la galerie:');
DEFINE('_UPLOAD_CHOOSE','Confirmer le choix.');
// listcat.php
DEFINE('_LISTCAT_ADMIN','Un administrateur doit d\'abord les créer  ');
DEFINE('_LISTCAT_DO','Ils sauront quoi faire ');
DEFINE('_LISTCAT_INFORM','Informez-les et demandez leur de faire vite!');
DEFINE('_LISTCAT_NO_CATS','Il n\'y a pas encore de catégories définies dans le forum.');
DEFINE('_LISTCAT_PANEL','Panneau d\'administration du forum.');
DEFINE('_LISTCAT_PENDING','Message(s) en attente');
// moderation.php
DEFINE('_MODERATION_MESSAGES','Il n\'y a pas de message en attente dans ce forum.');
// post.php
DEFINE('_POST_ABOUT_TO_DELETE','Vous êtes sur le point d\'effacer un message');
DEFINE('_POST_ABOUT_DELETE','<strong>NOTES:</strong><br>
-Si vous supprimez un sujet de forum (le premier message d\'un sujet) toutes les réponses à ce sujet seront supprimées aussi!
N\'envisagez d\'effacer le message et le nom de son auteur que si les contenus doivent être supprimés...
<br>
-Tous les descendants d\'un message normal supprimé seront remontés d\'un rang dans la hiérarchie du message.'); 
DEFINE('_POST_CLICK','Cliquez ici');
DEFINE('_POST_ERROR','Impossible de trouver le nom utilisateur/l\'email. Erreur critique non répertoriée avec la base de données');
DEFINE('_POST_ERROR_MESSAGE','Une erreur SQL inconnue est survenue et votre message n\'a pas été posté.Si le problème persite, merci de contacter l\'administrateur.');
DEFINE('_POST_ERROR_MESSAGE_OCCURED','Une erreur est survenue et le message n\'a pas été mis à jour.Essayez à  nouveau. Si cette erreur persiste, merci de contacter l\'administrateur.');
DEFINE('_POST_ERROR_TOPIC','Une erreur est survenue pendant la/les suppression(s). Merci de vérifier ci-dessous:');
DEFINE('_POST_FORGOT_NAME','Vous avez oublié d\'inclure votre nom.Cliquez sur le bouton <b>précédent</b> (retour) de votre navigateur&#146s et essayez à  nouveau.');
DEFINE('_POST_FORGOT_SUBJECT','Vous avez oublié d\'inclure un sujet.Cliquez sur le bouton <b>précédent</b> (retour) de votre navigateur&#146s et essayez à  nouveau.');
DEFINE('_POST_FORGOT_MESSAGE','Vous avez oublié d\'inclure un message.Cliquez sur le bouton <b>précédent</b> (retour) de votre navigateur&#146s et essayez à  nouveau.');
DEFINE('_POST_INVALID','L\id du message demandé est invalide.');
DEFINE('_POST_LOCK_SET','Le sujet a été verrouillé.');
DEFINE('_POST_LOCK_NOT_SET','Le sujet ne peut pas être verrouillé.');
DEFINE('_POST_LOCK_UNSET','Le sujet a été déverrouillé.');
DEFINE('_POST_LOCK_NOT_UNSET','Le sujet ne peut pas être déverrouillé.');
DEFINE('_POST_MESSAGE','Poster un nouveau message dans ');
DEFINE('_POST_MOVE_TOPIC','Déplacer ce message vers le forum ');
DEFINE('_POST_NEW','Poster un nouveau message dans: ');
DEFINE('_POST_NO_SUBSCRIBED_TOPIC','Votre abonnement à ce sujet ne peut pas être traité.');
DEFINE('_POST_NOTIFIED','Cocher cette case pour être prévenu par email des réponses sur ce sujet.');
DEFINE('_POST_STICKY_SET','Ce sujet a été épinglé.');
DEFINE('_POST_STICKY_NOT_SET','Ce sujet ne peut pas être épinglé.');
DEFINE('_POST_STICKY_UNSET','Ce sujet n\'est plus épinglé.');
DEFINE('_POST_STICKY_NOT_UNSET','On ne peut pas enlever l\'épingle sur ce sujet.');
DEFINE('_POST_SUBSCRIBE','Notifier par email');
DEFINE('_POST_SUBSCRIBED_TOPIC','Vous vous êtes abonné à  la notification email pour ce sujet.');
DEFINE('_POST_SUCCESS','Votre message a été posté avec succès');
DEFINE('_POST_SUCCES_REVIEW','Votre message a été posté avec succès.  Il sera examiné par un Modérateur avant d\'être publié sur le forum.');
DEFINE('_POST_SUCCESS_REQUEST','Votre demande a été traitée.  Si vous n\'êtes pas de redirigé vers le sujet dans quelques instants,');
DEFINE('_POST_TOPIC_HISTORY','Historique du sujet');
DEFINE('_POST_TOPIC_HISTORY_MAX','Max. montrant le plus récent');
DEFINE('_POST_TOPIC_HISTORY_LAST','Messages - <i>(Le plus récent en premier)</i>');
DEFINE('_POST_TOPIC_NOT_MOVED','Votre message ne peut pas être déplacé. Pour retourner au sujet :');
DEFINE('_POST_TOPIC_FLOOD1','L\'administrateur de ce forum a activé la protection contre le flood. Vous devez attendre ');
DEFINE('_POST_TOPIC_FLOOD2','secondes avant de pouvoir écrire un autre message.');
DEFINE('_POST_TOPIC_FLOOD3','Cliquez sur le bouton <b>précédent</b> (retour) de votre navigateur pour revenir au forum.');
DEFINE('_POST_EMAIL_NEVER','Votre adresse email ne sera jamais affichée sur le site.');
DEFINE('_POST_EMAIL_REGISTERED','Votre adresse email sera visible seulement par les utilisateurs enregistrés.');
DEFINE('_POST_LOCKED','Verrouillé par l\'administrateur.');
DEFINE('_POST_NO_NEW','Pas de nouvelles réponses permises.');
DEFINE('_POST_NO_PUBACCESS1','L\'administrateur a désactivé les droits d\'écriture au public.');
DEFINE('_POST_NO_PUBACCESS2','Seuls les utilisateurs connectés/enregistrés <br> peuvent contribuer au forum.');
// showcat.php
DEFINE('_SHOWCAT_NO_TOPICS','>> Il n\'y a pas encore de sujet dans ce forum <<');
DEFINE('_SHOWCAT_PENDING','Message(s) en attente');
// userprofile.php
DEFINE('_USER_DELETE',' cocher cette case pour supprimer votre signature');
DEFINE('_USER_ERROR_A','Vous avez abouti à  cette page par erreur. Veuillez informer l\'administrateur sur quels liens  ');
DEFINE('_USER_ERROR_B','vous avez cliqué pour en arriver là . Il pourra ensuite enregistrer un rapport de bug.');
DEFINE('_USER_ERROR_C','Merci!');
DEFINE('_USER_ERROR_D','Numéro de l\'erreur à  inclure dans votre rapport: ');
DEFINE('_USER_GENERAL','Options générales du profil');
DEFINE('_USER_MODERATOR','Vous avez le statut de modérateur ');
DEFINE('_USER_MODERATOR_NONE','Aucun forum ne vous est affecté');
DEFINE('_USER_MODERATOR_ADMIN','Les administrateurs sont modérateurs pour tous les forums.');
DEFINE('_USER_NOSUBSCRIPTIONS','Pas d\'abonnement trouvé');
DEFINE('_USER_PREFERED','Type d\'affichage préféré');
DEFINE('_USER_PROFILE','Profil pour ');
DEFINE('_USER_PROFILE_NOT_A','Votre profil pourrait ');
DEFINE('_USER_PROFILE_NOT_B','ne pas');
DEFINE('_USER_PROFILE_NOT_C',' être mis à jour.');
DEFINE('_USER_PROFILE_UPDATED','Votre profil est mis à jour.');
DEFINE('_USER_RETURN_A','Si vous n\'êtes pas revenu à  votre profil dans quelques instants ');
DEFINE('_USER_RETURN_B','cliquez ici');
DEFINE('_USER_SUBSCRIPTIONS','Vos abonnements');
DEFINE('_USER_UNSUBSCRIBE',':: résilier ::');
DEFINE('_USER_UNSUBSCRIBE_A','Vous pourriez');
DEFINE('_USER_UNSUBSCRIBE_B','ne pas');
DEFINE('_USER_UNSUBSCRIBE_C',' résilier la notification de ce sujet.');
DEFINE('_USER_UNSUBSCRIBE_YES','Vous n\'êtes plus abonné à  ce sujet.');
DEFINE('_USER_DELETEAV',' cocher cette case pour supprimer votre avatar');
//New 0.9 to 1.0
DEFINE('_USER_ORDER','Classement des messages');
DEFINE('_USER_ORDER_DESC','Le + ancien en 1er');
DEFINE('_USER_ORDER_ASC','Le + récent en 1er');
// view.php
DEFINE('_VIEW_DISABLED','L\'administrateur a désactivé l\'accès public en écriture.');
DEFINE('_VIEW_POSTED','Posté par');
DEFINE('_VIEW_SUBSCRIBE',':: S\'abonner à ce sujet ::');
DEFINE('_MODERATION_INVALID_ID','Un id de message invalide a été demandé.');
DEFINE('_VIEW_NO_POSTS','Il n\'y a pas de messages dans ce forum.');
DEFINE('_VIEW_VISITOR','Visiteur');
DEFINE('_VIEW_ADMIN','Admin');
DEFINE('_VIEW_USER','Utilisateur');
DEFINE('_VIEW_MODERATOR','Modérateur');
DEFINE('_VIEW_REPLY','Répondre à  ce message');
DEFINE('_VIEW_EDIT','Editer ce message');
DEFINE('_VIEW_QUOTE','Citer ce message dans un nouveau message');
DEFINE('_VIEW_DELETE','Supprimer ce message');
DEFINE('_VIEW_STICKY','Epingler ce sujet');
DEFINE('_VIEW_UNSTICKY','Dégrafer ce sujet');
DEFINE('_VIEW_LOCK','Verrouiller ce sujet');
DEFINE('_VIEW_UNLOCK','Déverrouiller ce sujet');
DEFINE('_VIEW_MOVE','Déplacer ce sujet vers un autre forum');
DEFINE('_VIEW_SUBSCRIBETXT','S\'abonner à  ce sujet');
//NEW-STRINGS-FOR-TRANSLATING-READY-FOR-SIMPLEBOARD 9.2
DEFINE('_HOME','Accueil');
DEFINE('_POSTS','Messages:');
DEFINE('_TOPIC_NOT_ALLOWED','Message');
DEFINE('_FORUM_NOT_ALLOWED','Forum');
DEFINE('_FORUM_IS_OFFLINE','Le forum est HORS LIGNE!');
DEFINE('_PAGE','Page: ');
DEFINE('_NO_POSTS','Pas de message');
DEFINE('_CHARS','Caractères max.');
DEFINE('_HTML_YES','HTML désactivé');
DEFINE('_YOUR_AVATAR','<b>Votre avatar</b>');
DEFINE('_NON_SELECTED','Pas encore choisi <br>');
DEFINE('_SET_NEW_AVATAR','Choisir un nouvel avatar');
DEFINE('_THREAD_UNSUBSCRIBE',':: désabonner ::');
DEFINE('_SHOW_LAST_POSTS','Sujets actifs depuis');
DEFINE('_SHOW_HOURS','heures');
DEFINE('_SHOW_POSTS','Total: ');
DEFINE('_DESCRIPTION_POSTS','Affichage des messages les plus récents des sujets actifs');
DEFINE('_SHOW_4_HOURS','4 Heures');
DEFINE('_SHOW_8_HOURS','8 Heures');
DEFINE('_SHOW_12_HOURS','12 Heures');
DEFINE('_SHOW_24_HOURS','24 Heures');
DEFINE('_SHOW_48_HOURS','48 Heures');
DEFINE('_SHOW_WEEK','Semaine');
DEFINE('_POSTED_AT','Posté le');
DEFINE('_DATETIME', 'd/m/y à H:i');
DEFINE('_NO_TIMEFRAME_POSTS','Il n\'y a pas de nouveau message dans la plage horaire que vous avez sélectionnée.');
DEFINE('_MESSAGE','Message');
DEFINE('_NO_SMILIE','non');
DEFINE('_FORUM_UNAUTHORIZIED','Ce forum est ouvert seulement aux utilisateurs enregistrés et connectés.');
DEFINE('_FORUM_UNAUTHORIZIED2','Si vous êtes déjà  enregistré, connectez-vous en premier.');
DEFINE('_MESSAGE_ADMINISTRATION','Modération');
DEFINE('_MOD_APPROVE','Approuver');
DEFINE('_MOD_DELETE','Supprimer');
//NEW in RC1
DEFINE('_SHOW_LAST','Voir le message le plus récent');
DEFINE('_POST_WROTE','écrit');
DEFINE('_COM_A_EMAIL','Email de l\'admin');
DEFINE('_COM_A_EMAIL_DESC','L\'adresse email de l\'administrateur principal chargé du forum. Cette adresse email doit être valide');
DEFINE('_COM_A_WRAP','Sectionner les mots plus longs que');
DEFINE('_COM_A_WRAP_DESC',
'Entrer le nombre maximum de caractères qu\'un mot peut avoir. Ce dispositif vous permet d\'harmoniser l\'affichage des messages avec votre template.<br> 70 caractères est sans doute le maximum pour la largeur des templates à  largeur fixe mais vous devez faire des essais.<br>Les URLs, quel que soit leur longueur, ne sont pas affectés par ce dispositif.');
DEFINE('_COM_A_SIGNATURE','Longueur maximum de la signature');
DEFINE('_COM_A_SIGNATURE_DESC','Nombre maximum de caractères autorisés pour la signature utilisateur');
DEFINE('_SHOWCAT_NOPENDING','Pas de message en attente');
DEFINE('_COM_A_BOARD_OFSET','Décalage horaire du forum');
DEFINE('_COM_A_BOARD_OFSET_DESC','Certains forums sont localisés sur des serveurs dans des fuseaux horaires différents de celui de l\'utilisateur. Ajustez l\'heure que doit utiliser le forum dans les messages en fonction du décalage. Des valeurs positives ou négatives peuvent être utilisées');
//New in RC2
DEFINE('_COM_A_BASICS','Général');
DEFINE('_COM_A_FRONTEND','Paramètres publics');
DEFINE('_COM_A_SECURITY','Sécurité');
DEFINE('_COM_A_AVATARS','Avatars');
DEFINE('_COM_A_INTEGRATION','Intégration');
DEFINE('_COM_A_PMS','Activer la messagerie privée');
DEFINE('_COM_A_PMS_DESC',
'Sélectionnez votre composant de messagerie privée si vous en avez un d\'installé. En sélectionnant <b>MyPMS Professionnal</b> cela activera aussi les options du profil utilisateur de <b>MyPMS Pro</b> (comme ICQ, AIM, Yahoo, MSN et autres liens du profil s\'ils sont supportés par le template Kunena utilisé');
DEFINE('_VIEW_PMS','Cliquez ici pour envoyer un message privé à  cet utilisateur');
//new in RC3
DEFINE('_POST_RE','Re:');
DEFINE('_BBCODE_BOLD','Texte gras : [b]texte[/b] ');
DEFINE('_BBCODE_ITALIC','Texte italique : [i]texte[/i]');
DEFINE('_BBCODE_UNDERL','Texte souligné : [u]texte[/u]');
DEFINE('_BBCODE_QUOTE','Afficher une citation : [quote]texte[/quote]');
DEFINE('_BBCODE_CODE','Afficher du code : [code]code[/code]');
DEFINE('_BBCODE_ULIST','Liste à  puces : [ul] [li]texte[/li] [/ul] - NB: une liste doit contenir des éléments de liste ');
DEFINE('_BBCODE_OLIST','Liste numérotée : [ol] [li]texte[/li] [/ol] - NB: une liste doit contenir des éléments de liste');
DEFINE('_BBCODE_IMAGE','Image : [img size=(01-499)]http://www.google.com/images/web_logo_left.gif[/img]');
DEFINE('_BBCODE_LINK','Lien : [url=http://www.zzz.com/]votre lien[/url]');
DEFINE('_BBCODE_CLOSA','Fermer tous les tags');
DEFINE('_BBCODE_CLOSE','Fermer tous les tags bbcode');
DEFINE('_BBCODE_COLOR','Couleur : [color=#FF6600]texte[/color]');
DEFINE('_BBCODE_SIZE','Taille : [size=1]taille du texte[/size] - avec des valeurs de 1 à  5');
DEFINE('_BBCODE_LITEM','Elément de liste: [li] élément de liste [/li]');
DEFINE('_BBCODE_HINT','Le bbCode est activé : vous pouvez l`utiliser !');
DEFINE('_COM_A_TAWIDTH','Largeur de zone de saisie');
DEFINE('_COM_A_TAWIDTH_DESC','Ajustez la largeur de la zone de saisie du texte (message/réponse) en fonction votre template. <br>La barre d\'outils Emoticônes sera répartie sur deux lignes si la largeur est <= 420 pixels');
DEFINE('_COM_A_TAHEIGHT','Hauteur de zone texte');
DEFINE('_COM_A_TAHEIGHT_DESC','Ajustez la hauteur de la zone de saisie du texte (message/réponse) en fonction votre template');
DEFINE('_COM_A_ASK_EMAIL','Adresse email requise');
DEFINE('_COM_A_ASK_EMAIL_DESC','Pour exiger une adresse email quand un utilisateur ou un visiteur poste un message. Sélectionner <font color=#FF0000><b>Non</b></font> si vous ne souhaitez pas de cette option dans l\'interface utilisateur : les adresses email ne seront pas demandées aux auteurs de messages.');

//Rank Administration - Dan Syme/IGD
DEFINE('_KUNENA_RANKS_MANAGE', 'Gestion des rangs');
DEFINE('_KUNENA_SORTRANKS', 'Classer par rangs');

DEFINE('_KUNENA_RANKSIMAGE', 'Images de rang');
DEFINE('_KUNENA_RANKS', 'Titre du rang');
DEFINE('_KUNENA_RANKS_SPECIAL', 'Spécial');
DEFINE('_KUNENA_RANKSMIN', 'Nombre mini de posts');
DEFINE('_KUNENA_RANKS_ACTION', 'Actions');
DEFINE('_KUNENA_NEW_RANK', 'Nouveau rang');

// rev 2
DEFINE('_KUNENA_WHO_VIEW_CAT', 'Consulte la catégorie :');
DEFINE('_KUNENA_WHO_VIEW_LISCAT', 'Consulte la liste des catégories.');
DEFINE('_KUNENA_WHO_VIEW_MESSAGE', 'Consulte le message :');
DEFINE('_KUNENA_WHO_VIEW_WHO', 'Consulte la liste des personnes connectées.');
DEFINE('_KUNENA_WHO_SEARCH', 'Effectue une recherche');
DEFINE('_KUNENA_WHO_MYPROFILE', 'Consulte son profil.');
DEFINE('_KUNENA_WHO_FBPROFILE', 'Consulte le profil d\'un autre utilisateur.');
DEFINE('_KUNENA_WHO_STATS', 'Consulte la page des statistiques.');
DEFINE('_KUNENA_WHO_USERLIST', 'Consulte la liste des utilisateurs enregistrés.');
DEFINE('_KUNENA_WHO_REPLYTO', 'Répond à un message.');
DEFINE('_KUNENA_WHO_POST_EDIT', 'Poste ou un édite un message.');
?>
