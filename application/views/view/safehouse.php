<div id="mainview">
<?include_once('building_description.php')?>
<div class="yui-navset">
    <ul class="yui-nav">
        <li <?if($param2!='reports' and $param2!='archive'){?>class="selected"<?}?>><a href="<?=$this->config->item('base_url')?>game/safehouse/<?=$position?>/" title="Укрытие"><em>Укрытие</em></a></li>
        <li <?if($param2=='reports'){?>class="selected"<?}?>><a href="<?=$this->config->item('base_url')?>game/safehouse/reports/" title="Доклады шпиона"><em>Доклады шпиона</em></a></li>
        <li <?if($param2=='archive'){?>class="selected"<?}?>><a href="<?=$this->config->item('base_url')?>game/safehouse/archive/"><em>Архив</em></a></li>
    </ul>
</div>
<?if($param2!='reports' and $param2!='archive'){?>
    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel">Тренировка шпионов</span></h3>
        <div class="content">
            <ul id="units">
                <li class="unit">
                    <div class="unitinfo">
                        <h4>Шпион</h4>
                        <img src="<?=$this->config->item('style_url')?>skin/characters/military/120x100/spy_120x100.gif">
                        <p>Этот гражданин - лояльная и в то же время скрытная личность. Словом, идеальный кандидат в шпионы. Время тренировки шпиона :</p>
                    </div>
                    <div class="forminput">
<?if($this->Player_Model->now_town->spyes_start == 0){?>
<?
    $build_pos = 0;
    if (SizeOf($this->Player_Model->build_line[$this->Player_Model->town_id]) > 0)
    foreach($this->Player_Model->build_line[$this->Player_Model->town_id] as $build_line)
    {
        if ($build_line['position'] == $position){ $build_pos = $position; }
    }
?>
<?if($build_pos > 0){?>
                        Здание в процессе улучшения!
<?}else{?>
<?$all_spyes = SizeOf($this->Player_Model->spyes[$this->Player_Model->town_id])+$this->Player_Model->now_town->spyes?>
<?if(($this->Player_Model->levels[$this->Player_Model->town_id][14]-$all_spyes) > 0){?>
                        <div class="centerButton">
                            <a href="<?=$this->config->item('base_url')?>actions/spyes/buy/" class="button" title="Тренировать">Тренировать</a>
                        </div>
<?}else{?>
                        Макс. кол-во шпионов достигнуто!
<?}}?>
<?}else{?>
                        Тренировка начата.
<?}?>
                    </div>
                    <div class="costs">
                        <h5>Стоимость:</h5>
                        <ul class="resources">
                            <li class="gold"><span class="textLabel">Золото: </span>150</li>
                            <li class="glass"><span class="textLabel">Стройматериалы: </span>80</li>
                            <li class="time"><?=format_time($this->Data_Model->spyes_time_by_level($this->Player_Model->levels[$this->Player_Model->town_id][14]))?></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="footer"></div>
    </div>


<div class="contentBox01h">
  <h3 class="header"><span class="textLabel">Шпионы на заданиях</span></h3>
  <div class="content">

<?if (sizeOf($this->Player_Model->spyes[$this->Player_Model->town_id]) > 0){?>
<?foreach($this->Player_Model->spyes[$this->Player_Model->town_id] as $spy){?>

      <div class="spyinfo">
          <ul>
              <li title="Резиденция" class="city"><?=$this->Data_Model->temp_towns_db[$spy->to]->name?> (<?=$this->Data_Model->temp_islands_db[$this->Data_Model->temp_towns_db[$spy->to]->island]->x?>,<?=$this->Data_Model->temp_islands_db[$this->Data_Model->temp_towns_db[$spy->to]->island]->y?>)</li>
<?if($spy->mission_start > 0 and $spy->mission_type != 2){?>
              <li title="Статус" class="status">Шпион на задании</li>
<?}?>
              <li title="Статус" class="status">
<?if($spy->mission_start > 0){?>
<?
    $x1 = $this->Player_Model->now_island->x;
    $x2 = $this->Data_Model->temp_islands_db[$this->Data_Model->temp_towns_db[$spy->to]->island]->x;
    $y1 = $this->Player_Model->now_island->y;
    $y2 = $this->Data_Model->temp_islands_db[$this->Data_Model->temp_towns_db[$spy->to]->island]->y;
    $time = $this->Data_Model->spy_time_by_coords($x1,$x2,$y1,$y2);
    $ostalos = $time - time() + $spy->mission_start;
?>
<script type="text/javascript">
    Event.onDOMReady(function() {
    getCountdown({
        enddate: <?=$spy->mission_start + $time?>,
        currentdate: <?=time()?>,
        el: "SpyCountDown<?=$spy->id?>"
    }, 3, " ", "", true, true);
});
</script>
<?}?>
                  <div  class="time">
                      <span class="textLabel"><?=$this->Data_Model->spy_mission_name_by_type($spy->mission_type)?></span>
<?if($spy->mission_start > 0){?>
                      <span id="SpyCountDown<?=$spy->id?>">
                          <?=format_time($ostalos)?>
                      </span>
<?}?>
                  </div>
              </li>
<?if($spy->mission_type != 2){?>
<?
if($spy->mission_type == 1){
                $town = $this->Data_Model->temp_towns_db[$spy->to];
                $to_position = $this->Data_Model->get_position(14, $town);
                $to_text = 'pos'.$to_position.'_level';
                $to_level = ($to_position > 0) ? $town->$to_text : 0;
                $risk = (5*$town->spyes)+(2*$to_level)-(2*$town->pos0_level)-(2*$this->Player_Model->levels[$this->Player_Model->town_id][14]);
                if ($risk < 0){ $risk = 0; }
                $risk = $risk + $this->Data_Model->spy_risk_by_mission($spy->mission_type) + $spy->risk;
}
else
{
                $risk = $spy->risk;
}
?>
              <li class="risk"><span class="textLabel">Риск разоблачения</span>:<br>
                  <div class="statusBar">
                      <div style="width: <?=$risk?>%;" class="bar"></div>
                  </div>
                  <div class="percentage"><?=$risk?>%</div>
              </li>
<?}?>
          </ul>
<?if($spy->mission_start == 0){?>
          <div class="missionButton">
              <a title="Дать задание шпиону" href="<?=$this->config->item('base_url')?>game/safehouseMissions/<?=$spy->id?>/">Миссия</a>
          </div>
          <div class="missionAbort">
              <a title="Отозвать шпиона домой" href="<?=$this->config->item('base_url')?>actions/spyes/return/<?=$spy->id?>/<?=$spy->from?>/">Отзыв</a>
          </div>
<?}?>
      </div>
<?}?>
<?}else{?>
        <center><div style="padding:10px;">Нет шпионов на миссиях!</div></center>
<?}?>
      </div>
  <div class="footer"></div>
</div>
<?}?>
<?if($param2=='reports'){?>
    <div class="contentBox01">
        <h3 class="header"><span class="textLabel">Доклады шпиона</span></h3>
        <div class="content">
            <table cellpadding="0" cellspacing="0" class="spyMessages table01">                            
<?foreach($this->Player_Model->spyes_messages as $messages){?>
                <?$this->Data_Model->Load_Town($messages[0]->to)?>
                <tr><th colspan="3">Доклады шпиона из <?=$this->Data_Model->temp_towns_db[$messages[0]->to]->name?></th></tr>
<?foreach($messages as $message){?>
                <tr>
                    <td class="icon <?=spy_mission_icon($message->mission)?>"></td>
                    <td class="date"><?=date("d.m.Y G:i",$message->date)?></td>
                    <td class="subject"><?if($message->checked == 0){?><b><?}?><a title="<?=$message->desc?>" href="<?=$this->config->item('base_url')?>game/safehouseReports/<?=$message->id?>/"><?=$message->desc?></a><?if($message->checked == 0){?></b><?}?></td>
                </tr>
<?}?>
<?}?>
            </table>
        </div>
        <div class="footer"></div>
    </div> 
<?}?>
<?if($param2=='archive'){?>
<div id="troopsOverview">
        <div class="contentBox01h">
            <h3 class="header"><span class="textLabel">Доклады шпионов</span></h3>
            <div class="content">
                <p style="text-align: center;">Нет записей</p>
            </div>
            <div class="footer"></div>
        </div>
    </div>
<?}?>
<br> 
</div>