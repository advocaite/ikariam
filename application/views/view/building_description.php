<?
    $level_text = 'pos'.$position.'_level';
    $type_text = 'pos'.$position.'_type';
    $level = $this->Player_Model->now_town->$level_text;
    $class = $this->Player_Model->now_town->$type_text;
?>
<?if ($this->Player_Model->now_town->build_line != '' and $this->Player_Model->build_line[$this->Player_Model->town_id][0]['position'] == $position){?>
    <div class="buildingDescription">
        <h1 style="text-align:center"><?=$this->Data_Model->building_name_by_type($class)?></h1>
<?
    $cost = $this->Data_Model->building_cost($class, $level, $this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id]);
    $end_date = $this->Player_Model->now_town->build_start + $cost['time'];
    $ostalos = $end_date - time();
    $one_percent = ($cost['time']/100);
    $percent = 100 - floor($ostalos/$one_percent);
?>
    <div id="upgradeInProgress">
        <div class="isUpgrading"><?=$this->lang->line('is_upgrading')?></div>
        <div class="buildingLevel"><span class="textLabel"><?=$this->lang->line('level')?> </span><?=$level?></div>
        <div class="nextLevel"><span class="textLabel"><?=$this->lang->line('next_level')?> </span><?=$level+1?></div>
        <div class="progressBar">
            <div class="bar" id="upgradeProgress" title="<?=$percent?>%" style="width:<?=$percent?>%;"></div>
            <a class="cancelUpgrade" href="<?=$this->config->item('base_url')?>game/demolition/<?=$position?>/" title="<?=$this->lang->line('cancel')?>"><span class="textLabel"><?=$this->lang->line('cancel')?></span></a>
        </div>

                                <script type="text/javascript">
				Event.onDOMReady(function() {
					var tmppbar = getProgressBar({
						startdate: <?=$this->Player_Model->now_town->build_start?>,
						enddate: <?=$end_date?>,
						currentdate: <?=time()?>,
						bar: "upgradeProgress"
						});
					tmppbar.subscribe("update", function(){
						this.barEl.title=this.progress+"%";
						});
					tmppbar.subscribe("finished", function(){
						this.barEl.title="100%";
						});
				});
				</script>


        <div class="time" id="upgradeCountDown"><?=format_time($ostalos)?></div>

                                <script type="text/javascript">
				Event.onDOMReady(function() {
					var tmpCnt = getCountdown({
						enddate: <?=$end_date?>,
						currentdate: <?=time()?>,
						el: "upgradeCountDown"
						}, 2, " ", "", true, true);
					tmpCnt.subscribe("finished", function() {
						setTimeout(function() {
							location.href="<?=$this->config->item('base_url')?>game/<?=$this->Data_Model->building_class_by_type($class)?>/<?=$position?>/";
							},2000);
						});
					});
				</script>

    </div>
    </div>
<?}else{?>
    <div class="buildingDescription">
        <h1><?=$this->Data_Model->building_name_by_type($class)?></h1>
        <p><?=$this->Data_Model->building_desc_by_type($class)?></p>
    </div>
<?}?>