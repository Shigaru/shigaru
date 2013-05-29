<div id="userdetailsext" class="cbPosHead clearfix">
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
			<div class="clearfix fleft mright12 w30 padright12">
					<div class="">
						<div class="clearfix">
							<h3 class="fleft mleft6">{$username}</h3>
							<div class="fleft f90 userflag24 {$cb_countryflag}_24 mtop12 mleft12"></div> 
						</div>
						<div class="mbot6 mtop12">
									<div class="f90">
										<span class="f90" >{$profileURLText}</span>
									</div>
								</div>
						<div class="well bbwhite f90 pad12 mtop12 mbot6 clearfix">
							<div class="clear">
								<span class="">{$smarty.const._UE_CONNECTION}: </span>
								<span class="fontorange fontbold f120">{$totalfriends}</span>
							</div>
							<div class="fleft f80 mtop12">
								{$connectionsLink}
							</div>
							<div class="fleft">
								{$listfriends}
							</div>
							
						</div>	
					 </div>	
					</div>	
					<div class="fleft w40 f90">
						<!--<div class="well f90 mbot6">
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
						</div>-->
						<div class="well bbwhite f90 pad12">
							<div class="mright6">
								<div class="clearfix f90">
									<div class="fleft w33">
										<div><span class="fontbold">{$smarty.const._UE_PROFILEVIEWS}: </span></div>
										<div><span class="fontorange">{$hits}</span></div>
									</div>
									<div class="fleft w33">
										<div><span class="fontbold">Subscribers: </span></div>
										<div>	
												<span class="fontorange">1234</span> 
												
										</div>
									</div>
									<div class="fleft w33">
										<button type="submit" id="subscribe" class="btn fontblack">
													<i class="icon-signin"></i> Subscribe
										</button>
									</div>
								</div>
								<div class="clearfix f90 mtop12">	
								
									<div class="fleft w33">
										<div><span class="fontbold">{$smarty.const._UE_VIDEOSUBMITED}: </span></div>
										<div><span class="fontorange">{$totalvideos}</span></div>
									</div>
									<div class="fleft w33">
										<div><span class="fontbold">Signed up: </span></div>
										<div><span class="">{$signeup}</span></div>
									</div>
									<div class="fleft w33">
										<div><span class="fontbold">Last login: </span></div>
										<div><span class="">{$lastvisit}</span></div>
									</div>
								</div>							
							</div>
						</div>	
				</div>
					<div class="fleft w25 f90">
						<div class="well bbwhite mleft20 f90">
								<div class="mtop12 mleft20"><span class="fontbold">Follow me on: </span></div>
								<div class="pad12 mright6">{$socialpages}</div>
								
						</div>	
								
					</div>
					
					<div class="clearfix fleft w63">		
							<div class="fleft w33">
								<input type="text" id="mind" class="w90 mtop2 f120" value="" placeholder="Say what's on your mind..."/>
								<button type="submit" id="publishmind" class="dispnon mtopl6 btn fontblack">
													<i class="icon-share-alt icon-large"></i> Publish
								</button>
							</div>
							<div class="fleft w60 f80 mleft20">	
								{if $mind neq ''}
								<h6 class="fontbold fleft">Last update:</h6>
								<div class="mleft20 fleft w70">
									<div class="pad6">
										<div class="fontsoftgrey fleft icon-quote-left icon-2x mright6"></div>
										<div class="fontsoftgrey fleft w80pc pad6 fontgrey tcursive">{$mind}</div>
										<div class="fontsoftgrey fleft mleft6 icon-quote-right icon-2x"></div>
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
			
	</div>		
	
</div>
