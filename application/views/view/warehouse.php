<div id="mainview">
<?include_once('building_description.php')?>
    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel">Товары на складе</span></h3>
        <div class="content">
            <p style="padding-top:10px;padding-left:18px;padding-right:10px;padding-bottom:0px;">
            </p>
<?
    $safe = ((SizeOf($this->Player_Model->warehouses_levels[$this->Player_Model->town_id])*80)+100)*$this->Player_Model->plus_capacity;
    $nosafe_wood = (($this->Player_Model->now_town->wood - $safe) < 0) ? 0 : ($this->Player_Model->now_town->wood - $safe);
    $nosafe_wine = (($this->Player_Model->now_town->wine - $safe) < 0) ? 0 : ($this->Player_Model->now_town->wine - $safe);
    $nosafe_marble = (($this->Player_Model->now_town->marble - $safe) < 0) ? 0 : ($this->Player_Model->now_town->marble - $safe);
    $nosafe_crystal = (($this->Player_Model->now_town->crystal - $safe) < 0) ? 0 : ($this->Player_Model->now_town->crystal - $safe);
    $nosafe_sulfur = (($this->Player_Model->now_town->sulfur - $safe) < 0) ? 0 : ($this->Player_Model->now_town->sulfur - $safe);
    $capacity = $this->Player_Model->capacity[$this->Player_Model->town_id];
?>
<?if($this->Player_Model->warehouses[$this->Player_Model->town_id] > 1){?>
<p style="padding-top:10px;padding-left:18px;padding-right:10px;padding-bottom:0px;">
            В этом городе у Вас <?=$this->Player_Model->warehouses[$this->Player_Model->town_id]?> складов с уровнями <?$i = 0;foreach($this->Player_Model->warehouses_levels[$this->Player_Model->town_id] as $level){?><?=$level?><?if(($i+1) != SizeOf($this->Player_Model->warehouses_levels[$this->Player_Model->town_id])){?>, <?}$i++;}?><br>
</p>
<?}?>
            <table class="table01">
                <thead>
                <tr>
                    <th>Застрахованные</th>
                    <th>Не застрахованные</th>
                    <th>Всего</th>
                    <th>Вместимость</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td class="sicher">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wood.gif" title="Стройматериалы" alt="Стройматериалы"></td>
                                <td><span class="secure"><?=number_format($safe)?></span></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wine.gif" title="Виноград" alt="Виноград"></td>
                                <td><span class="secure"><?=number_format($safe)?></span></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_marble.gif" title="Мрамор" alt="Мрамор"></td>
                                <td><span class="secure"><?=number_format($safe)?></span></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_glass.gif" title="Хрусталь" alt="Хрусталь"></td>
                                <td><span class="secure"><?=number_format($safe)?></span></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_sulfur.gif" title="Сера" alt="Сера"></td>
                                <td><span class="secure"><?=number_format($safe)?></span></td>
                            </tr>
                        </table>
                    </td>
                    <td class="klaubar">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wood.gif" title="Стройматериалы" alt="Стройматериалы"></td>
                                <td><span class="insecure"><?=number_format($nosafe_wood)?></span></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wine.gif" title="Виноград" alt="Виноград"></td>
                                <td><span class="insecure"><?=number_format($nosafe_wine)?></span></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_marble.gif" title="Мрамор" alt="Мрамор"></td>
                                <td><span class="insecure"><?=number_format($nosafe_marble)?></span></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_glass.gif" title="Хрусталь" alt="Хрусталь"></td>
                                <td><span class="insecure"><?=number_format($nosafe_crystal)?></span></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_sulfur.gif" title="Сера" alt="Сера"></td>
                                <td><span class="insecure"><?=number_format($nosafe_sulfur)?></span></td>
                            </tr>
                        </table>
                    </td>
                    <td class="gesamt">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wood.gif" title="Стройматериалы" alt="Стройматериалы"></td>
                                <td><?=number_format($this->Player_Model->now_town->wood)?></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wine.gif" title="Виноград" alt="Виноград"></td>
                                <td><?=number_format($this->Player_Model->now_town->wine)?></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_marble.gif" title="Мрамор" alt="Мрамор"></td>
                                <td><?=number_format($this->Player_Model->now_town->marble)?></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_glass.gif" title="Хрусталь" alt="Хрусталь"></td>
                                <td><?=number_format($this->Player_Model->now_town->crystal)?></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_sulfur.gif" title="Сера" alt="Сера"></td>
                                <td><?=number_format($this->Player_Model->now_town->sulfur)?></td>
                            </tr>
                        </table>
                    </td>
                    <td class="capacity">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wood.gif" title="Стройматериалы" alt="Стройматериалы"></td>
                                <td><?=number_format($capacity)?></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wine.gif" title="Виноград" alt="Виноград"></td>
                                <td><?=number_format($capacity)?></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_marble.gif" title="Мрамор" alt="Мрамор"></td>
                                <td><?=number_format($capacity)?></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_glass.gif" title="Хрусталь" alt="Хрусталь"></td>
                                <td><?=number_format($capacity)?></td>
                            </tr>
                            <tr>
                                <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_sulfur.gif" title="Сера" alt="Сера"></td>
                                <td><?=number_format($capacity)?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="footer"></div>
	</div>
</div>