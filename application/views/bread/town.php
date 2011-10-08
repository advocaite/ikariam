<div id="breadcrumbs">
    <h3><?=$this->lang->line('you_here')?>:</h3>
    <a href="<?=$this->config->item('base_url')?>game/worldmap_iso/" title="<?=$this->lang->line('back_world')?>">
        <img src="<?=$this->config->item('style_url')?>skin/layout/icon-world.gif" alt="<?=$this->lang->line('world')?>">
    </a>
    <span>&nbsp;&gt;&nbsp;</span>
    <a href="<?=$this->config->item('base_url')?>game/island/" title="<?=$this->lang->line('back_island')?>">
        <img src="<?=$this->config->item('style_url')?>skin/layout/icon-island.gif" alt="<?=$this->Player_Model->now_town->name?>"> [<?=$this->Player_Model->now_island->x?>:<?=$this->Player_Model->now_island->y?>]
    </a>
    <span>&nbsp;&gt;&nbsp;</span>
    <a href="<?=$this->config->item('base_url')?>game/city/" class="city" title="<?=$this->lang->line('back_town')?>"><?=$this->Player_Model->now_town->name?></a>
    <span>&nbsp;&gt;&nbsp;</span>
    <span class="building"><?=$caption?></span>
</div>