<?php
/*

 JComments UTF-8 Convert
 Based on utf8 1.0 by Alexander Minkovsky (a_minkovsky@hotmail.com)

---------------------------------------------------------------------------------
Version:        1.0
Date:           23 November 2004
---------------------------------------------------------------------------------
Author:         Alexander Minkovsky (a_minkovsky@hotmail.com)
---------------------------------------------------------------------------------
License:        Choose the more appropriated for You - I don't care.
---------------------------------------------------------------------------------
Description:
    Class provides functionality to convert single byte strings, such as CP1251
    ti UTF-8 multibyte format and vice versa.
    Class loads a concrete charset map, for example CP1251.
    (Refer to ftp://ftp.unicode.org/Public/MAPPINGS/ for map files)
    Directory containing MAP files is predefined as constant.
    Each charset is also predefined as constant pointing to the MAP file.
*/

define('CONVERT_TABLES_DIR', dirname( __FILE__ ) . '/ConvertTables/' );
define('ERR_OPEN_MAP_FILE', 'ERR_OPEN_MAP_FILE');

class JCommentsUtf8{

	var $charset = null;
	var $ascMap = array();
	var $utfMap = array();

	function JCommentsUtf8($charset){
		$this->loadCharset($charset);
	}

	function &getInstance( $charset ) {
		static $instance;

		if (!is_object( $instance )) {
			$instance = new JCommentsUtf8( $charset );
		}
		return $instance;
	}

	function loadCharset($charset){
		
		$charsetFilename = CONVERT_TABLES_DIR . $charset;

		if (!is_file( $charsetFilename ) ) {
			$this->onError(ERR_OPEN_MAP_FILE, 'Failed to open map file for ' . $charset);
			return;
		}
    
		if (empty($this->ascMap[$charset])) {
			$lines = file_get_contents( $charsetFilename );
			$lines = preg_replace('/#.*$/m', '',$lines);
			$lines = preg_replace("/\n\n/", '',$lines);
			$lines = explode("\n",$lines);
			foreach($lines as $line){
				$parts = explode('0x',$line);
				if(count($parts)==3){
					$asc=hexdec(substr($parts[1],0,2));
					$utf=hexdec(substr($parts[2],0,4));
					$this->ascMap[$charset][$asc]=$utf;
				}
			}
		}
    
		$this->charset = $charset;
		$this->utfMap = array_flip($this->ascMap[$charset]);
	}

	function onError($err_code,$err_text){
		print($err_code . ' : ' . $err_text . "<hr>\n");
	}

	function strToUtf8($str){
		if ( count($this->ascMap) > 0 ) {
			$chars = unpack('C*', $str);
			$cnt = count($chars);
			for($i=1;$i<=$cnt;$i++) $this->_charToUtf8($chars[$i]);
			return implode('',$chars);
		} else {
			return $str;
		}
	}

	function utf8ToStr($utf){
		if (count($this->utfMap) > 0) {
			$chars = unpack('C*', $utf);
			$cnt = count($chars);
			$res = '';
			for ($i=1;$i<=$cnt;$i++){
				$res .= $this->_utf8ToChar($chars, $i);
			}
			return $res;
		}
		return $utf;
	}

	function _charToUtf8(&$char){
		$c = (int)$this->ascMap[$this->charset][$char];
		if ($c < 0x80) {
			$char = chr($c);
		} else if($c<0x800) { // 2 bytes
			$char = (chr(0xC0 | $c>>6) . chr(0x80 | $c & 0x3F));
		} else if($c<0x10000) { // 3 bytes
			$char = (chr(0xE0 | $c>>12) . chr(0x80 | $c>>6 & 0x3F) . chr(0x80 | $c & 0x3F));
		} else if($c<0x200000) { // 4 bytes
			$char = (chr(0xF0 | $c>>18) . chr(0x80 | $c>>12 & 0x3F) . chr(0x80 | $c>>6 & 0x3F) . chr(0x80 | $c & 0x3F));
		}
	}

	function _utf8ToChar(&$chars, &$idx){
		if(($chars[$idx] >= 240) && ($chars[$idx] <= 255)){ // 4 bytes
			$utf =  (intval($chars[$idx]-240)   << 18) +
				(intval($chars[++$idx]-128) << 12) +
				(intval($chars[++$idx]-128) << 6) +
				(intval($chars[++$idx]-128) << 0);
		}
		else if (($chars[$idx] >= 224) && ($chars[$idx] <= 239)){ // 3 bytes
			$utf =  (intval($chars[$idx]-224)   << 12) +
				(intval($chars[++$idx]-128) << 6) +
				(intval($chars[++$idx]-128) << 0);
		}
		else if (($chars[$idx] >= 192) && ($chars[$idx] <= 223)){ // 2 bytes
			$utf =  (intval($chars[$idx]-192)   << 6) +
				(intval($chars[++$idx]-128) << 0);
		}
		else{ // 1 byte
			$utf = $chars[$idx];
		}

    		if(array_key_exists($utf,$this->utfMap))
			return chr($this->utfMap[$utf]);
		else
			return '?';
	}

	function encodingFailed( $string )
	{
	        $length = strlen($string);
	        $countUndefined = 0;

	        for ($i=0;$i<$length;$i++) {
	        	if ($string[$i] == '?') {
	        		$countUndefined++;
	        	}
	        }

		return intval($countUndefined > $length/2);
	}

	function utf8_to_unicode( $str )
	{
		$unicode = array();        
		$values = array();
		$lookingFor = 1;
        
		for ($i = 0; $i < strlen( $str ); $i++ ) {
			$thisValue = ord( $str[ $i ] );
	
			if ( $thisValue < 128 ) {
				$unicode[] = $thisValue;
			} else {
		                if ( count( $values ) == 0 ) {
	                	$lookingFor = ( $thisValue < 224 ) ? 2 : 3;
				}
                
				$values[] = $thisValue;
                
				if ( count( $values ) == $lookingFor ) {
					$number = ( $lookingFor == 3 ) ?
					( ( $values[0] % 16 ) * 4096 ) + ( ( $values[1] % 64 ) * 64 ) + ( $values[2] % 64 ):
					( ( $values[0] % 32 ) * 64 ) + ( $values[1] % 64 );
					
					$unicode[] = $number;
					$values = array();
					$lookingFor = 1;
				}
            		}
        	}
		return $unicode;
	}

	function unicode_to_entities( $unicode )
	{
        	$entities = '';
        	foreach( $unicode as $value ) {
        		$entities .= ($value > 127) ? '&#' . $value . ';' : chr($value);
		}
		return $entities;
	}

	function utf8_to_entities($string)
	{
		$unicode = JCommentsUtf8::utf8_to_unicode($string);
		return JCommentsUtf8::unicode_to_entities($unicode);
	}
}
?>