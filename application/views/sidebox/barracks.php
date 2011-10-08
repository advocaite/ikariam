<div class="dynamic" id="reportInboxLeft">
    <h3 class="header"></h3>
    <div class="content">
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>game/armyGarrisonEdit/" class="button"><?=$this->lang->line('fire_units')?></a>
        </div>
    </div>
    <div class="footer"></div>
</div>

<div id="unitConstructionList" class="dynamic"><h3 class="header"><?=$this->lang->line('buildings_construction_list')?></h3>
    <div class="content">
<?if($this->Player_Model->armys[$this->Player_Model->town_id]->army_line != ''){
    $ostalos_all = 0;
?>
<?
        $type = $this->Player_Model->army_line[$this->Player_Model->town_id][0]['type'];
        $count = $this->Player_Model->army_line[$this->Player_Model->town_id][0]['count'];
        $cost = $this->Data_Model->army_cost_by_type($type, $this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id]);
        $end_date = $this->Player_Model->armys[$this->Player_Model->town_id]->army_start + $cost['time'];
        $ostalos = $end_date - time();
        if ($ostalos < 0){ $ostalos = 0; }
        $ostalos_all = $ostalos_all + $ostalos;
        $one_percent = ($cost['time']/100);
        $percent = 100 - floor($ostalos/$one_percent);
?>
    <h4><?=$this->lang->line('in_process')?>:</h4>
    <div class="currentUnit <?=$this->Data_Model->army_class_by_type($type)?>">
        <div class="amount"><span class="textLabel"><?=$this->Data_Model->army_name_by_type($type)?></span></div>
        <div class="progressbar"><div class="bar" id="buildProgress" title="<?=$percent?>%" style="width:<?=$percent?>%;"></div></div>
        <div class="time" id="buildCountDown"><?=format_time($ostalos_all)?><span class="textLabel"> <?=$this->lang->line('to_complete')?></span></div>
    </div>

<script type="text/javascript">
	getCountdown({
		enddate: <?=$end_date?>,
		currentdate: <?=time()?>,
		el: "buildCountDown"
		}, 2, " ", "", true, true);

	var tmppbar = getProgressBar({
		startdate: <?=$this->Player_Model->armys[$this->Player_Model->town_id]->army_start?>,
		enddate: <?=$end_date?>,
		currentdate: <?=time()?>,
		bar: "buildProgress"
		});
	tmppbar.subscribe("update", function(){
		this.barEl.title=this.progress+"%";
		});
	tmppbar.subscribe("finished", function(){
		this.barEl.title="100%";
		});
</script>


    <h4>В очереди:</h4>
    <ul>
<?if ($count > 1){?>
<?
        $end_date = $this->Player_Model->armys[$this->Player_Model->town_id]->army_start + $cost['time']*($count-1);
        $ostalos = $end_date - time();
        if ($ostalos < 0){ $ostalos = 0; }
        $ostalos_all = $ostalos_all + $ostalos;
?>
    <li class="<?=$this->Data_Model->army_class_by_type($type)?>">
        <div class="amount"><?=$count-1?><span class="textLabel"> <?=$this->Data_Model->army_name_by_type($type)?></span></div>
        <div class="time" id="queueEntry1"><?=format_time($ostalos_all)?><span class="textLabel"> <?=$this->lang->line('to_complete')?></span></div>
    </li>
<?}?>
<?for($i = 1; $i < SizeOf($this->Player_Model->army_line[$this->Player_Model->town_id]); $i++){?>
<?
        $type = $this->Player_Model->army_line[$this->Player_Model->town_id][$i]['type'];
        $count = $this->Player_Model->army_line[$this->Player_Model->town_id][$i]['count'];
        $cost = $this->Data_Model->army_cost_by_type($type, $this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id]);
        $end_date = $this->Player_Model->armys[$this->Player_Model->town_id]->army_start + $cost['time']*$count;
        $ostalos = $end_date - time();
        if ($ostalos < 0){ $ostalos = 0; }
        $ostalos_all = $ostalos_all + $ostalos;
?>
    <li class="<?=$this->Data_Model->army_class_by_type($type)?>">
        <div class="amount"><?=$count?><span class="textLabel"> <?=$this->Data_Model->army_name_by_type($type)?></span></div>
        <div class="time" id="queueEntry1"><?=format_time($ostalos_all)?><span class="textLabel"> <?=$this->lang->line('to_complete')?></span></div>
    </li>
<?}?>
    </ul>
    <div style="text-align:center; padding: 10px 0 10px 0;">
        <a class="button" href="javascript:myConfirm('<?=$this->lang->line('build_cancel')?>','<?=$this->config->item('base_url')?>actions/abortUnits/<?=$position?>/');">Отменить</a>
    </div>
<?}?>

    </div>
    <div class="footer"></div>
</div>
