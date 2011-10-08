<div id="mainview">

    <div id="diplomacyDescription" class="buildingDescription">
        <h1><?=$this->lang->line('diplomatic_advisor')?></h1>
        <p></p>
    </div>
    <div class="diplomacyAdvisorTabs">
        <table cellpadding="0" cellspacing="0" id="tabz">
            <tr>
                <td><a href="<?=$this->config->item('base_url')?>game/diplomacyAdvisor/" title="<?=$this->lang->line('inbox')?>"><em><?=$this->lang->line('inbox')?> (<?=SizeOf($this->Player_Model->to_user_messages)?>)</em></a></td>
                <td class="selected"><a href="<?=$this->config->item('base_url')?>game/diplomacyAdvisorOutBox/" title="<?=$this->lang->line('outbox')?>"><em><?=$this->lang->line('outbox')?>  (<?=SizeOf($this->Player_Model->from_user_messages)?>)</em></a></td>
                <td><a href="<?=$this->config->item('base_url')?>game/diplomacyAdvisorTreaty/" title="<?=$this->lang->line('treaty_overview')?>"><em><?=$this->lang->line('treaty')?></em></a></td>
                <td><a href="<?=$this->config->item('base_url')?>game/diplomacyAdvisorAlly/" title="<?=$this->lang->line('ally_info')?>"><em><?=$this->lang->line('ally')?></em></a></td>
               <!--   <td><a href="?view=diplomacyAdvisorArchive" title="Входящие"><em>Входящие</em></a></td>
                <td><a href="?view=diplomacyAdvisorArchiveOutBox" title="Исходящие"><em>Исходящие</em></a></td>-->
            </tr>
        </table>
    </div>
    <div id="tab2">

<script type="text/javascript" language="javascript">
         function show_hide_menus(ele)    {
           if (document.getElementById('tbl_'+ele).style.display=='')
           {
               document.getElementById('tbl_'+ele).style.display='none';
           }    else    {
               document.getElementById('tbl_'+ele).style.display='';
           }
       }
function imgtoggle(obj){
	if(obj.className=="open"){
		obj.className="close";
		obj.src="<?=$this->config->item('style_url')?>skin/layout/up-arrow.gif";
	}
	else if(obj.className=="close"){
		obj.className="open";
		obj.src="<?=$this->config->item('style_url')?>skin/layout/down-arrow.gif";
	}
	else if(obj.className=="gopen"){
		obj.className="gclose";
		obj.src="<?=$this->config->item('style_url')?>skin/layout/up-arrow.gif";
	}
	else{
		obj.className="gopen";
		obj.src="<?=$this->config->item('style_url')?>skin/layout/down-arrow.gif";
	}
}
function markAll(command) {
    var allInputs = document.getElementById('deleteMessages').getElementsByTagName('input');
    for (var i=0; i<allInputs.length; i++) {
        if (allInputs[i].getAttribute('type') == "checkbox") {
            if (command == 'unread'){
                if (allInputs[i].value=='unread'){ allInputs[i].checked = true;  }
                else                             { allInputs[i].checked = false; }
            }
            if (command == 'read'){
                if(allInputs[i].value=='read')   { allInputs[i].checked = true;  }
                else                             { allInputs[i].checked = false; }
            }
            if (command == 'none') {
                allInputs[i].checked = false;
            }
        }
    }
}
</script>

        <div id="messages">
            <div class="contentBox01">
                <h3 class="header"><span class="textLabel"><?=$this->lang->line('messages')?></span></h3>
                <div class="content">
                    <form action="<?=$this->config->item('base_url')?>actions/messages/delete/0/diplomacyAdvisorOutBox/" method="post" name="deleteMessages" id="deleteMessages">
<? if(Count($this->Player_Model->from_user_messages) > 0){?>
                        <table cellpadding="0" cellspacing="0" class="table01" id="messages"  style="width:100%;margin:0px;border:none;">
                            <tr>
                                <th><?=$this->lang->line('action')?></th>
                                <th></th>
                                <th><?=$this->lang->line('adressee')?></th>
                                <th><?=$this->lang->line('subject')?></th>
                                <th><?=$this->lang->line('date')?></th>
                            </tr>
<?foreach($this->Player_Model->from_user_messages as $message){?>
<?$this->Data_Model->Load_User($message->to)?>
                            <tr title="Нажмите здесь, чтобы показать/скрыть сообщение!" class="entry " onMouseOver="this.bgColor='#ECD5AC'" onMouseOut="this.bgColor='#FDF7DD'" >
                                <td><input type="checkbox"  name="deleteId[<?=$message->id?>]" value="1"></td>
                                <td onclick="show_hide_menus('mail<?=$message->id?>');imgtoggle(getElementById('button<?=$message->id?>'));">
                                    <img class="open" alt="" id="button<?=$message->id?>" name="button<?=$message->id?>" src="<?=$this->config->item('style_url')?>skin/layout/down-arrow.gif">
                                </td>
                                <td onclick="show_hide_menus('mail<?=$message->id?>');imgtoggle(getElementById('button<?=$message->id?>'));"><a href="#"><?=$this->Data_Model->temp_users_db[$message->to]->login?></a></td>
                                <td class="subject" onclick="show_hide_menus('mail<?=$message->id?>'); imgtoggle(getElementById('button<?=$message->id?>'));"><?=$this->lang->line('message')?></td>
                                <td onclick="show_hide_menus('mail<?=$message->id?>'); imgtoggle(getElementById('button<?=$message->id?>'));"><?=date("d.m.Y G:i",$message->date)?></td>
                            </tr>
                            <tr id="tbl_mail<?=$message->id?>" style="display:none;" class="text">
                                <td colspan="5" class="msgText">
                                    <div style="overflow: auto; width: 100%;"><?=$message->text?></div>
                                    <br>
                                    <span style="float:right;padding:5px;margin-right:5px;"><a style="bottom:3px;" href="<?=$this->config->item('base_url')?>actions/messages/archive/<?=$message->id?>/" class="button center"><?=$this->lang->line('in_archive')?></a>
                                            &nbsp; (<span class="costAmbrosia" style="padding-top:5px;padding-bottom:5px;font-weight:bold;paddig-left:5px;padding-right:22px;background-image:url(<?=$this->config->item('style_url')?>skin/premium/ambrosia_icon.gif);background-repeat:no-repeat;background-position:100% 50%;###">1</span>)
                                    </span>
                                </td>
                            </tr>
<?}?>

                            <tr>
                                <td colspan="5" class="paginator">
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" style="text-align:left;">
                                    <a href="javascript:markAll('all');"><?=$this->lang->line('all')?></a> |
                                    <a href="javascript:markAll('none');"><?=$this->lang->line('none')?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="selection" colspan="6" style="text-align:left;" width="50%">
                                    <input type="submit" name="666" value="<?=$this->lang->line('delete')?>" class="button">
                                </td>
                            </tr>
                        </table>
<?}else{?>

                        <table cellpadding="0" cellspacing="0" class="table01" id="messages"  style="width:100%;margin:0px;border:none;">
                            <tr><th colspan="6"><p><?=$this->lang->line('no_messages')?></p></th></tr>
                            <!--<div style="margin:0 auto; text-align:center;"-->
                        </table>
<?}?>
                    </form>
                </div>
                <div class="footer"></div>
            </div>
            <div class="dynamic" id="viewDiplomacyImperium" style="z-index:1;">
                <h3 class="header"><?=$this->lang->line('message_archive')?></h3>
                <div class="content">
                    <div class="centerButton">
                        <div>
                            <a class="button" href="<?=$this->config->item('base_url')?>game/diplomacyAdvisorArchive/" title="<?=$this->lang->line('inbox')?>"><b><?=$this->lang->line('inbox')?></b></a>
                            <a class="button" href="<?=$this->config->item('base_url')?>game/diplomacyAdvisorArchiveOutBox/" title="<?=$this->lang->line('outbox')?>"><b><?=$this->lang->line('outbox')?></b></a>
                        </div>
                    </div>
                </div>
                <div class="footer"></div>
            </div>
        </div>
    </div>
</div>
