<div id="pwd">
    	<img class="bild1" src="<?=$this->config->item('base_url')?>design/bild1.jpg" width="173" height="85">
    	<img class="bild2" src="<?=$this->config->item('base_url')?>design/bild2.jpg" width="173" height="85">
        <h1><?=$this->lang->line('request_password')?></h1>
        <p class="desc">
<?$errors = $this->session->flashdata('errors')?>
<?if(SizeOf($errors) >= 0){?>
<?foreach ($errors as $error){?>
        <div class="warning"><?=$error?></div>
<?}?>
<?}elseif($this->session->flashdata('sended') == true){?>
        <img src="<?=$this->config->item('base_url')?>design/ok-neu.gif"><?=$this->lang->line('success_password')?><br />
<?}else{?>
<?=$this->lang->line('error_email')?><br>
<?}?>
        </p>
        <form name="registerForm" action="<?=$this->config->item('base_url')?>" method="post">
	        <input type="hidden" name="action" value="sendPassword">
	        <table cellpadding="3" cellspacing="0" id="logindata">
    	        <tr>
                	<td><label for="welt" class="labelwelt"><?=$this->lang->line('world')?></label></td>
                	<td>
                        <select name="universe" class="uni" size="1">
                            <option value="alpha">Alpha</option>
                        </select>
                    </td>
    	        </tr>
                <tr>
                    <td><label for="login" class="labellogin"><?=$this->lang->line('email')?></label></td>
                    <td><input type="text" name="email" class="startinput" size="30"></td>
                </tr>
                </table>
            <div id="demand"><input type="submit" class="button" value="<?=$this->lang->line('request_password')?>"></div>
        </form>

</div>