<div id="mainview">		
    <div class="buildingDescription">
        <h1>Транспорт</h1>
        <p>Выберите тип и кол-во транспортируемых товаров.</p>
    </div>

					
    <form id="transport" action="<?=$this->config->item('base_url')?>actions/transport/<?=$this->Island_Model->island->id?>/<?=$param1?>/" method="POST">		                    
        <div id="setPremiumTransports" class="contentBox">
            <h3 class="header">Наемный транспорт</h3>
            <div class="content">
                <p>Моряки готовы доплыть до края света в поисках амброзии! Вы можете нанять транспорты за 5 ед. амброзии, чтобы увеличить грузоподъемность своего флота.</p>
                <label for="textfield_premium">Взять наемный транспорт:</label>
                <p class="costs">Стоимость:: <span id="ambrosiaCosts">5</span><img src="<?=$this->config->item('style_url')?>skin/premium/ambrosia_icon.gif" width="24" height="20" alt="Амброзия" title="Амброзия"/> (У Вас есть <?=$this->Player_Model->user->ambrosy?>)</p>
                <p class="PremiumTransportsButton">
                    <div class="centerButton">
                        <a class="button" href="<?=$this->config->item('base_url')?>game/premiumPayment/">Получить амброзию</a>
                    </div>
                </p>
            </div>
            <div class="footer"></div>
        </div>

        <div id="transportGoods" class="contentBox">
            <h3 class="header">Транспортировать!</h3>
            <div class="content">
                <p>Выберите товары для транспортировки из <?=$this->Player_Model->now_town->name?> в <?=$this->Data_Model->temp_towns_db[$param1]->name?>. Учитывайте кол-во торговых кораблей в наличии.</p>
                <ul class="resourceAssign">
<?if($this->Player_Model->now_town->wood > 0){?>
                    <li class="wood">
                        <label for="textfield_resource">Отправить стройматериалы:</label>
                        <div class="sliderinput">
                            <div class="sliderbg">
                                <div class="actualValue valuebg"></div>
                                <div class="sliderthumb" id="sliderthumb_wood"></div>
                            </div>
                            <a id="slider_wood_min" class="setMin" href="#reset" title="Сбросить ввод"><span class="textLabel">мин.</span></a>
                            <a id="slider_wood_max" class="setMax" href="#max" title="отправить все"><span class="textLabel">макс.</span></a>
                        </div>
                        <input class="textfield" id="textfield_wood" type="text" name="cargo_resource"  value="0" size="4" maxlength="9">
                    </li>
<?}?>
<?if($this->Player_Model->now_town->wine > 0){?>
                    <li class="wine">
                        <label for="textfield_wine">Отправить мрамор:</label>
                        <div class="sliderinput">
                            <div class="sliderbg">
                                <div class="actualValue valuebg"></div>
                                <div class="sliderthumb" id="sliderthumb_wine"></div>
                            </div>
                            <a id="slider_wine_min" class="setMin" href="#reset" title="Сбросить ввод"><span class="textLabel">мин.</span></a>
                            <a id="slider_wine_max" class="setMax" href="#max" title="отправить все"><span class="textLabel">макс.</span></a>
                        </div>
                        <input class="textfield" id="textfield_wine" type="text" name="cargo_tradegood1"  value="0" size="4" maxlength="9">
                    </li>
<?}?>
<?if($this->Player_Model->now_town->marble > 0){?>
                    <li class="marble">
                        <label for="textfield_resource">Отправить мрамор:</label>
                        <div class="sliderinput">
                            <div class="sliderbg">
                                <div class="actualValue valuebg"></div>
                                <div class="sliderthumb" id="sliderthumb_marble"></div>
                            </div>						
                            <a id="slider_marble_min" class="setMin" href="#reset" title="Сбросить ввод"><span class="textLabel">мин.</span></a>
                            <a id="slider_marble_max" class="setMax" href="#max" title="отправить все"><span class="textLabel">макс.</span></a>
                        </div>
                        <input class="textfield" id="textfield_marble" type="text" name="cargo_tradegood2"  value="0" size="4" maxlength="9">
                    </li>
<?}?>
<?if($this->Player_Model->now_town->crystal > 0){?>
                    <li class="glass">
                        <label for="textfield_resource">Отправить хрусталь:</label>
                        <div class="sliderinput">
                            <div class="sliderbg">
                                <div class="actualValue valuebg"></div>
                                <div class="sliderthumb" id="sliderthumb_glass"></div>
                            </div>
                            <a id="slider_glass_min" class="setMin" href="#reset" title="Сбросить ввод"><span class="textLabel">мин.</span></a>
                            <a id="slider_glass_max" class="setMax" href="#max" title="отправить все"><span class="textLabel">макс.</span></a>
                        </div>
                        <input class="textfield" id="textfield_glass" type="text" name="cargo_tradegood3"  value="0" size="4" maxlength="9">
                    </li>
<?}?>
<?if($this->Player_Model->now_town->sulfur > 0){?>
                    <li class="sulfur">
                        <label for="textfield_resource">Отправить серу</label>
                        <div class="sliderinput">
                            <div class="sliderbg">
                                <div class="actualValue valuebg"></div>
                                <div class="sliderthumb" id="sliderthumb_sulfur"></div>
                            </div>
                            <a id="slider_sulfur_min" class="setMin" href="#reset" title="Сбросить ввод"><span class="textLabel">мин.</span></a>
                            <a id="slider_sulfur_max" class="setMax" href="#max" title="отправить все"><span class="textLabel">макс.</span></a>
                        </div>
                        <input class="textfield" id="textfield_sulfur" type="text" name="cargo_tradegood4"  value="0" size="4" maxlength="9">
                    </li>
<?}?>
                </ul>

                <hr />
<?
    $all_capacity = $this->Player_Model->user->transports*$this->config->item('transport_capacity');
    $used_capacity =  1250 + 40;
    $capacity = $all_capacity - $used_capacity;
    $cost = $this->Data_Model->army_cost_by_type(23, $this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id]);
    $x1 = $this->Player_Model->now_island->x;
    $x2 = $this->Island_Model->island->x;
    $y1 = $this->Player_Model->now_island->y;
    $y2 = $this->Island_Model->island->y;
    $time = $this->Data_Model->time_by_coords($x1,$x2,$y1,$y2,$cost['speed']);
?>
                <div id="missionSummary">
                    <div class="common">
                        <div class="journeyTarget"><span class="textLabel">Пункт назначения </span><?=$this->Data_Model->temp_towns_db[$param1]->name?></div>
                        <div class="journeyTime"><span class="textLabel">Время в пути: </span><?=format_time($time)?></div>
                    </div>
                    <div class="transporters">
                        <span class="textLabel"> </span>
                        <span><input id="transporterCount" name="transporters" size="3" maxlength="3" readonly="readonly" value="0" /> / <span id="totalTansporters"><?=$this->Player_Model->user->transports?></span></span>
                    </div>
                </div>
                <div class="centerButton">
                    <input id="submit" class="button" type="submit" value="Транспортировать!">
                </div>
                </form>
<!--
    <hr />

                                <form action="index.php" method="post">
                                    <input type=hidden name="action" value="Premium">
                                    <input type=hidden name="function" value="editTradeRoute">
                                    <input type="hidden" name="actionRequest" value="e1e2797e22ccb799d3cc862830a53399" />
                                    <input type=hidden name="addPosition" value="1">

                                    <input type="hidden" name="city1Id" value="90580">
                                    <input type="hidden" name="city2Id" value="97685">
                                    <input type="hidden" id="tradeRouteNumber" name="number" value="">
                                    <input type="hidden" id="tradeRouteTradegood" name="tradegood" value="">

                                    <p>Торговый путь состоит в регулярной пересылке транспортов между двумя городами в вашей империи. Таким образом, вы можете, например, автоматически снабжать свои поселения вином. Один торговый маршрут доступен по умолчанию и вы можете добавить еще с помощью Амброзии. <br/>
<br/>
Пожалуйста убедитесь в наличии достаточного количества товаров и свободных сухогрузов, а также в отсутствии препятствий на пути маршрута, таких как вражеские флоты.</p>

                                    <ul class="tradeRoute">
                                      <li class="time">
                                        <select name="time" id="tradeRouteTime" class="dropdown size115 smallFont">
                                                                                    <option value="0">каждый день в 0:00</option>
                                                                                    <option value="1">каждый день в 1:00</option>
                                                                                    <option value="2">каждый день в 2:00</option>
                                                                                    <option value="3">каждый день в 3:00</option>
                                                                                    <option value="4">каждый день в 4:00</option>
                                                                                    <option value="5">каждый день в 5:00</option>
                                                                                    <option value="6">каждый день в 6:00</option>
                                                                                    <option value="7">каждый день в 7:00</option>
                                                                                    <option value="8">каждый день в 8:00</option>
                                                                                    <option value="9">каждый день в 9:00</option>
                                                                                    <option value="10">каждый день в 10:00</option>
                                                                                    <option value="11">каждый день в 11:00</option>
                                                                                    <option value="12">каждый день в 12:00</option>
                                                                                    <option value="13">каждый день в 13:00</option>
                                                                                    <option value="14">каждый день в 14:00</option>
                                                                                    <option value="15">каждый день в 15:00</option>
                                                                                    <option value="16">каждый день в 16:00</option>
                                                                                    <option value="17">каждый день в 17:00</option>
                                                                                    <option value="18">каждый день в 18:00</option>
                                                                                    <option value="19">каждый день в 19:00</option>
                                                                                    <option value="20">каждый день в 20:00</option>
                                                                                    <option value="21">каждый день в 21:00</option>
                                                                                    <option value="22">каждый день в 22:00</option>
                                                                                    <option value="23">каждый день в 23:00</option>
                                                                                </select>
                                      </li>
                                      <li class="save">
                                        <input type="submit" class="button" onclick="return setTradeRouteData();" value="установить торговый маршрут">
                                      </li>
                                    </ul>

                                </form>

<script>
    function setTradeRouteData() {
        var number = 0;
        var tradegood = 0;
        var countGoods = 0;
        if (Dom.get('textfield_wood').value > number) {
            number = Dom.get('textfield_wood').value;
            tradegood = 0;
            countGoods++;
        }
        if (Dom.get('textfield_wine').value > number) {
            number = Dom.get('textfield_wine').value;
            tradegood = 1;
            countGoods++;
        }
        if (Dom.get('textfield_marble').value > number) {
            number = Dom.get('textfield_marble').value;
            tradegood = 2;
            countGoods++;
        }
        if (Dom.get('textfield_glass').value > number) {
            number = Dom.get('textfield_glass').value;
            tradegood = 3;
            countGoods++;
        }
        if (Dom.get('textfield_sulfur').value > number) {
            number = Dom.get('textfield_sulfur').value;
            tradegood = 4;
            countGoods++;
        }
        Dom.get('tradeRouteNumber').value = number;
        Dom.get('tradeRouteTradegood').value = tradegood;
        if (countGoods>1) {
            alert('Вы можете заключить торговый маршрут только на один вид товаров. Пожалуйста, передвиньте остальные указатели на 0.');
            return false;
        }
        return true;
    }
    Event.onDOMReady( function() {
        replaceSelect(Dom.get("tradeRouteTime"));
    });
</script>
-->

</div>				
            <div class="footer"></div>
        </div>

</div>


<script type="text/javascript">
    var transporterCount = new transportController({
        'availableTransporters' : <?=$this->Player_Model->user->transports?>,
	'capacityPerTransport' : <?=$this->config->item('transport_capacity')?>,
	'spaceReserved' : 0
    });
    transporterCount.subscribe('usedTransChanged', function(v) {
        Dom.get('transporterCount').value=v;
    });
    transporterCount.subscribe('availTransChanged', function(v) {
	Dom.get('totalTansporters').innerHTML=v;
    });
    var iwood = new valueInput('textfield_wood', [0, <?=floor($this->Player_Model->now_town->wood)?>]);
    var swood = new Slider('sliderthumb_wood', {'from':iwood,'dir' : 'ltr'});
    UIManager.connect(swood,iwood);
    Event.addListener('slider_wood_min', 'click', function(ev){swood.setValue(swood.range[0]); Event.stopEvent(ev);});
    Event.addListener('slider_wood_max', 'click', function(ev){swood.setValue(swood.range[1]); Event.stopEvent(ev);});
    transporterCount.registerInput(swood);
    var iwine = new valueInput('textfield_wine', [0, <?=floor($this->Player_Model->now_town->wine)?>]);
    var swine = new Slider('sliderthumb_wine', {'from':iwine,'dir' : 'ltr'});
    UIManager.connect(swine,iwine);
    Event.addListener('slider_wine_min', 'click', function(ev){swine.setValue(swine.range[0]); Event.stopEvent(ev);});
    Event.addListener('slider_wine_max', 'click', function(ev){swine.setValue(swine.range[1]); Event.stopEvent(ev);});
    transporterCount.registerInput(swine);
    var imarble = new valueInput('textfield_marble', [0, <?=floor($this->Player_Model->now_town->marble)?>]);
    var smarble = new Slider('sliderthumb_marble', {'from':imarble,'dir' : 'ltr'});
    UIManager.connect(smarble,imarble);
    Event.addListener('slider_marble_min', 'click', function(ev){smarble.setValue(smarble.range[0]); Event.stopEvent(ev);});
    Event.addListener('slider_marble_max', 'click', function(ev){smarble.setValue(smarble.range[1]); Event.stopEvent(ev);});
    transporterCount.registerInput(smarble);
    var iglass = new valueInput('textfield_glass', [0, <?=floor($this->Player_Model->now_town->crystal)?>]);
    var sglass = new Slider('sliderthumb_glass', {'from':iglass,'dir' : 'ltr'});
    UIManager.connect(sglass,iglass);
    Event.addListener('slider_glass_min', 'click', function(ev){sglass.setValue(sglass.range[0]); Event.stopEvent(ev);});
    Event.addListener('slider_glass_max', 'click', function(ev){sglass.setValue(sglass.range[1]); Event.stopEvent(ev);});
    transporterCount.registerInput(sglass);
    var isulfur = new valueInput('textfield_sulfur', [0, <?=floor($this->Player_Model->now_town->sulfur)?>]);
    var ssulfur = new Slider('sliderthumb_sulfur', {'from':isulfur,'dir' : 'ltr'});
    UIManager.connect(ssulfur,isulfur);
    Event.addListener('slider_sulfur_min', 'click', function(ev){ssulfur.setValue(ssulfur.range[0]); Event.stopEvent(ev);});
    Event.addListener('slider_sulfur_max', 'click', function(ev){ssulfur.setValue(ssulfur.range[1]); Event.stopEvent(ev);});
    transporterCount.registerInput(ssulfur);
</script>