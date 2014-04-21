<div id="userdetailsext" class="cbPosHead clearfix">
	<div id="avatarwrap" class="fleft">	
		<div class="clearfix">
			<div class="pad12 well bbwhite"><img class="" src="{$avatar}" width="140px" alt="Profile picture of {$username}"/></div>	
			<div class="profileoptions btn-group close">
			  <a class="btn" href="#"><i class="icon-cog fontblack"></i> <span class="fontblack">Profile Options</span></a>
			  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
				<span class="icon-caret-down fontblack"></span></a>
				
			  <ul class="dropdown-menu">
				{$userMenu}
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
						<div class="well bbwhite f90 pad12 mtop12 clearfix">
							<div class="clearfix">
								{if $totalfriends gt 0}
								<div class="fright f80">
									{$connectionsLink}
								</div>
								{/if}
								<div class="fleft">
									<span class="">{$smarty.const._UE_CONNECTION}: </span>
									<span class="fontorange fontbold f120">{$totalfriends}</span>
								</div>
							</div>	
							<div class="clear mtop12">
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
										<!--<div><span class="fontbold">Subscribers: </span></div>
										<div>	
												<span class="fontorange">1234</span> 
												
										</div>-->
									</div>
									<div class="fleft w33">
										<!--<button type="submit" id="subscribe" class="btn fontblack">
													<i class="icon-circle-arrow-right fontorange bbwhite"></i> Subscribe
										</button>-->
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
					{if $socialpages neq ''}
						<div class="fleft w25 f90">
							<div class="well bbwhite mleft20 f90">
								<div class="mtop12 mleft20"><span class="fontbold">Follow me on: </span></div>
								<div class="pad12 mright6">{$socialpages}</div>
								
							</div>			
						</div>
					{/if}
					<div class="clearfix fleft w67">
							{if $showown eq 'yes'}
							<div id="statuserror" class="dispnon clear well f80 pad4">
								<a class="fright mright6 close mtop2" href="#">
									<i class="icon-remove-sign"></i>
									
								</a>
								<span class="minlength dispnon">
										<i class="mleft12 fontyellow icon-exclamation-sign"></i> 
										<span class="mleft20">Please enter at least 1 character</span>
								</span>
								<span class="maxlength dispnon">
									<i class="mleft12 fontyellow icon-exclamation-sign"></i> 
									<span class="mleft20">Please enter a maximum of 140 characters</span>
								</span>
							</div>
							<div class="fleft w33">
								<textarea id="mind" class="w90 mtop2 f90" value="" placeholder="Say what's on your mind..."></textarea>
								<div class="dispnon">
									<div class="w49 f80 fleft tright mright6"><span id="statuscharcount" title="Characters remaining" class="bbwhite well pad2 padleft4 padright4">140</span></div>
									<button type="submit" id="publishmind" class="fleft mtopl6 btn fontblack">
										<i class="icon-share-alt fontorange"></i> Publish
									</button>
								</div>	
							</div>
							{/if}
							<div class="fleft w63 f80 mleft20">	
								
								<h6 class="fontbold fleft f90">Last update:</h6>
								<div class="mleft20 fright w75 mtopl12">
									<div class="{if $mind eq ''}dispon{/if}">
										<div class="fontsoftgrey fleft icon-quote-left icon-2x mright6"></div>
										<div class="fleft w67 pad6 tcursive">{if $mind neq ''}{$mind}{else} ... {/if}</div>
										<div class="fontsoftgrey fleft mleft6 icon-quote-right icon-2x"></div>
									</div>
								</div>
								</div>
						</div>
			</div>
			
	</div>		
	
</div>
