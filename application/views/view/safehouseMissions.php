<?$spy = $this->Player_Model->spyes[$this->Player_Model->town_id][$param1]?>
<div id="mainview">
    <div class="buildingDescription">
        <h1>Миссии</h1>
        <p>Дать задание шпиону</p>
    </div>
    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel">Выберите миссию для шпиона в <?=$this->Data_Model->temp_towns_db[$spy->to]->name?></span></h3>
        <div class="content" style="position:relative">
            <div class="percentage"><?=$spy->risk?>%</div>
            <h4><span class="textLabel">Текущий риск обнаружения:</span></h4>
            <div class="missionText">
                <div title="Риск разоблачения: <?=$spy->risk?>%" class="statusBar">
                    <div style="width: <?=$spy->risk?>%;" class="bar"></div>
                </div>
            </div>
            <ul id="missionlist">
<?
    $town = $this->Data_Model->temp_towns_db[$spy->to];
    $to_position = $this->Data_Model->get_position(14, $town);
    $to_text = 'pos'.$to_position.'_level';
    $to_level = ($to_position > 0) ? $town->$to_text : 0;
    $risk = (5*$town->spyes)+(2*$to_level)-(2*$town->pos0_level)-(2*$this->Player_Model->levels[$this->Player_Model->town_id][14]);
    $risk = ($risk < 0) ? 0 : $risk;
    $risk = $risk + $spy->risk + $this->Data_Model->spy_risk_by_mission(3);
?>
                <li class="gold">
                    <div title="Название миссии" class="missionType">Шпионаж казны</div>
                    <div title="Описание миссии" class="missionDesc">Это будет нелегкая задача - проникнуть в городскую казну. Зато мы сможем разузнать количество хранимого там золота.                    </div>
                    <div title="Стоимость этой миссии" class="missionCosts"><strong>Стоимость:</strong>
                    	<span class="textLabel">Золото: </span><span class="gold">45</span>
                    </div>
                    <div title="Риск этой миссии" class="missionRisk"><strong>риск:</strong> <?=$risk?>%</div>
                    <div title="3" class="missionStart">
                        <div class="centerButton">
                            <a class="button" href="<?=$this->config->item('base_url')?>actions/espionage/<?=$spy->from?>/<?=$spy->id?>/3/">Начать задание</a>
                        </div>
                    </div>
                </li>
<?
    $risk = (5*$town->spyes)+(2*$to_level)-(2*$town->pos0_level)-(2*$this->Player_Model->levels[$this->Player_Model->town_id][14]);
    $risk = ($risk < 0) ? 0 : $risk;
    $risk = $risk + $spy->risk + $this->Data_Model->spy_risk_by_mission(4);
?>
            	<li class="resources">
                    <div title="Название миссии" class="missionType">Осмотреть склад</div>
                    <div title="Описание миссии" class="missionDesc">Мы можем разузнать, какое количество ресурсов находится на городских складах.  Тогда станет ясно, насколько окупится нападение.                    </div>
                    <div title="Стоимость этой миссии" class="missionCosts"><strong>Стоимость</strong>
 	                	<span class="textLabel">Золото: </span><span class="gold">75</span>
                    </div>
                    <div title="Риск этой миссии" class="missionRisk"><strong>риск:</strong><?=$risk?>%</div>
                    <div title="4" class="missionStart">
                        <div class="centerButton">
                            <a class="button" href="<?=$this->config->item('base_url')?>actions/espionage/<?=$spy->from?>/<?=$spy->id?>/4/">Начать задание</a>
                        </div>
                    </div>
                </li>
<?
    $risk = (5*$town->spyes)+(2*$to_level)-(2*$town->pos0_level)-(2*$this->Player_Model->levels[$this->Player_Model->town_id][14]);
    $risk = ($risk < 0) ? 0 : $risk;
    $risk = $risk + $spy->risk + $this->Data_Model->spy_risk_by_mission(5);
?>

                <li class="research">
                    <div title="Название миссии" class="missionType">Шпионаж за исследованиями</div>
                    <div title="Описание миссии" class="missionDesc">Наш шпион достаточно смышлен, чтобы сойти за ученого. Это позволит ему собрать информацию об актуальном уровне исследований в городе.                    </div>
                    <div title="Стоимость этой миссии" class="missionCosts"><strong>Стоимость:</strong>
                    	<span class="textLabel">Золото: </span><span class="gold">90</span>
                    </div>
                    <div title="Риск этой миссии" class="missionRisk"><strong>риск:</strong> <?=$risk?>%</div>
                    <div title="5" class="missionStart">
                        <div class="centerButton">
                            <a class="button" href="<?=$this->config->item('base_url')?>actions/espionage/<?=$spy->from?>/<?=$spy->id?>/5/">Начать задание</a>
                        </div>
                    </div>
                </li>
<?
    $risk = (5*$town->spyes)+(2*$to_level)-(2*$town->pos0_level)-(2*$this->Player_Model->levels[$this->Player_Model->town_id][14]);
    $risk = ($risk < 0) ? 0 : $risk;
    $risk = $risk + $spy->risk + $this->Data_Model->spy_risk_by_mission(6);
?>

                <li class="online">
                    <div title="Название миссии" class="missionType">Онлайн статус</div>
                    <div title="Описание миссии" class="missionDesc">При удачном стечении обстоятельств мы сможем выяснить, насколько предводитель осведомлен о настроениях среди собственных жителей.                    </div>
                    <div title="Стоимость этой миссии" class="missionCosts"><strong>Стоимость:</strong>
                    	<span class="textLabel">Золото: </span><span class="gold">240</span>
                    </div>
                    <div title="Риск этой миссии" class="missionRisk"><strong>риск:</strong> <?=$risk?>%</div>
                    <div title="6" class="missionStart">
                        <div class="centerButton">
                            <a class="button" href="<?=$this->config->item('base_url')?>actions/espionage/<?=$spy->from?>/<?=$spy->id?>/6/">Начать задание</a>
                        </div>
                    </div>
                </li>
<?
    $risk = (5*$town->spyes)+(2*$to_level)-(2*$town->pos0_level)-(2*$this->Player_Model->levels[$this->Player_Model->town_id][14]);
    $risk = ($risk < 0) ? 0 : $risk;
    $risk = $risk + $spy->risk + $this->Data_Model->spy_risk_by_mission(7);
?>

            	<li class="garrison">
                    <div title="Название миссии" class="missionType">Шпионаж в гарнизоне</div>
                    <div title="Описание миссии" class="missionDesc">Если мы спрячемся в нужном месте во время утренней переклички, то сможем выяснить количество солдат данного гарнизона. С помощью этой информации нападение может быть спланировано более точно!                    </div>
                    <div title="Стоимость этой миссии" class="missionCosts"><strong>Стоимость:</strong>
                    	<span class="textLabel">Золото: </span><span class="gold">150</span>
                    </div>
                    <div title="Риск этой миссии" class="missionRisk"><strong>риск:</strong> <?=$risk?>%</div>
                    <div title="7" class="missionStart">
                        <div class="centerButton">
                            <a class="button" href="<?=$this->config->item('base_url')?>actions/espionage/<?=$spy->from?>/<?=$spy->id?>/7/">Начать задание</a>
                        </div>
                    </div>
                </li>
<?
    $risk = (5*$town->spyes)+(2*$to_level)-(2*$town->pos0_level)-(2*$this->Player_Model->levels[$this->Player_Model->town_id][14]);
    $risk = ($risk < 0) ? 0 : $risk;
    $risk = $risk + $spy->risk + $this->Data_Model->spy_risk_by_mission(8);
?>

            	<li class="fleet">
                    <div title="Название миссии" class="missionType">Наблюдения за передвижением войск и флотов</div>
                    <div title="Описание миссии" class="missionDesc">Если мы сосредоточим особое внимание на городских воротах и на здании порта,то наверняка сможем получить полезную информацию о жителях этого города. Например, с кем они поддерживают торговые отношения или с кем они находятся в состоянии войны.                    </div>
                    <div title="Стоимость этой миссии" class="missionCosts"><strong>Стоимость:</strong>
                    	<span class="textLabel">Золото: </span><span class="gold">750</span>
                    </div>
                    <div title="Риск этой миссии" class="missionRisk"><strong>риск:</strong> <?=$risk?>%</div>
                    <div title="8" class="missionStart">
                        <div class="centerButton">
                            <a class="button" href="<?=$this->config->item('base_url')?>actions/espionage/<?=$spy->from?>/<?=$spy->id?>/8/">Начать задание</a>
                        </div>
                    </div>
                </li>
<?
    $risk = (5*$town->spyes)+(2*$to_level)-(2*$town->pos0_level)-(2*$this->Player_Model->levels[$this->Player_Model->town_id][14]);
    $risk = ($risk < 0) ? 0 : $risk;
    $risk = $risk + $spy->risk + $this->Data_Model->spy_risk_by_mission(9);
?>

                <li class="message">
                    <div title="Название миссии" class="missionType">Шпионаж за обменом сообщениями</div>
                    <div title="Описание миссии" class="missionDesc">Если наш шпион поработает курьером, он сможет предоставить информацию о том, с кем наша общая цель находится в контакте и с кем у нее имеются договора.                    </div>
                    <div title="Стоимость этой миссии" class="missionCosts"><strong>Стоимость:</strong>
                    	<span class="textLabel">Золото: </span><span class="gold">360</span>
                    </div>
                    <div title="Риск этой миссии" class="missionRisk"><strong>риск:</strong> <?=$risk?>%</div>
                    <div title="9" class="missionStart">
                        <div class="centerButton">
                            <a class="button" href="<?=$this->config->item('base_url')?>actions/espionage/<?=$spy->from?>/<?=$spy->id?>/9/">Начать задание</a>
                        </div>
                    </div>
                </li>

                <li class="retreat">
                    <div title="Название миссии" class="missionType">Отозвать шпиона</div>
                    <div title="Описание миссии" class="missionDesc">Мы сможем отозвать шпиона в любое время. Его возвращение останется незаметным для жителей города.                    </div>
                    <div title="Стоимость этой миссии" class="missionCosts"><strong>Стоимость:</strong>
                    	<span class="textLabel">Золото: </span><span class="gold">0</span>
                    </div>
                    <div title="Риск этой миссии" class="missionRisk"><strong>риск:</strong> 0%</div>
                    <div title="10" class="missionStart">
                        <div class="centerButton">
                            <a class="button" href="<?=$this->config->item('base_url')?>actions/espionage/<?=$spy->from?>/<?=$spy->id?>/10/">Начать задание</a>
                        </div>
                    </div>
                </li>
            </ul>
    </div>     	<div class="footer"></div>
  </div></div>