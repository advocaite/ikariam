<div id="mainview">
<div id="bonusBuilding">
<?include_once('building_description.php')?>
<?
    $production = $this->Player_Model->resource_production[$this->Player_Model->town_id]*3600;
    $bonus = ($production/100)*$level*2;
    $summ = $production + $bonus;
?>
    <div class="contentBox01h">
        <div class="buildingPictureImg"><img src="<?=$this->config->item('style_url')?>skin/img/city/small/building_forester.gif" /></div>
        <h3 class="header"><span class="textLabel"><?=$this->lang->line('forester_statistic')?></span></h3>
        <div class="content">
            <table cellspacing="0" cellspacing="0" border="0" style="margin:0 auto 0px;">
                <colgroup><col width="150"/><col width="70"/><col width="%"/></colgroup>
                <tr>
                    <th class='brownHeader' colspan="3"></th>
                </tr>
                <tr>
                    <td class="col1Style">

                        <label><?=$this->lang->line('basic_production')?>: </label>

                    </td>
                    <td class="col2Style">
                        <span title="<?=$this->lang->line('basic_production')?>"><?=number_format($production)?></span>
                    </td>
                    <td class="col3Style">
                        <div class="green" style="width:<?=99-($level*2)?>%" title="100.00%"></div>
                    </td>
                </tr>
                <tr class='alt'>
                    <td class="col1Style">
                        <label><?=$this->lang->line('building16_name')?>: </label>
                    </td>
                    <td class="col2Style">
                        <span title="<?=$this->lang->line('building16_name')?>"><?=number_format($bonus)?></span>
                    </td>
                    <td class="col3Style">
                        <div class="yellow" style="width:<?=($level*2)-1?>%" title="+<?=$level*2?>.00%"></div>
                    </td>
                </tr>
                <tr class="buildingResult">
                    <td class="col1Style">
                        <img src="<?=$this->config->item('style_url')?>skin/layout/sigma.gif"/>
                    </td>
                    <td class="col2Style">
                        <span title="<?=$this->lang->line('total')?>"><b><?=number_format($summ)?></b></span>
                    </td>
                    <td class="col3Style">
                        <div class="green" style="width:99%" title="<?=100+($level*2)?>.00%"></div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="footer"></div>
    	</div>
	</div>
</div>