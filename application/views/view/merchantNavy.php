<?$this->CI =& get_instance()?>
<div id="mainview">
    <div class="buildingDescription">
        <h1><?=$this->lang->line('trade_fleet')?></h1>
        <p><?=$this->lang->line('trade_fleet_text')?></p>
    </div>

    <div class="contentBox">
        <h3 class="header"><?=$this->lang->line('goods_transports')?></h3>
        <div class="content">
<?if(SizeOf($this->Player_Model->missions) > 0){?>

            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th class="transports"><img src="<?=$this->config->item('style_url')?>skin/characters/fleet/40x40/ship_transport_r_40x40.gif" width="40" height="40" title="<?=$this->lang->line('number_ships')?>" alt="<?=$this->lang->line('quantity')?>"></th>
                    <th class="source"><?=$this->lang->line('start')?></th>
                    <th class="mission"><?=$this->lang->line('mission')?></th>
                    <th class="target"><?=$this->lang->line('target')?></th>
                    <th class="ika"><?=$this->lang->line('arrival')?></th>
                    <th class="return"><?=$this->lang->line('return')?></th>
                    <th class="actions"><?=$this->lang->line('actions')?></th>
                </tr>
<?foreach($this->Player_Model->missions as $mission){?>
<?if($mission->user == $this->Player_Model->user->id){?>
<?
    $all_resources = $mission->wood+$mission->wine+$mission->marble+$mission->crystal+$mission->sulfur+$mission->peoples;
    include(APPPATH.'models/mission_data.php');
?>
                <tr>
                    <td class="transports"><?=$mission->ship_transport?></td>
                    <td class="source"><a href="<?=$this->config->item('base_url')?>game/island/<?=$this->Player_Model->towns[$mission->from]->island?>/<?=$this->Player_Model->towns[$mission->from]->id?>/"><?=$this->Player_Model->towns[$mission->from]->name?></a>
                    </td>
                    <td class="mission <?if($mission->return_start > 0){?>returning<?}else{?>gotoown<?}?>"><?=$this->Data_Model->mission_name_by_type($mission->mission_type)?> <?if($mission->return_start == 0){?><?if($mission->mission_start > 0 and $loading_end > 0){?>(<?=$this->lang->line('underway')?>)<?}else{?>(<?=$this->lang->line('loading')?>)<?}?><?}else{?><?if($mission->percent < 1){?>(<?=$this->lang->line('abort')?>)<?}else{?>(<?=$this->lang->line('return')?>)<?}}?></td>
                    <td class="target"><a href="<?=$this->config->item('base_url')?>game/island/<?=$this->Data_Model->temp_towns_db[$mission->to]->island?>/<?=$this->Data_Model->temp_towns_db[$mission->to]->id?>/"><?=$this->Data_Model->temp_towns_db[$mission->to]->name?> <?if($this->Data_Model->temp_towns_db[$mission->to]->user != $this->Player_Model->user->id){?>(<?=$this->Data_Model->temp_users_db[$this->Data_Model->temp_towns_db[$mission->to]->user]->login?>)<?}?>&nbsp;</a></td>

                    <td id="ika<?=$mission->id?>" class="ika">
                        <?if ($mission->mission_start == 0){?>
                            <?=$this->lang->line('loading')?>
                        <?}else{?>
                            <?if($mission_end > 0 and $mission->return_start == 0){?>
                                <?=format_time($mission_end)?>
                            <?}else{?>
                                <?if($mission->return_start == 0){?>
                                    <?=$this->lang->line('loading')?>
                                <?}else{?>
                                    -
                                <?}?>
                            <?}?>
                        <?}?>
                    </td>
                    <td id="ret<?=$mission->id?>" class="return">
                        <?if($mission->mission_start > 0){?>
                            <?if($mission->loading_to_start > 0 and $mission->return_start == 0){?>
                            -
                            <?}else{?>
                                <?if($mission->loading_to_start > 0){?>
                                    <?=format_time($loading_end + $time)?>
                                <?}elseif($mission->mission_start == 0){?>
                                    <?=format_time($return_end)?>
                                <?}?>
                            <?}?>
                        <?}else{?>
                            -
                        <?}?>
                    </td>

                    <td class="actions">
<?if($mission->return_start == 0){?>
                        <a title="<?=$this->lang->line('withdraw')?>" href="<?=$this->config->item('base_url')?>actions/abortFleet/<?=$mission->id?>/0/merchantNavy/">
                            <img src="<?=$this->config->item('style_url')?>skin/advisors/military/icon-back.gif" title="<?=$this->lang->line('withdraw')?>">
                        </a>
<?}else{?>
                        -
<?}?>
                    </td>
                    </tr>
                    <tr>
                        <td class="pulldown" colspan="7">
                            <div class="pulldown">
                                <div class="content">
                                    <table cellpadding="0" cellspacing="0" align="center">
                                        <tr>
                                            <td>
                                                <div class="payload">

                                                    <span class="textLabel"><?=$this->lang->line('cargo')?>:</span>
<?
    $one_percent = ($all_resources > 0) ? 30/$all_resources : 0;
    $wood_icons = ($mission->wood > 0) ? $mission->wood*$one_percent : 0;
    $wine_icons = ($mission->wine > 0) ? $mission->wine*$one_percent : 0;
    $marble_icons = ($mission->marble > 0) ? $mission->marble*$one_percent : 0;
    $crystal_icons = ($mission->crystal > 0) ? $mission->crystal*$one_percent : 0;
    $sulfur_icons = ($mission->sulfur > 0) ? $mission->sulfur*$one_percent : 0;
    $peoples_icons = ($mission->peoples > 0) ? $mission->peoples*$one_percent : 0;
?>
<?if($all_resources == 0){?><?=$this->lang->line('holds_empty')?><?}else{?>
<img src="<?=$this->config->item('style_url')?>skin/img/blank.gif" width="25" height="20">
<?}?>
<?if($wood_icons > 0){?>
<?for ($i = 0; $i < $wood_icons; $i++){?>
<img src="<?=$this->config->item('style_url')?>skin/resources/icon_wood.gif" width="25" height="20" title="<?=number_format($mission->wood)?> <?=$this->lang->line('wood')?>" alt=""  style="margin-left:-17px" >
<?}}?>
<?if($wine_icons > 0){?>
<?for ($i = 0; $i < $wine_icons; $i++){?>
<img src="<?=$this->config->item('style_url')?>skin/resources/icon_wine.gif" width="25" height="20" title="<?=number_format($mission->wine)?> <?=$this->lang->line('wine')?>" alt=""  style="margin-left:-17px" >
<?}}?>
<?if($marble_icons > 0){?>
<?for ($i = 0; $i < $marble_icons; $i++){?>
<img src="<?=$this->config->item('style_url')?>skin/resources/icon_marble.gif" width="25" height="20" title="<?=number_format($mission->marble)?> <?=$this->lang->line('narble')?>" alt=""  style="margin-left:-17px" >
<?}}?>
<?if($crystal_icons > 0){?>
<?for ($i = 0; $i < $crystal_icons; $i++){?>
<img src="<?=$this->config->item('style_url')?>skin/resources/icon_glass.gif" width="25" height="20" title="<?=number_format($mission->crystal)?> <?=$this->lang->line('crystal')?>" alt=""  style="margin-left:-17px" >
<?}}?>
<?if($sulfur_icons > 0){?>
<?for ($i = 0; $i < $sulfur_icons; $i++){?>
<img src="<?=$this->config->item('style_url')?>skin/resources/icon_sulfur.gif" width="25" height="20" title="<?=number_format($mission->sulfur)?> <?=$this->lang->line('sulfur')?>" alt=""  style="margin-left:-17px" >
<?}}?>
<?if($peoples_icons > 0){?>
<?for ($i = 0; $i < $peoples_icons; $i++){?>
<img src="<?=$this->config->item('style_url')?>skin/resources/icon_citizen.gif" width="25" height="20" title="<?=number_format($mission->peoples)?> <?=$this->lang->line('peoples')?>" alt=""  style="margin-left:-17px" >
<?}}?>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="space">
                                                    <img src="<?=$this->config->item('style_url')?>skin/layout/crate.gif" width="22" height="22" alt="<?=$this->lang->line('cargo_space')?>" title="<?=$this->lang->line('cargo_space')?>">
                                                </div> <?=number_format($all_resources)?> / <?=number_format($mission->ship_transport*$this->config->item('transport_capacity'))?>
                                                </td></tr>
                                    </table>
                                </div>
                                <div class="btn"></div>
                            </div>
                        </td>
                    </tr>
<?if($mission->mission_start > 0 and $mission_end > 0 and $mission->return_start == 0){?>
            <script type="text/javascript">
                    getCountdown({
                    enddate: <?=time()+$mission_end?>,
                    currentdate: <?=time()?>,
                    el: "ika<?=$mission->id?>"
		});
            </script>
<?}?>
<?if($mission->return_start > 0){?>
            <script type="text/javascript">
                    getCountdown({
                    enddate: <?=time()+$return_end?>,
                    currentdate: <?=time()?>,
                    el: "ret<?=$mission->id?>"
		});
            </script>
<?}elseif($mission->mission_start > 0){?>
<?if($mission->return_start > 0){?>
            <script type="text/javascript">
                    getCountdown({
                    enddate: <?=time()+$loading_end+$time?>,
                    currentdate: <?=time()?>,
                    el: "ret<?=$mission->id?>"
		});
            </script>
<?}}?>
<?}}?>
            </table>
<?}else{?>
<p align="center"><?=$this->lang->line('no_ships_way')?></p>
<?}?>
        </div>
        <div class="footer"></div>
    </div>
</div>

<script>
Event.onDOMReady( function() {
    var pulldowns = Dom.getElementsByClassName("pulldown", 'div', "mainview");
    for(i=0; i<pulldowns.length; i++) {
				var children = Dom.getChildren(pulldowns[i]);
				children[0].contentHeight=children[0].offsetHeight;
				children[0].style.height='0px';
				children[0].style.position="relative";
				children[0].style.overflow="hidden";
        children[1].onmouseover=function(e) {
					this.style.background="url(<?=$this->config->item('style_url')?>skin/interface/pulldown_contentbox_hover.gif)";
				};
        children[1].onmouseout=function(e) {
					this.style.background="url(<?=$this->config->item('style_url')?>skin/interface/pulldown_contentbox.gif)";
				};
        children[1].onclick=function(e) {
					var pulldown = Dom.getChildren(this.parentNode)[0];
					if(pulldown.offsetHeight>0) pulldown.style.height="0px";
					else pulldown.style.height=pulldown.contentHeight+'px';
				};
    }
});
</script>