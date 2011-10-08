<div id="mainview">
    <h1><?=$this->lang->line('leave_colony')?></h1>
    <p><?=$this->lang->line('leave_colony_text')?></p>
    <form action="<?=$this->config->item('base_url')?>actions/abolishColony/"  method="POST">
        <div class="centerButton">
            <input type="submit" class="button" value="<?=$this->lang->line('leave_colony')?>">
        </div>
    </form>
    <br><br><br>
</div> 