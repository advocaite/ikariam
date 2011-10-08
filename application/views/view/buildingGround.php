<?$position = $param1?>
<div id="mainview">			
    <div class="buildingDescription">
        <h1><?=$this->lang->line('empty_building_ground')?></h1>
        <p><?=$this->lang->line('empty_building_text')?></p>
    </div>
    <div class="contentBox01h">
        <h3 class="header"><?=$this->lang->line('build_building')?></h3>
        <div class="content">
            <ul id="buildings">
<?$buildings_count = 0?>
<?for ($i = 2; $i <= 26; $i++){?>
<?if ($this->Player_Model->already_build[$this->Player_Model->town_id][$i] == false or $i == 6){?>
<?if ($i != 7 and $position == 14){ continue; }?>
<?if (($i != 4 and $i != 2) and ($position == 1 or $position ==2)){ continue; }?>
<?if (($i == 4 or $i == 2 or $i == 7) and ($position >2 and $position < 14)){ continue; }?>
<?
    if (($i == 4 and $this->Player_Model->research->res4_1 == 0) or
        ($i == 6 and $this->Player_Model->research->res2_1 == 0) or
        ($i == 8 and $this->Player_Model->research->res2_4 == 0) or
        ($i == 9 and $this->Player_Model->research->res3_7 == 0) or
        ($i == 10 and ($this->Player_Model->research->res1_4 == 0 or $this->Player_Model->capital_id != $this->Player_Model->town_id)) or
        ($i == 11 and $this->Player_Model->research->res1_5 == 0) or
        ($i == 12 and $this->Player_Model->research->res2_3 == 0) or
        ($i == 13 and $this->Player_Model->research->res3_6 == 0) or
        ($i == 14 and $this->Player_Model->research->res3_3 == 0) or
        ($i == 15 and ($this->Player_Model->research->res1_4 == 0 or $this->Player_Model->capital_id == $this->Player_Model->town_id)) or
        ($i == 16 and $this->Player_Model->research->res2_5 == 0) or
        ($i == 17 and ($this->Player_Model->research->res2_5 == 0 or $this->Player_Model->now_island->trade_resource != 2)) or
        ($i == 18 and ($this->Player_Model->research->res2_5 == 0 or $this->Player_Model->now_island->trade_resource != 3)) or
        ($i == 19 and ($this->Player_Model->research->res2_5 == 0 or $this->Player_Model->now_island->trade_resource != 1)) or
        ($i == 20 and ($this->Player_Model->research->res2_5 == 0 or $this->Player_Model->now_island->trade_resource != 4)) or
        ($i == 21 and $this->Player_Model->research->res1_1 == 0) or
        ($i == 22 and $this->Player_Model->research->res2_7 == 0) or
        ($i == 23 and $this->Player_Model->research->res3_9 == 0) or
        ($i == 24 and $this->Player_Model->research->res2_12 == 0) or
        ($i == 25 and $this->Player_Model->research->res4_10 == 0) or
        ($i == 26 and $this->Player_Model->research->res3_4 == 0)){ continue; }
?>
<?$buildings_count++?>
<?$building_id=$i?>
<?$cost = $this->Data_Model->building_cost($building_id,0, $this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id])?>
                <li class="building <?=$this->Data_Model->building_class_by_type($building_id)?>">
                    <div class="buildinginfo">
                        <h4><?=$this->Data_Model->building_name_by_type($building_id)?></h4>
                        <a href="<?=$this->config->item('base_url')?>game/buildingDetail/<?=$building_id?>/"><img src="<?=$this->config->item('style_url')?>skin/buildings/y100/<?=$this->Data_Model->building_class_by_type($building_id)?>.gif" /></a>
                        <p><?=$this->Data_Model->building_desc_by_type($building_id)?></p>
                    </div>
                    <hr>
<?if ($this->Player_Model->now_town->wood < $cost['wood'] or
        $this->Player_Model->now_town->wine < $cost['wine'] or
        $this->Player_Model->now_town->marble < $cost['marble'] or
        $this->Player_Model->now_town->crystal < $cost['crystal'] or
      $this->Player_Model->now_town->sulfur < $cost['sulfur']){?>
 <p class="cannotbuild"><?=$this->lang->line('not_resources')?></p>
 <?}else{?>
<?if($this->Player_Model->now_town->build_line == ''){?>
                    <div class="centerButton">
                        <a class="button build" style="padding-left:3px;padding-right:3px;" href="<?=$this->config->item('base_url')?>actions/build/<?=$position?>/<?=$building_id?>/">
                            <span class="textLabel"><?=$this->lang->line('build_now')?></span>
                        </a>
                    </div>
<?}else{?>
<?if($this->Player_Model->user->premium_account > 0){?>
                    <div class="centerButton">
                        <a class="button build" style="padding-left:3px;padding-right:3px;" href="<?=$this->config->item('base_url')?>actions/build/<?=$position?>/<?=$building_id?>/">
                            <span class="textLabel"><?=$this->lang->line('to_queue')?></span>
                        </a>
                    </div>
<?}else{?>
    <p class="cannotbuild"><?=$this->lang->line('already_building')?> (<a href="<?=$this->config->item('base_url')?>game/premiumDetails/"><?=$this->lang->line('carry_building')?></a>)</p>
<?}?>
<?}?>
<?}?>
                    <div class="costs">
                        <h5><?=$this->lang->line('cost')?>:</h5>
                        <ul class="resources">
<?if($cost['wood'] > 0){?>
                            <li class="wood" title="<?=$this->lang->line('wood')?>">
                                <span class="textLabel"><?=$this->lang->line('wood')?>: </span><?=number_format($cost['wood'])?>
                            </li>
<?}?>
<?if($cost['wine'] > 0){?>
                            <li class="wine" title="<?=$this->lang->line('wine')?>">
                                <span class="textLabel"><?=$this->lang->line('wine')?>: </span><?=number_format($cost['wine'])?>
                            </li>
<?}?>
<?if($cost['marble'] > 0){?>
                            <li class="marble" title="<?=$this->lang->line('marble')?>">
                                <span class="textLabel"><?=$this->lang->line('marble')?>: </span><?=number_format($cost['marble'])?>
                            </li>
<?}?>
<?if($cost['crystal'] > 0){?>
                            <li class="crystal" title="<?=$this->lang->line('crystal')?>">
                                <span class="textLabel"><?=$this->lang->line('cystal')?>: </span><?=number_format($cost['crystal'])?>
                            </li>
<?}?>
<?if($cost['sulfur'] > 0){?>
                            <li class="sulfur" title="<?=$this->lang->line('sulfur')?>">
                                <span class="textLabel"><?=$this->lang->line('sulfur')?>: </span><?=number_format($cost['sulfur'])?>
                            </li>
<?}?>

                            <li class="time" title="<?=$this->lang->line('build_time')?>">
                                <span class="textLabel"><?=$this->lang->line('build_time')?>: </span><?=format_time($cost['time'])?>
                            </li>
                        </ul>
                    </div>
                </li>

<?}?>
<?}?>
            </ul>
<?if($buildings_count == 0){?>
<div><br><center><p><?=$this->lang->line('no_buildings')?></p></center></div>
<?}?>

        </div>
        <div class="footer"></div>
    </div>
</div>
 