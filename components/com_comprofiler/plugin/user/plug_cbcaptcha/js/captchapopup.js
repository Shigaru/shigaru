/**
* Joomla/Mambo Community Builder User Plugin: plug_cbcaptcha
* @version $Id$
* @package plug_cbcaptcha
* @subpackage captchapopup.js
* @author Nant and Beat
* @copyright (C) Nant, JoomlaJoe and Beat, www.joomlapolis.com
* @license Limited  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL v2
* @final 2.0
*/

function CAPTCHAHTMLPOPUP(htmlcode,windowwidth,windowheight,uniqueid) {
	var popwinwidth = Number(windowwidth);
	var popwinheight = Number(windowheight);
	var PopWin = window.open('',uniqueid,'top=0,left=0,position=0,width='+popwinwidth+',height='+popwinheight+',resizable=1,scrollbars=1,titlebar=0,toolbar=0,menubar=0,status=0,directories=0'); 
	PopWin.focus();
	PopWin.document.write(htmlcode);
	PopWin.document.close();
}