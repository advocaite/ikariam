<div id="mainview">
<?include_once('building_description.php')?>
    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel">Города Вашей империи</span></h3>
        <div class="content">
            <table cellpadding="0" cellspacing="0" class="table01">
                <thead>
                    <tr>
                        <th class="crown"></th>
                        <th>Город</th>
                        <th>Уровень</th>
                        <th>Дворец</th>
                        <th>Остров</th>
                        <th>Ресурс</th>
                    </tr>
                </thead>
                <tbody>
<?foreach($this->Player_Model->towns as $town){?>
<?
    // уровень дворца
    $level = 0;
    for($i = 3; $i <= 13; $i++)
    {
        $type_text = 'pos'.$i.'_type';
        $level_text = 'pos'.$i.'_level';
        if ($town->$type_text == 10){ $level = $town->$level_text; }
    }
?>
                    <tr>
                        <td><?if($town->id == $this->Player_Model->capital_id){?><img src="<?=$this->config->item('style_url')?>skin/layout/crown.gif" width="20" height="20" alt="Столица" title="Столица"><?}?></td>
                        <td><?=$town->name?></td>
                        <td><?=$town->pos0_level?></td>
                        <td><?=$level?></td>
                        <td><?=$this->Player_Model->islands[$town->island]->name?> [<?=$this->Player_Model->islands[$town->island]->x?>:<?=$this->Player_Model->islands[$town->island]->y?>]</td>
                        <td><img src="<?=$this->config->item('style_url')?>skin/resources/icon_<?=resource_icon($this->Player_Model->islands[$town->island]->trade_resource)?>.gif"  title="<?=$this->Data_Model->island_building_by_resource($this->Player_Model->islands[$town->island]->trade_resource)?>" alt="<?=$this->Data_Model->island_building_by_resource($this->Player_Model->islands[$town->island]->trade_resource)?>"></td>
                    </tr>
<?}?>
                </tbody>
            </table>
        </div>
	<div class="footer"></div>
    </div>
<?if($param2 == 'upgrade'){?>
<div class="contentBox01h" id="moveCapitalConfirmation">
    <h3 class="header"><span class="textLabel">Подтвердить</span></h3>
    <div class="content">
        <p>Вы действительно хотите сделать <?=$this->Player_Model->now_town->name?> столицей? Имейте в виду: <ul><li> место жительства губернатора станет новым дворцом.</li><li>Уровень дворца <?=$this->Player_Model->levels[$this->Player_Model->capital_id][10]?> в старой столице <?=$this->Player_Model->towns[$this->Player_Model->capital_id]->name?> будет <strong>полностью разрушен</strong>! Вы <strong>не получите ресурсы</strong>! Затраты на строительство будут потеряны!</li><ul></p>
            <div class="centerButton">
                <a href="<?=$this->config->item('base_url')?>actions/changeCapital/<?=$this->Player_Model->now_town->id?>/" class="button">Подтверждение</a>
            </div>
    </div>
    <div class="footer"></div>
</div>
<?}else{?>
<div class="contentBox01h" id="moveCapital">
    <h3 class="header"><span class="textLabel">Перенести столицу</span></h3>
    <div class="content">
        <p>Вы можете сделать эту колонию <strong>столицей</strong>. Резиденция губернатора  <strong>станет дворцом того же уровня</strong> и город станет столицей империи. Но учтите, что дворец в Вашей прежней столице <strong>будет разрушен</strong> - необходимо построить новую резиденцию губернатора!</p>
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>game/palaceColony/upgrade/" class="button">Сделать этот город столицей</a>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?}?>
</div>
