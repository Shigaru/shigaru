<?php /* Smarty version 2.6.26, created on 2010-06-23 12:05:40
         compiled from admin_stats.tpl */ ?>

<h2><?php echo @_HWDVIDS_HOME_01; ?>
</h2>
<table cellpadding="0" cellspacing="0" border="1" width="100%" class="adminform">
    <tr>
        <td align="left" width="50%">
        <div style="float:right"><b><?php echo $this->_tpl_vars['stats']['approvals']; ?>
</b>&nbsp;&nbsp;</div>
        <b><a href="index.php?option=com_hwdvideoshare&task=approvals">Videos Waiting Approval</a></b>
        </td>
        <td align="left" width="50%">
        <div style="float:right"><b><?php echo $this->_tpl_vars['stats']['conversion']; ?>
</b>&nbsp;&nbsp;</div>
        <b><a href="index.php?option=com_hwdvideoshare&task=converter">Videos Waiting Conversion</a></b>
        </td>
    </tr>
    <tr>
        <td align="left">
        <div style="float:right"><b><?php echo $this->_tpl_vars['stats']['reportedvideos']; ?>
</b>&nbsp;&nbsp;</div>
        <b><a href="index.php?option=com_hwdvideoshare&task=reported">Reported Videos</a></b>
        </td>
        <td align="left">
        <div style="float:right"><b><?php echo $this->_tpl_vars['stats']['reportedgroups']; ?>
</b>&nbsp;&nbsp;</div>
        <b><a href="index.php?option=com_hwdvideoshare&task=reported">Reported Groups</a></b>
        </td>
    </tr>
    <tr>
        <td align="left">
        <div style="float:right"><b><?php echo $this->_tpl_vars['stats']['totalvideos']; ?>
</b>&nbsp;&nbsp;</div>
        <b><a href="index.php?option=com_hwdvideoshare&task=videos">Total Videos</a></b>
        </td>
        <td align="left">
        <div style="float:right"><b><?php echo $this->_tpl_vars['stats']['totalcategories']; ?>
</b>&nbsp;&nbsp;</div>
        <b><a href="index.php?option=com_hwdvideoshare&task=categories">Total Categories</a></b>
        </td>
    </tr>
    <tr>
        <td align="left">
        <div style="float:right"><b><?php echo $this->_tpl_vars['stats']['totalviews']; ?>
</b>&nbsp;&nbsp;</div>
        <b>Total View Count</b>
        </td>
        <td align="left">
        <div style="float:right"><b><?php echo $this->_tpl_vars['stats']['totalfavours']; ?>
</b>&nbsp;&nbsp;</div>
        <b>Total Favour Count</b>
        </td>
    </tr>
    <tr>
        <td align="left">
        <div style="float:right"><b><?php echo $this->_tpl_vars['stats']['totalusers']; ?>
</b>&nbsp;&nbsp;</div>
        <b><a href="index.php?option=com_users&task=view">Total Members</a></b>
        </td>
        <td align="left">
        <div style="float:right"><b><?php echo $this->_tpl_vars['stats']['latestuser']; ?>
</b>&nbsp;&nbsp;</div>
        <b><a href="index.php?option=com_users&task=view">Latest Member</a></b>
        </td>
    </tr>
    <tr>
        <td align="left">
        <div style="float:right"><b><?php echo $this->_tpl_vars['stats']['totalgroups']; ?>
</b>&nbsp;&nbsp;</div>
        <b><a href="index.php?option=com_hwdvideoshare&task=groups">Total Groups</a></b>
        </td>
        <td align="left">
        <div style="float:right"><b><?php echo $this->_tpl_vars['stats']['latestgroup']; ?>
</b>&nbsp;&nbsp;</div>
        <b><a href="index.php?option=com_hwdvideoshare&task=groups">Latest Group</a></b>
        </td>
    </tr>
    <tr>
        <td align="left">
        <div style="float:right"><b><?php echo $this->_tpl_vars['stats']['totalvideostoday']; ?>
</b>&nbsp;&nbsp;</div>
        <b><a href="index.php?option=com_hwdvideoshare&task=videos">Videos Added Today</a></b>
        </td>
        <td align="left">
        <div style="float:right"><b><?php echo $this->_tpl_vars['stats']['totalvideosweek']; ?>
</b>&nbsp;&nbsp;</div>
        <b><a href="index.php?option=com_hwdvideoshare&task=videos">Videos Added This Week</a></b>
        </td>
    </tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr>
        <td align="left" valign="top">
	    <table cellpadding="0" cellspacing="0" border="1" width="100%" class="adminform">
	        <tr>
		    <th align="left" colspan="2" width="*">MOST POPULAR VIDEOS</th>
		    <th align="left" width="125">Rating</th>
	        </tr>
	        <?php $_from = $this->_tpl_vars['mostpopular']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
                <tr>
                    <td align="left" width="15" style="width:15px!important;"><?php echo $this->_tpl_vars['k']+1; ?>
</td>
                    <td align="left" width="*"><a href="index.php?option=com_hwdvideoshare&task=editvidsA&hidemainmenu=1&cid=<?php echo $this->_tpl_vars['data']->id; ?>
"><?php echo $this->_tpl_vars['data']->title; ?>
</a></td>
                    <td align="left" width="125"><?php echo $this->_tpl_vars['data']->updated_rating; ?>
</td>
	        </tr>
	        <?php endforeach; endif; unset($_from); ?>
            </table>
        </td>
        <td align="left" valign="top">
            <table cellpadding="0" cellspacing="0" border="1" width="100%" class="adminform">
                <tr>
                    <th align="left" colspan="2" width="*">MOST VIEWED VIDEOS</th>
                    <th align="left" width="125">Views</th>
                </tr>
                <?php $_from = $this->_tpl_vars['mostviewed']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
                <tr>
                    <td align="left" width="15" style="width:15px!important;"><?php echo $this->_tpl_vars['k']+1; ?>
</td>
                    <td align="left" width="*"><a href="index.php?option=com_hwdvideoshare&task=editvidsA&hidemainmenu=1&cid=<?php echo $this->_tpl_vars['data']->id; ?>
"><?php echo $this->_tpl_vars['data']->title; ?>
</a></td>
                    <td align="left" width="125"><?php echo $this->_tpl_vars['data']->number_of_views; ?>
</td>
                </tr>
                <?php endforeach; endif; unset($_from); ?>
            </table>
        </td>
    </tr>
    <tr>
        <td align="left" valign="top">
            <table cellpadding="0" cellspacing="0" border="1" width="100%" class="adminform">
                <tr>
                    <th align="left" colspan="2" width="*">MOST RECENT VIDEOS</th>
                    <th align="left" width="125">Date</th>
                </tr>
                <?php $_from = $this->_tpl_vars['mostrecent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
                <tr>
                    <td align="left" width="15" style="width:15px!important;"><?php echo $this->_tpl_vars['k']+1; ?>
</td>
                    <td align="left" width="*"><a href="index.php?option=com_hwdvideoshare&task=editvidsA&hidemainmenu=1&cid=<?php echo $this->_tpl_vars['data']->id; ?>
"><?php echo $this->_tpl_vars['data']->title; ?>
</a></td>
                    <td align="left" width="125"><?php echo $this->_tpl_vars['data']->date_uploaded; ?>
</td>
                </tr>
                <?php endforeach; endif; unset($_from); ?>
            </table>
        </td>
        <td align="left" valign="top">
            <table cellpadding="0" cellspacing="0" border="1" width="100%" class="adminform">
                <tr>
                    <th align="left" colspan="2" width="*">MOST RECENT GROUPS</th>
                    <th align="left" width="125">Date Created</th>
                </tr>
                <?php $_from = $this->_tpl_vars['recentgroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
                <tr>
                    <td align="left" width="15" style="width:15px!important;"><?php echo $this->_tpl_vars['k']+1; ?>
</td>
                    <td align="left" width="*"><a href="index.php?option=com_hwdvideoshare&task=editgrpA&hidemainmenu=1&cid=<?php echo $this->_tpl_vars['data']->id; ?>
"><?php echo $this->_tpl_vars['data']->group_name; ?>
</a></td>
                    <td align="left" width="125"><?php echo $this->_tpl_vars['data']->date; ?>
</td>
                </tr>
                <?php endforeach; endif; unset($_from); ?>
            </table>
        </td>
    </tr>
</table>