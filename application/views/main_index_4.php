<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="<?=$this->lang->line('content')?>">
	<meta name="author" content="Nexus">
	<meta name="Description" content="<?=$this->lang->line('head_description')?>">

        <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/jquery.tools.min.js"></script>
        <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/jquery.fancybox-1.3.1.pack.js"></script>
        <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/RSA.js"></script>
        <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/jquery.mousewheel-3.0.2.pack.js"></script>
        <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/jquery.validationEngine.modified.js"></script>
        <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/functions.js"></script>
        <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/BigInt.js"></script>
        <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/Barrett.js"></script>
        <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/flowplayer-3.2.2.min.js"></script>
        <script type="text/javascript" src="<?=$this->config->item('script_url')?>js/jquery.jparallax.js"></script>

        <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>design/style.css" />

        <!--[if lte IE 6]>
        <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>design/ie6.css" />
        <![endif]-->

        <title><?=$this->lang->line('head_title')?></title>

        <style>
            /* dont't remove!!!!!!!! (chrome fix) Parallax = Sky */
            #sky{height: 265px; background: url(<?=$this->config->item('base_url')?>design/bg_sky.jpg) repeat-x; position: absolute; top: 0; z-index: 2; overflow: hidden; width: 100%;}
            #sky #baloon{background: url(<?=$this->config->item('base_url')?>design/bg_balloon.png) no-repeat 95% 0; height: 100%; width:120%; position: absolute;top: 0; z-index:7;}
			#sky #clouds-1{background: url('<?=$this->config->item('base_url')?>design/pt_clouds.png') repeat-x 0 0; width: 110%;height: 100%;position: absolute;top: 0;z-index:5;}
			#sky #clouds-2{background: url('<?=$this->config->item('base_url')?>design/pt_clouds.png') repeat-x 0 -265px; width: 120%;height: 100%;position: absolute;top: 0;z-index:4;}
			#sky #clouds-3{background: url('<?=$this->config->item('base_url')?>design/pt_clouds.png') repeat-x 0 -530px; width: 130%;height: 100%;position: absolute;top: 0;z-index:3;}
            #sky #birds{background: url(<?=$this->config->item('base_url')?>design/pt-birds.png) repeat-x; width: 120%;height: 100%;position: absolute;top: 0;z-index:6;}
        </style>

    </head>

<body>
    <div class="products">
    <?=require_once('languages.php')?>
    </div>

    <div id="wrapper">
        <div id="page" >
            <div id="header">
                
                <a id="btn-login" class="btn-login" href="javascript:void(0)" title="<?=$this->lang->line('login')?>"><?=$this->lang->line('login')?></a>
                    <div id="loginWrapper">
                        <div class="boxTop"></div>
                        <div class="boxMiddle" id="login">
                            <form id="loginForm" name="loginForm" method="post" action="<?=$this->config->item('base_url')?>">
                                <input name="action" type="hidden" value="login">
                                <div class="input-wrap">
                                    <label for="logServer"><?=$this->lang->line('world')?></label>
                                    <select name="universe" id="logServer" class="validate[required]">
                                        <option class="" value="alpha" fbUrl="" cookieName="" cookiePW="">Alpha</option>
                                    </select>
                                </div>

                                <div class="input-wrap">
                                    <label for="loginName"><?=$this->lang->line('name')?></label>
                                    <input id="loginName" name="name" type="text" value="" class="validate[required]">
                                </div>
                                <div class="input-wrap">
                                    <label for="loginPassword"><?=$this->lang->line('password')?></label>
                                    <input id="loginPassword" name="password" type="password" value="" class="validate[required]" />
                                </div>
                                <button type="submit" id="loginBtn" class="btn-login btn-big"><?=$this->lang->line('login')?></button>
                                
<?if ($this->config->item('game_email')){?>
                                <a id="pwLost" class="login-lnk" href="javascript:void(0)" title="<?=$this->lang->line('link_lost_title')?>"><?=$this->lang->line('link_lost_text')?></a>
<?}else{?><br><br><br><?}?>
                            </form>
                        </div>
                        <div class="boxBottom"></div>
                    </div>
                <h2 id="logo"><a id="logoimg" href="<?=$this->config->item('base_url')?>"><?=$this->lang->line('ikariam')?></a></h2>
                </div>
                <div id="container">
                    <div id="sidebarWrapper">
                        <div id="sidebarTop"></div>
                        <div id="sidebar" class="clearfix">
                            <img src="<?=$this->config->item('base_url')?>design/blank.gif"  id="major" width="233" height="228" alt="major">                            <div id="registerWrapper" class="clearfix">
                                <div id="registerTop"></div>
                                <div id="register">
                                    <h1><?=$this->lang->line('register_free')?></h1>
                                    <form id="registerForm" name="registerForm" action="<?=$this->config->item('base_url')?>" method="post">
                                    <input name="action" type="hidden" value="register">
                                    <div class="input-wrap">
                                        <label for="registerName"><?=$this->lang->line('name')?></label>
                                        <input id="registerName" name="name" type="text" value="" class="validate[required,custom[noSpecialCaracters],length[3,30]]" />
                                    </div>
                                    <div class="input-wrap">
                                        <label for="password"><?=$this->lang->line('password')?></label>
                                        <input id="password" name="password" type="password" value="" class="validate[required,pwLength[8,30]]" />
                                    </div>
                                    <div id="securePwd"><div class="valid-icon invalid"></div><p><?=$this->lang->line('password_safety')?></p><div class="securePwdBarBox"><div id="securePwdBar"></div></div><br class="clearfloat" /></div>
                                    <div class="input-wrap">
                                        <label for="email"><?=$this->lang->line('email')?></label>
                                        <input id="email" name="email" type="text" value="" class="validate[required,custom[email]]" />
                                    </div>
                                    <div class="input-wrap">
                                        <label for="registerServer"><?=$this->lang->line('world')?></label>
                                        <select name="universe" id="registerServer" class="validate[required]">
                                            <option  class="" value="alpha" fbUrl="" cookieName="" cookiePW="">Alpha</option>
                                        </select>
                                    </div>
                                    <div class="input-wrap">
                                        <input id="agb" name="agb" type="checkbox" class="agb validate[required]" value="on">
                                        <input id="agb" name="agb" type="hidden" value="on">

                                            <span for="agb" class="agb"><?=$this->lang->line('register_accept')?></span>

                                            <input type="submit" id="regBtn" class="reg-btn" value="<?=$this->lang->line('register_button')?>"/>
                                                                                        
                                    </div>
                                    </form>
                                </div>
                                <div id="registerBottom"></div>
                            </div>
                        </div>
                        <div id="sidebarBottom"></div>
                    </div>
                    <div id="content">
                        <div id="contentTop">
                            <div id="menuBox">
                                <div class="lnkmenu">
                                </div>
                                <ul id="menu" class="clearfix">
                                    <li><a id="tab1" class="current" href="<?=$this->config->item('base_url')?>/main/page/index_4"><?=$this->lang->line('link_home_text')?></a>/li>
                                    <li><a id="tab2" href="<?=$this->config->item('base_url')?>/main/page/gametour_extended"><?=$this->lang->line('link_tour_text')?></a></li>
                                    <li><a id="tab3" href="<?=$this->config->item('base_url')?>/main/page/media"><?=$this->lang->line('link_media_text')?></a></li>
                                    <li><a id="tab4" href="<?=$this->config->item('base_url')?>/main/page/rules"><?=$this->lang->line('rules')?></a></li>

                                </ul>
                            </div>
                        </div>

                        <div id="contentMiddle" class="clearfix">
                            <div id="pageContentWrapper">
                                <div id="pageContentTop"></div>
                                <div id="pageContent" class="page-content clearfix">
<?require_once('main/index_4.php')?>
                                </div>

                                <div id="extraContent" class="page-content">
                                    <!-- AJAX INHALTE WERDEN GELADEN -->
                                </div>
                                <div id="pageContentBottom"></div>
                            </div>
                        </div>
                        <div id="contentBottom"></div>
                    </div>
                </div>
                <br class="clearfloat" />
        </div>
        <!-- Backgrounds -->
        <div id="sunWrapper"><div id="sun"></div></div>
            <div id="sky">
                        
                <div id="clouds-1"></div>
                <div id="clouds-2"></div>
                <div id="clouds-3"></div>
                <div id="birds"></div>
                <div id="baloon"></div>
            </div>
            <div id="water"></div>
            <div id="ship-1" class="ship"></div>
            <div id="ship-2" class="ship"></div>
            <div id="submarine" class="ship"></div>
            <div id="island-left" class="islands"></div>
            <div id="island-right" class="islands"></div>
            <div class="push"></div>

        </div>

    <div id="footer-wrapper">
        <div id="footer">
            <div id="footer-inner">
                        <div id="footer-menu" class="clearfix">
                            <ul	class="clearfix">
                            </ul>
                            <p class="copyright"><?=$this->lang->line('copy_right')?></p>
                        </div>
                    </div>
                </div>
            </div>

        <script type="text/javascript">
            /* validation.engine: localisation */
            (function($) {
                $.fn.validationEngineLanguage = function() {};
                $.validationEngineLanguage = {
                    newLang: function() {
                        $.validationEngineLanguage.allRules = 	{
                            "required":{ 
                                "regex":"none",
                                "alertText":"* <?=$this->lang->line('field_required')?>",
                                "alertTextCheckboxMultiple":"* <?=$this->lang->line('error_order')?>",
                                "alertTextCheckboxe":"* <?=$this->lang->line('error_order')?>"},
                            "length":{ 
                                "regex":"none",
                                "alertText":"* <?=$this->lang->line('error_name_length')?>"},
                            "pwLength":{ // Password-Length
                                "regex":"none",
                                "alertText":"* <?=$this->lang->line('error_password_length')?>"},
                            "email":{
                                "regex":"/^[a-zA-Z0-9_\\.\\-]+\\@([a-zA-Z0-9\\-]+\\.)+[a-zA-Z0-9]{2,4}$/", // modified
                                "alertText":"* <?=$this->lang->line('error_email2')?>"},
                            "noSpecialCaracters":{
                                "regex":"/[^ \\\\\\+\\.\\\"\\'%\\$\\(\\)\\[\\]\\{\\}<>&;,\\?\\^\\*\\|\\/]+$/",
                                "alertText":"* <?=$this->lang->line('no_special')?>"}
                        }
                    }
                }
            })(jQuery);
            $(document).ready(function() {
            });

    $('#pwLost').click(function(){
        showPasswordLost('<?=$this->config->item('base_url')?>main/page/password/') ;
        $('#btn-login').removeClass('open').text(window.txt_login);
    });

            window.language = '<?=$this->lang->line('content')?>' ;
            window.txt_login = '<?=$this->lang->line('login')?>' ;
            window.txt_close = '<?=$this->lang->line('close')?>' ;
            window.use_login_cookies = '' ;
            window.ieSpecial = false;

        </script>


    <script type="text/javascript">
   
    function agbCheck() {

        if(document.getElementById('agb').checked != true) {
            alert("<?=$this->lang->line('error_order')?>");
        } else {
            redirectToCreateAvatar();
        }
    }

</script>

</body>
</html> 