<?php
// no direct access
defined('_JEXEC') or die;

$database = &JFactory::getDbo();
$user = &JFactory::getUser();
$url = JUri::base(true);


$noWorst = 0;
$listCount = 0;

$moduleclass_sfx = $params->get('moduleclass_sfx', '');
$ratinglist = $params->get('ratinglist', 'both');
$maxbest = floor(abs(intval($params->get('maxbest', ''))));
$maxworst = floor(abs(intval($params->get('maxworst', ''))));
$users = $params->get('users', 'username');
$footer = $params->get('footer', '');	
?>
<div class="mod_karma<?php echo $moduleclass_sfx; ?>">
	<?php
	//BEST ratings
	if($ratinglist == 'best' || $ratinglist == 'both'){
		$sql = "select a.name, a.username, a.id, b.total_karma, b.var_karma \n".
			"from `#__users` as a left join `#__karma_tb` as b \n".
			"on a.id = b.user_id \n".
			"where b.var_karma > 0 \n".
			"order by b.var_karma DESC \n";
		
		$database->setQuery($sql);
		//echo $database->getQuery();
		$rows = $database->loadObjectList();
		
		$count = count($rows);
		
		if($count < $maxbest)
			$n = $count;
		else
			$n = $maxbest;
		
		?>
		<table class="karma_best">
			<tr><td><strong>Best <?php echo $maxbest; ?> Karmas</strong></td><td width="1%"</td></tr>
			<?php
			if($n){
				for($i=0;$i<$n;$i++){
					$row=$rows[$i];
					?>
					<tr>
						<td>							<?php $link1 = $url . "/index.php?option=com_comprofiler&task=userProfile&user=$row->id"; ?>
							<a href="<?php echo JRoute::_($link1);?>">
							<?php 
							switch($users){
								case "username":
									echo $row->username;
								break;
								case "name":
									echo $row->name;
								break;
							} 
							?>
							</a></td>
							<td><?php echo intval($row->var_karma); ?></td>
					</tr>
					<?php
				}
			}
			?>
		</table>
		<?php
	}
	?>
	
	<?php
	//Worst ratings
	if($ratinglist == 'worst' || $ratinglist == 'both'){
		
		$sql = "select a.name, a.username, a.id, b.total_karma, b.var_karma \n".
			"from `#__users` as a left join `#__karma_tb` as b \n".
			"on a.id = b.user_id \n".
			"where b.var_karma <= 0 \n".
			"order by b.var_karma ASC \n";
					
		$database->setQuery($sql);
		//echo $database->getQuery();
		$rows = $database->loadObjectList();
		
		$count = count($rows);
		
		if($count < $maxworst)
			$n=$count;
		else
			$n=$maxworst;
		
		?>
		<table class="karma_worst">
			<tr><td><strong>Worst <?php echo $maxworst; ?> Karmas</strong></td><td width="1%"</td></tr>
			<?php
			if($n){
				for($i=0;$i<$n;$i++){
					$row=$rows[$i];
					?>
					<tr>
						<td>
							<?php $link2 = $url . "/index.php?option=com_comprofiler&task=userProfile&user=$row->id"; ?>
							<a href="<?php echo JRoute::_($link2);?>">
							<?php 
							switch($users){
								case "username":
									echo $row->username;
								break;
								case "name":
									echo $row->name;
								break;
							} 
							?>
							</a></td>
							<td><?php echo intval($row->var_karma); ?></td>
					</tr>
					<?php
				}
			}
			?>
		</table>
		<?php
	}
	?>
	<br />
	<div class="karma-footer">
	<?php echo $footer; ?>
	</div>
</div>
