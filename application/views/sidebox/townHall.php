<?if($this->Player_Model->town_id != $this->Player_Model->capital_id){?>
<div class="dynamic" id="abandon">
    <h3 class="header"><?=$this->lang->line('abolish_colony')?></h3>
    <div class="content">
        <p><?=$this->lang->line('abolish_text')?></p>
        <a href="<?=$this->config->item('base_url')?>game/abolishColony/" class="button"><?=$this->lang->line('abolish_colony')?></a>
    </div>
    <div class="footer"></div>
</div>
<?}?>