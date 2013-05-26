<div id="userdetailsext" class="cbPosHead pad12 clearfix">
	<div id="avatarwrap" class="fleft">	
		<div class="clearfix">
			<div class="pad12 well bbwhite"><img class="" src="{$avatar}" alt="Profile picture of {$username}"/></div>	
			<div class="profileoptions btn-group close">
			  <a class="btn" href="#"><i class="icon-cog fontblack"></i> <span class="fontblack">Profile Options</span></a>
			  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
				<span class="icon-caret-down fontblack"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="#"><i class="icon-fixed-width icon-pencil"></i> Edit</a></li>
				<li><a href="#"><i class="icon-fixed-width icon-trash"></i> Delete</a></li>
				<li><a href="#"><i class="icon-fixed-width icon-ban-circle"></i> Ban</a></li>
				<li class="divider"></li>
				<li><a href="#"><i class="i"></i> Make admin</a></li>
			  </ul>
			</div>
		</div>	
		
	</div>
	<div id="moreuserinfowrap" class="fleft clearfix">
			<div class="clearfix">
					<div class="fleft mright12 w40 padright12">
						<div class="clearfix">
							<div class="fleft userflag48 {$cb_countryflag}_48"></div> 
							<h3 class="mleft6">{$username}</h3>
							<div class="mleft6 f90 pad4">
								<span class="fontred" >{$profileURLText}</span>
							</div>
						</div>
						<div class="well bbwhite f90 mtop12 pad12 mbot6">
							<div class="clearfix">
								<div class="fleft w49">
									<div><span class="fontbold">{$smarty.const._UE_PROFILEVIEWS}: </span></div>
									<div><span class="fontorange">{$hits}</span></div>
								</div>
								<div class="fleft w49">
									<div><span class="fontbold">Subscribers: </span></div>
									<div>	
											<span class="fontorange">1234</span> 
											<button type="submit" id="subscribe" class="mleft20 btn fontblack">
												<i class="icon-signin"></i> Subscribe
											</button>
									</div>
								</div>
							</div>
							<div class="clearfix mtop12">	
								<div class="fleft w49">
									<div><span class="fontbold">Signed up: </span></div>
									<div><span class="">{$signeup}</span></div>
								</div>
								<div class="fleft w49">
									<div><span class="fontbold">Last login: </span></div>
									<div><span class="">{$lastvisit}</span></div>
								</div>
							</div>	
							<!--<div class="pad6"><span class="">{$smarty.const._UE_VIDEOSUBMITED}: </span><span class="fontorange fontbold f120">{$totalvideos}</span></div>
							<div class="pad6"><span class="">{$smarty.const._UE_CONNECTION}: </span><span class="fontorange fontbold f120">{$totalfriends}</span></div>-->
						</div>	
						
					</div>	
					<div class="fleft mright12 w54 f90">
						<div class="well f90 mbot6">
							<div class="clearfix mright6">
								<a class="fright mright6 close mtop2" href="#">
									<i class="icon-remove-sign"></i>
								</a>
								<div class="fleft">
									<h6 class="fontdarkgrey f90 pad6">
										<i class="fontblue icon-info-sign mright6"></i> 
										There are {$totalvideossincelastvisit} new videos in Shigaru.com since your
										last visit!
									</h6>
								</div>	
							</div>
						</div>
						<div class="well bbwhite f90 mtop12 pad12 mbot6">
							<div class="mtop12 pad12 mright6">{$socialpages}</div>
						</div>	
						<div class="clearfix">
							<div class="well fleft bbwhite f90 mtop12 pad12 mbot6">
								<div class="mtop12 pad12 mright6">{$socialpages}</div>
							</div>	
							<div class="well bbwhite fleft mleft20 f90 mtop12 pad12 mbot6">
								<div class="mtop12 pad12 mright6">{$socialpages}</div>
							</div>	
						</div>	
				</div>
			</div>
			<div class="well bbwhite">
					<input type="text" id="mind" class="mtop2 f120" value="" placeholder="Say what's on your mind..."/>
						<button type="submit" id="publishmind" class="mtopl6 btn fontblack">
											<i class="icon-share-alt icon-large"></i> Publish
						</button>
						{if $mind neq ''}
						<h6 class="fontbold tcenter">Last Status Update</h6>
						<div class="w100 tcenter">
							<div class="pad6">
								<i class="fontsoftgrey icon-quote-left icon-2x mright6"></i>
								<span class="fontsoftgrey pad6 fontgrey tcursive">{$mind}</span>
								<i class="fontsoftgrey mleft6 icon-quote-right icon-2x"></i>
							</div>
						</div>	
						{else}
						
							<div class="clearfix well mright12">
								<a class="fright mright6 close mtop2" href="#">
									<i class="icon-remove-sign"></i>
								</a>
								<div class="fleft">
									<h6 class="fontdarkgrey f90 pad6">
										<i class="fontblue icon-info-sign mright6"></i> 
										No recent messages... type your status on the box above.
									</h6>
								</div>	
							</div>
						{/if}
				</div>	
	</div>		
	
</div>
