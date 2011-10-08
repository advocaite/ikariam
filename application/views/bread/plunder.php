<?$position = $param1?>
<div id="breadcrumbs">
    <h3><?=$this->lang->line('you_here')?>:</h3>
    <a href="<?=$this->config->item('base_url')?>game/worldmap_iso/" title="<?=$this->lang->line('back_world')?>">
        <img src="<?=$this->config->item('style_url')?>skin/layout/icon-world.gif" alt="<?=$this->lang->line('world')?>">
    </a>
    <span>&nbsp;&gt;&nbsp;</span>
    <a href="<?=$this->config->item('base_url')?>game/island/" class="island" title="<?=$this->lang->line('back_island')?>"><?=$this->Player_Model->now_island->name?>[<?=$this->Player_Model->now_island->x?>:<?=$this->Player_Model->now_island->y?>]</a>
    <span>&nbsp;&gt;&nbsp;</span>
    <span class="city"><?if($position == 0){?><?=$this->lang->line('village')?><?}else{?><?=$this->Data_Model->temp_towns_db[$position]->name?><?}?></span>
</div>
