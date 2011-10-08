<div id="breadcrumbs">
    <h3><?=$this->lang->line('you_here')?>:</h3>
    <a href="<?=$this->config->item('base_url')?>game/worldmap_iso/" class="world" title="<?=$this->lang->line('back_world')?>"><?=$this->lang->line('world')?></a>
    <span>&nbsp;&gt;&nbsp;</span>
    <span class="island"><?=$this->Island_Model->island->name?>[<?=$this->Island_Model->island->x?>:<?=$this->Island_Model->island->y?>]</span>
</div>