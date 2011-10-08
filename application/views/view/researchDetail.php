<?
    $position = $param1;
    if($position <= 14){$way = 1; $id = $position;}
    if($position > 14 and $position <= 29 ){$way = 2; $id = $position - 14;}
    if($position > 29 and $position <= 45 ){$way = 3; $id = $position - 14 - 15;}
    if($position > 45 and $position <= 59 ){$way = 4; $id = $position - 14 - 15 - 16;}
    $data = $this->Data_Model->get_research($way,$id,$this->Player_Model->research);
    $next_data = $this->Data_Model->get_research($way,$id+1,$this->Player_Model->research);
    if ($data['need_way'] > 0 and $data['need_id'] > 0 )
    {
        $need_data = $this->Data_Model->get_research($data['need_way'],$data['need_id'],$this->Player_Model->research);
    }
    switch($way)
    {
        case 1:  $way_name = 'Мореходство'; break;
        case 2:  $way_name = 'Экономика'; break;
        case 3:  $way_name = 'Наука'; break;
        case 4:  $way_name = 'Милитаризм'; break;
    }
    $parametr = 'res'.$way.'_'.$id;
    $time = ($data['points']/$this->Player_Model->now_town->scientists)*3600;
    $need_name = isset($need_data) ? $need_data['name'] : '';
?>
<div id="mainview">
    <div class="buildingDescription">
        <h1 style="padding:0; margin:30px 0px 0px 0px;">Область исследований - <?=$way_name?></h1>
    </div>
    <div class="contentBox01h">
        <h3 class="header"><span class="textLabel"></span></h3>
        <div class="content">
            <table cellpadding="0" cellspacing="0">
            <tr>
                <td class="desc" title="Область исследований">Область исследований:</td>
                <td class="" title="Мореходство"><?=$way_name?></td>
            </tr>
            <tr>
                <td class="desc" title="Имя">Имя:</td>
                <td class="" title="Плотницкое дело"><?=$data['name']?></td>
            </tr>
            <tr>
                <td class="desc" title="Описание">Описание:</td>
                <td class="" title="<?=$data['desc']?>"><?=$data['desc']?></td>
            </tr>
            <tr>
                <td class="desc" title="Время текущего исследования">Время текущего исследования:</td>
<?if($this->Player_Model->research->$parametr > 0){?>
                <td class="">Исследование уже завершено!</td>
<?}else{?>
<td class=""><?=format_time($time)?> (<?=number_format($data['points'])?>)</td>

<?}?>
            </tr>
            <tr>
                <td class="desc" title="След. исследование в этой области">След. исследование в этой области:</td>
                <td class=""> 
                    <a title="К исследованию <?=$next_data['name']?>" href="<?=$this->config->item('base_url')?>game/researchDetail/<?=$way?>/<?=$id+1?>/"><?=$next_data['name']?></a>
                </td>
            </tr>
            <tr>
                <td class="desc" title="Требования">Требования:</td>
                <td class="" title="<?=$need_name?>">
<?if(isset($need_data)){?>
                    <a title="<?=$need_data['name']?>" href="<?=$this->config->item('base_url')?>game/researchDetail/<?=$data['need_way']?>/<?=$data['need_id']?>/"><?=$need_data['name']?></a>
<?}else{?>
                    -
<?}?>
                </td>
            </tr>
            </table>
          </div>
            <div class="footer"></div>
        </div>
</div>