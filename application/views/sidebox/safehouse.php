<?$all_spyes = SizeOf($this->Player_Model->spyes[$this->Player_Model->town_id])+$this->Player_Model->now_town->spyes?>

<div class="dynamic" id="reportInboxLeft">
    <h3 class="header"><?=$this->lang->line('info')?></h3>
    <div class="content">
        <p><?=$this->lang->line('can_train')?>: <?=$this->Player_Model->levels[$this->Player_Model->town_id][14]?></p>
        <ul>
            <?
                $wait = $this->Player_Model->levels[$this->Player_Model->town_id][14]-$all_spyes;
                if ($wait < 0){ $wait = 0; }
            ?>
        <li><?=$this->lang->line('wait_train')?>: <?=$wait?></li>
        <li><?=$this->lang->line('in_defence')?>: <?=$this->Player_Model->now_town->spyes?></li>
        <li><?=$this->lang->line('spy_in_use')?>: <?=SizeOf($this->Player_Model->spyes[$this->Player_Model->town_id])?></li>
        </ul>
    </div>
    <div class="footer"></div>
</div>
<div id="unitConstructionList" class="dynamic">
    <h3 class="header"><?=$this->lang->line('buildings_construction_list')?> <a class="help" href="<?=$this->config->item('base_url')?>game/informations/35/" title="<?=$this->lang->line('help')?>">
    <span class="textLabel"><?=$this->lang->line('help')?></span></a></h3>
    <div class="content">
<?if($this->Player_Model->now_town->spyes_start > 0){?>
<?$time = $this->Data_Model->spyes_time_by_level($this->Player_Model->levels[$this->Player_Model->town_id][14])?>
        <h4><?=$this->lang->line('in_process')?>:</h4>
        <div class="currentUnit Spy" >
            <div class="amount"><span class="textLabel"><?=$this->lang->line('spy')?></span></div>
            <div class="progressbar">
                <div class="bar" id="buildProgress"></div>
            </div>
            <div class="time" id="buildCountDown"> <?=format_time(($time+$this->Player_Model->now_town->spyes_start) - time())?>
                <span class="textLabel"><?=$this->lang->line('to_complete')?></span>
            </div>
<script type="text/javascript">
Event.onDOMReady(function () {
    getProgressBar({
        startdate: <?=$this->Player_Model->now_town->spyes_start?>,
        enddate: <?=$time+$this->Player_Model->now_town->spyes_start?>,
        currentdate: <?=time()?>,
        interval: 3,
        bar: "buildProgress"
    })
});
Event.onDOMReady(function () {
    getCountdown({
        enddate: <?=$time+$this->Player_Model->now_town->spyes_start?>,
        currentdate: <?=time()?>,
        el: "buildCountDown"
    }, 3, " ", "", true, true)
});
</script>
        </div>
<?}?>
    </div>
    <div class="footer"></div>
</div> 