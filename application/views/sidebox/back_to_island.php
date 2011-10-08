<div id="backTo" class="dynamic">
    <h3 class="header">Назад</h3>
    <div class="content">
<?if(isset($this->Island_Model)){?>
        <a href="<?=$this->config->item('base_url')?>game/island/<?=$this->Island_Model->island->id?>/" title="Назад к острову">
<?}else{?>
        <a href="<?=$this->config->item('base_url')?>game/island/<?=$param2?>/" title="Назад к острову">            
<?}?>
            <img src="<?=$this->config->item('style_url')?>skin/img/action_back.gif" width="160" height="100">
            <span class="textLabel">&lt;&lt; Назад к острову</span></a>
    </div>
    <div class="footer"></div>
</div>