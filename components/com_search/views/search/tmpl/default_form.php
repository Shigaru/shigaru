<?php defined('_JEXEC') or die('Restricted access'); ?>
<script>
	jQuery(document).ready(function() {	
			var availableTags =  <?php echo $this->getGruopAndBandNames(); ?>;
			jQuery( "#searchinputcat" ).autocomplete({
					source: availableTags
				});
		});
</script>
<div id="searchtabs">
	<ul>
		<li><a href="#tabs-1"><?php echo JText::_( 'Quick Search' ); ?></a></li>
		<li><a href="#tabs-2"><?php echo JText::_( 'Category Search' ); ?></a></li>
	</ul>
	<div id="tabs-1">
		<div id="quicksearch">
			<span class="mtop12"><?php echo JText::_('Type at least the first 3 letters of the name of a band or song and watch how the system suggests stuff for you to watch. Or simply click "Go" if you know what you’re looking for!'); ?></span>
			<form class="mtop12 mbot12" id="searchForm" action="<?php echo JRoute::_( 'index.php?option=com_search' );?>" method="post" name="searchForm">
					<input type="text" name="searchword" id="searchinput" size="30" maxlength="20" value="<?php echo $this->escape($this->searchword); ?>" class="inputbox w70pc" />
					<input id="searchgo" class="button fnone" type="submit" onclick="this.form.submit();" value="<?php echo JText::_('Go'); ?>" name="Submit">
					<input type="hidden" name="task"   value="search" />
			</form>
			<?php echo JText::_('Recently searched >>'); ?> <?php echo $this->getLatestSearchs(); ?></dd>
		</div>
    </div>
    <div id="tabs-2">
		<div id="quicksearch">
			<span class="mtop12"><?php echo JText::_('Search our growing multi-lingual video library for music tutorials. Various instruments, levels, styles and genres.'); ?></span>
			<form class="mtop12 mbot12" id="searchForm" action="<?php echo JRoute::_( 'index.php?option=com_search' );?>" method="post" name="searchForm">
				<div class="">
					<div class="fleft w45 mbot6 mright6">
						<div class="fleft w50 tright pad2">
							<label for="username" class="w40pc">
							<?php echo JText::_( 'Instrument' ); ?>: 
							</label>
						</div>
						<?php echo $this->instrumentsCombo; ?>
					</div>	
					<div class="fleft w45 mbot6">
						<div class="fleft w40pc tright pad2">
							<label for="username">
							<?php echo JText::_( 'Language' ); ?>:
							</label>
						</div>
						<?php echo $this->languagesCombo; ?>
					</div>
					<div class="fleft w45 mbot6 mright6">
						<div class="fleft w50 tright pad2">
							<label for="username">
							<?php echo JText::_( 'Genre' ); ?>:
							</label>
						</div>
						<?php echo $this->genresCombo; ?>
					</div>	
					<div class="fleft w45 mbot6">
						<div class="fleft w40pc tright pad2">
							<label for="username">
							<?php echo JText::_( 'Level' ); ?>:
							</label>
						</div>
						<?php echo $this->levelsCombo; ?>
					</div>
				</div>
				
				<div class="clear">	
					<div class="fleft w227 tright pad2">
						<label for="username">
						<?php echo JText::_( 'Song Title/Artist or Group' ); ?>:
						</label>
					</div>	
					<input type="text" name="searchword" id="searchinputcat" size="30" maxlength="20" value="<?php echo $this->escape($this->searchword); ?>" class="searchinput inputbox w50" />
					<input id="searchgo" class="button fnone" type="submit" onclick="this.form.submit();" value="<?php echo JText::_('Go'); ?>" name="Submit">
					<input type="hidden" name="task"   value="search" />
				</div>	
			</form>
			<span class="searchLabels"><?php echo JText::_('Recently searched >>'); ?></span> <?php echo $this->getLatestSearchs(); ?></dd>
		</div>
			
    </div>
</div>    
<?php echo $this->lists['searchphrase']; ?>
					<?php echo JText::_( 'Search Keyword' ) .' <b>'. $this->escape($this->searchword) .'</b>'; ?>
					<?php echo $this->result; ?>
			<br />
			<?php if($this->total > 0) : ?>
			<div align="center">
				<div style="float: right;">
					<label for="limit">
						<?php echo JText::_( 'Display Num' ); ?>
					</label>
					<?php echo $this->pagination->getLimitBox( ); ?>
				</div>
				<div>
					<?php echo $this->pagination->getPagesCounter(); ?>
				</div>
			</div>
			<?php endif; ?>
