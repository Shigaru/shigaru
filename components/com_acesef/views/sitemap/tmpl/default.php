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

<?php if ($this->params->get('show_page_title', 1)) { ?>
	<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
<?php } ?>

<table  width="100%" cellpadding="4" cellspacing="0" border="0" align="center">
	<?php
	for ($i = 0, $n=count($this->items); $i <  $n; $i ++) {
		$row = &$this->items[$i];
		?>
			<tr>
				<td>
					<?php echo $row->title;?>
				</td>
			</tr>
		<?php
	}
	?>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="center" class="sectiontablefooter<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
			<?php echo $this->pagination->getPagesLinks(); ?>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>