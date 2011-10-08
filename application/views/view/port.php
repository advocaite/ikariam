<?  $level_text = 'pos'.$position.'_level';
    $level = $this->Player_Model->now_town->$level_text;
    $speed = $this->Data_Model->speed_by_port_level($level);
?>
<div id="mainview">
<?include_once('building_description.php')?>
    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel">Купить торговое судно</span></h3>
        <div class="content">
            <ul id="units">
                <li class="unit">
                    <div class="unitinfo">
                        <h4>Сухогруз</h4>
                        <a title="Узнать больше о Сухогруз..." href="<?=$this->config->item('base_url')?>game/shipDescription/23/">
                            <img src="<?=$this->config->item('style_url')?>skin/characters/fleet/120x100/ship_transport_r_120x100.gif">
                        </a>
                        <div class="unitcount"><span class="textLabel">Доступно: </span><?=$this->Player_Model->all_transports?></div>
                        <p>Торговые корабли - один из важнейших элементов для развития империи. Их можно использовать как для перевозки мирных товаров, так и для военных нужд.</p>
                    </div>
                    <label for="textfield_">Купить торговое судно:</label>

                    <div class="forminput">Максимум: 160<br>
<?if($this->Player_Model->user->gold >= $this->Data_Model->transport_cost_by_count($this->Player_Model->all_transports)){?>
                        <div class="leftButton">
                            <a href="<?=$this->config->item('base_url')?>actions/transporter/<?=$position?>/" class="button bigButton">Купить торговое судно</a>
                        </div>
<?}else{?>
Недостаточно ресурсов
<?}?>
                    </div>
                    <div class="costs">
                        <ul class="resources">
<?if($this->Data_Model->transport_cost_by_count($this->Player_Model->all_transports) > 0){?>
                            <li class="gold"><span class="textLabel">Золото: </span><?=number_format($this->Data_Model->transport_cost_by_count($this->Player_Model->all_transports))?></li>
<?}?>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="footer"></div>
    </div>

    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel">Отослать торговое судно</span></h3>
        <div class="content">
            <ul class="cities">
<?foreach($this->Player_Model->towns as $town)?>
<?if($town->id != $this->Player_Model->town_id){?>
<li><a title="Транспорт в <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/transport/<?=$town->island?>/<?=$town->id?>/">(<?=$this->Player_Model->islands[$town->island]->x?>:<?=$this->Player_Model->islands[$town->island]->y?>) <?=$town->name?></a></li>
<?}?>
            </ul>
        </div>
        <div class="footer"></div>
    </div>
    <div class="contentBox01h" style="z-index:100">
        <h3 class="header"><span class="textLabel">Флоты на загрузке</span></h3>
        <div class="content master">
            <div class="tcap">Мои торговые корабли</div>
<?$m_id = 0?>
<?if($this->Player_Model->missions_loading > 0){?>
<?foreach($this->Player_Model->missions as $mission){
if ($mission->mission_start == 0){?>
<?
    $wood = $mission->wood;
    $marble = $mission->marble;
    $wine = $mission->wine;
    $crystal = $mission->crystal;
    $sulfur = $mission->sulfur;
    $peoples = $mission->peoples;
    $all_resources = $wood + $marble + $wine + $crystal + $sulfur + $peoples;
    $per_sec = $speed / 60;
    $all_time = ($all_resources/$per_sec);
    $elapsed = (time() - $mission->loading_from_start);
    if($all_time <= $elapsed){ $time = 0; } else { $time = $all_time - $elapsed; }
?>
            <table cellpadding="0" cellspacing="0" class="table01">
                <thead>
                    <tr>
                        <th class="origin">Пункт назначения</th>
                        <th>Кол-во</th>
                        <th>Миссия</th>
                        <th>Статус
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
<tr>            
    <td>Полис</td>
    <td>
        <div class="tooltip" style="position:absolute;width:100px;overflow:show;">
            <table border='0' cellspacing='0' class='stuff'>
                <tr><th colspan='2'>Товары на борту</th></tr>
<?if($wood > 0){?>
                <tr><td class='unit'><img src='<?=$this->config->item('style_url')?>skin/resources/icon_wood.gif'></td><td class='count'><?=number_format($wood)?></td></tr>
<?}?>
<?if($wine > 0){?>
                <tr><td class='unit'><img src='<?=$this->config->item('style_url')?>skin/resources/icon_wine.gif'></td><td class='count'><?=number_format($wine)?></td></tr>
<?}?>
<?if($marble > 0){?>
                <tr><td class='unit'><img src='<?=$this->config->item('style_url')?>skin/resources/icon_marble.gif'></td><td class='count'><?=number_format($marble)?></td></tr>
<?}?>
<?if($crystal > 0){?>
                <tr><td class='unit'><img src='<?=$this->config->item('style_url')?>skin/resources/icon_glass.gif'></td><td class='count'><?=number_format($crystal)?></td></tr>
<?}?>
<?if($sulfur > 0){?>
                <tr><td class='unit'><img src='<?=$this->config->item('style_url')?>skin/resources/icon_sulfur.gif'></td><td class='count'><?=number_format($sulfur)?></td></tr>
<?}?>
<?if($peoples > 0){?>
                <tr><td class='unit'><img src='<?=$this->config->item('style_url')?>skin/resources/icon_citizen.gif'></td><td class='count'><?=number_format($peoples)?></td></tr>
<?}?>
            </table>
        </div><?=$mission->ship_transport?>
    </td>
    <td><?=$this->Data_Model->mission_name_by_type($mission->mission_type)?></td>
    <td>
<?if($m_id == 0){?>
        <div class="time" id="outgoingOwnCountDown"><?=format_time($time)?></div>
        <div class="progressBar"><div class="bar" id="outgoingOwnProgress"></div>
        </div>

        <script type="text/javascript">
            Event.onDOMReady(function() {
                getCountdown({
                    enddate: <?=time()+$time?>,
                    currentdate: <?=time()?>,
                    el: "outgoingOwnCountDown"
                }, 2, " ", "", true, true);
                var tmppbar = getProgressBar({
                    startdate: <?=$mission->loading_from_start?>,
                    enddate: <?=time()+$time?>,
                    currentdate: <?=time()?>,
                    bar: "outgoingOwnProgress"
                });
                tmppbar.subscribe("update", function(){
                    this.barEl.title=this.progress+"%";
                });
                tmppbar.subscribe("finished", function(){
                    this.barEl.title="100%";
                });
            });
	</script>
        Загружается</td><td>
        <a title="Отозвать флот!" href="<?=$this->config->item('base_url')?>actions/abortFleet/<?=$mission->id?>/<?=$position?>/">
            <img src="<?=$this->config->item('style_url')?>skin/advisors/military/icon-back.gif" title="Отозвать флот!">
        </a>
<?}else{?>
Ожидание
<?}?>
    </td>
</tr>
                </tbody>
            </table>
<?$m_id++;?>
<?}?>
<?}}?>
<?if($m_id == 0){?>
            <p>Нет зарегистрированных кораблей в порту</p>
<?}?>
            <div class="tcap">Иностранные корабли</div>
            <p>Нет зарегистрированных кораблей в порту</p>
        </div>
        <div class="footer"></div>
    </div>

    <div class="contentBox01h" style="z-index:50;">
        <h3 class="header"><span class="textLabel">Прибывающие торговцы</span></h3>
        <div class="content master"><p>Нет зарегистрированных кораблей в порту</p></div>
        <div class="footer"></div>
    </div> 
</div>