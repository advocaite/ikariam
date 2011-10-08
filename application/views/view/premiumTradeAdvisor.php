<div id="mainview">
    <h1>Обзор построек</h1>
    <div class="yui-navset">
        <ul class="yui-nav">
            <li <?if($param1=='resources'){?>class="selected"<?}?>><a href="<?=$this->config->item('base_url')?>game/premiumTradeAdvisor/resources/" title="Ресурсы"><em>Ресурсы</em></a></li>
            <li <?if($param1=='population'){?>class="selected"<?}?>><a href="<?=$this->config->item('base_url')?>game/premiumTradeAdvisor/population/" title="Граждане"><em>Граждане</em></a></li>
            <li <?if($param1=='buildings'){?>class="selected"<?}?>><a href="<?=$this->config->item('base_url')?>game/premiumTradeAdvisor/buildings/" title="Здания"><em>Здания</em></a></li>
        </ul>
    </div>
<?if($param1=='population'){?>
    <div id="populationOverview" class="contentBox">
        <h3 class="header"><span class="textLabel">Обзор империи</span></h3>
        <div class="content">
            <table cellpadding="0" cellspacing="0" class="overview">
                <tr>
                    <th title="Город"><img src="<?=$this->config->item('style_url')?>skin/layout/city.gif" alt="Город" title="Город"></th>
                    <th title="Население"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_population.gif" alt="Население" title="Население"></th>
                    <th title="Население"><img src="<?=$this->config->item('style_url')?>skin/icons/growth_positive.gif"></th>
                    <th title="Граждане"><img src="<?=$this->config->item('style_url')?>skin/characters/40h/citizen_r.gif" alt="Граждане" title="Граждане"></th>
                    <th title="Рабочие на лесоповале"><img src="<?=$this->config->item('style_url')?>skin/characters/40h/woodworker_r.gif" alt="Рабочие на лесоповале" title="Рабочие на лесоповале"></th>
                    <th title="Рабочие для товаров"><img src="<?=$this->config->item('style_url')?>skin/characters/40h/luxuryworker_r.gif" alt="Рабочие для товаров" title="Рабочие для товаров"></th>
                    <th title="Ученые"><img src="<?=$this->config->item('style_url')?>skin/characters/40h/scientist_r.gif" alt="Ученые" title="Ученые"></th>
                    <th title="Уровень довольства жизнью"><img src="<?=$this->config->item('style_url')?>skin/smilies/happy_x32.gif" alt="Уровень довольства жизнью" title="Уровень довольства жизнью"></th>
                </tr>
<?$town_id = 0?>
<?foreach($this->Player_Model->towns as $town){?>
                <tr class='<?if (($town_id % 2) == 0){?>normal<?}else{?>alt<?}?>'>
                    <td class="city"><a title="К обзору города <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></td>
                    <td class="citizens text"><?=number_format($this->Player_Model->peoples[$town->id])?> / <?=number_format($this->Player_Model->max_peoples[$town->id])?></td>
                    <td class="citizens text"><?=number_format($this->Player_Model->good[$town->id]/50, 2, '.', '')?></td>
                    <td class="citizens text"><?=number_format($town->peoples)?></td>
<?
    $wood = $this->Data_Model->island_cost(0, $this->Player_Model->islands[$town->island]->wood_level);
    $trade = $this->Data_Model->island_cost(1, $this->Player_Model->islands[$town->island]->trade_level);
?>
                    <td class="worker1 text"><?=number_format($town->workers)?> / <?=number_format($wood['workers'])?></td>
                    <td class="worker2 text"><?=number_format($town->tradegood)?> / <?=number_format($trade['workers'])?></td>
                    <td class="scientists text"><?=number_format($town->scientists)?> / <?=number_format($this->Data_Model->scientists_by_level($this->Player_Model->levels[$town->id][3]))?></td>
                    <td class="satisfaction"><img src="<?=$this->config->item('style_url')?>skin/smilies/<?=$this->Data_Model->good_class_by_count($this->Player_Model->good[$town->id])?>_x25.gif" alt="<?=$this->Data_Model->good_name_by_count($this->Player_Model->good[$town->id])?>" title="<?=$this->Data_Model->good_name_by_count($this->Player_Model->good[$town->id])?>" /></td>
                </tr>
<?$town_id++?>
<?}?>
            </table>
        </div>
        <div class="footer"></div>
    </div>
<?}?>


<?if($param1=='resources'){?>
    <div id="resourceOverview" class="contentBox">
        <h3 class="header"><span class="textLabel">Обзор империи</span></h3>
        <div class="content">
            <table cellpadding="0" cellspacing="0" class="overview">
                <tr>
                    <th class="image"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wood.gif" alt="Стройматериалы" title="Стройматериалы"></th>
                    <th class="text">На складе</th>
                    <th class="text">Уровень</th>
                    <th class="text">Работников</th>
                    <th class="text">Производство</th>
                    <th class="text">Предел вместимости склада</th>
                    <th class="text"></th>
                    <th class="text"></th>
                </tr>
<?
    $town_id = 0;
    $all_wood = 0;
    $all_wine = 0;
    $all_marble = 0;
    $all_crystal = 0;
    $all_sulfur = 0;
    $all_workers = 0;
    $all_add = 0;
?>
<?foreach($this->Player_Model->towns as $town){?>
<?
    $wood = $this->Data_Model->island_cost(0, $this->Player_Model->islands[$town->island]->wood_level);
    $all_wood = $all_wood + $town->wood;
    $all_workers = $all_workers + $town->workers;
    $all_add = $all_add + $town->workers*(1-$this->Player_Model->corruption[$town->id])*$this->Player_Model->plus_wood;
?>
                <tr class='<?if (($town_id % 2) == 0){?>normal<?}else{?>alt<?}?>'>
                    <td class="city"><a title="К обзору <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></td>
                    <td class=""><?=number_format($town->wood)?></td>
                    <td class="wine">
                        <a title="Ссылка на строительные материалы" href="<?=$this->config->item('base_url')?>game/resource/<?=$town->island?>/"><?=$this->Player_Model->islands[$town->island]->wood_level?></a>
                    </td>
                    <td><?=number_format($town->workers)?>/<?=number_format($wood['workers'])?></td>
                    <td><?=number_format($town->workers*(1-$this->Player_Model->corruption[$town->id])*$this->Player_Model->plus_wood)?> в час</td>
                    <td><?if($town->workers>0){?><?=format_time((($this->Player_Model->capacity[$town->id]-$town->wood)/($town->workers*(1-$this->Player_Model->corruption[$town->id])*$this->Player_Model->plus_wood))*3600)?><?}else{?>-<?}?></td>
                    <td>-</td>
                    <td>-</td>
                </tr>
<?$town_id++?>
<?}?>
                <tr>
                    <td class="total city">Всего</td>
                    <td class="total stock"><?=number_format($all_wood)?></td>
                    <td>-</td>
                    <td class="total stock"><?=number_format($all_workers)?></td>
                    <td class="total stock"><?=number_format($all_add)?> в час</td>
                    <td>-</td>
                    <td class="total stock">-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <th class="image"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wine.gif" alt="Виноград" title="Виноград"></th>
                    <th class="text">На складе</th>
                    <th class="text">Уровень</th>
                    <th class="text">Работников</th>
                    <th class="text">Производство</th>
                    <th class="text">Предел вместимости склада</th>
                    <th class="text">Потребление</th>
                    <th class="text">Оставшееся время</th>
                </tr>
<?
    $all_workers = 0;
    $all_add = 0;
    $all_remove = 0;
?>
<?foreach($this->Player_Model->towns as $town){?>
<?
    $trade = $this->Data_Model->island_cost(1, $this->Player_Model->islands[$town->island]->trade_level);
    $all_wine = $all_wine + $town->wine;
    if($this->Player_Model->islands[$town->island]->trade_resource == 1)
    {
        $all_workers = $all_workers + $town->tradegood;
        $all_add = $all_add + $town->tradegood*(1-$this->Player_Model->corruption[$town->id])*$this->Player_Model->plus_crystal;
    }
    $all_remove = $all_remove + $this->Data_Model->wine_by_tavern_level($this->Player_Model->towns[$town->id]->tavern_wine);
?>
<?if($this->Player_Model->islands[$town->island]->trade_resource == 1){?>
                <tr class='<?if (($town_id % 2) == 0){?>normal<?}else{?>alt<?}?>'>
                    <td class="city"><a title="К обзору <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></td>
                    <td class=""><?=number_format($town->wine)?></td>
                    <td class="wine">
                        <a title="Ссылка на виноград" href="<?=$this->config->item('base_url')?>game/tradegood/<?=$town->island?>/"><?=$this->Player_Model->islands[$town->island]->trade_level?></a>
                    </td>
                    <td><?=number_format($town->tradegood)?>/<?=number_format($trade['workers'])?></td>
                    <td><?=number_format($town->tradegood*(1-$this->Player_Model->corruption[$town->id])*$this->Player_Model->plus_wine)?> в час</td>
                    <td><?if($town->tradegood>0){?><?=format_time((($this->Player_Model->capacity[$town->id]-$town->wine)/($town->tradegood*(1-$this->Player_Model->corruption[$town->id])*$this->Player_Model->plus_wine))*3600)?><?}else{?>-<?}?></td>
                    <td><?=$this->Data_Model->wine_by_tavern_level($this->Player_Model->towns[$town->id]->tavern_wine)?> в час</td>
                    <td><?if($town->wine > 0 and $this->Player_Model->levels[$town->id][8] > 0){?><?=format_time(($town->wine/$this->Data_Model->wine_by_tavern_level($this->Player_Model->levels[$town->id][8]))*3600)?><?}else{?>-<?}?></td>
                </tr>
<?}else{?>
                <tr class='<?if (($town_id % 2) == 0){?>normal<?}else{?>alt<?}?>'>
                    <td class="city"><a title="К обзору <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></td>
                    <td class=""><?=number_format($town->wine)?></td>
                    <td class="wine">-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?=$this->Data_Model->wine_by_tavern_level($this->Player_Model->levels[$town->id][8])?> в час</td>
                    <td><?if($this->Data_Model->wine_by_tavern_level($this->Player_Model->levels[$town->id][8]) > 0){?><?=format_time(($town->wine/$this->Data_Model->wine_by_tavern_level($this->Player_Model->levels[$town->id][8]))*3600)?><?}else{?>-<?}?></td>
                </tr>
<?}?>
<?$town_id++?>
<?}?>
                <tr>
                    <td class="total city">Всего</td>
                    <td class="total stock"><?=number_format($all_wine)?></td>
                    <td>-</td>
                    <td class="total stock"><?=number_format($all_workers)?></td>
                    <td class="total stock"><?=number_format($all_add)?> в час</td>
                    <td>-</td>
                    <td class="total stock"><?=number_format($all_remove)?> в час</td>
                    <td>-</td>
                </tr>
                <tr>
                    <th class="image"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_marble.gif" alt="Мрамор" title="Мрамор"></th>
                    <th class="text">На складе</th>
                    <th class="text">Уровень</th>
                    <th class="text">Работников</th>
                    <th class="text">Производство</th>
                    <th class="text">Предел вместимости склада</th>
                    <th class="text"></th>
                    <th class="text"></th>
                </tr>
<?
    $all_workers = 0;
    $all_add = 0;
?>
<?foreach($this->Player_Model->towns as $town){?>
<?
    $trade = $this->Data_Model->island_cost(1, $this->Player_Model->islands[$town->island]->trade_level);
    $all_marble = $all_marble + $town->marble;
    if($this->Player_Model->islands[$town->island]->trade_resource == 2)
    {
        $all_workers = $all_workers + $town->tradegood;
        $all_add = $all_add + $town->tradegood*(1-$this->Player_Model->corruption[$town->id])*$this->Player_Model->plus_crystal;
    }
?>
<?if($this->Player_Model->islands[$town->island]->trade_resource == 2){?>
                <tr class='<?if (($town_id % 2) == 0){?>normal<?}else{?>alt<?}?>'>
                    <td class="city"><a title="К обзору <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></td>
                    <td class=""><?=number_format($town->marble)?></td>
                    <td class="marble">
                        <a title="Ссылка на виноград" href="<?=$this->config->item('base_url')?>game/tradegood/<?=$town->island?>/"><?=$this->Player_Model->islands[$town->island]->trade_level?></a>
                    </td>
                    <td><?=number_format($town->tradegood)?>/<?=number_format($trade['workers'])?></td>
                    <td><?=number_format($town->tradegood*(1-$this->Player_Model->corruption[$town->id])*$this->Player_Model->plus_marble)?> в час</td>
                    <td><?if($town->tradegood>0){?><?=format_time((($this->Player_Model->capacity[$town->id]-$town->marble)/($town->tradegood*(1-$this->Player_Model->corruption[$town->id])*$this->Player_Model->plus_marble))*3600)?><?}else{?>-<?}?></td>
                    <td>-</td>
                    <td>-</td>
                </tr>
<?}else{?>
                <tr class='<?if (($town_id % 2) == 0){?>normal<?}else{?>alt<?}?>'>
                    <td class="city"><a title="К обзору <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></td>
                    <td class=""><?=number_format($town->marble)?></td>
                    <td class="marble">-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
<?}?>
<?$town_id++?>
<?}?>
                <tr>
                    <td class="total city">Всего</td>
                    <td class="total stock"><?=number_format($all_marble)?></td>
                    <td>-</td>
                    <td class="total stock"><?=number_format($all_workers)?></td>
                    <td class="total stock"><?=number_format($all_add)?> в час</td>
                    <td>-</td>
                    <td class="total stock">-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <th class="image"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_glass.gif" alt="Хрусталь" title="Хрусталь"></th>
                    <th class="text">На складе</th>
                    <th class="text">Уровень</th>
                    <th class="text">Работников</th>
                    <th class="text">Производство</th>
                    <th class="text">Предел вместимости склада</th>
                    <th class="text"></th>
                    <th class="text"></th>
                </tr>
<?
    $all_workers = 0;
    $all_add = 0;
?>
<?foreach($this->Player_Model->towns as $town){?>
<?
    $trade = $this->Data_Model->island_cost(1, $this->Player_Model->islands[$town->island]->trade_level);
    $all_crystal = $all_crystal + $town->crystal;
    if($this->Player_Model->islands[$town->island]->trade_resource == 3)
    {
        $all_workers = $all_workers + $town->tradegood;
        $all_add = $all_add + $town->tradegood*(1-$this->Player_Model->corruption[$town->id])*$this->Player_Model->plus_crystal;
    }
?>
<?if($this->Player_Model->islands[$town->island]->trade_resource == 3){?>
                <tr class='<?if (($town_id % 2) == 0){?>normal<?}else{?>alt<?}?>'>
                    <td class="city"><a title="К обзору <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></td>
                    <td class=""><?=number_format($town->crystal)?></td>
                    <td class="crystal">
                        <a title="Ссылка на виноград" href="<?=$this->config->item('base_url')?>game/tradegood/<?=$town->island?>/"><?=$this->Player_Model->islands[$town->island]->trade_level?></a>
                    </td>
                    <td><?=number_format($town->tradegood)?>/<?=number_format($trade['workers'])?></td>
                    <td><?=number_format($town->tradegood*(1-$this->Player_Model->corruption[$town->id])*$this->Player_Model->plus_crystal)?> в час</td>
                    <td><?if($town->tradegood>0){?><?=format_time((($this->Player_Model->capacity[$town->id]-$town->crystal)/($town->tradegood*(1-$this->Player_Model->corruption[$town->id])*$this->Player_Model->plus_crystal))*3600)?><?}else{?>-<?}?></td>
                    <td>-</td>
                    <td>-</td>
                </tr>
<?}else{?>
                <tr class='<?if (($town_id % 2) == 0){?>normal<?}else{?>alt<?}?>'>
                    <td class="city"><a title="К обзору <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></td>
                    <td class=""><?=number_format($town->crystal)?></td>
                    <td class="crystal">-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
<?}?>
<?$town_id++?>
<?}?>
                <tr>
                    <td class="total city">Всего</td>
                    <td class="total stock"><?=number_format($all_crystal)?></td>
                    <td>-</td>
                    <td class="total stock"><?=number_format($all_workers)?></td>
                    <td class="total stock"><?=number_format($all_add)?> в час</td>
                    <td>-</td>
                    <td class="total stock">-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <th class="image"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_sulfur.gif" alt="Сера" title="Сера"></th>
                    <th class="text">На складе</th>
                    <th class="text">Уровень</th>
                    <th class="text">Работников</th>
                    <th class="text">Производство</th>
                    <th class="text">Предел вместимости склада</th>
                    <th class="text"></th>
                    <th class="text"></th>
                </tr>
<?
    $all_workers = 0;
    $all_add = 0;
?>
<?foreach($this->Player_Model->towns as $town){?>
<?
    $trade = $this->Data_Model->island_cost(1, $this->Player_Model->islands[$town->island]->trade_level);
    $all_sulfur = $all_sulfur + $town->sulfur;
    if($this->Player_Model->islands[$town->island]->trade_resource == 4)
    {
        $all_workers = $all_workers + $town->tradegood;
        $all_add = $all_add + $town->tradegood*(1-$this->Player_Model->corruption[$town->id])*$this->Player_Model->plus_sulfur;
    }
?>
<?if($this->Player_Model->islands[$town->island]->trade_resource == 4){?>
                <tr class='<?if (($town_id % 2) == 0){?>normal<?}else{?>alt<?}?>'>
                    <td class="city"><a title="К обзору <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></td>
                    <td class=""><?=number_format($town->sulfur)?></td>
                    <td class="sulfur">
                        <a title="Ссылка на виноград" href="<?=$this->config->item('base_url')?>game/tradegood/<?=$town->island?>/"><?=$this->Player_Model->islands[$town->island]->trade_level?></a>
                    </td>
                    <td><?=number_format($town->tradegood)?>/<?=number_format($trade['workers'])?></td>
                    <td><?=number_format($town->tradegood*(1-$this->Player_Model->corruption[$town->id])*$this->Player_Model->plus_sulfur)?> в час</td>
                    <td><?if($town->tradegood>0){?><?=format_time((($this->Player_Model->capacity[$town->id]-$town->sulfur)/($town->tradegood*(1-$this->Player_Model->corruption[$town->id])*$this->Player_Model->plus_sulfur))*3600)?><?}else{?>-<?}?></td>
                    <td>-</td>
                    <td>-</td>
                </tr>
<?}else{?>
                <tr class='<?if (($town_id % 2) == 0){?>normal<?}else{?>alt<?}?>'>
                    <td class="city"><a title="К обзору <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></td>
                    <td class=""><?=number_format($town->sulfur)?></td>
                    <td class="sulfur">-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
<?}?>
<?$town_id++?>
<?}?>
                <tr>
                    <td class="total city">Всего</td>
                    <td class="total stock"><?=number_format($all_sulfur)?></td>
                    <td>-</td>
                    <td class="total stock"><?=number_format($all_workers)?></td>
                    <td class="total stock"><?=number_format($all_add)?> в час</td>
                    <td>-</td>
                    <td class="total stock">-</td>
                    <td>-</td>
                </tr>
            </table>
        </div>
        <div class="footer"></div>
    </div>
<?}?>

<?if($param1=='buildings'){?>
    <div id="buildingsOverview" class="contentBox">
        <h3 class="header"><span class="textLabel">Обзор империи</span></h3>
        <div class="content">
            <table cellpadding="0" cellspacing="0">
                <tr class="headingrow">
                    <th class="city" title="Город"><img src="<?=$this->config->item('style_url')?>skin/layout/city.gif" alt="Город" title="Город"></th>
                    <th class="building" title="Ратуша"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_townHall.gif" alt="Ратуша" title="Ратуша"></th>
                    <th class="building" title="Академия"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_academy.gif" alt="Академия" title="Академия"></th>
                    <th class="building" title="Склад"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_warehouse.gif" alt="Склад" title="Склад"></th>
                    <th class="building" title="Таверна"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_tavern.gif" alt="Таверна" title="Таверна"></th>
                    <th class="building" title="Дворец"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_palace.gif" alt="Дворец" title="Дворец"></th>
                </tr>
<?$town_id = 0?>
<?foreach($this->Player_Model->towns as $town){?>
                <tr<?if (($town_id % 2) != 0){?> class="alt"<?}?>>
                    <th class="city"><a title="К обзору города <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></th>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][1]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/townHall/" title="К Ратуша"><?=$this->Player_Model->levels[$town->id][1]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][3]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/academy/" title="К Академия"><?=$this->Player_Model->levels[$town->id][3]?></a><?}else{?>-<?}?></td>
                    <td class="building">
                        <?if($this->Player_Model->warehouses[$town->id] > 0){?>
                        <?for($i = 3; $i <= 13; $i++){?>
                        <?$type_text = 'pos'.$i.'_type'?>
                        <?$level_text = 'pos'.$i.'_level'?>
                        <?if($town->$type_text == 6){?>
                        <a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/warehouse/<?=$i?>/" title="К Склад"><?=$town->$level_text?></a>&nbsp;&nbsp;
                        <?}}?>
                        <?}else{?>-<?}?>
                    </td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][8]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/tavern/" title="К Таверна"><?=$this->Player_Model->levels[$town->id][8]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][10]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/palace/" title="К Дворец"><?=$this->Player_Model->levels[$town->id][10]?></a><?}else{?>-<?}?></td>
                </tr>
<?$town_id++?>
<?}?>
            </table>
            <table cellpadding="0" cellspacing="0">
                <tr class="headingrow">
                    <th class="city" title="Город">&nbsp;</th>
                    <th class="building" title="Резиденция губернатора"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_palaceColony.gif" alt="Резиденция губернатора" title="Резиденция губернатора"></th>
                    <th class="building" title="Торговый порт"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_port.gif" alt="Торговый порт" title="Торговый порт"></th>
                    <th class="building" title="Верфь"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_shipyard.gif" alt="Верфь" title="Верфь"></th>
                    <th class="building" title="Казарма"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_barracks.gif" alt="Казарма" title="Казарма"></th>
                    <th class="building" title="Городская стена"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_wall.gif" alt="Городская стена" title="Городская стена"></th>
                </tr>
<?foreach($this->Player_Model->towns as $town){?>
                <tr<?if (($town_id % 2) != 0){?> class="alt"<?}?>>
                    <th class="city"><a title="К обзору города <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></th>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][15]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/palaceColony/" title="К Резиденция губернатора"><?=$this->Player_Model->levels[$town->id][15]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][2]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/port/" title="К Торговый порт"><?=$this->Player_Model->levels[$town->id][2]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][4]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/shipyard/" title="К Верфь"><?=$this->Player_Model->levels[$town->id][4]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][5]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/barracks/" title="К Казарма"><?=$this->Player_Model->levels[$town->id][5]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][7]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/wall/" title="К Городская стена"><?=$this->Player_Model->levels[$town->id][7]?></a><?}else{?>-<?}?></td>
                </tr>
<?$town_id++?>
<?}?>
            </table>
            <table cellpadding="0" cellspacing="0">
                <tr class="headingrow"><th class="city" title="Город">&nbsp;</th>
                    <th class="building" title="Посольство"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_embassy.gif" alt="Посольство" title="Посольство"></th>
                    <th class="building" title="Рынок"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_branchOffice.gif" alt="Рынок" title="Рынок"></th>
                    <th class="building" title="Мастерская"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_workshop.gif" alt="Мастерская" title="Мастерская"></th>
                    <th class="building" title="Укрытие"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_safehouse.gif" alt="Укрытие" title="Укрытие"></th>
                    <th class="building" title="Хижина Лесничего"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_forester.gif" alt="Хижина Лесничего" title="Хижина Лесничего"></th>
                </tr>
<?foreach($this->Player_Model->towns as $town){?>
                <tr<?if (($town_id % 2) != 0){?> class="alt"<?}?>>
                    <th class="city"><a title="К обзору города <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></th>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][11]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/embassy/" title="К Посольство"><?=$this->Player_Model->levels[$town->id][11]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][12]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/branchOffice/" title="К Рынок"><?=$this->Player_Model->levels[$town->id][12]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][13]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/workshop/" title="К Мастерская"><?=$this->Player_Model->levels[$town->id][13]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][14]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/safehouse/" title="К Укрытие"><?=$this->Player_Model->levels[$town->id][14]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][16]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/forester/" title="К Хижина Лесничего"><?=$this->Player_Model->levels[$town->id][16]?></a><?}else{?>-<?}?></td>
                </tr>
<?$town_id++?>
<?}?>
            </table>
            <table cellpadding="0" cellspacing="0"><tr class="headingrow">
                    <th class="city" title="Город">&nbsp;</th>
                    <th class="building" title="Стеклодувная Мастерская"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_glassblowing.gif" alt="Стеклодувная Мастерская" title="Стеклодувная Мастерская"></th>
                    <th class="building" title="Башня Алхимика"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_alchemist.gif" alt="Башня Алхимика" title="Башня Алхимика"></th>
                    <th class="building" title="Винодельня"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_winegrower.gif" alt="Винодельня" title="Винодельня"></th>
                    <th class="building" title="Каменоломня"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_stonemason.gif" alt="Каменоломня" title="Каменоломня"></th>
                    <th class="building" title="Плотницкая мастерская"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_carpentering.gif" alt="Плотницкая мастерская" title="Плотницкая мастерская"></th>
                </tr>
<?foreach($this->Player_Model->towns as $town){?>
                <tr<?if (($town_id % 2) != 0){?> class="alt"<?}?>>
                    <th class="city"><a title="К обзору города <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></th>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][18]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/glassblowing/" title="К Стеклодувная Мастерская"><?=$this->Player_Model->levels[$town->id][18]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][20]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/alchemist/" title="К Башня Алхимика"><?=$this->Player_Model->levels[$town->id][20]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][19]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/winegrower/" title="К Винодельня"><?=$this->Player_Model->levels[$town->id][19]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][17]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/stonemason/" title="К Каменоломня"><?=$this->Player_Model->levels[$town->id][17]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][21]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/carpentering/" title="К Плотницкая мастерская"><?=$this->Player_Model->levels[$town->id][21]?></a><?}else{?>-<?}?></td>
                </tr>
<?$town_id++?>
<?}?>
            </table>
            <table cellpadding="0" cellspacing="0"><tr class="headingrow">
                    <th class="city" title="Город">&nbsp;</th>
                    <th class="building" title="Музей"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_museum.gif" alt="Музей" title="Музей"></th>
                    <th class="building" title="Бюро Архитектора"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_architect.gif" alt="Бюро Архитектора" title="Бюро Архитектора"></th>
                    <th class="building" title="Оптика"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_optician.gif" alt="Оптика" title="Оптика"></th>
                    <th class="building" title="Винный погреб"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_vineyard.gif" alt="Винный погреб" title="Винный погреб"></th>
                    <th class="building" title="Полигон Пиротехника"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_fireworker.gif" alt="Полигон Пиротехника" title="Полигон Пиротехника"></th>
                </tr>
<?foreach($this->Player_Model->towns as $town){?>
                <tr<?if (($town_id % 2) != 0){?> class="alt"<?}?>>
                    <th class="city"><a title="К обзору города <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></th>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][9]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/museum/" title="К Музей"><?=$this->Player_Model->levels[$town->id][9]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][22]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/architect/" title="К Бюро Архитектора"><?=$this->Player_Model->levels[$town->id][22]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][23]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/optician/" title="К Оптика"><?=$this->Player_Model->levels[$town->id][23]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][24]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/vineyard/" title="К Винный погреб"><?=$this->Player_Model->levels[$town->id][24]?></a><?}else{?>-<?}?></td>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][25]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/fireworker/" title="К Полигон Пиротехника"><?=$this->Player_Model->levels[$town->id][25]?></a><?}else{?>-<?}?></td>
                </tr>
<?$town_id++?>
<?}?>
            </table>

            <table cellpadding="0" cellspacing="0">
                <tr class="headingrow">
                    <th class="city" title="Город">&nbsp;</th>
                    <th class="building" title="Храм"><img src="<?=$this->config->item('style_url')?>skin/buildings/y50/y50_temple.gif" alt="Храм" title="Храм"></th>
                    <th class="city">&nbsp;</th>
                    <th class="city">&nbsp;</th>
                    <th class="city">&nbsp;</th<th class="city">&nbsp;</th>
                    <th class="city">&nbsp;</th>
                </tr>
<?foreach($this->Player_Model->towns as $town){?>
                <tr<?if (($town_id % 2) != 0){?> class="alt"<?}?>>
                    <th class="city"><a title="К обзору города <?=$town->name?>" href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/"><?=$town->name?></a></th>
                    <td class="building"><?if($this->Player_Model->levels[$town->id][26]>0){?><a href="<?=$this->config->item('base_url')?>game/city/<?=$town->id?>/temple/" title="К Храм"><?=$this->Player_Model->levels[$town->id][26]?></a><?}else{?>-<?}?></td>
                    <td class="building">&nbsp;</td>
                    <td class="building">&nbsp;</td>
                    <td class="building">&nbsp;</td>
                    <td class="building">&nbsp;</td>
                </tr>
<?$town_id++?>
<?}?>
            </table>
        </div>
        <div class="footer"></div>
    </div>
<?}?>
</div>