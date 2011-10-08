<div id="mainview">
    <div class="buildingDescription" style="height: 50px;">
        <h1>Шпионский доклад</h1>
    </div>
    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel">Доклад Вашего шпиона</span></h3>
        <div class="content"><table cellpadding="0" cellspacing="0" class="record" width="100%">

                <tbody>
                    <tr>
                        <td class="job">Миссия:</td>
                        <td><?if($param1->mission > 0){?><?=$this->Data_Model->spy_mission_name_by_type($param1->mission)?><?}else{?>Попытаться сбежать<?}?></td>
                    </tr>
                    <tr>
                        <td class="job">Город:</td>
                        <td><?=$this->Data_Model->temp_towns_db[$param1->to]->name?></td>
                    </tr>
                    <tr>
                        <td class="job">Дата:</td>
                        <td><?=date("d.m.Y G:i",$param1->date)?></td>
                    </tr>
                    <tr class="status">
                        <td class="job">Статус:</td>
                        <td><?if($param1->mission > 0){?>Миссия успешно завершена!<?}else{?>Ваш шпион не выходит на связь<?}?></td>
                    </tr>
                    <tr>
                        <td class="job">Доклад:</td>
                        <td class="report"> <?=$param1->text?></td>
                    </tr>

                    <tr>
    
                        <td></td>
                        <td class="navigationBottom">
                            <div style="text-align:right;width:300px;margin-top:20px;margin-bottom:5px;">
                                <div class="next">
                                    <a href="<?=$this->config->item('base_url')?>game/premium/" class="button">Поместить в архив</a>
                                    &nbsp; (<span class="costAmbrosia" style="padding-top:5px;padding-bottom:5px;font-weight:bold;paddig-left:5px;padding-right:22px;background-image:url(<?=$this->config->item('style_url')?>skin/premium/ambrosia_icon.gif);background-repeat:no-repeat;background-position:100% 50%;###">1</span>)
            
                                </div>
                            </div>
                        </td>
                    </tr>

</tbody>
</table>


</td>
</tr>
</table>


</div>
<!-- content -->
<div class="footer"></div>
</div>



</div>
<?
if ($param1->checked == 0)
{
    $this->db->set('checked', time());
    $this->db->where(array('id' => $param1->id));
    $this->db->update($this->session->userdata('universe').'_spy_messages');
}
?>