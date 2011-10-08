                    <img class="bild1" src="<?=$this->config->item('base_url')?>design/bild1.jpg" width="173" height="85">
                    <img class="bild2" src="<?=$this->config->item('base_url')?>design/bild2.jpg" width="173" height="85">
                    <h1><?=$this->lang->line('welcome_title')?></h1>
                    <p class="desc"><?=$this->lang->line('welcome_text')?></p>
                    <div class="joinbutton">
                        <a href="#" id="index_register" title="<?=$this->lang->line('link_playnow_title')?>"><?=$this->lang->line('link_playnow_text')?></a>
                    </div>
                    <form id="loginForm" name="loginForm" action="<?=$this->config->item('base_url')?>" method="post">
                        <input name="action" type="hidden" value="login">
                        <div id="formz">
                            <table cellpadding="0" cellspacing="0" id="logindata">
                                <tr>
                                    <td><label for="welt" class="labelwelt"><?=$this->lang->line('world')?></label></td>
                                    <td><label for="login" class="labellogin"><?=$this->lang->line('name')?></label></td>
                                    <td><label for="pwd" class="labelpwd"><?=$this->lang->line('password')?></label></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="universe" class="uni" size="1">
                                            <option value="alpha">Alpha</option>
                                        </select>
                                    </td>
                                    <td><input id="login" name="name" type="text" class="login"></td>
                                    <td><input id="pwd"  name="password" type="password" class="pass"></td>
                                    <td><input type="submit" class="button" value="<?=$this->lang->line('login')?>"></td>
                                </tr>
<?if ($this->config->item('game_email')){?>
                                <tr>
                                    <td colspan="3" class="forgotpwd"><a id="lost_password" title="<?=$this->lang->line('link_lost_title')?>"><?=$this->lang->line('link_lost_text')?></a></td>
                                    <td style="font-size:10px; text-align:left; padding:4px 0px 0px 16px;"></td>
                                </tr>
<?}?>
                            </table>
                        </div>
                    </form>
<script>
$(document).ready(function(){
    $("#index_register").click(function(){
        $("#fuzz").fadeIn();
        $('#text').load('<?=$this->config->item('base_url')?>main/page/register/',function(){$("#fuzz").fadeOut()});
    });
<?if ($this->config->item('game_email')){?>
    $("#lost_password").click(function(){
        $("#fuzz").fadeIn();
        $('#text').load('<?=$this->config->item('base_url')?>main/page/password/',function(){$("#fuzz").fadeOut()});
    });
<?}?>
});
</script>