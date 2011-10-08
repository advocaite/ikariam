<div class="dynamic">
    <h3 class="header"><?=$this->lang->line('influence')?></h3>
    <div class="content">
        <p><?=$this->lang->line('diplomacy_points')?>: 0</p>
    </div>
    <div class="footer"></div>
</div>
<div class="dynamic" id="viewDiplomacyImperium">
    <h3 class="header"><?=$this->lang->line('diplomacy_overview')?></h3>
    <div class="content">
<?if($this->Player_Model->user->premium_account > 0){?>
                <img src="<?=$this->config->item('style_url')?>skin/research/area_diplomacy.jpg" width="203" height="85" />
    	<p><?=$this->lang->line('diplomacy_overview_text2')?></p>
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>game/premiumDiplomacyAdvisor/" class="button"><?=$this->lang->line('to_overview')?></a>
        </div>
<?}else{?>
		<img src="<?=$this->config->item('style_url')?>skin/premium/sideAd_premiumDiplomacyAdvisor.jpg" width="203" height="85">
    	<p><?=$this->lang->line('diplomacy_overview_text1')?></p>
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>game/premiumDetails/" class="button"><?=$this->lang->line('look_now')?></a>
        </div>
<?}?>
    </div>
    <div class="footer"></div>
</div>
<div class="dynamic" id="islandBoardOverview">
    <h3 class="header"><?=$this->lang->line('board')?></h3>
    <div class="content">
        <ul>
<?foreach($this->Player_Model->islands as $island){?>
<?foreach($this->Player_Model->towns as $town){if($town->island == $island->id){ $town_name = $town->name; } }?>
        <li <?if($island->id == $this->Player_Model->now_town->island){?>class="current"<?}?>><a href="<?=$this->config->item('base_url')?>/game/islandBoard/<?=$island->id?>/"><?=$island->name?> [<?=$town_name?>]</a></li>
<?}?>
        </ul>
    </div>
    <div class="footer"></div>
</div>