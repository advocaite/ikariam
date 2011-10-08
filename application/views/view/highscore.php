<?
    $rangs_count = ceil($param1->num_rows()/100);
?>
<div id="mainview">
    <h1><?=$this->lang->line('game_top')?></h1>
    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel"><?=$this->lang->line('game_top')?></span></h3>
        <div class="content">
            <table class="table01">
            <tr>
                <td width="33%"><img src="<?=$this->config->item('style_url')?>skin/layout/sieger_2.jpg"></td>
                <td width="33%" align="center">
                    <form action="<?=$this->config->item('base_url')?>game/highscore/" method="POST">
                        <div align="center" style="padding: 10px 0;">
                            <select name="highscoreType">
                                <option value="score" <?if($param3['highscoreType']=='score'){?>selected="selected"<?}?>><?=$this->lang->line('total_score')?></option>
                                <option value="building_score_main" <?if($param3['highscoreType']=='building_score_main'){?>selected="selected"<?}?>><?=$this->lang->line('master_builders')?></option>
                                <option value="building_score_secondary" <?if($param3['highscoreType']=='building_score_secondary'){?>selected="selected"<?}?>><?=$this->lang->line('building_levels')?></option>
                                <option value="research_score_main" <?if($param3['highscoreType']=='research_score_main'){?>selected="selected"<?}?>><?=$this->lang->line('scientists')?></option>
                                <option value="research_score_secondary" <?if($param3['highscoreType']=='research_score_secondary'){?>selected="selected"<?}?>><?=$this->lang->line('research_levels')?></option>
                                <option value="army_score_main" <?if($param3['highscoreType']=='army_score_main'){?>selected="selected"<?}?>><?=$this->lang->line('generals')?></option>
                                <option value="trader_score_secondary" <?if($param3['highscoreType']=='trader_score_secondary'){?>selected="selected"<?}?>><?=$this->lang->line('gold')?></option>
                                <option value="offense" <?if($param3['highscoreType']=='offense'){?>selected="selected"<?}?>><?=$this->lang->line('offencive_points')?></option>
                                <option value="defense" <?if($param3['highscoreType']=='defense'){?>selected="selected"<?}?>><?=$this->lang->line('defence_points')?></option>
                                <option value="trade" <?if($param3['highscoreType']=='trade'){?>selected="selected"<?}?>><?=$this->lang->line('trade_points')?></option>
                                <option value="resources" <?if($param3['highscoreType']=='resources'){?>selected="selected"<?}?>><?=$this->lang->line('resources')?></option>
                                <option value="donations" <?if($param3['highscoreType']=='donations'){?>selected="selected"<?}?>><?=$this->lang->line('donate_points')?></option>
                            </select>
                            <select name="offset" id='offset'>
                                <option value="-1"><?=$this->lang->line('own_position')?></option>
<?for($i=1;$i<=$rangs_count;$i++){?>
                                <option value="<?=$i-1?>" <?if($param3['offset']==$i-1){?>selected<?}?>><?=(($i*100)-100)+1?>- <?=$i*100?></option>
<?}?>
                            </select>
                            <input type="hidden" name="view" value="highscore" />
                            <input class="button" name="sbm" type="submit" value="<?=$this->lang->line('send')?>" />
                        </div>
	           </td>
	           	           <td width="33%" align="center">
	               <?=$this->lang->line('player_name')?> <input type="text" name="searchUser" value="" />
                       <input type="hidden" name="view" value="highscore" />
                   </form>
	           </td>
            </tr>
           </table>
           <p style="font-size: 14px; padding: 0; margin: 0 0 15px 10px;">
 Места в топ-листе
<?switch($param3['highscoreType']){?>
<?case 'building_score_main': echo $this->lang->line('master_builders'); break;?>
<?case 'building_score_secondary': echo $this->lang->line('building_levels'); break;?>
<?case 'research_score_main': echo $this->lang->line('scientists'); break;?>
<?case 'research_score_secondary': echo $this->lang->line('research_levels'); break;?>
<?case 'army_score_main': echo $this->lang->line('generals'); break;?>
<?case 'trader_score_secondary': echo $this->lang->line('gold'); break;?>
<?case 'offense': echo $this->lang->line('offencive_points'); break;?>
<?case 'defense': echo $this->lang->line('defence_points'); break;?>
<?case 'trade': echo $this->lang->line('trade_points'); break;?>
<?case 'resources': echo $this->lang->line('resources'); break;?>
<?case 'donations': echo $this->lang->line('donate_points'); break;?>
<?default: echo $this->lang->line('total_score'); break;?>
<?}?> !            </p>
           <table class="table01">
             <tr>
                <th width="15%"><?=$this->lang->line('position')?></th>
                <th width="30%"><?=$this->lang->line('player_name')?></th>
                <th width="15%"><?=$this->lang->line('ally')?></th>
                <th width="20%"><?=$this->lang->line('points')?></th>
                <th width="20%"><?=$this->lang->line('actions')?></th>
            </tr>
<?$i = 1;?>
<?$null_user = array()?>
<?foreach ($param2->result() as $user){?>
            <tr class="<?if(!fmod($i,2)){?>alt<?}?><?if($param3['offset']==0){?><?if($i==1){?> first<?}?><?if($i==2){?> second<?}?><?if($i==3){?> third<?}?><?}?><?if($user->id==$this->Player_Model->user->id){?> own<?}?>">
                    <td class="place"><?=$i?></td>
    	            <td class="name"><?=$user->login?></td>
	            <td class="allytag"><!--<a class="allyLink" href="?view=allyPage&oldView=highscore&allyId=648">Wand</a>--></td>
	            <td class="score">
<?switch($param3['highscoreType']){?>
<?case 'score': echo number_format($user->points); break;?>
<?case 'building_score_main': echo number_format($user->points_buildings); break;?>
<?case 'building_score_secondary': echo number_format($user->points_levels); break;?>
<?case 'research_score_main': echo number_format($user->points_research); break;?>
<?case 'research_score_secondary': echo number_format($user->points_complete); break;?>
<?case 'army_score_main': echo number_format($user->points_army); break;?>
<?case 'trader_score_secondary': echo number_format($user->points_gold); break;?>

<?}?>
                    </td>
	            <td class="action"><?if($user->id!=$this->Player_Model->user->id){?><a title="<?=$this->lang->line('create_message')?>" href="<?=$this->config->item('base_url')?>game/sendIKMessage/<?=$user->id?>/"><img src="<?=$this->config->item('style_url')?>skin/interface/icon_message_write.gif" alt="<?=$this->lang->line('create_message')?>"> </a><?}?></td>
	    </tr>
<?$i++?>
<?}?>
           </table>
        </div>

        <div class="contentBox01h"><div class="content"><p>
                    </p>
        </div></div>

        <div class="footer"></div>
    </div>
</div>
