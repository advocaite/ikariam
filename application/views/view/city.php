<?$position = $param1?>
<div id="mainview" class="phase<?=$this->Player_Model->now_town->pos0_level?>">
    <ul id="locations">
<?
for ($i = 0; $i <= 14; $i++)
{
    $type_text = 'pos'.$i.'_type';
    $level_text = 'pos'.$i.'_level';
    $class = $this->Player_Model->now_town->$type_text;
    $level = $this->Player_Model->now_town->$level_text;
    $sub_class = ($i > 0) & ($i < 3) ? 'shore' : 'land';
    $sub_class = ($i == 14) ? 'wall' : $sub_class;
    $image = ($level == 0 and $class == 0) ? 'flag' : 'buildingimg';
?>

<?if ($this->Player_Model->now_town->build_line != '' and $this->Player_Model->build_line[$this->Player_Model->town_id][0]['position'] == $i){?>
<?
    $type_text = 'pos'.$this->Player_Model->build_line[$this->Player_Model->town_id][0]['position'].'_type';
    $level_text = 'pos'.$this->Player_Model->build_line[$this->Player_Model->town_id][0]['position'].'_level';
    $level = $this->Player_Model->now_town->$level_text;
    $type = $this->Player_Model->build_line[$this->Player_Model->town_id][0]['type'];
    $cost = $this->Data_Model->building_cost($type, $level, $this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id]);
    $end_date = $this->Player_Model->now_town->build_start + $cost['time'];
    $ostalos = $end_date - time();
?>

        <li id="position<?=$i?>" class="<?=$this->Data_Model->building_class_by_type($type)?>">
            <div class="constructionSite"></div>
            <a href="<?=$this->config->item('base_url')?>game/<?=$this->Data_Model->building_class_by_type($type)?>/<?=$i?>/" title="<?=$this->Data_Model->building_name_by_type($type)?> <?=$this->lang->line('level')?> <?=$level?>"><span class="textLabel"><?=$this->Data_Model->building_name_by_type($type)?> <?=$this->lang->line('level')?> <?=$level?> (<?=$this->lang->line('under_construction')?>)</span></a>
            <div class="timetofinish"><span class="before"></span><span class="textLabel"><?=$this->lang->line('time_till')?>: </span><span id="cityCountdown"><?=format_time($ostalos)?></span><span class="after"></span></div>

        <script type="text/javascript">
            var tmpCnt =    getCountdown({
                enddate: <?=$end_date?>,
                currentdate: <?=time()?>,
                el: "cityCountdown"
            });
            tmpCnt.subscribe("finished", function() {
                top.document.title = "<?=$this->lang->line('ikariam')?>";
                setTimeout(function() {
                    location.href="<?=$this->config->item('base_url')?>game/city/";
                },2000);
            });
        </script>

<?}else{?>
        <li id="position<?=$i?>" class="<?=$this->Data_Model->building_class_by_type($class)?> <?if ($level == 0 and $class == 0){?><?=$sub_class?><?}?>">
<?if ($i == 13 and $this->Player_Model->research->res2_13 == 0) {?>
            <div></div>
            <a href="#" title="<?=$this->lang->line('research_bureaucracy')?>"><span class="textLabel"><?=$this->lang->line('research_bureaucracy')?></span></a>
<?}else{?>
            <div class="<?if($class > 0){?><?if($level > 0){?><?=$image?><?}else{?>constructionSite<?}?><?}else{?><?=$image?><?}?>"></div>
            <a href="<?=$this->config->item('base_url')?>game/<?=$this->Data_Model->building_class_by_type($class)?>/<?=$i?>/" title="<?=$this->Data_Model->building_name_by_type($class)?> <?if($class > 0){?><?=$this->lang->line('level')?> <?=$level?><?}?>"><span class="textLabel"><?=$this->Data_Model->building_name_by_type($class)?>  <?if($class > 0){?>Уровень <?=$level?><?}?></span></a>
<?$line_id=1?>
<?if(SizeOf($this->Player_Model->build_line[$this->Player_Model->town_id])>1){?>
<?foreach($this->Player_Model->build_line[$this->Player_Model->town_id] as $build_line){?>
<?if($build_line['type'] == $class){?>
            <div class="timetofinish"><span class="before"></span><span><?=$line_id?>.</span><span class="after"></span></div>
<?}$line_id++;}}?>
<?}?>
        </li>
<?}?>

<?
}
?>
<?if($this->Player_Model->good[$this->Player_Model->town_id] < 0){?>
        <li class="protester"></li>
<?}else{?>
<?if($this->Player_Model->good[$this->Player_Model->town_id] >= 50){?>
        <li class="beachboys"></li>
<?}?>
<?if($this->Player_Model->units_count[$this->Player_Model->town_id] > 0){?>
        <li class="garnison"></li>
<?}}?>

<?if($this->Player_Model->missions_loading > 0){?>
        <li class="transporter"></li>
<?}?>
    </ul>

<!--[if lt IE 7]>
<style type="text/css">
#city #container #mainview #locations .garnison,
#city #container #mainview #locations .garnisonGate1,
#city #container #mainview #locations .garnisonGate2,
#city #container #mainview #locations .garnisonCenter,
#city #container #mainview #locations .garnisonOutpost
{
    background-image:url(<?=$this->config->item('style_url')?>skin/img/city/garnison.gif);
}
</style>
<![endif]-->
</div>
          