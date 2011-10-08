<?
    $position = $this->Data_Model->get_position(5, $this->Player_Model->now_town);
    $level_text = 'pos'.$position.'_level';
    $level = $this->Player_Model->now_town->$level_text;
?>
<div id="mainview">
    <div class="buildingDescription">
        <h1><?=$this->lang->line('inspect_garisson')?></h1>
        <p><?=$this->lang->line('inspect_garisson_text')?></p>
    </div>
    <form id="fireForm"  action="<?=$this->config->item('base_url')?>actions/armyEdit/barracks/" method="post">
        <div class="contentBox01h">
            <h3 class="header"><?=$this->lang->line('fire_units')?></h3>
            <div class="content">
                <br>
                <ul id="units">
<?for($i = 1; $i <= 14; $i++){?>
<?$class = $this->Data_Model->army_class_by_type($i)?>
<?if($this->Player_Model->armys[$this->Player_Model->town_id]->$class > 0){?>
<?$cost = $this->Data_Model->army_cost_by_type($i, $this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id]);?>
                    <li class="unit <?=$class?>">
                        <div class="unitinfo">
                            <h4><?=$this->Data_Model->army_name_by_type($i)?></h4>
                            <img src="<?=$this->config->item('style_url')?>skin/characters/military/120x100/<?=$class?>_r_120x100.gif">
                            <div class="unitcount"><span class="textLabel"><?=$this->lang->line('available')?>: </span><?=$this->Player_Model->armys[$this->Player_Model->town_id]->$class?></div>
                            <p><?=$this->Data_Model->army_desc_by_type($i)?></p>
                        </div>
                        <label for="<?=$class?>"><?=$this->Data_Model->army_name_by_type($i)?> <?=$this->lang->line('dismiss_units')?>:</label>
                        <div class="sliderinput">
                            <div class="sliderbg" id="sliderbg_<?=$class?>">
                                <div class="actualValue" id="actualValue_<?=$class?>"></div>
                                <div class="sliderthumb" id="sliderthumb_<?=$class?>"></div>
                            </div>

							<script type="text/javascript">
							create_slider({
                                                                dir : 'ltr',
								id : "slider_<?=$class?>",
								maxValue : <?=$this->Player_Model->armys[$this->Player_Model->town_id]->$class?>,
								overcharge : 0,
								iniValue : 0,
								bg : "sliderbg_<?=$class?>",
								thumb : "sliderthumb_<?=$class?>",
								topConstraint: -10,
								bottomConstraint: 326,
								bg_value : "actualValue_<?=$class?>",
								textfield:"textfield_<?=$class?>"
							});
							var slider = sliders["default"];
							</script>

                            <a class="setMin" href="#reset" onClick="sliders['slider_<?=$class?>'].setActualValue(0); return false;" title="Eingabe zurücksetzen"><span class="textLabel"><?=$this->lang->line('min')?></span></a>
                            <a class="setMax" href="#max" onClick="sliders['slider_<?=$class?>'].setActualValue(<?=$this->Player_Model->armys[$this->Player_Model->town_id]->$class?>); return false;" title="Möglichst viele entlassen"><span class="textLabel"><?=$this->lang->line('max')?></span></a>
                        </div>
                        <div class="forminput">
                            <input class="textfield" id="textfield_<?=$class?>" type="text" name="<?=$i?>"  value="0" size="4" maxlength="4"> <a class="setMax" href="#max" onClick="sliders['slider_<?=$class?>'].setActualValue(<?=$this->Player_Model->armys[$this->Player_Model->town_id]->$class?>); return false;" title="<?=$this->lang->line('recruit_max')?>"><span class="textLabel"><?=$this->lang->line('max')?></span></a>
                            <div class="centerButton">
                                <input title="<?=$this->lang->line('fire_units')?>!" class="button" type="submit" value="<?=$this->lang->line('dismiss_units')?>!">
                            </div>
                        </div>
                        <div class="costs">
                            <h5><?=$this->lang->line('cost')?>:</h5>
                            <ul class="resources">
<?if($cost['gold'] > 0){?>
                                <li class="upkeep" title="<?=$this->lang->line('upkeep_hour')?>"><span class="textLabel"><?=$this->lang->line('upkeep_hour')?>: </span><?=number_format($cost['gold'])?></li>
<?}?>
                            </ul>
                        </div>
                    </li>

<?}?>
<?}?>
                <br><br>
                </ul>
            </div>
            <div class="footer"></div>
        </div>
    </form>
</div>