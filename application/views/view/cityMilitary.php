<?$position=$param1?>
<div id="mainview">
    <div class="buildingDescription">
        <h1><?=$this->lang->line('army_in_city')?></h1>
        <p><?=$this->lang->line('inspect_troops')?></p>
    </div>

    <div class="militaryAdvisorTabs">
        <table cellpadding="0" cellspacing="0" id="tabz">
            <tr>
                <td<?if ($position == 'army'){?> class="selected"<?}?>><a title="<?=$this->lang->line('units')?>" href="<?=$this->config->item('base_url')?>game/cityMilitary/army/"><em><?=$this->lang->line('units')?></em></a>
                </td>
                <td<?if ($position != 'army'){?> class="selected"<?}?>><a title="<?=$this->lang->line('ships')?>" href="<?=$this->config->item('base_url')?>game/cityMilitary/fleet/"><em><?=$this->lang->line('ships')?></em></a>
                </td>
            </tr>
        </table>
    </div>

    <div class="yui-navset yui-navset-top" id="demo">
        <div class="yui-content">
<?if ($position == 'army'){?>
            <div id="tab1" style="display: block;">
                <div class="contentBox01h">
                    <h3 class="header"><span class="textLabel"><?=$this->lang->line('garisson')?></span></h3>
                    <div class="content">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th title="<?=$this->lang->line('army1_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/military/x60_y60/y60_phalanx_faceright.gif" alt="<?=$this->lang->line('army1_name')?>" title="<?=$this->lang->line('army1_name')?>"></th>
                                <th title="<?=$this->lang->line('army2_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/military/x60_y60/y60_steamgiant_faceright.gif" alt="<?=$this->lang->line('army2_name')?>" title="<?=$this->lang->line('army2_name')?>"></th>
                                <th title="<?=$this->lang->line('army3_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/military/x60_y60/y60_spearman_faceright.gif" alt="<?=$this->lang->line('army3_name')?>" title="<?=$this->lang->line('army3_name')?>"></th>
                                <th title="<?=$this->lang->line('army4_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/military/x60_y60/y60_swordsman_faceright.gif" alt="<?=$this->lang->line('army4_name')?>" title="<?=$this->lang->line('army4_name')?>"></th>
                                <th title="<?=$this->lang->line('army5_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/military/x60_y60/y60_slinger_faceright.gif" alt="<?=$this->lang->line('army5_name')?>" title="<?=$this->lang->line('army5_name')?>"></th>
                                <th title="<?=$this->lang->line('army6_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/military/x60_y60/y60_archer_faceright.gif" alt="<?=$this->lang->line('army6_name')?>" title="<?=$this->lang->line('army6_name')?>"></th>
                                <th title="<?=$this->lang->line('army7_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/military/x60_y60/y60_marksman_faceright.gif" alt="<?=$this->lang->line('army7_name')?>" title="<?=$this->lang->line('army7_name')?>"></th>
                            </tr>
                            <tr class="count">
<?for($i = 1; $i <= 7; $i++){?>
<?
    if (($i == 1 and $this->Player_Model->research->res4_3 > 0) or // 4
        ($i == 2 and $this->Player_Model->research->res4_12 > 0) or // 12
        ($i == 3) or // 1
        ($i == 4 and $this->Player_Model->research->res4_3 > 0) or // 6
        ($i == 5) or // 2
        ($i == 6 and $this->Player_Model->research->res4_6 > 0) or // 7
        ($i == 7 and $this->Player_Model->research->res4_11 > 0)){ // 9
?>
<?$class = $this->Data_Model->army_class_by_type($i)?>
    <td><?=$this->Player_Model->armys[$this->Player_Model->town_id]->$class?></td>
<?}else{?>
    <td>-</td>
<?}?>
<?}?>
                            </tr>
                        </table>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th title="<?=$this->lang->line('army8_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/military/x60_y60/y60_ram_faceright.gif" alt="<?=$this->lang->line('army8_name')?>" title="<?=$this->lang->line('army8_name')?>"></th>
                                <th title="<?=$this->lang->line('army9_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/military/x60_y60/y60_catapult_faceright.gif" alt="<?=$this->lang->line('army9_name')?>" title="<?=$this->lang->line('army9_name')?>"></th>
                                <th title="<?=$this->lang->line('army10_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/military/x60_y60/y60_mortar_faceright.gif" alt="<?=$this->lang->line('army10_name')?>" title="<?=$this->lang->line('army10_name')?>"></th>
                                <th title="<?=$this->lang->line('army11_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/military/x60_y60/y60_gyrocopter_faceright.gif" alt="<?=$this->lang->line('army11_name')?>" title="<?=$this->lang->line('army11_name')?>"></th>
                                <th title="<?=$this->lang->line('army12_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/military/x60_y60/y60_bombardier_faceright.gif" alt="<?=$this->lang->line('army12_name')?>" title="<?=$this->lang->line('army12_name')?>"></th>
                                <th title="<?=$this->lang->line('army13_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/military/x60_y60/y60_cook_faceright.gif" alt="<?=$this->lang->line('army13_name')?>" title="<?=$this->lang->line('army13_name')?>"></th>
                                <th title="<?=$this->lang->line('army14_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/military/x60_y60/y60_medic_faceright.gif" alt="<?=$this->lang->line('army14_name')?>" title="<?=$this->lang->line('army14_name')?>"></th>
                            </tr>
                            <tr class="count">
<?for($i = 8; $i <= 14; $i++){?>
<?
    if (($i == 8 and $this->Player_Model->research->res4_4 > 0) or // 3
        ($i == 9 and $this->Player_Model->research->res4_7 > 0) or // 8
        ($i == 10 and $this->Player_Model->research->res4_13 > 0) or // 14
        ($i == 11 and $this->Player_Model->research->res3_12 > 0) or // 10
        ($i == 12 and $this->Player_Model->research->res3_15 > 0) or // 11
        ($i == 13 and $this->Player_Model->research->res2_9 > 0) or // 5
        ($i == 14 and $this->Player_Model->research->res3_8 > 0)){ // 9
?>
<?$class = $this->Data_Model->army_class_by_type($i)?>
    <td><?=$this->Player_Model->armys[$this->Player_Model->town_id]->$class?></td>
<?}else{?>
    <td>-</td>
<?}?>
<?}?>
                            </tr>
                        </table>
                    </div>
                    <div class="footer"></div>
                </div>
<?}else{?>
            <div id="tab2" style="display: block;">
                <div class="contentBox01h">
                    <h3 class="header"><span class="textLabel"><?=$this->lang->line('ships')?></span></h3>
                    <div class="content">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th title="<?=$this->lang->line('army16_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/fleet/60x60/ship_ram_faceright.gif" alt="<?=$this->lang->line('army16_name')?>"></th>
                                <th title="<?=$this->lang->line('army17_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/fleet/60x60/ship_flamethrower_faceright.gif" alt="<?=$this->lang->line('army17_name')?>"></th>
                                <th title="<?=$this->lang->line('army18_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/fleet/60x60/ship_steamboat_faceright.gif" alt="<?=$this->lang->line('army18_name')?>"></th>
                                <th title="<?=$this->lang->line('army19_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/fleet/60x60/ship_ballista_faceright.gif" alt="<?=$this->lang->line('army19_name')?>" /></th>
                            </tr>
                            <tr class="count">
<?for($i = 16; $i <= 19; $i++){?>
<?
    if (($i == 16) or
        ($i == 17 and $this->Player_Model->research->res1_8 > 0) or
        ($i == 18 and $this->Player_Model->research->res1_12 > 0) or
        ($i == 19 and $this->Player_Model->research->res1_2 > 0)){
?>
<?$class = $this->Data_Model->army_class_by_type($i)?>
    <td><?=$this->Player_Model->armys[$this->Player_Model->town_id]->$class?></td>
<?}else{?>
    <td>-</td>
<?}?>
<?}?>
                            </tr>
                        </table>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th title="<?=$this->lang->line('army20_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/fleet/60x60/ship_catapult_faceright.gif" alt="<?=$this->lang->line('army20_name')?>"></th>
                                <th title="<?=$this->lang->line('army21_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/fleet/60x60/ship_mortar_faceright.gif" alt="<?=$this->lang->line('army21_name')?>"></th>
                                <th title="<?=$this->lang->line('army22_name')?>"><img src="<?=$this->config->item('style_url')?>skin/characters/fleet/60x60/ship_submarine_faceright.gif" alt="<?=$this->lang->line('army22_name')?>"></th>
                            </tr>
                            <tr class="count">
<?for($i = 20; $i <= 22; $i++){?>
<?
    if (($i == 20 and $this->Player_Model->research->res1_9 > 0) or
        ($i == 21 and $this->Player_Model->research->res1_13 > 0) or
        ($i == 22 and $this->Player_Model->research->res3_14 > 0)){
?>
<?$class = $this->Data_Model->army_class_by_type($i)?>
    <td><?=$this->Player_Model->armys[$this->Player_Model->town_id]->$class?></td>
<?}else{?>
    <td>-</td>
<?}?>
<?}?>
                            </tr>
                        </table>
                    </div>
                    <div class="footer"></div>
                </div> 
<?}?>
                <div class="contentBox01h">
                    <h3 class="header"><span class="textLabel"><?=$this->lang->line('defender')?></span></h3>
                    <div class="content">
                        <p style="text-align: center;"><?=$this->lang->line('no_allied_units')?></p>
                    </div>
                    <div class="footer"></div>
                </div>

                <div class="contentBox01h">
                    <h3 class="header"><span class="textLabel"><?=$this->lang->line('occupation_units')?></span></h3>
                    <div class="content">
                        <p style="text-align: center;"><?=$this->lang->line('no_occupation_units')?></p>
                    </div>
                    <div class="footer"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    var tabView = new YAHOO.widget.TabView('demo');
    </script>
</div>