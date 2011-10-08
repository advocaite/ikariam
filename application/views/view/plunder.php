<?$position = $param1?>
<script type="text/javascript" src="<?=$this->config->item('base_url')?>design/js/transportController.js"></script>

<script type="text/javascript">

function getAllChildNodesWithClassName(obj, childNodesWithClassName) {
    if (!childNodesWithClassName) {
        var childNodesWithClassName = new Array;
    }
    var i = 0;
    if (obj.childNodes) {
        for (i in obj.childNodes) {
            if (obj.childNodes[i].className) {
                childNodesWithClassName.push(obj.childNodes[i]);
            }
            if (obj.childNodes[i].firstChild) {
                childNodesWithClassName.concat(getAllChildNodesWithClassName(obj.childNodes[i], childNodesWithClassName));
            }
        }
    }
    return childNodesWithClassName;
}

function getChildNodesWithClassName(obj, className, childNodesWithClassName) {
    if (!childNodesWithClassName) {
        var childNodesWithClassName = new Array;
    }
    var i = 0;
    if (obj.childNodes) {
        for (i in obj.childNodes) {
            if (obj.childNodes[i] &&
                obj.childNodes[i].className &&
                hasClassName(obj.childNodes[i], className)) {
                childNodesWithClassName.push(obj.childNodes[i]);
            }
            if (obj.childNodes[i] && obj.childNodes[i].firstChild) {
                childNodesWithClassName.concat(getChildNodesWithClassName(obj.childNodes[i], className, childNodesWithClassName));
            }
        }
    }
    return childNodesWithClassName;
}

function getChildNodeWithClassName(obj, className) {
    if (obj.childNodes) {
        for (i in obj.childNodes) {
            if (hasClassName(obj.childNodes[i], className)) {
                return obj.childNodes[i];
            } else if (obj.childNodes[i].firstChild) {
                var node = getChildNodeWithClassName(obj.childNodes[i], className);
                if (node) {
                    return node;
                }
            }
        }
    }
    return false;
}

function getChildNodesWithTagName(obj, tagName, childNodesWithTagName) {
    if (!childNodesWithTagName) {
        var childNodesWithTagName = new Array;
    }
    var i = 0;
    if (obj.childNodes) {
        for (i in obj.childNodes) {
            if (obj.childNodes[i].tagName &&
                obj.childNodes[i].tagName == tagName.toUpperCase()) {
                childNodesWithTagName.push(obj.childNodes[i]);
            }
            if (obj.childNodes[i].firstChild) {
                childNodesWithTagName.concat(getChildNodesWithTagName(obj.childNodes[i], tagName, childNodesWithTagName));
            }
        }
    }
    return childNodesWithTagName;
}

function hasClassName(obj, needle) {
    if (obj.className && needle) {
        var haystack = obj.className;
        return haystack == needle ||
            haystack.indexOf(" " + needle + " ") >= 0 ||
            haystack.indexOf(needle + " ") == 0 ||
            haystack.indexOf(" " + needle) > 0 &&
            haystack.indexOf(" " + needle) == haystack.length - (" " + needle).length;
    } else {
        return false;
    }
}


function splitParameterStringToArray(str) {
    var arr = new Object;
    var vars = str.split(" ");
    for (var i in vars) {
        var pair = vars[i].split("=");
        if (pair[0]) {
            arr[pair[0]] = pair[1];
        }
    }
    return arr;
}


function plusMinus(obj) {

    var thisObj = this;

    // Plusminus-Box
    thisObj.plusMinusObj = obj;
    // Plus-Button
    thisObj.plusMinusObj.plusButtonObj = getChildNodeWithClassName(obj, 'plus');
    // Minus-Button
    thisObj.plusMinusObj.minusButtonObj = getChildNodeWithClassName(obj, 'minus');
    thisObj.plusMinusObj.inputObj = getChildNodeWithClassName(obj, 'value');

    // Parameter min iund max stehen als StyleClass im Quelltext
    var arr = splitParameterStringToArray(thisObj.plusMinusObj.inputObj.className);
    var min = (Number(arr['min']))?parseInt(arr['min']):0;
    var max = (Number(arr['max']) || arr['max']==0)?parseInt(arr['max']):999;

    thisObj.action = '';
    //alert(thisObj.plusMinusObj.innerHTML);

    this.setMax = function(val) {
    	max = val;
    }

    this.setValue = function(val, avoidFireAction) {
        thisObj.plusMinusObj.inputObj.value = val;
        if (!avoidFireAction) {
            thisObj.setValueAction(val);
        }
    }
    this.setValueAction = function(val) {// Dummy, bitte ableiten
    }
    this.getValue = function () {
        return (thisObj.plusMinusObj.inputObj.value);
    }

    this.minus = function() {
        //alert(thisObj.plusMinusObj.inputObj.value);
        if (thisObj.plusMinusObj.inputObj.value>min) {
            thisObj.setValue(parseInt(thisObj.getValue())-1);
        } else {
            thisObj.setValue(min);
        }
        thisObj.minusAction(thisObj.plusMinusObj.inputObj.value);
    }
    this.minusAction = function(value) { // Dummy, bitte ableiten
    }
    this.plus = function() {
        if (thisObj.plusMinusObj.inputObj.value<max) {
            thisObj.setValue(parseInt(thisObj.getValue())+1);
        } else {
            thisObj.setValue(max);
        }
        thisObj.plusAction(thisObj.plusMinusObj.inputObj.value);
    }

    this.plusAction = function(value) { // Dummy, bitte ableiten
    }

    this.testValue = function() {
        if (thisObj.plusMinusObj.inputObj.value<min) {
            thisObj.setValue(min);
            return false;
        } else if (thisObj.plusMinusObj.inputObj.value>max) {
            thisObj.setValue(max);
            return false;
        }
        return true;
    }
    this.testValueAction = function() { // Dummy, bitte ableiten
    }

    this.minusInterval = function() {
        if (thisObj.action == 'minus') {
            thisObj.minus();
            setTimeout(thisObj.minusInterval, 200);
        }
    }
    this.plusInterval = function() {
        if (thisObj.action == 'plus') {
            thisObj.plus();
            setTimeout(thisObj.plusInterval, 200);
        }
    }
    addListener(thisObj.plusMinusObj.minusButtonObj, 'mousedown', function() {
        thisObj.action = 'minus';
        thisObj.minusInterval();
    });
    addListener(thisObj.plusMinusObj.plusButtonObj, 'mousedown', function() {
        thisObj.action = 'plus';
        thisObj.plusInterval();
    });
    addListener(thisObj.plusMinusObj.minusButtonObj, 'mouseup', function() {
        thisObj.action = '';
    });
    addListener(thisObj.plusMinusObj.plusButtonObj, 'mouseup', function() {
        thisObj.action = '';
    });
    addListener(thisObj.plusMinusObj.minusButtonObj, 'mouseout', function() {
        thisObj.action = '';
    });
    addListener(thisObj.plusMinusObj.plusButtonObj, 'mouseout', function() {
        thisObj.action = '';
    });
    addListener(thisObj.plusMinusObj.plusButtonObj, 'huhu', function() {
        alert('hier fehlen jetzt die Tests und Nachziehen von Warenkorb');
    });
    addListener(thisObj.plusMinusObj.inputObj, 'change', function() {
        thisObj.testValue();
    });
    addListener(thisObj.plusMinusObj.inputObj, 'keyup', function() {
        thisObj.testValue();
        thisObj.setValueAction(thisObj.getValue());
    });
}
</script>

<script type="text/javascript">

	var transporterDisplay;
	var tempUnitTime = 0;

	var textOk = "Грабить город!";
    var textNoTransporters = "Недостаточно сухогрузов. Поэтому награбленное Вашими войсками не будет доставлено.";
	var textNoTroops = "Войска не выбраны.";

    var jsClassOk = 'ok';
    var jsClassNoTransporters = 'warning';
    var jsClassNoTroops = 'warning';

	Event.onDOMReady(function() {
		transporterDisplay = new armyTransportController(
			0,
			500,
			Dom.get("transporterCount"),
			Dom.get("extraTransporter"),
			Dom.get("sumTransporter"),
			Dom.get("totalFreight"),
			600,
			Dom.get('journeyTime'),
			Dom.get('returnTime'),
			Dom.get('upkeepPerHour'),
			Dom.get('estimatedTotalCosts'),
			Dom.get("totalWeight"),
			null,
			Dom.get('plunderbutton')
			);
		});

</script>

<div id="mainview">
    <div class="buildingDescription">
        <h1>Грабеж</h1>
        <p>Не исключено, что в городах Ваших соседей хранятся сокровища, которые которые можно попробовать захватить. Но не забудьте, что войска, находящиеся на марше, требуют больше содержания. Поэтому хорошо расчитайте, кого Вы пошлете на грабеж.</p>
    </div>
    <div id="notices">
    </div>
			
    <form  action="<?=$this->config->item('base_url')?>actions/transport/attack/<?=$position?>/" id="plunderForm"  method="POST">			
        <div id="selectArmy" class="contentBox01h">
            <h3 class="header">Отправить армию</h3>
            <div class="content">
                <p>Вы отправили войска из <?=$this->Player_Model->now_town->name?> для разграбления города <strong><?if($position == 0){?>Деревня Варваров<?}else{?><?=$this->Data_Model->temp_towns_db[$position]->name?><?}?></strong>.</p>
                <ul class="assignUnits">
<?for($i = 1; $i <= 14; $i++){?>
<?$class = $this->Data_Model->army_class_by_type($i)?>
<?if ($this->Player_Model->armys[$this->Player_Model->town_id]->$class > 0){?>
<?$cost = $this->Data_Model->army_cost_by_type($i, $this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id])?>
                    <li class="<?=$class?> ">
                        <label for="cargo_army_<?=$i?>"><?=$this->Data_Model->army_name_by_type($i)?> отправить:</label>
                        <div class="amount"><span class="textLabel">Доступно: </span><?=$this->Player_Model->armys[$this->Player_Model->town_id]->$class?></div>
                        <div class="weight"><span class="textLabel">Вместимость груза </span><?=$cost['capacity']?></div>
                        <div class="sliderinput">
                            <div class="sliderbg" id="sliderbg_<?=$i?>">
                                <div class="actualValue" id="actualValue_<?=$i?>"></div>
                                <div class="sliderthumb" id="sliderthumb_<?=$i?>"></div>
                            </div>

                                        <script type="text/javascript">
                                        create_slider({
                                            dir : 'ltr',
                                            id: "slider_<?=$i?>",
                                            maxValue: <?=$this->Player_Model->armys[$this->Player_Model->town_id]->$class?>,
                                            overcharge: 0,
                                            iniValue: 0,
                                            bg: "sliderbg_<?=$i?>",
                                            thumb: "sliderthumb_<?=$i?>",
                                            topConstraint: -10,
                                            bottomConstraint: 326,
                                            bg_value: "actualValue_<?=$i?>",
                                            textfield: "cargo_army_<?=$i?>"
                                        });
                                        Event.onDOMReady(function() {
											var s=sliders["slider_<?=$i?>"];
											s.upkeep=<?=number_format($cost['gold'])?>;
											s.weight=0;
											s.unitJourneyTime=600;
                                            transporterDisplay.registerSlider(s);
                                        });
                                        </script>

                            <a class="setMin" href="#reset" onClick="sliders['slider_<?=$i?>'].setActualValue(0); return false;" title="Eingabe zurücksetzen"><span class="textLabel">min</span></a>
                            <a class="setMax" href="#max" onClick="sliders['slider_<?=$i?>'].setActualValue(sliders['slider_<?=$i?>'].maxValue); return false;" title="alles Mitschicken"><span class="textLabel">max</span></a>
                        </div>
                                    
                        <input class="textfield" id="cargo_army_<?=$i?>" type="text" name="cargo_army_<?=$i?>"  value="0" size="4" maxlength="9">
                        <input type="hidden" id="cargo_army_<?=$i?>_upkeep" name="cargo_army_<?=$i?>_upkeep" value="1">
                    </li>
<?}}?>
                </ul>

                <hr>
                <div id="missionSummary">
                    <div class="plunderInfo">
                        <div class="targetName"><span class="textLabel">Цель: </span><?if($position == 0){?>Деревня Варваров<?}else{?><?=$this->Data_Model->temp_towns_db[$position]->name?><?}?></div>
                        <div class="upkeep"><span class="textLabel">Доп. содержание: </span><span id="upkeepPerHour">0</span> в час</div>
                    </div>
                    <div class="newSummary">
                        <div class="transporter">
                            <span class="textLabel">Транспортер: </span>
                            <div class="neededTransporter"><span id="transporterCount">0</span></div>
                            <div id="plusminus" class="plusminus">
                                <input class="value text min=0 max=0" type="text" size="3" maxlength="4" value="0" name="transporter" id="extraTransporter"/>
                                <a href="javascript:;" class="plus"></a>
                                <a href="javascript:;" class="minus"></a>
                            </div>
                            <div class="sumTransporter" id="sumTransporter">0</div>
                        </div>
                        <div class="freight">
                            <div id="totalWeight">0</div>
                            <div id="totalFreight">0</div>
                        </div>
                        <div class="travelTime">
                            <div id="journeyTime">-</div>
                            <div id="returnTime">-</div>
                        </div>
                            		<script type="text/javascript">
                                            var temp = new plusMinus(document.getElementById('plusminus'), 10, 40);
                                            var transporterCountElem = Dom.get('transporterCount');
                                            var totalFreightElem = Dom.get('totalFreight');
                                            temp.setValueAction = function(val) {
                                                val = Number(val);
                                                if(isNaN(val)) {
                                                	val = 0;
                                                	temp.setValue(0);
                                                	return;
                                                }
                                                tempMath = (val+ parseInt(transporterCountElem.innerHTML));
                                                Dom.get('sumTransporter').innerHTML = tempMath;
                                                if(tempMath > 0 && tempUnitTime < 600) {
                                                	Dom.get('journeyTime').innerHTML = getTimestring(600*1000, 3);
                                                	Dom.get('returnTime').innerHTML = getTimestring(1200*1000, 3);
                                                } else {
                                                	if(tempUnitTime > 0) {
	                                                	Dom.get('journeyTime').innerHTML = getTimestring(tempUnitTime*1000, 3);
	                                                	Dom.get('returnTime').innerHTML = getTimestring(tempUnitTime*2000, 3);
	                                                } else {
	                                                	Dom.get('journeyTime').innerHTML = "-";
	                                                	Dom.get('returnTime').innerHTML = "-";
	                                                }
                                                }
                                                temp.setMax(0-parseInt(transporterCountElem.innerHTML));
                                                totalFreightElem.innerHTML = (val+ parseInt(transporterCountElem.innerHTML))*500;
                                                if(tempUnitTime > 0 && tempMath > 0) {
                                                		Dom.get('plunderbutton').className = "ok";
                                                		Dom.get('plunderbutton').title = textOk;
                                                } else if (tempUnitTime > 0 && tempMath <= 0) {
                                                		Dom.get('plunderbutton').className = "warning";
                                                		Dom.get('plunderbutton').title = textNoTransporters;
                                                } else {
                                                		Dom.get('plunderbutton').className = "warning";
                                                		Dom.get('plunderbutton').title = textNoTroops;
                                                }
                                            }
                                        </script>

                        <div class="submit">
                            <a href="#" id="plunderbutton" class="warning" onclick="Dom.get('plunderForm').submit();" title="Войска не выбраны." value=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer"></div>
        </div>
    </form>
</div>
