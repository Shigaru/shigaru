<?php defined('_JEXEC') or die('Restricted access'); ?>
	<div class="contentpaneopen clear">
		<div id="resultwrapper">
		<?php
		foreach( $this->results as $result ) : ?>
		
			<div class="searchResultItem">
				<div>
					<!--
					<span class="small<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
						<?php echo $this->pagination->limitstart + $result->count.'. ';?>
					</span>
					-->
					
					<div class='searchResultInfo f80'>	
							<div class="fleft mright24 mtopl6">
								<div>
										<label for="plays" class="searchLabels">
											<?php echo JText::_( 'Plays' ); ?>:
										<div class="boxwhite pad2 tright"><?php echo $this->escape($result->number_of_views); ?></div>
										</label>
									</div>
									<div>
										<label for="username" class="searchLabels">
										<?php echo JText::_( 'Rating' ); ?>:<br />
										<div class="boxwhite pad2"><?php echo $result->rating; ?></div>
										</label>
									</div>
									<div>
										<label for="username" class="searchLabels">
										<?php echo JText::_( 'Comments' ); ?>:<br />
										<div class="boxwhite pad2 tright"><?php echo $result->number_of_comments; ?></div>
										</label>
									</div>
							</div>		
							<div class="fleft w70pc pad6 boxwhite">	
								<div class="mbot12">	
									<div class="mbot20">
										<label for="title" class="searchLabels">
										<?php echo JText::_( 'Video Title' ); ?>:
										</label>
										<span id="videosearchtitle"><?php echo $this->escape($result->title);?></span>
									</div>	
									<div class="mbot20">
										<label for="username" class="searchLabels">
										<?php echo JText::_( 'Shared By' ); ?>:
										</label>
										<a href="<?php echo $this->escape($result->userlink); ?>" class="">
										<span id="videosearchusername"><?php echo $this->escape($result->username); ?></span>
										</a>
									</div>	
								</div>		
								<div class="horizontal-rule"></div>
								<div class="padtop12">
									<div class="fleft w20pc">
										<label for="username" class="searchLabels">
										<?php echo JText::_( 'Instrument' ); ?>: <br />
										</label>
										<?php echo $this->escape($result->instrument); ?>
									</div>	
									<div class="fleft w20pc">
										<label for="username" class="searchLabels">
										<?php echo JText::_( 'Genre' ); ?>:<br />
										</label>
										<?php echo $this->escape($result->genre); ?>
									</div>	
									<div class="fleft w20pc">
										<label for="username" class="searchLabels">
										<?php echo JText::_( 'Level' ); ?>:<br />
										</label>
										<?php echo $this->escape($result->level); ?>
									</div>	
									<div class="fleft w20pc">
										<label for="username" class="searchLabels">
										<?php echo JText::_( 'Language' ); ?>:<br />
										</label>
										<?php echo $this->escape($result->language); ?>
									</div>	
									
									<!--<div class="clear"></div>-->
								</div>
									
							</div>	
							<div class="searchResultThumb mtop6 mright12">
									<a href="<?php echo JRoute::_($result->href); ?>" title="<?php echo $this->escape($result->description); ?>"><span class="thumbplay"></span></a>
									<div class="song_options">
										<a class="collection  textToggle"></a>
										<a class="options"></a>
									</div>
									<a rel="1" class="play paused"></a>
									<a href="<?php echo JRoute::_($result->href); ?>" title="<?php echo $this->escape($result->description); ?>">
										<img class="bradius5" src="<?php echo $result->thumbnail; ?>" alt="<?php echo $this->escape($result->description); ?>" border="0" />
									</a>	
								</div>	
					</div>					
				</div>
				
				<div class="clear">
					<!--<?php echo $result->text; ?>-->
				</div>
				
				<?php
					if ( $this->params->get( 'show_date' )) : ?>
				<div class="small<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
					<?php echo $result->created; ?>
				</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
		</div>
			<div id="searchpages" align="center">
				<?php echo $this->pagination->getPagesLinks( ); ?>
			</div>
</div>
