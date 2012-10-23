<?php defined('_JEXEC') or die('Restricted access'); ?>
	<div class="contentpaneopen clear">
		
		<div id="resultfilters">
			<div>
				<h4>Filters</h4>
			</div>	
			<div id="homeTypeGroup" class="filter">
				<label>Difficulty level</label>
				<div id="ihomeTypeGroup" class="widget">
					<label>
					<input type="checkbox" name="adfilter_homes" id="homes" value="1"><a href="#">Absolute Beginner</a>
					</label>
					<label>
					<input type="checkbox" name="adfilter_chalets" id="chalets" value="2"><a href="#">Beginner</a>
					</label>
					<label>
					<input type="checkbox" name="adfilter_countryhouses" id="countryhouses" value="3"><a href="#">Intermediate</a>
					</label>
					<label>
					<input type="checkbox" name="adfilter_duplex" id="duplex" value="1"><a href="#">Upper Intermediate</a>
					</label>
					<label>
					<input type="checkbox" name="adfilter_penthouse" id="penthouse" value="1"><a href="#">Expert</a>
					</label>
				</div>
			</div>
			<div id="builttype" class="filter">
				<label>
				Type of video
				</label>
				<div id="builttype" class="widget">
					<label for="iadfilter_builttype_default">
					<input type="radio" value="default" id="iadfilter_builttype_default" name="adfilter_builttype" checked="checked"><span><a href="#">All</a></span></label><label for="iadfilter_builttype_2">
					<input type="radio" value="2" id="iadfilter_builttype_2" name="adfilter_builttype"><span><a href="#">Tutorial - How to play a song/tune</a></span></label><label for="iadfilter_builttype_3">
					<input type="radio" value="3" id="iadfilter_builttype_3" name="adfilter_builttype"><span><a href="#">Music Theory Tutorial</a></span></label><label for="iadfilter_builttype_1">
					<input type="radio" value="1" id="iadfilter_builttype_1" name="adfilter_builttype"><span><a href="#">Non Tutorial (Watch me play!)</a></span></label>
				</div>
			</div>
			<div id="builttype" class="filter">
				<label>
				Genre
				</label>
				<div id="builttype" class="widget">
					<?php echo $this->genresCombo; ?>
				</div>
				
			</div>
			<div id="builttype" class="filter">
				<label>
				Language
				</label>
				<div id="builttype" class="widget">
					<?php echo $this->languagesCombo; ?>
				</div>
				
			</div>
			<div id="builttype" class="filter">
				<label>
				<?php echo JText::_( 'Instrument' ); ?>
				</label>
				<div id="builttype" class="widget">
					<?php echo $this->instrumentsCombo; ?>
				</div>
				
			</div>
			
			<div id="builttype" class="filter">
				<label>
				Date
				</label>
				<div id="builttype" class="widget">
					<label for="iadfilter_builttype_default">
					<input type="radio" value="default" id="iadfilter_builttype_default" name="adfilter_builttype" checked="checked"><span><a href="#">Anytime</a></span></label><label for="iadfilter_builttype_2">
					<input type="radio" value="2" id="iadfilter_builttype_2" name="adfilter_builttype"><span><a href="#">Last week</a></span></label><label for="iadfilter_builttype_3">
					<input type="radio" value="3" id="iadfilter_builttype_3" name="adfilter_builttype"><span><a href="#">Last month</a></span></label><label for="iadfilter_builttype_1">
					<input type="radio" value="1" id="iadfilter_builttype_1" name="adfilter_builttype"><span><a href="#">Last year</a></span></label>
				</div>
				
			</div>
			<div id="builttype" class="filter">
				<label>
				Duration
				</label>
				<div id="builttype" class="widget">
					<label for="iadfilter_builttype_default">
					<input type="radio" value="default" id="iadfilter_builttype_default" name="adfilter_builttype" checked="checked"><span><a href="#">All</a></span></label><label for="iadfilter_builttype_2">
					<input type="radio" value="2" id="iadfilter_builttype_2" name="adfilter_builttype"><span><a href="#">Short videos (1-3min)</a></span></label><label for="iadfilter_builttype_3">
					<input type="radio" value="3" id="iadfilter_builttype_3" name="adfilter_builttype"><span><a href="#">Medium videos (3-10min)</a></span></label><label for="iadfilter_builttype_1">
					<input type="radio" value="1" id="iadfilter_builttype_1" name="adfilter_builttype"><span><a href="#">Long videos (+10min)</a></span></label>
				</div>			
			</div>
		</div>	
		<div id="resultwrapper">
			<?php if(strlen($this->escape($this->searchword))> 0) : ?>

			<!--<?php echo $this->lists['searchphrase']; ?>-->
								
								<div class="f15em mbot12 mleft30">
									<?php echo $this->result; ?>
									<?php echo ' <b>'. $this->escape($this->searchword) .'</b>'; ?>
									<?php if($this->total > 0) : ?>
									<span class="f80">
										<?php echo '('.$this->pagination->getPagesCounter().')'; ?>
									</span>
									<?php endif; ?>
								</div>
			<?php endif; ?>
			<div id="resultordering">
					<div>
						<h4>Order by:</h4>
					</div>	
					<a href="#" class="order orderselected">Date uploaded</a>
					<a class="order" href="#">Rating</a>
					<a class="order" href="#">Views</a>
					<?php if($this->total > 0) : ?>
							<div class="fright mright12">
								<label for="limit">
									<?php echo JText::_( 'Display Num' ); ?>
								</label>
								<?php echo $this->pagination->getLimitBox( ); ?>
							</div>
							<div class="clear"></div>
						<?php endif; ?>
			</div>		
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
							<div class="fleft pad6 boxwhite w80pc">	
								<div class="searchResultThumb mtop12 mright12">
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
								<div class="fleft w75">
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
												<div class="fleft mleft12">
													<label for="username" class="searchLabels">
													<?php echo JText::_( 'Instrument' ); ?>: <br />
													</label>
													<?php echo $this->escape($result->instrument); ?>
												</div>	
												<div class="fleft mleft12">
													<label for="username" class="searchLabels">
													<?php echo JText::_( 'Genre' ); ?>:<br />
													</label>
													<?php echo $this->escape($result->genre); ?>
												</div>	
												<div class="fleft mleft12">
													<label for="username" class="searchLabels">
													<?php echo JText::_( 'Level' ); ?>:<br />
													</label>
													<?php echo $this->escape($result->level); ?>
												</div>	
												<div class="fleft mleft12">
													<label for="username" class="searchLabels">
													<?php echo JText::_( 'Language' ); ?>:<br />
													</label>
													<?php echo $this->escape($result->language); ?>
												</div>	
													
												<div class="clear"></div>
											</div>
									</div>
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
		<div id="searchpages" align="center">
				<?php echo $this->pagination->getPagesLinks( ); ?>
			</div>
		</div>
			
		<div class="clear">
		</div>
</div>
</div>
