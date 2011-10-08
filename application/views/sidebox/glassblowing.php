<div id="information" class="dynamic">
    <h3 class="header"><?=$this->lang->line('in_level')?> <?=$this->Player_Model->levels[$this->Player_Model->town_id][18]+1?></h3>
	<div class="content">
        <table width="100%">
            <tr>
    	        <th class="center"><b><?=$this->lang->line('resource')?></b></th>
    	        <th class="center"><b><?=$this->lang->line('bonus')?></b></th>
            </tr>
            <tr>
                <td class="center"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_glass.gif" /></td>
                <td class="center">+<?=($this->Player_Model->levels[$this->Player_Model->town_id][18]+1)*2?>.00%</td>
            </tr>
        </table>
    </div>
    <div class="footer"></div>
</div>