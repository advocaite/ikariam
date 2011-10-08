<div id="mainview">
    <div class="buildingDescription">
        <h1>Пред. научные достижения</h1>
        <p>Все Ваши предшествующие научные достижения помещены в библиотечный архив. В случае необходимости каждый посетитель сможет ознакомиться с ними.</p>
    </div>

    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel">Ранее исследованные достижения</span></h3>
        <div class="content">
            <h4>Мореходство</h4>
            <ul>
<?for($i = 1; $i <= 14; $i++){?>
<?$research = $this->Data_Model->get_research(1, $i, $this->Player_Model->research)?>
<?$res_text = 'res1_'.$i?>
                <li class="<?if($this->Player_Model->research->$res_text == 0){?>un<?}?>explored">
                    <a href="<?=$this->config->item('base_url')?>game/researchDetail/1/<?=$i?>/" title="<?=$research['name']?>"><?=$research['name']?></a>
                </li>
<?}?>
            </ul>
            <br><hr>
            <h4>Экономика</h4>
            <ul>
<?for($i = 1; $i <= 15; $i++){?>
<?$research = $this->Data_Model->get_research(2, $i, $this->Player_Model->research)?>
<?$res_text = 'res2_'.$i?>
                <li class="<?if($this->Player_Model->research->$res_text == 0){?>un<?}?>explored">
                    <a href="<?=$this->config->item('base_url')?>game/researchDetail/2/<?=$i?>/" title="<?=$research['name']?>"><?=$research['name']?></a>
                </li>
<?}?>
            </ul>
            <br><hr>
            <h4>Наука</h4>
            <ul>
<?for($i = 1; $i <= 16; $i++){?>
<?$research = $this->Data_Model->get_research(3, $i, $this->Player_Model->research)?>
<?$res_text = 'res3_'.$i?>
                <li class="<?if($this->Player_Model->research->$res_text == 0){?>un<?}?>explored">
                    <a href="<?=$this->config->item('base_url')?>game/researchDetail/3/<?=$i?>/" title="<?=$research['name']?>"><?=$research['name']?></a>
                </li>
<?}?>
            </ul>
            <br><hr>
            <h4>Милитаризм</h4>
            <ul>
<?for($i = 1; $i <= 14; $i++){?>
<?$research = $this->Data_Model->get_research(4, $i, $this->Player_Model->research)?>
<?$res_text = 'res4_'.$i?>
                <li class="<?if($this->Player_Model->research->$res_text == 0){?>un<?}?>explored">
                    <a href="<?=$this->config->item('base_url')?>game/researchDetail/4/<?=$i?>/" title="<?=$research['name']?>"><?=$research['name']?></a>
                </li>
<?}?>
            </ul>
						
        </div>
        <div class="footer"></div>
    </div>
</div>