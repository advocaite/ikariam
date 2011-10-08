<div id="tour">
<h3><?=$this->lang->line('tour_5_title')?></h3>
<div id="imgcontainer">
    <img src="<?=$this->config->item('base_url')?>design/tour/tour_views.jpg" width="530" height="230" alt="" >
</div>
<div id="tourtext">
    <p><?=$this->lang->line('tour_5_text_1')?> </p>
    <p><?=$this->lang->line('tour_5_text_2')?></p>
</div>
<a class="back" href="#" title="<?=$this->lang->line('back')?>">&laquo; <?=$this->lang->line('back')?></a>
<a class="next" href="#" title="<?=$this->lang->line('register_button')?>"><?=$this->lang->line('register_button')?>!</a>
</div>
<script>
$(document).ready(function(){
    $(".back").click(function(){
        $("#fuzz").fadeIn();
        $('#text').load('<?=$this->config->item('base_url')?>main/page/tour_4/',function(){$("#fuzz").fadeOut()});
    });
    $(".next").click(function(){
        $("#fuzz").fadeIn();
        $('#text').load('<?=$this->config->item('base_url')?>main/page/register/',function(){$("#fuzz").fadeOut()});
    });
});
</script>