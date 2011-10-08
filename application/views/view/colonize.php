<div id="mainview">
    <div class="buildingDescription">
        <h1><?=$this->lang->line('mission_1')?></h1>
        <p><?=$this->lang->line('colonize_text')?></p>
    </div>
    <div id="moveCity" class="contentBox01h" style="z-index:55">
        <h3 class="header"><?=$this->lang->line('move_town_to')?> <?=$this->Island_Model->island->name?></h3>
        <div class="content" id="relatedCities">
            <p><?=$this->lang->line('move_town_text')?></p>
            <div style="padding:5px 10px 10px 10px;">
                <form action="<?=$this->config->item('base_url')?>actions/colonize/<?=$id?>/<?=$position?>/" method="post">
                    <div style="height:100px">
                        <img src="<?=$this->config->item('style_url')?>skin/premium/movecity.jpg" style="float:left;">
                        <table style="width:400px;background-color:#FFFBEC;border:1px solid #FBE7C0;margin-top:45px;">
                            <tr>
                                <td  style="width:250px;">
                                    <select id="moveCitySelect" class="citySpecialSelect smallFont" name="cityId" tabindex="1" >
                                        <option>-- <?=$this->lang->line('choose_town')?> --</option>
<?foreach($this->Player_Model->towns as $town){?>
<?$island = $this->Player_Model->islands[$town->island]?>
<?$selected = ($this->Player_Model->town_id == $town->id) ? 'selected="selected"' : ''?>
                    <option class="coords" value="<?=$town->id?>" <?=$selected?> title="<?=$this->lang->line('trade')?>: <?=$this->Data_Model->resource_name_by_type($island->trade_resource)?>" ><p>[<?=$island->x?>:<?=$island->y?>]&nbsp;<?=$town->name?></p></option>
<?}?>
                                    </select>
                                </td>
                                <td>200<img height="20" width="24" title="<?=$this->lang->line('ambrosy')?>" alt="<?=$this->lang->line('ambrosy')?>" src="<?=$this->config->item('style_url')?>skin/premium/ambrosia_icon.gif"/></td>
                                <td style="padding-bottom:10px;">
<?if($this->Player_Model->user->ambrosy < 200){?>
                                    <a class="notenough" style="color:#999;font-weight:normal;font-size:11px;text-decoration:none" href="<?=$this->config->item('base_url')?>game/premium/">200 <?=$this->lang->line('ambrosy_missing')?><br><span class="buyNow" style="text-decoration:underline"><?=$this->lang->line('acquire_now')?></span></a>
<?}else{?>
            <div class="centerButton">
                <input class="button" name="action" type=submit value="<?=$this->lang->line('move')?>">
            </div>
<?}?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <div class="footer"></div>
    </div>

<script type="text/javascript">
<!--
Event.onDOMReady( function() {
    replaceSelect(Dom.get("moveCitySelect"));
});
//-->
</script>



    <div id="createColony" class="contentBox01h" style="z-index:50">
        <h3 class="header"><?=$this->lang->line('found_colony')?> <?=$this->Island_Model->island->name?></h3>
        <div class="content">
            <p><?=$this->lang->line('found_colony_text')?></p>
            <div class="costs">			
                <img src="<?=$this->config->item('style_url')?>skin/img/colony_build.jpg">
                <p><?=$this->lang->line('colony_need')?>:</p>
                <ul class="resources">
                    <li class="citizens"><span class="textLabel"><?=$this->lang->line('peoples')?>: </span>40</li>
                    <li class="gold"><span class="textLabel"><?=$this->lang->line('gold')?>: </span>9,000</li>
                    <li class="wood"><span class="textLabel"><?=$this->lang->line('wood')?>: </span>1,250</li>
                </ul>
            </div>
<?$errors = array()?>
<?if($this->Player_Model->now_town->peoples < 40){ $errors[] = $this->lang->line('not_peoples_1').' <strong>'.number_format(40-$this->Player_Model->now_town->peoples).' '.$this->lang->line('not_peoples_2').'</strong>.<em>'.$this->lang->line('not_peoples_3').'</em>';} ?>
<?if($this->Player_Model->user->gold < 9000){ $errors[] = $this->lang->line('not_gold_1').' <strong>'.number_format(9000-$this->Player_Model->user->gold).' '.$this->lang->line('not_gold_2').'</strong>!';} ?>
<?if($this->Player_Model->now_town->wood < 1250){ $errors[] = $this->lang->line('not_wood_1').' <strong>'.number_format(1250-$this->Player_Model->now_town->wood).' '.$this->lang->line('not_wood_2').'</strong>!';} ?>
<?if($this->Player_Model->user->transports < 3){ $errors[] = $this->lang->line('not_tradeships_1').' <strong>'.number_format(3-$this->Player_Model->user->transports).' '.$this->lang->line('not_tradeships_2').'</strong>!';} ?>
<?if(SizeOf($this->Player_Model->towns)-1 >= $this->Player_Model->levels[$this->Player_Model->capital_id][10]){ $errors[] = $this->lang->line('not_palace_1').' '.(SizeOf($this->Player_Model->towns)-1).' '.$this->lang->line('not_palace_2').' '.$this->Player_Model->levels[$this->Player_Model->capital_id][10].$this->lang->line('not_palace_3');} ?>

<?if(SizeOf($errors)> 0){?>
            <div class="errors">
                <h4><?=$this->lang->line('colony_error')?></h4>
                <ul>
<?foreach($errors as $error){?>
                    <li><span><?=$error?></span></li>
<?}?>
                </ul>
            </div>
<?}else{?>
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
<script type="text/javascript" src="<?=$this->config->item('script_url')?>js/transportController.js"></script>
<script type="text/javascript">
var transporterDisplay;
Event.onDOMReady(function() {transporterDisplay = new transportController(<?=$this->Player_Model->user->transports?>, <?=$this->config->item('transport_capacity')?>, Dom.get("transporterCount"), 40+1250);});
</script>
<p><?=$this->lang->line('more_resources')?></p>
<form action="<?=$this->config->item('base_url')?>actions/colonize/<?=$id?>/<?=$position?>/" method="post">
<ul class="resourceAssign">
    <li class="wood">
        <label for="textfield_resource"><?=$this->lang->line('send')?> <?=$this->lang->line('wood')?>:</label>
        <div class="sliderinput">
            <div class="sliderbg" id="sliderbg_resource">
                <div class="actualValue" id="actualValue_resource"></div>
                <div class="sliderthumb" id="sliderthumb_resource"></div>
            </div>
        <script type="text/javascript">
		create_slider({
                    dir : 'ltr',
                    id : "slider_resource",
                    maxValue : <?if($capacity < $this->Player_Model->now_town->wood){?><?=$capacity?><?}else{?><?=$this->Player_Model->now_town->wood?><?}?>,
                    overcharge : 0,
                    iniValue : 0,
                    bg : "sliderbg_resource",
                    thumb : "sliderthumb_resource",
                    topConstraint: -10,
                    bottomConstraint: 326,
                    bg_value : "actualValue_resource",
                    textfield:"textfield_resource"
		});
		Event.onDOMReady(function() {
                    var slider = sliders["slider_resource"];
                    slider.UpdateField1 = Dom.get("resourceInput");
                    slider.subscribe("valueChange", function() {
                        updateColonizeSummary('resource', slider.actualValue);
                    });
                    slider.subscribe("slideEnd", function() {
                        slider.UpdateField1.value = 1250+slider.actualValue;
                    });
                    transporterDisplay.registerSlider(slider);
		});
        </script>
            <a class="setMin" href="#reset" onClick="setColonizeMinValue('slider_resource'); return false;" title="<?=$this->lang->line('reset_entry')?>"><span class="textLabel"><?=$this->lang->line('min')?></span></a>
            <a class="setMax" href="#max" onClick="setColonizeMaxValue('slider_resource'); return false;" title="<?=$this->lang->line('send_all')?>"><span class="textLabel"><?=$this->lang->line('max')?></span></a>
        </div>
        <input class="textfield" id="textfield_resource" type="text" name="sendresource" value="0" size="4" maxlength="9">
    </li>
    <li class="wine">					
        <label for="textfield_wine"><?=$this->lang->line('send')?> <?=$this->lang->line('wine')?>:</label>
        <div class="sliderinput">
            <div class="sliderbg" id="sliderbg_wine">
                <div class="actualValue" id="actualValue_wine"></div>
                <div class="sliderthumb" id="sliderthumb_wine"></div>
            </div>
        <script type="text/javascript">
		create_slider({
                    dir : 'ltr',
                    id : "slider_wine",
                    maxValue : <?if($capacity < $this->Player_Model->now_town->wine){?><?=$capacity?><?}else{?><?=$this->Player_Model->now_town->wine?><?}?>,
                    overcharge : 0,
                    iniValue : 0,
                    bg : "sliderbg_wine",
                    thumb : "sliderthumb_wine",
                    topConstraint: -10,
                    bottomConstraint: 326,
                    bg_value : "actualValue_wine",
                    textfield:"textfield_wine"
		});
		Event.onDOMReady(function() {
                    var slider = sliders["slider_wine"];
                    slider.UpdateField1 = Dom.get("tradegood1Input");
                    slider.subscribe("valueChange", function() {
                        updateColonizeSummary('wine', slider.actualValue);
                    });
                    slider.subscribe("slideEnd", function() {
                        slider.UpdateField1.value = slider.actualValue;
                    });
                    transporterDisplay.registerSlider(slider);
		});
        </script>
            <a class="setMin" href="#reset" onClick="setColonizeMinValue('slider_wine'); return false;" title="<?=$this->lang->line('reset_entry')?>"><span class="textLabel"><?=$this->lang->line('min')?></span></a>
            <a class="setMax" href="#max" onClick="setColonizeMaxValue('slider_wine'); return false;" title="<?=$this->lang->line('send_all')?>"><span class="textLabel"><?=$this->lang->line('max')?></span></a>
        </div>
        <input class="textfield" id="textfield_wine" type="text" name="sendwine"  value="0" size="4" maxlength="9">
    </li>
    <li class="marble">
        <label for="textfield_marble"><?=$this->lang->line('send')?> <?=$this->lang->line('marble')?>:</label>
        <div class="sliderinput">
            <div class="sliderbg" id="sliderbg_marble">
                <div class="actualValue" id="actualValue_marble"></div>
                <div class="sliderthumb" id="sliderthumb_marble"></div>
            </div>
        <script type="text/javascript">
		create_slider({
                    dir : 'ltr',
                    id : "slider_marble",
                    maxValue : <?if($capacity < $this->Player_Model->now_town->marble){?><?=$capacity?><?}else{?><?=$this->Player_Model->now_town->marble?><?}?>,
                    overcharge : 0,
                    iniValue : 0,
                    bg : "sliderbg_marble",
                    thumb : "sliderthumb_marble",
                    topConstraint: -10,
                    bottomConstraint: 326,
                    bg_value : "actualValue_marble",
                    textfield:"textfield_marble"
		});
		Event.onDOMReady(function() {
                    var slider = sliders["slider_marble"];
                    slider.UpdateField1 = Dom.get("tradegood2Input");
                    slider.subscribe("valueChange", function() {
                        updateColonizeSummary('marble', slider.actualValue);
                    });
                    slider.subscribe("slideEnd", function() {
                        slider.UpdateField1.value = slider.actualValue;
                    });
                    transporterDisplay.registerSlider(slider);
		});
        </script>
            <a class="setMin" href="#reset" onClick="setColonizeMinValue('slider_marble'); return false;" title="<?=$this->lang->line('reset_entry')?>"><span class="textLabel"><?=$this->lang->line('min')?></span></a>
            <a class="setMax" href="#max" onClick="setColonizeMaxValue('slider_marble'); return false;" title="<?=$this->lang->line('send_all')?>"><span class="textLabel"><?=$this->lang->line('max')?></span></a>
        </div>
        <input class="textfield" id="textfield_marble" type="text" name="sendmarble"  value="0" size="4" maxlength="9">
    </li>
    <li class="glass">
        <label for="textfield_crystal"><?=$this->lang->line('send')?> <?=$this->lang->line('crystal')?>:</label>
        <div class="sliderinput">
            <div class="sliderbg" id="sliderbg_crystal">
                <div class="actualValue" id="actualValue_crystal"></div>
                <div class="sliderthumb" id="sliderthumb_crystal"></div>
            </div>
        <script type="text/javascript">
		create_slider({
                    dir : 'ltr',
                    id : "slider_crystal",
                    maxValue : <?if($capacity < $this->Player_Model->now_town->crystal){?><?=$capacity?><?}else{?><?=$this->Player_Model->now_town->crystal?><?}?>,
                    overcharge : 0,
                    iniValue : 0,
                    bg : "sliderbg_crystal",
                    thumb : "sliderthumb_crystal",
                    topConstraint: -10,
                    bottomConstraint: 326,
                    bg_value : "actualValue_crystal",
                    textfield:"textfield_crystal"
		});
		Event.onDOMReady(function() {
                    var slider = sliders["slider_crystal"];
                    slider.UpdateField1 = Dom.get("tradegood3Input");
                    slider.subscribe("valueChange", function() {
                        updateColonizeSummary('crystal', slider.actualValue);
                    });
                    slider.subscribe("slideEnd", function() {
                        slider.UpdateField1.value = slider.actualValue;
                    });
                    transporterDisplay.registerSlider(slider);
		});
        </script>					
            <a class="setMin" href="#reset" onClick="setColonizeMinValue('slider_crystal'); return false;" title="<?=$this->lang->line('reset_entry')?>"><span class="textLabel"><?=$this->lang->line('min')?></span></a>
            <a class="setMax" href="#max" onClick="setColonizeMaxValue('slider_crystal'); return false;" title="<?=$this->lang->line('send_all')?>"><span class="textLabel"><?=$this->lang->line('max')?></span></a>
        </div>
        <input class="textfield" id="textfield_crystal" type="text" name="sendcrystal"  value="0" size="4" maxlength="9">
    </li>
    <li class="sulfur">
        <label for="textfield_sulfur"><?=$this->lang->line('send')?> <?=$this->lang->line('sulfur')?>:</label>
        <div class="sliderinput">
            <div class="sliderbg" id="sliderbg_sulfur">
                <div class="actualValue" id="actualValue_sulfur"></div>
                <div class="sliderthumb" id="sliderthumb_sulfur"></div>
            </div>
        <script type="text/javascript">
		create_slider({
                    dir : 'ltr',
                    id : "slider_sulfur",
                    maxValue : <?if($capacity < $this->Player_Model->now_town->sulfur){?><?=$capacity?><?}else{?><?=$this->Player_Model->now_town->sulfur?><?}?>,
                    overcharge : 0,
                    iniValue : 0,
                    bg : "sliderbg_sulfur",
                    thumb : "sliderthumb_sulfur",
                    topConstraint: -10,
                    bottomConstraint: 326,
                    bg_value : "actualValue_sulfur",
                    textfield:"textfield_sulfur"
		});
		Event.onDOMReady(function() {
                    var slider = sliders["slider_sulfur"];
                    slider.UpdateField1 = Dom.get("tradegood4Input");
                    slider.subscribe("valueChange", function() {
                        updateColonizeSummary('sulfur', slider.actualValue);
                    });
                    slider.subscribe("slideEnd", function() {
                        slider.UpdateField1.value = slider.actualValue;
                    });
                    transporterDisplay.registerSlider(slider);
		});
        </script>
            <a class="setMin" href="#reset" onClick="setColonizeMinValue('slider_sulfur'); return false;" title="<?=$this->lang->line('reset_entry')?>"><span class="textLabel"><?=$this->lang->line('min')?></span></a>
            <a class="setMax" href="#max" onClick="setColonizeMaxValue('slider_sulfur'); return false;" title="<?=$this->lang->line('send_all')?>"><span class="textLabel"><?=$this->lang->line('max')?></span></a>
        </div>
        <input class="textfield" id="textfield_sulfur" type="text" name="sendsulfur"  value="0" size="4" maxlength="9">
    </li>
    <li>
        <script type="text/javascript">
            function setColonizeMinValue(sName) {
                sliders[sName].setActualValue(0);
                transporterDisplay.sliderEnd();
            }
            function setColonizeMaxValue(sName) {
                maxLoadableVal = transporterDisplay.getMaxLoadable(sliders[sName]);
                sliders[sName].setActualValue(maxLoadableVal);
                transporterDisplay.sliderEnd();
            }
            var colonizeSummaries =new Array();
            colonizeSummaries['resource'] = 0;
            colonizeSummaries['wine'] = 0;
            colonizeSummaries['marble'] = 0;
            colonizeSummaries['crystal'] = 0;
            colonizeSummaries['sulfur'] = 0;
            function updateColonizeSummary(sName, sVal) {
                colonizeSummaries[sName] = sVal;
                var sum =  colonizeSummaries['resource'];
                sum +=  colonizeSummaries['wine'];
                sum +=  colonizeSummaries['marble'];
                sum +=  colonizeSummaries['crystal'];
                sum +=  colonizeSummaries['sulfur'];
                Dom.get('sendSummary').innerHTML = sum + '/<?=$capacity?>';
            }
        </script>
        <div class="summaryText"><?=$this->lang->line('empty_seat')?>:</div>
        <div class="summary" id="sendSummary">0/<?=$capacity?></div>
    </li>
</ul>
<hr>
<div id="missionSummary">
    <div class="common">
        <div class="journeyTarget"><span class="textLabel"><?=$this->lang->line('destination')?>:</span><?=$this->Island_Model->island->name?></div>
        <div class="journeyTime"><span class="textLabel"><?=$this->lang->line('duration_journey')?>:</span><?=format_time($time)?></div>
    </div>
    <div class="transporters">
        <span class="textLabel"><?=$this->lang->line('button_transporters_name')?>: </span>
        <span><input id="transporterCount" name="transporters" size="3" maxlength="3" readonly="readonly" value="3" /> / <?=number_format($this->Player_Model->user->transports)?></span>
    </div>
</div>
<div class="centerButton">			 
    <input id="colonizeBtn" name="action" class="button" type="submit" value="<?=$this->lang->line('base_colony')?>">
</div>
</form>
<?}?>
        </div>
        <div class="footer"></div>
    </div>
</div>