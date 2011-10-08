<?$position = $param1?>
<?switch($position){?>
<?case 1:?>
<div id="mainview">
    <div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information1_1')?></h1>
        <h2><?=$this->lang->line('information1_2')?></h2>
        <img src="<?=$this->config->item('style_url')?>skin/img/informations/scr_build_landside.gif">&nbsp;&nbsp;
        <div class="content"><?=$this->lang->line('information1_3')?></div>
        <img src="<?=$this->config->item('style_url')?>skin/img/informations/scr_sawmill_100x81.gif">&nbsp;&nbsp;
        <h2><?=$this->lang->line('information1_4')?></h2>
        <div class="content"><?=$this->lang->line('information1_5')?></div>
        <h2><?=$this->lang->line('information1_6')?></h2>
        <div class="content"><?=$this->lang->line('information1_7')?></div>
        <h2><?=$this->lang->line('information1_8')?></h2>
        <div class="content"><?=$this->lang->line('information1_9')?></div>
        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left"></td>
                    <td width="50%" align="right">
                        <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information2_1')?>" href="<?=$this->config->item('base_url')?>game/informations/2/"><?=$this->lang->line('information2_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 2:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information2_1')?></h1>
        <h2><?=$this->lang->line('information2_2')?></h2>
        <img src="<?=$this->config->item('style_url')?>skin/img/city/building_port.gif">&nbsp;&nbsp;
        <div class="content"><?=$this->lang->line('information2_3')?></div>
        <div class="content"><?=$this->lang->line('information2_4')?></div>
        <h2><?=$this->lang->line('information2_5')?></h2>
        <img src="<?=$this->config->item('style_url')?>skin/img/city/building_academy.gif">&nbsp;&nbsp;
        <div class="content"><?=$this->lang->line('information2_6')?></div>
        <h2><?=$this->lang->line('information2_7')?></h2>
        <div class="content"><?=$this->lang->line('information2_8')?></div>
        <h2><?=$this->lang->line('information2_9')?></h2>
        <img src="<?=$this->config->item('style_url')?>skin/img/city/building_barracks.gif">&nbsp;&nbsp;
        <div class="content"><?=$this->lang->line('information2_10')?></div>
        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information1_1')?>" href="<?=$this->config->item('base_url')?>game/informations/1/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information1_1')?></a></td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information3_1')?>" href="<?=$this->config->item('base_url')?>game/informations/3/"><?=$this->lang->line('information3_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 3:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information3_1')?></h1>
<h2><?=$this->lang->line('information3_2')?></h2><img src="<?=$this->config->item('style_url')?>skin/img/city/building_shipyard.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information3_3')?></div><h2><?=$this->lang->line('information3_4')?></h2><div class="content"><?=$this->lang->line('information3_5')?></div><h2><?=$this->lang->line('information3_6')?></h2><div class="content"><?=$this->lang->line('information3_7')?></div><h2><?=$this->lang->line('information3_8')?></h2><div class="content"><?=$this->lang->line('information3_9')?></div><h2><?=$this->lang->line('information3_10')?></h2><div class="content"><?=$this->lang->line('information3_11')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information2_1')?>" href="<?=$this->config->item('base_url')?>game/informations/2/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information2_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information4_1')?>" href="<?=$this->config->item('base_url')?>game/informations/4/"><?=$this->lang->line('information4_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 4:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information4_1')?></h1>
<h2><?=$this->lang->line('information4_2')?></h2><div class="content"><?=$this->lang->line('information4_3')?></div><h2><?=$this->lang->line('information4_4')?></h2><div class="content"><?=$this->lang->line('information4_5')?></div><img src="<?=$this->config->item('style_url')?>skin/img/informations/scr_finances.gif">&nbsp;&nbsp;<h2><?=$this->lang->line('information4_6')?></h2><img src="<?=$this->config->item('style_url')?>skin/img/city/building_palace.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information4_7')?></div><h2><?=$this->lang->line('information4_8')?></h2><img src="<?=$this->config->item('style_url')?>skin/img/city/building_embassy.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information4_9')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information3_1')?>" href="<?=$this->config->item('base_url')?>game/informations/3/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information3_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information5_1')?>" href="<?=$this->config->item('base_url')?>game/informations/5/"><?=$this->lang->line('information5_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break?>
<?case 5:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information5_1')?></h1>
<div class="content"><?=$this->lang->line('information5_2')?></div><div class="hint"><?=$this->lang->line('information5_3')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information4_1')?>" href="<?=$this->config->item('base_url')?>game/informations/4/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information4_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information6_1')?>" href="<?=$this->config->item('base_url')?>game/informations/6/"><?=$this->lang->line('information6_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 6:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information6_1')?></h1>
<div class="content"><?=$this->lang->line('information6_2')?></div><img src="<?=$this->config->item('style_url')?>skin/img/informations/scr_sawmill_100x81.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information6_3')?></div><div class="hint"><?=$this->lang->line('information6_4')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information5_1')?>" href="<?=$this->config->item('base_url')?>game/informations/5/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information5_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information7_1')?>" href="<?=$this->config->item('base_url')?>game/informations/7/"><?=$this->lang->line('information7_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 7:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information7_1')?></h1>
<div class="content"><?=$this->lang->line('information7_2')?></div><div class="content"><?=$this->lang->line('information7_3')?></div><img src="<?=$this->config->item('style_url')?>skin/img/informations/scr_build_landside.gif">&nbsp;&nbsp;<img src="<?=$this->config->item('style_url')?>skin/img/informations/scr_build_seaside.gif">&nbsp;&nbsp;<img src="<?=$this->config->item('style_url')?>skin/img/informations/scr_build_wall.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information7_4')?></div><div class="content"><?=$this->lang->line('information7_5')?></div><div class="hint"><?=$this->lang->line('information7_6')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information6_1')?>" href="<?=$this->config->item('base_url')?>game/informations/6/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information6_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information8_1')?>" href="<?=$this->config->item('base_url')?>game/informations/8/"><?=$this->lang->line('information8_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 8:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information8_1')?></h1>
<img src="<?=$this->config->item('style_url')?>skin/img/city/building_academy.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information8_2')?></div><div class="content"><?=$this->lang->line('information8_3')?></div><div class="list">
                <ul>
                                    <li><?=$this->lang->line('information8_4')?></li>
                                    <li><?=$this->lang->line('information8_5')?></li>
                                    <li><?=$this->lang->line('information8_6')?></li>
                                    <li><?=$this->lang->line('information8_7')?></li>
                                </ul>
            </div><div class="hint"><?=$this->lang->line('information8_8')?></div><div class="hint"><?=$this->lang->line('information8_9')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information7_1')?>" href="<?=$this->config->item('base_url')?>game/informations/7/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information7_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information9_1')?>" href="<?=$this->config->item('base_url')?>game/informations/9/"><?=$this->lang->line('information9_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 9:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information9_1')?></h1>
<img src="<?=$this->config->item('style_url')?>skin/img/city/building_port.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information9_2')?></div><div class="content"><?=$this->lang->line('information9_3')?></div><div class="content"><?=$this->lang->line('information9_4')?></div><div class="content"><?=$this->lang->line('information9_5')?></div><div class="hint"><?=$this->lang->line('information9_6')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information8_1')?>" href="<?=$this->config->item('base_url')?>game/informations/8/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information8_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information10_1')?>" href="<?=$this->config->item('base_url')?>game/informations/10/"><?=$this->lang->line('information10_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 10:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information10_1')?></h1>
<img src="<?=$this->config->item('style_url')?>skin/img/city/building_barracks.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information10_2')?></div><div class="content"><?=$this->lang->line('information10_3')?></div><div class="list">
                <ul>
                                    <li><?=$this->lang->line('information10_4')?></li>
                                    <li><?=$this->lang->line('information10_5')?></li>
                                    <li><?=$this->lang->line('information10_6')?></li>
                                </ul>
            </div><div class="content"><?=$this->lang->line('information10_7')?></div><div class="content"><?=$this->lang->line('information10_8')?></div><div class="hint"><?=$this->lang->line('information10_9')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information9_1')?>" href="<?=$this->config->item('base_url')?>game/informations/9/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information9_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information11_1')?>" href="<?=$this->config->item('base_url')?>game/informations/11/"><?=$this->lang->line('information11_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 11:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information11_1')?></h1>
<img src="<?=$this->config->item('style_url')?>skin/img/island/noobschutz.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information11_2')?></br><?=$this->lang->line('information11_3')?></br><ul><li><?=$this->lang->line('information11_4')?></li><li><?=$this->lang->line('information11_5')?></li><li><?=$this->lang->line('information11_6')?></li><li><?=$this->lang->line('information11_7')?></li></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information10_1')?>" href="<?=$this->config->item('base_url')?>game/informations/10/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information10_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information12_1')?>" href="<?=$this->config->item('base_url')?>game/informations/12/"><?=$this->lang->line('information12_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 12:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information12_1')?></h1>
<div class="content"><?=$this->lang->line('information12_2')?></div><div style="width:84px; height:18px;overflow:hidden;margin-bottom:5px;background-image:url(<?=$this->config->item('style_url')?>skin/layout/btn_world.jpg);padding-top:36px;color:#542C0F;font-size:10px;text-align:center;"><?=$this->lang->line('button_world_name')?></div><div class="content"><?=$this->lang->line('information12_3')?></div><div style="width:84px; height:18px;overflow:hidden;margin-bottom:5px;background-image:url(<?=$this->config->item('style_url')?>skin/layout/btn_island.jpg);padding-top:36px;color:#542C0F;font-size:10px;text-align:center;"><?=$this->lang->line('button_island_name')?></div><div class="content"><?=$this->lang->line('information12_4')?></div><div class="hint"><?=$this->lang->line('information12_5')?></div><div class="hint"><?=$this->lang->line('information12_6')?></div><div class="hint"><?=$this->lang->line('information12_7')?></div><div class="hint"><?=$this->lang->line('information12_8')?></div><div style="width:84px; height:18px;overflow:hidden;margin-bottom:5px;background-image:url(<?=$this->config->item('style_url')?>skin/img/informations/scr_gotocity.gif);padding-top:38px;color:#542C0F;font-size:10px;text-align:center;"><?=$this->lang->line('button_town_name')?></div><div class="content"><?=$this->lang->line('information12_9')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information11_1')?>" href="<?=$this->config->item('base_url')?>game/informations/11/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information11_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information13_1')?>" href="<?=$this->config->item('base_url')?>game/informations/13/"><?=$this->lang->line('information13_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 13:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information13_1')?></h1>
<img src="<?=$this->config->item('style_url')?>skin/img/city/building_townhall.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information13_2')?></div><img src="<?=$this->config->item('style_url')?>skin/img/city/building_tavern.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information13_3')?></div><div class="hint"><?=$this->lang->line('information13_4')?></div><img src="<?=$this->config->item('style_url')?>skin/img/city/building_museum.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information13_5')?></div><div class="hint"><?=$this->lang->line('information13_6')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information12_1')?>" href="<?=$this->config->item('base_url')?>game/informations/12/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information12_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information14_1')?>" href="<?=$this->config->item('base_url')?>game/informations/14/"><?=$this->lang->line('information14_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 14:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information14_1')?></h1>
<img src="<?=$this->config->item('style_url')?>skin/img/informations/scr_finances.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information14_2')?></div><div class="list">
                <ul>
                                    <li><?=$this->lang->line('information14_3')?></li>
                                    <li><?=$this->lang->line('information14_4')?></li>
                                    <li><?=$this->lang->line('information14_5')?></li>
                                    <li><?=$this->lang->line('information14_6')?></li>
                                    <li><?=$this->lang->line('information14_7')?></li>
                                </ul>
            </div><div class="content"><?=$this->lang->line('information14_8')?></div><div class="content"><?=$this->lang->line('information14_9')?></div><div class="content"><?=$this->lang->line('information14_10')?></div><h2><?=$this->lang->line('information14_11')?></h2><img src="<?=$this->config->item('style_url')?>skin/img/informations/scr_merchantnavy.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information14_12')?></div><div class="hint"><?=$this->lang->line('information14_13')?></div><h2><?=$this->lang->line('information14_14')?></h2><img src="<?=$this->config->item('style_url')?>skin/img/informations/scr_premium.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information14_15')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information13_1')?>" href="<?=$this->config->item('base_url')?>game/informations/13/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information13_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information15_1')?>" href="<?=$this->config->item('base_url')?>game/informations/15/"><?=$this->lang->line('information15_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 15:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information15_1')?></h1>
<div class="content"><?=$this->lang->line('information15_2')?></div><div class="list">
                <ul>
                                    <li><?=$this->lang->line('information15_3')?></li>
                                    <li><?=$this->lang->line('information15_4')?></li>
                                    <li><?=$this->lang->line('information15_5')?></li>
                                    <li><?=$this->lang->line('information15_6')?></li>
                                </ul>
            </div><img src="<?=$this->config->item('style_url')?>skin/img/informations/scr_sawmill_100x81.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information15_7')?></div><div class="content"><?=$this->lang->line('information15_8')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information14_1')?>" href="<?=$this->config->item('base_url')?>game/informations/14/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information14_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information16_1')?>" href="<?=$this->config->item('base_url')?>game/informations/16/"><?=$this->lang->line('information16_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 16:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information16_1')?></h1>
<div class="content"><?=$this->lang->line('information16_2')?></div><div class="list">
                <ul>
                                    <li><?=$this->lang->line('information16_3')?></li>
                                    <li><?=$this->lang->line('information16_4')?></li>
                                    <li><?=$this->lang->line('information16_5')?></li>
                                    <li><?=$this->lang->line('information16_6')?></li>
                                </ul>
            </div><div class="content"><?=$this->lang->line('information16_7')?></div><div class="content"><?=$this->lang->line('information16_8')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information15_1')?>" href="<?=$this->config->item('base_url')?>game/informations/15/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information15_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information27_1')?>" href="<?=$this->config->item('base_url')?>game/informations/27/"><?=$this->lang->line('information27_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 27:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information27_1')?></h1>
<div class="contentWithImage" style="display:table"><img style="float:right;" alt ="" src="<?=$this->config->item('style_url')?>skin/research/area_military.jpg"><?=$this->lang->line('information27_2')?></div><h2><?=$this->lang->line('information27_3')?></h2><div class="content"><?=$this->lang->line('information27_4')?></div><div class="content"><?=$this->lang->line('information27_5')?><br/><ul><li><?=$this->lang->line('information27_6')?></li><li><?=$this->lang->line('information27_7')?></li><li><?=$this->lang->line('information27_8')?></li><li><?=$this->lang->line('information27_9')?></li></ul></div><h2><?=$this->lang->line('information27_10')?></h2><div class="content"></div><?=$this->lang->line('information27_11')?><div class="content"><?=$this->lang->line('information27_12')?></div><div class="content"><?=$this->lang->line('information27_13')?></div><div class="content"><?=$this->lang->line('information27_14')?></div><h2><?=$this->lang->line('information27_15')?></h2><div class="list">
                <ul>
                                    <li><?=$this->lang->line('information27_16')?></li>
                                    <li><?=$this->lang->line('information27_17')?></li>
                                    <li><?=$this->lang->line('information27_18')?></li>
                                </ul>
            </div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information16_1')?>" href="<?=$this->config->item('base_url')?>game/informations/26/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information16_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information28_1')?>" href="<?=$this->config->item('base_url')?>game/informations/28/"><?=$this->lang->line('information28_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 28:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information28_1')?></h1>
<h2><?=$this->lang->line('information28_2')?></i></h2><div class="content"><?=$this->lang->line('information28_3')?></div><div class="listHeaderContentImage">
                <ul>
                                    <li><div style="display:table"><h2><?=$this->lang->line('information28_4')?></h2><p><img align="right" alt ="" src="<?=$this->config->item('style_url')?>skin/characters/military/120x100/phalanx_r_120x100.gif"><?=$this->lang->line('information28_5')?></p></div></li>
                                    <li><div style="display:table"><h2><?=$this->lang->line('information28_6')?></h2><p><img align="right" alt ="" src="<?=$this->config->item('style_url')?>skin/characters/military/120x100/swordsman_r_120x100.gif"><?=$this->lang->line('information28_7')?></p></div></li>
                                    <li><div style="display:table"><h2><?=$this->lang->line('information28_8')?></h2><p><img align="right" alt ="" src="<?=$this->config->item('style_url')?>skin/characters/military/120x100/archer_r_120x100.gif"><?=$this->lang->line('information28_9')?></p></div></li>
                                    <li><div style="display:table"><h2><?=$this->lang->line('information28_10')?></h2><p><img align="right" alt ="" src="<?=$this->config->item('style_url')?>skin/characters/military/120x100/catapult_r_120x100.gif"><?=$this->lang->line('information28_11')?></p></div></li>
                                    <li><div style="display:table"><h2><?=$this->lang->line('information28_12')?></h2><p><img align="right" alt ="" src="<?=$this->config->item('style_url')?>skin/characters/military/120x100/bombardier_r_120x100.gif"><?=$this->lang->line('information28_13')?></p></div></li>
                                    <li><div style="display:table"><h2><?=$this->lang->line('information28_14')?></h2><p><img align="right" alt ="" src="<?=$this->config->item('style_url')?>skin/characters/military/120x100/gyrocopter_r_120x100.gif"><?=$this->lang->line('information28_15')?></p></div></li>
                                    <li><div style="display:table"><h2><?=$this->lang->line('information28_16')?></h2><p><img align="right" alt ="" src="<?=$this->config->item('style_url')?>skin/characters/military/120x100/medic_r_120x100.gif"><?=$this->lang->line('information28_17')?></p></div></li>
                                    <li><div style="display:table"><h2><?=$this->lang->line('information28_18')?></h2><p><img align="right" alt ="" src="<?=$this->config->item('style_url')?>skin/characters/military/120x100/wall_r_120x100.gif"><?=$this->lang->line('information28_19')?><br/><?=$this->lang->line('information28_20')?></p></div></li>
                                </ul>
            </div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information27_1')?>" href="<?=$this->config->item('base_url')?>game/informations/27/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information27_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information29_1')?>" href="<?=$this->config->item('base_url')?>game/informations/29/"><?=$this->lang->line('information29_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 29:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information29_1')?></h1>
<img src="<?=$this->config->item('style_url')?>skin/ikipedia/openbattle.gif">&nbsp;&nbsp;<div class="listHeaderSubList">
                <ul>
                    <li><h2><?=$this->lang->line('information29_2')?></h2>
                    <ul>                    	<li><p><?=$this->lang->line('information29_3')?></p></li>
                                            	<li><p><?=$this->lang->line('information29_4')?></p></li>
                                            	<li><p><?=$this->lang->line('information29_5')?></p></li>
                                            </ul>
                    </li>
                </ul>
            </div><div class="listHeaderSubList">
                <ul>
                    <li><h2><?=$this->lang->line('information29_6')?></h2>
                    <ul>                    	<li><p><?=$this->lang->line('information29_7')?></p></li>
                                            	<li><p><?=$this->lang->line('information29_7')?></p></li>
                                            	<li><p><?=$this->lang->line('information29_8')?></p></li>
                                            </ul>
                    </li>
                </ul>
            </div><div class="listHeaderSubList">
                <ul>
                    <li><h2><?=$this->lang->line('information29_10')?></h2>
                    <ul>                    	<li><p><?=$this->lang->line('information29_11')?></p></li>
                                            	<li><p><?=$this->lang->line('information29_12')?></p></li>
                                            	<li><p><?=$this->lang->line('information29_13')?></p></li>
                                            </ul>
                    </li>
                </ul>
            </div><div class="listHeaderSubList">
                <ul>
                    <li><h2><?=$this->lang->line('information29_14')?></h2>
                    <ul>                    	<li><p><?=$this->lang->line('information29_15')?></p></li>
                                            	<li><p><?=$this->lang->line('information29_16')?></p></li>
                                            	<li><p><?=$this->lang->line('information29_17')?></p></li>
                                            </ul>
                    </li>
                </ul>
            </div><div class="listHeaderSubList">
                <ul>
                    <li><h2><?=$this->lang->line('information29_18')?></h2>
                    <ul>                    	<li><p><?=$this->lang->line('information29_19')?><br> <ul> <li><?=$this->lang->line('information29_20')?></li> <li><?=$this->lang->line('information29_21')?></li> </ul></p></li>
                                            	<li><p><?=$this->lang->line('information29_22')?></p></li>
                                            	<li><p><?=$this->lang->line('information29_23')?></p></li>
                                            </ul>
                    </li>
                </ul>
            </div><div class="listHeaderSubList">
                <ul>
                    <li><h2><?=$this->lang->line('information29_24')?></h2>
                    <ul>                    	<li><p><?=$this->lang->line('information29_25')?></p></li>
                                            	<li><p><?=$this->lang->line('information29_26')?></p></li>
                                            	<li><p><?=$this->lang->line('information29_27')?></p></li>
                                            </ul>
                    </li>
                </ul>
            </div><div class="listHeaderSubList">
                <ul>
                    <li><h2><?=$this->lang->line('information29_28')?></h2>
                    <ul>                    	<li><p><?=$this->lang->line('information29_29')?></p></li>
                                            	<li><p><?=$this->lang->line('information29_30')?></p></li>
                                            	<li><p><?=$this->lang->line('information29_31')?></p></li>
                                            </ul>
                    </li>
                </ul>
            </div><div class="listHeaderSubList">
                <ul>
                    <li><h2><?=$this->lang->line('information29_32')?></h2>
                    <ul>                    	<li><p><?=$this->lang->line('information29_33')?></p></li>
                                            </ul>
                    </li>
                </ul>
            </div><div class="content"><?=$this->lang->line('information29_34')?><br/><ul><li><?=$this->lang->line('information29_35')?></li><li><?=$this->lang->line('information29_36')?></li><li><?=$this->lang->line('information29_37')?></li><li><?=$this->lang->line('information29_38')?></li><li><?=$this->lang->line('information29_39')?></li><li><?=$this->lang->line('information29_40')?></li></ul></div><div class="content"><?=$this->lang->line('information29_41')?><br/><ul><li><?=$this->lang->line('information29_42')?></li><li><?=$this->lang->line('information29_43')?></li><li><?=$this->lang->line('information29_44')?></li><li><?=$this->lang->line('information29_45')?></li><li><?=$this->lang->line('information29_46')?></li><li><?=$this->lang->line('information29_47')?></li></ul></div><div class="content"><?=$this->lang->line('information29_48')?></div><img src="<?=$this->config->item('style_url')?>skin/ikipedia/cityfight_small.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information29_49')?></div><img src="<?=$this->config->item('style_url')?>skin/ikipedia/cityfight_medium.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information29_50')?></div><img src="<?=$this->config->item('style_url')?>skin/ikipedia/cityfight_big.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information29_51')?></div><img src="<?=$this->config->item('style_url')?>skin/ikipedia/openfight.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information29_52')?></div><img src="<?=$this->config->item('style_url')?>skin/ikipedia/seafight.gif">&nbsp;&nbsp;        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information28_1')?>" href="<?=$this->config->item('base_url')?>game/informations/28/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information28_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information30_1')?>" href="<?=$this->config->item('base_url')?>game/informations/30/"><?=$this->lang->line('information30_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 30:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information30_1')?></h1>
<div class="content"><?=$this->lang->line('information30_2')?></div><div class="content"><?=$this->lang->line('information30_3')?></div><h2><?=$this->lang->line('information30_4')?></h2><div class="content"><?=$this->lang->line('information30_5')?></div><h2><?=$this->lang->line('information30_6')?></h2><div class="content"><?=$this->lang->line('information30_7')?></div><h2><?=$this->lang->line('information30_8')?></h2><div class="content"><?=$this->lang->line('information30_9')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information29_1')?>" href="<?=$this->config->item('base_url')?>game/informations/29/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information29_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information31_1')?>" href="<?=$this->config->item('base_url')?>game/informations/31/"><?=$this->lang->line('information31_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 31:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information31_1')?></h1>
<div class="content"><?=$this->lang->line('information31_2')?></div><div class="content"><?=$this->lang->line('information31_3')?><br/> <ul> <li><?=$this->lang->line('information31_4')?></li> <li><?=$this->lang->line('information31_5')?></li> <li><?=$this->lang->line('information31_6')?></li> <li><?=$this->lang->line('information31_7')?></li> <li><?=$this->lang->line('information31_8')?></li> <li><?=$this->lang->line('information31_9')?></li> <li><?=$this->lang->line('information31_10')?></li> <li><?=$this->lang->line('information31_11')?></li> </ul></div><div class="content"><?=$this->lang->line('information31_12')?><br/><ul><li><?=$this->lang->line('information31_13')?></li><li><?=$this->lang->line('information31_14')?></li></ul></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information30_1')?>" href="<?=$this->config->item('base_url')?>game/informations/30/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information30_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information32_1')?>" href="<?=$this->config->item('base_url')?>game/informations/32/"><?=$this->lang->line('information32_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 32:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information32_1')?></h1>
<div class="hint"><?=$this->lang->line('information32_2')?></div><div class="hint"><?=$this->lang->line('information32_3')?></div><div class="hint"><?=$this->lang->line('information32_4')?></div><div class="hint"><?=$this->lang->line('information32_5')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information31_1')?>" href="<?=$this->config->item('base_url')?>game/informations/31/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information31_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information33_1')?>" href="<?=$this->config->item('base_url')?>game/informations/33/"><?=$this->lang->line('information33_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 33:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information33_1')?></h1>
<div class="content"><?=$this->lang->line('information33_2')?></div><div class="content"><?=$this->lang->line('information33_3')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information32_1')?>" href="<?=$this->config->item('base_url')?>game/informations/32/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information32_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information34_1')?>" href="<?=$this->config->item('base_url')?>game/informations/34/"><?=$this->lang->line('information34_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 34:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information34_1')?></h1>
<div class="content"><?=$this->lang->line('information34_2')?></div><div class="list">
                <ul>
                                    <li><?=$this->lang->line('information34_3')?></li>
                                    <li><?=$this->lang->line('information34_4')?></li>
                                </ul>
            </div><div class="content"><?=$this->lang->line('information34_5')?></div><div class="content"><?=$this->lang->line('information34_6')?></div><div class="content"><?=$this->lang->line('information34_7')?></div><div class="content"><?=$this->lang->line('information34_8')?></div><div class="content"><?=$this->lang->line('information34_9')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information33_1')?>" href="<?=$this->config->item('base_url')?>game/informations/33/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information33_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information35_1')?>" href="<?=$this->config->item('base_url')?>game/informations/35/"><?=$this->lang->line('information35_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 35:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information35_1')?></h1>
<img src="<?=$this->config->item('style_url')?>skin/img/city/building_safehouse.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information35_2')?></div><div class="content"><?=$this->lang->line('information35_3')?></div><div class="content"><?=$this->lang->line('information35_4')?></div><div class="list">
                <ul>
                                    <li><?=$this->lang->line('information35_5')?></li>
                                    <li><?=$this->lang->line('information35_6')?></li>
                                    <li><?=$this->lang->line('information35_7')?></li>
                                    <li><?=$this->lang->line('information35_8')?></li>
                                    <li><?=$this->lang->line('information35_9')?></li>
                                    <li><?=$this->lang->line('information35_10')?></li>
                                    <li><?=$this->lang->line('information35_11')?></li>
                                    <li><?=$this->lang->line('information35_12')?></li>
                                </ul>
            </div><img src="<?=$this->config->item('style_url')?>skin/characters/spy_espionage.gif">&nbsp;&nbsp;<div class="content"><?=$this->lang->line('information35_13')?></div><div class="content"><?=$this->lang->line('information35_14')?></div><div class="list">
                <ul>
                                    <li><?=$this->lang->line('information35_15')?></li>
                                    <li><?=$this->lang->line('information35_16')?></li>
                                    <li><?=$this->lang->line('information35_17')?></li>
                                    <li><?=$this->lang->line('information35_18')?></li>
                                    <li><?=$this->lang->line('information35_19')?></li>
                                    <li><?=$this->lang->line('information35_20')?></li>
                                </ul>
            </div><div class="hint"><?=$this->lang->line('information35_21')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information34_1')?>" href="<?=$this->config->item('base_url')?>game/informations/34/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information34_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information36_1')?>" href="<?=$this->config->item('base_url')?>game/informations/36/"><?=$this->lang->line('information36_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 36:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information36_1')?></h1>
<img src="<?=$this->config->item('style_url')?>skin/img/city/building_embassy.gif">&nbsp;&nbsp;<h2><?=$this->lang->line('information36_2')?></h2><div class="content"><?=$this->lang->line('information36_3')?></div><div class="hint"><?=$this->lang->line('information36_4')?></div><div class="content"><?=$this->lang->line('information36_5')?></div><div class="hint"><?=$this->lang->line('information36_6')?></div><div class="hint"><?=$this->lang->line('information36_7')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information35_1')?>" href="<?=$this->config->item('base_url')?>game/informations/35/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information35_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information37_1')?>" href="<?=$this->config->item('base_url')?>game/informations/37/"><?=$this->lang->line('information37_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 37:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information37_1')?></h1>
<div class="content"><?=$this->lang->line('information37_2')?></div><h2><?=$this->lang->line('information37_3')?></h2><div class="content"><?=$this->lang->line('information37_4')?></div><div class="hint"><?=$this->lang->line('information37_5')?></div><h2><?=$this->lang->line('information37_6')?></h2><div class="content"><?=$this->lang->line('information37_7')?></div><div class="hint"><?=$this->lang->line('information37_8')?></div><h2><?=$this->lang->line('information37_9')?></h2><div class="content"><?=$this->lang->line('information37_10')?></div><div class="hint"><?=$this->lang->line('information37_11')?></div><div class="hint"><?=$this->lang->line('information37_12')?></div><div class="hint"><?=$this->lang->line('information37_13')?></div><h2><?=$this->lang->line('information37_14')?></h2><div class="content"><?=$this->lang->line('information37_15')?></div><div class="hint"><?=$this->lang->line('information37_16')?></div><div class="hint"><?=$this->lang->line('information37_17')?></div><div class="hint"><?=$this->lang->line('information37_18')?></div><h2><?=$this->lang->line('information37_19')?></h2><div class="content"><?=$this->lang->line('information37_20')?></div><div class="hint"><?=$this->lang->line('information37_21')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information36_1')?>" href="<?=$this->config->item('base_url')?>game/informations/36/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information36_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information38_1')?>" href="<?=$this->config->item('base_url')?>game/informations/38/"><?=$this->lang->line('information38_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 38:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information38_1')?></h1>
<div class="content"><?=$this->lang->line('information38_2')?></div><div class="content"><?=$this->lang->line('information38_3')?></div><div class="content"><?=$this->lang->line('information38_4')?></div><div class="hint"><?=$this->lang->line('information38_5')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information37_1')?>" href="<?=$this->config->item('base_url')?>game/informations/37/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information37_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information39_1')?>" href="<?=$this->config->item('base_url')?>game/informations/39/"><?=$this->lang->line('information39_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 39:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information39_1')?></h1>
<div class="content"><?=$this->lang->line('information39_2')?></div><h2><?=$this->lang->line('information39_3')?></h2><div class="list">
                <ul>
                                    <li><?=$this->lang->line('information39_4')?></li>
                                    <li><?=$this->lang->line('information39_5')?></li>
                                    <li><?=$this->lang->line('information39_6')?></li>
                                    <li><?=$this->lang->line('information39_7')?></li>
                                    <li><?=$this->lang->line('information39_8')?></li>
                                </ul>
            </div><div class="hint"><?=$this->lang->line('information39_9')?></div><h2><?=$this->lang->line('information39_10')?></h2><div class="list">
                <ul>
                                    <li><?=$this->lang->line('information39_11')?></li>
                                    <li><?=$this->lang->line('information39_12')?></li>
                                    <li><?=$this->lang->line('information39_13')?></li>
                                    <li><?=$this->lang->line('information39_14')?></li>
                                </ul>
            </div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information38_1')?>" href="<?=$this->config->item('base_url')?>game/informations/38/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information38_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information40_1')?>" href="<?=$this->config->item('base_url')?>game/informations/40/"><?=$this->lang->line('information40_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 40:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information40_1')?></h1>
<h2><?=$this->lang->line('information40_2')?></h2><div class="list">
                <ul>
                                    <li><?=$this->lang->line('information40_3')?></li>
                                    <li><?=$this->lang->line('information40_4')?></li>
                                    <li><?=$this->lang->line('information40_5')?></li>
                                </ul>
            </div><h2><?=$this->lang->line('information40_6')?></h2><div class="list">
                <ul>
                                    <li><?=$this->lang->line('information40_7')?></li>
                                    <li><?=$this->lang->line('information40_8')?></li>
                                    <li><?=$this->lang->line('information40_9')?></li>
                                    <li><?=$this->lang->line('information40_10')?></li>
                                </ul>
            </div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information39_1')?>" href="<?=$this->config->item('base_url')?>game/informations/39/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information39_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information41_1')?>" href="<?=$this->config->item('base_url')?>game/informations/41/"><?=$this->lang->line('information41_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 41:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information41_1')?></h1>
<div class="content"><?=$this->lang->line('information41_2')?><br/><?=$this->lang->line('information41_3')?><br/><?=$this->lang->line('information41_4')?><br/><?=$this->lang->line('information41_5')?></div><div class="content"><?=$this->lang->line('information41_6')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information40_1')?>" href="<?=$this->config->item('base_url')?>game/informations/40/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information40_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information42_1')?>" href="<?=$this->config->item('base_url')?>game/informations/42/"><?=$this->lang->line('information42_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 42:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information42_1')?></h1>
<div class="content"><?=$this->lang->line('information42_2')?></div><div class="content"><?=$this->lang->line('information42_3')?></div><div class="content"><?=$this->lang->line('information42_4')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information41_1')?>" href="<?=$this->config->item('base_url')?>game/informations/41/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information41_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information43_1')?>" href="<?=$this->config->item('base_url')?>game/informations/43/"><?=$this->lang->line('information43_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 43:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information43_1')?></h1>
<div class="content"><?=$this->lang->line('information43_2')?></div><div class="content"><?=$this->lang->line('information43_3')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information42_1')?>" href="<?=$this->config->item('base_url')?>game/informations/42/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information42_1')?></a>                    </td>
                    <td width="50%" align="right">
                    <a title="<?=$this->lang->line('foward_topic')?>: <?=$this->lang->line('information44_1')?>" href="<?=$this->config->item('base_url')?>game/informations/44/"><?=$this->lang->line('information44_1')?><img align="middle" name="next" onMouseover="next.src='<?=$this->config->item('style_url')?>skin/layout/next-hover.gif';" onMouseout="next.src='<?=$this->config->item('style_url')?>skin/layout/next.gif';" src="<?=$this->config->item('style_url')?>skin/layout/next.gif"></a>                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?case 44:?>
<div id="mainview">
	<div class="informations">
        <h1 class="informationsTitel"><?=$this->lang->line('information44_1')?></h1>
<div class="content"><?=$this->lang->line('information44_2')?></br><?=$this->lang->line('information44_3')?></div><div class="content"><?=$this->lang->line('information44_4')?></div><div class="content"><?=$this->lang->line('information44_5')?></div><div class="content"><?=$this->lang->line('information44_6')?></div><div class="content"><?=$this->lang->line('information44_7')?></div>        <div class="navigation">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" align="left">
                    <a title="<?=$this->lang->line('back_topic')?>: <?=$this->lang->line('information43_1')?>" href="<?=$this->config->item('base_url')?>game/informations/43/"><img align="middle" name="prev" onMouseover="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev-hover.gif';" onMouseout="prev.src='<?=$this->config->item('style_url')?>skin/layout/prev.gif';" src="<?=$this->config->item('style_url')?>skin/layout/prev.gif"><?=$this->lang->line('information43_1')?></a>                    </td>
                    <td width="50%" align="right">
                                        </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
</div>
<?break;?>
<?}?>