<div id="mainview">

  <div class="buildingDescription">
    <h1>Настройки</h1>
    <p>Здесь Вы можете изменить имя игрока, пароль и адрес электронной почты. Адрес электронной почты можно изменить только один раз в неделю, при этом использоваться могут только цифры, буквы и пробелы.</p>
  </div><!-- ende .buildingDescription -->

<?if($this->Player_Model->user->register_complete == 0 and $this->config->item('game_email')){?>
  <div class="contentBox01h" id="emailInvalidWarning">
    <h3 class="header"><span class="textLabel">Ваш адрес e-mail не был подтвержден!</span></h3>
    <div class="content">
      <p>Ваш адрес e-mail не был подтвержден. Пока Вы его не подтвердите, Вы не сможете полноценно играть. Адрес e-mail можно  подтвердить через нажатие на ссылку в письме. Если Вы не получили такого письма, его можно запросить заново здесь.</p>
      <div class="centerButton">
          <a class="button" href="<?=$this->config->item('base_url')?>actions/options/validationEmail/">Отправить письмо с подтверждением</a>
      </div>
    </div>
    <div class="footer"></div>
  </div>
<?}?>

<?if($this->session->flashdata('options_error')){?>
<div class="contentBox01h">
    <h3 class="header"><span class="textLabel">Сообщение об ошибке</span></h3>
    <div class="content">
        <ul class="errors">
<?if($this->session->flashdata('options_error_login')){?>
            <li><?=$this->session->flashdata('options_error_login')?></li>
<?}?>
        </ul>
    </div>
    <div class="footer"></div>
</div>
<?}?>

  <div class="contentBox01h">
    <h3 class="header"><span class="textLabel">Настройки</span></h3>
    <div class="content">
      <form  action="<?=$this->config->item('base_url')?>actions/options/user/" method="POST">
      
      <div id="options_userData">
        <table cellpadding="0" cellspacing="0">
          <tr>
            <th>Переименовать игрока</th>
            <td><input class="textfield" type="text" name="name" size="15" value="<?=$this->Player_Model->user->login?>"></td>
          </tr>

        </table>
      </div>

      <div id="options_changePass">
        <h3>Изменить пароль</h3>
        <table cellpadding="0" cellspacing="0">
          <tr>
            <th>Прежний пароль</th>
            <td><input type="password" class="textfield" name="oldPassword" size="20"></td>
          </tr>
          <tr>
            <th>Новый пароль</th>
            <td><input type="password" class="textfield" name="newPassword" size="20"></td>
          </tr>
          <tr>
            <th>Подтверждение нового пароля</th>
            <td><input type="password" class="textfield" name="newPasswordConfirm" size="20"></td>
          </tr>
        </table>
      </div>

    <div>
    <h3>Разное</h3>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>Показать доп. информацию в выборе городов</th>
            <td>
                <select name="citySelectOptions" size="1">
                    <option value="0" <?if($this->Player_Model->user->options_select == 0){?>selected="selected"<?}?>>Нет</option>
                    <option value="1" <?if($this->Player_Model->user->options_select == 1){?>selected="selected"<?}?>>Показать координаты в обзоре городов</option>
                    <option value="2" <?if($this->Player_Model->user->options_select == 2){?>selected="selected"<?}?>>Товары</option>
                    </select>
                </td>
            </tr>
<?if($this->Player_Model->user->tutorial < 999){?>
        <tr>
            <th>Обучение</th>
            <td>
                <select name="tutorialOptions" size="1">
                    <option value="2"selected>Включить</option>
                    <option value="-2">Отключить</option>
                    </select>
                </td>
        </tr>
<?}?>
        </table>
    </div>

      <div id="options_debug">
      <h3>Debugdata</h3>
      <table cellpadding="0" cellspacing="0">
        <tr>
          <th>Player-ID:</th>
          <td> <?=$this->Player_Model->user->id?></td>
        </tr>
        <tr>
          <th>Current City-ID: </th>
          <td><?=$this->Player_Model->user->town?></td>
        </tr>
      </table>
      </div>


      <div class="centerButton">
        <input type="submit" class="button" value="Сохранить">
      </div>
      </form>
      </div>
      <div class="footer"></div>
    </div>



    <div class="contentBox01h">
    <h3 class="header"><span class="textLabel">Изменить e-mail</span></h3>
    <div class="content">
      <form  action="<?=$this->config->item('base_url')?>actions/options/email/" method="POST">
      <table cellpadding="0" cellspacing="0">

      <tr>
            <th>Изменить e-mail</th>
            <td>
                                <input class="textfield" type="text" name="email" size="30" value="<?=$this->Player_Model->user->email?>">
                                (<?=$this->Player_Model->user->email?>)
            </td>
          </tr>

           <tr>
          	<th>введите пароль для подтверждения нового адреса e-mail</th>
          	<td><input type="password" class="textfield" name="emailPassword" size="20"/></td>
          </tr>
      </table>
      <div class="centerButton">
          <input type="submit" class="button" value="Изменить e-mail">
      </div>
      </form>
      </div>
      <div class="footer"></div>
    </div>

      <div class="contentBox01h" id="vacationMode">
        <h3 class="header"><span class="textLabel">Включить Режим Отпуска</span></h3>
        <div class="content">
          <p>Здесь вы можете активировать режим отпуска. Это означает, что ваш игровой аккаунт не будет удален из-за неактивности и ваши города не будут атакованы в течении этого времени. Ваши рабочие и ученые остановят свою работу. В режим отпуска вы можете входить минимум на 48 часов. Вы не можете играть в Икариам в течении этого времени. По прошествии этих двух дней, ваш отпуск автоматически прекратится, как только вы зайдете в игру.</p>
          <p class="warningFont">Внимание! Флоты и армии, вышедшие из ваших городов будут реорганизованы и возвращены обратно, как только вы войдете в режим отпуска! Товары на борту будут потеряны!</p>
            <div class="centerButton">
                <a class="button" href="<?=$this->config->item('base_url')?>game/options_umod_confirm/">Включить Режим Отпуска</a>
            </div>
        </div>
        <div class="footer"></div>
      </div>


      <div class="contentBox01h" id="deletionMode">
        <h3 class="header"><span class="textLabel">Удаление аккаунта</span></h3>
        <div class="content">
          <p>Если Вы больше не хотите играть, можете удалить свой аккаунт здесь. Он будет удален через семь дней.</p>
          <br>
          <div class="centerButton">
            <a class="button" href="<?=$this->config->item('base_url')?>game/options_deletion_confirm/">Удалить аккаунт!</a>
          </div>
          <br>
        </div>
        <div class="footer"></div>
      </div>



</div> 