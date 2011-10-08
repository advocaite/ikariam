<?
$type_text = 'pos'.$position.'_type';
$level_text = 'pos'.$position.'_level';
if ($this->Player_Model->now_town->$type_text == 6){?>
<?$level = $this->Player_Model->now_town->$level_text?>

    <div id="information" class="dynamic">
     	<h3 class="header"><?=$this->lang->line('safe_capacity_title')?></h3>
	     <div class="content">
	     	<img src="<?=$this->config->item('style_url')?>skin/premium/safecapacity.gif">
	     	<p><?=$this->lang->line('safe_capacity_text')?></p>
	     	<div class="centerButton">
            	<a href="<?=$this->config->item('base_url')?>game/premium/" class="button"><?=$this->lang->line('look_now')?></a>
      		</div>
	     </div>
	     <div class="footer"></div>
     </div>

    <div id="information" class="dynamic">
        <h3 class="header"><?=$this->lang->line('in_level')?> <?=$level+1?></h3>
    	<div class="content">
            <table class="safeinnextlevel">
            <tr>
    	        <th><?=$this->lang->line('resource')?></th>
                <th><?=$this->lang->line('safe')?></th>
                <th><?=$this->lang->line('capacity_min')?></th>
            </tr>
                    <tr>
                    <td class="resource"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wood.gif" title="<?=$this->lang->line('wood')?>" alt="<?=$this->lang->line('wood')?>"></td>
                    <td class="amount">+<?=number_format(($level+1)*80)?></td>
                    <td class="amount">+<?=number_format(($level+1)*8000)?></td>
                </tr>
                    <tr>
                    <td class="resource"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_wine.gif" title="<?=$this->lang->line('wine')?>" alt="<?=$this->lang->line('wine')?>"></td>
                    <td class="amount">+<?=number_format(($level+1)*80)?></td>
                    <td class="amount">+<?=number_format(($level+1)*8000)?></td>
                </tr>
                    <tr>
                    <td class="resource"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_marble.gif" title="<?=$this->lang->line('marble')?>" alt="<?=$this->lang->line('marble')?>"></td>
                    <td class="amount">+<?=number_format(($level+1)*80)?></td>
                    <td class="amount">+<?=number_format(($level+1)*8000)?></td>
                </tr>
                    <tr>
                    <td class="resource"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_glass.gif" title="<?=$this->lang->line('crystal')?>" alt="<?=$this->lang->line('crystal')?>"></td>
                    <td class="amount">+<?=number_format(($level+1)*80)?></td>
                    <td class="amount">+<?=number_format(($level+1)*8000)?></td>
                </tr>
                    <tr>
                    <td class="resource"><img src="<?=$this->config->item('style_url')?>skin/resources/icon_sulfur.gif" title="<?=$this->lang->line('sulfur')?>" alt="<?=$this->lang->line('sulfur')?>"></td>
                    <td class="amount">+<?=number_format(($level+1)*80)?></td>
                    <td class="amount">+<?=number_format(($level+1)*8000)?></td>
                </tr>
                </table>
        </div>
        <div class="footer"></div>
    </div>
<?}?>