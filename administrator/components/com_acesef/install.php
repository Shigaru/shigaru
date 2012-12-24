<?php
/**
* @version		1.5.0
* @package		AceSEF
* @subpackage	Installer
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * 
 * This is the special installer addon based on the one created by Andrew Eddie and the team of JXtended.
 * We thank for this cool idea of extending the installation process easily
 */

// No Permission
defined('_JEXEC') or die('Restricted Access');

// Import Libraries
jimport('joomla.filesystem.file');

$status = new JObject();
$status->adapters = array();
$status->extensions = array();
$status->modules = array();
$status->plugins = array();

/***********************************************************************************************
* ---------------------------------------------------------------------------------------------
* ADAPTER INSTALLATION SECTION
* ---------------------------------------------------------------------------------------------
***********************************************************************************************/
$adp_src = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_acesef'.DS.'adapters'.DS.'acesef_ext.php';
$adp_dst = JPATH_LIBRARIES.DS.'joomla'.DS.'installer'.DS.'adapters'.DS.'acesef_ext.php';
if (is_writable(dirname($adp_dst))) {
	JFile::copy($adp_src, $adp_dst);
	$status->adapters[] = 1;
}
/***********************************************************************************************
* ---------------------------------------------------------------------------------------------
* EXTENSION INSTALLATION SECTION
* ---------------------------------------------------------------------------------------------
***********************************************************************************************/

$extensions = &$this->manifest->getElementByPath('extensions');
if (is_a($extensions, 'JSimpleXMLElement') && count($extensions->children())) {
	foreach ($extensions->children() as $extension) {
		$option	= $extension->attributes('option');
		
		$file = $this->parent->getPath('source').'/admin/extensions/'.$option.'.xml';
		
		if (!file_exists($file)) {
			continue;
		}
		
		$manifest = $this->parent->_isManifest($file);
		
		if (is_null($manifest)) {
			continue;
		}
		
		$root =& $manifest->document;
		
		$ename = $root->getElementByPath('name');
		$ename = JFilterInput::clean($ename->data(), 'string');

		$prm = array();
		$prm['router'] = 'router=3';
		
		$element = $root->getElementByPath('install/defaultparams');
		if (is_a($element, 'JSimpleXMLElement') && count($element->children())) {
			$defaultParams = $element->children();
			if (count($defaultParams) != 0) {
				foreach ($defaultParams as $param) {
					if ($param->name() != 'defaultparam') {
						continue;
					}
					
					$name = $param->attributes('name');
					$value = $param->attributes('value');
					
					$prm[$name] = $name.'='.$value;
				}
			}
		}
		
		if (!isset($prm['skip_menu'])) {
			$prm['skip_menu'] = 'skip_menu=0';
		}
		
		if (!isset($prm['prefix'])) {
			$prm['prefix'] = 'prefix=';
		}
		
		$params = implode("\n", $prm);
		
		JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_acesef'.DS.'tables');
		$row =& JTable::getInstance('AcesefExtensions', 'Table');	
		$row->name 			= $ename;
		$row->extension 	= $option;
		$row->params 		= $params;
		$row->store();

		$status->extensions[] = array('name' => $ename);
	}
}

/***********************************************************************************************
* ---------------------------------------------------------------------------------------------
* MODULE INSTALLATION SECTION
* ---------------------------------------------------------------------------------------------
***********************************************************************************************/

$modules = &$this->manifest->getElementByPath('modules');
if (is_a($modules, 'JSimpleXMLElement') && count($modules->children())) {

	foreach ($modules->children() as $module) {
		$mtitle		= $module->attributes('title');
		$mname		= $module->attributes('module');
		$mclient	= JApplicationHelper::getClientInfo($module->attributes('client'), true);

		// Set the installation path
		if (!empty ($mname)) {
			$this->parent->setPath('extension_root', $mclient->path.DS.'modules'.DS.$mname);
		} else {
			$this->parent->abort(JText::_('Module').' '.JText::_('Install').': '.JText::_('No module file specified'));
			return false;
		}

		/*
		* If the module directory already exists, then we will assume that the
		* module is already installed or another module is using that directory.
		*/
		if (file_exists($this->parent->getPath('extension_root'))&&!$this->parent->getOverwrite()) {
			$this->parent->abort(JText::_('Module').' '.JText::_('Install').': '.JText::_('Another module is already using directory').': "'.$this->parent->getPath('extension_root').'"');
			return false;
		}

		// If the module directory does not exist, lets create it
		$created = false;
		if (!file_exists($this->parent->getPath('extension_root'))) {
			if (!$created = JFolder::create($this->parent->getPath('extension_root'))) {
				$this->parent->abort(JText::_('Module').' '.JText::_('Install').': '.JText::_('Failed to create directory').': "'.$this->parent->getPath('extension_root').'"');
				return false;
			}
		}

		/*
		* Since we created the module directory and will want to remove it if
		* we have to roll back the installation, lets add it to the
		* installation step stack
		*/
		if ($created) {
			$this->parent->pushStep(array ('type' => 'folder', 'path' => $this->parent->getPath('extension_root')));
		}

		// Copy all necessary files
		$element = &$module->getElementByPath('files');
		if ($this->parent->parseFiles($element, -1) === false) {
			// Install failed, roll back changes
			$this->parent->abort();
			return false;
		}

		// Copy language files
		$element = &$module->getElementByPath('languages');
		if ($this->parent->parseLanguages($element, $mclient->id) === false) {
			// Install failed, roll back changes
			$this->parent->abort();
			return false;
		}

		// Copy media files
		$element = &$module->getElementByPath('media');
		if ($this->parent->parseMedia($element, $mclient->id) === false) {
			// Install failed, roll back changes
			$this->parent->abort();
			return false;
		}

		$mtitle		= $module->attributes('title');
		$mposition	= $module->attributes('position');
		$morder		= $module->attributes('order');
		$mparams  =  'menu='.$module->attributes('menu');

		if ($mtitle && $mposition) {
			// if module already installed do not create a new instance
			$db =& JFactory::getDBO();
			$query = 'SELECT `id` FROM `#__modules` WHERE module = '.$db->Quote( $mname);
			$db->setQuery($query);
			if (!$db->Query()) {
				// Install failed, roll back changes
				$this->parent->abort(JText::_('Module').' '.JText::_('Install').': '.$db->stderr(true));
				return false;
			}
			$id = $db->loadResult();

			if (!$id){
				$row = & JTable::getInstance('module');
				$row->title		= $mtitle;
				$row->ordering	= $morder;
				$row->position	= $mposition;
				$row->showtitle	= 0;
				$row->iscore	= 0;
				$row->access	= ($mclient->id) == 1 ? 2 : 0;
				$row->client_id	= $mclient->id;
				$row->module	= $mname;
				$row->published	= 1;
				$row->params	= $mparams;

				if (!$row->store()) {
					// Install failed, roll back changes
					$this->parent->abort(JText::_('Module').' '.JText::_('Install').': '.$db->stderr(true));
					return false;
				}
				
				// Make visible evertywhere if site module
				if ($mclient->id==0){
					$query = 'REPLACE INTO `#__modules_menu` (moduleid,menuid) values ('.$db->Quote( $row->id).',0)';
					$db->setQuery($query);
					if (!$db->query()) {
						// Install failed, roll back changes
						$this->parent->abort(JText::_('Module').' '.JText::_('Install').': '.$db->stderr(true));
						return false;
					}
				}
			}
		}

		$status->modules[] = array('name' => $mtitle, 'client' => $mclient->name);
	}
}

/***********************************************************************************************
* ---------------------------------------------------------------------------------------------
* PLUGIN INSTALLATION SECTION
* ---------------------------------------------------------------------------------------------
***********************************************************************************************/

$plugins = &$this->manifest->getElementByPath('plugins');
if (is_a($plugins, 'JSimpleXMLElement') && count($plugins->children())) {

	foreach ($plugins->children() as $plugin) {
		$ptitle		= $plugin->attributes('title');
		$pname		= $plugin->attributes('plugin');
		$pgroup		= $plugin->attributes('group');
		$porder		= $plugin->attributes('order');

		// Set the installation path
		if (!empty($pname) && !empty($pgroup)) {
			$this->parent->setPath('extension_root', JPATH_ROOT.DS.'plugins'.DS.$pgroup);
		} else {
			$this->parent->abort(JText::_('Plugin').' '.JText::_('Install').': '.JText::_('No plugin file specified'));
			return false;
		}

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Filesystem Processing Section
		 * ---------------------------------------------------------------------------------------------
		 */

		// If the plugin directory does not exist, lets create it
		$created = false;
		if (!file_exists($this->parent->getPath('extension_root'))) {
			if (!$created = JFolder::create($this->parent->getPath('extension_root'))) {
				$this->parent->abort(JText::_('Plugin').' '.JText::_('Install').': '.JText::_('Failed to create directory').': "'.$this->parent->getPath('extension_root').'"');
				return false;
			}
		}

		/*
		* If we created the plugin directory and will want to remove it if we
		* have to roll back the installation, lets add it to the installation
		* step stack
		*/
		if ($created) {
			$this->parent->pushStep(array ('type' => 'folder', 'path' => $this->parent->getPath('extension_root')));
		}

		// Copy all necessary files
		$element = &$plugin->getElementByPath('files');
		if ($this->parent->parseFiles($element, -1) === false) {
			// Install failed, roll back changes
			$this->parent->abort();
			return false;
		}

		// Copy all necessary files
		$element = &$plugin->getElementByPath('languages');
		if ($this->parent->parseLanguages($element, 1) === false) {
			// Install failed, roll back changes
			$this->parent->abort();
			return false;
		}

		// Copy media files
		$element = &$plugin->getElementByPath('media');
		if ($this->parent->parseMedia($element, 1) === false) {
			// Install failed, roll back changes
			$this->parent->abort();
			return false;
		}

		/**
		 * ---------------------------------------------------------------------------------------------
		 * Database Processing Section
		 * ---------------------------------------------------------------------------------------------
		 */
		$db = &JFactory::getDBO();

		// Check to see if a plugin by the same name is already installed
		$query = 'SELECT `id`' .
		' FROM `#__plugins`' .
		' WHERE folder = '.$db->Quote($pgroup) .
		' AND element = '.$db->Quote($pname);
		$db->setQuery($query);
		if (!$db->Query()) {
			// Install failed, roll back changes
			$this->parent->abort(JText::_('Plugin').' '.JText::_('Install').': '.$db->stderr(true));
			return false;
		}
		$id = $db->loadResult();

		// Was there a plugin already installed with the same name?
		if ($id) {
			if (!$this->parent->getOverwrite())	{
				// Install failed, roll back changes
				$this->parent->abort(JText::_('Plugin').' '.JText::_('Install').': '.JText::_('Plugin').' "'.$ptitle.'" '.JText::_('already exists!'));
				return false;
			}
		} else {
			$row =& JTable::getInstance('plugin');
			$row->name = JText::_(ucfirst($pgroup)).' - '.JText::_(ucfirst($ptitle));
			$row->ordering = $porder;
			$row->folder = $pgroup;
			$row->iscore = 0;
			$row->access = 0;
			$row->client_id = 0;
			$row->element = $pname;
			$row->published = 1;
			$row->params = '';

			if (!$row->store()) {
				// Install failed, roll back changes
				$this->parent->abort(JText::_('Plugin').' '.JText::_('Install').': '.$db->stderr(true));
				return false;
			}
		}

		$status->plugins[] = array('name' => $ptitle, 'group' => $pgroup);
	}
}

/***********************************************************************************************
* ---------------------------------------------------------------------------------------------
* SITEMAP INSTALLATION SECTION
* ---------------------------------------------------------------------------------------------
***********************************************************************************************/
$sitemap = JPATH_ROOT.DS.'sitemap.xml';
if (!JFile::exists($sitemap)) {
	JFile::write($sitemap, '');
}

/***********************************************************************************************
* ---------------------------------------------------------------------------------------------
* CONFIGURATION INSTALLATION SECTION
* ---------------------------------------------------------------------------------------------
***********************************************************************************************/
$config = new stdClass();
$config->mode = '1';
$config->generate_sef = '1';
$config->version_checker = '1';
$config->purge_ext_urls = '1';
$config->jquery_mode = '1';
$config->download_id = '';
$config->cache_instant = '1';
$config->cache_versions = '1';
$config->cache_extensions = '0';
$config->cache_urls = '0';
$config->cache_urls_size = '10000';
$config->cache_metadata = '0';
$config->cache_sitemap = '0';
$config->cache_urls_moved = '0';
$config->cache_tags = '0';
$config->cache_ilinks = '1';
$config->seo_h1 = '0';
$config->seo_nofollow = '0';
$config->page404 = 'custom';
$config->url_lowercase = '1';
$config->global_smart_itemid = '1';
$config->ignore_multi_itemid = '0';
$config->numeral_duplicated = '0';
$config->record_duplicated = '1';
$config->url_suffix = '';
$config->replacement_character = '-';
$config->parent_menus = '0';
$config->menu_url_part = 'title';
$config->title_alias = 'title';
$config->append_itemid = '0';
$config->remove_trailing_slash = '1';
$config->tolerant_to_trailing_slash = '1';
$config->url_strip_chars = '^$%@#()+*!?.~:;|[]{},&¦';
$config->source_tracker = '0';
$config->insert_active_itemid = '0';
$config->remove_sid = '0';
$config->set_query_string = '1';
$config->base_href = '3';
$config->append_non_sef = '1';
$config->prevent_dup_error = '1';
$config->show_db_errors = '0';
$config->check_url_by_id = '1';
$config->non_sef_vars = 'format=feed, type=rss, type=atom';
$config->disable_sef_vars = 'tmpl, no_html=1';
$config->skip_menu_vars = '';
$config->db_404_errors = '1';
$config->log_404_errors = '0';
$config->sent_headers_error = '0';
$config->joomfish_main_lang = '0';
$config->joomfish_main_lang_del = '0';
$config->joomfish_lang_code = '1';
$config->joomfish_trans_url = '1';
$config->joomfish_cookie = '1';
$config->joomfish_browser = '1';
$config->utf8_url = '0';
$config->char_replacements = 'Á|A, Â|A, Å|A, Ă|A, Ä|A, À|A, Ã|A, Ć|C, Ç|C, Č|C, Ď|D, É|E, È|E, Ë|E, Ě|E, Ê|E, Ì|I, Í|I, Î|I, Ï|I, Ĺ|L, Ń|N, Ň|N, Ñ|N, Ò|O, Ó|O, Ô|O, Õ|O, Ö|O, Ő|O, Ŕ|R, Ř|R, Š|S, Ś|O, Ť|T, Ů|U, Ú|U, Ű|U, Ü|U, Ý|Y, Ž|Z, Ź|Z, á|a, â|a, å|a, ä|a, à|a, ã|a, ć|c, ç|c, č|c, ď|d, đ|d, é|e, ę|e, ë|e, ě|e, è|e, ê|e, ì|i, í|i, î|i, ï|i, ĺ|l, ń|n, ň|n, ñ|n, ò|o, ó|o, ô|o, ő|o, ö|o, õ|o, š|s, ś|s, ř|r, ŕ|r, ť|t, ů|u, ú|u, ű|u, ü|u, ý|y, ž|z, ź|z, ˙|-, ß|ss, Ą|A, µ|u, Ą|A, µ|u, ą|a, Ą|A, ę|e, Ę|E, ś|s, Ś|S, ż|z, Ż|Z, ź|z, Ź|Z, ć|c, Ć|C, ł|l, Ł|L, ó|o, Ó|O, ń|n, Ń|N, Б|B, б|b, В|V, в|v, Г|G, г|g, Д|D, д|d, Ж|Zh, ж|zh, З|Z, з|z, И|I, и|i, Й|Y, й|y, К|K, к|k, Л|L, л|l, м|m, Н|N, н|n, П|P, п|p, т|t, У|U, у|u, Ф|F, ф|f, Х|Ch, х|ch, Ц|Ts, ц|ts, Ч|Ch, ч|ch, Ш|Sh, ш|sh, Щ|Sch, щ|sch, Ы|I, ы|i, Э|E, э|e, Ю|U, ю|iu, Я|Ya, я|ya, Ş|S, İ|I, Ğ|G, ş|s, ğ|g, ı|i, $|S, ¥|Y, £|L, ù|u, °|o, º|o, ª|a';
$config->redirect_to_www = '0';
$config->redirect_to_sef = '1';
$config->redirect_to_sef_gen = '0';
$config->jsef_to_acesef = '1';
$config->force_ssl = '[]';
$config->url_append_limit = '0';
$config->delete_other_sef = '1';
$config->meta_core = '1';
$config->meta_title = '1';
$config->meta_title_tag = '1';
$config->meta_desc = '1';
$config->meta_key = '1';
$config->meta_generator = '';
$config->meta_generator_rem = '1';
$config->meta_abstract = '';
$config->meta_revisit = '';
$config->meta_direction = '';
$config->meta_googlekey = '';
$config->meta_livekey = '';
$config->meta_yahookey = '';
$config->meta_alexa = '';
$config->meta_name_1 = '';
$config->meta_name_2 = '';
$config->meta_name_3 = '';
$config->meta_con_1 = '';
$config->meta_con_2 = '';
$config->meta_con_3 = '';
$config->meta_t_seperator = '-';
$config->meta_t_sitename = '';
$config->meta_t_usesitename = '1';
$config->meta_t_prefix = '';
$config->meta_t_suffix = '';
$config->meta_key_blacklist = 'a, able, about, above, abroad, according, accordingly, across, actually, adj, after, afterwards, again, against, ago, ahead, ain\'t, all, allow, allows, almost, alone, along, alongside, already, also, although, always, am, amid, amidst, among, amongst, an, and, another, any, anybody, anyhow, anyone, anything, anyway, anyways, anywhere, apart, appear, appreciate, appropriate, are, aren\'t, around, as, a\'s, aside, ask, asking, associated, at, available, away, awfully, b, back, backward, backwards, be, became, because, become, becomes, becoming, been, before, beforehand, begin, behind, being, believe, below, beside, besides, best, better, between, beyond, both, brief, but, by, c, came, can, cannot, cant, can\'t, caption, cause, causes, certain, certainly, changes, clearly, c\'mon, co, co., com, come, comes, concerning, consequently, consider, considering, contain, containing, contains, corresponding, could, couldn\'t, course, c\'s, currently, d, dare, daren\'t, definitely, described, despite, did, didn\'t, different, directly, do, does, doesn\'t, doing, done, don\'t, down, downwards, during, e, each, edu, eg, eight, eighty, either, else, elsewhere, end, ending, enough, entirely, especially, et, etc, even, ever, evermore, every, everybody, everyone, everything, everywhere, ex, exactly, example, except, f, fairly, far, farther, few, fewer, fifth, first, five, followed, following, follows, for, forever, former, formerly, forth, forward, found, four, from, further, furthermore, g, get, gets, getting, given, gives, go, goes, going, gone, got, gotten, greetings, h, had, hadn\'t, half, happens, hardly, has, hasn\'t, have, haven\'t, having, he, he\'d, he\'ll, hello, help, , hence, her, here, hereafter, hereby, herein, here\'s, hereupon, hers, herself, he\'s, hi, him, himself, his, hither, hopefully, how, howbeit, however, hundred, i, i\'d, ie, if, ignored, i\'ll, i\'m, immediate, in, inasmuch, inc, inc., indeed, indicate, indicated, indicates, inner, inside, insofar, instead, into, inward, is, isn\'t, it, it\'d, it\'ll, its, it\'s, itself, i\'ve, j, just, k, keep, keeps, kept, know, known, knows, l, last, lately, later, latter, latterly, least, less, lest, let, let\'s, like, liked, likely, likewise, little, look, looking, looks, low, lower, ltd, m, made, mainly, make, makes, many, may, maybe, mayn\'t, me, mean, meantime, meanwhile, merely, might, mightn\'t, mine, minus, miss, more, moreover, most, mostly, mr, mrs, much, must, mustn\'t, my, myself, n, name, namely, nd, near, nearly, necessary, need, needn\'t, needs, neither, never, neverf, neverless, nevertheless, new, next, nine, ninety, no, nobody, non, none, nonetheless, noone, no-one, nor, normally, not, nothing, notwithstanding, novel, now, nowhere, o, obviously, of, off, often, oh, ok, okay, old, on, once, one, ones, one\'s, only, onto, opposite, or, other, others, otherwise, ought, oughtn\'t, our, ours, ourselves, out, outside, over, overall, own, p, particular, particularly, past, per, perhaps, placed, please, plus, possible, presumably, probably, provided, provides, q, que, quite, qv, r, rather, rd, re, really, reasonably, recent, recently, regarding, regardless, regards, relatively, respectively, right, round, s, said, same, saw, say, saying, says, second, secondly, , see, seeing, seem, seemed, seeming, seems, seen, self, selves, sensible, sent, serious, seriously, seven, several, shall, shan\'t, she, she\'d, she\'ll, she\'s, should, shouldn\'t, since, six, so, some, somebody, someday, somehow, someone, something, sometime, sometimes, somewhat, somewhere, soon, sorry, specified, specify, specifying, still, sub, such, sup, sure, t, take, taken, taking, tell, tends, th, than, thank, thanks, thanx, that, that\'ll, thats, that\'s, that\'ve, the, their, theirs, them, themselves, then, thence, there, thereafter, thereby, there\'d, therefore, therein, there\'ll, there\'re, theres, there\'s, thereupon, there\'ve, these, they, they\'d, they\'ll, they\'re, they\'ve, thing, things, think, third, thirty, this, thorough, thoroughly, those, though, three, through, throughout, thru, thus, till, to, together, too, took, toward, towards, tried, tries, truly, try, trying, t\'s, twice, two, u, un, under, underneath, undoing, unfortunately, unless, unlike, unlikely, until, unto, up, upon, upwards, us, use, used, useful, uses, using, usually, v, value, various, versus, very, via, viz, vs, w, want, wants, was, wasn\'t, way, we, we\'d, welcome, well, we\'ll, went, were, we\'re, weren\'t, we\'ve, what, whatever, what\'ll, what\'s, what\'ve, when, whence, whenever, where, whereafter, whereas, whereby, wherein, where\'s, whereupon, wherever, whether, which, whichever, while, whilst, whither, who, who\'d, whoever, whole, who\'ll, whom, whomever, who\'s, whose, why, will, willing, wish, with, within, without, wonder, won\'t, would, wouldn\'t, x, y, yes, yet, you, you\'d, you\'ll, your, you\'re, yours, yourself, yourselves, you\'ve, z, zero';
$config->meta_key_whitelist = '';
$config->sm_file = 'sitemap';
$config->sm_xml_date = '1';
$config->sm_xml_freq = '1';
$config->sm_xml_prior = '1';
$config->sm_dot_tree = '1';
$config->sm_ping_type = 'link';
$config->sm_ping = '1';
$config->sm_yahoo_appid = '';
$config->sm_ping_services = 'http://blogsearch.google.com/ping/RPC2, http://rpc.pingomatic.com/';
$config->sm_freq = 'weekly';
$config->sm_priority = '0.5';
$config->sm_auto_mode = '1';
$config->sm_auto_components = '[\"com_content\"]';
$config->sm_auto_enable_cats = '0';
$config->sm_auto_filter_s = '.pdf';
$config->sm_auto_filter_r = 'format=pdf, format=feed, type=rss';
$config->sm_auto_cron_mode = '0';
$config->sm_auto_cron_freq = '24';
$config->sm_auto_cron_last = '1286615325';
$config->sm_auto_xml = '1';
$config->sm_auto_ping_c = '0';
$config->sm_auto_ping_s = '0';
$config->tags_mode = '1';
$config->tags_area = '1';
$config->tags_components = '[\"com_content\"]';
$config->tags_enable_cats = '0';
$config->tags_in_cats = '0';
$config->tags_in_page = '15';
$config->tags_order = 'ordering';
$config->tags_position = '2';
$config->tags_limit = '20';
$config->tags_show_tag_desc = '0';
$config->tags_show_prefix = '1';
$config->tags_show_item_desc = '1';
$config->tags_exp_item_desc = '0';
$config->tags_published = '1';
$config->tags_auto_mode = '0';
$config->tags_auto_components = '[\"com_content\"]';
$config->tags_auto_length = '4';
$config->tags_auto_filter_s = '.pdf';
$config->tags_auto_filter_r = 'format=pdf, format=feed, type=rss';
$config->tags_auto_blacklist = 'a, able, about, above, abroad, according, accordingly, across, actually, adj, after, afterwards, again, against, ago, ahead, ain\'t, all, allow, allows, almost, alone, along, alongside, already, also, although, always, am, amid, amidst, among, amongst, an, and, another, any, anybody, anyhow, anyone, anything, anyway, anyways, anywhere, apart, appear, appreciate, appropriate, are, aren\'t, around, as, a\'s, aside, ask, asking, associated, at, available, away, awfully, b, back, backward, backwards, be, became, because, become, becomes, becoming, been, before, beforehand, begin, behind, being, believe, below, beside, besides, best, better, between, beyond, both, brief, but, by, c, came, can, cannot, cant, can\'t, caption, cause, causes, certain, certainly, changes, clearly, c\'mon, co, co., com, come, comes, concerning, consequently, consider, considering, contain, containing, contains, corresponding, could, couldn\'t, course, c\'s, currently, d, dare, daren\'t, definitely, described, despite, did, didn\'t, different, directly, do, does, doesn\'t, doing, done, don\'t, down, downwards, during, e, each, edu, eg, eight, eighty, either, else, elsewhere, end, ending, enough, entirely, especially, et, etc, even, ever, evermore, every, everybody, everyone, everything, everywhere, ex, exactly, example, except, f, fairly, far, farther, few, fewer, fifth, first, five, followed, following, follows, for, forever, former, formerly, forth, forward, found, four, from, further, furthermore, g, get, gets, getting, given, gives, go, goes, going, gone, got, gotten, greetings, h, had, hadn\'t, half, happens, hardly, has, hasn\'t, have, haven\'t, having, he, he\'d, he\'ll, hello, help, , hence, her, here, hereafter, hereby, herein, here\'s, hereupon, hers, herself, he\'s, hi, him, himself, his, hither, hopefully, how, howbeit, however, hundred, i, i\'d, ie, if, ignored, i\'ll, i\'m, immediate, in, inasmuch, inc, inc., indeed, indicate, indicated, indicates, inner, inside, insofar, instead, into, inward, is, isn\'t, it, it\'d, it\'ll, its, it\'s, itself, i\'ve, j, just, k, keep, keeps, kept, know, known, knows, l, last, lately, later, latter, latterly, least, less, lest, let, let\'s, like, liked, likely, likewise, little, look, looking, looks, low, lower, ltd, m, made, mainly, make, makes, many, may, maybe, mayn\'t, me, mean, meantime, meanwhile, merely, might, mightn\'t, mine, minus, miss, more, moreover, most, mostly, mr, mrs, much, must, mustn\'t, my, myself, n, name, namely, nd, near, nearly, necessary, need, needn\'t, needs, neither, never, neverf, neverless, nevertheless, new, next, nine, ninety, no, nobody, non, none, nonetheless, noone, no-one, nor, normally, not, nothing, notwithstanding, novel, now, nowhere, o, obviously, of, off, often, oh, ok, okay, old, on, once, one, ones, one\'s, only, onto, opposite, or, other, others, otherwise, ought, oughtn\'t, our, ours, ourselves, out, outside, over, overall, own, p, particular, particularly, past, per, perhaps, placed, please, plus, possible, presumably, probably, provided, provides, q, que, quite, qv, r, rather, rd, re, really, reasonably, recent, recently, regarding, regardless, regards, relatively, respectively, right, round, s, said, same, saw, say, saying, says, second, secondly, , see, seeing, seem, seemed, seeming, seems, seen, self, selves, sensible, sent, serious, seriously, seven, several, shall, shan\'t, she, she\'d, she\'ll, she\'s, should, shouldn\'t, since, six, so, some, somebody, someday, somehow, someone, something, sometime, sometimes, somewhat, somewhere, soon, sorry, specified, specify, specifying, still, sub, such, sup, sure, t, take, taken, taking, tell, tends, th, than, thank, thanks, thanx, that, that\'ll, thats, that\'s, that\'ve, the, their, theirs, them, themselves, then, thence, there, thereafter, thereby, there\'d, therefore, therein, there\'ll, there\'re, theres, there\'s, thereupon, there\'ve, these, they, they\'d, they\'ll, they\'re, they\'ve, thing, things, think, third, thirty, this, thorough, thoroughly, those, though, three, through, throughout, thru, thus, till, to, together, too, took, toward, towards, tried, tries, truly, try, trying, t\'s, twice, two, u, un, under, underneath, undoing, unfortunately, unless, unlike, unlikely, until, unto, up, upon, upwards, us, use, used, useful, uses, using, usually, v, value, various, versus, very, via, viz, vs, w, want, wants, was, wasn\'t, way, we, we\'d, welcome, well, we\'ll, went, were, we\'re, weren\'t, we\'ve, what, whatever, what\'ll, what\'s, what\'ve, when, whence, whenever, where, whereafter, whereas, whereby, wherein, where\'s, whereupon, wherever, whether, which, whichever, while, whilst, whither, who, who\'d, whoever, whole, who\'ll, whom, whomever, who\'s, whose, why, will, willing, wish, with, within, without, wonder, won\'t, would, wouldn\'t, x, y, yes, yet, you, you\'d, you\'ll, your, you\'re, yours, yourself, yourselves, you\'ve, z, zero';
$config->ilinks_mode = '1';
$config->ilinks_area = '1';
$config->ilinks_components = '[\"com_content\"]';
$config->ilinks_enable_cats = '0';
$config->ilinks_in_cats = '0';
$config->ilinks_case = '1';
$config->ilinks_published = '1';
$config->ilinks_nofollow = '0';
$config->ilinks_blank = '0';
$config->ilinks_limit = '10';
$config->bookmarks_mode = '1';
$config->bookmarks_area = '1';
$config->bookmarks_components = '[\"com_content\"]';
$config->bookmarks_enable_cats = '0';
$config->bookmarks_in_cats = '0';
$config->bookmarks_twitter = '';
$config->bookmarks_addthis = '';
$config->bookmarks_taf = '';
$config->bookmarks_icons_pos = '2';
$config->bookmarks_icons_txt = 'Share:';
$config->bookmarks_icons_line = '35';
$config->bookmarks_published = '1';
$config->bookmarks_type = 'icon';
$config->ui_cpanel = '2';
$config->ui_sef_language = '0';
$config->ui_sef_published = '1';
$config->ui_sef_used = '1';
$config->ui_sef_locked = '1';
$config->ui_sef_blocked = '0';
$config->ui_sef_cached = '1';
$config->ui_sef_date = '0';
$config->ui_sef_hits = '1';
$config->ui_sef_id = '0';
$config->ui_moved_published = '1';
$config->ui_moved_hits = '1';
$config->ui_moved_clicked = '1';
$config->ui_moved_cached = '1';
$config->ui_moved_id = '1';
$config->ui_metadata_keys = '1';
$config->ui_metadata_published = '1';
$config->ui_metadata_cached = '1';
$config->ui_metadata_id = '0';
$config->ui_sitemap_title = '1';
$config->ui_sitemap_published = '1';
$config->ui_sitemap_id = '1';
$config->ui_sitemap_parent = '1';
$config->ui_sitemap_order = '1';
$config->ui_sitemap_date = '1';
$config->ui_sitemap_frequency = '1';
$config->ui_sitemap_priority = '1';
$config->ui_sitemap_cached = '1';
$config->ui_tags_published = '1';
$config->ui_tags_ordering = '1';
$config->ui_tags_cached = '1';
$config->ui_tags_hits = '1';
$config->ui_tags_id = '0';
$config->ui_ilinks_published = '1';
$config->ui_ilinks_nofollow = '1';
$config->ui_ilinks_blank = '1';
$config->ui_ilinks_limit = '1';
$config->ui_ilinks_cached = '1';
$config->ui_ilinks_id = '1';
$config->ui_bookmarks_published = '1';
$config->ui_bookmarks_id = '1';

require_once(JPATH_ADMINISTRATOR . '/components/com_acesef/library/utility.php');
AcesefUtility::storeConfig($config);

/***********************************************************************************************
* ---------------------------------------------------------------------------------------------
* OUTPUT TO SCREEN
* ---------------------------------------------------------------------------------------------
***********************************************************************************************/
$rows = 0;
?>
<img src="components/com_acesef/assets/images/logo.png" alt="Joomla! SEO Suite" width="60" height="89" align="left" />

<h2>AceSEF Installation</h2>
<h2><a href="index.php?option=com_acesef">Go to AceSEF Control Panel</a></h2>
<table class="adminlist">
	<thead>
		<tr>
			<th class="title" colspan="2"><?php echo JText::_('Extension'); ?></th>
			<th width="30%"><?php echo JText::_('Status'); ?></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="3"></td>
		</tr>
	</tfoot>
	<tbody>
		<tr>
			<th colspan="3"><?php echo JText::_('Core'); ?></th>
		</tr>
		<tr class="row0">
			<td class="key" colspan="2"><?php echo 'AceSEF '.JText::_('Component'); ?></td>
			<td><strong><?php echo JText::_('Installed'); ?></strong></td>
		</tr>
	<?php
if (count($status->adapters)) : ?>
		<tr class="row1">
			<td class="key" colspan="2"><?php echo 'AceSEF Adapter'; ?></td>
			<td><strong><?php echo JText::_('Installed'); ?></strong></td>
		</tr>
	<?php
endif;
if (count($status->extensions)) : ?>
		<tr>
			<th colspan="3"><?php echo JText::_('AceSEF Extension'); ?></th>
		</tr>
	<?php foreach ($status->extensions as $extension) : ?>
		<tr class="row<?php echo (++ $rows % 2); ?>">
			<td class="key" colspan="2"><?php echo $extension['name']; ?></td>
			<td><strong><?php echo JText::_('Installed'); ?></strong></td>
		</tr>
	<?php endforeach;
endif;
if (count($status->modules)) : ?>
		<tr>
			<th><?php echo JText::_('Module'); ?></th>
			<th colspan="2"><?php echo JText::_('Client'); ?></th>
		</tr>
	<?php foreach ($status->modules as $module) : ?>
		<tr class="row<?php echo (++ $rows % 2); ?>">
			<td class="key"><?php echo $module['name']; ?></td>
			<td class="key"><?php echo ucfirst($module['client']); ?></td>
			<td><strong><?php echo JText::_('Installed'); ?></strong></td>
		</tr>
	<?php endforeach;
endif;
if (count($status->plugins)) : ?>
		<tr>
			<th><?php echo JText::_('Plugin'); ?></th>
			<th colspan="2"><?php echo JText::_('Group'); ?></th>
		</tr>
	<?php foreach ($status->plugins as $plugin) : ?>
		<tr class="row<?php echo (++ $rows % 2); ?>">
			<td class="key"><?php echo ucfirst($plugin['name']); ?></td>
			<td class="key"><?php echo ucfirst($plugin['group']); ?></td>
			<td><strong><?php echo JText::_('Installed'); ?></strong></td>
		</tr>
	<?php endforeach;
endif;
 ?>

	</tbody>
</table>