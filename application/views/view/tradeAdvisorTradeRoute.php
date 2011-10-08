<div id="mainview">
    <div class="buildingDescription">
        <h1>Мэр</h1>
        <p>Приветствую! Как Ваш городской советник я сообщу, если что-нибудь особенное произойдет в каком-либо из Ваших городов.</p>
    </div>

    <div class="yui-navset">
        <ul class="yui-nav"  >
            <li  ><a
                href="<?=$this->config->item('base_url')?>game/tradeAdvisor/"
                title="Городские Новости"><em>Городские Новости</em></a></li>
            <li class="selected"><a
                href="<?=$this->config->item('base_url')?>game/tradeAdvisorTradeRoute/"
                title="Торговые маршруты"><em>Торговые маршруты</em></a></li>
        </ul>
    </div>
    <div class="contentBox01h">
        <h3 class="header">Редактировать торговые маршруты</h3>
        <div class="content">
            <p>Торговый путь состоит в регулярной пересылке транспортов между двумя городами в вашей империи. Таким образом, вы можете, например, автоматически снабжать свои поселения вином. Один торговый маршрут доступен по умолчанию и вы можете добавить еще с помощью Амброзии. <br/><br/>Пожалуйста убедитесь в наличии достаточного количества товаров и свободных сухогрузов, а также в отсутствии препятствий на пути маршрута, таких как вражеские флоты.</p>

            <table >
                <tr>
                    <th colspan=3 style="width:446px;">Торговый маршрут:</th>
                    <th style="text-align:left;width:42px;">Длительность:</th>
                    <th style="text-align:left;width:47px;">Цена:</th>
                    <th style="width:107px;"></th>
                </tr>
            </table>

<?if(SizeOf($this->Player_Model->trade_routes) > 0){?>
<?foreach($this->Player_Model->trade_routes as $trade){?>
            
            <form action="<?=$this->config->item('base_url')?>actions/tradeRoute/" method="post" id="tradeRouteForm0">
                <input type="hidden" name="renew" value="0" id="renew0">
                <input type="hidden" name="route" value="<?=$trade->id?>">
                <ul class="tradeRoute"  style="z-index:100">
                    <li class="startCity" style="position:relative;z-index:100">
                        <select id="tradeRouteStart<?=$trade->id?>" class="dropdown size175 smallFont" name="city1Id" onchange="this.focus();">
                            <option>Выберите город источник</option>
<?foreach($this->Player_Model->towns as $town){?>
<?$island = $this->Player_Model->islands[$town->island]?>
<?$selected = ($town->id == $trade->from) ? 'selected="selected"' : ''?>
                            <option class="coords" value="<?=$town->id?>" <?=$selected?> title="Торговля: <?=$this->Data_Model->resource_name_by_type($island->trade_resource)?>" ><p>[<?=$island->x?>:<?=$island->y?>]&nbsp;<?=$town->name?></p></option>
<?}?>
                        </select>
                    </li>
                    <li class="endCity">
                        <select id="tradeRouteEnd<?=$trade->id?>" class="dropdown size175 smallFont" name="city2Id" >
                            <option>Выберите город назначения</option>
<?foreach($this->Player_Model->towns as $town){?>
<?$island = $this->Player_Model->islands[$town->island]?>
<?$selected = ($town->id == $trade->to) ? 'selected="selected"' : ''?>
                            <option class="coords" value="<?=$town->id?>" <?=$selected?> title="Торговля: <?=$this->Data_Model->resource_name_by_type($island->trade_resource)?>" ><p>[<?=$island->x?>:<?=$island->y?>]&nbsp;<?=$town->name?></p></option>
<?}?>
                        </select>
                    </li>
                    <li class="premiumDuration"><?=format_time($this->config->item('trade_route_time'))?></li>
                    <li class="premiumCost">&nbsp; -</li>
                    <li class="renew"></li>
                </ul>
                <ul class="tradeRoute2"  style="z-index:99">
                    <li class="number">
                        <input type="text" name="number"  value="<?=$trade->send_count?>" style="width:50px">
                    </li>
<?  $selected_wood = ($trade->send_resource == 0) ? 'selected' : '';
    $selected_wine = ($trade->send_resource == 1) ? 'selected' : '';
    $selected_marble = ($trade->send_resource == 2) ? 'selected' : '';
    $selected_crystal = ($trade->send_resource == 3) ? 'selected' : '';
    $selected_sulfur = ($trade->send_resource == 4) ? 'selected' : '';?>
                    <li class="tradegood">
                        <select name="tradegood" id="tradegood<?=$trade->id?>" class="dropdown size68 smallFont">
                            <option class="resource" value="0"  title="Стройматериалы" <?=$selected_wood?>></option>
                            <option class="tradegood1" value="1"  title="Виноград" <?=$selected_wine?>></option>
                            <option class="tradegood2" value="2"  title="Мрамор" <?=$selected_marble?>></option>
                            <option class="tradegood3" value="3"  title="Хрусталь" <?=$selected_crystal?>></option>
                            <option class="tradegood4" value="4"  title="Сера" <?=$selected_sulfur?>></option>
                        </select>
                    </li>
                    <li class="time">
                        <select name="time" id="time<?=$trade->id?>" class="dropdown size115 smallFont">
<?
for ($i = 0; $i <= 23; $i++)
{
        $selected = ($i == $trade->send_time) ? 'selected' : '';
?>
                            <option value="<?=$i?>" <?=$selected?>>ежедневно в <?=$i?>:00</option>
<?
}
?>
                        </select>
                    </li>
                    <li class="save">
                        <input id="colonizeBtn" name="save" type="submit" value="" title="Сохранить изменения"><br>
                    </li>
                    <li class="status">
                        <span style="font-size:16px;font-weight:bold;color:green;">Осталось <?=premium_time($this->config->item('trade_route_time')-(time()-$trade->start_time))?></span>
                    </li>
                    <li class="delete">
                        <a  href="<?=$this->config->item('base_url')?>actions/tradeRoute/<?=$trade->id?>/" title="Удалить"></a>
                    </li>
                </ul>
            </form>
            <div class="listFooter"></div><br>
<?}?>
<?}?>

<?if(SizeOf($this->Player_Model->trade_routes) == 0 or $param1 == 'new'){?>
            <form action="<?=$this->config->item('base_url')?>actions/tradeRoute/" method="post" id="tradeRouteForm0">
                <input type="hidden" name="renew" value="0" id="renew0">
                <input type="hidden" name="route" value="0">
                <ul class="tradeRoute"  style="z-index:100">
                    <li class="startCity" style="position:relative;z-index:100">
                        <select id="tradeRouteStart0" class="dropdown size175 smallFont" name="city1Id" onchange="this.focus();">
                            <option>Выберите город источник</option>
<?foreach($this->Player_Model->towns as $town){?>
<?$island = $this->Player_Model->islands[$town->island]?>
<?$selected = ($this->Player_Model->town_id == $town->id) ? 'selected="selected"' : ''?>
                            <option class="coords" value="<?=$town->id?>" <?=$selected?> title="Торговля: <?=$this->Data_Model->resource_name_by_type($island->trade_resource)?>" ><p>[<?=$island->x?>:<?=$island->y?>]&nbsp;<?=$town->name?></p></option>
<?}?>
                        </select>
                    </li>
                    <li class="endCity">
                        <select id="tradeRouteEnd0" class="dropdown size175 smallFont" name="city2Id" >
                            <option>Выберите город назначения</option>
<?foreach($this->Player_Model->towns as $town){?>
<?$island = $this->Player_Model->islands[$town->island]?>
<?$selected = ''?>
                            <option class="coords" value="<?=$town->id?>" <?=$selected?> title="Торговля: <?=$this->Data_Model->resource_name_by_type($island->trade_resource)?>" ><p>[<?=$island->x?>:<?=$island->y?>]&nbsp;<?=$town->name?></p></option>
<?}?>
                        </select>
                    </li>
                    <li class="premiumDuration"><?=format_time($this->config->item('trade_route_time'))?></li>
<?if(SizeOf($this->Player_Model->trade_routes) > 0){?>
                    <li class="premiumCost">10 <img height="20" width="24" alt="Амброзия" src="<?=$this->config->item('style_url')?>skin/premium/ambrosia_icon.gif"></li>
<?if($this->Player_Model->user->ambrosy >= 10){?>
                    <li class="renew">
                        <a onclick="Dom.get('renew0').value=1;Dom.get('tradeRouteForm0').submit();" id="colonizeBtn" name="renew" style="margin:0px;" class="button">Активировать</a><br>
                    </li>
<?}else{?>
                    <li class="renew">
                        <a class="notenough" href="<?=$this->config->item('base_url')?>game/premiumPayment/">Не хватает <?=10 - $this->Player_Model->user->ambrosy?> ед. амброзии!<br><span class="buyNow">Купить!</span></a>
                    </li>
<?}?>
<?}else{?>
                    <li class="premiumCost">&nbsp; -</li>
                    <li class="renew">
                        <a onclick="Dom.get('renew0').value=1;Dom.get('tradeRouteForm0').submit();" id="colonizeBtn" name="renew" style="margin:0px;" class="button">Активировать</a><br>
                    </li>
<?}?>

                </ul>
                <ul class="tradeRoute2"  style="z-index:99">
                    <li class="number">
                        <input type="text" name="number"  value="0" style="width:50px">
                    </li>
<?
    $selected_wood = '';
    $selected_wine = '';
    $selected_marble = '';
    $selected_crystal = '';
    $selected_sulfur = '';
?>
                    <li class="tradegood">
                        <select name="tradegood" id="tradegood0" class="dropdown size68 smallFont">
                            <option class="resource" value="0"  title="Стройматериалы" <?=$selected_wood?>></option>
                            <option class="tradegood1" value="1"  title="Виноград" <?=$selected_wine?>></option>
                            <option class="tradegood2" value="2"  title="Мрамор" <?=$selected_marble?>></option>
                            <option class="tradegood3" value="3"  title="Хрусталь" <?=$selected_crystal?>></option>
                            <option class="tradegood4" value="4"  title="Сера" <?=$selected_sulfur?>></option>
                        </select>
                    </li>
                    <li class="time">
                        <select name="time" id="time0" class="dropdown size115 smallFont">
<?
for ($i = 0; $i <= 23; $i++)
{
    $selected = '';
?>
                            <option value="<?=$i?>" <?=$selected?>>ежедневно в <?=$i?>:00</option>
<?
}
?>
                        </select>
                    </li>
                    <li class="save">
                        <input id="colonizeBtn" name="save" type="submit" value="" title="Сохранить изменения"><br>
                    </li>
                    <li class="status">
                        <span style="font-size:16px;font-weight:bold;color:red;">Не активен</span>
                    </li>
                    <li class="delete"></li>
                </ul>
            </form>
            <div class="listFooter"></div><br>
<?}else{?>
            <div class="addRoute">
                <a href="<?=$this->config->item('base_url')?>game/tradeAdvisorTradeRoute/new/" id="colonizeBtn" style="margin:0px;" class="button" >Создать новый торговый маршрут</a><br>
            </div>
<?}?>
        </table>
        </div>
        <div class="footer"></div>
    </div>
</div>

<script type="text/javascript">
<!--
function testTradeRouteDelete() {
    return confirm('Вы уверены, что хотите удалить активный торговый маршрут? Вы должны будете установить торговое предложение на 0.');
}

Event.onDOMReady( function() {
<?if(SizeOf($this->Player_Model->trade_routes) > 0){?>
<?foreach($this->Player_Model->trade_routes as $trade){?>
    replaceSelect(Dom.get("tradeRouteStart<?=$trade->id?>"));
    replaceSelect(Dom.get("tradeRouteEnd<?=$trade->id?>"));
    replaceSelect(Dom.get("tradegood<?=$trade->id?>"));
    replaceSelect(Dom.get("time<?=$trade->id?>"));
<?}}?>
<?if(SizeOf($this->Player_Model->trade_routes) == 0 or $param1 == 'new'){?>
    replaceSelect(Dom.get("tradeRouteStart0"));
    replaceSelect(Dom.get("tradeRouteEnd0"));
    replaceSelect(Dom.get("tradegood0"));
    replaceSelect(Dom.get("time0"));
<?}?>
});
//-->
</script>
