<?php
/**
* @version		1.5.0
* @package		AceSEF
* @subpackage	AceSEF
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

//No Permision
defined('_JEXEC') or die('Restricted access');
?>

<script language="javascript">
	function loadDesc(i) {
		var el = document.getElementById(i);
		<?php if ($this->AcesefConfig->tags_exp_item_desc == 1) { ?>
			el.style.display = '';
		<?php } else { ?>
			el.style.display = 'none';
		<?php } ?>
	}
	
	function toggle(i) {
		var el = document.getElementById(i);
		if (el.style.display != 'none') {
			el.style.display = 'none';
		}
		else {
			el.style.display = '';
		}
	}
</script>

<?php if ($this->params->get('show_page_title', 1)) { ?>
	<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
		<?php echo $this->escape($this->params->get('page_title'));	?>
		<?php if ($this->data && $this->AcesefConfig->tags_show_tag_desc == 1) { ?>
			<h6><?php echo $this->data->description; ?></h6>
		<?php } ?>
	</div>
<?php } ?>
<form action="<?php echo JFilterOutput::ampReplace(JFactory::getURI()->toString()); ?>" method="post" name="adminForm">
	<table width="100%" cellspacing="1">
		<?php
		$k =0;
		static $prefixes = array();
		for ($i = 0, $n=count($this->items); $i <  $n; $i ++) {
			$b = $k + 1;
			$row 		= $this->items[$i];
			$checked 	= JHTML::_('grid.id', $i ,$row->id);
			
			$colspan = 3;
			
			if ($this->AcesefConfig->tags_show_prefix == 1) {
				// Grab the component
				$array1 = explode("option=", $row->url_real);
				$array2 = explode("&", $array1[1]);
				$component = $array2[0];
				
				if (!isset($prefixes[$component])) {
					$params = AcesefCache::getExtensionParams($component);
					$prefixes[$component] = $params->get('tags_prefix', '');
					
					if ($prefixes[$component] == '') {
						$prefixes[$component] = AceDatabase::loadResult("SELECT name FROM #__acesef_extensions WHERE extension = '{$component}'");
					}
				}
				
				$prefix = $prefixes[$component];
			}
		
			?>
			<tr class="sectiontableentry<?php echo $b;?>">
				<td width="20px" align="right">
					<?php echo $this->pagination->getRowOffset($i); ?>&nbsp;
				</td>
				<?php if ($this->AcesefConfig->tags_show_prefix == 1) { ?>
				<td width="80px" align="left">
					<?php echo $prefix; ?>
				</td>
				<?php }	?>
				<td>
					<a href="<?php echo $row->url_sef; ?>"><?php echo $row->title; ?></a>
					<?php if ($this->AcesefConfig->tags_show_item_desc == 1) { ?>
					&nbsp;&nbsp;&nbsp;
					<a href="javascript: void(0);" onClick="javascript: toggle('<?php echo $i; ?>');">
						<img onLoad="javascript: loadDesc('<?php echo $i; ?>');" alt="Show / Hide" src="components/com_acesef/assets/images/toggle.jpg">
					</a>
					<div id="<?php echo $i; ?>">
						<?php echo $row->description; ?>
					</div>
					<?php } ?>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		}
		?>
		<tfoot>
			<tr>
				<td colspan="<?php echo $colspan; ?>" align="center">
					<?php echo $this->pagination->getPagesLinks(); ?>
				</td>
			</tr>
		</tfoot>
	</table>
	<input type="hidden" name="option" value="com_acesef" />
	<input type="hidden" name="view" value="tags" />
</form>