<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class acypictHelper{
	var $error;
	var $maxHeight;
	var $maxWidth;
	function acypictHelper(){
		jimport('joomla.filesystem.file');
	}
	function available(){
		if(!function_exists('gd_info')){
			$this->error = 'The GD library is not installed.';
			return false;
		}
		if(!function_exists('getimagesize')){
			$this->error = 'Cound not find getimagesize function';
			return false;
		}
		return true;
	}
	function generateThumbnail($picturePath){
 		list($currentwidth, $currentheight) = getimagesize($picturePath);
 		$factor = min($this->maxWidth/$currentwidth,$this->maxHeight/$currentheight);
		if($factor>=1) return false;
		$newWidth = $currentwidth*$factor;
		$newHeight = $currentheight*$factor;
		$filename = basename($picturePath);
		$extension = strtolower(substr($filename,strrpos($filename,'.')+1));
		$name = strtolower(substr($filename,0,strrpos($filename,'.')));
		$newImage = $name.'thumb'.$this->maxWidth.'.'.$extension;
		$newFile = dirname($picturePath).DS.$newImage;
		if(file_exists($newFile)) return array('file' => $newFile,'width' => $newWidth,'height' => $newHeight);
		switch($extension){
			case 'gif':
				$img = ImageCreateFromGIF($picturePath);
				break;
			case 'jpg':
			case 'jpeg':
				$img = ImageCreateFromJPEG($picturePath);
				break;
			case 'png':
				$img = ImageCreateFromPNG($picturePath);
				break;
			default:
				return false;
		}
		$thumb = ImageCreateTrueColor($newWidth, $newHeight);
		ImageCopyResized($thumb, $img, 0, 0, 0, 0, $newWidth, $newHeight,$currentwidth, $currentheight);
		switch($extension){
			case 'gif':
				$status = imagegif($thumb, $newFile);
				break;
			case 'jpg':
			case 'jpeg':
				$status = imagejpeg($thumb, $newFile,100);
				break;
			case 'png':
				$status = imagepng($thumb, $newFile,0);
				break;
		}
		imagedestroy($thumb);
		imagedestroy($img);
		if(!$status) return false;
		return array('file' => $newFile,'width' => $newWidth,'height' => $newHeight);
	}
}
