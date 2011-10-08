<div class="dynamic" id="">
    <h3 class="header"><?=$this->lang->line('review')?></h3>
    <div class="content">
    	<ul class="researchLeftMenu">
    		<li class="scientists"><?=$this->lang->line('scientists')?>: <?=floor($this->Player_Model->scientists)?></li>
        	<li class="points"><?=$this->lang->line('research_points')?>: <?=floor($this->Player_Model->research->points)?></li>
        	<li class="time"><?=$this->lang->line('per_hour')?>: <?=floor($this->Player_Model->plus_research*$this->Player_Model->scientists)?></li>
        </ul>
    </div>
    <div class="footer"></div>
</div>
<div class="dynamic" id="viewResearchImperium">
    <h3 class="header"><?=$this->lang->line('research_review')?></h3>
    <div class="content">
		<img src="<?=$this->config->item('style_url')?>skin/premium/sideAd_premiumResearchAdvisor.jpg" width="203" height="85">
    	<p><?=$this->lang->line('research_review_text1')?></p>
        <div class="centerButton">
          <a href="<?=$this->config->item('base_url')?>game/premiumDetails/" class="button"><?=$this->lang->line('look_now')?></a>
        </div>
    </div>
    <div class="footer"></div>
</div>
<div id="researchLibrary" class="dynamic">
    <h3 class="header"><?=$this->lang->line('library')?></h3>
    <div class="content">
        <img src="<?=$this->config->item('style_url')?>skin/research/img_library.jpg" width="203" height="85">
        <p><?=$this->lang->line('library_info')?></p>
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>game/researchOverview/" class="button"><?=$this->lang->line('to_library')?></a>
        </div>
    </div>
    <div class="footer"></div>
</div>