<?
    $levels = array();
    for ($i = 0; $i <= 14; $i++)
    {
        $levels[$i] = 0;
    }
?>
<div id="information" class="dynamic" style="z-index:1;">        
    <h3 class="header"><?=$this->lang->line('city')?></h3>
    <div class="content">
        <ul class="cityinfo">
            <li class="name"><span class="textLabel"><?=$this->lang->line('name')?>: </span><?=$this->Player_Model->now_town->name?></li>
            <li class="citylevel"><span class="textLabel"><?=$this->lang->line('city_level')?>: </span><?=$this->Player_Model->now_town->pos0_level?></li>
            <div class="centerButton">
                <a href="<?=$this->config->item('base_url')?>game/cityMilitary/" class="button"><?=$this->lang->line('army_in_city')?></a>
            </div>
        </ul>
    </div>
    <div class="footer"></div>
</div>

<div class="dynamic" id="unitConstructionList">
    <h3 class="header"><?=$this->lang->line('buildings_construction_list')?></h3>
    <div class="content">
<?if($this->Player_Model->user->premium_account > 0){?>
<?if($this->Player_Model->now_town->build_line != ''){
    $ostalos_all = 0;
?>
<?
        $level_text = 'pos'.$this->Player_Model->build_line[$this->Player_Model->town_id][0]['position'].'_level';
        $type_text = 'pos'.$this->Player_Model->build_line[$this->Player_Model->town_id][0]['position'].'_type';
        $level = $this->Player_Model->now_town->$level_text;
        $type = $this->Player_Model->build_line[$this->Player_Model->town_id][0]['type'];
        $levels[$this->Player_Model->build_line[$this->Player_Model->town_id][0]['position']] = $level;
        $cost = $this->Data_Model->building_cost($type, $level, $this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id]);
        $end_date = $this->Player_Model->now_town->build_start + $cost['time'];
        $ostalos = $end_date - time();
        if ($ostalos < 0){ $ostalos = 0; }
        $ostalos_all = $ostalos_all + $ostalos;
        $one_percent = ($cost['time']/100);
        $percent = 100 - floor($ostalos/$one_percent);
?>
    <h4><?=$this->lang->line('in_process')?>:</h4>
    <div class="currentUnit <?=$this->Data_Model->building_class_by_type($type)?>">
        <div class="abortdiv"><a class="abort" title="<?=$this->lang->line('cancel')?>" href="<?=$this->config->item('base_url')?>game/demolition/<?=$this->Player_Model->build_line[$this->Player_Model->town_id][0]['position']?>/"></a></div>
        <div class="amount"><span class="textLabel"><?=$this->Data_Model->building_name_by_type($type)?> (<?=$levels[$this->Player_Model->build_line[$this->Player_Model->town_id][0]['position']]+1?>)</span></div>
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
		startdate: <?=$this->Player_Model->now_town->build_start?>,
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

    <h4><?=$this->lang->line('in_turn')?>:</h4>
    <ul>
<?for($i = 1; $i < SizeOf($this->Player_Model->build_line[$this->Player_Model->town_id]); $i++){?>
<?
        $level_text = 'pos'.$this->Player_Model->build_line[$this->Player_Model->town_id][$i]['position'].'_level';
        $type_text = 'pos'.$this->Player_Model->build_line[$this->Player_Model->town_id][$i]['position'].'_type';
        $level = $this->Player_Model->now_town->$level_text;
        $type = $this->Player_Model->build_line[$this->Player_Model->town_id][$i]['type'];
        $levels[$this->Player_Model->build_line[$this->Player_Model->town_id][$i]['position']] = ($levels[$this->Player_Model->build_line[$this->Player_Model->town_id][$i]['position']] > 0) ? $levels[$this->Player_Model->build_line[$this->Player_Model->town_id][$i]['position']]+1 : $level;
        $cost = $this->Data_Model->building_cost($type, $levels[$this->Player_Model->build_line[$this->Player_Model->town_id][$i]['position']], $this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id]);
        $end_date = $this->Player_Model->now_town->build_start + $cost['time'];
        $ostalos = $end_date - time();
        if ($ostalos < 0){ $ostalos = 0; }
        $ostalos_all = $ostalos_all + $ostalos;
        $one_percent = ($cost['time']/100);
        $percent = 100 - floor($ostalos/$one_percent);
?>
    <li class="<?=$this->Data_Model->building_class_by_type($type)?>">
        <div class="abortdiv"><a class="abort"  title="<?=$this->lang->line('cancel')?>" href="<?=$this->config->item('base_url')?>actions/leaveConstructionList/<?=$i?>/"></a></div>
        <div class="amount"><span class="textLabel"> <?=$this->Data_Model->building_name_by_type($type)?> (<?=$levels[$this->Player_Model->build_line[$this->Player_Model->town_id][$i]['position']]+1?>)</span></div>
        <div class="time" id="queueEntry1"><?=format_time($ostalos_all)?><span class="textLabel"> <?=$this->lang->line('to_complete')?></span></div>
    </li>
<?}?>
    </ul>
<?}?>
<?}else{?>
        <img width="203" height="85" src="<?=$this->config->item('style_url')?>skin/research/area_economy.jpg">
        <p><?=$this->lang->line('premium_turn')?></p>
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>game/premium/" class="button"><?=$this->lang->line('ikariam_plus')?></a>
        </div>
<?}?>
    </div>
    <div class="footer"></div>
</div>
