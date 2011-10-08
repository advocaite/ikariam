<?
class Game extends Controller {

	function Game()
	{
		parent::Controller();

                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
                header("Cache-Control: no-cache, must-revalidate");
                header("Cache-Control: post-check=0,pre-check=0", false);
                header("Cache-Control: max-age=0", false);
                header("Pragma: no-cache");

                $this->load->model('Player_Model');
                if (!$this->session->userdata('login'))
                {
                    $this->Player_Model->Error($this->lang->line('error_session'));
                }
                else
                {
                    // Загружаем пользователя
                    $this->Player_Model->Load_Player($this->session->userdata('id'));
                    if (isset($_POST['cityId']) and isset($this->Data_Model->temp_towns_db[$_POST['cityId']]) and $_POST['cityId'] > 0)
                    {
                        $this->Player_Model->town_id = ($_POST['cityId'] > 0) ? intval($_POST['cityId']) : $this->Player_Model->town_id;
                        $this->Player_Model->now_town = $this->Player_Model->towns[$this->Player_Model->town_id];
                        $this->db->set('town', $this->Player_Model->town_id);
                        $this->db->where(array('id' => $this->Player_Model->user->id));
                        $this->db->update($this->session->userdata('universe').'_users');
                    }
                    $this->load->model('Update_Model');
                    // Отмечаем здания в очереди на карте
                    $this->Player_Model->correct_buildings();
                    $this->Player_Model->Load_New_Town_Messages();
                    $this->Player_Model->Load_New_User_To_Messages();
                    $this->load->model('View_Model');
                    
                }
	}


    /**
     * Выход из игры
     */
    function logout()
    {
        $this->session->unset_userdata('login');
        redirect('/', 'refresh');
    }

    /**
     * Страница по умолчанию
     */
    function index()
    {
        $this->show('city');
    }

    /**
     * Страница города
     */
    function city($id = 0, $relocation = 'city', $reposition = 0)
    {
        if ($id > 0 and $id != $this->Player_Model->town_id and isset($this->Data_Model->temp_towns_db[$id]) and $this->Data_Model->temp_towns_db[$id]->user == $this->Player_Model->user->id)
        {
            // Меняем город
            $this->Player_Model->town_id = $id;
            $this->Player_Model->now_town = $this->Player_Model->towns[$id];
            // Пишем в базу
            $this->db->set('town', $this->Player_Model->town_id);
            $this->db->where(array('id' => $this->Player_Model->user->id));
            $this->db->update($this->session->userdata('universe').'_users');
        }
        if ($relocation != 'city')
        {
            $this->$relocation($reposition);
        }
        else
        {
            $this->index();
        }
    }

    /**
     * Страница построек
     * @param <int> $position
     */
    function buildingGround($position = 0)
    {
            if ($position > 0)
            {
                $level = 'pos'.$position.'_level';
                if ($this->Player_Model->now_town->$level == 0)
                {
                    $this->show('buildingGround', $position);
                }
                else
                {
                    $this->show('error',$this->lang->line('error_buildingground_null'));
                }
            }
            else
            {
                $this->city();
            }
    }

    /**
     * Страница острова
     * @param <int> $id
     */
    function island($id = 0, $town = -1)
    {
        if ($id == 0)
        {
            $id = $this->Player_Model->island_id;
        }
        $this->load->model('Island_Model');
        $this->Island_Model->Load_Island($id);
        $this->show('island', $id, $town);
    }

    /**
     * Лес
     * @param <int> $id
     */
    function resource($id = 0)
    {
        $town_id = 0;
        if ($id > 0 and $id != $this->Player_Model->island_id and isset($this->Data_Model->temp_islands_db[$id]))
        {
            foreach ($this->Player_Model->towns as $town)
                if ($town->island == $id) $town_id = $town->id;
            if ($town_id > 0 and isset($this->Player_Model->towns[$town_id]))
            {
                // Меняем город
                $this->Player_Model->town_id = $town_id;
                $this->Player_Model->now_town = $this->Player_Model->towns[$town_id];
                // Пишем в базу
                $this->db->set('town', $town_id);
                $this->db->where(array('id' => $this->Player_Model->user->id));
                $this->db->update($this->session->userdata('universe').'_users');
            }
        }
        if ($id == 0)
        {
            $id = $this->Player_Model->island_id;
        }
        $this->load->model('Island_Model');
        $this->Island_Model->Load_Island($id);
        $this->show('resource', $id);
    }

    function tradegood($id = 0)
    {
        if ($id == 0)
        {
            $id = $this->Player_Model->island_id;
        }
        $this->load->model('Island_Model');
        $this->Island_Model->Load_Island($id);
        $this->show('tradegood', $id);
    }

    /**
     * Ратуша
     * @param <int> $position
     */
    function townHall()
    {
        $this->show('townHall', 0);
    }

    /**
     * Переименовать город
     */
    function renameCity()
    {
        $this->show('renameCity');
    }

    /**
     * Помощь
     * @param <int> $id
     */
    function informations($id = 6)
    {
        $this->show('informations', $id);
    }

    /**
     * Академия
     * @param <int> $position
     */
    function academy()
    {
        $position = $this->Data_Model->get_position(3, $this->Player_Model->now_town);
        if ($position == 0)
        {
            $this->show('error',$this->lang->line('error_academy_null'));
        }
        else
        {
            $this->show('academy', $position);
        }
    }

    function port()
    {
        $position = $this->Data_Model->get_position(2, $this->Player_Model->now_town);
        if ($position == 0)
        {
            $this->show('error',$this->lang->line('error_port_null'));
        }
        else
        {
            $this->show('port', $position);
        }
    }

    /**
     * Казармы
     * @param <int> $position
     */
    function barracks()
    {
        $position = $this->Data_Model->get_position(5, $this->Player_Model->now_town);
        if ($position == 0)
        {
            $this->show('error',$this->lang->line('error_barracks_null'));
        }
        else
        {
            $this->show('barracks', $position);
        }
    }

    function tavern()
    {
        $position = $this->Data_Model->get_position(8, $this->Player_Model->now_town);
        if ($position == 0)
        {
            $this->show('error',$this->lang->line('error_tavern_null'));
        }
        else
        {
            $this->show('tavern', $position);
        }
    }

    function shipyard()
    {
        $position = $this->Data_Model->get_position(4, $this->Player_Model->now_town);
        if ($position == 0)
        {
            $this->show('error',$this->lang->line('error_shipyard_null'));
        }
        else
        {
            $this->show('shipyard', $position);
        }
    }

    function palace()
    {
        $position = $this->Data_Model->get_position(10, $this->Player_Model->now_town);
        if ($position == 0)
        {
            $this->show('error',$this->lang->line('error_palace_null'));
        }
        else
        {
            $this->show('palace', $position);
        }
    }

    function palaceColony($action = '')
    {
        $position = $this->Data_Model->get_position(15, $this->Player_Model->now_town);
        if ($position == 0)
        {
            $this->show('error',$this->lang->line('error_palace_colony_null'));
        }
        else
        {
            $this->show('palaceColony', $position, $action);
        }
    }

    function carpentering()
    {
        $position = $this->Data_Model->get_position(21, $this->Player_Model->now_town);
        if ($position == 0)
        {
            $this->show('error',$this->lang->line('error_carpentering_null'));
        }
        else
        {
            $this->show('carpentering', $position);
        }
    }

    function safehouse($page = 'safehouse')
    {
        $position = $this->Data_Model->get_position(14, $this->Player_Model->now_town);
        foreach($this->Player_Model->spyes[$this->Player_Model->town_id] as $spy)
        {
            $this->Data_Model->Load_Town($spy->to);
            $this->Data_Model->Load_Island($this->Data_Model->temp_towns_db[$spy->to]->island);
        }
        if ($position == 0)
        {
            $this->show('error',$this->lang->line('error_safehouse_null'));
        }
        else
        {
            if ($page == 'reports') { $this->Player_Model->Load_Spyes_Messages(); }
            $this->show('safehouse', $position, $page);
        }
    }

    function branchOffice($position = 0, $desc = 'ressDesc')
    {
        $position = $this->Data_Model->get_position(12, $this->Player_Model->now_town);
        if ($position == 0)
        {
            $this->show('error',$this->lang->line('error_branch_office_null'));
        }
        else
        {
            $this->show('branchOffice', $position, $desc);
        }
    }

    /**
     * Премиум-возможности
     */
    function premium()
    {
        $this->show('premium');
    }

    function premiumDetails()
    {
        $this->show('premiumDetails');
    }

    /**
     * Получение амброзии
     */
    function premiumPayment()
    {
        $this->show('premiumPayment');
    }

    /**
     * Заметки
     */
    function avatarNotes()
    {
        $this->load->helper('cookie');
        $this->load->view('avatarNotes');
    }

    /**
     * Советник по исследованиям
     */
    function researchAdvisor()
    {
        $this->show('researchAdvisor');
    }

    function militaryAdvisorMilitaryMovements()
    {
        $this->show('militaryAdvisorMilitaryMovements');
    }

    /**
     * Информация по исследованиям
     * @param <int> $way
     * @param <int> $id
     */
    function researchDetail($way = 1, $id = 1)
    {
        if ($way == 2){$id = $id + 14;}
        if ($way == 3){$id = $id + 14+15;}
        if ($way == 4){$id = $id + 14+15+16;}
        $this->show('researchDetail', $id);
    }

    /**
     * Карта мира
     * @param <int> $x
     * @param <int> $y
     */
    function worldmap_iso($x = 0, $y = 0)
    {
        $id = $this->Player_Model->island_id;
        $this->load->model('Island_Model');
        $this->Island_Model->Load_Island($id);
        $x = ($x == 0) ? $this->Island_Model->island->x : $x ;
        $y = ($y == 0) ? $this->Island_Model->island->y : $y ;
        $this->show('worldmap_iso', $x, $y);
    }

    /**
     * Подтверждление сноса
     * @param <int> $position
     */
    function demolition($position = 0)
    {
        $this->show('demolition', $position);
    }

    /**
     * Информация о здании
     * @param <int> $id
     */
    function buildingDetail($id = 1)
    {
        $this->show('buildingDetail', $id);
    }

    /**
     * Роспуск войск
     */
    function armyGarrisonEdit()
    {
        $position = $this->Data_Model->get_position(5, $this->Player_Model->now_town);
        if ($position == 0)
        {
            $this->show('error','Казарма еще не построена!');
        }
        else
        {
            $this->show('armyGarrisonEdit', $position);
        }
    }

    function fleetGarrisonEdit()
    {
        $position = $this->Data_Model->get_position(4, $this->Player_Model->now_town);
        if ($position == 0)
        {
            $this->show('error','Верфь еще не построена!');
        }
        else
        {
            $this->show('fleetGarrisonEdit', $position);
        }
    }

    function tradeAdvisor($message_id = 0)
    {
        // Загружаем сообщения
        $this->Player_Model->Load_Town_Messages();
        $this->load->library('pagination');
        $this->show('tradeAdvisor', $message_id);
    }

    function tradeAdvisorTradeRoute($action = '')
    {
        $this->show('tradeAdvisorTradeRoute', $action);
    }

    function diplomacyAdvisor()
    {
        $this->Player_Model->Load_User_Messages();
        $this->show('diplomacyAdvisor');
    }

    function diplomacyAdvisorOutBox()
    {
        $this->Player_Model->Load_User_Messages();
        $this->show('diplomacyAdvisorOutBox');
    }

    function sendIKMessage($id = 0, $island = 0)
    {
        if ($id > 0 and $id != $this->Player_Model->user->id)
        {
            $this->Data_Model->Load_User($id);
            if (isset($this->Data_Model->temp_users_db[$id]))
            {
                $this->show('sendIKMessage', $id, $island);
            }
            else
            {
                $this->show('error','Игрок не найден!');
            }
        }
        else
        {
            $this->show('error','Вы не сможете отправить сообщение самому себе!');
        }
    }

    function error()
    {
        $this->show('error');
    }

    function cityMilitary($type = 'army')
    {
        $this->show('cityMilitary', $type);
    }

    function warehouse($position = 0)
    {
        $pos_type = 'pos'.$position.'_type';
        if ($position == 0 or $this->Player_Model->now_town->$pos_type != 6)
        {
            $this->show('error','Склад еще не построен!');
        }
        else
        {
            $this->show('warehouse', $position);
        }
    }

    function options()
    {
        $this->show('options');
    }

    function wall()
    {
        if ($this->Player_Model->now_town->pos14_type != 7)
        {
            $this->show('error','Городская стена еще не построена!');
        }
        else
        {
            $this->show('wall', 14);
        }
    }

    function plunder($island = 0, $id = 0)
    {
       if($island > 0 and $id >= 0)
       {
           if(isset($this->Data_Model->temp_towns_db[$id]) and $this->Data_Model->temp_towns_db[$id]->user == $this->Player_Model->user->id)
           {
               $this->show('error', 'Невозможно ограбить свой город!');
           }
           else
           {
               if ($island == 0)
               {
                   $island = $this->Player_Model->island_id;
               }
               $this->load->model('Island_Model');
               $this->Island_Model->Load_Island($island);
               $this->show('plunder', $id);
           }
       }
       else
       {
           $this->show('error', 'Город не найден!');
       }
    }

    function finances()
    {
        $this->show('finances');
    }

    function colonize($island = 0, $position = 0)
    {

        if ($island == 0)
        {
            $island = $this->Player_Model->island_id;
        }
        $this->load->model('Island_Model');
        $this->Island_Model->Load_Island($island);
        $city_text = 'city'.$position;
        if($this->Island_Model->island->$city_text > 0)
        {
            $this->show('error','Стройплощадка уже занята!');
        }
        else
        {
            $this->show('colonize', $island, $position);
        }
    }

    function merchantNavy()
    {
        $this->show('merchantNavy');
    }

    function transport($island = 0, $id = 0)
    {
        if ($island == 0)
        {
            $island = $this->Player_Model->island_id;
        }
        $this->load->model('Island_Model');
        $this->Island_Model->Load_Island($island);
        $this->Data_Model->Load_Town($id);
        if(!isset($this->Data_Model->temp_towns_db[$id]) or $this->Data_Model->temp_towns_db[$id]->island != $this->Island_Model->island->id)
        {
            $this->show('error','Город не найден!');
        }
        else
        {
            $this->show('transport', $id);
        }
    }

    function sendSpy($island = 0, $id = 0)
    {
        if ($island == 0)
        {
            $island = $this->Player_Model->island_id;
        }
        $this->load->model('Island_Model');
        $this->Island_Model->Load_Island($island);
        $this->Data_Model->Load_Town($id);
        if(!isset($this->Data_Model->temp_towns_db[$id]) or $this->Data_Model->temp_towns_db[$id]->island != $this->Island_Model->island->id)
        {
            $this->show('error','Город не найден!');
        }
        else
        {
            $this->show('sendSpy', $id);
        }
    }

    function premiumTradeAdvisor($page = 'resources')
    {
        if($this->Player_Model->user->premium_account > 0)
        {
            $this->show('premiumTradeAdvisor', $page);
        }
        else
        {
            $this->tradeAdvisor();
        }
        
    }

    function takeOffer($town = 0, $type = 0, $resource = 0)
    {
        $this->show('takeOffer', $town, $type, $resource);
    }

    function researchOverview()
    {
        $position = $this->Data_Model->get_position(3, $this->Player_Model->now_town);
        if ($position == 0)
        {
            $this->show('error','Академия еще не построена!');
        }
        else
        {
            $this->show('researchOverview');
        }
    }

    function abolishColony()
    {
        $this->show('abolishColony');
    }

    function safehouseMissions($spy = 0)
    {
        if ($spy > 0 and isset($this->Player_Model->spyes[$this->Player_Model->town_id][$spy]))
        {
            $this->Data_Model->Load_Town($this->Player_Model->spyes[$this->Player_Model->town_id][$spy]->to);
            $this->show('safehouseMissions', $spy);
        }
        else
        {
            $this->show('error','Шпион не найден!');
        }
    }

    function safehouseReports($id = 0)
    {
        $message_query = $this->db->get_where($this->session->userdata('universe').'_spy_messages', array('id' => $id), 1, '');
        $message = $message_query->row();
        if ($id > 0 and $message_query->num_rows == 1 and $message->user == $this->Player_Model->user->id)
        {
            $this->Data_Model->Load_Town($message->to);
            $this->show('safehouseReports', $message);
        }
        else
        {
            $this->show('error','Доклад не найден!');
        }
    }

    function forester($position = 0)
    {
        $pos_type = 'pos'.$position.'_type';
        if ($position == 0 or $this->Player_Model->now_town->$pos_type != 16)
        {
            $this->show('error','Хижина лесничего еще не построена!');
        }
        else
        {
            $this->show('forester', $position);
        }
    }

    function glassblowing($position = 0)
    {
        $pos_type = 'pos'.$position.'_type';
        if ($position == 0 or $this->Player_Model->now_town->$pos_type != 18)
        {
            $this->show('error','Стеклодувная мастерская еще не построена!');
        }
        else
        {
            $this->show('glassblowing', $position);
        }
    }

    function stonemason($position = 0)
    {
        $pos_type = 'pos'.$position.'_type';
        if ($position == 0 or $this->Player_Model->now_town->$pos_type != 17)
        {
            $this->show('error','Каменоломня еще не построена!');
        }
        else
        {
            $this->show('stonemason', $position);
        }
    }

    function winegrower($position = 0)
    {
        $pos_type = 'pos'.$position.'_type';
        if ($position == 0 or $this->Player_Model->now_town->$pos_type != 19)
        {
            $this->show('error','Винодельня еще не построена!');
        }
        else
        {
            $this->show('winegrower', $position);
        }
    }

    function alchemist($position = 0)
    {
        $pos_type = 'pos'.$position.'_type';
        if ($position == 0 or $this->Player_Model->now_town->$pos_type != 20)
        {
            $this->show('error','Башня алхимика еще не построена!');
        }
        else
        {
            $this->show('alchemist', $position);
        }
    }

    function highscore()
    {
        $options['offset'] = (isset($_POST['offset']) and $_POST['offset'] > 0) ? $_POST['offset'] : 0;
        $options['highscoreType'] = isset($_POST['highscoreType']) ? $_POST['highscoreType'] : 'score';
        $users = $this->db->get($this->session->userdata('universe').'_users');
        $this->db->order_by("points", "desc");
        switch($options['highscoreType'])
        {
            case 'building_score_main': $this->db->order_by("points_buildings", "desc"); break;
            case 'building_score_secondary': $this->db->order_by("points_levels", "desc"); break;
            case 'research_score_main': $this->db->order_by("points_research", "desc"); break;
            case 'research_score_secondary': $this->db->order_by("points_complete", "desc"); break;
            case 'army_score_main': $this->db->order_by("points_army", "desc"); break;
            case 'trader_score_secondary': $this->db->order_by("points_gold", "desc"); break;

            default: $this->db->order_by("points", "desc"); break;
        }
        $users100 = $this->db->get($this->session->userdata('universe').'_users', 100, $options['offset']*100);
        $this->show('highscore', $users, $users100, $options);
    }

        function show($location, $param1 = 0, $param2 = 0, $param3 = 0)
        {
            $this->load->view('game_index',array('page' => $location, 'param1' => $param1, 'param2' => $param2, 'param3' => $param3));
        }

}

/* End of file game.php */
/* Location: ./system/application/controllers/game.php */