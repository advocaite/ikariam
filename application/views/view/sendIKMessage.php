<div id="mainview">
    <h1>Создать сообщение</h1>
    <p>Вы можете написать сообщение другим игрокам или предложить им какой-либо договор - по мере того как Вы исследовали различные типы договоров.</p>

    <div id="notice">
        <form action="<?=$this->config->item('base_url')?>actions/messages/send/<?=$param1?>/" method="post">
            <div id="mailRecipient">
                <span class="maillabels"><label>Получатель:</label></span>
                <span><?=$this->Data_Model->temp_users_db[$param1]->login?></span>
            </div>
            <div id="mailSubject">
                <span class="maillabels"><label for="treaties">Тема:</label></span>
                <span>
                    <select name="msgType" id="treaties">
                        <option value="1" selected="selected">Сообщение</option>
                    </select>
                </span>
            </div>
            <span class="maillabels"><label for="text">Сообщение:</label></span><br />
            <span><textarea id="text" class="textfield" name="content" ></textarea></span><br />
            <div id="nr_chars_div" style="display:none">Доступно  <span id="nr_chars"></span>&nbsp;  символов.</div>
            <div class="centerButton">
                <input type="submit" class="button" onclick="return confirmIfNeccessary(document.getElementById('treaties').value,'Вы уверены?')" title="Отправить" value="Отправить">
            </div>
        </form>
    </div>
    <script type="text/javascript">
    function strLen(str) {
        var newStr = str.replace(/(\r\n)|(\n\r)|\r|\n/g,"\n");
        return newStr.length;
    }
    messagesThatNeedConfirm = new Array();
    messagesThatNeedConfirm[0] = 64;
    messagesThatNeedConfirm[1] = 70;
    messagesThatNeedConfirm[2] = 75;
    messagesThatNeedConfirm[3] = 76;
    messagesThatNeedConfirm[4] = 81;
    messagesThatNeedConfirm[5] = 87;
    messagesThatNeedConfirm[6] = 94;
    messagesThatNeedConfirm[7] = 93;
    messagesThatNeedConfirm[8] = 99;
    function confirmIfNeccessary(msgType,confirmText){
        var confirm = false;
        for (elem in messagesThatNeedConfirm) {
            if (messagesThatNeedConfirm[elem] == msgType){
                confirm = true;
            }
        }
        if (confirm == true){
            return window.confirm (confirmText);
        } else{
            return true;
        }

    };
    YAHOO.util.Event.addListener("text", "keyup", function() {
        var nr_chars = 8000-strLen(document.getElementById('text').value);
        if (nr_chars<0) {
            document.getElementById('nr_chars').innerHTML='<span style="color: #f00; font-weight: bold">' + nr_chars + '</span>';
        } else {
            document.getElementById('nr_chars').innerHTML=nr_chars;
        }
        document.getElementById('nr_chars_div').style.display='block';
    });
    </script>
</div>