<?php defined('_JEXEC') or die('Restricted access'); ?>
	<div class="clear">dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
		<?php
		foreach( $this->results as $result ) : ?>
		
			<div class="searchResultItem">
				<div>
					<span class="small<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
						<?php echo $this->pagination->limitstart + $result->count.'. ';?>
					</span>
					<?php if ( $result->href ) :
						if ($result->browsernav == 1 ) : ?>
							<a href="<?php echo JRoute::_($result->href); ?>" target="_blank">
						<?php else : ?>
							<a href="<?php echo JRoute::_($result->href); ?>">
						<?php endif;

						echo $this->escape($result->title);

						if ( $result->href ) : ?>
							</a>
						<?php endif;
						if ( $result->section ) : ?>
							<br />
							<span class="small<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
								(<?php echo $this->escape($result->section); ?>)
							</span>
						<?php endif; ?>
					<?php endif; ?>
				</div>
				<div>
					<?php echo $result->text; ?>
				</div>
				<?php
					if ( $this->params->get( 'show_date' )) : ?>
				<div class="small<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
					<?php echo $result->created; ?>
				</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
		</div>sdadasdasde
			<div align="center">
				<?php echo $this->pagination->getPagesLinks( ); ?>
			</div>
