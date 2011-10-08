
<div id="mainview" class="island<?=$this->Island_Model->island->type?>">
    <h3><?=$this->lang->line('towns_on_island')?> <?=$this->Island_Model->island->name?></h3>
    <ul id="cities">
<?for ($i = 0; $i <=15; $i++){?>
<?if ($this->Island_Model->towns[$i] == false){?>
        <li id="cityLocation<?=$i?>" class="cityLocation buildplace">
            <div class="claim"></div>
            <a href="<?=$this->config->item('base_url')?>game/colonize/<?=$this->Island_Model->island->id?>/<?=$i?>/" title="<?=$this->lang->line('colonize_here')?>">
                <span class="textLabel">
                    <span class="before"></span><?=$this->lang->line('building_ground')?>
                    <span class="after"></span>
                </span>
            </a>
        </li>
<?}else{?>
<? $level = $this->Island_Model->towns[$i]->pos0_level?>

        <li id="cityLocation<?=$i?>" class="cityLocation city level<?=$this->Island_Model->towns[$i]->pos0_level?>">
            <div class="<?if($this->Island_Model->towns[$i]->pos0_level > 0){?><?if ($this->Island_Model->towns[$i]->user == $this->Player_Model->user->id){?>ownCityImg<?}else{?>cityimg<?}?><?}else{?>buildCityImg<?}?>"></div>
            <div class="selectimg"></div>
<?if($this->Island_Model->towns[$i]->pos0_level > 0){?>
            <a href="#" id="city_<?=$this->Island_Model->towns[$i]->id?>" onclick="selectCity(<?=$i?>, <?=$this->Island_Model->towns[$i]->id?>, 1); selectGroup.activate(this, 'cities'); return false;">
                <span class="textLabel">
                    <span class="before"></span><?=$this->Island_Model->towns[$i]->name?>
                    <span class="after"></span>
                </span>
                <!--<div class="noob"></div>-->
            </a>
<?}?>
            <ul class="cityinfo">
                <li class="name"><span class="textLabel"><?=$this->lang->line('name')?>: </span><?=$this->Island_Model->towns[$i]->name?></li>
                <li class="citylevel"><span class="textLabel"><?=$this->lang->line('town_size')?>: </span><?=$level?></li>
                <li class="owner"><span class="textLabel"><?=$this->lang->line('player')?>: </span><?=$this->Island_Model->users[$i]->login?>
<?if($this->Island_Model->users[$i]->id != $this->Player_Model->user->id){?>
                        <a href="<?=$this->config->item('base_url')?>game/sendIKMessage/<?=$this->Island_Model->users[$i]->id?>/" class="messageSend" title="<?=$this->lang->line('send_message')?>"><img src="<?=$this->config->item('style_url')?>skin/interface/icon_message_write.gif" alt="<?=$this->lang->line('send_message')?>"></a>
                        <a href="<?=$this->config->item('base_url')?>game/reportPlayer/<?=$this->Island_Model->users[$i]->id?>/" class="reportPlayer" title="<?=$this->lang->line('report_to_operator')?>"><img src="<?=$this->config->item('style_url')?>skin/layout/icon-kick.gif" alt="<?=$this->lang->line('report_player')?>"></a>
<?}?>
                </li>
                <li class="name"><span class="textLabel"><?=$this->lang->line('points')?>: </span><?=floor($this->Island_Model->users[$i]->points)?></li>
                <li class="ally"><span class="textLabel"><?=$this->lang->line('ally')?>: </span>-</li>
                <!--<li class="noobModeInfo">Игрок под защитой богов.</li>-->
            </ul>
            <ul class="cityactions">
<?if($this->Island_Model->users[$i]->id != $this->Player_Model->user->id){?>
                <li class="diplomacy"><a href="<?=$this->config->item('base_url')?>game/sendIKMessage/<?=$this->Island_Model->users[$i]->id?>/" title="<?=$this->lang->line('diplomacy')?>"><span class="textLabel"><?=$this->lang->line('diplomacy')?></span></a></li>
<?}?>
<?if($this->Island_Model->towns[$i]->id != $this->Player_Model->town_id){?>
<?/*
<?if($this->Player_Model->user->transports == 0){?>
                <li class="transport disabled" title="Сухогрузы для транспортировки недоступны!">
                    <span class="textLabel"><?=$this->lang->line('transport_goods')?></span>
                </li>
<?}else{?>
 */?>
                <li class="transport">
                    <a href="<?=$this->config->item('base_url')?>game/transport/<?=$this->Island_Model->island->id?>/<?=$this->Island_Model->towns[$i]->id?>/" title="<?=$this->lang->line('transport_goods')?>">
                        <span class="textLabel"><?=$this->lang->line('transport_goods')?></span>
                    </a>
                </li>
<?/*}*/}?>
<?if($this->Island_Model->users[$i]->id != $this->Player_Model->user->id){?>
<?if($this->Player_Model->now_town->spyes == 0){?>
                <li class="espionage disabled" title="<?=$this->lang->line('not_spyes')?>">
                    <span class="textLabel"><?=$this->lang->line('send_spy')?></span>
                </li>
<?}else{?>
                <li class="espionage">
                    <a href="<?=$this->config->item('base_url')?>game/sendSpy/<?=$this->Island_Model->island->id?>/<?=$this->Island_Model->towns[$i]->id?>/" title="<?=$this->lang->line('send_spy')?>">
                        <span class="textLabel"><?=$this->lang->line('send_spy')?></span>
                    </a>
                </li>
<?}?>
<?}?>
            </ul>
        </li>


<?}?>
<?}?>
<?if($this->Island_Model->island->id == $this->Player_Model->island_id){?>
        <li id="barbarianVilliage">
            <a href="#" id="barbarianLink" onclick="selectBarbarianVillage(); selectGroup.activate(this, 'cities'); return false;"> </a>
            <ul class="cityinfo" id="barbarianInformation">
                <li class="name"><span class="textLabel"><?=$this->lang->line('name')?>: </span><?=$this->lang->line('barbarian_village')?></li>
                <li class="citylevel"><span class="textLabel"><?=$this->lang->line('city_level')?>: </span>1</li>
                <li class="name"><span class="textLabel"><?=$this->lang->line('barbarians')?>: </span>1</li>
            </ul>
            <ul class="cityactions" id="barbarianActions">
<?if(($this->Player_Model->armys[$this->Player_Model->town_id]->phalanx > 0) or
     ($this->Player_Model->armys[$this->Player_Model->town_id]->steamgiant > 0) or
     ($this->Player_Model->armys[$this->Player_Model->town_id]->spearman > 0) or
     ($this->Player_Model->armys[$this->Player_Model->town_id]->swordsman > 0) or
     ($this->Player_Model->armys[$this->Player_Model->town_id]->slinger > 0) or
     ($this->Player_Model->armys[$this->Player_Model->town_id]->archer > 0) or
     ($this->Player_Model->armys[$this->Player_Model->town_id]->marksman > 0) or
     ($this->Player_Model->armys[$this->Player_Model->town_id]->ram > 0) or
     ($this->Player_Model->armys[$this->Player_Model->town_id]->catapult > 0) or
     ($this->Player_Model->armys[$this->Player_Model->town_id]->mortar > 0) or
     ($this->Player_Model->armys[$this->Player_Model->town_id]->gyrocopter > 0) or
     ($this->Player_Model->armys[$this->Player_Model->town_id]->bombardier > 0) or
     ($this->Player_Model->armys[$this->Player_Model->town_id]->cook > 0) or
     ($this->Player_Model->armys[$this->Player_Model->town_id]->medic > 0)){?>
                <li class="plunder">
                    <a href="<?=$this->config->item('base_url')?>game/plunder/<?=$this->Player_Model->island_id?>/0/" title="<?=$this->lang->line('pillage')?>">
                        <span class="textLabel"><?=$this->lang->line('pillage')?></span>
                    </a>
                </li>
<?}else{?>
                <li class="plunder disabled" title="<?=$this->lang->line('not_pillage')?>">
                    <span class="textLabel"><?=$this->lang->line('pillage')?></span>
                </li>
<?}?>    
            </ul>
        </li>
<?}?>
    </ul>

    <h3><?=$this->lang->line('special_places')?> <?=$this->Island_Model->island->name?></h3>
    <ul id="islandfeatures">
        <li class="<?=$this->Data_Model->resource_class_by_type(0)?> level<?=$this->Island_Model->island->wood_level?>">
<?$link_wood = ($this->Island_Model->island->id == $this->Player_Model->island_id) ? $this->config->item('base_url').'game/resource/'.$this->Island_Model->island->id.'/' : '#'?>
<?$link_trade = ($this->Island_Model->island->id == $this->Player_Model->island_id) ? $this->config->item('base_url').'game/tradegood/'.$this->Island_Model->island->id.'/' : '#'?>
<?$link_wonder = ($this->Island_Model->island->id == $this->Player_Model->island_id) ? $this->config->item('base_url').'game/wonder/'.$this->Island_Model->island->id.'/' : '#'?>
<?$link_forum = ($this->Island_Model->island->id == $this->Player_Model->island_id) ? $this->config->item('base_url').'game/islandBoard/'.$this->Island_Model->island->id.'/' : '#'?>

            <a href="<?=$link_wood?>" title="<?=$this->Data_Model->island_building_by_resource(0)?> <?=$this->Island_Model->island->wood_level?>">
                <span class="textLabel"><?=$this->Data_Model->island_building_by_resource(0)?></span>
            </a>

        </li>
        <li id="tradegood"  class="<?=$this->Data_Model->resource_class_by_type($this->Island_Model->island->trade_resource)?> level<?=$this->Island_Model->island->trade_level?>">
            <a href="<?=$link_trade?>" title="<?=$this->Data_Model->island_building_by_resource($this->Island_Model->island->trade_resource)?> <?=$this->Island_Model->island->trade_level?>">
                <span class="textLabel"><?=$this->Data_Model->island_building_by_resource($this->Island_Model->island->trade_resource)?></span>
            </a>
        </li>
<?if($this->Island_Model->island->wonder > 0){?>
        <li id="wonder" class="wonder<?=$this->Island_Model->island->wonder?>">
            <a href="<?=$link_wonder?>" title="<?=$this->Data_Model->get_wonder_by_type($this->Island_Model->island->wonder)?>">
                <span class="textLabel"><?=$this->Data_Model->get_wonder_by_type($this->Island_Model->island->wonder)?></span>
            </a>
        </li>
<?}?>
        <li class="forum"><a title="<?=$this->lang->line('agora')?>" href="<?=$link_forum?>">
                <span class="textLabel"><?=$this->lang->line('agora')?></span>
            </a>
        </li>
    </ul>
</div>
<?$town_id = $param2?>
<?if($town_id >= 0){?>
<script language="JavaScript">
    Event.onDOMReady(function() {
        selectCity(<?=$this->Data_Model->temp_towns_db[$town_id]->position?>, <?=$town_id?>, 1);
        selectGroup.activate(document.getElementById("city_<?=$town_id?>"), 'cities');
    });
</script>
<?}?>