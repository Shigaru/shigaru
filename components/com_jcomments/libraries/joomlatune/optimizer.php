<?php
/**
 * CSS & JavaScript deflate class
 *
 * @version 1.0
 * @package JoomlaTune.Framework
 * @subpackage Optimizer
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2008 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 * @access public
 */

// Check for double include
if (!defined('JOOMLATUNE_OPTIMIZER')) {
	
	define('JOOMLATUNE_OPTIMIZER', 1);
	
	class JoomlaTuneOptimizer
	{
		/**
		 * Returns a reference to the global JoomlaTuneOptimizer object, 
		 * only creating it if it doesn't already exist.
		 *
		 * @static
		 * @param	string $language
		 * @return	JoomlaTuneLanguage $instance
		 */
		function &getInstance()
		{
			static $instance = null;
			if (!is_object($instance)) {
				$instance = new JoomlaTuneOptimizer();
			}
			return $instance;
		}
		
		function clearJavaScript( $text )
		{
			$text = preg_replace('/\/\*.*?\*\//is', '', $text);
			$text = preg_replace('/\t+/is', ' ', $text);
			$text = preg_replace('/(\r\n)+\s?/is', '\\1', $text);
			return $text;
		}
		
		function compress( $files, $type = 'plain' )
		{
			$data = '';
			$lastModified = 0;
			
			if (is_array($files)) {
				foreach ($files as $file) {
					if (is_file($file)) {
						$data .= trim(file_get_contents($file));
						
						$modified = filemtime($file);
						if ($modified !== false && $modified > $lastModified) {
							$lastModified = $modified;
						}
					}
				}
				$hash = md5(implode('', $files));
			} else if (is_file($files)) {
				$hash = md5($files);
				$lastModified = filemtime($files);
				$data = trim(file_get_contents($files));
			}
			
			if ('javascript' == $type) {
				$data = $this->clearJavaScript($data);
			}
			
			$encoding = false;
			
			if (empty($_SERVER['HTTP_ACCEPT_ENCODING'])) {
				$encoding = false;
			} else {
				if (false !== strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
					$encoding = 'gzip';
				}
				if (false !== strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'x-gzip')) {
					$encoding = 'x-gzip';
				}
			}
			
			if (!$encoding || ini_get('zlib.output_compression') || ini_get('output_handler') == 'ob_gzhandler' || !extension_loaded('zlib') || headers_sent()) {
				return $data;
			}
			
			$lastModifiedGMT = gmdate('D, d M Y H:i:s', $lastModified) . ' GMT';
			
			$etag = $hash . '_' . $lastModified;
			
			if (empty($_SERVER['HTTP_IF_NONE_MATCH'])) {
				if (strpos($_SERVER['HTTP_IF_NONE_MATCH'], $etag) !== false) {
					header('Last-Modified: ' . $lastModifiedGMT, true, 304);
					exit();
				}
			}
			
			header('ETag: "' . $etag . '"');
			
			if (empty($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
				if ($lastModified <= strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
					header("Last-Modified: $lastModifiedGMT", true, 304);
					exit();
				}
			}
			
			header('Content-Encoding: ' . $encoding);
			header('Content-Type: text/' . $type);
			header('Content-Length: ' . strlen($data));
			header('Last-Modified: ' . $lastModifiedGMT);
			
			$data = gzencode($data, 9);
			echo $data;
			exit();
		}
	}
}
?>