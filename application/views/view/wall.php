<div id="mainview">
<?include_once('building_description.php')?>
<?$wall_data = $this->Data_Model->wall_data_by_level($this->Player_Model->now_town->pos14_level)?>
    <div class="contentBox01h">
        <h3 class="header">Информация</h3>
        <div class="content">
        	<div class="bgWall">
        		<div id="wallInfoBox">
		        	<div class="infoBoxHeader"></div>
		        	<div class="infoBoxContent">
			        	<div class="weapon">
				        	<div class="weaponName">Атака местности</div>
				        	<span class="textLabel">Урон</span><b>12</b>
				        	<span class="textLabel">Точность</span>
				        	<div class="damageFocusContainer" title="30%">
				        		<div class="damageFocus" style="width: 30%;"></div>
				        	</div>
			        	</div>
			        	<span class="textLabel">Здоровье</span><b><?=$wall_data['health']?></b><br/>
			        	<span class="textLabel">Броня</span><b><?=$wall_data['reservation']?></b><br/>

			        	<span class="textLabel">Лимит гарнизона</span><b><?=number_format($this->Player_Model->garisson_limit[$this->Player_Model->town_id])?></b><br/>
		        	</div>
		        	<div class="infoBoxFooter"></div>
	        	</div>
	        </div>
	    </div>
        <div class="footer"></div>
    </div>
</div>
