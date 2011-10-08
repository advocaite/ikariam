<div id="mainview">		
    <div class="buildingDescription">
        <h1>Отправить шпиона</h1>
        <p>Отправьте шпионов в города других игроков для получения разведывательной информации. Как только шпион проник в город, Вы можете давать ему задания.  <br /><br />Учтите, что <strong>всегда</strong> существует определенный риск разоблачения шпиона! Доклады Вашего шпиона архивируются у <strong>советника по дипломатии</strong>.</p>
    </div>
<?
    $x1 = $this->Player_Model->now_island->x;
    $x2 = $this->Island_Model->island->x;
    $y1 = $this->Player_Model->now_island->y;
    $y2 = $this->Island_Model->island->y;
    $time = $this->Data_Model->spy_time_by_coords($x1,$x2,$y1,$y2);

    $to_position = $this->Data_Model->get_position(14, $this->Data_Model->temp_towns_db[$param1]);
    $to_text = 'pos'.$to_position.'_level';
    $to_level = ($to_position > 0) ? $this->Data_Model->temp_towns_db[$param1]->$to_text : 0;
    $risk = $this->Data_Model->spy_risk_by_mission(1)+(5*$this->Data_Model->temp_towns_db[$param1]->spyes)+(2*$to_level)-(2*$this->Data_Model->temp_towns_db[$param1]->pos0_level)-(2*$this->Player_Model->levels[$this->Player_Model->town_id][14]);
    $risk = ($risk < 5) ? 5 : $risk;
?>
    
    <form  action="<?=$this->config->item('base_url')?>actions/spyes/send/<?=$this->Island_Model->island->id?>/<?=$param1?>/"  method="POST">
        <div class="contentBox01h" id="sendSpy">
            <h3 class="header">Отправить шпиона</h3>
            <div class="content">
                <p class="desc">Ваш шпион попытается проникнуть в <?=$this->Data_Model->temp_towns_db[$param1]->name?>. <?=$this->Data_Model->temp_towns_db[$param1]->name?> имеет размеры уровня 3. Проще всего шпионам затеряться среди населения крупных городов.							</p>
		<div class="costs"><span class="textLabel">Стоимость: </span>30</div>
                <div class="risk"><span class="textLabel">Риск разоблачения:</span>
                    <div title="Риск разоблачения <?=$risk?>%" class="statusBar">
                        <div style="width: <?=$risk?>%" class="bar"></div>
                    </div>
                    <div class="percentage"><?=$risk?>%</div>
                </div>
                <hr>
                <div id="missionSummary">
                    <div class="common">
                        <div class="journeyTarget" title="Город"><span class="textLabel">Город: </span><?=$this->Data_Model->temp_towns_db[$param1]->name?></div>
                        <div class="journeyTime" title="Время в пути"><span class="textLabel">Время в пути: </span><?=format_time($time)?></div>
                    </div>
                </div>
                <div class="centerButton">
                    <input id="submit" class="button" type="submit" value="Отправить шпиона">
                </div>
            </div>
            <div class="footer"></div>
        </div>
    </form>
</div>