<div id="backTo" class="dynamic">
    <h3 class="header"><?=$this->lang->line('army_in_city')?></h3>
    <div class="content">
        <a href="<?=$this->config->item('base_url')?>game/city/" title="<?=$this->lang->line('back_town')?>">
        <img src="<?=$this->config->item('style_url')?>skin/img/action_back.gif" width="160" height="100">
        <span class="textLabel">&lt;&lt; <?=$this->lang->line('back_town')?></span></a>
    </div>
    <div class="footer"></div>
</div>
<?if ($type == 'army'){?>
<div class="dynamic" id="reportInboxLeft">
    <h3 class="header"><?=$this->lang->line('dismiss_units')?></h3>
    <div class="content">
        <img src="<?=$this->config->item('style_url')?>skin/layout/militay-dismissed.jpg" />
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>game/armyGarrisonEdit/" class="button"><?=$this->lang->line('dismiss_units')?></a>
        </div>
    </div>
    <div class="footer"></div>
</div>
<div class="dynamic" id="">
    <h3 class="header"><?=$this->lang->line('building5_name')?></h3>
    <div class="content">
    	<img src="<?=$this->config->item('style_url')?>skin/buildings/y100/barracks.gif" />
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>game/barracks/" class="button"><?=$this->lang->line('to')?> <?=$this->lang->line('building5_name')?></a>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?}else{?>
<div class="dynamic" id="reportInboxLeft"> 
    <h3 class="header"><?=$this->lang->line('dismiss_ships')?></h3>
    <div class="content"> 
        <img src="<?=$this->config->item('style_url')?>skin/layout/flotte_entlassen.jpg" />
        <div class="centerButton"> 
            <a href="<?=$this->config->item('base_url')?>game/fleetGarrisonEdit/" class="button"><?=$this->lang->line('dismiss_ships')?></a>
        </div> 
    </div> 
    <div class="footer"></div> 
</div> 
<div class="dynamic" id=""> 
    <h3 class="header"><?=$this->lang->line('building4_name')?></h3>
    <div class="content"> 
        <img src="<?=$this->config->item('style_url')?>skin/buildings/y100/shipyard.gif" alt="Верфь" />
        <div class="centerButton"> 
            <a href="<?=$this->config->item('base_url')?>game/shipyard/" class="button"><?=$this->lang->line('to')?> <?=$this->lang->line('building4_name')?></a>
        </div> 
    </div> 
    <div class="footer"></div> 
</div> 
<?}?>