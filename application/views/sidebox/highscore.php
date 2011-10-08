<div id="highscoreswitch" class="dynamic">
    <h3 class="header"><?=$this->lang->line('top_ally')?></h3>
    <div class="content">
        <img width="203" height="85"src="<?=$this->config->item('style_url')?>skin/layout/sieger_2.jpg">
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>game/allyHighscore/" class="button"><?=$this->lang->line('top_ally')?></a>
        </div>
    </div>
    <div class="footer"></div>
</div>
<div class="dynamic">
    <h3 class="header"><?=$this->lang->line('pillory')?></h3>
    <div class="content">
        <p><?=$this->lang->line('pillory_text')?></p>
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>main/pillory/" target="blank" class="button"><?=$this->lang->line('pillory')?></a>
        </div>
    </div>
    <div class="footer"></div>
</div>