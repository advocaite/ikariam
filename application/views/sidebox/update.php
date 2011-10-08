<?
if ($position > 0 or ($position == 0 and $page == 'townHall')){
    $level_text = 'pos'.$position.'_level';
    $type_text = 'pos'.$position.'_type';
    $class = $this->Player_Model->now_town->$type_text;
    $level = $this->Player_Model->now_town->$level_text;
    $real_level = $level;
    for ($i = 0; $i < SizeOf($this->Player_Model->build_line[$this->Player_Model->town_id]); $i++)
    {
        if ($class == $this->Player_Model->build_line[$this->Player_Model->town_id][$i]['type']){$real_level++;}
    }
    $cost = $this->Data_Model->building_cost($type, $real_level, $this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id]);
?>

<div id="buildingUpgrade" class="dynamic">
    <h3 class="header"><?=$this->lang->line('expand')?>
        <a class="help" href="<?=$this->config->item('base_url')?>game/buildingDetail/<?=$class?>/" title="<?=$this->lang->line('help')?>">
            <span class="textLabel"><?=$this->lang->line('need_help')?></span>
        </a>
    </h3>
    <div class="content">
        <div class="buildingLevel"><span class="textLabel"><?=$this->lang->line('level')?> </span><?=$level?></div>

        <h4><?=$this->lang->line('need_for_next')?> <?=$real_level+1?>:</h4>

        <ul class="resources">
<?if($cost['wood'] > 0){?>
            <li class="wood" title="<?=$this->lang->line('wood')?>"><span class="textLabel">Стройматериалы: </span><?=number_format($cost['wood'])?></li>
<?}?>
<?if($cost['wine'] > 0){?>
            <li class="wine" title="<?=$this->lang->line('wine')?>"><span class="textLabel">Виноград: </span><?=number_format($cost['wine'])?></li>
<?}?>
<?if($cost['marble'] > 0){?>
            <li class="marble" title="<?=$this->lang->line('marble')?>"><span class="textLabel">Мрамор: </span><?=number_format($cost['marble'])?></li>
<?}?>
<?if($cost['crystal'] > 0){?>
            <li class="glass" title="<?=$this->lang->line('crystal')?>"><span class="textLabel">Хрусталь: </span><?=number_format($cost['crystal'])?></li>
<?}?>
<?if($cost['sulfur'] > 0){?>
            <li class="sulfur" title="<?=$this->lang->line('sulfur')?>"><span class="textLabel">Сера: </span><?=number_format($cost['sulfur'])?></li>
<?}?>
<?if($cost['time'] > 0){?>
            <li class="time" title="<?=$this->lang->line('build_time')?>"><span class="textLabel"><?=$this->lang->line('build_time')?>: </span><?=format_time($cost['time'])?></li>
<?}?>
        </ul>
        <ul class="actions">
            <li class="upgrade">
<?if(($this->Player_Model->now_town->build_line != '' and $this->Player_Model->user->premium_account == 0) or
     ($class == 4 and $this->Player_Model->armys[$this->Player_Model->town_id]->ships_line != '') or
     ($class == 5 and $this->Player_Model->armys[$this->Player_Model->town_id]->army_line != '') or
     ($class == 14 and $this->Player_Model->towns[$this->Player_Model->town_id]->spyes_start > 0) or
     ($real_level > $cost['max_level'])){?>
                <a class="disabled" href="#" title="<?=$this->lang->line('no_expand')?>"></a>
<?}else{?>
                <a href="<?=$this->config->item('base_url')?>actions/upgrade/<?=$position?>/" title="<?=$this->lang->line('level_up')?>"><span class="textLabel"><?if($real_level != $level){?><?=$this->lang->line('in_queue')?><?}else{?><?=$this->lang->line('upgrade')?><?}?></span></a>
<?}?>
            </li>
            <li class="downgrade">
<?if (($this->Player_Model->now_town->build_line != '' and $this->Player_Model->build_line[$this->Player_Model->town_id][0]['position'] == $position) or
        ($position == 0) or
        ($class == 4 and $this->Player_Model->armys[$this->Player_Model->town_id]->ships_line != '') or
        ($class == 5 and $this->Player_Model->armys[$this->Player_Model->town_id]->army_line != '') or
        ($class == 14 and $this->Player_Model->towns[$this->Player_Model->town_id]->spyes_start > 0) ){?>
                <a class="disabled" href="#" title="<?=$this->lang->line('no_demolish')?>"></a>
<?}else{?>
                <a href="<?=$this->config->item('base_url')?>game/demolition/<?=$position?>/" title="<?=$this->lang->line('level_down')?>"><span class="textLabel"><?=$this->lang->line('demolish')?></span></a>
<?}?>
            </li>
	</ul>
    </div>
    <div class="footer"></div>
</div>
<?}?>