<div class="dynamic" id="viewCityImperium">
    <h3 class="header"><?=$this->lang->line('constructions_review')?></h3>
    <div class="content">
<?if($this->Player_Model->user->premium_account > 0){?>
                <img src="<?=$this->config->item('style_url')?>skin/research/area_city.jpg" width="203" height="85">
        <p><?=$this->lang->line('constructions_review_text2')?></p>
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>game/premiumTradeAdvisor/" class="button"><?=$this->lang->line('to_view')?></a>
        </div>
<?}else{?>
		<img src="<?=$this->config->item('style_url')?>skin/premium/sideAd_premiumTradeAdvisor.jpg" width="203" height="85">

    	<p><?=$this->lang->line('constructions_review_text1')?></p>
        <div class="centerButton">
          <a href="<?=$this->config->item('base_url')?>game/premiumDetails/" class="button"><?=$this->lang->line('look_now')?></a>
        </div>
<?}?>
    </div>
    <div class="footer"></div>
</div>