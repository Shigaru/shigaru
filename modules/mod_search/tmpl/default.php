<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<dl id="blue">

			  
 
<form action="index.php" method="post">
	<div class="search<?php echo $params->get('moduleclass_sfx') ?>">
		<?php
		    $output = '<dt><input name="searchword" id="mod_search_searchword" maxlength="'.$maxlength.'" alt="'.$button_text.'" class="inputbox'.$moduleclass_sfx.'" type="text" size="'.$width.'" value="'.$text.'"  onblur="if(this.value==\'\') this.value=\''.$text.'\';" onfocus="if(this.value==\''.$text.'\') this.value=\'\';" />';

			if ($button) :
			    if ($imagebutton) :
			        $button = '<button title="'.$button_text.'" class="button" type="submit" onclick="this.form.searchword.focus();"><span><span>'.$button_text.'</span></span></button>';
			    else :
			        $button = '<button title="'.$button_text.'" class="button" type="submit" onclick="this.form.searchword.focus();"><span><span>'.$button_text.'</span></span></button>';
			    endif;
			endif;

			switch ($button_pos) :
			    case 'top' :
				    $button = $button.'<br />';
				    $output = $button.$output;
				    break;

			    case 'bottom' :
				    $button = '<br />'.$button;
				    $output = $output.$button;
				    break;

			    case 'right' :
				    $output = $output.$button;
				    break;

			    case 'left' :
			    default :
				    $output = $button.$output;
				    break;
			endswitch;

			echo $output;
		?>
	</div>
	<input type="hidden" name="task"   value="search" />
	<input type="hidden" name="option" value="com_search" />
	<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
</form>
</dt>
<dd>Recently searched >> </dd>
</dl>


