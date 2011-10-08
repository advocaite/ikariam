<div id="register">
    	<img class="bild1" src="<?=$this->config->item('base_url')?>design/bild1.jpg" width="173" height="85" />
        <img class="bild2" src="<?=$this->config->item('base_url')?>design/bild2.jpg" width="173" height="85" />
        <h1><?=$this->lang->line('register_title')?></h1>
        <p class="desc"><?=$this->lang->line('register_text')?></p>

<?if(SizeOf($this->session->flashdata('errors')) > 0){?>
        <div>
<?foreach ($this->session->flashdata('errors') as $error){?>
        <div class="warning"><?=$error?></div>
<?}?>
        </div>
<?}?>
        <form name="registerForm" action="<?=$this->config->item('base_url')?>" method="post">
            <input name="action" type="hidden" value="register">
            <p class="desc">
    	        <table cellpadding="3" cellspacing="0" id="logindata">
                    <tr>
                        <td><label for="welt" class="labelwelt"><?=$this->lang->line('world')?></label></td>
                    	<td>
                            <select id="universe" name="universe" class="uni" size="1" onchange="getServerNotice(this.value, 'infotext');">
                                <option value="alpha" >Alpha</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="login" class="labellogin"><?=$this->lang->line('name')?></label></td>
                        <td><input type='text' name='name' class="startinput"  size='30'></td>
                    </tr>
                    <tr>
                        <td><label for="login" class="labellogin"><?=$this->lang->line('password')?></label></td>
                        <td><input type='password' name='password' class="startinput" size='30'></td>
                    </tr>
                    <tr>
                        <td><label for="login" class="labellogin"><?=$this->lang->line('email')?></label></td>
                        <td><input type='text' name='email' class="startinput" size='30'></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type=checkbox name="agb" ><?=$this->lang->line('register_accept')?></td>
                    </tr>
                </table>
            </p>
            <div id="infotext"></div>
            <input type="submit" class="button" value="<?=$this->lang->line('register_button')?>">
        </form>
</div>