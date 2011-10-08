<div class="yui-skin-sam" style="z-index: 9999999999; position: absolute;">
    <div id="examplecontainer" >
        <div id="resizablepanel">
            <div class="hd">
                <div class="div1">
                    <div class="div2">
                        <p><?=$this->lang->line('notes')?>
                            <span>
                                <a href="javascript:switchNoteDisplay()"><img src="<?=$this->config->item('style_url')?>skin/layout/notes_close.gif"/></a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="bd">
                <div class="rightborder">
                    <div id="messageBox">
                        <textarea id="message"><?=$this->Player_Model->notes->text?></textarea>
                    </div>
                </div>
            </div>

            <div class="ft">
                <div class="bottom">
                    <span class="chars" id="chars"></span><?=$this->lang->line('characters')?> 
                </div>
            </div>

            <center>
                <div class="button2">
                    <a href="javascript:switchNoteDisplay()" class="button notice"><?=$this->lang->line('ok')?> </a>
                </div>
            </center>

        </div>
    </div>
</div>