<?
    $level_text = 'pos'.$position.'_level';
    $level = $this->Player_Model->now_town->$level_text;
    $speed = $this->Data_Model->speed_by_port_level($level);
?>
<div class="dynamic">
    <h3 class="header"><?=$this->lang->line('transport_capacity')?><a class="help" href="<?=$this->config->item('base_url')?>game/shipDescription/23/" title="<?=$this->lang->line('help')?>"><span class="textLabel"><?=$this->lang->line('help')?>?</span></a></h3>
    <div class="content">
    	<p><?=$this->lang->line('transport_capacity_text')?></p>
        <p><strong><?=$this->lang->line('capacity_ship')?>: </strong><?=number_format($this->config->item('transport_capacity'))?></p>
    </div>
    <div class="footer"></div>
</div>

<div class="dynamic">
    <h3 class="header"><?=$this->lang->line('loading_speed')?></h3>
    <div class="content">
    	<p><?=$this->lang->line('loading_speed_text')?></p>
        <p><strong><?=$this->lang->line('loading_speed')?>:</strong><br> <?=number_format($speed)?> <?=$this->lang->line('goods_min')?></p>
    </div>
    <div class="footer"></div>
</div>