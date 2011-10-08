$(document).ready(function() {
    setUrlLoginForm( $( '#logServer :selected' ) . val() ) ;
    setNameLoginForm( $( '#logServer :selected' ) . attr('cookiename') ) ;
    setPWLoginForm( $( '#logServer :selected' ) . attr('cookiepw') ) ;
    setRememberLoginForm($( '#logServer :selected' ) . attr('cookiename'),$( '#logServer :selected' ) . attr('cookiepw') );
    setUrlRegisterForm( $( '#registerServer :selected' ) . val() ) ;
    setUrlFBLoginHref( $('#fbServer :selected').attr('fburl') );
    setUrlFBRegisterForm( $('#fbRegisterServer :selected').attr('fburl') );
    $( '#logServer' ).change( function() {
        var logServer = $( '#logServer :selected' ) ;
        setUrlLoginForm( logServer . val() ) ;
        setNameLoginForm( logServer . attr( 'cookiename' ) ) ;
        setPWLoginForm( logServer . attr( 'cookiepw' ) ) ;

    }) ;
    $( "#registerServer" ).change( function() {
        setUrlRegisterForm( $( '#registerServer :selected' ) . val() ) ;
    }) ;
    $( "#fbServer" ).change( function() {
        setUrlFBLoginHref( $('#fbServer :selected').attr('fburl') ) ;
    });
    $( "#fbRegisterServer" ).change( function() {
        setUrlFBRegisterForm( $('#fbRegisterServer :selected').attr('fburl') ) ;
    });
    $.validationEngineLanguage.newLang()
    $("#registerForm").validationEngine({
        validationEventTriggers:"keyup blur focus",
		promptPosition: "centerRight",
		scroll: false
    });
    $("#fbRegisterForm").validationEngine();
    $("#loginForm").validationEngine({
        promptPosition: "centerRight",
		scroll: false
    });
    $('#regBtn').click(function(){
        var success = $('#registerForm').validationEngine({
            returnIsValid:true
        });
        if(window.use_login_cookies) {
            setLoginCookie( {
                server:'#registerServer',
                name:'#registerName',
                password:'#password',
                remember:true,
                language:window.language
            } ) ;
        }
        $('#loginWrapper').hide();
        $('#btn-login').text(window.txt_login);
        $('#fbConnect').hide();
        if (success && window.ieSpecial) {
            document.registerForm.submit();
            this.disabled = true ;
        }
    });
    $('#fbRegBtn').click(function(){
        var success = $('#fbRegisterForm').validationEngine({
            returnIsValid:true
        });
        if(window.use_login_cookies) {
            setLoginCookie( {
                server:'#fbRegisterServer',
                name:'#loginName',
                password:'#loginPassword',
                remember:true,
                language:window.language
            } ) ;
        }
        if (success) document.fbRegisterForm.submit();
    });
    $('#loginBtn').click(function(){
        var success = $('#loginForm').validationEngine({
            promptPosition: "centerRight",
            returnIsValid: true
        });
        if(window.use_login_cookies) {
            setLoginCookie( {
                server:'#logServer',
                name:'#loginName',
                password:'#loginPassword',
                remember:$('#rememberMe').attr('checked'),
                language:window.language
            } ) ;
        }
        if (success) document.forms['loginForm'].submit();
    });
    $('#fbBtn').click(function(){
        var success = $('#fbForm').validationEngine({
            promptPosition: "centerRight",
            returnIsValid: true
        });
        if($('#fbForm').attr('action') == "") {
            success = false;
        }
        if(window.use_login_cookies) {
            setLoginCookie( {
                server:'#fbServer',
                name:'#loginName',
                password:'#loginPassword',
                remember:true,
                language:window.language
            } ) ;
        }
        if (success) document.fbForm.submit();
    });
    if(!window.ieSpecial) {
        $('#sky div').parallax({
            mouseport: jQuery('#page'),
            xparallax: true,
            yparallax: false
        });
    }
    $("ul#menu li a").click(function(){
        $.validationEngine.closePrompt('.formError',true);
        $('#extraContent, #passwordLost, #resendLink, #loginWrapper, #fbConnect').hide();
        $('#btn-login').removeClass('open').text(window.txt_login);
        $(this).removeClass('open').css('z-index', '20');
        $('#btn-fb .btn-fb-text').text(window.txt_login_fb);
        $('#pageContent').css('display','block');
        $('.lnkmenu a').removeClass('current');
    });
	$('.lnkmenu #tab1').click(function(){
		$(this).addClass('current');
	})
    var tabs = $("ul#menu").tabs("div#pageContent", {
		initialIndex: null,
        effect: 'ajax'
    });
    var api = tabs.data('tabs');
    $("#btn-login").click(function(){
        $.validationEngine.closePrompt('.formError',true)
        if ($(this).hasClass('open')) {
            $(this).removeClass('open').text(window.txt_login);
            $('#loginWrapper').hide();
        } else {
            $(this).addClass('open');
            $(this).text(window.txt_close);
            $('#fbConnect').hide();
            $('#loginWrapper').show();
            $('#btn-fb').css('z-index',20);
            $('#btn-fb').removeClass('open');
            $('#btn-fb .btn-fb-text').text(window.txt_login_fb);
        }
        return false;
    });
    $("#btn-fb").click(function () {
        $.validationEngine.closePrompt('.formError',true)
        if ($(this).hasClass('open')) {
            $('#fbConnect').hide();
            $(this).removeClass('open').css('z-index', '20');
            $('#btn-fb .btn-fb-text').text(window.txt_login_fb);
        } else {
            $('#fbConnect').show();
            $(this).addClass('open').css('z-index', '201');
            $('#btn-fb .btn-fb-text').text(window.txt_close);
            $('#loginWrapper').hide();
            $('#btn-login').removeClass('open');
            $('#btn-login').text(window.txt_login);
        }
        return false;
    });
    $("#lnk_reg-fb").click(function () {
        showFbRegistration() ;
    });
    $("#regularRegister").click(function() {
        $.validationEngine.closePrompt('.formError',true);
        $('form#fbRegisterForm').css('display','none');
        $('form#registerForm').css('display','block');
    });
    $("a.iframe").fancybox({
        showNavArrows:false,
        onStart: function() {
            $.validationEngine.closePrompt('.formError',true);
        }
    });    
    $('#resendAct').click(function(){
        $('#menu .current').removeClass('current');
        $.validationEngine.closePrompt('.formError',true);
        $('#loginWrapper, #pageContent').hide();
        $('#btn-login').removeClass('open').text(window.txt_close);
        $('#extraContent').load('ajax/resend-link.html').show();
    });
    var ratio = '';
    var pwdMinLen = 6;
    $('#password').keyup(function(){
        $('#validChar').text('');
        $('#securePwd').css('display','block');
        var strPass = $(this).val();
        if (!hasValidChar(strPass)) {
            $('#validChar').text($('#txtInvalidChar').text());
            return;
        }
        if (strPass.length >= 6) {
            $('#securePwd .valid-icon').removeClass('invalid');
            $('#securePwd').closest('.formError').addClass('valid');
        }
        else{
            $('#securePwd .valid-icon').addClass('invalid');
            $('#securePwd').closest('.formError').removeClass('valid');
        }
        ratio = checkPass($(this).val(),pwdMinLen);
        if (ratio) {
            $('#securePwdBar').css({
                width: ratio+'%'
            });
            if (ratio > 69) {
                $('#securePwd #securePwdBar').css('background-position', '0 -39px');
            } else if (ratio > 41) {
                $('#securePwd #securePwdBar').css('background-position', '0 -26px');
            } else if (ratio < 41) {
                $('#securePwd #securePwdBar').css('background-position', '0px 0px !important');
            } else {
                $('#securePwd #securePwdBar').css('background-position', '0px 0px');
            }
        } else {
            $('#securePwdBar').css({
                width: 0
            });
            $('#securePwd .valid-icon').addClass('invalid');
        }
        if ( (ratio > 49) && (strPass.length < 5)) {
            $('#securePwdBar').css({
                'width':'48px',
                'background-position':'0px 0px'
            });
        }
    });
    $( '#altNames input' ) . click( function() {
        $( '#registerName' ) . val( this.value ) ;
    } ) ;
    $( '#registerName' ) . click ( function() {
        $( 'input[name=altName]:checked' ).removeAttr("checked") ;
    } ) ;
} );
function showPasswordLost( url, result) {
    result = ( result != null ) ? '/?result=' + result : '' ;
    $('#menu .current').removeClass('current');
    $.validationEngine.closePrompt('.formError',true);
    $('#loginWrapper, #pageContent').hide();
    $('#btn-login').removeClass('open').text(window.txt_close);
    $('#extraContent').load(url + result).show();
}
function showFbRegistration( callback ) {
    callback = ( callback != null ) ? callback : 'void()' ;
    $.validationEngine.closePrompt('.formError',true);
    $('form#registerForm').css('display','none');
    $('form#fbRegisterForm').css('display','block');
    callback;
}
function hasValidChar(strPass) {
    var only_this = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789.$!;:-_#';
    for (var i=0;i<strPass.length;i++) {
    }
    return true;
}
function checkPass(strPass,minLen) {
    var sec = 0;
    var check = 100;
    var steps = 7;
    var checkByStep = check / steps;
    var strToCheck = '0123456789'; // check if numbers
    if (contains(strPass, strToCheck)) {
        sec++
    }
    strToCheck = 'abcdefghijklmnopqrstuvwxyz'; // check if lowercase letters
    if (contains(strPass, strToCheck)) {
        sec++
    }
    strToCheck = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // check if uppercase letters
    if (contains(strPass, strToCheck)) {
        sec++
    }
    strToCheck = '.$!;:-_#'; // check if uppercase letters
    if (contains(strPass, strToCheck)) {
        sec++
    }
    if (strPass.length < 6) sec = 0;
    if (strPass.length >= 6) sec++;
    if (strPass.length >= 8) sec++;
    if (strPass.length >= 10) sec++;
    var nCount = sec * checkByStep;
    if (nCount > check) nCount = check;
    return Math.ceil(nCount);
}
function contains(strText, strPattern) {
    for (i = 0; i < strText.length; i++) {
        if (strPattern.indexOf(strText.charAt(i)) > -1) return true;
    }
    return false;
}
function setUniUrlOld( url ) {
}
function setUrlRegisterForm( url ) {
}
function setUrlLoginForm( url ) {
}
function setNameLoginForm( name ) {
    if(name != '') {
        $("#loginName") . val(name);
    }
}
function setPWLoginForm( pw ) {
    if(pw != '') {
        $("#loginPassword") . val(pw);
    }
}
function setRememberLoginForm(name, pw) {
    if(name != '' && pw != '') {
        $("#rememberMe").attr('checked','checked');
    }
}
function setUrlPasswordLostForm( url ) {
}
function setUrlFBLoginHref( url ) {
    $("#fbForm") . attr ( "action", url ) ;
}
function setUrlFBRegisterForm( url ) {
    $("#fbRegisterForm") . attr ( "action", url ) ;
}
function setUrlPasswordLostFormFb( url ) {
    $("#pwLostFormFb") . attr ( "action", url ) ;
}
function setLoginCookie( fieldNames )
{
    if( fieldNames.remember )
    {
        var server = $(fieldNames.server).val() ;
        var username = $(fieldNames.name).attr('value') ;
        var password = $(fieldNames.password).attr('value') ;
        var encryptedPassword = encodePassword( password ) ;
        var cookieString= username + ":" + encryptedPassword;
        $.cookie(server, cookieString, {
            expires: 365,
            path:'/'
        });
        $.cookie('lastLogin_'+fieldNames.language, server, {
            expires:365,
            path:'/'
        });      
    }
    else
    {
        clearCookieData() ;
    }
}
function addToServerList( server, serverList ) {
    if( serverList ) {
        oldServer = true ;
        if(serverList.length > 0)
        {
            serverArray = serverList.split( ',' ) ;
        }
        else
        {
            serverArray = serverList ;
        }
        if( serverArray instanceof Array )
        {
            oldServer = in_array( server, serverArray ) ;
        }
        else if ( serverArray != server )
        {
            oldServer = false ;
        }
        if( !oldServer )
        {
            serverList = serverList + ',' + server ;
        }
    }
    else
    {
        serverList = server ;
    }
    return serverList ;
}
function setCookies( cookieValues ) {
    if(cookieValues.serverValue != '') {
        $.cookie('server_'+cookieValues.language, cookieValues.serverValue, {
            expires: 365,
            path:'/'
        });
    }
    if(cookieValues.serverListValue != '') {
        $.cookie('serverList_'+cookieValues.language, cookieValues.serverListValue, {
            expires: 365,
            path:'/'
        });
    }
    if(cookieValues.nameValue != '') {
        $.cookie('username_'+cookieValues.language, cookieValues.nameValue, {
            expires: 365,
            path:'/'
        });
    }
    if(cookieValues.nameValue != '') {
        $.cookie('password_'+cookieValues.language, cookieValues.passwordValue, {
            expires: 365,
            path:'/'
        });
    }
    if(cookieValues.nameValue != '') {
        $.cookie('remember_'+cookieValues.language, cookieValues.rememberValue, {
            expires: 365,
            path:'/'
        });
    }
}
function encodePassword( password )
{
    setMaxDigits(35);
    var key = new RSAKeyPair(
        "c0098abb2b4fef0c4a1fb4dbd81e1d00f27276244fe4b6a13b8a3cfc8d8cc0d",
        "",
        "1c6179cbb1c2dc74e038a4a9bc9b01252c0e25adbbbfad93f1b26b14cc915695"
        );
    return encryptedString(key,password+"\x01");
}
function fetchCookieData() {
    var remember = $.cookie('remember_'+window.language);
    if(remember == 'true') {
        var server = $.cookie('server_'+window.language);
        var username = $.cookie('username_'+window.language);
        var password = $.cookie('password_'+window.language);
        $('#serverLogin').val(server);
        $('#loginForm').attr('action',"http://"+server+"/game/reg/login2.php");
        $('#usernameLogin').attr('value',username);
        $('#passwordLogin').attr('value',password);
    }
}
function clearCookieData() {
    $.cookie('server_'+window.language, null);
    $.cookie('username_'+window.language, null);
    $.cookie('password_'+window.language, null);
    $.cookie('remember_'+window.language,null);
    $.cookie('serverList_'+window.language, null);
}
function in_array(item,arr)
{
    for(p=0;p<arr.length;p++) if (item == arr[p]) return true;
    return false;
}