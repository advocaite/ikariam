<?
    $type_text = 'pos'.$position.'_type';
    $level_text = 'pos'.$position.'_level';
    $type = $this->Player_Model->now_town->$type_text;
    $level = $this->Player_Model->now_town->$level_text;
?>
<div id="mainview">
		<h1><?=$this->Data_Model->building_name_by_type($type)?></h1>
                <div class="contentBox" id="demolition">
<?if ($this->Player_Model->now_town->build_line != '' and $this->Player_Model->build_line[$this->Player_Model->town_id][0]['position'] == $position){?>
<?$cost = $this->Data_Model->building_cost($type,$level,$this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id])?>
		<h3 class="header"><?=$this->lang->line('confirm_building_cancel')?></h3>
		<div class="content">
			<h4><?=$this->lang->line('warning')?></h4>
			<p><?=$this->lang->line('building_cancel_text')?></p>
			<p class="refund"><?=$this->lang->line('following_resources_1')?>
<?}else{?>
<?$cost = $this->Data_Model->building_cost($type,$level-1,$this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id])?>

                <h3 class="header"><?=$this->lang->line('confirm_demolish')?></h3>
		<div class="content">
			<h4><?=$this->lang->line('warning')?></h4>
			<p><?=$this->lang->line('demolish_text')?></p>
			<p><?=$this->lang->line('following_resources_2')?>
<?}?>
                            <ul class="resources">
<?if($cost['wood'] > 0){?>
                                <li class="wood" title="<?=$this->lang->line('wood')?>"><span class="textLabel"><?=$this->lang->line('wood')?>: </span><?=number_format($cost['wood']*0.9)?></li>
<?}?>
<?if($cost['marble'] > 0){?>
                                <li class="marble" title="<?=$this->lang->line('marble')?>"><span class="textLabel"><?=$this->lang->line('marble')?>: </span><?=number_format($cost['marble']*0.9)?></li>
<?}?>
<?if($cost['wine'] > 0){?>
                                <li class="wine" title="<?=$this->lang->line('wine')?>"><span class="textLabel"><?=$this->lang->line('wine')?>: </span><?=number_format($cost['wine']*0.9)?></li>
<?}?>
<?if($cost['crystal'] > 0){?>
                                <li class="glass" title="<?=$this->lang->line('crystal')?>"><span class="textLabel"><?=$this->lang->line('crystal')?>: </span><?=number_format($cost['crystal']*0.9)?></li>
<?}?>
<?if($cost['sulfur'] > 0){?>
                                <li class="sulfur" title="<?=$this->lang->line('sulfur')?>"><span class="textLabel"><?=$this->lang->line('sulfur')?>: </span><?=number_format($cost['sulfur']*0.9)?></li>
<?}?>
                            </ul>
                        </p>
			<hr>
			<a class="yes" href="<?=$this->config->item('base_url')?>actions/demolition/<?=$position?>/" title="<?=$this->lang->line('yes')?>"><?=$this->lang->line('yes')?></a>
			<a class="no" href="<?=$this->config->item('base_url')?>game/<?=$this->Data_Model->building_class_by_type($type)?>/<?=$position?>/" title="<?=$this->lang->line('no')?>"><span class="textLabel"><?=$this->lang->line('no')?></span></a>
		</div>
		<div class="footer"></div>
	</div>
</div>
