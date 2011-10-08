<div id="trader" class="dynamic">
    <h3 class="header"><?=$this->lang->line('premium_trade')?></h3>
    <div class="content">
        <img src="<?=$this->config->item('style_url')?>skin/research/area_economy.jpg" width="203" height="85" />
        <p style="text-align:center;"><?=$this->lang->line('branch_office_text_1')?><br />
        <strong style="font-size:1.2em;"><?=$this->lang->line('branch_office_text_2')?></strong><br />
        <strong style="font-size:1.2em;"><?=$this->lang->line('branch_office_text_3')?></strong></p>
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>game/premiumTrader/" class="button" title="<?=$this->lang->line('to_trader')?>"><?=$this->lang->line('to_trader')?></a>
        </div>
    </div>
    <div class="footer"></div>
</div>

<div class="dynamic">
    <h3 class="header"><?=$this->lang->line('capacity')?> <a class="help" href="<?=$this->config->item('base_url')?>game/buildingDetail/12/" title="<?=$this->lang->line('help')?>"><span class="textLabel"><?=$this->lang->line('need_help')?></span></a></h3>
    <div class="content">
        <p><strong><?=$this->lang->line('now_capacity')?>:</strong> <?=number_format($this->Data_Model->branchOffice_capacity_by_level($this->Player_Model->levels[$this->Player_Model->town_id][12]))?></p>
    </div>
    <div class="footer"></div>
</div>