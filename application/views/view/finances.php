<div id="mainview">
<h1><?=$this->lang->line('balances')?></h1>

<table cellspacing="0" cellspacing="0" id="balance" class="table01">
    <tr>
        <td class="sigma"><?=$this->lang->line('amount_gold')?></td>
        <td class="value res"></td>
        <td class="value res"></td>
        <td class="value res"><?=number_format($this->Player_Model->user->gold)?></td>
    </tr>
</table>

<table cellspacing="0" cellspacing="0" id="balance" class="table01">
<tr>
	<th class="city"><img src="<?=$this->config->item('style_url')?>skin/layout/icon-city2.gif" /></th>
    <th><?=$this->lang->line('income')?></th>
    <th><?=$this->lang->line('scientists')?></th>
    <th><?=$this->lang->line('amount')?></th>
</tr>
<?
    $summ_dohod = 0;
    $summ_rashod = 0;
    $summ_ostalos = 0;
?>
<?foreach($this->Player_Model->towns as $town){?>
<?
    $dohod = $this->Player_Model->towns[$town->id]->peoples*3;
    $rashod = $this->Player_Model->towns[$town->id]->scientists*$this->Player_Model->scientists_gold_need*-1;

    $summ_dohod = $summ_dohod + $dohod;
    $summ_rashod = $summ_rashod + $rashod;
    $summ_ostalos = $summ_dohod+$summ_rashod;
?>
    <tr >
        <td class="city"><?=$town->name?></td>
        <td class="value res"><?=number_format($dohod)?></td>
        <td class="value res"><?=number_format($rashod)?></td>
        <td class="value res"><?=number_format($dohod+$rashod)?></td>
    </tr>
<?}?>
 	<tr class="result">
 		<td class="sigma"><img src="<?=$this->config->item('style_url')?>skin/layout/sigma.gif" /></td>
 		<td class="value res"><?=number_format($summ_dohod)?></td>
 		<td class="value res"><?=number_format($summ_rashod)?></td>
 		<td class="value res"><?=number_format($summ_ostalos)?></td>
 	</tr>
</table>

<?
    $army_gold = 0;
    $fleet_gold = 0;
    $army_gold_research = 0;
    $fleet_gold_research = 0;

    foreach($this->Player_Model->towns as $town)
    {
        // содержание
        for ($a = 1; $a <= 14; $a ++)
        {
            $class = $this->Data_Model->army_class_by_type($a);
            if ($this->Player_Model->armys[$town->id]->$class > 0)
            {
                $cost = $this->Data_Model->army_cost_by_type($a, $this->Player_Model->research, $this->Player_Model->levels[$town->id], FALSE);
                $army_gold = $army_gold + ($cost['gold']*$this->Player_Model->armys[$town->id]->$class);
                $cost = $this->Data_Model->army_cost_by_type($a, $this->Player_Model->research, $this->Player_Model->levels[$town->id], TRUE);
                $army_gold_research = $army_gold_research + ($cost['gold']*$this->Player_Model->armys[$town->id]->$class);
            }
         }
         for ($a = 16; $a <= 22; $a ++)
         {
            $class = $this->Data_Model->army_class_by_type($a);
            if ($this->Player_Model->armys[$town->id]->$class > 0)
            {
                $cost = $this->Data_Model->army_cost_by_type($a, $this->Player_Model->research, $this->Player_Model->levels[$town->id], FALSE);
                $fleet_gold = $fleet_gold + ($cost['gold']*$this->Player_Model->armys[$town->id]->$class);
                $cost = $this->Data_Model->army_cost_by_type($a, $this->Player_Model->research, $this->Player_Model->levels[$town->id], TRUE);
                $fleet_gold_research = $fleet_gold_research + ($cost['gold']*$this->Player_Model->armys[$town->id]->$class);
            }
         }
    }

    $all_army_gold = ($army_gold_research + $fleet_gold_research)*-1;
?>

<table cellspacing="0" cellpadding="0" id="upkeepReductionTable" class="table01" border="0px">
    <tr>
        <th colspan="4"><?=$this->lang->line('army_cost')?></th>
    </tr>
        <tr >
            <td class="reason"><?=$this->lang->line('troops')?></td>
            <td class="costs"><?=number_format($army_gold)?></td>
            <td class="bar"><div class="greenBarDiv barBorder" style="width:99%" title="<?=$this->lang->line('cost')?>">
                <div class="brownBarDiv" style="width:100%" title="<?=$this->lang->line('cost')?>">
                </div>
            </div>
            </td>

            <td class="hidden"></td>
        </tr>
                    <tr class="altbottomLine">
            <td class="reason">- <?=$this->lang->line('researches')?></td>
            <td class="boldcosts"><?=number_format($army_gold_research)?></td>
            <td class="bar"><div class="greenBarDiv barBorder" style="width:99%" title="<?=$this->lang->line('cost')?>">
                <div class="brownBarDiv" style="width:<?if($army_gold_research > 0 and $army_gold > 0){?><?=floor(($army_gold_research/$army_gold)*100)?><?}else{?>100<?}?>%" title="<?=$this->lang->line('cost')?>">
                </div>
            </div>
            </td>

            <td class="hidden"><?=number_format($army_gold_research)?></td>
        </tr>

                        <tr >
            <td class="reason"><?=$this->lang->line('fleets')?></td>
            <td class="costs"><?=number_format($fleet_gold)?></td>
            <td class="bar"><div class="greenBarDiv barBorder" style="width:99%" title="<?=$this->lang->line('cost')?>">
                <div class="brownBarDiv" style="width:100%" title="<?=$this->lang->line('cost')?>">
                </div>
            </div>
            </td>

            <td class="hidden"></td>
        </tr>
                    <tr class="altbottomLine">
            <td class="reason">- <?=$this->lang->line('researches')?></td>
            <td class="boldcosts"><?=number_format($fleet_gold_research)?></td>
            <td class="bar"><div class="greenBarDiv barBorder" style="width:99%" title="<?=$this->lang->line('cost')?>">
                <div class="brownBarDiv" style="width:<?if($fleet_gold_research > 0 and $fleet_gold > 0){?><?=floor(($fleet_gold_research/$fleet_gold)*100)?><?}else{?>100<?}?>%" title="<?=$this->lang->line('cost')?>">
                </div>
            </div>
            </td>

            <td class="hidden"><?=number_format($fleet_gold_research)?></td>
        </tr>
         <tr class="result">
 		<td class="reason"><img src="<?=$this->config->item('style_url')?>skin/layout/sigma.gif" alt="<?=$this->lang->line('total')?>" /></td>
 		<td class="costs"></td>
 		<td class="bar"></td>
 		<td class="hidden"><?=number_format($army_gold_research+$fleet_gold_research)?></td>
 	</tr>
</table>

<table cellspacing="0" cellpadding="0" id="upkeepReductionTable" class="table01" border="0px">
    <tr><th colspan="4"><?=$this->lang->line('total')?></th></tr>
    <tr>
        <td class="reason"><?=$this->lang->line('income')?></td>
        <td class="costs"></td>
 		<td class="bar">
            <div class="greenBarDiv barBorder" style="width:99%" title="<?=$this->lang->line('income')?>">
                <div class="brownBarDiv" style="width: 100%" title="<?=$this->lang->line('income')?>">
                </div>
            </div>
        </td>
        <td class="hidden"><?=number_format($summ_ostalos)?></td>
    </tr>
    <tr>
        <td class="reason"> - <?=$this->lang->line('upkeep')?></td>
        <td class="costs"></td>
 		<td class="bar">
            <div class="redBarDiv barBorder" style="width:99%" title="<?=$this->lang->line('cost')?>">
                                <div class="brownBarDiv" style="width: <?if($summ_ostalos > 0 and ($all_army_gold*-1) > 0){?><?=100-floor((($all_army_gold*-1)/$summ_ostalos)*100)?><?}else{?>100<?}?>%" title="<?=$this->lang->line('income')?>">
                </div>
            </div>
        </td>
        <td class="hidden"><?=number_format($all_army_gold)?></td>
    </tr>
    <tr class="result">
        <td class="reason"><img src="<?=$this->config->item('style_url')?>skin/layout/sigma.gif" alt="<?=$this->lang->line('total')?>" /></td>
        <td class="costs"></td>
 		<td class="bar"></td>
        <td class="hidden"><?=number_format($summ_ostalos - ($all_army_gold*-1))?></td>
    </tr>
</table>

<br><br>
</div> 