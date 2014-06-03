<?php defined('_JEXEC') or die('Restricted access'); ?>
<div class="workarea">
	<div class="workarea_wrapper">
	 <div id="contact_form_holder"  class="bbwhite w70 mbot20">
			<h3 class="pad12 fontbold f120"><?php echo JText::_('SHIGCONTACT_CONTACTUS') ?></h3>
				<form action="index.php?option=com_shigarucontact&task=sendcontactmessage&lang=<?php echo $this->currentlang; ?>" method="post" class="w80pc mleft20" id="contact_form">
				  <div class="clearfix <?php if(!$this->islogged) echo 'dispnon'; ?>">
					 <div id="name_error" class="error dispnon pad6 f80"> <?php echo JText::_('SHIGCONTACT_NAMEERROR') ?></div> 
					 <div class="input-prepend">
						<span class="add-on"><i class="icon-user"></i></span>
						<input class="span2" name="name" id="name" type="text" value="<?php echo $this->user->username ?>" placeholder="<?php echo JText::_('SHIGCONTACT_PLACENAME') ?>">
					</div>
				  </div>
				  <div class="clearfix <?php if(!$this->islogged) echo 'dispnon'; ?>">
					 <div id="email_error" class="error dispnon pad6 f80"> <?php echo JText::_('SHIGCONTACT_EMAILERROR') ?></div>  
					 <div class="input-prepend">
						<span class="add-on"><i class="icon-envelope"></i></span>
						<input class="span2" name="email" id="email" value="<?php echo $this->user->email ?>" type="text" placeholder="<?php echo JText::_('SHIGCONTACT_PLACEEMAIL') ?>">
					</div>
				  </div>
				  <div class="clearfix">
					 <div id="subject_error" class="error dispnon pad6 f80"> <?php echo JText::_('SHIGCONTACT_SUBJECTERROR') ?></div>  
					 <div class="input-prepend">
						<span class="add-on"><i class="icon-tags"></i></span>
						<input class="span2" name="subject" id="subject" type="text" placeholder="<?php echo JText::_('SHIGCONTACT_PLACESUBJECT') ?>">
					</div>
				  </div>
				  <div class="clearfix">
					  <div id="message_error" class="error dispnon pad6 f80"> <?php echo JText::_('SHIGCONTACT_MESSAGEERROR') ?></div> 
					  <div class="input-prepend clearfix">
						<span class="fleft add-on"><i class="icon-pencil"></i></span>
						<div class="fleft"><?php echo $this->description; ?></div>
					  </div>
					  <div class="clearfix">
						<div class="f150 ml35pt">
							<input type="submit" id="send_message" class="fontbold btn btn-danger" value="<?php echo JText::_('SHIGCONTACT_SENDMESSAGEBUTTON') ?>">
						</div>
					  </div>
				  </div>
				</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="components/com_shigarucontact/views/shigarucontact/tmpl/js/shigarucontact.js"></script>
