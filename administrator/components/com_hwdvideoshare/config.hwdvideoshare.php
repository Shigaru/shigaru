<?php
class hwd_vs_Config{ 

  var $instanceConfig = null;

  // Member variables
  var $vpp = '20';
  var $fpfeaturedvids = '10';
  var $gpp = '5';
  var $fpfeaturedgroups = '3';
  var $aav = '1';
  var $aag = '1';
  var $aac = '1';
  var $hwdvids_language_path = 'joomfish';
  var $hwdvids_language_file = 'joomfish';
  var $hwdvids_template_path = 'hwdvs-template';
  var $hwdvids_template_file = 'shigaru';
  var $diable_nav_videos = '1';
  var $diable_nav_catego = '1';
  var $diable_nav_groups = '1';
  var $diable_nav_upload = '1';
  var $radiusrc = '0';
  var $logconvert = '0';
  var $debugconvert = '1';
  var $deleteoriginal = '1';
  var $mailvideonotification = '1';
  var $mailgroupnotification = '0';
  var $mailnotifyaddress = 'info@shigaru.com';
  var $cbint = '1';
  var $disablelocupld = '0';
  var $flvplay_width = '640';
  var $flvplay_height = '400';
  var $disablecaptcha = '0';
  var $aa3v = '1';
  var $showcredit = '0';
  var $allowvidedit = '1';
  var $allowviddel = '1';
  var $locupldmeth = '2';
  var $requiredins = '1';
  var $ft_mpg = 'on';
  var $ft_mpeg = 'on';
  var $ft_avi = 'on';
  var $ft_divx = 'on';
  var $ft_mp4 = 'on';
  var $ft_flv = 'on';
  var $ft_wmv = 'on';
  var $ft_rm = 'on';
  var $ft_mov = 'on';
  var $ft_moov = 'on';
  var $ft_asf = 'on';
  var $ft_swf = 'on';
  var $ft_vob = 'on';
  var $maxupld = '15';
  var $flvplayer = 'osflv';
  var $flvalign = '0';
  var $infoalign = '1';
  var $usershare1 = '1';
  var $shareoption1 = '1';
  var $usershare2 = '1';
  var $shareoption2 = '1';
  var $usershare3 = '1';
  var $shareoption3 = '0';
  var $usershare4 = '0';
  var $shareoption4 = '1';
  var $cbavatar = '1';
  var $avatarwidth = '61';
  var $gtree_core = '-2';
  var $gtree_core_child = 'RECURSE';
  var $gtree_upld = '-1';
  var $gtree_upld_child = 'RECURSE';
  var $gtree_grup = '-2';
  var $gtree_grup_child = 'RECURSE';
  var $thumbwidth = '145';
  var $reconvertflv = '0';
  var $abortthumbfail = '1';
  var $diable_nav_search = '1';
  var $diable_nav_user = '0';
  var $trunvdesc = '150';
  var $truncdesc = '200';
  var $trungdesc = '70';
  var $truntitle = '100';
  var $sb_digg = 'on';
  var $sb_reddit = 'on';
  var $sb_delicious = 'on';
  var $sb_google = 'on';
  var $sb_live = 'on';
  var $sb_facebook = 'on';
  var $sb_slashdot = 'on';
  var $sb_netscape = 'on';
  var $sb_technorati = 'on';
  var $sb_stumbleupon = 'on';
  var $sb_spurl = 'on';
  var $sb_wists = 'on';
  var $sb_simpy = 'on';
  var $sb_newsvine = 'on';
  var $sb_blinklist = 'on';
  var $sb_furl = 'on';
  var $sb_fark = 'on';
  var $sb_blogmarks = 'on';
  var $sb_yahoo = 'on';
  var $sb_smarking = 'on';
  var $sb_netvouz = 'on';
  var $sb_shadows = 'on';
  var $sb_rawsugar = 'on';
  var $sb_magnolia = 'on';
  var $sb_plugim = 'on';
  var $sb_squidoo = 'on';
  var $sb_blogmemes = 'on';
  var $sb_feedmelinks = 'on';
  var $sb_blinkbits = 'on';
  var $sb_tailrank = 'on';
  var $sb_linkagogo = 'on';
  var $showrating = '1';
  var $showviews = '1';
  var $showduration = '0';
  var $showuplder = '1';
  var $autoconvert = 'wget1';
  var $commssys = '0';
  var $gjint = '';
  var $uploadcriteria = '1';
  var $ad1show = '0';
  var $ad1_ad_client = '';
  var $ad1_ad_channel = '';
  var $ad1_ad_type = 'text_image';
  var $ad1_ad_uifeatures = '6';
  var $ad1_ad_format = '125x125_as';
  var $ad1_color_border1 = 'D5D5D5';
  var $ad1_color_bg1 = 'FFFFFF';
  var $ad1_color_link1 = '0033FF';
  var $ad1_color_text1 = '333333';
  var $ad1_color_url1 = '008000';
  var $ad1custom = '';
  var $customencode = '';
  var $encoder = 'FFMPEG';
  var $flvplay_autostart = '1';
  var $flvplay_overstretch = '1';
  var $flvplay_logo = '/components/com_hwdvideoshare/images/logo.png';
  var $flvplay_volume = '70';
  var $flvplay_fg = 'FFFFFF';
  var $flvplay_bg = '2f3030';
  var $fporder = 'recent';
  var $pathubr_upload = 'http://localhost/shigaru/cgi-bin/uu/ubr_upload.pl';
  var $cnvt_vbitrate = '600';
  var $cnvt_abitrate = '64';
  var $cnvt_asr = '22050';
  var $cnvt_fsize = '320x240';
  var $usegetheaders = '0';
  var $ajaxratemeth = '1';
  var $ajaxfavmeth = '1';
  var $ajaxrepmeth = '1';
  var $ajaxa2gmeth = '1';
  var $cbitemid = '53';
  var $applywmvfix = '1';
  var $tpfunc = '1';
  var $diable_nav_user1 = '1';
  var $diable_nav_user2 = '1';
  var $diable_nav_user3 = '1';
  var $diable_nav_user4 = '1';
  var $diable_nav_user5 = '1';
  var $showrate = '1';
  var $showatfb = '1';
  var $showrpmb = '1';
  var $showcoms = '1';
  var $showvurl = '1';
  var $showvebc = '0';
  var $showdesc = '1';
  var $showtags = '1';
  var $showscbm = '1';
  var $showuldr = '1';
  var $showa2gb = '0';
  var $gtree_plyr_child = 'RECURSE';
  var $gtree_plyr = '-2';
  var $initialise_now = '0';
  var $hwdvids_videoplayer_path = 'hwdvs-videoplayer';
  var $hwdvids_videoplayer_file = 'flow';
  var $accesslevel_main = '0,1';
  var $accesslevel_upld = '0,1';
  var $accesslevel_plyr = '0,1';
  var $accesslevel_grps = '0,1';
  var $access_method = '0';
  var $xmlcache_today = '60';
  var $xmlcache_thisweek = '60';
  var $xmlcache_thismonth = '60';
  var $xmlcache_alltime = '60';
  var $xmlcustom01 = '0';
  var $xmlcustom02 = '0';
  var $xmlcustom03 = '0';
  var $xmlcustom04 = '0';
  var $xmlcustom05 = '0';
  var $mailreportnotification = '0';
  var $sharedlibrarypath = '';
  var $standaloneswf = '1';
  var $playlocal = '1';
  var $frontpage_watched = '1';
  var $frontpage_viewed = 'alltime';
  var $frontpage_favoured = 'alltime';
  var $frontpage_popular = 'alltime';
  var $jaclint = '0';
  var $loadmootools = 'on';
  var $loadprototype = 'on';
  var $loadscriptaculous = 'on';
  var $loadswfobject = 'on';
  var $tpwidth = '427';
  var $embedreturnlink = '0';
  var $nicepriority = '10';
  var $showdlor = '0';
  var $showvuor = '0';
  var $mbtu_no = '10';
  var $showprnx = '1';
  var $showdlfl = '0';
  var $maintenance_bkgd = 'wget1';
  var $playlist_bkgd = 'wget1';
  var $showrevi = '1';
  var $revi_no = '10';
  var $fvid_w = '0';
  var $fvid_h = '400';
  var $var_c = '1';
  var $var_fb = '0.75';
  var $tar_fb = '0.75';
  var $udt = '1';
  var $oformats = '3gp,mkv';
  var $bwn_no = '3';
  var $cordering = 'orderASC';
  var $cvordering = 'orderASC';
  var $custordering = '1';
  var $userdisplay = '1';
  var $gtree_dnld = '-1';
  var $gtree_dnld_child = 'RECURSE';
  var $gtree_ultp = '-1';
  var $gtree_ultp_child = 'RECURSE';
  var $bviic = '1';
  var $accesslevel_dnld = '0,1';
  var $accesslevel_ultp = '0,1';
  var $ieoa_fix = '1';
  var $swfobject = '1';
  var $allowgr = '0';
  var $con_thumb_n = '120';
  var $con_thumb_l = '500';
  var $con_gen_hd = '0';
  var $showmftc = '1';
  var $mftc_no = '10';
  var $feat_show = '2';
  var $feat_as = 'no';
  var $feat_rand = '1';
  var $scroll_no = '3';
  var $scroll_as = '3000';
  var $scroll_au = 'auto';
  var $scroll_wr = 'true';
  var $cat_he = '1';
  var $thumb_ts = '0';
  var $gtree_mdrt = '24';
  var $gtree_mdrt_child = 'RECURSE';
  var $show_vp_info = '1';
  var $show_tooltip = '1';
  var $usehq = '1';
  var $uselibx264 = '1';
  var $countcvids = '1';
  var $search_method = '1';
  var $search_title = 'on';
  var $search_descr = 'on';
  var $search_keywo = 'on';
  var $vsdirectory = '/opt/lampp/htdocs/shigaru/hwdvideos';
  var $use_protection = '1';
  var $protection_level = '1';
  var $cnvt_keyf = '6';
  var $age_check = '0';
  var $gtree_edtr = '24';
  var $gtree_edtr_child = 'RECURSE';
  var $disable_nav_playlist = '0';
  var $disable_nav_channel = '0';
  var $storagetype = '0';
  var $cnvt_fsize_hd = '640x360';
  var $cnvt_hd_preset = '0';
  var $keep_ar = '0';
  var $warpAccountKey = 'admin2';
  var $warpSecretKey = 'secret';
  var $cpp = '50';
  var $ipod320 = '';
  var $ipod640 = '';
  var $multiple_cats = '0';

  function get_instance(){
    $instanceConfig = new hwd_vs_Config;
    return $instanceConfig;
  }

}
?>