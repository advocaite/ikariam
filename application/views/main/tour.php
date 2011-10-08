<div id="tour">
<h3><?=$this->lang->line('tour_1_title')?></h3>
<div id="imgcontainer">
    <img src="<?=$this->config->item('base_url')?>design/tour/tour_city.jpg" width="530" height="230" alt="" >
</div>
<div id="tourtext">
    <p><?=$this->lang->line('tour_1_text_1')?></p>
    <?=$this->lang->line('tour_1_text_2')?>
</div>
<a class="back" href="#" title="<?=$this->lang->line('back')?>">&laquo; <?=$this->lang->line('back')?></a>
<a class="next" href="#" title="<?=$this->lang->line('next')?>"><?=$this->lang->line('next')?> &raquo;</a>
</div>
<script>
$(document).ready(function(){
    $(".back").click(function(){
        $("#fuzz").fadeIn();
        $('#text').load('<?=$this->config->item('base_url')?>main/page/index/',function(){$("#fuzz").fadeOut()});
    });
    $(".next").click(function(){
        $("#fuzz").fadeIn();
        $('#text').load('<?=$this->config->item('base_url')?>main/page/tour_2/',function(){$("#fuzz").fadeOut()});
    });
});
</script>