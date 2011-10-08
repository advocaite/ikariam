<div id="mainview">
<?include_once('building_description.php')?>


    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel"><?=$this->lang->line('trade_partners')?></span></h3>
        <div class="content">
            <div>
		<table cellpadding="0" cellspacing="0" border="0" class="tablekontor">
                    <tr>
                        <th><?=$this->lang->line('city')?></th>
                        <th><?=$this->lang->line('port_level')?></th>
                        <th><?=$this->lang->line('piece')?></th>
                        <th><?=$this->lang->line('resource')?></th>
                        <th><?=$this->lang->line('purchase_price')?></th>
                        <th><?=$this->lang->line('distance')?></th>
                        <th><?=$this->lang->line('trade')?>?</th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="footer"></div>
    </div>

    <form action="<?=$this->config->item('base_url')?>actions/branchOffice/<?=$position?>/" method="POST">
        <div class="contentBox01h" id="finder">
            <h3 class="header"><span class="textLabel"><?=$this->lang->line('trader')?></span></h3>
            <div class="content">
                <div>
                    <table class="search">
                        <tr>
                            <td><input type="radio" name="type" value="1" <?if($this->Player_Model->now_town->branch_search_type == 1){?>checked<?}?>></td>
                            <td class="text"><?=$this->lang->line('buy')?></td>
                            <td><input type="radio" name="type" value="0" <?if($this->Player_Model->now_town->branch_search_type == 0){?>checked<?}?>></td>
                            <td class="text"><?=$this->lang->line('sell')?></td>
                            <td>
                                <div>
                                    <select name="searchResource">
                                        <option value="resource" <?if($this->Player_Model->now_town->branch_search_resource == 0){?>selected<?}?>><?=$this->lang->line('wood')?></option>
                                        <option value="1" <?if($this->Player_Model->now_town->branch_search_resource == 1){?>selected<?}?>><?=$this->lang->line('wine')?></option>
                                        <option value="2" <?if($this->Player_Model->now_town->branch_search_resource == 2){?>selected<?}?>><?=$this->lang->line('marble')?></option>
                                        <option value="3" <?if($this->Player_Model->now_town->branch_search_resource == 3){?>selected<?}?>><?=$this->lang->line('crystal')?></option>
                                        <option value="4" <?if($this->Player_Model->now_town->branch_search_resource == 4){?>selected<?}?>><?=$this->lang->line('sulfur')?></option>
                                    </select>
                                </div>
                            </td>
                            <td><?=$this->lang->line('search_radius')?>:</td>
                            <td>
<?$radius = $this->Data_Model->branchOffice_radius_by_level($this->Player_Model->levels[$this->Player_Model->town_id][12])?>
                                <select size="1" name="range">
<?for ($i = 1; $i <= $radius; $i++){?>
                                    <option <?if($this->Player_Model->now_town->branch_search_radius == $i){?>selected="selected"<?}?>><?=$i?></option>
<?}?>
                                </select>
                            </td>
                            <td><?=$this->lang->line('islands_radius')?></td>
                        </tr>
                    </table>
                </div>
                <div>
                    <div class="centerButton"><input type="submit" class="button" style="clear:right;" value="<?=$this->lang->line('find_trade')?>"></div>
                </div>
            </div>
            <div class="footer"></div>
						
        </div>
    </form>

    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel"><?=$this->lang->line('results')?></span></h3>
        <div class="content">
            <div>
                <table cellpadding="0" cellspacing="0" border="0" class="tablekontor">

                    <tr>
                        <th><?=$this->lang->line('city')?>
                            <a href="<?=$this->config->item('base_url')?>game/branchOffice/<?=$position?>/cityAsc/" class="unicode">&uArr;</a>
                            <a href="<?=$this->config->item('base_url')?>game/branchOffice/<?=$position?>/cityDesc/" class="unicode">&dArr;</a>
                        </th>
			<th><?=$this->lang->line('port_level')?>
                            <?/*<a href="<?=$this->config->item('base_url')?>game/branchOffice/<?=$position?>/portLevelAsc/" class="unicode">&uArr;</a>
                            <a href="<?=$this->config->item('base_url')?>game/branchOffice/<?=$position?>/portLevelDesc/" class="unicode">&dArr;</a>*/?>
                        </th>
                        <th><?=$this->lang->line('piece')?>
                            <a href="<?=$this->config->item('base_url')?>game/branchOffice/<?=$position?>/ressAsc/" class="unicode">&uArr;</a>
                            <a href="<?=$this->config->item('base_url')?>game/branchOffice/<?=$position?>/ressDesc/" class="unicode">&dArr;</a>
                        </th>
                        <th><?=$this->lang->line('resource')?></th>
                        <th><?=$this->lang->line('purchase_price')?>
                            <a href="<?=$this->config->item('base_url')?>game/branchOffice/<?=$position?>/sellAsc/" class="unicode">&uArr;</a>
                            <a href="<?=$this->config->item('base_url')?>game/branchOffice/<?=$position?>/sellDesc/" class="unicode">&dArr;</a>
                        </th>
                        <th><?=$this->lang->line('distance')?>
                            <?/*<a href="<?=$this->config->item('base_url')?>game/branchOffice/<?=$position?>/distanceAsc/" class="unicode">&uArr;</a>
                            <a href="<?=$this->config->item('base_url')?>game/branchOffice/<?=$position?>/distanceDesc/" class="unicode">&dArr;</a>*/?>
                        </th>
                        <th><?=$this->lang->line('trade')?>?</th>
                    </tr>
<?
$resource_name = $this->Data_Model->resource_class_by_type($this->Player_Model->now_town->branch_search_resource);
switch($param2)
{
    case 'cityDesc': $order = 'ORDER BY `name` DESC'; break;
    case 'cityAsc': $order = 'ORDER BY `name` ASC'; break;
    case 'ressDesc': $order = 'ORDER BY `branch_trade_'.$resource_name.'_count` DESC'; break;
    case 'ressAsc': $order = 'ORDER BY `branch_trade_'.$resource_name.'_count` ASC'; break;
    case 'sellDesc': $order = 'ORDER BY `branch_trade_'.$resource_name.'_cost` DESC'; break;
    case 'sellAsc': $order = 'ORDER BY `branch_trade_'.$resource_name.'_cost` ASC'; break;
    default: $order = ''; break;
}
    $type = $this->Player_Model->now_town->branch_search_type;
    $trades_query = $this->db->query("SELECT * FROM ".$this->session->userdata('universe')."_towns WHERE `branch_trade_".$resource_name."_type`='".$type."' and  `branch_trade_".$resource_name."_count` > 0  and `user`<>".$this->Player_Model->user->id." ".$order);
?>
<?if($trades_query->num_rows > 0){?>
<?foreach ($trades_query->result() as $trade_town){?>
<?
    if (!isset($this->Data_Model->temp_towns_db[$trade_town->id])){ $this->Data_Model->temp_towns_db[$trade_town->id] = $trade_town; }
    $this->Data_Model->Load_Island($trade_town->island);
    $trade_island = $this->Data_Model->temp_islands_db[$trade_town->island];
    $distance = ceil(sqrt((($this->Player_Model->now_island->x - $trade_island->x)*($this->Player_Model->now_island->x - $trade_island->x))+(($this->Player_Model->now_island->y - $trade_island->y)*($this->Player_Model->now_island->y - $trade_island->y))));
?>
<?if($this->Player_Model->now_town->branch_search_radius >= $distance){?>
<?
    $this->Data_Model->Load_User($trade_town->user);
    $trade_user = $this->Data_Model->temp_users_db[$trade_town->user];
    $port_position = $this->Data_Model->get_position(12, $trade_town);
    $level_text = 'pos'.$port_position.'_level';
    $port_level = $trade_town->$level_text;
    $branch_count = 'branch_trade_'.$resource_name.'_count';
    $branch_cost = 'branch_trade_'.$resource_name.'_cost';
?>
                    <tr  class="<?if (($i % 2) == 0){?>alt<?}else{?>empty<?}?>">
                        <td><?=$trade_town->name?> (<?=$trade_user->login?>)</td>
                        <td><?=$port_level?></td>
                        <td><?=$trade_town->$branch_count?></td>
                        <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_<?=resource_icon($this->Player_Model->now_town->branch_search_resource)?>.gif" alt="<?=$this->Data_Model->resource_name_by_type($this->Player_Model->now_town->branch_search_resource)?>" title="<?=$this->Data_Model->resource_name_by_type($this->Player_Model->now_town->branch_search_resource)?>"></td>
                        <td><?=$trade_town->$branch_cost?> <img src="<?=$this->config->item('style_url')?>skin/resources/icon_gold.gif"> <?=$this->lang->line('per_piece')?></td>
                        <td><?=ceil($distance)?></td>
                        <td><a href="<?=$this->config->item('base_url')?>game/takeOffer/<?=$trade_town->id?>/<?=$this->Player_Model->now_town->branch_search_type?>/<?=$this->Player_Model->now_town->branch_search_resource?>/"><img src="<?=$this->config->item('style_url')?>skin/layout/icon-kiste.gif" alt="" title=""></a></td>
                    </tr>
<?}else{?>
                    <tr>
                        <td colspan="6" class="paginator"><?=$this->lang->line('no_offers')?></td>
                    </tr>
<?}}}else{?>
                    <tr>
                        <td colspan="6" class="paginator"><?=$this->lang->line('no_offers')?></td>
                    </tr>
<?}?>
                </table>
            </div>
        </div>
        <div class="footer"></div>
    </div>
				
    <form name="formkontor"  action="<?=$this->config->item('base_url')?>actions/branchOffice/<?=$position?>/" method="POST">
        <div class="contentBox01h">
            <h3 class="header"><span class="textLabel"><?=$this->lang->line('own_offers')?></span></h3>
            <div class="content">
                <table cellpadding="0" cellspacing="0" border="0" class="tablekontor">
                   <tr>
                        <th colspan="2"><?=$this->lang->line('type_offer')?></th><th><?=$this->lang->line('amount')?></th><th><?=$this->lang->line('price')?></th>
                    </tr>
                    <tr>
                        <td class="icon"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wood.gif" alt="<?=$this->lang->line('wood')?>" title="<?=$this->lang->line('ialsnd_building_wood')?>"/></td>
                        <td class="select"><select name="resourceTradeType" id="resourceTradeType" size="1"><option value="0" <?if($this->Player_Model->now_town->branch_trade_wood_type == 0){?>selected<?}?>><?=$this->lang->line('own_buy')?></option><option value="1" <?if($this->Player_Model->now_town->branch_trade_wood_type == 1){?>selected<?}?>><?=$this->lang->line('own_sell')?></option></select></td>
                        <td><input type="text" size="4" name="resource" id="resource" value="<?=$this->Player_Model->now_town->branch_trade_wood_count?>" /></td>
                        <td><input type="text" size="2" name="resourcePrice"  id="resourcePrice"  maxlength="2" value="<?=$this->Player_Model->now_town->branch_trade_wood_cost?>" /><img src="<?=$this->config->item('style_url')?>skin/resources/icon_gold.gif"/> <?=$this->lang->line('per_piece')?></td>
                    </tr>
                    <tr class="alt">
                        <td class="icon"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wine.gif" alt="<?=$this->lang->line('wine')?>" title="<?=$this->lang->line('ialsnd_building_wine')?>"/></td>
                        <td class="select"><select name="tradegood1TradeType" id="tradegood1TradeType" size="1"><option value="0" <?if($this->Player_Model->now_town->branch_trade_wine_type == 0){?>selected<?}?>><?=$this->lang->line('own_buy')?></option><option value="1" <?if($this->Player_Model->now_town->branch_trade_wine_type == 1){?>selected<?}?>><?=$this->lang->line('own_sell')?></option></select></td>
                        <td><input type="text" size="4" name="tradegood1" id="tradegood1" value="<?=$this->Player_Model->now_town->branch_trade_wine_count?>" /></td>
                        <td><input type="text" size="2" name="tradegood1Price" id="tradegood1Price" maxlength="2" value="<?=$this->Player_Model->now_town->branch_trade_wine_cost?>" /><img src="<?=$this->config->item('style_url')?>skin/resources/icon_gold.gif" /> <?=$this->lang->line('per_piece')?></td>
                    </tr>
                    <tr>
                        <td class="icon"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_marble.gif" alt="<?=$this->lang->line('marble')?>" title="<?=$this->lang->line('ialsnd_building_marble')?>"/></td>
                        <td class="select"><select name="tradegood2TradeType" id="tradegood2TradeType" size="1"><option value="0" <?if($this->Player_Model->now_town->branch_trade_marble_type == 0){?>selected<?}?>><?=$this->lang->line('own_buy')?></option><option value="1" <?if($this->Player_Model->now_town->branch_trade_marble_type == 1){?>selected<?}?>><?=$this->lang->line('own_sell')?></option></select></td>
                        <td><input type="text" size="4" name="tradegood2" id="tradegood2" value="<?=$this->Player_Model->now_town->branch_trade_marble_count?>" /></td>
                        <td><input type="text" size="2" name="tradegood2Price" id="tradegood2Price" maxlength="2" value="<?=$this->Player_Model->now_town->branch_trade_marble_cost?>"/><img src="<?=$this->config->item('style_url')?>skin/resources/icon_gold.gif"/> <?=$this->lang->line('per_piece')?></td>
                    </tr>
                    <tr class="alt">
                        <td class="icon"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_glass.gif" alt="<?=$this->lang->line('crystal')?>" title="<?=$this->lang->line('ialsnd_building_crystal')?>"></td>
                        <td class="select"><select name="tradegood3TradeType" id="tradegood3TradeType" size="1"><option value="0" <?if($this->Player_Model->now_town->branch_trade_crystal_type == 0){?>selected<?}?>><?=$this->lang->line('own_buy')?></option><option value="1" <?if($this->Player_Model->now_town->branch_trade_crystal_type == 1){?>selected<?}?>><?=$this->lang->line('own_sell')?></option></select></td>
                        <td><input type="text" size="4" name="tradegood3" id="tradegood3" value="<?=$this->Player_Model->now_town->branch_trade_crystal_count?>"></td>
                        <td><input type="text" size="2" name="tradegood3Price" id="tradegood3Price" maxlength="2" value="<?=$this->Player_Model->now_town->branch_trade_crystal_cost?>"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_gold.gif"/> <?=$this->lang->line('per_piece')?></td>
                    </tr>
                    <tr>
                        <td class="icon"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_sulfur.gif" alt="<?=$this->lang->line('sulfur')?>" title="<?=$this->lang->line('ialsnd_building_sulfur')?>"/></td>
                        <td class="select"><select name="tradegood4TradeType" id="tradegood4TradeType" size="1"><option value="0" <?if($this->Player_Model->now_town->branch_trade_sulfur_type == 0){?>selected<?}?>><?=$this->lang->line('own_buy')?></option><option value="1" <?if($this->Player_Model->now_town->branch_trade_sulfur_type == 1){?>selected<?}?>><?=$this->lang->line('own_sell')?></option></select></td>
                        <td><input type="text" size="4" name="tradegood4" id="tradegood4" value="<?=$this->Player_Model->now_town->branch_trade_sulfur_count?>" /></td>
                        <td><input type="text" size="2" name="tradegood4Price" id="tradegood4Price" maxlength="2" value="<?=$this->Player_Model->now_town->branch_trade_sulfur_cost?>" /><img src="<?=$this->config->item('style_url')?>skin/resources/icon_gold.gif"/> <?=$this->lang->line('per_piece')?></td>
                    </tr>
                </table>
<?
    $reserved = 0;
    if ($this->Player_Model->now_town->branch_trade_wood_type == 0){$reserved = $reserved + $this->Player_Model->now_town->branch_trade_wood_count*$this->Player_Model->now_town->branch_trade_wood_cost;}
    if ($this->Player_Model->now_town->branch_trade_wine_type == 0){$reserved = $reserved + $this->Player_Model->now_town->branch_trade_wine_count*$this->Player_Model->now_town->branch_trade_wine_cost;}
    if ($this->Player_Model->now_town->branch_trade_marble_type == 0){$reserved = $reserved + $this->Player_Model->now_town->branch_trade_marble_count*$this->Player_Model->now_town->branch_trade_marble_cost;}
    if ($this->Player_Model->now_town->branch_trade_crystal_type == 0){$reserved = $reserved + $this->Player_Model->now_town->branch_trade_crystal_count*$this->Player_Model->now_town->branch_trade_crystal_cost;}
    if ($this->Player_Model->now_town->branch_trade_sulfur_type == 0){$reserved = $reserved + $this->Player_Model->now_town->branch_trade_sulfur_count*$this->Player_Model->now_town->branch_trade_sulfur_cost;}
?>
                <div><p><?=$this->lang->line('reserved_gold')?>: <span id="reservedGold"><?=floor($reserved)?></span> <img src="<?=$this->config->item('style_url')?>skin/resources/icon_gold.gif" /></p><input type="submit" class="button" value="<?=$this->lang->line('update_offers')?>"/></div>
            </div>
            <div class="footer"></div>
        </div>
    </form>

</div>

<script language="javascript">
	function checkBranchOffice(e, num) { 
        var tradeType = new Array();
        var tradegood = new Array();
        var tradegoodPrice = new Array();
        var resources = new Array();
        tradeType[0] = Dom.get("resourceTradeType");
        tradeType[1] = Dom.get("tradegood1TradeType");
        tradeType[2] = Dom.get("tradegood2TradeType");
        tradeType[3] = Dom.get("tradegood3TradeType");
        tradeType[4] = Dom.get("tradegood4TradeType");
        tradegood[0] = Dom.get("resource");
        tradegoodPrice[0] = Dom.get("resourcePrice");
        tradegood[1] = Dom.get("tradegood1");
        tradegoodPrice[1] = Dom.get("tradegood1Price");
        tradegood[2] = Dom.get("tradegood2");
        tradegoodPrice[2] = Dom.get("tradegood2Price");
        tradegood[3] = Dom.get("tradegood3");
        tradegoodPrice[3] = Dom.get("tradegood3Price");
        tradegood[4] = Dom.get("tradegood4");
        tradegoodPrice[4] = Dom.get("tradegood4Price");
        <?$wood = $this->Player_Model->now_town->wood?>
        <?if($this->Player_Model->now_town->branch_trade_wood_type == 1 and $this->Player_Model->now_town->branch_trade_wood_count > 0){ $wood = $wood + $this->Player_Model->now_town->branch_trade_wood_count; }?>
        resources[0] = <?=floor($wood)?>;
        <?$wine = $this->Player_Model->now_town->wine?>
        <?if($this->Player_Model->now_town->branch_trade_wine_type == 1 and $this->Player_Model->now_town->branch_trade_wine_count > 0){ $wine = $wine + $this->Player_Model->now_town->branch_trade_wine_count; }?>
        resources[1] = <?=floor($wine)?>;
        <?$marble = $this->Player_Model->now_town->marble?>
        <?if($this->Player_Model->now_town->branch_trade_marble_type == 1 and $this->Player_Model->now_town->branch_trade_marble_count > 0){ $marble = $marble + $this->Player_Model->now_town->branch_trade_marble_count; }?>
        resources[2] = <?=floor($marble)?>;
        <?$crystal = $this->Player_Model->now_town->crystal?>
        <?if($this->Player_Model->now_town->branch_trade_crystal_type == 1 and $this->Player_Model->now_town->branch_trade_crystal_count > 0){ $crystal = $crystal + $this->Player_Model->now_town->branch_trade_crystal_count; }?>
        resources[3] = <?=floor($crystal)?>;
        <?$sulfur = $this->Player_Model->now_town->sulfur?>
        <?if($this->Player_Model->now_town->branch_trade_sulfur_type == 1 and $this->Player_Model->now_town->branch_trade_sulfur_count > 0){ $sulfur = $sulfur + $this->Player_Model->now_town->branch_trade_sulfur_count; }?>
        resources[4] = <?=floor($sulfur)?>;
        var gold = <?=$this->Player_Model->user->gold?>;
        var costs = 0;
        var sumCosts = 0;
        var storageCapacity = <?=$this->Data_Model->branchOffice_capacity_by_level($this->Player_Model->levels[$this->Player_Model->town_id][12])?>;
        var sumStorage = 0;
        for (i=0; i<5; i++) {
            if (tradeType[i].value == 0) {
                sumCosts += tradegood[i].value * tradegoodPrice[i].value;
            } else {
                sumStorage += tradegood[i].value * 1; // *1 converts to int
            }
        }
        if(sumCosts > gold) {
            sumCosts -= tradegood[num].value * tradegoodPrice[num].value;
            tradegood[num].value = 0;
            dif = gold - sumCosts;
            tradegood[num].value = Math.floor(dif / tradegoodPrice[num].value);
            sumCosts += tradegood[num].value * tradegoodPrice[num].value;
            if (sumCosts > gold) {
                sumCosts -= tradegood[num].value * tradegoodPrice[num].value;
                tradegood[num].value = 0;
            }
        }
        if(sumStorage > storageCapacity) {
            sumStorage -= tradegood[num].value;
            tradegood[num].value = 0;
            dif = storageCapacity - sumStorage;
            tradegood[num].value = dif;
            sumStorage += dif;
            if (sumStorage > storageCapacity) {
                sumStorage -= tradegood[num].value;
                tradegood[num].value = 0;
            }
        }
        Dom.get("reservedGold").innerHTML = sumCosts;
        for (i=0; i<5; i++) {
            if (tradeType[i].value == 1) {
                if (tradegood[i].value > resources[i]) {
                    tradegood[i].value = resources[i];
                    tradegood[i].focus();
                    break;
                }
            }
        }
	}
	Event.onDOMReady(function() {
    	Event.addListener(Dom.get("resourceTradeType"),   "change", checkBranchOffice, 0);
    	Event.addListener(Dom.get("tradegood1TradeType"), "change", checkBranchOffice, 1);
    	Event.addListener(Dom.get("tradegood2TradeType"), "change", checkBranchOffice, 2);
    	Event.addListener(Dom.get("tradegood3TradeType"), "change", checkBranchOffice, 3);
    	Event.addListener(Dom.get("tradegood4TradeType"), "change", checkBranchOffice, 4);
    	Event.addListener(Dom.get("resource"), 			  "keyup", checkBranchOffice, 0);
    	Event.addListener(Dom.get("resourcePrice"), 	  "keyup", checkBranchOffice, 0);
    	Event.addListener(Dom.get("tradegood1"),		  "keyup", checkBranchOffice, 1);
    	Event.addListener(Dom.get("tradegood1Price"), 	  "keyup", checkBranchOffice, 1);
    	Event.addListener(Dom.get("tradegood2"),		  "keyup", checkBranchOffice, 2);
    	Event.addListener(Dom.get("tradegood2Price"), 	  "keyup", checkBranchOffice, 2);
    	Event.addListener(Dom.get("tradegood3"),		  "keyup", checkBranchOffice, 3);
    	Event.addListener(Dom.get("tradegood3Price"), 	  "keyup", checkBranchOffice, 3);
    	Event.addListener(Dom.get("tradegood4"),		  "keyup", checkBranchOffice, 4);
    	Event.addListener(Dom.get("tradegood4Price"),	  "keyup", checkBranchOffice, 4);
	});
</script>