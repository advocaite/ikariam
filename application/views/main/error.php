<div id="wrapper"></div>
<div id="text">
    <h1><?=$this->lang->line('error')?>!</h1><br/>
    <a href="<?=$this->config->item('base_url')?>"><?=$this->session->flashdata('error')?></a><br><br><br>
</div>