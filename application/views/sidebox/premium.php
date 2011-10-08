<div id="ambrosia" class="dynamic">
    <h3 class="header"><?=$this->lang->line('ambrosy')?></h3>
    <div class="content">
      <div class="ambrosiaCount"><?=$this->Player_Model->user->ambrosy?></div>
      <div><?=$this->lang->line('ambrosy')?></div>
      <div class="centerButton">
          <a href="<?=$this->config->item('base_url')?>game/premiumPayment/" class="button"><?=$this->lang->line('get_ambrosy')?></a>
      </div>
    </div>
    <div class="footer"></div>
</div>

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

<div id="backTo" class="dynamic">
  <h3 class="header"><?=$this->lang->line('back')?></h3>
  <div class="content">
    <a href="<?=$this->config->item('base_url')?>game/city/" title="<?=$this->lang->line('back_town')?>">
      <span class="textLabel">&lt;&lt; <?=$this->lang->line('back_town')?></span>
    </a>
    </div>
  <div class="footer"></div>
</div> 