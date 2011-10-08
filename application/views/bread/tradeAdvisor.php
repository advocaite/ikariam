<div id="breadcrumbs">
    <h3><?=$this->lang->line('you_here')?>:</h3>
    <a href="<?=$this->config->item('base_url')?>game/worldmap_iso/" title="<?=$this->lang->line('back_world')?>">
        <img src="<?=$this->config->item('style_url')?>skin/layout/icon-world.gif" alt="<?=$this->lang->line('world')?>">
    </a>
    <span>&nbsp;&gt;&nbsp;</span>
    <a href="<?=$this->config->item('base_url')?>game/tradeAdvisor/" class="building" title="<?=$this->lang->line('mayor')?>"><?=$this->lang->line('mayor')?></a>
    <span>&nbsp;&gt;&nbsp;</span>
    <span class="building"><?=$caption?></span>
</div>
