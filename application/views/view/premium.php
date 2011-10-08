<div id="mainview">
    <h1>Икариам Плюс</h1>
    <div id="premiumOffers" class="contentBox01h">
        <h3 class="header">Икариам ПЛЮС</h3>
        <div class="content">
            <p>Икариам ПЛЮС предоставит Вам возможность вести свою империю по пути богатства и процветания. Приобретите немного амброзии, и тогда Ваши советники и работники приятно удивят Вас качеством своей работы!
    Вы можете выбрать следующие бонусы:</p>
            <table class="TableHoriMax Account">
                <tr>
                    <th class="feature">Особенности ПЛЮСА</th>
                    <th class="duration">Время</th>
                    <th class="cost">Стоимость</th>
                    <th class="buy">&nbsp;</th>
                </tr>
                <tr class="account">
                    <td class="feature" rowspan="2">
                      <h4>Премиум аккаунт</h4>
                      <p>С Икариам ПЛЮС Вы получите улучшенные обзоры и полный контроль над своей островной империей.</p>
                      <a href="<?=$this->config->item('base_url')?>game/premiumDetails/">Подробнее об Икариам ПЛЮС</a>
                    </td>
                    <td class="duration">7&nbsp;д.</td>
                    <td class="cost">10&nbsp;<img src="<?=$this->config->item('style_url')?>skin/premium/ambrosia_icon.gif" width="24" height="20" alt="Амброзия" /></td>
                    <td class="buy" rowspan="2">
<?if($this->Player_Model->user->ambrosy >= 10){?>
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>actions/premium/account/" class="button" title="Купить">Купить</a>
        </div>
<?}else{?>
                      <a class="notenough" href="<?=$this->config->item('base_url')?>game/premiumPayment/">Не хватает 10 ед. амброзии!<br><span class="buyNow">Купить!</span></a>
<?}?>
                    </td>
                </tr>
                <tr>
<?if($this->Player_Model->user->premium_account > 0){?>
                    <td class="active" colspan="3"><br>Осталось <?=premium_time($this->Player_Model->user->premium_account-time())?></td>
<?}else{?>
                    <td class="inactive" colspan="3">Не активен</td>
<?}?>
                </tr>
            </table>

            <table class="TableHoriMax">
                <tr>
                    <th class="feature">Бонусы ПЛЮСА</th>
                    <th class="duration">Время</th>
                    <th class="cost">Стоимость</th>
                    <th class="buy">&nbsp;</th>
                </tr>

                <tr class="woodbonus">
                    <td class="feature" rowspan="2">
                      <h4>20% больше стройматериалов</h4>
                      <p>Во время действия бонуса  на всех Ваших островах будет добываться на 20% больше стройматериалов!</p>
                    </td>
                    <td class="duration">7&nbsp;д.</td>
                    <td class="cost">10&nbsp;<img src="<?=$this->config->item('style_url')?>skin/premium/ambrosia_icon.gif" width="24" height="20" alt="Амброзия" /></td>
                    <td class="buy"  rowspan="2">
<?if($this->Player_Model->user->ambrosy >= 10){?>
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>actions/premium/wood/" class="button" title="Купить">Купить</a>
        </div>
<?}else{?>
                      <a class="notenough" href="<?=$this->config->item('base_url')?>game/premiumPayment/">Не хватает 10 ед. амброзии!<br><span class="buyNow">Купить!</span></a>
<?}?>
                    </td>
                </tr>

                <tr>
<?if($this->Player_Model->user->premium_wood > 0){?>
                    <td class="active" colspan="3"><br>Осталось <?=premium_time($this->Player_Model->user->premium_wood-time())?></td>
<?}else{?>
                    <td class="inactive" colspan="3">Не активен</td>
<?}?>
                </tr>

                <tr style="background-image:url(<?=$this->config->item('style_url')?>skin/premium/table_border_2.gif); background-repeat:no-repeat; background-position:center;">
                    <td colspan=4></td>
                </tr>

                <tr class="marblebonus">
                    <td class="feature" rowspan="2">
                      <h4>20% больше мрамора</h4>
                      <p>Во время действия бонуса  на всех Ваших островах будет добываться на 20% больше мрамора!</p>
                    </td>
                    <td class="duration">7&nbsp;д.</td>
                    <td class="cost">8&nbsp;<img src="<?=$this->config->item('style_url')?>skin/premium/ambrosia_icon.gif" width="24" height="20" alt="Амброзия" /></td>
                    <td class="buy"  rowspan="2">
<?if($this->Player_Model->user->ambrosy >= 8){?>
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>actions/premium/marble/" class="button" title="Купить">Купить</a>
        </div>
<?}else{?>
                      <a class="notenough" href="<?=$this->config->item('base_url')?>game/premiumPayment/">Не хватает 8 ед. амброзии!<br><span class="buyNow">Купить!</span></a>
<?}?>
                    </td>
                </tr>

                <tr>
<?if($this->Player_Model->user->premium_marble > 0){?>
                    <td class="active" colspan="3"><br>Осталось <?=premium_time($this->Player_Model->user->premium_marble-time())?></td>
<?}else{?>
                    <td class="inactive" colspan="3">Не активен</td>
<?}?>
                </tr>

                <tr style="background-image:url(<?=$this->config->item('style_url')?>skin/premium/table_border_2.gif); background-repeat:no-repeat; background-position:center;">
                    <td colspan=4></td>
                </tr>

                <tr class="sulfurbonus">
                    <td class="feature" rowspan="2">
                      <h4>20% больше серы</h4>
                      <p>Во время действия бонуса  на всех Ваших островах будет добываться на 20% больше серы!</p>
                    </td>
                    <td class="duration">7&nbsp;д.</td>
                    <td class="cost">3&nbsp;<img src="<?=$this->config->item('style_url')?>skin/premium/ambrosia_icon.gif" width="24" height="20" alt="Амброзия" /></td>
                    <td class="buy"  rowspan="2">
<?if($this->Player_Model->user->ambrosy >= 3){?>
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>actions/premium/sulfur/" class="button" title="Купить">Купить</a>
        </div>
<?}else{?>
                      <a class="notenough" href="<?=$this->config->item('base_url')?>game/premiumPayment/">Не хватает 3 ед. амброзии!<br><span class="buyNow">Купить!</span></a>
<?}?>
                    </td>
                </tr>

                <tr>
<?if($this->Player_Model->user->premium_sulfur > 0){?>
                    <td class="active" colspan="3"><br>Осталось <?=premium_time($this->Player_Model->user->premium_sulfur-time())?></td>
<?}else{?>
                    <td class="inactive" colspan="3">Не активен</td>
<?}?>
                </tr>

                <tr style="background-image:url(<?=$this->config->item('style_url')?>skin/premium/table_border_2.gif); background-repeat:no-repeat; background-position:center;">
                    <td colspan=4></td>
                </tr>

                <tr class="crystalbonus">
                    <td class="feature" rowspan="2">
                      <h4>20% больше хрусталя</h4>
                      <p>Во время действия бонуса  на всех Ваших островах будет добываться на 20% больше хрусталя!</p>
                    </td>
                    <td class="duration">7&nbsp;д.</td>
                    <td class="cost">5&nbsp;<img src="<?=$this->config->item('style_url')?>skin/premium/ambrosia_icon.gif" width="24" height="20" alt="Амброзия" /></td>
                    <td class="buy"  rowspan="2">
<?if($this->Player_Model->user->ambrosy >= 5){?>
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>actions/premium/crystal/" class="button" title="Купить">Купить</a>
        </div>
<?}else{?>
                      <a class="notenough" href="<?=$this->config->item('base_url')?>game/premiumPayment/">Не хватает 5 ед. амброзии!<br><span class="buyNow">Купить!</span></a>
<?}?>
                    </td>
                </tr>

                <tr>
<?if($this->Player_Model->user->premium_crystal > 0){?>
                    <td class="active" colspan="3"><br>Осталось <?=premium_time($this->Player_Model->user->premium_crystal-time())?></td>
<?}else{?>
                    <td class="inactive" colspan="3">Не активен</td>
<?}?>
                </tr>

                <tr style="background-image:url(<?=$this->config->item('style_url')?>skin/premium/table_border_2.gif); background-repeat:no-repeat; background-position:center;">
                    <td colspan=4></td>
                </tr>

                <tr class="winebonus">
                    <td class="feature" rowspan="2">
                      <h4>20% больше винограда</h4>
                      <p>Во время действия бонуса  на всех Ваших островах будет добываться на 20% больше винограда!</p>
                    </td>
                    <td class="duration">7&nbsp;д.</td>
                    <td class="cost">3&nbsp;<img src="<?=$this->config->item('style_url')?>skin/premium/ambrosia_icon.gif" width="24" height="20" alt="Амброзия" /></td>
                    <td class="buy"  rowspan="2">
<?if($this->Player_Model->user->ambrosy >= 3){?>
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>actions/premium/wine/" class="button" title="Купить">Купить</a>
        </div>
<?}else{?>
                      <a class="notenough" href="<?=$this->config->item('base_url')?>game/premiumPayment/">Не хватает 3 ед. амброзии!<br><span class="buyNow">Купить!</span></a>
<?}?>
                    </td>
                </tr>

                <tr>
<?if($this->Player_Model->user->premium_wine > 0){?>
                    <td class="active" colspan="3"><br>Осталось <?=premium_time($this->Player_Model->user->premium_wine-time())?></td>
<?}else{?>
                    <td class="inactive" colspan="3">Не активен</td>
<?}?>
                </tr>

                <tr style="background-image:url(<?=$this->config->item('style_url')?>skin/premium/table_border_2.gif); background-repeat:no-repeat; background-position:center;">
                    <td colspan=4></td>
                </tr>

                <tr class="savecapacityBonus">
                    <td class="feature" rowspan="2">
                      <h4>Увеличивает размер секретного хранилища в складах на 100%.</h4>
                      <p>Вы получаете дополнительный бонус к резервируемым ресурсам в складах в размере 100%.</p>
                    </td>
                    <td class="duration">7&nbsp;д.</td>
                    <td class="cost">14&nbsp;<img src="<?=$this->config->item('style_url')?>skin/premium/ambrosia_icon.gif" width="24" height="20" alt="Амброзия" /></td>
                    <td class="buy"  rowspan="2">
<?if($this->Player_Model->user->ambrosy >= 14){?>
        <div class="centerButton">
            <a href="<?=$this->config->item('base_url')?>actions/premium/capacity/" class="button" title="Купить">Купить</a>
        </div>
<?}else{?>
                      <a class="notenough" href="<?=$this->config->item('base_url')?>game/premiumPayment/">Не хватает 14 ед. амброзии!<br><span class="buyNow">Купить!</span></a>
<?}?>
                    </td>
                </tr>

                <tr>
<?if($this->Player_Model->user->premium_capacity > 0){?>
                    <td class="active" colspan="3"><br>Осталось <?=premium_time($this->Player_Model->user->premium_capacity-time())?></td>
<?}else{?>
                    <td class="inactive" colspan="3">Не активен</td>
<?}?>
                </tr>

            </table>
        </div>
        <div class="footer"></div>
    </div>
</div>