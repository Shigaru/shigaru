<?php defined('_JEXEC') or die('Restricted access'); ?>
<script>
	jQuery(document).ready(function() {	
			/*var availableTags =  <?php echo $this->getGruopAndBandNames(); ?>;
			jQuery( "#searchinputcat" ).autocomplete({
					source: availableTags
				});*/
			//jQuery('#searchtabs').shigaruTabs({slidesWrapper:'.searchtabs',slidesSelector:'.quicksearch',effect:'fade'});	
		});
</script>
<div class="searchwrapper">
<div class="f90">
<div id="searchtabs">
	<!--<ul>
		<li class="selected"><a href="#quicksearch"><?php echo JText::_( 'Quick Search' ); ?></a></li>
		<li><a href="#catsearch"><?php echo JText::_( 'Category Search' ); ?></a></li>
	</ul>
	<div class="searchtabs" id="tabs-1">-->
		<div id="quicksearch" class="quicksearch">
			<span class="mtop12"><?php echo JText::_('Start typing and see our suggestions...'); ?></span>
			<form class="mtop12 mbot12" id="searchForm" action="<?php echo JRoute::_( 'index.php?option=com_search' );?>" method="post" name="searchForm">
				<div class="w50 fleft">
					<input type="text" name="searchword" id="searchinput" maxlength="20" value="<?php echo $this->escape($this->searchword); ?>" class="inputbox" />
					<button id="searchgo" class= button fnone" type="submit" onclick="this.form.submit();" name="Submit"><span class="gbqfi"></span></button>
					<input type="hidden" name="task"   value="search" />
				</div>	
				<div class="search-results-filter-categories fleft" style="display: block; ">
					<p class="search-results-categories search-results-category-default_collection">
						<input name="search-results-category" type="checkbox" checked="" id="search-results-input-category-default_collection" value="default_collection" style="position: absolute; left: -9999px; ">
						<span class="styledCheckbox styledCheckboxChecked" for="search-results-input-category-default_collection">
							<label for="search-results-input-category-default_collection">Videos </label>
						</span>
					</p>
					<p class="search-results-categories search-results-category-smartphones">
						<input name="search-results-category" type="checkbox" id="search-results-input-category-smartphones" value="smartphones" style="position: absolute; left: -9999px; ">
						<span class="styledCheckbox" for="search-results-input-category-smartphones">
							<label for="search-results-input-category-smartphones">Comments </label>
						</span>
					</p>
					<p class="search-results-categories search-results-category-help search-results-categories-last">
						<input name="search-results-category" type="checkbox" id="search-results-input-category-help" value="help" style="position: absolute; left: -9999px; ">
						<span class="styledCheckbox" for="search-results-input-category-help">
							<label for="search-results-input-category-help">Users</label>
						</span>
					</p>
					<p class="search-results-categories search-results-category-help search-results-categories-last">
						<input name="search-results-category" type="checkbox" id="search-results-input-category-help" value="help" style="position: absolute; left: -9999px; ">
						<span class="styledCheckbox" for="search-results-input-category-help">
							<label for="search-results-input-category-help">All</label>
						</span>
					</p>
				</div>		
			</form>
			<!--<?php echo JText::_('Recently searched >>'); ?> <?php echo $this->getLatestSearchs(); ?></dd>-->
		</div>
    <!--</div>
    <div class="searchtabs" id="tabs-2">
		<div id="catsearch" class="quicksearch">
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
		-->	
    
</div>    

</div> 

